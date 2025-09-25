<?php
/**
 * Products - List Endpoint
 */

require_once __DIR__ . '/../../config/api_config.php';

// Get query parameters
$page = (int)($_GET['page'] ?? 1);
$limit = (int)($_GET['limit'] ?? 20);
$search = sanitizeInput($_GET['search'] ?? '');
$category_id = (int)($_GET['category_id'] ?? 0);
$low_stock = $_GET['low_stock'] ?? false;

$offset = ($page - 1) * $limit;

// Build query
$sql = "SELECT p.*, c.name as category_name, s.name as supplier_name 
        FROM products p 
        LEFT JOIN categories c ON p.category_id = c.id 
        LEFT JOIN suppliers s ON p.supplier_id = s.id 
        WHERE p.is_active = 1";

$params = [];

if (!empty($search)) {
    $sql .= " AND (p.name LIKE ? OR p.description LIKE ? OR p.sku LIKE ?)";
    $searchTerm = "%$search%";
    $params = array_merge($params, [$searchTerm, $searchTerm, $searchTerm]);
}

if ($category_id > 0) {
    $sql .= " AND p.category_id = ?";
    $params[] = $category_id;
}

if ($low_stock) {
    $sql .= " AND p.current_stock <= p.min_stock_level";
}

// Get total count
$countSql = str_replace("SELECT p.*, c.name as category_name, s.name as supplier_name", "SELECT COUNT(*)", $sql);
$total = fetchOne($countSql, $params)['COUNT(*)'];

// Add pagination
$sql .= " ORDER BY p.created_at DESC LIMIT ? OFFSET ?";
$params = array_merge($params, [$limit, $offset]);

$products = fetchAll($sql, $params);

// Calculate additional fields
foreach ($products as &$product) {
    $product['selling_price'] = $product['unit_price'];
    $product['cost_price'] = $product['unit_price'];
    $product['profit_margin'] = 0;
    $product['profit_percentage'] = 0;
    
    // Check if low stock
    $product['current_stock'] = $product['quantity'];
    $product['min_stock_level'] = 5;
    $product['is_low_stock'] = $product['current_stock'] <= $product['min_stock_level'];
    
    // Check if expiring soon (within 30 days)
    if ($product['expiry_date']) {
        $expiryDate = new DateTime($product['expiry_date']);
        $today = new DateTime();
        $daysUntilExpiry = $today->diff($expiryDate)->days;
        $product['is_expiring_soon'] = $daysUntilExpiry <= 30;
        $product['days_until_expiry'] = $daysUntilExpiry;
    } else {
        $product['is_expiring_soon'] = false;
        $product['days_until_expiry'] = null;
    }
}

$response = [
    'products' => $products,
    'pagination' => [
        'current_page' => $page,
        'per_page' => $limit,
        'total' => $total,
        'total_pages' => ceil($total / $limit)
    ]
];

APIResponse::success($response);
?>

