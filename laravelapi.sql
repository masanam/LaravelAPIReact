-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 08:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PT.ABC', 'jl.123', '021', '2021-10-19 05:45:53', NULL, NULL),
(2, 'PT.BCDE', 'jl.1234', '021', '2021-10-19 05:45:53', NULL, NULL),
(3, 'PT.987654', 'jl.123', '021', '2021-10-19 05:45:53', NULL, NULL),
(4, 'PT.WWWW', 'jl.1234', '021', '2021-10-19 05:45:53', NULL, NULL),
(5, 'PT. masanam 123', 'jl. raya masanamyahoo.com', '08121234444', '2021-10-21 23:21:39', '2021-10-21 23:21:39', NULL),
(8, 'ASSS', 'dddd', 'ffff', '2021-10-21 23:42:33', '2021-10-21 23:42:33', NULL),
(9, 'ytre', 'erty', '4321', '2021-10-21 23:43:08', '2021-10-21 23:43:08', NULL);

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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `company_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(5, 7, 4, '2021-10-21 23:10:22', '2021-10-21 23:10:22', NULL),
(6, 7, 2, '2021-10-21 23:14:32', '2021-10-21 23:16:55', '2021-10-21 23:16:55'),
(7, 7, 3, '2021-10-21 23:32:56', '2021-10-21 23:33:01', '2021-10-21 23:33:01'),
(8, 7, 9, '2021-10-21 23:48:00', '2021-10-21 23:48:05', '2021-10-21 23:48:05');

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
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(7, '2016_06_01_000004_create_oauth_clients_table', 2),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('2c884ca78cfd2928c6099514db741ffe237b1e0ca7389308d3dd1e8e6e8d130c8ce0349e5537fb8f', 7, 1, 'authToken', '[]', 1, '2021-10-21 02:13:41', '2021-10-21 02:13:41', '2022-10-21 09:13:41'),
('2edae161410ce8e8ab7e0da0087e65dccf21b2e8fba554960a57c084e31f41afec6edac9095fa587', 7, 1, 'authToken', '[]', 0, '2021-10-21 22:30:58', '2021-10-21 22:30:58', '2022-10-22 05:30:58'),
('50559052679a38629f4f6e29c8b9bbd8934191f13ec75b5ef3cd262f57b262798cbb2fa4d73887d9', 7, 1, 'authToken', '[]', 0, '2021-10-21 02:03:54', '2021-10-21 02:03:54', '2022-10-21 09:03:54'),
('5a15bf839c807b11eae2bcfb27b5716769f42d0e3cd81bdf5a537175a89f214f59650eeb94d21753', 7, 1, 'authToken', '[]', 1, '2021-10-21 02:20:25', '2021-10-21 02:20:25', '2022-10-21 09:20:25'),
('5f0342e79103333ab498b301ecfe8d96cc3633991762fea7fbfc016d7819060da2377ba21153a27b', 6, 1, 'authToken', '[]', 0, '2021-10-21 02:24:23', '2021-10-21 02:24:23', '2022-10-21 09:24:23'),
('6f4076cd9b99ab37c41c4590e5704d026f236b8a5d67158710ea08003349a4c1bd3428e20aa9dcb4', 6, 1, 'authToken', '[]', 0, '2021-10-20 21:16:05', '2021-10-20 21:16:05', '2022-10-21 04:16:05'),
('70654a52fa14c7ca214fee1043b789c79fcb2d43d529ed4c2529ac9ec74c9b29f09a9d042bfb2f9e', 7, 1, 'authToken', '[]', 1, '2021-10-21 02:20:45', '2021-10-21 02:20:45', '2022-10-21 09:20:45'),
('723ef7268f9744c7a16152df2f591ab6ea6907788cb12d5b1ebf876edf45a46c5d183bbb668dbb3b', 7, 1, 'authToken', '[]', 0, '2021-10-21 21:20:57', '2021-10-21 21:20:57', '2022-10-22 04:20:57'),
('73ddd95a7ac600a92bdb178008bcca3e77800ffb507c905f37b9a74554feb4eb6dcc2e6c006a6b3e', 7, 1, 'authToken', '[]', 0, '2021-10-21 02:06:20', '2021-10-21 02:06:20', '2022-10-21 09:06:20'),
('88b4f63e42f0f2b54338527de00c58945ec75b996f74621be10ab8f4871f1a3fe5066010cf1ed666', 6, 1, 'authToken', '[]', 0, '2021-10-20 23:54:57', '2021-10-20 23:54:57', '2022-10-21 06:54:57'),
('8d87b28c8e317f8cc07023b47f4385f5ca6064676ddfaa075ce8c6e751c25289cc7f762f62ff3888', 7, 1, 'authToken', '[]', 0, '2021-10-21 02:25:55', '2021-10-21 02:25:55', '2022-10-21 09:25:55'),
('94beeb598bc570cfe986df76b6c002d4076a52d53a365ace8025b58f40036ae2460643a47fa3282e', 7, 1, 'authToken', '[]', 1, '2021-10-21 20:07:41', '2021-10-21 20:07:41', '2022-10-22 03:07:41'),
('9776d10a07977107d5d525344994505df92afec6047fc864668e845fb755b9ee02ce41b9e6ada098', 6, 1, 'authToken', '[]', 0, '2021-10-21 19:28:33', '2021-10-21 19:28:33', '2022-10-22 02:28:33'),
('a7200f0ee9aea89cf43b247d41c0809bc9445f7e3ccb55398c7f926037e02461fc7653e866625a75', 7, 1, 'authToken', '[]', 0, '2021-10-21 02:07:14', '2021-10-21 02:07:14', '2022-10-21 09:07:14'),
('b952d078561d9036cb896286815c1f1b121b91bb94f8d52e750e410b9108dccfe0b66a4fe13245ea', 7, 1, 'authToken', '[]', 0, '2021-10-21 23:47:51', '2021-10-21 23:47:51', '2022-10-22 06:47:51'),
('c00a2011a03d006eff51db361e5f18d4f8588709abe77b26f72cddfe1add227c9a8a638e9c5ea2d1', 7, 1, 'authToken', '[]', 0, '2021-10-21 02:32:54', '2021-10-21 02:32:54', '2022-10-21 09:32:54'),
('e4d6ce2bfb5a80292cb4ecbddc56512ef8cf406bb1d0404b5ba1eb2b6e1a97959a8485ddae112a1d', 6, 1, 'authToken', '[]', 0, '2021-10-21 02:24:29', '2021-10-21 02:24:29', '2022-10-21 09:24:29'),
('e65ede530a2c3f1fb3c0a683b4cb5269e994baa261e78791d466b52795699cd964d2a99a48cae801', 7, 1, 'authToken', '[]', 0, '2021-10-21 20:54:29', '2021-10-21 20:54:29', '2022-10-22 03:54:29'),
('f4f14c0958fe1270b82a8ac312060a26d8738b638f08788ef7253fed18d9c7f88307375aa906e321', 7, 1, 'authToken', '[]', 1, '2021-10-21 02:19:46', '2021-10-21 02:19:46', '2022-10-21 09:19:46'),
('ff82484649c2a5e3a3b877194c89200d75486c6681459aca0f5a3b072e7714f527a91c3f7099d046', 7, 1, 'authToken', '[]', 0, '2021-10-21 19:44:19', '2021-10-21 19:44:19', '2022-10-22 02:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'n3k19bOXAgwMKXRY3k6pqtQ3iFdWnLLVPT8w77fj', NULL, 'http://localhost', 1, 0, 0, '2021-10-20 20:35:18', '2021-10-20 20:35:18'),
(2, NULL, 'Laravel Password Grant Client', '9UV3bEQNurCBLLBXYxaRxknTmsWbUBJgp6pNbMkn', 'users', 'http://localhost', 0, 1, 0, '2021-10-20 20:35:18', '2021-10-20 20:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-10-20 20:35:18', '2021-10-20 20:35:18');

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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'masanam', 'admin@admin.com', NULL, '$2y$10$Du/INrpeAZ.V0QCSZfRmneDacIgM9/NIAKUOBB/ipKLFanGqxh0GG', NULL, NULL, '2021-10-18 22:08:27', '2021-10-18 22:08:27', NULL),
(5, 'masanam', 'masanam@gmail.com', NULL, '$2y$10$Xrk2DHsyKHsEVfQEcZacw.161d.Pn0TkLa.btcn0zumqsFnwcKm..', NULL, NULL, '2021-10-18 22:17:17', '2021-10-18 22:17:17', NULL),
(6, 'masanam123', 'masanam@yahoo.com', NULL, '$2y$10$L3/WR55vf/6T.iGxH.l3aunzqw85Q1L/5odMp5VMCURkSVNCd8YBK', NULL, NULL, '2021-10-20 21:14:53', '2021-10-20 21:14:53', NULL),
(7, 'joni', 'choirul@pedulisehat.id', NULL, '$2y$10$llhyOr9kUsVq/FagcCh6DuEni7LNgdpXLEyew5hQVD.mau0VQCGMK', NULL, NULL, '2021-10-21 02:02:01', '2021-10-21 02:02:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
