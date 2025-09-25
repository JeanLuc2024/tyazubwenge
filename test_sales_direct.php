<?php
echo "Testing Sales API directly...\n";

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

echo "Test data: " . json_encode($testData) . "\n\n";

// Change to the api/sales directory to fix path issues
chdir('api/sales');

// Capture output
ob_start();
include 'create.php';
$output = ob_get_clean();

echo "API Output:\n";
echo $output . "\n";

// Try to parse as JSON
$decoded = json_decode($output, true);
if ($decoded) {
    echo "JSON is valid!\n";
    echo "Success: " . ($decoded['success'] ? 'true' : 'false') . "\n";
    echo "Message: " . $decoded['message'] . "\n";
} else {
    echo "JSON is invalid!\n";
    echo "Error: " . json_last_error_msg() . "\n";
}
?>
