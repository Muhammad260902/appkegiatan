-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2024 at 04:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_kita`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengadaan`
--

CREATE TABLE `tb_pengadaan` (
  `id` int NOT NULL,
  `kode_sub_kegiatan` varchar(255) NOT NULL,
  `nama_sub_kegiatan` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pengadaan`
--

INSERT INTO `tb_pengadaan` (`id`, `kode_sub_kegiatan`, `nama_sub_kegiatan`, `nama_barang`, `satuan`, `jumlah`, `harga`, `total`) VALUES
(3, '5.2.1.3.3', 'Sub Kegiatan Koordinasi dan Penyusunan Dokumen RKA-SKPD', 'AC', 'buah', '4', '4000000', 'Rp 16.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subkegiatan`
--

CREATE TABLE `tb_subkegiatan` (
  `id_subkegiatan` int NOT NULL,
  `kode_sub_kegiatan` varchar(20) NOT NULL,
  `nama_sub_kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_subkegiatan`
--

INSERT INTO `tb_subkegiatan` (`id_subkegiatan`, `kode_sub_kegiatan`, `nama_sub_kegiatan`) VALUES
(2, '2.1.3.4', 'Sub Kegiatan Penyusunan Dokumen Perencanaan Perangkat Daerah'),
(3, '5.2.1.3.3', 'Sub Kegiatan Koordinasi dan Penyusunan Dokumen RKA-SKPD'),
(6, '2.1.1.3.4.5', 'Sub Kegiatan Penyusunan Dokumen RKA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usulan`
--

CREATE TABLE `tb_usulan` (
  `id` int NOT NULL,
  `menu_usulan` varchar(255) NOT NULL,
  `persyaratan` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_usulan`
--

INSERT INTO `tb_usulan` (`id`, `menu_usulan`, `persyaratan`, `kegiatan`) VALUES
(1, 'Sosialisasi Penyuluhan Bimbingan Jabatan ', '-Berdasarkan data dari BPS pengangguran terbanyak berasal dari SLTA dan dari SLTA tersebut SMK yang terbanyak, sehingga perlu adanya Penyuluhan dan Bimbingan Jabatan di SMK', 'Penempatan Tenaga Kerja/Pelayanan Antar Kerja Kabupaten/Kota/ Penyuluhan dan Bimbingan jabatan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Muhammad Edya Rosadi', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pengadaan`
--
ALTER TABLE `tb_pengadaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_subkegiatan`
--
ALTER TABLE `tb_subkegiatan`
  ADD PRIMARY KEY (`id_subkegiatan`);

--
-- Indexes for table `tb_usulan`
--
ALTER TABLE `tb_usulan`
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
-- AUTO_INCREMENT for table `tb_pengadaan`
--
ALTER TABLE `tb_pengadaan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_subkegiatan`
--
ALTER TABLE `tb_subkegiatan`
  MODIFY `id_subkegiatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_usulan`
--
ALTER TABLE `tb_usulan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
