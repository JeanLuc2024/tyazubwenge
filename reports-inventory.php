<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Reports - Tyazubwenge Management</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
</head>
<body class="dashboard dashboard_1">
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
                                    <h2>Inventory Reports & Analysis</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row column1">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Inventory Valuation Report</h2>
                                        </div>
                                        <div class="heading1 margin_0">
                                            <button class="btn btn-primary" onclick="generateInventoryReport()">
                                                <i class="fa fa-chart-bar"></i> Generate Report
                                            </button>
                                            <button class="btn btn-success" onclick="exportInventoryReport()">
                                                <i class="fa fa-download"></i> Export
                                            </button>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Product Category</th>
                                                        <th>Total Items</th>
                                                        <th>Total Quantity</th>
                                                        <th>Average Unit Cost</th>
                                                        <th>Total Value</th>
                                                        <th>% of Total</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Chemical Reagents</td>
                                                        <td>156</td>
                                                        <td>2,450 kg</td>
                                                        <td>₦1,250</td>
                                                        <td>₦3,062,500</td>
                                                        <td>45.2%</td>
                                                        <td><span class="badge badge-success">Good</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Measuring Instruments</td>
                                                        <td>89</td>
                                                        <td>89 pieces</td>
                                                        <td>₦45,000</td>
                                                        <td>₦4,005,000</td>
                                                        <td>59.1%</td>
                                                        <td><span class="badge badge-success">Good</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Glassware</td>
                                                        <td>234</td>
                                                        <td>1,200 pieces</td>
                                                        <td>₦2,800</td>
                                                        <td>₦3,360,000</td>
                                                        <td>49.6%</td>
                                                        <td><span class="badge badge-success">Good</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Safety Equipment</td>
                                                        <td>67</td>
                                                        <td>450 pieces</td>
                                                        <td>₦8,500</td>
                                                        <td>₦3,825,000</td>
                                                        <td>56.4%</td>
                                                        <td><span class="badge badge-warning">Review</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Consumables</td>
                                                        <td>345</td>
                                                        <td>5,600 pieces</td>
                                                        <td>₦450</td>
                                                        <td>₦2,520,000</td>
                                                        <td>37.2%</span></td>
                                                        <td><span class="badge badge-info">Low Value</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row column1">
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Stock Movement Analysis</h2>
                                        </div>
                                    </div>
                                    <div class="full graph_revenue">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content">
                                                    <div class="stock_movement">
                                                        <div class="movement_item">
                                                            <h5>Fast Moving Products</h5>
                                                            <div class="product_list">
                                                                <div class="product_item">
                                                                    <span>Sodium Chloride (500g)</span>
                                                                    <span class="badge badge-success">High</span>
                                                                </div>
                                                                <div class="product_item">
                                                                    <span>Safety Goggles</span>
                                                                    <span class="badge badge-success">High</span>
                                                                </div>
                                                                <div class="product_item">
                                                                    <span>Beaker Set (50ml-1000ml)</span>
                                                                    <span class="badge badge-info">Medium</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="movement_item">
                                                            <h5>Slow Moving Products</h5>
                                                            <div class="product_list">
                                                                <div class="product_item">
                                                                    <span>Digital Microscope (1000x)</span>
                                                                    <span class="badge badge-warning">Low</span>
                                                                </div>
                                                                <div class="product_item">
                                                                    <span>Analytical Balance (2.5kg)</span>
                                                                    <span class="badge badge-warning">Low</span>
                                                                </div>
                                                                <div class="product_item">
                                                                    <span>Precision Weighing Scale</span>
                                                                    <span class="badge badge-danger">Very Low</span>
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
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Inventory Alerts</h2>
                                        </div>
                                    </div>
                                    <div class="full graph_revenue">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content">
                                                    <div class="inventory_alerts">
                                                        <div class="alert_item alert-danger">
                                                            <i class="fa fa-exclamation-triangle"></i>
                                                            <div class="alert_content">
                                                                <h6>Low Stock Alert</h6>
                                                                <p>47 products below minimum stock level</p>
                                                            </div>
                                                        </div>
                                                        <div class="alert_item alert-warning">
                                                            <i class="fa fa-calendar-times"></i>
                                                            <div class="alert_content">
                                                                <h6>Expiry Warning</h6>
                                                                <p>12 products expiring within 30 days</p>
                                                            </div>
                                                        </div>
                                                        <div class="alert_item alert-info">
                                                            <i class="fa fa-chart-line"></i>
                                                            <div class="alert_content">
                                                                <h6>Reorder Recommendation</h6>
                                                                <p>23 products need reordering</p>
                                                            </div>
                                                        </div>
                                                        <div class="alert_item alert-success">
                                                            <i class="fa fa-check-circle"></i>
                                                            <div class="alert_content">
                                                                <h6>Stock Optimization</h6>
                                                                <p>156 products at optimal levels</p>
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
                        <div class="row column1">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Inventory Turnover Analysis</h2>
                                        </div>
                                    </div>
                                    <div class="full graph_revenue">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content">
                                                    <div class="no-chart-message">
                                                        <h5>Inventory Turnover Data</h5>
                                                        <p>Chart visualization has been disabled. Use the data tables for detailed analysis.</p>
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
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        // Chart functionality removed

        function generateInventoryReport() {
            alert('Generating inventory valuation report...');
        }

        function exportInventoryReport() {
            alert('Exporting inventory report to Excel...');
        }
    </script>
    <style>
        .stock_movement {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .movement_item h5 {
            color: #333;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 2px solid #007bff;
        }
        
        .product_list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .product_item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 12px;
            background: #f8f9fa;
            border-radius: 5px;
        }
        
        .inventory_alerts {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .alert_item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid;
        }
        
        .alert_item.alert-danger {
            background-color: #f8d7da;
            border-left-color: #dc3545;
        }
        
        .alert_item.alert-warning {
            background-color: #fff3cd;
            border-left-color: #ffc107;
        }
        
        .alert_item.alert-info {
            background-color: #d1ecf1;
            border-left-color: #17a2b8;
        }
        
        .alert_item.alert-success {
            background-color: #d4edda;
            border-left-color: #28a745;
        }
        
        .alert_item i {
            font-size: 1.5em;
            margin-right: 15px;
        }
        
        .alert_content h6 {
            margin: 0 0 5px 0;
            font-weight: bold;
        }
        
        .alert_content p {
            margin: 0;
            color: #666;
        }
        .no-chart-message {
            text-align: center;
            padding: 40px 20px;
            background: #f8f9fa;
            border-radius: 8px;
            border: 2px dashed #dee2e6;
        }
        
        .no-chart-message h5 {
            color: #6c757d;
            margin-bottom: 10px;
        }
        
        .no-chart-message p {
            color: #6c757d;
            margin: 0;
        }
    </style>
</body>
</html>


