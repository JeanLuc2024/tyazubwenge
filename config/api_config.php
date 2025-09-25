<?php
/**
 * Tyazubwenge Training Center - API Configuration
 * Laboratory Management System
 */

// Enable CORS for frontend integration
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json; charset=utf-8');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Include database configuration
require_once 'database.php';

// Set up database connection variables for compatibility
$host = 'localhost';
$db_name = 'tyazubwenge_lab';
$username = 'root';
$password = '';
$dsn = "mysql:host={$host};dbname={$db_name};charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

// API Response helper class
class APIResponse {
    public static function success($data = null, $message = 'Success', $code = 200) {
        http_response_code($code);
        echo json_encode([
            'success' => true,
            'message' => $message,
            'data' => $data,
            'timestamp' => date('Y-m-d H:i:s')
        ]);
        exit();
    }
    
    public static function error($message = 'Error', $code = 400, $data = null) {
        http_response_code($code);
        echo json_encode([
            'success' => false,
            'message' => $message,
            'data' => $data,
            'timestamp' => date('Y-m-d H:i:s')
        ]);
        exit();
    }
    
    public static function unauthorized($message = 'Unauthorized access') {
        self::error($message, 401);
    }
    
    public static function notFound($message = 'Resource not found') {
        self::error($message, 404);
    }
    
    public static function validationError($errors, $message = 'Validation failed') {
        self::error($message, 422, ['errors' => $errors]);
    }
}

// Authentication helper class
class Auth {
    public static function checkAuth() {
        // Check for admin session
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            APIResponse::unauthorized('Please login to access this resource');
        }
    }
    
    public static function login($email, $password) {
        $sql = "SELECT id, name, email, password, role FROM users WHERE email = ? AND is_active = 1";
        $user = fetchOne($sql, [$email]);
        
        if ($user) {
            // Check if password is hashed or plain text (for testing)
            $passwordValid = false;
            if (password_get_info($user['password'])['algo'] !== null) {
                // Password is hashed
                $passwordValid = password_verify($password, $user['password']);
            } else {
                // Password is plain text (for testing)
                $passwordValid = ($password === $user['password']);
            }
            
            if ($passwordValid) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_name'] = $user['name'];
                $_SESSION['admin_email'] = $user['email'];
                $_SESSION['admin_role'] = $user['role'];
                
                return [
                    'success' => true,
                    'user' => [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'role' => $user['role']
                    ]
                ];
            }
        }
        
        return ['success' => false, 'message' => 'Invalid credentials'];
    }
    
    public static function logout() {
        session_destroy();
        return ['success' => true, 'message' => 'Logged out successfully'];
    }
    
    public static function getCurrentUser() {
        if (isset($_SESSION['admin_id'])) {
            return [
                'id' => $_SESSION['admin_id'],
                'name' => $_SESSION['admin_name'],
                'email' => $_SESSION['admin_email'],
                'role' => $_SESSION['admin_role']
            ];
        }
        return null;
    }
}

// Input validation helper
class Validator {
    public static function validateRequired($data, $fields) {
        $errors = [];
        foreach ($fields as $field) {
            if (!isset($data[$field]) || empty(trim($data[$field]))) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }
        return $errors;
    }
    
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    public static function validateNumeric($value) {
        return is_numeric($value) && $value >= 0;
    }
    
    public static function validateDate($date) {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }
}

// Utility functions
function sanitizeInput($data) {
    if (is_array($data)) {
        return array_map('sanitizeInput', $data);
    }
    return htmlspecialchars(strip_tags(trim($data)));
}

function generateSaleNumber() {
    return 'SALE-' . date('Ymd') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
}

function generateSKU($name, $categoryId) {
    $prefix = strtoupper(substr($name, 0, 3));
    $category = str_pad($categoryId, 2, '0', STR_PAD_LEFT);
    $random = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
    return $prefix . '-' . $category . '-' . $random;
}

// Error logging
function logError($message, $context = []) {
    $log = [
        'timestamp' => date('Y-m-d H:i:s'),
        'message' => $message,
        'context' => $context,
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
    ];
    
    error_log('TYAZUBWENGE ERROR: ' . json_encode($log));
}

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>



