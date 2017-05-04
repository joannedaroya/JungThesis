-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 05:39 PM
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
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `order_process` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_ID`, `total_price`, `created`, `modified`, `status`, `order_process`) VALUES
(2, 1, 69.00, '2017-04-21 11:08:41', '2017-04-21 11:08:41', '1', ''),
(3, 1, 5.00, '2017-04-21 11:16:54', '2017-04-21 11:16:54', '1', ''),
(20, 1, 69.00, '2017-04-21 11:35:37', '2017-04-21 11:35:37', '1', ''),
(21, 1, 1.00, '2017-04-21 11:48:15', '2017-04-21 11:48:15', '1', ''),
(22, 2, 12.00, '2017-04-22 02:07:52', '2017-04-22 02:07:52', '1', 'Shipping'),
(23, 2, 12.00, '2017-04-22 02:11:20', '2017-04-22 02:11:20', '1', 'Meet up'),
(24, 1, 90.00, '2017-04-24 12:20:53', '2017-04-24 12:20:53', '1', ''),
(25, 1, 5900.00, '2017-04-24 12:27:16', '2017-04-24 12:27:16', '1', ''),
(26, 1, 90.00, '2017-04-24 12:27:44', '2017-04-24 12:27:44', '1', ''),
(27, 1, 12.00, '2017-04-24 12:29:20', '2017-04-24 12:29:20', '1', ''),
(28, 1, 90.00, '2017-04-24 13:04:13', '2017-04-24 13:04:13', '1', ''),
(29, 1, 1000.00, '2017-04-27 18:59:05', '2017-04-27 18:59:05', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `Seller_ID` varchar(50) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `Seller_ID`, `product_ID`, `qty`) VALUES
(2, 2, '0', 23, 1),
(3, 3, '0', 21, 5),
(4, 20, '0', 23, 1),
(5, 21, '0', 21, 1),
(6, 22, '0', 25, 1),
(7, 23, '0', 19, 1),
(8, 24, '0', 28, 1),
(9, 25, '0', 29, 1),
(10, 26, 'Block', 28, 1),
(11, 27, 'jung@test.com', 25, 1),
(12, 28, 'khellytaguinod@gmail.com', 28, 1),
(13, 29, '2', 27, 1);

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
  `productSize` varchar(500) NOT NULL,
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

INSERT INTO `products` (`product_ID`, `email`, `user_ID`, `productName`, `price`, `shortDes`, `longDes`, `productCategory`, `productImage`, `productSize`, `qty`, `date_created`, `date_update`, `productActive`, `productStatus`, `genderCategory`) VALUES
(30, '', 4, 'Suck', '1500.00', 'Hello its sucks', '', 'Mobile Phones Accessories', '17200159_287484471670840_45376129_o.jpg', '', 12, 'April 28, 2017 4:00:am  ', '', 1, 'OnSale', 'NA'),
(31, '', 2, 'Food', '123.00', 'Korean food', '', 'Hobbies, Sports', '17039167_249734615491460_3671021812189531205_o.jpg', '', 111, 'April 28, 2017 4:01:am  ', '', 1, 'OnSale', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `user_ID` varchar(50) DEFAULT NULL,
  `reply_id` int(10) NOT NULL,
  `product_comment` varchar(50) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `product_date` datetime NOT NULL,
  `seller_id` int(10) NOT NULL,
  `seller_rate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rate`, `user_ID`, `reply_id`, `product_comment`, `product_ID`, `product_date`, `seller_id`, `seller_rate`) VALUES
(1, 2, NULL, 0, 'Hello', 19, '2017-04-11 00:00:00', 0, 0),
(2, 5, '', 0, '', 21, '2017-04-03 00:00:00', 0, 0),
(3, 3, '', 0, 'Hi', 23, '2017-04-09 00:00:00', 0, 0),
(4, 5, 'jung@test.com', 0, '', 24, '0000-00-00 00:00:00', 0, 0),
(5, 4, 'jung@test.com', 0, '', 25, '2017-04-03 00:00:00', 0, 0),
(6, 5, '1', 6, 'please work', 29, '0000-00-00 00:00:00', 0, 0),
(7, 5, '1', 7, 'thank you', 29, '2017-04-25 08:17:47', 0, 0),
(8, 1, '1', 8, 'asdfasdf', 29, '2017-04-25 08:28:06', 0, 0),
(9, 3, '1', 9, 'I give you 3 for late meet up', 29, '2017-04-25 08:53:37', 0, 0),
(10, 3, '1', 10, 'test', 28, '2017-04-25 11:43:16', 0, 0),
(11, 5, '1', 11, 'good', 29, '2017-04-27 12:58:11', 0, 0),
(12, 4, '1', 12, 'test', 28, '2017-04-27 15:28:35', 0, 0),
(13, 2, '1', 13, 'slow', 29, '2017-04-27 15:35:58', 0, 0),
(14, 2, '1', 14, 'student account test', 29, '2017-04-27 16:03:03', 0, 0),
(15, 2, '0', 15, 'test', 29, '2017-04-27 16:06:43', 0, 0),
(16, 2, '0', 16, 'aga', 29, '2017-04-27 16:08:21', 0, 0),
(17, 4, '0', 17, 'agae', 29, '2017-04-27 16:10:07', 0, 0),
(18, 3, '0', 18, 'asdfasdf', 29, '2017-04-27 16:15:05', 0, 0),
(21, 5, 'student@test.com', 21, 'Edit test', 29, '2017-04-27 18:20:34', 0, 0),
(22, 4, 'student@test.com', 22, 'Edit will test', 29, '2017-04-27 18:20:41', 0, 0),
(23, 3, 'student@test.com', 23, 'Trying to test', 29, '2017-04-27 18:20:49', 0, 0),
(26, 1, 'student@test.com', 26, 'test', 31, '2017-04-27 22:17:18', 2, 0),
(27, 5, 'student@test.com', 27, 'test', 31, '2017-04-27 22:19:31', 2, 1),
(28, 1, 'student@test.com', 28, 'test sell 5', 31, '2017-04-27 22:19:53', 2, 5),
(29, 3, 'student@test.com', 29, 'test', 30, '2017-04-27 22:54:03', 4, 5),
(30, 1, 'student@test.com', 30, '1 for product 5 for seller', 30, '2017-04-27 22:58:04', 4, 5),
(31, 3, 'student@test.com', 31, '3 all', 30, '2017-04-27 22:58:47', 4, 3),
(32, 2, 'student@test.com', 32, 'Lost data ?', 30, '2017-04-27 23:02:41', 4, 2),
(33, 4, 'student@test.com', 33, 'testing at home. 4stars each', 30, '2017-04-28 09:31:51', 4, 4);

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
(6, 'khellytaguinod@gmail.com', 'Asdf1234', 'student', 'khelly', 'taguinod', '+2345678943', '1996-01-08', '', '', '', '', 1, 0, 'dc6a6489640ca02b0d42dabeb8e46bb7', 'April 21, 2017 3:00:pm  '),
(7, 'james@sulit.com', 'Asdf1234', 'student', 'James', 'Sulit', '097655765', '1997-04-13', '', '', '', '', 0, 0, '7cbbc409ec990f19c78c75bd1e06f215', 'April 22, 2017 7:55:am  '),
(8, 'yeaho@yeah.com', 'Asdf1234', 'student', 'Kiel', 'Daroya', '097654232', '1997-04-13', '1st Year', 'SE', 'Computer Progra', '', 0, 0, '8b6dd7db9af49e67306feb59a8bdc52c', 'April 22, 2017 8:01:am  ');

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
(33, '6', 'test test test', 'April 20, 2017 10:53:pm  ', 1),
(35, '6', 'Product 1', 'April 21, 2017 1:02:pm  ', 0),
(36, '6', 'Product 1', 'April 21, 2017 2:22:pm  ', 1),
(37, '6', 'Bo sack noodle', 'April 21, 2017 3:42:pm  ', 1),
(38, '2', '', 'April 22, 2017 7:37:am  ', 0),
(39, '2', '', 'April 28, 2017 1:00:am  ', 0),
(40, '2', '', 'April 28, 2017 1:06:am  ', 0),
(41, '2', '', 'April 28, 2017 1:07:am  ', 0),
(42, '2', '', 'April 28, 2017 1:07:am  ', 0),
(43, '2', 'block', 'April 28, 2017 1:07:am  ', 0),
(44, '2', 'block', 'April 28, 2017 1:08:am  ', 0),
(45, '2', '', 'April 28, 2017 1:21:am  ', 0),
(46, '2', '', 'April 28, 2017 1:21:am  ', 0),
(47, '2', 'block', 'April 28, 2017 1:21:am  ', 0),
(48, '2', '', 'April 28, 2017 5:45:am  ', 0),
(49, '2', 'Food', 'April 28, 2017 5:45:am  ', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
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
