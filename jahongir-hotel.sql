-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 03:30 PM
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
(23, '2022_01_29_164205_create_rooms_table', 1);

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
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `guestFirstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guestName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstNight` date DEFAULT NULL,
  `lastNight` date DEFAULT NULL,
  `numAdult` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `commission` decimal(10,2) DEFAULT NULL,
  `referer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_uzs` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `created_at`, `updated_at`, `guestFirstName`, `guestName`, `bookId`, `roomId`, `unitId`, `firstNight`, `lastNight`, `numAdult`, `price`, `commission`, `referer`, `payment_method`, `company_name`, `price_uzs`) VALUES
(45, '2022-01-31 02:54:20', '2022-01-31 02:54:20', 'Felix', '', '27330598', '94982', '2', '2022-01-24', '2022-01-26', 1, '60.00', '0.00', 'odilorg', NULL, NULL, '653773.23'),
(46, '2022-01-31 02:54:20', '2022-01-31 02:54:20', 'Senol+1', '', '27406776', '94982', '2', '2022-01-29', '2022-01-29', 2, '36.70', '0.00', 'odilorg', NULL, NULL, '399850.96'),
(47, '2022-01-31 02:54:21', '2022-01-31 02:54:21', 'DARIA', 'MOTAKOVA', '27117983', '94982', '2', '2022-01-31', '2022-02-02', 2, '111.00', '16.65', 'Booking.com', NULL, NULL, '1206743.82'),
(48, '2022-01-31 02:54:21', '2022-01-31 08:24:09', 'Alimbayev', '', '27345636', '94984', '2', '2022-01-25', '2022-01-27', 1, '41.28', '0.00', 'odilorg', 'Naqd', NULL, '449924.67'),
(49, '2022-01-31 02:54:22', '2022-01-31 08:24:32', 'Otabek', '', '27424628', '94984', '2', '2022-01-28', '2022-01-28', 1, '13.76', '0.00', 'odilorg', 'Naqd', NULL, '149941.02'),
(50, '2022-01-31 02:54:22', '2022-01-31 08:31:29', 'Turk', '', '27438454', '94984', '3', '2022-01-28', '2022-01-28', 1, '9.17', '0.00', 'odilorg', 'Naqd', NULL, '99924.36'),
(51, '2022-01-31 02:54:23', '2022-01-31 08:22:52', 'Bobur', '', '27175908', '94986', '1', '2022-01-17', '2022-01-18', 1, '36.70', '0.00', 'odilorg', 'Naqd', NULL, '400606.13'),
(52, '2022-01-31 02:54:24', '2022-01-31 08:23:19', 'Richard', '200 000', '27139769', '94986', '2', '2022-01-17', '2022-01-20', 1, '73.40', '0.00', 'odilorg', 'Naqd', NULL, '801212.26'),
(53, '2022-01-31 02:54:24', '2022-01-31 08:31:13', 'daria', 'sarycheva', '25634362', '94986', '2', '2022-01-28', '2022-01-28', 2, '34.99', '5.25', 'Booking.com', 'Karta', NULL, '381281.72'),
(54, '2022-01-31 02:54:25', '2022-01-31 08:25:03', 'uzbeklar', '', '27438444', '94986', '1', '2022-01-28', '2022-01-28', 2, '20.00', '0.00', 'odilorg', 'Naqd', NULL, '217937.53'),
(55, '2022-01-31 02:54:25', '2022-01-31 08:29:38', 'uzbeklar', '', '27438447', '97215', '1', '2022-01-28', '2022-01-28', 4, '35.14', '0.00', 'odilorg', 'Naqd', NULL, '382916.25'),
(56, '2022-01-31 02:54:25', '2022-01-31 02:54:25', 'Felix', '', '27102824', '144341', '2', '2022-01-17', '2022-01-18', 1, '60.00', '0.00', 'odilorg', NULL, NULL, '654941.90'),
(57, '2022-01-31 02:54:26', '2022-01-31 08:22:27', 'Академия- \"Samo\"', '', '27247476', '144341', '1', '2022-01-20', '2022-01-20', 2, '27.52', '0.00', 'odilorg', 'Naqd', NULL, '299970.73'),
(58, '2022-01-31 02:54:26', '2022-01-31 08:23:37', 'uzbeklar', '', '27314520', '144341', '2', '2022-01-23', '2022-01-23', 2, '22.94', '0.00', 'odilorg', 'Naqd', NULL, '250214.61'),
(59, '2022-01-31 02:54:27', '2022-01-31 08:30:41', 'MAriya - twin', '', '27391131', '144341', '2', '2022-01-28', '2022-01-28', 2, '32.16', '0.00', 'odilorg', 'Karta', NULL, '350443.55'),
(60, '2022-01-31 02:54:27', '2022-01-31 02:54:27', 'Andrei', 'Kentcis', '27382406', '144341', '2', '2022-01-29', '2022-01-31', 1, '82.44', '12.37', 'Booking.com', NULL, NULL, '898193.83'),
(61, '2022-01-31 02:54:28', '2022-01-31 08:23:49', 'Umid Obidakani ukasi', '280 000', '27399198', '144342', '1', '2022-01-27', '2022-01-27', 2, '25.70', '0.00', 'odilorg', 'Naqd', NULL, '279644.87'),
(62, '2022-01-31 02:54:28', '2022-01-31 02:54:28', 'Натали + 1Куколный театр', '', '27423923', '144342', '1', '2022-01-28', '2022-01-28', 2, '27.52', '0.00', 'odilorg', NULL, NULL, '299882.05'),
(63, '2022-01-31 02:54:29', '2022-01-31 02:54:29', 'Andrei', 'Kentcis', '27382407', '144342', '1', '2022-01-29', '2022-01-31', 2, '109.92', '16.49', 'Booking.com', NULL, NULL, '1197591.77'),
(64, '2022-01-31 08:46:26', '2022-01-31 08:46:26', 'Aleksei', 'Shuvaev', '27385894', '94986', '1', '2022-01-27', '2022-01-29', 1, '64.50', '9.68', 'Booking', 'Karta', NULL, '701832.45');

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
(1, 'od', 'od@od.com', NULL, '$2a$12$lBDtDAWJ9B8nJkY0TuIVgOBLsScSNAcq89A4QcKvjJU4G4zPZKfQC', NULL, NULL, NULL, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
