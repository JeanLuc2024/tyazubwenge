<?php
/**
 * Students - Create Endpoint
 */

Auth::checkAuth();

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    APIResponse::error('Invalid JSON input');
}

// Validate required fields
$requiredFields = ['first_name', 'last_name', 'email'];
$errors = Validator::validateRequired($input, $requiredFields);

if (!empty($errors)) {
    APIResponse::validationError($errors);
}

// Validate email format
if (!Validator::validateEmail($input['email'])) {
    $errors['email'] = 'Invalid email format';
}

// Check if email already exists
$existingStudent = fetchOne("SELECT id FROM students WHERE email = ?", [$input['email']]);
if ($existingStudent) {
    $errors['email'] = 'Student with this email already exists';
}

if (!empty($errors)) {
    APIResponse::validationError($errors);
}

try {
    // Insert student
    $sql = "INSERT INTO students (first_name, last_name, email, phone, address, date_of_birth, 
            emergency_contact, emergency_phone) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $params = [
        sanitizeInput($input['first_name']),
        sanitizeInput($input['last_name']),
        sanitizeInput($input['email']),
        sanitizeInput($input['phone'] ?? ''),
        sanitizeInput($input['address'] ?? ''),
        !empty($input['date_of_birth']) ? $input['date_of_birth'] : null,
        sanitizeInput($input['emergency_contact'] ?? ''),
        sanitizeInput($input['emergency_phone'] ?? '')
    ];
    
    $stmt = executeQuery($sql, $params);
    
    if (!$stmt) {
        APIResponse::error('Failed to create student');
    }
    
    $studentId = getLastInsertId();
    
    // Get the created student
    $student = fetchOne("SELECT * FROM students WHERE id = ?", [$studentId]);
    $student['full_name'] = $student['first_name'] . ' ' . $student['last_name'];
    
    APIResponse::success($student, 'Student created successfully', 201);
    
} catch (Exception $e) {
    logError('Student creation failed', ['error' => $e->getMessage(), 'data' => $input]);
    APIResponse::error('Failed to create student: ' . $e->getMessage());
}
?>





