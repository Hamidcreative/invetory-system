-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 11:55 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
(13, '324324', 'test', 0, 1, '0000-00-00', 0, 0, '0000-00-00', 0, 0, 0, '0000-00-00', 0, 0, '', '0000-00-00', 0, 0, 0, 10, 1, 24234, 0, '2019-04-27 01:34:35', '2019-04-27 01:34:35'),
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
(2, 'testing', 'test inventory type description', 1, '2019-04-27 00:00:00', '2019-04-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `code`, `created_date`, `updated_at`) VALUES
(3, 'view_WH', '4_WH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'view_WH', '5_WH', '2019-04-30 18:04:59', '2019-04-30 18:04:59');

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
(1, 'admin', 'admin@yopmail.com', 'b899ebc7cc30af3a862d3b5c2b4f9b96', 'Hamid4', 'Raza', 1, 'avatar-7.png', 'test', '2019-04-30 09:15:51', '2019-04-25 00:00:00'),
(19, 'test', 'sageattar13122@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 1, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'test32', 'test33@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 1, 'Desert.jpg', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'test434', 'test323@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 1, 'Desert1.jpg', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'admin44', 'tes44t@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 1, 'Chrysanthemum.jpg', '', '2019-04-27 10:30:08', '0000-00-00 00:00:00'),
(23, 'admin444', 'erere@top.com', '098f6bcd4621d373cade4e832627b4f6', 'ee', 'tee', 0, 'Desert3.jpg', NULL, '2019-04-27 01:46:25', '2019-04-27 01:46:25'),
(24, 'admin3333', 'tes333t@yopmail.com', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 1, 'Hydrangeas.jpg', 'test', '2019-04-27 02:10:25', '2019-04-27 02:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `method` varchar(100) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action_on` int(11) DEFAULT NULL,
  `rout` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `user_id`, `model_id`, `method`, `model_name`, `detail`, `updated_at`, `created_at`, `action_on`, `rout`) VALUES
(1, 1, 4, 'removed user', 'warehouseuu', 'Removed user from  Warehouse', '2019-05-01 01:12:19', '2019-05-01 01:12:19', 22, 'warehouse/view/4'),
(2, 1, 4, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-01 01:12:20', '2019-05-01 01:12:20', 21, 'warehouse/view/4'),
(3, 1, 4, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-01 01:12:22', '2019-05-01 01:12:22', 24, 'warehouse/view/4'),
(5, 1, 13, 'Status Upated', 'spares', 'Spare part status updated', '2019-05-01 02:45:16', '2019-05-01 02:45:16', 13, 'inventory/13');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(13, 20, 3, '2019-04-30 18:01:44', '2019-04-30 18:01:44'),
(14, 1, 3, '2019-04-30 18:01:45', '2019-04-30 18:01:45'),
(15, 19, 3, '2019-04-30 18:01:47', '2019-04-30 18:01:47');

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
(1, 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

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
(4, 'Main Warehosue', '  Main Warehouse karachi', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Local Warehouse', '  Local Warehouse lahore', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(1, 'Local', 1, '2019-04-26 00:00:00', '2019-04-26 00:00:00'),
(2, 'Main', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
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
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
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
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warehouse_type`
--
ALTER TABLE `warehouse_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
