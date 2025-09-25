<?php
echo "Testing...\n";

// Test database
try {
    $pdo = new PDO("mysql:host=localhost;dbname=tyazubwenge_lab;charset=utf8mb4", 'root', '');
    echo "Database connected\n";
    
    // Check if training_programs exists
    $stmt = $pdo->query("SHOW TABLES LIKE 'training_programs'");
    if ($stmt->fetch()) {
        echo "training_programs table exists\n";
    } else {
        echo "training_programs table does NOT exist\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
