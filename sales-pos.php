<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratory Products POS - Tyazubwenge Management</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            height: 100%;
        }
        .product-card:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }
        .product-image {
            text-align: center;
            margin-bottom: 10px;
        }
        .product-info h6 {
            font-weight: 600;
            margin-bottom: 5px;
        }
        .product-sku {
            font-size: 12px;
            color: #666;
            margin-bottom: 5px;
        }
        .product-price {
            font-weight: 600;
            color: #28a745;
            margin-bottom: 5px;
        }
        .dashboard-card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .cart-item {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }
        .cart-item:last-child {
            border-bottom: none;
        }
        .item-total {
            font-weight: 600;
            color: #28a745;
        }
        .product-card-disabled {
            filter: grayscale(100%);
            opacity: 0.6;
            cursor: not-allowed;
        }
    </style>
</head>
<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            <?php 
                require_once 'config/database.php';
                $products = fetchAll("SELECT * FROM products WHERE is_active = 1");
            ?>
            <?php include 'includes/sidebar.php'; ?>

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include 'includes/topbar.php'; ?>

                <!-- Page Content -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Laboratory Products Point of Sale (POS)</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Product Search & Selection -->
                            <div class="col-md-8">
                                <div class="dashboard-card">
                                    <h4>Laboratory Products Selection</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="Search by name, SKU, batch, or barcode...">
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control">
                                                <option>All Categories</option>
                                                <option>Chemical Reagents</option>
                                                <option>Laboratory Equipment</option>
                                                <option>Measuring Instruments</option>
                                                <option>Safety Equipment</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-primary btn-block">
                                                <i class="fa fa-search"></i> Search
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Product Grid -->
                                    <div class="row">
                                        <?php foreach ($products as $product): ?>
                                        <div class="col-md-3 mb-3">
                                            <?php 
                                                $is_out_of_stock = $product['quantity'] <= 0;
                                                $card_class = $is_out_of_stock ? 'product-card-disabled' : '';
                                                $onclick_action = $is_out_of_stock ? '' : 'onclick=\'addToCart(' . htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') . ')\'';
                                            ?>
                                            <div class="product-card <?php echo $card_class; ?>" <?php echo $onclick_action; ?>>
                                                <div class="product-image">
                                                    <i class="fa fa-flask fa-3x text-primary"></i>
                                                </div>
                                                <div class="product-info">
                                                    <h6><?php echo htmlspecialchars($product['name']); ?></h6>
                                                    <p class="product-sku">SKU: <?php echo htmlspecialchars($product['sku']); ?></p>
                                                    <p class="product-price">₦<?php echo number_format($product['unit_price'], 2); ?>/<?php echo htmlspecialchars($product['unit_type']); ?></p>
                                                    <?php if ($is_out_of_stock): ?>
                                                        <span class="badge badge-danger">Out of Stock</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-success">In Stock: <?php echo htmlspecialchars($product['quantity']); ?> <?php echo htmlspecialchars($product['unit_type']); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Shopping Cart -->
                            <div class="col-md-4">
                                <div class="dashboard-card">
                                    <h4>Shopping Cart</h4>
                                    <div id="cart-items">
                                        <!-- Cart items will be populated here -->
                                    </div>
                                    
                                    <div class="cart-summary">
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <strong>Subtotal:</strong>
                                            <span id="subtotal">₦0</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <strong>Discount:</strong>
                                            <span id="discount">₦0</span>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <strong>Total:</strong>
                                            <span id="total">₦0</span>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-success btn-block btn-lg" onclick="processPayment()">
                                            <i class="fa fa-credit-card"></i> Process Payment
                                        </button>
                                        <button class="btn btn-secondary btn-block" onclick="clearCart()">
                                            <i class="fa fa-trash"></i> Clear Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        let cart = [];
        let cartTotal = 0;

        function addToCart(product) {
            if (product.quantity <= 0) {
                alert('This product is out of stock and cannot be sold.');
                return;
            }

            const existingItem = cart.find(item => item.id === product.id);
            
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({ ...product, quantity: 1 });
            }
            
            updateCartDisplay();
        }

        function removeFromCart(productId) {
            cart = cart.filter(item => item.id !== productId);
            updateCartDisplay();
        }

        function updateCartDisplay() {
            const cartItems = document.getElementById('cart-items');
            cartTotal = 0;
            
            if (cart.length === 0) {
                cartItems.innerHTML = '<p class="text-muted">Cart is empty</p>';
            } else {
                cartItems.innerHTML = cart.map(item => {
                    const itemTotal = item.unit_price * item.quantity;
                    cartTotal += itemTotal;
                    return `
                        <div class="cart-item d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <h6 class="mb-0">${item.name}</h6>
                                <small class="text-muted">${item.sku} | ${item.unit_type}</small>
                                <div class="input-group input-group-sm mt-1">
                                    <button class="btn btn-outline-secondary" onclick="updateQuantity(${item.id}, -1)">-</button>
                                    <input type="number" class="form-control text-center" value="${item.quantity}" min="1" step="1" onchange="setQuantity(${item.id}, this.value)">
                                    <button class="btn btn-outline-secondary" onclick="updateQuantity(${item.id}, 1)">+</button>
                                </div>
                                <small class="text-muted">₦${parseFloat(item.unit_price).toLocaleString()}/${item.unit_type}</small>
                            </div>
                            <div class="text-right">
                                <div class="item-total">₦${itemTotal.toLocaleString()}</div>
                                <button class="btn btn-sm btn-outline-danger" onclick="removeFromCart(${item.id})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    `;
                }).join('');
            }
            
            const subtotal = cartTotal;
            const discount = 0;
            const total = subtotal - discount;
            
            document.getElementById('subtotal').textContent = `₦${subtotal.toLocaleString()}`;
            document.getElementById('discount').textContent = `₦${discount.toLocaleString()}`;
            document.getElementById('total').textContent = `₦${total.toLocaleString()}`;
        }

        function updateQuantity(productId, change) {
            const item = cart.find(item => item.id === productId);
            if (item) {
                item.quantity = Math.max(1, item.quantity + change);
                updateCartDisplay();
            }
        }

        function setQuantity(productId, quantity) {
            const item = cart.find(item => item.id === productId);
            if (item) {
                item.quantity = Math.max(1, parseInt(quantity));
                updateCartDisplay();
            }
        }

        function clearCart() {
            cart = [];
            updateCartDisplay();
        }

        function processPayment() {
            if (cart.length === 0) {
                alert('Cart is empty!');
                return;
            }

            const saleData = {
                customer_name: 'POS Customer',
                items: cart.map(item => ({
                    product_id: item.id,
                    quantity: item.quantity,
                    unit_price: item.unit_price
                }))
            };

            $.ajax({
                url: 'api/sales/create.php',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(saleData),
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Payment processed successfully!');
                        clearCart();
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('An error occurred while processing the payment.');
                }
            });
        }
    </script>
</body>
</html>


