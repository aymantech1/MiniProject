-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2016 at 06:20 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `personal_phone` int(11) DEFAULT NULL,
  `home_phone` int(11) DEFAULT NULL,
  `office_phone` int(11) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `personal_phone`, `home_phone`, `office_phone`, `current_address`, `permanent_address`, `profile_pic`, `created_at`, `modified_at`, `deleted_at`, `modified_by`) VALUES
(1, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(2, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(3, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(4, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(5, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(6, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(7, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(8, 23, 'Rakib', 'Hossain', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(9, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `modified_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `unique_id`, `salt`, `username`, `password`, `email`, `modified_at`, `created_at`, `deleted_at`, `is_active`) VALUES
(21, 0, '', '', 'rakib016', '202cb962ac59075b964b07152d234b70', 'rakib016@gmail.com', '0000-00-00 00:00:00', '2016-04-13 04:46:36', NULL, 0),
(23, 0, '', '', 'nirjhor', '202cb962ac59075b964b07152d234b70', 'nirjhor@gmail.com', '0000-00-00 00:00:00', '2016-04-16 04:20:30', NULL, 1),
(25, 0, '', '', 'fgdfg', '202cb962ac59075b964b07152d234b70', 'fff@gmail.com', '0000-00-00 00:00:00', '2016-04-16 04:50:01', NULL, 1),
(26, 0, '', '', 'Anam', '202cb962ac59075b964b07152d234b70', 'anam@gmail.com', '0000-00-00 00:00:00', '2016-04-16 04:52:06', NULL, 1),
(27, 0, '', '', 'pronoy', '202cb962ac59075b964b07152d234b70', 'pronoy@gmail.com', '0000-00-00 00:00:00', '2016-04-16 04:52:24', NULL, 0),
(28, 0, '', '', 'ivy', '202cb962ac59075b964b07152d234b70', 'ivy@gmail.com', '0000-00-00 00:00:00', '2016-04-16 04:52:38', NULL, 1),
(29, 0, '', '', 'hello', '202cb962ac59075b964b07152d234b70', 'hello@gmail.com', '0000-00-00 00:00:00', '2016-04-16 04:52:52', NULL, 1),
(31, 0, '', '', 'hi', '202cb962ac59075b964b07152d234b70', 'hi@gmail.com', '0000-00-00 00:00:00', '2016-04-16 04:53:24', NULL, 0),
(32, 0, '', '', 'yyy', '202cb962ac59075b964b07152d234b70', 'yyy@gmail.com', '0000-00-00 00:00:00', '2016-04-16 07:03:07', NULL, 0),
(33, 0, '', '', 'admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
