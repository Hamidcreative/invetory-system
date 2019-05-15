-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 09:15 PM
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
  `inventory_type_id` int(11) NOT NULL,
  `serial_number` varchar(30) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item_id`, `description`, `inventory_type_id`, `serial_number`, `updated_at`, `created_at`) VALUES
(3, '2342344', 'Item Description1', 2, '', '2019-05-14 07:58:29', '2019-05-14 06:03:34'),
(4, '12345', 'Item Description', 7, '', '2019-05-15 08:25:18', '2019-05-15 05:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_transfer`
--

CREATE TABLE `inventory_transfer` (
  `id` int(11) NOT NULL,
  `warehouse_inventory_id` int(11) NOT NULL,
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_transfer`
--

INSERT INTO `inventory_transfer` (`id`, `warehouse_inventory_id`, `from_warehouse_id`, `to_warehouse_id`, `quantity`, `from_user_id`, `to_user_id`, `type`, `created_at`) VALUES
(1, 1, 2, 3, 5, 1, 3, 1, 2019),
(2, 1, 2, 3, 11, 1, 17, 1, 2019),
(3, 1, 3, 2, 5, 17, 1, 2, 2019),
(4, 1, 2, NULL, 30, 1, 17, 3, 2019),
(5, 1, 0, 2, 8, 17, 1, 4, 2019);

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
(1, 'Ej licens kontroll', 'Ej licens kontroll', 1, '2019-05-01 06:24:38', '2019-05-01 06:24:38'),
(2, 'Kontroll', 'Kontroll', 1, '2019-05-01 06:24:38', '2019-05-01 06:24:38'),
(3, 'test', 'test', 1, '2019-05-01 06:31:29', '2019-05-01 06:31:29'),
(4, 'Item2  Description', 'Item2  Description', 1, '2019-05-01 06:31:29', '2019-05-01 06:31:29'),
(5, 'Item Description', 'Item Description', 1, '2019-05-01 06:31:29', '2019-05-01 06:31:29'),
(6, 'Kevin', 'Kevin', 1, '2019-05-01 06:32:08', '2019-05-01 06:32:08'),
(7, 'Seetal', 'Seetal', 1, '2019-05-01 06:32:08', '2019-05-01 06:32:08'),
(8, 'Frances', 'Frances', 1, '2019-05-01 06:32:08', '2019-05-01 06:32:08'),
(9, 'Aneisha', 'Aneisha', 1, '2019-05-01 06:32:08', '2019-05-01 06:32:08'),
(10, 'Michael', 'Michael', 1, '2019-05-01 06:32:09', '2019-05-01 06:32:09'),
(11, 'Barry', 'Barry', 1, '2019-05-01 06:32:09', '2019-05-01 06:32:09'),
(12, 'Kathleen', 'Kathleen', 1, '2019-05-01 06:32:09', '2019-05-01 06:32:09'),
(13, 'Kristian', 'Kristian', 1, '2019-05-01 06:32:09', '2019-05-01 06:32:09'),
(14, 'Philip', 'Philip', 1, '2019-05-01 06:32:09', '2019-05-01 06:32:09'),
(15, 'S', 'S', 1, '2019-05-01 06:32:09', '2019-05-01 06:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `code`) VALUES
(2, 'View Warehouse', '2_view_WH'),
(3, 'View Warehouse', '3_view_WH');

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
(2, 'Super User', 1, '2019-04-26 00:00:00', '2019-04-26 00:00:00'),
(3, 'End User', 1, '2019-04-26 00:00:00', '2019-04-26 00:00:00');

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
(1, 'admin', 'admin@yopmail.com', '0192023a7bbd73250516f069df18b500', 'Hamid4', 'Raza', 1, 'Penguins.jpg', 'test', '2019-05-05 11:35:12', '2019-04-25 00:00:00'),
(3, 'admin1', 'admin2@yopmail.com', '0192023a7bbd73250516f069df18b500', 'Hamid4', 'Raza', 1, 'Jellyfish.jpg', '', '2019-05-05 11:36:36', '2019-04-25 00:00:00'),
(16, 'admin13', 'test@yopmail.com', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 1, '', '', '2019-04-30 05:54:00', '0000-00-00 00:00:00'),
(17, 'admin135', 'sageattar1122@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 1, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'admin134', 'sageattar11224@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'test', 'sageattar13122@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'test32', 'test33@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 0, 'Desert.jpg', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'test434', 'test323@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 0, 'Desert1.jpg', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'admin44', 'tes44t@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Arslan Mehmood', 'Khalid', 0, 'Chrysanthemum.jpg', '', '2019-04-27 10:30:08', '0000-00-00 00:00:00'),
(23, 'admin444', 'erere@top.com', '098f6bcd4621d373cade4e832627b4f6', 'ee', 'tee', 0, 'Desert3.jpg', NULL, '2019-04-27 01:46:25', '2019-04-27 01:46:25'),
(24, 'admin3333', 'tes333t@yopmail.com', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 0, 'Hydrangeas.jpg', 'test', '2019-04-27 02:10:25', '2019-04-27 02:01:15'),
(25, 'admin4435', 'sageattar112454352@gmail.com', '0192023a7bbd73250516f069df18b500', 'Arslan Mehmood', 'Khalid', 1, 'Desert4.jpg', '', '2019-05-04 01:43:42', '2019-04-28 12:52:51'),
(26, 'admin33223', 'sageat23322tar1122@gmail.com', '0192023a7bbd73250516f069df18b500', 'Arslan Mehmood', 'Khalid', 0, 'Hydrangeas1.jpg', NULL, '2019-04-28 12:57:21', '2019-04-28 12:57:21'),
(27, 'adminsdfsdf', 'sageattar1sdfsdf122@gmail.com', '0192023a7bbd73250516f069df18b500', 'Arslan Mehmood', 'Khalid', 0, 'Hydrangeas2.jpg', NULL, '2019-04-28 01:01:52', '2019-04-28 01:01:52'),
(28, 'admin343', 'sageatta435435r1122@gmail.com', '0192023a7bbd73250516f069df18b500', 'Arslan Mehmood', 'Khalid', 0, 'Jellyfish1.jpg', NULL, '2019-04-28 01:03:25', '2019-04-28 01:03:25'),
(29, 'adminewrewr', 'sageattar112ewrwerwer2@gmail.com', '0192023a7bbd73250516f069df18b500', 'Arslan Mehmood', 'Khalid', 0, 'Hydrangeas3.jpg', NULL, '2019-04-28 01:04:08', '2019-04-28 01:04:08'),
(30, 'adminftrtyrt', 'sageattar1ryrtytry122@gmail.com', '0192023a7bbd73250516f069df18b500', 'Arslan Mehmood', 'Khalid', 0, 'Hydrangeas4.jpg', NULL, '2019-04-28 01:07:12', '2019-04-28 01:07:12');

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
  `name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `warehouse_id` int(11) DEFAULT NULL,
  `rout` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `user_id`, `model_id`, `method`, `model_name`, `name`, `detail`, `updated_at`, `created_at`, `warehouse_id`, `rout`) VALUES
(1, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-04 12:55:42', '2019-05-04 12:55:42', NULL, 'warehouse/view/2'),
(2, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-04 12:56:40', '2019-05-04 12:56:40', NULL, 'warehouse/view/2'),
(3, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-04 12:56:42', '2019-05-04 12:56:42', NULL, 'warehouse/view/2'),
(4, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-04 18:09:20', '2019-05-04 18:09:20', NULL, 'warehouse/view/2'),
(5, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-05 19:18:32', '2019-05-05 19:18:32', NULL, 'warehouse/view/2'),
(6, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 19:18:48', '2019-05-05 19:18:48', NULL, 'warehouse/view/2'),
(7, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-05 19:19:42', '2019-05-05 19:19:42', NULL, 'warehouse/view/2'),
(8, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 20:34:38', '2019-05-05 20:34:38', NULL, 'warehouse/view/2'),
(9, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 20:34:42', '2019-05-05 20:34:42', NULL, 'warehouse/view/2'),
(10, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 20:34:52', '2019-05-05 20:34:52', NULL, 'warehouse/view/2'),
(11, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-05 20:37:34', '2019-05-05 20:37:34', NULL, 'warehouse/view/2'),
(12, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 20:37:51', '2019-05-05 20:37:51', NULL, 'warehouse/view/2'),
(13, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-05 20:37:57', '2019-05-05 20:37:57', NULL, 'warehouse/view/2'),
(14, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 20:38:01', '2019-05-05 20:38:01', NULL, 'warehouse/view/2'),
(15, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-05 20:38:11', '2019-05-05 20:38:11', NULL, 'warehouse/view/2'),
(16, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 20:38:16', '2019-05-05 20:38:16', NULL, 'warehouse/view/2'),
(17, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-05 20:38:19', '2019-05-05 20:38:19', NULL, 'warehouse/view/2'),
(18, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 20:40:08', '2019-05-05 20:40:08', NULL, 'warehouse/view/2'),
(19, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-05 20:40:15', '2019-05-05 20:40:15', NULL, 'warehouse/view/2'),
(20, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 20:40:29', '2019-05-05 20:40:29', NULL, 'warehouse/view/2'),
(21, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-05 20:41:35', '2019-05-05 20:41:35', NULL, 'warehouse/view/2'),
(22, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 20:41:53', '2019-05-05 20:41:53', NULL, 'warehouse/view/2'),
(23, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 21:29:35', '2019-05-05 21:29:35', NULL, 'warehouse/view/2'),
(24, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-05 21:29:42', '2019-05-05 21:29:42', NULL, 'warehouse/view/2'),
(25, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 21:30:24', '2019-05-05 21:30:24', NULL, 'warehouse/view/2'),
(26, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-05 21:30:55', '2019-05-05 21:30:55', NULL, 'warehouse/view/2'),
(27, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 21:31:48', '2019-05-05 21:31:48', NULL, 'warehouse/view/2'),
(28, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-05 21:33:28', '2019-05-05 21:33:28', NULL, 'warehouse/view/2'),
(29, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 21:34:11', '2019-05-05 21:34:11', NULL, 'warehouse/view/2'),
(30, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-05 21:34:13', '2019-05-05 21:34:13', NULL, 'warehouse/view/2'),
(31, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 21:34:15', '2019-05-05 21:34:15', NULL, 'warehouse/view/2'),
(32, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-05 21:34:17', '2019-05-05 21:34:17', NULL, 'warehouse/view/2'),
(33, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-05 21:34:18', '2019-05-05 21:34:18', NULL, 'warehouse/view/2'),
(34, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-08 20:04:31', '2019-05-08 20:04:31', NULL, 'warehouse/view/2'),
(35, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-08 20:04:40', '2019-05-08 20:04:40', NULL, 'warehouse/view/2'),
(36, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-08 20:04:43', '2019-05-08 20:04:43', NULL, 'warehouse/view/2'),
(37, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-08 20:04:47', '2019-05-08 20:04:47', NULL, 'warehouse/view/2'),
(38, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-08 20:05:08', '2019-05-08 20:05:08', NULL, 'warehouse/view/2'),
(39, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-08 20:05:44', '2019-05-08 20:05:44', NULL, 'warehouse/view/2'),
(40, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-08 20:05:46', '2019-05-08 20:05:46', NULL, 'warehouse/view/2'),
(41, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-08 20:05:49', '2019-05-08 20:05:49', NULL, 'warehouse/view/2'),
(42, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-08 20:05:52', '2019-05-08 20:05:52', NULL, 'warehouse/view/2'),
(43, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-08 20:05:57', '2019-05-08 20:05:57', NULL, 'warehouse/view/2'),
(44, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-08 20:05:59', '2019-05-08 20:05:59', NULL, 'warehouse/view/2'),
(45, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-08 20:06:01', '2019-05-08 20:06:01', NULL, 'warehouse/view/2'),
(46, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-08 20:06:07', '2019-05-08 20:06:07', NULL, 'warehouse/view/2'),
(47, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-08 20:06:09', '2019-05-08 20:06:09', NULL, 'warehouse/view/2'),
(48, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-08 20:06:12', '2019-05-08 20:06:12', NULL, 'warehouse/view/2'),
(49, 1, 2, 'removed user', 'warehouse', '', 'Removed user from  Warehouse', '2019-05-08 20:06:15', '2019-05-08 20:06:15', NULL, 'warehouse/view/2'),
(50, 1, 2, 'Added User', 'warehouse', '', 'Assigned user to  Warehouse', '2019-05-08 20:06:17', '2019-05-08 20:06:17', NULL, 'warehouse/view/2'),
(51, 1, 3, 'Status Upated', 'spares', '', 'Spare part status updated', '2019-05-14 22:36:49', '2019-05-14 22:36:49', NULL, 'inventory/3'),
(52, 1, 3, 'Status Upated', 'spares', '', 'Spare part status updated', '2019-05-14 22:36:51', '2019-05-14 22:36:51', NULL, 'inventory/3'),
(53, 1, 3, 'Status Upated', 'spares', '', 'Spare part status updated', '2019-05-14 22:57:15', '2019-05-14 22:57:15', NULL, 'inventory/3'),
(54, 1, 3, 'Status Upated', 'spares', '', 'Spare part status updated', '2019-05-14 22:57:18', '2019-05-14 22:57:18', NULL, 'inventory/3'),
(55, 1, 0, 'Logged in', 'User', 'admin', 'User logged in', '2019-05-15 20:18:56', '2019-05-15 20:18:56', 0, 'users/1'),
(56, 1, 1, 'Status Upated', 'spares', '', 'Spare part status updated', '2019-05-15 23:21:15', '2019-05-15 23:21:15', NULL, 'inventory/1');

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
(17, 25, 2, '2019-05-05 20:41:53', '2019-05-05 20:41:53'),
(24, 17, 2, '2019-05-08 20:04:40', '2019-05-08 20:04:40'),
(26, 16, 2, '2019-05-08 20:05:08', '2019-05-08 20:05:08'),
(32, 3, 2, '2019-05-08 20:06:16', '2019-05-08 20:06:16');

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
(2, 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3),
(3, 26, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 27, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 28, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 29, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(9, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2);

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
(2, 'Warehouse name', 'Warehouse description ---  ', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Warehouse2', 'Some description  ', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_inventory`
--

CREATE TABLE `warehouse_inventory` (
  `id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `min_level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse_inventory`
--

INSERT INTO `warehouse_inventory` (`id`, `inventory_id`, `warehouse_id`, `quantity`, `min_level`, `status`, `updated_at`, `created_at`) VALUES
(1, 4, 2, 12, 32, 1, '2019-05-15 08:25:19', '2019-05-15 05:21:25');

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
-- Indexes for table `inventory_transfer`
--
ALTER TABLE `inventory_transfer`
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
-- Indexes for table `warehouse_inventory`
--
ALTER TABLE `warehouse_inventory`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory_transfer`
--
ALTER TABLE `inventory_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory_type`
--
ALTER TABLE `inventory_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warehouse_inventory`
--
ALTER TABLE `warehouse_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouse_type`
--
ALTER TABLE `warehouse_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
