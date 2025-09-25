<?php
/**
 * Categories - List Endpoint
 * Returns paginated list of categories with optional search
 */

require_once __DIR__ . '/../../config/api_config.php';

// Get query parameters
$page = (int)($_GET['page'] ?? 1);
$limit = (int)($_GET['limit'] ?? 20);
$search = sanitizeInput($_GET['search'] ?? '');
$is_active = $_GET['is_active'] ?? 'all';

$offset = ($page - 1) * $limit;

// Build query
$sql = "SELECT c.*, COUNT(p.id) as product_count 
        FROM categories c 
        LEFT JOIN products p ON c.id = p.category_id AND p.is_active = 1
        WHERE 1=1";

$params = [];

if ($is_active !== 'all') {
    $sql .= " AND c.is_active = ?";
    $params[] = $is_active === 'true' ? 1 : 0;
}

if (!empty($search)) {
    $sql .= " AND (c.name LIKE ? OR c.description LIKE ?)";
    $searchTerm = "%$search%";
    $params = array_merge($params, [$searchTerm, $searchTerm]);
}

$sql .= " GROUP BY c.id";

// Get total count
$countSql = "SELECT COUNT(*) FROM categories c WHERE 1=1";
$countParams = [];

if ($is_active !== 'all') {
    $countSql .= " AND c.is_active = ?";
    $countParams[] = $is_active === 'true' ? 1 : 0;
}

if (!empty($search)) {
    $countSql .= " AND (c.name LIKE ? OR c.description LIKE ?)";
    $searchTerm = "%$search%";
    $countParams = array_merge($countParams, [$searchTerm, $searchTerm]);
}

$total = fetchOne($countSql, $countParams)['COUNT(*)'];

// Add pagination
$sql .= " ORDER BY c.created_at DESC LIMIT ? OFFSET ?";
$params = array_merge($params, [$limit, $offset]);

$categories = fetchAll($sql, $params);

$response = [
    'categories' => $categories,
    'pagination' => [
        'current_page' => $page,
        'per_page' => $limit,
        'total' => $total,
        'total_pages' => ceil($total / $limit)
    ]
];

APIResponse::success($response);
?>
