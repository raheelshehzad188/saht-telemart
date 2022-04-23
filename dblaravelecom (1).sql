-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 11:30 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblaravelecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `brand_logo` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(15, 'Apple', 'images/brands/1728527521073578.jpg', '2022-03-22 06:14:54', '2022-03-28 07:25:17'),
(16, 'Samsung', 'images/brands/1727979619595139.jpg', '2022-03-22 06:16:22', '2022-03-22 06:16:22'),
(17, 'Google', 'images/brands/1727979634031869.jpg', '2022-03-22 06:16:36', '2022-03-22 06:16:36'),
(19, 'Meizu', 'images/brands/1728527567991070.jpg', '2022-03-28 07:25:46', '2022-03-28 07:25:46'),
(20, 'Infinix', 'images/brands/1728720352977628.jpg', '2022-03-29 22:30:00', '2022-03-29 22:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(39, 'Men', 1, '2022-03-28 06:54:32', '2022-03-29 21:33:49'),
(40, 'Women', 1, '2022-03-28 06:55:14', '2022-03-28 06:55:14'),
(41, 'Child', 1, '2022-03-28 06:55:17', '2022-03-28 06:55:17'),
(42, 'Laptops', 1, '2022-03-30 07:34:04', '2022-03-30 07:34:04'),
(44, 'Mobiles', 1, '2022-03-29 22:29:24', '2022-03-29 22:29:24'),
(45, 'aadsfas', 1, '2022-04-23 05:30:55', '2022-04-23 05:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `created_at`, `updated_at`) VALUES
(4, 'DIS_W_02', '5', '2022-03-29 03:00:43', '2022-03-29 03:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'freelancerahtesham@gmail.com', '2022-03-23 22:09:17', '2022-03-23 22:09:17'),
(2, 'kamran@gmail.com', '2022-03-23 22:11:31', '2022-03-23 22:11:31'),
(4, 'tanzila@gmail.com', '2022-03-23 22:13:38', '2022-03-23 22:13:38'),
(6, 'aliza@gmail.com', '2022-03-23 22:17:42', '2022-03-23 22:17:42'),
(8, 'abdulwahab@gmail.com', '2022-03-23 22:30:52', '2022-03-23 22:30:52'),
(9, 'samina@gmail.com', '2022-03-25 04:42:35', '2022-03-25 04:42:35'),
(13, 'Azan@gmail.com', '2022-04-03 02:45:44', '2022-04-03 02:45:44'),
(14, 'maestros.official@gmail.com', '2022-04-23 05:14:02', '2022-04-23 05:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title_english` tinytext DEFAULT NULL,
  `title_urdu` tinytext DEFAULT NULL,
  `description_english` text DEFAULT NULL,
  `description_urdu` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(11) NOT NULL,
  `title_english` tinytext DEFAULT NULL,
  `title_urdu` tinytext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `title_english`, `title_urdu`, `created_at`, `updated_at`) VALUES
(2, 'Books', 'کتابیں', '2022-04-09 21:03:38', '2022-04-09 21:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(1000) DEFAULT NULL,
  `product_code` varchar(1000) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_details` text DEFAULT NULL,
  `product_color` text DEFAULT NULL,
  `product_size` text DEFAULT NULL,
  `selling_price` varchar(1000) DEFAULT NULL,
  `discount_price` varchar(1000) DEFAULT NULL,
  `video_link` text DEFAULT NULL,
  `main_slider` int(11) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `best_rated` int(11) DEFAULT NULL,
  `mid_slider` int(11) DEFAULT NULL,
  `hot_new` int(11) DEFAULT NULL,
  `trend` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `image_one` text DEFAULT NULL,
  `image_two` text DEFAULT NULL,
  `image_three` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `product_name`, `product_code`, `product_quantity`, `product_details`, `product_color`, `product_size`, `selling_price`, `discount_price`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `trend`, `status`, `image_one`, `image_two`, `image_three`, `created_at`, `updated_at`) VALUES
(3, 42, NULL, 15, 'Laptop Hp', 'Hp-222K', 21, '<b>Hello</b>', 'red,grey,sky', 'lg,sm,md', '20000', NULL, NULL, 1, 1, 1, 1, 1, 1, 0, '/images/products/1728720203358160.jpg', '/images/products/1729050933386087.jpg', '/images/products/1728720203837610.jpg', '2022-03-30 10:54:43', '2022-04-23 05:31:27'),
(5, 44, 11, 20, 'Infinix Hot 8', 'Inf-222', 5, '<span style=\"color: rgb(85, 85, 85); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.65px;\">Obviously, it improves the user experience. Instead of presenting a boring, static page, AJAX allows you to present a dynamic, responsive, user friendly experience. Users can get immediate feedback that some action they took was right or wrong. No need to submit an entire form before finding out there is a mistake in one field. Important fields can be validated as soon as the data is entered. Or suggestions could be made as the user types.</span>', 'blue,black', '55mm,60mm', '20000', NULL, NULL, 1, 1, 1, 1, 1, 1, 1, '/images/products/1728720641766671.png', '/images/products/1728720641828002.png', '/images/products/1729049777487995.jpg', '2022-03-30 10:54:43', '2022-04-23 05:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `slider_image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 'Mens Clothes', 39, '2022-03-28 06:55:28', '2022-03-28 06:55:28'),
(6, 'Womens Clothes', 40, '2022-03-28 06:55:42', '2022-03-28 06:55:42'),
(7, 'Child Clothes', 41, '2022-03-28 06:55:50', '2022-03-28 06:55:50'),
(8, 'Men Shoes', 39, '2022-03-29 04:20:29', '2022-03-29 04:20:29'),
(9, 'Men Shirts', 39, '2022-03-29 04:20:47', '2022-03-29 04:20:47'),
(10, 'Mens Pents', 39, '2022-03-29 04:20:54', '2022-03-29 04:20:54'),
(11, 'Touch Mobile', 44, '2022-03-29 22:30:40', '2022-03-29 22:30:40'),
(12, 'Hp', 42, '2022-04-03 02:29:35', '2022-04-03 02:29:35'),
(13, 'Lap 1', 42, '2022-04-23 05:31:06', '2022-04-23 05:31:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
