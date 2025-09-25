<?php
/**
 * Test database connection
 */

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Database Connection Test</h1>";

try {
    // Test direct PDO connection
    echo "<h2>1. Direct PDO Connection Test</h2>";
    $pdo = new PDO(
        "mysql:host=localhost;dbname=tyazubwenge_lab;charset=utf8mb4",
        'root',
        '',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
    echo "<p style='color: green;'>✓ Direct PDO connection successful</p>";
    
    // Test if products table exists
    echo "<h2>2. Products Table Test</h2>";
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM products");
    $result = $stmt->fetch();
    echo "<p style='color: green;'>✓ Products table exists with {$result['count']} records</p>";
    
    // Test if sales table exists
    echo "<h2>3. Sales Table Test</h2>";
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM sales");
    $result = $stmt->fetch();
    echo "<p style='color: green;'>✓ Sales table exists with {$result['count']} records</p>";
    
    // Test sample product
    echo "<h2>4. Sample Product Test</h2>";
    $stmt = $pdo->query("SELECT id, name, quantity, unit_price FROM products LIMIT 1");
    $product = $stmt->fetch();
    if ($product) {
        echo "<p style='color: green;'>✓ Sample product found: {$product['name']} (ID: {$product['id']}, Price: ₦{$product['unit_price']})</p>";
    } else {
        echo "<p style='color: red;'>✗ No products found</p>";
    }
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>✗ Database connection failed: " . $e->getMessage() . "</p>";
    
    // Try to create database
    echo "<h2>5. Attempting to Create Database</h2>";
    try {
        $pdo = new PDO("mysql:host=localhost;charset=utf8mb4", 'root', '');
        $pdo->exec("CREATE DATABASE IF NOT EXISTS tyazubwenge_lab");
        echo "<p style='color: green;'>✓ Database created successfully</p>";
        
        // Now try to connect to the new database
        $pdo = new PDO(
            "mysql:host=localhost;dbname=tyazubwenge_lab;charset=utf8mb4",
            'root',
            '',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
        echo "<p style='color: green;'>✓ Connected to new database</p>";
        
        // Import schema
        echo "<h2>6. Importing Database Schema</h2>";
        $schema = file_get_contents('database/schema_fixed.sql');
        $pdo->exec($schema);
        echo "<p style='color: green;'>✓ Schema imported successfully</p>";
        
    } catch (PDOException $e2) {
        echo "<p style='color: red;'>✗ Failed to create database: " . $e2->getMessage() . "</p>";
    }
}

echo "<h2>7. Testing API Configuration</h2>";
try {
    require_once 'config/database.php';
    $db = getDB();
    if ($db) {
        echo "<p style='color: green;'>✓ API database connection successful</p>";
    } else {
        echo "<p style='color: red;'>✗ API database connection failed</p>";
    }
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ API configuration error: " . $e->getMessage() . "</p>";
}
?>
