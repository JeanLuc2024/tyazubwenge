<?php
/**
 * Tyazubwenge Training Center - Database Configuration
 * Laboratory Management System
 */

class Database {
    private $host = 'localhost';
    private $db_name = 'tyazubwenge_lab';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function getConnection() {
        $this->conn = null;
        
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        
        return $this->conn;
    }
}

// Global database connection function
function getDB() {
    static $db = null;
    if ($db === null) {
        $database = new Database();
        $db = $database->getConnection();
    }
    return $db;
}

// Helper function to execute queries safely
function executeQuery($sql, $params = []) {
    try {
        $db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    } catch(PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

// Helper function to fetch single row
function fetchOne($sql, $params = []) {
    $stmt = executeQuery($sql, $params);
    return $stmt ? $stmt->fetch() : false;
}

// Helper function to fetch all rows
function fetchAll($sql, $params = []) {
    $stmt = executeQuery($sql, $params);
    return $stmt ? $stmt->fetchAll() : [];
}

// Helper function to get last insert ID
function getLastInsertId() {
    $db = getDB();
    return $db->lastInsertId();
}

// Helper function to begin transaction
function beginTransaction() {
    $db = getDB();
    return $db->beginTransaction();
}

// Helper function to commit transaction
function commit() {
    $db = getDB();
    return $db->commit();
}

// Helper function to rollback transaction
function rollback() {
    $db = getDB();
    return $db->rollBack();
}
?>





