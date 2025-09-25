<?php
// Check if training_programs table exists
try {
    $pdo = new PDO("mysql:host=localhost;dbname=tyazubwenge_lab;charset=utf8mb4", 'root', '');
    
    // Check training_programs table
    $stmt = $pdo->query("SHOW TABLES LIKE 'training_programs'");
    $result = $stmt->fetch();
    
    if ($result) {
        echo "training_programs table exists\n";
        
        // Check structure
        $stmt = $pdo->query("DESCRIBE training_programs");
        $columns = $stmt->fetchAll();
        echo "Columns:\n";
        foreach ($columns as $column) {
            echo "- " . $column['Field'] . " (" . $column['Type'] . ")\n";
        }
        
        // Check count
        $stmt = $pdo->query("SELECT COUNT(*) as count FROM training_programs");
        $count = $stmt->fetch();
        echo "Records: " . $count['count'] . "\n";
        
    } else {
        echo "training_programs table does NOT exist\n";
        
        // Create it
        $sql = "CREATE TABLE training_programs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            duration_hours INT NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            max_students INT DEFAULT 20,
            is_active TINYINT(1) DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        $pdo->exec($sql);
        echo "Created training_programs table\n";
    }
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
