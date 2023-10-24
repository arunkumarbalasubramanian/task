-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 12:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task1`
--

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(100) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `Trade A` varchar(100) NOT NULL,
  `Trade B` varchar(100) NOT NULL,
  `Trade C` varchar(100) NOT NULL,
  `Trade D` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `vendor`, `Trade A`, `Trade B`, `Trade C`, `Trade D`) VALUES
(1, 'vendor1', '12', '12', 'N/A', '6'),
(2, 'vendor2', '10', '8', '20', 'N/A'),
(3, 'vendor3', 'N/A', '25', '3', '16'),
(4, 'vendor4', '9', 'N/A', '16', '30'),
(5, 'vendor5', '5', '11', 'N/A', '30');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `tags`, `vendor`, `discount`) VALUES
(1, 'test product1', 12.50, 'TRADE A,ice', 'Vendor 5', 0),
(2, 'test product2', 42.50, 'TRADE B,ice2', 'Vendor 4', 0),
(3, 'test product3', 200.00, 'TRADE C,test', 'Vendor 3', 3),
(4, 'test product4', 52.50, 'TRADE C,test', 'Vendor 2', 0),
(5, 'test product5', 712.50, 'TRADE D,test', 'Vendor 1', 0),
(6, 'test product6', 17.00, 'TRADE A,test', 'Vendor 3', 12),
(7, 'test product7', 55.00, 'TRADE A,test', 'Vendor 3', 12),
(8, 'test product11', 37.00, 'TRADE D,test', 'Vendor 4', 12),
(9, 'test product9', 82.00, 'TRADE C,test', 'Vendor 4', 34),
(10, 'test product10', 52.00, 'TRADE B,test', 'Vendor 2', 25),
(11, 'test product22', 102.00, 'TRADE B,test', 'Vendor 1', 25),
(12, 'test product457', 172.50, 'TRADE B,test', 'Vendor 4', 0),
(13, 'test product15', 100.00, 'TRADE D,test', 'Vendor 5', 12),
(14, 'test product33', 99.50, 'TRADE D,test', 'Vendor 5', 12),
(15, 'test product85', 87.50, 'TRADE A,test', 'Vendor 5', 0),
(16, 'test product63', 57.00, 'TRADE A,test', 'Vendor 1', 29),
(17, 'test product74', 10.00, 'TRADE C,test', 'Vendor 2', 0),
(18, 'test product102', 412.50, 'TRADE D,test', 'Vendor 3', 56),
(19, 'test product358', 112.50, 'TRADE B,test', 'Vendor 4', 0),
(20, 'test product568', 102.00, 'TRADE B,test', 'Vendor 5', 15),
(21, 'test product475', 52.00, 'TRADE A,test', 'Vendor 3', 12),
(22, 'test product28', 32.00, 'TRADE C,test', 'Vendor 2', 0),
(23, 'test product1405', 12.00, 'TRADE B,test', 'Vendor 4', 0),
(24, 'test product389', 584.50, 'TRADE D,test', 'Vendor 1', 0),
(25, 'test product555', 67.00, 'TRADE D,test', 'Vendor 5', 0),
(26, 'test product444', 132.50, 'TRADE A,test', 'Vendor 5', 5),
(27, 'test product333', 42.50, 'TRADE B,test', 'Vendor 2', 8);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(100) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `orgprice` varchar(100) NOT NULL,
  `discountpercentage` varchar(100) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `Total Price` int(100) NOT NULL,
  `discountprice` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `productname`, `orgprice`, `discountpercentage`, `vendor`, `Total Price`, `discountprice`) VALUES
(200, 'test product1', '12.50', '0', 'Vendor 5', 0, '12.50'),
(201, 'test product2', '42.50', '0', 'Vendor 4', 0, '42.50'),
(202, 'test product358', '112.50', '0', 'Vendor 4', 0, '112.50'),
(203, 'test product63', '57.00', '29', 'Vendor 1', 0, '40.47'),
(204, 'test product475', '52.00', '12', 'Vendor 3', 0, '45.76'),
(215, 'test product1', '12.50', '0', 'Vendor 5', 0, '12.50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
