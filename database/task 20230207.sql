-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 06:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log_barang`
--

CREATE TABLE `activity_log_barang` (
  `id_log_barang` int(11) NOT NULL,
  `date_log` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `kd_req` varchar(25) NOT NULL,
  `kd_stock` varchar(25) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `qty_tot` int(11) NOT NULL,
  `qty_confir` int(11) DEFAULT NULL,
  `qty_req` int(11) DEFAULT NULL,
  `qty_cancel` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status_log` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log_barang`
--

INSERT INTO `activity_log_barang` (`id_log_barang`, `date_log`, `user_id`, `supplier_id`, `kd_req`, `kd_stock`, `kd_barang`, `qty_tot`, `qty_confir`, `qty_req`, `qty_cancel`, `remark`, `status_log`, `created_at`) VALUES
(2, '2023-08-02 18:09:50', 0, 1, 'REQ2302050001', 'STO2302050001', 'BRG010101', 3, 3, 0, 0, 'Mengirimkan barang dgn mobil DT1234CC', 2, '2023-02-05 18:09:50'),
(3, '2023-06-02 19:59:24', 0, 2, 'REQ2302050001', 'STO2302050013', 'BRG020101', 24, 2, 22, 0, 'Tidak ada yang di batalkan ', 1, '2023-02-05 19:59:24'),
(4, '2023-08-02 20:00:47', 0, 3, 'REQ2302050001', 'STO2302050008', 'BRG020405', 2, 2, 0, 0, 'barang  tesedia', 2, '2023-02-05 20:00:47'),
(5, '2023-07-02 20:50:33', 0, 3, 'REQ2302050001', 'STO2302050002', 'BRG010103', 6, 6, 0, 0, 'akan di proses', 2, '2023-02-05 20:50:33'),
(6, '2023-09-02 08:54:25', 0, 1, 'REQ2302060001', 'STO2302050005', 'BRG010205', 20, 20, 0, 0, 'barang tersedia', 2, '2023-02-06 08:54:25'),
(7, '2023-07-02 15:43:22', 0, 1, 'REQ2302060001', 'STO2302050008', 'BRG010401', 5, 3, 2, 0, '2 barang rusak', 1, '2023-02-06 15:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log_req`
--

CREATE TABLE `activity_log_req` (
  `id_log_req` int(11) NOT NULL,
  `date_log` datetime NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `kd_req` varchar(50) NOT NULL,
  `kd_stock` varchar(50) NOT NULL,
  `kd_barang` varchar(8) NOT NULL,
  `length_size` varchar(255) NOT NULL,
  `width_size` varchar(255) NOT NULL,
  `lumber_type` varchar(255) NOT NULL COMMENT 'tipe kayu',
  `species_type` varchar(255) NOT NULL COMMENT 'jenis kayu',
  `qty_tot` int(11) NOT NULL,
  `qty_confir` int(11) DEFAULT NULL,
  `qty_req` int(11) DEFAULT NULL,
  `qty_cancel` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status_req` enum('0','1','2','3','4','5') NOT NULL DEFAULT '0' COMMENT '5=cencel dan gudang;4=cencel;3=cencel sebagian;2=gudang;1=gudang sebagaian;0=pengiriman',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log_req`
--

INSERT INTO `activity_log_req` (`id_log_req`, `date_log`, `user_id`, `kd_req`, `kd_stock`, `kd_barang`, `length_size`, `width_size`, `lumber_type`, `species_type`, `qty_tot`, `qty_confir`, `qty_req`, `qty_cancel`, `remark`, `status_req`, `created_at`) VALUES
(1, '2023-05-02 07:21:01', '0', 'REQ2302050001', 'STO2302050001', 'BRG01010', '-', '-', '-', '-', 3, 0, 3, 0, 'test', '0', '2023-02-05 07:21:01'),
(2, '2023-05-02 07:21:01', '0', 'REQ2302050001', 'STO2302050008', 'BRG02040', '10', '10', '-', '-', 2, 0, 2, 0, 'test', '0', '2023-02-05 07:21:01'),
(3, '2023-09-02 19:54:09', 'Steve Handjob', 'REQ2302050001', 'STO2302050002', 'BRG01010', '-', '-', '-', '-', 6, 0, 6, 0, 'di tunggu ya', '0', '2023-02-05 19:54:09'),
(4, '2023-09-02 19:54:09', 'Steve Handjob', 'REQ2302050001', 'STO2302050013', 'BRG02010', '300', '20', '-', '-', 24, 0, 24, 0, 'di tunggu ya', '0', '2023-02-05 19:54:09'),
(5, '2023-09-02 19:54:09', 'Steve Handjob', 'REQ2302050001', 'STO2302050005', 'BRG01020', '-', '-', '-', '-', 8, 0, 8, 0, 'di tunggu ya', '0', '2023-02-05 19:54:09'),
(6, '2023-09-02 08:52:30', 'Steve Handjob', 'REQ2302060001', 'STO2302050005', 'BRG01020', '-', '-', '-', '-', 20, 0, 20, 0, 'Pesanan Kantor ', '0', '2023-02-06 08:52:30'),
(7, '2023-09-02 08:52:30', 'Steve Handjob', 'REQ2302060001', 'STO2302050008', 'BRG01040', '-', '-', '-', '-', 5, 0, 5, 0, 'Pesanan Kantor ', '0', '2023-02-06 08:52:30'),
(8, '2023-09-02 08:52:30', 'Steve Handjob', 'REQ2302060001', 'STO2302050011', 'BRG01050', '-', '-', '-', '-', 6, 0, 6, 0, 'Pesanan Kantor ', '0', '2023-02-06 08:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `d_request`
--

CREATE TABLE `d_request` (
  `id_dtl_req` int(11) NOT NULL,
  `kd_req` varchar(50) NOT NULL,
  `kd_stock` varchar(50) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `length_size` varchar(255) NOT NULL,
  `width_size` varchar(255) NOT NULL,
  `lumber_type` varchar(255) NOT NULL COMMENT 'tipe kayu',
  `species_type` varchar(255) NOT NULL COMMENT 'jenis kayu',
  `qty_tot` int(11) NOT NULL,
  `qty_confir` int(11) NOT NULL,
  `qty_req` int(11) NOT NULL,
  `qty_cancel` int(11) NOT NULL,
  `status_req` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '5=cencel dan gudang;4=cencel;3=cencel sebagian;2=gudang;1=gudang sebagaian;0=pengiriman',
  `is_active` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1=tidak aktif;0=aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `d_request`
--

INSERT INTO `d_request` (`id_dtl_req`, `kd_req`, `kd_stock`, `kd_barang`, `nama_brg`, `length_size`, `width_size`, `lumber_type`, `species_type`, `qty_tot`, `qty_confir`, `qty_req`, `qty_cancel`, `status_req`, `is_active`) VALUES
(1, 'REQ2302050001', 'STO2302050001', 'BRG010101', 'Kursi Ukir Jepara', '-', '-', '-', '-', 3, 3, 0, 0, '2', '0'),
(2, 'REQ2302050001', 'STO2302050008', 'BRG020405', 'Tiang', '10', '10', '-', '-', 2, 2, 0, 0, '2', '0'),
(3, 'REQ2302050001', 'STO2302050002', 'BRG010103', '', '-', '-', '-', '-', 6, 6, 0, 0, '2', '0'),
(4, 'REQ2302050001', 'STO2302050013', 'BRG020101', '', '300', '20', '-', '-', 24, 2, 22, 0, '1', '0'),
(5, 'REQ2302050001', 'STO2302050005', 'BRG010204', '', '-', '-', '-', '-', 8, 0, 8, 0, '0', '0'),
(6, 'REQ2302060001', 'STO2302050005', 'BRG010205', '', '-', '-', '-', '-', 20, 20, 0, 0, '2', '0'),
(7, 'REQ2302060001', 'STO2302050008', 'BRG010401', '', '-', '-', '-', '-', 5, 3, 2, 0, '1', '0'),
(8, 'REQ2302060001', 'STO2302050011', 'BRG010501', '', '-', '-', '-', '-', 6, 0, 6, 0, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE `m_barang` (
  `id_brg` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `sub_kode` varchar(11) NOT NULL,
  `sub_data` varchar(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `length_size` varchar(200) DEFAULT NULL,
  `width_size` varchar(200) DEFAULT NULL,
  `lumber_type` varchar(255) DEFAULT NULL COMMENT 'tipe kayu',
  `species_type` varchar(255) DEFAULT NULL COMMENT 'jenis kayu',
  `is_active` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=Aktif;1=Tidak Aktif',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`id_brg`, `kode`, `sub_kode`, `sub_data`, `nama_brg`, `length_size`, `width_size`, `lumber_type`, `species_type`, `is_active`, `created_at`, `created_by`) VALUES
(1, '1', '*', '*', 'Barang Jadi', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(2, '1', '1', '*', 'Kursi', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(3, '1', '1', '1', 'Kursi Ukir Jepara', '', '', '', 'Jati Emas', '0', '2023-01-04 21:10:22', 'system'),
(4, '1', '1', '2', 'Sofa', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(5, '1', '1', '3', 'Kursi Minimalis Cafe', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(6, '1', '1', '4', 'Kursi fellow ', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(7, '1', '1', '5', 'Kursi Zola', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(8, '1', '2', '*', 'Meja', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(9, '1', '2', '1', 'Meja Sudut', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(10, '1', '2', '2', 'Meja minimalist square', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(11, '1', '2', '3', 'Meja Makan Minimalis', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(12, '1', '2', '4', 'Meja café', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(13, '1', '2', '5', 'Meja Bufet Klasik T', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(14, '1', '3', '*', 'Lemari', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(15, '1', '3', '1', 'M Tiga Pintu Empat Laci', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(16, '1', '3', '2', 'M New Duco', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(17, '1', '3', '3', 'M Jati 2 Pintu', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(18, '1', '3', '4', 'M Black plus kaca', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(19, '1', '3', '5', 'M Sliding GESER ', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(20, '1', '4', '*', 'Rak', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(21, '1', '4', '1', 'R Sepatu ', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(22, '1', '4', '2', 'R Dinding Hiasan ', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(23, '1', '4', '3', 'R Buku', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(24, '1', '4', '4', 'R Taman', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(25, '1', '4', '5', 'R Piring Gantung', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(26, '1', '5', '*', 'Kitchen Set', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(27, '1', '5', '1', 'On Side', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(28, '1', '5', '2', 'Kabinet Kaca', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(29, '1', '5', '3', 'Putih', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(30, '1', '5', '4', 'Scandinavian', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(31, '1', '5', '5', 'Klasik', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(32, '2', '1', '*', 'Jati Emas', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(33, '2', '1', '1', 'Papan ', '300', '20', '', '', '0', '2023-01-04 21:10:22', 'system'),
(34, '2', '1', '2', 'Kaso', '5', '7', '', '', '0', '2023-01-04 21:10:22', 'system'),
(35, '2', '1', '3', 'Balok ', '8', '15', '', '', '0', '2023-01-04 21:10:22', 'system'),
(36, '2', '1', '4', 'Reng', '3', '4', '', '', '0', '2023-01-04 21:10:22', 'system'),
(37, '2', '1', '5', 'Tiang', '9', '9', '', '', '0', '2023-01-04 21:10:22', 'system'),
(38, '2', '2', '*', 'Kayu Mindi', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(39, '2', '2', '1', 'Papan ', '2', '20', '', '', '0', '2023-01-04 21:10:22', 'system'),
(40, '2', '2', '2', 'Kaso', '4', '6', '', '', '0', '2023-01-04 21:10:22', 'system'),
(41, '2', '2', '3', 'Balok ', '6', '12', '', '', '0', '2023-01-04 21:10:22', 'system'),
(42, '2', '2', '4', 'Reng', '2', '4', '', '', '0', '2023-01-04 21:10:22', 'system'),
(43, '2', '2', '5', 'Tiang', '8', '8', '', '', '0', '2023-01-04 21:10:22', 'system'),
(44, '2', '3', '*', 'Kayu Jati Belanda', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(45, '2', '3', '1', 'Papan ', '3', '20', '', '', '0', '2023-01-04 21:10:22', 'system'),
(46, '2', '3', '2', 'Kaso', '4', '6', '', '', '0', '2023-01-04 21:10:22', 'system'),
(47, '2', '3', '3', 'Balok ', '8', '15', '', '', '0', '2023-01-04 21:10:22', 'system'),
(48, '2', '3', '4', 'Reng', '3', '4', '', '', '0', '2023-01-04 21:10:22', 'system'),
(49, '2', '3', '5', 'Tiang', '10', '10', '', '', '0', '2023-01-04 21:10:22', 'system'),
(50, '2', '4', '*', 'Kayu Mahogani', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(51, '2', '4', '1', 'Papan ', '3', '30', '', '', '0', '2023-01-04 21:10:22', 'system'),
(52, '2', '4', '2', 'Kaso', '4', '6', '', '', '0', '2023-01-04 21:10:22', 'system'),
(53, '2', '4', '3', 'Balok ', '6', '12', '', '', '0', '2023-01-04 21:10:22', 'system'),
(54, '2', '4', '4', 'Reng', '3', '4', '', '', '0', '2023-01-04 21:10:22', 'system'),
(55, '2', '4', '5', 'Tiang', '10', '10', '', '', '0', '2023-01-04 21:10:22', 'system'),
(56, '2', '5', '*', 'Kayu Cendana', '', '', '', '', '0', '2023-01-04 21:10:22', 'system'),
(57, '2', '5', '1', 'Papan ', '2', '10', '', '', '0', '2023-01-04 21:10:22', 'system'),
(58, '2', '5', '2', 'Kaso', '5', '7', '', '', '0', '2023-01-04 21:10:22', 'system'),
(59, '2', '5', '3', 'Balok ', '5', '10', '', '', '0', '2023-01-04 21:10:22', 'system'),
(60, '2', '5', '4', 'Reng', '2', '4', '', '', '0', '2023-01-04 21:10:22', 'system'),
(61, '2', '5', '5', 'Tiang', '10', '15', '', '', '0', '2023-01-04 21:10:22', 'system'),
(62, '2', '*', '*', 'Barang Mentah', '', '', '', '', '0', '2023-01-04 21:10:22', 'system');

-- --------------------------------------------------------

--
-- Table structure for table `m_request`
--

CREATE TABLE `m_request` (
  `id_m_req` int(11) NOT NULL,
  `kd_req` varchar(25) NOT NULL,
  `date_req` datetime NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `total_req` int(11) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1=tidak aktif;0=aktif',
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_request`
--

INSERT INTO `m_request` (`id_m_req`, `kd_req`, `date_req`, `supplier_id`, `total_req`, `is_active`, `created_at`, `created_by`) VALUES
(1, 'REQ2302050001', '2023-05-02 07:21:01', 0, 5, '0', '2023-02-05 07:21:01', 'Vincent'),
(2, 'REQ2302050001', '2023-09-02 19:54:09', 0, 38, '0', '2023-02-05 19:54:09', 'Steve Handjob'),
(3, 'REQ2302060001', '2023-09-02 08:52:30', 0, 31, '0', '2023-02-06 08:52:30', 'Steve Handjob');

-- --------------------------------------------------------

--
-- Table structure for table `m_stock`
--

CREATE TABLE `m_stock` (
  `id_stock` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `kd_stock` varchar(25) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `length_size` varchar(255) NOT NULL,
  `width_size` varchar(255) NOT NULL,
  `lumber_type` varchar(25) NOT NULL COMMENT 'tipe kayu',
  `species_type` varchar(25) NOT NULL COMMENT 'jenis kayu',
  `qty` int(11) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1=tidak aktif;0=aktif',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_stock`
--

INSERT INTO `m_stock` (`id_stock`, `supplier_id`, `kd_stock`, `kd_barang`, `nama_brg`, `length_size`, `width_size`, `lumber_type`, `species_type`, `qty`, `is_active`, `created_at`, `created_by`, `update_at`, `update_by`) VALUES
(1, 1, 'STO2302050001', 'BRG010101', 'Kursi Ukir Jepara', '', '', '', '', 2, '0', '2023-02-05 03:47:03', NULL, NULL, NULL),
(2, 2, 'STO2302050001', 'BRG010102', 'Sofa', '', '', '', '', 5, '0', '2023-02-06 03:47:02', NULL, NULL, NULL),
(3, 3, 'STO2302050002', 'BRG010103', 'Kursi Minimalis Cafe', '', '', '', '', -1, '0', '2023-02-07 03:47:02', NULL, NULL, NULL),
(4, 1, 'STO2302050002', 'BRG010104', 'Kursi fellow ', '', '', '', '', 5, '0', '2023-02-08 03:47:02', NULL, NULL, NULL),
(5, 2, 'STO2302050003', 'BRG010105', 'Kursi Zola', '', '', '', '', 5, '0', '2023-02-09 03:47:02', NULL, NULL, NULL),
(6, 3, 'STO2302050003', 'BRG010201', 'Meja Sudut', '', '', '', '', 5, '0', '2023-02-10 03:47:02', NULL, NULL, NULL),
(7, 1, 'STO2302050004', 'BRG010202', 'Meja minimalist square', '', '', '', '', 5, '0', '2023-02-11 03:47:02', NULL, NULL, NULL),
(8, 2, 'STO2302050004', 'BRG010203', 'Meja Makan Minimalis', '', '', '', '', 5, '0', '2023-02-12 03:47:02', NULL, NULL, NULL),
(9, 3, 'STO2302050005', 'BRG010204', 'Meja café', '', '', '', '', 5, '0', '2023-02-13 03:47:02', NULL, NULL, NULL),
(10, 1, 'STO2302050005', 'BRG010205', 'Meja Bufet Klasik T', '', '', '', '', -15, '0', '2023-02-14 03:47:02', NULL, NULL, NULL),
(11, 2, 'STO2302050006', 'BRG010301', 'M Tiga Pintu Empat Laci', '', '', '', '', 5, '0', '2023-02-15 03:47:02', NULL, NULL, NULL),
(12, 3, 'STO2302050006', 'BRG010302', 'M New Duco', '', '', '', '', 5, '0', '2023-02-16 03:47:02', NULL, NULL, NULL),
(13, 1, 'STO2302050007', 'BRG010303', 'M Jati 2 Pintu', '', '', '', '', 5, '0', '2023-02-17 03:47:02', NULL, NULL, NULL),
(14, 2, 'STO2302050007', 'BRG010304', 'M Black plus kaca', '', '', '', '', 5, '0', '2023-02-18 03:47:02', NULL, NULL, NULL),
(15, 3, 'STO2302050008', 'BRG010305', 'M Sliding GESER ', '', '', '', '', 5, '0', '2023-02-19 03:47:02', NULL, NULL, NULL),
(16, 1, 'STO2302050008', 'BRG010401', 'R Sepatu ', '', '', '', '', 2, '0', '2023-02-20 03:47:02', NULL, NULL, NULL),
(17, 2, 'STO2302050009', 'BRG010402', 'R Dinding Hiasan ', '', '', '', '', 5, '0', '2023-02-21 03:47:02', NULL, NULL, NULL),
(18, 3, 'STO2302050009', 'BRG010403', 'R Buku', '', '', '', '', 5, '0', '2023-02-22 03:47:02', NULL, NULL, NULL),
(19, 1, 'STO2302050010', 'BRG010404', 'R Taman', '', '', '', '', 5, '0', '2023-02-23 03:47:02', NULL, NULL, NULL),
(20, 2, 'STO2302050010', 'BRG010405', 'R Piring Gantung', '', '', '', '', 5, '0', '2023-02-24 03:47:02', NULL, NULL, NULL),
(21, 3, 'STO2302050011', 'BRG010501', 'On Side', '', '', '', '', 5, '0', '2023-02-25 03:47:02', NULL, NULL, NULL),
(22, 1, 'STO2302050011', 'BRG010502', 'Kabinet Kaca', '', '', '', '', 5, '0', '2023-02-26 03:47:02', NULL, NULL, NULL),
(23, 2, 'STO2302050012', 'BRG010503', 'Putih', '', '', '', '', 5, '0', '2023-02-27 03:47:02', NULL, NULL, NULL),
(24, 3, 'STO2302050012', 'BRG010504', 'Scandinavian', '', '', '', '', 5, '0', '2023-02-28 03:47:02', NULL, NULL, NULL),
(25, 1, 'STO2302050013', 'BRG010505', 'Klasik', '', '', '', '', 5, '0', '2023-03-01 03:47:02', NULL, NULL, NULL),
(26, 2, 'STO2302050013', 'BRG020101', 'Papan ', '300', '20', '', '', 3, '0', '2023-03-02 03:47:02', NULL, NULL, NULL),
(27, 3, 'STO2302050014', 'BRG020102', 'Kaso', '5', '7', '', '', 5, '0', '2023-03-03 03:47:02', NULL, NULL, NULL),
(28, 1, 'STO2302050014', 'BRG020103', 'Balok ', '8', '15', '', '', 5, '0', '2023-03-04 03:47:02', NULL, NULL, NULL),
(29, 2, 'STO2302050015', 'BRG020104', 'Reng', '3', '4', '', '', 5, '0', '2023-03-05 03:47:02', NULL, NULL, NULL),
(30, 3, 'STO2302050015', 'BRG020105', 'Tiang', '9', '9', '', '', 5, '0', '2023-03-06 03:47:02', NULL, NULL, NULL),
(31, 1, 'STO2302050001', 'BRG020201', 'Papan ', '2', '20', '', '', 5, '0', '2023-03-07 03:47:02', NULL, NULL, NULL),
(32, 2, 'STO2302050001', 'BRG020202', 'Kaso', '4', '6', '', '', 5, '0', '2023-03-08 03:47:02', NULL, NULL, NULL),
(33, 3, 'STO2302050002', 'BRG020203', 'Balok ', '6', '12', '', '', 5, '0', '2023-03-09 03:47:02', NULL, NULL, NULL),
(34, 1, 'STO2302050002', 'BRG020204', 'Reng', '2', '4', '', '', 5, '0', '2023-03-10 03:47:02', NULL, NULL, NULL),
(35, 2, 'STO2302050003', 'BRG020205', 'Tiang', '8', '8', '', '', 5, '0', '2023-03-11 03:47:02', NULL, NULL, NULL),
(36, 3, 'STO2302050003', 'BRG020301', 'Papan ', '3', '20', '', '', 5, '0', '2023-03-12 03:47:02', NULL, NULL, NULL),
(37, 1, 'STO2302050004', 'BRG020302', 'Kaso', '4', '6', '', '', 5, '0', '2023-03-13 03:47:02', NULL, NULL, NULL),
(38, 2, 'STO2302050004', 'BRG020303', 'Balok ', '8', '15', '', '', 5, '0', '2023-03-14 03:47:02', NULL, NULL, NULL),
(39, 3, 'STO2302050005', 'BRG020304', 'Reng', '3', '4', '', '', 5, '0', '2023-03-15 03:47:02', NULL, NULL, NULL),
(40, 1, 'STO2302050005', 'BRG020305', 'Tiang', '10', '10', '', '', 5, '0', '2023-03-16 03:47:02', NULL, NULL, NULL),
(41, 2, 'STO2302050006', 'BRG020401', 'Papan ', '3', '30', '', '', 5, '0', '2023-03-17 03:47:02', NULL, NULL, NULL),
(42, 3, 'STO2302050006', 'BRG020402', 'Kaso', '4', '6', '', '', 5, '0', '2023-03-18 03:47:02', NULL, NULL, NULL),
(43, 1, 'STO2302050007', 'BRG020403', 'Balok ', '6', '12', '', '', 5, '0', '2023-03-19 03:47:02', NULL, NULL, NULL),
(44, 2, 'STO2302050007', 'BRG020404', 'Reng', '3', '4', '', '', 5, '0', '2023-03-20 03:47:02', NULL, NULL, NULL),
(45, 3, 'STO2302050008', 'BRG020405', 'Tiang', '10', '10', '', '', 3, '0', '2023-03-21 03:47:02', NULL, NULL, NULL),
(46, 1, 'STO2302050008', 'BRG020501', 'Papan ', '2', '10', '', '', 5, '0', '2023-03-22 03:47:02', NULL, NULL, NULL),
(47, 2, 'STO2302050009', 'BRG020502', 'Kaso', '5', '7', '', '', 5, '0', '2023-03-23 03:47:02', NULL, NULL, NULL),
(48, 3, 'STO2302050009', 'BRG020503', 'Balok ', '5', '10', '', '', 5, '0', '2023-03-24 03:47:02', NULL, NULL, NULL),
(49, 1, 'STO2302050010', 'BRG020504', 'Reng', '2', '4', '', '', 5, '0', '2023-03-25 03:47:02', NULL, NULL, NULL),
(50, 2, 'STO2302050010', 'BRG020505', 'Tiang', '10', '15', '', '', 5, '0', '2023-03-26 03:47:02', NULL, NULL, NULL),
(51, 3, 'STO2302050011', 'BRG010101', 'Kursi Ukir Jepara', '', '', '', '', 5, '0', '2023-03-26 12:47:03', NULL, NULL, NULL),
(52, 1, 'STO2302050011', 'BRG010102', 'Sofa', '', '', '', '', 5, '0', '2023-03-27 12:47:02', NULL, NULL, NULL),
(53, 2, 'STO2302050012', 'BRG010103', 'Kursi Minimalis Cafe', '', '', '', '', 5, '0', '2023-03-28 12:47:02', NULL, NULL, NULL),
(54, 3, 'STO2302050012', 'BRG010104', 'Kursi fellow ', '', '', '', '', 5, '0', '2023-03-29 12:47:02', NULL, NULL, NULL),
(55, 1, 'STO2302050013', 'BRG010105', 'Kursi Zola', '', '', '', '', 5, '0', '2023-03-30 12:47:02', NULL, NULL, NULL),
(56, 2, 'STO2302050013', 'BRG010201', 'Meja Sudut', '', '', '', '', 5, '0', '2023-03-31 12:47:02', NULL, NULL, NULL),
(57, 3, 'STO2302050014', 'BRG010202', 'Meja minimalist square', '', '', '', '', 5, '0', '2023-04-01 12:47:02', NULL, NULL, NULL),
(58, 1, 'STO2302050014', 'BRG010203', 'Meja Makan Minimalis', '', '', '', '', 5, '0', '2023-04-02 12:47:02', NULL, NULL, NULL),
(59, 2, 'STO2302050015', 'BRG010204', 'Meja café', '', '', '', '', 5, '0', '2023-04-03 12:47:02', NULL, NULL, NULL),
(60, 3, 'STO2302050015', 'BRG010205', 'Meja Bufet Klasik T', '', '', '', '', 5, '0', '2023-04-04 12:47:02', NULL, NULL, NULL),
(61, 1, 'STO2302050001', 'BRG010301', 'M Tiga Pintu Empat Laci', '', '', '', '', 5, '0', '2023-04-05 12:47:02', NULL, NULL, NULL),
(62, 2, 'STO2302050001', 'BRG010302', 'M New Duco', '', '', '', '', 5, '0', '2023-04-06 12:47:02', NULL, NULL, NULL),
(63, 3, 'STO2302050002', 'BRG010303', 'M Jati 2 Pintu', '', '', '', '', 5, '0', '2023-04-07 12:47:02', NULL, NULL, NULL),
(64, 1, 'STO2302050002', 'BRG010304', 'M Black plus kaca', '', '', '', '', 5, '0', '2023-04-08 12:47:02', NULL, NULL, NULL),
(65, 2, 'STO2302050003', 'BRG010305', 'M Sliding GESER ', '', '', '', '', 5, '0', '2023-04-09 12:47:02', NULL, NULL, NULL),
(66, 3, 'STO2302050003', 'BRG010401', 'R Sepatu ', '', '', '', '', 5, '0', '2023-04-10 12:47:02', NULL, NULL, NULL),
(67, 1, 'STO2302050004', 'BRG010402', 'R Dinding Hiasan ', '', '', '', '', 5, '0', '2023-04-11 12:47:02', NULL, NULL, NULL),
(68, 2, 'STO2302050004', 'BRG010403', 'R Buku', '', '', '', '', 5, '0', '2023-04-12 12:47:02', NULL, NULL, NULL),
(69, 3, 'STO2302050005', 'BRG010404', 'R Taman', '', '', '', '', 5, '0', '2023-04-13 12:47:02', NULL, NULL, NULL),
(70, 1, 'STO2302050005', 'BRG010405', 'R Piring Gantung', '', '', '', '', 5, '0', '2023-04-14 12:47:02', NULL, NULL, NULL),
(71, 2, 'STO2302050006', 'BRG010501', 'On Side', '', '', '', '', 5, '0', '2023-04-15 12:47:02', NULL, NULL, NULL),
(72, 3, 'STO2302050006', 'BRG010502', 'Kabinet Kaca', '', '', '', '', 5, '0', '2023-04-16 12:47:02', NULL, NULL, NULL),
(73, 1, 'STO2302050007', 'BRG010503', 'Putih', '', '', '', '', 5, '0', '2023-04-17 12:47:02', NULL, NULL, NULL),
(74, 2, 'STO2302050007', 'BRG010504', 'Scandinavian', '', '', '', '', 5, '0', '2023-04-18 12:47:02', NULL, NULL, NULL),
(75, 3, 'STO2302050008', 'BRG010505', 'Klasik', '', '', '', '', 5, '0', '2023-04-19 12:47:02', NULL, NULL, NULL),
(76, 1, 'STO2302050008', 'BRG020101', 'Papan ', '300', '20', '', '', 5, '0', '2023-04-20 12:47:02', NULL, NULL, NULL),
(77, 2, 'STO2302050009', 'BRG020102', 'Kaso', '5', '7', '', '', 5, '0', '2023-04-21 12:47:02', NULL, NULL, NULL),
(78, 3, 'STO2302050009', 'BRG020103', 'Balok ', '8', '15', '', '', 5, '0', '2023-04-22 12:47:02', NULL, NULL, NULL),
(79, 1, 'STO2302050010', 'BRG020104', 'Reng', '3', '4', '', '', 5, '0', '2023-04-23 12:47:02', NULL, NULL, NULL),
(80, 2, 'STO2302050010', 'BRG020105', 'Tiang', '9', '9', '', '', 5, '0', '2023-04-24 12:47:02', NULL, NULL, NULL),
(81, 3, 'STO2302050011', 'BRG020201', 'Papan ', '2', '20', '', '', 5, '0', '2023-04-25 12:47:02', NULL, NULL, NULL),
(82, 1, 'STO2302050011', 'BRG020202', 'Kaso', '4', '6', '', '', 5, '0', '2023-04-26 12:47:02', NULL, NULL, NULL),
(83, 2, 'STO2302050012', 'BRG020203', 'Balok ', '6', '12', '', '', 5, '0', '2023-04-27 12:47:02', NULL, NULL, NULL),
(84, 3, 'STO2302050012', 'BRG020204', 'Reng', '2', '4', '', '', 5, '0', '2023-04-28 12:47:02', NULL, NULL, NULL),
(85, 1, 'STO2302050013', 'BRG020205', 'Tiang', '8', '8', '', '', 5, '0', '2023-04-29 12:47:02', NULL, NULL, NULL),
(86, 2, 'STO2302050013', 'BRG020301', 'Papan ', '3', '20', '', '', 5, '0', '2023-04-30 12:47:02', NULL, NULL, NULL),
(87, 3, 'STO2302050014', 'BRG020302', 'Kaso', '4', '6', '', '', 5, '0', '2023-05-01 12:47:02', NULL, NULL, NULL),
(88, 1, 'STO2302050014', 'BRG020303', 'Balok ', '8', '15', '', '', 5, '0', '2023-05-02 12:47:02', NULL, NULL, NULL),
(89, 2, 'STO2302050015', 'BRG020304', 'Reng', '3', '4', '', '', 5, '0', '2023-05-03 12:47:02', NULL, NULL, NULL),
(90, 3, 'STO2302050015', 'BRG020305', 'Tiang', '10', '10', '', '', 5, '0', '2023-05-04 12:47:02', NULL, NULL, NULL),
(91, 1, 'STO2302050001', 'BRG020401', 'Papan ', '3', '30', '', '', 5, '0', '2023-05-05 12:47:02', NULL, NULL, NULL),
(92, 2, 'STO2302050001', 'BRG020402', 'Kaso', '4', '6', '', '', 5, '0', '2023-05-06 12:47:02', NULL, NULL, NULL),
(93, 3, 'STO2302050002', 'BRG020403', 'Balok ', '6', '12', '', '', 5, '0', '2023-05-07 12:47:02', NULL, NULL, NULL),
(94, 1, 'STO2302050002', 'BRG020404', 'Reng', '3', '4', '', '', 5, '0', '2023-05-08 12:47:02', NULL, NULL, NULL),
(95, 2, 'STO2302050003', 'BRG020405', 'Tiang', '10', '10', '', '', 5, '0', '2023-05-09 12:47:02', NULL, NULL, NULL),
(96, 3, 'STO2302050003', 'BRG020501', 'Papan ', '2', '10', '', '', 5, '0', '2023-05-10 12:47:02', NULL, NULL, NULL),
(97, 1, 'STO2302050004', 'BRG020502', 'Kaso', '5', '7', '', '', 5, '0', '2023-05-11 12:47:02', NULL, NULL, NULL),
(98, 2, 'STO2302050004', 'BRG020503', 'Balok ', '5', '10', '', '', 5, '0', '2023-05-12 12:47:02', NULL, NULL, NULL),
(99, 3, 'STO2302050005', 'BRG020504', 'Reng', '2', '4', '', '', 5, '0', '2023-05-13 12:47:02', NULL, NULL, NULL),
(100, 1, 'STO2302050005', 'BRG020505', 'Tiang', '10', '15', '', '', 5, '0', '2023-05-14 12:47:02', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `is_active` enum('0','1') DEFAULT '0' COMMENT '1=tidak aktif;0=aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `is_active`) VALUES
(1, 'Supplier A', '081288567913', 'Sariasih, Bandung', NULL, '0'),
(2, 'Suppplier B', '081210055069', 'Cimahi, Bandung', NULL, '0'),
(3, 'Supplier C', '081206942069', 'Cimahi, Bandung', NULL, '0'),
(4, 'Aisyah ', '085322567689', 'jl. sukajadi, bandung', 'kayu jati, katu mahoni', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tem_req`
--

CREATE TABLE `tem_req` (
  `id_tem_req` int(6) NOT NULL,
  `kd_req` varchar(50) NOT NULL,
  `kd_stock` varchar(255) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `length_size` varchar(255) NOT NULL,
  `width_size` varchar(255) NOT NULL,
  `lumber_type` varchar(255) NOT NULL COMMENT 'tipe kayu',
  `species_type` varchar(255) NOT NULL COMMENT 'jenis kayu',
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` int(2) NOT NULL COMMENT '1:admin, 2:gudang, 3:produksi',
  `is_active` int(1) NOT NULL COMMENT '0:aktif, 1:non aktif',
  `date_login` datetime NOT NULL,
  `status_login` int(2) DEFAULT NULL COMMENT '0:aktif, 1:non aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `level`, `is_active`, `date_login`, `status_login`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Vincent', 1, 0, '2023-02-05 16:48:43', 1),
(3, 'gudang', 'a80dd043eb5b682b4148b9fc2b0feabb2c606fff', 'Karl', 2, 0, '2023-02-06 15:42:40', 1),
(5, 'produksi', '6e3bf9569d685dc740285417951b943b2452c2b5', 'Steve Handjob', 3, 0, '2023-02-06 08:51:32', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log_barang`
--
ALTER TABLE `activity_log_barang`
  ADD PRIMARY KEY (`id_log_barang`);

--
-- Indexes for table `activity_log_req`
--
ALTER TABLE `activity_log_req`
  ADD PRIMARY KEY (`id_log_req`);

--
-- Indexes for table `d_request`
--
ALTER TABLE `d_request`
  ADD PRIMARY KEY (`id_dtl_req`);

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `m_request`
--
ALTER TABLE `m_request`
  ADD PRIMARY KEY (`id_m_req`);

--
-- Indexes for table `m_stock`
--
ALTER TABLE `m_stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tem_req`
--
ALTER TABLE `tem_req`
  ADD PRIMARY KEY (`id_tem_req`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log_barang`
--
ALTER TABLE `activity_log_barang`
  MODIFY `id_log_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `activity_log_req`
--
ALTER TABLE `activity_log_req`
  MODIFY `id_log_req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `d_request`
--
ALTER TABLE `d_request`
  MODIFY `id_dtl_req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `m_request`
--
ALTER TABLE `m_request`
  MODIFY `id_m_req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_stock`
--
ALTER TABLE `m_stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tem_req`
--
ALTER TABLE `tem_req`
  MODIFY `id_tem_req` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
