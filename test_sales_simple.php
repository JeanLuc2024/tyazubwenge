<?php
// Test sales API with minimal setup
$_SERVER['REQUEST_METHOD'] = 'POST';
$_SERVER['CONTENT_TYPE'] = 'application/json';

$testData = [
    'customer_name' => 'Test Customer',
    'items' => [[
        'product_id' => 1,
        'quantity' => 1,
        'unit_price' => 1000
    ]]
];

$GLOBALS['mock_input'] = json_encode($testData);
session_start();
$_SESSION['admin_id'] = 1;

chdir('api/sales');
include 'create.php';
?>
