<?php
/**
 * Products - Stock Management Endpoint
 */

// Get query parameters
$product_id = (int)($_GET['product_id'] ?? 0);
$movement_type = $_GET['movement_type'] ?? 'all';
$date_from = $_GET['date_from'] ?? '';
$date_to = $_GET['date_to'] ?? '';

if ($product_id > 0) {
    // Get stock movements for specific product
    $sql = "SELECT sm.*, p.name as product_name, u.name as created_by_name
            FROM stock_movements sm
            JOIN products p ON sm.product_id = p.id
            LEFT JOIN users u ON sm.created_by = u.id
            WHERE sm.product_id = ?";
    
    $params = [$product_id];
    
    if ($movement_type !== 'all') {
        $sql .= " AND sm.movement_type = ?";
        $params[] = $movement_type;
    }
    
    if (!empty($date_from)) {
        $sql .= " AND DATE(sm.created_at) >= ?";
        $params[] = $date_from;
    }
    
    if (!empty($date_to)) {
        $sql .= " AND DATE(sm.created_at) <= ?";
        $params[] = $date_to;
    }
    
    $sql .= " ORDER BY sm.created_at DESC";
    
    $movements = fetchAll($sql, $params);
    
    // Get current product details
    $product = fetchOne("SELECT p.*, c.name as category_name 
                        FROM products p 
                        LEFT JOIN categories c ON p.category_id = c.id 
                        WHERE p.id = ?", [$productId]);
    
    $response = [
        'product' => $product,
        'movements' => $movements
    ];
    
} else {
    // Get stock summary for all products
    $sql = "SELECT p.id, p.name, p.sku, p.current_stock, p.min_stock_level, 
                   p.unit_type, c.name as category_name,
                   CASE 
                       WHEN p.current_stock <= p.min_stock_level THEN 'low_stock'
                       WHEN p.expiry_date IS NOT NULL AND DATEDIFF(p.expiry_date, CURDATE()) <= 30 THEN 'expiring_soon'
                       WHEN p.current_stock = 0 THEN 'out_of_stock'
                       ELSE 'in_stock'
                   END as stock_status
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.id
            WHERE p.is_active = 1";
    
    $params = [];
    
    if ($movement_type !== 'all') {
        switch ($movement_type) {
            case 'low_stock':
                $sql .= " AND p.current_stock <= p.min_stock_level";
                break;
            case 'expiring_soon':
                $sql .= " AND p.expiry_date IS NOT NULL AND DATEDIFF(p.expiry_date, CURDATE()) <= 30";
                break;
            case 'out_of_stock':
                $sql .= " AND p.current_stock = 0";
                break;
        }
    }
    
    $sql .= " ORDER BY p.name";
    
    $products = fetchAll($sql, $params);
    
    // Calculate summary statistics
    $summary = [
        'total_products' => count($products),
        'low_stock' => count(array_filter($products, fn($p) => $p['stock_status'] === 'low_stock')),
        'expiring_soon' => count(array_filter($products, fn($p) => $p['stock_status'] === 'expiring_soon')),
        'out_of_stock' => count(array_filter($products, fn($p) => $p['stock_status'] === 'out_of_stock')),
        'in_stock' => count(array_filter($products, fn($p) => $p['stock_status'] === 'in_stock'))
    ];
    
    $response = [
        'products' => $products,
        'summary' => $summary
    ];
}

APIResponse::success($response);
?>





