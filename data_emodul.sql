-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 07:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_emodul`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(3) NOT NULL,
  `id_siswa` int(3) NOT NULL,
  `jawaban_pretest` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nilai_pretest` float NOT NULL DEFAULT 0,
  `jawaban_posttest` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nilai_posttest` float NOT NULL DEFAULT 0,
  `summary` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_siswa`, `jawaban_pretest`, `nilai_pretest`, `jawaban_posttest`, `nilai_posttest`, `summary`) VALUES
(6, 11, '1A2A3A4A5A6A7A8A9AXA11A12A13A14A15B', 40, NULL, 0, 20),
(7, 12, NULL, 0, NULL, 0, 0),
(8, 13, '1C2D3A4A5D6B7A8B9BXC11D12A13B14A15C', 110, '1B2B3B4B5B6B7B8B9BXB11B12B13B14B15B', 60, 85),
(9, 14, NULL, 0, NULL, 0, 0),
(10, 15, NULL, 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` enum('Administrator','Guru') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(101, 'M Rizqi Anugrah', 'mimin', '4297f44b13955235245b2497399d7a93', 'Administrator'),
(122, 'Pengguna 2', 'pengguna2', 'cda313c58b0f9144031ac66212abb154', 'Administrator'),
(123, 'Guru1', 'guru1', '92afb435ceb16630e9827f54330c59c9', 'Guru'),
(124, 'User Ganti Level', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(3) NOT NULL,
  `nama_siswa` varchar(20) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `email` varchar(35) DEFAULT NULL,
  `level` varchar(35) NOT NULL DEFAULT 'Student'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nama_siswa`, `username`, `password`, `jekel`, `kelas`, `email`, `level`) VALUES
(11, 'Siswa 1', 'siswa1', '013f0f67779f3b1686c604db150d12ea', 'Laki-laki', 'Gajah', 'siswa1@mail.com', 'Student'),
(12, 'Siswa 2', 'siswa2', '331633a246a4e1ceefc9539a71fcd124', 'Perempuan', 'Jerapah', 'siswa2@mail.com', 'Student'),
(13, 'Siswa 3', 'siswa3', 'df8e1ec27c47f2b8223d984f87aa571e', 'Laki-laki', 'Gajah', 'siswa3@mail.com', 'Student'),
(14, 'Siswa 4', 'siswa4', 'be92aac38633896eb7b6781816b17c37', 'Perempuan', 'Gajah', 'siswa4@mail.com', 'Student'),
(15, 'Siswa 5', 'siswa5', '829e85a9946f9d4621e7e8f544fefd54', 'Laki-laki', 'Gajah', 'siswa5@mail.com', 'Student');

--
-- Triggers `tb_siswa`
--
DELIMITER $$
CREATE TRIGGER `nilai_after_siswa` AFTER INSERT ON `tb_siswa` FOR EACH ROW INSERT INTO tb_nilai VALUE (NULL, NEW.id_siswa, NULL, 0, NULL, 0, 0)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nilai_from_siswa` (`id_siswa`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `nama_pengguna` (`nama_pengguna`),
  ADD UNIQUE KEY `nama_pengguna_2` (`nama_pengguna`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `nilai_from_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
