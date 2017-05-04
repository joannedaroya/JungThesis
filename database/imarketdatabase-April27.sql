-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- 생성 시간: 17-04-24 13:09
-- 서버 버전: 10.1.10-MariaDB
-- PHP 버전: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `imarketdatabase`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `address`
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
-- 테이블 구조 `announcement`
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
-- 테이블의 덤프 데이터 `announcement`
--

INSERT INTO `announcement` (`board_no`, `board_title`, `board_content`, `board_date`, `board_hit`, `board_admin`, `board_password`) VALUES
(1, 'Test', 'Test', '2017-04-09 16:16:57', 0, 'admin', '*A4B6157319038724E3560894F7F932C8886EBFCF');

-- --------------------------------------------------------

--
-- 테이블 구조 `orders`
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
-- 테이블의 덤프 데이터 `orders`
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
(28, 1, 90.00, '2017-04-24 13:04:13', '2017-04-24 13:04:13', '1', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `Seller_ID` varchar(50) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `order_items`
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
(12, 28, 'khellytaguinod@gmail.com', 28, 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `products`
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
-- 테이블의 덤프 데이터 `products`
--

INSERT INTO `products` (`product_ID`, `email`, `user_ID`, `productName`, `price`, `shortDes`, `longDes`, `productCategory`, `productImage`, `qty`, `date_created`, `date_update`, `productActive`, `productStatus`, `genderCategory`) VALUES
(23, 'khellytaguinod@gmail.com', 6, 'Joanne Imperial', '69.00', 'sex slave', '', 'Services', '12308816_10204803564602352_5695523333994529172_n.jpg', 69, 'April 21, 2017 3:15:pm  ', '', 1, 'OnSale', 'NA'),
(25, 'jung@test.com', 1, 'hellw', '12.00', 'Size - 7\nRarely Used\nStill New', '', 'Mobile Phones Accessories', 'JaehoonJung1.jpg', 1, 'April 22, 2017 12:48:am  ', '', 1, 'OnSale', 'NA'),
(26, 'khellytaguinod@gmail.com', 2, 'Foood', '1000.00', 'for man !\r\nSize 7\r\nBig', '', 'Clothing and Accessories', '17039167_249734615491460_3671021812189531205_o.jpg', 1, 'April 22, 2017 8:57:am  ', '', 1, 'OnSale', 'man'),
(27, 'khellytaguinod@gmail.com', 2, 'Carousell', '1000.00', 'ServiceNew', '', 'Toys Stuffs', 'carousell.png', 111, 'April 22, 2017 10:10:am  ', '', 1, 'OnSale', 'NA'),
(28, 'khellytaguinod@gmail.com', 2, 'Block', '90.00', 'Testing', '', 'Toys Stuffs', '13123.jpg', 1, 'April 22, 2017 10:10:am  ', '', 1, 'OnSale', 'NA'),
(29, 'khellytaguinod@gmail.com', 2, 'block', '5900.00', 'New', '', 'Toys Stuffs', 'DSC07351.jpg', 21, 'April 22, 2017 10:11:am  ', '', 1, 'OnSale', 'NA');

-- --------------------------------------------------------

--
-- 테이블 구조 `rating`
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
-- 테이블의 덤프 데이터 `rating`
--

INSERT INTO `rating` (`id`, `rate`, `user_ID`, `product_comment`, `product_ID`, `product_date`) VALUES
(1, 2, NULL, 'Hello', 19, '2017-04-11 00:00:00'),
(2, 5, '', '', 21, '2017-04-03 00:00:00'),
(3, 3, '', 'Hi', 23, '2017-04-09 00:00:00'),
(4, 5, 'jung@test.com', '', 24, '0000-00-00 00:00:00'),
(5, 4, 'jung@test.com', '', 25, '2017-04-03 00:00:00');

-- --------------------------------------------------------

--
-- 테이블 구조 `users`
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
-- 테이블의 덤프 데이터 `users`
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
-- 테이블 구조 `wishlist`
--

CREATE TABLE `wishlist` (
  `wishListID` int(11) NOT NULL,
  `user_ID` varchar(10) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `wishListActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `wishlist`
--

INSERT INTO `wishlist` (`wishListID`, `user_ID`, `productName`, `date_created`, `wishListActive`) VALUES
(33, '6', 'test test test', 'April 20, 2017 10:53:pm  ', 1),
(35, '6', 'Product 1', 'April 21, 2017 1:02:pm  ', 0),
(36, '6', 'Product 1', 'April 21, 2017 2:22:pm  ', 1),
(37, '6', 'Bo sack noodle', 'April 21, 2017 3:42:pm  ', 1),
(38, '2', '', 'April 22, 2017 7:37:am  ', 0);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`user_ID`);

--
-- 테이블의 인덱스 `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`board_no`);

--
-- 테이블의 인덱스 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- 테이블의 인덱스 `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- 테이블의 인덱스 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_ID`);

--
-- 테이블의 인덱스 `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- 테이블의 인덱스 `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishListID`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `announcement`
--
ALTER TABLE `announcement`
  MODIFY `board_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 테이블의 AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- 테이블의 AUTO_INCREMENT `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 테이블의 AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- 테이블의 AUTO_INCREMENT `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 테이블의 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 테이블의 AUTO_INCREMENT `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- 테이블의 제약사항 `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
