<?php
/**
 * Authentication - Login Endpoint
 */

// Include API configuration
require_once '../../config/api_config.php';

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    APIResponse::error('Invalid JSON input');
}

$email = sanitizeInput($input['email'] ?? '');
$password = $input['password'] ?? '';

// Validate input
$errors = Validator::validateRequired($input, ['email', 'password']);
if (!empty($errors)) {
    APIResponse::validationError($errors);
}

if (!Validator::validateEmail($email)) {
    APIResponse::validationError(['email' => 'Invalid email format']);
}

// Attempt login
$result = Auth::login($email, $password);

if ($result['success']) {
    APIResponse::success($result['user'], 'Login successful');
} else {
    APIResponse::error($result['message'], 401);
}
?>



