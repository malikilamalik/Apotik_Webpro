-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 08:16 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek_webpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `apotek`
--

CREATE TABLE `apotek` (
  `id_apotek` int(15) NOT NULL,
  `nama_apotek` varchar(100) NOT NULL,
  `jalan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apotek`
--

INSERT INTO `apotek` (`id_apotek`, `nama_apotek`, `jalan`) VALUES
(1, 'Kimia Farma', 'Jl. Merdeka'),
(2, 'K-24', 'Jl. Jend. Sudirman'),
(3, 'Apotik Hasan Sadikin', 'Jl. Pasteur');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(15) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `stok` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok`) VALUES
(1, 'Cannabis', 100),
(2, 'Vitamin C', 1000),
(3, 'Ibuprofen', 500),
(4, 'Hemogblobin', 20),
(5, 'Paracetamol', 50);

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(10) NOT NULL,
  `isi_resep` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `isi_resep`, `status`) VALUES
(1, 'Cannabis', 'Selesai'),
(2, 'Vitamin C', 'Selesai'),
(120, 'Ibuprofen', 'Sedang Dikemas'),
(331, 'Hemoglobin', 'Sedang Diracik'),
(550, 'Paracetamol', 'Sedang Diracik');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_resep` int(10) NOT NULL,
  `isi_resep` varchar(150) NOT NULL,
  `harga` int(15) NOT NULL,
  `status_transaksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_resep`, `isi_resep`, `harga`, `status_transaksi`) VALUES
(1, 331, 'Hemoglobin', 50000, 'Lunas'),
(2, 120, 'Ibuprofen', 1000000, 'Kredit'),
(3, 550, 'Paracetamol', 200000, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_depan` varchar(32) NOT NULL,
  `nama_belakang` varchar(32) NOT NULL,
  `nama_tambahan` varchar(32) DEFAULT NULL,
  `no_telp1` varchar(14) NOT NULL,
  `no_telp2` varchar(14) DEFAULT NULL,
  `alamat` varchar(32) NOT NULL,
  `alamat_tambahan` varchar(32) DEFAULT NULL,
  `kelurahan` varchar(64) NOT NULL,
  `kecamatan` varchar(64) NOT NULL,
  `kota` varchar(64) NOT NULL,
  `role` enum('admin','pemilik','apoteker','pelayan','kasir','pelanggan') NOT NULL,
  `obat_custom` enum('true','false') NOT NULL,
  `aktif` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama_depan`, `nama_belakang`, `nama_tambahan`, `no_telp1`, `no_telp2`, `alamat`, `alamat_tambahan`, `kelurahan`, `kecamatan`, `kota`, `role`, `obat_custom`, `aktif`) VALUES
(1, 'stevandel', '123', 'Stevan', 'Del', 'Arisandi', '082254669181', '082219738912', 'Jl. Warga Baru', 'No. 138', 'Makmur Mulia', 'Satui', 'Sungai Danau', 'pelayan', '', 'true'),
(2, 'BelOfAvarice', 'Motherlode', 'Bel', 'Avarice', NULL, '089694206969', '0', 'JLN.PERJUANG NO.420 RT.6/RW.9', 'GEDUNG B LANTAI 4 KAMAR 5', 'Cigugur Tengah', 'Cimahi Tengah', 'Cimahi', 'admin', '', 'true'),
(3, 'asdasd', 'orcaninjagoesrambo', 'asdasd', 'asdasd', 'asdasda', '123123', '123123', 'asdasd', 'asdasd', 'asdad', 'asdasd', 'asdasd', 'pelanggan', '', 'true'),
(4, 'enobening', 'kudalaper', 'Eno', 'Bening', NULL, '12312', '12312', 'asdasd', 'asdasd', 'asdad', 'asdasd', 'asdasd', 'apoteker', '', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `no_telp1` (`no_telp1`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
