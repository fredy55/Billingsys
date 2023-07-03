-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2021 at 03:17 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing_sysdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_info`
--

DROP TABLE IF EXISTS `billing_info`;
CREATE TABLE IF NOT EXISTS `billing_info` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_no` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amt` decimal(8,2) NOT NULL,
  `amt_paid` decimal(8,2) NOT NULL,
  `balance` decimal(8,2) NOT NULL,
  `IsActive` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `billing_info_bill_no_unique` (`bill_no`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_info`
--

INSERT INTO `billing_info` (`id`, `bill_no`, `client_id`, `type`, `total_amt`, `amt_paid`, `balance`, `IsActive`, `created_at`, `updated_at`) VALUES
(34, 160615, 4, 'Web', '98720.00', '0.00', '98720.00', 1, '2021-08-06 15:06:15', '2021-08-06 15:06:15'),
(33, 155620, 4, 'Web', '40000.00', '12000.00', '28000.00', 1, '2021-08-06 14:56:20', '2021-08-06 14:56:20'),
(30, 152110, 4, 'Web', '73500.00', '73500.00', '0.00', 1, '2021-08-06 14:21:10', '2021-08-06 14:21:10'),
(29, 142226, 4, 'Web', '19020.00', '19020.00', '0.00', 1, '2021-06-06 13:22:26', '2021-08-06 13:22:26'),
(32, 153521, 4, 'Web', '40200.00', '40200.00', '0.00', 1, '2021-08-06 14:35:21', '2021-08-06 14:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `billing_items`
--

DROP TABLE IF EXISTS `billing_items`;
CREATE TABLE IF NOT EXISTS `billing_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_no` bigint(20) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_items`
--

INSERT INTO `billing_items` (`id`, `bill_no`, `service_id`, `item`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(54, 160615, 160211, 'Digital Certificate Integration', '28000.00', 1, '28000.00', '2021-08-06 15:06:15', '2021-08-06 15:06:15'),
(53, 160615, 142129, 'SSL Subscription', '8200.00', 1, '8200.00', '2021-08-06 15:06:15', '2021-08-06 15:06:15'),
(52, 160615, 155136, 'Web Hosting Renewal', '31500.00', 1, '31500.00', '2021-08-06 15:06:15', '2021-08-06 15:06:15'),
(51, 160615, 155334, 'Domain Name Renewal', '9520.00', 1, '9520.00', '2021-08-06 15:06:15', '2021-08-06 15:06:15'),
(50, 155620, 75125, 'Journal Publication Management', '40000.00', 1, '40000.00', '2021-08-06 14:56:20', '2021-08-06 14:56:20'),
(45, 152110, 74806, 'Impact Factor Subscription', '73500.00', 1, '73500.00', '2021-08-06 14:21:10', '2021-08-06 14:21:10'),
(44, 142226, 142129, 'SSL Subscription', '8200.00', 1, '8200.00', '2021-08-06 13:22:26', '2021-08-06 13:22:26'),
(43, 142226, 141952, 'Domain Name Renewal', '10820.00', 1, '10820.00', '2021-08-06 13:22:26', '2021-08-06 13:22:26'),
(48, 153521, 153417, 'Linkedin Marketing', '17200.00', 1, '17200.00', '2021-08-06 14:35:21', '2021-08-06 14:35:21'),
(49, 153521, 80326, 'Email Marketing', '23000.00', 1, '23000.00', '2021-08-06 14:35:21', '2021-08-06 14:35:21'),
(55, 160615, 160404, 'SEO Upgrade', '21500.00', 1, '21500.00', '2021-08-06 15:06:15', '2021-08-06 15:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

DROP TABLE IF EXISTS `client_info`;
CREATE TABLE IF NOT EXISTS `client_info` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `compId` bigint(20) NOT NULL,
  `ctname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressln1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nigeria',
  `IsActive` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `client_info_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_info`
--

INSERT INTO `client_info` (`id`, `compId`, `ctname`, `email`, `phone_no`, `addressln1`, `city`, `state`, `country`, `IsActive`, `created_at`, `updated_at`) VALUES
(4, 4, 'Science View Journal', 'vclokoreweb@gmail.com', '08033380350', '8 Toronto Road,  Uratta', 'Owerri', 'Imo', 'Nigeria', 1, '2021-08-06 06:23:22', '2021-08-06 06:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

DROP TABLE IF EXISTS `company_info`;
CREATE TABLE IF NOT EXISTS `company_info` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ctname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cac_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressln1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nigeria',
  `img_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nil',
  `IsActive` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `company_info_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `ctname`, `cac_num`, `email`, `phone_no`, `addressln1`, `city`, `state`, `country`, `img_url`, `IsActive`, `created_at`, `updated_at`) VALUES
(6, 'Fredy Global Technology Services', 'BN2756502', 'sales@fredytech.com', '08063963996', '12 Mosalashi Street, Surulere', 'Lagos', 'Lagos', 'Nigeria', 'storage/profile/img_71752.png', 1, '2021-08-06 06:17:52', '2021-08-06 06:18:57'),
(4, 'Oasis Infotech Services', 'IM9277', 'info@oasisofinfotech.com', '08036061366', '23 Port-Harcout Road', 'Owerri', 'Imo', 'Nigeria', 'storage/profile/img_135640.png', 1, '2021-08-05 12:51:01', '2021-08-05 12:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_05_134606_create_company_info_table', 1),
(12, '2021_06_05_134647_create_client_info_table', 3),
(6, '2021_06_05_134715_create_service_table', 1),
(15, '2021_06_05_134740_create_billing_info_table', 5),
(14, '2021_06_05_134807_create_billing_items_table', 4),
(11, '2021_06_07_173228_create_servicat_table', 2),
(10, '2021_06_05_134912_create_site_admin_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicat`
--

DROP TABLE IF EXISTS `servicat`;
CREATE TABLE IF NOT EXISTS `servicat` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsActive` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `servicat_category_id_unique` (`category_id`),
  UNIQUE KEY `servicat_category_unique` (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicat`
--

INSERT INTO `servicat` (`id`, `category_id`, `category`, `description`, `IsActive`, `created_at`, `updated_at`) VALUES
(1, 23423, 'Website Development', 'Website Frontend and Backend Development', 1, '2021-06-02 16:49:19', '2021-08-06 06:57:06'),
(2, 23454, 'Subscriptions', 'The web server Subscriptions', 1, '2021-06-02 16:49:19', '2021-06-02 16:49:19'),
(4, 182048, 'Regitration', 'Domain name registration', 1, '2021-06-07 17:20:48', '2021-06-07 17:33:23'),
(6, 74925, 'Journal Publication', 'Journal Paper publication and management of admin panel.', 1, '2021-08-06 06:49:25', '2021-08-06 06:49:25'),
(7, 75805, 'Digital Marketing', 'Digital Marketing including social media, SMS and Emails', 1, '2021-08-06 06:58:05', '2021-08-06 06:58:05'),
(8, 75844, 'Search Engine Optimization', 'Search Engine Optimization (SEO)', 1, '2021-08-06 06:58:44', '2021-08-06 06:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) NOT NULL,
  `category_id` bigint(255) NOT NULL,
  `sname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `IsActive` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `service_service_id_unique` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service_id`, `category_id`, `sname`, `description`, `price`, `IsActive`, `created_at`, `updated_at`) VALUES
(1, 141622, 182048, 'Domain Name Registration', 'Domain Name Registration', '10820.00', 1, '2021-06-02 17:39:07', '2021-08-06 13:16:22'),
(2, 52525, 23454, 'SMS Integration', 'SMS Integration', '23000.00', 1, '2021-06-23 17:39:07', '2021-06-10 17:39:07'),
(4, 74806, 23454, 'Impact Factor Subscription', 'Impact Factor subscription and integration', '73500.00', 1, '2021-08-06 06:25:07', '2021-08-06 06:48:06'),
(5, 72619, 23423, 'Custom Email Integration', 'Custom Email Integration using webmails', '23000.00', 1, '2021-08-06 06:26:19', '2021-08-06 06:26:19'),
(6, 75125, 74925, 'Journal Publication Management', 'Journal Publication and admin panel management', '40000.00', 1, '2021-08-06 06:51:25', '2021-08-06 06:51:25'),
(7, 142129, 23454, 'SSL Subscription', 'SSL web security yearly subscription', '8200.00', 1, '2021-08-06 07:02:02', '2021-08-06 13:21:29'),
(8, 80326, 75805, 'Email Marketing', 'Custom email marketing using webmails', '23000.00', 1, '2021-08-06 07:03:26', '2021-08-06 07:03:26'),
(9, 80449, 75805, 'Social Media Marketing', 'Social Media Marketing (Linkedin, Facebook, Twitter and Instagram)', '34000.00', 1, '2021-08-06 07:04:49', '2021-08-06 07:04:49'),
(10, 155334, 23454, 'Domain Name Renewal', 'Domain name yearly subscription (vclokoreweb.com)', '9520.00', 1, '2021-08-06 13:18:29', '2021-08-06 14:53:34'),
(11, 153417, 75805, 'Linkedin Marketing', 'Linkedin Marketing for client journal websites', '17200.00', 1, '2021-08-06 14:19:21', '2021-08-06 14:34:17'),
(12, 155136, 23454, 'Web Hosting Renewal', 'Website hosting space yearly subscription', '31500.00', 1, '2021-08-06 14:43:30', '2021-08-06 14:51:36'),
(13, 160211, 23423, 'Digital Certificate Integration', 'Development and Integration of digital certificate for journal editors', '28000.00', 1, '2021-08-06 15:02:11', '2021-08-06 15:02:11'),
(14, 160404, 75844, 'SEO Upgrade', 'Basic Search Engine Optimization Upgrade for websites', '21500.00', 1, '2021-08-06 15:04:04', '2021-08-06 15:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `site_admin`
--

DROP TABLE IF EXISTS `site_admin`;
CREATE TABLE IF NOT EXISTS `site_admin` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ftname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ltname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nil',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsActive` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_admin_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_admin`
--

INSERT INTO `site_admin` (`id`, `ftname`, `ltname`, `email`, `email_verified_at`, `phone_no`, `gender`, `address`, `password`, `img_url`, `remember_token`, `IsActive`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Billings', 'admin@billsystem.com', NULL, '08076374636', 'Male', 'Ajah, Sangotedo, Lagos', '$2y$10$86yieW8Kou1S1LLOVBN7Z./1o24OlkdbBWvhDCbqoXRt36SmSBH02', 'nil', NULL, 1, '2021-05-04 09:15:02', '2021-05-09 03:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
