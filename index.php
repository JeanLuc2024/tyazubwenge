<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tyazubwenge Training Center - Detergent Making & Chemical Products Training</title>
    <meta name="keywords" content="detergent making, chemical training, gin making, oil production, shoe polish, laboratory equipment, training center, Nigeria">
    <meta name="description" content="Tyazubwenge Training Center - Learn to make detergents, gin, oils, shoe polish and more! We sell products and teach skills for chemical manufacturing and laboratory work in Nigeria.">
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
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }
        
        /* Navigation */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white !important;
        }
        
        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover {
            color: var(--accent-color) !important;
            transform: translateY(-2px);
        }
        
        .btn-login {
            background: var(--accent-color);
            border: none;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-2px);
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: green;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
            color: var(--text-light);
            margin-bottom: 2rem;
            font-weight: 300;
        }
        
        .hero-description {
            font-size: 1.1rem;
            color: var(--text-dark);
            margin-bottom: 2.5rem;
            line-height: 1.8;
        }
        
        .hero-stats {
            display: flex;
            gap: 2rem;
            margin-bottom: 2.5rem;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
            display: block;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .btn-primary-custom {
            background: var(--primary-color);
            border: none;
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary-custom:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(44, 85, 48, 0.3);
            color: white;
            text-decoration: none;
        }
        
        .btn-outline-custom {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-outline-custom:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px);
            text-decoration: none;
        }
        
        .hero-image {
            position: relative;
            z-index: 2;
        }
        
        .hero-image img {
            width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .experience-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--primary-color);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            font-weight: bold;
            font-size: 0.9rem;
        }
        
        /* Products Section */
        .products-section {
            padding: 80px 0;
            background: white;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .section-title p {
            font-size: 1.2rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .product-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid #f0f0f0;
        }
        
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .product-image {
            width: 100%;
            height: 200px;
            background: var(--bg-light);
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: var(--primary-color);
        }
        
        .product-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .product-description {
            color: var(--text-light);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }
        
        .product-features {
            margin-bottom: 1.5rem;
        }
        
        .product-features .feature {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            color: var(--text-dark);
        }
        
        .product-features .feature i {
            color: var(--accent-color);
            margin-right: 0.5rem;
            width: 16px;
        }
        
        .product-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .btn-add-to-cart {
            background: var(--accent-color);
            border: none;
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .btn-add-to-cart:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        /* Categories Section */
        .categories-section {
            padding: 80px 0;
            background: var(--bg-light);
        }
        
        .category-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .category-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .category-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .category-count {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        /* Footer */
        .footer {
            background: var(--primary-color);
            color: white;
            padding: 60px 0 30px;
        }
        
        .footer h5 {
            color: white;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        
        .footer p, .footer a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer a:hover {
            color: white;
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 2rem;
            padding-top: 2rem;
            text-align: center;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-stats {
                flex-direction: column;
                gap: 1rem;
            }
            
            .hero-buttons {
                flex-direction: column;
            }
            
            .btn-primary-custom, .btn-outline-custom {
                text-align: center;
            }
        }
        
        /* Cart Modal */
        .cart-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
        }
        
        .cart-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 2rem;
            border-radius: 15px;
            max-width: 500px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
        }
        
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
        }
        
        .cart-total {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fa fa-graduation-cap"></i> Tyazubwenge Training Center
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#training">Training</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#categories">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="openCart()">
                            <i class="fa fa-shopping-cart"></i> Cart (<span id="cart-count">0</span>)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-login" href="login.php">Admin Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title" style="color: var(--primary-color); text-shadow: 8px 8px 6px rgba(0,0,0,0.3);">Welcome to Tyazubwenge Training Center</h1>
                        <p class="hero-subtitle">Learn to make detergents, gin, oils, and more! We sell products and teach skills for chemical manufacturing</p>
                        <p class="hero-description">
                            We are Nigeria's leading training center for chemical manufacturing and detergent production. 
                            With over 30 years of experience, we <strong>TEACH</strong> you how to make detergents, gin, oils, shoe polish, 
                            paint, air fresheners, and other chemical products while <strong>SELLING</strong> all the necessary equipment and raw materials.
                        </p>
                        <div class="alert alert-info" style="margin-top: 20px;">
                            <h5><i class="fa fa-graduation-cap"></i> What We TEACH:</h5>
                            <p>• Detergent Making (Liquid & Powder) • Gin Production • Oil Extraction • Shoe Polish Making • Paint Manufacturing • Air Freshener Creation</p>
                            <h5><i class="fa fa-shopping-cart"></i> What We SELL:</h5>
                            <p>• Laboratory Equipment • Chemical Reagents • Safety Equipment • Glassware • Raw Materials for Production</p>
                        </div>
                        <div class="hero-stats">
                            <div class="stat-item">
                                <span class="stat-number">1,247</span>
                                <span class="stat-label">Products</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">98%</span>
                                <span class="stat-label">Satisfaction</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">30+</span>
                                <span class="stat-label">Years</span>
                            </div>
                        </div>
                        <div class="hero-buttons">
                            <a href="#products" class="btn-primary-custom">Explore Products</a>
                            <a href="#about" class="btn-outline-custom">Our Story</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Modern Laboratory" class="img-fluid">
                        <div class="experience-badge">30+ Years Experience</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Training Programs Section -->
    <section id="training" class="products-section" style="background: #f8f9fa;">
        <div class="container">
            <div class="section-title">
                <h2>Our Training Programs</h2>
                <p>Master the art of chemical manufacturing with our hands-on training courses</p>
                <div class="alert alert-success" style="margin-top: 20px;">
                    <h5><i class="fa fa-info-circle"></i> Training Includes:</h5>
                    <p>• Complete step-by-step instructions • All necessary raw materials • Safety protocols • Quality control methods • Business setup guidance • Certificate of completion</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fa fa-tint" style="color: #2c5530;"></i>
                        </div>
                        <h3 class="product-title">Detergent Making</h3>
                        <p class="product-description">Learn to make liquid and powder detergents for home and commercial use.</p>
                        <div class="product-features">
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Liquid detergents</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Powder detergents</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Commercial grade</span>
                            </div>
                        </div>
                        <div class="product-price">₦25,000</div>
                        <button class="btn-add-to-cart" onclick="enrollTraining('Detergent Making', 25000)">
                            <i class="fa fa-graduation-cap"></i> Enroll Now
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fa fa-glass" style="color: #2c5530;"></i>
                        </div>
                        <h3 class="product-title">Gin Making</h3>
                        <p class="product-description">Master the art of making premium gin with traditional and modern techniques.</p>
                        <div class="product-features">
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Traditional methods</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Modern techniques</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Quality control</span>
                            </div>
                        </div>
                        <div class="product-price">₦35,000</div>
                        <button class="btn-add-to-cart" onclick="enrollTraining('Gin Making', 35000)">
                            <i class="fa fa-graduation-cap"></i> Enroll Now
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fa fa-flask" style="color: #2c5530;"></i>
                        </div>
                        <h3 class="product-title">Oil Production</h3>
                        <p class="product-description">Learn to extract and produce various types of oils for different purposes.</p>
                        <div class="product-features">
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Essential oils</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Cooking oils</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Industrial oils</span>
                            </div>
                        </div>
                        <div class="product-price">₦30,000</div>
                        <button class="btn-add-to-cart" onclick="enrollTraining('Oil Production', 30000)">
                            <i class="fa fa-graduation-cap"></i> Enroll Now
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fa fa-shoe-prints" style="color: #2c5530;"></i>
                        </div>
                        <h3 class="product-title">Shoe Polish Making</h3>
                        <p class="product-description">Create high-quality shoe polish in various colors and finishes.</p>
                        <div class="product-features">
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Multiple colors</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Different finishes</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Commercial quality</span>
                            </div>
                        </div>
                        <div class="product-price">₦20,000</div>
                        <button class="btn-add-to-cart" onclick="enrollTraining('Shoe Polish Making', 20000)">
                            <i class="fa fa-graduation-cap"></i> Enroll Now
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fa fa-spray-can" style="color: #2c5530;"></i>
                        </div>
                        <h3 class="product-title">Air Freshener Making</h3>
                        <p class="product-description">Learn to make various types of air fresheners and room sprays.</p>
                        <div class="product-features">
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Room sprays</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Car fresheners</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Natural fragrances</span>
                            </div>
                        </div>
                        <div class="product-price">₦18,000</div>
                        <button class="btn-add-to-cart" onclick="enrollTraining('Air Freshener Making', 18000)">
                            <i class="fa fa-graduation-cap"></i> Enroll Now
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fa fa-paint-brush" style="color: #2c5530;"></i>
                        </div>
                        <h3 class="product-title">Paint Making</h3>
                        <p class="product-description">Master the art of making different types of paints and coatings.</p>
                        <div class="product-features">
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Water-based paints</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Oil-based paints</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Specialty coatings</span>
                            </div>
                        </div>
                        <div class="product-price">₦40,000</div>
                        <button class="btn-add-to-cart" onclick="enrollTraining('Paint Making', 40000)">
                            <i class="fa fa-graduation-cap"></i> Enroll Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products-section">
        <div class="container">
            <div class="section-title">
                <h2>Laboratory Products & Equipment We SELL</h2>
                <p>Purchase all the materials and equipment you need for your chemical manufacturing business</p>
                <div class="alert alert-warning" style="margin-top: 20px;">
                    <h5><i class="fa fa-shopping-bag"></i> What You Can Buy:</h5>
                    <p>• High-quality laboratory equipment • Pure chemical reagents • Safety gear • Glassware sets • Raw materials for production • Professional-grade tools</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="images/products/analytical-balance.jpg" alt="Analytical Balance" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display: none; width: 100%; height: 100%; align-items: center; justify-content: center; background: #f8f9fa; border-radius: 10px;">
                                <i class="fa fa-balance-scale" style="color: #2c5530; font-size: 3rem;"></i>
                            </div>
                        </div>
                        <h3 class="product-title">Analytical Balance (0.1mg)</h3>
                        <p class="product-description">High-precision analytical balance for accurate measurements in laboratory applications.</p>
                        <div class="product-features">
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>0.1mg precision</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Digital display</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Calibration included</span>
                            </div>
                        </div>
                        <div class="product-price">₦185,000</div>
                        <button class="btn-add-to-cart" onclick="addToCart('Analytical Balance', 185000)">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="images/products/digital-microscope.jpg" alt="Digital Microscope" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display: none; width: 100%; height: 100%; align-items: center; justify-content: center; background: #f8f9fa; border-radius: 10px;">
                                <i class="fa fa-microscope" style="color: #2c5530; font-size: 3rem;"></i>
                            </div>
                        </div>
                        <h3 class="product-title">Digital Microscope (1000x)</h3>
                        <p class="product-description">Advanced digital microscope with high-resolution imaging capabilities.</p>
                        <div class="product-features">
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>1000x magnification</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Digital camera</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>LED illumination</span>
                            </div>
                        </div>
                        <div class="product-price">₦245,000</div>
                        <button class="btn-add-to-cart" onclick="addToCart('Digital Microscope', 245000)">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="images/products/sodium-chloride.jpg" alt="Sodium Chloride" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display: none; width: 100%; height: 100%; align-items: center; justify-content: center; background: #f8f9fa; border-radius: 10px;">
                                <i class="fa fa-flask" style="color: #2c5530; font-size: 3rem;"></i>
                            </div>
                        </div>
                        <h3 class="product-title">Sodium Chloride (Pure Grade)</h3>
                        <p class="product-description">High-purity sodium chloride for laboratory and research applications.</p>
                        <div class="product-features">
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>99.9% purity</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>500g packaging</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Analytical grade</span>
                            </div>
                        </div>
                        <div class="product-price">₦12,500/kg</div>
                        <button class="btn-add-to-cart" onclick="addToCart('Sodium Chloride', 12500)">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="images/products/safety-goggles.jpg" alt="Safety Goggles" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display: none; width: 100%; height: 100%; align-items: center; justify-content: center; background: #f8f9fa; border-radius: 10px;">
                                <i class="fa fa-shield" style="color: #2c5530; font-size: 3rem;"></i>
                            </div>
                        </div>
                        <h3 class="product-title">Safety Goggles (UV Protection)</h3>
                        <p class="product-description">Professional safety goggles with UV protection for laboratory safety.</p>
                        <div class="product-features">
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>UV protection</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Anti-fog coating</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Comfortable fit</span>
                            </div>
                        </div>
                        <div class="product-price">₦8,500</div>
                        <button class="btn-add-to-cart" onclick="addToCart('Safety Goggles', 8500)">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="images/products/hydrochloric-acid.jpg" alt="Hydrochloric Acid" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display: none; width: 100%; height: 100%; align-items: center; justify-content: center; background: #f8f9fa; border-radius: 10px;">
                                <i class="fa fa-tint" style="color: #2c5530; font-size: 3rem;"></i>
                            </div>
                        </div>
                        <h3 class="product-title">Hydrochloric Acid (37%)</h3>
                        <p class="product-description">Concentrated hydrochloric acid for various laboratory applications.</p>
                        <div class="product-features">
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>37% concentration</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>1L bottle</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Analytical grade</span>
                            </div>
                        </div>
                        <div class="product-price">₦15,000/L</div>
                        <button class="btn-add-to-cart" onclick="addToCart('Hydrochloric Acid', 15000)">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="images/products/beaker-set.jpg" alt="Beaker Set" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display: none; width: 100%; height: 100%; align-items: center; justify-content: center; background: #f8f9fa; border-radius: 10px;">
                                <i class="fa fa-cubes" style="color: #2c5530; font-size: 3rem;"></i>
                            </div>
                        </div>
                        <h3 class="product-title">Beaker Set (50ml-1000ml)</h3>
                        <p class="product-description">Complete set of borosilicate glass beakers for laboratory use.</p>
                        <div class="product-features">
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>6-piece set</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Borosilicate glass</span>
                            </div>
                            <div class="feature">
                                <i class="fa fa-check"></i>
                                <span>Heat resistant</span>
                            </div>
                        </div>
                        <div class="product-price">₦25,000</div>
                        <button class="btn-add-to-cart" onclick="addToCart('Beaker Set', 25000)">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="categories-section">
        <div class="container">
            <div class="section-title">
                <h2>Product Categories</h2>
                <p>Browse our comprehensive range of laboratory products</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fa fa-cogs"></i>
                        </div>
                        <h3 class="category-title">Laboratory Equipment</h3>
                        <p class="category-count">247 Products</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <h3 class="category-title">Chemical Reagents</h3>
                        <p class="category-count">456 Products</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fa fa-shield"></i>
                        </div>
                        <h3 class="category-title">Safety Equipment</h3>
                        <p class="category-count">189 Products</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fa fa-cube"></i>
                        </div>
                        <h3 class="category-title">Glassware</h3>
                        <p class="category-count">355 Products</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="products-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title text-left">About Tyazubwenge Training Center</h2>
                    <p class="hero-description">
                        Established in 1994, Tyazubwenge Training Center has been Nigeria's leading institution 
                        for chemical manufacturing education and training. We teach practical skills in detergent making, 
                        gin production, oil extraction, and other chemical processes while providing all necessary 
                        equipment and raw materials. Our hands-on approach has trained thousands of successful entrepreneurs.
                    </p>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Clients</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">15</span>
                            <span class="stat-label">Cities</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">24/7</span>
                            <span class="stat-label">Support</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1576671081837-49000212a370?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Laboratory" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5>Contact Information</h5>
                    <p><i class="fa fa-map-marker"></i> 123 Training Center Street, Lagos, Nigeria</p>
                    <p><i class="fa fa-phone"></i> +234-801-234-5678</p>
                    <p><i class="fa fa-envelope"></i> info@tyazubwenge.com</p>
                    <p><i class="fa fa-graduation-cap"></i> Training & Education Center</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5>Quick Links</h5>
                    <p><a href="#training">Training Programs</a></p>
                    <p><a href="#products">Products & Equipment</a></p>
                    <p><a href="#categories">Categories</a></p>
                    <p><a href="#about">About Us</a></p>
                    <p><a href="login.php">Admin Login</a></p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5>Business Hours</h5>
                    <p>Monday - Friday: 8:00 AM - 6:00 PM</p>
                    <p>Saturday: 9:00 AM - 4:00 PM</p>
                    <p>Sunday: Closed</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Tyazubwenge Training Center Ltd. All rights reserved.</p>
            </div>
        </div>
    </section>

    <!-- Cart Modal -->
    <div id="cartModal" class="cart-modal">
        <div class="cart-content">
            <h3>Shopping Cart</h3>
            <div id="cart-items"></div>
            <div class="cart-total">Total: ₦<span id="cart-total">0</span></div>
            <div class="mt-3">
                <button class="btn btn-primary" onclick="checkout()">Checkout</button>
                <button class="btn btn-secondary" onclick="closeCart()">Close</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/calendar.min.js"></script>
    <script src="js/perfect-scrollbar.min.js"></script>
    
    <script>
        // Shopping Cart functionality
        let cart = [];
        
        function addToCart(name, price) {
            const existingItem = cart.find(item => item.name === name);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ name, price, quantity: 1 });
            }
            updateCartDisplay();
            showCartNotification();
        }
        
        function enrollTraining(name, price) {
            if(confirm(`Enroll in ${name} training for ₦${price.toLocaleString()}?\n\nContact us at +234-801-234-5678 to complete your enrollment.`)) {
                alert('Thank you for your interest! Please contact us to complete your training enrollment.');
            }
        }
        
        function updateCartDisplay() {
            const cartCount = cart.reduce((total, item) => total + item.quantity, 0);
            document.getElementById('cart-count').textContent = cartCount;
            
            const cartItems = document.getElementById('cart-items');
            const cartTotal = document.getElementById('cart-total');
            
            if (cart.length === 0) {
                cartItems.innerHTML = '<p>Your cart is empty</p>';
                cartTotal.textContent = '0';
                return;
            }
            
            let itemsHtml = '';
            let total = 0;
            
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                itemsHtml += `
                    <div class="cart-item">
                        <div>
                            <strong>${item.name}</strong><br>
                            <small>₦${item.price.toLocaleString()} x ${item.quantity}</small>
                        </div>
                        <div>
                            <strong>₦${itemTotal.toLocaleString()}</strong>
                            <button class="btn btn-sm btn-danger ml-2" onclick="removeFromCart('${item.name}')">×</button>
                        </div>
                    </div>
                `;
            });
            
            cartItems.innerHTML = itemsHtml;
            cartTotal.textContent = total.toLocaleString();
        }
        
        function removeFromCart(name) {
            cart = cart.filter(item => item.name !== name);
            updateCartDisplay();
        }
        
        function openCart() {
            document.getElementById('cartModal').style.display = 'block';
            updateCartDisplay();
        }
        
        function closeCart() {
            document.getElementById('cartModal').style.display = 'none';
        }
        
        function checkout() {
            if (cart.length === 0) {
                alert('Your cart is empty!');
                return;
            }
            alert('Thank you for your interest! Please contact us at +234-801-234-5678 to complete your order.');
            cart = [];
            updateCartDisplay();
            closeCart();
        }
        
        function showCartNotification() {
            // Simple notification
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: var(--primary-color);
                color: white;
                padding: 1rem;
                border-radius: 5px;
                z-index: 1001;
                animation: slideIn 0.3s ease;
            `;
            notification.textContent = 'Item added to cart!';
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
        
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Close cart modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('cartModal');
            if (event.target === modal) {
                closeCart();
            }
        }
    </script>
    
    <style>
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    </style>
</body>
</html>
