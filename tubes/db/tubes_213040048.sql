-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 07:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_213040048`
--

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `tgl_konsultasi` date NOT NULL,
  `media_konsultasi` varchar(6) NOT NULL,
  `id_pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `keluhan`, `tgl_konsultasi`, `media_konsultasi`, `id_pasien`) VALUES
(1, 'Sakit tenggorokan yang tidak berhenti setelah 1 minggu', '2022-05-03', 'online', 3),
(2, 'Demam panas', '2022-04-15', 'onsite', 2),
(3, 'Tangan kejang-kejang', '2022-03-01', 'online', 2),
(4, 'Radang tenggorokan', '2022-01-05', 'onsite', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `email_pasien` varchar(100) NOT NULL,
  `telepon_pasien` char(13) NOT NULL,
  `foto_pasien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `email_pasien`, `telepon_pasien`, `foto_pasien`) VALUES
(1, 'Albert', 'albert@gmail.com', '8884343924', 'nophoto.png'),
(2, 'Jerry', 'jerry@gmail.com', '989469946', 'nophoto.png'),
(3, 'Edward', 'edward@gmail.com', '559680038', 'nophoto.png'),
(4, 'Jason', 'jason@gmail.com', '996048600', 'nophoto.png'),
(5, 'Anthony', 'anthony@gmail.com', '904860389', 'nophoto.png'),
(7, 'Raden', 'raden@gmail.com', '08123456789', 'nophoto.png'),
(9, 'Arya', 'arya@gmail.com', '0238459023457', 'nophoto.png'),
(10, 'Asep', 'asep@gmail.com', '3408590343453', '628dba1386b52.jpg'),
(11, 'Hai', 'hai@gmail.com', '03495803985', '628de32eef9db.jpg'),
(14, 'Ajeng', 'ajeng@gmail.com', '340238324', '628dba3478ecd.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
