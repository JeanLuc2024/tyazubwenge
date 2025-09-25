<?php
/**
 * Products - Create Endpoint
 */

require_once '../../config/api_config.php';

Auth::checkAuth();

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    APIResponse::error('Invalid JSON input');
}

// Validate required fields
$requiredFields = ['name', 'category_id', 'unit_type', 'quantity', 'unit_price'];
$errors = Validator::validateRequired($input, $requiredFields);

if (!empty($errors)) {
    APIResponse::validationError($errors);
}

// Validate numeric fields
if (!Validator::validateNumeric($input['quantity'])) {
    $errors['quantity'] = 'Quantity must be a valid positive number';
}
if (!Validator::validateNumeric($input['unit_price'])) {
    $errors['unit_price'] = 'Unit price must be a valid positive number';
}

if (!empty($errors)) {
    APIResponse::validationError($errors);
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

// Generate SKU if not provided
$sku = $input['sku'] ?? generateSKU($input['name'], $input['category_id']);

// Check if SKU already exists
$existingSku = fetchOne("SELECT id FROM products WHERE sku = ?", [$sku]);
if ($existingSku) {
    $sku = generateSKU($input['name'], $input['category_id']) . '-' . time();
}

// Prepare data
$data = [
    'name' => sanitizeInput($input['name']),
    'description' => sanitizeInput($input['description'] ?? ''),
    'category_id' => (int)$input['category_id'],
    'sku' => $sku,
    'unit_type' => $input['unit_type'],
    'quantity' => (int)$input['quantity'],
    'unit_price' => (float)$input['unit_price'],
    'expiry_date' => !empty($input['expiry_date']) ? $input['expiry_date'] : null,
    'supplier_id' => !empty($input['supplier_id']) ? (int)$input['supplier_id'] : null,
    'image_url' => sanitizeInput($input['image_url'] ?? '')
];

try {
    beginTransaction();
    
    // Insert product
    $sql = "INSERT INTO products (name, description, category_id, sku, unit_type, quantity, 
            unit_price, expiry_date, supplier_id, image_url) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $params = [
        $data['name'], $data['description'], $data['category_id'], $data['sku'],
        $data['unit_type'], $data['quantity'], $data['unit_price'], 
        $data['expiry_date'], $data['supplier_id'], $data['image_url']
    ];
    
    $stmt = executeQuery($sql, $params);
    
    if (!$stmt) {
        rollback();
        APIResponse::error('Failed to create product');
    }
    
    $productId = getLastInsertId();
    
    // Add initial stock movement if quantity > 0
    if ($data['quantity'] > 0) {
        $movementSql = "INSERT INTO stock_movements (product_id, movement_type, quantity, reason, created_by) 
                       VALUES (?, 'in', ?, 'Initial stock', ?)";
        executeQuery($movementSql, [$productId, $data['quantity'], $_SESSION['admin_id']]);
    }
    
    // Check for expiry alerts if expiry date is set
    if ($data['expiry_date']) {
        $today = date('Y-m-d');
        $expiryDate = $data['expiry_date'];
        $daysUntilExpiry = (strtotime($expiryDate) - strtotime($today)) / (60 * 60 * 24);
        
        if ($daysUntilExpiry <= 30) {
            $alertSql = "INSERT INTO alerts (alert_type, product_id, message) 
                        VALUES ('expiry', ?, ?)";
            $message = "Product '{$data['name']}' will expire in " . ceil($daysUntilExpiry) . " days on {$expiryDate}";
            executeQuery($alertSql, [$productId, $message]);
        }
    }
    
    commit();
    
    // Get the created product with full details
    $product = fetchOne("SELECT p.*, c.name as category_name, s.name as supplier_name 
                        FROM products p 
                        LEFT JOIN categories c ON p.category_id = c.id 
                        LEFT JOIN suppliers s ON p.supplier_id = s.id 
                        WHERE p.id = ?", [$productId]);
    
    APIResponse::success($product, 'Product created successfully', 201);
    
} catch (Exception $e) {
    rollback();
    logError('Product creation failed', ['error' => $e->getMessage(), 'data' => $data]);
    APIResponse::error('Failed to create product: ' . $e->getMessage());
}
?>

