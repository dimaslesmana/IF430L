-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 10:32 AM
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
-- Database: `41281_pemweb_modul10`
--
CREATE DATABASE IF NOT EXISTS `41281_pemweb_modul10` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `41281_pemweb_modul10`;

-- --------------------------------------------------------

--
-- Table structure for table `tblmovie`
--

CREATE TABLE `tblmovie` (
  `MovieID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Year` varchar(255) NOT NULL,
  `Director` varchar(255) NOT NULL,
  `PosterLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmovie`
--

INSERT INTO `tblmovie` (`MovieID`, `Title`, `Year`, `Director`, `PosterLink`) VALUES
(1, 'The Avengers: Age of Ultron', '2015', 'Joss Whedon', 'assets/poster/avenger-age-of-ultron.jpg'),
(7, 'The SpongeBob Movie: Sponge Out of Water', '2015', 'Mike Mitchell', 'assets/poster/81cfa6ab80af754d3a252cc9bf7044fd.png'),
(2, 'Jurrasic World', '2015', 'Sam Mendes', 'assets/poster/jurassic-world.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblmovie`
--
ALTER TABLE `tblmovie`
  ADD PRIMARY KEY (`Director`),
  ADD UNIQUE KEY `MovieID` (`MovieID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblmovie`
--
ALTER TABLE `tblmovie`
  MODIFY `MovieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
