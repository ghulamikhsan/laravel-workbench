-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 12:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workbenchlaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kendala` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `kegiatan`, `kendala`, `created_at`, `updated_at`, `user_id`, `status_id`) VALUES
(20, 'kasbdjsav', 'sdfsdjbs sfs', '2020-09-14 20:40:51', '2020-09-14 20:40:51', 4, 1),
(21, 'kasbdjsav', 'sdfsdjbs', '2020-09-14 21:04:35', '2020-09-14 21:04:35', 4, 1),
(28, 'kasbdjsav', 'sdfsdjbs', '2020-09-17 19:55:00', '2020-09-17 19:55:00', 5, 1),
(33, 'n vknv', 'ldfdl', '2020-09-20 19:53:49', '2020-09-20 19:53:49', 5, 2),
(34, 'sad', 'dfd', '2020-09-21 00:01:45', '2020-09-21 00:01:45', 3, 2),
(36, 'bikin indomie beneran nn', 'hhh', '2020-09-21 01:17:58', '2020-09-21 01:17:58', 5, 2),
(37, 'bikin indomie beneran', 'seperti iron men', '2020-09-21 08:27:57', '2020-09-21 08:27:57', 5, 1),
(40, 'kasbdjsav', 'sdfsdjbs', '2020-09-21 08:32:07', '2020-09-21 08:32:07', 5, 3),
(42, 'gggg', 'tidak ada', '2020-09-21 09:43:14', '2020-09-21 09:43:14', 22, 3),
(43, 'dkfd', 'kurang -', '2020-09-21 20:20:11', '2020-09-21 20:20:11', 4, 2),
(44, 'asdsdf', 'fgfdga', '2020-09-22 02:39:30', '2020-09-22 02:39:30', 5, 3);

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_09_08_063738_create_users_table', 1),
(4, '2020_09_09_033107_create_jobs_table', 2),
(5, '2020_09_09_074522_create_jobs_table', 3),
(6, '2020_09_09_074523_add_google_id_column', 4),
(7, '2020_09_09_074524_add_column_to_table_users', 4),
(8, '2020_09_18_033127_add_username_column', 5),
(9, '2020_09_18_034320_add_username_column', 6),
(10, '2020_09_22_032426_create_teams_table', 7),
(11, '2020_09_22_033157_create_teams_table', 8),
(12, '2020_09_22_033245_create_teams_table', 9),
(13, '2020_09_22_033600_create_teams_table', 10),
(14, '2020_09_22_043233_create_teams_table', 11),
(15, '2020_09_22_062428_create_teams_table', 12),
(16, '2020_09_22_062528_create_teams_table', 13);

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
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(2, 'batal'),
(3, 'ditunda'),
(4, 'proses'),
(1, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_tugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_team` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`, `phone`, `address`, `avatar`, `username`) VALUES
(3, 'Admin', 'admin@admin.com', NULL, 1, '$2y$10$UxU1tDsWEEWkiPSy9Jb95.wr8kwvQbkBve0xohrlBVo9ax7j7/Oae', NULL, '2020-09-07 23:41:03', '2020-09-07 23:41:03', NULL, NULL, NULL, NULL, ''),
(4, 'User', 'user@user.com', NULL, 0, '$2y$10$uzgKAZki/RfI8vzbfoIquONxUi1wTRZSedalTxNrxylHQNIipvK4q', NULL, '2020-09-07 23:41:03', '2020-09-07 23:41:03', NULL, NULL, NULL, NULL, ''),
(5, 'ghulamnn', 'ghulamikhsan17@gmail.com', NULL, NULL, '$2y$10$c5cXWoeAx8pp9x3Oyx2TduIflhUTz7Bev12TWSYXansslwXmg7PJO', NULL, '2020-09-08 00:04:00', '2020-09-08 00:04:00', NULL, NULL, NULL, NULL, ''),
(12, 'Ghulam Ikhsan', 'ghulamikhsan@gmail.com', NULL, NULL, '1c3a9afc9f494f096101eace83074003', NULL, '2020-09-16 21:24:37', '2020-09-16 21:24:37', '114615885992503060177', NULL, NULL, NULL, ''),
(13, 'akabrzz', 'akbariz@mail.com', NULL, NULL, '$2y$10$iz2rRb3eGc4HZqfYuTy6..N35MuRnGOvAI6z6uonv9IO8MCAKhcaK', NULL, '2020-09-17 20:33:14', '2020-09-17 20:33:14', NULL, NULL, NULL, NULL, ''),
(15, 'akbaraais', 'akbarrais@mail.com', NULL, NULL, '$2y$10$/D5i88ZPXgew3YbzUyVIROWGqcw9n3qeHwBD/FuDcLDLKJ5FwwKv2', NULL, '2020-09-17 20:35:44', '2020-09-17 20:35:44', NULL, NULL, NULL, NULL, ''),
(16, 'akbaraais', 'akbarrais17@mail.com', NULL, NULL, '$2y$10$7WO5CuDIV9gsk3dfmjdUQ.HujDEJPLSqn2benL7kIw3IEtvKRc9cC', NULL, '2020-09-17 20:39:59', '2020-09-17 20:39:59', NULL, NULL, NULL, NULL, ''),
(17, 'ferdian sinaga', 'ferdi@mail.com', NULL, NULL, '$2y$10$Aulf1IUQK6SSW5y911/LyO725Z5jAW7W3iVDFRTNM2SLP99L6WsEK', NULL, '2020-09-17 20:52:22', '2020-09-17 20:52:22', NULL, NULL, NULL, NULL, 'ferdizz'),
(18, 'saputra septiadi', 'saputra77@mail.com', NULL, NULL, '$2y$10$bPJF5OUD8HrWUIwCPfEprOPib3Nme/.eDZQqF0tDpoDO6qHEI88gm', NULL, '2020-09-17 20:59:54', '2020-09-17 20:59:54', NULL, NULL, NULL, NULL, 'saputra77'),
(20, 'mantapujiwa', 'mantapujiwa@gmail.com', NULL, NULL, '$2y$10$XDkdN7XgMmmEOHjslhnO9OT9gHy0Y3opMhd/tQola0wXajalvCN3.', NULL, '2020-09-18 00:32:37', '2020-09-18 00:32:37', NULL, NULL, NULL, NULL, 'mantapz'),
(21, 'akbar', 'hh@gmail.com', NULL, NULL, '$2y$10$3aL1.viB49THqtnPr1ZHXOXgUQ4Zq8yjx27edDnV5PyfqWBdn9VaS', NULL, '2020-09-18 01:18:15', '2020-09-18 01:18:15', NULL, NULL, NULL, NULL, NULL),
(22, 'Fariz Akbar', 'richart135@gmail.com', NULL, NULL, '1386294e7a0f8a8e168093e0a07a8705', NULL, '2020-09-21 00:43:17', '2020-09-21 00:43:17', '110228319815165948129', NULL, NULL, NULL, NULL),
(23, 'akbar2', 'akbar@gmail.com', NULL, NULL, '$2y$10$FE2sC7ybrZ7BzhbJ4adZwe9Ja2i.IR..P5uW6U93X4yCCXfl0KeS6', NULL, '2020-09-21 00:51:50', '2020-09-21 00:51:50', NULL, NULL, NULL, NULL, NULL),
(24, 'akbar3', 'akbar3@gmail.com', NULL, NULL, '$2y$10$XImZD5/br22A8DoSr77ttucFYFo7Br1SoVRofJdjCtERMHjlE7L9m', NULL, '2020-09-21 20:47:08', '2020-09-21 20:47:08', NULL, NULL, NULL, NULL, NULL),
(25, 'ssbbr', 'sabarto17@mail.com', NULL, NULL, '$2y$10$JXefNKeqxMd77NNoIcdqyOvpy.TqBXSHLoGZ7V.keJU6piG/Ue4ua', NULL, '2020-09-21 20:47:24', '2020-09-21 20:47:24', NULL, NULL, NULL, NULL, 'sabarto'),
(26, 'akbar4', 'akbar4@gmail.com', NULL, NULL, '$2y$10$dW/Osyb4DEpdY1JpZ4fOQe28Aw7L3WBahf7Ni9RSD0dG3zZ6b6V1G', NULL, '2020-09-22 02:49:30', '2020-09-22 02:49:30', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`),
  ADD KEY `status_id_foreign` (`status_id`);

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
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN` (`status`) USING BTREE;

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
