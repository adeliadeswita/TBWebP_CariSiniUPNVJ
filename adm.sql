-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 05:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_carisini`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `nm_admin` varchar(150) CHARACTER SET utf8 NOT NULL,
  `id_admin` varchar(20) CHARACTER SET utf8 NOT NULL,
  `pass_admin` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`nm_admin`, `id_admin`, `pass_admin`) VALUES
('Budi Santoso', '123456789012345678', 'adm1'),
('Andi Wicaksana', '123456789012345679', 'adm2'),
('Dimas Pratama', '123456789012345680', 'adm3'),
('Joko Pradipta', '123456789012345681', 'adm4'),
('Yoga Wirawan', '123456789012345682', 'adm5'),
('Bayu Prakoso', '123456789012345683', 'adm6'),
('Rian Saputra', '123456789012345684', 'adm7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
