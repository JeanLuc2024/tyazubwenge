-- Tyazubwenge Training Center Database Schema
-- Created for Laboratory Management System

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: tyazubwenge_lab
CREATE DATABASE IF NOT EXISTS `tyazubwenge_lab` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `tyazubwenge_lab`;

-- Users table (Admin users)
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','manager','staff') DEFAULT 'staff',
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Categories table
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Suppliers table (moved before products)
CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contact_person` varchar(100),
  `email` varchar(100),
  `phone` varchar(20),
  `address` text,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Products table (Laboratory equipment and chemicals)
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text,
  `category_id` int(11) NOT NULL,
  `sku` varchar(50) UNIQUE,
  `unit_type` enum('kg','g','mg','L','ml','pieces','sets','bottles','boxes','packets') NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `unit_price` decimal(10,2) NOT NULL,
  `expiry_date` date NULL,
  `supplier_id` int(11) NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `image_url` varchar(255),
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`),
  FOREIGN KEY (`supplier_id`) REFERENCES `suppliers`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Training programs table
CREATE TABLE `training_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text,
  `duration_hours` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `max_students` int(11) DEFAULT 20,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Students table
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20),
  `address` text,
  `date_of_birth` date,
  `emergency_contact` varchar(100),
  `emergency_phone` varchar(20),
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Enrollments table (Student enrollments in training programs)
CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `training_program_id` int(11) NOT NULL,
  `enrollment_date` date NOT NULL,
  `status` enum('enrolled','completed','cancelled') DEFAULT 'enrolled',
  `payment_status` enum('pending','paid','refunded') DEFAULT 'pending',
  `amount_paid` decimal(10,2) DEFAULT 0,
  `completion_date` date NULL,
  `certificate_issued` tinyint(1) DEFAULT 0,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`student_id`) REFERENCES `students`(`id`),
  FOREIGN KEY (`training_program_id`) REFERENCES `training_programs`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sales table
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_number` varchar(50) UNIQUE NOT NULL,
  `customer_name` varchar(100),
  `customer_email` varchar(100),
  `customer_phone` varchar(20),
  `total_amount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT 0,
  `tax` decimal(10,2) DEFAULT 0,
  `final_amount` decimal(10,2) NOT NULL,
  `payment_method` enum('cash','card','transfer','credit') DEFAULT 'cash',
  `payment_status` enum('pending','paid','refunded') DEFAULT 'pending',
  `sale_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11),
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`created_by`) REFERENCES `users`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sale items table
CREATE TABLE `sale_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `profit` decimal(10,2) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`sale_id`) REFERENCES `sales`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Stock movements table (for tracking inventory changes)
CREATE TABLE `stock_movements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `movement_type` enum('in','out','adjustment','expired') NOT NULL,
  `quantity` int(11) NOT NULL,
  `reason` varchar(200),
  `reference_id` int(11) NULL, -- Can reference sale_id, purchase_id, etc.
  `reference_type` varchar(50) NULL, -- 'sale', 'purchase', 'adjustment', etc.
  `created_by` int(11),
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`),
  FOREIGN KEY (`created_by`) REFERENCES `users`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Alerts table (for low stock and expiry notifications)
CREATE TABLE `alerts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alert_type` enum('low_stock','expiry','expired') NOT NULL,
  `product_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `is_resolved` tinyint(1) DEFAULT 0,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `resolved_at` timestamp NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- System settings table
CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL UNIQUE,
  `setting_value` text,
  `description` text,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin user
INSERT INTO `users` (`name`, `email`, `password`, `role`) VALUES
('Admin User', 'asdf@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- Insert default categories
INSERT INTO `categories` (`name`, `description`) VALUES
('Laboratory Equipment', 'Analytical balances, microscopes, and other lab equipment'),
('Chemical Reagents', 'Pure chemicals and reagents for laboratory use'),
('Safety Equipment', 'Safety goggles, gloves, and protective gear'),
('Glassware', 'Beakers, flasks, and other glass laboratory equipment'),
('Training Materials', 'Materials and supplies for training programs');

-- Insert default suppliers
INSERT INTO `suppliers` (`name`, `contact_person`, `email`, `phone`, `address`) VALUES
('Lab Supplies Ltd', 'John Smith', 'john@labsupplies.com', '+234-801-234-5678', '123 Lab Street, Lagos, Nigeria'),
('Chemical Solutions Inc', 'Mary Johnson', 'mary@chemsolutions.com', '+234-802-345-6789', '456 Chemical Avenue, Abuja, Nigeria'),
('Safety First Corp', 'David Brown', 'david@safetyfirst.com', '+234-803-456-7890', '789 Safety Road, Port Harcourt, Nigeria');

-- Insert default training programs
INSERT INTO `training_programs` (`name`, `description`, `duration_hours`, `price`, `max_students`) VALUES
('Detergent Making', 'Learn to make liquid and powder detergents for home and commercial use', 8, 25000.00, 15),
('Gin Making', 'Master the art of making premium gin with traditional and modern techniques', 12, 35000.00, 10),
('Oil Production', 'Learn to extract and produce various types of oils for different purposes', 10, 30000.00, 12),
('Shoe Polish Making', 'Create high-quality shoe polish in various colors and finishes', 6, 20000.00, 20),
('Air Freshener Making', 'Learn to make various types of air fresheners and room sprays', 4, 18000.00, 25),
('Paint Making', 'Master the art of making different types of paints and coatings', 16, 40000.00, 8);

-- Insert sample products
INSERT INTO `products` (`name`, `description`, `category_id`, `sku`, `unit_type`, `quantity`, `unit_price`, `expiry_date`, `supplier_id`) VALUES
('Analytical Balance (0.1mg)', 'High-precision analytical balance for accurate measurements', 1, 'BAL-001', 'pieces', 5, 185000.00, NULL, 1),
('Digital Microscope (1000x)', 'Advanced digital microscope with high-resolution imaging', 1, 'MIC-001', 'pieces', 3, 245000.00, NULL, 1),
('Sodium Chloride (Pure Grade)', 'High-purity sodium chloride for laboratory applications', 2, 'CHEM-001', 'kg', 25, 12500.00, '2025-12-31', 2),
('Safety Goggles (UV Protection)', 'Professional safety goggles with UV protection', 3, 'SAFE-001', 'pieces', 50, 8500.00, NULL, 3),
('Hydrochloric Acid (37%)', 'Concentrated hydrochloric acid for laboratory use', 2, 'CHEM-002', 'L', 15, 15000.00, '2024-06-30', 2),
('Beaker Set (50ml-1000ml)', 'Complete set of borosilicate glass beakers', 4, 'GLASS-001', 'sets', 12, 25000.00, NULL, 1),
('Detergent Making Kit', 'Complete kit for detergent production training', 5, 'TRAIN-001', 'boxes', 20, 45000.00, '2025-03-15', 1),
('Gin Production Kit', 'Complete kit for gin making training', 5, 'TRAIN-002', 'boxes', 15, 55000.00, '2025-04-20', 1);

-- Insert system settings
INSERT INTO `system_settings` (`setting_key`, `setting_value`, `description`) VALUES
('expiry_warning_days', '30', 'Days before expiry to show warning'),
('expired_alert_days', '0', 'Days after expiry to show expired alert'),
('company_name', 'Tyazubwenge Training Center', 'Company name for reports and invoices'),
('company_address', '123 Training Center Street, Lagos, Nigeria', 'Company address'),
('company_phone', '+234-801-234-5678', 'Company phone number'),
('company_email', 'info@tyazubwenge.com', 'Company email address');

COMMIT;