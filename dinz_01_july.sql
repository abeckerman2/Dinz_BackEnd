-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2021 at 10:36 AM
-- Server version: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.2.34-10+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinz_01_july`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'adminn@yopmail.com', '$2y$10$R8w7OwIzuCIvEzvD4OSURuC7em.rJz0VfEPkIVPih9Jj8dPSeb7qm', 'tstOfiHi8J839wsP4oLi4X0UJw33hJJeHKm67zsapK3IyokmCIvaYsaMuZUU', NULL, '2021-07-01 01:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Breakfast', '2021-06-30 09:49:03', '2021-06-30 09:49:03', NULL),
(2, 'Lunch', '2021-06-30 09:50:18', '2021-06-30 09:50:18', NULL),
(3, 'Dinner', '2021-06-30 09:50:45', '2021-06-30 09:50:45', NULL),
(4, 'Snacks', '2021-06-30 09:51:01', '2021-06-30 09:51:01', NULL),
(5, 'Beverages', '2021-06-30 09:51:19', '2021-06-30 09:51:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_type` enum('Veg','Non-Veg') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Veg',
  `price` double NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_available` int(11) NOT NULL DEFAULT '1' COMMENT '1=> available, 2=> Not Available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `restaurant_id`, `category_id`, `category_name`, `image`, `item_name`, `item_type`, `price`, `description`, `is_available`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 3, 'Dinner', '0630202111421060dc589256915.png', 'LOREAM LOREAM IPSUM LOREAM LOREAM LOREAM LOREAM LO', 'Veg', 100, 'jsdiohvadsfa', 2, '2021-06-30 06:12:10', '2021-06-30 23:08:03', '2021-06-30 23:08:03'),
(2, 3, 1, 'Breakfast', '0630202111441260dc590c3df19.png', 'LOREAM LOREAM IPSUM LOREAM LOREAM LOREAM LOREAM LO', 'Non-Veg', 100, 'jsdiohvadsfa', 1, '2021-06-30 06:14:12', '2021-07-01 23:19:09', NULL),
(3, 3, 3, 'Dinner', '0630202111523360dc5b018e4ed.png', 'sg', 'Non-Veg', 100, '61651651', 2, '2021-06-30 06:22:33', '2021-07-01 06:33:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2021_06_18_044910_create_users_table', 2),
(22, '2021_06_25_080805_create_restaurants', 3),
(23, '2021_06_25_082230_create_restaurant_images', 3),
(24, '2021_06_29_045926_create_restaurant_timings_table', 3),
(25, '2021_06_30_071337_create_categories_table', 4),
(29, '2021_06_30_071442_create_menus_table', 5),
(30, '2021_07_01_064944_create_admins_table', 6),
(31, '2021_07_01_074119_create_tables_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('143f5cbaa71229d203411e33e1fd27a6aa138607c4a5f4831433008a89a4206199167b50f45dde21', 1, 1, 'andrew', '[]', 1, '2021-06-18 00:25:23', '2021-06-18 00:25:23', '2022-06-18 05:55:23'),
('21e0cf607c3d9af81d0774c32bd8fa5ba65dac4a479da3dfe10221a72e5fceb57ac47df838d806ec', 2, 1, 'andrew', '[]', 0, '2021-06-30 23:32:16', '2021-06-30 23:32:16', '2022-07-01 05:02:16'),
('72191f819025b81dc476a7a4e048867d2eaa7c6c9a15d9c4052478976b205fbd52eb1b67c09315d8', 1, 1, 'andrew', '[]', 1, '2021-06-18 00:23:44', '2021-06-18 00:23:44', '2022-06-18 05:53:44'),
('79a942dc82dcb65dab3532c86c764d07f0219450818e543b8adc187de2c7476b46a8d4c81f66d414', 3, 1, 'andrew', '[]', 0, '2021-06-25 04:03:55', '2021-06-25 04:03:55', '2022-06-25 09:33:55'),
('93f255b9501dc8856f8e6c6927703d46017ca5653f6cb4bde6232fac63b6a66f1968059de477ea92', 1, 1, 'andrew', '[]', 0, '2021-06-18 00:46:08', '2021-06-18 00:46:08', '2022-06-18 06:16:08'),
('b96fe2b14107634c7518e124a19714cd4611852d46f45c3b835c1e209e75d24efd9c4f78ab56b867', 2, 1, 'andrew', '[]', 1, '2021-06-18 00:59:33', '2021-06-18 00:59:33', '2022-06-18 06:29:33'),
('baa2c5e9cdd083fc5122907ad49849d5f1d7e2376df0d85a1e766be88401356cc1e025a9f0cef53d', 3, 1, 'andrew', '[]', 1, '2021-06-25 04:03:19', '2021-06-25 04:03:19', '2022-06-25 09:33:19'),
('bdbc5fcb19d9b8fda5cad1b272b55ca785d9853dbc9c306a664f75b5b6af349453b23f695dca60b9', 2, 1, 'andrew', '[]', 1, '2021-06-29 04:46:51', '2021-06-29 04:46:51', '2022-06-29 10:16:51'),
('d9c757ea8378332f2adc2bd8e558a99c0019a741ec9d30e376e7f91914f7bc1f726e5dd326c03d88', 1, 1, 'andrew', '[]', 1, '2021-06-18 00:19:51', '2021-06-18 00:19:51', '2022-06-18 05:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'TeOrKjkCZ7xDKEZTMklwabigbTg8SJUUtUJAJaEs', 'http://localhost', 1, 0, 0, '2021-06-17 22:40:44', '2021-06-17 22:40:44'),
(2, NULL, 'Laravel Password Grant Client', '5ll1BVdhUnlyRakq5EWmJfUyZiR3AG6Nuq2uyCw2', 'http://localhost', 0, 1, 0, '2021-06-17 22:40:44', '2021-06-17 22:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-06-17 22:40:44', '2021-06-17 22:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('checks@yopmail.com', 'xC0BxIXxwU7Ld0Zm', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `qr_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `first_name`, `last_name`, `restaurant_name`, `owner_name`, `restaurant_logo`, `restaurant_address`, `city`, `lat`, `lon`, `email`, `country_code`, `phone_number`, `password`, `is_approved`, `qr_code`, `description`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'ko', 'ko', 'kl', 'kl', '0629202110354960daf785142e2.png', 'Mohali, Punjab, India', 'hf', '30.7046486', '76.71787259999999', 'gd@yopmail.com', '+1', '4561561651', '$2y$10$FQwVC4pIj1eOU7Z1myK6Keenw5nWH9M.7z3xRB.FH50G5toGECSwq', 0, '0629202110354960daf78516ca9.png', NULL, NULL, NULL, '2021-06-29 05:05:49', '2021-06-29 05:05:49'),
(3, 'sf', 'asf', 'asf', 'asgasg', '0629202112255360db115130399.png', 'Monterrey, Nuevo Leon, Mexico', 'asgasg', '25.6866142', '-100.3161126', 'abc@yopmail.com', '+1', '1516511161', '$2y$10$LcTCFN.XsUDPVwUHqVq/6O7Q4o8..RjPNhk.T1SlQKrDIRNaoOjmO', 0, '0629202112255360db1151312ca.png', 'N/A', 'ZBIWM2V2dzgqRJmDkQhjelN8NsmtJMDSGlqoyGTF4fJET7ZRJYWLxaLfftEL', NULL, '2021-06-29 06:55:53', '2021-07-01 23:34:55'),
(4, 'Taran', 'Singh', '23423', '2342', '0701202108084660dd780e72d27.png', 'Mohali, Punjab, India', '2342', '30.7046486', '76.71787259999999', 'adminn11@yopmail.com', '+1', '9988775525', '$2y$10$Z4oKENXIvw6RxtSeSI.EBuEMd6FRd8qbFcuRVmib/9TjB024q1hbG', 0, '0701202108084660dd780e72e42.png', NULL, NULL, NULL, '2021-07-01 02:38:46', '2021-07-01 02:38:46'),
(5, 'kl', 'kl', 'klj', 'jklj', '0701202112064360ddafd3cb9d3.png', 'Los Angeles, CA, USA', 'jkashfjkas', '34.0522342', '-118.2436849', 'lop@yopmail.com', '+1', '165165116161654', '$2y$10$mrsmMHiCClX4K7JMMT2GpOWL33sGxqsqDDIwR5pfYCGyVO0jyBffu', 0, '0701202112064360ddafd3cba33.png', 'sdgsdgsdsdgsdgsdg', NULL, NULL, '2021-07-01 06:36:43', '2021-07-01 06:36:43'),
(6, 'jhk', 'jhklhklh', 'klhkl', 'hhklh', '0701202112084560ddb04d3950e.png', 'San Francisco, CA, USA', 'dfg', '37.7749295', '-122.4194155', 'opopo@yopmail.com', '+1', '65165654654', '$2y$10$4yn2lehSfSQTjqA4W3VQZuR7MJ3krHJP9AGQHkL.nw3LUqb3eI1XC', 0, '0701202112084560ddb04d39590.png', 'fasfasf', '88C6SCmsjSOeooB91GTlCQTMbneI2d3qsENl1Tf8dgotNNaVqxYJ5SeStAkT', NULL, '2021-07-01 06:38:45', '2021-07-01 06:38:52'),
(7, 'checkcheckcheckcheckcheckcheckcheckcheckcheckcheck', 'checkcheckcheckcheckcheckcheckcheckcheckcheckcheck', 'checheckcheckcheckcheckcheckcheckcheckcheckcheckch', 'checkcheckcheckcheckcheckcheckcheckcheckcheckcheck', '0702202104135660de9284eb963.png', 'Mohali, Punjab, India', 'Ludhiana', '30.7046486', '76.71787259999999', 'checks@yopmail.com', '+1', '844545454545454', '$2y$10$Z7mjmZqFna03XuYkD.TLDelmHC6L2q8VIvkvz4Q0sgGQjv8BjNjt2', 0, '0702202104135660de9284eb9b1.png', 'vvcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckcheckche', 'hJSgEQ4yM6QaiwdZf9PrtL7VBlCFuEh6JoLxxHN2wPhuz1u3xvtZcl1tQAOH', NULL, '2021-07-01 22:43:56', '2021-07-01 22:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_images`
--

CREATE TABLE `restaurant_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `restaurant_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_images`
--

INSERT INTO `restaurant_images` (`id`, `restaurant_id`, `restaurant_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, '0629202110354960daf78512618.png', '2021-06-29 05:05:49', '2021-06-29 05:05:49', NULL),
(3, 3, '0629202112255360db11512e8cf.png', '2021-06-29 06:55:53', '2021-06-29 06:55:53', NULL),
(4, 3, '60dd59f4ae01b_logo1.png', '2021-07-01 00:30:20', '2021-07-01 00:30:20', NULL),
(5, 3, '60dd59f4c47de_logo.png', '2021-07-01 00:30:20', '2021-07-01 00:30:20', NULL),
(6, 3, '60dd59f4d95d0_dummy_pdf.png', '2021-07-01 00:30:20', '2021-07-01 00:30:20', NULL),
(7, 3, '60dd5a148c25a_logo1.png', '2021-07-01 00:30:52', '2021-07-01 00:30:52', NULL),
(8, 4, '0701202108084660dd780e72ba4.png', '2021-07-01 02:38:46', '2021-07-01 02:38:46', NULL),
(9, 5, '0701202112064360ddafd3cb8f4.png', '2021-07-01 06:36:43', '2021-07-01 06:36:43', NULL),
(10, 6, '0701202112084560ddb04d393f0.png', '2021-07-01 06:38:45', '2021-07-01 06:38:45', NULL),
(11, 7, '0702202104135660de9284eb5fc.png', '2021-07-01 22:43:57', '2021-07-01 22:43:57', NULL),
(12, 7, '0702202104135660de9284eb7b9.png', '2021-07-01 22:43:57', '2021-07-01 22:43:57', NULL),
(13, 7, '0702202104135660de9284eb81c.PNG', '2021-07-01 22:43:57', '2021-07-01 22:43:57', NULL),
(14, 7, '0702202104135660de9284eb89c.png', '2021-07-01 22:43:57', '2021-07-01 22:43:57', NULL),
(15, 7, '0702202104135660de9284eb8ee.PNG', '2021-07-01 22:43:57', '2021-07-01 22:43:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_timings`
--

CREATE TABLE `restaurant_timings` (
  `id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `open_status` int(11) NOT NULL DEFAULT '1',
  `close_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_timings`
--

INSERT INTO `restaurant_timings` (`id`, `restaurant_id`, `day`, `open_time`, `close_time`, `open_status`, `close_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 2, 'Sunday', '08:00:00', '20:00:00', 1, 0, '2021-06-29 05:05:49', '2021-06-29 05:05:49', NULL),
(9, 2, 'Monday', '08:00:00', '20:00:00', 1, 0, '2021-06-29 05:05:49', '2021-06-29 05:05:49', NULL),
(10, 2, 'Tuesday', '08:00:00', '20:00:00', 1, 0, '2021-06-29 05:05:49', '2021-06-29 05:05:49', NULL),
(11, 2, 'Wednesday', '08:00:00', '20:00:00', 1, 0, '2021-06-29 05:05:50', '2021-06-29 05:05:50', NULL),
(12, 2, 'Thursday', '08:00:00', '20:00:00', 1, 0, '2021-06-29 05:05:50', '2021-06-29 05:05:50', NULL),
(13, 2, 'Friday', '08:00:00', '20:00:00', 1, 0, '2021-06-29 05:05:50', '2021-06-29 05:05:50', NULL),
(14, 2, 'Saturday', '08:00:00', '20:00:00', 1, 0, '2021-06-29 05:05:50', '2021-06-29 05:05:50', NULL),
(15, 3, 'Sunday', '08:00:00', '20:00:00', 1, 0, '2021-06-29 06:55:53', '2021-06-29 06:55:53', NULL),
(16, 3, 'Monday', '08:00:00', '20:00:00', 1, 0, '2021-06-29 06:55:53', '2021-06-29 06:55:53', NULL),
(17, 3, 'Tuesday', '08:00:00', '20:00:00', 1, 0, '2021-06-29 06:55:53', '2021-06-29 06:55:53', NULL),
(18, 3, 'Wednesday', '08:00:00', '20:00:00', 1, 0, '2021-06-29 06:55:53', '2021-06-29 06:55:53', NULL),
(19, 3, 'Thursday', '08:00:00', '20:00:00', 1, 0, '2021-06-29 06:55:53', '2021-06-29 06:55:53', NULL),
(20, 3, 'Friday', '08:00:00', '20:00:00', 1, 0, '2021-06-29 06:55:53', '2021-06-29 06:55:53', NULL),
(21, 3, 'Saturday', '08:00:00', '20:00:00', 1, 0, '2021-06-29 06:55:53', '2021-06-29 06:55:53', NULL),
(22, 4, 'Sunday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 02:38:46', '2021-07-01 02:38:46', NULL),
(23, 4, 'Monday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 02:38:46', '2021-07-01 02:38:46', NULL),
(24, 4, 'Tuesday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 02:38:46', '2021-07-01 02:38:46', NULL),
(25, 4, 'Wednesday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 02:38:46', '2021-07-01 02:38:46', NULL),
(26, 4, 'Thursday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 02:38:46', '2021-07-01 02:38:46', NULL),
(27, 4, 'Friday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 02:38:46', '2021-07-01 02:38:46', NULL),
(28, 4, 'Saturday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 02:38:46', '2021-07-01 02:38:46', NULL),
(29, 5, 'Sunday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 06:36:44', '2021-07-01 06:36:44', NULL),
(30, 5, 'Monday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 06:36:44', '2021-07-01 06:36:44', NULL),
(31, 5, 'Tuesday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 06:36:44', '2021-07-01 06:36:44', NULL),
(32, 5, 'Wednesday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 06:36:44', '2021-07-01 06:36:44', NULL),
(33, 5, 'Thursday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 06:36:44', '2021-07-01 06:36:44', NULL),
(34, 5, 'Friday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 06:36:44', '2021-07-01 06:36:44', NULL),
(35, 5, 'Saturday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 06:36:44', '2021-07-01 06:36:44', NULL),
(36, 6, 'Sunday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 06:38:45', '2021-07-01 06:38:45', NULL),
(37, 6, 'Monday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 06:38:45', '2021-07-01 06:38:45', NULL),
(38, 6, 'Tuesday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 06:38:45', '2021-07-01 06:38:45', NULL),
(39, 6, 'Wednesday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 06:38:45', '2021-07-01 06:38:45', NULL),
(40, 6, 'Thursday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 06:38:45', '2021-07-01 06:38:45', NULL),
(41, 6, 'Friday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 06:38:45', '2021-07-01 06:38:45', NULL),
(42, 6, 'Saturday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 06:38:45', '2021-07-01 06:38:45', NULL),
(43, 7, 'Sunday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 22:43:57', '2021-07-01 22:43:57', NULL),
(44, 7, 'Monday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 22:43:57', '2021-07-01 22:43:57', NULL),
(45, 7, 'Tuesday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 22:43:57', '2021-07-01 22:43:57', NULL),
(46, 7, 'Wednesday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 22:43:57', '2021-07-01 22:43:57', NULL),
(47, 7, 'Thursday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 22:43:57', '2021-07-01 22:43:57', NULL),
(48, 7, 'Friday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 22:43:57', '2021-07-01 22:43:57', NULL),
(49, 7, 'Saturday', '08:00:00', '20:00:00', 1, 0, '2021-07-01 22:43:57', '2021-07-01 22:43:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `table_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_occupied` int(11) NOT NULL DEFAULT '1' COMMENT '1=>available, 2=> not available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `restaurant_id`, `table_id`, `table_name`, `qr_code`, `is_occupied`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 3, 'RZIw_6309_pdJV', 'Abc', '0701202111222860dda57456dfe.png', 1, '2021-07-01 05:52:28', '2021-07-01 06:02:21', NULL),
(6, 3, '7xN6_7852_pIBR', 'HU', '0701202111223660dda57cb043a.png', 1, '2021-07-01 05:52:36', '2021-07-01 06:02:16', NULL),
(7, 3, 'oXV4_2172_K2t4', 'Loream Ipsum Loream Ipsum Loream Ipsum Loream Ipsu', '0702202104512560de9b4d541c6.png', 1, '2021-07-01 23:21:25', '2021-07-01 23:21:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_type` enum('None','Ios','Android') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `device_token` text COLLATE utf8mb4_unicode_ci,
  `reset_password_token` longtext COLLATE utf8mb4_unicode_ci,
  `verify_email_token` longtext COLLATE utf8mb4_unicode_ci,
  `is_block` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 => Unblocked 1 => Blocked',
  `is_verify` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 => Not Verify, 1 => Verify',
  `refresh_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `image`, `device_type`, `device_token`, `reset_password_token`, `verify_email_token`, `is_block`, `is_verify`, `refresh_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'nn', 'iohjion', 'ko@yopmail.com', '$2y$10$i0H6fmuZSQZeBfbSatmqVe2.VqnZbAyX8SI3hmupd10nJatK9W0o6', NULL, 'Ios', 'dvsnifhdsjdgh', NULL, NULL, '0', '1', NULL, NULL, '2021-06-18 00:19:50', '2021-06-18 00:45:46', NULL),
(2, 'aman', 'verma', 'aman@yopmail.com', '$2y$10$SpuHo08xpRiVJusSsruRJeLlj/kZYt0uVHSiaAtzT2O0MAMkuBIqe', '0618202106292660cc3d46d805f.jpg', 'Ios', 'dvsnifhdsjdgh', NULL, 'mrbSkdbVhZcpApnc1rUwwPA7PGZegUDhH1sZ9pFdrRAZJLrDDsUFzUXIzCLGc35t', '0', '1', NULL, NULL, '2021-06-18 00:59:32', '2021-06-29 04:46:49', NULL),
(3, 'new', 'new', 'new@yopmail.com', '$2y$10$zW7UccD/gcv84LgT/t0JF.vIVu4Q4fz9YvH/DeQghT.y/0452vcbe', NULL, 'Ios', 'hsdfgjhsdkfhdskhf', NULL, NULL, '0', '1', NULL, NULL, '2021-06-25 04:03:18', '2021-06-25 04:03:55', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `menus_category_id_foreign` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_images`
--
ALTER TABLE `restaurant_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_images_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `restaurant_timings`
--
ALTER TABLE `restaurant_timings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_timings_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tables_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `restaurant_images`
--
ALTER TABLE `restaurant_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `restaurant_timings`
--
ALTER TABLE `restaurant_timings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menus_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurant_images`
--
ALTER TABLE `restaurant_images`
  ADD CONSTRAINT `restaurant_images_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurant_timings`
--
ALTER TABLE `restaurant_timings`
  ADD CONSTRAINT `restaurant_timings_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
