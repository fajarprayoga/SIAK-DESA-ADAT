-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 12:10 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siak`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `normal_balance` enum('debit','credit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `code`, `name`, `is_delete`, `normal_balance`, `created_at`, `updated_at`) VALUES
(1, '1000', 'Aktiva', 0, 'debit', '0000-00-00 00:00:00', '2022-01-10 07:46:31'),
(2, '1100', 'Aktiva Lancar', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '1101', 'Kas Kecil', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '1102', 'Kas Bank', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '1103', 'Piutang Usaha', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '1104', 'Perlengkapan Kantor', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '1200', 'Aktiva Tetap', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '1201', 'CCTV', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '1202', 'Akumulasi Penyusutan CCTV', 0, 'credit', '0000-00-00 00:00:00', '2022-01-04 09:03:24'),
(10, '1203', 'Modem Internet', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '1204', 'Akumulasi Penyusutan Modem Internet', 0, 'credit', '0000-00-00 00:00:00', '2022-01-04 09:11:37'),
(12, '1205', 'Kompor Gas', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '1206', 'Akumulasi Penyusutan Kompor Gas', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '1207', 'Kunci Mesin', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '1208', 'Akumulasi Penyusutan Kunci Mesin', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '1209', 'Lemari Kayu', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '1210', 'Akumulasi Penyusutan Lemari Kayu', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '1211', 'Eskavator (Alat Berat)', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '1212', 'Akumulasi Penyusutan Eskavator (Alat Berat)', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '1213', 'Ayakan Cor', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '1214', 'Akumulasi Penyusutan Ayakan Cor', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '1215', 'Ayakan Super', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '1216', 'Akumulasi Penyusutan Ayakan Super', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '2000', 'Hutang Usaha', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, '2100', 'Hutang Jangka Pendek', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '2101', 'Hutang Gaji', 0, 'credit', '0000-00-00 00:00:00', '2022-01-10 07:41:56'),
(27, '2102', 'Hutang Listrik, Air dan Telepon', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, '2200', 'Hutang Jangka Panjang', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '2201', 'Hutang Bank', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '3000', 'Modal', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '3001', 'Modal Bapak Beni', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '3002', 'Modal Bapak Eka', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '3003', 'Modal Bapak Budi', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '3100', 'Laba Ditahan/Modal Cadangan', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, '3101', 'Laba Ditahan/Modal Cadangan', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '3102', 'Modal Cadangan', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '4000', 'Penjualan', 0, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, '5000', 'Biaya-Biaya', 0, 'debit', '0000-00-00 00:00:00', '2022-01-10 07:45:13'),
(39, '5100', 'Biaya Gaji Operator', 0, 'debit', '0000-00-00 00:00:00', '2022-01-10 07:52:06'),
(40, '5101', 'Biaya Solar', 0, 'debit', '0000-00-00 00:00:00', '2022-01-10 07:52:36'),
(41, '5102', 'Biaya Sewa Lahan', 0, 'debit', '0000-00-00 00:00:00', '2022-01-10 07:53:12'),
(42, '5103', 'Biaya Oli dan Pelumas', 0, 'debit', '0000-00-00 00:00:00', '2022-01-10 07:54:27'),
(43, '5104', 'Biaya Spare Part', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, '5105', 'Biaya Penyusutan ', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, '5106', 'Biaya Listrik, Air dan Telepon', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, '5107', 'Biaya Pemeliharaan Alat', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, '5108', 'Biaya Retribusi ', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, '5109', 'Biaya Sewa', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, '5110', 'Biaya Promosi', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, '5111', 'Biaya Asuransi', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, '5112', 'Biaya Administrasi', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, '5113', 'Biaya Pajak', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, '5114', 'Biaya Lain-Lain', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, '5115', 'Biaya Gaji Operator', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, '5116', 'Biaya Konsumsi', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, '5117', 'Biaya Gaji Helper', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, '5118', 'Biaya Tukang Gosek', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, '5119', 'Biaya Atensi Desa', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, '5120', 'Biaya Gaji Kasir', 0, 'debit', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gosek`
--

CREATE TABLE `gosek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `expense` decimal(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gosek`
--

INSERT INTO `gosek` (`id`, `transaction_id`, `expense`, `created_at`, `updated_at`) VALUES
(2, 18, '5000.00', '2021-12-26 16:00:00', '2021-12-26 23:15:36'),
(3, 27, '45000.00', '2022-01-09 16:00:00', '2022-01-10 07:32:45'),
(4, 28, '10000.00', '2022-01-03 16:00:00', '2022-01-04 08:25:51'),
(5, 37, '500000.00', '2022-01-03 16:00:00', '2022-01-04 08:33:05'),
(7, 26, '5000000.00', '2022-01-04 16:00:00', '2022-01-05 11:07:29'),
(8, 27, '450000.00', '2022-01-04 16:00:00', '2022-01-05 11:10:04'),
(9, 28, '500000.00', '2022-01-03 16:00:00', '2022-01-05 11:12:48'),
(10, 37, '5000.00', '2022-01-06 16:00:00', '2022-01-07 00:12:10'),
(11, 78, '0.00', '2022-01-09 16:00:00', '2022-01-10 07:27:44'),
(12, 87, '4500.00', '2022-01-09 16:00:00', '2022-01-10 09:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `incomestatement`
--

CREATE TABLE `incomestatement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `register` date NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','rejected','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomestatement`
--

INSERT INTO `incomestatement` (`id`, `register`, `title`, `status`, `note`, `created_at`, `updated_at`) VALUES
(95, '2022-01-30', 'Laba Rugi', 'approved', NULL, '2022-01-10 09:04:34', '2022-01-10 09:56:30'),
(96, '2022-01-10', 'Laba Rugi New', 'approved', NULL, '2022-01-10 09:18:04', '2022-01-10 09:56:03'),
(97, '2022-01-10', 'Laba Rugi New', 'approved', NULL, '2022-01-10 09:18:16', '2022-01-10 09:55:57'),
(98, '2022-01-10', 'Laba Rugi New', 'rejected', 'edit bagian biaya', '2022-01-10 09:18:24', '2022-01-10 09:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `incomestatement_detail`
--

CREATE TABLE `incomestatement_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `incomestatement_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(11,0) DEFAULT 0,
  `account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `expense` decimal(11,0) NOT NULL DEFAULT 0,
  `type` enum('income','expense') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomestatement_detail`
--

INSERT INTO `incomestatement_detail` (`id`, `incomestatement_id`, `name`, `amount`, `account_id`, `expense`, `type`, `created_at`, `updated_at`) VALUES
(161, 95, 'Biaya-Biaya', '0', 38, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(162, 95, 'Biaya Gaji Operator', '0', 39, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(163, 95, 'Biaya Solar', '0', 40, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(164, 95, 'Biaya Sewa Lahan', '0', 41, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(165, 95, 'Biaya Oli dan Pelumas', '0', 42, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(166, 95, 'Biaya Spare Part', '0', 43, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(167, 95, 'Biaya Penyusutan ', '0', 44, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(168, 95, 'Biaya Listrik, Air dan Telepon', '0', 45, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(169, 95, 'Biaya Pemeliharaan Alat', '0', 46, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(170, 95, 'Biaya Retribusi ', '0', 47, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(171, 95, 'Biaya Sewa', '0', 48, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(172, 95, 'Biaya Promosi', '0', 49, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(173, 95, 'Biaya Asuransi', '0', 50, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(174, 95, 'Biaya Administrasi', '0', 51, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(175, 95, 'Biaya Pajak', '0', 52, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(176, 95, 'Biaya Lain-Lain', '0', 53, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(177, 95, 'Biaya Gaji Operator', '0', 54, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(178, 95, 'Biaya Konsumsi', '0', 55, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(179, 95, 'Biaya Gaji Helper', '0', 56, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(180, 95, 'Biaya Tukang Gosek', '0', 57, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(181, 95, 'Biaya Atensi Desa', '0', 58, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(182, 95, 'Biaya Gaji Kasir', '0', 59, '0', 'expense', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(183, 95, 'Penjualan', '0', 37, '0', 'income', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(184, 95, 'Potongan Penjualan Pasir Super', '50000', NULL, '0', 'income', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(185, 95, 'Potongan Penjualan Pasir Cor', '40000', NULL, '0', 'income', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(186, 95, 'Potongan Penjualan Batu', '60000', NULL, '0', 'income', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(187, 95, 'Biaya Angkut Penjualan', '40000', NULL, '0', 'income', '2022-01-10 09:04:34', '2022-01-10 09:04:34'),
(188, 96, 'Biaya-Biaya', '0', 38, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(189, 96, 'Biaya Gaji Operator', '0', 39, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(190, 96, 'Biaya Solar', '0', 40, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(191, 96, 'Biaya Sewa Lahan', '0', 41, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(192, 96, 'Biaya Oli dan Pelumas', '0', 42, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(193, 96, 'Biaya Spare Part', '0', 43, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(194, 96, 'Biaya Penyusutan ', '0', 44, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(195, 96, 'Biaya Listrik, Air dan Telepon', '0', 45, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(196, 96, 'Biaya Pemeliharaan Alat', '0', 46, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(197, 96, 'Biaya Retribusi ', '0', 47, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(198, 96, 'Biaya Sewa', '0', 48, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(199, 96, 'Biaya Promosi', '0', 49, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(200, 96, 'Biaya Asuransi', '0', 50, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(201, 96, 'Biaya Administrasi', '0', 51, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(202, 96, 'Biaya Pajak', '0', 52, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(203, 96, 'Biaya Lain-Lain', '0', 53, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(204, 96, 'Biaya Gaji Operator', '0', 54, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(205, 96, 'Biaya Konsumsi', '0', 55, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(206, 96, 'Biaya Gaji Helper', '0', 56, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(207, 96, 'Biaya Tukang Gosek', '0', 57, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(208, 96, 'Biaya Atensi Desa', '0', 58, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(209, 96, 'Biaya Gaji Kasir', '0', 59, '0', 'expense', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(210, 96, 'Penjualan', '0', 37, '0', 'income', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(211, 96, 'Potongan Penjualan Pasir Super', '0', NULL, '0', 'income', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(212, 96, 'Potongan Penjualan Pasir Cor', '0', NULL, '0', 'income', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(213, 96, 'Potongan Penjualan Batu', '0', NULL, '0', 'income', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(214, 96, 'Biaya Angkut Penjualan', '0', NULL, '0', 'income', '2022-01-10 09:18:04', '2022-01-10 09:18:04'),
(215, 97, 'Biaya-Biaya', '0', 38, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(216, 97, 'Biaya Gaji Operator', '0', 39, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(217, 97, 'Biaya Solar', '0', 40, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(218, 97, 'Biaya Sewa Lahan', '0', 41, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(219, 97, 'Biaya Oli dan Pelumas', '0', 42, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(220, 97, 'Biaya Spare Part', '0', 43, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(221, 97, 'Biaya Penyusutan ', '0', 44, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(222, 97, 'Biaya Listrik, Air dan Telepon', '0', 45, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(223, 97, 'Biaya Pemeliharaan Alat', '0', 46, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(224, 97, 'Biaya Retribusi ', '0', 47, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(225, 97, 'Biaya Sewa', '0', 48, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(226, 97, 'Biaya Promosi', '0', 49, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(227, 97, 'Biaya Asuransi', '0', 50, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(228, 97, 'Biaya Administrasi', '0', 51, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(229, 97, 'Biaya Pajak', '0', 52, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(230, 97, 'Biaya Lain-Lain', '0', 53, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(231, 97, 'Biaya Gaji Operator', '0', 54, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(232, 97, 'Biaya Konsumsi', '0', 55, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(233, 97, 'Biaya Gaji Helper', '0', 56, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(234, 97, 'Biaya Tukang Gosek', '0', 57, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(235, 97, 'Biaya Atensi Desa', '0', 58, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(236, 97, 'Biaya Gaji Kasir', '0', 59, '0', 'expense', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(237, 97, 'Penjualan', '0', 37, '0', 'income', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(238, 97, 'Potongan Penjualan Pasir Super', '0', NULL, '0', 'income', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(239, 97, 'Potongan Penjualan Pasir Cor', '0', NULL, '0', 'income', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(240, 97, 'Potongan Penjualan Batu', '0', NULL, '0', 'income', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(241, 97, 'Biaya Angkut Penjualan', '0', NULL, '0', 'income', '2022-01-10 09:18:16', '2022-01-10 09:18:16'),
(242, 98, 'Biaya-Biaya', '0', 38, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(243, 98, 'Biaya Gaji Operator', '0', 39, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(244, 98, 'Biaya Solar', '0', 40, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(245, 98, 'Biaya Sewa Lahan', '0', 41, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(246, 98, 'Biaya Oli dan Pelumas', '0', 42, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(247, 98, 'Biaya Spare Part', '0', 43, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(248, 98, 'Biaya Penyusutan ', '0', 44, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(249, 98, 'Biaya Listrik, Air dan Telepon', '0', 45, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(250, 98, 'Biaya Pemeliharaan Alat', '0', 46, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(251, 98, 'Biaya Retribusi ', '0', 47, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(252, 98, 'Biaya Sewa', '0', 48, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(253, 98, 'Biaya Promosi', '0', 49, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(254, 98, 'Biaya Asuransi', '0', 50, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(255, 98, 'Biaya Administrasi', '0', 51, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(256, 98, 'Biaya Pajak', '0', 52, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(257, 98, 'Biaya Lain-Lain', '0', 53, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(258, 98, 'Biaya Gaji Operator', '0', 54, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(259, 98, 'Biaya Konsumsi', '0', 55, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(260, 98, 'Biaya Gaji Helper', '0', 56, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(261, 98, 'Biaya Tukang Gosek', '0', 57, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(262, 98, 'Biaya Atensi Desa', '0', 58, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(263, 98, 'Biaya Gaji Kasir', '0', 59, '0', 'expense', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(264, 98, 'Penjualan', '0', 37, '0', 'income', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(265, 98, 'Potongan Penjualan Pasir Super', '0', NULL, '0', 'income', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(266, 98, 'Potongan Penjualan Pasir Cor', '0', NULL, '0', 'income', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(267, 98, 'Potongan Penjualan Batu', '0', NULL, '0', 'income', '2022-01-10 09:18:24', '2022-01-10 09:18:24'),
(268, 98, 'Biaya Angkut Penjualan', '0', NULL, '0', 'income', '2022-01-10 09:18:24', '2022-01-10 09:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `register` date NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','rejected','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `register`, `title`, `description`, `status`, `note`, `created_at`, `updated_at`) VALUES
(6, '2022-01-05', 'Jurnal periode 05 01 22', 'Jurnal periode 05 01 22', 'rejected', 'kekeliruan pada keterangan', '2022-01-05 11:30:36', '2022-01-10 09:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `journal_details`
--

CREATE TABLE `journal_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `journal_id` bigint(20) UNSIGNED NOT NULL,
  `types` enum('debit','credit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(11,0) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journal_details`
--

INSERT INTO `journal_details` (`id`, `account_id`, `journal_id`, `types`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(9, 1, 6, 'debit', '2000000', 'Activa', NULL, NULL),
(10, 9, 6, 'credit', '250000', 'CCTV', NULL, NULL),
(11, 13, 6, 'credit', '40000', 'Gas', NULL, NULL),
(12, 19, 6, 'credit', '610000', 'eksavator', NULL, NULL),
(13, 21, 6, 'credit', '400000', 'ayakan cor', NULL, NULL),
(14, 23, 6, 'credit', '450000', 'ayakan super', NULL, NULL),
(15, 27, 6, 'credit', '250000', '-', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE `ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `register` date NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','rejected','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `register`, `title`, `description`, `status`, `note`, `created_at`, `updated_at`) VALUES
(10, '2022-01-30', 'Periode Januari 2022', 'Buku besar periode Januari 2022 dari tanggal 1- 29.', 'approved', NULL, '2022-01-10 08:17:30', '2022-01-10 09:52:08'),
(11, '2022-01-10', 'Buku Besar 20002', 'LKLKSLkakclaskdl', 'rejected', 'cek kembali pada aktiva', '2022-01-10 09:21:43', '2022-01-10 09:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `ledger_details`
--

CREATE TABLE `ledger_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `ledger_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `types` enum('debit','credit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(11,0) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ledger_details`
--

INSERT INTO `ledger_details` (`id`, `date`, `ledger_id`, `account_id`, `types`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(5, '1970-01-01', 10, 1, 'debit', '2000000', 'Activa', '2022-01-10 08:17:30', '2022-01-10 08:17:30'),
(6, '1970-01-01', 10, 9, 'credit', '250000', 'CCTV', '2022-01-10 08:17:30', '2022-01-10 08:17:30'),
(7, '1970-01-01', 10, 13, 'credit', '40000', 'Gas', '2022-01-10 08:17:30', '2022-01-10 08:17:30'),
(8, '1970-01-01', 10, 19, 'credit', '610000', 'eksavator', '2022-01-10 08:17:30', '2022-01-10 08:17:30'),
(9, '1970-01-01', 10, 21, 'credit', '400000', 'ayakan cor', '2022-01-10 08:17:30', '2022-01-10 08:17:30'),
(10, '1970-01-01', 10, 23, 'credit', '450000', 'ayakan super', '2022-01-10 08:17:30', '2022-01-10 08:17:30'),
(11, '1970-01-01', 10, 27, 'credit', '250000', '-', '2022-01-10 08:17:30', '2022-01-10 08:17:30'),
(12, '1970-01-01', 11, 1, 'debit', '2000000', 'Activa', '2022-01-10 09:21:43', '2022-01-10 09:21:43'),
(13, '1970-01-01', 11, 9, 'credit', '250000', 'CCTV', '2022-01-10 09:21:43', '2022-01-10 09:21:43'),
(14, '1970-01-01', 11, 13, 'credit', '40000', 'Gas', '2022-01-10 09:21:43', '2022-01-10 09:21:43'),
(15, '1970-01-01', 11, 19, 'credit', '610000', 'eksavator', '2022-01-10 09:21:43', '2022-01-10 09:21:43'),
(16, '1970-01-01', 11, 21, 'credit', '400000', 'ayakan cor', '2022-01-10 09:21:43', '2022-01-10 09:21:43'),
(17, '1970-01-01', 11, 23, 'credit', '450000', 'ayakan super', '2022-01-10 09:21:43', '2022-01-10 09:21:43'),
(18, '1970-01-01', 11, 27, 'credit', '250000', '-', '2022-01-10 09:21:43', '2022-01-10 09:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Batu', 0, '2021-12-26 22:48:19', '2021-12-26 22:48:19'),
(2, 'Pasir', 0, '2022-01-04 08:32:43', '2022-01-10 07:33:43'),
(3, 'Koral', 1, '2022-01-10 07:34:10', '2022-01-10 07:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_09_20_105109_add_votes_to_users_table', 1),
(5, '2021_09_20_120943_create_accounts_table', 1),
(6, '2021_09_21_105526_add_is_delete_to_accounts_table', 1),
(7, '2021_09_22_115552_create_journals_table', 1),
(8, '2021_09_22_121055_create_journal_details_table', 1),
(9, '2021_12_14_270618_create_transaction_table', 1),
(10, '2021_12_16_111704_update_is_delete_to_material_table', 1),
(11, '2021_12_16_174520_create_materials_table', 1),
(12, '2021_12_18_154216_create_ledger_table', 1),
(13, '2021_12_18_154811_create_ledger_details', 1),
(14, '2021_12_20_102212_create_gosek_table', 1),
(15, '2021_12_24_061407_create_trial_balance_table', 1),
(16, '2021_12_24_064548_create_trial_balance_detail_table', 1),
(17, '2021_12_27_062302_create_incomestatement_table', 1),
(18, '2021_12_28_093557_create_incomestatement_detail_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price_material` int(11) DEFAULT NULL,
  `expense` decimal(11,0) NOT NULL DEFAULT 0,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `vehicle_number`, `vehicle`, `material_id`, `price_material`, `expense`, `nomor`, `created_at`, `updated_at`) VALUES
(26, 'DK 1020 lB', 'PICKUP', 2, 200000, '0', '210', '2022-01-04 16:00:00', '2022-01-05 11:07:29'),
(27, 'DK 9998 AB', 'Truk Wawan', 2, 200000, '0', '200', '2022-01-09 16:00:00', '2022-01-10 02:08:08'),
(28, 'DK 3992 CB', 'Truk Wawan', 1, 300000, '0', '200', '2022-01-03 16:00:00', '2022-01-05 11:12:48'),
(29, 'operator', NULL, NULL, NULL, '1000', NULL, '2022-01-03 16:00:00', NULL),
(30, 'kasir', NULL, NULL, NULL, '8000', NULL, '2022-01-03 16:00:00', NULL),
(31, 'helper', NULL, NULL, NULL, '200', NULL, '2022-01-03 16:00:00', NULL),
(32, 'jalan 40', NULL, NULL, NULL, '9000', NULL, '2022-01-03 16:00:00', NULL),
(33, 'pemilik', NULL, NULL, NULL, '-177500', NULL, '2022-01-03 16:00:00', NULL),
(34, 'jalan desa', NULL, NULL, NULL, '4000', NULL, '2022-01-03 16:00:00', NULL),
(35, 'lain-lain', NULL, NULL, NULL, '1000', NULL, '2022-01-03 16:00:00', NULL),
(36, 'solar', NULL, NULL, NULL, '7000', NULL, '2022-01-03 16:00:00', NULL),
(37, 'DK 1020 lB', 'Truk Wawan', 1, 300000, '0', '200', '2022-01-06 16:00:00', '2022-01-07 00:12:10'),
(70, 'operator', NULL, NULL, NULL, '1000', NULL, '2022-01-04 16:00:00', NULL),
(71, 'kasir', NULL, NULL, NULL, '3000', NULL, '2022-01-04 16:00:00', NULL),
(72, 'helper', NULL, NULL, NULL, '2000', NULL, '2022-01-04 16:00:00', NULL),
(73, 'jalan 40', NULL, NULL, NULL, '3000', NULL, '2022-01-04 16:00:00', NULL),
(74, 'pemilik', NULL, NULL, NULL, '-1312500', NULL, '2022-01-04 16:00:00', NULL),
(75, 'jalan desa', NULL, NULL, NULL, '1000', NULL, '2022-01-04 16:00:00', NULL),
(76, 'lain-lain', NULL, NULL, NULL, '5000', NULL, '2022-01-04 16:00:00', NULL),
(77, 'solar', NULL, NULL, NULL, '3000', NULL, '2022-01-04 16:00:00', NULL),
(78, 'DK 3992 CB', 'Truk', 2, 300000, '0', '10', '2022-01-09 16:00:00', '2022-01-10 07:27:44'),
(87, 'DK 9998 AB', 'Truk', 2, 300000, '0', '200', '2022-01-09 16:00:00', '2022-01-10 09:24:38'),
(168, 'operator', NULL, NULL, NULL, '100000', NULL, '2022-01-09 16:00:00', NULL),
(169, 'kasir', NULL, NULL, NULL, '25000', NULL, '2022-01-09 16:00:00', NULL),
(170, 'helper', NULL, NULL, NULL, '50000', NULL, '2022-01-09 16:00:00', NULL),
(171, 'jalan 40', NULL, NULL, NULL, '10000', NULL, '2022-01-09 16:00:00', NULL),
(172, 'pemilik', NULL, NULL, NULL, '187625', NULL, '2022-01-09 16:00:00', NULL),
(173, 'jalan desa', NULL, NULL, NULL, '25000', NULL, '2022-01-09 16:00:00', NULL),
(174, 'lain-lain', NULL, NULL, NULL, '0', NULL, '2022-01-09 16:00:00', NULL),
(175, 'solar', NULL, NULL, NULL, '0', NULL, '2022-01-09 16:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trial_balance`
--

CREATE TABLE `trial_balance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `register` date NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','rejected','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trial_balance`
--

INSERT INTO `trial_balance` (`id`, `register`, `title`, `description`, `status`, `note`, `created_at`, `updated_at`) VALUES
(42, '2022-01-30', 'Periode Januari 2022', 'Neraca saldo periode Januari 2022', 'approved', NULL, '2022-01-10 08:22:21', '2022-01-10 09:54:59'),
(44, '2022-01-10', 'Neraca Saldo 20020', 'Neraca Saldo 20020', 'rejected', 'deskripsi cek lagi', '2022-01-10 09:20:33', '2022-01-10 09:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `trial_balance_detail`
--

CREATE TABLE `trial_balance_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `trial_balance_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(11,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trial_balance_detail`
--

INSERT INTO `trial_balance_detail` (`id`, `date`, `trial_balance_id`, `account_id`, `amount`, `created_at`, `updated_at`) VALUES
(119, '2022-01-30', 42, 1, '2000000', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(120, '2022-01-30', 42, 2, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(121, '2022-01-30', 42, 3, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(122, '2022-01-30', 42, 4, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(123, '2022-01-30', 42, 5, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(124, '2022-01-30', 42, 6, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(125, '2022-01-30', 42, 7, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(126, '2022-01-30', 42, 8, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(127, '2022-01-30', 42, 9, '-250000', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(128, '2022-01-30', 42, 10, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(129, '2022-01-30', 42, 11, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(130, '2022-01-30', 42, 12, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(131, '2022-01-30', 42, 13, '-40000', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(132, '2022-01-30', 42, 14, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(133, '2022-01-30', 42, 15, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(134, '2022-01-30', 42, 16, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(135, '2022-01-30', 42, 17, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(136, '2022-01-30', 42, 18, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(137, '2022-01-30', 42, 19, '-610000', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(138, '2022-01-30', 42, 20, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(139, '2022-01-30', 42, 21, '-400000', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(140, '2022-01-30', 42, 22, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(141, '2022-01-30', 42, 23, '-450000', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(142, '2022-01-30', 42, 24, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(143, '2022-01-30', 42, 25, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(144, '2022-01-30', 42, 26, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(145, '2022-01-30', 42, 27, '-250000', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(146, '2022-01-30', 42, 28, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(147, '2022-01-30', 42, 29, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(148, '2022-01-30', 42, 30, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(149, '2022-01-30', 42, 31, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(150, '2022-01-30', 42, 32, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(151, '2022-01-30', 42, 33, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(152, '2022-01-30', 42, 34, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(153, '2022-01-30', 42, 35, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(154, '2022-01-30', 42, 36, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(155, '2022-01-30', 42, 37, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(156, '2022-01-30', 42, 38, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(157, '2022-01-30', 42, 39, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(158, '2022-01-30', 42, 40, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(159, '2022-01-30', 42, 41, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(160, '2022-01-30', 42, 42, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(161, '2022-01-30', 42, 43, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(162, '2022-01-30', 42, 44, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(163, '2022-01-30', 42, 45, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(164, '2022-01-30', 42, 46, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(165, '2022-01-30', 42, 47, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(166, '2022-01-30', 42, 48, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(167, '2022-01-30', 42, 49, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(168, '2022-01-30', 42, 50, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(169, '2022-01-30', 42, 51, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(170, '2022-01-30', 42, 52, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(171, '2022-01-30', 42, 53, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(172, '2022-01-30', 42, 54, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(173, '2022-01-30', 42, 55, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(174, '2022-01-30', 42, 56, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(175, '2022-01-30', 42, 57, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(176, '2022-01-30', 42, 58, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(177, '2022-01-30', 42, 59, '0', '2022-01-10 08:22:21', '2022-01-10 08:22:21'),
(237, '2022-01-10', 44, 1, '2000000', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(238, '2022-01-10', 44, 2, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(239, '2022-01-10', 44, 3, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(240, '2022-01-10', 44, 4, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(241, '2022-01-10', 44, 5, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(242, '2022-01-10', 44, 6, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(243, '2022-01-10', 44, 7, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(244, '2022-01-10', 44, 8, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(245, '2022-01-10', 44, 9, '-250000', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(246, '2022-01-10', 44, 10, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(247, '2022-01-10', 44, 11, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(248, '2022-01-10', 44, 12, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(249, '2022-01-10', 44, 13, '-40000', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(250, '2022-01-10', 44, 14, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(251, '2022-01-10', 44, 15, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(252, '2022-01-10', 44, 16, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(253, '2022-01-10', 44, 17, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(254, '2022-01-10', 44, 18, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(255, '2022-01-10', 44, 19, '-610000', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(256, '2022-01-10', 44, 20, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(257, '2022-01-10', 44, 21, '-400000', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(258, '2022-01-10', 44, 22, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(259, '2022-01-10', 44, 23, '-450000', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(260, '2022-01-10', 44, 24, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(261, '2022-01-10', 44, 25, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(262, '2022-01-10', 44, 26, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(263, '2022-01-10', 44, 27, '-250000', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(264, '2022-01-10', 44, 28, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(265, '2022-01-10', 44, 29, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(266, '2022-01-10', 44, 30, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(267, '2022-01-10', 44, 31, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(268, '2022-01-10', 44, 32, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(269, '2022-01-10', 44, 33, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(270, '2022-01-10', 44, 34, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(271, '2022-01-10', 44, 35, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(272, '2022-01-10', 44, 36, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(273, '2022-01-10', 44, 37, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(274, '2022-01-10', 44, 38, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(275, '2022-01-10', 44, 39, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(276, '2022-01-10', 44, 40, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(277, '2022-01-10', 44, 41, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(278, '2022-01-10', 44, 42, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(279, '2022-01-10', 44, 43, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(280, '2022-01-10', 44, 44, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(281, '2022-01-10', 44, 45, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(282, '2022-01-10', 44, 46, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(283, '2022-01-10', 44, 47, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(284, '2022-01-10', 44, 48, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(285, '2022-01-10', 44, 49, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(286, '2022-01-10', 44, 50, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(287, '2022-01-10', 44, 51, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(288, '2022-01-10', 44, 52, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(289, '2022-01-10', 44, 53, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(290, '2022-01-10', 44, 54, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(291, '2022-01-10', 44, 55, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(292, '2022-01-10', 44, 56, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(293, '2022-01-10', 44, 57, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(294, '2022-01-10', 44, 58, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33'),
(295, '2022-01-10', 44, 59, '0', '2022-01-10 09:20:33', '2022-01-10 09:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','manager','accounting','cashier') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'accounting', 'accounting@gmail.com', NULL, '$2y$10$Jj6OiZjg4ZYKsJHaDaUF9OU6blc/Ykvk8X7lEADRS8TY1Vmo3zrZa', NULL, NULL, NULL, 'accounting'),
(2, 'cashier', 'cashier@gmail.com', NULL, '$2y$10$Jj6OiZjg4ZYKsJHaDaUF9OU6blc/Ykvk8X7lEADRS8TY1Vmo3zrZa', NULL, NULL, NULL, 'cashier'),
(3, 'manager', 'manager@gmail.com', NULL, '$2y$10$Jj6OiZjg4ZYKsJHaDaUF9OU6blc/Ykvk8X7lEADRS8TY1Vmo3zrZa', NULL, NULL, NULL, 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gosek`
--
ALTER TABLE `gosek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomestatement`
--
ALTER TABLE `incomestatement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomestatement_detail`
--
ALTER TABLE `incomestatement_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incomestatement_detail_incomestatement_id_foreign` (`incomestatement_id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_details`
--
ALTER TABLE `journal_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journal_details_journal_id_foreign` (`journal_id`);

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger_details`
--
ALTER TABLE `ledger_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ledger_details_ledger_id_foreign` (`ledger_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trial_balance`
--
ALTER TABLE `trial_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trial_balance_detail`
--
ALTER TABLE `trial_balance_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trial_balance_detail_trial_balance_id_foreign` (`trial_balance_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5564;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gosek`
--
ALTER TABLE `gosek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `incomestatement`
--
ALTER TABLE `incomestatement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `incomestatement_detail`
--
ALTER TABLE `incomestatement_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `journal_details`
--
ALTER TABLE `journal_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ledger_details`
--
ALTER TABLE `ledger_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `trial_balance`
--
ALTER TABLE `trial_balance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `trial_balance_detail`
--
ALTER TABLE `trial_balance_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `incomestatement_detail`
--
ALTER TABLE `incomestatement_detail`
  ADD CONSTRAINT `incomestatement_detail_incomestatement_id_foreign` FOREIGN KEY (`incomestatement_id`) REFERENCES `incomestatement` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `journal_details`
--
ALTER TABLE `journal_details`
  ADD CONSTRAINT `journal_details_journal_id_foreign` FOREIGN KEY (`journal_id`) REFERENCES `journals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ledger_details`
--
ALTER TABLE `ledger_details`
  ADD CONSTRAINT `ledger_details_ledger_id_foreign` FOREIGN KEY (`ledger_id`) REFERENCES `ledgers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trial_balance_detail`
--
ALTER TABLE `trial_balance_detail`
  ADD CONSTRAINT `trial_balance_detail_trial_balance_id_foreign` FOREIGN KEY (`trial_balance_id`) REFERENCES `trial_balance` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
