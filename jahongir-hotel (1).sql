-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 02:02 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jahongir-hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cargos`
--

CREATE TABLE `cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cargo_arrival_date` date NOT NULL,
  `total_cargo_weight` decimal(10,2) NOT NULL,
  `cargo_total_sum` decimal(10,2) NOT NULL,
  `cargo_extra_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `margin_cargo` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expense_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `expense_date` date NOT NULL,
  `expense_category_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type_id` bigint(20) UNSIGNED NOT NULL,
  `report_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_amount_uzs` decimal(10,2) NOT NULL,
  `expense_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `created_at`, `updated_at`, `expense_name`, `user_id`, `expense_date`, `expense_category_id`, `payment_type_id`, `report_number`, `expense_amount_uzs`, `expense_number`) VALUES
(2, '2022-02-09 00:13:18', '2022-02-09 00:38:27', 'Bozorlik', 1, '2022-01-17', 1, 1, '', '100000.00', '854'),
(3, '2022-02-09 00:13:53', '2022-02-09 01:01:50', 'Nodira avans', 1, '2022-01-20', 2, 1, '', '100000.00', '867'),
(4, '2022-02-09 01:02:26', '2022-02-09 01:02:26', 'suv filtr', 1, '2022-01-22', 4, 1, '', '50000.00', '868'),
(5, '2022-02-09 01:03:02', '2022-02-09 01:03:02', 'Aya oylik', 1, '2022-01-25', 2, 1, '', '1000000.00', '870'),
(6, '2022-02-09 01:03:39', '2022-02-09 01:03:39', 'zavtrak', 1, '2022-01-30', 1, 1, '', '50000.00', '882'),
(7, '2022-02-09 01:09:19', '2022-02-09 01:09:19', 'Pododeyalnik 10d 2 kishilik twin', 1, '2022-01-29', 3, 1, '', '1560000.00', '951'),
(8, '2022-02-09 01:10:46', '2022-02-09 01:10:46', 'non', 1, '2022-02-04', 1, 1, '1', '20000.00', '955'),
(9, '2022-02-09 01:11:16', '2022-02-09 01:11:16', 'non, sut', 1, '2022-02-06', 1, 1, '1', '50000.00', '959'),
(10, '2022-02-09 01:12:52', '2022-02-09 01:12:52', 'bozorlik', 1, '2022-01-21', 1, 1, '', '150000.00', '941'),
(11, '2022-02-09 01:13:22', '2022-02-09 01:13:22', 'Benzin', 1, '2022-01-25', 4, 1, '', '100000.00', '943'),
(12, '2022-02-09 01:14:06', '2022-02-09 01:14:06', 'gosht', 1, '2022-01-30', 4, 1, '', '100000.00', '950'),
(13, '2022-02-15 06:43:41', '2022-02-15 06:43:41', 'Nodira oylik', 1, '2022-02-10', 2, 1, '1', '1150000.00', '970'),
(14, '2022-02-20 05:35:54', '2022-02-20 05:35:54', 'Zavtrak', 1, '2022-01-05', 1, 2, '2', '138000.00', '344'),
(15, '2022-02-20 05:36:32', '2022-02-20 05:36:32', 'Zavtrak', 1, '2022-01-06', 1, 2, '2', '219000.00', '345'),
(16, '2022-02-20 05:37:12', '2022-02-20 05:37:12', 'Zavtrak', 1, '2022-01-07', 1, 2, '2', '168000.00', '346'),
(17, '2022-02-20 05:37:43', '2022-02-20 05:37:43', 'Zavtrak', 1, '2022-01-08', 1, 2, '2', '101000.00', '347'),
(18, '2022-02-20 05:38:15', '2022-02-20 05:38:15', 'Zavtrak', 1, '2022-01-10', 1, 2, '2', '46000.00', '348'),
(19, '2022-02-20 05:38:47', '2022-02-20 05:38:47', 'Zavtrak', 1, '2022-01-12', 1, 2, '2', '63000.00', '349'),
(20, '2022-02-20 05:39:28', '2022-02-20 05:39:28', 'Zavtrak', 1, '2022-01-13', 1, 2, '2', '38000.00', '350'),
(21, '2022-02-20 05:39:51', '2022-02-20 05:39:51', 'Zavtrak', 1, '2022-01-14', 1, 2, '2', '67000.00', '351'),
(22, '2022-02-20 05:40:13', '2022-02-20 05:40:13', 'Zavtrak', 1, '2022-02-15', 1, 2, '2', '180000.00', '352'),
(23, '2022-02-20 05:40:36', '2022-02-20 05:40:36', 'Zavtrak', 1, '2022-01-16', 1, 2, '2', '94000.00', '353'),
(24, '2022-02-20 05:41:00', '2022-02-20 05:41:00', 'Zavtrak', 1, '2022-01-17', 1, 2, '1', '99000.00', '354'),
(25, '2022-02-20 05:41:22', '2022-02-20 05:41:22', 'Zavtrak', 1, '2022-01-18', 1, 2, '1', '61000.00', '355'),
(26, '2022-02-20 05:41:46', '2022-02-20 05:41:46', 'Zavtrak', 1, '2022-01-25', 1, 2, '1', '64000.00', '356'),
(27, '2022-02-20 05:42:09', '2022-02-20 05:42:09', 'Zavtrak', 1, '2022-01-27', 1, 2, '1', '26000.00', '357'),
(28, '2022-02-20 05:42:38', '2022-02-20 05:42:38', 'Zavtrak', 1, '2022-01-28', 1, 2, '1', '220000.00', '358'),
(29, '2022-02-20 05:43:01', '2022-02-20 05:43:01', 'Zavtrak', 1, '2022-01-29', 1, 2, '1', '100000.00', '359'),
(30, '2022-02-20 05:43:35', '2022-02-20 05:43:35', 'Zavtrak', 1, '2022-01-30', 1, 2, '1', '92000.00', '360'),
(31, '2022-02-20 05:44:20', '2022-02-20 05:44:20', 'Zavtrak', 1, '2022-01-31', 1, 2, '1', '135000.00', '361'),
(32, '2022-02-20 05:45:54', '2022-02-20 05:45:54', 'Zavtrak', 1, '2022-02-01', 1, 2, '1', '134000.00', '362'),
(33, '2022-02-20 05:46:36', '2022-02-20 05:46:36', 'Zavtrak', 1, '2022-02-02', 1, 2, '1', '105000.00', '363'),
(34, '2022-02-20 05:47:08', '2022-02-20 05:47:08', 'poroshok, salfetki, kley', 1, '2022-02-02', 3, 2, '1', '116000.00', '364'),
(35, '2022-02-20 05:47:42', '2022-02-20 05:47:42', 'Zavtrak', 1, '2022-02-03', 1, 2, '1', '105000.00', '365'),
(36, '2022-02-20 05:48:17', '2022-02-20 05:48:17', 'Zavtrak', 1, '2022-02-04', 1, 1, '1', '210000.00', '366'),
(37, '2022-02-20 05:48:43', '2022-02-20 05:48:43', 'Zavtrak', 1, '2022-02-05', 1, 2, '1', '140000.00', '367'),
(38, '2022-02-20 05:49:09', '2022-02-20 05:49:09', 'Zavtrak', 1, '2022-02-06', 1, 2, '1', '45000.00', '368'),
(39, '2022-02-20 05:49:34', '2022-02-20 05:49:34', 'Zavtrak', 1, '2022-02-07', 1, 2, '1', '91000.00', '369'),
(40, '2022-02-20 05:50:03', '2022-02-20 05:50:03', 'Zavtrak', 1, '2022-02-08', 1, 2, '1', '83000.00', '370'),
(41, '2022-02-20 05:50:33', '2022-02-20 05:50:33', 'Zavtrak', 1, '2022-02-09', 1, 2, '1', '120000.00', '371'),
(42, '2022-02-20 05:50:58', '2022-02-20 05:50:58', 'Zavtrak', 1, '2022-02-10', 1, 2, '1', '110000.00', '372'),
(43, '2022-02-20 05:51:25', '2022-02-20 05:51:25', 'Zavtrak', 1, '2022-02-11', 1, 2, '1', '109000.00', '373'),
(44, '2022-02-20 05:51:49', '2022-02-20 05:51:49', 'kofe', 1, '2022-02-12', 1, 2, '1', '94000.00', '374'),
(45, '2022-02-20 05:52:10', '2022-02-20 05:52:10', 'Zavtrak', 1, '2022-02-12', 1, 2, '1', '81000.00', '375'),
(46, '2022-02-20 05:52:35', '2022-02-20 05:52:35', 'Zavtrak', 1, '2022-02-15', 1, 2, '1', '387000.00', '376'),
(47, '2022-02-20 05:53:08', '2022-02-20 05:53:08', 'Zavtrak', 1, '2022-02-16', 1, 2, '2', '105000.00', '377'),
(48, '2022-02-20 05:53:34', '2022-02-20 05:53:34', 'Zavtrak', 1, '2022-02-19', 1, 2, '2', '99000.00', '378'),
(49, '2022-02-20 05:54:03', '2022-02-20 05:54:03', 'xozmag', 1, '2022-02-19', 4, 2, '2', '21000.00', '379');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `created_at`, `updated_at`, `category_name`) VALUES
(1, NULL, NULL, 'Breakfast'),
(2, NULL, NULL, 'Oylik'),
(3, NULL, NULL, 'Room'),
(4, NULL, NULL, 'General'),
(5, NULL, NULL, 'Usto');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `firmas`
--

CREATE TABLE `firmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `firm_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `firmas`
--

INSERT INTO `firmas` (`id`, `created_at`, `updated_at`, `firm_name`) VALUES
(1, NULL, NULL, 'YTT'),
(2, NULL, NULL, 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `guides`
--

CREATE TABLE `guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tourgroup_id` bigint(20) UNSIGNED NOT NULL,
  `guide_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guide_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guide_lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guide_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guide_extra_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotelreservations`
--

CREATE TABLE `hotelreservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hotel_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `early_checkin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `late_checkout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tourgroup_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inkassas`
--

CREATE TABLE `inkassas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_inkassa` date NOT NULL,
  `amount_inkassa` decimal(10,2) NOT NULL,
  `firm_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `report_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inkassas`
--

INSERT INTO `inkassas` (`id`, `created_at`, `updated_at`, `date_inkassa`, `amount_inkassa`, `firm_id`, `user_id`, `report_id`) VALUES
(7, '2022-02-09 03:54:05', '2022-02-09 03:54:05', '2022-02-09', '45000.00', 2, 1, 1),
(8, '2022-02-09 03:54:14', '2022-02-09 03:54:14', '2022-02-09', '25000.00', 1, 1, 1),
(9, '2022-02-09 03:54:29', '2022-02-09 03:54:29', '2022-02-09', '55000.00', 2, 1, 1),
(11, '2022-02-09 06:03:12', '2022-02-09 06:03:12', '2022-02-09', '35000.00', 1, 1, 2),
(12, '2022-02-09 06:05:33', '2022-02-09 06:05:33', '2022-02-08', '35005.00', 2, 1, 1),
(13, '2022-02-09 06:05:34', '2022-02-09 06:05:34', '2022-02-08', '35005.00', 2, 1, 1),
(14, '2022-02-09 06:21:38', '2022-02-09 06:21:38', '2022-02-09', '1000000.00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price_total` decimal(10,2) NOT NULL,
  `product_total_weight` decimal(10,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cargo_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_24_144350_create_tourgroups_table', 1),
(6, '2021_12_24_144906_create_hotelreservations_table', 1),
(7, '2022_01_11_153311_create_transports_table', 1),
(8, '2022_01_21_171647_create_guides_table', 1),
(9, '2022_01_21_173755_add_column_guidestatus_to_guides_table', 1),
(10, '2022_01_21_175055_add_column_extrainfos_to_guides_table', 1),
(11, '2022_01_22_090755_create_restaurants_table', 1),
(12, '2022_01_22_092614_add_restarant_tel_to_restaurants_table', 1),
(13, '2022_01_22_093015_add_tourgroup_tel_to_restaurants_table', 1),
(14, '2022_01_22_124828_create_tickets_table', 1),
(15, '2022_01_22_125724_add_ticket_filel_to_tickets_table', 1),
(16, '2022_01_24_235819_create_products_table', 1),
(17, '2022_01_25_001719_add_product_desc_to_products_table', 1),
(18, '2022_01_25_002618_create_inventories_table', 1),
(19, '2022_01_25_004422_create_cargos_table', 1),
(20, '2022_01_26_062955_add_product_weight_to_products_table', 1),
(21, '2022_01_26_165711_add_product_price_to_products_table', 1),
(22, '2022_01_29_095618_create_reservations_table', 1),
(23, '2022_01_29_164205_create_rooms_table', 1),
(24, '2022_02_02_065936_create_expenses_table', 1),
(25, '2022_02_02_080900_create_expense_categories_table', 1),
(26, '2022_02_02_081027_create_payment_types_table', 1),
(27, '2022_02_02_083102_create_reports_table', 1),
(28, '2022_02_09_062426_create_inkassas_table', 2),
(29, '2022_02_09_075030_create_firmas_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `created_at`, `updated_at`, `payment_type_name`) VALUES
(1, NULL, NULL, 'Naqd'),
(2, NULL, NULL, 'Karta'),
(3, NULL, NULL, 'Perech');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_weight` decimal(8,2) DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `report_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_date_from` date NOT NULL,
  `report_date_to` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `guestFirstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guestName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roomId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstNight` date DEFAULT NULL,
  `lastNight` date DEFAULT NULL,
  `numAdult` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `price_uzs` decimal(10,2) DEFAULT NULL,
  `commission` decimal(10,2) DEFAULT NULL,
  `referer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `created_at`, `updated_at`, `guestFirstName`, `guestName`, `bookId`, `unitId`, `roomId`, `firstNight`, `lastNight`, `numAdult`, `price`, `price_uzs`, `commission`, `referer`, `payment_method`, `company_name`, `report_number`) VALUES
(20, '2022-02-08 23:25:08', '2022-02-15 01:29:47', 'Felix', '', '27330598', '2', '94982', '2022-01-24', '2022-01-26', 1, '60.00', '0.00', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(21, '2022-02-08 23:25:09', '2022-02-08 23:40:21', 'Senol+1', '', '27406776', '2', '94982', '2022-01-29', '2022-01-29', 2, '36.70', '397648.96', '0.00', 'odilorg', 'Naqd', NULL, ''),
(22, '2022-02-08 23:25:09', '2022-02-09 00:04:51', 'Steppe Journeys', 'Thomas Gilboy+7', '27000713', '1', '94982', '2022-02-01', '2022-02-02', 2, '73.00', '790708.98', '0.00', 'odilorg', 'Perech', NULL, '1'),
(23, '2022-02-08 23:25:10', '2022-02-08 23:42:30', 'DARIA', 'MOTAKOVA', '27117983', '2', '94982', '2022-01-31', '2022-02-03', 2, '131.00', '1418459.81', '16.65', 'Booking.com', 'Karta', NULL, '1'),
(24, '2022-02-08 23:25:10', '2022-02-08 23:41:39', 'Olga', 'Levitina', '27451791', '1', '94982', '2022-02-03', '2022-02-05', 2, '142.14', '1540179.41', '21.32', 'Booking.com', 'Karta', NULL, '1'),
(25, '2022-02-08 23:25:11', '2022-02-08 23:45:53', 'Maxim', 'Kurgansky', '27474466', '2', '94982', '2022-02-04', '2022-02-05', 2, '94.76', '1029317.96', '14.21', 'Booking.com', 'Karta', NULL, '1'),
(26, '2022-02-08 23:25:11', '2022-02-08 23:51:49', 'Uzbeklar', '', '27638841', '2', '94982', '2022-02-07', '2022-02-07', 2, '27.72', '301367.34', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(27, '2022-02-08 23:25:12', '2022-02-08 23:31:31', 'Alimbayev', '', '27345636', '2', '94984', '2022-01-25', '2022-01-27', 1, '41.28', '447447.87', '0.00', 'odilorg', 'Naqd', NULL, ''),
(28, '2022-02-08 23:25:12', '2022-02-08 23:31:50', 'Otabek', '', '27424628', '2', '94984', '2022-01-28', '2022-01-28', 1, '13.76', '149115.42', '0.00', 'odilorg', 'Naqd', NULL, ''),
(29, '2022-02-08 23:25:13', '2022-02-08 23:34:59', 'Turk', '', '27438454', '3', '94984', '2022-01-28', '2022-01-28', 1, '9.17', '99374.16', '0.00', 'odilorg', 'Naqd', NULL, ''),
(30, '2022-02-08 23:25:13', '2022-02-08 23:40:56', 'Sherzod', 'Alimbaev', '27480204', '2', '94984', '2022-02-01', '2022-02-02', 1, '27.80', '301119.31', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(31, '2022-02-08 23:25:14', '2022-02-08 23:45:19', 'Uzbeklar', '', '27503218', '3', '94984', '2022-02-04', '2022-02-05', 1, '46.16', '501406.89', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(32, '2022-02-08 23:25:14', '2022-02-08 23:52:18', 'Svetlana', 'Kuzina', '27361249', '3', '94984', '2022-02-08', '2022-02-09', 1, '48.64', '528628.71', '7.30', 'Booking.com', 'Naqd', NULL, '1'),
(33, '2022-02-08 23:25:14', '2022-02-08 23:29:27', 'Bobur', '', '27175908', '1', '94986', '2022-01-17', '2022-01-18', 1, '36.70', '398404.13', '0.00', 'odilorg', 'Naqd', NULL, ''),
(34, '2022-02-08 23:25:15', '2022-02-15 06:35:16', 'Richard', '200 000', '27139769', '2', '94986', '2022-01-17', '2022-01-20', 1, '73.40', '797419.07', '0.00', 'odilorg', 'Naqd', NULL, NULL),
(35, '2022-02-08 23:25:15', '2022-02-08 23:34:33', 'daria', 'sarycheva', '25634362', '2', '94986', '2022-01-28', '2022-01-28', 2, '34.99', '379182.32', '5.25', 'Booking.com', 'Karta', NULL, ''),
(36, '2022-02-08 23:25:16', '2022-02-08 23:33:19', 'uzbeklar', '', '27438444', '1', '94986', '2022-01-28', '2022-01-28', 2, '20.00', '216737.53', '0.00', 'odilorg', 'Naqd', NULL, ''),
(37, '2022-02-08 23:25:16', '2022-02-09 01:16:09', 'XALMATOV BOBUR', '', '27507106', '2', '94986', '2022-02-01', '2022-02-02', 2, '37.00', '400770.30', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(38, '2022-02-08 23:25:17', '2022-02-08 23:41:14', 'Tajiki', '', '27523248', '1', '94986', '2022-02-02', '2022-02-02', 2, '49.46', '535861.28', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(39, '2022-02-08 23:25:17', '2022-02-09 00:03:15', 'Tajikistan', '', '27680110', '3', '94986', '2022-02-08', '2022-02-10', 2, '55.45', '602641.08', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(40, '2022-02-08 23:25:18', '2022-02-08 23:53:28', 'Richard', '', '27547785', '2', '94986', '2022-02-07', '2022-02-10', 2, '73.93', '803754.96', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(41, '2022-02-08 23:25:18', '2022-02-08 23:33:03', 'uzbeklar', '', '27438447', '1', '97215', '2022-01-28', '2022-01-28', 4, '35.45', '384167.28', '0.00', 'odilorg', 'Naqd', NULL, ''),
(42, '2022-02-08 23:25:19', '2022-02-15 01:29:29', 'Felix', '', '27102824', '2', '144341', '2022-01-17', '2022-01-18', 1, '40.00', '0.00', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(43, '2022-02-08 23:25:19', '2022-02-08 23:28:51', 'Академия- \"Samo\"', '', '27247476', '1', '144341', '2022-01-20', '2022-01-20', 2, '27.52', '298319.53', '0.00', 'odilorg', 'Naqd', NULL, ''),
(44, '2022-02-08 23:25:20', '2022-02-08 23:30:17', 'uzbeklar', '', '27314520', '2', '144341', '2022-01-23', '2022-01-23', 2, '22.94', '248838.21', '0.00', 'odilorg', 'Naqd', NULL, ''),
(45, '2022-02-08 23:25:20', '2022-02-08 23:33:59', 'MAriya - twin', '', '27391131', '2', '144341', '2022-01-28', '2022-01-28', 2, '32.34', '350464.59', '0.00', 'odilorg', 'Karta', NULL, ''),
(46, '2022-02-08 23:25:20', '2022-02-08 23:39:46', 'Andrei', 'Kentcis', '27382406', '2', '144341', '2022-01-29', '2022-01-31', 1, '82.44', '893247.43', '12.37', 'Booking.com', 'Naqd', NULL, ''),
(47, '2022-02-08 23:25:21', '2022-02-15 01:30:20', 'Felix', '', '27482463', '1', '144341', '2022-01-31', '2022-02-03', 1, '80.00', '0.00', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(48, '2022-02-08 23:25:21', '2022-02-08 23:45:08', 'Uzbeklar', '100 000 predoplata', '27503219', '2', '144341', '2022-02-04', '2022-02-05', 2, '46.16', '501406.89', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(49, '2022-02-08 23:25:22', '2022-02-15 06:40:33', 'Felix', '', '27628250', '2', '144341', '2022-02-07', '2022-02-08', 1, '60.00', '651841.20', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(50, '2022-02-08 23:25:22', '2022-02-15 01:27:56', 'Vladislav', 'Kaplan', '27637055', '1', '144341', '2022-02-09', '2022-02-11', 1, '85.41', '0.00', '12.88', 'Booking.com', 'Naqd', NULL, '1'),
(51, '2022-02-08 23:25:23', '2022-02-15 01:28:06', 'Mikhail', 'Filimonov', '27637056', '2', '144341', '2022-02-09', '2022-02-11', 1, '73.59', '0.00', '11.04', 'Booking.com', 'Naqd', NULL, '1'),
(52, '2022-02-08 23:25:23', '2022-02-08 23:30:45', 'Umid Obidakani ukasi', '280 000', '27399198', '1', '144342', '2022-01-27', '2022-01-27', 2, '25.70', '278102.87', '0.00', 'odilorg', 'Naqd', NULL, ''),
(53, '2022-02-08 23:25:24', '2022-02-08 23:39:06', 'Натали + 1Куколный театр', '', '27423923', '1', '144342', '2022-01-28', '2022-01-28', 2, '27.52', '298230.85', '0.00', 'odilorg', 'Naqd', NULL, ''),
(54, '2022-02-08 23:25:24', '2022-02-08 23:39:57', 'Andrei', 'Kentcis', '27382407', '1', '144342', '2022-01-29', '2022-01-31', 2, '109.92', '1190996.57', '16.49', 'Booking.com', 'Naqd', NULL, ''),
(55, '2022-02-08 23:25:25', '2022-02-08 23:43:40', 'Деменко Вячеслав Валерьевич', '3 февраля после 17-00 (приезжают поездом из Бухары)', '27326869', '1', '144342', '2022-02-03', '2022-02-04', 2, '73.93', '801079.67', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(56, NULL, NULL, 'Aleksei Shuvalov', NULL, '27385894', '1', '144341', '2022-01-27', '2022-01-29', 1, '64.50', '697000.00', '9.67', 'Booking.com', 'Karta', NULL, ''),
(57, NULL, NULL, 'Azat', 'Minigazimov', '27607799 ', '1', '144342', '2022-02-06', '2022-02-06', 1, '71.08', '772000.00', '10.65', 'Booking.com', 'Karta', NULL, '1'),
(58, '2022-02-09 05:01:24', '2022-02-09 05:01:24', 'Kristina', 'Panarina', '27361214', '1', '94986', '2022-02-08', '2022-02-10', 2, '72.08', '780000.00', '10.80', 'Booking.com', 'Naqd', NULL, '1'),
(67, '2022-02-15 01:15:05', '2022-02-16 01:54:23', 'Karen +1', '40$', '27593229', '2', '94982', '2022-02-14', '2022-02-15', 2, '80.00', '868572.80', '0.00', 'odilorg', 'Karta', NULL, '2'),
(69, '2022-02-15 01:15:06', '2022-02-20 05:32:11', 'Omid', 'Ava', '27812489', '1', '94982', '2022-02-15', '2022-02-16', 2, '94.76', '1030648.61', '14.21', 'Booking.com', 'Karta', NULL, '2'),
(70, '2022-02-15 01:15:06', '2022-02-15 01:31:21', 'Felix', '', '27787597', '3', '94984', '2022-02-14', '2022-02-16', 2, '60.00', '0.00', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(71, '2022-02-15 01:15:06', '2022-02-20 05:33:28', 'Enes', 'Altintac', '27721336', '1', '94986', '2022-02-15', '2022-02-16', 2, '71.60', '778750.96', '10.74', 'Booking.com', 'Karta', NULL, '2'),
(72, '2022-02-15 01:15:06', '2022-02-20 05:31:33', 'Elretha', 'Koch', '27616902', '1', '144341', '2022-02-15', '2022-02-16', 2, '67.22', '731112.28', '10.08', 'Booking.com', 'Karta', NULL, '2'),
(73, '2022-02-15 01:15:06', '2022-02-20 05:31:53', 'Paul', 'Livesey', '27617093', '2', '144341', '2022-02-15', '2022-02-16', 2, '74.70', '812467.83', '11.21', 'Booking.com', 'Karta', NULL, '2'),
(74, '2022-02-15 01:15:06', '2022-02-20 05:33:04', 'Mustafa', 'Alsharifi', '27768517', '1', '144342', '2022-02-14', '2022-02-15', 2, '94.76', '1030648.61', '14.21', 'Booking.com', 'Naqd', NULL, '2'),
(75, '2022-02-15 01:15:59', '2022-02-15 01:19:42', 'Сергей Венгер+1', '', '27682170', '1', '94986', '2022-02-10', '2022-02-10', 1, '38.00', '0.00', '0.00', 'odilorg', 'Naqd', NULL, '1'),
(77, '2022-02-15 01:16:15', '2022-02-15 01:16:15', 'Eldorni jorasi', '', '27776618', '3', '94984', '2022-02-12', '2022-02-12', 1, '31.75', '0.00', '0.00', 'odilorg', NULL, NULL, NULL),
(79, '2022-02-15 01:16:15', '2022-02-15 01:18:35', 'saleh', 'alamer', '27594411', '2', '94986', '2022-02-12', '2022-02-13', 1, '51.50', '0.00', '7.72', 'Booking.com', 'Karta', NULL, '1'),
(83, NULL, NULL, 'Anton', 'Vinohodov', '27661876', '1', '144342', '2022-02-08', '2022-02-09', 2, '47.36', '512000.00', '0.00', 'odilorg', 'Karta', NULL, '1'),
(84, '2022-02-20 05:29:13', '2022-02-20 05:29:13', 'Olga', 'Anisimova', '27527349', '1', '94982', '2022-02-20', '2022-02-20', 1, '33.17', '360770.52', '4.98', 'Booking.com', NULL, NULL, NULL),
(89, '2022-02-20 05:29:13', '2022-02-20 05:31:01', 'Rocio', 'Del Olmo Alvarez', '26503816', '2', '94982', '2022-02-19', '2022-02-20', 2, '94.76', '1030648.61', '14.21', 'Booking.com', 'Karta', NULL, '2'),
(90, '2022-02-20 05:29:13', '2022-02-20 05:31:16', 'Anton', 'Lukin', '27791041', '1', '97215', '2022-02-19', '2022-02-19', 3, '51.70', '562310.40', '7.75', 'Booking.com', 'Naqd', NULL, '2'),
(92, '2022-02-20 05:29:13', '2022-02-20 05:29:59', 'Академия- \"Samo\"', '', '26503817', '1', '144341', '2022-02-19', '2022-02-19', 1, '13.85', '150638.28', '0.00', 'odilorg', 'Naqd', NULL, '2'),
(93, '2022-02-20 05:29:13', '2022-02-20 05:29:13', 'Камышанская', 'Анна', '27719734', '1', '144342', '2022-02-19', '2022-02-20', 1, '37.91', '412324.70', '5.69', 'Booking.com', NULL, NULL, NULL),
(94, '2022-02-20 05:29:23', '2022-02-20 05:56:14', 'Bobir', '', '27843758', '2', '94986', '2022-02-16', '2022-02-17', 2, '27.70', '301276.56', '0.00', 'odilorg', 'Naqd', NULL, '2');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `restaurant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_date_time` datetime NOT NULL,
  `restaurant_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_info_restaurant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tourgroup_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `room_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `created_at`, `updated_at`, `room_name`, `room_id`, `room_number`, `unit_id`) VALUES
(1, NULL, NULL, 'Double Room', '94982', '14', '1'),
(2, NULL, NULL, 'Doble Room', '94982', '11', '2'),
(4, NULL, NULL, 'Twin Room', '94986', '7', '1'),
(5, NULL, NULL, 'Twin Room', '94986', '6', '2'),
(6, NULL, NULL, 'Twin Room', '94986', '2', '3'),
(7, NULL, NULL, 'Large Double Room', '94991', '5', '1'),
(8, NULL, NULL, 'Large Double Room', '94991', '3', '2'),
(9, NULL, NULL, 'Family Room', '97215', '15', '1'),
(10, NULL, NULL, 'Twin/DDouble Room', '144341', '10', '1'),
(11, NULL, NULL, 'Twin/DDouble Room', '144341', '13', '2'),
(12, NULL, NULL, 'Junior Suite', '144342', '12', '1'),
(13, NULL, NULL, 'Single Room by Entrance', '152726', '1', '1'),
(14, NULL, NULL, 'Single Room', '94984', '4', '1'),
(15, NULL, NULL, 'Single Room', '94984', '8', '2'),
(16, NULL, NULL, 'Single Room', '94984', '9', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tourgroup_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monument_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_date` date NOT NULL,
  `ticket_extra_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourgroups`
--

CREATE TABLE `tourgroups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tourgroup_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tourgroup_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tourgroup_pax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tourgroup_ci` date NOT NULL,
  `tourgroup_co` date NOT NULL,
  `tourgroup_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tourgroup_id` bigint(20) UNSIGNED NOT NULL,
  `transport_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auto_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_make` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_transport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_or_dropoff_or_marshrut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_or_dropoff_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_or_dropoff_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_or_dropoff_date_time` datetime NOT NULL,
  `train_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `train_ticket_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `air_ticket_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `profile_image`) VALUES
(1, 'od', 'od@od.com', NULL, '$2a$12$lBDtDAWJ9B8nJkY0TuIVgOBLsScSNAcq89A4QcKvjJU4G4zPZKfQC', NULL, NULL, '2022-02-20 06:15:33', 1, 'profile_image/h9gwiAj2RlLyO76HFQfQ0OPJjKxqy3ZHg2BBWEgD.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `firmas`
--
ALTER TABLE `firmas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelreservations`
--
ALTER TABLE `hotelreservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inkassas`
--
ALTER TABLE `inkassas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reservations_bookid_unique` (`bookId`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourgroups`
--
ALTER TABLE `tourgroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `firmas`
--
ALTER TABLE `firmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guides`
--
ALTER TABLE `guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotelreservations`
--
ALTER TABLE `hotelreservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inkassas`
--
ALTER TABLE `inkassas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourgroups`
--
ALTER TABLE `tourgroups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
