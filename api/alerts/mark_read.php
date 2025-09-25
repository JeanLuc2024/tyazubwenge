<?php
/**
 * Alerts - Mark Read Endpoint
 * Marks an alert as read and optionally resolved
 */

require_once __DIR__ . '/../../config/api_config.php';

Auth::checkAuth();

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    APIResponse::error('Invalid JSON input');
}

$alert_id = (int)($input['id'] ?? 0);
$mark_resolved = (bool)($input['mark_resolved'] ?? false);

if ($alert_id <= 0) {
    APIResponse::validationError(['id' => 'Valid alert ID is required']);
}

try {
    // Check if alert exists
    $alert = fetchOne("SELECT id, is_read, is_resolved FROM alerts WHERE id = ?", [$alert_id]);
    
    if (!$alert) {
        APIResponse::notFound('Alert not found');
    }
    
    // Prepare update query
    $update_fields = ['is_read = 1'];
    $params = [];
    
    if ($mark_resolved) {
        $update_fields[] = 'is_resolved = 1';
        $update_fields[] = 'resolved_at = CURRENT_TIMESTAMP';
    }
    
    $sql = "UPDATE alerts SET " . implode(', ', $update_fields) . " WHERE id = ?";
    $params[] = $alert_id;
    
    $result = executeQuery($sql, $params);
    
    if ($result) {
        $action = $mark_resolved ? 'marked as read and resolved' : 'marked as read';
        logError("Alert {$action}", ['alert_id' => $alert_id]);
        APIResponse::success(['alert_id' => $alert_id], "Alert {$action} successfully");
    } else {
        APIResponse::error('Failed to update alert');
    }
    
} catch (Exception $e) {
    logError("Error updating alert", ['alert_id' => $alert_id, 'error' => $e->getMessage()]);
    APIResponse::error('An error occurred while updating the alert');
}
?>
