<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Test products API
$_SERVER['REQUEST_METHOD'] = 'POST';
$_SERVER['CONTENT_TYPE'] = 'application/json';

$testData = [
    'name' => 'Test Product',
    'description' => 'Test Description',
    'category_id' => 1,
    'sku' => 'TEST-001',
    'unit_type' => 'pieces',
    'quantity' => 10,
    'unit_price' => 1000,
    'supplier_id' => 1
];

$GLOBALS['mock_input'] = json_encode($testData);
session_start();
$_SESSION['admin_id'] = 1;

echo "Testing products API...\n";
chdir('api/products');
include 'create.php';
?>
