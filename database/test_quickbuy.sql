-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2023 at 11:08 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_quickbuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
CREATE TABLE IF NOT EXISTS `attributes` (
  `attribute_id` int NOT NULL AUTO_INCREMENT,
  `attribute_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `attribute_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `attribute_slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `attribute_status` tinyint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brand_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `brand_logo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `brand_slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brand_status` tinyint DEFAULT NULL,
  `is_featured` tinyint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `brand_title` (`brand_title`,`brand_slug`),
  KEY `brand_title_2` (`brand_title`,`brand_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cat_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` int DEFAULT NULL,
  `cat_slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cat_status` tinyint DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_title_2` (`cat_title`),
  UNIQUE KEY `cat_slug` (`cat_slug`),
  KEY `cat_title` (`cat_title`,`cat_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_description`, `parent_id`, `cat_slug`, `cat_status`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'Phone & Accessories', '', 0, 'phone-and-accessories', 1, NULL, '2023-07-07 17:05:26', '2023-07-07 17:13:16'),
(2, 'Mobile & Tablets', '', 1, 'mobile-and-tablets', 1, NULL, '2023-07-07 17:05:47', '2023-07-07 17:14:00'),
(3, 'Feature Phone', '', 2, 'feature-phone', 1, NULL, '2023-07-07 17:06:06', '2023-07-07 17:06:06'),
(4, 'Rugged Phone', '', 2, 'rugged-phone', 1, NULL, '2023-07-07 17:06:22', '2023-07-07 17:06:22'),
(5, 'Smartphone', '', 2, 'smartphone', 1, NULL, '2023-07-07 17:08:28', '2023-07-07 17:08:28'),
(6, 'Gaming Phone', '', 2, 'gaming-phone', 1, NULL, '2023-07-07 17:09:08', '2023-07-07 17:09:08'),
(7, 'Tablet', '', 2, 'tablet', 1, NULL, '2023-07-07 17:09:34', '2023-07-07 17:09:34'),
(8, 'Power & Chargers', '', 1, 'power-and-chargers', 1, NULL, '2023-07-07 17:09:52', '2023-07-07 17:14:10'),
(9, 'Power Bank', '', 8, 'power-bank', 1, NULL, '2023-07-07 17:10:41', '2023-07-07 17:10:41'),
(10, 'Battery', '', 8, 'battery', 1, NULL, '2023-07-07 17:10:57', '2023-07-07 17:10:57'),
(11, 'Mobile Charger', '', 8, 'mobile-charger', 1, NULL, '2023-07-07 17:11:24', '2023-07-07 17:11:24'),
(12, 'Battery Accessories', '', 8, 'battery-accessories', 0, NULL, '2023-07-07 17:12:08', '2023-07-07 17:12:08'),
(13, 'Charging Adapters', '', 8, 'charging-adapters', 1, NULL, '2023-07-07 17:12:23', '2023-07-07 17:12:23'),
(14, 'Charging Station', '', 8, 'charging-station', 1, NULL, '2023-07-07 17:12:37', '2023-07-07 17:12:37'),
(15, 'Phone Accessories', '', 1, 'phone-accessories', 1, NULL, '2023-07-07 17:14:32', '2023-07-07 17:14:32'),
(16, 'Phone Bags & Cases', '', 15, 'phone-bags-cases', 1, NULL, '2023-07-07 17:15:08', '2023-07-07 17:15:08'),
(17, 'Phone Holders', '', 15, 'phone-holders', 1, NULL, '2023-07-07 17:15:27', '2023-07-07 17:15:27'),
(18, 'Phone Straps', '', 15, 'phone-straps', 1, NULL, '2023-07-07 17:15:46', '2023-07-07 17:15:46'),
(19, 'Parts & Components', '', 1, 'parts-components', 1, NULL, '2023-07-07 17:16:22', '2023-07-07 17:16:22'),
(20, 'Mobile Antenna', '', 19, 'mobile-antenna', 1, NULL, '2023-07-07 17:16:48', '2023-07-07 17:16:48'),
(21, 'Motherboard', '', 19, 'motherboard', 1, NULL, '2023-07-07 17:17:01', '2023-07-07 17:17:01'),
(22, 'Phone LCDs', '', 19, 'phone-lcds', 1, NULL, '2023-07-07 17:17:16', '2023-07-07 17:17:16'),
(23, 'Phone Keypads', '', 19, 'phone-keypads', 1, NULL, '2023-07-07 17:17:30', '2023-07-07 17:17:30'),
(24, 'Phone Housing', '', 19, 'phone-housing', 1, NULL, '2023-07-07 17:17:46', '2023-07-07 17:17:46'),
(25, 'Phone Flex Cables', '', 19, 'phone-flex-cables', 1, NULL, '2023-07-07 17:18:01', '2023-07-07 17:18:01'),
(26, 'Other Phones', '', 1, 'other-phones', 1, NULL, '2023-07-07 17:18:14', '2023-07-07 17:18:14'),
(27, 'Telephones', '', 26, 'telephones', 1, NULL, '2023-07-07 17:18:28', '2023-07-07 17:18:28'),
(28, 'Pagers', '', 26, 'pagers', 1, NULL, '2023-07-07 17:18:40', '2023-07-07 17:18:40'),
(29, 'Walkie Talkie', '', 26, 'walkie-talkie', 1, NULL, '2023-07-07 17:19:30', '2023-07-07 17:19:30'),
(30, 'Computer & Peripherals', '', 0, 'computer-and-peripherals', 1, 1, '2023-07-07 17:19:44', '2023-07-07 17:20:27'),
(31, 'Personal Computer', '', 30, 'personal-computer', 1, NULL, '2023-07-07 17:21:36', '2023-07-07 17:21:36'),
(32, 'All-in-One Computer', '', 31, 'all-in-one-computer', 1, NULL, '2023-07-07 17:21:50', '2023-07-07 17:21:50'),
(33, 'Laptop', '', 31, 'laptop', 1, NULL, '2023-07-07 17:22:03', '2023-07-07 17:22:03'),
(34, 'Notebook', '', 31, 'notebook', 1, NULL, '2023-07-07 17:22:17', '2023-07-07 17:22:17'),
(35, 'Desktop', '', 31, 'desktop', 1, NULL, '2023-07-07 17:22:36', '2023-07-07 17:22:36'),
(36, 'Hardware Components', '', 30, 'hardware-components', 1, NULL, '2023-07-07 17:23:29', '2023-07-07 17:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `product_id` int NOT NULL,
  `comment_note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int NOT NULL AUTO_INCREMENT,
  `sender_id` int NOT NULL,
  `reciever_id` int NOT NULL,
  `msg_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `read_status` tinyint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_status` tinyint DEFAULT NULL,
  `total_amount` double(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `item_attribute` int NOT NULL,
  `item_quantity` int NOT NULL,
  `item_price` double(10,2) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `order_id` int NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transaction_id` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `post_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_cat` int NOT NULL,
  `post_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `post_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `post_status` tinyint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE IF NOT EXISTS `post_categories` (
  `pcat_id` int NOT NULL AUTO_INCREMENT,
  `pcat_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pcat_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pcat_parent` int DEFAULT NULL,
  `pcat_slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pcat_status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pcat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

DROP TABLE IF EXISTS `post_comments`;
CREATE TABLE IF NOT EXISTS `post_comments` (
  `pcmnt_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `pcmnt_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` int DEFAULT NULL,
  `pcmnt_status` int DEFAULT NULL,
  `created_id` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pcmnt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `product_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_sku` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_brand` int NOT NULL,
  `regular_price` double(10,2) NOT NULL,
  `offer_price` double(10,2) DEFAULT NULL,
  `product_thumbnail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_status` tinyint DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `user_id`, `vendor_id`, `product_title`, `product_sku`, `product_brand`, `regular_price`, `offer_price`, `product_thumbnail`, `product_slug`, `product_status`, `is_featured`, `created_at`, `updated_at`) VALUES
(6, 0, 0, 'Test Product 01', 'QBP-00001', 0, 1111.00, 1000.00, 'QBP_1689432060_qb.jpg', 'test-product-01', 1, NULL, '2023-07-15 14:41:01', '2023-07-15 14:41:01'),
(7, 0, 0, 'Test Product 01', 'QBP-00001', 0, 1111.00, 1000.00, 'QBP_1689432602_qb.jpg', 'test-product-01', 1, NULL, '2023-07-15 14:50:02', '2023-07-15 14:50:02'),
(8, 0, 0, 'Test Product 01', 'QBP-00003', 0, 1111.00, 1000.00, 'QBP_1689433161_qb.jpg', 'test-product-01', 0, NULL, '2023-07-15 14:59:22', '2023-07-15 14:59:22'),
(9, 0, 0, 'Test Product 01', 'QBP-00003', 0, 1111.00, 1000.00, 'QBP_1689433196_qb.jpg', 'test-product-01', 0, NULL, '2023-07-15 14:59:56', '2023-07-15 14:59:56'),
(10, 0, 0, 'Test Product 01', 'QBP-00005', 0, 1111.00, 1000.00, 'QBP_1689433284_qb.jpg', 'test-product-01', 1, NULL, '2023-07-15 15:01:24', '2023-07-15 15:01:24'),
(11, 0, 0, 'Test Product 01', 'QBP-00005', 0, 1111.00, 1000.00, 'QBP_1689433355_qb.jpg', 'test-product-01', 1, NULL, '2023-07-15 15:02:35', '2023-07-15 15:02:35'),
(12, 0, 0, 'Test Product 01', 'QBP-00007', 0, 1111.00, 1000.00, 'QBP_1689438360_qb.jpg', 'test-product-01', 1, NULL, '2023-07-15 16:26:00', '2023-07-15 16:26:00'),
(13, 0, 0, 'Test Product 01', 'QBP-00007', 0, 1111.00, 1000.00, 'QBP_1689438412_qb.jpg', 'test-product-01', 1, NULL, '2023-07-15 16:26:52', '2023-07-15 16:26:52'),
(14, 0, 0, 'Test Product 01', 'QBP-00007', 0, 1111.00, 1000.00, 'QBP_1689438497_qb.jpg', 'test-product-01', 1, NULL, '2023-07-15 16:28:18', '2023-07-15 16:28:18'),
(15, 0, 0, 'Test Product 01', 'QBP-00007', 0, 1111.00, 1000.00, 'QBP_1689438514_qb.jpg', 'test-product-01', 1, NULL, '2023-07-15 16:28:34', '2023-07-15 16:28:34'),
(16, 0, 0, 'Test Product 01', 'QBP-00007', 0, 1111.00, 1000.00, 'QBP_1689438533_qb.jpg', 'test-product-01', 1, NULL, '2023-07-15 16:28:53', '2023-07-15 16:28:53'),
(17, 0, 0, 'Test Product 01', 'QBP-00007', 0, 1111.00, 1000.00, 'QBP_1689438580_qb.jpg', 'test-product-01', 1, NULL, '2023-07-15 16:29:40', '2023-07-15 16:29:40'),
(18, 0, 0, 'Test Product 01', 'QBP-00011', 0, 1111.00, 1000.00, 'QBP_1689438667_qb.jpg', 'test-product-01', 1, NULL, '2023-07-15 16:31:07', '2023-07-15 16:31:07'),
(19, 0, 0, 'Test Product 02', 'QBP-00015', 0, 1111.00, 1000.00, 'QBP_1689439082_qb.jpg', 'test-product-02', 1, NULL, '2023-07-15 16:38:02', '2023-07-15 16:38:02'),
(20, 0, 0, 'Test Product 01', 'QBP-00088', 0, 1111.00, 1000.00, 'QBP_1689439309_qb.jpg', 'test-product-01', 1, NULL, '2023-07-15 16:41:49', '2023-07-15 16:41:49'),
(21, 0, 0, 'Test Product 01', 'QBP-00088', 0, 1111.00, 1000.00, 'QBP_1689439437_qb.jpg', 'test-product-01', 1, NULL, '2023-07-15 16:43:58', '2023-07-15 16:43:58'),
(22, 0, 0, 'Test Product 01', 'QBP-00088', 0, 1111.00, 1000.00, 'QBP_1689439463_qb.jpg', 'test-product-01', 1, NULL, '2023-07-15 16:44:23', '2023-07-15 16:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

DROP TABLE IF EXISTS `product_attributes`;
CREATE TABLE IF NOT EXISTS `product_attributes` (
  `pattr_id` int NOT NULL,
  `product_id` int NOT NULL,
  `attribute_set` int NOT NULL,
  `attribute_type` int NOT NULL,
  `attribute_value` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `attribute_thumbnail` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `prdcat_id` int NOT NULL,
  `product_id` int NOT NULL,
  `main_category` int NOT NULL,
  `sub_category` int NOT NULL,
  `product_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`prdcat_id`, `product_id`, `main_category`, `sub_category`, `product_type`) VALUES
(0, 11, 1, 2, 5),
(0, 12, 1, 2, 5),
(0, 13, 1, 2, 5),
(0, 15, 1, 2, 5),
(0, 16, 1, 2, 5),
(0, 17, 1, 2, 5),
(0, 18, 1, 2, 5),
(0, 19, 1, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

DROP TABLE IF EXISTS `product_comments`;
CREATE TABLE IF NOT EXISTS `product_comments` (
  `cmnt_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `cmnt_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` int DEFAULT NULL,
  `cmnt_status` tinyint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cmnt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
CREATE TABLE IF NOT EXISTS `product_details` (
  `pdetail_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `product_highlights` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_specifications` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_additionals` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`pdetail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`pdetail_id`, `product_id`, `product_highlights`, `product_description`, `product_specifications`, `product_additionals`) VALUES
(1, 14, '<p>lorem ipsum</p>', '<p>lorem ipsum<br></p>', '<p>lorem ipsum<br></p>', '<p>lorem ipsum<br></p>'),
(2, 16, '<p>lorem ipsum</p>', '<p>lorem ipsum<br></p>', '<p>lorem ipsum<br></p>', '<p>lorem ipsum<br></p>'),
(3, 17, '<p>lorem ipsum</p>', '<p>lorem ipsum<br></p>', '<p>lorem ipsum<br></p>', '<p>lorem ipsum<br></p>'),
(4, 18, '<p>lorem ipsum</p>', '<p>lorem ipsum<br></p>', '<p>lorem ipsum<br></p>', '<p>lorem ipsum<br></p>'),
(5, 19, '<p>lorem ipsum</p>', '<p>lorem ipsum<br></p>', '<p>lorem ipsum<br></p>', '<p>lorem ipsum<br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `image_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

DROP TABLE IF EXISTS `product_options`;
CREATE TABLE IF NOT EXISTS `product_options` (
  `option_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `option_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `option_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `option_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_options`
--

INSERT INTO `product_options` (`option_id`, `product_id`, `option_name`, `option_type`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 21, 'Array', 'Array', 'Array', '2023-07-15 16:43:58', '2023-07-15 16:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

DROP TABLE IF EXISTS `product_ratings`;
CREATE TABLE IF NOT EXISTS `product_ratings` (
  `prating_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `rating_value` float NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`prating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reports`
--

DROP TABLE IF EXISTS `product_reports`;
CREATE TABLE IF NOT EXISTS `product_reports` (
  `preport_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `report_type` tinyint DEFAULT NULL,
  `report_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`preport_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_shippings`
--

DROP TABLE IF EXISTS `product_shippings`;
CREATE TABLE IF NOT EXISTS `product_shippings` (
  `pship_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_weight` decimal(10,2) DEFAULT NULL,
  `product_length` decimal(10,2) DEFAULT NULL,
  `product_width` decimal(10,2) DEFAULT NULL,
  `product_height` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_shippings`
--

INSERT INTO `product_shippings` (`pship_id`, `product_id`, `product_weight`, `product_length`, `product_width`, `product_height`) VALUES
(0, 19, '10.00', '20.00', '10.00', '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

DROP TABLE IF EXISTS `product_stock`;
CREATE TABLE IF NOT EXISTS `product_stock` (
  `stock_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `stock_quantity` int NOT NULL,
  `stock_status` tinyint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`stock_id`, `product_id`, `stock_quantity`, `stock_status`, `created_at`) VALUES
(1, 1, 10, 0, '2023-07-10 04:50:55'),
(2, 2, 10, 0, '2023-07-10 05:26:11'),
(3, 3, 10, 0, '2023-07-10 06:33:12'),
(4, 4, 10, 0, '2023-07-10 06:35:52'),
(5, 5, 10, 0, '2023-07-10 06:37:42'),
(6, 17, 0, 0, '2023-07-15 16:29:40'),
(7, 18, 10, 1, '2023-07-15 16:31:07'),
(8, 19, 10, 1, '2023-07-15 16:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

DROP TABLE IF EXISTS `promos`;
CREATE TABLE IF NOT EXISTS `promos` (
  `promo_id` int NOT NULL AUTO_INCREMENT,
  `vendor_id` int NOT NULL,
  `promo_title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `promo_code` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `promo_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `promo_type` tinyint NOT NULL,
  `discount_type` tinyint NOT NULL,
  `discount_value` int NOT NULL,
  `starting_date` timestamp NOT NULL,
  `expiration_date` timestamp NOT NULL,
  `promo_status` tinyint DEFAULT NULL,
  `usage_restriction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`promo_id`),
  UNIQUE KEY `promo_code` (`promo_code`),
  KEY `vendor_id` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promo_usage`
--

DROP TABLE IF EXISTS `promo_usage`;
CREATE TABLE IF NOT EXISTS `promo_usage` (
  `usage_id` int NOT NULL AUTO_INCREMENT,
  `promo_id` int NOT NULL,
  `order_id` int NOT NULL,
  `usage_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `report_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `product_id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `report_reaseon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `ratings` int NOT NULL,
  `review_note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role_slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role_status` tinyint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_slug` (`role_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_title`, `role_description`, `role_slug`, `role_status`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '', 'administrator', 1, '2023-07-07 16:54:15', '2023-07-07 16:54:15'),
(2, 'Moderator', '', 'moderator', 1, '2023-07-07 16:54:29', '2023-07-07 16:54:29'),
(3, 'Editor', '', 'editor', 1, '2023-07-07 16:54:44', '2023-07-07 16:54:44'),
(4, 'Contributor', '', 'contributor', 1, '2023-07-07 16:54:55', '2023-07-07 16:54:55'),
(5, 'Author', '', 'author', 1, '2023-07-07 16:56:43', '2023-07-07 16:56:43'),
(6, 'Merchant', '', 'merchant', 1, '2023-07-07 16:56:55', '2023-07-07 16:56:55'),
(7, 'Customer', '', 'customer', 1, '2023-07-07 16:57:06', '2023-07-07 16:57:06'),
(8, 'Subscriber', '', 'subscriber', 1, '2023-07-13 13:54:32', '2023-07-13 13:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `cell_phone` varchar(19) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL,
  `user_status` tinyint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email_address`,`cell_phone`),
  KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email_address`, `email_verified_at`, `cell_phone`, `password`, `role`, `user_status`, `created_at`, `updated_at`) VALUES
(1, 'Shawon', 'Khan', 'shawonk007', 'shawonk007@gmail.com', NULL, '+88 (016) 88-947741', '$2y$10$rhVrWGydF0dSrST9fnehjeQ8GjfQ4jdi.kE9W.tX2r30EROW7tR.W', 1, 1, '2023-07-09 07:13:59', '2023-07-10 03:40:28'),
(2, 'Sumona', 'Akter', 'sapriya27', 'sapriya27@gmail.com', NULL, '+88 (019) 96-021439', '$2y$10$JCXzsvlduO/pnXdWO28fYu.xMM7YDkMJULN5SR9zVPRhpADqXj0q2', 6, NULL, '2023-07-10 04:47:19', '2023-07-10 04:47:19'),
(3, 'Nerea', 'Akter', 'nerea.akter', 'nerea.akter@gmail.com', NULL, '+88 (011) 96-268490', '$2y$10$hb.t188f6ssmSCC63hHqbOfWqA58TqnOkyvPD83o4q4rLa1xvqexa', 7, NULL, '2023-07-10 05:00:55', '2023-07-10 05:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

DROP TABLE IF EXISTS `users_details`;
CREATE TABLE IF NOT EXISTS `users_details` (
  `details_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `user_biography` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `date_of_birth` date DEFAULT NULL,
  `user_image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alt_email_address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alt_cell_phone` varchar(19) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_division` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_district` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `postal_code` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` tinyint DEFAULT NULL,
  `religion` tinyint DEFAULT NULL,
  `marital_status` tinyint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`details_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_devices`
--

DROP TABLE IF EXISTS `users_devices`;
CREATE TABLE IF NOT EXISTS `users_devices` (
  `device_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `device_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `device_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `os_info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `browser_info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ip_address` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mac_address` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `latitude` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `longtitude` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `session_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`device_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `store_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `store_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `store_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `store_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_category` int NOT NULL,
  `store_slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_status` tinyint DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT NULL,
  `is_featured` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`store_id`),
  UNIQUE KEY `user_id` (`user_id`,`store_slug`),
  KEY `store_name` (`store_name`,`store_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_contact`
--

DROP TABLE IF EXISTS `vendor_contact`;
CREATE TABLE IF NOT EXISTS `vendor_contact` (
  `contact_id` int NOT NULL AUTO_INCREMENT,
  `store_id` int NOT NULL,
  `store_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_phone` varchar(19) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_address_one` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_address_two` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_division` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_district` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_postal_code` int DEFAULT NULL,
  `store_website` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_facebook` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_whatsapp` varchar(19) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`contact_id`),
  UNIQUE KEY `store_id` (`store_id`,`store_email`,`store_phone`,`store_website`,`store_facebook`,`store_whatsapp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_ratings`
--

DROP TABLE IF EXISTS `vendor_ratings`;
CREATE TABLE IF NOT EXISTS `vendor_ratings` (
  `vrating_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `vrating_value` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`vrating_id`),
  KEY `user_id` (`user_id`),
  KEY `vendor_id` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  `wishlist_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`wishlist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `promos`
--
ALTER TABLE `promos`
  ADD CONSTRAINT `promos_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`store_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`role_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `users_details`
--
ALTER TABLE `users_details`
  ADD CONSTRAINT `users_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `vendor_contact`
--
ALTER TABLE `vendor_contact`
  ADD CONSTRAINT `vendor_contact_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `vendors` (`store_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `vendor_ratings`
--
ALTER TABLE `vendor_ratings`
  ADD CONSTRAINT `vendor_ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `vendor_ratings_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`store_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
