<?php
/**
 * Dashboard - Data Endpoint
 * Returns main admin KPIs and summary data
 */

require_once __DIR__ . '/../../config/api_config.php';

Auth::checkAuth();

try {
    // Get today's date range
    $today_start = date('Y-m-d 00:00:00');
    $today_end = date('Y-m-d 23:59:59');
    
    // Get current month date range
    $month_start = date('Y-m-01 00:00:00');
    $month_end = date('Y-m-t 23:59:59');
    
    // Total revenue today
    $revenue_today = fetchOne("SELECT COALESCE(SUM(final_amount), 0) as total 
                              FROM sales 
                              WHERE sale_date BETWEEN ? AND ?", [$today_start, $today_end])['total'];
    
    // Total revenue this month
    $revenue_month = fetchOne("SELECT COALESCE(SUM(final_amount), 0) as total 
                              FROM sales 
                              WHERE sale_date BETWEEN ? AND ?", [$month_start, $month_end])['total'];
    
    // Cost of goods sold today
    $cogs_today = fetchOne("SELECT COALESCE(SUM(si.quantity * p.cost_price), 0) as total
                           FROM sales s
                           JOIN sale_items si ON s.id = si.sale_id
                           JOIN products p ON si.product_id = p.id
                           WHERE s.sale_date BETWEEN ? AND ?", [$today_start, $today_end])['total'];
    
    // Gross profit today
    $gross_profit_today = $revenue_today - $cogs_today;
    
    // Total stock value (current stock * cost price)
    $stock_value = fetchOne("SELECT COALESCE(SUM(current_stock * cost_price), 0) as total 
                            FROM products WHERE is_active = 1")['total'];
    
    // Low stock count
    $low_stock_count = fetchOne("SELECT COUNT(*) as count 
                                FROM products 
                                WHERE is_active = 1 AND current_stock <= min_stock_level")['count'];
    
    // Recent sales (last 5)
    $recent_sales = fetchAll("SELECT s.id, s.sale_number, s.customer_name, s.final_amount, s.sale_date,
                             COUNT(si.id) as item_count
                             FROM sales s
                             LEFT JOIN sale_items si ON s.id = si.sale_id
                             GROUP BY s.id
                             ORDER BY s.sale_date DESC
                             LIMIT 5");
    
    // Recent alerts (last 5)
    $recent_alerts = fetchAll("SELECT a.id, a.alert_type, a.message, a.created_at, p.name as product_name
                              FROM alerts a
                              LEFT JOIN products p ON a.product_id = p.id
                              WHERE a.is_resolved = 0
                              ORDER BY a.created_at DESC
                              LIMIT 5");
    
    // Additional metrics
    $total_products = fetchOne("SELECT COUNT(*) as count FROM products WHERE is_active = 1")['count'];
    $total_categories = fetchOne("SELECT COUNT(*) as count FROM categories WHERE is_active = 1")['count'];
    $total_students = fetchOne("SELECT COUNT(*) as count FROM students WHERE is_active = 1")['count'];
    $active_enrollments = fetchOne("SELECT COUNT(*) as count FROM enrollments WHERE status = 'enrolled'")['count'];
    
    // Monthly sales trend (last 6 months)
    $sales_trend = fetchAll("SELECT 
                            DATE_FORMAT(sale_date, '%Y-%m') as month,
                            COUNT(*) as sales_count,
                            SUM(final_amount) as total_revenue
                            FROM sales 
                            WHERE sale_date >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
                            GROUP BY DATE_FORMAT(sale_date, '%Y-%m')
                            ORDER BY month DESC");
    
    // Top selling products (last 30 days)
    $top_products = fetchAll("SELECT p.name, SUM(si.quantity) as total_sold, SUM(si.total_price) as revenue
                             FROM sale_items si
                             JOIN products p ON si.product_id = p.id
                             JOIN sales s ON si.sale_id = s.id
                             WHERE s.sale_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)
                             GROUP BY p.id, p.name
                             ORDER BY total_sold DESC
                             LIMIT 5");
    
    $response = [
        'total_revenue_today' => (float)$revenue_today,
        'total_revenue_month' => (float)$revenue_month,
        'total_cost_of_goods_sold_today' => (float)$cogs_today,
        'gross_profit_today' => (float)$gross_profit_today,
        'total_stock_value' => (float)$stock_value,
        'low_stock_count' => (int)$low_stock_count,
        'recent_sales' => $recent_sales,
        'recent_alerts' => $recent_alerts,
        'summary_stats' => [
            'total_products' => (int)$total_products,
            'total_categories' => (int)$total_categories,
            'total_students' => (int)$total_students,
            'active_enrollments' => (int)$active_enrollments
        ],
        'sales_trend' => $sales_trend,
        'top_products' => $top_products
    ];
    
    APIResponse::success($response);
    
} catch (Exception $e) {
    logError("Error fetching dashboard data", ['error' => $e->getMessage()]);
    APIResponse::error('An error occurred while fetching dashboard data');
}
?>
