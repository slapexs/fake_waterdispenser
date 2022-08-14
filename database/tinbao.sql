-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 14, 2022 at 11:45 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tinbao`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` text NOT NULL,
  `order_product` int(11) NOT NULL COMMENT 'Products in order',
  `order_amount` int(11) NOT NULL,
  `order_ref_machine` int(1) NOT NULL COMMENT 'ID of machine',
  `order_price` float(11,2) NOT NULL COMMENT 'The total price of all products of this order',
  `order_status` int(1) NOT NULL DEFAULT '0' COMMENT 'Order status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL COMMENT 'ID of product',
  `product_name` varchar(255) NOT NULL DEFAULT 'Undefined' COMMENT 'Name of product',
  `product_amount` int(11) NOT NULL DEFAULT '0' COMMENT 'Amount of product in stock',
  `product_price` float(4,2) NOT NULL COMMENT 'Price of product',
  `product_image` text NOT NULL,
  `product_type` int(11) NOT NULL DEFAULT '0' COMMENT 'ID product type of product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `type_id` int(11) NOT NULL COMMENT 'ID of product type',
  `type_name` varchar(255) DEFAULT 'Undefined' COMMENT 'Name of product type',
  `type_link_icon` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`type_id`, `type_name`, `type_link_icon`) VALUES
(1, 'เมนูแนะนำ', 'https://cdn-icons-png.flaticon.com/512/2872/2872397.png'),
(2, 'กาแฟ', 'https://cdn-icons-png.flaticon.com/512/590/590749.png'),
(3, 'ชา', 'https://cdn-icons-png.flaticon.com/512/5303/5303997.png'),
(4, 'นม โกโก้ และคาราเมล', 'https://cdn-icons-png.flaticon.com/512/3081/3081162.png'),
(5, 'น้ำอัดลม โซดา', 'https://cdn-icons-png.flaticon.com/512/2405/2405479.png'),
(6, 'อื่น ๆ', 'https://cdn-icons-png.flaticon.com/512/2405/2405470.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID of product';

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID of product type', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
