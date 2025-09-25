<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Management - Tyazubwenge Management</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/custom.css" />
</head>
<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
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
                                    <h2>Customer Management</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="dashboard-card">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4>Customer Database</h4>
                                        <div>
                                            <button class="btn btn-primary btn-modern mr-2" data-toggle="modal" data-target="#addCustomerModal">
                                                <i class="fa fa-plus"></i> Add Customer
                                            </button>
                                            <button class="btn btn-secondary btn-modern" onclick="printCustomerTable()">
                                                <i class="fa fa-print"></i> Print
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Customer Stats -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="stat-card">
                                    <div class="stat-number">156</div>
                                    <div class="stat-label">Total Customers</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stat-card">
                                    <div class="stat-number">89</div>
                                    <div class="stat-label">Active Customers</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stat-card">
                                    <div class="stat-number">₦2.4M</div>
                                    <div class="stat-label">Total Credit</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stat-card">
                                    <div class="stat-number">23</div>
                                    <div class="stat-label">New This Month</div>
                                </div>
                            </div>
                        </div>

                        <!-- Search and Filters -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="dashboard-card">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Search Customer</label>
                                                <input type="text" class="form-control" placeholder="Search by name, email, or phone...">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control">
                                                    <option>All</option>
                                                    <option>Active</option>
                                                    <option>Inactive</option>
                                                    <option>Credit Hold</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Customer Type</label>
                                                <select class="form-control">
                                                    <option>All</option>
                                                    <option>Individual</option>
                                                    <option>Business</option>
                                                    <option>Institution</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <button class="btn btn-primary btn-block">Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Customer Table -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dashboard-card">
                                    <div class="table-responsive">
                                        <table class="table table-modern">
                                            <thead>
                                                <tr>
                                                    <th>Customer ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Type</th>
                                                    <th>Total Purchases</th>
                                                    <th>Credit Balance</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>CUST-001</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="images/layout_img/user_img.jpg" class="rounded-circle mr-2" width="30" height="30">
                                                            Dr. Sarah Johnson
                                                        </div>
                                                    </td>
                                                    <td>sarah.johnson@email.com</td>
                                                    <td>+234 801 234 5678</td>
                                                    <td>Individual</td>
                                                    <td>₦1,250,000</td>
                                                    <td>₦0</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                                        <button class="btn btn-sm btn-outline-info">View</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CUST-002</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="images/layout_img/user_img.jpg" class="rounded-circle mr-2" width="30" height="30">
                                                            University Laboratory
                                                        </div>
                                                    </td>
                                                    <td>lab@university.edu</td>
                                                    <td>+234 802 345 6789</td>
                                                    <td>Institution</td>
                                                    <td>₦5,800,000</td>
                                                    <td>₦150,000</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                                        <button class="btn btn-sm btn-outline-info">View</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CUST-003</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="images/layout_img/user_img.jpg" class="rounded-circle mr-2" width="30" height="30">
                                                            Research Center Ltd
                                                        </div>
                                                    </td>
                                                    <td>orders@researchcenter.com</td>
                                                    <td>+234 803 456 7890</td>
                                                    <td>Business</td>
                                                    <td>₦890,000</td>
                                                    <td>₦45,000</td>
                                                    <td><span class="badge badge-warning">Credit Hold</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                                        <button class="btn btn-sm btn-outline-info">View</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CUST-004</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="images/layout_img/user_img.jpg" class="rounded-circle mr-2" width="30" height="30">
                                                            Dr. Michael Brown
                                                        </div>
                                                    </td>
                                                    <td>michael.brown@clinic.com</td>
                                                    <td>+234 804 567 8901</td>
                                                    <td>Individual</td>
                                                    <td>₦125,000</td>
                                                    <td>₦0</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                                        <button class="btn btn-sm btn-outline-info">View</button>
                                                    </td>
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

    <!-- Add Customer Modal -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Customer</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addCustomerForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name *</label>
                                    <input type="text" class="form-control" name="firstName" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name *</label>
                                    <input type="text" class="form-control" name="lastName" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone *</label>
                                    <input type="tel" class="form-control" name="phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Customer Type *</label>
                                    <select class="form-control" name="type" required>
                                        <option>Individual</option>
                                        <option>Business</option>
                                        <option>Institution</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" rows="3" name="address"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Discount Rate (%)</label>
                                    <input type="number" class="form-control" name="discount" placeholder="0" min="0" max="100">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="addCustomerSubmit">Add Customer</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/calendar.min.js"></script>
    <script src="js/perfect-scrollbar.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        // Check authentication
        if (!localStorage.getItem('adminLoggedIn') && !sessionStorage.getItem('adminLoggedIn')) {
            window.location.href = 'login.php';
        }
        
        // Logout function
        async function logout() {
            try { await fetch('/api/auth/logout', { method: 'POST', credentials: 'include' }); } catch(e) {}
            localStorage.removeItem('adminLoggedIn');
            sessionStorage.removeItem('adminLoggedIn');
            window.location.href = 'login.php';
        }
        
        // Sidebar toggle
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
        
        // Print current customer table
        function printCustomerTable() {
            window.print();
        }
        
        // Add Customer submit handler (front-end only)
        document.addEventListener('DOMContentLoaded', () => {
            const submitBtn = document.getElementById('addCustomerSubmit');
            if (!submitBtn) return;
            submitBtn.addEventListener('click', () => {
                const form = document.getElementById('addCustomerForm');
                const data = Object.fromEntries(new FormData(form).entries());
                if (!data.firstName || !data.lastName || !data.email || !data.phone || !data.type) {
                    alert('Please fill in all required fields');
                    return;
                }
                // Send to API
                fetch('api/customers/create.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        alert('Customer added successfully!');
                        $('#addCustomerModal').modal('hide');
                        form.reset();
                        loadCustomers(); // Reload the table
                    } else {
                        alert('Error: ' + result.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error adding customer: ' + error.message);
                });
            });
        });
        
        // Load customers function
        function loadCustomers() {
            fetch('api/customers/list.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const tbody = document.querySelector('table.table-modern tbody');
                    if (tbody) {
                        tbody.innerHTML = '';
                        data.data.forEach(customer => {
                            const row = document.createElement('tr');
                            row.setAttribute('data-customer-id', customer.id);
                            row.innerHTML = `
                                <td>CUST-${customer.id.toString().padStart(3, '0')}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="images/layout_img/user_img.jpg" class="rounded-circle mr-2" width="30" height="30">
                                        ${customer.first_name} ${customer.last_name}
                                    </div>
                                </td>
                                <td>${customer.email}</td>
                                <td>${customer.phone}</td>
                                <td>${customer.customer_type}</td>
                                <td>RWF 0</td>
                                <td>RWF 0</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="editCustomer(${customer.id})">Edit</button>
                                    <button class="btn btn-sm btn-outline-info" onclick="viewCustomer(${customer.id})">View</button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="deleteCustomer(${customer.id})">Delete</button>
                                </td>`;
                            tbody.appendChild(row);
                        });
                    }
                } else {
                    console.error('Error loading customers:', data.message);
                }
            })
            .catch(error => {
                console.error('Error loading customers:', error);
            });
        }
        
        // Load customers on page load
        window.addEventListener('load', function() {
            loadCustomers();
        });
        
        // Edit customer function
        function editCustomer(customerId) {
            // For now, show a simple edit form
            const newName = prompt('Enter new customer name:', 'John Doe');
            const newEmail = prompt('Enter new email:', 'john@example.com');
            const newPhone = prompt('Enter new phone:', '+250-123-456-789');
            
            if (newName && newEmail && newPhone) {
                // Update the row in the table
                const row = document.querySelector(`tr[data-customer-id="${customerId}"]`);
                if (row) {
                    const cells = row.querySelectorAll('td');
                    cells[1].querySelector('div').textContent = newName;
                    cells[2].textContent = newEmail;
                    cells[3].textContent = newPhone;
                }
                alert('Customer updated successfully!');
            }
        }
        
        // Update customer function
        function updateCustomer(row, customerId) {
            const form = document.getElementById('addCustomerForm');
            const data = Object.fromEntries(new FormData(form).entries());
            
            if (!data.firstName || !data.lastName || !data.email || !data.phone || !data.type) {
                alert('Please fill in all required fields');
                return;
            }
            
            // Update the row
            const cells = row.querySelectorAll('td');
            cells[1].querySelector('div').innerHTML = `
                <img src="images/layout_img/user_img.jpg" class="rounded-circle mr-2" width="30" height="30">
                ${data.firstName} ${data.lastName}
            `;
            cells[2].textContent = data.email;
            cells[3].textContent = data.phone;
            cells[4].textContent = data.type;
            
            // Close modal and reset form
            $('#addCustomerModal').modal('hide');
            form.reset();
            
            // Reset modal title and button
            document.querySelector('#addCustomerModal .modal-title').textContent = 'Add New Customer';
            document.querySelector('#addCustomerModal .btn-primary').textContent = 'Add Customer';
            document.querySelector('#addCustomerModal .btn-primary').onclick = function() {
                document.getElementById('addCustomerSubmit').click();
            };
            
            alert('Customer updated successfully!');
        }
        
        // View customer function
        function viewCustomer(customerId) {
            const row = document.querySelector(`tr[data-customer-id="${customerId}"]`);
            if (row) {
                const cells = row.querySelectorAll('td');
                const name = cells[1].querySelector('div').textContent.trim();
                const email = cells[2].textContent;
                const phone = cells[3].textContent;
                const type = cells[4].textContent;
                const totalPurchases = cells[5].textContent;
                const creditBalance = cells[6].textContent;
                const status = cells[7].querySelector('span').textContent;
                
                alert(`Customer Details:\n\nID: ${customerId}\nName: ${name}\nEmail: ${email}\nPhone: ${phone}\nType: ${type}\nTotal Purchases: ${totalPurchases}\nCredit Balance: ${creditBalance}\nStatus: ${status}`);
            }
        }
        
        function deleteCustomer(customerId) {
            if (confirm('Are you sure you want to delete this customer?')) {
                const row = document.querySelector(`tr[data-customer-id="${customerId}"]`);
                if (row) {
                    row.remove();
                    alert('Customer deleted successfully!');
                }
            }
        }
        
        // Notification functions
        function showNotifications() {
            alert('Notifications:\n\n• New customer registration\n• Low stock alert for chemicals\n• Monthly report ready for review');
        }
        
        function showMessages() {
            alert('Messages:\n\n• New inquiry from potential customer\n• Training program enrollment request');
        }
    </script>
</body>
</html>


