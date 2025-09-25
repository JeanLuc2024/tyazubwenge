<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratory Products Inventory - Tyazubwenge Management</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/custom.css" />
</head>
<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            <?php 
                require_once 'config/database.php';
                $products = fetchAll("SELECT p.*, c.name as category_name FROM products p JOIN categories c ON p.category_id = c.id ORDER BY p.id DESC");
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
                                    <h2>Laboratory Products Inventory Management</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="dashboard-card">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4>Laboratory Products Inventory</h4>
                                        <div>
                                            <button class="btn btn-primary btn-modern mr-2" data-toggle="modal" data-target="#addProductModal">
                                                <i class="fa fa-plus"></i> Add Laboratory Product
                                            </button>
                                            <button class="btn btn-warning btn-modern mr-2" onclick="openUnitConversion()">
                                                <i class="fa fa-exchange"></i> Unit Conversion
                                            </button>
                                            <button class="btn btn-success btn-modern" onclick="printInventory()">
                                                <i class="fa fa-print"></i> Print Inventory
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Filters -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="dashboard-card">
                                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Search Laboratory Product</label>
                                <input type="text" class="form-control" placeholder="Search by name, SKU, batch, or category">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Product Category</label>
                                <select class="form-control">
                                    <option>All Categories</option>
                                    <option>Chemical Reagents</option>
                                    <option>Laboratory Equipment</option>
                                    <option>Measuring Instruments</option>
                                    <option>Safety Equipment</option>
                                    <option>Glassware</option>
                                    <option>Consumables</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Stock Status</label>
                                <select class="form-control">
                                    <option>All</option>
                                    <option>In Stock</option>
                                    <option>Low Stock</option>
                                    <option>Expiring Soon</option>
                                    <option>Out of Stock</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Unit Type</label>
                                <select class="form-control">
                                    <option>All Units</option>
                                    <option>kg (Kilograms)</option>
                                    <option>g (Grams)</option>
                                    <option>mg (Milligrams)</option>
                                    <option>pieces</option>
                                    <option>liters</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button class="btn btn-primary btn-block">Filter Products</button>
                            </div>
                        </div>
                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Inventory Table -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dashboard-card">
                                    <div class="table-responsive">
                                        <table class="table table-modern">
                                            <thead>
                                                <tr>
                                                    <th>SKU</th>
                                                    <th>Product Name</th>
                                                    <th>Category</th>
                                                    <th>Current Stock</th>
                                                    <th>Unit</th>
                                                    <th>Batch/Lot</th>
                                                    <th>Expiry Date</th>
                                                    <th>Unit Price</th>
                                                    <th>Total Value</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($products as $product): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($product['sku']); ?></td>
                                                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                                                    <td><?php echo htmlspecialchars($product['category_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($product['quantity']); ?></td>
                                                    <td><?php echo htmlspecialchars($product['unit_type']); ?></td>
                                                    <td><?php echo 'N/A'; ?></td>
                                                    <td><?php echo htmlspecialchars($product['expiry_date'] ? date('Y-m-d', strtotime($product['expiry_date'])) : 'N/A'); ?></td>
                                                    <td>₦<?php echo number_format($product['unit_price'], 2); ?></td>
                                                    <td>₦<?php echo number_format($product['quantity'] * $product['unit_price'], 2); ?></td>
                                                    <td>
                                                        <?php 
                                                            $status = 'In Stock';
                                                            $badge = 'success';
                                                            if ($product['quantity'] == 0) {
                                                                $status = 'Out of Stock';
                                                                $badge = 'danger';
                                                            } elseif ($product['quantity'] < 5) { // Assuming low stock is less than 5
                                                                $status = 'Low Stock';
                                                                $badge = 'warning';
                                                            }
                                                            echo "<span class='badge badge-{$badge}'>{$status}</span>";
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary" onclick="editProduct(<?php echo $product['id']; ?>)">Edit</button>
                                                        <button class="btn btn-sm btn-outline-info" onclick="viewProduct(<?php echo $product['id']; ?>)">View</button>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Laboratory Product</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Product Name *</label>
                                    <input type="text" class="form-control" placeholder="e.g., Sodium Chloride (Pure Grade)" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category *</label>
                                    <select class="form-control" required>
                                        <option>Chemical Reagents</option>
                                        <option>Laboratory Equipment</option>
                                        <option>Measuring Instruments</option>
                                        <option>Safety Equipment</option>
                                        <option>Glassware</option>
                                        <option>Consumables</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Unit Type *</label>
                                    <select class="form-control" required>
                                        <option>kg (Kilograms)</option>
                                        <option>g (Grams)</option>
                                        <option>mg (Milligrams)</option>
                                        <option>ml (Milliliters)</option>
                                        <option>l (Liters)</option>
                                        <option>pieces</option>
                                        <option>sets</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Current Stock *</label>
                                    <input type="number" step="0.001" class="form-control" placeholder="e.g., 2.5" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Unit Price (RWF) *</label>
                                    <input type="number" step="0.01" class="form-control" placeholder="e.g., 1200.00" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Minimum Stock Level</label>
                                    <input type="number" step="0.001" class="form-control" placeholder="e.g., 1.0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expiry Date</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Batch/Lot Number</label>
                                    <input type="text" class="form-control" placeholder="e.g., LOT-SC-2024-15">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Storage Location</label>
                                    <input type="text" class="form-control" placeholder="e.g., Shelf A-3, Room 101">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control" rows="3" placeholder="Detailed description of the laboratory product..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Product</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm">
                        <input type="hidden" id="editProductId" name="id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" id="editProductName" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" id="editProductSku" name="sku">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" id="editProductCategory" name="category_id">
                                        <?php
                                            $categories = fetchAll("SELECT * FROM categories");
                                            foreach ($categories as $category) {
                                                echo "<option value='{$category['id']}'>{$category['name']}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select class="form-control" id="editProductUnit" name="unit_type">
                                        <option>pieces</option>
                                        <option>kg</option>
                                        <option>g</option>
                                        <option>mg</option>
                                        <option>L</option>
                                        <option>ml</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stock Quantity</label>
                                    <input type="number" class="form-control" id="editProductQuantity" name="quantity">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Price per Unit</label>
                                    <input type="number" class="form-control" id="editProductPrice" name="unit_price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expiry Date</label>
                                    <input type="date" class="form-control" id="editProductExpiry" name="expiry_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Batch/Lot Number</label>
                                    <input type="text" class="form-control" value="LOT-2024-001">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Storage Location</label>
                            <input type="text" class="form-control" value="Shelf A-1">
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control" rows="3" id="editProductDescription" name="description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveEditProduct()">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Product Modal -->
    <div class="modal fade" id="viewProductModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Product Details</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="viewProductContent">
                    <!-- Content will be populated by JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="editProductFromView()">Edit Product</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        // Check authentication
        if (!localStorage.getItem('adminLoggedIn') && !sessionStorage.getItem('adminLoggedIn')) {
            window.location.href = 'login.php';
        }
        
        // Sidebar toggle
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
        
        // Unit Conversion function
        function openUnitConversion() {
            const conversionModal = `
                <div class="modal fade" id="unitConversionModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Unit Conversion Calculator</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>From Value</label>
                                            <input type="number" class="form-control" id="fromValue" placeholder="Enter value">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>From Unit</label>
                                            <select class="form-control" id="fromUnit">
                                                <option value="mg">mg (Milligrams)</option>
                                                <option value="g">g (Grams)</option>
                                                <option value="kg">kg (Kilograms)</option>
                                                <option value="ml">ml (Milliliters)</option>
                                                <option value="l">L (Liters)</option>
                                                <option value="dal">dal (Decaliters)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>To Unit</label>
                                            <select class="form-control" id="toUnit">
                                                <option value="mg">mg (Milligrams)</option>
                                                <option value="g">g (Grams)</option>
                                                <option value="kg">kg (Kilograms)</option>
                                                <option value="ml">ml (Milliliters)</option>
                                                <option value="l">L (Liters)</option>
                                                <option value="dal">dal (Decaliters)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" onclick="calculateConversion()">Convert</button>
                                        <div id="conversionResult" class="mt-3" style="display: none;">
                                            <h5>Result: <span id="resultValue"></span> <span id="resultUnit"></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            // Remove existing modal if any
            const existingModal = document.getElementById('unitConversionModal');
            if (existingModal) {
                existingModal.remove();
            }
            
            // Add modal to body
            document.body.insertAdjacentHTML('beforeend', conversionModal);
            
            // Show modal
            $('#unitConversionModal').modal('show');
        }
        
        // Calculate conversion
        function viewProduct(productId) {
            $.ajax({
                url: `api/products/get.php?id=${productId}`,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        const product = response.data;
                        const content = `
                            <p><strong>SKU:</strong> ${product.sku}</p>
                            <p><strong>Name:</strong> ${product.name}</p>
                            <p><strong>Category:</strong> ${product.category_name}</p>
                            <p><strong>Quantity:</strong> ${product.quantity} ${product.unit_type}</p>
                            <p><strong>Unit Price:</strong> ₦${parseFloat(product.unit_price).toFixed(2)}</p>
                            <p><strong>Expiry Date:</strong> ${product.expiry_date || 'N/A'}</p>
                            <p><strong>Description:</strong> ${product.description || 'N/A'}</p>
                        `;
                        $('#viewProductContent').html(content);
                        $('#viewProductModal').modal('show');
                    } else {
                        alert(response.message);
                    }
                }
            });
        }

        function editProduct(productId) {
            $.ajax({
                url: `api/products/get.php?id=${productId}`,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        const product = response.data;
                        $('#editProductModal #editProductId').val(product.id);
                        $('#editProductModal #editProductName').val(product.name);
                        $('#editProductModal #editProductSku').val(product.sku);
                        $('#editProductModal #editProductCategory').val(product.category_id);
                        $('#editProductModal #editProductUnit').val(product.unit_type);
                        $('#editProductModal #editProductQuantity').val(product.quantity);
                        $('#editProductModal #editProductPrice').val(product.unit_price);
                        $('#editProductModal #editProductExpiry').val(product.expiry_date);
                        $('#editProductModal #editProductDescription').val(product.description);
                        $('#editProductModal').modal('show');
                    } else {
                        alert(response.message);
                    }
                }
            });
        }

        function saveEditProduct() {
            const productData = {
                id: $('#editProductId').val(),
                name: $('#editProductName').val(),
                sku: $('#editProductSku').val(),
                category_id: $('#editProductCategory').val(),
                unit_type: $('#editProductUnit').val(),
                quantity: $('#editProductQuantity').val(),
                unit_price: $('#editProductPrice').val(),
                expiry_date: $('#editProductExpiry').val(),
                description: $('#editProductDescription').val()
            };

            $.ajax({
                url: 'api/products/update.php',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(productData),
                success: function(response) {
                    if (response.status === 'success') {
                        $('#editProductModal').modal('hide');
                        location.reload(); 
                    } else {
                        alert(response.message);
                    }
                }
            });
        }

        function calculateConversion() {
            const fromValue = parseFloat(document.getElementById('fromValue').value);
            const fromUnit = document.getElementById('fromUnit').value;
            const toUnit = document.getElementById('toUnit').value;
            
            if (isNaN(fromValue)) {
                alert('Please enter a valid number');
                return;
            }
            
            const conversionFactors = {
                'mg': 0.001, 'g': 1, 'kg': 1000,
                'ml': 0.001, 'l': 1, 'dal': 10
            };
            
            const weightUnits = ['mg', 'g', 'kg'];
            const volumeUnits = ['ml', 'l', 'dal'];
            
            const fromIsWeight = weightUnits.includes(fromUnit);
            const toIsWeight = weightUnits.includes(toUnit);
            
            if (fromIsWeight !== toIsWeight) {
                alert('Cannot convert between weight and volume units');
                return;
            }
            
            // Convert to base unit first, then to target unit
            const baseValue = fromValue * conversionFactors[fromUnit];
            const resultValue = baseValue / conversionFactors[toUnit];
            
            document.getElementById('resultValue').textContent = resultValue.toFixed(6);
            document.getElementById('resultUnit').textContent = toUnit;
            document.getElementById('conversionResult').style.display = 'block';
        }
        
        // Print Inventory function
        function printInventory() {
            const printContent = `
                <html>
                <head>
                    <title>Laboratory Products Inventory Report - Tyazubwenge Training Center</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        h1 { color: #2c5530; text-align: center; }
                        h2 { color: #4a7c59; }
                        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                        th { background-color: #f2f2f2; font-weight: bold; }
                        .company-info { text-align: center; margin-bottom: 30px; }
                        .report-date { text-align: right; margin-bottom: 20px; }
                    </style>
                </head>
                <body>
                    <div class="company-info">
                        <h1>Tyazubwenge Training Center</h1>
                        <p>Laboratory Management System</p>
                    </div>
                    <div class="report-date">
                        <p>Report Generated: ${new Date().toLocaleDateString()}</p>
                    </div>
                    <h2>Laboratory Products Inventory Report</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Current Stock</th>
                                <th>Unit</th>
                                <th>Batch/Lot</th>
                                <th>Expiry Date</th>
                                <th>Unit Price (RWF)</th>
                                <th>Total Value (RWF)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${document.querySelector('.table tbody').innerHTML.replace(/<button[^>]*>.*?<\/button>/g, '').replace(/<td[^>]*>.*?<button[^>]*>.*?<\/button>.*?<\/td>/g, '<td>N/A</td>')}
                        </tbody>
                    </table>
                </body>
                </html>
            `;
            
            const printWindow = window.open('', '_blank');
            printWindow.document.write(printContent);
            printWindow.document.close();
            printWindow.print();
        }
        
        // Filter Products function
        document.querySelector('.btn-primary.btn-block').addEventListener('click', function() {
            alert('Applying filters to product list...');
        });
        
        // Edit Product function
        function editProduct(sku) {
            // For demo, show modal with placeholder data
            $('#editProductModal').modal('show');
        }
        
        // View Product function
        function viewProduct(sku) {
            const content = `
                <h6>Product Information</h6>
                <p><strong>SKU:</strong> ${sku}</p>
                <p><strong>Name:</strong> Sample Product</p>
                <p><strong>Category:</strong> Laboratory Equipment</p>
                <p><strong>Stock:</strong> 10 units</p>
                <p><strong>Price:</strong> ₦10,000</p>
            `;
            document.getElementById('viewProductContent').innerHTML = content;
            $('#viewProductModal').modal('show');
        }
        
        function saveEditProduct() {
            alert('Product updated successfully!');
            $('#editProductModal').modal('hide');
        }

        function editProductFromView() {
            $('#viewProductModal').modal('hide');
            $('#editProductModal').modal('show');
        }
        
        // Add Product function
        document.querySelector('.btn-primary[data-target="#addProductModal"]').addEventListener('click', function() {
            // This will be handled by the modal, but we can add additional logic here if needed
        });
        
        // Handle Add Product button in modal
        document.querySelector('.modal-footer .btn-primary').addEventListener('click', function() {
            alert('Product added successfully!');
            $('#addProductModal').modal('hide');
        });
    </script>
</body>
</html>


