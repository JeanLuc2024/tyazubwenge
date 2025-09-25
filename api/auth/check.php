<?php
/**
 * Authentication - Check Status Endpoint
 */

// Include API configuration
require_once '../../config/api_config.php';

$user = Auth::getCurrentUser();

if ($user) {
    APIResponse::success($user, 'User authenticated');
} else {
    APIResponse::unauthorized('Not authenticated');
}
?>



