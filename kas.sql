-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 01:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kas`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `keterangan` varchar(70) NOT NULL,
  `nominal` float NOT NULL,
  `username` varchar(50) NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `keterangan`, `nominal`, `username`, `jenis_transaksi`, `tanggal`) VALUES
(2, 'Beli Beras', 100000, 'depi', 'Pemasukan', '2023-11-18'),
(3, 'Dana Sosial Bp RT Jubaidin', 150000, 'depi', 'Pemasukan', '2023-11-08'),
(4, 'Beli sapu', 15000, 'pera', 'Pemasukan', '2023-11-15'),
(7, 'Beli Makanan Karangtaruna', 300000, 'depi', 'Pemasukan', '2023-10-30'),
(8, 'Beras 10 kg', 100000, 'depi', 'pengeluaran', '2023-10-31'),
(9, 'Bantuan', 50000, 'depi', 'pengeluaran', '2023-11-18'),
(12, 'Beli Buku ', 50000, 'pera', 'Pemasukan', '2023-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `level`) VALUES
(62, 'peraa', 'perapatika sardianto', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin'),
(63, 'depi', 'depi penguasa alam boboboy', '81dc9bdb52d04dc20036dbd8313ed055', 'User'),
(64, 'nisa', 'nisa suka ep ep', '81dc9bdb52d04dc20036dbd8313ed055', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
