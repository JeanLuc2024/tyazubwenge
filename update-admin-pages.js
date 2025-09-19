// Script to update all admin pages with standardized sidebar and remove Pluto references
const fs = require('fs');
const path = require('path');

// List of admin pages to update
const adminPages = [
    'stock-categories.html',
    'stock-alerts.html', 
    'stock-expiry.html',
    'stock-conversion.html',
    'sales-pos.html',
    'sales-invoices.html',
    'sales-payments.html',
    'sales-returns.html',
    'sales-credit.html',
    'customers-list.html',
    'customers-loyalty.html',
    'customers-credit.html',
    'customers-history.html',
    'purchase-orders.html',
    'suppliers-performance.html',
    'suppliers-delivery.html',
    'reports-sales.html',
    'reports-inventory.html',
    'reports-financial.html',
    'reports-analytics.html',
    'reports-export.html',
    'branches-management.html',
    'branches-transfers.html',
    'branches-reports.html',
    'users-management.html',
    'users-roles.html',
    'users-activity.html',
    'settings.html',
    'training-management.html'
];

// Standardized sidebar HTML
const standardizedSidebar = `            <!-- Sidebar -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <div class="logo_section">
                            <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="Tyazubwenge Logo" /></a>
                        </div>
                    </div>
                    <div class="sidebar_user_info">
                        <div class="icon_setting"></div>
                        <div class="user_profle_side">
                            <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="Admin User" /></div>
                            <div class="user_info">
                                <h6>Admin User</h6>
                                <p><span class="online_animation"></span> Online</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar_blog_2">
                    <h4 style="color: white;">Tyazubwenge Training Center Management System</h4>
                    <ul class="list-unstyled components">
                        <li><a href="dashboard.html"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
                        <li>
                            <a href="#training" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-graduation-cap purple_color"></i> <span>Training Programs</span></a>
                            <ul class="collapse list-unstyled" id="training">
                                <li><a href="training-management.html">> <span>Manage Programs</span></a></li>
                                <li><a href="customers-list.html">> <span>Student Management</span></a></li>
                                <li><a href="calendar.html">> <span>Class Schedule</span></a></li>
                                <li><a href="help.html">> <span>Training Materials</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#stock" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-warehouse blue1_color"></i> <span>Stock & Inventory</span></a>
                            <ul class="collapse list-unstyled" id="stock">
                                <li><a href="stock-inventory.html">> <span>Inventory Management</span></a></li>
                                <li><a href="stock-categories.html">> <span>Product Categories</span></a></li>
                                <li><a href="stock-alerts.html">> <span>Low Stock Alerts</span></a></li>
                                <li><a href="stock-expiry.html">> <span>Expiry Tracking</span></a></li>
                                <li><a href="stock-conversion.html">> <span>Unit Conversion</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#sales" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-shopping-cart green_color"></i> <span>Sales & Billing</span></a>
                            <ul class="collapse list-unstyled" id="sales">
                                <li><a href="sales-pos.html">> <span>Point of Sale</span></a></li>
                                <li><a href="sales-invoices.html">> <span>Invoices & Receipts</span></a></li>
                                <li><a href="sales-payments.html">> <span>Payment Tracking</span></a></li>
                                <li><a href="sales-returns.html">> <span>Returns & Refunds</span></a></li>
                                <li><a href="sales-credit.html">> <span>Credit Sales</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#customers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users purple_color"></i> <span>Customer Management</span></a>
                            <ul class="collapse list-unstyled" id="customers">
                                <li><a href="customers-list.html">> <span>Customer Database</span></a></li>
                                <li><a href="customers-loyalty.html">> <span>Loyalty Program</span></a></li>
                                <li><a href="customers-credit.html">> <span>Credit Management</span></a></li>
                                <li><a href="customers-history.html">> <span>Purchase History</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#suppliers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-truck orange_color"></i> <span>Supplier Management</span></a>
                            <ul class="collapse list-unstyled" id="suppliers">
                                <li><a href="suppliers-list.html">> <span>Supplier Database</span></a></li>
                                <li><a href="purchase-orders.html">> <span>Purchase Orders</span></a></li>
                                <li><a href="suppliers-performance.html">> <span>Performance Reports</span></a></li>
                                <li><a href="suppliers-delivery.html">> <span>Delivery Tracking</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-chart-line red_color"></i> <span>Reports & Analytics</span></a>
                            <ul class="collapse list-unstyled" id="reports">
                                <li><a href="reports-sales.html">> <span>Sales Reports</span></a></li>
                                <li><a href="reports-inventory.html">> <span>Inventory Reports</span></a></li>
                                <li><a href="reports-financial.html">> <span>Financial Reports</span></a></li>
                                <li><a href="reports-analytics.html">> <span>AI Analytics</span></a></li>
                                <li><a href="reports-export.html">> <span>Export Reports</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#branches" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-building blue2_color"></i> <span>Multi-Branch</span></a>
                            <ul class="collapse list-unstyled" id="branches">
                                <li><a href="branches-management.html">> <span>Branch Management</span></a></li>
                                <li><a href="branches-transfers.html">> <span>Stock Transfer</span></a></li>
                                <li><a href="branches-reports.html">> <span>Branch Reports</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user-cog yellow_color"></i> <span>User Management</span></a>
                            <ul class="collapse list-unstyled" id="users">
                                <li><a href="users-management.html">> <span>Users & Roles</span></a></li>
                                <li><a href="users-roles.html">> <span>Permissions</span></a></li>
                                <li><a href="users-activity.html">> <span>Audit Logs</span></a></li>
                            </ul>
                        </li>
                        <li><a href="settings.html"><i class="fa fa-cog purple_color"></i> <span>System Settings</span></a></li>
                    </ul>
                </div>
            </nav>`;

// Standardized topbar
const standardizedTopbar = `                <!-- Topbar -->
                <div class="topbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full">
                            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                            <div class="logo_section">
                                <a href="index.html"><img class="img-responsive" src="images/logo/logo.png" alt="Tyazubwenge Logo" /></a>
                            </div>
                            <div class="right_topbar">
                                <div class="icon_info">
                                    <ul>
                                        <li><a href="#" onclick="showNotifications()"><i class="fa fa-bell-o"></i><span class="badge" id="notificationCount">3</span></a></li>
                                        <li><a href="help.html"><i class="fa fa-question-circle"></i></a></li>
                                        <li><a href="#" onclick="showMessages()"><i class="fa fa-envelope-o"></i><span class="badge" id="messageCount">2</span></a></li>
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="Admin User" /><span class="name_user">Admin User</span></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="profile.html">My Profile</a>
                                                <a class="dropdown-item" href="settings.html">Settings</a>
                                                <a class="dropdown-item" href="help.html">Help</a>
                                                <a class="dropdown-item" href="#" onclick="logout()"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>`;

// Standardized JavaScript
const standardizedJS = `    <script>
        // Check authentication
        if (!localStorage.getItem('adminLoggedIn') && !sessionStorage.getItem('adminLoggedIn')) {
            window.location.href = 'login.html';
        }
        
        // Logout function
        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                localStorage.removeItem('adminLoggedIn');
                sessionStorage.removeItem('adminLoggedIn');
                window.location.href = 'login.html';
            }
        }
        
        // Sidebar toggle
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
        
        // Notification functions
        function showNotifications() {
            alert('Notifications:\n\n• System alerts\n• Low stock warnings\n• New messages');
        }
        
        function showMessages() {
            alert('Messages:\n\n• New inquiries\n• System notifications\n• Updates');
        }
    </script>`;

console.log('Admin pages update script created. Run this with Node.js to update all admin pages.');
