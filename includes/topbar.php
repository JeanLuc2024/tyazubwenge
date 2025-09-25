<?php
    $unread_alerts = fetchOne("SELECT COUNT(*) as count FROM alerts WHERE is_read = 0");
    $notification_count = $unread_alerts ? $unread_alerts['count'] : 0;
?>
<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="full">
            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
            <div class="logo_section">
                <a href="index.php"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
            </div>
            <div class="right_topbar">
                <div class="icon_info">
                    <ul>
                        <li><a href="#" onclick="showNotifications()"><i class="fa fa-bell-o"></i><span class="badge" id="notificationCount"><?php echo $notification_count; ?></span></a></li>
                        <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
<script>
function showNotifications() {
    // This is a placeholder. We will implement the full functionality later.
    alert('You have <?php echo $notification_count; ?> unread notifications.');
}
</script>
