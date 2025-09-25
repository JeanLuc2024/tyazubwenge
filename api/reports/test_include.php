<?php
/**
 * Test Include from API Reports Directory
 */

echo "<h1>Include Test from API Reports Directory</h1>";

echo "<p><strong>Current Directory:</strong> " . getcwd() . "</p>";
echo "<p><strong>Script Path:</strong> " . __FILE__ . "</p>";
echo "<p><strong>Script Directory:</strong> " . __DIR__ . "</p>";

echo "<h2>Path Tests</h2>";

$paths_to_test = [
    '../../config/api_config.php',
    __DIR__ . '/../../config/api_config.php',
    realpath(__DIR__ . '/../../config/api_config.php'),
    dirname(__DIR__) . '/../config/api_config.php'
];

foreach ($paths_to_test as $path) {
    echo "<p><strong>Testing:</strong> {$path}</p>";
    if (file_exists($path)) {
        echo "<p style='color: green;'>✓ File exists</p>";
        echo "<p><strong>Absolute path:</strong> " . realpath($path) . "</p>";
        
        // Try to include it
        try {
            require_once $path;
            echo "<p style='color: green;'>✓ Include successful</p>";
        } catch (Exception $e) {
            echo "<p style='color: red;'>✗ Include failed: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p style='color: red;'>✗ File not found</p>";
    }
    echo "<hr>";
}

echo "<h2>Directory Structure</h2>";
echo "<pre>";
echo "Current: " . getcwd() . "\n";
echo "Script: " . __DIR__ . "\n";
echo "Parent: " . dirname(__DIR__) . "\n";
echo "Grandparent: " . dirname(dirname(__DIR__)) . "\n";
echo "Config: " . dirname(dirname(__DIR__)) . "/config\n";
echo "</pre>";

echo "<h2>Test Complete</h2>";
?>


