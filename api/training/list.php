<?php
/**
 * Training Programs - List Endpoint
 */

// Get query parameters
$page = (int)($_GET['page'] ?? 1);
$limit = (int)($_GET['limit'] ?? 20);
$search = sanitizeInput($_GET['search'] ?? '');
$is_active = $_GET['is_active'] ?? 'all';

$offset = ($page - 1) * $limit;

// Build query
$sql = "SELECT tp.*, 
               COUNT(e.id) as enrolled_students,
               COUNT(CASE WHEN e.status = 'completed' THEN 1 END) as completed_students,
               SUM(CASE WHEN e.payment_status = 'paid' THEN e.amount_paid ELSE 0 END) as total_revenue
        FROM training_programs tp
        LEFT JOIN enrollments e ON tp.id = e.training_program_id
        WHERE 1=1";

$params = [];

if ($is_active !== 'all') {
    $sql .= " AND tp.is_active = ?";
    $params[] = $is_active === 'true' ? 1 : 0;
}

if (!empty($search)) {
    $sql .= " AND (tp.name LIKE ? OR tp.description LIKE ?)";
    $searchTerm = "%$search%";
    $params = array_merge($params, [$searchTerm, $searchTerm]);
}

$sql .= " GROUP BY tp.id";

// Get total count
$countSql = "SELECT COUNT(DISTINCT tp.id) FROM training_programs tp WHERE 1=1";
$countParams = [];
if ($is_active !== 'all') {
    $countSql .= " AND tp.is_active = ?";
    $countParams[] = $is_active === 'true' ? 1 : 0;
}
if (!empty($search)) {
    $countSql .= " AND (tp.name LIKE ? OR tp.description LIKE ?)";
    $searchTerm = "%$search%";
    $countParams = array_merge($countParams, [$searchTerm, $searchTerm]);
}

$total = fetchOne($countSql, $countParams)['COUNT(DISTINCT tp.id)'];

// Add pagination
$sql .= " ORDER BY tp.created_at DESC LIMIT ? OFFSET ?";
$params = array_merge($params, [$limit, $offset]);

$programs = fetchAll($sql, $params);

// Calculate additional metrics
foreach ($programs as &$program) {
    $program['completion_rate'] = $program['enrolled_students'] > 0 ? 
        round(($program['completed_students'] / $program['enrolled_students']) * 100, 2) : 0;
    
    $program['available_slots'] = $program['max_students'] - $program['enrolled_students'];
    $program['is_full'] = $program['available_slots'] <= 0;
}

$response = [
    'programs' => $programs,
    'pagination' => [
        'current_page' => $page,
        'per_page' => $limit,
        'total' => $total,
        'total_pages' => ceil($total / $limit)
    ]
];

APIResponse::success($response);
?>



