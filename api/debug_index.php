<?php
/**
 * Debug API Index
 */

// Get request method and path
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$original_path = $path;
$path = str_replace('/api/', '', $path);

echo "<h1>API Debug Information</h1>";
echo "<p><strong>REQUEST_METHOD:</strong> {$method}</p>";
echo "<p><strong>REQUEST_URI:</strong> {$_SERVER['REQUEST_URI']}</p>";
echo "<p><strong>Original Path:</strong> {$original_path}</p>";
echo "<p><strong>Clean Path:</strong> '{$path}'</p>";

// Test the switch statement
echo "<h2>Switch Statement Test</h2>";

switch ($path) {
    case 'reports/sales':
        echo "<p style='color: green;'>✓ Matched: reports/sales</p>";
        if ($method === 'GET') {
            echo "<p style='color: green;'>✓ Method GET allowed</p>";
            if (file_exists('reports/sales.php')) {
                echo "<p style='color: green;'>✓ File exists: reports/sales.php</p>";
                try {
                    include 'reports/sales.php';
                } catch (Exception $e) {
                    echo "<p style='color: red;'>✗ Error including file: " . $e->getMessage() . "</p>";
                }
            } else {
                echo "<p style='color: red;'>✗ File not found: reports/sales.php</p>";
            }
        } else {
            echo "<p style='color: red;'>✗ Method {$method} not allowed</p>";
        }
        break;
        
    case 'reports/inventory':
        echo "<p style='color: green;'>✓ Matched: reports/inventory</p>";
        if ($method === 'GET') {
            echo "<p style='color: green;'>✓ Method GET allowed</p>";
            if (file_exists('reports/inventory.php')) {
                echo "<p style='color: green;'>✓ File exists: reports/inventory.php</p>";
                try {
                    include 'reports/inventory.php';
                } catch (Exception $e) {
                    echo "<p style='color: red;'>✗ Error including file: " . $e->getMessage() . "</p>";
                }
            } else {
                echo "<p style='color: red;'>✗ File not found: reports/inventory.php</p>";
            }
        } else {
            echo "<p style='color: red;'>✗ Method {$method} not allowed</p>";
        }
        break;
        
    case 'reports/profit':
        echo "<p style='color: green;'>✓ Matched: reports/profit</p>";
        if ($method === 'GET') {
            echo "<p style='color: green;'>✓ Method GET allowed</p>";
            if (file_exists('reports/profit.php')) {
                echo "<p style='color: green;'>✓ File exists: reports/profit.php</p>";
                try {
                    include 'reports/profit.php';
                } catch (Exception $e) {
                    echo "<p style='color: red;'>✗ Error including file: " . $e->getMessage() . "</p>";
                }
            } else {
                echo "<p style='color: red;'>✗ File not found: reports/profit.php</p>";
            }
        } else {
            echo "<p style='color: red;'>✗ Method {$method} not allowed</p>";
        }
        break;
        
    case 'sales':
        echo "<p style='color: green;'>✓ Matched: sales</p>";
        if ($method === 'GET') {
            echo "<p style='color: green;'>✓ Method GET allowed for sales list</p>";
        } elseif ($method === 'POST') {
            echo "<p style='color: green;'>✓ Method POST allowed for sales create</p>";
            if (file_exists('sales/create.php')) {
                echo "<p style='color: green;'>✓ File exists: sales/create.php</p>";
                try {
                    include 'sales/create.php';
                } catch (Exception $e) {
                    echo "<p style='color: red;'>✗ Error including file: " . $e->getMessage() . "</p>";
                }
            } else {
                echo "<p style='color: red;'>✗ File not found: sales/create.php</p>";
            }
        } else {
            echo "<p style='color: red;'>✗ Method {$method} not allowed</p>";
        }
        break;
        
    default:
        echo "<p style='color: red;'>✗ No match found for path: '{$path}'</p>";
        echo "<p><strong>Available paths:</strong></p>";
        echo "<ul>";
        echo "<li>reports/sales</li>";
        echo "<li>reports/inventory</li>";
        echo "<li>reports/profit</li>";
        echo "<li>sales</li>";
        echo "</ul>";
        break;
}

echo "<h2>Debug Complete!</h2>";
?>
