<?php
/**
 * Products - Stock Update Endpoint
 */

Auth::checkAuth();

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    APIResponse::error('Invalid JSON input');
}

// Validate required fields
$requiredFields = ['product_id', 'movement_type', 'quantity'];
$errors = Validator::validateRequired($input, $requiredFields);

if (!empty($errors)) {
    APIResponse::validationError($errors);
}

$productId = (int)$input['product_id'];
$movementType = $input['movement_type'];
$quantity = (int)$input['quantity'];
$reason = sanitizeInput($input['reason'] ?? 'Stock adjustment');

// Validate movement type
$validTypes = ['in', 'out', 'adjustment', 'expired'];
if (!in_array($movementType, $validTypes)) {
    APIResponse::validationError(['movement_type' => 'Invalid movement type']);
}

// Validate quantity
if ($quantity <= 0) {
    APIResponse::validationError(['quantity' => 'Quantity must be greater than 0']);
}

// Check if product exists
$product = fetchOne("SELECT * FROM products WHERE id = ? AND is_active = 1", [$productId]);
if (!$product) {
    APIResponse::notFound('Product not found');
}

// Calculate new stock level
$currentStock = $product['current_stock'];
$newStock = $currentStock;

switch ($movementType) {
    case 'in':
        $newStock += $quantity;
        break;
    case 'out':
        $newStock -= $quantity;
        if ($newStock < 0) {
            APIResponse::validationError(['quantity' => 'Insufficient stock. Available: ' . $currentStock]);
        }
        break;
    case 'adjustment':
        $newStock = $quantity;
        break;
    case 'expired':
        $newStock -= $quantity;
        if ($newStock < 0) {
            $newStock = 0;
        }
        break;
}

try {
    beginTransaction();
    
    // Update product stock
    $updateSql = "UPDATE products SET current_stock = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
    $updateStmt = executeQuery($updateSql, [$newStock, $productId]);
    
    if (!$updateStmt) {
        rollback();
        APIResponse::error('Failed to update stock');
    }
    
    // Record stock movement
    $movementSql = "INSERT INTO stock_movements (product_id, movement_type, quantity, reason, created_by) 
                   VALUES (?, ?, ?, ?, ?)";
    $movementStmt = executeQuery($movementSql, [
        $productId, 
        $movementType, 
        $quantity, 
        $reason, 
        $_SESSION['admin_id']
    ]);
    
    if (!$movementStmt) {
        rollback();
        APIResponse::error('Failed to record stock movement');
    }
    
    // Check for low stock alert
    if ($newStock <= $product['min_stock_level']) {
        $existingAlert = fetchOne("SELECT id FROM alerts WHERE product_id = ? AND alert_type = 'low_stock' AND is_resolved = 0", [$productId]);
        
        if (!$existingAlert) {
            $alertSql = "INSERT INTO alerts (alert_type, product_id, message) 
                        VALUES ('low_stock', ?, ?)";
            $message = "Low stock alert: {$product['name']} has only {$newStock} units remaining";
            executeQuery($alertSql, [$productId, $message]);
        }
    }
    
    // If stock is now 0, create out of stock alert
    if ($newStock == 0) {
        $existingOutOfStockAlert = fetchOne("SELECT id FROM alerts WHERE product_id = ? AND alert_type = 'low_stock' AND is_resolved = 0", [$productId]);
        
        if (!$existingOutOfStockAlert) {
            $alertSql = "INSERT INTO alerts (alert_type, product_id, message) 
                        VALUES ('low_stock', ?, ?)";
            $message = "Out of stock: {$product['name']} is now out of stock";
            executeQuery($alertSql, [$productId, $message]);
        }
    }
    
    commit();
    
    // Get updated product details
    $updatedProduct = fetchOne("SELECT p.*, c.name as category_name 
                               FROM products p 
                               LEFT JOIN categories c ON p.category_id = c.id 
                               WHERE p.id = ?", [$productId]);
    
    $response = [
        'product' => $updatedProduct,
        'stock_change' => [
            'previous_stock' => $currentStock,
            'new_stock' => $newStock,
            'change' => $newStock - $currentStock,
            'movement_type' => $movementType
        ]
    ];
    
    APIResponse::success($response, 'Stock updated successfully');
    
} catch (Exception $e) {
    rollback();
    logError('Stock update failed', ['error' => $e->getMessage(), 'product_id' => $productId]);
    APIResponse::error('Failed to update stock: ' . $e->getMessage());
}
?>



