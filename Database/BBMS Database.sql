-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 12:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0
-- Created by: Ryan James Capadocia

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank_management`
--
CREATE DATABASE IF NOT EXISTS `bloodbank_management` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `bloodbank_management`;

-- --------------------------------------------------------

--
-- Table structure for table `blood_types`
--

CREATE TABLE `blood_types` (
  `blood_id` int(1) NOT NULL,
  `A_plus` varchar(11) NOT NULL,
  `A_minus` varchar(11) NOT NULL,
  `B_plus` varchar(11) NOT NULL,
  `B_minus` varchar(11) NOT NULL,
  `AB_plus` varchar(11) NOT NULL,
  `AB_minus` varchar(11) NOT NULL,
  `O_plus` varchar(11) NOT NULL,
  `O_minus` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_types`
--

INSERT INTO `blood_types` (`blood_id`, `A_plus`, `A_minus`, `B_plus`, `B_minus`, `AB_plus`, `AB_minus`, `O_plus`, `O_minus`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0'),
(2, '0', '0', '0', '0', '0', '0', '0', '0'),
(3, '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(11) NOT NULL,
  `blood_type` varchar(3) NOT NULL,
  `address` text NOT NULL,
  `who_create` text NOT NULL,
  `blood_unit` bigint(20) NOT NULL,
  `datecreated` date DEFAULT NULL,
  `Donated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_database`
--

CREATE TABLE `portfolio_database` (
  `ID` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `age` text NOT NULL,
  `email` text NOT NULL,
  `school` text NOT NULL,
  `branch` text NOT NULL,
  `course` text NOT NULL,
  `section` text NOT NULL,
  `school_year` varchar(9) NOT NULL,
  `fb_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_database`
--

INSERT INTO `portfolio_database` (`ID`, `fname`, `lname`, `age`, `email`, `school`, `branch`, `course`, `section`, `school_year`, `fb_link`) VALUES
(1, 'Ryan James', 'Capadocia', '21', 'ryanjamesc4@gmail.com', 'Cavite State University', 'Imus', 'BSIT', '2B', '2022-2023', 'https://www.facebook.com/Cappps.Lock'),
(2, 'James Matthew', 'Veloria ', '20', 'veloria.jamesmatthew0@gmail.com ', 'Cavite State University', 'Imus campus ', 'BSIT', '2B', '2021-2022', 'https://www.facebook.com/james.veloria'),
(3, 'Jomari', 'Bautista', '20', 'jomari.bautista@cvsu.edu.ph', 'Cavite State University', 'Imus-Campus', 'BSIT', '2B', '2022-2023', 'https://www.facebook.com/jomari.bautista.30'),
(4, 'Cielo', 'Besonia', '22 years old', 'cielo.besonia@cvsu.edu.ph', 'Cavite State University', 'Imus Campus', 'Bachelor of Science in Information Technology', '2B', '2022-2023', 'facebook.com/chseylow');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `blood_type` varchar(3) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `Address` text NOT NULL,
  `isapproved` int(1) NOT NULL DEFAULT 0,
  `requested` varchar(3550) NOT NULL,
  `cby` text NOT NULL COMMENT 'Created By',
  `again` int(3) NOT NULL COMMENT 'Request Again'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `types` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2=Staff, 3= subscriber',
  `is_login` tinyint(1) NOT NULL,
  `isApproved` tinyint(1) DEFAULT 0 COMMENT '0 - Pending,1 - \r\nApproved, 2 - Denied',
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `blood` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `types`, `is_login`, `isApproved`, `email`, `phone`, `address`, `blood`) VALUES
(1, 'Temp Admin Acc', 'admin', 'admin123', 1, 1, 1, '', '', '', ''),
(4, 'Ryan James Capadocia', 'ryanjames2023', 'capadocia1302', 1, 0, 1, '', '', '', ''),
(45, 'Testing For Pending Page', 'pendingtempacc', 'pta123', 2, 0, 0, '', '', '', ''),
(46, 'Testing for Declined Page', 'declinedtempacc', 'dta123', 2, 0, 2, '', '', '', ''),
(54, 'Jomari Bautista', 'jomjom69', 'pst696969', 2, 0, 1, '', '', '', ''),
(55, 'Cielo Besonia', 'Cielo15', 'ilovecats123', 2, 0, 1, '', '', '', ''),
(56, 'Nico Aldrich Cano', 'aldrich28', 'Nico1234', 3, 0, 1, 'canonicoaldrich@gamil.com', '09305716564', '372 panapaan 5 bacoor cavite', ''),
(57, 'James Matthew Veloria', 'JamesV123', 'veloria69', 3, 1, 1, 'james0@gmail.com', '09123456789', 'Molino 4 Bacoor Cavite', 'A+'),
(61, 'Julian Bragaiz', 'Julian2', 'Kelpahits6h', 1, 0, 1, '', '', '', ''),
(62, 'Joseph Contador', 'Joseph19', 'Pogi123', 3, 0, 1, 'joseph.contador@cvsu.edu.ph', '09066323205', 'blk 85 lot 10 ph 4 Paliparan III Dasmarinas Cavite', ''),
(64, 'Temp User Account', 'tempuseracc', 'tuc123', 3, 0, 1, 'temp@user.account', '09876543212', 'molino 3 bacoor city cavite', 'AB+');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_types`
--
ALTER TABLE `blood_types`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `portfolio_database`
--
ALTER TABLE `portfolio_database`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_types`
--
ALTER TABLE `blood_types`
  MODIFY `blood_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `portfolio_database`
--
ALTER TABLE `portfolio_database`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
