-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3374
-- Generation Time: Feb 03, 2023 at 06:07 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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
  `kd_req` varchar(25) NOT NULL,
  `supplier_id` varchar(25) NOT NULL,
  `kd_barang` varchar(8) NOT NULL,
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

INSERT INTO `activity_log_barang` (`id_log_barang`, `date_log`, `user_id`, `kd_req`, `supplier_id`, `kd_barang`, `qty_tot`, `qty_confir`, `qty_req`, `qty_cancel`, `remark`, `status_log`, `created_at`) VALUES
(1, '2023-07-02 06:56:44', 0, 'REQ2302020001', '2', 'BRG01010', 12, 2, 10, 0, 'coba\n', 1, '2023-02-03 06:56:44'),
(2, '2023-08-02 06:58:10', 0, 'REQ2302020001', '2', 'BRG01010', 12, 5, 7, 0, 'a', 1, '2023-02-03 06:58:10'),
(3, '2023-07-02 06:59:08', 0, 'REQ2302020001', '2', 'BRG01010', 5, 1, 4, 0, 'asd', 1, '2023-02-03 06:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log_req`
--

CREATE TABLE `activity_log_req` (
  `id_log_req` int(11) NOT NULL,
  `date_log` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `kd_req` varchar(25) NOT NULL,
  `supplier_id` varchar(25) NOT NULL,
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

INSERT INTO `activity_log_req` (`id_log_req`, `date_log`, `user_id`, `kd_req`, `supplier_id`, `kd_barang`, `length_size`, `width_size`, `lumber_type`, `species_type`, `qty_tot`, `qty_confir`, `qty_req`, `qty_cancel`, `remark`, `status_req`, `created_at`) VALUES
(295, '2023-07-02 02:19:07', 0, 'REQ2302020001', '2', 'BRG01010', '-', '-', '-', 'Jati Emas', 12, 0, 0, 0, '', '0', '2023-02-03 01:22:27'),
(296, '2023-07-02 02:19:07', 0, 'REQ2302020001', '2', 'BRG01010', '-', '-', '-', '-', 5, 0, 0, 0, '', '0', '2023-02-03 01:22:27'),
(297, '2023-07-02 02:19:07', 0, 'REQ2302020001', '2', 'BRG01020', '-', '-', '-', '-', 2, 0, 0, 0, '', '0', '2023-02-03 01:22:27'),
(298, '2023-07-02 02:20:16', 0, 'REQ2302020001', '2', 'BRG01010', '-', '-', '-', 'Jati Emas', 12, 0, 0, 0, '', '0', '2023-02-03 01:22:27'),
(299, '2023-07-02 02:20:16', 0, 'REQ2302020001', '2', 'BRG01010', '-', '-', '-', '-', 5, 0, 0, 0, '', '0', '2023-02-03 01:22:27'),
(300, '2023-07-02 02:20:16', 0, 'REQ2302020001', '2', 'BRG01020', '-', '-', '-', '-', 2, 0, 0, 0, '', '0', '2023-02-03 01:22:27'),
(301, '2023-09-02 11:51:21', 0, 'REQ2302030001', '2', 'BRG02010', '9', '9', '-', '-', 5, 5, 0, 0, '', '0', '2023-02-03 11:51:21'),
(302, '2023-09-02 11:51:21', 0, 'REQ2302030001', '2', 'BRG01020', '-', '-', '-', '-', 6, 6, 0, 0, '', '0', '2023-02-03 11:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `d_request`
--

CREATE TABLE `d_request` (
  `id_dtl_req` int(11) NOT NULL,
  `kd_req` varchar(50) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `m_stock`
--

CREATE TABLE `m_stock` (
  `id_stock` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `kd_req` varchar(25) NOT NULL,
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
(6, 'Supplier C', '081206942069', 'Cimahi, Bandung', NULL, '0'),
(7, 'Aisyah ', '085322567689', 'jl. sukajadi, bandung', 'kayu jati, katu mahoni', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tem_req`
--

CREATE TABLE `tem_req` (
  `id_tem_req` int(6) NOT NULL,
  `kd_req` varchar(50) NOT NULL,
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
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Vincent', 1, 0, '2023-02-03 03:21:54', 0),
(3, 'gudang', 'a80dd043eb5b682b4148b9fc2b0feabb2c606fff', 'Karl', 2, 0, '2023-02-03 12:05:42', 1),
(5, 'produksi', '6e3bf9569d685dc740285417951b943b2452c2b5', 'Steve Handjob', 3, 0, '2023-02-03 11:47:48', 0);

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
  MODIFY `id_log_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `activity_log_req`
--
ALTER TABLE `activity_log_req`
  MODIFY `id_log_req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `d_request`
--
ALTER TABLE `d_request`
  MODIFY `id_dtl_req` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `m_request`
--
ALTER TABLE `m_request`
  MODIFY `id_m_req` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_stock`
--
ALTER TABLE `m_stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tem_req`
--
ALTER TABLE `tem_req`
  MODIFY `id_tem_req` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
