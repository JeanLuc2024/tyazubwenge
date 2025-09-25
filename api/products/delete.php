<?php
/**
 * Products - Delete Endpoint
 * Soft deletes a product by setting is_active = 0
 */

require_once __DIR__ . '/../../config/api_config.php';

Auth::checkAuth();

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    APIResponse::error('Invalid JSON input');
}

$product_id = (int)($input['product_id'] ?? 0);

if ($product_id <= 0) {
    APIResponse::validationError(['product_id' => 'Valid product ID is required']);
}

try {
    // Check if product exists and is active
    $product = fetchOne("SELECT id, name FROM products WHERE id = ? AND is_active = 1", [$product_id]);
    
    if (!$product) {
        APIResponse::notFound('Product not found or already deleted');
    }
    
    // Soft delete the product
    $result = executeQuery("UPDATE products SET is_active = 0, updated_at = CURRENT_TIMESTAMP WHERE id = ?", [$product_id]);
    
    if ($result) {
        logError("Product soft deleted", ['product_id' => $product_id, 'product_name' => $product['name']]);
        APIResponse::success(['product_id' => $product_id], 'Product deleted successfully');
    } else {
        APIResponse::error('Failed to delete product');
    }
    
} catch (Exception $e) {
    logError("Error deleting product", ['product_id' => $product_id, 'error' => $e->getMessage()]);
    APIResponse::error('An error occurred while deleting the product');
}
?>
