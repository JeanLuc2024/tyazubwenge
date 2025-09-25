<?php
/**
 * Training Programs - Update Endpoint
 */

Auth::checkAuth();

$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['id'])) {
    APIResponse::error('Program ID is required');
}

$programId = (int)$input['id'];

// Check if program exists
$existingProgram = fetchOne("SELECT * FROM training_programs WHERE id = ?", [$programId]);
if (!$existingProgram) {
    APIResponse::notFound('Training program not found');
}

// Validate required fields
$requiredFields = ['name', 'duration_hours', 'price', 'max_students'];
$errors = Validator::validateRequired($input, $requiredFields);

if (!empty($errors)) {
    APIResponse::validationError($errors);
}

// Validate numeric fields
if (!Validator::validateNumeric($input['duration_hours']) || $input['duration_hours'] <= 0) {
    $errors['duration_hours'] = 'Duration must be a positive number';
}
if (!Validator::validateNumeric($input['price']) || $input['price'] <= 0) {
    $errors['price'] = 'Price must be a positive number';
}
if (!Validator::validateNumeric($input['max_students']) || $input['max_students'] <= 0) {
    $errors['max_students'] = 'Max students must be a positive number';
}

if (!empty($errors)) {
    APIResponse::validationError($errors);
}

// Check if program name already exists (excluding current program)
$existingName = fetchOne("SELECT id FROM training_programs WHERE name = ? AND id != ? AND is_active = 1", [$input['name'], $programId]);
if ($existingName) {
    APIResponse::validationError(['name' => 'Training program with this name already exists']);
}

// Check if new max_students is not less than current enrollments
$currentEnrollments = fetchOne("SELECT COUNT(*) as count FROM enrollments WHERE training_program_id = ? AND status = 'enrolled'", [$programId])['count'];
if ($input['max_students'] < $currentEnrollments) {
    APIResponse::validationError(['max_students' => "Cannot reduce max students below current enrollments ({$currentEnrollments})"]);
}

try {
    // Update training program
    $sql = "UPDATE training_programs SET 
            name = ?, description = ?, duration_hours = ?, price = ?, max_students = ?,
            updated_at = CURRENT_TIMESTAMP
            WHERE id = ?";
    
    $params = [
        sanitizeInput($input['name']),
        sanitizeInput($input['description'] ?? ''),
        (int)$input['duration_hours'],
        (float)$input['price'],
        (int)$input['max_students'],
        $programId
    ];
    
    $stmt = executeQuery($sql, $params);
    
    if (!$stmt) {
        APIResponse::error('Failed to update training program');
    }
    
    // Get updated program
    $program = fetchOne("SELECT * FROM training_programs WHERE id = ?", [$programId]);
    
    APIResponse::success($program, 'Training program updated successfully');
    
} catch (Exception $e) {
    logError('Training program update failed', ['error' => $e->getMessage(), 'program_id' => $programId]);
    APIResponse::error('Failed to update training program: ' . $e->getMessage());
}
?>



