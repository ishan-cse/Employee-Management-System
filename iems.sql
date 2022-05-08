-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 09:26 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iems`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` bigint(20) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_mobile` varchar(21) NOT NULL,
  `emp_address` text NOT NULL,
  `emp_nid` varchar(50) NOT NULL,
  `emp_password` varchar(32) NOT NULL,
  `emp_photo` varchar(100) NOT NULL,
  `emp_joining_date` varchar(50) NOT NULL,
  `role_id` int(2) NOT NULL,
  `emp_slug` varchar(255) NOT NULL,
  `emp_checkin_status` int(1) NOT NULL DEFAULT 0,
  `emp_active_status` int(1) NOT NULL DEFAULT 1,
  `checkin_inserted_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_task`
--

CREATE TABLE `employee_task` (
  `emp_task_id` bigint(20) NOT NULL,
  `emp_task_title` varchar(150) NOT NULL,
  `emp_task_details` text NOT NULL,
  `emp_task_assign_date` varchar(50) NOT NULL,
  `emp_task_due_date` varchar(50) NOT NULL,
  `assigned_employee_id` bigint(20) NOT NULL,
  `emp_task_slug` varchar(255) NOT NULL,
  `emp_task_complete_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance_report`
--

CREATE TABLE `emp_attendance_report` (
  `attendance_report_id` bigint(20) NOT NULL,
  `emp_id` bigint(20) NOT NULL,
  `c_date` varchar(50) NOT NULL,
  `check_in_time` varchar(50) DEFAULT NULL,
  `check_out_time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emp_task_comment`
--

CREATE TABLE `emp_task_comment` (
  `emp_task_comment_id` bigint(20) NOT NULL,
  `commentator_role_id` int(1) NOT NULL,
  `emp_task_comment` text NOT NULL,
  `emp_task_id` bigint(20) NOT NULL,
  `emp_task_comment_time` varchar(50) NOT NULL,
  `emp_task_comment_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `sa_email` varchar(100) NOT NULL,
  `sa_password` varchar(32) NOT NULL,
  `role_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`sa_email`, `sa_password`, `role_id`) VALUES
('super_admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(2) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee_task`
--
ALTER TABLE `employee_task`
  ADD PRIMARY KEY (`emp_task_id`);

--
-- Indexes for table `emp_attendance_report`
--
ALTER TABLE `emp_attendance_report`
  ADD PRIMARY KEY (`attendance_report_id`);

--
-- Indexes for table `emp_task_comment`
--
ALTER TABLE `emp_task_comment`
  ADD PRIMARY KEY (`emp_task_comment_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_task`
--
ALTER TABLE `employee_task`
  MODIFY `emp_task_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_attendance_report`
--
ALTER TABLE `emp_attendance_report`
  MODIFY `attendance_report_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_task_comment`
--
ALTER TABLE `emp_task_comment`
  MODIFY `emp_task_comment_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(2) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
