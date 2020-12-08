-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 01:23 PM
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
  `stok_obat` varchar(6) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pencatatan_stokbarang`
--

INSERT INTO `pencatatan_stokbarang` (`id`, `kode_obat`, `nama_obat`, `slug`, `stok_obat`, `created_at`, `updated_at`) VALUES
(1, '10PRTM', 'Paracetamol', 'paracetamol', '20', NULL, '2020-12-06 05:39:35'),
(2, '12BDRX', 'Bodrex', 'bodrex', '25', NULL, NULL),
(3, '17SGBN', 'Sangobion', 'sangobion', '26', '2020-12-04 10:04:27', '2020-12-04 10:04:27'),
(4, '22MLNT', 'Milanta', 'milanta', '30', '2020-12-04 10:26:14', '2020-12-04 10:26:14'),
(13, '35OBHK', 'OBH Komix', 'obh-komix', '30', '2020-12-06 03:02:46', '2020-12-06 03:02:46'),
(15, '20KNDN', 'Konidin', 'konidin', '60', '2020-12-06 03:25:31', '2020-12-06 05:41:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pencatatan_stokbarang`
--
ALTER TABLE `pencatatan_stokbarang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pencatatan_stokbarang`
--
ALTER TABLE `pencatatan_stokbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
