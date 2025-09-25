<?php
/**
 * Sales - List Endpoint
 */

// Get query parameters
$page = (int)($_GET['page'] ?? 1);
$limit = (int)($_GET['limit'] ?? 20);
$date_from = $_GET['date_from'] ?? '';
$date_to = $_GET['date_to'] ?? '';
$payment_status = $_GET['payment_status'] ?? 'all';
$search = sanitizeInput($_GET['search'] ?? '');

$offset = ($page - 1) * $limit;

// Build query
$sql = "SELECT s.*, u.name as created_by_name
        FROM sales s
        LEFT JOIN users u ON s.created_by = u.id
        WHERE 1=1";

$params = [];

if (!empty($date_from)) {
    $sql .= " AND DATE(s.sale_date) >= ?";
    $params[] = $date_from;
}

if (!empty($date_to)) {
    $sql .= " AND DATE(s.sale_date) <= ?";
    $params[] = $date_to;
}

if ($payment_status !== 'all') {
    $sql .= " AND s.payment_status = ?";
    $params[] = $payment_status;
}

if (!empty($search)) {
    $sql .= " AND (s.sale_number LIKE ? OR s.customer_name LIKE ? OR s.customer_email LIKE ?)";
    $searchTerm = "%$search%";
    $params = array_merge($params, [$searchTerm, $searchTerm, $searchTerm]);
}

// Get total count
$countSql = str_replace("SELECT s.*, u.name as created_by_name", "SELECT COUNT(*)", $sql);
$total = fetchOne($countSql, $params)['COUNT(*)'];

// Add pagination
$sql .= " ORDER BY s.sale_date DESC LIMIT ? OFFSET ?";
$params = array_merge($params, [$limit, $offset]);

$sales = fetchAll($sql, $params);

// Get sale items for each sale
foreach ($sales as &$sale) {
    $itemsSql = "SELECT si.*, p.name as product_name, p.sku, p.unit_type
                 FROM sale_items si
                 JOIN products p ON si.product_id = p.id
                 WHERE si.sale_id = ?";
    
    $sale['items'] = fetchAll($itemsSql, [$sale['id']]);
    
    // Calculate total profit for this sale
    $sale['total_profit'] = array_sum(array_column($sale['items'], 'profit'));
}

$response = [
    'sales' => $sales,
    'pagination' => [
        'current_page' => $page,
        'per_page' => $limit,
        'total' => $total,
        'total_pages' => ceil($total / $limit)
    ]
];

APIResponse::success($response);
?>



