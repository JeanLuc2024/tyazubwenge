<?php
/**
 * Alerts - List Endpoint
 * Returns paginated list of alerts with optional filtering
 */

require_once __DIR__ . '/../../config/api_config.php';

Auth::checkAuth();

// Get query parameters
$page = (int)($_GET['page'] ?? 1);
$limit = (int)($_GET['limit'] ?? 20);
$is_read = $_GET['is_read'] ?? 'all';
$alert_type = $_GET['alert_type'] ?? 'all';

$offset = ($page - 1) * $limit;

// Build query
$sql = "SELECT a.*, p.name as product_name, p.sku as product_sku
        FROM alerts a
        LEFT JOIN products p ON a.product_id = p.id
        WHERE 1=1";

$params = [];

if ($is_read !== 'all') {
    $sql .= " AND a.is_read = ?";
    $params[] = $is_read === '1' ? 1 : 0;
}

if ($alert_type !== 'all') {
    $sql .= " AND a.alert_type = ?";
    $params[] = $alert_type;
}

// Get total count
$countSql = "SELECT COUNT(*) FROM alerts a WHERE 1=1";
$countParams = [];

if ($is_read !== 'all') {
    $countSql .= " AND a.is_read = ?";
    $countParams[] = $is_read === '1' ? 1 : 0;
}

if ($alert_type !== 'all') {
    $countSql .= " AND a.alert_type = ?";
    $countParams[] = $alert_type;
}

$total = fetchOne($countSql, $countParams)['COUNT(*)'];

// Add pagination and ordering
$sql .= " ORDER BY a.created_at DESC LIMIT ? OFFSET ?";
$params = array_merge($params, [$limit, $offset]);

$alerts = fetchAll($sql, $params);

// Add human-readable time differences
foreach ($alerts as &$alert) {
    $created_at = new DateTime($alert['created_at']);
    $now = new DateTime();
    $interval = $now->diff($created_at);
    
    if ($interval->days > 0) {
        $alert['time_ago'] = $interval->days . ' day' . ($interval->days > 1 ? 's' : '') . ' ago';
    } elseif ($interval->h > 0) {
        $alert['time_ago'] = $interval->h . ' hour' . ($interval->h > 1 ? 's' : '') . ' ago';
    } elseif ($interval->i > 0) {
        $alert['time_ago'] = $interval->i . ' minute' . ($interval->i > 1 ? 's' : '') . ' ago';
    } else {
        $alert['time_ago'] = 'Just now';
    }
}

$response = [
    'alerts' => $alerts,
    'pagination' => [
        'current_page' => $page,
        'per_page' => $limit,
        'total' => $total,
        'total_pages' => ceil($total / $limit)
    ],
    'summary' => [
        'unread_count' => fetchOne("SELECT COUNT(*) as count FROM alerts WHERE is_read = 0")['count'],
        'low_stock_count' => fetchOne("SELECT COUNT(*) as count FROM alerts WHERE alert_type = 'low_stock' AND is_read = 0")['count'],
        'expiry_count' => fetchOne("SELECT COUNT(*) as count FROM alerts WHERE alert_type = 'expiry' AND is_read = 0")['count']
    ]
];

APIResponse::success($response);
?>
