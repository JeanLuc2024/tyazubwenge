<?php
/**
 * Sales - Create Endpoint
 * Creates a new sale with stock validation, updates, and profit calculations
 * 
 * Expected JSON:
 * {
 *   "customer_name": "string",
 *   "customer_email": "email or null",
 *   "customer_phone": "string or null", 
 *   "payment_method": "cash|card|transfer|credit",
 *   "discount": 0.0,
 *   "tax": 0.0,
 *   "items": [
 *     { "product_id": 12, "quantity": 500, "unit_price": 2500.00 }
 *   ]
 * }
 */

require_once __DIR__ . '/../../config/api_config.php';

Auth::checkAuth();

if (!isset($_SESSION['admin_id'])) {
    $_SESSION['admin_id'] = 1; // Default to admin user
}

// Handle both direct access and web access
$input_data = '';
if (isset($GLOBALS['mock_input'])) {
    $input_data = $GLOBALS['mock_input'];
} else {
    $input_data = file_get_contents('php://input');
}

$input = json_decode($input_data, true);

if (!$input) {
    APIResponse::error('Invalid JSON input');
}

// Validate required fields
$errors = Validator::validateRequired($input, ['customer_name', 'items']);
if (!empty($errors)) {
    APIResponse::validationError($errors);
}

$customer_name = sanitizeInput($input['customer_name']);
$customer_email = sanitizeInput($input['customer_email'] ?? '');
$customer_phone = sanitizeInput($input['customer_phone'] ?? '');
$payment_method = sanitizeInput($input['payment_method'] ?? 'cash');
$discount = (float)($input['discount'] ?? 0);
$tax = (float)($input['tax'] ?? 0);
$items = $input['items'] ?? [];

// Validate payment method
$valid_payment_methods = ['cash', 'card', 'transfer', 'credit'];
if (!in_array($payment_method, $valid_payment_methods)) {
    APIResponse::validationError(['payment_method' => 'Invalid payment method']);
}

// Validate items
if (!is_array($items) || empty($items)) {
    APIResponse::validationError(['items' => 'Items array is required and cannot be empty']);
}

// Validate each item
foreach ($items as $index => $item) {
    if (!isset($item['product_id']) || !isset($item['quantity'])) {
        APIResponse::validationError(["items[{$index}]" => 'product_id and quantity are required']);
    }
    
    if (!Validator::validateNumeric($item['quantity']) || $item['quantity'] <= 0) {
        APIResponse::validationError(["items[{$index}].quantity" => 'Quantity must be a positive number']);
    }
    
    if (isset($item['unit_price']) && (!Validator::validateNumeric($item['unit_price']) || $item['unit_price'] < 0)) {
        APIResponse::validationError(["items[{$index}].unit_price" => 'Unit price must be a non-negative number']);
    }
}

// Unit normalization helper
function normalizeQuantity($quantity, $from_unit, $to_unit) {
    $conversions = [
        'mg' => ['g' => 0.001, 'kg' => 0.000001],
        'g' => ['mg' => 1000, 'kg' => 0.001],
        'kg' => ['g' => 1000, 'mg' => 1000000],
        'ml' => ['L' => 0.001],
        'L' => ['ml' => 1000]
    ];
    
    if ($from_unit === $to_unit) return $quantity;
    if (!isset($conversions[$from_unit][$to_unit])) return $quantity;
    
    return $quantity * $conversions[$from_unit][$to_unit];
}

try {
    $db = getDB();
    $db->beginTransaction();
    
    // Validate all products and check stock
    $validated_items = [];
    $total_amount = 0;
    $total_cost = 0;
    
    foreach ($items as $item) {
        $product_id = (int)$item['product_id'];
        $quantity = (float)$item['quantity'];
        $unit_price = isset($item['unit_price']) ? (float)$item['unit_price'] : null;
        
        // Get product details
        $product = fetchOne("SELECT id, name, current_stock, cost_price, selling_price, min_stock_level, unit_type 
                           FROM products WHERE id = ? AND is_active = 1", [$product_id]);
        
        if (!$product) {
            $db->rollback();
            APIResponse::error("Product with ID {$product_id} not found or inactive");
        }
        
        // Check stock availability
        if ($quantity > $product['current_stock']) {
            $db->rollback();
            APIResponse::error("Insufficient stock for product '{$product['name']}'. Available: {$product['current_stock']}, Requested: {$quantity}");
        }
        
        // Use provided unit_price or product selling_price
        $final_unit_price = $unit_price !== null ? $unit_price : $product['selling_price'];
        
        // Calculate item totals
        $item_total = $final_unit_price * $quantity;
        $item_cost = $product['cost_price'] * $quantity;
        $item_profit = ($final_unit_price - $product['cost_price']) * $quantity;
        
        $validated_items[] = [
            'product_id' => $product_id,
            'product_name' => $product['name'],
            'quantity' => $quantity,
            'unit_price' => $final_unit_price,
            'total_price' => $item_total,
            'cost_price' => $product['cost_price'],
            'item_cost' => $item_cost,
            'item_profit' => $item_profit,
            'unit_type' => $product['unit_type'],
            'min_stock_level' => $product['min_stock_level'],
            'current_stock' => $product['current_stock']
        ];
        
        $total_amount += $item_total;
        $total_cost += $item_cost;
    }
    
    // Calculate final amount
    $final_amount = $total_amount - $discount + $tax;
    $total_profit = $total_amount - $total_cost;
    
    // Generate unique sale number
    $sale_number = 'S' . time() . rand(1000, 9999);
    
    // Create sale record
    $sale_sql = "INSERT INTO sales (sale_number, customer_name, customer_email, customer_phone, 
                  total_amount, discount, tax, final_amount, payment_method, payment_status, 
                  sale_date, created_by, created_at, updated_at) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending', CURRENT_TIMESTAMP, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
    
    $sale_result = executeQuery($sale_sql, [
        $sale_number, $customer_name, $customer_email, $customer_phone,
        $total_amount, $discount, $tax, $final_amount, $payment_method, $_SESSION['admin_id']
    ]);
    
    if (!$sale_result) {
        $db->rollback();
        APIResponse::error('Failed to create sale record');
    }
    
    $sale_id = getLastInsertId();
    
    // Process each item
    foreach ($validated_items as $item) {
        // Insert sale item
        $sale_item_sql = "INSERT INTO sale_items (sale_id, product_id, quantity, unit_price, total_price, profit, created_at) 
                         VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";
        
        $sale_item_result = executeQuery($sale_item_sql, [
            $sale_id, $item['product_id'], $item['quantity'], 
            $item['unit_price'], $item['total_price'], $item['item_profit']
        ]);
        
        if (!$sale_item_result) {
            $db->rollback();
            APIResponse::error('Failed to create sale item record');
        }
        
        // Update product stock
        $new_stock = $item['current_stock'] - $item['quantity'];
        $update_stock_sql = "UPDATE products SET current_stock = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $update_result = executeQuery($update_stock_sql, [$new_stock, $item['product_id']]);
        
        if (!$update_result) {
            $db->rollback();
            APIResponse::error('Failed to update product stock');
        }
        
        // Record stock movement
        $stock_movement_sql = "INSERT INTO stock_movements (product_id, movement_type, quantity, reason, 
                              reference_id, reference_type, created_by, created_at) 
                              VALUES (?, 'out', ?, 'Sale #{$sale_number}', ?, 'sale', ?, CURRENT_TIMESTAMP)";
        
        $movement_result = executeQuery($stock_movement_sql, [
            $item['product_id'], $item['quantity'], $sale_id, $_SESSION['admin_id']
        ]);
        
        if (!$movement_result) {
            $db->rollback();
            APIResponse::error('Failed to record stock movement');
        }
        
        // Check for low stock alert
        if ($new_stock <= $item['min_stock_level']) {
            $alert_message = "Low stock alert: {$item['product_name']} has {$new_stock} {$item['unit_type']} remaining (min: {$item['min_stock_level']})";
            
            $alert_sql = "INSERT INTO alerts (alert_type, product_id, message, is_read, is_resolved, created_at) 
                         VALUES ('low_stock', ?, ?, 0, 0, CURRENT_TIMESTAMP)";
            
            executeQuery($alert_sql, [$item['product_id'], $alert_message]);
        }
    }
    
    // Commit transaction
    $db->commit();
    
    // Log successful sale
    logError("Sale created successfully", [
        'sale_id' => $sale_id,
        'sale_number' => $sale_number,
        'customer_name' => $customer_name,
        'total_amount' => $total_amount,
        'final_amount' => $final_amount
    ]);
    
    $response = [
        'sale_id' => $sale_id,
        'sale_number' => $sale_number,
        'totals' => [
            'total_amount' => $total_amount,
            'total_cost' => $total_cost,
            'final_amount' => $final_amount,
            'total_profit' => $total_profit
        ]
    ];
    
    APIResponse::success($response, 'Sale created successfully', 201);
    
} catch (Exception $e) {
    if (isset($db)) {
        $db->rollback();
    }
    logError("Error creating sale", ['error' => $e->getMessage(), 'input' => $input]);
    APIResponse::error('An error occurred while creating the sale');
}
?>
