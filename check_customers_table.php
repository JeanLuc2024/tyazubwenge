<?php
// Check if customers table exists
try {
    $pdo = new PDO("mysql:host=localhost;dbname=tyazubwenge_lab;charset=utf8mb4", 'root', '');
    
    // Check customers table
    $stmt = $pdo->query("SHOW TABLES LIKE 'customers'");
    $result = $stmt->fetch();
    
    if ($result) {
        echo "customers table exists\n";
        
        // Check structure
        $stmt = $pdo->query("DESCRIBE customers");
        $columns = $stmt->fetchAll();
        echo "Columns:\n";
        foreach ($columns as $column) {
            echo "- " . $column['Field'] . " (" . $column['Type'] . ")\n";
        }
        
    } else {
        echo "customers table does NOT exist\n";
        
        // Create it
        $sql = "CREATE TABLE customers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(255) NOT NULL,
            last_name VARCHAR(255) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            phone VARCHAR(50),
            customer_type VARCHAR(50) DEFAULT 'Individual',
            total_purchases DECIMAL(10,2) DEFAULT 0.00,
            credit_balance DECIMAL(10,2) DEFAULT 0.00,
            is_active TINYINT(1) DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        $pdo->exec($sql);
        echo "Created customers table\n";
        
        // Insert sample data
        $sampleData = [
            ['John', 'Doe', 'john@example.com', '+250-123-456-789', 'Individual'],
            ['Jane', 'Smith', 'jane@example.com', '+250-987-654-321', 'Business'],
            ['Mike', 'Johnson', 'mike@example.com', '+250-555-123-456', 'Individual']
        ];
        
        $stmt = $pdo->prepare("INSERT INTO customers (first_name, last_name, email, phone, customer_type) VALUES (?, ?, ?, ?, ?)");
        foreach ($sampleData as $data) {
            $stmt->execute($data);
        }
        echo "Inserted sample data\n";
    }
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
