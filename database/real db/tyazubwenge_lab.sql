-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2025 at 09:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tyazubwenge_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `alert_type` enum('low_stock','expiry','expired') NOT NULL,
  `product_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `is_resolved` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `resolved_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `alert_type`, `product_id`, `message`, `is_read`, `is_resolved`, `created_at`, `resolved_at`) VALUES
(1, 'low_stock', 1, 'Low stock alert: Analytical Balance (0.1mg) has 4 pieces remaining', 0, 0, '2025-09-25 17:30:51', NULL),
(2, 'low_stock', 1, 'Low stock alert: Analytical Balance (0.1mg) has 3 pieces remaining', 0, 0, '2025-09-25 17:49:32', NULL),
(3, 'low_stock', 1, 'Low stock alert: Analytical Balance (0.1mg) has 2 pieces remaining', 0, 0, '2025-09-25 17:50:03', NULL),
(4, 'low_stock', 1, 'Low stock alert: Analytical Balance (0.1mg) has 1 pieces remaining', 0, 0, '2025-09-25 17:50:21', NULL),
(5, 'low_stock', 1, 'Low stock alert: Analytical Balance (0.1mg) has 0 pieces remaining', 0, 0, '2025-09-25 17:51:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Laboratory Equipment', 'Analytical balances, microscopes, and other lab equipment', 1, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(2, 'Chemical Reagents', 'Pure chemicals and reagents for laboratory use', 1, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(3, 'Safety Equipment', 'Safety goggles, gloves, and protective gear', 1, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(4, 'Glassware', 'Beakers, flasks, and other glass laboratory equipment', 1, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(5, 'Training Materials', 'Materials and supplies for training programs', 1, '2025-09-25 08:05:45', '2025-09-25 08:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `training_program_id` int(11) NOT NULL,
  `enrollment_date` date NOT NULL,
  `status` enum('enrolled','completed','cancelled') DEFAULT 'enrolled',
  `payment_status` enum('pending','paid','refunded') DEFAULT 'pending',
  `amount_paid` decimal(10,2) DEFAULT 0.00,
  `completion_date` date DEFAULT NULL,
  `certificate_issued` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `unit_type` enum('kg','g','mg','L','ml','pieces','sets','bottles','boxes','packets') NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `unit_price` decimal(10,2) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `sku`, `unit_type`, `quantity`, `unit_price`, `expiry_date`, `supplier_id`, `is_active`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'Analytical Balance (0.1mg)', 'High-precision analytical balance for accurate measurements', 1, 'BAL-001', 'pieces', 0, 185000.00, NULL, 1, 1, NULL, '2025-09-25 08:05:45', '2025-09-25 17:51:14'),
(2, 'Digital Microscope (1000x)', 'Advanced digital microscope with high-resolution imaging', 1, 'MIC-001', 'pieces', 3, 245000.00, NULL, 1, 1, NULL, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(3, 'Sodium Chloride (Pure Grade)', 'High-purity sodium chloride for laboratory applications', 2, 'CHEM-001', 'kg', 25, 12500.00, '2025-12-31', 2, 1, NULL, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(4, 'Safety Goggles (UV Protection)', 'Professional safety goggles with UV protection', 3, 'SAFE-001', 'pieces', 50, 8500.00, NULL, 3, 1, NULL, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(5, 'Hydrochloric Acid (37%)', 'Concentrated hydrochloric acid for laboratory use', 2, 'CHEM-002', 'L', 15, 15000.00, '2024-06-30', 2, 1, NULL, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(6, 'Beaker Set (50ml-1000ml)', 'Complete set of borosilicate glass beakers', 4, 'GLASS-001', 'sets', 12, 25000.00, NULL, 1, 1, NULL, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(7, 'Detergent Making Kit', 'Complete kit for detergent production training', 5, 'TRAIN-001', 'boxes', 20, 45000.00, '2025-03-15', 1, 1, NULL, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(8, 'Gin Production Kit', 'Complete kit for gin making training', 5, 'TRAIN-002', 'boxes', 15, 55000.00, '2025-04-20', 1, 1, NULL, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(9, 'Test Product', 'Test Description', 1, 'TEST-001', 'pieces', 10, 1000.00, NULL, 1, 1, '', '2025-09-25 19:13:37', '2025-09-25 19:13:37'),
(10, 'ibijumba', '', 1, 'PROD-924293', '', 30, 1500.00, NULL, 1, 1, '', '2025-09-25 19:18:44', '2025-09-25 19:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `sale_number` varchar(50) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT 0.00,
  `tax` decimal(10,2) DEFAULT 0.00,
  `final_amount` decimal(10,2) NOT NULL,
  `payment_method` enum('cash','card','transfer','credit') DEFAULT 'cash',
  `payment_status` enum('pending','paid','refunded') DEFAULT 'pending',
  `sale_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_number`, `customer_name`, `customer_email`, `customer_phone`, `total_amount`, `discount`, `tax`, `final_amount`, `payment_method`, `payment_status`, `sale_date`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'TEST-1758820316', 'Test Customer', NULL, NULL, 1000.00, 0.00, 0.00, 1000.00, 'cash', 'pending', '2025-09-25 17:11:56', 1, '2025-09-25 17:11:56', '2025-09-25 17:11:56'),
(2, 'TEST-1758820318', 'Real Test Customer', NULL, NULL, 185000.00, 0.00, 0.00, 185000.00, 'cash', 'pending', '2025-09-25 17:11:58', 1, '2025-09-25 17:11:58', '2025-09-25 17:11:58'),
(3, 'S17588214515533', 'Test Customer', 'test@example.com', '1234567890', 1000.00, 0.00, 0.00, 1000.00, 'cash', 'pending', '2025-09-25 17:30:51', 1, '2025-09-25 17:30:51', '2025-09-25 17:30:51'),
(4, 'S17588225718851', 'Test Customer', 'test@example.com', '1234567890', 1000.00, 0.00, 0.00, 1000.00, 'cash', 'pending', '2025-09-25 17:49:31', 1, '2025-09-25 17:49:31', '2025-09-25 17:49:31'),
(5, 'S17588226034348', 'Test Customer', '', '', 1000.00, 0.00, 0.00, 1000.00, 'cash', 'pending', '2025-09-25 17:50:03', 1, '2025-09-25 17:50:03', '2025-09-25 17:50:03'),
(6, 'S17588226217158', 'Test Customer', 'test@example.com', '1234567890', 1000.00, 0.00, 0.00, 1000.00, 'cash', 'pending', '2025-09-25 17:50:21', 1, '2025-09-25 17:50:21', '2025-09-25 17:50:21'),
(7, 'S17588226743596', 'Stockout Sale', '', '', 186000.00, 0.00, 0.00, 186000.00, 'cash', 'pending', '2025-09-25 17:51:14', 1, '2025-09-25 17:51:14', '2025-09-25 17:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `profit` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_id`, `product_id`, `quantity`, `unit_price`, `total_price`, `profit`, `created_at`) VALUES
(1, 1, 1, 1, 1000.00, 1000.00, -184000.00, '2025-09-25 17:11:56'),
(2, 2, 1, 1, 185000.00, 185000.00, 0.00, '2025-09-25 17:11:58'),
(3, 3, 1, 1, 1000.00, 1000.00, -184000.00, '2025-09-25 17:30:51'),
(4, 4, 1, 1, 1000.00, 1000.00, -184000.00, '2025-09-25 17:49:31'),
(5, 5, 1, 1, 1000.00, 1000.00, -184000.00, '2025-09-25 17:50:03'),
(6, 6, 1, 1, 1000.00, 1000.00, -184000.00, '2025-09-25 17:50:21'),
(7, 7, 1, 1, 186000.00, 186000.00, 1000.00, '2025-09-25 17:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `stock_movements`
--

CREATE TABLE `stock_movements` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `movement_type` enum('in','out','adjustment','expired') NOT NULL,
  `quantity` int(11) NOT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `reference_type` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_movements`
--

INSERT INTO `stock_movements` (`id`, `product_id`, `movement_type`, `quantity`, `reason`, `reference_id`, `reference_type`, `created_by`, `created_at`) VALUES
(1, 1, 'out', 1, 'Sale #S17588214515533', 3, 'sale', 1, '2025-09-25 17:30:51'),
(2, 1, 'out', 1, 'Sale #S17588225718851', 4, 'sale', 1, '2025-09-25 17:49:32'),
(3, 1, 'out', 1, 'Sale #S17588226034348', 5, 'sale', 1, '2025-09-25 17:50:03'),
(4, 1, 'out', 1, 'Sale #S17588226217158', 6, 'sale', 1, '2025-09-25 17:50:21'),
(5, 1, 'out', 1, 'Sale #S17588226743596', 7, 'sale', 1, '2025-09-25 17:51:14'),
(6, 9, 'in', 10, 'Initial stock', NULL, NULL, 1, '2025-09-25 19:13:37'),
(7, 10, 'in', 30, 'Initial stock', NULL, NULL, 1, '2025-09-25 19:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `emergency_contact` varchar(100) DEFAULT NULL,
  `emergency_phone` varchar(20) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `contact_person`, `email`, `phone`, `address`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Lab Supplies Ltd', 'John Smith', 'john@labsupplies.com', '+234-801-234-5678', '123 Lab Street, Lagos, Nigeria', 1, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(2, 'Chemical Solutions Inc', 'Mary Johnson', 'mary@chemsolutions.com', '+234-802-345-6789', '456 Chemical Avenue, Abuja, Nigeria', 1, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(3, 'Safety First Corp', 'David Brown', 'david@safetyfirst.com', '+234-803-456-7890', '789 Safety Road, Port Harcourt, Nigeria', 1, '2025-09-25 08:05:45', '2025-09-25 08:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `setting_key`, `setting_value`, `description`, `updated_at`) VALUES
(1, 'expiry_warning_days', '30', 'Days before expiry to show warning', '2025-09-25 08:05:45'),
(2, 'expired_alert_days', '0', 'Days after expiry to show expired alert', '2025-09-25 08:05:45'),
(3, 'company_name', 'Tyazubwenge Training Center', 'Company name for reports and invoices', '2025-09-25 08:05:45'),
(4, 'company_address', '123 Training Center Street, Lagos, Nigeria', 'Company address', '2025-09-25 08:05:45'),
(5, 'company_phone', '+234-801-234-5678', 'Company phone number', '2025-09-25 08:05:45'),
(6, 'company_email', 'info@tyazubwenge.com', 'Company email address', '2025-09-25 08:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `training_programs`
--

CREATE TABLE `training_programs` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `duration_hours` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `max_students` int(11) DEFAULT 20,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training_programs`
--

INSERT INTO `training_programs` (`id`, `name`, `description`, `duration_hours`, `price`, `max_students`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Detergent Making', 'Learn to make liquid and powder detergents for home and commercial use', 8, 25000.00, 15, 1, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(2, 'Gin Making', 'Master the art of making premium gin with traditional and modern techniques', 12, 35000.00, 10, 1, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(3, 'Oil Production', 'Learn to extract and produce various types of oils for different purposes', 10, 30000.00, 12, 1, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(4, 'Shoe Polish Making', 'Create high-quality shoe polish in various colors and finishes', 6, 20000.00, 20, 1, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(5, 'Air Freshener Making', 'Learn to make various types of air fresheners and room sprays', 4, 18000.00, 25, 1, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(6, 'Paint Making', 'Master the art of making different types of paints and coatings', 16, 40000.00, 8, 1, '2025-09-25 08:05:45', '2025-09-25 08:05:45'),
(7, 'Test Training Program', 'Test Description', 24, 25000.00, 20, 1, '2025-09-25 19:13:30', '2025-09-25 19:13:30'),
(8, 'computer literacy', 'asdfasfasfasdf', 56, 700.00, 10, 1, '2025-09-25 19:16:21', '2025-09-25 19:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','manager','staff') DEFAULT 'staff',
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Test Admin', 'test@example.com', 'asdf', 'admin', 1, '2025-09-25 08:05:45', '2025-09-25 19:13:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `training_program_id` (`training_program_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sale_number` (`sale_number`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_id` (`sale_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `stock_movements`
--
ALTER TABLE `stock_movements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- Indexes for table `training_programs`
--
ALTER TABLE `training_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock_movements`
--
ALTER TABLE `stock_movements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `training_programs`
--
ALTER TABLE `training_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `alerts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`training_program_id`) REFERENCES `training_programs` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD CONSTRAINT `sale_items_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sale_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `stock_movements`
--
ALTER TABLE `stock_movements`
  ADD CONSTRAINT `stock_movements_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `stock_movements_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
