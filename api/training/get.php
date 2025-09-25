<?php
/**
 * Training Programs - Get Single Endpoint
 */

require_once '../../config/api_config.php';

Auth::checkAuth();

try {
    $id = $_GET['id'] ?? null;
    
    if (!$id) {
        APIResponse::error('Training program ID is required', 400);
    }
    
    $sql = "SELECT * FROM training_programs WHERE id = ? AND is_active = 1";
    $program = fetchOne($sql, [$id]);
    
    if (!$program) {
        APIResponse::error('Training program not found', 404);
    }
    
    APIResponse::success($program, 'Training program retrieved successfully');
    
} catch (Exception $e) {
    logError("Error getting training program", ['error' => $e->getMessage(), 'id' => $id ?? null]);
    APIResponse::error('An error occurred while retrieving the training program');
}
?>
