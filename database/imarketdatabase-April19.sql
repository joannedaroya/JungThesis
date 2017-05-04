-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2017 at 03:58 PM
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
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderNumber` varchar(20) NOT NULL,
  `product_ID` varchar(20) NOT NULL,
  `qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `longDes` varchar(500) NOT NULL,
  `productCategory` text,
  `productImage` varchar(500) NOT NULL,
  `QTY` int(100) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `date_update` varchar(50) NOT NULL,
  `productActive` int(11) NOT NULL,
  `productStatus` varchar(50) NOT NULL,
  `genderCategory` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_ID`, `email`, `user_ID`, `productName`, `price`, `shortDes`, `longDes`, `productCategory`, `productImage`, `QTY`, `date_created`, `date_update`, `productActive`, `productStatus`, `genderCategory`) VALUES
(9, 'student@test.com', 0, 'Student selling', '1500.00', 'Bag Joanne', '', 'Clothing and Accessories', '17039167_249734615491460_3671021812189531205_o.jpg', 1, 'April 14, 2017 3:17:pm  ', '', 1, 'onSale', 'man'),
(10, 'employee@test.com', 0, 'Employee seling', '1333.00', 'Khelly Gay', '', 'Bags and Accessories', '17157800_249734612158127_2438998551300752233_o.jpg', 1, 'April 14, 2017 3:19:pm  ', '', 1, 'onSale', 'woman'),
(12, 'khellytaguinod@gmail.com', 0, 'Jung', '1.00', 'sex slave', '', 'Services', '15823147_1197222623707260_6311159534367327688_n.jpg', 1, 'April 15, 2017 1:32:am  ', '', 1, 'onSale', 'man'),
(13, 'khellytaguinod@gmail.com', 0, 'Jamie GOzon', '5.00', 'sex slave', '', 'Services', '12316350_10204803598243193_2169619349611866090_n.jpg', 7, 'April 15, 2017 2:59:am  ', 'April 18, 2017 12:46:am  ', 0, 'onSale', 'man'),
(14, 'khellytaguinod@gmail.com', 0, 'Zane Gozon!!', '122.00', 'asdf213', '', 'Services', '12313993_10204803564522350_7676115571230708624_n.jpg', 213, 'April 15, 2017 3:17:am  ', 'April 18, 2017 12:47:am  ', 1, 'soldOut', 'man'),
(15, 'khellytaguinod@gmail.com', 0, 'Carlo Malixi', '707.00', 'qwaert213456', '', 'Services', '12321480_10204803658764706_7989382903266369952_n.jpg', 234, 'April 15, 2017 3:18:am  ', 'April 18, 2017 12:59:am  ', 1, 'soldOut', 'man'),
(16, 'khellytaguinod@gmail.com', 0, 'joanne', '3.00', 'sex slave 5', '', 'Services', '12308816_10204803564602352_5695523333994529172_n.jpg', 2, 'April 15, 2017 3:19:am  ', '', 0, 'onSale', 'man'),
(17, 'khellytaguinod@gmail.com', 0, 'Zaner Carlo', '5678.00', 'sdfgh12345', '', 'Services', '12321480_10204803658764706_7989382903266369952_n.jpg', 234, 'April 18, 2017 12:45:am  ', '', 0, '', 'NA'),
(18, 'khellytaguinod@gmail.com', 0, 'James tarobal 1', '2134567.00', 'qwedsgfhj', '', 'Services', 'photo_2017-04-18_02-51-58.jpg', 231, 'April 18, 2017 2:50:am  ', 'April 18, 2017 2:52:am  ', 1, '', 'man');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `user_ID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rate`, `user_ID`) VALUES
(1, NULL, NULL),
(2, 5, ''),
(3, 5, ''),
(4, 5, 'jung@test.com'),
(5, 5, 'jung@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `user_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `size` varchar(10) NOT NULL,
  `qty` int(100) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `birthDate` date NOT NULL,
  `year_level` varchar(10) NOT NULL,
  `course` varchar(15) NOT NULL,
  `strand` varchar(15) NOT NULL,
  `department` varchar(15) NOT NULL,
  `userStatus` int(11) NOT NULL,
  `check_User` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `email`, `password`, `userType`, `firstName`, `lastName`, `contactNum`, `birthDate`, `year_level`, `course`, `strand`, `department`, `userStatus`, `check_User`) VALUES
(1, 'jung@test.com', 'Asdf1234', 'admin', 'jaehoon', 'jung', '09112223333', '1992-04-11', '', 'webDev', '', 'love', 1, 1),
(2, 'student@test.com', 'Asdf1234', 'student', 'test', 'jung', '090912124545', '1992-04-25', '', '', 'multimedia', '', 1, 3),
(3, 'howabout@mail.com', 'Asdf1234', 'student', 'Register', 'New', '0915123454', '1992-02-22', '', 'SE', '', '', 1, 3),
(4, 'employee@test.com', 'Asdf1234', 'employee', 'emp', 'loyee', '021242123', '1995-04-03', '2', 'Fashion', '', 'Fashion', 1, 2),
(5, 'khellytaguinod@gmail.com', 'A!1234567', 'student', 'Khelly', 'Taguinod', '+75675675674', '1996-08-01', '', '', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishListID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `wishListActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishListID`, `email`, `productName`, `date_created`, `wishListActive`) VALUES
(6, 'khellytaguinod@gmail.com', 'Zane Gozon!!', 'April 19, 2017 12:16:am  ', 1),
(7, 'khellytaguinod@gmail.com', 'Carlo Malixi', 'April 19, 2017 12:18:am  ', 1),
(8, 'khellytaguinod@gmail.com', 'Jung', 'April 19, 2017 12:19:am  ', 1),
(9, 'khellytaguinod@gmail.com', 'James tarobal 1', 'April 19, 2017 2:02:am  ', 1),
(10, 'student@test.com', 'Student selling', 'April 19, 2017 5:35:pm  ', 1);

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
