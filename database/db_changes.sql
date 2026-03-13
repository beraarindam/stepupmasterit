-- Initial db_changes.sql to support fully dynamic CMS
-- You can run this using standard MySQL client or phpMyAdmin when needed

-- Add 'role' and 'status' columns to users table to support Admin Panel access
ALTER TABLE `users` 
ADD COLUMN `role` VARCHAR(50) NOT NULL DEFAULT 'student' AFTER `email`,
ADD COLUMN `status` ENUM('active', 'inactive', 'banned') NOT NULL DEFAULT 'active' AFTER `role`,
ADD COLUMN `avatar` VARCHAR(255) NULL AFTER `status`;

-- Create a basic 'settings' table to hold dynamic website configurations
CREATE TABLE IF NOT EXISTS `settings` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `key` VARCHAR(191) NOT NULL UNIQUE,
    `value` TEXT NULL,
    `description` VARCHAR(255) NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci';

-- Insert some default settings for the frontend CMS
INSERT IGNORE INTO `settings` (`key`, `value`, `description`) VALUES 
('site_title', 'Step Up Master IT Education', 'The main title of the website'),
('site_description', 'Empowering education globally.', 'Short description/tagline of the site'),
('site_logo', '', 'Path to the site logo'),
('contact_email', 'contact@stepupmaster.com', 'Contact email of the academy'),
('contact_phone', '+1 234 567 8900', 'Contact phone number'),
('contact_address', '123 Education Street, Learning City', 'Physical Office Address'),
('map_url', '', 'Google Maps Embed URL'),
('facebook_url', 'https://facebook.com/', 'Facebook Page Link'),
('twitter_url', 'https://twitter.com/', 'Twitter Handle Link'),
('instagram_url', 'https://instagram.com/', 'Instagram Link'),
('linkedin_url', 'https://linkedin.com/', 'LinkedIn Link'),
('youtube_url', 'https://youtube.com/', 'Youtube Channel Link'),
('maintenance_mode', 'false', 'Enable or disable maintenance mode');

-- Default Admin User (Password is 'password')
INSERT INTO `users` (`name`, `email`, `role`, `status`, `password`, `created_at`, `updated_at`) 
VALUES ('Super Admin', 'admin@example.com', 'admin', 'active', '$2y$12$N9uYmROJm1YI.iRHKj2yDudH.AOKi77zW5M304CqN.5yD3x3mX1.C', NOW(), NOW());

-- Add services table to support dynamic services management
CREATE TABLE IF NOT EXISTS `services` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(191) NOT NULL UNIQUE,
  `short_description` TEXT NULL,
  `description` LONGTEXT NULL,
  `icon_image` VARCHAR(255) NULL,
  `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci';

-- Add courses table to support dynamic course management
CREATE TABLE IF NOT EXISTS `courses` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(191) NOT NULL UNIQUE,
  `duration` VARCHAR(255) NULL,
  `fee` VARCHAR(255) NULL,
  `short_description` TEXT NULL,
  `description` LONGTEXT NULL,
  `image` VARCHAR(255) NULL,
  `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci';

-- Add campuses table 
CREATE TABLE IF NOT EXISTS `campuses` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(191) NOT NULL UNIQUE,
  `short_description` TEXT NULL,
  `description` LONGTEXT NULL,
  `image` VARCHAR(255) NULL,
  `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci';

-- Add blogs table
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(191) NOT NULL UNIQUE,
  `short_description` TEXT NULL,
  `description` LONGTEXT NULL,
  `image` VARCHAR(255) NULL,
  `author` VARCHAR(255) NULL,
  `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci';

-- Add galleries table
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NULL,
  `image` VARCHAR(255) NOT NULL,
  `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci';

-- Add faqs table
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `question` VARCHAR(255) NOT NULL,
  `answer` TEXT NOT NULL,
  `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci';

-- Add banners table
CREATE TABLE IF NOT EXISTS `banners` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NULL,
  `subtitle` VARCHAR(255) NULL,
  `image` VARCHAR(255) NOT NULL,
  `link` VARCHAR(255) NULL,
  `button_text` VARCHAR(255) NULL,
  `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci';

-- Add testimonials table
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `designation` VARCHAR(255) NULL,
  `message` TEXT NOT NULL,
  `image` VARCHAR(255) NULL,
  `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci';

-- Course Categories Table
CREATE TABLE IF NOT EXISTS `course_categories` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(191) NOT NULL UNIQUE,
  `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci';

-- Add category_id to courses table
ALTER TABLE `courses` 
ADD COLUMN `category_id` BIGINT UNSIGNED NULL AFTER `id`,
ADD CONSTRAINT `fk_course_category` FOREIGN KEY (`category_id`) REFERENCES `course_categories`(`id`) ON DELETE SET NULL;

-- Contacts / Enquiries Table
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(255) NULL,
  `subject` VARCHAR(255) NULL,
  `message` TEXT NOT NULL,
  `status` ENUM('unread', 'read') NOT NULL DEFAULT 'unread',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci';

ALTER TABLE `campuses` 
ADD COLUMN `tab_overview` LONGTEXT NULL AFTER `description`,
ADD COLUMN `tab_descriptions` LONGTEXT NULL AFTER `tab_overview`,
ADD COLUMN `tab_career` LONGTEXT NULL AFTER `tab_descriptions`,
ADD COLUMN `tab_summary` LONGTEXT NULL AFTER `tab_career`;

-- 13-03-2026

ALTER TABLE `branches`
    ADD COLUMN `name` VARCHAR(255) NOT NULL AFTER `id`,
    ADD COLUMN `address` TEXT NULL AFTER `name`,
    ADD COLUMN `phone` VARCHAR(255) NULL AFTER `address`,
    ADD COLUMN `email` VARCHAR(255) NULL AFTER `phone`,
    ADD COLUMN `opening_hours` TEXT NULL AFTER `email`,
    ADD COLUMN `map_embed` TEXT NULL AFTER `opening_hours`,
    ADD COLUMN `sort_order` INT NOT NULL DEFAULT 0 AFTER `map_embed`,
    ADD COLUMN `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active' AFTER `sort_order`,
    ADD COLUMN `created_at` TIMESTAMP NULL AFTER `status`,
    ADD COLUMN `updated_at` TIMESTAMP NULL AFTER `created_at`;