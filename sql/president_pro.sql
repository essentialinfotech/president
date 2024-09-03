-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 03, 2024 at 11:34 AM
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
-- Database: `president_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_items`
--

DROP TABLE IF EXISTS `about_items`;
CREATE TABLE IF NOT EXISTS `about_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_alt` text COLLATE utf8mb4_unicode_ci,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `hero_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_title_animate` text COLLATE utf8mb4_unicode_ci,
  `hero_description` text COLLATE utf8mb4_unicode_ci,
  `hero_btn_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_btn_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_banner_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_banner_alt` text COLLATE utf8mb4_unicode_ci,
  `story_banner_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `story_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `story_subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_page_items`
--

INSERT INTO `home_page_items` (`id`, `hero_title`, `hero_title_animate`, `hero_description`, `hero_btn_text`, `hero_btn_url`, `hero_banner_img`, `hero_banner_alt`, `story_banner_img`, `story_title`, `story_subtitle`, `product_title`, `product_description`, `created_at`, `updated_at`) VALUES
(1, 'SPRING / SUMMER COLLECTION 2024', NULL, 'Get up to 30% Off New Arrivals', 'Shop Now', 'products', 'upload/1799830267919548.jpg', 'Office Room BPO Service Presentation', 'upload/1801561478128226.gif', 'OUR STORY Purpose And Values', 'YOUR TRAVEL COMPANION SINCE 1960', 'Completed Projects', 'Discover our completed products, how they work, and their impact.', NULL, '2024-06-11 10:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(45, '2024_05_20_035758_create_product_multi_photos_table', 23),
(41, '2024_01_22_070135_create_product_categories_table', 22),
(26, '2024_01_22_134546_create_social_items_table', 13),
(29, '2024_01_24_140718_create_about_items_table', 15),
(33, '2024_02_05_062408_create_galleries_table', 18),
(34, '2024_02_05_134707_create_youtube_videos_table', 19),
(44, '2024_01_22_064748_create_products_table', 23),
(46, '2024_05_29_100948_create_product_variants_table', 23),
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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_phone_number` text COLLATE utf8mb4_unicode_ci,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_order` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_items`
--

DROP TABLE IF EXISTS `page_items`;
CREATE TABLE IF NOT EXISTS `page_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `about_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_seo_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_seo_meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_seo_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_seo_meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_condition_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_condition_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_condition_banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_condition_seo_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_condition_seo_meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_condition_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy_banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy_seo_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy_seo_meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_items`
--

INSERT INTO `page_items` (`id`, `about_heading`, `about_short_description`, `about_banner`, `about_seo_title`, `about_seo_meta_description`, `contact_heading`, `contact_short_description`, `contact_banner`, `contact_map`, `contact_seo_title`, `contact_seo_meta_description`, `term_condition_heading`, `term_condition_short_description`, `term_condition_banner`, `term_condition_seo_title`, `term_condition_seo_meta_description`, `term_condition_details`, `privacy_policy_heading`, `privacy_policy_short_description`, `privacy_policy_banner`, `privacy_policy_seo_title`, `privacy_policy_seo_meta_description`, `privacy_policy_details`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'President Luggage has built a positive reputation globally  and Bangladesh is no exception. President Luggage offers Bangladeshi travellers the perfect blend of quality, style, innovation, and reliability  With its track record of excellence and customer satisfaction, President Luggage has garnered trust and admiration from travellers across Bangladesh.', 'upload/banner/1799640256029943.png', 'About Essential-Infotech Shop1 |  E-commerce Solution', 'E-commerce Solution', 'Ready to Get Started?', 'Speak directly to an Essential-Infotech representative to discuss your business opportunities!', 'upload/banner/1799470676258368.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14594.130748583118!2d90.3909307!3d23.8707225!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c5d8d8cbae23%3A0xb9d070d503afe8a0!2sESSENTIAL%20INFO-TECH!5e0!3m2!1sen!2sbd!4v1706952376494!5m2!1sen!2sbd\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Contact Essential-Infotech', 'Essential-Infotech provides IT Solutions including web development, software solutions and mobile application, also digital marketing & back-office support.', 'Terms & Conditions', 'Terms & ConditionsTerms & ConditionsTerms & ConditionsTerms & Conditions', 'upload/banner/1799640987047709.png', 'Terms & Conditions of Essential-Infotech', 'Terms & Conditions', '<div class=\"node-header\" style=\"box-sizing: border-box; position: relative; padding-right: 0px; padding-left: 0px; justify-content: space-between; color: #4a4a4a; font-family: \'Open Sans\', sans-serif; font-size: 14px; background-color: #ffffff;\">\r\n<div id=\"min-overide\" style=\"box-sizing: border-box; width: calc(100% - 48px); float: left;\">\r\n<h2 id=\"What_Are_Terms_And_Conditions_Agreements\" style=\"margin-right: 0px; margin-bottom: 1.75rem; margin-left: 0px; font-weight: 700; font-size: clamp(2rem, 4vw, 2.75rem); line-height: clamp(2.75rem, 4vw, 3.5rem); color: rgb(4, 12, 26); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\">What are Terms and Conditions Agreements?</h2><h1 style=\"font-size: 1.75em; margin-right: 0px; margin-bottom: 8px; margin-left: 0px; line-height: 1.25; color: rgb(0, 0, 0);\"><p style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; color: rgb(4, 12, 26); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 19.2px; letter-spacing: normal;\">A Terms and Conditions agreement acts as a legal contract between you (the company) and the user. It\'s where you&nbsp;<span style=\"font-weight: 700;\">maintain your rights</span>&nbsp;to exclude users from your app in the event that they abuse your website/app, set out the rules for using your service and note other important details and disclaimers.</p></h1></div></div><div class=\"field field--name-field-sections field--type-entity-reference-revisions field--label-hidden field__items\" style=\"box-sizing: border-box; clear: left; color: #4a4a4a; font-family: \'Open Sans\', sans-serif; font-size: 14px; background-color: #ffffff;\"><div class=\"field__item\" style=\"box-sizing: border-box;\"><div class=\"paragraph paragraph--type-legacy paragraph--view-mode-default ds-1col clearfix\" style=\"box-sizing: border-box;\"><div class=\"ds-1col section section-11386 clearfix\" style=\"box-sizing: border-box;\"><div class=\"clearfix text-formatted field field--name-field-content field--type-text-long field--label-hidden field__item\" style=\"box-sizing: border-box;\"><ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1em; padding: 0px 0px 0px 24px; list-style-position: initial; list-style-image: initial;\">\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'Privacy Policy', 'Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Policy', 'upload/banner/1799641037512959.png', 'Privacy Policy', 'Privacy Policy', '<h2 id=\"what-is-a-privacy-policy\" style=\"box-sizing: border-box; border: 0px solid; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: #3b82f680; --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; font-size: 40px; margin: 1.2em 0px 1em; line-height: 1.1em; letter-spacing: -0.025em; color: #1f1e33; font-family: Helvetica, Arial, sans-serif;\"><span style=\"font-size: 19px; letter-spacing: normal;\">A&nbsp;</span><span style=\"border: 0px solid; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: #3b82f680; --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: bolder; font-size: 19px; letter-spacing: normal;\">website’s privacy policy</span><span style=\"font-size: 19px; letter-spacing: normal;\">&nbsp;outlines if and how you collect, use, share, or sell your visitors’ personal information and is required under laws like the General Data Privacy Regulation (GDPR) and the California Consumer Privacy Act (CCPA).</span><br></h2>', NULL, '2024-08-08 18:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `long_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_bundle` text COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_category_id`, `product_name`, `product_slug`, `product_code`, `video_link`, `short_description`, `long_description`, `is_bundle`, `status`, `created_at`, `updated_at`) VALUES
(20, '12', 'School Bag-PM 00350-H', 'school-bag-pm-00350-h', 'PM 00350-H', NULL, 'd', '<p>ddsfdscds</p>', NULL, '1', '2024-08-22 16:58:19', '2024-08-31 03:44:23'),
(22, '9', 'Trolley Case QQ 920 - 18\"', 'trolley-case-qq-920-18', 'QQ 920', NULL, 'aSda', '<p>asdasd</p>', NULL, '1', '2024-08-22 17:19:56', '2024-08-22 18:00:14'),
(23, '9', 'Trolley Case QQ 920 - 22\"', 'trolley-case-qq-920-22', 'QQ 920', NULL, 'asdsada', '<p>asdsadasd</p>', NULL, '1', '2024-08-22 17:28:48', '2024-08-22 18:02:11'),
(24, '12', 'School Bag-PM 0404-N', 'school-bag-pm-0404-n', 'PM 0404-N', NULL, '1', '<p>2</p>', NULL, '1', '2024-08-22 17:33:25', '2024-08-22 17:33:25'),
(25, '18', 'BC -18\"', 'bc-18', '3173', NULL, 'Brief case', NULL, NULL, '1', '2024-08-22 17:36:36', '2024-08-22 17:36:36'),
(26, '12', 'School Bag-PM 00532-H', 'school-bag-pm-00532-h', 'PM 00532-H', NULL, '1', '<p>21</p>', NULL, '1', '2024-08-22 17:37:00', '2024-08-22 18:41:46'),
(27, '12', 'School Bag-PM 00554-H', 'school-bag-pm-00554-h', 'PM 00554-H', NULL, '1', '<p>1</p>', NULL, '1', '2024-08-22 17:39:03', '2024-08-22 17:39:03'),
(28, '12', 'School Bag-PM 00555-H', 'school-bag-pm-00555-h', 'PM 00555-H', NULL, '1', '<p>1</p>', NULL, '1', '2024-08-22 17:41:02', '2024-08-22 17:41:02'),
(29, '12', 'School Bag-PM 0606-N', 'school-bag-pm-0606-n', 'PM 0606-N', NULL, '1', '<p>1</p>', NULL, '1', '2024-08-22 17:43:14', '2024-08-22 17:43:14'),
(30, '12', 'School Bag-PM 0707-N', 'school-bag-pm-0707-n', 'PM 0707-N', NULL, NULL, '<p>1</p>', NULL, '1', '2024-08-22 17:44:43', '2024-08-22 23:59:56'),
(31, '12', 'School Bag-PM 732-T', 'school-bag-pm-732-t', 'PM 732-T', NULL, '1', '<p>1</p>', NULL, '1', '2024-08-22 17:48:23', '2024-08-22 23:49:01'),
(32, '12', 'School Bag-PM 1202A-P', 'school-bag-pm-1202a-p', 'PM 1202A-P', NULL, '1', '<p><br></p>', NULL, '1', '2024-08-22 17:51:37', '2024-08-22 17:51:37'),
(33, '12', 'School Bag-PM 1901-T', 'school-bag-pm-1901-t', 'PM 1901-T', NULL, '1', NULL, NULL, '1', '2024-08-22 17:53:41', '2024-08-22 17:53:41'),
(34, '12', 'School Bag-PM 1905-T', 'school-bag-pm-1905-t', 'PM 1905-T', NULL, '1', NULL, NULL, '1', '2024-08-22 17:55:35', '2024-08-22 17:55:57'),
(35, '12', 'School Bag- PM 1919-N', 'school-bag-pm-1919-n', 'PM 1919-N', NULL, '1', NULL, NULL, '1', '2024-08-22 18:00:38', '2024-08-22 18:00:38'),
(36, '9', 'Trolley Case QQ 920 - 26\"', 'trolley-case-qq-920-26', 'QQ 920', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:04:37', '2024-08-22 18:09:18'),
(37, '12', 'School Bag-PM 2318-1-T', 'school-bag-pm-2318-1-t', 'PM 2318-1-T', NULL, '1', NULL, NULL, '1', '2024-08-22 18:04:37', '2024-08-22 23:52:31'),
(38, '9', 'Trolley Case QQ 932 - 20\"', 'trolley-case-qq-932-20', 'QQ 932', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:06:44', '2024-08-26 19:46:45'),
(39, '13', 'SHOULDER- PM 8343-S', 'shoulder-pm-8343-s', 'PM 8343-S', NULL, '1', NULL, NULL, '1', '2024-08-22 18:07:51', '2024-08-22 18:07:51'),
(40, '9', 'Trolley Case QQ 932 - 28\"', 'trolley-case-qq-932-28', 'QQ 932', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:08:19', '2024-08-22 18:08:19'),
(41, '12', 'School Bag-PM 3089-T', 'school-bag-pm-3089-t', 'PM 3089-T', NULL, '1', NULL, NULL, '1', '2024-08-22 18:09:16', '2024-08-22 18:09:16'),
(43, '12', 'School Bag-PM 3116-T', 'school-bag-pm-3116-t', 'PM 3116-T', NULL, '1', NULL, NULL, '1', '2024-08-22 18:10:51', '2024-08-22 18:10:51'),
(44, '11', 'Office Bag FB PM 0909', 'office-bag-fb-pm-0909', '0909', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:11:05', '2024-08-22 18:11:05'),
(45, '9', 'Trolley Case QQ 932 - 24\"', 'trolley-case-qq-932-24', 'QQ 932', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:11:48', '2024-08-22 18:11:48'),
(46, '12', 'School Bag-PM 5116-S', 'school-bag-pm-5116-s', 'PM 5116-S', NULL, '1', NULL, NULL, '1', '2024-08-22 18:13:10', '2024-08-22 18:13:10'),
(47, '9', 'Trolley Case TT 861 - 20\"', 'trolley-case-tt-861-20', 'TT 861', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:13:32', '2024-08-22 18:13:32'),
(48, '11', 'Office Bag PM 0505', 'office-bag-pm-0505', '0505', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:13:32', '2024-08-22 18:13:32'),
(49, '9', 'Trolley Case TT 861 - 24\"', 'trolley-case-tt-861-24', 'TT 861', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:13:51', '2024-08-22 18:13:51'),
(50, '12', 'School Bag-PM 5350-S', 'school-bag-pm-5350-s', 'PM 5350-S', NULL, '1', NULL, NULL, '1', '2024-08-22 18:14:59', '2024-08-22 18:14:59'),
(51, '12', 'School Bag-PM 5801-N', 'school-bag-pm-5801-n', 'PM 5801-N', NULL, '1', NULL, NULL, '1', '2024-08-22 18:16:56', '2024-08-22 18:16:56'),
(52, '11', 'Office Bag FB PM 1122', 'office-bag-fb-pm-1122', '1122', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:17:12', '2024-08-22 18:17:12'),
(53, '12', 'School Bag-PM 6301-S', 'school-bag-pm-6301-s', 'PM 6301-S', NULL, '1', NULL, NULL, '1', '2024-08-22 18:18:10', '2024-08-22 18:18:10'),
(54, '13', 'SHOULDER-PM 16079-S', 'shoulder-pm-16079-s', 'PM 16079-S', NULL, '1', NULL, NULL, '1', '2024-08-22 18:19:54', '2024-08-22 18:19:54'),
(55, '12', 'School Bag-PM 6302-S', 'school-bag-pm-6302-s', 'PM 6302-S', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:20:07', '2024-08-22 18:20:07'),
(56, '9', 'Trolley Case TT 861 - 28\"', 'trolley-case-tt-861-28', 'TT 861', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:20:07', '2024-08-22 18:20:07'),
(57, '9', 'Trolley Case  9593 -18\"', 'trolley-case-9593-18', '9593', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:20:24', '2024-08-22 18:37:25'),
(58, '12', 'School Bag- PM 8119-7-S', 'school-bag-pm-8119-7-s', 'PM 8119-7-S', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:22:19', '2024-08-22 18:22:19'),
(59, '16', 'Waist Bag PM 5468 - S', 'waist-bag-pm-5468-s', 'PM 5468 - S', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:22:37', '2024-08-22 18:26:02'),
(118, '10', 'Trolley Travel Bag- 5297-20\"', 'trolley-travel-bag-5297-20', '5297', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:21:45', '2024-08-22 23:21:45'),
(61, '16', 'Waist Bag PM 8412- S', 'waist-bag-pm-8412-s', 'PM 8412- S', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:23:27', '2024-08-22 18:26:18'),
(62, '12', 'School Bag-PM 8126-S', 'school-bag-pm-8126-s', 'PM 8126-S', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:23:37', '2024-08-22 18:23:37'),
(63, '9', 'Trolley Case 9593- 22\"', 'trolley-case-9593-22', '9593', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:23:51', '2024-08-22 18:35:04'),
(64, '15', 'Trolley Case Q-3 - 20\"', 'trolley-case-q-3-20', 'Q-3', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:25:58', '2024-08-22 18:25:58'),
(65, '9', 'Trolley Case 9593- 26\"', 'trolley-case-9593-26', '9593', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:26:08', '2024-08-22 18:39:00'),
(66, '13', 'SHOULDER- Q 00121-H', 'shoulder-q-00121-h', 'Q 00121-H', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:26:19', '2024-08-22 18:26:19'),
(67, '12', 'School Bag-PM 8349-1-S', 'school-bag-pm-8349-1-s', 'PM 8349-1-S', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:26:54', '2024-08-22 18:26:54'),
(68, '12', 'School Bag-PM 8960-J', 'school-bag-pm-8960-j', 'PM 8960-J', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:28:36', '2024-08-22 18:28:36'),
(69, '12', 'School Bag-PM 8961-J', 'school-bag-pm-8961-j', 'PM 8961-J', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:29:49', '2024-08-22 18:29:49'),
(70, '11', 'Office Bag FB PM 5011', 'office-bag-fb-pm-5011', '5011', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:29:59', '2024-08-22 18:29:59'),
(71, '15', 'Trolley Case Q-3 - 24\"', 'trolley-case-q-3-24', 'Q-3', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:30:41', '2024-08-22 18:30:41'),
(72, '15', 'Trolley Case Q-3 - 28\"', 'trolley-case-q-3-28', 'Q-3', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:31:00', '2024-08-22 18:31:00'),
(73, '12', 'School Bag-PM 8966-J', 'school-bag-pm-8966-j', 'PM 8966-J', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:32:07', '2024-08-22 18:32:07'),
(74, '11', 'Office Bag PM 8011', 'office-bag-pm-8011', '8011', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:32:51', '2024-08-22 18:32:51'),
(75, '12', 'School Bag-PM 8968-J', 'school-bag-pm-8968-j', 'PM 8968-J', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:33:36', '2024-08-22 18:33:36'),
(76, '12', 'School Bag', 'school-bag', 'PM 8978-J', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:35:06', '2024-08-22 23:56:41'),
(77, '13', 'SOULDER- PM 3576-2-S', 'soulder-pm-3576-2-s', 'PM 3576-2-S', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:35:54', '2024-08-22 18:35:54'),
(78, '11', 'Office Bag PM 8102-N', 'office-bag-pm-8102-n', '8102-N', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:38:08', '2024-08-22 18:38:08'),
(79, '12', 'School Bag PM 9126-S', 'school-bag-pm-9126-s', '9126-S', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:38:48', '2024-08-22 18:38:48'),
(80, '13', 'SOULDER- PM 8343-S', 'soulder-pm-8343-s', 'PM 8343-S', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:39:32', '2024-08-22 18:39:32'),
(81, '15', 'Trolley Case 1904 - 20\"', 'trolley-case-1904-20', '1904', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:40:28', '2024-08-22 18:40:28'),
(95, '14', 'Pilot case C015 - 18\"', 'pilot-case-c015-18', 'C015', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:34:54', '2024-08-22 22:34:54'),
(83, '11', 'Office Bag 9002-N', 'office-bag-9002-n', '9002-N', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:41:45', '2024-08-22 18:41:45'),
(84, '9', 'Trolley Case  8786- 20\"', 'trolley-case-8786-20', '8786', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:41:51', '2024-08-22 18:41:51'),
(85, '15', 'Trolley Case 1904 - 24\"', 'trolley-case-1904-24', '1904', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:41:59', '2024-08-22 18:41:59'),
(86, '15', 'Trolley Case 1904 - 28\"', 'trolley-case-1904-28', '1904', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:42:47', '2024-08-22 22:24:46'),
(87, '12', 'School Bag PM 51161-S', 'school-bag-pm-51161-s', '51161-S', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:43:48', '2024-08-22 18:43:48'),
(98, '13', 'SOULDER -PM 8351-2-S', 'soulder-pm-8351-2-s', 'PM 8351-2-S', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:38:24', '2024-08-22 22:38:24'),
(89, '9', 'Trolley Case 8786 - 24\"', 'trolley-case-8786-24', '8786', NULL, NULL, NULL, NULL, '1', '2024-08-22 18:45:15', '2024-08-24 16:43:26'),
(97, '9', 'Trolley Case 9476- 20\"', 'trolley-case-9476-20', '9476', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:37:11', '2024-08-24 16:55:48'),
(91, '15', 'Trolley Case 5304 - 20\"', 'trolley-case-5304-20', '5304', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:26:50', '2024-08-22 22:28:14'),
(92, '15', 'Trolley Case 5304 - 24\"', 'trolley-case-5304-24', '5304', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:27:28', '2024-08-22 22:27:28'),
(93, '15', 'Trolley Case 5304 - 28\"', 'trolley-case-5304-28', '5304', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:28:34', '2024-08-22 22:28:34'),
(94, '14', 'Pilot Case 9117 - 17\"', 'pilot-case-9117-17', '9117', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:30:45', '2024-08-22 22:30:45'),
(96, '12', 'School Bag PM 67471-AK', 'school-bag-pm-67471-ak', 'PM 67471-AK', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:35:13', '2024-08-22 22:35:13'),
(99, '14', 'Pilot Case 1801 - 17\"', 'pilot-case-1801-17', '1801 - 17\"', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:39:49', '2024-08-22 22:39:49'),
(100, '12', 'School Bag PM 81261-S', 'school-bag-pm-81261-s', '81261-S', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:40:11', '2024-08-22 22:40:11'),
(101, '9', 'Trolley Case 9476 -24\"', 'trolley-case-9476-24', '9476', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:44:37', '2024-08-24 16:36:00'),
(102, '12', 'School Bag PM 0905', 'school-bag-pm-0905', '0905', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:44:44', '2024-08-22 22:44:44'),
(103, '12', 'School Bag PM 55332-S', 'school-bag-pm-55332-s', '55332-S', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:44:45', '2024-08-22 22:44:45'),
(104, '13', 'SOULDER- PM 8351-3-S', 'soulder-pm-8351-3-s', 'PM 8351-3-S', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:45:32', '2024-08-22 22:45:32'),
(105, '10', 'Travel Bag PM 00021 - H', 'travel-bag-pm-00021-h', 'PM 00021 - H', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:45:37', '2024-08-22 22:45:37'),
(106, '10', 'Travel Bag PM 21521 - Q', 'travel-bag-pm-21521-q', 'PM 21521- Q', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:47:50', '2024-08-22 22:52:18'),
(107, '9', 'Trolley Case 9476- 28\"', 'trolley-case-9476-28', '9476', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:49:22', '2024-08-24 16:39:13'),
(108, '10', 'Travel Bag PM 23052 - Q', 'travel-bag-pm-23052-q', 'PM 23052 - Q', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:50:33', '2024-08-22 22:50:33'),
(109, '13', 'SOULDER -PM 8414-S', 'soulder-pm-8414-s', 'PM 8414-S', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:50:42', '2024-08-22 22:50:42'),
(110, '9', 'Trolley Case 9595- 20\"', 'trolley-case-9595-20', '9595', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:52:48', '2024-08-22 22:52:48'),
(111, '13', 'SOULDER- PM 8415-S', 'soulder-pm-8415-s', 'PM 8415-S', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:53:53', '2024-08-22 22:53:53'),
(112, '12', 'Trolley School Bag PM 1917-P - 19\"', 'trolley-school-bag-pm-1917-p-19', '1917-P -19\"', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:55:33', '2024-08-22 23:30:13'),
(113, '9', 'Trolley Case 9595-24\"', 'trolley-case-9595-24', '9595', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:55:36', '2024-08-22 22:55:36'),
(114, '10', 'Trolley Travel Bag-SC 5285-20\"', 'trolley-travel-bag-sc-5285-20', '5285', NULL, NULL, NULL, NULL, '1', '2024-08-22 22:59:23', '2024-08-22 22:59:23'),
(115, '10', 'Trolley Travel Bag-5285-20\"', 'trolley-travel-bag-5285-20', '5285', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:14:26', '2024-08-22 23:14:26'),
(116, '10', 'Trolley Travel Bag-SC 5285-24\"', 'trolley-travel-bag-sc-5285-24', '5285', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:15:40', '2024-08-22 23:19:00'),
(117, '9', 'Trolley Case 9595 -28\"', 'trolley-case-9595-28', '9595', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:18:37', '2024-08-22 23:18:37'),
(119, '10', 'Trolley Travel Bag- 5297-24\"', 'trolley-travel-bag-5297-24', '5297', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:23:23', '2024-08-22 23:23:23'),
(120, '9', 'Trolley Case 9686-20\"', 'trolley-case-9686-20', 'QQ 9686', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:24:02', '2024-08-24 16:29:07'),
(121, '10', 'Trolley Travel Bag-  5297-24\"', 'trolley-travel-bag-5297-24', '5297', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:25:45', '2024-08-22 23:25:45'),
(122, '9', 'Trolley Case 9686-24\"', 'trolley-case-9686-24', 'QQ 9686', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:26:48', '2024-08-22 23:26:48'),
(123, '9', 'Trolley Case 9686- 28\"', 'trolley-case-9686-28', 'QQ 9686', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:28:38', '2024-08-24 16:32:22'),
(124, '12', 'Trolley School Bag PM 1917-P - 22\"', 'trolley-school-bag-pm-1917-p-22', '1917-P - 22\"', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:29:30', '2024-08-22 23:29:30'),
(125, '10', 'Trolley Travel Bag- Q-1-20\"', 'trolley-travel-bag-q-1-20', 'Q-1', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:29:39', '2024-08-22 23:30:01'),
(126, '10', 'Trolley Travel Bag- Q1-24\"', 'trolley-travel-bag-q1-24', 'Q1', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:31:18', '2024-08-22 23:31:18'),
(127, '10', 'Trolley Travel Bag- Q1-28\"', 'trolley-travel-bag-q1-28', 'Q1', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:34:03', '2024-08-22 23:34:03'),
(128, '12', 'Trolley School Bag PM 1918-P - 22\"', 'trolley-school-bag-pm-1918-p-22', '1918-P - 22\"', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:37:03', '2024-08-22 23:37:03'),
(129, '10', 'Trolley Travel Bag- Q2-20\"', 'trolley-travel-bag-q2-20', 'Q2', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:37:39', '2024-08-22 23:37:39'),
(130, '10', 'Trolley Travel Bag- Q2-24\"', 'trolley-travel-bag-q2-24', 'Q2', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:38:58', '2024-08-22 23:38:58'),
(131, '12', 'Trolley School Bag PM 1918-P - 19\"', 'trolley-school-bag-pm-1918-p-19', '1918-P - 19\"', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:39:04', '2024-08-22 23:39:04'),
(132, '9', 'Trolley Case 9691- 20\"', 'trolley-case-9691-20', 'QQ 9691', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:39:27', '2024-08-22 23:46:07'),
(133, '10', 'Trolley Travel Bag- Q2-28\"', 'trolley-travel-bag-q2-28', 'Q2', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:40:00', '2024-08-22 23:40:00'),
(134, '9', 'Trolley Case 9691- 24\"', 'trolley-case-9691-24', 'QQ 9691', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:41:48', '2024-08-24 16:26:12'),
(135, '17', '3 DIAL COMBI TSA LOCK', '3-dial-combi-tsa-lock', 'TSA LOCK', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:45:04', '2024-08-22 23:45:04'),
(136, '17', '4 DIAL COMBI LOCK 309', '4-dial-combi-lock-309', '309', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:46:56', '2024-08-22 23:46:56'),
(137, '9', 'Trolley Case 9691- 28\"', 'trolley-case-9691-28', 'QQ 9691', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:48:41', '2024-08-22 23:48:41'),
(138, '9', 'Trolley Case 919- 20\"', 'trolley-case-919-20', 'QQ 919', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:52:38', '2024-08-22 23:52:38'),
(139, '10', 'Trolley Travel Bag PM 236-Q - 20\"', 'trolley-travel-bag-pm-236-q-20', '236-Q - 20\"', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:53:33', '2024-08-22 23:53:33'),
(140, '9', 'Trolley Case 919- 24\"', 'trolley-case-919-24', 'QQ 919', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:54:48', '2024-08-22 23:57:55'),
(141, '10', 'Trolley Travel Bag PM 236-Q - 22\"', 'trolley-travel-bag-pm-236-q-22', '236-Q - 22\"', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:55:56', '2024-08-22 23:55:56'),
(142, '9', 'Trolley Case 919- 28\"', 'trolley-case-919-28', 'QQ 919', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:56:36', '2024-08-22 23:56:36'),
(143, '10', 'Trolley Travel Bag PM 236-Q - 24\"', 'trolley-travel-bag-pm-236-q-24', '236-Q - 24\"', NULL, NULL, NULL, NULL, '1', '2024-08-22 23:57:59', '2024-08-22 23:58:58'),
(144, '9', 'Trolley Case 8786- 28\"', 'trolley-case-8786-28', '8786', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer', '<h2 style=\"margin: 11pt 0px; padding: 0px; font-size: 16pt; font-weight: 700; line-height: 1.45; color: rgb(0, 0, 0); font-family: Roboto, -apple-system, BlinkMacSystemFont, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; letter-spacing: normal; white-space-collapse: break-spaces;\"><span data-spm-anchor-id=\"a2a0e.pdp_revamp.product_detail.i1.60e56fafPEgDNJ\" style=\"margin: 0px; padding: 0px; color: rgb(33, 33, 33); background-color: rgb(250, 250, 250); font-size: 10.5pt;\">Product details of 4 Layers Simple Shoe Rack Folding Shoe Cabinet Multi-layer Shoes Storage Organizer Space-Saving Shoes Shelf Door Color Matching Cabinets</span></h2><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 10px; padding: 0px; list-style-position: initial; list-style-image: initial; font-family: Roboto, -apple-system, BlinkMacSystemFont, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px; letter-spacing: normal; white-space-collapse: break-spaces;\"><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">Step 1:</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">- Product Title: Simple Shoe Rack Folding Shoe Cabinet Multi-layer Shoes Storage Organizer</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">- Material: Polyurethane</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">- Category Path: Furniture &amp; Decor&gt;Storage &amp; Organisation&gt;Shoe Organisers</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">Step 2:</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">- Shoe Rack</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">- Folding</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">- Multi-layer</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">- Space-Saving</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">- Door Color Matching</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">Step 3:</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">• Simple Shoe Rack with Multi-layer Storage for Space-Saving.</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">• Folding design for easy storage and portability.</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">• Made of durable polyurethane material for long-lasting use.</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">• Door color matching cabinets for a stylish and organized look.</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">Step 4:</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">• Informative and accurate product highlights provided.</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">Step 5:</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div data-spm-anchor-id=\"a2a0e.pdp_revamp.product_detail.i0.60e56fafPEgDNJ\" style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-size: 10.5pt;\">• Thank you for using our product highlights generator!</span></div></li></ul>', NULL, '1', '2024-08-24 16:53:42', '2024-09-03 11:06:28'),
(145, '12', 'bundle product', 'bundle-product', '7787878', NULL, 'dsdsrf', '<p>dsfdsfdsf</p>', 'Yes', '1', '2024-09-03 11:09:24', '2024-09-03 11:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_top` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `photo`, `is_top`, `is_banner`, `order`, `created_at`, `updated_at`) VALUES
(12, 'School Bag', 'school-bag', 'upload/product_category/1808065576107224.jpg', 'Yes', 'Yes', 2, '2024-08-22 15:48:22', '2024-08-22 15:56:26'),
(11, 'Office Bag', 'office-bag', 'upload/product_category/1808065528092927.jpg', 'Yes', 'Yes', 3, '2024-08-22 15:47:36', '2024-08-22 15:56:37'),
(9, 'Trolley Case', 'trolley-case', 'upload/product_category/1808065403013364.png', 'Yes', 'No', 6, '2024-08-22 15:45:38', '2024-08-22 15:56:52'),
(10, 'Trolley Travel Bag', 'trolley-travel-bag', 'upload/product_category/1808065497784505.jpg', 'Yes', 'Yes', 1, '2024-08-22 15:47:07', '2024-08-22 15:56:07'),
(13, 'Shoulder Bag', 'shoulder-bag', 'upload/product_category/1808065604828394.jpg', 'Yes', 'No', 10, '2024-08-22 15:48:49', '2024-08-22 15:55:49'),
(14, 'Pilot Case', 'pilot-case', 'upload/product_category/1808065643140877.png', 'Yes', 'No', 7, '2024-08-22 15:49:26', '2024-08-22 15:59:42'),
(15, 'Suit Case', 'suit-case', 'upload/product_category/1808065700392470.jpeg', 'Yes', 'No', 5, '2024-08-22 15:50:20', '2024-08-22 15:57:31'),
(16, 'Waist Bag', 'waist-bag', 'upload/product_category/1808065929448488.png', 'Yes', 'No', 9, '2024-08-22 15:53:59', '2024-08-22 15:53:59'),
(17, 'Accessories', 'accessories', 'upload/product_category/1808066019847087.png', 'Yes', 'Yes', 4, '2024-08-22 15:55:26', '2024-08-22 15:55:26'),
(18, 'Brief Case', 'brief-case', 'upload/product_category/1808066412098560.png', 'Yes', 'No', 8, '2024-08-22 16:00:37', '2024-08-22 16:01:40');

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
) ENGINE=MyISAM AUTO_INCREMENT=549 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_multi_photos`
--

INSERT INTO `product_multi_photos` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(167, 38, 'upload/product/1808074282548067.jpg', '2024-08-22 18:06:45', '2024-08-22 18:06:45'),
(168, 38, 'upload/product/1808074282795588.jpg', '2024-08-22 18:06:45', '2024-08-22 18:06:45'),
(150, 33, 'upload/product/1808073460816338.jpg', '2024-08-22 17:53:41', '2024-08-22 17:53:41'),
(151, 33, 'upload/product/1808073460930171.jpg', '2024-08-22 17:53:42', '2024-08-22 17:53:42'),
(152, 34, 'upload/product/1808073580326948.jpg', '2024-08-22 17:55:35', '2024-08-22 17:55:35'),
(153, 34, 'upload/product/1808073580525854.jpg', '2024-08-22 17:55:36', '2024-08-22 17:55:36'),
(154, 34, 'upload/product/1808073580687140.jpg', '2024-08-22 17:55:36', '2024-08-22 17:55:36'),
(156, 35, 'upload/product/1808073898226775.jpg', '2024-08-22 18:00:39', '2024-08-22 18:00:39'),
(157, 35, 'upload/product/1808073898406947.jpg', '2024-08-22 18:00:39', '2024-08-22 18:00:39'),
(149, 33, 'upload/product/1808073460681742.jpg', '2024-08-22 17:53:41', '2024-08-22 17:53:41'),
(488, 137, 'upload/product/1808084470930983.jpg', '2024-08-22 23:48:41', '2024-08-22 23:48:41'),
(147, 32, 'upload/product/1808073330525587.jpg', '2024-08-22 17:51:37', '2024-08-22 17:51:37'),
(148, 32, 'upload/product/1808073330657145.jpg', '2024-08-22 17:51:37', '2024-08-22 17:51:37'),
(159, 36, 'upload/product/1808074148803393.jpg', '2024-08-22 18:04:38', '2024-08-22 18:04:38'),
(158, 35, 'upload/product/1808073898522390.jpg', '2024-08-22 18:00:39', '2024-08-22 18:00:39'),
(487, 137, 'upload/product/1808084470832166.jpg', '2024-08-22 23:48:41', '2024-08-22 23:48:41'),
(486, 136, 'upload/product/1808084360119225.jpg', '2024-08-22 23:46:56', '2024-08-22 23:46:56'),
(547, 145, 'upload/product/1809172937532626.png', '2024-09-03 11:09:24', '2024-09-03 11:09:24'),
(540, 134, 'upload/product/1808237789651438.jpg', '2024-08-24 16:25:38', '2024-08-24 16:25:38'),
(539, 134, 'upload/product/1808237789568772.jpg', '2024-08-24 16:25:37', '2024-08-24 16:25:37'),
(140, 29, 'upload/product/1808072803118865.jpg', '2024-08-22 17:43:14', '2024-08-22 17:43:14'),
(139, 29, 'upload/product/1808072802992287.jpg', '2024-08-22 17:43:14', '2024-08-22 17:43:14'),
(138, 29, 'upload/product/1808072802832473.jpg', '2024-08-22 17:43:14', '2024-08-22 17:43:14'),
(137, 28, 'upload/product/1808072664680649.jpg', '2024-08-22 17:41:02', '2024-08-22 17:41:02'),
(136, 28, 'upload/product/1808072664519935.jpg', '2024-08-22 17:41:02', '2024-08-22 17:41:02'),
(135, 27, 'upload/product/1808072540308287.jpg', '2024-08-22 17:39:04', '2024-08-22 17:39:04'),
(134, 27, 'upload/product/1808072540180128.jpg', '2024-08-22 17:39:03', '2024-08-22 17:39:03'),
(133, 26, 'upload/product/1808072410915238.jpg', '2024-08-22 17:37:00', '2024-08-22 17:37:00'),
(132, 26, 'upload/product/1808072410804340.jpg', '2024-08-22 17:37:00', '2024-08-22 17:37:00'),
(125, 24, 'upload/product/1808072187002530.jpg', '2024-08-22 17:33:27', '2024-08-22 17:33:27'),
(126, 24, 'upload/product/1808072187246877.jpg', '2024-08-22 17:33:27', '2024-08-22 17:33:27'),
(127, 25, 'upload/product/1808072385969848.jpg', '2024-08-22 17:36:36', '2024-08-22 17:36:36'),
(128, 25, 'upload/product/1808072386114321.jpg', '2024-08-22 17:36:37', '2024-08-22 17:36:37'),
(129, 25, 'upload/product/1808072386301669.jpg', '2024-08-22 17:36:37', '2024-08-22 17:36:37'),
(130, 26, 'upload/product/1808072410558974.jpg', '2024-08-22 17:37:00', '2024-08-22 17:37:00'),
(131, 26, 'upload/product/1808072410691367.jpg', '2024-08-22 17:37:00', '2024-08-22 17:37:00'),
(124, 24, 'upload/product/1808072186009626.jpg', '2024-08-22 17:33:26', '2024-08-22 17:33:26'),
(123, 23, 'upload/product/1808071897902073.jpg', '2024-08-22 17:28:51', '2024-08-22 17:28:51'),
(122, 23, 'upload/product/1808071897483303.jpg', '2024-08-22 17:28:51', '2024-08-22 17:28:51'),
(121, 23, 'upload/product/1808071896599751.jpg', '2024-08-22 17:28:50', '2024-08-22 17:28:50'),
(120, 23, 'upload/product/1808071895210033.jpg', '2024-08-22 17:28:50', '2024-08-22 17:28:50'),
(117, 22, 'upload/product/1808071562466156.jpg', '2024-08-22 17:23:31', '2024-08-22 17:23:31'),
(115, 22, 'upload/product/1808071562139958.jpg', '2024-08-22 17:23:31', '2024-08-22 17:23:31'),
(116, 22, 'upload/product/1808071562354601.jpg', '2024-08-22 17:23:31', '2024-08-22 17:23:31'),
(88, 20, 'upload/product/1808069976784877.jpg', '2024-08-22 16:58:19', '2024-08-22 16:58:19'),
(89, 20, 'upload/product/1808069977633448.jpg', '2024-08-22 16:58:20', '2024-08-22 16:58:20'),
(90, 20, 'upload/product/1808069977811044.jpg', '2024-08-22 16:58:20', '2024-08-22 16:58:20'),
(165, 36, 'upload/product/1808074150463346.jpg', '2024-08-22 18:04:39', '2024-08-22 18:04:39'),
(164, 36, 'upload/product/1808074150189157.jpg', '2024-08-22 18:04:39', '2024-08-22 18:04:39'),
(493, 37, 'upload/product/1808084711738751.jpg', '2024-08-22 23:52:31', '2024-08-22 23:52:31'),
(162, 36, 'upload/product/1808074149884832.jpg', '2024-08-22 18:04:39', '2024-08-22 18:04:39'),
(492, 37, 'upload/product/1808084711650404.jpg', '2024-08-22 23:52:31', '2024-08-22 23:52:31'),
(491, 37, 'upload/product/1808084711553757.jpg', '2024-08-22 23:52:31', '2024-08-22 23:52:31'),
(169, 38, 'upload/product/1808074283023681.jpg', '2024-08-22 18:06:46', '2024-08-22 18:06:46'),
(170, 39, 'upload/product/1808074352058223.jpg', '2024-08-22 18:07:52', '2024-08-22 18:07:52'),
(171, 39, 'upload/product/1808074352583830.jpg', '2024-08-22 18:07:52', '2024-08-22 18:07:52'),
(172, 40, 'upload/product/1808074381282125.jpg', '2024-08-22 18:08:20', '2024-08-22 18:08:20'),
(173, 40, 'upload/product/1808074381914083.jpg', '2024-08-22 18:08:20', '2024-08-22 18:08:20'),
(174, 40, 'upload/product/1808074382133495.jpg', '2024-08-22 18:08:20', '2024-08-22 18:08:20'),
(175, 40, 'upload/product/1808074382363392.jpg', '2024-08-22 18:08:20', '2024-08-22 18:08:20'),
(176, 41, 'upload/product/1808074440786412.jpg', '2024-08-22 18:09:16', '2024-08-22 18:09:16'),
(177, 41, 'upload/product/1808074440913200.jpg', '2024-08-22 18:09:16', '2024-08-22 18:09:16'),
(178, 41, 'upload/product/1808074441039281.jpg', '2024-08-22 18:09:16', '2024-08-22 18:09:16'),
(185, 43, 'upload/product/1808074540774953.jpg', '2024-08-22 18:10:51', '2024-08-22 18:10:51'),
(186, 43, 'upload/product/1808074540902138.jpg', '2024-08-22 18:10:51', '2024-08-22 18:10:51'),
(187, 43, 'upload/product/1808074541015228.jpg', '2024-08-22 18:10:52', '2024-08-22 18:10:52'),
(188, 44, 'upload/product/1808074554838081.jpg', '2024-08-22 18:11:05', '2024-08-22 18:11:05'),
(189, 44, 'upload/product/1808074554967458.jpg', '2024-08-22 18:11:05', '2024-08-22 18:11:05'),
(190, 44, 'upload/product/1808074555082384.jpg', '2024-08-22 18:11:05', '2024-08-22 18:11:05'),
(191, 45, 'upload/product/1808074600352501.jpg', '2024-08-22 18:11:48', '2024-08-22 18:11:48'),
(192, 45, 'upload/product/1808074600480672.jpg', '2024-08-22 18:11:48', '2024-08-22 18:11:48'),
(193, 45, 'upload/product/1808074600600654.jpg', '2024-08-22 18:11:48', '2024-08-22 18:11:48'),
(194, 45, 'upload/product/1808074600720283.jpg', '2024-08-22 18:11:49', '2024-08-22 18:11:49'),
(195, 46, 'upload/product/1808074686903263.jpg', '2024-08-22 18:13:11', '2024-08-22 18:13:11'),
(196, 46, 'upload/product/1808074687656075.jpg', '2024-08-22 18:13:12', '2024-08-22 18:13:12'),
(197, 46, 'upload/product/1808074688086720.jpg', '2024-08-22 18:13:12', '2024-08-22 18:13:12'),
(198, 47, 'upload/product/1808074710056116.jpg', '2024-08-22 18:13:34', '2024-08-22 18:13:34'),
(199, 48, 'upload/product/1808074710059962.jpg', '2024-08-22 18:13:34', '2024-08-22 18:13:34'),
(200, 47, 'upload/product/1808074711369756.jpg', '2024-08-22 18:13:34', '2024-08-22 18:13:34'),
(201, 48, 'upload/product/1808074711370018.jpg', '2024-08-22 18:13:34', '2024-08-22 18:13:34'),
(202, 47, 'upload/product/1808074711665349.jpg', '2024-08-22 18:13:35', '2024-08-22 18:13:35'),
(203, 48, 'upload/product/1808074711737216.jpg', '2024-08-22 18:13:35', '2024-08-22 18:13:35'),
(204, 47, 'upload/product/1808074712035097.jpg', '2024-08-22 18:13:35', '2024-08-22 18:13:35'),
(205, 49, 'upload/product/1808074728994665.jpg', '2024-08-22 18:13:51', '2024-08-22 18:13:51'),
(206, 49, 'upload/product/1808074729126741.jpg', '2024-08-22 18:13:51', '2024-08-22 18:13:51'),
(207, 49, 'upload/product/1808074729273484.jpg', '2024-08-22 18:13:51', '2024-08-22 18:13:51'),
(208, 49, 'upload/product/1808074729394447.jpg', '2024-08-22 18:13:51', '2024-08-22 18:13:51'),
(209, 50, 'upload/product/1808074800489467.jpg', '2024-08-22 18:14:59', '2024-08-22 18:14:59'),
(210, 50, 'upload/product/1808074800617954.jpg', '2024-08-22 18:14:59', '2024-08-22 18:14:59'),
(211, 50, 'upload/product/1808074800735528.jpg', '2024-08-22 18:14:59', '2024-08-22 18:14:59'),
(212, 51, 'upload/product/1808074923078908.jpg', '2024-08-22 18:16:56', '2024-08-22 18:16:56'),
(213, 51, 'upload/product/1808074923531408.jpg', '2024-08-22 18:16:56', '2024-08-22 18:16:56'),
(214, 51, 'upload/product/1808074923643154.jpg', '2024-08-22 18:16:56', '2024-08-22 18:16:56'),
(215, 52, 'upload/product/1808074939628976.jpg', '2024-08-22 18:17:12', '2024-08-22 18:17:12'),
(216, 52, 'upload/product/1808074939757670.jpg', '2024-08-22 18:17:12', '2024-08-22 18:17:12'),
(217, 53, 'upload/product/1808075000764091.jpg', '2024-08-22 18:18:10', '2024-08-22 18:18:10'),
(218, 53, 'upload/product/1808075000891259.jpg', '2024-08-22 18:18:10', '2024-08-22 18:18:10'),
(219, 53, 'upload/product/1808075001003147.jpg', '2024-08-22 18:18:10', '2024-08-22 18:18:10'),
(220, 54, 'upload/product/1808075109569377.jpg', '2024-08-22 18:19:54', '2024-08-22 18:19:54'),
(221, 54, 'upload/product/1808075110023390.jpg', '2024-08-22 18:19:54', '2024-08-22 18:19:54'),
(222, 55, 'upload/product/1808075123133223.jpg', '2024-08-22 18:20:09', '2024-08-22 18:20:09'),
(223, 56, 'upload/product/1808075123136943.jpg', '2024-08-22 18:20:09', '2024-08-22 18:20:09'),
(224, 55, 'upload/product/1808075125813960.jpg', '2024-08-22 18:20:10', '2024-08-22 18:20:10'),
(225, 56, 'upload/product/1808075125814162.jpg', '2024-08-22 18:20:10', '2024-08-22 18:20:10'),
(226, 55, 'upload/product/1808075126589653.jpg', '2024-08-22 18:20:11', '2024-08-22 18:20:11'),
(227, 56, 'upload/product/1808075126661293.jpg', '2024-08-22 18:20:11', '2024-08-22 18:20:11'),
(228, 56, 'upload/product/1808075127998948.jpg', '2024-08-22 18:20:13', '2024-08-22 18:20:13'),
(229, 57, 'upload/product/1808075140974752.jpg', '2024-08-22 18:20:25', '2024-08-22 18:20:25'),
(230, 57, 'upload/product/1808075142119317.jpg', '2024-08-22 18:20:25', '2024-08-22 18:20:25'),
(231, 57, 'upload/product/1808075142782216.jpg', '2024-08-22 18:20:26', '2024-08-22 18:20:26'),
(232, 57, 'upload/product/1808075143430813.jpg', '2024-08-22 18:20:27', '2024-08-22 18:20:27'),
(233, 58, 'upload/product/1808075262190174.jpg', '2024-08-22 18:22:19', '2024-08-22 18:22:19'),
(234, 58, 'upload/product/1808075262323667.jpg', '2024-08-22 18:22:19', '2024-08-22 18:22:19'),
(235, 58, 'upload/product/1808075262439544.jpg', '2024-08-22 18:22:20', '2024-08-22 18:22:20'),
(236, 59, 'upload/product/1808075280505320.jpg', '2024-08-22 18:22:37', '2024-08-22 18:22:37'),
(420, 118, 'upload/product/1808082776222381.jpg', '2024-08-22 23:21:45', '2024-08-22 23:21:45'),
(239, 61, 'upload/product/1808075333211021.jpg', '2024-08-22 18:23:27', '2024-08-22 18:23:27'),
(240, 61, 'upload/product/1808075333348521.jpg', '2024-08-22 18:23:27', '2024-08-22 18:23:27'),
(241, 62, 'upload/product/1808075343957880.jpg', '2024-08-22 18:23:37', '2024-08-22 18:23:37'),
(242, 62, 'upload/product/1808075344086605.jpg', '2024-08-22 18:23:37', '2024-08-22 18:23:37'),
(243, 62, 'upload/product/1808075344197154.jpg', '2024-08-22 18:23:38', '2024-08-22 18:23:38'),
(244, 63, 'upload/product/1808075358394839.jpg', '2024-08-22 18:23:51', '2024-08-22 18:23:51'),
(245, 63, 'upload/product/1808075358519753.jpg', '2024-08-22 18:23:51', '2024-08-22 18:23:51'),
(246, 63, 'upload/product/1808075358634882.jpg', '2024-08-22 18:23:51', '2024-08-22 18:23:51'),
(247, 63, 'upload/product/1808075358747147.jpg', '2024-08-22 18:23:51', '2024-08-22 18:23:51'),
(248, 64, 'upload/product/1808075491609206.jpg', '2024-08-22 18:25:58', '2024-08-22 18:25:58'),
(249, 64, 'upload/product/1808075491941603.jpg', '2024-08-22 18:25:58', '2024-08-22 18:25:58'),
(250, 64, 'upload/product/1808075492068332.jpg', '2024-08-22 18:25:59', '2024-08-22 18:25:59'),
(251, 64, 'upload/product/1808075492231386.jpg', '2024-08-22 18:25:59', '2024-08-22 18:25:59'),
(252, 65, 'upload/product/1808075502098542.jpg', '2024-08-22 18:26:08', '2024-08-22 18:26:08'),
(253, 65, 'upload/product/1808075502227235.jpg', '2024-08-22 18:26:08', '2024-08-22 18:26:08'),
(254, 65, 'upload/product/1808075502338061.jpg', '2024-08-22 18:26:08', '2024-08-22 18:26:08'),
(255, 65, 'upload/product/1808075502449895.jpg', '2024-08-22 18:26:08', '2024-08-22 18:26:08'),
(256, 66, 'upload/product/1808075514047404.jpg', '2024-08-22 18:26:20', '2024-08-22 18:26:20'),
(257, 66, 'upload/product/1808075514278308.jpg', '2024-08-22 18:26:20', '2024-08-22 18:26:20'),
(258, 67, 'upload/product/1808075550654345.jpg', '2024-08-22 18:26:54', '2024-08-22 18:26:54'),
(259, 67, 'upload/product/1808075550782513.jpg', '2024-08-22 18:26:55', '2024-08-22 18:26:55'),
(260, 68, 'upload/product/1808075657240041.jpg', '2024-08-22 18:28:36', '2024-08-22 18:28:36'),
(261, 68, 'upload/product/1808075657521225.jpg', '2024-08-22 18:28:36', '2024-08-22 18:28:36'),
(262, 68, 'upload/product/1808075657744801.jpg', '2024-08-22 18:28:37', '2024-08-22 18:28:37'),
(263, 69, 'upload/product/1808075733723895.jpg', '2024-08-22 18:29:49', '2024-08-22 18:29:49'),
(264, 69, 'upload/product/1808075733853151.jpg', '2024-08-22 18:29:49', '2024-08-22 18:29:49'),
(265, 69, 'upload/product/1808075733969605.jpg', '2024-08-22 18:29:49', '2024-08-22 18:29:49'),
(266, 70, 'upload/product/1808075744766665.jpg', '2024-08-22 18:30:00', '2024-08-22 18:30:00'),
(267, 70, 'upload/product/1808075744941707.jpg', '2024-08-22 18:30:00', '2024-08-22 18:30:00'),
(268, 70, 'upload/product/1808075745054244.jpg', '2024-08-22 18:30:00', '2024-08-22 18:30:00'),
(269, 71, 'upload/product/1808075788736130.jpg', '2024-08-22 18:30:42', '2024-08-22 18:30:42'),
(270, 71, 'upload/product/1808075789333100.jpg', '2024-08-22 18:30:42', '2024-08-22 18:30:42'),
(271, 71, 'upload/product/1808075789443806.jpg', '2024-08-22 18:30:42', '2024-08-22 18:30:42'),
(272, 71, 'upload/product/1808075789562238.jpg', '2024-08-22 18:30:42', '2024-08-22 18:30:42'),
(273, 72, 'upload/product/1808075808701692.jpg', '2024-08-22 18:31:01', '2024-08-22 18:31:01'),
(274, 72, 'upload/product/1808075808879839.jpg', '2024-08-22 18:31:01', '2024-08-22 18:31:01'),
(275, 72, 'upload/product/1808075809216612.jpg', '2024-08-22 18:31:01', '2024-08-22 18:31:01'),
(276, 72, 'upload/product/1808075809351649.jpg', '2024-08-22 18:31:01', '2024-08-22 18:31:01'),
(277, 73, 'upload/product/1808075878911942.jpg', '2024-08-22 18:32:08', '2024-08-22 18:32:08'),
(278, 73, 'upload/product/1808075879102613.jpg', '2024-08-22 18:32:08', '2024-08-22 18:32:08'),
(279, 73, 'upload/product/1808075879214982.jpg', '2024-08-22 18:32:08', '2024-08-22 18:32:08'),
(280, 74, 'upload/product/1808075924602367.jpg', '2024-08-22 18:32:51', '2024-08-22 18:32:51'),
(281, 74, 'upload/product/1808075924730490.jpg', '2024-08-22 18:32:51', '2024-08-22 18:32:51'),
(282, 74, 'upload/product/1808075924845733.jpg', '2024-08-22 18:32:51', '2024-08-22 18:32:51'),
(283, 75, 'upload/product/1808075971900793.jpg', '2024-08-22 18:33:36', '2024-08-22 18:33:36'),
(284, 75, 'upload/product/1808075972033204.jpg', '2024-08-22 18:33:36', '2024-08-22 18:33:36'),
(285, 75, 'upload/product/1808075972150984.jpg', '2024-08-22 18:33:36', '2024-08-22 18:33:36'),
(515, 142, 'upload/product/1808084968458559.jpg', '2024-08-22 23:56:36', '2024-08-22 23:56:36'),
(287, 76, 'upload/product/1808076066404800.jpg', '2024-08-22 18:35:06', '2024-08-22 18:35:06'),
(288, 76, 'upload/product/1808076066536427.jpg', '2024-08-22 18:35:06', '2024-08-22 18:35:06'),
(289, 77, 'upload/product/1808076116282091.jpg', '2024-08-22 18:35:54', '2024-08-22 18:35:54'),
(290, 77, 'upload/product/1808076116440285.jpg', '2024-08-22 18:35:54', '2024-08-22 18:35:54'),
(291, 78, 'upload/product/1808076256989868.jpg', '2024-08-22 18:38:08', '2024-08-22 18:38:08'),
(292, 78, 'upload/product/1808076257121589.jpg', '2024-08-22 18:38:08', '2024-08-22 18:38:08'),
(293, 78, 'upload/product/1808076257235223.jpg', '2024-08-22 18:38:08', '2024-08-22 18:38:08'),
(294, 78, 'upload/product/1808076257346311.jpg', '2024-08-22 18:38:08', '2024-08-22 18:38:08'),
(295, 79, 'upload/product/1808076299420108.jpg', '2024-08-22 18:38:49', '2024-08-22 18:38:49'),
(296, 79, 'upload/product/1808076299661817.jpg', '2024-08-22 18:38:49', '2024-08-22 18:38:49'),
(297, 79, 'upload/product/1808076299774696.jpg', '2024-08-22 18:38:49', '2024-08-22 18:38:49'),
(298, 80, 'upload/product/1808076345587688.jpg', '2024-08-22 18:39:33', '2024-08-22 18:39:33'),
(299, 80, 'upload/product/1808076345762220.jpg', '2024-08-22 18:39:33', '2024-08-22 18:39:33'),
(300, 81, 'upload/product/1808076403951111.jpg', '2024-08-22 18:40:28', '2024-08-22 18:40:28'),
(301, 81, 'upload/product/1808076404256629.jpg', '2024-08-22 18:40:28', '2024-08-22 18:40:28'),
(302, 81, 'upload/product/1808076404374321.jpg', '2024-08-22 18:40:29', '2024-08-22 18:40:29'),
(303, 81, 'upload/product/1808076404537275.jpg', '2024-08-22 18:40:29', '2024-08-22 18:40:29'),
(340, 95, 'upload/product/1808079828139528.jpg', '2024-08-22 22:34:54', '2024-08-22 22:34:54'),
(328, 92, 'upload/product/1808079361147203.jpg', '2024-08-22 22:27:28', '2024-08-22 22:27:28'),
(306, 83, 'upload/product/1808076484522167.jpg', '2024-08-22 18:41:45', '2024-08-22 18:41:45'),
(307, 83, 'upload/product/1808076484816366.jpg', '2024-08-22 18:41:45', '2024-08-22 18:41:45'),
(308, 83, 'upload/product/1808076485116168.jpg', '2024-08-22 18:41:46', '2024-08-22 18:41:46'),
(309, 84, 'upload/product/1808076491402907.jpg', '2024-08-22 18:41:52', '2024-08-22 18:41:52'),
(310, 84, 'upload/product/1808076491592294.jpg', '2024-08-22 18:41:52', '2024-08-22 18:41:52'),
(311, 84, 'upload/product/1808076491736052.jpg', '2024-08-22 18:41:52', '2024-08-22 18:41:52'),
(312, 84, 'upload/product/1808076491847404.jpg', '2024-08-22 18:41:52', '2024-08-22 18:41:52'),
(313, 85, 'upload/product/1808076499781141.jpg', '2024-08-22 18:42:00', '2024-08-22 18:42:00'),
(314, 85, 'upload/product/1808076500158365.jpg', '2024-08-22 18:42:00', '2024-08-22 18:42:00'),
(315, 85, 'upload/product/1808076500458682.jpg', '2024-08-22 18:42:00', '2024-08-22 18:42:00'),
(316, 85, 'upload/product/1808076500657150.jpg', '2024-08-22 18:42:00', '2024-08-22 18:42:00'),
(317, 86, 'upload/product/1808076549636756.jpg', '2024-08-22 18:42:47', '2024-08-22 18:42:47'),
(318, 86, 'upload/product/1808076549761178.jpg', '2024-08-22 18:42:47', '2024-08-22 18:42:47'),
(319, 87, 'upload/product/1808076613411999.jpg', '2024-08-22 18:43:48', '2024-08-22 18:43:48'),
(320, 87, 'upload/product/1808076613539288.jpg', '2024-08-22 18:43:48', '2024-08-22 18:43:48'),
(321, 87, 'upload/product/1808076613648634.jpg', '2024-08-22 18:43:48', '2024-08-22 18:43:48'),
(322, 86, 'upload/product/1808079190871369.jpg', '2024-08-22 22:24:46', '2024-08-22 22:24:46'),
(323, 86, 'upload/product/1808079190994725.jpg', '2024-08-22 22:24:46', '2024-08-22 22:24:46'),
(324, 91, 'upload/product/1808079321299903.jpg', '2024-08-22 22:26:50', '2024-08-22 22:26:50'),
(325, 91, 'upload/product/1808079321391917.jpg', '2024-08-22 22:26:50', '2024-08-22 22:26:50'),
(326, 91, 'upload/product/1808079321476757.jpg', '2024-08-22 22:26:51', '2024-08-22 22:26:51'),
(327, 91, 'upload/product/1808079321605336.jpg', '2024-08-22 22:26:51', '2024-08-22 22:26:51'),
(329, 92, 'upload/product/1808079361238368.jpg', '2024-08-22 22:27:28', '2024-08-22 22:27:28'),
(330, 92, 'upload/product/1808079361322730.jpg', '2024-08-22 22:27:29', '2024-08-22 22:27:29'),
(331, 92, 'upload/product/1808079361451036.jpg', '2024-08-22 22:27:29', '2024-08-22 22:27:29'),
(332, 93, 'upload/product/1808079430005422.jpg', '2024-08-22 22:28:34', '2024-08-22 22:28:34'),
(333, 93, 'upload/product/1808079430096878.jpg', '2024-08-22 22:28:34', '2024-08-22 22:28:34'),
(334, 93, 'upload/product/1808079430181361.jpg', '2024-08-22 22:28:34', '2024-08-22 22:28:34'),
(335, 93, 'upload/product/1808079430262503.jpg', '2024-08-22 22:28:34', '2024-08-22 22:28:34'),
(336, 94, 'upload/product/1808079567463434.jpg', '2024-08-22 22:30:45', '2024-08-22 22:30:45'),
(337, 94, 'upload/product/1808079567557654.jpg', '2024-08-22 22:30:45', '2024-08-22 22:30:45'),
(338, 94, 'upload/product/1808079567643694.jpg', '2024-08-22 22:30:45', '2024-08-22 22:30:45'),
(339, 94, 'upload/product/1808079567725123.jpg', '2024-08-22 22:30:45', '2024-08-22 22:30:45'),
(341, 95, 'upload/product/1808079828232205.jpg', '2024-08-22 22:34:54', '2024-08-22 22:34:54'),
(342, 95, 'upload/product/1808079828319555.jpg', '2024-08-22 22:34:54', '2024-08-22 22:34:54'),
(343, 95, 'upload/product/1808079828399012.jpg', '2024-08-22 22:34:54', '2024-08-22 22:34:54'),
(344, 96, 'upload/product/1808079848077991.jpg', '2024-08-22 22:35:13', '2024-08-22 22:35:13'),
(345, 96, 'upload/product/1808079848169321.jpg', '2024-08-22 22:35:13', '2024-08-22 22:35:13'),
(347, 97, 'upload/product/1808079972209224.jpg', '2024-08-22 22:37:11', '2024-08-22 22:37:11'),
(348, 97, 'upload/product/1808079972294026.jpg', '2024-08-22 22:37:11', '2024-08-22 22:37:11'),
(349, 97, 'upload/product/1808079972375133.jpg', '2024-08-22 22:37:11', '2024-08-22 22:37:11'),
(350, 98, 'upload/product/1808080048410059.jpg', '2024-08-22 22:38:24', '2024-08-22 22:38:24'),
(351, 98, 'upload/product/1808080048503828.jpg', '2024-08-22 22:38:24', '2024-08-22 22:38:24'),
(352, 99, 'upload/product/1808080137742958.jpg', '2024-08-22 22:39:49', '2024-08-22 22:39:49'),
(353, 99, 'upload/product/1808080137836544.jpg', '2024-08-22 22:39:49', '2024-08-22 22:39:49'),
(354, 99, 'upload/product/1808080137918552.jpg', '2024-08-22 22:39:49', '2024-08-22 22:39:49'),
(355, 99, 'upload/product/1808080137997395.jpg', '2024-08-22 22:39:49', '2024-08-22 22:39:49'),
(356, 100, 'upload/product/1808080160717034.jpg', '2024-08-22 22:40:11', '2024-08-22 22:40:11'),
(357, 100, 'upload/product/1808080160812780.jpg', '2024-08-22 22:40:11', '2024-08-22 22:40:11'),
(358, 100, 'upload/product/1808080160894117.jpg', '2024-08-22 22:40:11', '2024-08-22 22:40:11'),
(359, 89, 'upload/product/1808080175803597.jpg', '2024-08-22 22:40:25', '2024-08-22 22:40:25'),
(360, 89, 'upload/product/1808080175926118.jpg', '2024-08-22 22:40:25', '2024-08-22 22:40:25'),
(361, 89, 'upload/product/1808080176010115.jpg', '2024-08-22 22:40:25', '2024-08-22 22:40:25'),
(362, 89, 'upload/product/1808080176096964.jpg', '2024-08-22 22:40:26', '2024-08-22 22:40:26'),
(363, 101, 'upload/product/1808080439669363.jpg', '2024-08-22 22:44:37', '2024-08-22 22:44:37'),
(364, 101, 'upload/product/1808080439764471.jpg', '2024-08-22 22:44:37', '2024-08-22 22:44:37'),
(365, 101, 'upload/product/1808080439848920.jpg', '2024-08-22 22:44:37', '2024-08-22 22:44:37'),
(366, 101, 'upload/product/1808080439932395.jpg', '2024-08-22 22:44:37', '2024-08-22 22:44:37'),
(367, 102, 'upload/product/1808080447427818.jpg', '2024-08-22 22:44:44', '2024-08-22 22:44:44'),
(368, 102, 'upload/product/1808080447527508.jpg', '2024-08-22 22:44:44', '2024-08-22 22:44:44'),
(369, 102, 'upload/product/1808080447609518.jpg', '2024-08-22 22:44:45', '2024-08-22 22:44:45'),
(370, 103, 'upload/product/1808080448333344.jpg', '2024-08-22 22:44:45', '2024-08-22 22:44:45'),
(371, 103, 'upload/product/1808080448427683.jpg', '2024-08-22 22:44:45', '2024-08-22 22:44:45'),
(372, 103, 'upload/product/1808080448507426.jpg', '2024-08-22 22:44:45', '2024-08-22 22:44:45'),
(373, 104, 'upload/product/1808080497282463.jpg', '2024-08-22 22:45:32', '2024-08-22 22:45:32'),
(374, 104, 'upload/product/1808080497379120.jpg', '2024-08-22 22:45:32', '2024-08-22 22:45:32'),
(375, 105, 'upload/product/1808080502831919.jpg', '2024-08-22 22:45:37', '2024-08-22 22:45:37'),
(376, 105, 'upload/product/1808080502929212.jpg', '2024-08-22 22:45:37', '2024-08-22 22:45:37'),
(377, 105, 'upload/product/1808080503016849.jpg', '2024-08-22 22:45:37', '2024-08-22 22:45:37'),
(378, 105, 'upload/product/1808080503099838.jpg', '2024-08-22 22:45:37', '2024-08-22 22:45:37'),
(379, 106, 'upload/product/1808080642483644.jpg', '2024-08-22 22:47:50', '2024-08-22 22:47:50'),
(380, 106, 'upload/product/1808080642577690.jpg', '2024-08-22 22:47:50', '2024-08-22 22:47:50'),
(381, 107, 'upload/product/1808080738343186.jpg', '2024-08-22 22:49:22', '2024-08-22 22:49:22'),
(382, 107, 'upload/product/1808080738435870.jpg', '2024-08-22 22:49:22', '2024-08-22 22:49:22'),
(383, 107, 'upload/product/1808080738556002.jpg', '2024-08-22 22:49:22', '2024-08-22 22:49:22'),
(384, 107, 'upload/product/1808080738646712.jpg', '2024-08-22 22:49:22', '2024-08-22 22:49:22'),
(385, 108, 'upload/product/1808080813383664.jpg', '2024-08-22 22:50:33', '2024-08-22 22:50:33'),
(386, 108, 'upload/product/1808080813477471.jpg', '2024-08-22 22:50:33', '2024-08-22 22:50:33'),
(387, 108, 'upload/product/1808080813562257.jpg', '2024-08-22 22:50:34', '2024-08-22 22:50:34'),
(388, 108, 'upload/product/1808080813694085.jpg', '2024-08-22 22:50:34', '2024-08-22 22:50:34'),
(389, 109, 'upload/product/1808080823039352.jpg', '2024-08-22 22:50:43', '2024-08-22 22:50:43'),
(390, 109, 'upload/product/1808080823190328.jpg', '2024-08-22 22:50:43', '2024-08-22 22:50:43'),
(391, 110, 'upload/product/1808080954534876.jpg', '2024-08-22 22:52:48', '2024-08-22 22:52:48'),
(392, 110, 'upload/product/1808080954629481.jpg', '2024-08-22 22:52:48', '2024-08-22 22:52:48'),
(393, 110, 'upload/product/1808080954713958.jpg', '2024-08-22 22:52:48', '2024-08-22 22:52:48'),
(394, 110, 'upload/product/1808080954794520.jpg', '2024-08-22 22:52:48', '2024-08-22 22:52:48'),
(395, 111, 'upload/product/1808081023215684.jpg', '2024-08-22 22:53:53', '2024-08-22 22:53:53'),
(396, 111, 'upload/product/1808081023313170.jpg', '2024-08-22 22:53:54', '2024-08-22 22:53:54'),
(397, 111, 'upload/product/1808081023446779.jpg', '2024-08-22 22:53:54', '2024-08-22 22:53:54'),
(398, 111, 'upload/product/1808081023532570.jpg', '2024-08-22 22:53:54', '2024-08-22 22:53:54'),
(399, 112, 'upload/product/1808081127261667.jpg', '2024-08-22 22:55:33', '2024-08-22 22:55:33'),
(425, 119, 'upload/product/1808082879107602.jpg', '2024-08-22 23:23:23', '2024-08-22 23:23:23'),
(424, 119, 'upload/product/1808082879008099.jpg', '2024-08-22 23:23:23', '2024-08-22 23:23:23'),
(423, 119, 'upload/product/1808082878912109.jpg', '2024-08-22 23:23:23', '2024-08-22 23:23:23'),
(403, 113, 'upload/product/1808081131211346.jpg', '2024-08-22 22:55:36', '2024-08-22 22:55:36'),
(404, 113, 'upload/product/1808081131307382.jpg', '2024-08-22 22:55:37', '2024-08-22 22:55:37'),
(405, 113, 'upload/product/1808081131458017.jpg', '2024-08-22 22:55:37', '2024-08-22 22:55:37'),
(406, 113, 'upload/product/1808081131559101.jpg', '2024-08-22 22:55:37', '2024-08-22 22:55:37'),
(407, 114, 'upload/product/1808081368809614.jpg', '2024-08-22 22:59:23', '2024-08-22 22:59:23'),
(408, 114, 'upload/product/1808081368906326.jpg', '2024-08-22 22:59:23', '2024-08-22 22:59:23'),
(409, 114, 'upload/product/1808081368993952.jpg', '2024-08-22 22:59:23', '2024-08-22 22:59:23'),
(410, 115, 'upload/product/1808082315608072.jpg', '2024-08-22 23:14:26', '2024-08-22 23:14:26'),
(411, 115, 'upload/product/1808082315711618.jpg', '2024-08-22 23:14:26', '2024-08-22 23:14:26'),
(412, 115, 'upload/product/1808082315797675.jpg', '2024-08-22 23:14:26', '2024-08-22 23:14:26'),
(413, 116, 'upload/product/1808082393682404.jpg', '2024-08-22 23:15:40', '2024-08-22 23:15:40'),
(414, 116, 'upload/product/1808082393779173.jpg', '2024-08-22 23:15:41', '2024-08-22 23:15:41'),
(415, 116, 'upload/product/1808082393917322.jpg', '2024-08-22 23:15:41', '2024-08-22 23:15:41'),
(416, 117, 'upload/product/1808082578662382.jpg', '2024-08-22 23:18:37', '2024-08-22 23:18:37'),
(417, 117, 'upload/product/1808082578756910.jpg', '2024-08-22 23:18:37', '2024-08-22 23:18:37'),
(418, 117, 'upload/product/1808082578839020.jpg', '2024-08-22 23:18:37', '2024-08-22 23:18:37'),
(419, 117, 'upload/product/1808082578922113.jpg', '2024-08-22 23:18:37', '2024-08-22 23:18:37'),
(422, 118, 'upload/product/1808082776430743.jpg', '2024-08-22 23:21:45', '2024-08-22 23:21:45'),
(426, 120, 'upload/product/1808082920133075.jpg', '2024-08-22 23:24:02', '2024-08-22 23:24:02'),
(427, 120, 'upload/product/1808082920227221.jpg', '2024-08-22 23:24:03', '2024-08-22 23:24:03'),
(428, 120, 'upload/product/1808082920358850.jpg', '2024-08-22 23:24:03', '2024-08-22 23:24:03'),
(429, 120, 'upload/product/1808082920437963.jpg', '2024-08-22 23:24:03', '2024-08-22 23:24:03'),
(430, 112, 'upload/product/1808082981993588.jpg', '2024-08-22 23:25:02', '2024-08-22 23:25:02'),
(431, 112, 'upload/product/1808082982194242.jpg', '2024-08-22 23:25:02', '2024-08-22 23:25:02'),
(432, 112, 'upload/product/1808082982307256.jpg', '2024-08-22 23:25:02', '2024-08-22 23:25:02'),
(433, 121, 'upload/product/1808083028170710.jpg', '2024-08-22 23:25:46', '2024-08-22 23:25:46'),
(434, 121, 'upload/product/1808083028310735.jpg', '2024-08-22 23:25:46', '2024-08-22 23:25:46'),
(435, 121, 'upload/product/1808083028392163.jpg', '2024-08-22 23:25:46', '2024-08-22 23:25:46'),
(436, 122, 'upload/product/1808083094264077.jpg', '2024-08-22 23:26:49', '2024-08-22 23:26:49'),
(437, 122, 'upload/product/1808083094405545.jpg', '2024-08-22 23:26:49', '2024-08-22 23:26:49'),
(438, 122, 'upload/product/1808083094498780.jpg', '2024-08-22 23:26:49', '2024-08-22 23:26:49'),
(439, 122, 'upload/product/1808083094583571.jpg', '2024-08-22 23:26:49', '2024-08-22 23:26:49'),
(440, 123, 'upload/product/1808083209255281.jpg', '2024-08-22 23:28:38', '2024-08-22 23:28:38'),
(441, 123, 'upload/product/1808083209348832.jpg', '2024-08-22 23:28:38', '2024-08-22 23:28:38'),
(442, 123, 'upload/product/1808083209434265.jpg', '2024-08-22 23:28:38', '2024-08-22 23:28:38'),
(443, 123, 'upload/product/1808083209524347.jpg', '2024-08-22 23:28:38', '2024-08-22 23:28:38'),
(444, 124, 'upload/product/1808083263460502.jpg', '2024-08-22 23:29:30', '2024-08-22 23:29:30'),
(445, 124, 'upload/product/1808083263554275.jpg', '2024-08-22 23:29:30', '2024-08-22 23:29:30'),
(446, 124, 'upload/product/1808083263635852.jpg', '2024-08-22 23:29:30', '2024-08-22 23:29:30'),
(447, 124, 'upload/product/1808083263715816.jpg', '2024-08-22 23:29:30', '2024-08-22 23:29:30'),
(448, 125, 'upload/product/1808083273558500.jpg', '2024-08-22 23:29:40', '2024-08-22 23:29:40'),
(449, 125, 'upload/product/1808083273703264.jpg', '2024-08-22 23:29:40', '2024-08-22 23:29:40'),
(450, 125, 'upload/product/1808083273789821.jpg', '2024-08-22 23:29:40', '2024-08-22 23:29:40'),
(451, 126, 'upload/product/1808083376590521.jpg', '2024-08-22 23:31:18', '2024-08-22 23:31:18'),
(452, 126, 'upload/product/1808083376685846.jpg', '2024-08-22 23:31:18', '2024-08-22 23:31:18'),
(453, 126, 'upload/product/1808083376772244.jpg', '2024-08-22 23:31:18', '2024-08-22 23:31:18'),
(454, 127, 'upload/product/1808083550018420.jpg', '2024-08-22 23:34:03', '2024-08-22 23:34:03'),
(455, 127, 'upload/product/1808083550115312.jpg', '2024-08-22 23:34:03', '2024-08-22 23:34:03'),
(456, 127, 'upload/product/1808083550201840.jpg', '2024-08-22 23:34:03', '2024-08-22 23:34:03'),
(457, 128, 'upload/product/1808083738694871.jpg', '2024-08-22 23:37:03', '2024-08-22 23:37:03'),
(458, 128, 'upload/product/1808083738805256.jpg', '2024-08-22 23:37:03', '2024-08-22 23:37:03'),
(459, 129, 'upload/product/1808083776264612.jpg', '2024-08-22 23:37:39', '2024-08-22 23:37:39'),
(460, 129, 'upload/product/1808083776359414.jpg', '2024-08-22 23:37:39', '2024-08-22 23:37:39'),
(461, 129, 'upload/product/1808083776444632.jpg', '2024-08-22 23:37:39', '2024-08-22 23:37:39'),
(462, 130, 'upload/product/1808083859509804.jpg', '2024-08-22 23:38:58', '2024-08-22 23:38:58'),
(463, 130, 'upload/product/1808083859611356.jpg', '2024-08-22 23:38:58', '2024-08-22 23:38:58'),
(464, 130, 'upload/product/1808083859695948.jpg', '2024-08-22 23:38:59', '2024-08-22 23:38:59'),
(465, 131, 'upload/product/1808083865644556.jpg', '2024-08-22 23:39:04', '2024-08-22 23:39:04'),
(466, 131, 'upload/product/1808083865738003.jpg', '2024-08-22 23:39:04', '2024-08-22 23:39:04'),
(480, 132, 'upload/product/1808084256501726.jpg', '2024-08-22 23:45:17', '2024-08-22 23:45:17'),
(478, 135, 'upload/product/1808084242864783.jpg', '2024-08-22 23:45:04', '2024-08-22 23:45:04'),
(479, 132, 'upload/product/1808084256403728.jpg', '2024-08-22 23:45:17', '2024-08-22 23:45:17'),
(471, 133, 'upload/product/1808083924048120.jpg', '2024-08-22 23:40:00', '2024-08-22 23:40:00'),
(472, 133, 'upload/product/1808083924143702.jpg', '2024-08-22 23:40:00', '2024-08-22 23:40:00'),
(473, 133, 'upload/product/1808083924229942.jpg', '2024-08-22 23:40:00', '2024-08-22 23:40:00'),
(524, 30, 'upload/product/1808085159449625.jpg', '2024-08-22 23:59:38', '2024-08-22 23:59:38'),
(525, 30, 'upload/product/1808085159545529.jpg', '2024-08-22 23:59:38', '2024-08-22 23:59:38'),
(526, 30, 'upload/product/1808085159628684.jpg', '2024-08-22 23:59:38', '2024-08-22 23:59:38'),
(481, 132, 'upload/product/1808084256583057.jpg', '2024-08-22 23:45:17', '2024-08-22 23:45:17'),
(482, 132, 'upload/product/1808084256662210.jpg', '2024-08-22 23:45:17', '2024-08-22 23:45:17'),
(483, 31, 'upload/product/1808084310069885.jpg', '2024-08-22 23:46:08', '2024-08-22 23:46:08'),
(484, 31, 'upload/product/1808084310168491.jpg', '2024-08-22 23:46:08', '2024-08-22 23:46:08'),
(485, 31, 'upload/product/1808084310252745.jpg', '2024-08-22 23:46:08', '2024-08-22 23:46:08'),
(489, 137, 'upload/product/1808084471014418.jpg', '2024-08-22 23:48:42', '2024-08-22 23:48:42'),
(490, 137, 'upload/product/1808084471146511.jpg', '2024-08-22 23:48:42', '2024-08-22 23:48:42'),
(494, 138, 'upload/product/1808084718963748.jpg', '2024-08-22 23:52:38', '2024-08-22 23:52:38'),
(495, 138, 'upload/product/1808084719063730.jpg', '2024-08-22 23:52:38', '2024-08-22 23:52:38'),
(496, 138, 'upload/product/1808084719160636.jpg', '2024-08-22 23:52:38', '2024-08-22 23:52:38'),
(497, 138, 'upload/product/1808084719252873.jpg', '2024-08-22 23:52:38', '2024-08-22 23:52:38'),
(498, 139, 'upload/product/1808084777121461.jpg', '2024-08-22 23:53:33', '2024-08-22 23:53:33'),
(499, 139, 'upload/product/1808084777217071.jpg', '2024-08-22 23:53:34', '2024-08-22 23:53:34'),
(500, 139, 'upload/product/1808084777351377.jpg', '2024-08-22 23:53:34', '2024-08-22 23:53:34'),
(501, 139, 'upload/product/1808084777433609.jpg', '2024-08-22 23:53:34', '2024-08-22 23:53:34'),
(502, 76, 'upload/product/1808084814841478.jpg', '2024-08-22 23:54:09', '2024-08-22 23:54:09'),
(514, 142, 'upload/product/1808084968375754.jpg', '2024-08-22 23:56:36', '2024-08-22 23:56:36'),
(513, 142, 'upload/product/1808084968282398.jpg', '2024-08-22 23:56:36', '2024-08-22 23:56:36'),
(505, 140, 'upload/product/1808084855596696.jpg', '2024-08-22 23:54:48', '2024-08-22 23:54:48'),
(506, 140, 'upload/product/1808084855692159.jpg', '2024-08-22 23:54:48', '2024-08-22 23:54:48'),
(507, 140, 'upload/product/1808084855775491.jpg', '2024-08-22 23:54:48', '2024-08-22 23:54:48'),
(508, 140, 'upload/product/1808084855855914.jpg', '2024-08-22 23:54:49', '2024-08-22 23:54:49'),
(509, 141, 'upload/product/1808084926849866.jpg', '2024-08-22 23:55:56', '2024-08-22 23:55:56'),
(510, 141, 'upload/product/1808084926952711.jpg', '2024-08-22 23:55:56', '2024-08-22 23:55:56'),
(511, 141, 'upload/product/1808084927044466.jpg', '2024-08-22 23:55:56', '2024-08-22 23:55:56'),
(512, 141, 'upload/product/1808084927129862.jpg', '2024-08-22 23:55:57', '2024-08-22 23:55:57'),
(516, 142, 'upload/product/1808084968537986.jpg', '2024-08-22 23:56:36', '2024-08-22 23:56:36'),
(517, 143, 'upload/product/1808085055777220.jpg', '2024-08-22 23:57:59', '2024-08-22 23:57:59'),
(518, 143, 'upload/product/1808085055886498.jpg', '2024-08-22 23:57:59', '2024-08-22 23:57:59'),
(519, 143, 'upload/product/1808085055982608.jpg', '2024-08-22 23:57:59', '2024-08-22 23:57:59'),
(520, 143, 'upload/product/1808085056061638.jpg', '2024-08-22 23:58:00', '2024-08-22 23:58:00'),
(538, 134, 'upload/product/1808237789472730.jpg', '2024-08-24 16:25:37', '2024-08-24 16:25:37'),
(546, 145, 'upload/product/1809172937278528.png', '2024-09-03 11:09:24', '2024-09-03 11:09:24'),
(543, 144, 'upload/product/1808239555786095.jpg', '2024-08-24 16:53:42', '2024-08-24 16:53:42'),
(544, 144, 'upload/product/1808239555871246.jpg', '2024-08-24 16:53:42', '2024-08-24 16:53:42'),
(548, 145, 'upload/product/1809172937766245.png', '2024-09-03 11:09:24', '2024-09-03 11:09:24');

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
) ENGINE=MyISAM AUTO_INCREMENT=308 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `color`, `photo`, `created_at`, `updated_at`) VALUES
(307, 145, 'Gray', 'upload/product/1809172938213427.jpeg', '2024-09-03 11:09:25', '2024-09-03 11:09:25'),
(306, 145, 'Blue', 'upload/product/1809172937999311.jpeg', '2024-09-03 11:09:25', '2024-09-03 11:09:25'),
(305, 144, 'Blue', 'upload/product/1809172753212023.jpeg', '2024-09-03 11:06:28', '2024-09-03 11:06:28'),
(302, 20, 'blue', 'upload/product/1808873148996617.png', '2024-08-31 03:44:25', '2024-08-31 03:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_sizes`
--

DROP TABLE IF EXISTS `product_variant_sizes`;
CREATE TABLE IF NOT EXISTS `product_variant_sizes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_variant_id` bigint UNSIGNED NOT NULL,
  `size` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `selling_price` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_variant_sizes_product_variant_id_foreign` (`product_variant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variant_sizes`
--

INSERT INTO `product_variant_sizes` (`id`, `product_variant_id`, `size`, `quantity`, `selling_price`, `discount_price`, `created_at`, `updated_at`) VALUES
(14, 303, 'XXL', 15, '500', '450', '2024-09-03 06:21:34', '2024-09-03 06:21:34'),
(13, 302, 'L', 15, '500', NULL, '2024-08-31 03:44:25', '2024-08-31 03:44:25'),
(15, 303, 'M', 8, '600', NULL, '2024-09-03 06:21:34', '2024-09-03 06:21:34'),
(16, 304, 'S', 5, '8000', NULL, '2024-09-03 06:21:35', '2024-09-03 06:21:35'),
(17, 304, 'L', 12, '8030.75', '7030.75', '2024-09-03 06:21:35', '2024-09-03 06:21:35'),
(18, 305, 'L', 4, '500', NULL, '2024-09-03 11:06:28', '2024-09-03 11:06:28'),
(19, 305, 'XL', 8, '600', NULL, '2024-09-03 11:06:28', '2024-09-03 11:06:28'),
(20, 306, 'default', 12, '100', NULL, '2024-09-03 11:09:25', '2024-09-03 11:09:25'),
(21, 307, 'default', 4, '500', NULL, '2024-09-03 11:09:25', '2024-09-03 11:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_2` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_phone_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_phone_2` text COLLATE utf8mb4_unicode_ci,
  `map_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_copyright_by` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_copyright_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `logo`, `favicon`, `phone_1`, `phone_2`, `email`, `address`, `us_address`, `us_phone_1`, `us_phone_2`, `map_link`, `meta_keyword`, `meta_description`, `footer_logo`, `footer_text`, `footer_copyright_by`, `footer_copyright_url`, `created_at`, `updated_at`) VALUES
(1, 'President | Essential-Infotech', 'upload/logo.webp', 'upload/favicon.webp', '+880 1810150561', '+880 9614881148', 'info@essential-infotech.com', 'Garib-E-Newaz Avenue, Sector#13, Uttara, Dhaka 1230', '1567 Kimball Road, Arab, AL 35016', '+1 (844)-644-1744', NULL, 'https://maps.app.goo.gl/tcgZqMDbrevJcYN57', 'call center service, website, software development, BPO service provider, virtual assistance', 'Essential-Infotech is a BPO service provider, offering call center service, outsource back office support, website, app, software development, & IT Solutions.', 'upload/footer_logo.webp', 'We are a leading IT company experienced in innovative development and design solutions. We have a unique, out-of-the-box approach to cope with custom clients\' needs and demands. Success is essential to your business; so are we!', 'Essential-Infotech', 'https://essential-infotech.com', NULL, '2024-06-26 14:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `social_items`
--

DROP TABLE IF EXISTS `social_items`;
CREATE TABLE IF NOT EXISTS `social_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@email.com', NULL, '$2y$12$QZGqQgLjxQ7hrztPOk70sOPrYT6O9kyfZIE/k7qI3C5yeUmP0hrmS', '202405190840favicon.png', NULL, 'admin', 'active', NULL, '2024-01-14 04:47:02', '2024-05-19 02:40:27'),
(2, 'username', NULL, 'user@email.com', NULL, '$2y$12$BrkiVfaHwtdXxwFSNdkOQ.o6Irf1ZLG2S/kQV5sWhpm/9n.6Kmg2q', NULL, '0245454545', 'user', 'active', 'J3xqoQm3byJQ3dRqAMHbwd4anuP7NqWt6hd0GFHGbwn8ePeePekBRW5UPPY2', '2024-01-14 06:35:54', '2024-09-03 06:10:26'),
(3, 'new User', NULL, 'nuser@email.com', NULL, '$2y$12$s3F2jxPhoAUkD7qzN3s17OvvJSmwKPVnxvRYgAFZNRPjDWXpqVj8S', NULL, NULL, 'user', 'active', NULL, '2024-06-20 04:14:28', '2024-06-20 04:14:28'),
(4, 'nnuser', NULL, 'nnuser@email.com', NULL, '$2y$12$4xEETzlZY1HvhERdquqsNeBrdfB3AoR6Tup2qLynUqTqYRNlZ4x7S', NULL, NULL, 'user', 'active', NULL, '2024-06-20 04:41:37', '2024-06-20 04:41:37'),
(5, 'Shamanta Jaman Shammi', NULL, '96shammi@gmail.com', NULL, '$2y$12$K8wFSioVuWhaOkFMhNbgge1q1UhaGws6WpfThn53VC50lyJAO0KXq', NULL, NULL, 'user', 'active', NULL, '2024-06-24 14:36:22', '2024-06-24 14:36:22'),
(6, 'Tasnia Tabassum Esha', NULL, 'eshatasniatabassum@gmail.com', NULL, '$2y$12$LyHAguWkKBTfhxp66ElkvuSa1ycmTYtTfE1DfOsfcukMFuYQb.qJK', NULL, '01775546967', 'user', 'active', NULL, '2024-06-24 14:36:52', '2024-06-24 14:37:26'),
(7, 'Mostahid Ahmed', NULL, 'mostahidahmed34@gmail.com', NULL, '$2y$12$4E7iafhePL7XJ1Mb8bhPnOAohJG1qu4mSFllU7M2IA4FkJ9uLRzxO', NULL, NULL, 'user', 'active', NULL, '2024-06-24 14:37:35', '2024-06-24 14:37:35'),
(8, 'Azmir Pair Mithi', NULL, 'azmirmithi368@gmail.com', NULL, '$2y$12$Ml5VsbNWlxPK.VMSpVFaXu6AAkeV590TZZ3VwJXgP9g1tCAatpzJq', NULL, NULL, 'user', 'active', NULL, '2024-06-24 14:37:37', '2024-06-24 15:33:14'),
(9, 'Azmir Pair Mithi', NULL, 'humairajannat21@gmail.com', NULL, '$2y$12$RcdohBmq5MeEl6WENC7qgu4fn9wXXYlKeiYCVtYDfoNhy90IfvCe2', NULL, NULL, 'user', 'active', NULL, '2024-06-27 14:16:10', '2024-06-27 14:16:10'),
(10, 'nregis', NULL, 'nregis@email.com', NULL, '$2y$12$rYttmhVBSJixG9GuUPxFq.ZDC17DbhB4htWfuTxAZUqz08CgqazXu', NULL, NULL, 'user', 'active', NULL, '2024-09-03 06:17:35', '2024-09-03 06:17:35'),
(11, '12333', NULL, 'user1@email.com', NULL, '$2y$12$5o.wtsI.GVJHY72oQbA2XeFKVgb5epsnTxHtKrmxegZ/Sa2.dqY6m', NULL, NULL, 'user', 'active', NULL, '2024-09-03 08:32:05', '2024-09-03 08:32:05'),
(12, '232323', NULL, 'user3@email.com', NULL, '$2y$12$HZlJommbe4yVQftXtoOv5.hwXyPRFSmb2drh.EcOAEtveULAackpu', NULL, NULL, 'user', 'active', NULL, '2024-09-03 08:40:16', '2024-09-03 08:40:16'),
(13, 'R11111', NULL, 'user4@email.com', NULL, '$2y$12$flNkdL3xCIYvgYmtOw7Dy.DRkprE67HJ2lz0DvP9dwCd74TzyJtVW', NULL, '01609071300', 'user', 'active', NULL, '2024-09-03 08:58:38', '2024-09-03 09:38:38');

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
