<?php
/**
 * Tyazubwenge Training Center - Main API Endpoint
 * Laboratory Management System
 */

require_once '../config/api_config.php';

// Get request method and path
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = str_replace('/api/', '', $path);
$path = rtrim($path, '/'); // Remove trailing slash

// Route the request
switch ($path) {
    case 'auth/login':
        if ($method === 'POST') {
            include 'auth/login.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'auth/logout':
        if ($method === 'POST') {
            include 'auth/logout.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'auth/check':
        if ($method === 'GET') {
            include 'auth/check.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'products':
        if ($method === 'GET') {
            include 'products/list.php';
        } elseif ($method === 'POST') {
            include 'products/create.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'products/update':
        if ($method === 'PUT') {
            include 'products/update.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'products/delete':
        if ($method === 'POST' || $method === 'DELETE') {
            include 'products/delete.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'products/stock':
        if ($method === 'GET') {
            include 'products/stock.php';
        } elseif ($method === 'POST') {
            include 'products/stock_update.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'categories':
        if ($method === 'GET') {
            include 'categories/list.php';
        } elseif ($method === 'POST') {
            include 'categories/create.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'training-programs':
        if ($method === 'GET') {
            include 'training/list.php';
        } elseif ($method === 'POST') {
            include 'training/create.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'training-programs/update':
        if ($method === 'PUT') {
            include 'training/update.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'students':
        if ($method === 'GET') {
            include 'students/list.php';
        } elseif ($method === 'POST') {
            include 'students/create.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'enrollments':
        if ($method === 'GET') {
            include 'enrollments/list.php';
        } elseif ($method === 'POST') {
            include 'enrollments/create.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'sales':
        if ($method === 'GET') {
            include 'sales/list.php';
        } elseif ($method === 'POST') {
            include 'sales/create.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'dashboard':
        if ($method === 'GET') {
            include 'dashboard/data.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'alerts':
        if ($method === 'GET') {
            include 'alerts/list.php';
        } elseif ($method === 'POST') {
            include 'alerts/mark_read.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'reports/sales':
        if ($method === 'GET') {
            include 'reports/sales.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'reports/inventory':
        if ($method === 'GET') {
            include 'reports/inventory.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'reports/profit':
        if ($method === 'GET') {
            include 'reports/profit.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'expiry/check':
        if ($method === 'GET') {
            include 'expiry/check.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'expiry/reports':
        if ($method === 'GET') {
            include 'expiry/reports.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    case 'profile/update':
        if ($method === 'PUT') {
            include 'profile/update.php';
        } else {
            APIResponse::error('Method not allowed', 405);
        }
        break;
        
    default:
        APIResponse::notFound('API endpoint not found');
        break;
}
?>

