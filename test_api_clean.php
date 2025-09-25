<?php
// Test the API without any output before it

// Simulate POST request
$_SERVER['REQUEST_METHOD'] = 'POST';
$_SERVER['CONTENT_TYPE'] = 'application/json';

// Sample data
$testData = [
    'customer_name' => 'Test Customer',
    'customer_email' => 'test@example.com',
    'customer_phone' => '1234567890',
    'payment_method' => 'cash',
    'discount' => 0,
    'tax' => 0,
    'items' => [[
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 1000
    ]]
];

// Simulate input
$GLOBALS['mock_input'] = json_encode($testData);

// Start session
session_start();
$_SESSION['admin_id'] = 1;

// Change to the api/sales directory
chdir('api/sales');

// Include the API
include 'create.php';
?>
