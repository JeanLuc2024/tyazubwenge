<?php
/**
 * Authentication - Logout Endpoint
 */

// Include API configuration
require_once '../../config/api_config.php';

Auth::checkAuth();

$result = Auth::logout();
APIResponse::success(null, 'Logged out successfully');
?>



