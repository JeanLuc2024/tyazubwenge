<?php
/**
 * Categories - Create Endpoint
 * Creates a new product category
 */

require_once __DIR__ . '/../../config/api_config.php';

Auth::checkAuth();

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    APIResponse::error('Invalid JSON input');
}

// Validate required fields
$errors = Validator::validateRequired($input, ['name']);
if (!empty($errors)) {
    APIResponse::validationError($errors);
}

$name = sanitizeInput($input['name']);
$description = sanitizeInput($input['description'] ?? '');

// Check if category name already exists
$existing = fetchOne("SELECT id FROM categories WHERE name = ? AND is_active = 1", [$name]);
if ($existing) {
    APIResponse::validationError(['name' => 'Category name already exists']);
}

try {
    $sql = "INSERT INTO categories (name, description, is_active, created_at, updated_at) 
            VALUES (?, ?, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
    
    $result = executeQuery($sql, [$name, $description]);
    
    if ($result) {
        $category_id = getLastInsertId();
        
        // Fetch the created category
        $category = fetchOne("SELECT * FROM categories WHERE id = ?", [$category_id]);
        
        logError("Category created", ['category_id' => $category_id, 'name' => $name]);
        APIResponse::success($category, 'Category created successfully', 201);
    } else {
        APIResponse::error('Failed to create category');
    }
    
} catch (Exception $e) {
    logError("Error creating category", ['name' => $name, 'error' => $e->getMessage()]);
    APIResponse::error('An error occurred while creating the category');
}
?>
