-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2017 at 10:45 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `counter_info`
--

CREATE TABLE `counter_info` (
  `id_counter` int(11) NOT NULL,
  `hitung` varchar(255) NOT NULL,
  `tanggal_hit` varchar(255) NOT NULL,
  `id_info` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter_info`
--

INSERT INTO `counter_info` (`id_counter`, `hitung`, `tanggal_hit`, `id_info`) VALUES
(1, '2', '', NULL),
(6, '2', '2017-04-02 11:10:52', NULL),
(11, '2', '2017-07-21 10:14:22', 32);

-- --------------------------------------------------------

--
-- Table structure for table `info_board`
--

CREATE TABLE `info_board` (
  `id_info` int(10) NOT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_board`
--

INSERT INTO `info_board` (`id_info`, `isi`, `tanggal`) VALUES
(1, 'dsfs33', '2017-04-02 03:33:11'),
(24, 'Halo Dunia', '2017-04-05 05:36:51'),
(25, 'Apa Kabarmu!!', '2017-04-05 05:36:51'),
(32, 'relationship is good to all people in the world', '2017-07-21 10:14:22'),
(33, 'magic of the moment can change the wind', '2017-07-21 10:14:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counter_info`
--
ALTER TABLE `counter_info`
  ADD PRIMARY KEY (`id_counter`),
  ADD KEY `FK_IdInfo` (`id_info`);

--
-- Indexes for table `info_board`
--
ALTER TABLE `info_board`
  ADD PRIMARY KEY (`id_info`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counter_info`
--
ALTER TABLE `counter_info`
  MODIFY `id_counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `info_board`
--
ALTER TABLE `info_board`
  MODIFY `id_info` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `counter_info`
--
ALTER TABLE `counter_info`
  ADD CONSTRAINT `FK_IdInfo` FOREIGN KEY (`id_info`) REFERENCES `info_board` (`id_info`) ON DELETE CASCADE,
  ADD CONSTRAINT `counter_info_ibfk_1` FOREIGN KEY (`id_info`) REFERENCES `info_board` (`id_info`),
  ADD CONSTRAINT `counter_info_ibfk_2` FOREIGN KEY (`id_info`) REFERENCES `info_board` (`id_info`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
