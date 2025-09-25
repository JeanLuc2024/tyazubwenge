<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>System Settings - Tyazubwenge Management</title>
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
                                    <h2>System Settings</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row column1">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>General System Configuration</h2>
                                        </div>
                                        <div class="heading1 margin_0">
                                            <button class="btn btn-primary" onclick="saveSettings()">
                                                <i class="fa fa-save"></i> Save Settings
                                            </button>
                                            <button class="btn btn-success" onclick="resetSettings()">
                                                <i class="fa fa-undo"></i> Reset to Default
                                            </button>
                                        </div>
                                    </div>
                                    <div class="full graph_revenue">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content">
                                                    <form class="system_settings">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h5>Basic Settings</h5>
                                                                <div class="form-group">
                                                                    <label>System Name</label>
                                                                    <input type="text" class="form-control" value="Tyazubwenge Laboratory Management System">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Default Currency</label>
                                                                    <select class="form-control">
                                                                        <option value="NGN">Nigerian Naira (₦)</option>
                                                                        <option value="USD">US Dollar ($)</option>
                                                                        <option value="EUR">Euro (€)</option>
                                                                        <option value="GBP">British Pound (£)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Date Format</label>
                                                                    <select class="form-control">
                                                                        <option value="dd/mm/yyyy">DD/MM/YYYY</option>
                                                                        <option value="mm/dd/yyyy">MM/DD/YYYY</option>
                                                                        <option value="yyyy-mm-dd">YYYY-MM-DD</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Time Zone</label>
                                                                    <select class="form-control">
                                                                        <option value="Africa/Lagos">Africa/Lagos (GMT+1)</option>
                                                                        <option value="UTC">UTC (GMT+0)</option>
                                                                        <option value="America/New_York">America/New_York (GMT-5)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5>Laboratory Settings</h5>
                                                                <div class="form-group">
                                                                    <label>Default Unit System</label>
                                                                    <select class="form-control">
                                                                        <option value="metric">Metric (kg, g, mg, l, ml)</option>
                                                                        <option value="imperial">Imperial (lb, oz, gal, qt)</option>
                                                                        <option value="mixed">Mixed (Both systems)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Decimal Places</label>
                                                                    <input type="number" class="form-control" value="3" min="0" max="6">
                                                                    <small class="form-text text-muted">For weight and volume measurements</small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Auto-generate Batch Numbers</label>
                                                                    <div class="checkbox">
                                                                        <label><input type="checkbox" checked> Enable automatic batch number generation</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Expiry Alert Days</label>
                                                                    <input type="number" class="form-control" value="30" min="1" max="365">
                                                                    <small class="form-text text-muted">Days before expiry to send alerts</small>
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
        function saveSettings() {
            // Get all form values
            const systemName = document.querySelector('input[value="Tyazubwenge Laboratory Management System"]').value;
            const currency = document.querySelector('select').value;
            const dateFormat = document.querySelectorAll('select')[1].value;
            const timeZone = document.querySelectorAll('select')[2].value;
            const unitSystem = document.querySelectorAll('select')[3].value;
            const decimalPlaces = document.querySelector('input[type="number"]').value;
            const expiryAlertDays = document.querySelectorAll('input[type="number"]')[1].value;
            
            // Store settings in localStorage
            const settings = {
                systemName: systemName,
                currency: currency,
                dateFormat: dateFormat,
                timeZone: timeZone,
                unitSystem: unitSystem,
                decimalPlaces: decimalPlaces,
                expiryAlertDays: expiryAlertDays,
                lastUpdated: new Date().toISOString()
            };
            
            localStorage.setItem('systemSettings', JSON.stringify(settings));
            
            alert('System settings saved successfully! The changes will take effect immediately.');
        }

        function resetSettings() {
            if(confirm('Reset all settings to default values?')) {
                // Reset form to default values
                document.querySelector('input[value="Tyazubwenge Laboratory Management System"]').value = 'Tyazubwenge Laboratory Management System';
                document.querySelectorAll('select')[0].value = 'NGN';
                document.querySelectorAll('select')[1].value = 'dd/mm/yyyy';
                document.querySelectorAll('select')[2].value = 'Africa/Lagos';
                document.querySelectorAll('select')[3].value = 'metric';
                document.querySelector('input[type="number"]').value = '3';
                document.querySelectorAll('input[type="number"]')[1].value = '30';
                
                // Clear stored settings
                localStorage.removeItem('systemSettings');
                
                alert('Settings reset to default!');
            }
        }
        
        // Load saved settings on page load
        document.addEventListener('DOMContentLoaded', function() {
            const savedSettings = localStorage.getItem('systemSettings');
            if (savedSettings) {
                const settings = JSON.parse(savedSettings);
                
                // Apply saved settings to form
                if (settings.systemName) {
                    document.querySelector('input[value="Tyazubwenge Laboratory Management System"]').value = settings.systemName;
                }
                if (settings.currency) {
                    document.querySelectorAll('select')[0].value = settings.currency;
                }
                if (settings.dateFormat) {
                    document.querySelectorAll('select')[1].value = settings.dateFormat;
                }
                if (settings.timeZone) {
                    document.querySelectorAll('select')[2].value = settings.timeZone;
                }
                if (settings.unitSystem) {
                    document.querySelectorAll('select')[3].value = settings.unitSystem;
                }
                if (settings.decimalPlaces) {
                    document.querySelector('input[type="number"]').value = settings.decimalPlaces;
                }
                if (settings.expiryAlertDays) {
                    document.querySelectorAll('input[type="number"]')[1].value = settings.expiryAlertDays;
                }
            }
        });
        
        // Logout function
        async function logout() {
            if (confirm('Are you sure you want to logout?')) {
                try {
                    await fetch('api/auth/logout', { method: 'POST', credentials: 'include' });
                } catch (e) {}
                // Clear any client-side state
                localStorage.clear();
                sessionStorage.clear();
                // Redirect to login page
                window.location.href = 'login.php';
            }
        }
    </script>
    <style>
        .system_settings {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        
        .system_settings h5 {
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #007bff;
        }
        
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .checkbox-inline {
            margin-right: 15px;
        }
        
        .system_info {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .info_item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
            border-left: 4px solid #007bff;
        }
        
        .info_item h6 {
            color: #333;
            margin: 0;
            font-weight: bold;
        }
        
        .info_item p {
            color: #666;
            margin: 0;
        }
        
        .quick_actions button {
            margin-bottom: 10px;
        }
    </style>
</body>
</html>

