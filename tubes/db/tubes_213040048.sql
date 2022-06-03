-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 05:36 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `kode_admin` char(8) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `kode_admin`, `username`, `password`) VALUES
(1, 'admin1', 'siadmin', '6b4d1c2a0e90228bc04e161e742b6d40909b5425'),
(4, 'admin4', 'admin4', 'ea053d11a8aad1ccf8c18f9241baeb9ec47e5d64'),
(7, 'admin7', 'helloadmin', 'da39a3ee5e6b4b0d3255bfef95601890afd80709');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `email_dokter` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon_dokter` char(13) NOT NULL,
  `foto_dokter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `email_dokter`, `password`, `telepon_dokter`, `foto_dokter`) VALUES
(1, 'Fitri Ramdhani', 'fitri@gmail.com', '90669a986b4b74397ad27114165a1450cc3bd3d0', '089876543219', 'nophoto.png'),
(2, 'Yusuf al-Wahid', 'yusuf@gmail.com', '2476278303b32e2b26a1948f1cb04d9e5d0bccd7', '1223344342', 'nophoto.png'),
(3, 'Kallen Vestia', 'kallen@gmail.com', '5e5620d9f2bdb174d4963a80d43fe7fc5e120d70', '088555996848', 'nophoto.png'),
(4, 'Muhammad Azhar', 'azhar@gmail.com', '681ed2fb9f51b61459c1d8c0548740e09a59490a', '8896456567', 'nophoto.png');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `tgl_konsultasi` date NOT NULL,
  `media_konsultasi` varchar(6) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `keluhan`, `tgl_konsultasi`, `media_konsultasi`, `id_pasien`, `id_dokter`) VALUES
(1, 'Sakit tenggorokan yang tidak berhenti setelah 1 minggu', '2022-05-03', 'online', 3, 1),
(2, 'Demam panas', '2022-04-15', 'onsite', 2, 4),
(3, 'Tangan kejang-kejang', '2022-03-01', 'online', 2, 3),
(4, 'Radang tenggorokan', '2022-01-05', 'onsite', 2, 1),
(5, 'Test', '2022-06-04', 'onsite', 1, 1),
(7, '56456', '2022-06-03', 'onsite', 3, 1),
(8, 'Sakit kepala', '2022-07-01', 'online', 1, 3),
(9, 'Sakit Tenggorokan', '2022-06-22', 'onsite', 1, 2),
(10, 'Radang Tenggorokan', '2022-09-08', 'online', 2, 1),
(11, 'Cek kesehatan bulanan', '2022-03-10', 'onsite', 24, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `email_pasien` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon_pasien` char(13) NOT NULL,
  `foto_pasien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `email_pasien`, `password`, `telepon_pasien`, `foto_pasien`) VALUES
(1, 'Radhitya', 'radhitya@gmail.com', 'a818e1cb9d1bd24a655bba0b7730a33d4324b53a', '081234567890', 'nophoto.png'),
(2, 'Jerry', 'jerry@gmail.com', '75926e095b28dd773adde5bade93e4836b1d92fc', '989469946', 'nophoto.png'),
(3, 'Henry', 'henry@gmail.com', '55b5a0f748d3a82dce10b205ecb0a0d8916c66a1', '458934875345', 'nophoto.png'),
(4, 'Jason', 'jason@gmail.com', '68c46a606457643eab92053c1c05574abb26f861', '996048600', 'nophoto.png'),
(5, 'Anthony', 'anthony@gmail.com', '6e1a438cfe5a6c9e2165665f8c2258849ccc43f0', '904860389', 'nophoto.png'),
(7, 'Raden', 'raden@gmail.com', 'f47346fbd867762eb9938c2eb43a1efb5a1e3b6a', '08123456789', 'nophoto.png'),
(9, 'Arya', 'arya@gmail.com', '2ad6f04015710f5c25c8c20e2d6c597eb13f3989', '0238459023457', 'nophoto.png'),
(10, 'Asep', 'asep@gmail.com', '549e6da6a3f49abd9369f06d222f1d323e127643', '3408590343453', '628dba1386b52.jpg'),
(11, 'Hai', 'hai@gmail.com', '8d813378c294d9c43ea7cbe34e05c65cfa43b630', '03495803985', '628de32eef9db.jpg'),
(14, 'Ajeng', 'ajeng@gmail.com', '20a1ac6ec1153f8f44bdf2b26f1e25ee7b0fd4c2', '340238324', '628dba3478ecd.jpg'),
(16, 'Surya', 'surya@gmail.com', '895943ec9ee280ea467f015d8c6275bfec671683', '345739458934', 'nophoto.png'),
(17, 'Suryi', 'suryi@gmail.com', '43414f55644946bf82be7e8eccfae1a5f326df40', '345903485', 'nophoto.png'),
(18, 'Kharis', 'kharis@gmail.com', '4f2c5f418c9ee157713077dd95131845c8dc8466', '4875983475', '6294e0fb8dd4a.jpg'),
(19, 'Willy', 'willy@gmail.com', 'aea1a2c63b8dd74905f067679c3f060816839ea4', '4534534539478', 'nophoto.png'),
(22, 'Kharby', 'kharby@gmail.com', '708d5f50b8d4ebf077b8b9b4fe8a100d9567f3c9', '2034702374023', 'nophoto.png'),
(23, 'Raka', 'raka@gmail.com', '86f163583d7b2ff7fd0cdf8444c36dd99fcc60dc', '2394728934723', 'nophoto.png'),
(24, 'Ade', 'ade@gmail.com', 'd7f2e6a4093ffde1b599c934f8ec963badb6be32', '2348972348723', 'nophoto.png'),
(26, 'Arkan', 'arkan@gmail.com', 'b5091aa56523df6316559615f22495c713fd9ce0', '0898767890987', 'nophoto.png'),
(27, 'Hasan', 'hasan@gmail.com', 'b49b0b7881cc25d4aa89a7d0f1193b0648e9244f', '04587394587', 'nophoto.png'),
(28, 'Gilang', 'gilang@gmail.com', 'e239aca6e941135937208eb840dc38108d86be3b', '09876545678', 'nophoto.png'),
(29, 'Sahid', 'sahid@gmail.com', 'f2d87d9b328ecd6b6c9dba093b9543a3134287fe', '234443435454', 'nophoto.png');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `username`, `password`) VALUES
(1, 'superadmin', 'b94e7a7707c2622433574aa55dbea0fbf93a5c1f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD KEY `konsultasi_ibfk_1` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `konsultasi_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
