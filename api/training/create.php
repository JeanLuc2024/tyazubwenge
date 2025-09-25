<?php
/**
 * Training Programs - Create Endpoint
 */

Auth::checkAuth();

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    APIResponse::error('Invalid JSON input');
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

// Check if program name already exists
$existingProgram = fetchOne("SELECT id FROM training_programs WHERE name = ? AND is_active = 1", [$input['name']]);
if ($existingProgram) {
    APIResponse::validationError(['name' => 'Training program with this name already exists']);
}

try {
    // Insert training program
    $sql = "INSERT INTO training_programs (name, description, duration_hours, price, max_students) 
            VALUES (?, ?, ?, ?, ?)";
    
    $params = [
        sanitizeInput($input['name']),
        sanitizeInput($input['description'] ?? ''),
        (int)$input['duration_hours'],
        (float)$input['price'],
        (int)$input['max_students']
    ];
    
    $stmt = executeQuery($sql, $params);
    
    if (!$stmt) {
        APIResponse::error('Failed to create training program');
    }
    
    $programId = getLastInsertId();
    
    // Get the created program
    $program = fetchOne("SELECT * FROM training_programs WHERE id = ?", [$programId]);
    
    APIResponse::success($program, 'Training program created successfully', 201);
    
} catch (Exception $e) {
    logError('Training program creation failed', ['error' => $e->getMessage(), 'data' => $input]);
    APIResponse::error('Failed to create training program: ' . $e->getMessage());
}
?>





