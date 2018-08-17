-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2018 at 10:11 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project02`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` int(11) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '3' COMMENT '1: Giám đốc , 2: Nhân viên, 3: Người dùng ',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `img`, `fullname`, `password`, `account_number`, `id_number`, `birthday`, `gender`, `address`, `phone`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'q.uyen96', 'email@email.com', 'img_2018-08-16_1534427253.jpeg', 'Chưa có', '$2y$10$534pFF8yVxb9Mr0Tuqi/NeQIS3cW/rbKcjARMPuxaZeTxJzglINjO', '5551772260556344', NULL, 850521600, 1, 'Hà Lội', '19001001', 1, 1, 'jEnff1FCNOmhYEBfoJTo31O0rIv3rL9IBs04VHSBSUBbOSwvIjy3OsVapW9Z', '2018-08-12 10:48:39', '2018-08-17 06:58:58'),
(2, 'honghanh', 'honghanh@gmail.com', 'img_2018-08-16_1534428262.png', 'Hồng Hanh', '9876543210', NULL, NULL, NULL, NULL, NULL, '11212121', 2, 1, NULL, '2018-08-16 07:04:21', '2018-08-16 07:04:21'),
(3, 'ngoc.trinh', 'ngoctrinh@gmail.com', 'img_2018-08-17_1534508007.jpeg', 'Ngọc Trinh', '$2y$10$JxGpcrdSGyXAu1jXe0yBfODaOE5AxBzPb5QhTUoTBduh9GikWE7YG', '4819682411428302', NULL, 0, 1, NULL, '0000', 2, 1, 'h0fjHmYGj3KdDkWMlJVY2MOxVa7mLa0nOgsiZyyGnKY35u8XTa9M3ybCiysa', '2018-08-17 05:13:27', '2018-08-17 07:02:26'),
(4, 'hamy_1996', NULL, 'img_2018-08-17_1534510082.jpeg', 'Hạ My', '$2y$10$eIyOBo3oQIlJqoANpMT.qO9GN6irzxLrbemoP5bEvRNhaJql2vOk2', '5544821241591984', '121212121212', 850521600, 1, 'Hà Lội', NULL, 2, 1, NULL, '2018-08-17 05:48:01', '2018-08-17 07:02:16'),
(5, 'vquyenaaa', 'vquyenaaa@gmail.com', 'img_2018-08-17_1534514220.jpeg', 'Quyến', '$2y$10$FJgerAbW5uB6BhWNV9AWZ.RiHENVtocoqYCfJGNRmQnPXHbOu9Fbe', '8059819335816156', '013399187', 850521600, 1, 'Hà Lội', '1788033008', 2, 1, '1DTteoIDZT1SIqJQrOsA024QUempGyIdWGnd8B5mbebBTgzW9toUtN0hISSv', '2018-08-17 06:57:00', '2018-08-17 06:57:00'),
(6, 'cao_linh_1994', NULL, NULL, NULL, '$2y$10$ZPjNnNVE6NbGs/PUD9eX5.h7T7DVTUNSRsILee3H0nY9meGVy0ZEi', '7118785317724924', NULL, 775353600, 2, NULL, NULL, 3, 1, NULL, '2018-08-17 07:07:07', '2018-08-17 07:07:28');

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
(1, '2018_08_12_163040_create_accounts_table', 1),
(2, '2018_08_16_142949_create_transactions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_sender_id_foreign` (`sender_id`),
  ADD KEY `transactions_receiver_id_foreign` (`receiver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
