<?php
/**
 * Reports - Profit Endpoint
 * Returns profit analysis for date range with breakdown by product
 */

require_once __DIR__ . '/../../config/api_config.php';

Auth::checkAuth();

// Get query parameters
$start_date = $_GET['start_date'] ?? date('Y-m-01'); // Default to first day of current month
$end_date = $_GET['end_date'] ?? date('Y-m-d'); // Default to today
$top_n = (int)($_GET['top_n'] ?? 10); // Number of top products to show

// Validate dates
if (!Validator::validateDate($start_date) || !Validator::validateDate($end_date)) {
    APIResponse::validationError(['dates' => 'Invalid date format. Use YYYY-MM-DD']);
}

if ($start_date > $end_date) {
    APIResponse::validationError(['dates' => 'Start date cannot be after end date']);
}

try {
    // Get overall profit data for the date range
    $overall_profit = fetchOne("SELECT 
                               COALESCE(SUM(s.final_amount), 0) as revenue,
                               COALESCE(SUM(si.quantity * p.cost_price), 0) as cost_of_goods_sold,
                               COALESCE(SUM(si.total_price - si.quantity * p.cost_price), 0) as profit,
                               COUNT(DISTINCT s.id) as total_sales,
                               SUM(si.quantity) as total_items_sold
                               FROM sales s
                               JOIN sale_items si ON s.id = si.sale_id
                               JOIN products p ON si.product_id = p.id
                               WHERE DATE(s.sale_date) BETWEEN ? AND ?", [$start_date, $end_date]);
    
    // Calculate profit margin
    $revenue = (float)$overall_profit['revenue'];
    $cost = (float)$overall_profit['cost_of_goods_sold'];
    $profit = (float)$overall_profit['profit'];
    $profit_margin = $revenue > 0 ? round(($profit / $revenue) * 100, 2) : 0;
    
    // Get breakdown by product
    $product_breakdown = fetchAll("SELECT 
                                  p.id as product_id,
                                  p.name as product_name,
                                  p.sku,
                                  SUM(si.quantity) as qty_sold,
                                  SUM(si.total_price) as revenue,
                                  SUM(si.quantity * p.cost_price) as cost,
                                  SUM(si.total_price - si.quantity * p.cost_price) as profit,
                                  ROUND(SUM(si.total_price - si.quantity * p.cost_price) / SUM(si.total_price) * 100, 2) as profit_margin
                                  FROM sales s
                                  JOIN sale_items si ON s.id = si.sale_id
                                  JOIN products p ON si.product_id = p.id
                                  WHERE DATE(s.sale_date) BETWEEN ? AND ?
                                  GROUP BY p.id, p.name, p.sku
                                  ORDER BY profit DESC
                                  LIMIT ?", [$start_date, $end_date, $top_n]);
    
    // Get daily profit trend
    $daily_trend = fetchAll("SELECT 
                            DATE(s.sale_date) as sale_date,
                            SUM(s.final_amount) as daily_revenue,
                            SUM(si.quantity * p.cost_price) as daily_cost,
                            SUM(si.total_price - si.quantity * p.cost_price) as daily_profit
                            FROM sales s
                            JOIN sale_items si ON s.id = si.sale_id
                            JOIN products p ON si.product_id = p.id
                            WHERE DATE(s.sale_date) BETWEEN ? AND ?
                            GROUP BY DATE(s.sale_date)
                            ORDER BY sale_date", [$start_date, $end_date]);
    
    // Get category profit breakdown
    $category_breakdown = fetchAll("SELECT 
                                   c.name as category_name,
                                   SUM(si.total_price) as revenue,
                                   SUM(si.quantity * p.cost_price) as cost,
                                   SUM(si.total_price - si.quantity * p.cost_price) as profit,
                                   ROUND(SUM(si.total_price - si.quantity * p.cost_price) / SUM(si.total_price) * 100, 2) as profit_margin
                                   FROM sales s
                                   JOIN sale_items si ON s.id = si.sale_id
                                   JOIN products p ON si.product_id = p.id
                                   JOIN categories c ON p.category_id = c.id
                                   WHERE DATE(s.sale_date) BETWEEN ? AND ?
                                   GROUP BY c.id, c.name
                                   ORDER BY profit DESC", [$start_date, $end_date]);
    
    // Get payment method profit analysis
    $payment_breakdown = fetchAll("SELECT 
                                  s.payment_method,
                                  COUNT(*) as sales_count,
                                  SUM(s.final_amount) as revenue,
                                  SUM(si.quantity * p.cost_price) as cost,
                                  SUM(si.total_price - si.quantity * p.cost_price) as profit
                                  FROM sales s
                                  JOIN sale_items si ON s.id = si.sale_id
                                  JOIN products p ON si.product_id = p.id
                                  WHERE DATE(s.sale_date) BETWEEN ? AND ?
                                  GROUP BY s.payment_method
                                  ORDER BY profit DESC", [$start_date, $end_date]);
    
    // Calculate additional metrics
    $avg_sale_value = $overall_profit['total_sales'] > 0 ? 
        round($revenue / $overall_profit['total_sales'], 2) : 0;
    
    $avg_profit_per_sale = $overall_profit['total_sales'] > 0 ? 
        round($profit / $overall_profit['total_sales'], 2) : 0;
    
    $response = [
        'start_date' => $start_date,
        'end_date' => $end_date,
        'overall' => [
            'revenue' => $revenue,
            'cost_of_goods_sold' => $cost,
            'profit' => $profit,
            'profit_margin' => $profit_margin,
            'total_sales' => (int)$overall_profit['total_sales'],
            'total_items_sold' => (int)$overall_profit['total_items_sold'],
            'avg_sale_value' => $avg_sale_value,
            'avg_profit_per_sale' => $avg_profit_per_sale
        ],
        'breakdown_by_product' => $product_breakdown,
        'breakdown_by_category' => $category_breakdown,
        'breakdown_by_payment_method' => $payment_breakdown,
        'daily_trend' => $daily_trend
    ];
    
    APIResponse::success($response);
    
} catch (Exception $e) {
    logError("Error fetching profit report", ['error' => $e->getMessage(), 'start_date' => $start_date, 'end_date' => $end_date]);
    APIResponse::error('An error occurred while fetching profit report');
}
?>
