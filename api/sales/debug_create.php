<?php
/**
 * Debug version of sales create endpoint
 */

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Start output buffering
ob_start();

// Set headers
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

try {
    // Include database config
    require_once '../../config/database.php';
    
    // Get input data
    $input_data = file_get_contents('php://input');
    $input = json_decode($input_data, true);
    
    // Log the input for debugging
    error_log("Debug Sales Input: " . $input_data);
    
    if (!$input) {
        throw new Exception('Invalid JSON input: ' . json_last_error_msg());
    }
    
    // Validate required fields
    if (!isset($input['customer_name']) || !isset($input['items'])) {
        throw new Exception('Missing required fields: customer_name and items');
    }
    
    // Test database connection
    $db = getDB();
    if (!$db) {
        throw new Exception('Database connection failed');
    }
    
    // Simple test sale creation
    $customer_name = htmlspecialchars($input['customer_name']);
    $items = $input['items'];
    
    if (!is_array($items) || empty($items)) {
        throw new Exception('Items must be a non-empty array');
    }
    
    // Get first item for testing
    $first_item = $items[0];
    if (!isset($first_item['product_id']) || !isset($first_item['quantity'])) {
        throw new Exception('Item must have product_id and quantity');
    }
    
    // Test product exists
    $product = fetchOne("SELECT id, name, quantity, unit_price, unit_type FROM products WHERE id = ? AND is_active = 1", [$first_item['product_id']]);
    if (!$product) {
        throw new Exception('Product not found with ID: ' . $first_item['product_id']);
    }
    
    // Create a simple test sale
    $sale_number = 'TEST-' . time();
    $total_amount = $first_item['quantity'] * ($first_item['unit_price'] ?? $product['unit_price']);
    
    $sale_sql = "INSERT INTO sales (sale_number, customer_name, total_amount, final_amount, payment_method, payment_status, created_by) 
                 VALUES (?, ?, ?, ?, 'cash', 'pending', 1)";
    
    $sale_result = executeQuery($sale_sql, [$sale_number, $customer_name, $total_amount, $total_amount]);
    
    if (!$sale_result) {
        throw new Exception('Failed to create sale record');
    }
    
    $sale_id = getLastInsertId();
    
    // Create sale item
    $unit_price = $first_item['unit_price'] ?? $product['unit_price'];
    $item_total = $first_item['quantity'] * $unit_price;
    $item_cost = $product['unit_price'] * $first_item['quantity'];
    $item_profit = $item_total - $item_cost;
    
    $sale_item_sql = "INSERT INTO sale_items (sale_id, product_id, quantity, unit_price, total_price, profit) 
                      VALUES (?, ?, ?, ?, ?, ?)";
    
    $sale_item_result = executeQuery($sale_item_sql, [
        $sale_id, $first_item['product_id'], $first_item['quantity'], 
        $unit_price, $item_total, $item_profit
    ]);
    
    if (!$sale_item_result) {
        throw new Exception('Failed to create sale item');
    }
    
    $response = [
        'success' => true,
        'message' => 'Debug sale created successfully',
        'data' => [
            'sale_id' => $sale_id,
            'sale_number' => $sale_number,
            'totals' => [
                'total_amount' => $total_amount,
                'total_profit' => $item_profit
            ]
        ],
        'timestamp' => date('Y-m-d H:i:s')
    ];
    
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => 'Error: ' . $e->getMessage(),
        'timestamp' => date('Y-m-d H:i:s')
    ];
}

// Clean output buffer and send response
ob_clean();
echo json_encode($response);
exit();
?>
