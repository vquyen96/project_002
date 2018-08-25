-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2018 at 08:45 PM
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
  `balance` bigint(20) NOT NULL DEFAULT '0',
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

INSERT INTO `accounts` (`id`, `username`, `email`, `img`, `fullname`, `password`, `account_number`, `balance`, `id_number`, `birthday`, `gender`, `address`, `phone`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'q.uyen96', 'email@email.com', 'img_2018-08-16_1534427253.jpeg', 'QUYEN DO', '$2y$10$534pFF8yVxb9Mr0Tuqi/NeQIS3cW/rbKcjARMPuxaZeTxJzglINjO', '5551772260556344', 9165576, NULL, 850521600, 1, 'Hà Lội', '19001001', 1, 1, 'K3hMbILsHP2bhUdn4tKpqQ5CFjhZbTgEyWpBs6nzdIAywEHiy9C8hi5SYObr', '2018-08-12 10:48:39', '2018-08-24 06:03:45'),
(2, 'honghanh', 'honghanh@gmail.com', 'img_2018-08-16_1534428262.png', 'HONG HANH', '9876543210', NULL, 0, NULL, NULL, NULL, NULL, '11212121', 2, 1, NULL, '2018-08-16 07:04:21', '2018-08-24 06:02:27'),
(3, 'ngoc.trinh', 'ngoctrinh@gmail.com', 'img_2018-08-17_1534508007.jpeg', 'NGOC CHINH', '$2y$10$JxGpcrdSGyXAu1jXe0yBfODaOE5AxBzPb5QhTUoTBduh9GikWE7YG', '4819682411428302', 0, NULL, 0, 1, NULL, '0000', 2, 1, 'h0fjHmYGj3KdDkWMlJVY2MOxVa7mLa0nOgsiZyyGnKY35u8XTa9M3ybCiysa', '2018-08-17 05:13:27', '2018-08-24 06:03:29'),
(4, 'hamy_1996', NULL, 'img_2018-08-17_1534510082.jpeg', 'HA MY', '$2y$10$eIyOBo3oQIlJqoANpMT.qO9GN6irzxLrbemoP5bEvRNhaJql2vOk2', '5544821241591984', 1200000, '121212121212', 850521600, 1, 'Hà Lội', NULL, 2, 1, NULL, '2018-08-17 05:48:01', '2018-08-24 06:40:49'),
(6, 'cao_linh_1994', NULL, NULL, '', '$2y$10$ZPjNnNVE6NbGs/PUD9eX5.h7T7DVTUNSRsILee3H0nY9meGVy0ZEi', '7118785317724924', 0, NULL, 775353600, 2, NULL, NULL, 3, 1, '0i49nUNBAPQLtQ1NPl907aFjSw9CDWmiBTn6jt2I5KsScu3rNhbzq11JyZGh', '2018-08-17 07:07:07', '2018-08-24 06:03:29'),
(7, 'lenguyen', 'nguyenle@gmail.com', NULL, 'NGUYEN HONG LE', '$2y$10$8S4yQDLk8xeSExqtUZ0RJOh/rUBBxqqeteWM.AR21k7ZGzUec9G9i', '7277227819961254', 900000, '0909999912', 842486400, NULL, NULL, '0998877889', 3, 1, 'RLlvbCqHRl6Ac9tRUTE2WHWO3sSWRkOLNM4UM0pVHrLIZhYHilIMHEKiFR1j', '2018-08-18 20:11:47', '2018-08-24 06:42:47'),
(8, 'vquyenaaa', 'vquyenaaa@gmail.com', 'img_2018-08-17_1534514220.jpeg', 'QUYEN DO', '$2y$10$ESyTQehuZRmB8hzhLgBbv.ycK/RtaxLJeSPNJ6ojgq2Wt9C0hszDS', '4029123964228307', 8000000, '00000000000', 850521600, NULL, NULL, '1788033008', 3, 1, 'lpIkM8B5FqI1hyrNTC6hNExH5GO57cNSoidDadaoo47vMDKeYATqQzwAGzAK', '2018-08-22 05:40:09', '2018-08-25 03:00:28'),
(9, 'tuanminh99', 'tuanminh99@gmail.com', NULL, 'NGUYEN TUAN MINH', '$2y$10$F1lFNKRp/7SvOipp7IMC9efLdTFcbjReVL1uuthv.C60QOYq1EEuS', '1965154930532015', 0, '0897129371', 927417600, NULL, NULL, '0100333022', 3, 1, NULL, '2018-08-25 00:28:58', '2018-08-25 00:28:58'),
(10, 'tuanminh_ap', 'tuanminhap@gmail.com', 'img_2018-08-25_1535186715.jpeg', 'NGUYEN TUAN MINH', '$2y$10$uDxsAfUK7D1UTiVuq13tBORwGKgqKgVw9RgnbzR6YuFuumdGJgAj6', '4645745030814185', 28820000, '02344433788', 923097600, 1, 'Hà Lội', '0779979782', 3, 1, NULL, '2018-08-25 00:32:05', '2018-08-25 05:47:23');

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
  `amount` bigint(50) NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `sender_balance_before` bigint(20) DEFAULT NULL,
  `sender_balance_after` bigint(20) DEFAULT NULL,
  `receiver_balance_before` bigint(20) DEFAULT NULL,
  `receiver_balance_after` bigint(20) DEFAULT NULL,
  `messages` text COLLATE utf8mb4_unicode_ci,
  `type` int(11) NOT NULL COMMENT '1, Gửi tiền, 2: Rút tiền, 3: Chuyển tiền, 4: Gửi tiết kiệm',
  `status` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `amount`, `sender_id`, `receiver_id`, `sender_balance_before`, `sender_balance_after`, `receiver_balance_before`, `receiver_balance_after`, `messages`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 10000000, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL),
(2, 9090000, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL),
(3, 9923424, 1, 1, NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL),
(4, -1000, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL),
(5, 10000000, 8, 8, 0, 10000000, NULL, NULL, 'Laapj taif khoanr', 1, 1, NULL, NULL),
(9, 2000000, 8, 8, 10000000, 12000000, NULL, NULL, 'Bán cỏ', 1, 1, NULL, NULL),
(10, 500000, 8, 8, 12000000, 11500000, NULL, NULL, 'Đi hất cùn', 2, 1, NULL, NULL),
(11, 2000000, 8, 8, 11500000, 13500000, NULL, NULL, 'OKe', 1, 1, NULL, NULL),
(12, 5000000, 8, 8, 13500000, 8500000, NULL, NULL, 'Hihihhihiih', 2, 1, NULL, NULL),
(13, 3000000, 8, 8, 8500000, 5500000, NULL, NULL, '000000000000000000000000000', 3, 1, NULL, NULL),
(15, 1200000, 8, 4, 5500000, 4300000, 0, 1200000, '1111aaaaaaaaaaaaaaaaaaaaaaaaa', 3, 1, NULL, NULL),
(16, 900000, 8, 7, 4300000, 3400000, 0, 900000, 'nooooooooooooooooooooooooooononnonon', 3, 1, NULL, NULL),
(17, 400000, 8, 8, 3400000, 3000000, NULL, NULL, '222222222222222222222222', 2, 1, NULL, NULL),
(18, 30000000, 10, 10, 0, 30000000, NULL, NULL, 'Mở thẻ', 1, 1, NULL, NULL),
(19, 2000000, 10, 10, 30000000, 28000000, NULL, NULL, 'Rút đi chơi với gấu', 2, 1, NULL, NULL),
(20, 5400000, 10, 10, 28000000, 33400000, NULL, NULL, 'Gửi thôi', 1, 1, 1535187312, NULL),
(21, 3500000, 10, 10, 33400000, 29900000, NULL, NULL, 'Đi hất cùn nhé !!! Đi hất cùn nhé !!!\r\nĐi hất cùn nhé !!!\r\nĐi hất cùn nhé !!!\r\nĐi hất cùn nhé !!!', 2, 1, 1535187385, NULL),
(26, 80000, 10, 8, 29900000, 29820000, 3000000, 80000, 'Nợ', 3, 1, 1535190658, NULL),
(28, 5000000, 10, 8, 29820000, 24820000, 80000, 5000000, 'Nợ tiếp', 3, 1, 1535190995, NULL),
(29, 3000000, 10, 8, 24820000, 21820000, 5000000, 8000000, 'Nợ nữa', 3, 1, 1535191228, NULL),
(30, 40000000, 10, 10, 21820000, 61820000, NULL, NULL, 'Nạp tiền :Trúng đề', 1, 1, 1535193290, NULL),
(31, 30000000, 10, 10, 61820000, 31820000, NULL, NULL, 'Rút tiền :Sắm Iphone X', 2, 1, 1535193314, NULL),
(32, 1000000, 10, 10, 31820000, 30820000, NULL, NULL, 'Rút tiền :Nhanh', 2, 1, 1535201177, NULL),
(33, 2000000, 10, 10, 30820000, 28820000, NULL, NULL, 'Rút tiền :Nhanh', 2, 1, 1535201243, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
