<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- site metas -->
    <title>Tyazubwenge Dashboard - Training Center Management</title>
    <meta name="keywords" content="Tyazubwenge, Training Center, Laboratory Management, Dashboard">
    <meta name="description" content="Tyazubwenge Training Center - Laboratory Management Dashboard">
    <meta name="author" content="Tyazubwenge Training Center Ltd">
    <!-- site icon -->
    <link rel="icon" href="images/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
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
                                    <h2>Dashboard</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row column1">
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div> 
                                            <i class="fa fa-flask yellow_color"></i>
                                        </div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no">2,847</p>
                                            <p class="head_couter">Laboratory Products</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div> 
                                            <i class="fa fa-shopping-cart blue1_color"></i>
                                        </div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no">₦3.2M</p>
                                            <p class="head_couter">Today's Sales</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div> 
                                            <i class="fa fa-exclamation-triangle green_color"></i>
                                        </div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no">47</p>
                                            <p class="head_couter">Low Stock Alerts</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div> 
                                            <i class="fa fa-calendar-times red_color"></i>
                                        </div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no">12</p>
                                            <p class="head_couter">Expiring Soon</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row column1 business_metrics_section">
                            <div class="col-md-6 col-lg-3">
                                <div class="full socile_icons fb margin_bottom_30">
                                    <div class="social_icon">
                                        <i class="fa fa-chart-line"></i>
                                    </div>
                                    <div class="social_cont">
                                        <ul>
                                            <li>
                                                <span><strong>₦67.8M</strong></span>
                                                <span>Monthly Revenue</span>
                                            </li>
                                            <li>
                                                <span><strong>+18.3%</strong></span>
                                                <span>vs Last Month</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="full socile_icons tw margin_bottom_30">
                                    <div class="social_icon">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <div class="social_cont">
                                        <ul>
                                            <li>
                                                <span><strong>156</strong></span>
                                                <span>Training Programs</span>
                                            </li>
                                            <li>
                                                <span><strong>23</strong></span>
                                                <span>New This Month</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="full socile_icons linked margin_bottom_30">
                                    <div class="social_icon">
                                        <i class="fa fa-truck"></i>
                                    </div>
                                    <div class="social_cont">
                                        <ul>
                                            <li>
                                                <span><strong>42</strong></span>
                                                <span>Active Suppliers</span>
                                            </li>
                                            <li>
                                                <span><strong>96.8%</strong></span>
                                                <span>On-Time Delivery</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="full socile_icons google_p margin_bottom_30">
                                    <div class="social_icon">
                                        <i class="fa fa-balance-scale"></i>
                                    </div>
                                    <div class="social_cont">
                                        <ul>
                                            <li>
                                                <span><strong>₦12.4M</strong></span>
                                                <span>Inventory Value</span>
                                            </li>
                                            <li>
                                                <span><strong>₦8.2M</strong></span>
                                                <span>Pending Orders</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- graph -->
                        <div class="row column2 graph margin_bottom_30">
                            <div class="col-md-l2 col-lg-12">
                                <div class="white_shd full">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Training Center Sales Analytics - Last 30 Days</h2>
                                        </div>
                                    </div>
                                    <div class="full graph_revenue">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content">
                                                    <div class="no-chart-message">
                                                        <h5>Sales Analytics Data</h5>
                                                        <p>Chart visualization has been disabled. Use the reports section for detailed analysis.</p>
                                                        <div class="row mt-4">
                                                            <div class="col-md-3">
                                                                <div class="text-center">
                                                                    <h4 class="text-primary">₦2.1M</h4>
                                                                    <p>Training Revenue</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-center">
                                                                    <h4 class="text-success">₦1.8M</h4>
                                                                    <p>Equipment Sales</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-center">
                                                                    <h4 class="text-info">₦0.9M</h4>
                                                                    <p>Chemical Sales</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-center">
                                                                    <h4 class="text-warning">₦0.4M</h4>
                                                                    <p>Other Services</p>
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
                        <!-- end graph -->
                        <div class="row column3">
                            <!-- Recent Sales -->
                            <div class="col-md-6">
                                <div class="dark_bg full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Recent Sales</h2>
                                        </div>
                                    </div>
                                    <div class="full graph_revenue">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content">
                                                    <div class="recent_sales_list">
                                                        <div class="sale_item">
                                                            <div class="sale_info">
                                                                <h6>Detergent Making Training</h6>
                                                                <p>Student: Sarah Johnson - Lagos Branch</p>
                                                                <span class="sale_amount">₦25,000</span>
                                                            </div>
                                                            <div class="sale_time">1 hour ago</div>
                                                        </div>
                                                        <div class="sale_item">
                                                            <div class="sale_info">
                                                                <h6>Analytical Balance (2.5kg)</h6>
                                                                <p>Customer: University Lab</p>
                                                                <span class="sale_amount">₦185,000</span>
                                                            </div>
                                                            <div class="sale_time">3 hours ago</div>
                                                        </div>
                                                        <div class="sale_item">
                                                            <div class="sale_info">
                                                                <h6>Gin Production Training</h6>
                                                                <p>Student: Michael Adebayo</p>
                                                                <span class="sale_amount">₦35,000</span>
                                                            </div>
                                                            <div class="sale_time">5 hours ago</div>
                                                        </div>
                                                        <div class="sale_item">
                                                            <div class="sale_info">
                                                                <h6>Safety Equipment Set</h6>
                                                                <p>Customer: Industrial Lab</p>
                                                                <span class="sale_amount">₦67,800</span>
                                                            </div>
                                                            <div class="sale_time">7 hours ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end recent sales -->
                            <!-- Stock Status -->
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Stock Status</h2>
                                        </div>
                                    </div>
                                    <div class="full progress_bar_inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="progress_bar">
                                                    <!-- Laboratory Products Stock Levels -->
                                                    <span class="skill" style="width:78%;">In Stock (kg/g/mg) <span class="info_valume">78%</span></span>                  
                                                    <div class="progress skill-bar ">
                                                        <div class="progress-bar progress-bar-animated progress-bar-striped bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
                                                        </div>
                                                    </div>
                                                    <span class="skill" style="width:15%;">Low Stock Alert <span class="info_valume">15%</span></span>   
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-animated progress-bar-striped bg-warning" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%;">
                                                        </div>
                                                    </div>
                                                    <span class="skill" style="width:5%;">Expiring Soon <span class="info_valume">5%</span></span>
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-animated progress-bar-striped bg-danger" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                                        </div>
                                                    </div>
                                                    <span class="skill" style="width:2%;">Out of Stock <span class="info_valume">2%</span></span>
                                                    <div class="progress skill-bar">
                                                        <div class="progress-bar progress-bar-animated progress-bar-striped bg-dark" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end stock status -->
                        </div>
                        <div class="row column4 graph">
                            <div class="col-md-12">
                                <div class="dash_blog">
                                    <div class="dash_blog_inner">
                                        <div class="dash_head">
                                            <h3><span><i class="fa fa-bell"></i> System Alerts</span><span class="plus_green_bt"><a href="#" onclick="markAllRead()">✓</a></span></h3>
                                        </div>
                                        <div class="list_cont">
                                            <p>Training Center Management Notifications</p>
                                        </div>
                                        <div class="msg_list_main">
                                            <ul class="msg_list">
                                                <li>
                                                    <span><i class="fa fa-exclamation-triangle text-warning fa-2x"></i></span>
                                                    <span>
                                                    <span class="name_user">Low Stock Alert</span>
                                                    <span class="msg_user">Sodium Chloride (500g) - Only 2.5kg remaining</span>
                                                    <span class="time_ago">5 min ago</span>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span><i class="fa fa-calendar-times text-danger fa-2x"></i></span>
                                                    <span>
                                                    <span class="name_user">Expiry Warning</span>
                                                    <span class="msg_user">Hydrochloric Acid expires in 3 days</span>
                                                    <span class="time_ago">15 min ago</span>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span><i class="fa fa-truck text-info fa-2x"></i></span>
                                                    <span>
                                                    <span class="name_user">Delivery Update</span>
                                                    <span class="msg_user">New shipment from Lab Supplies Ltd arrived</span>
                                                    <span class="time_ago">1 hour ago</span>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span><i class="fa fa-chart-line text-success fa-2x"></i></span>
                                                    <span>
                                                    <span class="name_user">Sales Milestone</span>
                                                    <span class="msg_user">Monthly target achieved - ₦67.8M revenue</span>
                                                    <span class="time_ago">2 hours ago</span>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="read_more">
                                            <div class="center"><a class="main_bt read_bt" href="#" onclick="showAllAlerts()">View All Alerts</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer -->
                    <div class="container-fluid">
                        <div class="footer">
                            <p>Copyright © 2025 Designed by Luc Investment LTD. All rights reserved.<br><br>
                               Chemical Manufacturing Education & Laboratory Equipment Supply
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="js/animate.js"></script>
    <!-- select country -->
    <script src="js/bootstrap-select.js"></script>
    <!-- owl carousel -->
    <script src="js/owl.carousel.js"></script> 
    <!-- chart js removed -->
    <script src="js/utils.js"></script>
    <script src="js/analyser.js"></script>
    <!-- nice scrollbar -->
    <script src="js/perfect-scrollbar.min.js"></script>
    <script>
        // Initialize Perfect Scrollbar
        var ps = new PerfectScrollbar('#sidebar');
        
        // Check authentication status
        if (!localStorage.getItem('adminLoggedIn') && !sessionStorage.getItem('adminLoggedIn')) {
            window.location.href = 'login.php';
        }
        
        // Sidebar toggle
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
        
        // Update notification count automatically
        async function updateNotificationCount() {
            try {
                const response = await fetch('api/alerts/list?limit=1', { credentials: 'include' });
                if (response.ok) {
                    const data = await response.json();
                    const totalAlerts = data.total || 0;
                    document.getElementById('notificationCount').textContent = totalAlerts;
                }
            } catch (e) {
                console.error('Failed to update notification count:', e);
            }
        }

        // Notification functions
        async function showNotifications() {
            try {
                // Fetch actual alert count
                const response = await fetch('api/alerts/list?limit=1', { credentials: 'include' });
                if (response.ok) {
                    const data = await response.json();
                    const totalAlerts = data.total || 0;
                    document.getElementById('notificationCount').textContent = totalAlerts;

                    alert(`Stock Alerts:\n\n• ${totalAlerts} Active alerts\n• Check stock-alerts.php for details`);
                } else {
                    // Fallback to static
                    const stockAlerts = 47;
                    const expiryAlerts = 12;
                    const totalAlerts = stockAlerts + expiryAlerts;
                    document.getElementById('notificationCount').textContent = totalAlerts;

                    alert(`Stock Alerts:\n\n• ${stockAlerts} Low stock alerts\n• ${expiryAlerts} Products expiring soon\n• Check stock-alerts.php for details`);
                }
            } catch (e) {
                console.error('Failed to fetch alerts:', e);
                alert('Unable to load notifications. Please check your connection.');
            }
        }
        
        function showMessages() {
            alert('Messages:\n\n• New inquiry from potential student\n• Supplier delivery confirmation\n• Training program feedback received');
        }
        
        function showHelp() {
            alert('Help & Support:\n\n• Contact: +234-801-234-5678\n• Email: info@tyazubwenge.com\n• Training Programs: Check Training Programs section\n• Inventory Management: Use Stock Inventory page\n• Reports: Access Sales Reports for analytics');
        }
        
        
        function markAllRead() {
            document.getElementById('notificationCount').textContent = '0';
            alert('All notifications marked as read');
        }
        
        function showAllAlerts() {
            alert('All System Alerts:\n\n• 3 Low stock alerts\n• 2 Expiry warnings\n• 1 Delivery update\n• 1 Sales milestone');
        }
        
        // Update notification count on load and every 5 minutes
        updateNotificationCount();
        setInterval(updateNotificationCount, 300000);
        
        // Initialize tooltips
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script>
    // Standardized logout: call API, clear storage, redirect to login
    async function logout() {
      try {
        await fetch('api/auth/logout', { method: 'POST', credentials: 'include' });
      } catch (e) {}
      sessionStorage.clear();
      localStorage.clear();
      window.location.href = 'login.php';
    }
    </script>
    <style>
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
        
        .recent_sales_list .sale_item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .recent_sales_list .sale_item:last-child {
            border-bottom: none;
        }
        
        .recent_sales_list .sale_info h6 {
            color: white;
            margin: 0 0 5px 0;
            font-size: 14px;
        }
        
        .recent_sales_list .sale_info p {
            color: rgba(255,255,255,0.7);
            margin: 0 0 5px 0;
            font-size: 12px;
        }
        
        .recent_sales_list .sale_amount {
            color: #1ed085;
            font-weight: bold;
            font-size: 14px;
        }
        
        .recent_sales_list .sale_time {
            color: rgba(255,255,255,0.5);
            font-size: 11px;
        }
    </style>
</body>
</html>
