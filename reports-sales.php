<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sales Reports - Tyazubwenge Management</title>
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
                                    <h2>Sales Reports & Analytics</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row column1">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Report Filters</h2>
                                        </div>
                                        <div class="heading1 margin_0">
                                            <button class="btn btn-primary" onclick="generateReport()">
                                                <i class="fa fa-chart-bar"></i> Generate Report
                                            </button>
                                            <button class="btn btn-success" onclick="printReport()">
                                                <i class="fa fa-print"></i> Print Report
                                            </button>
                                        </div>
                                    </div>
                                    <div class="full graph_revenue">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content">
                                                    <form class="report_filters">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Report Type</label>
                                                                    <select class="form-control" id="reportType">
                                                                        <option value="daily">Daily Sales Report</option>
                                                                        <option value="weekly">Weekly Sales Report</option>
                                                                        <option value="monthly">Monthly Sales Report</option>
                                                                        <option value="yearly">Yearly Sales Report</option>
                                                                        <option value="custom">Custom Period</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Start Date</label>
                                                                    <input type="date" class="form-control" id="startDate" value="2024-01-01">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>End Date</label>
                                                                    <input type="date" class="form-control" id="endDate" value="2024-01-31">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Product Category</label>
                                                                    <select class="form-control" id="category">
                                                                        <option value="all">All Categories</option>
                                                                        <option value="chemicals">Chemical Reagents</option>
                                                                        <option value="glassware">Glassware</option>
                                                                        <option value="instruments">Measuring Instruments</option>
                                                                        <option value="safety">Safety Equipment</option>
                                                                        <option value="consumables">Consumables</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
                                            <h2>Detailed Sales Data</h2>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Invoice No.</th>
                                                        <th>Customer</th>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Price</th>
                                                        <th>Total</th>
                                                        <th>Payment Method</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>2024-01-15</td>
                                                        <td>INV-2024-001</td>
                                                        <td>Dr. Sarah Johnson - University Lab</td>
                                                        <td>Analytical Balance (2.5kg)</td>
                                                        <td>1 piece</td>
                                                        <td>₦185,000</td>
                                                        <td>₦185,000</td>
                                                        <td>Bank Transfer</td>
                                                        <td><span class="badge badge-success">Paid</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-01-15</td>
                                                        <td>INV-2024-002</td>
                                                        <td>Research Institute</td>
                                                        <td>Sodium Chloride (500g)</td>
                                                        <td>5 kg</td>
                                                        <td>₦2,500</td>
                                                        <td>₦12,500</td>
                                                        <td>Cash</td>
                                                        <td><span class="badge badge-success">Paid</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-01-14</td>
                                                        <td>INV-2024-003</td>
                                                        <td>Medical Center</td>
                                                        <td>Digital Microscope (1000x)</td>
                                                        <td>1 piece</td>
                                                        <td>₦245,000</td>
                                                        <td>₦245,000</td>
                                                        <td>Mobile Money</td>
                                                        <td><span class="badge badge-success">Paid</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-01-14</td>
                                                        <td>INV-2024-004</td>
                                                        <td>Industrial Lab</td>
                                                        <td>Safety Equipment Set</td>
                                                        <td>2 sets</td>
                                                        <td>₦33,900</td>
                                                        <td>₦67,800</td>
                                                        <td>Credit</td>
                                                        <td><span class="badge badge-warning">Pending</span></td>
                                                    </tr>
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

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        // Chart functionality removed

        function generateReport() {
            const reportType = document.getElementById('reportType').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const category = document.getElementById('category').value;
            
            // Simulate fetching sales data based on filters
            alert(`Fetching sales data for ${reportType} report from ${startDate} to ${endDate} for ${category} category...`);
            
            // In a real application, this would make an API call to fetch the data
            // For now, we'll just show a success message
            setTimeout(() => {
                alert('Sales report generated successfully! Data has been updated in the tables below.');
            }, 1000);
        }

        function printReport() {
            const printContent = `
                <html>
                <head>
                    <title>Sales Report - Tyazubwenge Training Center</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        h1 { color: #2c5530; text-align: center; }
                        h2 { color: #4a7c59; }
                        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                        th { background-color: #f2f2f2; font-weight: bold; }
                        .company-info { text-align: center; margin-bottom: 30px; }
                        .report-date { text-align: right; margin-bottom: 20px; }
                        .summary-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin: 20px 0; }
                        .summary-item { text-align: center; padding: 15px; background: #f8f9fa; border-radius: 8px; }
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
                    <h2>Sales Report & Analytics</h2>
                    
                    <h3>Sales Summary</h3>
                    <div class="summary-grid">
                        <div class="summary-item">
                            <h4>₦2,847,500</h4>
                            <p>Total Sales</p>
                        </div>
                        <div class="summary-item">
                            <h4>156</h4>
                            <p>Total Orders</p>
                        </div>
                        <div class="summary-item">
                            <h4>₦18,253</h4>
                            <p>Average Order Value</p>
                        </div>
                        <div class="summary-item">
                            <h4>₦1,200,000</h4>
                            <p>Top Product Sales</p>
                        </div>
                    </div>
                    
                    <h3>Detailed Sales Data</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Invoice No.</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${document.querySelector('.table tbody').innerHTML}
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
    </script>
    <style>
        .sales_summary {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .summary_item {
            text-align: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #28a745;
        }
        
        .summary_item h4 {
            color: #28a745;
            font-size: 1.3em;
            margin-bottom: 5px;
        }
        
        .summary_item p {
            color: #666;
            margin: 5px 0;
        }
        
        .top_products {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .product_item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        
        .product_info h6 {
            color: #333;
            margin-bottom: 5px;
        }
        
        .product_info p {
            color: #666;
            margin: 0;
            font-size: 0.9em;
        }
        
        .product_progress {
            width: 200px;
        }
        
        .report_filters {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
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


