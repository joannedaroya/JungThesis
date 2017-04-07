-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 03:36 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imarketdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `email` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zipCode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `owner_email` varchar(100) NOT NULL,
  `productName` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `shortDes` varchar(50) NOT NULL,
  `longDes` varchar(700) NOT NULL,
  `productCategory` text,
  `genderCategory` text NOT NULL,
  `productImage` varchar(500) NOT NULL,
  `QTY` int(100) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `date_update` varchar(50) NOT NULL,
  `productStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `owner_email`, `productName`, `price`, `shortDes`, `longDes`, `productCategory`, `genderCategory`, `productImage`, `QTY`, `date_created`, `date_update`, `productStatus`) VALUES
(4, 'khellytaguinod@gmail.com', 'carlo jamie', '500.00', 'sex slave', '', 'Collectibles', '', '12316350_10204803598243193_2169619349611866090_n.jpg', 1, 'April 4, 2017 8:29:pm  ', '', 1),
(5, 'khellytaguinod@gmail.com', 'jamie carlo zane', '5.00', 'prostitute ', '', 'Services', '', 'Meme (1).png', 5, 'April 5, 2017 5:27:pm  ', 'April 5, 2017 9:30:pm  ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `firstName` varchar(10) NOT NULL,
  `lastName` varchar(10) NOT NULL,
  `contactNum` varchar(15) NOT NULL,
  `birthDate` date NOT NULL,
  `userType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `firstName`, `lastName`, `contactNum`, `birthDate`, `userType`) VALUES
('emplyoee@tiem.com', 'Asdf1234', 'hello', 'hi', '0246152465', '2010-01-05', 'employee'),
('jung@test.com', 'Asdf1234', 'Jaehoon', 'Jung', '09167737988', '1992-04-11', 'student'),
('khellytaguinod@gmail.com', '12345', 'Khelly', 'Taguinod', '5455111', '2017-04-21', 'student'),
('taguinodjheremy@gmail.com', '12345', 'jheremy', 'capatice', '09526622626', '2017-08-01', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
