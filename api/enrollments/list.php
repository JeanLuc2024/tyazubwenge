<?php
/**
 * Enrollments - List Endpoint
 */

// Get query parameters
$page = (int)($_GET['page'] ?? 1);
$limit = (int)($_GET['limit'] ?? 20);
$student_id = (int)($_GET['student_id'] ?? 0);
$program_id = (int)($_GET['program_id'] ?? 0);
$status = $_GET['status'] ?? 'all';
$payment_status = $_GET['payment_status'] ?? 'all';

$offset = ($page - 1) * $limit;

// Build query
$sql = "SELECT e.*, 
               s.first_name, s.last_name, s.email as student_email, s.phone as student_phone,
               tp.name as program_name, tp.duration_hours, tp.price as program_price
        FROM enrollments e
        JOIN students s ON e.student_id = s.id
        JOIN training_programs tp ON e.training_program_id = tp.id
        WHERE 1=1";

$params = [];

if ($student_id > 0) {
    $sql .= " AND e.student_id = ?";
    $params[] = $student_id;
}

if ($program_id > 0) {
    $sql .= " AND e.training_program_id = ?";
    $params[] = $program_id;
}

if ($status !== 'all') {
    $sql .= " AND e.status = ?";
    $params[] = $status;
}

if ($payment_status !== 'all') {
    $sql .= " AND e.payment_status = ?";
    $params[] = $payment_status;
}

// Get total count
$countSql = str_replace("SELECT e.*, s.first_name, s.last_name, s.email as student_email, s.phone as student_phone, tp.name as program_name, tp.duration_hours, tp.price as program_price", "SELECT COUNT(*)", $sql);
$total = fetchOne($countSql, $params)['COUNT(*)'];

// Add pagination
$sql .= " ORDER BY e.created_at DESC LIMIT ? OFFSET ?";
$params = array_merge($params, [$limit, $offset]);

$enrollments = fetchAll($sql, $params);

// Calculate additional fields
foreach ($enrollments as &$enrollment) {
    $enrollment['student_name'] = $enrollment['first_name'] . ' ' . $enrollment['last_name'];
    $enrollment['outstanding_amount'] = $enrollment['program_price'] - $enrollment['amount_paid'];
    $enrollment['is_fully_paid'] = $enrollment['outstanding_amount'] <= 0;
}

$response = [
    'enrollments' => $enrollments,
    'pagination' => [
        'current_page' => $page,
        'per_page' => $limit,
        'total' => $total,
        'total_pages' => ceil($total / $limit)
    ]
];

APIResponse::success($response);
?>



