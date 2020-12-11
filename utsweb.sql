-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 10:43 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utsweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `pencatatan_stokbarang`
--

CREATE TABLE `pencatatan_stokbarang` (
  `id` int(11) NOT NULL,
  `kode_obat` varchar(6) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `stok_obat` int(6) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pencatatan_stokbarang`
--

INSERT INTO `pencatatan_stokbarang` (`id`, `kode_obat`, `nama_obat`, `slug`, `stok_obat`, `created_at`, `updated_at`) VALUES
(25, '10PRTM', 'Paracetamol', 'paracetamol', 30, '2020-12-07 18:03:26', '2020-12-07 18:03:26'),
(26, '90BDRX', 'Bodrex', 'bodrex', 30, '2020-12-07 18:08:21', '2020-12-07 18:08:47'),
(27, 'sdasd', 'asad', 'asad', 2, '2020-12-07 18:41:35', '2020-12-07 18:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `transaksibarang`
--

CREATE TABLE `transaksibarang` (
  `id` int(11) NOT NULL,
  `kode_obat` varchar(6) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `jumlah_obat` int(6) NOT NULL,
  `keterangan_transaksi` varchar(12) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksibarang`
--

INSERT INTO `transaksibarang` (`id`, `kode_obat`, `nama_obat`, `slug`, `jumlah_obat`, `keterangan_transaksi`, `created_at`, `updated_at`) VALUES
(12, '10PRTM', 'Paracetamol', 'paracetamol', 30, 'masuk', '2020-12-07 18:03:26', '2020-12-07 18:03:26'),
(13, '90BDRX', 'Bodrex', 'bodrex', 50, 'masuk', '2020-12-07 18:08:21', '2020-12-07 18:08:21'),
(14, '90BDRX', 'Bodrex', 'bodrex', 20, 'keluar', '2020-12-07 18:08:47', '2020-12-07 18:08:47'),
(15, 'sdasd', 'asad', 'asad', 2, 'masuk', '2020-12-07 18:41:35', '2020-12-07 18:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'pegawai123', 'sayapegawai', 'pegawai'),
(2, 'manager123', 'sayamanager', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pencatatan_stokbarang`
--
ALTER TABLE `pencatatan_stokbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksibarang`
--
ALTER TABLE `transaksibarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pencatatan_stokbarang`
--
ALTER TABLE `pencatatan_stokbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaksibarang`
--
ALTER TABLE `transaksibarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
