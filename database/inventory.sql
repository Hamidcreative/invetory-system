-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 07:21 PM
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
  `quantity` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
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

INSERT INTO `inventory` (`id`, `item_id`, `description`, `amount`, `quantity`, `warehouse_id`, `user_id`, `inventory_type_id`, `min_level`, `status`, `updated_at`, `created_at`) VALUES
(1, '3GIS sim', 'SIM-kort', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'DBI2100P18G75', 'Helios Repeater Small 18dBm/75dB 6 Carriers', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'SFP0004', 'SFP,SM,1G,1550,40km', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'TELENOR sim', 'SIM-kort', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'DRI2100P36G90', 'Helios Repeater Large 35dBm/90dB 8 Carriers', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'TRE Sim', 'SIM-kort', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'DRI2100P34G90', 'Helios Repeater Medium 30dBm/90dB 8 Carriers', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'SFP0007', 'SFP,MM,1G,850nm,550m', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'XFP0003', 'XFP,MM,10G,850nm,300m', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'XFP0001', 'XFP,SM,10G,1310nm,10km', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'SFP0007 ', 'SFP,MM,1G,850nm,550m', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'XFP0001 ', 'XFP,SM,10G,1310nm,10km', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'XFP0003 ', 'XFP,MM,10G,850nm,300m', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'XFP0002 ', 'XFP,SM,10G,1550nm,40km', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '6806-17-A', 'Dämpsats N 6db (Helios repeater)', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '6810N-50-1/1-NE', 'Dämpsats N 10 db (Helios repeater)', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'XFP0002', 'XFP,SM,10G,1550nm,40km', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'DRI2100P34G90', 'Helios Repeater Medium 30dBm/90dB 8 Carriers', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'SFP0001', 'SFP,SM,1G,1310,20km', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'SFP0003', 'SFP,SM,1G,1490,40km', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'SFP0002', 'SFP,SM,1G,1310,40km', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'SFP0005', 'SFP,SM,1G,1550,80km', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'SFP0006', 'SFP,SM,1G,1611,40km', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'TRE Sim', 'SIM-kort', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'TELENOR sim', 'SIM-kort', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'T55726B0.52', 'FPMR 26 GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'T55526A0.52', 'FPR 26 GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'T55526A0.02', 'FPR 26 GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'T55526A0', 'Not ok', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'T55538A0.51', 'FPR 38 GHz', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'T55538A0.01', 'FPR 38 GHz', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'T55538A0.51', 'FPR 38 GHz', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'T55726B0.02', 'FPMR 26 GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'T55738B0.01', 'FPMR 38 GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, '01-F18021Hx', 'RFUC 18GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '52519', 'Adapter 15G for FH antenna', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '52520', 'Adapter 18-28G for FH antenna', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'T555FME0.20', 'FirstMile 200', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, '01-C15003L0', 'RFUC 15GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '09-A501-9', 'IP10 IDU', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'T555800GBE.00', 'FPH800 4xGBE Card', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'T555800MB.00', 'FPH800 Base Systsem', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'T55726B0.52    ', 'FPMR 26 GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'T55538A0.01', 'FPR 38 GHz', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'T55715B0.01', 'FPMR 15 GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'T557ETFPR.00', 'FPMR assembled ETH cable 100m', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'T557ETFPR.50', 'FPMR assembled ETH cable 50m', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'T557ETFPR.75', 'FPMR assembled ETH cable 75m', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'T55515A0.51', 'FPR 15GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'T55515A0.01', 'FPR 15GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'T55518A1.52', 'FPR 18 GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'T55518A1.02', 'FPR 18 GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'T55715B0.51', 'FPMR 15 GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'T55718B1.02', 'FPMR 18 GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'T55718B1.52', 'FPMR 18 GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'T55738B0.51', 'FPMR 38 GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'T555ETLE.08', 'FPR Lemo Connector', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'T55526A0.02', 'FPR 26 GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, '01-F26694H2', 'RFUC 26Ghz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'T555PIDO.01', 'Power Injector 1port', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'T555PIDI.04', 'Power Injector 4port', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, '01-F26694L2', 'RFUC 26Ghz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, '01-C15003H0', 'RFUC 15GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, '01-7021HA', 'RFUC 18GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, '01-F18021H2', 'RFUC 18GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, '01-F18021H3', 'RFUC 18GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, '01-7021LA', 'RFUC 18GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, '01-F18021L2', 'RFUC 18GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, '01-F18021L3', 'RFUC 18GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, '01-F18021Lx', 'RFUC 18GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, '01-F38716L0', 'RFUC 26Ghz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, '52553', 'RFUC 38GHZ Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, '55619', 'RFUC FH 18GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, '56618', 'RFUC FH 18GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, '01-T26694H0', 'RFUC FH 26GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, '56622', 'RFUC FH 26GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, '01-T26694L0', 'RFUC FH 26GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, '35484', 'RFUP 26GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, '01-8010-0', 'RFUP 38GHZ High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, '01-8009-0', 'RFUP 38GHZ Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, '56619', 'RFUC FH 18GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, '52554', 'RFUC 38GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, '57612', '38GHz', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, '57613', '38GHz', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'T55726B0', 'Not ok', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, '52531', 'RFUC 15GHz High', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, '52530', 'RFUC 15GHz Low', 0, 4, 1, 0, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `detail` text NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `warehouse_id` int(11) DEFAULT NULL,
  `rout` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `user_id`, `model_id`, `method`, `model_name`, `detail`, `updated_at`, `created_at`, `warehouse_id`, `rout`) VALUES
(1, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-04 12:55:42', '2019-05-04 12:55:42', NULL, 'warehouse/view/2'),
(2, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-04 12:56:40', '2019-05-04 12:56:40', NULL, 'warehouse/view/2'),
(3, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-04 12:56:42', '2019-05-04 12:56:42', NULL, 'warehouse/view/2'),
(4, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-04 18:09:20', '2019-05-04 18:09:20', NULL, 'warehouse/view/2'),
(5, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-05 19:18:32', '2019-05-05 19:18:32', NULL, 'warehouse/view/2'),
(6, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 19:18:48', '2019-05-05 19:18:48', NULL, 'warehouse/view/2'),
(7, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-05 19:19:42', '2019-05-05 19:19:42', NULL, 'warehouse/view/2'),
(8, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 20:34:38', '2019-05-05 20:34:38', NULL, 'warehouse/view/2'),
(9, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 20:34:42', '2019-05-05 20:34:42', NULL, 'warehouse/view/2'),
(10, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 20:34:52', '2019-05-05 20:34:52', NULL, 'warehouse/view/2'),
(11, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-05 20:37:34', '2019-05-05 20:37:34', NULL, 'warehouse/view/2'),
(12, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 20:37:51', '2019-05-05 20:37:51', NULL, 'warehouse/view/2'),
(13, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-05 20:37:57', '2019-05-05 20:37:57', NULL, 'warehouse/view/2'),
(14, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 20:38:01', '2019-05-05 20:38:01', NULL, 'warehouse/view/2'),
(15, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-05 20:38:11', '2019-05-05 20:38:11', NULL, 'warehouse/view/2'),
(16, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 20:38:16', '2019-05-05 20:38:16', NULL, 'warehouse/view/2'),
(17, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-05 20:38:19', '2019-05-05 20:38:19', NULL, 'warehouse/view/2'),
(18, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 20:40:08', '2019-05-05 20:40:08', NULL, 'warehouse/view/2'),
(19, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-05 20:40:15', '2019-05-05 20:40:15', NULL, 'warehouse/view/2'),
(20, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 20:40:29', '2019-05-05 20:40:29', NULL, 'warehouse/view/2'),
(21, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-05 20:41:35', '2019-05-05 20:41:35', NULL, 'warehouse/view/2'),
(22, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 20:41:53', '2019-05-05 20:41:53', NULL, 'warehouse/view/2'),
(23, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 21:29:35', '2019-05-05 21:29:35', NULL, 'warehouse/view/2'),
(24, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-05 21:29:42', '2019-05-05 21:29:42', NULL, 'warehouse/view/2'),
(25, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 21:30:24', '2019-05-05 21:30:24', NULL, 'warehouse/view/2'),
(26, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-05 21:30:55', '2019-05-05 21:30:55', NULL, 'warehouse/view/2'),
(27, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 21:31:48', '2019-05-05 21:31:48', NULL, 'warehouse/view/2'),
(28, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-05 21:33:28', '2019-05-05 21:33:28', NULL, 'warehouse/view/2'),
(29, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 21:34:11', '2019-05-05 21:34:11', NULL, 'warehouse/view/2'),
(30, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-05 21:34:13', '2019-05-05 21:34:13', NULL, 'warehouse/view/2'),
(31, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 21:34:15', '2019-05-05 21:34:15', NULL, 'warehouse/view/2'),
(32, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-05 21:34:17', '2019-05-05 21:34:17', NULL, 'warehouse/view/2'),
(33, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-05 21:34:18', '2019-05-05 21:34:18', NULL, 'warehouse/view/2'),
(34, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-08 20:04:31', '2019-05-08 20:04:31', NULL, 'warehouse/view/2'),
(35, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-08 20:04:40', '2019-05-08 20:04:40', NULL, 'warehouse/view/2'),
(36, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-08 20:04:43', '2019-05-08 20:04:43', NULL, 'warehouse/view/2'),
(37, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-08 20:04:47', '2019-05-08 20:04:47', NULL, 'warehouse/view/2'),
(38, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-08 20:05:08', '2019-05-08 20:05:08', NULL, 'warehouse/view/2'),
(39, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-08 20:05:44', '2019-05-08 20:05:44', NULL, 'warehouse/view/2'),
(40, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-08 20:05:46', '2019-05-08 20:05:46', NULL, 'warehouse/view/2'),
(41, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-08 20:05:49', '2019-05-08 20:05:49', NULL, 'warehouse/view/2'),
(42, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-08 20:05:52', '2019-05-08 20:05:52', NULL, 'warehouse/view/2'),
(43, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-08 20:05:57', '2019-05-08 20:05:57', NULL, 'warehouse/view/2'),
(44, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-08 20:05:59', '2019-05-08 20:05:59', NULL, 'warehouse/view/2'),
(45, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-08 20:06:01', '2019-05-08 20:06:01', NULL, 'warehouse/view/2'),
(46, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-08 20:06:07', '2019-05-08 20:06:07', NULL, 'warehouse/view/2'),
(47, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-08 20:06:09', '2019-05-08 20:06:09', NULL, 'warehouse/view/2'),
(48, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-08 20:06:12', '2019-05-08 20:06:12', NULL, 'warehouse/view/2'),
(49, 1, 2, 'removed user', 'warehouse', 'Removed user from  Warehouse', '2019-05-08 20:06:15', '2019-05-08 20:06:15', NULL, 'warehouse/view/2'),
(50, 1, 2, 'Added User', 'warehouse', 'Assigned user to  Warehouse', '2019-05-08 20:06:17', '2019-05-08 20:06:17', NULL, 'warehouse/view/2');

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
-- Table structure for table `warehouse_item`
--

CREATE TABLE `warehouse_item` (
  `id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `item_id` varchar(100) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkin_by` int(11) NOT NULL,
  `checkin_amount` double NOT NULL,
  `checkout_date` date NOT NULL,
  `checkout_by` int(11) NOT NULL,
  `checkout_amount` double NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `send_date` date NOT NULL,
  `send_amount` double NOT NULL,
  `send_by` int(11) NOT NULL,
  `parcel_id` varchar(100) NOT NULL,
  `from_warehouse_id` int(11) NOT NULL,
  `recieve_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse_item`
--

INSERT INTO `warehouse_item` (`id`, `inventory_id`, `item_id`, `checkin_date`, `checkin_by`, `checkin_amount`, `checkout_date`, `checkout_by`, `checkout_amount`, `warehouse_id`, `send_date`, `send_amount`, `send_by`, `parcel_id`, `from_warehouse_id`, `recieve_by`, `status`, `updated_at`, `created_at`) VALUES
(2, 2, 'DBI2100P18G75', '2019-05-21', 1, 15, '2019-05-27', 1, 3, 2, '2019-05-31', 233, 16, '', 2, 17, 0, '2019-05-10 06:30:46', '2019-05-10 06:30:46');

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
-- Indexes for table `warehouse_item`
--
ALTER TABLE `warehouse_item`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
-- AUTO_INCREMENT for table `warehouse_item`
--
ALTER TABLE `warehouse_item`
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
