<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expiry Tracking - Tyazubwenge Management</title>
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
                        try { await fetch('/api/auth/logout', { method: 'POST', credentials: 'include' }); } catch(e) {}
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
                                    <h2>Expiry Tracking</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row column1">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Products Expiring Soon</h2>
                                        </div>
                                        <div class="heading1 margin_0">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-outline-primary active" onclick="filterExpiry('all')">All</button>
                                                <button type="button" class="btn btn-outline-danger" onclick="filterExpiry('expired')">Expired</button>
                                                <button type="button" class="btn btn-outline-warning" onclick="filterExpiry('7days')">7 Days</button>
                                                <button type="button" class="btn btn-outline-info" onclick="filterExpiry('30days')">30 Days</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Batch/Lot No.</th>
                                                        <th>Current Stock</th>
                                                        <th>Unit</th>
                                                        <th>Expiry Date</th>
                                                        <th>Days to Expiry</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="table-danger">
                                                        <td>Hydrochloric Acid (37%)</td>
                                                        <td>HCL-2024-001</td>
                                                        <td>2.5 L</td>
                                                        <td>L</td>
                                                        <td>2024-01-15</td>
                                                        <td>-2 days</td>
                                                        <td><span class="badge badge-danger">Expired</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-warning" onclick="disposeProduct('Hydrochloric Acid')">
                                                                <i class="fa fa-trash"></i> Dispose
                                                            </button>
                                                            <button class="btn btn-sm btn-info" onclick="extendExpiry('Hydrochloric Acid')">
                                                                <i class="fa fa-clock"></i> Extend
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr class="table-danger">
                                                        <td>Sodium Hydroxide (Pellets)</td>
                                                        <td>NAOH-2024-003</td>
                                                        <td>1.8 kg</td>
                                                        <td>kg</td>
                                                        <td>2024-01-18</td>
                                                        <td>1 day</td>
                                                        <td><span class="badge badge-danger">Critical</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-warning" onclick="disposeProduct('Sodium Hydroxide')">
                                                                <i class="fa fa-trash"></i> Dispose
                                                            </button>
                                                            <button class="btn btn-sm btn-info" onclick="extendExpiry('Sodium Hydroxide')">
                                                                <i class="fa fa-clock"></i> Extend
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr class="table-warning">
                                                        <td>Ethanol (95%)</td>
                                                        <td>ETH-2024-005</td>
                                                        <td>5.0 L</td>
                                                        <td>L</td>
                                                        <td>2024-01-25</td>
                                                        <td>6 days</td>
                                                        <td><span class="badge badge-warning">Warning</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary" onclick="prioritizeSale('Ethanol')">
                                                                <i class="fa fa-tag"></i> Priority Sale
                                                            </button>
                                                            <button class="btn btn-sm btn-info" onclick="extendExpiry('Ethanol')">
                                                                <i class="fa fa-clock"></i> Extend
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr class="table-warning">
                                                        <td>Phenolphthalein Indicator</td>
                                                        <td>PHEN-2024-002</td>
                                                        <td>0.5 L</td>
                                                        <td>L</td>
                                                        <td>2024-01-28</td>
                                                        <td>9 days</td>
                                                        <td><span class="badge badge-warning">Warning</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary" onclick="prioritizeSale('Phenolphthalein')">
                                                                <i class="fa fa-tag"></i> Priority Sale
                                                            </button>
                                                            <button class="btn btn-sm btn-info" onclick="extendExpiry('Phenolphthalein')">
                                                                <i class="fa fa-clock"></i> Extend
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr class="table-info">
                                                        <td>Methyl Orange Indicator</td>
                                                        <td>MO-2024-004</td>
                                                        <td>0.3 L</td>
                                                        <td>L</td>
                                                        <td>2024-02-10</td>
                                                        <td>22 days</td>
                                                        <td><span class="badge badge-info">Notice</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary" onclick="prioritizeSale('Methyl Orange')">
                                                                <i class="fa fa-tag"></i> Priority Sale
                                                            </button>
                                                            <button class="btn btn-sm btn-info" onclick="extendExpiry('Methyl Orange')">
                                                                <i class="fa fa-clock"></i> Extend
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
                                            <h2>Expiry Statistics</h2>
                                        </div>
                                    </div>
                                    <div class="full progress_bar_inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="progress_bar">
                                                    <span class="skill" style="width:10%;">Expired <span class="info_valume">10%</span></span>                  
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-animated progress-bar-striped bg-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                                                        </div>
                                                    </div>
                                                    <span class="skill" style="width:20%;">Critical (1-7 days) <span class="info_valume">20%</span></span>   
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-animated progress-bar-striped bg-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                                        </div>
                                                    </div>
                                                    <span class="skill" style="width:30%;">Warning (8-30 days) <span class="info_valume">30%</span></span>
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-animated progress-bar-striped bg-info" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                                        </div>
                                                    </div>
                                                    <span class="skill" style="width:40%;">Safe (>30 days) <span class="info_valume">40%</span></span>
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-animated progress-bar-striped bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
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
                                                        <button class="btn btn-block btn-danger mb-2" onclick="disposeAllExpired()">
                                                            <i class="fa fa-trash"></i> Dispose All Expired Products
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
        function filterExpiry(type) {
            // Remove active class from all buttons
            document.querySelectorAll('.btn-group button').forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            event.target.classList.add('active');
            
            // Filter table rows based on type
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const daysToExpiry = row.cells[5].textContent;
                let show = true;
                
                switch(type) {
                    case 'expired':
                        show = daysToExpiry.includes('-');
                        break;
                    case '7days':
                        const days = parseInt(daysToExpiry.split(' ')[0]);
                        show = days >= 0 && days <= 7;
                        break;
                    case '30days':
                        const days30 = parseInt(daysToExpiry.split(' ')[0]);
                        show = days30 >= 0 && days30 <= 30;
                        break;
                    case 'all':
                    default:
                        show = true;
                }
                
                row.style.display = show ? '' : 'none';
            });
        }
        
        function disposeProduct(productName) {
            if(confirm('Are you sure you want to dispose of ' + productName + '? This will remove it from the database.')) {
                // In a real application, this would make an API call to remove the product
                alert('Product ' + productName + ' has been disposed and removed from the database.');
                
                // Remove the row from the table
                const row = event.target.closest('tr');
                row.remove();
            }
        }
        
        function extendExpiry(productName) {
            const newDate = prompt('Enter new expiry date for ' + productName + ' (YYYY-MM-DD):');
            if(newDate) {
                // Validate date format
                const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
                if (!dateRegex.test(newDate)) {
                    alert('Please enter a valid date in YYYY-MM-DD format.');
                    return;
                }
                
                // In a real application, this would make an API call to update the expiry date
                alert('Expiry date for ' + productName + ' updated to: ' + newDate);
                
                // Update the table row
                const row = event.target.closest('tr');
                const expiryDateCell = row.cells[4];
                const daysToExpiryCell = row.cells[5];
                const statusCell = row.cells[6];
                
                expiryDateCell.textContent = newDate;
                
                // Calculate days to expiry
                const today = new Date();
                const expiryDate = new Date(newDate);
                const diffTime = expiryDate - today;
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                
                if (diffDays < 0) {
                    daysToExpiryCell.textContent = Math.abs(diffDays) + ' days ago';
                    statusCell.innerHTML = '<span class="badge badge-danger">Expired</span>';
                    row.className = 'table-danger';
                } else if (diffDays <= 7) {
                    daysToExpiryCell.textContent = diffDays + ' days';
                    statusCell.innerHTML = '<span class="badge badge-danger">Critical</span>';
                    row.className = 'table-danger';
                } else if (diffDays <= 30) {
                    daysToExpiryCell.textContent = diffDays + ' days';
                    statusCell.innerHTML = '<span class="badge badge-warning">Warning</span>';
                    row.className = 'table-warning';
                } else {
                    daysToExpiryCell.textContent = diffDays + ' days';
                    statusCell.innerHTML = '<span class="badge badge-info">Notice</span>';
                    row.className = 'table-info';
                }
            }
        }
        
        function prioritizeSale(productName) {
            alert('Priority sale created for: ' + productName);
        }
        
        function disposeAllExpired() {
            if(confirm('Are you sure you want to dispose of all expired products? This will remove them from the database.')) {
                // In a real application, this would make an API call to remove all expired products
                alert('All expired products have been disposed and removed from the database.');
                
                // Remove all expired rows from the table
                const rows = document.querySelectorAll('tbody tr');
                rows.forEach(row => {
                    const daysToExpiry = row.cells[5].textContent;
                    if (daysToExpiry.includes('-')) {
                        row.remove();
                    }
                });
            }
        }
    </script>
</body>
</html>


