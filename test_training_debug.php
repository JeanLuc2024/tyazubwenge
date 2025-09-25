<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Test training API
$_SERVER['REQUEST_METHOD'] = 'POST';
$_SERVER['CONTENT_TYPE'] = 'application/json';

$testData = [
    'name' => 'Test Training',
    'description' => 'Test Description',
    'duration_hours' => 24,
    'price' => 25000,
    'max_students' => 20
];

$GLOBALS['mock_input'] = json_encode($testData);
session_start();
$_SESSION['admin_id'] = 1;

echo "Testing training API...\n";
chdir('api/training');
include 'create.php';
?>
