<?php
/**
 * Debug API Routing
 */

echo "<h1>API Debug Information</h1>";

echo "<h2>Request Information</h2>";
echo "<p><strong>REQUEST_METHOD:</strong> " . ($_SERVER['REQUEST_METHOD'] ?? 'Not set') . "</p>";
echo "<p><strong>REQUEST_URI:</strong> " . ($_SERVER['REQUEST_URI'] ?? 'Not set') . "</p>";
echo "<p><strong>SCRIPT_NAME:</strong> " . ($_SERVER['SCRIPT_NAME'] ?? 'Not set') . "</p>";
echo "<p><strong>PATH_INFO:</strong> " . ($_SERVER['PATH_INFO'] ?? 'Not set') . "</p>";

echo "<h2>Path Parsing</h2>";
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo "<p><strong>Parsed Path:</strong> {$path}</p>";

$clean_path = str_replace('/api/', '', $path);
echo "<p><strong>Clean Path:</strong> {$clean_path}</p>";

echo "<h2>Available Routes</h2>";
$routes = [
    'categories',
    'products', 
    'dashboard',
    'alerts',
    'reports/sales',
    'reports/inventory',
    'reports/profit',
    'sales'
];

foreach ($routes as $route) {
    $file_path = "api/{$route}.php";
    if (file_exists($file_path)) {
        echo "<p style='color: green;'>✓ {$route} -> {$file_path}</p>";
    } else {
        echo "<p style='color: red;'>✗ {$route} -> {$file_path}</p>";
    }
}

echo "<h2>Test Direct File Access</h2>";
$test_files = [
    'api/reports/sales.php',
    'api/reports/inventory.php',
    'api/reports/profit.php',
    'api/sales/create.php'
];

foreach ($test_files as $file) {
    if (file_exists($file)) {
        echo "<p style='color: green;'>✓ {$file} exists</p>";
    } else {
        echo "<p style='color: red;'>✗ {$file} not found</p>";
    }
}

echo "<h2>Environment</h2>";
echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";
echo "<p><strong>Document Root:</strong> " . ($_SERVER['DOCUMENT_ROOT'] ?? 'Not set') . "</p>";
echo "<p><strong>Current Directory:</strong> " . getcwd() . "</p>";

echo "<h2>Test Complete</h2>";
?>
