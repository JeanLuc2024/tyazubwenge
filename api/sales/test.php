<?php
/**
 * Test endpoint to debug sales API issues
 */

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Start output buffering
ob_start();

// Set proper headers
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

try {
    // Test database connection
    require_once '../../config/database.php';
    
    // Test if we can connect to database
    $test_query = "SELECT COUNT(*) as count FROM products";
    $result = fetchOne($test_query);
    
    if ($result) {
        $response = [
            'success' => true,
            'message' => 'Database connection successful',
            'product_count' => $result['count'],
            'timestamp' => date('Y-m-d H:i:s')
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Database query failed',
            'timestamp' => date('Y-m-d H:i:s')
        ];
    }
    
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => 'Error: ' . $e->getMessage(),
        'timestamp' => date('Y-m-d H:i:s')
    ];
}

// Clean output buffer and send JSON response
ob_clean();
echo json_encode($response);
exit();
?>
