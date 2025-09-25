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
        .dashboard-card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .products-table {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .products-table th, .products-table td {
            padding: 12px 8px;
            font-size: 13px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .products-table th:first-child, .products-table td:first-child {
            min-width: 200px;
            max-width: 250px;
        }
        .products-table th:nth-child(2), .products-table td:nth-child(2) {
            min-width: 100px;
            max-width: 120px;
        }
        .products-table th:nth-child(3), .products-table td:nth-child(3) {
            min-width: 120px;
            max-width: 150px;
        }
        .products-table th:nth-child(4), .products-table td:nth-child(4) {
            min-width: 100px;
            max-width: 120px;
            text-align: right;
        }
        .products-table th:nth-child(5), .products-table td:nth-child(5) {
            min-width: 80px;
            max-width: 100px;
            text-align: center;
        }
        .products-table th:nth-child(6), .products-table td:nth-child(6) {
            min-width: 100px;
            max-width: 120px;
            text-align: center;
        }
        .products-table th:nth-child(7), .products-table td:nth-child(7) {
            min-width: 120px;
            max-width: 140px;
            text-align: center;
        }
        .products-table tbody tr:hover {
            background: #f8f9fa;
        }
        .stock-warning {
            background: #fff3cd;
        }
        .stock-out {
            background: #f8d7da;
        }
        .search-container {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .btn-stockout {
            background: #dc3545;
            border: none;
            color: white;
            padding: 5px 15px;
            border-radius: 4px;
            font-size: 12px;
        }
        .btn-stockout:hover {
            background: #c82333;
            color: white;
        }
        .modal-header {
            background: #dc3545;
            color: white;
        }
        .profit-positive {
            color: #28a745;
            font-weight: bold;
        }
        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .products-table {
                font-size: 11px;
            }
            .products-table th, .products-table td {
                padding: 8px 4px;
            }
            .products-table th:first-child, .products-table td:first-child {
                min-width: 150px;
                max-width: 180px;
            }
            .search-container .row > div {
                margin-bottom: 15px;
            }
            .modal-dialog {
                margin: 10px;
            }
            .modal-body .row > div {
                margin-bottom: 15px;
            }
        }
        
        @media (max-width: 576px) {
            .products-table th:not(:first-child):not(:nth-child(7)), 
            .products-table td:not(:first-child):not(:nth-child(7)) {
                display: none;
            }
            .products-table th:first-child, .products-table td:first-child {
                min-width: 200px;
            }
            .products-table th:nth-child(7), .products-table td:nth-child(7) {
                min-width: 100px;
                position: sticky;
                right: 0;
                background: white;
                box-shadow: -2px 0 5px rgba(0,0,0,0.1);
            }
        }
    </style>
</head>
<body>
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            <?php include 'includes/sidebar.php'; ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <?php include 'includes/topbar.php'; ?>
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
        <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Point of Sale - Stockout Sales</h2>
                    </div>
                </div>
            </div>
            
            <!-- Search and Filter Section -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Search and Filter Products</h2>
                                        </div>
                                    </div>
                                    <div class="full graph_revenue">
                <div class="row">
                                            <div class="col-md-3">
                        <div class="form-group">
                            <label for="searchProduct">Search Products</label>
                            <input type="text" class="form-control" id="searchProduct" placeholder="Search by name, SKU, or category...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="filterStatus">Filter by Status</label>
                            <select class="form-control" id="filterStatus">
                                <option value="">All Products</option>
                                <option value="in_stock">In Stock</option>
                                <option value="out_of_stock">Out of Stock</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="filterCategory">Filter by Category</label>
                            <select class="form-control" id="filterCategory">
                                <option value="">All Categories</option>
                                <?php
                                require_once 'config/database.php';
                                try {
                                    $categories = fetchAll("SELECT * FROM categories WHERE is_active = 1 ORDER BY name");
                                    foreach ($categories as $category) {
                                        echo '<option value="' . $category['id'] . '">' . htmlspecialchars($category['name']) . '</option>';
                                    }
                                } catch (Exception $e) {
                                    echo '<option>Error loading categories</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                                            <div class="col-md-3">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button class="btn btn-secondary btn-block" onclick="clearFilters()">Clear Filters</button>
                                                </div>
                                            </div>
                                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Products Table -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Laboratory Products Selection</h2>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped" id="productsTable">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Unit Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    $products = fetchAll("SELECT p.*, c.name as category_name 
                                                        FROM products p 
                                                        LEFT JOIN categories c ON p.category_id = c.id 
                                                        WHERE p.is_active = 1 
                                                        ORDER BY p.name");
                                    
                                    if (empty($products)) {
                                        echo '<tr><td colspan="7" class="text-center text-muted">No products available</td></tr>';
                                    } else {
                                        foreach ($products as $product) {
                                            $isOutOfStock = $product['quantity'] <= 0;
                                            $rowClass = $isOutOfStock ? 'stock-out' : ($product['quantity'] <= 5 ? 'stock-warning' : '');
                                            
                                            echo '<tr class="' . $rowClass . '">';
                                            echo '<td><strong>' . htmlspecialchars($product['name']) . '</strong></td>';
                                            echo '<td>' . htmlspecialchars($product['sku']) . '</td>';
                                            echo '<td>' . htmlspecialchars($product['category_name'] ?? 'N/A') . '</td>';
                                            echo '<td>₦' . number_format($product['unit_price'], 2) . '</td>';
                                            echo '<td>' . $product['quantity'] . ' ' . htmlspecialchars($product['unit_type']) . '</td>';
                                            
                                            if ($isOutOfStock) {
                                                echo '<td><span class="badge badge-danger">Out of Stock</span></td>';
                                            } else {
                                                echo '<td><span class="badge badge-success">In Stock</span></td>';
                                            }
                                            
                                            echo '<td>';
                                            echo '<button class="btn btn-stockout" onclick="openStockoutModal(' . htmlspecialchars(json_encode($product)) . ')">';
                                            echo '<i class="fas fa-shopping-cart"></i> Stockout Sale';
                                            echo '</button>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    }
                                } catch (Exception $e) {
                                    echo '<tr><td colspan="7" class="text-center text-danger">Error loading products: ' . $e->getMessage() . '</td></tr>';
                                }
                                ?>
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
    </div>

    <!-- Stockout Modal -->
    <div class="modal fade" id="stockoutModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-shopping-cart"></i> Stockout Sale</h5>
                    <button type="button" class="close" data-dismiss="modal" style="color: white;">
                        <span>&times;</span>
                    </button>
                </div>
                <form id="stockoutForm" onsubmit="return processStockoutSale(event)">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6><i class="fas fa-info-circle"></i> Product Information</h6>
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" id="modalProductName" readonly>
                                </div>
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" id="modalProductSku" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" class="form-control" id="modalProductCategory" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Unit Type</label>
                                    <input type="text" class="form-control" id="modalProductUnitType" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6><i class="fas fa-dollar-sign"></i> Pricing Information</h6>
                                <div class="form-group">
                                    <label>Original Unit Price</label>
                                    <input type="text" class="form-control" id="modalOriginalPrice" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity to Sell *</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                                    <div class="invalid-feedback">Please enter a valid quantity.</div>
                                </div>
                                <div class="form-group">
                                    <label for="sellingPrice">Selling Price per Unit *</label>
                                    <input type="number" class="form-control" id="sellingPrice" name="sellingPrice" step="0.01" min="0" required>
                                    <div class="invalid-feedback">Please enter a valid selling price.</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-12">
                                <h6><i class="fas fa-calculator"></i> Profit Calculation</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Total Cost</label>
                                            <input type="text" class="form-control" id="totalCost" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Total Revenue</label>
                                            <input type="text" class="form-control" id="totalRevenue" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Profit/Loss</label>
                                            <input type="text" class="form-control" id="profitLoss" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submitStockout">
                            <i class="fas fa-shopping-cart"></i> Process Stockout Sale
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        let currentProduct = null;
        
        // Global functions
        function openStockoutModal(product) {
            currentProduct = product;
            
            // Populate modal fields
            document.getElementById('modalProductName').value = product.name;
            document.getElementById('modalProductSku').value = product.sku;
            document.getElementById('modalProductCategory').value = product.category_name || 'N/A';
            document.getElementById('modalProductUnitType').value = product.unit_type;
            document.getElementById('modalOriginalPrice').value = '₦' + parseFloat(product.unit_price).toFixed(2);
            
            // Clear previous values
            document.getElementById('quantity').value = '';
            document.getElementById('sellingPrice').value = '';
            document.getElementById('totalCost').value = '';
            document.getElementById('totalRevenue').value = '';
            document.getElementById('profitLoss').value = '';
            
            // Clear validation errors
            clearValidationErrors();
            
            // Show modal
            $('#stockoutModal').modal('show');
        }
        
        function clearValidationErrors() {
            document.getElementById('quantity').classList.remove('is-invalid');
            document.getElementById('sellingPrice').classList.remove('is-invalid');
        }
        
        function updateProfitCalculation() {
            const quantity = parseFloat(document.getElementById('quantity').value) || 0;
            const sellingPrice = parseFloat(document.getElementById('sellingPrice').value) || 0;
            const originalPrice = parseFloat(currentProduct.unit_price);
            
            const totalCost = originalPrice * quantity;
            const totalRevenue = sellingPrice * quantity;
            const profitLoss = totalRevenue - totalCost;
            
            document.getElementById('totalCost').value = '₦' + totalCost.toFixed(2);
            document.getElementById('totalRevenue').value = '₦' + totalRevenue.toFixed(2);
            
            const profitElement = document.getElementById('profitLoss');
            profitElement.value = '₦' + profitLoss.toFixed(2);
            profitElement.className = 'form-control ' + (profitLoss >= 0 ? 'profit-positive' : 'profit-negative');
        }
        
        function processStockoutSale(event) {
            event.preventDefault();
            
            // Clear previous validation errors
            clearValidationErrors();
            
            // Get form data
            const quantity = parseFloat(document.getElementById('quantity').value);
            const sellingPrice = parseFloat(document.getElementById('sellingPrice').value);
            
            // Validate inputs
            let isValid = true;
            
            if (!quantity || quantity <= 0) {
                document.getElementById('quantity').classList.add('is-invalid');
                isValid = false;
            }
            
            if (!sellingPrice || sellingPrice < 0) {
                document.getElementById('sellingPrice').classList.add('is-invalid');
                isValid = false;
            }
            
            if (!isValid) {
                return false;
            }
            
            // Prepare sale data
            const saleData = {
                customer_name: 'Stockout Sale',
                items: [{
                    product_id: currentProduct.id,
                    quantity: quantity,
                    unit_price: sellingPrice,
                    cost_price: parseFloat(currentProduct.unit_price)
                }]
            };
            
            // Show loading state
            const submitBtn = document.getElementById('submitStockout');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            submitBtn.disabled = true;
            
            // Test connection first
            console.log('Testing API connection...');
            fetch('api/sales/simple_test.php')
            .then(response => response.json())
            .then(testData => {
                console.log('API Test Result:', testData);
                
                // Now send the actual sales request
                return fetch('api/sales/create.php', {
                method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(saleData)
                });
            })
            .then(response => {
                console.log('Sales Response status:', response.status);
                console.log('Sales Response headers:', response.headers);
                
                // Check if response is JSON
                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    return response.text().then(text => {
                        console.error('Non-JSON response:', text);
                        throw new Error('Server returned non-JSON response: ' + text.substring(0, 200));
                    });
                }
                
                return response.json();
            })
            .then(data => {
                console.log('Sales Response data:', data);
                if (data.success) {
                    alert('Stockout sale processed successfully!\nSale #' + data.data.sale_number + '\nTotal: ₦' + data.data.totals.total_amount.toFixed(2) + '\nProfit: ₦' + data.data.totals.total_profit.toFixed(2));
                        $('#stockoutModal').modal('hide');
                        location.reload(); // Reload to update stock levels
                    } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error processing sale: ' + error.message);
            })
            .finally(() => {
                    // Restore button state
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
            });
            
            return false;
        }
        
        function filterProducts() {
            const searchTerm = document.getElementById('searchProduct').value.toLowerCase();
            const statusFilter = document.getElementById('filterStatus').value;
            const categoryFilter = document.getElementById('filterCategory').value;
            
            const rows = document.querySelectorAll('#productsTable tbody tr');
            
            rows.forEach(row => {
                const productName = row.cells[0].textContent.toLowerCase();
                const sku = row.cells[1].textContent.toLowerCase();
                const category = row.cells[2].textContent.toLowerCase();
                const stock = parseInt(row.cells[4].textContent);
                
                let showRow = true;
                
                // Search filter
                if (searchTerm && !productName.includes(searchTerm) && !sku.includes(searchTerm) && !category.includes(searchTerm)) {
                    showRow = false;
                }
                
                // Status filter
                if (statusFilter === 'in_stock' && stock <= 0) {
                    showRow = false;
                } else if (statusFilter === 'out_of_stock' && stock > 0) {
                    showRow = false;
                }
                
                // Category filter
                if (categoryFilter && !row.dataset.categoryId) {
                    // This would need to be set when rendering the table
                    // For now, we'll skip category filtering
                }
                
                row.style.display = showRow ? '' : 'none';
            });
        }
        
        function clearFilters() {
            document.getElementById('searchProduct').value = '';
            document.getElementById('filterStatus').value = '';
            document.getElementById('filterCategory').value = '';
            filterProducts();
        }
        
        $(document).ready(function() {
            // Event listeners
            document.getElementById('searchProduct').addEventListener('input', filterProducts);
            document.getElementById('filterStatus').addEventListener('change', filterProducts);
            document.getElementById('filterCategory').addEventListener('change', filterProducts);
            document.getElementById('quantity').addEventListener('input', updateProfitCalculation);
            document.getElementById('sellingPrice').addEventListener('input', updateProfitCalculation);
        });
    </script>
</body>
</html>