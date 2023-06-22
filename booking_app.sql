-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 04:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `gender`, `is_admin`, `password`) VALUES
(2, 'Dorcas Samuel', 'samueldorcaseshowokeoghene@gmail.com', 'Female', 1, '$2y$10$juU1OjIKI49S0K8IcphJPuxyxhLEqOrsNtrU5lLQeYZcVKmks1yJK'),
(5, 'bbbbnbnnnn is nam', 'appleeyespackage@gmail.com', 'Female', 1, '$2y$10$Gxbt9JeRe//4IzCbwgbvIenHSD/LaWJBEurc3j2db89Ko7.9xoJvG'),
(6, 'Apple Sam', 'Samuel@gmail.com', 'Male', 0, '$2y$10$IJdSUTif6JRb0SRmePBwzeHi2i4pbevAcTE296.qIYXChIQc0IZla');

-- --------------------------------------------------------

--
-- Table structure for table `customerstable`
--

CREATE TABLE `customerstable` (
  `id` int(11) UNSIGNED NOT NULL,
  `booking` varchar(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `guest` int(10) NOT NULL,
  `reservation` varchar(255) DEFAULT NULL,
  `reservetype` varchar(50) NOT NULL,
  `specify` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerstable`
--

INSERT INTO `customerstable` (`id`, `booking`, `fullname`, `email`, `gender`, `title`, `guest`, `reservation`, `reservetype`, `specify`, `message`) VALUES
(15, 'APBK3040', 'Dorcas Samuel', 'nou213094953@noun.edu.ng', 'Female', 'Mistress', 9, '2023-06-23 11:00AM', 'Birthday/Anniversary', '', 'No special request'),
(18, 'APBK9747', 'Adeyem Adebayo', 'ade@gmail.com', 'Male', 'Master', 2, '2023-06-30 3:00PM', 'Other', 'Date', 'No Request '),
(19, 'APBK1141', 'Joel Apple', 'Samueldorccc@gmail.com', 'Male', 'Mr', 5, '2023-06-24 7:00PM', 'Nightlife', '', 'No Request'),
(20, 'APBK2446', 'Kemi Sola', 'Samuel@gmail.com', 'Female', 'Mrs', 2, '2023-06-23 3:00PM', 'Other', 'Feild Trip', 'Special delicacy'),
(21, 'APBK8534', 'Dorcas Samuel', 'appleeyespackage@gmail.com', 'Female', 'Miss', 1, '2023-06-30 2:00PM', 'Birthday/Anniversary', '', ''),
(22, 'APBK1429', 'Dorcas Samuel', 'appleeyespackage@gmail.com', 'Male', 'Mr', 4, '2023-06-22 3:00PM', 'VIP/Mezzanine', '', ''),
(23, 'APBK7272', 'Dorcas Samuel', 'samueldorcaseshowokeoghene@gmail.com', 'Male', 'Mr', -1, '2023-06-10 5:00PM', 'Holiday', '', ''),
(24, 'APBK7945', 'bbbbnbnnnn', 'Samuel@gmail.com', 'Male', 'Mr', 1, '2023-06-08 3:00PM', 'Dinner', '', ''),
(25, 'APBK3022', 'Dorcas Samuel', 'Samuel@gmail.com', 'Male', 'Mr', 2, '2023-06-15 3:00PM', 'Nightlife', '', ''),
(26, 'APBK5688', 'bbbbnbnnnn', 'samueldorcaseshowokeoghene@gmail.com', 'Male', 'Mr', 5, '2023-06-22 10:00AM', 'Birthday/Anniversary', '', ''),
(27, 'APBK1643', 'Dorcas Samuel', 'appleeyespackage@gmail.com', 'Female', 'Mrs', 7, '2023-06-30 6:00PM', 'Private', '', ''),
(28, 'APBK5106', 'Dorcas Samuel', 'nou213094953@noun.edu.ng', 'Male', 'Mr', 51, '2023-07-01 5:00PM', 'Wedding', '', ''),
(29, 'APBK1520', 'Dorcas Samuel', 'Samuel@gmail.com', 'Male', 'Mr', 8, '2023-06-09 10:00AM', 'Birthday/Anniversary', '', ''),
(33, 'APBK4036', 'Dorcas Samuel', 'samueldorcaseshowokeoghene@gmail.com', 'Male', 'Mr', 7, '2023-06-30 10:00AM', 'Please Select', '', ''),
(34, 'APBK9231', 'Dorcas Samuel', 'samueldorcaseshowokeoghene@gmail.com', 'Male', 'Mr', 7, '2023-06-28 10:00AM', 'Please Select', '', ''),
(35, 'APBK5749', 'Dorcas Samuel', 'samueldorcaseshowokeoghene@gmail.com', 'Male', 'Mrs', 8, '2023-06-09 3:00PM', 'Nightlife', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerstable`
--
ALTER TABLE `customerstable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customerstable`
--
ALTER TABLE `customerstable`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
