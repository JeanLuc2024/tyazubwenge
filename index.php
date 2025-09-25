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
            <div class="row" id="trainingProgramsContainer">
                <?php
                require_once 'config/database.php';
                
                try {
                    $training_programs = fetchAll("SELECT * FROM training_programs WHERE is_active = 1 ORDER BY name");
                    
                    if (empty($training_programs)) {
                        echo '<div class="col-12"><p class="text-muted">No training programs available at the moment. Please check back later.</p></div>';
                    } else {
                        $icons = ['fa-tint', 'fa-glass', 'fa-flask', 'fa-shoe-prints', 'fa-spray-can', 'fa-paint-brush', 'fa-cogs', 'fa-microscope'];
                        $icon_index = 0;
                        
                        foreach ($training_programs as $program) {
                            $icon = $icons[$icon_index % count($icons)];
                            $icon_index++;
                            
                            echo '<div class="col-lg-4 col-md-6 mb-4">';
                            echo '<div class="product-card">';
                            echo '<div class="product-image">';
                            echo '<i class="fa ' . $icon . '" style="color: #2c5530;"></i>';
                            echo '</div>';
                            echo '<h3 class="product-title">' . htmlspecialchars($program['name']) . '</h3>';
                            echo '<p class="product-description">' . htmlspecialchars($program['description']) . '</p>';
                            echo '<div class="product-features">';
                            echo '<div class="feature"><i class="fa fa-clock-o"></i><span>' . $program['duration_hours'] . ' hours duration</span></div>';
                            echo '<div class="feature"><i class="fa fa-users"></i><span>Max ' . $program['max_students'] . ' students</span></div>';
                            echo '<div class="feature"><i class="fa fa-certificate"></i><span>Certificate included</span></div>';
                            echo '</div>';
                            echo '<div class="product-price">₦' . number_format($program['price'], 0) . '</div>';
                            echo '<button class="btn-add-to-cart" onclick="enrollTraining(\'' . htmlspecialchars($program['name']) . '\', ' . $program['price'] . ')">';
                            echo '<i class="fa fa-graduation-cap"></i> Enroll Now';
                            echo '</button>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                } catch (Exception $e) {
                    echo '<div class="col-12"><p class="text-danger">Error loading training programs: ' . $e->getMessage() . '</p></div>';
                }
                ?>
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
            <div class="row" id="productsContainer">
                <?php
                try {
                    $products = fetchAll("SELECT p.*, c.name as category_name 
                                        FROM products p 
                                        LEFT JOIN categories c ON p.category_id = c.id 
                                        WHERE p.is_active = 1 
                                        ORDER BY p.name 
                                        LIMIT 12");
                    
                    if (empty($products)) {
                        echo '<div class="col-12"><p class="text-muted">No products available at the moment. Please check back later.</p></div>';
                    } else {
                        $category_icons = [
                            'Laboratory Equipment' => 'fa-cogs',
                            'Chemical Reagents' => 'fa-flask',
                            'Safety Equipment' => 'fa-shield',
                            'Glassware' => 'fa-cube'
                        ];
                        
                        foreach ($products as $product) {
                            $category_icon = $category_icons[$product['category_name']] ?? 'fa-cube';
                            $stock_status = $product['quantity'] > 0 ? 'In Stock' : 'Out of Stock';
                            $stock_class = $product['quantity'] > 0 ? 'text-success' : 'text-danger';
                            
                            echo '<div class="col-lg-4 col-md-6 mb-4">';
                            echo '<div class="product-card">';
                            echo '<div class="product-image">';
                            echo '<i class="fa ' . $category_icon . '" style="color: #2c5530; font-size: 3rem;"></i>';
                            echo '</div>';
                            echo '<h3 class="product-title">' . htmlspecialchars($product['name']) . '</h3>';
                            echo '<p class="product-description">' . htmlspecialchars($product['description']) . '</p>';
                            echo '<div class="product-features">';
                            echo '<div class="feature"><i class="fa fa-tag"></i><span>' . htmlspecialchars($product['category_name']) . '</span></div>';
                            echo '<div class="feature"><i class="fa fa-barcode"></i><span>SKU: ' . htmlspecialchars($product['sku']) . '</span></div>';
                            echo '<div class="feature"><i class="fa fa-cube"></i><span>Stock: ' . $product['quantity'] . ' ' . htmlspecialchars($product['unit_type']) . '</span></div>';
                            echo '<div class="feature"><i class="fa fa-circle ' . $stock_class . '"></i><span>' . $stock_status . '</span></div>';
                            echo '</div>';
                            echo '<div class="product-price">₦' . number_format($product['unit_price'], 0) . '/' . htmlspecialchars($product['unit_type']) . '</div>';
                            
                            if ($product['quantity'] > 0) {
                                echo '<button class="btn-add-to-cart" onclick="addToCart(\'' . htmlspecialchars($product['name']) . '\', ' . $product['unit_price'] . ')">';
                                echo '<i class="fa fa-shopping-cart"></i> Add to Cart';
                                echo '</button>';
                            } else {
                                echo '<button class="btn-add-to-cart" disabled style="background: #6c757d;">';
                                echo '<i class="fa fa-times"></i> Out of Stock';
                                echo '</button>';
                            }
                            
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                } catch (Exception $e) {
                    echo '<div class="col-12"><p class="text-danger">Error loading products: ' . $e->getMessage() . '</p></div>';
                }
                ?>
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
                <?php
                try {
                    $categories = fetchAll("SELECT c.*, COUNT(p.id) as product_count 
                                           FROM categories c 
                                           LEFT JOIN products p ON c.id = p.category_id AND p.is_active = 1 
                                           WHERE c.is_active = 1 
                                           GROUP BY c.id 
                                           ORDER BY c.name");
                    
                    if (empty($categories)) {
                        echo '<div class="col-12"><p class="text-muted">No categories available at the moment.</p></div>';
                    } else {
                        $category_icons = [
                            'Laboratory Equipment' => 'fa-cogs',
                            'Chemical Reagents' => 'fa-flask',
                            'Safety Equipment' => 'fa-shield',
                            'Glassware' => 'fa-cube',
                            'Raw Materials' => 'fa-leaf',
                            'Tools' => 'fa-wrench'
                        ];
                        
                        foreach ($categories as $category) {
                            $icon = $category_icons[$category['name']] ?? 'fa-cube';
                            
                            echo '<div class="col-lg-3 col-md-6 mb-4">';
                            echo '<div class="category-card">';
                            echo '<div class="category-icon">';
                            echo '<i class="fa ' . $icon . '"></i>';
                            echo '</div>';
                            echo '<h3 class="category-title">' . htmlspecialchars($category['name']) . '</h3>';
                            echo '<p class="category-count">' . $category['product_count'] . ' Products</p>';
                            if (!empty($category['description'])) {
                                echo '<p class="text-muted" style="font-size: 0.9rem; margin-top: 10px;">' . htmlspecialchars($category['description']) . '</p>';
                            }
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                } catch (Exception $e) {
                    echo '<div class="col-12"><p class="text-danger">Error loading categories: ' . $e->getMessage() . '</p></div>';
                }
                ?>
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
