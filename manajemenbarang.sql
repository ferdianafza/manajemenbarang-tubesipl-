-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 02:28 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemenbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(3, 'admin1', 'admin1@gmail.com', '$2y$10$7haaU..y6CKII6TVSDGVyO6jvrekwIjBjD9z4SZ6x6TmsO6E6peh6'),
(4, 'admin2', 'admin2@gmail.com', '$2y$10$vWXwpPredS8pL45rwsn0o.h3eeMjyYE6qiAuZYIcW/8pfMCPtrozO'),
(5, 'myvohok', 'ladil@mailinator.com', '$2y$10$V1qWjHnjrdT1umji6REWmO09pl5K4rMRtShOsAL3urbAs72dgOC5C'),
(6, 'cyfetypyca', 'mapedi@mailinator.com', '$2y$10$lJqhdq3zXP6nuAOSqlS82u9rR7Vg7Pg1C1H5vyHieL3OJmH9elz0G'),
(7, 'override by staff', 'overidebystaff@gmail.com', '$2y$10$f20ZwkCTavf.uT6S/8zPV.G7SkXj8cVMbjXrbeIiAqO7fvvhhCBke');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `stok`) VALUES
(2, 'Madu TJ', 14),
(3, 'FRESH CARE', 11),
(4, 'Minyak Kayu Putih', 40),
(5, 'Misting', 40),
(6, 'Meja Belajar', 0),
(7, 'kursi belajar', 6);

-- --------------------------------------------------------

--
-- Table structure for table `barangsuratjalan`
--

CREATE TABLE `barangsuratjalan` (
  `kode_surat_jalan` int(10) NOT NULL,
  `barang_id` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangsuratjalan`
--

INSERT INTO `barangsuratjalan` (`kode_surat_jalan`, `barang_id`, `jumlah`) VALUES
(0, 2, 4),
(0, 3, 6),
(25, 2, 4),
(25, 3, 6),
(26, 2, 4),
(26, 3, 4),
(26, 4, 4),
(26, 5, 4),
(31, 2, 4),
(31, 3, 6),
(32, 4, 10),
(33, 2, 10),
(34, 6, 1),
(35, 6, 8),
(35, 7, 9),
(36, 3, 5),
(36, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(10) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `barang_id` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `admin_id`, `barang_id`, `jumlah`, `waktu`) VALUES
(2, 3, 2, 2, '2023-12-12'),
(7, 4, 5, 1, '2023-12-30'),
(8, 4, 5, 1, '2023-12-30'),
(9, 7, 5, 1, '2023-12-30'),
(10, 7, 5, 1, '2023-12-30'),
(11, 7, 5, 1, '2023-12-30'),
(12, 7, 5, 2, '2023-12-30'),
(13, 7, 2, 4, '2023-12-30'),
(14, 7, 3, 6, '2023-12-30'),
(15, 7, 4, 10, '2023-12-30'),
(16, 7, 2, 10, '2023-12-30'),
(17, 4, 6, 1, '2023-12-30'),
(18, 7, 6, 1, '2023-12-30'),
(19, 4, 7, 1, '2023-12-30'),
(20, 7, 6, 8, '2023-12-30'),
(21, 7, 7, 9, '2023-12-30'),
(22, 7, 3, 5, '2023-12-30'),
(23, 7, 7, 4, '2023-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(10) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `barang_id` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `admin_id`, `barang_id`, `jumlah`, `waktu`) VALUES
(7, 3, 2, 10, '2023-12-12'),
(8, 3, 3, 8, '2023-12-12'),
(9, 4, 5, 2, '2023-12-29'),
(10, 4, 2, 50, '2023-12-30'),
(11, 4, 3, 50, '2023-12-30'),
(12, 4, 5, 50, '2023-12-30'),
(15, 4, 4, 50, '2023-12-30'),
(16, 4, 6, 10, '2023-12-30'),
(17, 4, 7, 20, '2023-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `email`, `password`) VALUES
(4, 'staff1', 'staff1@gmail.com', '$2y$10$pumVCLIFlGAsZzCQHJUEA.wZZqmejuhlidqnt4lAgs5N2vVifQXru'),
(5, 'staff2', 'staff2@gmail.com', '$2y$10$8r9PFP88ZRaq0eX6WvpJNugaa1ox7PDuo1nwezVT0bH23I/SrpqvK'),
(6, '', '', '$2y$10$fMBGX.qbYsERMDXQ2s4Qruc0WaQoZ71.GGFpTBGMwwTQdFwQOoIvG'),
(7, 'staff1', 'staff1@gmail.com', '$2y$10$MGEvczvThdyq1n7ObZoL4OnDOtmHKpsf1y/oLch/OPNiaoK05H/gy'),
(8, 'ferdian', 'ferdian@gmail.com', '$2y$10$pHWh.GSvAWI.JnnXFsw0wuiTVJoskF2/lok4YcvCh8Xs.0moDB/y6');

-- --------------------------------------------------------

--
-- Table structure for table `suratjalan`
--

CREATE TABLE `suratjalan` (
  `kode_surat_jalan` int(20) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suratjalan`
--

INSERT INTO `suratjalan` (`kode_surat_jalan`, `penerima`, `tujuan`, `staff_id`, `waktu`) VALUES
(23, 'PT Digito', 'Kec Batujajat Kab.Bandung Barat Nomor 33', 8, '2023-12-30 08:58:03'),
(24, 'PT Digito', 'Kec Batujajat Kab.Bandung Barat Nomor 33', 8, '2023-12-30 09:00:17'),
(25, 'PT Digito', 'Kec Batujajat Kab.Bandung Barat Nomor 33', 8, '2023-12-30 09:02:12'),
(26, 'PT Digito', 'Kec Batujajat Kab.Bandung Barat Nomor 33', 5, '2023-12-30 09:22:40'),
(27, 'PT Digito', 'Kec Batujajat Kab.Bandung Barat Nomor 33', 5, '2023-12-30 09:36:18'),
(28, 'PT Digito', 'Kec Batujajat Kab.Bandung Barat Nomor 33', 5, '2023-12-30 09:36:59'),
(29, 'PT Digito', 'Kec Batujajat Kab.Bandung Barat Nomor 33', 5, '2023-12-30 09:37:30'),
(30, 'PT Digito', 'Kec Batujajat Kab.Bandung Barat Nomor 33', 5, '2023-12-30 09:38:19'),
(31, 'PT Digito', 'Kec Batujajat Kab.Bandung Barat Nomor 33', 5, '2023-12-30 09:40:15'),
(32, 'PT Digito', 'Kec Batujajat Kab.Bandung Barat Nomor 33', 5, '2023-12-30 09:40:52'),
(33, 'PT Digito', 'Kec Batujajat Kab.Bandung Barat Nomor 33', 5, '2023-12-30 09:49:23'),
(34, 'PT Digito', 'Kec Batujajat Kab.Bandung Barat Nomor 33', 8, '2023-12-30 10:16:34'),
(35, 'PT Digito', 'Kec Batujajat Kab.Bandung Barat Nomor 33', 8, '2023-12-30 10:20:16'),
(36, 'PT Digito', 'Kec Batujajat Kab.Bandung Barat Nomor 33', 8, '2023-12-30 10:22:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratjalan`
--
ALTER TABLE `suratjalan`
  ADD PRIMARY KEY (`kode_surat_jalan`),
  ADD KEY `staff_id` (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `suratjalan`
--
ALTER TABLE `suratjalan`
  MODIFY `kode_surat_jalan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `suratjalan`
--
ALTER TABLE `suratjalan`
  ADD CONSTRAINT `suratjalan_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
