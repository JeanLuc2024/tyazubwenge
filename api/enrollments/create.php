<?php
/**
 * Enrollments - Create Endpoint
 */

Auth::checkAuth();

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    APIResponse::error('Invalid JSON input');
}

// Validate required fields
$requiredFields = ['student_id', 'training_program_id'];
$errors = Validator::validateRequired($input, $requiredFields);

if (!empty($errors)) {
    APIResponse::validationError($errors);
}

$studentId = (int)$input['student_id'];
$programId = (int)$input['training_program_id'];

// Check if student exists
$student = fetchOne("SELECT * FROM students WHERE id = ? AND is_active = 1", [$studentId]);
if (!$student) {
    APIResponse::validationError(['student_id' => 'Student not found']);
}

// Check if program exists
$program = fetchOne("SELECT * FROM training_programs WHERE id = ? AND is_active = 1", [$programId]);
if (!$program) {
    APIResponse::validationError(['training_program_id' => 'Training program not found']);
}

// Check if student is already enrolled in this program
$existingEnrollment = fetchOne("SELECT id FROM enrollments WHERE student_id = ? AND training_program_id = ? AND status != 'cancelled'", [$studentId, $programId]);
if ($existingEnrollment) {
    APIResponse::validationError(['training_program_id' => 'Student is already enrolled in this program']);
}

// Check if program has available slots
$currentEnrollments = fetchOne("SELECT COUNT(*) as count FROM enrollments WHERE training_program_id = ? AND status = 'enrolled'", [$programId])['count'];
if ($currentEnrollments >= $program['max_students']) {
    APIResponse::validationError(['training_program_id' => 'Program is full. No available slots']);
}

try {
    // Create enrollment
    $sql = "INSERT INTO enrollments (student_id, training_program_id, enrollment_date, amount_paid) 
            VALUES (?, ?, CURDATE(), ?)";
    
    $amountPaid = (float)($input['amount_paid'] ?? 0);
    $paymentStatus = $amountPaid >= $program['price'] ? 'paid' : 'pending';
    
    $params = [$studentId, $programId, $amountPaid];
    
    $stmt = executeQuery($sql, $params);
    
    if (!$stmt) {
        APIResponse::error('Failed to create enrollment');
    }
    
    $enrollmentId = getLastInsertId();
    
    // Update payment status
    if ($amountPaid > 0) {
        $updateSql = "UPDATE enrollments SET payment_status = ? WHERE id = ?";
        executeQuery($updateSql, [$paymentStatus, $enrollmentId]);
    }
    
    // Get the created enrollment with full details
    $enrollment = fetchOne("SELECT e.*, 
                                   s.first_name, s.last_name, s.email as student_email,
                                   tp.name as program_name, tp.duration_hours, tp.price as program_price
                            FROM enrollments e
                            JOIN students s ON e.student_id = s.id
                            JOIN training_programs tp ON e.training_program_id = tp.id
                            WHERE e.id = ?", [$enrollmentId]);
    
    $enrollment['student_name'] = $enrollment['first_name'] . ' ' . $enrollment['last_name'];
    $enrollment['outstanding_amount'] = $enrollment['program_price'] - $enrollment['amount_paid'];
    
    APIResponse::success($enrollment, 'Student enrolled successfully', 201);
    
} catch (Exception $e) {
    logError('Enrollment creation failed', ['error' => $e->getMessage(), 'data' => $input]);
    APIResponse::error('Failed to create enrollment: ' . $e->getMessage());
}
?>





