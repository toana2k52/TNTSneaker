-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 24, 2019 lúc 08:50 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tnt_sneaker_bkap`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` tinyint(3) NOT NULL,
  `remember_token` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `address`, `image`, `position`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Dương Huy Toàn', 'huytoana2k52@gmail.com', '$2y$10$dOn2mQ5ig5QssYLLMHEzZe3zloAILOtyg9yBckwq5BqV9y6OrODWu', '0979433905', 'Phú Thọ', '36324412_591602887887204_389234559411027968_n.jpg', 0, '55zyFFj0MbCZCGZYYpig9lAtwiVLUrv93sf4M3qDLHbLv7WHzTYn6cnOvfSz', '2018-12-29 14:08:30', '2019-03-22 18:49:49'),
(3, 'Huy Toàn', '2k52@gmail.com', '$2y$10$nOewx.SDvpdX4r/fbxkMWuKwP2QTdUKrx1QIy52G25kUa3VxUZYbe', '4556464', 'Phú Thọ', '36324412_591602887887204_389234559411027968_n.jpg', 0, NULL, '2018-12-29 14:46:11', '2019-01-03 12:26:00'),
(4, 'Ngọc', 'ngoc@gmail.com', '$2y$10$Hcce123LFhZ0jGgo7feVpuPX49YT5I7WSxGMRsG2bpXLHEYO39CLG', '0979433906', 'PhúTthọ', 'ic_launcher_2.png', 0, '1MATc3IcLA0drLJ0vhJMY68jVnbXD7x7AAe5mxmIJXACOXP0arhu0PmXTo00', '2019-01-03 11:55:44', '2019-03-22 18:49:32'),
(5, 'Đỗ Thành Trung', 'trung@gmail.com', '$2y$10$7UbDeRVOshcCLfJfwHmqquexuAWIAXVYgkYEDwFfcCK7SRuD0L1qm', '0123456549', 'Hà Nội', 'member_null.png', 1, 'c5Js0bsrNuN22rOp2yT30OyVO2vSLO8P2p1OsMmcGVhBLW9zXJ8MfFJPq4Nu', '2019-01-03 12:21:37', '2019-03-22 18:25:47'),
(6, 'Văn Đức', 'duc@gmail.com', '$2y$10$hfpwtM/cqEEAZfVWH5NI..bTulTHqEbKGBwtVllz/O/aHdGTgu2rS', '0123221212', 'Hà Nội', 'ic_launcher_round_2.png', 0, NULL, '2019-01-11 13:00:18', '2019-01-11 13:00:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', 1, '2019-01-07 07:43:59', '2019-01-07 07:43:59'),
(2, 'Nike', 1, '2019-01-07 07:45:33', '2019-01-07 07:45:33'),
(3, 'Puma', 1, '2019-01-07 07:45:43', '2019-01-07 07:45:43'),
(4, 'Vans', 1, '2019-01-13 16:46:56', '2019-01-13 16:48:54'),
(5, 'Rick Owen', 1, '2019-01-16 08:20:05', '2019-01-16 08:20:05'),
(6, 'Jordan', 1, '2019-01-16 08:22:34', '2019-01-16 08:22:34'),
(7, 'Lebron', 1, '2019-01-16 08:22:42', '2019-01-16 08:22:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_detail_id` int(11) NOT NULL,
  `price` float(10,3) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `product_id`, `product_detail_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(6, 3, 29, 156, 7700000.000, 3, '2019-04-08 18:11:34', '2019-05-23 06:47:20'),
(7, 7, 22, 44, 1550000.000, 1, '2019-04-08 18:12:10', '2019-04-08 18:12:10'),
(8, 7, 30, 170, 5800000.000, 2, '2019-04-08 18:12:19', '2019-04-08 18:12:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) NOT NULL,
  `parent` tinyint(3) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `status`, `parent`, `created_at`, `updated_at`) VALUES
(6, 'Giày bóng rổ', 'giay-bong-ro', 1, 0, '2019-01-16 07:22:52', '2019-01-16 07:22:52'),
(7, 'Jordan', 'jordan', 1, 6, '2019-01-16 07:23:07', '2019-01-16 07:23:07'),
(8, 'Lebron', 'lebron', 1, 6, '2019-01-16 07:23:18', '2019-01-16 07:23:26'),
(9, 'Giày chạy bộ', 'giay-chay-bo', 1, 0, '2019-01-16 07:23:37', '2019-01-16 07:23:37'),
(10, 'Đế boost2', 'de-boost', 1, 9, '2019-01-16 07:24:15', '2019-01-16 07:24:24'),
(11, 'Running', 'running', 1, 9, '2019-01-16 07:24:59', '2019-01-16 07:24:59'),
(12, 'Sneaker hot', 'sneaker-hot', 1, 0, '2019-01-16 07:25:22', '2019-01-16 07:25:22'),
(13, 'Human race', 'human-race', 1, 12, '2019-01-16 07:26:06', '2019-01-16 07:26:06'),
(14, 'NMD', 'nmd', 1, 12, '2019-01-16 07:26:21', '2019-01-16 07:26:21'),
(15, 'UPTEMPO', 'uptempo', 1, 12, '2019-01-16 07:26:33', '2019-01-16 07:26:33'),
(16, 'VANS', 'vans', 1, 12, '2019-01-16 07:26:42', '2019-01-16 07:26:42'),
(17, 'NIKE', 'nike', 1, 12, '2019-01-16 07:26:50', '2019-01-16 07:26:50'),
(18, 'PUMA', 'puma', 1, 12, '2019-01-16 07:27:02', '2019-01-16 07:27:02'),
(19, 'ADIDAS', 'adidas', 1, 12, '2019-01-16 07:27:27', '2019-01-16 07:27:27'),
(20, 'Phân khúc cao', 'phan-khuc-cao', 1, 0, '2019-01-16 07:27:40', '2019-01-16 07:27:40'),
(21, 'Yeezy 350', 'yeezy-350', 1, 20, '2019-01-16 07:28:11', '2019-01-16 07:28:11'),
(22, 'Yeezy 500', 'yeezy-500', 1, 20, '2019-01-16 07:28:43', '2019-01-16 07:28:43'),
(23, 'Yeezy 700', 'yeezy-700', 1, 20, '2019-01-16 07:28:59', '2019-01-16 07:28:59'),
(24, 'Rick Owen', 'rick-owen', 1, 20, '2019-01-16 07:29:16', '2019-01-16 07:29:16'),
(25, 'Balenciaga', 'balenciaga', 1, 20, '2019-01-16 07:29:29', '2019-01-16 07:29:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `remember_token` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `phone`, `address`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vũ Công Ngọc', 'ngoc@gmail.com', '$2y$10$OhKI69Rf1DYAsuTJml7N.uBglJntK9ie2hsDK/SgotpLxSLhFvzh.', '0123221212', 'Phú Thọ', 'ic_launcher_round_2.png', 0, '1imJJkZ5nT2lLu9Ai2uthtBHpE1FILfyDGlRsYCS6tqAEmrNQ3q1XGzH4iuJ', '2019-01-11 13:12:04', '2019-01-11 13:12:04'),
(2, 'Trần Văn Đức', 'duc@gmail.com', '$2y$10$qmcPWcNS.UKPvZub0piVCeqAxM/GuFWFMNgnnliV.DYkbTZc/xEhe', '0123456549', 'Hà Nam', '67DCHT20145.jpg', 0, 'DwfXCxvRYZxwLSZ7fYHoPQfpXkqRXMEt3Auu34dm9Bs1Wo4VTOFW9NEQaDwF', '2019-01-11 13:13:17', '2019-01-18 09:43:13'),
(3, 'Dương Huy Toàn', 'huytoana2k52@gmail.com', '$2y$10$g5KVAIO6.p24EPmMaJLt5e5kEQ/WHIVrCiGN1Pnqv9jCmCxUtczWi', '0979433905', 'Phú Thọ', '36324412_591602887887204_389234559411027968_n.jpg', 0, 'cP1juQYdvwKQ7VTq4s9MsjlWMpMvyNX4ds77IugdvNQrOwwN7OgpkEzcqtDh', '2019-01-18 09:57:42', '2019-01-24 09:39:12'),
(4, 'Trần Công Trung', 'congtrung@gmail.com', '$2y$10$U9HnticK5OWL/XLgIhi5dephdz1NtvS5UXxrIfQi3MPjJnFXNveAe', '0112325412', 'Hà Nội', 'member_null.png', 0, NULL, '2019-01-18 09:58:43', '2019-01-18 09:58:43'),
(5, 'Hoàng Văn Hậu', 'hau@gmail.com', '$2y$10$aS2vNEAPNy6x84muAbWXuO9dW3JmcIH8LaaOPzLSxDcUU/QvMXD46', '012121414', 'Tây nguyên', '36324412_591602887887204_389234559411027968_n.jpg', 0, NULL, '2019-01-18 10:00:35', '2019-01-18 10:00:35'),
(6, 'Dương Huy A', 'a@gmail.com', '$2y$10$bA.TUf7i6vQc50JQOu0gk.MZqiQFvPWtluSaHRehedGDcLVvIXmZ.', '01232120120', 'Hà Nội', 'giaiba.jpg', 0, 'g2Tch3nERePlryc2wrQQs1T4kHlH9rfDXBHVkSI6RzPpJSX4rxSjdxjccC5L', '2019-03-22 15:13:51', '2019-03-22 15:13:51'),
(7, 'Đỗ Thành Trung', 'trung@gmail.com', '$2y$10$Czj0wwMV.kT6yeunthP74Oi9.ECpGt7tpjdQ8VxN3BNkVfdkbd6mm', '0123587426', 'Hà Nội', 'giaiba.jpg', 0, 'LoEdgqzRUJ095UQGiTBJC8asl0orfgWRcTUJOrfsjyiXqS5gNwhu7XLuFgBB', '2019-03-22 18:34:20', '2019-03-22 18:34:20'),
(8, 'Mai Anh', 'maianh@gmail.com', '$2y$10$ra9pmv9Jj3lLwVINBfIf2OcnNpFWJqslCWb3A0hM9JfRp4CEddJzG', '01897678668', 'Ha Noi', 'b97693c7354836a081297f62aa5aaf22.png', 0, 'rLTolWEnEq7UrvAjuxYnt8bPl3TYh840nmXTy8B2OkVaS8wzOzWXFbovNbY3', '2019-03-23 01:16:08', '2019-03-23 01:16:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_address`
--

CREATE TABLE `customer_address` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer_address`
--

INSERT INTO `customer_address` (`id`, `customer_id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, 'Dương Huy Toàn', 'huytoana2k52@gmail.com', '0979433905', 'Triều khúc, Thanh Xuân, Hà Nội', '2019-01-13 17:56:29', '2019-01-13 17:56:29'),
(2, 2, 'aaaaaaa', 'a@gmail.com', '2434234', 'sdasfghjkffffffffffff', '2019-01-13 18:01:35', '2019-01-13 18:01:35'),
(5, 2, 'cccccc', 'ccc2222@gmail.com', '43567865432', 'Triều khúc, Thanh Xuân, Hà Nội', '2019-01-14 07:23:29', '2019-01-14 08:40:11'),
(6, 1, 'toan', 'huytoana2k52@gmail.com', '034234234', 'Hà Nội', '2019-01-14 08:20:16', '2019-01-14 08:20:16'),
(7, 2, 'hohihuha', 'hahaha@gmail.com', '01652653265', 'Lào Cai', '2019-01-21 10:37:54', '2019-01-21 10:37:54'),
(8, 2, 'hehehehehe', 'hehehe@gmail.com', '0254123652', 'Cần Thơ', '2019-01-21 10:38:41', '2019-01-21 10:38:41'),
(9, 3, 'Toàn haha', 'toan@gmail.com', '06412684125', 'Thái Nguyên', '2019-01-22 10:18:40', '2019-01-22 18:07:45'),
(10, 3, 'hihihihihi', 'huytoana2k52@gmail.com', '0652365423', 'Hải Phòng', '2019-01-22 17:42:51', '2019-01-22 17:42:51'),
(11, 1, 'Nguyễn Công Tuyến', 'tuyen@gmail.com', '01354254115', 'Vĩnh Phúc', '2019-01-24 17:37:34', '2019-01-24 17:37:34'),
(12, 7, 'Đỗ Thành Trung', 'trung@gmail.com', '01234512301', 'Hà Đông, Hà Nội', '2019-03-22 18:35:19', '2019-03-22 18:35:19'),
(13, 7, 'Đỗ Thành Tiến', 'trung@gmail.com', '01215426416', 'Hà Tây, Hà Nội', '2019-03-22 18:35:51', '2019-03-22 18:35:51'),
(14, 8, 'Mai Anh', 'maianh@gmail.com', '1233464646', 'hn', '2019-03-23 01:50:29', '2019-03-23 01:50:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_address_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `note` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `customer_address_id`, `user_name`, `user_email`, `user_phone`, `user_address`, `quantity`, `status`, `note`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 'Trần Văn Đức', 'duc@gmail.com', '0123456549', 'Hà Nam', 6, 0, NULL, '2019-01-21 16:20:54', '2019-01-21 16:20:54'),
(4, 2, 1, 'Trần Văn Đức', 'duc@gmail.com', '0123456549', 'Hà Nam', 2, 2, NULL, '2019-01-21 16:53:31', '2019-01-21 18:57:01'),
(6, 2, 1, 'Trần Văn Đức', 'duc@gmail.com', '0123456549', 'Hà Nam', 2, 3, 'Không liên lạc được với người nhận', '2019-01-21 16:55:36', '2019-01-22 13:25:23'),
(7, 3, 9, 'Dương Huy Toàn', 'huytoana2k52@gmail.com', '0979433905', 'Hà Nội', 8, 3, NULL, '2019-01-22 10:19:32', '2019-01-22 14:59:36'),
(8, 3, 9, 'Dương Huy Toàn', 'huytoana2k52@gmail.com', '0979433905', 'Hà Nội', 0, 3, 'Đơn hàng không hợp lệ', '2019-01-22 10:20:08', '2019-01-22 13:25:51'),
(9, 3, 9, 'Dương Huy Toàn', 'huytoana2k52@gmail.com', '0979433905', 'Hà Nội', 4, 2, NULL, '2019-01-22 15:02:22', '2019-01-23 17:52:09'),
(10, 3, 9, 'Dương Huy Toàn', 'huytoana2k52@gmail.com', '0979433905', 'Hà Nội', 1, 0, NULL, '2019-01-22 15:04:59', '2019-01-22 15:04:59'),
(11, 0, 0, 'Dương Huy kkk', 'huytoana2k52@gmail.com', '979433905', 'Phú Thọ', 8, 0, NULL, '2019-01-23 17:09:21', '2019-01-23 17:09:21'),
(12, 0, 0, 'Tôi là khách vãn lai', 'huytoana2k52@gmail.com', '979433905', 'Phú Xuân', 3, 0, NULL, '2019-01-23 17:18:30', '2019-01-23 17:18:30'),
(13, 3, 10, 'Dương Huy Toàn', 'huytoana2k52@gmail.com', '0979433905', 'Phú Thọ', 6, 0, NULL, '2019-01-23 17:44:27', '2019-01-23 17:44:27'),
(14, 0, 0, 'Vũ Công Ngọc', 'ngoc@gmail.com', '0943057828', 'hà đông', 3, 0, NULL, '2019-01-24 06:20:13', '2019-01-24 06:20:13'),
(15, 0, 0, 'dfdfsgfdsdfs', 'toan@gmail.com', '0121242421', 'sdfhgfdzfghjkgfdgh', 4, 1, NULL, '2019-01-24 08:57:14', '2019-01-24 08:58:42'),
(16, 3, 9, 'Dương Huy Toàn', 'huytoana2k52@gmail.com', '0979433905', 'Phú Thọ', 3, 1, NULL, '2019-01-24 08:59:45', '2019-01-24 09:00:42'),
(17, 3, 10, 'Dương Huy Toàn', 'huytoana2k52@gmail.com', '0979433905', 'Phú Thọ', 1, 0, NULL, '2019-01-24 10:25:20', '2019-01-24 10:25:20'),
(18, 1, 6, 'Vũ Công Ngọc', 'ngoc@gmail.com', '0123221212', 'Phú Thọ', 4, 0, NULL, '2019-01-24 17:32:51', '2019-01-24 17:32:51'),
(19, 1, 11, 'Vũ Công Ngọc', 'ngoc@gmail.com', '0123221212', 'Phú Thọ', 6, 3, NULL, '2019-01-24 17:37:37', '2019-03-22 23:45:31'),
(20, 0, 0, 'Thắng', 'thang@gmail.com', '065265425', 'Hà Nội', 3, 0, NULL, '2019-01-25 20:36:57', '2019-01-25 20:36:57'),
(21, 3, 10, 'Dương Huy Toàn', 'huytoana2k52@gmail.com', '0979433905', 'Phú Thọ', 3, 0, NULL, '2019-01-25 20:42:37', '2019-01-25 20:42:37'),
(22, 0, 0, 'toan kt', 'toankt@gmail.com', '0154365254', 'Hà Nội', 4, 0, NULL, '2019-01-26 03:20:43', '2019-01-26 03:20:43'),
(23, 0, 0, 'demo2', 'demo@gmail.com', '01234567896', 'Hà Nội', 1, 1, NULL, '2019-03-22 18:29:24', '2019-03-22 18:30:44'),
(24, 7, 13, 'Đỗ Thành Trung', 'trung@gmail.com', '0123587426', 'Hà Nội', 3, 2, NULL, '2019-03-22 18:37:39', '2019-03-22 18:47:32'),
(25, 1, 6, 'Vũ Công Ngọc', 'ngoc@gmail.com', '0123221212', 'Phú Thọ', 1, 3, NULL, '2019-03-23 01:55:54', '2019-03-23 02:04:12'),
(26, 1, 6, 'Vũ Công Ngọc', 'ngoc@gmail.com', '0123221212', 'Phú Thọ', 3, 3, NULL, '2019-03-23 02:03:47', '2019-03-23 02:05:04'),
(27, 1, 11, 'Vũ Công Ngọc', 'ngoc@gmail.com', '0123221212', 'Phú Thọ', 1, 0, NULL, '2019-03-23 02:43:38', '2019-03-23 02:43:38'),
(28, 0, 0, 'Dương Huy Toàn', 'huytoana2k52@gmail.com', '0979433905', 'Phú Thọ', 1, 2, NULL, '2019-03-23 04:48:24', '2019-03-23 04:49:36'),
(29, 3, 9, 'Dương Huy Toàn', 'huytoana2k52@gmail.com', '0979433905', 'Phú Thọ', 3, 0, NULL, '2019-04-08 18:12:44', '2019-04-08 18:12:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_detail_id` int(11) NOT NULL,
  `price` float(10,3) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `orders_id`, `product_name`, `product_detail_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(8, 3, '0', 14, 2610000.000, 2, '2019-01-21 16:20:54', '2019-01-21 16:20:54'),
(9, 3, '0', 15, 2240000.000, 1, '2019-01-21 16:20:54', '2019-01-21 16:20:54'),
(10, 3, '0', 17, 1710000.000, 1, '2019-01-21 16:20:54', '2019-01-21 16:20:54'),
(11, 3, '0', 16, 2610000.000, 2, '2019-01-21 16:20:54', '2019-01-21 16:20:54'),
(12, 4, 'Jordan 1s Bred Toe', 14, 2610000.000, 1, '2019-01-21 16:53:31', '2019-01-21 16:53:31'),
(13, 4, 'Jordan 5s CNY', 17, 1710000.000, 1, '2019-01-21 16:53:31', '2019-01-21 16:53:31'),
(14, 6, 'Jordan 11s Platinum Tint', 15, 2240000.000, 1, '2019-01-21 16:55:36', '2019-01-21 16:55:36'),
(15, 6, 'Jordan 5s CNY', 17, 1710000.000, 1, '2019-01-21 16:55:36', '2019-01-21 16:55:36'),
(16, 7, 'Jordan 1s Bred Toe', 14, 2610000.000, 8, '2019-01-22 10:19:32', '2019-01-22 10:19:32'),
(17, 9, 'Jordan 5s CNY', 17, 1710000.000, 3, '2019-01-22 15:02:22', '2019-01-22 15:02:22'),
(18, 9, 'Jordan 1s Bred Toe', 16, 2610000.000, 1, '2019-01-22 15:02:23', '2019-01-22 15:02:23'),
(19, 10, 'Jordan 5s CNY', 17, 1710000.000, 1, '2019-01-22 15:04:59', '2019-01-22 15:04:59'),
(20, 11, 'Jordan 5s CNY', 17, 1710000.000, 3, '2019-01-23 17:09:21', '2019-01-23 17:09:21'),
(21, 11, 'Jordan 1s Bred Toe', 14, 2610000.000, 5, '2019-01-23 17:09:22', '2019-01-23 17:09:22'),
(22, 12, 'Jordan 1s Bred Toe', 14, 2610000.000, 1, '2019-01-23 17:18:30', '2019-01-23 17:18:30'),
(23, 12, 'Jordan 11s Platinum Tint', 15, 2240000.000, 1, '2019-01-23 17:18:30', '2019-01-23 17:18:30'),
(24, 12, 'Jordan 5s CNY', 17, 1710000.000, 1, '2019-01-23 17:18:30', '2019-01-23 17:18:30'),
(25, 13, 'Jordan 1s Bred Toe', 14, 2610000.000, 1, '2019-01-23 17:44:28', '2019-01-23 17:44:28'),
(26, 13, 'Jordan 5s CNY', 17, 1710000.000, 5, '2019-01-23 17:44:29', '2019-01-23 17:44:29'),
(27, 14, 'Jordan 1s Bred Toe', 14, 2610000.000, 3, '2019-01-24 06:20:13', '2019-01-24 06:20:13'),
(28, 15, 'Jordan 1s Bred Toe', 14, 2610000.000, 3, '2019-01-24 08:57:14', '2019-01-24 08:57:14'),
(29, 15, 'Jordan 11s Platinum Tint', 15, 2240000.000, 1, '2019-01-24 08:57:14', '2019-01-24 08:57:14'),
(30, 16, 'Jordan 5s CNY', 17, 1710000.000, 3, '2019-01-24 08:59:46', '2019-01-24 08:59:46'),
(31, 17, 'Jordan 1s Bred Toe', 14, 2610000.000, 1, '2019-01-24 10:25:20', '2019-01-24 10:25:20'),
(32, 18, 'Jordan 1s Bred Toe', 14, 2610000.000, 2, '2019-01-24 17:32:51', '2019-01-24 17:32:51'),
(33, 18, 'Jordan 5s CNY', 17, 1710000.000, 2, '2019-01-24 17:32:51', '2019-01-24 17:32:51'),
(34, 19, 'Jordan 7s Nothing But Net', 18, 1350000.000, 3, '2019-01-24 17:37:38', '2019-01-24 17:37:38'),
(35, 19, 'Jordan 5s CNY', 17, 1710000.000, 3, '2019-01-24 17:37:38', '2019-01-24 17:37:38'),
(36, 20, 'YEEZY 500 BLUSH', 170, 5800000.000, 1, '2019-01-25 20:36:57', '2019-01-25 20:36:57'),
(37, 20, 'YEEZY 500 BLUSH', 171, 5800000.000, 1, '2019-01-25 20:36:57', '2019-01-25 20:36:57'),
(38, 20, 'Jordan 4s Travis Scott', 155, 1900000.000, 1, '2019-01-25 20:36:58', '2019-01-25 20:36:58'),
(39, 21, 'Yeezy 700 v2 Static', 164, 7700000.000, 2, '2019-01-25 20:42:37', '2019-01-25 20:42:37'),
(40, 21, 'Jordan 6S Slamdunk', 141, 1440000.000, 1, '2019-01-25 20:42:37', '2019-01-25 20:42:37'),
(41, 22, 'YEEZY 500 BLUSH', 166, 5800000.000, 3, '2019-01-26 03:20:43', '2019-01-26 03:20:43'),
(42, 22, 'Yeezy 700 v2 Static', 156, 7700000.000, 1, '2019-01-26 03:20:43', '2019-01-26 03:20:43'),
(43, 23, 'YEEZY 500 BLUSH', 167, 5800000.000, 1, '2019-03-22 18:29:24', '2019-03-22 18:29:24'),
(44, 24, 'Yeezy 700 v2 Static', 156, 7700000.000, 3, '2019-03-22 18:37:39', '2019-03-22 18:37:39'),
(45, 25, 'Yeezy 700 v2 Static', 156, 7700000.000, 1, '2019-03-23 01:55:55', '2019-03-23 01:55:55'),
(46, 26, 'Jordan 7s Nothing But Net', 18, 1350000.000, 1, '2019-03-23 02:03:47', '2019-03-23 02:03:47'),
(47, 26, 'Jordan 11s Platinum Tint', 107, 1250000.000, 2, '2019-03-23 02:03:47', '2019-03-23 02:03:47'),
(48, 27, 'Jordan 11s Platinum Tint', 15, 2240000.000, 1, '2019-03-23 02:43:39', '2019-03-23 02:43:39'),
(49, 28, 'Yeezy 700 v2 Static', 157, 7700000.000, 1, '2019-03-23 04:48:24', '2019-03-23 04:48:24'),
(50, 29, 'Jordan 4s Travis Scott', 146, 1900000.000, 3, '2019-04-08 18:12:44', '2019-04-08 18:12:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `image_ava` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `listed_price` float(15,3) NOT NULL DEFAULT '0.000',
  `listed_price_sale` float(15,3) NOT NULL DEFAULT '0.000',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `slug`, `brand_id`, `image_ava`, `listed_price`, `listed_price_sale`, `created_at`, `updated_at`) VALUES
(14, 6, 'Jordan 1s Bred Toe', 'jordan-1s-bred-toe', 6, 'dsc05111.png', 1750000.000, 1550000.000, '2019-01-16 08:28:23', '2019-01-24 18:44:44'),
(15, 6, 'Jordan 11s Platinum Tint', 'jordan-11s-platinum-tint', 6, 'dsc03862.png', 1420000.000, 1250000.000, '2019-01-16 08:31:45', '2019-01-24 18:45:23'),
(16, 6, 'Jordan 5s CNY', 'jordan-5s-cny', 6, 'dsc03782.png', 1950000.000, 1580000.000, '2019-01-16 09:16:22', '2019-01-24 18:45:39'),
(18, 6, 'Jordan 7s Nothing But Net', 'jordan-7s-nothing-but-net', 6, 'jd7.png', 1350000.000, 1150000.000, '2019-01-16 09:20:31', '2019-01-24 18:45:55'),
(19, 6, 'Jordan 4s Pure Money', 'jordan-4s-pure-money', 6, 'dsc03805.png', 1650000.000, 1400000.000, '2019-01-16 09:28:43', '2019-01-24 18:46:11'),
(21, 6, 'Jordan 4s Blue Laser', 'jordan-4s-blue-laser', 6, 'dsc02456.jpg', 1790000.000, 1590000.000, '2019-01-16 09:36:25', '2019-01-25 16:56:00'),
(22, 13, 'NMD HU PEACE', 'nmd-hu-peace', 1, 'hu_ava.png', 2200000.000, 1950000.000, '2019-01-16 09:39:23', '2019-01-24 18:46:49'),
(23, 21, 'Yeezy 350', 'yeezy-350', 1, '48361652_1864375733673343_3292150289888444416_n.jpg', 15000000.000, 15000000.000, '2019-01-24 18:26:17', '2019-01-24 18:26:17'),
(24, 7, 'Jordan 3s Tinker Hatfield', 'jordan-3s-tinker-hatfield', 6, 'dsc03548.png', 3050000.000, 1950000.000, '2019-01-25 19:29:10', '2019-01-25 19:29:10'),
(25, 7, 'Jordan 1s All Star', 'jordan-1s-all-star', 6, 'dsc03852.png', 1600000.000, 1400000.000, '2019-01-25 19:36:25', '2019-01-25 19:36:25'),
(26, 7, 'Jordan 11s Win Like 96', 'jordan-11s-win-like-96', 6, 'dsc02483.png', 1700000.000, 1190000.000, '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(27, 7, 'Jordan 6S Slamdunk', 'jordan-6s-slamdunk', 6, 'img-0369.png', 1600000.000, 1440000.000, '2019-01-25 19:40:20', '2019-01-25 19:40:20'),
(28, 7, 'Jordan 4s Travis Scott', 'jordan-4s-travis-scott', 6, 'dsc03774.png', 2100000.000, 1900000.000, '2019-01-25 19:49:57', '2019-01-25 19:49:57'),
(29, 23, 'Yeezy 700 v2 Static', 'yeezy-700-v2-static', 1, 'dsc08466.png', 8200000.000, 7700000.000, '2019-01-25 19:54:19', '2019-01-25 19:54:19'),
(30, 20, 'YEEZY 500 BLUSH', 'yeezy-500-blush', 1, 'dsc02435.png', 7600000.000, 5800000.000, '2019-01-25 19:56:22', '2019-01-25 19:56:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(15,3) NOT NULL,
  `price_sale` float(15,3) NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `status` tinyint(3) NOT NULL,
  `view` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_id`, `color`, `size`, `amount`, `image`, `price`, `price_sale`, `content`, `status`, `view`, `created_at`, `updated_at`) VALUES
(14, 14, 'Đỏ', '35', 6, 'dsc05111.png', 2900000.000, 2610000.000, 'https://youtu.be/1UkbZSpGNfc', 0, 5, '2019-01-16 08:28:23', '2019-01-24 17:32:51'),
(15, 15, 'Trắng', '35', 8, 'dsc03862.png', 3200000.000, 2240000.000, 'Tên sản phẩm: Jordan 11s Platinum Tint', 0, 0, '2019-01-16 08:31:45', '2019-03-23 02:43:39'),
(16, 14, 'Đỏ', '36', 15, 'dsc05111.png', 2900000.000, 2610000.000, 'https://youtu.be/1UkbZSpGNfc', 0, 0, '2019-01-16 08:34:55', '2019-01-22 15:02:23'),
(17, 16, 'Đen', '35', 15, 'dsc03782.png', 1900000.000, 1710000.000, 'Tên sản phẩm: Jordan 5s CNY', 0, 0, '2019-01-16 09:16:22', '2019-01-24 17:37:38'),
(18, 18, 'Trắng', '35', 16, 'jd7.png', 1500000.000, 1350000.000, 'Tên sản phẩm: Jordan 7s Nothing But Net', 0, 0, '2019-01-16 09:20:31', '2019-03-23 02:03:47'),
(19, 18, 'Trắng', '36', 20, 'jd7.png', 1500000.000, 1350000.000, 'Tên sản phẩm: Jordan 7s Nothing But Net', 0, 0, '2019-01-16 09:20:32', '2019-01-16 09:20:32'),
(20, 19, 'Trắng', '35', 20, 'dsc03805.png', 2490000.000, 2241000.000, 'Tên sản phẩm: Jordan 4s Pure Money', 0, 0, '2019-01-16 09:28:43', '2019-01-16 09:28:43'),
(21, 19, 'Trắng', '36', 20, 'dsc03805.png', 2490000.000, 2241000.000, 'Tên sản phẩm: Jordan 4s Pure Money', 0, 0, '2019-01-16 09:28:43', '2019-01-16 09:28:43'),
(22, 19, 'Trắng', '37', 20, 'dsc03805.png', 2490000.000, 2241000.000, 'Tên sản phẩm: Jordan 4s Pure Money', 0, 0, '2019-01-16 09:28:43', '2019-01-16 09:28:43'),
(23, 19, 'Trắng', '38', 20, 'dsc03805.png', 2490000.000, 2241000.000, 'Tên sản phẩm: Jordan 4s Pure Money', 0, 0, '2019-01-16 09:28:43', '2019-01-16 09:28:43'),
(24, 19, 'Trắng', '39', 20, 'dsc03805.png', 2490000.000, 2241000.000, 'Tên sản phẩm: Jordan 4s Pure Money', 0, 0, '2019-01-16 09:28:43', '2019-01-16 09:28:43'),
(25, 19, 'Trắng', '40', 20, 'dsc03805.png', 2490000.000, 2241000.000, 'Tên sản phẩm: Jordan 4s Pure Money', 0, 0, '2019-01-16 09:28:43', '2019-01-16 09:28:43'),
(26, 19, 'Trắng', '41', 20, 'dsc03805.png', 2490000.000, 2241000.000, 'Tên sản phẩm: Jordan 4s Pure Money', 0, 0, '2019-01-16 09:28:43', '2019-01-16 09:28:43'),
(27, 19, 'Trắng', '42', 20, 'dsc03805.png', 2490000.000, 2241000.000, 'Tên sản phẩm: Jordan 4s Pure Money', 0, 0, '2019-01-16 09:28:43', '2019-01-16 09:28:43'),
(28, 19, 'Trắng', '43', 20, 'dsc03805.png', 2490000.000, 2241000.000, 'Tên sản phẩm: Jordan 4s Pure Money', 0, 0, '2019-01-16 09:28:43', '2019-01-16 09:28:43'),
(29, 19, 'Trắng', '44', 20, 'dsc03805.png', 2490000.000, 2241000.000, 'Tên sản phẩm: Jordan 4s Pure Money', 0, 0, '2019-01-16 09:28:43', '2019-01-16 09:28:43'),
(30, 21, 'Trắng - Xanh', '37', 15, 'dsc02456.jpg', 2900000.000, 2350000.000, 'Tên sản phẩm: Jordan 4s Blue Laser', 0, 0, '2019-01-16 09:36:25', '2019-01-16 09:36:25'),
(31, 21, 'Trắng - Xanh', '38', 15, 'dsc02456.jpg', 2900000.000, 2350000.000, 'Tên sản phẩm: Jordan 4s Blue Laser', 0, 0, '2019-01-16 09:36:25', '2019-01-16 09:36:25'),
(32, 21, 'Trắng - Xanh', '39', 15, 'dsc02456.jpg', 2900000.000, 2350000.000, 'Tên sản phẩm: Jordan 4s Blue Laser', 0, 0, '2019-01-16 09:36:25', '2019-01-16 09:36:25'),
(33, 21, 'Trắng - Xanh', '40', 15, 'dsc02456.jpg', 2900000.000, 2350000.000, 'Tên sản phẩm: Jordan 4s Blue Laser', 0, 0, '2019-01-16 09:36:25', '2019-01-16 09:36:25'),
(34, 21, 'Trắng - Xanh', '41', 15, 'dsc02456.jpg', 2900000.000, 2350000.000, 'Tên sản phẩm: Jordan 4s Blue Laser', 0, 0, '2019-01-16 09:36:25', '2019-01-16 09:36:25'),
(35, 21, 'Trắng - Xanh', '42', 15, 'dsc02456.jpg', 2900000.000, 2350000.000, 'Tên sản phẩm: Jordan 4s Blue Laser', 0, 0, '2019-01-16 09:36:25', '2019-01-16 09:36:25'),
(36, 21, 'Trắng - Xanh', '43', 15, 'dsc02456.jpg', 2900000.000, 2350000.000, 'Tên sản phẩm: Jordan 4s Blue Laser', 0, 0, '2019-01-16 09:36:25', '2019-01-16 09:36:25'),
(38, 14, 'Đỏ', '39', 15, 'dsc05111.png', 2900000.000, 2610000.000, 'https://youtu.be/1UkbZSpGNfc', 0, 0, '2019-01-16 09:51:46', '2019-01-16 09:51:46'),
(39, 14, 'Đỏ', '40', 15, 'dsc05111.png', 2900000.000, 2610000.000, 'https://youtu.be/1UkbZSpGNfc', 0, 0, '2019-01-16 09:51:46', '2019-01-16 09:51:46'),
(40, 14, 'Đỏ', '41', 15, 'dsc05111.png', 2900000.000, 2610000.000, 'https://youtu.be/1UkbZSpGNfc', 0, 0, '2019-01-16 09:51:46', '2019-01-16 09:51:46'),
(41, 14, 'Đỏ', '42', 15, 'dsc05111.png', 2900000.000, 2610000.000, 'https://youtu.be/1UkbZSpGNfc', 0, 0, '2019-01-16 09:51:46', '2019-01-16 09:51:46'),
(42, 14, 'Đỏ', '43', 15, 'dsc05111.png', 2900000.000, 2610000.000, 'https://youtu.be/1UkbZSpGNfc', 0, 0, '2019-01-16 09:51:46', '2019-01-16 09:51:46'),
(43, 14, 'Đỏ', '44', 15, 'dsc05111.png', 2900000.000, 2610000.000, 'https://youtu.be/1UkbZSpGNfc', 0, 0, '2019-01-16 09:51:46', '2019-01-16 09:51:46'),
(44, 22, 'Xanh', '35', 20, 'hu_ava.png', 1750000.000, 1550000.000, 'Tên sản phẩm: NMD HU PEACE', 0, 0, '2019-01-16 09:52:58', '2019-01-16 09:52:58'),
(45, 22, 'Xanh', '36', 20, 'hu_ava.png', 1750000.000, 1550000.000, 'Tên sản phẩm: NMD HU PEACE', 0, 0, '2019-01-16 09:52:58', '2019-01-16 09:52:58'),
(46, 22, 'Xanh', '37', 20, 'hu_ava.png', 1750000.000, 1550000.000, 'Tên sản phẩm: NMD HU PEACE', 0, 0, '2019-01-16 09:52:58', '2019-01-16 09:52:58'),
(47, 22, 'Xanh', '38', 20, 'hu_ava.png', 1750000.000, 1550000.000, 'Tên sản phẩm: NMD HU PEACE', 0, 0, '2019-01-16 09:52:58', '2019-01-16 09:52:58'),
(48, 22, 'Xanh', '39', 20, 'hu_ava.png', 1750000.000, 1550000.000, 'Tên sản phẩm: NMD HU PEACE', 0, 0, '2019-01-16 09:52:58', '2019-01-16 09:52:58'),
(49, 22, 'Xanh', '40', 20, 'hu_ava.png', 1750000.000, 1550000.000, 'Tên sản phẩm: NMD HU PEACE', 0, 0, '2019-01-16 09:52:58', '2019-01-16 09:52:58'),
(50, 22, 'Xanh', '41', 20, 'hu_ava.png', 1750000.000, 1550000.000, 'Tên sản phẩm: NMD HU PEACE', 0, 0, '2019-01-16 09:52:58', '2019-01-16 09:52:58'),
(51, 22, 'Xanh', '42', 20, 'hu_ava.png', 1750000.000, 1550000.000, 'Tên sản phẩm: NMD HU PEACE', 0, 0, '2019-01-16 09:52:58', '2019-01-16 09:52:58'),
(52, 22, 'Xanh', '43', 20, 'hu_ava.png', 1750000.000, 1550000.000, 'Tên sản phẩm: NMD HU PEACE', 0, 0, '2019-01-16 09:52:58', '2019-01-16 09:52:58'),
(53, 22, 'Xanh', '44', 20, 'hu_ava.png', 1750000.000, 1550000.000, 'Tên sản phẩm: NMD HU PEACE', 0, 0, '2019-01-16 09:52:58', '2019-01-16 09:52:58'),
(78, 16, 'Đen', '36', 20, 'dsc03782.png', 1750000.000, 1500000.000, 'Jordan 5s CNY', 0, 0, '2019-01-24 10:32:25', '2019-01-24 10:32:25'),
(79, 16, 'Đen', '37', 20, 'dsc03782.png', 1750000.000, 1500000.000, 'Jordan 5s CNY', 0, 0, '2019-01-24 10:32:25', '2019-01-24 10:32:25'),
(80, 16, 'Đen', '38', 20, 'dsc03782.png', 1750000.000, 1500000.000, 'Jordan 5s CNY', 0, 0, '2019-01-24 10:32:25', '2019-01-24 10:32:25'),
(81, 16, 'Đen', '39', 20, 'dsc03782.png', 1750000.000, 1500000.000, 'Jordan 5s CNY', 0, 0, '2019-01-24 10:32:25', '2019-01-24 10:32:25'),
(82, 16, 'Đen', '40', 20, 'dsc03782.png', 1750000.000, 1500000.000, 'Jordan 5s CNY', 0, 0, '2019-01-24 10:32:25', '2019-01-24 10:32:25'),
(83, 16, 'Đen', '41', 20, 'dsc03782.png', 1750000.000, 1500000.000, 'Jordan 5s CNY', 0, 0, '2019-01-24 10:32:25', '2019-01-24 10:32:25'),
(84, 16, 'Đen', '42', 20, 'dsc03782.png', 1750000.000, 1500000.000, 'Jordan 5s CNY', 0, 0, '2019-01-24 10:32:25', '2019-01-24 10:32:25'),
(85, 16, 'Đen', '43', 20, 'dsc03782.png', 1750000.000, 1500000.000, 'Jordan 5s CNY', 0, 0, '2019-01-24 10:32:25', '2019-01-24 10:32:25'),
(86, 16, 'Đen', '44', 20, 'dsc03782.png', 1750000.000, 1500000.000, 'Jordan 5s CNY', 0, 0, '2019-01-24 10:32:25', '2019-01-24 10:32:25'),
(87, 23, 'Đen', '35', 20, '48361652_1864375733673343_3292150289888444416_n.jpg', 15000000.000, 12500000.000, 'Yeezy 350 - Oreo', 0, 0, '2019-01-24 18:26:17', '2019-01-24 18:26:17'),
(88, 23, 'Đen', '36', 20, '48361652_1864375733673343_3292150289888444416_n.jpg', 15000000.000, 12500000.000, 'Yeezy 350 - Oreo', 0, 0, '2019-01-24 18:26:17', '2019-01-24 18:26:17'),
(89, 23, 'Đen', '37', 20, '48361652_1864375733673343_3292150289888444416_n.jpg', 15000000.000, 12500000.000, 'Yeezy 350 - Oreo', 0, 0, '2019-01-24 18:26:17', '2019-01-24 18:26:17'),
(90, 23, 'Đen', '38', 20, '48361652_1864375733673343_3292150289888444416_n.jpg', 15000000.000, 12500000.000, 'Yeezy 350 - Oreo', 0, 0, '2019-01-24 18:26:17', '2019-01-24 18:26:17'),
(91, 23, 'Đen', '39', 20, '48361652_1864375733673343_3292150289888444416_n.jpg', 15000000.000, 12500000.000, 'Yeezy 350 - Oreo', 0, 0, '2019-01-24 18:26:17', '2019-01-24 18:26:17'),
(92, 23, 'Đen', '40', 20, '48361652_1864375733673343_3292150289888444416_n.jpg', 15000000.000, 12500000.000, 'Yeezy 350 - Oreo', 0, 0, '2019-01-24 18:26:18', '2019-01-24 18:26:18'),
(93, 23, 'Đen', '41', 20, '48361652_1864375733673343_3292150289888444416_n.jpg', 15000000.000, 12500000.000, 'Yeezy 350 - Oreo', 0, 0, '2019-01-24 18:26:18', '2019-01-24 18:26:18'),
(94, 23, 'Đen', '42', 20, '48361652_1864375733673343_3292150289888444416_n.jpg', 15000000.000, 12500000.000, 'Yeezy 350 - Oreo', 0, 0, '2019-01-24 18:26:18', '2019-01-24 18:26:18'),
(95, 23, 'Đen', '43', 20, '48361652_1864375733673343_3292150289888444416_n.jpg', 15000000.000, 12500000.000, 'Yeezy 350 - Oreo', 0, 0, '2019-01-24 18:26:18', '2019-01-24 18:26:18'),
(96, 23, 'Đen', '44', 20, '48361652_1864375733673343_3292150289888444416_n.jpg', 15000000.000, 12500000.000, 'Yeezy 350 - Oreo', 0, 0, '2019-01-24 18:26:18', '2019-01-24 18:26:18'),
(97, 24, 'Trắng', '35', 20, 'dsc03548.png', 3050000.000, 1950000.000, 'Jordan 3s Tinker Hatfield', 0, 0, '2019-01-25 19:29:10', '2019-01-25 19:29:10'),
(98, 24, 'Trắng', '36', 20, 'dsc03548.png', 3050000.000, 1950000.000, 'Jordan 3s Tinker Hatfield', 0, 0, '2019-01-25 19:29:10', '2019-01-25 19:29:10'),
(99, 24, 'Trắng', '37', 20, 'dsc03548.png', 3050000.000, 1950000.000, 'Jordan 3s Tinker Hatfield', 0, 0, '2019-01-25 19:29:10', '2019-01-25 19:29:10'),
(100, 24, 'Trắng', '38', 20, 'dsc03548.png', 3050000.000, 1950000.000, 'Jordan 3s Tinker Hatfield', 0, 0, '2019-01-25 19:29:10', '2019-01-25 19:29:10'),
(101, 24, 'Trắng', '39', 20, 'dsc03548.png', 3050000.000, 1950000.000, 'Jordan 3s Tinker Hatfield', 0, 0, '2019-01-25 19:29:11', '2019-01-25 19:29:11'),
(102, 24, 'Trắng', '40', 20, 'dsc03548.png', 3050000.000, 1950000.000, 'Jordan 3s Tinker Hatfield', 0, 0, '2019-01-25 19:29:11', '2019-01-25 19:29:11'),
(103, 24, 'Trắng', '41', 20, 'dsc03548.png', 3050000.000, 1950000.000, 'Jordan 3s Tinker Hatfield', 0, 0, '2019-01-25 19:29:11', '2019-01-25 19:29:11'),
(104, 24, 'Trắng', '42', 20, 'dsc03548.png', 3050000.000, 1950000.000, 'Jordan 3s Tinker Hatfield', 0, 0, '2019-01-25 19:29:11', '2019-01-25 19:29:11'),
(105, 24, 'Trắng', '43', 20, 'dsc03548.png', 3050000.000, 1950000.000, 'Jordan 3s Tinker Hatfield', 0, 0, '2019-01-25 19:29:11', '2019-01-25 19:29:11'),
(106, 24, 'Trắng', '44', 20, 'dsc03548.png', 3050000.000, 1950000.000, 'Jordan 3s Tinker Hatfield', 0, 0, '2019-01-25 19:29:11', '2019-01-25 19:29:11'),
(107, 15, 'Trắng', '36', 18, 'dsc03862.png', 1700000.000, 1250000.000, 'Jordan 11s Platinum Tint', 0, 0, '2019-01-25 19:33:07', '2019-03-23 02:03:47'),
(108, 15, 'Trắng', '37', 20, 'dsc03862.png', 1700000.000, 1250000.000, 'Jordan 11s Platinum Tint', 0, 0, '2019-01-25 19:33:07', '2019-01-25 19:33:07'),
(109, 15, 'Trắng', '38', 20, 'dsc03862.png', 1700000.000, 1250000.000, 'Jordan 11s Platinum Tint', 0, 0, '2019-01-25 19:33:07', '2019-01-25 19:33:07'),
(110, 15, 'Trắng', '39', 20, 'dsc03862.png', 1700000.000, 1250000.000, 'Jordan 11s Platinum Tint', 0, 0, '2019-01-25 19:33:07', '2019-01-25 19:33:07'),
(111, 15, 'Trắng', '40', 20, 'dsc03862.png', 1700000.000, 1250000.000, 'Jordan 11s Platinum Tint', 0, 0, '2019-01-25 19:33:07', '2019-01-25 19:33:07'),
(112, 15, 'Trắng', '41', 20, 'dsc03862.png', 1700000.000, 1250000.000, 'Jordan 11s Platinum Tint', 0, 0, '2019-01-25 19:33:07', '2019-01-25 19:33:07'),
(113, 15, 'Trắng', '42', 20, 'dsc03862.png', 1700000.000, 1250000.000, 'Jordan 11s Platinum Tint', 0, 0, '2019-01-25 19:33:07', '2019-01-25 19:33:07'),
(114, 15, 'Trắng', '43', 20, 'dsc03862.png', 1700000.000, 1250000.000, 'Jordan 11s Platinum Tint', 0, 0, '2019-01-25 19:33:07', '2019-01-25 19:33:07'),
(115, 15, 'Trắng', '44', 20, 'dsc03862.png', 1700000.000, 1250000.000, 'Jordan 11s Platinum Tint', 0, 0, '2019-01-25 19:33:07', '2019-01-25 19:33:07'),
(116, 25, 'Xanh-Đen', '35', 20, 'dsc03852.png', 1600000.000, 1400000.000, 'Jordan 1s All Star', 0, 0, '2019-01-25 19:36:25', '2019-01-25 19:36:25'),
(117, 25, 'Xanh-Đen', '36', 20, 'dsc03852.png', 1600000.000, 1400000.000, 'Jordan 1s All Star', 0, 0, '2019-01-25 19:36:25', '2019-01-25 19:36:25'),
(118, 25, 'Xanh-Đen', '37', 20, 'dsc03852.png', 1600000.000, 1400000.000, 'Jordan 1s All Star', 0, 0, '2019-01-25 19:36:25', '2019-01-25 19:36:25'),
(119, 25, 'Xanh-Đen', '38', 20, 'dsc03852.png', 1600000.000, 1400000.000, 'Jordan 1s All Star', 0, 0, '2019-01-25 19:36:25', '2019-01-25 19:36:25'),
(120, 25, 'Xanh-Đen', '39', 20, 'dsc03852.png', 1600000.000, 1400000.000, 'Jordan 1s All Star', 0, 0, '2019-01-25 19:36:25', '2019-01-25 19:36:25'),
(121, 25, 'Xanh-Đen', '40', 20, 'dsc03852.png', 1600000.000, 1400000.000, 'Jordan 1s All Star', 0, 0, '2019-01-25 19:36:25', '2019-01-25 19:36:25'),
(122, 25, 'Xanh-Đen', '41', 20, 'dsc03852.png', 1600000.000, 1400000.000, 'Jordan 1s All Star', 0, 0, '2019-01-25 19:36:25', '2019-01-25 19:36:25'),
(123, 25, 'Xanh-Đen', '42', 20, 'dsc03852.png', 1600000.000, 1400000.000, 'Jordan 1s All Star', 0, 0, '2019-01-25 19:36:25', '2019-01-25 19:36:25'),
(124, 25, 'Xanh-Đen', '43', 20, 'dsc03852.png', 1600000.000, 1400000.000, 'Jordan 1s All Star', 0, 0, '2019-01-25 19:36:25', '2019-01-25 19:36:25'),
(125, 25, 'Xanh-Đen', '44', 20, 'dsc03852.png', 1600000.000, 1400000.000, 'Jordan 1s All Star', 0, 0, '2019-01-25 19:36:25', '2019-01-25 19:36:25'),
(126, 26, 'Đỏ', '35', 15, 'dsc02483.png', 1700000.000, 1190000.000, 'Jordan 11s Win Like 96', 0, 0, '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(127, 26, 'Đỏ', '36', 15, 'dsc02483.png', 1700000.000, 1190000.000, 'Jordan 11s Win Like 96', 0, 0, '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(128, 26, 'Đỏ', '37', 15, 'dsc02483.png', 1700000.000, 1190000.000, 'Jordan 11s Win Like 96', 0, 0, '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(129, 26, 'Đỏ', '38', 15, 'dsc02483.png', 1700000.000, 1190000.000, 'Jordan 11s Win Like 96', 0, 0, '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(130, 26, 'Đỏ', '39', 15, 'dsc02483.png', 1700000.000, 1190000.000, 'Jordan 11s Win Like 96', 0, 0, '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(131, 26, 'Đỏ', '40', 15, 'dsc02483.png', 1700000.000, 1190000.000, 'Jordan 11s Win Like 96', 0, 0, '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(132, 26, 'Đỏ', '41', 15, 'dsc02483.png', 1700000.000, 1190000.000, 'Jordan 11s Win Like 96', 0, 0, '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(133, 26, 'Đỏ', '42', 15, 'dsc02483.png', 1700000.000, 1190000.000, 'Jordan 11s Win Like 96', 0, 0, '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(134, 26, 'Đỏ', '43', 15, 'dsc02483.png', 1700000.000, 1190000.000, 'Jordan 11s Win Like 96', 0, 0, '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(135, 26, 'Đỏ', '44', 15, 'dsc02483.png', 1700000.000, 1190000.000, 'Jordan 11s Win Like 96', 0, 0, '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(136, 27, 'Đỏ', '35', 20, 'img-0369.png', 1600000.000, 1440000.000, 'Jordan 6S Slamdunk', 0, 0, '2019-01-25 19:40:20', '2019-01-25 19:40:20'),
(137, 27, 'Đỏ', '36', 20, 'img-0369.png', 1600000.000, 1440000.000, 'Jordan 6S Slamdunk', 0, 0, '2019-01-25 19:40:20', '2019-01-25 19:40:20'),
(138, 27, 'Đỏ', '37', 20, 'img-0369.png', 1600000.000, 1440000.000, 'Jordan 6S Slamdunk', 0, 0, '2019-01-25 19:40:20', '2019-01-25 19:40:20'),
(139, 27, 'Đỏ', '38', 20, 'img-0369.png', 1600000.000, 1440000.000, 'Jordan 6S Slamdunk', 0, 0, '2019-01-25 19:40:20', '2019-01-25 19:40:20'),
(140, 27, 'Đỏ', '39', 20, 'img-0369.png', 1600000.000, 1440000.000, 'Jordan 6S Slamdunk', 0, 0, '2019-01-25 19:40:20', '2019-01-25 19:40:20'),
(141, 27, 'Đỏ', '40', 19, 'img-0369.png', 1600000.000, 1440000.000, 'Jordan 6S Slamdunk', 0, 0, '2019-01-25 19:40:20', '2019-01-25 20:42:37'),
(142, 27, 'Đỏ', '41', 20, 'img-0369.png', 1600000.000, 1440000.000, 'Jordan 6S Slamdunk', 0, 0, '2019-01-25 19:40:20', '2019-01-25 19:40:20'),
(143, 27, 'Đỏ', '42', 20, 'img-0369.png', 1600000.000, 1440000.000, 'Jordan 6S Slamdunk', 0, 0, '2019-01-25 19:40:21', '2019-01-25 19:40:21'),
(144, 27, 'Đỏ', '43', 20, 'img-0369.png', 1600000.000, 1440000.000, 'Jordan 6S Slamdunk', 0, 0, '2019-01-25 19:40:21', '2019-01-25 19:40:21'),
(145, 27, 'Đỏ', '44', 20, 'img-0369.png', 1600000.000, 1440000.000, 'Jordan 6S Slamdunk', 0, 0, '2019-01-25 19:40:21', '2019-01-25 19:40:21'),
(146, 28, 'Xanh dương', '35', 17, 'dsc03774.png', 2100000.000, 1900000.000, 'Jordan 4s Travis Scott', 0, 0, '2019-01-25 19:49:57', '2019-04-08 18:12:44'),
(147, 28, 'Xanh dương', '36', 20, 'dsc03774.png', 2100000.000, 1900000.000, 'Jordan 4s Travis Scott', 0, 0, '2019-01-25 19:49:57', '2019-01-25 19:49:57'),
(148, 28, 'Xanh dương', '37', 20, 'dsc03774.png', 2100000.000, 1900000.000, 'Jordan 4s Travis Scott', 0, 0, '2019-01-25 19:49:57', '2019-01-25 19:49:57'),
(149, 28, 'Xanh dương', '38', 20, 'dsc03774.png', 2100000.000, 1900000.000, 'Jordan 4s Travis Scott', 0, 0, '2019-01-25 19:49:57', '2019-01-25 19:49:57'),
(150, 28, 'Xanh dương', '39', 20, 'dsc03774.png', 2100000.000, 1900000.000, 'Jordan 4s Travis Scott', 0, 0, '2019-01-25 19:49:57', '2019-01-25 19:49:57'),
(151, 28, 'Xanh dương', '40', 20, 'dsc03774.png', 2100000.000, 1900000.000, 'Jordan 4s Travis Scott', 0, 0, '2019-01-25 19:49:57', '2019-01-25 19:49:57'),
(152, 28, 'Xanh dương', '41', 20, 'dsc03774.png', 2100000.000, 1900000.000, 'Jordan 4s Travis Scott', 0, 0, '2019-01-25 19:49:57', '2019-01-25 19:49:57'),
(153, 28, 'Xanh dương', '42', 20, 'dsc03774.png', 2100000.000, 1900000.000, 'Jordan 4s Travis Scott', 0, 0, '2019-01-25 19:49:57', '2019-01-25 19:49:57'),
(154, 28, 'Xanh dương', '43', 20, 'dsc03774.png', 2100000.000, 1900000.000, 'Jordan 4s Travis Scott', 0, 0, '2019-01-25 19:49:58', '2019-01-25 19:49:58'),
(155, 28, 'Xanh dương', '44', 19, 'dsc03774.png', 2100000.000, 1900000.000, 'Jordan 4s Travis Scott', 0, 0, '2019-01-25 19:49:58', '2019-01-25 20:36:58'),
(156, 29, 'Xám', '35', 15, 'dsc08466.png', 8200000.000, 7700000.000, 'Yeezy 700 v2 Static', 0, 0, '2019-01-25 19:54:20', '2019-03-23 01:55:55'),
(157, 29, 'Xám', '36', 19, 'dsc08466.png', 8200000.000, 7700000.000, 'Yeezy 700 v2 Static', 0, 0, '2019-01-25 19:54:20', '2019-03-23 04:48:24'),
(158, 29, 'Xám', '37', 20, 'dsc08466.png', 8200000.000, 7700000.000, 'Yeezy 700 v2 Static', 0, 0, '2019-01-25 19:54:20', '2019-01-25 19:54:20'),
(159, 29, 'Xám', '38', 20, 'dsc08466.png', 8200000.000, 7700000.000, 'Yeezy 700 v2 Static', 0, 0, '2019-01-25 19:54:20', '2019-01-25 19:54:20'),
(160, 29, 'Xám', '39', 20, 'dsc08466.png', 8200000.000, 7700000.000, 'Yeezy 700 v2 Static', 0, 0, '2019-01-25 19:54:20', '2019-01-25 19:54:20'),
(161, 29, 'Xám', '40', 20, 'dsc08466.png', 8200000.000, 7700000.000, 'Yeezy 700 v2 Static', 0, 0, '2019-01-25 19:54:20', '2019-01-25 19:54:20'),
(162, 29, 'Xám', '41', 20, 'dsc08466.png', 8200000.000, 7700000.000, 'Yeezy 700 v2 Static', 0, 0, '2019-01-25 19:54:20', '2019-01-25 19:54:20'),
(163, 29, 'Xám', '42', 20, 'dsc08466.png', 8200000.000, 7700000.000, 'Yeezy 700 v2 Static', 0, 0, '2019-01-25 19:54:21', '2019-01-25 19:54:21'),
(164, 29, 'Xám', '43', 18, 'dsc08466.png', 8200000.000, 7700000.000, 'Yeezy 700 v2 Static', 0, 0, '2019-01-25 19:54:21', '2019-01-25 20:42:37'),
(165, 29, 'Xám', '44', 20, 'dsc08466.png', 8200000.000, 7700000.000, 'Yeezy 700 v2 Static', 0, 0, '2019-01-25 19:54:21', '2019-01-25 19:54:21'),
(166, 30, 'Tan', '35', 17, 'dsc02435.png', 7600000.000, 5800000.000, 'YEEZY 500 BLUSH', 0, 0, '2019-01-25 19:56:22', '2019-01-26 03:20:43'),
(167, 30, 'Tan', '36', 19, 'dsc02435.png', 7600000.000, 5800000.000, 'YEEZY 500 BLUSH', 0, 0, '2019-01-25 19:56:22', '2019-03-22 18:29:24'),
(168, 30, 'Tan', '37', 20, 'dsc02435.png', 7600000.000, 5800000.000, 'YEEZY 500 BLUSH', 0, 0, '2019-01-25 19:56:22', '2019-01-25 19:56:22'),
(169, 30, 'Tan', '38', 20, 'dsc02435.png', 7600000.000, 5800000.000, 'YEEZY 500 BLUSH', 0, 0, '2019-01-25 19:56:22', '2019-01-25 19:56:22'),
(170, 30, 'Tan', '39', 19, 'dsc02435.png', 7600000.000, 5800000.000, 'YEEZY 500 BLUSH', 0, 0, '2019-01-25 19:56:22', '2019-01-25 20:36:57'),
(171, 30, 'Tan', '40', 19, 'dsc02435.png', 7600000.000, 5800000.000, 'YEEZY 500 BLUSH', 0, 0, '2019-01-25 19:56:22', '2019-01-25 20:36:57'),
(172, 30, 'Tan', '41', 20, 'dsc02435.png', 7600000.000, 5800000.000, 'YEEZY 500 BLUSH', 0, 0, '2019-01-25 19:56:22', '2019-01-25 19:56:22'),
(173, 30, 'Tan', '42', 20, 'dsc02435.png', 7600000.000, 5800000.000, 'YEEZY 500 BLUSH', 0, 0, '2019-01-25 19:56:22', '2019-01-25 19:56:22'),
(174, 30, 'Tan', '43', 20, 'dsc02435.png', 7600000.000, 5800000.000, 'YEEZY 500 BLUSH', 0, 0, '2019-01-25 19:56:22', '2019-01-25 19:56:22'),
(175, 30, 'Tan', '44', 20, 'dsc02435.png', 7600000.000, 5800000.000, 'YEEZY 500 BLUSH', 0, 0, '2019-01-25 19:56:22', '2019-01-25 19:56:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(14, 14, 'dsc05111.png', '2019-01-16 08:28:23', '2019-01-16 08:28:23'),
(16, 14, 'dsc05113-jpg.jpg', '2019-01-16 08:28:23', '2019-01-16 08:28:23'),
(17, 14, 'dsc05114-jpg.jpg', '2019-01-16 08:28:23', '2019-01-16 08:28:23'),
(20, 14, 'dsc05147-jpg.jpg', '2019-01-16 08:28:23', '2019-01-16 08:28:23'),
(21, 14, 'dsc05149-jpg.jpg', '2019-01-16 08:28:23', '2019-01-16 08:28:23'),
(23, 14, 'dsc05153-jpg.jpg', '2019-01-16 08:28:23', '2019-01-16 08:28:23'),
(25, 14, 'dsc05155-jpg.jpg', '2019-01-16 08:28:24', '2019-01-16 08:28:24'),
(26, 14, 'dsc05156-jpg.jpg', '2019-01-16 08:28:24', '2019-01-16 08:28:24'),
(27, 14, 'dsc05158-jpg.jpg', '2019-01-16 08:28:24', '2019-01-16 08:28:24'),
(28, 15, 'dsc03862.png', '2019-01-16 08:31:45', '2019-01-16 08:31:45'),
(30, 15, 'dsc03864-jpg.jpg', '2019-01-16 08:31:45', '2019-01-16 08:31:45'),
(31, 15, 'dsc03865-jpg.jpg', '2019-01-16 08:31:45', '2019-01-16 08:31:45'),
(33, 15, 'dsc03869-jpg.jpg', '2019-01-16 08:31:46', '2019-01-16 08:31:46'),
(35, 15, 'dsc05579-jpg.jpg', '2019-01-16 08:31:46', '2019-01-16 08:31:46'),
(38, 15, 'dsc05582-jpg.jpg', '2019-01-16 08:31:46', '2019-01-16 08:31:46'),
(40, 15, 'dsc05586-jpg.jpg', '2019-01-16 08:31:46', '2019-01-16 08:31:46'),
(42, 15, 'dsc05591-jpg.jpg', '2019-01-16 08:31:46', '2019-01-16 08:31:46'),
(44, 15, 'dsc05594-jpg.jpg', '2019-01-16 08:31:46', '2019-01-16 08:31:46'),
(45, 16, 'dsc03782.png', '2019-01-16 09:16:22', '2019-01-16 09:16:22'),
(47, 16, 'dsc03784-jpg.jpg', '2019-01-16 09:16:22', '2019-01-16 09:16:22'),
(50, 16, 'dsc05560-jpg.jpg', '2019-01-16 09:16:22', '2019-01-16 09:16:22'),
(52, 16, 'dsc05564-jpg.jpg', '2019-01-16 09:16:23', '2019-01-16 09:16:23'),
(53, 16, 'dsc05566-jpg.jpg', '2019-01-16 09:16:23', '2019-01-16 09:16:23'),
(56, 16, 'dsc05569-jpg.jpg', '2019-01-16 09:16:23', '2019-01-16 09:16:23'),
(58, 16, 'dsc05575-jpg.jpg', '2019-01-16 09:16:23', '2019-01-16 09:16:23'),
(60, 18, 'jd7.png', '2019-01-16 09:20:32', '2019-01-16 09:20:32'),
(61, 18, 'dsc02454-jpg.jpg', '2019-01-16 09:20:32', '2019-01-16 09:20:32'),
(62, 18, 'dsc02455-jpg.jpg', '2019-01-16 09:20:32', '2019-01-16 09:20:32'),
(63, 18, 'nothingbutnet-4-jpg.jpg', '2019-01-16 09:20:32', '2019-01-16 09:20:32'),
(64, 19, 'dsc03805.png', '2019-01-16 09:28:44', '2019-01-16 09:28:44'),
(65, 19, 'dsc03810-jpg.jpg', '2019-01-16 09:28:44', '2019-01-16 09:28:44'),
(66, 19, 'dsc03811-jpg.jpg', '2019-01-16 09:28:44', '2019-01-16 09:28:44'),
(67, 19, 'dsc03815-jpg.jpg', '2019-01-16 09:28:44', '2019-01-16 09:28:44'),
(68, 21, 'dsc02456.jpg', '2019-01-16 09:36:25', '2019-01-16 09:36:25'),
(69, 21, 'dsc02457-jpg.jpg', '2019-01-16 09:36:26', '2019-01-16 09:36:26'),
(70, 21, 'dsc02458-jpg.jpg', '2019-01-16 09:36:26', '2019-01-16 09:36:26'),
(71, 21, 'jordan4-laser-replica-3-jpg.jpg', '2019-01-16 09:36:26', '2019-01-16 09:36:26'),
(72, 21, 'jordan4-laser-replica-5-jpg.jpg', '2019-01-16 09:36:26', '2019-01-16 09:36:26'),
(73, 21, 'jordan4-laser-replica-6-jpg.jpg', '2019-01-16 09:36:26', '2019-01-16 09:36:26'),
(74, 22, 'dsc02413-jpg.jpg', '2019-01-16 09:39:24', '2019-01-16 09:39:24'),
(75, 22, 'dsc02415-jpg.jpg', '2019-01-16 09:39:24', '2019-01-16 09:39:24'),
(76, 22, 'hu_ava.png', '2019-01-16 09:39:24', '2019-01-16 09:39:24'),
(77, 23, 'dsc02413-jpg.jpg', '2019-01-24 18:26:18', '2019-01-24 18:26:18'),
(78, 23, 'dsc02454-jpg.jpg', '2019-01-24 18:26:18', '2019-01-24 18:26:18'),
(79, 23, 'dsc02456.jpg', '2019-01-24 18:26:18', '2019-01-24 18:26:18'),
(80, 23, 'dsc03782.png', '2019-01-24 18:26:18', '2019-01-24 18:26:18'),
(81, 24, 'dsc03548.png', '2019-01-25 19:29:11', '2019-01-25 19:29:11'),
(82, 24, 'dsc03550-jpg.jpg', '2019-01-25 19:29:11', '2019-01-25 19:29:11'),
(83, 24, 'dsc03552-jpg.jpg', '2019-01-25 19:29:11', '2019-01-25 19:29:11'),
(84, 24, 'dsc03554-jpg.jpg', '2019-01-25 19:29:12', '2019-01-25 19:29:12'),
(85, 25, 'dsc03852.png', '2019-01-25 19:36:25', '2019-01-25 19:36:25'),
(86, 25, 'dsc03854-jpg.jpg', '2019-01-25 19:36:26', '2019-01-25 19:36:26'),
(87, 25, 'dsc03853-jpg.jpg', '2019-01-25 19:36:26', '2019-01-25 19:36:26'),
(88, 26, 'dsc02483.png', '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(89, 26, 'dsc02485-jpg.jpg', '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(90, 26, 'dsc02484-jpg.jpg', '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(91, 26, 'jordan11winlike69-3-jpg.jpg', '2019-01-25 19:38:31', '2019-01-25 19:38:31'),
(92, 27, 'img-0369.png', '2019-01-25 19:45:13', '2019-01-25 19:45:13'),
(93, 27, 'jordan-6-slamdunk-5-jpg.jpg', '2019-01-25 19:45:13', '2019-01-25 19:45:13'),
(94, 27, 'jordan-6-slamdunk-4-jpg.jpg', '2019-01-25 19:45:13', '2019-01-25 19:45:13'),
(95, 27, 'jordan-6-slamdunk-2-jpg.jpg', '2019-01-25 19:45:13', '2019-01-25 19:45:13'),
(96, 28, 'dsc03774.png', '2019-01-25 19:49:58', '2019-01-25 19:49:58'),
(97, 28, 'dsc05600-jpg.jpg', '2019-01-25 19:49:58', '2019-01-25 19:49:58'),
(98, 28, 'dsc05595-jpg.jpg', '2019-01-25 19:49:58', '2019-01-25 19:49:58'),
(99, 28, 'dsc03775-jpg.jpg', '2019-01-25 19:49:58', '2019-01-25 19:49:58'),
(100, 29, 'dsc08466.png', '2019-01-25 19:54:21', '2019-01-25 19:54:21'),
(101, 29, 'dsc08508-jpg.jpg', '2019-01-25 19:54:21', '2019-01-25 19:54:21'),
(102, 29, 'dsc08492-jpg.jpg', '2019-01-25 19:54:21', '2019-01-25 19:54:21'),
(103, 29, 'dsc08490-jpg.jpg', '2019-01-25 19:54:21', '2019-01-25 19:54:21'),
(104, 30, 'dsc02435.png', '2019-01-25 20:33:13', '2019-01-25 20:33:13'),
(106, 30, 'dsc02437-jpg.jpg', '2019-01-25 20:33:13', '2019-01-25 20:33:13'),
(107, 30, 'dsc02436-jpg.jpg', '2019-01-25 20:33:13', '2019-01-25 20:33:13'),
(109, 30, 'dsc08508-jpg.jpg', '2019-01-25 20:35:28', '2019-01-25 20:35:28');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cart_customer` (`customer_id`),
  ADD KEY `FK_cart_product` (`product_id`),
  ADD KEY `FK_cart_product_detail` (`product_detail_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_customer_address_customer` (`customer_id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_orders_customer_address` (`customer_address_id`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_orders_detail_orders` (`orders_id`),
  ADD KEY `FK_orders_detail_product_detail` (`product_detail_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `FK_product_category` (`category_id`),
  ADD KEY `FK_product_brand` (`brand_id`);

--
-- Chỉ mục cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_detail_product` (`product_id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_image_product` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_cart_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `FK_cart_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_cart_product_detail` FOREIGN KEY (`product_detail_id`) REFERENCES `product_detail` (`id`);

--
-- Các ràng buộc cho bảng `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `FK_customer_address_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `FK_orders_detail_orders` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `FK_orders_detail_product_detail` FOREIGN KEY (`product_detail_id`) REFERENCES `product_detail` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `FK_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `FK_product_detail_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `FK_product_image_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
