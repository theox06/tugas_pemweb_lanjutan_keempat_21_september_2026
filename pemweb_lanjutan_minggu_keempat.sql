-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2026 at 04:22 AM
-- Server version: 8.4.10
-- PHP Version: 8.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemweb_lanjutan_minggu_keempat`
--

-- --------------------------------------------------------

--
-- Table structure for table `band_member`
--

CREATE TABLE `band_member` (
  `nama` varchar(80) DEFAULT NULL,
  `umur` int DEFAULT NULL,
  `role` enum('Singer','Pianist/Keyboardist','Guitarist','Bassist','Drummer') DEFAULT NULL,
  `status_registrasi` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `berita_pengumuman`
--

CREATE TABLE `berita_pengumuman` (
  `id` int NOT NULL,
  `jenis_berita` enum('berita','pengumuman') NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `headline` varchar(80) NOT NULL,
  `konten` varchar(255) NOT NULL,
  `penulis` varchar(15) NOT NULL,
  `waktu_publikasi` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita_pengumuman`
--

INSERT INTO `berita_pengumuman` (`id`, `jenis_berita`, `thumbnail`, `headline`, `konten`, `penulis`, `waktu_publikasi`) VALUES
(1, 'berita', 'photos/5dac56d8cc223b99258d403e420b0950.png', 'Lorem Ipsum ', 'Lorem Ipsum Dolor Sit Amet', 'Admin', '2026-10-27 06:46:07'),
(2, 'berita', 'photos/ac5b8912489cdfc912c4b99b1c2444de.png', 'Pembangunan Kantor Pusat di Bogor', 'Dalam waktu dekat ini, Cemara Band akan mendirikan kantor pusat di Bogor. Hal ini disampaikan oleh', 'Admin', '2026-10-27 16:46:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita_pengumuman`
--
ALTER TABLE `berita_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita_pengumuman`
--
ALTER TABLE `berita_pengumuman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
