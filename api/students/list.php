<?php
/**
 * Students - List Endpoint
 */

// Get query parameters
$page = (int)($_GET['page'] ?? 1);
$limit = (int)($_GET['limit'] ?? 20);
$search = sanitizeInput($_GET['search'] ?? '');
$is_active = $_GET['is_active'] ?? 'all';

$offset = ($page - 1) * $limit;

// Build query
$sql = "SELECT s.*, 
               COUNT(e.id) as total_enrollments,
               COUNT(CASE WHEN e.status = 'completed' THEN 1 END) as completed_programs,
               COUNT(CASE WHEN e.status = 'enrolled' THEN 1 END) as active_enrollments,
               SUM(CASE WHEN e.payment_status = 'paid' THEN e.amount_paid ELSE 0 END) as total_paid
        FROM students s
        LEFT JOIN enrollments e ON s.id = e.student_id
        WHERE 1=1";

$params = [];

if ($is_active !== 'all') {
    $sql .= " AND s.is_active = ?";
    $params[] = $is_active === 'true' ? 1 : 0;
}

if (!empty($search)) {
    $sql .= " AND (s.first_name LIKE ? OR s.last_name LIKE ? OR s.email LIKE ? OR s.phone LIKE ?)";
    $searchTerm = "%$search%";
    $params = array_merge($params, [$searchTerm, $searchTerm, $searchTerm, $searchTerm]);
}

$sql .= " GROUP BY s.id";

// Get total count
$countSql = "SELECT COUNT(DISTINCT s.id) FROM students s WHERE 1=1";
$countParams = [];
if ($is_active !== 'all') {
    $countSql .= " AND s.is_active = ?";
    $countParams[] = $is_active === 'true' ? 1 : 0;
}
if (!empty($search)) {
    $countSql .= " AND (s.first_name LIKE ? OR s.last_name LIKE ? OR s.email LIKE ? OR s.phone LIKE ?)";
    $searchTerm = "%$search%";
    $countParams = array_merge($countParams, [$searchTerm, $searchTerm, $searchTerm, $searchTerm]);
}

$total = fetchOne($countSql, $countParams)['COUNT(DISTINCT s.id)'];

// Add pagination
$sql .= " ORDER BY s.created_at DESC LIMIT ? OFFSET ?";
$params = array_merge($params, [$limit, $offset]);

$students = fetchAll($sql, $params);

// Calculate additional metrics
foreach ($students as &$student) {
    $student['full_name'] = $student['first_name'] . ' ' . $student['last_name'];
    $student['completion_rate'] = $student['total_enrollments'] > 0 ? 
        round(($student['completed_programs'] / $student['total_enrollments']) * 100, 2) : 0;
}

$response = [
    'students' => $students,
    'pagination' => [
        'current_page' => $page,
        'per_page' => $limit,
        'total' => $total,
        'total_pages' => ceil($total / $limit)
    ]
];

APIResponse::success($response);
?>



