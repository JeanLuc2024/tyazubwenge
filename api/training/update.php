<?php
/**
 * Training Programs - Update Endpoint
 */

require_once '../../config/api_config.php';

Auth::checkAuth();

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    APIResponse::error('Invalid JSON input');
}

$id = $_GET['id'] ?? null;
if (!$id) {
    APIResponse::error('Training program ID is required', 400);
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

try {
    // Check if program exists
    $existingProgram = fetchOne("SELECT id FROM training_programs WHERE id = ? AND is_active = 1", [$id]);
    if (!$existingProgram) {
        APIResponse::error('Training program not found', 404);
    }
    
    // Check if name already exists (excluding current program)
    $duplicateCheck = fetchOne("SELECT id FROM training_programs WHERE name = ? AND id != ? AND is_active = 1", [$input['name'], $id]);
    if ($duplicateCheck) {
        APIResponse::validationError(['name' => 'Training program with this name already exists']);
    }
    
    // Update training program
    $sql = "UPDATE training_programs SET 
            name = ?, 
            description = ?, 
            duration_hours = ?, 
            price = ?, 
            max_students = ?,
            updated_at = CURRENT_TIMESTAMP
            WHERE id = ?";
    
    $params = [
        sanitizeInput($input['name']),
        sanitizeInput($input['description'] ?? ''),
        (int)$input['duration_hours'],
        (float)$input['price'],
        (int)$input['max_students'],
        (int)$id
    ];
    
    $stmt = executeQuery($sql, $params);
    
    if (!$stmt) {
        APIResponse::error('Failed to update training program');
    }
    
    // Get updated program
    $updatedProgram = fetchOne("SELECT * FROM training_programs WHERE id = ?", [$id]);
    
    APIResponse::success($updatedProgram, 'Training program updated successfully');
    
} catch (Exception $e) {
    logError("Error updating training program", ['error' => $e->getMessage(), 'input' => $input]);
    APIResponse::error('An error occurred while updating the training program');
}
?>