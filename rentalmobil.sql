-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 02:38 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `datamobil`
--

CREATE TABLE `datamobil` (
  `id` int(100) NOT NULL,
  `typemobil` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `tahunkeluar` int(100) NOT NULL,
  `nomorpolisi` varchar(100) NOT NULL,
  `jumlahunit` int(100) NOT NULL,
  `hargasewa` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datamobil`
--

INSERT INTO `datamobil` (`id`, `typemobil`, `tahunkeluar`, `nomorpolisi`, `jumlahunit`, `hargasewa`) VALUES
(1, 'Xpander', 2020, 'AD8392YKS', 10, 500000),
(2, 'Xenia Hydra', 2018, 'AD84920UP', 5, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `datapembayaran`
--

CREATE TABLE `datapembayaran` (
  `id` int(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `tanggalpinjam` varchar(200) NOT NULL,
  `tanggalkembali` varchar(200) NOT NULL,
  `typemobil` varchar(200) NOT NULL,
  `jumlahbayar` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapembayaran`
--

INSERT INTO `datapembayaran` (`id`, `nama`, `pekerjaan`, `alamat`, `tanggalpinjam`, `tanggalkembali`, `typemobil`, `jumlahbayar`) VALUES
(1, 'Dwityananda Adhi Wardhana', 'guru', 'Pengin Cangkol', '2021-06-26', '2021-06-29', 'xpander', 1000000),
(3, 'Rafly', 'karyawan', 'Cileungsi Bandung', '2021-07-19', '2021-07-23', 'Xenia 2017', 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `datapeminjam`
--

CREATE TABLE `datapeminjam` (
  `id` int(100) NOT NULL,
  `nik` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `typemobil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapeminjam`
--

INSERT INTO `datapeminjam` (`id`, `nik`, `nama`, `alamat`, `pekerjaan`, `typemobil`) VALUES
(1, 54132313, 'Abdul Hafid', 'Semanggi, Surakarta', 'pns', 'Xenia'),
(5, 2147483647, 'anindya', 'Pengin Saja', 'pengusaha', 'Xpander'),
(6, 1541313131, 'Rafly', 'Bandung, Cileungsi', 'karyawan', 'Xenia');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` text NOT NULL,
  `pekerjaan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `username`, `password`, `nama`, `pekerjaan`) VALUES
(1, 'admin', 'admin', 'admin utama', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id` int(11) NOT NULL,
  `nama peminjam` varchar(200) NOT NULL,
  `tanggalpinjam` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `tanggalkembali` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `alamatpeminjam` text NOT NULL,
  `typemobil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id`, `nama peminjam`, `tanggalpinjam`, `tanggalkembali`, `alamatpeminjam`, `typemobil`) VALUES
(1, 'Abdul Hafid', '2021-07-20', '2021-07-23', 'Surakarta', 'Xenia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datamobil`
--
ALTER TABLE `datamobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datapembayaran`
--
ALTER TABLE `datapembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datapeminjam`
--
ALTER TABLE `datapeminjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datamobil`
--
ALTER TABLE `datamobil`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datapembayaran`
--
ALTER TABLE `datapembayaran`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `datapeminjam`
--
ALTER TABLE `datapeminjam`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
