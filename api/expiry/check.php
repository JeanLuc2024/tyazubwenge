<?php
/**
 * Tyazubwenge Training Center - Expiry Check API
 * Check for products nearing expiry or already expired
 */

require_once '../../config/api_config.php';

try {
    $db = getDB();
    
    // Get expiry warning days from settings
    $warningDays = fetchOne("SELECT setting_value FROM system_settings WHERE setting_key = 'expiry_warning_days'");
    $warningDays = $warningDays ? (int)$warningDays['setting_value'] : 30;
    
    $today = date('Y-m-d');
    $warningDate = date('Y-m-d', strtotime("+{$warningDays} days"));
    
    // Get products nearing expiry
    $nearingExpiry = fetchAll("
        SELECT p.*, c.name as category_name, s.name as supplier_name
        FROM products p 
        LEFT JOIN categories c ON p.category_id = c.id 
        LEFT JOIN suppliers s ON p.supplier_id = s.id
        WHERE p.expiry_date IS NOT NULL 
        AND p.expiry_date <= ? 
        AND p.expiry_date > ?
        AND p.is_active = 1
        ORDER BY p.expiry_date ASC
    ", [$warningDate, $today]);
    
    // Get expired products
    $expired = fetchAll("
        SELECT p.*, c.name as category_name, s.name as supplier_name
        FROM products p 
        LEFT JOIN categories c ON p.category_id = c.id 
        LEFT JOIN suppliers s ON p.supplier_id = s.id
        WHERE p.expiry_date IS NOT NULL 
        AND p.expiry_date < ?
        AND p.is_active = 1
        ORDER BY p.expiry_date ASC
    ", [$today]);
    
    // Create alerts for new expiring products
    foreach ($nearingExpiry as $product) {
        // Check if alert already exists
        $existingAlert = fetchOne("
            SELECT id FROM alerts 
            WHERE product_id = ? AND alert_type = 'expiry' AND is_resolved = 0
        ", [$product['id']]);
        
        if (!$existingAlert) {
            $daysLeft = (strtotime($product['expiry_date']) - strtotime($today)) / (60 * 60 * 24);
            $message = "Product '{$product['name']}' will expire in " . ceil($daysLeft) . " days on {$product['expiry_date']}";
            
            executeQuery("
                INSERT INTO alerts (alert_type, product_id, message) 
                VALUES ('expiry', ?, ?)
            ", [$product['id'], $message]);
        }
    }
    
    // Create alerts for expired products
    foreach ($expired as $product) {
        // Check if alert already exists
        $existingAlert = fetchOne("
            SELECT id FROM alerts 
            WHERE product_id = ? AND alert_type = 'expired' AND is_resolved = 0
        ", [$product['id']]);
        
        if (!$existingAlert) {
            $daysExpired = (strtotime($today) - strtotime($product['expiry_date'])) / (60 * 60 * 24);
            $message = "Product '{$product['name']}' has been expired for " . ceil($daysExpired) . " days since {$product['expiry_date']}";
            
            executeQuery("
                INSERT INTO alerts (alert_type, product_id, message) 
                VALUES ('expired', ?, ?)
            ", [$product['id'], $message]);
        }
    }
    
    // Get unread alerts count
    $unreadCount = fetchOne("SELECT COUNT(*) as count FROM alerts WHERE is_read = 0");
    
    APIResponse::success([
        'nearing_expiry' => $nearingExpiry,
        'expired' => $expired,
        'unread_alerts' => $unreadCount['count'],
        'warning_days' => $warningDays
    ]);
    
} catch (Exception $e) {
    APIResponse::error('Failed to check expiry: ' . $e->getMessage(), 500);
}
?>


