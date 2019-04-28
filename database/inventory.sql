-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2019 at 09:24 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `item_id` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `amount` double NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkin_by` int(11) NOT NULL,
  `checkin_amount` double NOT NULL,
  `checkout_date` date NOT NULL,
  `checkout_by` int(11) NOT NULL,
  `checkout_amount` double NOT NULL,
  `send_warehouse_id` int(11) NOT NULL,
  `send_date` date NOT NULL,
  `send_amount` double NOT NULL,
  `send_by` int(11) NOT NULL,
  `parcel_id` varchar(100) NOT NULL,
  `recieve_date` date NOT NULL,
  `recieve_amount` double NOT NULL,
  `recieve_warehouse_id` int(11) NOT NULL,
  `recieve_by` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inventory_type_id` int(11) NOT NULL,
  `min_level` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item_id`, `description`, `amount`, `warehouse_id`, `checkin_date`, `checkin_by`, `checkin_amount`, `checkout_date`, `checkout_by`, `checkout_amount`, `send_warehouse_id`, `send_date`, `send_amount`, `send_by`, `parcel_id`, `recieve_date`, `recieve_amount`, `recieve_warehouse_id`, `recieve_by`, `user_id`, `inventory_type_id`, `min_level`, `status`, `updated_at`, `created_at`) VALUES
(13, '324324', 'test', 0, 1, '0000-00-00', 0, 0, '0000-00-00', 0, 0, 0, '0000-00-00', 0, 0, '', '0000-00-00', 0, 0, 0, 10, 1, 24234, 1, '2019-04-27 01:34:35', '2019-04-27 01:34:35'),
(14, '12344', 'Item2  Description', 5, 1, '2019-04-10', 3, 15, '2019-04-17', 10, 48, 1, '2019-04-24', 23, 10, '', '2019-04-25', 44, 1, 16, 0, 1, 12, 0, '2019-04-28 09:16:35', '2019-04-28 08:01:48'),
(15, '1234', 'Item Description', 5, 1, '2019-04-10', 3, 15, '2019-04-17', 10, 44, 1, '2019-04-24', 23, 10, '', '2019-04-25', 44, 1, 16, 0, 1, 12, 0, '2019-04-28 08:01:48', '2019-04-28 08:01:48'),
(16, '1234', 'Item Description', 5, 1, '2019-04-10', 3, 15, '2019-04-17', 10, 44, 1, '2019-04-24', 23, 10, '', '2019-04-25', 44, 1, 16, 0, 1, 12, 0, '2019-04-28 08:01:48', '2019-04-28 08:01:48'),
(17, '1234', 'Item Description', 5, 1, '2019-04-10', 3, 15, '2019-04-17', 10, 44, 1, '2019-04-24', 23, 10, '', '2019-04-25', 44, 1, 16, 0, 1, 12, 0, '2019-04-28 08:01:48', '2019-04-28 08:01:48'),
(18, '1234', 'Item Description', 5, 1, '2019-04-10', 3, 15, '2019-04-17', 10, 44, 1, '2019-04-24', 23, 10, '', '2019-04-25', 44, 1, 16, 0, 1, 12, 0, '2019-04-28 08:01:48', '2019-04-28 08:01:48'),
(19, '1234', 'Item Description', 5, 1, '2019-04-10', 3, 15, '2019-04-17', 10, 44, 1, '2019-04-24', 23, 10, '', '2019-04-25', 44, 1, 16, 0, 1, 12, 0, '2019-04-28 08:01:48', '2019-04-28 08:01:48'),
(20, '1234', 'Item Description', 5, 1, '2019-04-10', 3, 15, '2019-04-17', 10, 44, 1, '2019-04-24', 23, 10, '', '2019-04-25', 44, 1, 16, 0, 1, 12, 0, '2019-04-28 08:01:48', '2019-04-28 08:01:48'),
(21, '1234', 'Item Description', 5, 1, '2019-04-10', 3, 15, '2019-04-17', 10, 44, 1, '2019-04-24', 23, 10, '', '2019-04-25', 44, 1, 16, 0, 1, 12, 0, '2019-04-28 08:01:48', '2019-04-28 08:01:48'),
(22, '1234', 'Item Description', 5, 1, '2019-04-10', 3, 15, '2019-04-17', 10, 44, 1, '2019-04-24', 23, 10, '', '2019-04-25', 44, 1, 16, 0, 1, 12, 0, '2019-04-28 08:01:48', '2019-04-28 08:01:48'),
(23, '1234', 'Item Description', 5, 1, '2019-04-10', 3, 15, '2019-04-17', 10, 44, 1, '2019-04-24', 23, 10, '', '2019-04-25', 44, 1, 16, 0, 1, 12, 0, '2019-04-28 08:01:48', '2019-04-28 08:01:48'),
(24, '1234', 'Item Description', 5, 1, '2019-04-10', 3, 15, '2019-04-17', 10, 44, 1, '2019-04-24', 23, 10, '', '2019-04-25', 44, 1, 16, 0, 1, 12, 0, '2019-04-28 08:01:48', '2019-04-28 08:01:48'),
(25, '1234', 'Item Description', 5, 1, '2019-04-10', 3, 15, '2019-04-17', 10, 44, 1, '2019-04-24', 23, 10, '', '2019-04-25', 44, 1, 16, 0, 1, 12, 0, '2019-04-28 08:01:48', '2019-04-28 08:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_type`
--

CREATE TABLE `inventory_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_type`
--

INSERT INTO `inventory_type` (`id`, `name`, `description`, `status`, `updated_at`, `created_at`) VALUES
(1, 'test inventory type', 'test inventory type description', 1, '2019-04-27 00:00:00', '2019-04-27 00:00:00'),
(2, 'test inventory type', 'test inventory type description', 1, '2019-04-27 00:00:00', '2019-04-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 1, '2019-04-26 00:00:00', '2019-04-26 00:00:00'),
(2, 'Administrator 2', 1, '2019-04-26 00:00:00', '2019-04-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `notes` text,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `status`, `avatar`, `notes`, `updated_at`, `created_at`) VALUES
(1, 'admin', 'admin@yopmail.com', '0192023a7bbd73250516f069df18b500', 'Hamid4', 'Raza', 1, '', 'test', '2019-04-25 00:00:00', '2019-04-25 00:00:00'),
(3, 'admin1', 'admin2@yopmail.com', '0192023a7bbd73250516f069df18b500', 'Hamid4', 'Raza', 0, '', '', '2019-04-25 00:00:00', '2019-04-25 00:00:00'),
(5, 'admin', 'admin@yopmail.com', '0192023a7bbd73250516f069df18b500', 'Hamid4', 'Raza', 1, '', '', '2019-04-25 00:00:00', '2019-04-25 00:00:00'),
(6, 'admin', 'admin@yopmail.com', '0192023a7bbd73250516f069df18b500', 'Hamid4', 'Raza', 1, '', '', '2019-04-25 00:00:00', '2019-04-25 00:00:00'),
(10, 'admin', 'admin@yopmail.com', '0192023a7bbd73250516f069df18b500', 'Hamid4', 'Raza', 1, 'Jellyfish.jpg', '', '2019-04-27 10:30:32', '2019-04-25 00:00:00'),
(13, 'admin', 'admin@yopmail.com', '0192023a7bbd73250516f069df18b500', 'Hamid4', 'Raza', 1, '', '', '2019-04-25 00:00:00', '2019-04-25 00:00:00'),
(14, 'admin', 'admin@yopmail.com', '0192023a7bbd73250516f069df18b500', 'Hamid4', 'Raza', 1, '', '', '2019-04-25 00:00:00', '2019-04-25 00:00:00'),
(15, 'admin', 'admin@yopmail.com', '0192023a7bbd73250516f069df18b500', 'Hamid4', 'Raza', 1, '', '', '2019-04-25 00:00:00', '2019-04-25 00:00:00'),
(16, 'admin13', 'test@yopmail.com', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'admin135', 'sageattar1122@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'admin134', 'sageattar11224@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'test', 'sageattar13122@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'test32', 'test33@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 0, 'Desert.jpg', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'test434', 'test323@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 0, 'Desert1.jpg', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'admin44', 'tes44t@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 0, 'Chrysanthemum.jpg', '', '2019-04-27 10:30:08', '0000-00-00 00:00:00'),
(23, 'admin444', 'erere@top.com', '098f6bcd4621d373cade4e832627b4f6', 'ee', 'tee', 0, 'Desert3.jpg', NULL, '2019-04-27 01:46:25', '2019-04-27 01:46:25'),
(24, 'admin3333', 'tes333t@yopmail.com', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 0, 'Hydrangeas.jpg', 'test', '2019-04-27 02:10:25', '2019-04-27 02:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated-at` datetime NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `created_at`, `updated-at`, `role_id`) VALUES
(1, 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `descrption` varchar(255) NOT NULL,
  `warehouse_type_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `descrption`, `warehouse_type_id`, `status`, `updated_at`, `created_at`) VALUES
(1, 'test warehouse', 'test ware house description', 1, 1, '2019-04-27 00:00:00', '2019-04-27 00:00:00'),
(2, 'test warehouse', 'test ware house description', 1, 1, '2019-04-27 00:00:00', '2019-04-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_type`
--

CREATE TABLE `warehouse_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse_type`
--

INSERT INTO `warehouse_type` (`id`, `name`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Test', 1, '2019-04-26 00:00:00', '2019-04-26 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_type`
--
ALTER TABLE `inventory_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_type`
--
ALTER TABLE `warehouse_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `inventory_type`
--
ALTER TABLE `inventory_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouse_type`
--
ALTER TABLE `warehouse_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
