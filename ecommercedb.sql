-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2022 at 03:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accountnumber` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cardtype` varchar(50) NOT NULL,
  `cardnumber` varchar(50) DEFAULT NULL,
  `expdate` varchar(10) DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL,
  `balance` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accountnumber`, `name`, `address`, `mobile`, `email`, `cardtype`, `cardnumber`, `expdate`, `cvv`, `balance`) VALUES
('10001', 'kumar', 'America', '889782034', 'kumar@gmail.com', 'debit', '1111111122222222', '12/23', 123, 6400),
('19036', 'Rohan Sheri', '1807 W oak st, apt 108, denton, TX.', '9407583282', 'rohanreddy955@gmail.com', 'debit', '1154397693278642', '02/25', 147, 8900);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `productcode` varchar(15) DEFAULT NULL,
  `productname` varchar(60) DEFAULT NULL,
  `productdesc` varchar(100) DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `totalcost` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `productcode`, `productname`, `productdesc`, `cost`, `qty`, `totalcost`) VALUES
(1, 'P101', 'HCL Laptop', 'HCL ME Core i5 3rd Gen - (4 GB/500 GB HDD/DOS) HCLAE2V0156N Laptop (15.84 inch, Black, 2 kg) ;', 400, 1, 400),
(2, 'P102', 'Apple Laptop', 'MacBook Air with M1 chip · M2 chip · Buy MacBook Air with M2 Chip', 700, 1, 700);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(50) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `zipcode` varchar(15) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `registerDate` date DEFAULT NULL,
  `otp` varchar(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `customerName`, `address`, `zipcode`, `mobile`, `email`, `password`, `registerDate`, `otp`, `status`) VALUES
(1, 'kumar', 'warangal', '9080790', '9652612227', 'kumar@gmail.com', '12345', NULL, '0', NULL),
(2, 'Raju', 'Kazipet', '098908', '97987897', 'raju@gmail.com', '54321', NULL, 'varified', 'Active'),
(9, '11111', '11111', '1111', '9652612227', 'kumar1212@gmail.com', '123123', '2022-11-28', '2081', 'InActive'),
(10, '444444', '444444', '4444', '9652612227', 'raju11@gmail.com', '321123', '2022-11-28', 'varified', 'Active'),
(11, 'Rohan Sheri', '88888', '888', '9407583282', 'rohanreddy955@gmail.com', '27352B16h0@', '2022-11-28', 'varified', 'Active'),
(12, 'null', 'null', 'null', 'null', 'null', 'null', '2022-12-07', '8780', 'InActive'),
(17, 'bharath', '1702, w hickory st', '76201', '9402183095', 'bharath@gmail.com', '12345678', '2022-12-09', 'varified', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `productCode` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `paydate` datetime DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `productCode`, `email`, `paydate`, `amount`) VALUES
(1, 'P101', 'raju@gmail.com', '2022-11-26 00:00:00', 800),
(2, 'P101', 'mallik@gmail.com', '2022-11-26 00:00:00', 800),
(3, '', 'raju11@gmail.com', '2022-11-28 12:31:21', 400),
(4, 'P101', 'kumar@gmail.com', '2022-12-01 01:15:51', 400),
(5, 'P101', 'rohanreddy955@gmail.com', '2022-12-05 10:58:11', 400),
(6, 'P101', 'rohanreddy955@gmail.com', '2022-12-08 02:22:13', 400),
(7, 'P101', 'rohanreddy955@gmail.com', '2022-12-08 22:04:07', 400),
(8, 'P102', 'rohanreddy955@gmail.com', '2022-12-08 22:37:29', 700),
(9, 'P101', 'bharath@gmail.com', '2022-12-09 14:48:00', 400),
(10, 'Nill', 'rohanreddy955@gmail.com', '2022-12-09 15:53:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transdate` date DEFAULT NULL,
  `fromaccount` varchar(30) DEFAULT NULL,
  `toaccount` varchar(30) DEFAULT NULL,
  `transtype` varchar(30) DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accountnumber`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
