-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 08:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admarc_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admarc_branch_products`
--

CREATE TABLE `admarc_branch_products` (
  `abproduct_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admarc_branch_products`
--

INSERT INTO `admarc_branch_products` (`abproduct_id`, `branch_id`, `product_id`) VALUES
(1, 1, 2),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `admarc_products`
--

CREATE TABLE `admarc_products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `primary_product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `buying_price` varchar(100) NOT NULL,
  `selling_price` varchar(10) DEFAULT NULL,
  `qty_obtained` int(11) NOT NULL,
  `qty_remaining` int(11) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `date_start_sale` date DEFAULT NULL,
  `date_end_sale` date DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admarc_products`
--

INSERT INTO `admarc_products` (`product_id`, `category_id`, `from_user`, `primary_product_id`, `product_name`, `buying_price`, `selling_price`, `qty_obtained`, `qty_remaining`, `img_url`, `description`, `date_start_sale`, `date_end_sale`, `date_created`, `date_updated`) VALUES
(2, 1, 5, 4, 'Soya Beans', '200', '300', 1, 0, '886067.jpg', NULL, '2022-03-16', '2022-03-31', '2022-03-09 15:46:35', '2022-03-24 20:14:56'),
(3, 2, 5, 5, 'Sample Product', '2000', '2000', 6, 5, '945786.png', NULL, '2022-03-24', '2022-04-01', '2022-03-09 15:47:05', '2022-03-24 20:38:07'),
(6, 3, 4, 7, 'ProductPepper', '2000', NULL, 10, 10, '396904.jpg', NULL, NULL, NULL, '2022-03-23 17:53:22', '2022-03-23 17:53:41'),
(7, 1, 5, 2, 'UREA Fertilizer', '20000', NULL, 1, 1, '926728.jpg', NULL, NULL, NULL, '2022-03-24 20:38:35', '2022-03-24 20:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `admarc_sales`
--

CREATE TABLE `admarc_sales` (
  `sale_id` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admarc_sales`
--

INSERT INTO `admarc_sales` (`sale_id`, `total`, `user_id`, `payment_type`, `date_created`, `date_updated`) VALUES
(1, '2300', 6, 'NetSoft Money', '2022-03-24 20:14:56', '2022-03-24 20:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `admarc_sale_details`
--

CREATE TABLE `admarc_sale_details` (
  `sale_detail_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `prod_total` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admarc_sale_details`
--

INSERT INTO `admarc_sale_details` (`sale_detail_id`, `sale_id`, `product_id`, `qty`, `prod_total`, `date_created`, `date_updated`) VALUES
(3, 1, 2, 1, '300', '2022-03-24 20:14:56', '2022-03-24 20:14:56'),
(4, 1, 3, 1, '2000', '2022-03-24 20:14:56', '2022-03-24 20:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_phone` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_phone`, `address`, `date_created`, `date_updated`) VALUES
(1, 'Zolozolo', '0993837728', 'Lilonnwe branch', '2022-03-03 22:53:17', '2022-03-06 01:33:24'),
(2, 'Kabudula', '0996670686', 'Address', '2022-03-04 05:06:14', '2022-03-06 01:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `img_url` varchar(255) DEFAULT 'noimage.png',
  `description` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `user_id`, `product_name`, `price`, `qty`, `img_url`, `description`, `date_created`, `date_updated`) VALUES
(2, 1, 5, 'UREA Fertilizer', '20000', 3, '926728.jpg', NULL, '2022-03-04 05:49:30', '2022-03-24 20:38:35'),
(3, 2, 5, 'Maize', '4000', 20, '930460.jpg', NULL, '2022-03-04 08:13:48', '2022-03-23 15:23:19'),
(4, 3, 5, 'Soya Beans', '200', 999, '73092.jpg', NULL, '2022-03-06 01:40:01', '2022-03-23 15:23:22'),
(5, 4, 5, 'Sample Product', '2000', 10, '945786.png', NULL, '2022-03-09 09:18:02', '2022-03-24 20:38:07'),
(7, 3, 4, 'ProductPepper', '2000', 190, '396904.jpg', NULL, '2022-03-23 17:33:11', '2022-03-23 17:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_img` varchar(255) DEFAULT 'noimage.jpg',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`category_id`, `category_name`, `category_img`, `date_created`, `date_update`) VALUES
(1, 'Food Crops', 'noimage.jpg', '2022-03-23 14:08:45', '2022-03-23 14:08:45'),
(2, 'Cash Crops', '302826.jpg', '2022-03-23 14:11:33', '2022-03-23 14:11:33'),
(3, 'Plantation Crops', '406185.jpg', '2022-03-23 14:12:26', '2022-03-23 14:12:26'),
(4, 'Horticulture crops', '663521.jpg', '2022-03-23 14:12:50', '2022-03-23 14:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `user_role` enum('admin','supplier','stock_manager','agent','customer') NOT NULL,
  `account_status` int(11) NOT NULL DEFAULT 1 COMMENT '1= active, 0 = deactivated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `phone`, `email`, `password`, `address`, `user_role`, `account_status`) VALUES
(4, 'Chato', 'Mkanadawire', '0882992942', 'user1@email.com', '$2y$10$w3lAlJtNFpoRYA250VTGaeTwGqMz4YRaTKeDlmeGzv8N4.i13YShy', 'address here', 'stock_manager', 1),
(5, 'Chatonda', 'Mphande', '09932473826', 'agent@gmail.com', '$2y$10$w3lAlJtNFpoRYA250VTGaeTwGqMz4YRaTKeDlmeGzv8N4.i13YShy', 'LL', 'agent', 1),
(6, 'Bless', 'Banda', '0882992942', 'customer@admarc.com', '$2y$10$QX/8mfkw8ebMMVfpq/8PbOF453E6uMNdlXVzmHJNcHxm2p.OLOOG6', 'hahaha', 'customer', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admarc_branch_products`
--
ALTER TABLE `admarc_branch_products`
  ADD PRIMARY KEY (`abproduct_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `admarc_products`
--
ALTER TABLE `admarc_products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `from_user` (`from_user`),
  ADD KEY `primary_product_id` (`primary_product_id`);

--
-- Indexes for table `admarc_sales`
--
ALTER TABLE `admarc_sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admarc_sale_details`
--
ALTER TABLE `admarc_sale_details`
  ADD PRIMARY KEY (`sale_detail_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `sale_id` (`sale_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admarc_branch_products`
--
ALTER TABLE `admarc_branch_products`
  MODIFY `abproduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admarc_products`
--
ALTER TABLE `admarc_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admarc_sales`
--
ALTER TABLE `admarc_sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admarc_sale_details`
--
ALTER TABLE `admarc_sale_details`
  MODIFY `sale_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admarc_branch_products`
--
ALTER TABLE `admarc_branch_products`
  ADD CONSTRAINT `admarc_branch_products_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admarc_branch_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admarc_products`
--
ALTER TABLE `admarc_products`
  ADD CONSTRAINT `admarc_products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admarc_products_ibfk_2` FOREIGN KEY (`from_user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admarc_products_ibfk_3` FOREIGN KEY (`primary_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admarc_sales`
--
ALTER TABLE `admarc_sales`
  ADD CONSTRAINT `admarc_sales_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admarc_sale_details`
--
ALTER TABLE `admarc_sale_details`
  ADD CONSTRAINT `admarc_sale_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `admarc_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admarc_sale_details_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `admarc_sales` (`sale_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
