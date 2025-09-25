<?php
echo "Testing database connection...\n";

try {
    $pdo = new PDO("mysql:host=localhost;dbname=tyazubwenge_lab;charset=utf8mb4", 'root', '');
    echo "Database connected successfully!\n";
    
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM products");
    $result = $stmt->fetch();
    echo "Products count: " . $result['count'] . "\n";
    
    if ($result['count'] > 0) {
        $stmt = $pdo->query("SELECT id, name, unit_price FROM products LIMIT 1");
        $product = $stmt->fetch();
        echo "Sample product: " . $product['name'] . " (ID: " . $product['id'] . ")\n";
    }
    
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage() . "\n";
    
    // Try to create database
    try {
        $pdo = new PDO("mysql:host=localhost;charset=utf8mb4", 'root', '');
        $pdo->exec("CREATE DATABASE IF NOT EXISTS tyazubwenge_lab");
        echo "Database created!\n";
        
        // Import schema
        $schema = file_get_contents('database/schema_fixed.sql');
        $pdo->exec($schema);
        echo "Schema imported!\n";
        
    } catch (PDOException $e2) {
        echo "Failed to create database: " . $e2->getMessage() . "\n";
    }
}
?>
