-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 04:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `41281_pemweb_modul11`
--
CREATE DATABASE IF NOT EXISTS `41281_pemweb_modul11` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `41281_pemweb_modul11`;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `code`) VALUES
(3, 'G'),
(5, 'NC-17'),
(2, 'PG'),
(1, 'PG-13'),
(4, 'R');

-- --------------------------------------------------------

--
-- Table structure for table `tblmovie`
--

CREATE TABLE `tblmovie` (
  `MovieID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Year` varchar(255) NOT NULL,
  `Director` varchar(255) NOT NULL,
  `PosterLink` varchar(255) NOT NULL,
  `RatingCode` varchar(255) NOT NULL,
  `Deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmovie`
--

INSERT INTO `tblmovie` (`MovieID`, `Title`, `Year`, `Director`, `PosterLink`, `RatingCode`, `Deskripsi`) VALUES
(1, 'The Avengers: Age of Ultron', '2015', 'Joss Whedon', 'avenger-age-of-ultron.jpg', 'R', 'Test Avengers'),
(2, 'Jurrasic World', '2015', 'Sam Mendes', 'jurassic-world.jpg', 'NC-17', 'Test Jurrasic'),
(3, 'SpongeBob SquarePants', '2015', 'Test', 'b11c5-spongebob.png', 'PG-13', 'Test Spongebob');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `tblmovie`
--
ALTER TABLE `tblmovie`
  ADD PRIMARY KEY (`MovieID`),
  ADD KEY `RatingCode` (`RatingCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblmovie`
--
ALTER TABLE `tblmovie`
  MODIFY `MovieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblmovie`
--
ALTER TABLE `tblmovie`
  ADD CONSTRAINT `tblmovie_ibfk_1` FOREIGN KEY (`RatingCode`) REFERENCES `rating` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
