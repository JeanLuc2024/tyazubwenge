<?php
/**
 * Reports - Sales Endpoint
 * Returns sales data within date range with pagination and totals
 */

require_once __DIR__ . '/../../config/api_config.php';

Auth::checkAuth();

// Get query parameters
$start_date = $_GET['start_date'] ?? date('Y-m-01'); // Default to first day of current month
$end_date = $_GET['end_date'] ?? date('Y-m-d'); // Default to today
$page = (int)($_GET['page'] ?? 1);
$limit = (int)($_GET['limit'] ?? 20);

$offset = ($page - 1) * $limit;

// Validate dates
if (!Validator::validateDate($start_date) || !Validator::validateDate($end_date)) {
    APIResponse::validationError(['dates' => 'Invalid date format. Use YYYY-MM-DD']);
}

if ($start_date > $end_date) {
    APIResponse::validationError(['dates' => 'Start date cannot be after end date']);
}

try {
    // Get sales in date range
    $sql = "SELECT s.*, 
                   COUNT(si.id) as item_count,
                   SUM(si.quantity) as total_quantity
            FROM sales s
            LEFT JOIN sale_items si ON s.id = si.sale_id
            WHERE DATE(s.sale_date) BETWEEN ? AND ?
            GROUP BY s.id
            ORDER BY s.sale_date DESC";
    
    $params = [$start_date, $end_date];
    
    // Get total count
    $countSql = "SELECT COUNT(DISTINCT s.id) 
                 FROM sales s 
                 WHERE DATE(s.sale_date) BETWEEN ? AND ?";
    $total = fetchOne($countSql, $params)['COUNT(DISTINCT s.id)'];
    
    // Add pagination
    $sql .= " LIMIT ? OFFSET ?";
    $params = array_merge($params, [$limit, $offset]);
    
    $sales = fetchAll($sql, $params);
    
    // Get totals for the date range
    $totals = fetchOne("SELECT 
                       COUNT(DISTINCT s.id) as total_sales,
                       COALESCE(SUM(s.final_amount), 0) as total_revenue,
                       COALESCE(SUM(si.quantity), 0) as total_items_sold,
                       COALESCE(SUM(si.quantity * p.cost_price), 0) as total_cost,
                       COALESCE(SUM(si.total_price - si.quantity * p.cost_price), 0) as total_profit
                       FROM sales s
                       LEFT JOIN sale_items si ON s.id = si.sale_id
                       LEFT JOIN products p ON si.product_id = p.id
                       WHERE DATE(s.sale_date) BETWEEN ? AND ?", [$start_date, $end_date]);
    
    // Get payment method breakdown
    $payment_breakdown = fetchAll("SELECT 
                                  payment_method,
                                  COUNT(*) as count,
                                  SUM(final_amount) as total_amount
                                  FROM sales 
                                  WHERE DATE(sale_date) BETWEEN ? AND ?
                                  GROUP BY payment_method", [$start_date, $end_date]);
    
    // Get daily sales trend
    $daily_trend = fetchAll("SELECT 
                            DATE(sale_date) as sale_date,
                            COUNT(*) as sales_count,
                            SUM(final_amount) as daily_revenue
                            FROM sales 
                            WHERE DATE(sale_date) BETWEEN ? AND ?
                            GROUP BY DATE(sale_date)
                            ORDER BY sale_date", [$start_date, $end_date]);
    
    $response = [
        'sales' => $sales,
        'pagination' => [
            'current_page' => $page,
            'per_page' => $limit,
            'total' => $total,
            'total_pages' => ceil($total / $limit)
        ],
        'totals' => [
            'total_sales' => (int)$totals['total_sales'],
            'total_revenue' => (float)$totals['total_revenue'],
            'total_items_sold' => (int)$totals['total_items_sold'],
            'total_cost' => (float)$totals['total_cost'],
            'total_profit' => (float)$totals['total_profit'],
            'profit_margin' => $totals['total_revenue'] > 0 ? 
                round(($totals['total_profit'] / $totals['total_revenue']) * 100, 2) : 0
        ],
        'payment_breakdown' => $payment_breakdown,
        'daily_trend' => $daily_trend,
        'date_range' => [
            'start_date' => $start_date,
            'end_date' => $end_date
        ]
    ];
    
    APIResponse::success($response);
    
} catch (Exception $e) {
    logError("Error fetching sales report", ['error' => $e->getMessage(), 'start_date' => $start_date, 'end_date' => $end_date]);
    APIResponse::error('An error occurred while fetching sales report');
}
?>
