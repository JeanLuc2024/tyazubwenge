<?php
// Test training API
$_SERVER['REQUEST_METHOD'] = 'POST';
$_SERVER['CONTENT_TYPE'] = 'application/json';

$testData = [
    'name' => 'Test Training ' . time(),
    'description' => 'Test Description',
    'duration_hours' => 24,
    'price' => 25000,
    'max_students' => 20
];

$GLOBALS['mock_input'] = json_encode($testData);
session_start();
$_SESSION['admin_id'] = 1;

chdir('api/training');
include 'create.php';
?>
