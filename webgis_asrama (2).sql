-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 03:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis_asrama`
--

-- --------------------------------------------------------

--
-- Table structure for table `asrama`
--

CREATE TABLE `asrama` (
  `id_asrama` int(11) NOT NULL,
  `nama_asrama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_asrama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `foto_asrama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_asrama` float(9,6) NOT NULL,
  `latt_asrama` float(9,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asrama`
--

INSERT INTO `asrama` (`id_asrama`, `nama_asrama`, `alamat_asrama`, `id_provinsi`, `id_jenis`, `jumlah_kamar`, `harga_sewa`, `deskripsi`, `fasilitas`, `foto_asrama`, `telephone`, `long_asrama`, `latt_asrama`) VALUES
(11, 'Asal', 'ttt', 14, 1, 68, 20000000, '', '', '1738313027_jardin-house-patio-livity_1.jpg', '08999999999', 114.809181, -7.834248),
(12, 'Asrama Yeyeye 2', 'ttt', 52, 1, 68, 20000000, '', '', '1738313903_ciasem-house-studiokas_1.jpg,1738313903_jae-jiwa-jae-kasinda-bungalows-rdma_1.jpg,1738313903_ID_Uluwatu_Ext_001_003_al_HR.jpg,1738313903_Well_of_Light_1.jpg,1738313903_le-kawan-house-w-plus-m-design-studio_1.jpg', '08999999999', 110.386192, -7.826990),
(13, 'Asrama Yeyeye 5', 'aass', 53, 1, 68, 20000000, '', '', '1738314022_ciasem-house-studiokas_1.jpg,1738314022_jae-jiwa-jae-kasinda-bungalows-rdma_1.jpg,1738314022_ID_Uluwatu_Ext_001_003_al_HR.jpg,1738314022_Well_of_Light_1.jpg', '08999999999', 110.382973, -7.826990),
(14, 'Asrama Yeyeye 22', 'dada', 13, 2, 68, 20000000, '', '', '1738314064_le-kawan-house-w-plus-m-design-studio_1.jpg,1738314064_villa-sawah-stilt-studios_9.jpg,1738314064_jardin-house-patio-livity_1.jpg,1738314064_casa-planes-estudio-damero_4.jpg', '08999999999', 114.809181, -7.834248),
(15, 'Asrama Yeyeye 42', 'Test', 11, 2, 69, 20000000, '', '', '1738315071_Well_of_Light_1.jpg,1738315071_le-kawan-house-w-plus-m-design-studio_1.jpg,1738315071_villa-sawah-stilt-studios_9.jpg', '089999999992', 110.382973, -7.826990);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(255) NOT NULL,
  `nama_fasilitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_asrama`
--

CREATE TABLE `fasilitas_asrama` (
  `id_asrama` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_asrama`
--

CREATE TABLE `jenis_asrama` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_asrama`
--

INSERT INTO `jenis_asrama` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Putra'),
(2, 'Putri');

-- --------------------------------------------------------

--
-- Table structure for table `peraturan`
--

CREATE TABLE `peraturan` (
  `id_peraturan` int(60) NOT NULL,
  `peraturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peraturan_asrama`
--

CREATE TABLE `peraturan_asrama` (
  `id_asrama` int(11) NOT NULL,
  `id_peraturan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(12) NOT NULL,
  `nama_provinsi` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DI YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(65, 'KALIMANTAN UTARA'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA BARAT'),
(94, 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `power` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `power`) VALUES
(1, 'admin', '$2y$10$oNX.X8jgLhNclHBeI8ytT.1vODlml8.AN1Ieb.rSIChhCa1e7cS0S', 'Admin'),
(2, 'user', '$2y$10$oNX.X8jgLhNclHBeI8ytT.1vODlml8.AN1Ieb.rSIChhCa1e7cS0S', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asrama`
--
ALTER TABLE `asrama`
  ADD PRIMARY KEY (`id_asrama`),
  ADD KEY `id_provinsi_asrama` (`id_provinsi`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `fasilitas_asrama`
--
ALTER TABLE `fasilitas_asrama`
  ADD PRIMARY KEY (`id_asrama`,`id_fasilitas`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- Indexes for table `jenis_asrama`
--
ALTER TABLE `jenis_asrama`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `peraturan`
--
ALTER TABLE `peraturan`
  ADD PRIMARY KEY (`id_peraturan`);

--
-- Indexes for table `peraturan_asrama`
--
ALTER TABLE `peraturan_asrama`
  ADD PRIMARY KEY (`id_asrama`,`id_peraturan`),
  ADD KEY `id_peraturan` (`id_peraturan`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD KEY `provinces_id_index` (`id_provinsi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asrama`
--
ALTER TABLE `asrama`
  MODIFY `id_asrama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_asrama`
--
ALTER TABLE `jenis_asrama`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peraturan`
--
ALTER TABLE `peraturan`
  MODIFY `id_peraturan` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas_asrama`
--
ALTER TABLE `fasilitas_asrama`
  ADD CONSTRAINT `fasilitas_asrama_ibfk_1` FOREIGN KEY (`id_asrama`) REFERENCES `asrama` (`id_asrama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fasilitas_asrama_ibfk_2` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peraturan_asrama`
--
ALTER TABLE `peraturan_asrama`
  ADD CONSTRAINT `peraturan_asrama_ibfk_1` FOREIGN KEY (`id_asrama`) REFERENCES `asrama` (`id_asrama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peraturan_asrama_ibfk_2` FOREIGN KEY (`id_peraturan`) REFERENCES `peraturan` (`id_peraturan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
