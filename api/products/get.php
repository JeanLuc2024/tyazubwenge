<?php
require_once __DIR__ . '/../../config/api_config.php';

Auth::checkAuth();

if (!isset($_GET['id'])) {
    APIResponse::error('Product ID is required.');
    exit;
}

$productId = (int)$_GET['id'];

$product = fetchOne("SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.id = ?", [$productId]);

if ($product) {
    APIResponse::success($product);
} else {
    APIResponse::error('Product not found.');
}
