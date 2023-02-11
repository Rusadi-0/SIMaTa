-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2023 at 12:14 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_tamu`
--

CREATE TABLE `tb_tamu` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ditemui` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `masuk` varchar(255) NOT NULL,
  `keluar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `nilai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tamu`
--

INSERT INTO `tb_tamu` (`id`, `nama`, `alamat`, `ditemui`, `keperluan`, `tanggal`, `masuk`, `keluar`, `gambar`, `telepon`, `nilai`) VALUES
(2, 'BPN tabalong    ', 'tabalong', 'Kepala badan', 'kondinasi', '01/02/2023', '09:35 am', '09:51 am', 'TM_2023-02-01_09-36-54-AM.jpeg', '0', 'Sangat Bagus'),
(3, 'fggf    ', 'fgfh', 'Kepala Bidang Pendataan dan Pelayanan', 'fgh', '01/02/2023', '07:21 pm', '', 'kosong.png', '3434', ''),
(4, 'dfgdfg    ', 'dfgdf', 'Sekretaris', 'dfgdfg', '01/02/2023', '07:23 pm', '', 'TM_2023-02-01_07-23-35-PM.jpeg', '345', ''),
(5, 'ds    ', 'ds', 'Sekretaris', 'sd', '11/02/2023', '01:24 pm', '', 'kosong.png', '3', ''),
(6, 'sdf    ', 'sdf', 'Sekretaris', 'sdf', '11/02/2023', '02:00 pm', '', 'TM_2023-02-11_02-00-34-PM.jpeg', '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$onQI.9Nbm7fIdCtcMb/AgubQ6.BzgcQeWGN/cdCq.3y56aMvV6ele');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
