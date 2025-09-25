<?php
// Test customer API
$_SERVER['REQUEST_METHOD'] = 'POST';
$_SERVER['CONTENT_TYPE'] = 'application/json';

$testData = [
    'firstName' => 'Test',
    'lastName' => 'Customer',
    'email' => 'test@example.com',
    'phone' => '+250-123-456-789',
    'type' => 'Individual'
];

$GLOBALS['mock_input'] = json_encode($testData);
session_start();
$_SESSION['admin_id'] = 1;

chdir('api/customers');
include 'create.php';
?>
