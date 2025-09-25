<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoices & Receipts - Tyazubwenge Management</title>
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
                                    <h2>Invoices & Receipts</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row column1">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Recent Invoices</h2>
                                        </div>
                                        <div class="heading1 margin_0">
                                            <button class="btn btn-primary" onclick="createNewInvoice()">
                                                <i class="fa fa-plus"></i> New Invoice
                                            </button>
                                            <button class="btn btn-success" onclick="printSelectedInvoices()">
                                                <i class="fa fa-print"></i> Print Selected
                                            </button>
                                            <button class="btn btn-info" onclick="exportInvoices()">
                                                <i class="fa fa-download"></i> Export
                                            </button>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="selectAll"></th>
                                                        <th>Invoice No.</th>
                                                        <th>Customer</th>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th>Payment Method</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="checkbox" class="invoice-checkbox"></td>
                                                        <td>INV-2024-001</td>
                                                        <td>Dr. Sarah Johnson - University Lab</td>
                                                        <td>2024-01-15</td>
                                                        <td>₦185,000</td>
                                                        <td><span class="badge badge-success">Paid</span></td>
                                                        <td>Bank Transfer</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info" onclick="viewInvoice('INV-2024-001')">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-primary" onclick="printInvoice('INV-2024-001')">
                                                                <i class="fa fa-print"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-warning" onclick="emailInvoice('INV-2024-001')">
                                                                <i class="fa fa-envelope"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" class="invoice-checkbox"></td>
                                                        <td>INV-2024-002</td>
                                                        <td>Research Institute</td>
                                                        <td>2024-01-15</td>
                                                        <td>₦12,500</td>
                                                        <td><span class="badge badge-warning">Pending</span></td>
                                                        <td>Cash</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info" onclick="viewInvoice('INV-2024-002')">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-primary" onclick="printInvoice('INV-2024-002')">
                                                                <i class="fa fa-print"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-warning" onclick="emailInvoice('INV-2024-002')">
                                                                <i class="fa fa-envelope"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" class="invoice-checkbox"></td>
                                                        <td>INV-2024-003</td>
                                                        <td>Medical Center</td>
                                                        <td>2024-01-14</td>
                                                        <td>₦245,000</td>
                                                        <td><span class="badge badge-success">Paid</span></td>
                                                        <td>Mobile Money</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info" onclick="viewInvoice('INV-2024-003')">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-primary" onclick="printInvoice('INV-2024-003')">
                                                                <i class="fa fa-print"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-warning" onclick="emailInvoice('INV-2024-003')">
                                                                <i class="fa fa-envelope"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" class="invoice-checkbox"></td>
                                                        <td>INV-2024-004</td>
                                                        <td>Industrial Lab</td>
                                                        <td>2024-01-14</td>
                                                        <td>₦67,800</td>
                                                        <td><span class="badge badge-danger">Overdue</span></td>
                                                        <td>Credit</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info" onclick="viewInvoice('INV-2024-004')">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-primary" onclick="printInvoice('INV-2024-004')">
                                                                <i class="fa fa-print"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-warning" onclick="emailInvoice('INV-2024-004')">
                                                                <i class="fa fa-envelope"></i>
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
                                            <h2>Invoice Statistics</h2>
                                        </div>
                                    </div>
                                    <div class="full graph_revenue">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content">
                                                    <div class="stats_grid">
                                                        <div class="stat_item">
                                                            <h4>₦2,847,500</h4>
                                                            <p>Total Invoiced</p>
                                                        </div>
                                                        <div class="stat_item">
                                                            <h4>₦2,430,000</h4>
                                                            <p>Paid Amount</p>
                                                        </div>
                                                        <div class="stat_item">
                                                            <h4>₦417,500</h4>
                                                            <p>Outstanding</p>
                                                        </div>
                                                        <div class="stat_item">
                                                            <h4>85.3%</h4>
                                                            <p>Collection Rate</p>
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
                                                        <button class="btn btn-block btn-primary mb-2" onclick="createNewInvoice()">
                                                            <i class="fa fa-plus"></i> Create New Invoice
                                                        </button>
                                                        <button class="btn btn-block btn-info mb-2" onclick="bulkEmailInvoices()">
                                                            <i class="fa fa-envelope"></i> Send Reminders
                                                        </button>
                                                        <button class="btn btn-block btn-warning mb-2" onclick="generateInvoiceReport()">
                                                            <i class="fa fa-file-pdf"></i> Generate Report
                                                        </button>
                                                        <button class="btn btn-block btn-success mb-2" onclick="reconcilePayments()">
                                                            <i class="fa fa-check"></i> Reconcile Payments
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
        // Select all functionality
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.invoice-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        function createNewInvoice() {
            alert('Opening new invoice creation form...');
        }

        function printSelectedInvoices() {
            const selected = document.querySelectorAll('.invoice-checkbox:checked');
            if (selected.length === 0) {
                alert('Please select invoices to print');
                return;
            }
            alert('Printing ' + selected.length + ' selected invoices...');
        }

        function exportInvoices() {
            alert('Exporting invoices to Excel...');
        }

        function viewInvoice(invoiceNo) {
            alert('Opening invoice: ' + invoiceNo);
        }

        function printInvoice(invoiceNo) {
            alert('Printing invoice: ' + invoiceNo);
        }

        function emailInvoice(invoiceNo) {
            alert('Emailing invoice: ' + invoiceNo);
        }

        function bulkEmailInvoices() {
            alert('Sending payment reminders to customers...');
        }

        function generateInvoiceReport() {
            alert('Generating invoice report...');
        }

        function reconcilePayments() {
            alert('Opening payment reconciliation...');
        }
    </script>
    <style>
        .stats_grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .stat_item {
            text-align: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        
        .stat_item h4 {
            color: #007bff;
            font-size: 1.5em;
            margin-bottom: 5px;
        }
        
        .stat_item p {
            color: #666;
            margin: 0;
        }
        
        .quick_actions button {
            margin-bottom: 10px;
        }
    </style>
</body>
</html>


