<!-- Standardized Sidebar Navigation for Tyazubwenge Training Center -->
<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="index.php"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="Tyazubwenge Logo" /></a>
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
            <!-- Training Programs -->
            <li>
                <a href="#training" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-graduation-cap purple_color"></i> <span>Training Programs</span>
                </a>
                <ul class="collapse list-unstyled" id="training">
                    <li><a href="training-management.php">> <span>Manage Programs</span></a></li>
                    <li><a href="customers-list.php">> <span>Student Management</span></a></li>
                </ul>
            </li>

            <!-- Products -->
            <li>
                <a href="#products" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-warehouse blue1_color"></i> <span>Products</span>
                </a>
                <ul class="collapse list-unstyled" id="products">
                    <li><a href="stock-inventory.php">> <span>Product Inventory</span></a></li>
                </ul>
            </li>

            <!-- Sales -->
            <li>
                <a href="#sales" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-shopping-cart green_color"></i> <span>Sales</span>
                </a>
                <ul class="collapse list-unstyled" id="sales">
                    <li><a href="sales-pos.php">> <span>Point of Sale</span></a></li>
                    <li><a href="reports-sales.php">> <span>Sales Reports</span></a></li>
                </ul>
            </li>

            <!-- Expiry Alerts -->
            <li>
                <a href="stock-alerts.php">
                    <i class="fa fa-exclamation-triangle yellow_color"></i> <span>Expiry Alerts</span>
                </a>
            </li>

            <!-- Reports -->
            <li>
                <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-file-text-o blue2_color"></i> <span>Reports</span>
                </a>
                <ul class="collapse list-unstyled" id="reports">
                    <li><a href="reports-sales.php">> <span>Sales Reports</span></a></li>
                    <li><a href="stock-expiry.php">> <span>Expiry Reports</span></a></li>
                </ul>
            </li>

            <!-- Profile -->
            <li>
                <a href="profile.php"><i class="fa fa-user purple_color"></i> <span>My Profile</span></a>
            </li>
        </ul>
    </div>
</nav>
