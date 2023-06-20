-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 03:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kms_native`
--
CREATE DATABASE IF NOT EXISTS `db_kms_native` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_kms_native`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluhan_mhs`
--

CREATE TABLE `tb_keluhan_mhs` (
  `id_keluhan` int(11) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `saran` varchar(100) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keluhan_mhs`
--

INSERT INTO `tb_keluhan_mhs` (`id_keluhan`, `nim`, `keluhan`, `saran`, `file`) VALUES
(4, '2103040133', 'test', 'test', 'folder.png'),
(6, '2103040130', 'test', 'test', 'folder.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama_mahasiswa` varchar(128) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`id_mhs`, `nim`, `nama_mahasiswa`, `jk`, `id_prodi`) VALUES
(5, '2103040133', 'fadly', 'L', 1),
(8, '2103040130', 'Heru', 'L', 1),
(9, '2103040123', 'Arva', 'P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_admin` int(11) NOT NULL,
  `nama_petugas` varchar(128) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password_dec` text NOT NULL,
  `password_enc` text NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_admin`, `nama_petugas`, `username`, `password_dec`, `password_enc`, `role_id`) VALUES
(1, 'fadly maulana', 'fadly', '12345', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'test', 'test', '12', 'c20ad4d76fe97759aa27a0c99bff6710', 2),
(5, 'Admin', 'Admin', '12345', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(6, 'Adi', 'Adi_15', '12345', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `prodi`) VALUES
(1, 'Teknik Informatika'),
(4, 'Teknik Sipil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_keluhan_mhs`
--
ALTER TABLE `tb_keluhan_mhs`
  ADD PRIMARY KEY (`id_keluhan`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `tb_admin_id_admin_IDX` (`id_admin`) USING BTREE;

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_keluhan_mhs`
--
ALTER TABLE `tb_keluhan_mhs`
  MODIFY `id_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
