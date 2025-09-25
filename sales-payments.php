<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Tracking - Tyazubwenge Management</title>
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
                                    <h2>Payment Tracking</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row column1">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Payment Records</h2>
                                        </div>
                                        <div class="heading1 margin_0">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-outline-primary active" onclick="filterPayments('all')">All</button>
                                                <button type="button" class="btn btn-outline-success" onclick="filterPayments('paid')">Paid</button>
                                                <button type="button" class="btn btn-outline-warning" onclick="filterPayments('pending')">Pending</button>
                                                <button type="button" class="btn btn-outline-danger" onclick="filterPayments('overdue')">Overdue</button>
                                            </div>
                                            <button class="btn btn-primary ml-2" onclick="recordNewPayment()">
                                                <i class="fa fa-plus"></i> Record Payment
                                            </button>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Payment ID</th>
                                                        <th>Invoice No.</th>
                                                        <th>Customer</th>
                                                        <th>Amount</th>
                                                        <th>Payment Method</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Reference</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="table-success">
                                                        <td>PAY-2024-001</td>
                                                        <td>INV-2024-001</td>
                                                        <td>Dr. Sarah Johnson - University Lab</td>
                                                        <td>₦185,000</td>
                                                        <td>Bank Transfer</td>
                                                        <td>2024-01-15</td>
                                                        <td><span class="badge badge-success">Paid</span></td>
                                                        <td>TXN-789456123</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info" onclick="viewPayment('PAY-2024-001')">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-primary" onclick="printReceipt('PAY-2024-001')">
                                                                <i class="fa fa-print"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr class="table-warning">
                                                        <td>PAY-2024-002</td>
                                                        <td>INV-2024-002</td>
                                                        <td>Research Institute</td>
                                                        <td>₦12,500</td>
                                                        <td>Cash</td>
                                                        <td>2024-01-15</td>
                                                        <td><span class="badge badge-warning">Pending</span></td>
                                                        <td>-</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-success" onclick="confirmPayment('PAY-2024-002')">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-info" onclick="viewPayment('PAY-2024-002')">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr class="table-success">
                                                        <td>PAY-2024-003</td>
                                                        <td>INV-2024-003</td>
                                                        <td>Medical Center</td>
                                                        <td>₦245,000</td>
                                                        <td>Mobile Money</td>
                                                        <td>2024-01-14</td>
                                                        <td><span class="badge badge-success">Paid</span></td>
                                                        <td>MM-456789123</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info" onclick="viewPayment('PAY-2024-003')">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-primary" onclick="printReceipt('PAY-2024-003')">
                                                                <i class="fa fa-print"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr class="table-danger">
                                                        <td>PAY-2024-004</td>
                                                        <td>INV-2024-004</td>
                                                        <td>Industrial Lab</td>
                                                        <td>₦67,800</td>
                                                        <td>Credit</td>
                                                        <td>2024-01-10</td>
                                                        <td><span class="badge badge-danger">Overdue</span></td>
                                                        <td>-</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-warning" onclick="sendReminder('PAY-2024-004')">
                                                                <i class="fa fa-envelope"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-info" onclick="viewPayment('PAY-2024-004')">
                                                                <i class="fa fa-eye"></i>
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
                                            <h2>Payment Summary</h2>
                                        </div>
                                    </div>
                                    <div class="full graph_revenue">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content">
                                                    <div class="payment_summary">
                                                        <div class="summary_item">
                                                            <h4>₦2,430,000</h4>
                                                            <p>Total Received</p>
                                                            <span class="badge badge-success">85.3%</span>
                                                        </div>
                                                        <div class="summary_item">
                                                            <h4>₦417,500</h4>
                                                            <p>Outstanding</p>
                                                            <span class="badge badge-warning">14.7%</span>
                                                        </div>
                                                        <div class="summary_item">
                                                            <h4>₦67,800</h4>
                                                            <p>Overdue</p>
                                                            <span class="badge badge-danger">2.4%</span>
                                                        </div>
                                                        <div class="summary_item">
                                                            <h4>₦12,500</h4>
                                                            <p>Pending</p>
                                                            <span class="badge badge-info">0.4%</span>
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
                                            <h2>Payment Methods</h2>
                                        </div>
                                    </div>
                                    <div class="full graph_revenue">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content">
                                                    <div class="payment_methods">
                                                        <div class="method_item">
                                                            <i class="fa fa-university fa-2x text-primary"></i>
                                                            <h5>Bank Transfer</h5>
                                                            <p>₦1,200,000 (49.4%)</p>
                                                        </div>
                                                        <div class="method_item">
                                                            <i class="fa fa-mobile fa-2x text-success"></i>
                                                            <h5>Mobile Money</h5>
                                                            <p>₦750,000 (30.9%)</p>
                                                        </div>
                                                        <div class="method_item">
                                                            <i class="fa fa-money fa-2x text-warning"></i>
                                                            <h5>Cash</h5>
                                                            <p>₦480,000 (19.7%)</p>
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
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        function filterPayments(type) {
            // Remove active class from all buttons
            document.querySelectorAll('.btn-group button').forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            event.target.classList.add('active');
            
            // Filter table rows based on type
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const status = row.cells[6].textContent.trim();
                let show = true;
                
                switch(type) {
                    case 'paid':
                        show = status.includes('Paid');
                        break;
                    case 'pending':
                        show = status.includes('Pending');
                        break;
                    case 'overdue':
                        show = status.includes('Overdue');
                        break;
                    case 'all':
                    default:
                        show = true;
                }
                
                row.style.display = show ? '' : 'none';
            });
        }

        function recordNewPayment() {
            alert('Opening payment recording form...');
        }

        function viewPayment(paymentId) {
            alert('Viewing payment: ' + paymentId);
        }

        function printReceipt(paymentId) {
            alert('Printing receipt for: ' + paymentId);
        }

        function confirmPayment(paymentId) {
            if(confirm('Confirm payment for: ' + paymentId + '?')) {
                alert('Payment confirmed successfully!');
            }
        }

        function sendReminder(paymentId) {
            alert('Sending payment reminder for: ' + paymentId);
        }
    </script>
    <style>
        .payment_summary {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .summary_item {
            text-align: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #007bff;
        }
        
        .summary_item h4 {
            color: #007bff;
            font-size: 1.3em;
            margin-bottom: 5px;
        }
        
        .summary_item p {
            color: #666;
            margin: 5px 0;
        }
        
        .payment_methods {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        
        .method_item {
            text-align: center;
            padding: 15px;
            margin: 5px;
            background: #f8f9fa;
            border-radius: 8px;
            min-width: 120px;
        }
        
        .method_item h5 {
            margin: 10px 0 5px 0;
            color: #333;
        }
        
        .method_item p {
            color: #666;
            margin: 0;
            font-size: 0.9em;
        }
    </style>
</body>
</html>


