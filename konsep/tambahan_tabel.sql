--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE `m_barang` (
  `id_brg` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(11) NOT NULL,
  `sub_kode` varchar(11) NOT NULL,
  `sub_data` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `length_size` varchar(200) DEFAULT NULL,
  `width_size` varchar(200) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=Tidak Aktif;1=Aktif',
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_barang`
--

INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '*', '*', 'Barang Jadi', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '1', '*', 'Kursi', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '1', '1', 'Kursi Ukir Jepara', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '1', '2', 'Sofa', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '1', '3', 'Kursi Minimalis Cafe', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '1', '4', 'Kursi fellow ', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '1', '5', 'Kursi Zola', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '2', '*', 'Meja', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '2', '1', 'Meja Sudut', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '2', '2', 'Meja minimalist square', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '2', '3', 'Meja Makan Minimalis', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '2', '4', 'Meja café', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '2', '5', 'Meja Bufet Klasik T', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '3', '*', 'Lemari', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '3', '1', 'M Tiga Pintu Empat Laci', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '3', '2', 'M New Duco', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '3', '3', 'M Jati 2 Pintu', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '3', '4', 'M Black plus kaca', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '3', '5', 'M Sliding GESER ', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '4', '*', 'Rak', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '4', '1', 'R Sepatu ', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '4', '2', 'R Dinding Hiasan ', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '4', '3', 'R Buku', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '4', '4', 'R Taman', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '4', '5', 'R Piring Gantung', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '5', '*', 'Kitchen Set', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '5', '1', 'On Side', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '5', '2', 'Kabinet Kaca', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '5', '3', 'Putih', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '5', '4', 'Scandinavian', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('1', '5', '5', 'Klasik', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '1', '*', 'Jati Emas', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '1', '1', 'Papan ', '3', '20'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '1', '2', 'Kaso', '5', '7'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '1', '3', 'Balok ', '8', '15'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '1', '4', 'reng', '3', '4'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '1', '5', 'Tiang', '9', '9'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '2', '*', 'Kayu Mindi', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '2', '1', 'Papan ', '2', '20'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '2', '2', 'Kaso', '4', '6'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '2', '3', 'Balok ', '6', '12'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '2', '4', 'reng', '2', '4'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '2', '5', 'Tiang', '8', '8'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '3', '*', 'Kayu Jati Belanda', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '3', '1', 'Papan ', '3', '20'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '3', '2', 'Kaso', '4', '6'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '3', '3', 'Balok ', '8', '15'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '3', '4', 'reng', '3', '4'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '3', '5', 'Tiang', '10', '10'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '4', '*', 'Kayu Mahogani', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '4', '1', 'Papan ', '3', '30'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '4', '2', 'Kaso', '4', '6'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '4', '3', 'Balok ', '6', '12'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '4', '4', 'reng', '3', '4'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '4', '5', 'Tiang', '10', '10'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '5', '*', 'Kayu Cendana', '', ''); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '5', '1', 'Papan ', '2', '10'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '5', '2', 'Kaso', '5', '7'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '5', '3', 'Balok ', '5', '10'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '5', '4', 'reng', '2', '4'); 
INSERT INTO m_barang (`kode`, `sub_kode`, `sub_data`, `name`, `length_size`, `width_size`) VALUES ('2', '5', '5', 'Tiang', '10', '15'); 

-- --------------------------------------------------------

--
-- Table structure for table `m_request`
--

CREATE TABLE `m_request` (
  `id_m_req` int(11) NOT NULL AUTO_INCREMENT,
  `kd_req` varchar(25) NOT NULL,
  `date_req` datetime NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `total_req` int(11) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1=tidak aktif;0=aktif',
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_m_req`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `m_request`
--

CREATE TABLE `d_request` (
  `id_dtl_req` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` int(11) NOT NULL,
  `kd_req` varchar(50) NOT NULL,
  `kd_gudang` varchar(50) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `length_size` varchar(255) NOT NULL,
  `width_size` varchar(255) NOT NULL,
  `lumber_type` varchar(255) NOT NULL COMMENT 'tipe kayu',
  `species_type` varchar(255) NOT NULL COMMENT 'jenis kayu',
  `qty_tot` int(11) NOT NULL,
  `qty_confir` int(11) DEFAULT NULL,
  `qty_req` int(11) DEFAULT NULL,
  `qty_cancel` int(11) DEFAULT NULL,
  `status_req` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '5=cencel dan terkirim;4=cencel;3=cencel sebagian;2=terkirim;1=terkirim sebagaian;0=permintaan',
  `is_active` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1=tidak aktif;0=aktif',
  PRIMARY KEY (`id_dtl_req`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `tem_req`
--

CREATE TABLE `tem_req` (
  `id_tem_req` int(6) NOT NULL AUTO_INCREMENT,
  `id_supplier` int(11) NOT NULL,
  `kd_req` varchar(50) NOT NULL,
  `kd_gudang` varchar(50) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `lumber_type` varchar(255) NOT NULL COMMENT 'tipe kayu',
  `species_type` varchar(255) NOT NULL COMMENT 'jenis kayu',
  `qty` int(11) NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id_tem_req`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `activity_log_req`
--

CREATE TABLE `activity_log_req` (
  `id_log_req` int(11) NOT NULL AUTO_INCREMENT,
  `date_log` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `kd_req` varchar(25) NOT NULL,
  `kd_supplier` varchar(25) NOT NULL,
  `kd_barang` varchar(8) NOT NULL,
  `lumber_type` varchar(255) NOT NULL COMMENT 'tipe kayu',
  `species_type` varchar(255) NOT NULL COMMENT 'jenis kayu',
  `qty_tot` int(11) NOT NULL,
  `qty_confir` int(11) DEFAULT NULL,
  `qty_req` int(11) DEFAULT NULL,
  `qty_cancel` int(11) DEFAULT NULL,
  `status_log_req` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '5=cencel dan terkirim;4=cencel;3=cencel sebagian;2=terkirim;1=terkirim sebagaian;0=permintaan',
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_log_req`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `m_stock`
--

CREATE TABLE `m_stock` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` int(11) DEFAULT NULL,
  `kd_req` varchar(25) NOT NULL,
  `date_in` datetime NOT NULL,
  `kd_gudang` varchar(25) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
	`length_size` varchar(255) NOT NULL,
  `width_size` varchar(255) NOT NULL,
  `lumber_type` varchar(255) NOT NULL COMMENT 'tipe kayu',
  `species_type` varchar(255) NOT NULL COMMENT 'jenis kayu',
  `qty` int(11) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1=tidak aktif;0=aktif',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
	`update_at` datetime DEFAULT NULL,
	`update_by` varchar(50) DEFAULT NULL
  PRIMARY KEY (`id_stock`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `task`.`m_request` 
DROP COLUMN `nama_brg`;

ALTER TABLE `task`.`m_request` 
ADD COLUMN `supplier_id` int(11) NOT NULL AFTER `date_req`;

ALTER TABLE `task`.`d_request` 
DROP COLUMN `supplier_id`;

ALTER TABLE `task`.`activity_log_req` 
ADD COLUMN `length_size` varchar(255) NOT NULL AFTER `kd_barang`,
ADD COLUMN `width_size` varchar(255) NOT NULL AFTER `length_size`;

ALTER TABLE `activity_log_req` 
ADD COLUMN `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `status_req`;

ALTER TABLE `task`.`activity_log_req` 
CHANGE COLUMN `kd_supplier` `supplier_id` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL AFTER `kd_req`;

CREATE TABLE `activity_log_barang` (
  `id_log_barang` int(11) NOT NULL AUTO_INCREMENT,
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
	`created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_log_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `task`.`d_request` 
MODIFY COLUMN `qty_confir` int(11) NOT NULL AFTER `qty_tot`,
MODIFY COLUMN `qty_req` int(11) NOT NULL AFTER `qty_confir`,
MODIFY COLUMN `qty_cancel` int(11) NOT NULL AFTER `qty_req`;

ALTER TABLE `task`.`m_stock` 
CHANGE COLUMN `id_supplier` `supplier_id` int(11) NOT NULL AFTER `id_stock`;

ALTER TABLE `task`.`m_stock` 
DROP COLUMN `date_in`;

ALTER TABLE `task`.`m_stock` 
DROP COLUMN `kd_gudang`;

ALTER TABLE `task`.`d_request` 
DROP COLUMN `kd_gudang`;

ALTER TABLE `task`.`d_request` 
ADD COLUMN `nama_brg` varchar(255) NOT NULL AFTER `kd_barang`;

ALTER TABLE `task`.`activity_log_barang` 
MODIFY COLUMN `kd_barang` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL AFTER `supplier_id`;

ALTER TABLE `task`.`activity_log_barang` 
ADD COLUMN `status_in_out` int(11) NULL DEFAULT 0 AFTER `status_log`;
