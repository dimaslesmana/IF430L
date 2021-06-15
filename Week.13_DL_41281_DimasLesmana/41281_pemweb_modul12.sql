-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 10:38 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `41281_pemweb_modul12`
--
CREATE DATABASE IF NOT EXISTS `41281_pemweb_modul12` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `41281_pemweb_modul12`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `fname_admin` varchar(255) NOT NULL,
  `lname_admin` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `fname_admin`, `lname_admin`, `email_admin`, `password`, `phone_admin`) VALUES
(1, 'mba', 'dina', 'dina@admin.umn.ac.id', '8d80b28fa63fc17e8a45d9a9d0775736', '085959509754'),
(2, 'Wendy', '', 'wendy@admin.umn.ac.id', 'ad931de51833f907eeee5f708a2e89d0', '08485487542');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `fname_dosen` varchar(255) NOT NULL,
  `lname_dosen` varchar(255) NOT NULL,
  `nomorinduk_dosen` varchar(255) NOT NULL,
  `email_dosen` varchar(255) NOT NULL,
  `foto_dosen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `fname_dosen`, `lname_dosen`, `nomorinduk_dosen`, `email_dosen`, `foto_dosen`) VALUES
(1, 'Johannes', 'Immanuel', 'L00892', 'johannes_imanuel@umn.ac.id', 'assets/images/joim.jpg'),
(2, 'Ryan', 'Pramana', 'L12322', 'ryan.pramana@umn.ac.id', 'assets/images/ryan.jpg'),
(3, 'Agung', 'Chandranata', 'L15119', 'agung@umn.ac.id', 'assets/images/agung.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `fname_mahasiswa` varchar(255) NOT NULL,
  `lname_mahasiswa` varchar(255) NOT NULL,
  `nomorinduk_mahasiswa` varchar(255) NOT NULL,
  `email_mahasiswa` varchar(255) NOT NULL,
  `tugas_mahasiswa` int(11) NOT NULL,
  `uts_mahasiswa` int(11) NOT NULL,
  `uas_mahasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `fname_mahasiswa`, `lname_mahasiswa`, `nomorinduk_mahasiswa`, `email_mahasiswa`, `tugas_mahasiswa`, `uts_mahasiswa`, `uas_mahasiswa`) VALUES
(1, 'Adrian', 'Hartanto', '14110110037', 'adrian.hartanto@gmail.com', 100, 87, 90),
(2, 'Sintya', 'Oktaviani', '14110110021', 'sintya.oktaviani@student.umn.ac.id', 100, 45, 58),
(3, 'Annastasya', 'Indarsin', '14110110024', 'annastasya.indarsin@student.umn.ac.id', 85, 47, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
