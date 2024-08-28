-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 28, 2024 at 12:49 PM
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
-- Database: `president`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_alt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `home_page_items`
--

DROP TABLE IF EXISTS `home_page_items`;
CREATE TABLE IF NOT EXISTS `home_page_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `hero_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_title_animate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hero_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hero_btn_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_btn_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_banner_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_banner_alt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `story_banner_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `story_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `story_subtitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deal_banner_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `achievement_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `achievement_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `achievement_project` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `achievement_award` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `achievement_client` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `achievement_employee` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `support_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `support_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `support_banner_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `support_banner_alt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `service_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `service_btn_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_btn_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `work_process_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_process_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `testimonial_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `partner_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `newsletter_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsletter_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `newsletter_bg_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_page_items`
--

INSERT INTO `home_page_items` (`id`, `hero_title`, `hero_title_animate`, `hero_description`, `hero_btn_text`, `hero_btn_url`, `hero_banner_img`, `hero_banner_alt`, `story_banner_img`, `story_title`, `story_subtitle`, `deal_banner_img`, `client_title`, `client_description`, `achievement_title`, `achievement_description`, `achievement_project`, `achievement_award`, `achievement_client`, `achievement_employee`, `support_title`, `support_description`, `support_banner_img`, `support_banner_alt`, `service_title`, `service_description`, `service_btn_text`, `service_btn_url`, `work_process_title`, `work_process_description`, `testimonial_title`, `testimonial_description`, `partner_title`, `partner_description`, `product_title`, `product_description`, `newsletter_title`, `newsletter_description`, `newsletter_bg_img`, `created_at`, `updated_at`) VALUES
(1, 'SPRING / SUMMER COLLECTION 2024', NULL, 'Get up to 30% Off New Arrivals', 'Shop Now', 'products', 'upload/1799830267919548.jpg', 'Office Room BPO Service Presentation', 'upload/1801561478128226.gif', 'OUR STORY Purpose And Values', 'YOUR TRAVEL COMPANION SINCE 1960', 'upload/1799642133746665.png', 'Trusted Clients', 'Clients Satisfaction Is Our Main Priority', 'Achievements', 'Clear goals and committed efforts keep us winning!', '50', '47', '40', '650', 'Empowering Your Business Needs', 'We create successful products for our customers in the field of Technology & IT solutions. Our goal is to provide not only a service but also long term win-win partnership.', 'upload/1789515363391246.jpg', 'office desk with working IT solution developers', 'Services', 'Completely Sustainable Solutions for Your Business Needs, Without A Doubt', 'All Service', '/services', 'Our Approach', 'Our professional and strategic process leads to your success, we understand your goals in-depth and convert your ideas into a real success story.', 'Our Client Says', NULL, 'Partners And Certification', 'We are affiliated with leading firms and organizations around the world.', 'Completed Projects', 'Discover our completed products, how they work, and their impact.', 'Subscribe To Our Newsletter !', 'We Are A Leading IT Company Experienced In Creative And Innovative Development And Design Solutions .', 'upload/1799646417951383.png', NULL, '2024-06-11 10:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_15_061614_create_settings_table', 2),
(6, '2024_01_16_102513_create_home_page_items_table', 3),
(7, '2024_01_21_055826_create_page_items_table', 4),
(41, '2024_01_22_070135_create_product_categories_table', 22),
(26, '2024_01_22_134546_create_social_items_table', 13),
(61, '2024_08_26_141716_create_product_variant_sizes_table', 25),
(33, '2024_02_05_062408_create_galleries_table', 18),
(34, '2024_02_05_134707_create_youtube_videos_table', 19),
(60, '2024_05_29_100948_create_product_variants_table', 25),
(59, '2024_05_20_035758_create_product_multi_photos_table', 25),
(58, '2024_01_22_064748_create_products_table', 25),
(53, '2024_06_03_070119_create_orders_table', 24),
(54, '2024_06_03_070244_create_order_items_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payment_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_phone_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_order` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `adress`, `post_code`, `notes`, `payment_type`, `payment_method`, `transaction_id`, `sender_phone_number`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_reason`, `return_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Robiul Islam', 'admin@email.com', '02445454', 'Address', '1604', 'notes', NULL, 'Cash On Delivery', NULL, NULL, 2400.00, '66cf0e16f003b', 'CUST19925094', '28 August 2024', 'August', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2024-08-28 11:46:30', '2024-08-28 11:46:30'),
(2, 1, 'Rifat', 'user@email.com', '01609071300', 'sdfdsfdsf', '1230', 'sdfdsfds', NULL, 'Nagad', '84fd5g4dfg', '878787878787', 3800.00, '66cf0ee1b7e64', 'CUST11015894', '28 August 2024', 'August', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'deliverd', '2024-08-28 11:49:53', '2024-08-28 12:09:47'),
(3, 1, 'Rana', 'user@email.com', '02445454', 'sdf', '1203', 'sdf', NULL, 'Cash On Delivery', NULL, NULL, 2000.00, '66cf157e2484a', 'CUST15078309', '28 August 2024', 'August', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'deliverd', '2024-08-28 12:18:06', '2024-08-28 12:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `image`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Gray', '', 'upload/product/1808453602289276.png', '2', 450.00, '2024-08-28 11:46:30', '2024-08-28 11:46:30'),
(2, 1, 2, 'Blue', '', 'upload/product/1808454779781930.png', '1', 1500.00, '2024-08-28 11:46:30', '2024-08-28 11:46:30'),
(3, 2, 2, 'Gray', '', 'upload/product/1808453602289276.png', '4', 450.00, '2024-08-28 11:49:53', '2024-08-28 11:49:53'),
(4, 2, 2, 'Blue', '', 'upload/product/1808454779781930.png', '1', 2000.00, '2024-08-28 11:49:53', '2024-08-28 11:49:53'),
(5, 3, 2, 'Blue', 'M', 'upload/product/1808454779781930.png', '1', 2000.00, '2024-08-28 12:18:06', '2024-08-28 12:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `page_items`
--

DROP TABLE IF EXISTS `page_items`;
CREATE TABLE IF NOT EXISTS `page_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_heading` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_seo_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_seo_meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_choose_us_heading` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_choose_us_short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio_heading` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio_short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio_banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio_seo_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio_seo_meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_heading` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `blog_banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_seo_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_seo_meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_heading` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_boss_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_boss_alt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `team_boss_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_boss_designation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_seo_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_seo_meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_heading` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_seo_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_seo_meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_heading` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_map` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_seo_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_seo_meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_heading` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_seo_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_seo_meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_video_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_video_section_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_video_section_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_condition_heading` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_condition_short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_condition_banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_condition_seo_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_condition_seo_meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_condition_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy_heading` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy_short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy_banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy_seo_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy_seo_meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_items`
--

INSERT INTO `page_items` (`id`, `service_heading`, `service_short_description`, `service_banner`, `service_seo_title`, `service_seo_meta_description`, `service_choose_us_heading`, `service_choose_us_short_description`, `portfolio_heading`, `portfolio_short_description`, `portfolio_banner`, `portfolio_seo_title`, `portfolio_seo_meta_description`, `blog_heading`, `blog_short_description`, `blog_banner`, `blog_seo_title`, `blog_seo_meta_description`, `team_heading`, `team_short_description`, `team_banner`, `team_boss_img`, `team_boss_alt`, `team_boss_name`, `team_boss_designation`, `team_seo_title`, `team_seo_meta_description`, `about_heading`, `about_short_description`, `about_banner`, `about_seo_title`, `about_seo_meta_description`, `contact_heading`, `contact_short_description`, `contact_banner`, `contact_map`, `contact_seo_title`, `contact_seo_meta_description`, `career_heading`, `career_short_description`, `career_banner`, `career_seo_title`, `career_seo_meta_description`, `career_video_link`, `career_video_section_title`, `career_video_section_text`, `term_condition_heading`, `term_condition_short_description`, `term_condition_banner`, `term_condition_seo_title`, `term_condition_seo_meta_description`, `term_condition_details`, `privacy_policy_heading`, `privacy_policy_short_description`, `privacy_policy_banner`, `privacy_policy_seo_title`, `privacy_policy_seo_meta_description`, `privacy_policy_details`, `created_at`, `updated_at`) VALUES
(1, 'Services', 'We Assure You That Our Services Will Sustain Your Business Needs, Without A Doubt', 'upload/banner/1789967170569743.webp', 'Services by Essential-Infotech', 'Essential-Infotech provides all types of IT Solutions including web, software, application development, virtual assistance, cold calling and more back office support services.', 'Why Choose Essential-Infotech?', 'Since 2018, Essential-Infotech has been a leading IT solutions provider with proven expertise and a reputation that extends globally. We are fully licensed & certified by ISO 9001, ISO 27001, BASIS, BACCO, and E-CAB, offering utmost reliability to our clients.', 'Completed Projects', 'Essential-Infotech has worked with over 50 companies from around the globe. We give our best to ensure client satisfaction and most importantly results!\r\n\r\nWe have the resources to help both small and big companies grow. Our products and services are being used by local businesses, as well as foreign companies to generate positive outcomes that drive business goals. Below you will find completed projects done by our very own team of professionals.', 'upload/banner/1788873715354748.png', 'Completed Projects by Essential-Infotech on web design, development, software development, CRM, virtual assistance and more.', 'View all completed projects done by Essential-Infotech and the clients we have served so far.', 'Discover BPO, and IT Solution News & Updates - Blog', 'Read the latest industry updates!', 'upload/banner/1788978187694663.JPG', 'BPO, and Outsourcing Industry News & Updates Blogs by Essential-Infotech', 'Regularly updated blogs by Essential-Infotech on technology, innovation, industry trends, BPO industry, software, web development and more.', 'Meet the Team', 'Essential-Infotech was established in 2018, by the visionary Mustafiz Ahmed Khan (MAK). We are a leading IT firm, developing effective IT Solutions for various business purposes. Since our inception, we have been maintaining a sophisticated code of service standard, which drives us to achieve our clients’ trust & become their reliable technology partner.', 'upload/banner/1788873956439063.png', 'upload/team/1788961676662023.png', 'founder and CEO', 'Mustafiz Ahmed Khan (MAK)', 'CEO & Founder', 'Meet the Team behind Essential-Infotech', 'The certified team of Essential-Infotech, works for clients in Europe, Australia, the United States of America and more countries across the world.', 'About us', 'Essential-Infotech Provide  E-commerce Solution', 'upload/banner/1799640256029943.png', 'About Essential-Infotech Shop1 |  E-commerce Solution', 'E-commerce Solution', 'Ready to Get Started?', 'Speak directly to an Essential-Infotech representative to discuss your business opportunities!', 'upload/banner/1799470676258368.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14594.130748583118!2d90.3909307!3d23.8707225!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c5d8d8cbae23%3A0xb9d070d503afe8a0!2sESSENTIAL%20INFO-TECH!5e0!3m2!1sen!2sbd!4v1706952376494!5m2!1sen!2sbd\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Contact Essential-Infotech', 'Essential-Infotech provides IT Solutions including web development, software solutions and mobile application, also digital marketing & back-office support.', 'EIT Benefits', 'Essential-Infotech is a leading IT Solution provider serving across the globe. We are renowned for our services in the United States of America, Japan, Europe, Southeast Asia, and a lot more. When you work for us, you get unlimited coffee, a friendly team, in-house training, and the world\'s BEST Boss.', 'upload/banner/1789310175072384.JPEG', 'Career and Job Opportunity at Essential-Infotech', 'Essential-Infotech is a leading IT Solution provider serving across the globe in areas like the United States of America, Japan, Europe, Southeast Asia, and more.', 't2tyn9zK228', 'Explore Your Career Opportunity at Essential-Infotech', '<p class=\"work-desc\" style=\"box-sizing: border-box; text-transform: capitalize; transition-duration: 0.3s; font-family: Poppins; margin-top: 0px; margin-bottom: 1rem; color: #626262; font-size: 16px; line-height: 24px; background-color: #f7f7f7;\">Essential-Infotech welcomes young talents onboard our team. We look for skilled individuals with a sense of <strong>responsibility</strong>, <strong>professionalism</strong>, and <strong>respect </strong>towards other team members. We fill our office with not only work but also fun, cultural activities, sports, tours, picnics, humor, and most importantly success.</p>\r\n<p class=\"work-desc\" style=\"box-sizing: border-box; text-transform: capitalize; transition-duration: 0.3s; font-family: Poppins; margin-top: 0px; margin-bottom: 1rem; color: #626262; font-size: 16px; line-height: 24px; background-color: #f7f7f7;\">In addition to joining our team, we provide life-changing training to improve skills, and also motivate them to utilize their training to continuously level up. And if you have the potential to work hard and have confidence that you can match our demanded credentials, then why wait?</p>\r\n<p class=\"work-desc\" style=\"box-sizing: border-box; text-transform: capitalize; transition-duration: 0.3s; font-family: Poppins; margin-top: 0px; margin-bottom: 1rem; color: #626262; font-size: 16px; line-height: 24px; background-color: #f7f7f7;\">Browse the open opportunities and apply now before someone else does!</p>\r\n<p class=\"work-desc\" style=\"box-sizing: border-box; text-transform: capitalize; transition-duration: 0.3s; font-family: Poppins; margin-top: 0px; margin-bottom: 1rem; color: #626262; font-size: 16px; line-height: 24px; background-color: #f7f7f7;\">Your <strong>dream job </strong>awaits you!</p>', 'Terms & Conditions', 'Terms & ConditionsTerms & ConditionsTerms & ConditionsTerms & Conditions', 'upload/banner/1799640987047709.png', 'Terms & Conditions of Essential-Infotech', 'Terms & Conditions', '<div class=\"node-header\" style=\"box-sizing: border-box; position: relative; padding-right: 0px; padding-left: 0px; justify-content: space-between; color: #4a4a4a; font-family: \'Open Sans\', sans-serif; font-size: 14px; background-color: #ffffff;\">\r\n<div id=\"min-overide\" style=\"box-sizing: border-box; width: calc(100% - 48px); float: left;\">\r\n<h2 id=\"What_Are_Terms_And_Conditions_Agreements\" style=\"margin-right: 0px; margin-bottom: 1.75rem; margin-left: 0px; font-weight: 700; font-size: clamp(2rem, 4vw, 2.75rem); line-height: clamp(2.75rem, 4vw, 3.5rem); color: rgb(4, 12, 26); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\">What are Terms and Conditions Agreements?</h2><h1 style=\"font-size: 1.75em; margin-right: 0px; margin-bottom: 8px; margin-left: 0px; line-height: 1.25; color: rgb(0, 0, 0);\"><p style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; color: rgb(4, 12, 26); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 19.2px; letter-spacing: normal;\">A Terms and Conditions agreement acts as a legal contract between you (the company) and the user. It\'s where you&nbsp;<span style=\"font-weight: 700;\">maintain your rights</span>&nbsp;to exclude users from your app in the event that they abuse your website/app, set out the rules for using your service and note other important details and disclaimers.</p></h1></div></div><div class=\"field field--name-field-sections field--type-entity-reference-revisions field--label-hidden field__items\" style=\"box-sizing: border-box; clear: left; color: #4a4a4a; font-family: \'Open Sans\', sans-serif; font-size: 14px; background-color: #ffffff;\"><div class=\"field__item\" style=\"box-sizing: border-box;\"><div class=\"paragraph paragraph--type-legacy paragraph--view-mode-default ds-1col clearfix\" style=\"box-sizing: border-box;\"><div class=\"ds-1col section section-11386 clearfix\" style=\"box-sizing: border-box;\"><div class=\"clearfix text-formatted field field--name-field-content field--type-text-long field--label-hidden field__item\" style=\"box-sizing: border-box;\"><ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1em; padding: 0px 0px 0px 24px; list-style-position: initial; list-style-image: initial;\">\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'Privacy Policy', 'Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Policy', 'upload/banner/1799641037512959.png', 'Privacy Policy', 'Privacy Policy', '<h2 id=\"what-is-a-privacy-policy\" style=\"box-sizing: border-box; border: 0px solid; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: #3b82f680; --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; font-size: 40px; margin: 1.2em 0px 1em; line-height: 1.1em; letter-spacing: -0.025em; color: #1f1e33; font-family: Helvetica, Arial, sans-serif;\"><span style=\"font-size: 19px; letter-spacing: normal;\">A&nbsp;</span><span style=\"border: 0px solid; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: #3b82f680; --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: bolder; font-size: 19px; letter-spacing: normal;\">website’s privacy policy</span><span style=\"font-size: 19px; letter-spacing: normal;\">&nbsp;outlines if and how you collect, use, share, or sell your visitors’ personal information and is required under laws like the General Data Privacy Regulation (GDPR) and the California Consumer Privacy Act (CCPA).</span><br></h2>', NULL, '2024-08-08 08:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_category_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `long_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_category_id`, `product_name`, `product_slug`, `product_code`, `video_link`, `short_description`, `long_description`, `status`, `created_at`, `updated_at`) VALUES
(2, '9', 'bag', 'bag', '111', NULL, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.', '<p><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; letter-spacing: normal;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.<br></span><br><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; letter-spacing: normal;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</span><br></p>', '1', '2024-08-26 10:33:20', '2024-08-28 04:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_top` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `photo`, `is_top`, `is_banner`, `order`, `created_at`, `updated_at`) VALUES
(9, 'Kids', 'kids', 'upload/product_category/1808433474580462.png', 'Yes', 'Yes', 1, '2024-08-26 07:15:58', '2024-08-26 07:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_multi_photos`
--

DROP TABLE IF EXISTS `product_multi_photos`;
CREATE TABLE IF NOT EXISTS `product_multi_photos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `photo_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_multi_photos`
--

INSERT INTO `product_multi_photos` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(6, 2, 'upload/product/1808445893164410.png', '2024-08-26 10:33:21', '2024-08-26 10:33:21'),
(5, 2, 'upload/product/1808445892930749.png', '2024-08-26 10:33:20', '2024-08-26 10:33:20'),
(4, 2, 'upload/product/1808445892749678.jpeg', '2024-08-26 10:33:20', '2024-08-26 10:33:20'),
(7, 2, 'upload/product/1808604594362223.jpeg', '2024-08-28 04:35:51', '2024-08-28 04:35:51'),
(8, 2, 'upload/product/1808604595919210.jpeg', '2024-08-28 04:35:51', '2024-08-28 04:35:51'),
(9, 2, 'upload/product/1808604596188360.png', '2024-08-28 04:35:52', '2024-08-28 04:35:52'),
(10, 2, 'upload/product/1808604596701527.png', '2024-08-28 04:35:52', '2024-08-28 04:35:52'),
(11, 2, 'upload/product/1808604619067583.jpeg', '2024-08-28 04:36:14', '2024-08-28 04:36:14'),
(12, 2, 'upload/product/1808604619371485.jpeg', '2024-08-28 04:36:14', '2024-08-28 04:36:14'),
(13, 2, 'upload/product/1808604619610394.jpeg', '2024-08-28 04:36:14', '2024-08-28 04:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

DROP TABLE IF EXISTS `product_variants`;
CREATE TABLE IF NOT EXISTS `product_variants` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_variants_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `color`, `photo`, `created_at`, `updated_at`) VALUES
(5, 2, 'Gray', 'upload/product/1808453602289276.png', '2024-08-26 12:35:53', '2024-08-26 12:35:53'),
(6, 2, 'Blue', 'upload/product/1808454779781930.png', '2024-08-26 12:54:36', '2024-08-26 12:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_sizes`
--

DROP TABLE IF EXISTS `product_variant_sizes`;
CREATE TABLE IF NOT EXISTS `product_variant_sizes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_variant_id` bigint UNSIGNED NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `selling_price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_variant_sizes_product_variant_id_foreign` (`product_variant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variant_sizes`
--

INSERT INTO `product_variant_sizes` (`id`, `product_variant_id`, `size`, `quantity`, `selling_price`, `discount_price`, `created_at`, `updated_at`) VALUES
(8, 5, 'XL', 6, '600', NULL, '2024-08-26 12:35:53', '2024-08-28 12:18:32'),
(7, 5, 'L', 4, '500', '450', '2024-08-26 12:35:53', '2024-08-26 12:35:53'),
(10, 6, 'M', 12, '2000', NULL, '2024-08-26 12:54:36', '2024-08-26 12:54:36'),
(9, 6, 'S', 14, '1500', NULL, '2024-08-26 12:54:36', '2024-08-26 12:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_phone_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_phone_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `map_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_copyright_by` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_copyright_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `logo`, `favicon`, `phone_1`, `phone_2`, `email`, `address`, `us_address`, `us_phone_1`, `us_phone_2`, `map_link`, `meta_keyword`, `meta_description`, `footer_logo`, `footer_text`, `footer_copyright_by`, `footer_copyright_url`, `created_at`, `updated_at`) VALUES
(1, 'President | Essential-Infotech', 'upload/logo.webp', 'upload/favicon.webp', '+880 1810150561', '+880 9614881148', 'info@essential-infotech.com', 'Garib-E-Newaz Avenue, Sector#13, Uttara, Dhaka 1230', '1567 Kimball Road, Arab, AL 35016', '+1 (844)-644-1744', NULL, 'https://maps.app.goo.gl/tcgZqMDbrevJcYN57', 'call center service, website, software development, BPO service provider, virtual assistance', 'Essential-Infotech is a BPO service provider, offering call center service, outsource back office support, website, app, software development, & IT Solutions.', 'upload/footer_logo.webp', 'We are a leading IT company experienced in innovative development and design solutions. We have a unique, out-of-the-box approach to cope with custom clients\' needs and demands. Success is essential to your business; so are we!', 'Essential-Infotech', 'https://essential-infotech.com', NULL, '2024-06-25 10:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `social_items`
--

DROP TABLE IF EXISTS `social_items`;
CREATE TABLE IF NOT EXISTS `social_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_items`
--

INSERT INTO `social_items` (`id`, `icon`, `url`, `created_at`, `updated_at`) VALUES
(1, '<i class=\"fa-brands fa-facebook\"></i>', 'https://www.facebook.com/essentialinfotech', '2024-01-22 08:04:02', '2024-05-19 02:53:58'),
(2, '<i class=\"fa-brands fa-instagram\"></i>', 'https://www.instagram.com/essentialinfotech', '2024-01-22 08:04:36', '2024-05-19 02:53:53'),
(3, '<i class=\"fa-brands fa-linkedin\"></i>', 'https://www.linkedin.com/company/essential-infotech', '2024-01-22 08:04:37', '2024-01-24 13:04:42'),
(4, '<i class=\"fa-brands fa-x-twitter\"></i>', 'https://twitter.com/essentialinfot', '2024-01-29 11:33:48', '2024-01-29 11:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@email.com', NULL, '$2y$12$hEs4tFog4hGgSOOqXRJMsOmNqnMbtk6Cu0VEMFTDoCGJ1b8WUqBLe', '202405190840favicon.png', NULL, 'admin', 'active', NULL, '2024-01-14 04:47:02', '2024-05-19 02:40:27'),
(2, 'username', NULL, 'user@email.com', NULL, '$2y$12$cdUFk/vr3gBJqu1PV64XOOtsoKfThQvoMYVHxZElnnMJiWRDziT32', NULL, '0245454545', 'user', 'active', NULL, '2024-01-14 06:35:54', '2024-06-23 10:27:20'),
(3, 'new User', NULL, 'nuser@email.com', NULL, '$2y$12$s3F2jxPhoAUkD7qzN3s17OvvJSmwKPVnxvRYgAFZNRPjDWXpqVj8S', NULL, NULL, 'user', 'active', NULL, '2024-06-20 04:14:28', '2024-06-20 04:14:28'),
(4, 'nnuser', NULL, 'nnuser@email.com', NULL, '$2y$12$4xEETzlZY1HvhERdquqsNeBrdfB3AoR6Tup2qLynUqTqYRNlZ4x7S', NULL, NULL, 'user', 'active', NULL, '2024-06-20 04:41:37', '2024-06-20 04:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `youtube_videos`
--

DROP TABLE IF EXISTS `youtube_videos`;
CREATE TABLE IF NOT EXISTS `youtube_videos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `video_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
