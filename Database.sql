-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2020 at 05:17 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chilldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Admin_Email` varchar(255) NOT NULL,
  `Admin_Password` varchar(70) NOT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_Email`, `Admin_Password`) VALUES
(1, 'chunwei2978@gmail.com', '$2y$10$sLzXjYGs7RZti4rnRUhcdO89c.0A45zJ.SRJdZA0WYx4BKUcvQPHW');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `Booking_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Booking_Date` date NOT NULL,
  `Booking_Time` time NOT NULL,
  `Num_of_guests` int(2) NOT NULL,
  `Customer_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Booking_ID`),
  KEY `FOREIGN_KEY` (`Customer_ID`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`Booking_ID`, `Booking_Date`, `Booking_Time`, `Num_of_guests`, `Customer_ID`) VALUES
(47, '2019-02-02', '12:15:00', 1, 9),
(46, '2019-02-02', '12:00:00', 1, 9),
(45, '2019-02-02', '12:00:00', 1, 9),
(44, '2018-11-02', '12:59:00', 10, 9),
(5, '2018-10-23', '11:11:00', 12, 10),
(6, '2020-01-01', '14:12:00', 6, 10),
(7, '2014-01-01', '01:00:00', 12, 10),
(8, '2017-01-01', '12:12:00', 2, 10),
(9, '2017-10-18', '02:00:00', 4, 10),
(10, '2018-01-01', '12:30:00', 2, 10),
(11, '2016-01-01', '17:00:00', 30, 10),
(12, '1999-02-01', '12:31:00', 21, 10),
(13, '1988-02-02', '12:02:00', 12, 10),
(14, '1999-01-01', '14:13:00', 21, 10),
(15, '2016-01-01', '14:01:00', 12, 10),
(17, '2016-01-01', '12:01:00', 12, 10),
(18, '2016-01-01', '13:00:00', 12, 10),
(19, '1999-01-01', '12:21:00', 2, 10),
(20, '2015-01-01', '12:12:00', 12, 10),
(21, '1999-02-02', '14:31:00', 22, 10),
(23, '1950-02-02', '12:31:00', 12, 10),
(25, '2018-10-18', '23:00:00', 1, 10),
(26, '2019-02-02', '13:21:00', 10, 10),
(27, '2019-02-01', '12:12:00', 13, 10),
(43, '2018-11-01', '21:00:00', 2, 9),
(29, '2019-01-01', '12:12:00', 12, 10),
(30, '2019-01-01', '12:12:00', 12, 10),
(31, '2019-01-01', '12:12:00', 12, 10),
(32, '2019-01-01', '12:12:00', 12, 10),
(33, '2018-10-11', '13:00:00', 12, 10),
(34, '2018-10-17', '14:00:00', 12, 10),
(36, '2019-02-02', '13:12:00', 2, 10),
(42, '2018-10-26', '22:10:00', 10, 10),
(38, '2018-10-17', '12:12:00', 12, 10),
(39, '2018-10-20', '12:12:00', 10, 10),
(40, '2018-10-20', '12:00:00', 2, 10),
(41, '2018-10-20', '14:31:00', 8, 10),
(49, '2018-11-02', '12:45:00', 2, 9),
(50, '2019-02-02', '12:46:00', 10, 9),
(51, '2018-12-12', '15:15:00', 3, NULL),
(52, '2019-10-10', '12:32:00', 3, NULL),
(53, '2019-10-10', '12:10:00', 10, NULL),
(54, '2019-10-10', '14:22:00', 1, 9),
(55, '2019-10-10', '12:12:00', 2, 9),
(56, '2018-11-21', '16:15:00', 5, 9),
(57, '2020-06-21', '18:52:00', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `Customer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Customer_Name` varchar(50) NOT NULL,
  `Customer_Phone_Number` varchar(11) NOT NULL,
  `Customer_Dob` date NOT NULL,
  `Customer_Password` varchar(255) NOT NULL,
  `Customer_Email` varchar(70) NOT NULL,
  `Customer_Gender` text NOT NULL,
  PRIMARY KEY (`Customer_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_ID`, `Customer_Name`, `Customer_Phone_Number`, `Customer_Dob`, `Customer_Password`, `Customer_Email`, `Customer_Gender`) VALUES
(9, 'Chooi', '0122313123', '2002-01-01', '$2y$10$M.MjJUVErg/LIDksTWvVTujEFm9bSo8q6oI97sGdgaym7dEizrdtK', 'chunwei@hotmail.com', 'Female'),
(10, 'Chang', '0184665126', '2000-09-01', '$2y$10$vk9rjkYxzZuvgwtlzhpJcOIDPfdqtF3UZigKLJU6BNo73t8YpZPEe', 'cck@gmail.com', 'Female'),
(11, 'Hoh', '0123456781', '2005-01-01', '$2y$10$vk9rjkYxzZuvgwtlzhpJcOIDPfdqtF3UZigKLJU6BNo73t8YpZPEe', 'hoh@gmail.com', 'Male'),
(25, 'Jozhua', '0135462789', '1999-10-10', '$2y$10$zmRilaT/pGsBx7kbQkdh..JAb7ehtL7PT.mYCb.TQOl18X2Vo3pv2', 'jozhua@gmail.com', 'Male');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
