-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2025 at 03:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--
CREATE DATABASE IF NOT EXISTS college_portal;
USE college_portal;
CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `EMAIL`, `PASSWORD`) VALUES
(1, 'admin@gmail.com', 'Admin@2707');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `complaint` text NOT NULL,
  `admin_response` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `complaint_sended` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `student_id`, `category`, `complaint`, `admin_response`, `status`, `complaint_sended`) VALUES
(1, 1, 'Academic', 'Score card is not visible on ciber vidya.', 'will be resolved soon.', 'In Progress', '2025-12-20 22:19:05'),
(2, 2, 'Infrastructure', 'The ceiling fan in classroom B-204 is nor working properly.', 'Done', 'Resolved', '2025-12-20 22:35:23'),
(4, 1, 'Hostel', 'water supply is poor in hostel.', 'resolved', 'Resolved', '2025-12-21 10:28:40'),
(5, 2, 'Other', 'Tea of our canteen is tasteless. ', 'resolved', 'Resolved', '2025-12-21 12:23:06'),
(6, 3, 'Academic', 'exam date not finalised.', 'resolved soon.', 'In Progress', '2025-12-21 16:16:39'),
(7, 12, 'Examination', 'I have got less marks than my friend.', 'okay', 'Resolved', '2025-12-22 12:42:13'),
(8, 12, 'Academic', 'Academic calender not given.', NULL, NULL, '2025-12-22 13:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `student_id` varchar(50) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `complaint_id`, `student_id`, `rating`, `feedback`, `submitted_at`) VALUES
(3, 7, '12', 3, 'thanks', '2025-12-22 13:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `REQUEST_STATUS` varchar(15) DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `STUDENT_ID`, `NAME`, `EMAIL`, `PASSWORD`, `REQUEST_STATUS`) VALUES
(1, '25BT0648', 'Swaraj Wankhede', 'swarajwankhede4@gmail.com', 'Swaraj@27', 'Approved'),
(2, '25BT0646', 'Krish Khadse', 'krish@gmai.com', 'Krish@123', 'Approved'),
(3, '25BT0353', 'Rutik Gavhale', 'rutik@gmail.com', 'Rutik@13', 'Approved'),
(6, '25BT0153', 'Pranay ', 'panu@gmail.com', '1234', 'Approved'),
(7, '25BT0300', 'Parth', 'parth@gmail.com', 'shs@2222', 'Approved'),
(9, '25BT0301', 'Parth', 'shreyash@gmail.com', 'Asgsg@232', 'Approved'),
(11, '24BT0658', 'Gajanan', 'gaj@gmail.com', 'Gaj@1234', 'Rejected'),
(12, '25BT0355', 'Yash Vaidya', 'yash6969@gmail.com', 'Yash@123', 'Approved'),
(13, '25BT00069', 'Himanshu Adhau', 'judge22@court.com', 'Minahisang@t11', 'Rejected');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `STUDENT_ID` (`STUDENT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
