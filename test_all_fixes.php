<?php
// Comprehensive test for all fixes
echo "=== COMPREHENSIVE TEST SUITE ===\n\n";

// Test 1: Database Connection
echo "1. Testing Database Connection...\n";
try {
    $pdo = new PDO("mysql:host=localhost;dbname=tyazubwenge_lab;charset=utf8mb4", 'root', '');
    echo "Database Connection: PASS\n\n";
} catch (PDOException $e) {
    echo "Database Connection: FAIL - " . $e->getMessage() . "\n\n";
    exit;
}

// Test 2: Table Existence
echo "2. Testing Table Existence...\n";
$tables = ['customers', 'training_programs', 'products', 'categories'];
foreach ($tables as $table) {
    $stmt = $pdo->query("SHOW TABLES LIKE '$table'");
    $result = $stmt->fetch();
    echo "$table: " . ($result ? "EXISTS" : "MISSING") . "\n";
}
echo "\n";

// Test 3: Customer API
echo "3. Testing Customer API...\n";
$_SERVER['REQUEST_METHOD'] = 'POST';
$_SERVER['CONTENT_TYPE'] = 'application/json';
$testData = [
    'firstName' => 'Test Customer ' . time(),
    'lastName' => 'API Test',
    'email' => 'test' . time() . '@example.com',
    'phone' => '+250-123-456-789',
    'type' => 'Individual'
];
$GLOBALS['mock_input'] = json_encode($testData);
session_start();
$_SESSION['admin_id'] = 1;

ob_start();
chdir('api/customers');
include 'create.php';
$output = ob_get_clean();
echo "Customer API: " . (strpos($output, '"success":true') !== false ? "PASS" : "FAIL") . "\n\n";

// Test 4: Training API
echo "4. Testing Training API...\n";
chdir('../training');
$testData = [
    'name' => 'Test Training ' . time(),
    'description' => 'Test Description',
    'duration_hours' => 24,
    'price' => 25000,
    'max_students' => 20
];
$GLOBALS['mock_input'] = json_encode($testData);

ob_start();
include 'create.php';
$output = ob_get_clean();
echo "Training API: " . (strpos($output, '"success":true') !== false ? "PASS" : "FAIL") . "\n\n";

// Test 5: Product API
echo "5. Testing Product API...\n";
chdir('../products');
$testData = [
    'name' => 'Test Product ' . time(),
    'description' => 'Test Product Description',
    'category_id' => 1,
    'sku' => 'TEST-' . time(),
    'unit_type' => 'pieces',
    'quantity' => 100,
    'unit_price' => 5000
];
$GLOBALS['mock_input'] = json_encode($testData);

ob_start();
include 'create.php';
$output = ob_get_clean();
echo "Product API: " . (strpos($output, '"success":true') !== false ? "PASS" : "FAIL") . "\n\n";

echo "=== TEST COMPLETE ===\n";
?>
