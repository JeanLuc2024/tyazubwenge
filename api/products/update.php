<?php
/**
 * Products - Update Endpoint
 */

Auth::checkAuth();

$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['id'])) {
    APIResponse::error('Product ID is required');
}

$productId = (int)$input['id'];

// Check if product exists
$existingProduct = fetchOne("SELECT * FROM products WHERE id = ? AND is_active = 1", [$productId]);
if (!$existingProduct) {
    APIResponse::notFound('Product not found');
}

// Validate required fields
$requiredFields = ['name', 'category_id', 'unit_type', 'cost_price', 'selling_price', 'min_stock_level'];
$errors = Validator::validateRequired($input, $requiredFields);

if (!empty($errors)) {
    APIResponse::validationError($errors);
}

// Validate numeric fields
if (!Validator::validateNumeric($input['cost_price'])) {
    $errors['cost_price'] = 'Cost price must be a valid positive number';
}
if (!Validator::validateNumeric($input['selling_price'])) {
    $errors['selling_price'] = 'Selling price must be a valid positive number';
}
if (!Validator::validateNumeric($input['min_stock_level'])) {
    $errors['min_stock_level'] = 'Minimum stock level must be a valid positive number';
}

if (!empty($errors)) {
    APIResponse::validationError($errors);
}

// Validate selling price is higher than cost price
if ($input['selling_price'] <= $input['cost_price']) {
    APIResponse::validationError(['selling_price' => 'Selling price must be higher than cost price']);
}

// Validate category exists
$category = fetchOne("SELECT id FROM categories WHERE id = ? AND is_active = 1", [$input['category_id']]);
if (!$category) {
    APIResponse::validationError(['category_id' => 'Invalid category selected']);
}

// Validate supplier if provided
if (!empty($input['supplier_id'])) {
    $supplier = fetchOne("SELECT id FROM suppliers WHERE id = ? AND is_active = 1", [$input['supplier_id']]);
    if (!$supplier) {
        APIResponse::validationError(['supplier_id' => 'Invalid supplier selected']);
    }
}

// Check SKU uniqueness if changed
if (isset($input['sku']) && $input['sku'] !== $existingProduct['sku']) {
    $existingSku = fetchOne("SELECT id FROM products WHERE sku = ? AND id != ?", [$input['sku'], $productId]);
    if ($existingSku) {
        APIResponse::validationError(['sku' => 'SKU already exists']);
    }
}

try {
    beginTransaction();
    
    // Update product
    $sql = "UPDATE products SET 
            name = ?, description = ?, category_id = ?, sku = ?, unit_type = ?, 
            cost_price = ?, selling_price = ?, min_stock_level = ?, 
            current_stock = ?, expiry_date = ?, supplier_id = ?, image_url = ?,
            updated_at = CURRENT_TIMESTAMP
            WHERE id = ?";
    
    $params = [
        sanitizeInput($input['name']),
        sanitizeInput($input['description'] ?? ''),
        (int)$input['category_id'],
        sanitizeInput($input['sku'] ?? $existingProduct['sku']),
        $input['unit_type'],
        (float)$input['cost_price'],
        (float)$input['selling_price'],
        (int)$input['min_stock_level'],
        (int)($input['current_stock'] ?? $existingProduct['current_stock']),
        !empty($input['expiry_date']) ? $input['expiry_date'] : null,
        !empty($input['supplier_id']) ? (int)$input['supplier_id'] : null,
        sanitizeInput($input['image_url'] ?? ''),
        $productId
    ];
    
    $stmt = executeQuery($sql, $params);
    
    if (!$stmt) {
        rollback();
        APIResponse::error('Failed to update product');
    }
    
    // Check for low stock alert
    $newStock = (int)($input['current_stock'] ?? $existingProduct['current_stock']);
    $newMinLevel = (int)$input['min_stock_level'];
    
    if ($newStock <= $newMinLevel) {
        // Check if alert already exists
        $existingAlert = fetchOne("SELECT id FROM alerts WHERE product_id = ? AND alert_type = 'low_stock' AND is_resolved = 0", [$productId]);
        
        if (!$existingAlert) {
            $alertSql = "INSERT INTO alerts (alert_type, product_id, message) 
                        VALUES ('low_stock', ?, ?)";
            $message = "Low stock alert: {$input['name']} has only {$newStock} units remaining";
            executeQuery($alertSql, [$productId, $message]);
        }
    }
    
    // Check for expiry alert
    if (!empty($input['expiry_date'])) {
        $expiryDate = new DateTime($input['expiry_date']);
        $today = new DateTime();
        $daysUntilExpiry = $today->diff($expiryDate)->days;
        
        if ($daysUntilExpiry <= 30) {
            $existingExpiryAlert = fetchOne("SELECT id FROM alerts WHERE product_id = ? AND alert_type = 'expiry' AND is_resolved = 0", [$productId]);
            
            if (!$existingExpiryAlert) {
                $alertSql = "INSERT INTO alerts (alert_type, product_id, message) 
                            VALUES ('expiry', ?, ?)";
                $message = "Expiry warning: {$input['name']} expires in {$daysUntilExpiry} days";
                executeQuery($alertSql, [$productId, $message]);
            }
        }
    }
    
    commit();
    
    // Get updated product with full details
    $product = fetchOne("SELECT p.*, c.name as category_name, s.name as supplier_name 
                        FROM products p 
                        LEFT JOIN categories c ON p.category_id = c.id 
                        LEFT JOIN suppliers s ON p.supplier_id = s.id 
                        WHERE p.id = ?", [$productId]);
    
    APIResponse::success($product, 'Product updated successfully');
    
} catch (Exception $e) {
    rollback();
    logError('Product update failed', ['error' => $e->getMessage(), 'product_id' => $productId]);
    APIResponse::error('Failed to update product: ' . $e->getMessage());
}
?>



