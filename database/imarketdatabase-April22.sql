-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2017 at 01:31 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imarketdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `user_ID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `houseNum` varchar(15) NOT NULL,
  `street` varchar(50) NOT NULL,
  `building` varchar(50) NOT NULL,
  `subdivision` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zipCode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `board_no` int(10) UNSIGNED NOT NULL,
  `board_title` varchar(100) NOT NULL,
  `board_content` text NOT NULL,
  `board_date` datetime NOT NULL,
  `board_hit` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `board_admin` varchar(20) NOT NULL,
  `board_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`board_no`, `board_title`, `board_content`, `board_date`, `board_hit`, `board_admin`, `board_password`) VALUES
(1, 'Test', 'Test', '2017-04-09 16:16:57', 0, 'admin', '*A4B6157319038724E3560894F7F932C8886EBFCF');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_ID`, `total_price`, `created`, `modified`, `status`) VALUES
(2, 1, 69.00, '2017-04-21 11:08:41', '2017-04-21 11:08:41', '1'),
(3, 1, 5.00, '2017-04-21 11:16:54', '2017-04-21 11:16:54', '1'),
(20, 1, 69.00, '2017-04-21 11:35:37', '2017-04-21 11:35:37', '1'),
(21, 1, 1.00, '2017-04-21 11:48:15', '2017-04-21 11:48:15', '1'),
(22, 1, 207.00, '2017-04-21 12:03:03', '2017-04-21 12:03:03', '1'),
(23, 1, 69.00, '2017-04-21 12:21:14', '2017-04-21 12:21:14', '1'),
(33, 2, 138.00, '2017-04-21 12:49:22', '2017-04-21 12:49:22', '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_ID`, `qty`) VALUES
(2, 2, 23, 1),
(3, 3, 21, 5),
(4, 20, 23, 1),
(5, 21, 21, 1),
(6, 22, 23, 3),
(7, 23, 23, 1),
(8, 33, 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_ID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `productName` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `shortDes` varchar(50) NOT NULL,
  `longDes` varchar(50) NOT NULL,
  `productCategory` text NOT NULL,
  `productImage` varchar(500) NOT NULL,
  `qty` int(100) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `date_update` varchar(50) NOT NULL,
  `productActive` int(11) NOT NULL,
  `productStatus` varchar(50) NOT NULL,
  `genderCategory` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_ID`, `email`, `user_ID`, `productName`, `price`, `shortDes`, `longDes`, `productCategory`, `productImage`, `qty`, `date_created`, `date_update`, `productActive`, `productStatus`, `genderCategory`) VALUES
(27, '', 6, 'Iphone s3', '35000.00', 'wow iphone', '', 'Mobile Phones Accessories', 'IPhone-Apple-PNG-File.png', 3, 'April 22, 2017 5:21:am  ', '', 1, 'OnSale', 'NA'),
(28, '', 6, 'Google Pixel', '35000.00', 'wow pixel ', '', 'Mobile Phones Accessories', 'img_preorder-form_pixel_en-1.png', 12, 'April 22, 2017 5:23:am  ', '', 1, 'OnSale', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `user_ID` varchar(50) DEFAULT NULL,
  `product_comment` varchar(50) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `product_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rate`, `user_ID`, `product_comment`, `product_ID`, `product_date`) VALUES
(1, NULL, NULL, '', 0, '0000-00-00 00:00:00'),
(2, 5, '', '', 0, '0000-00-00 00:00:00'),
(3, 5, '', '', 0, '0000-00-00 00:00:00'),
(4, 5, 'jung@test.com', '', 0, '0000-00-00 00:00:00'),
(5, 5, 'jung@test.com', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `userType` varchar(10) NOT NULL,
  `firstName` varchar(10) NOT NULL,
  `lastName` varchar(10) NOT NULL,
  `contactNum` varchar(15) NOT NULL,
  `birthdate` date NOT NULL,
  `year_level` varchar(10) NOT NULL,
  `course` varchar(15) NOT NULL,
  `strand` varchar(15) NOT NULL,
  `department` varchar(15) NOT NULL,
  `userStatus` int(11) NOT NULL,
  `check_User` int(10) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `date_created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `email`, `password`, `userType`, `firstName`, `lastName`, `contactNum`, `birthdate`, `year_level`, `course`, `strand`, `department`, `userStatus`, `check_User`, `hash`, `date_created`) VALUES
(1, 'jung@test.com', 'Asdf1234', 'admin', 'jaehoon', 'jung', '09112223333', '1992-04-11', '', 'webDev', '', 'love', 1, 1, '', ''),
(2, 'student@test.com', 'Asdf1234', 'student', 'test', 'jung', '090912124545', '1992-04-25', '', '', 'multimedia', '', 1, 3, '', ''),
(3, 'howabout@mail.com', 'Asdf1234', 'student', 'Register', 'New', '0915123454', '1992-02-22', '', 'SE', '', '', 1, 3, '', ''),
(4, 'employee@test.com', 'Asdf1234', 'employee', 'emp', 'loyee', '021242123', '1995-04-03', '2', 'Fashion', '', 'Fashion', 1, 2, '', ''),
(6, 'khellytaguinod@gmail.com', 'Asdf1234', 'student', 'khelly', 'taguinod', '+2345678943', '1996-01-08', '', '', '', '', 1, 0, 'dc6a6489640ca02b0d42dabeb8e46bb7', 'April 21, 2017 3:00:pm  ');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishListID` int(11) NOT NULL,
  `user_ID` varchar(10) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `wishListActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishListID`, `user_ID`, `productName`, `date_created`, `wishListActive`) VALUES
(46, '6', 'Iphone s3', 'April 22, 2017 5:36:am  ', 1),
(47, '6', 'Google Pixel', 'April 22, 2017 5:36:am  ', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`board_no`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishListID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `board_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
