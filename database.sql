-- WebTecMart MySQL Database Schema & Seed Data
-- Full Dynamic CMS Architecture (Admin & Manager)

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `leads`;
DROP TABLE IF EXISTS `contacts`;
DROP TABLE IF EXISTS `admin_users`;
DROP TABLE IF EXISTS `content_items`;
DROP TABLE IF EXISTS `cms_content_type_state`;
SET FOREIGN_KEY_CHECKS = 1;

-- 1. Leads Table
CREATE TABLE `leads` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(50) DEFAULT NULL,
  `company` VARCHAR(255) DEFAULT NULL,
  `service` VARCHAR(255) DEFAULT NULL,
  `budget` VARCHAR(100) DEFAULT NULL,
  `message` TEXT DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Contacts Table
CREATE TABLE `contacts` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `subject` VARCHAR(255) DEFAULT NULL,
  `message` TEXT DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Admin & Manager Users Table
CREATE TABLE `admin_users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `role` VARCHAR(50) NOT NULL DEFAULT 'admin',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Dynamic Content Items (All CMS Modules)
CREATE TABLE `content_items` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `content_type` VARCHAR(100) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `summary` TEXT DEFAULT NULL,
  `body` LONGTEXT DEFAULT NULL,
  `metadata` LONGTEXT DEFAULT NULL,
  `sort_order` INT DEFAULT 0,
  `is_active` TINYINT(1) DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_content_type` (`content_type`),
  INDEX `idx_is_active` (`is_active`),
  INDEX `idx_sort_order` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. CMS Initialization State
CREATE TABLE `cms_content_type_state` (
  `content_type` VARCHAR(100) PRIMARY KEY,
  `initialized_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed Default Admin User (admin@webtecmart.com / admin123)
INSERT INTO `admin_users` (`name`, `email`, `password_hash`, `role`) VALUES
('WebTecMart Admin', 'admin@webtecmart.com', '$2y$10$wO8o0qQfUlsFhyy6t2B7a.lI06l2r8G2c9e4VkmRkJ0hB5.s5Ksqm', 'admin'),
('Content Manager', 'manager@webtecmart.com', '$2y$10$wO8o0qQfUlsFhyy6t2B7a.lI06l2r8G2c9e4VkmRkJ0hB5.s5Ksqm', 'manager');
