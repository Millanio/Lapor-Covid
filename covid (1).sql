-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 06:00 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `jkel` varchar(255) NOT NULL,
  `rt` int(11) NOT NULL,
  `infeksi` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `tanggal_lapor` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_sembuh` varchar(100) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `nik`, `nama`, `alamat`, `jkel`, `rt`, `infeksi`, `status`, `tanggal_lapor`, `tanggal_sembuh`) VALUES
(1, 3124321123223, 'M. Kaiba', 'Jl. bronggalan', 'laki-laki', 6, '2021-06-15', 0, '2021-06-15 15:25:22', '2021-06-15'),
(2, 1982781923, 'Uzumaki Putrajaya', 'Jl. plososawah', 'laki-laki', 6, '2021-06-14', 1, '2021-06-20 17:53:24', '-'),
(3, 123456, 'Mahendra Priyo', 'Jl. Gersikan 1', 'laki-laki', 12, '2021-06-21', 1, '2021-06-20 17:53:33', '-'),
(4, 2019212312, 'Uchiha Millen', 'Jl. Konoha Barat no 69', 'laki-laki', 23, '2021-06-21', 1, '2021-06-20 17:54:45', '-'),
(5, 98762871912, 'Akira Deni', 'Jl. ploso barat', 'laki-laki', 1, '2021-06-22', 1, '2021-06-22 15:37:09', '-'),
(6, 354665745677, 'Ronaldo', 'Jl. bronggalan sawah', 'laki-laki', 6, '2021-06-22', 1, '2021-06-22 15:40:24', '-');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tipe_akun` int(1) NOT NULL,
  `status_akun` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `tipe_akun`, `status_akun`) VALUES
(1, 'Putrajaya', '123456', 'Bagas Adil', 1, 1),
(2, 'Millen', 'Millenio', 'Indy', 1, 1),
(3, 'mulyadewi', 'hil', 'hil dina', 1, 1),
(4, 'ceking', '123', 'ceking', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`(191));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
