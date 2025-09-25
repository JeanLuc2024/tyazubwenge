<?php
/**
 * Customers - Create Endpoint
 */

require_once '../../config/api_config.php';

Auth::checkAuth();

// Get input data
if (isset($GLOBALS['mock_input'])) {
    $input_data = $GLOBALS['mock_input'];
} else {
    $input_data = file_get_contents('php://input');
}

$input = json_decode($input_data, true);

if (!$input) {
    APIResponse::error('Invalid JSON input');
}

// Validate required fields
$requiredFields = ['firstName', 'lastName', 'email', 'phone', 'type'];
$errors = Validator::validateRequired($input, $requiredFields);

if (!empty($errors)) {
    APIResponse::validationError($errors);
}

// Validate email
if (!Validator::validateEmail($input['email'])) {
    $errors['email'] = 'Invalid email format';
}

if (!empty($errors)) {
    APIResponse::validationError($errors);
}

try {
    // Check if email already exists
    $existingCustomer = fetchOne("SELECT id FROM customers WHERE email = ?", [$input['email']]);
    if ($existingCustomer) {
        APIResponse::validationError(['email' => 'Customer with this email already exists']);
    }
    
    // Insert customer
    $sql = "INSERT INTO customers (first_name, last_name, email, phone, customer_type, created_at) 
            VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";
    
    $params = [
        sanitizeInput($input['firstName']),
        sanitizeInput($input['lastName']),
        sanitizeInput($input['email']),
        sanitizeInput($input['phone']),
        sanitizeInput($input['type'])
    ];
    
    $stmt = executeQuery($sql, $params);
    
    if (!$stmt) {
        APIResponse::error('Failed to create customer');
    }
    
    $customerId = getDB()->lastInsertId();
    
    // Get created customer
    $customer = fetchOne("SELECT * FROM customers WHERE id = ?", [$customerId]);
    
    APIResponse::success($customer, 'Customer created successfully', 201);
    
} catch (Exception $e) {
    logError("Error creating customer", ['error' => $e->getMessage(), 'input' => $input]);
    APIResponse::error('An error occurred while creating the customer');
}
?>
