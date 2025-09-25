<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - Tyazubwenge Training Center</title>
    <meta name="keywords" content="Tyazubwenge, Training Center, Laboratory Management, Admin Login">
    <meta name="description" content="Tyazubwenge Training Center - Admin Login for Laboratory Management System">
    <meta name="author" content="Tyazubwenge Training Center Ltd">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/custom.css" />
    
    <style>
        :root {
            --primary-color: #2c5530;
            --secondary-color: #4a7c59;
            --accent-color: #8fbc8f;
            --text-dark: #2c3e50;
            --text-light: #6c757d;
            --bg-light: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }
        
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            display: flex;
            min-height: 500px;
        }
        
        .login-left {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        .login-right {
            flex: 1;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .logo-section {
            margin-bottom: 2rem;
        }
        
        .logo-section i {
            font-size: 4rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }
        
        .logo-section h1 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: white;
        }
        
        .logo-section p {
            font-size: 1.1rem;
            opacity: 0.9;
            color: white;
        }
        
        .features-list {
            list-style: none;
            padding: 0;
            margin: 2rem 0;
        }
        
        .features-list li {
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
        }
        
        .features-list li i {
            margin-right: 1rem;
            color: var(--accent-color);
            width: 20px;
        }
        
        .login-form {
            width: 100%;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(44, 85, 48, 0.25);
        }
        
        .input-group {
            position: relative;
        }
        
        .input-group .form-control {
            padding-right: 3rem;
        }
        
        .input-group-text {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            background: none;
            border: none;
            color: var(--text-light);
            z-index: 3;
            display: flex;
            align-items: center;
            padding: 0 1rem;
        }
        
        .btn-login {
            background: var(--primary-color);
            border: none;
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .btn-login:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }
        
        .alert {
            border-radius: 10px;
            margin-bottom: 1rem;
        }
        
        .back-to-site {
            text-align: center;
            margin-top: 2rem;
        }
        
        .back-to-site a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-to-site a:hover {
            text-decoration: underline;
        }
        
        .loading {
            display: none;
        }
        
        .loading.show {
            display: inline-block;
        }
        
        .demo-credentials {
            background: #e3f2fd;
            border: 1px solid #2196f3;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .demo-credentials h6 {
            color: #1976d2;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        
        .demo-credentials p {
            margin: 0;
            color: #1976d2;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 400px;
            }
            
            .login-left {
                padding: 2rem;
            }
            
            .login-right {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <div class="logo-section">
                <i class="fa fa-graduation-cap"></i>
                <h1>Tyazubwenge Training Center</h1>
                <p>Management System</p>
            </div>
            <ul class="features-list">
                <li>
                    <i class="fa fa-check"></i>
                    <span>Complete Inventory Management</span>
                </li>
                <li>
                    <i class="fa fa-check"></i>
                    <span>Training Program Management</span>
                </li>
                <li>
                    <i class="fa fa-check"></i>
                    <span>Sales & Billing System</span>
                </li>
                <li>
                    <i class="fa fa-check"></i>
                    <span>Customer Management</span>
                </li>
                <li>
                    <i class="fa fa-check"></i>
                    <span>Real-time Analytics</span>
                </li>
            </ul>
        </div>
        <div class="login-right">
            <div class="login-form">
                <h2 class="text-center mb-4">Admin Login</h2>
                <p class="text-center text-muted mb-4">Sign in to access the management dashboard</p>
                
                <div class="demo-credentials">
                    <h6><i class="fa fa-info-circle"></i> Demo Credentials</h6>
                    <p><strong>Email:</strong> asdf@gmail.com<br><strong>Password:</strong> asdf</p>
                </div>
                
                <div id="alertContainer"></div>
                
                <form id="loginForm">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            <div class="input-group-text">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            <div class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">
                            Remember me
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-login" id="loginBtn">
                        <span class="loading">
                            <i class="fa fa-spinner fa-spin"></i> Signing in...
                        </span>
                        <span class="btn-text">
                            <i class="fa fa-sign-in"></i> Sign In
                        </span>
                    </button>
                </form>
                
                <div class="back-to-site">
                    <a href="index.php">
                        <i class="fa fa-arrow-left"></i> Back to Website
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script>
        // Admin credentials
        const adminCredentials = {
            email: 'asdf@gmail.com',
            password: 'asdf'
        };
        
        // Check if already logged in - REMOVED AUTO REDIRECT
        // Users should manually login each time for security
        
        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-focus on email field
            document.getElementById('email').focus();
            
            // Form submission handler
            document.getElementById('loginForm').addEventListener('submit', handleLogin);
            
            // Button click handler
            document.getElementById('loginBtn').addEventListener('click', handleLogin);
        });
        
        async function handleLogin(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const rememberMe = document.getElementById('rememberMe').checked;
            
            // Basic validation
            if (!email || !password) {
                showAlert('warning', 'Please fill in all fields');
                return;
            }
            
            // Show loading state
            showLoading(true);
            
            try {
                // Call the login API
                const response = await fetch('api/auth/login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password
                    })
                });
                
                const result = await response.json();
                
                if (result.success) {
                    // Store login status for client-side checks
                    if (rememberMe) {
                        localStorage.setItem('adminLoggedIn', 'true');
                        localStorage.setItem('adminUser', JSON.stringify(result.user));
                    } else {
                        sessionStorage.setItem('adminLoggedIn', 'true');
                        sessionStorage.setItem('adminUser', JSON.stringify(result.user));
                    }
                    
                    showAlert('success', 'Login successful! Redirecting to dashboard...');
                    
                    setTimeout(() => {
                        window.location.href = 'dashboard.php';
                    }, 1500);
                } else {
                    showAlert('danger', result.message || 'Invalid email or password. Please try again.');
                    showLoading(false);
                }
            } catch (error) {
                console.error('Login error:', error);
                showAlert('danger', 'Login failed. Please try again.');
                showLoading(false);
            }
        }
        
        function showLoading(show) {
            const loading = document.querySelector('.loading');
            const btnText = document.querySelector('.btn-text');
            const loginBtn = document.getElementById('loginBtn');
            
            if (show) {
                loading.classList.add('show');
                btnText.style.display = 'none';
                loginBtn.disabled = true;
            } else {
                loading.classList.remove('show');
                btnText.style.display = 'inline';
                loginBtn.disabled = false;
            }
        }
        
        function showAlert(type, message) {
            const alertContainer = document.getElementById('alertContainer');
            const alertHtml = `
                <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    <i class="fa fa-${type === 'success' ? 'check-circle' : type === 'warning' ? 'exclamation-triangle' : 'times-circle'}"></i>
                    ${message}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            `;
            alertContainer.innerHTML = alertHtml;
        }
    </script>
</body>
</html>
