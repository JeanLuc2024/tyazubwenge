<?php
/**
 * Reports - Inventory Endpoint
 * Returns inventory data with optional stock movements
 */

require_once __DIR__ . '/../../config/api_config.php';

Auth::checkAuth();

// Get query parameters
$with_movements = $_GET['with_movements'] ?? '0';
$product_id = (int)($_GET['product_id'] ?? 0);
$low_stock_only = $_GET['low_stock_only'] ?? '0';
$category_id = (int)($_GET['category_id'] ?? 0);

try {
    // Build base query for products
    $sql = "SELECT p.id, p.name, p.sku, p.unit_type, p.current_stock, p.min_stock_level, 
                   p.cost_price, p.selling_price, p.expiry_date,
                   (p.current_stock * p.cost_price) as stock_value,
                   (p.selling_price - p.cost_price) as profit_margin,
                   c.name as category_name,
                   s.name as supplier_name,
                   CASE 
                       WHEN p.current_stock <= p.min_stock_level THEN 'low_stock'
                       WHEN p.expiry_date IS NOT NULL AND p.expiry_date <= DATE_ADD(NOW(), INTERVAL 30 DAY) THEN 'expiring_soon'
                       WHEN p.expiry_date IS NOT NULL AND p.expiry_date <= NOW() THEN 'expired'
                       ELSE 'normal'
                   END as stock_status
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.id
            LEFT JOIN suppliers s ON p.supplier_id = s.id
            WHERE p.is_active = 1";
    
    $params = [];
    
    // Add filters
    if ($product_id > 0) {
        $sql .= " AND p.id = ?";
        $params[] = $product_id;
    }
    
    if ($low_stock_only === '1') {
        $sql .= " AND p.current_stock <= p.min_stock_level";
    }
    
    if ($category_id > 0) {
        $sql .= " AND p.category_id = ?";
        $params[] = $category_id;
    }
    
    $sql .= " ORDER BY p.name";
    
    $products = fetchAll($sql, $params);
    
    // Get stock movements if requested
    $movements = [];
    if ($with_movements === '1') {
        $movement_sql = "SELECT sm.*, p.name as product_name
                        FROM stock_movements sm
                        JOIN products p ON sm.product_id = p.id
                        WHERE 1=1";
        $movement_params = [];
        
        if ($product_id > 0) {
            $movement_sql .= " AND sm.product_id = ?";
            $movement_params[] = $product_id;
        }
        
        $movement_sql .= " ORDER BY sm.created_at DESC LIMIT 100";
        
        $movements = fetchAll($movement_sql, $movement_params);
    }
    
    // Calculate summary statistics
    $summary = fetchOne("SELECT 
                        COUNT(*) as total_products,
                        SUM(current_stock * cost_price) as total_stock_value,
                        SUM(CASE WHEN current_stock <= min_stock_level THEN 1 ELSE 0 END) as low_stock_count,
                        SUM(CASE WHEN expiry_date IS NOT NULL AND expiry_date <= NOW() THEN 1 ELSE 0 END) as expired_count,
                        SUM(CASE WHEN expiry_date IS NOT NULL AND expiry_date <= DATE_ADD(NOW(), INTERVAL 30 DAY) THEN 1 ELSE 0 END) as expiring_soon_count
                        FROM products 
                        WHERE is_active = 1");
    
    // Get category breakdown
    $category_breakdown = fetchAll("SELECT 
                                   c.name as category_name,
                                   COUNT(p.id) as product_count,
                                   SUM(p.current_stock * p.cost_price) as category_value
                                   FROM categories c
                                   LEFT JOIN products p ON c.id = p.category_id AND p.is_active = 1
                                   GROUP BY c.id, c.name
                                   ORDER BY category_value DESC");
    
    // Get supplier breakdown
    $supplier_breakdown = fetchAll("SELECT 
                                   s.name as supplier_name,
                                   COUNT(p.id) as product_count,
                                   SUM(p.current_stock * p.cost_price) as supplier_value
                                   FROM suppliers s
                                   LEFT JOIN products p ON s.id = p.supplier_id AND p.is_active = 1
                                   GROUP BY s.id, s.name
                                   ORDER BY supplier_value DESC");
    
    $response = [
        'products' => $products,
        'movements' => $movements,
        'summary' => [
            'total_products' => (int)$summary['total_products'],
            'total_stock_value' => (float)$summary['total_stock_value'],
            'low_stock_count' => (int)$summary['low_stock_count'],
            'expired_count' => (int)$summary['expired_count'],
            'expiring_soon_count' => (int)$summary['expiring_soon_count']
        ],
        'category_breakdown' => $category_breakdown,
        'supplier_breakdown' => $supplier_breakdown,
        'filters' => [
            'with_movements' => $with_movements === '1',
            'product_id' => $product_id > 0 ? $product_id : null,
            'low_stock_only' => $low_stock_only === '1',
            'category_id' => $category_id > 0 ? $category_id : null
        ]
    ];
    
    APIResponse::success($response);
    
} catch (Exception $e) {
    logError("Error fetching inventory report", ['error' => $e->getMessage()]);
    APIResponse::error('An error occurred while fetching inventory report');
}
?>
