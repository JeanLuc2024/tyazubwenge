<?php
/**
 * Tyazubwenge Training Center - Profile Update API
 * Update admin profile information
 */

require_once '../../config/api_config.php';

try {
    // Check if user is logged in
    session_start();
    if (!isset($_SESSION['user_id'])) {
        APIResponse::error('Unauthorized', 401);
    }
    
    $input = json_decode(file_get_contents('php://input'), true);
    $userId = $_SESSION['user_id'];
    
    if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
        APIResponse::error('Method not allowed', 405);
    }
    
    $name = $input['name'] ?? '';
    $email = $input['email'] ?? '';
    $currentPassword = $input['current_password'] ?? '';
    $newPassword = $input['new_password'] ?? '';
    
    // Validate required fields
    if (empty($name) || empty($email)) {
        APIResponse::error('Name and email are required', 400);
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        APIResponse::error('Invalid email format', 400);
    }
    
    // Check if email is already taken by another user
    $existingUser = fetchOne("SELECT id FROM users WHERE email = ? AND id != ?", [$email, $userId]);
    if ($existingUser) {
        APIResponse::error('Email already exists', 400);
    }
    
    // If password change is requested
    if (!empty($newPassword)) {
        if (empty($currentPassword)) {
            APIResponse::error('Current password is required to change password', 400);
        }
        
        // Verify current password
        $user = fetchOne("SELECT password FROM users WHERE id = ?", [$userId]);
        if (!$user || !password_verify($currentPassword, $user['password'])) {
            APIResponse::error('Current password is incorrect', 400);
        }
        
        // Validate new password
        if (strlen($newPassword) < 6) {
            APIResponse::error('New password must be at least 6 characters long', 400);
        }
        
        // Update with new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $result = executeQuery(
            "UPDATE users SET name = ?, email = ?, password = ?, updated_at = NOW() WHERE id = ?",
            [$name, $email, $hashedPassword, $userId]
        );
    } else {
        // Update without password change
        $result = executeQuery(
            "UPDATE users SET name = ?, email = ?, updated_at = NOW() WHERE id = ?",
            [$name, $email, $userId]
        );
    }
    
    if ($result) {
        // Update session data
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        
        APIResponse::success([
            'message' => 'Profile updated successfully',
            'user' => [
                'id' => $userId,
                'name' => $name,
                'email' => $email
            ]
        ]);
    } else {
        APIResponse::error('Failed to update profile', 500);
    }
    
} catch (Exception $e) {
    APIResponse::error('Profile update failed: ' . $e->getMessage(), 500);
}
?>


