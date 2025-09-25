<?php
/**
 * Customers - List Endpoint
 */

require_once '../../config/api_config.php';

Auth::checkAuth();

try {
    $sql = "SELECT * FROM customers ORDER BY created_at DESC";
    $customers = fetchAll($sql);
    
    APIResponse::success($customers, 'Customers retrieved successfully');
    
} catch (Exception $e) {
    logError("Error getting customers", ['error' => $e->getMessage()]);
    APIResponse::error('An error occurred while retrieving customers');
}
?>
