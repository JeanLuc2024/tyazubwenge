<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Low Stock Alerts - Tyazubwenge Management</title>
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
                <script>
                    async function logout() {
                        try { await fetch('api/auth/logout', { method: 'POST', credentials: 'include' }); } catch(e) {}
                        localStorage.removeItem('adminLoggedIn');
                        sessionStorage.removeItem('adminLoggedIn');
                        window.location.href = 'login.php';
                    }
                </script>
                <!-- topbar -->
                <?php include 'includes/topbar.php'; ?>
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Low Stock Alerts</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row column1">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Critical Stock Alerts</h2>
                                        </div>
                                        <div class="heading1 margin_0">
                                            <button class="btn btn-warning" onclick="markAllAsRead()">
                                                <i class="fa fa-check"></i> Mark All as Read
                                            </button>
                                            <button class="btn btn-success" onclick="printAlerts()">
                                                <i class="fa fa-print"></i> Print Alerts
                                            </button>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Alert Type</th>
                                                        <th>Product Name</th>
                                                        <th>Current Stock</th>
                                                        <th>Minimum Level</th>
                                                        <th>Unit</th>
                                                        <th>Days to Stockout</th>
                                                        <th>Priority</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="table-danger">
                                                        <td><i class="fa fa-exclamation-triangle text-danger"></i> Critical</td>
                                                        <td>Sodium Chloride (Pure Grade)</td>
                                                        <td>0.5 kg</td>
                                                        <td>5.0 kg</td>
                                                        <td>kg</td>
                                                        <td>0 days</td>
                                                        <td><span class="badge badge-danger">High</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger" onclick="deleteAlert('Sodium Chloride')">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </button>
                                                            <button class="btn btn-sm btn-info" onclick="adjustStock('Sodium Chloride')">
                                                                <i class="fa fa-edit"></i> Adjust
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr class="table-warning">
                                                        <td><i class="fa fa-exclamation-triangle text-warning"></i> Warning</td>
                                                        <td>Hydrochloric Acid (37%)</td>
                                                        <td>1.2 L</td>
                                                        <td>3.0 L</td>
                                                        <td>L</td>
                                                        <td>2 days</td>
                                                        <td><span class="badge badge-warning">Medium</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger" onclick="deleteAlert('Hydrochloric Acid')">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </button>
                                                            <button class="btn btn-sm btn-info" onclick="adjustStock('Hydrochloric Acid')">
                                                                <i class="fa fa-edit"></i> Adjust
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr class="table-warning">
                                                        <td><i class="fa fa-exclamation-triangle text-warning"></i> Warning</td>
                                                        <td>Digital Microscope (1000x)</td>
                                                        <td>2 pieces</td>
                                                        <td>5 pieces</td>
                                                        <td>pieces</td>
                                                        <td>3 days</td>
                                                        <td><span class="badge badge-warning">Medium</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger" onclick="deleteAlert('Digital Microscope')">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </button>
                                                            <button class="btn btn-sm btn-info" onclick="adjustStock('Digital Microscope')">
                                                                <i class="fa fa-edit"></i> Adjust
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr class="table-warning">
                                                        <td><i class="fa fa-exclamation-triangle text-warning"></i> Warning</td>
                                                        <td>Safety Goggles (UV Protection)</td>
                                                        <td>8 pieces</td>
                                                        <td>15 pieces</td>
                                                        <td>pieces</td>
                                                        <td>4 days</td>
                                                        <td><span class="badge badge-warning">Medium</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger" onclick="deleteAlert('Safety Goggles')">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </button>
                                                            <button class="btn btn-sm btn-info" onclick="adjustStock('Safety Goggles')">
                                                                <i class="fa fa-edit"></i> Adjust
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr class="table-info">
                                                        <td><i class="fa fa-info-circle text-info"></i> Notice</td>
                                                        <td>Beaker Set (50ml-1000ml)</td>
                                                        <td>12 sets</td>
                                                        <td>20 sets</td>
                                                        <td>sets</td>
                                                        <td>7 days</td>
                                                        <td><span class="badge badge-info">Low</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger" onclick="deleteAlert('Beaker Set')">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </button>
                                                            <button class="btn btn-sm btn-info" onclick="adjustStock('Beaker Set')">
                                                                <i class="fa fa-edit"></i> Adjust
                                                            </button>
                                                        </td>
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
                                            <h2>Alert Statistics</h2>
                                        </div>
                                    </div>
                                    <div class="full progress_bar_inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="progress_bar">
                                                    <span class="skill" style="width:15%;">Critical Alerts <span class="info_valume">15%</span></span>                  
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-animated progress-bar-striped bg-danger" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%;">
                                                        </div>
                                                    </div>
                                                    <span class="skill" style="width:35%;">Warning Alerts <span class="info_valume">35%</span></span>   
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-animated progress-bar-striped bg-warning" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%;">
                                                        </div>
                                                    </div>
                                                    <span class="skill" style="width:50%;">Notice Alerts <span class="info_valume">50%</span></span>
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-animated progress-bar-striped bg-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
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
                                            <h2>Quick Actions</h2>
                                        </div>
                                    </div>
                                    <div class="full graph_revenue">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content">
                                                    <div class="quick_actions">
                                                        <button class="btn btn-block btn-success mb-2" onclick="printAlerts()">
                                                            <i class="fa fa-print"></i> Print Alerts Report
                                                        </button>
                                                        <button class="btn btn-block btn-warning mb-2" onclick="adjustMinimumLevels()">
                                                            <i class="fa fa-cog"></i> Adjust Minimum Stock Levels
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
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        function markAllAsRead() {
            alert('All alerts marked as read!');
        }
        
        function deleteAlert(productName) {
            if (confirm('Are you sure you want to delete this alert for ' + productName + '?')) {
                // Find and remove the row containing this product
                const rows = document.querySelectorAll('tbody tr');
                rows.forEach(row => {
                    if (row.textContent.includes(productName)) {
                        row.remove();
                    }
                });
                alert('Alert deleted for: ' + productName);
            }
        }
        
        function adjustStock(productName) {
            // Redirect to stock inventory page
            window.location.href = 'stock-inventory.php';
        }
        
        function printAlerts() {
            const printContent = `
                <html>
                <head>
                    <title>Stock Alerts Report - Tyazubwenge Training Center</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        h1 { color: #2c5530; text-align: center; }
                        h2 { color: #4a7c59; }
                        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                        th { background-color: #f2f2f2; font-weight: bold; }
                        .company-info { text-align: center; margin-bottom: 30px; }
                        .report-date { text-align: right; margin-bottom: 20px; }
                        .table-danger { background-color: #f8d7da; }
                        .table-warning { background-color: #fff3cd; }
                        .table-info { background-color: #d1ecf1; }
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
                    <h2>Critical Stock Alerts Report</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Alert Type</th>
                                <th>Product Name</th>
                                <th>Current Stock</th>
                                <th>Minimum Level</th>
                                <th>Unit</th>
                                <th>Days to Stockout</th>
                                <th>Priority</th>
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
        
        function adjustMinimumLevels() {
            // Redirect to stock inventory page
            window.location.href = 'stock-inventory.php';
        }
    </script>
</body>
</html>


