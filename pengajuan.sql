-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 08:35 PM
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
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `kd_ajuan` varchar(9) NOT NULL,
  `nm_lengkap` varchar(150) NOT NULL,
  `username` varchar(20) NOT NULL,
  `ktp_ktm` blob NOT NULL,
  `kd_brg` varchar(9) NOT NULL,
  `nm_brg_ajuan` varchar(150) NOT NULL,
  `tgl_hilang` date NOT NULL,
  `spek_brg_ajuan` varchar(250) NOT NULL,
  `kron_hilang` varchar(500) NOT NULL,
  `status` varchar(50) DEFAULT 'Belum Terverifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`kd_ajuan`, `nm_lengkap`, `username`, `ktp_ktm`, `kd_brg`, `nm_brg_ajuan`, `tgl_hilang`, `spek_brg_ajuan`, `kron_hilang`, `status`) VALUES
('PJ2400001', 'Adelia Deswita', '2210512076', 0x6b74705f77616e6974612e706e67, 'CS2400006', 'Kacamata', '2024-02-18', 'Kacamata Leopard Warna Cokelat Hitam', 'Terakhir ingat ketinggalan di Ruang Baca FISIP', 'Terverifikasi'),
('PJ2400002', 'Zhafirah Aqilah Izzaturrahman', '2210512080', 0x6b74705f77616e6974612e706e67, 'CS2400001', 'Power Bank', '2024-02-11', 'Power Bank Baseus Warna Pink 10000mAh', 'Terakhir Ingat Dipakai di BI Corner FEB', 'Terverifikasi'),
('PJ2400003', 'Zara Zyasky Zalsabilla ', '2210512058', 0x6b74705f77616e6974612e706e67, 'CS2400020', 'Mukenah', '2024-04-24', 'Mukenah Warna Ungu Tua Di Dalam Tas Kecil', 'Sepertinya Tertinggal di Masjid Manbaul Ulum Setelah Habis Solat', 'Selesai'),
('PJ2400004', 'Kevin Yosia', '2210512078', 0x6b74705f6c616b696c616b692e706e67, 'CS2400010', 'Dompet', '2024-02-27', 'Dompet Kulit Warna Hitam', 'Tertinggal di Auditorium Fakultas Teknik', 'Tertolak'),
('PJ2400005', 'Giann Nagara Sinaga', '2210512082', 0x6b74705f6c616b696c616b692e706e67, 'CS2400018', 'Charger', '2024-03-19', 'Charger Merk USAMS Warna Putih', 'Tertinggal di Ruang Rapat Magister', 'Belum Terverifikasi'),
('PJ2400006', 'Muhammad Panji Muslim', '199308312022031007', 0x6b74705f6c616b696c616b692e706e67, 'CS2400016', 'Botol Minum', '2024-03-16', 'Botol Minum Tupperware Warna Merah', 'Terakhir Ingat Membawa di Ruang Baca FISIP	', 'Belum Terverifikasi');

--
-- Triggers `pengajuan`
--
DELIMITER $$
CREATE TRIGGER `after_pengajuan_update` AFTER UPDATE ON `pengajuan` FOR EACH ROW BEGIN
    IF NEW.status <> OLD.status THEN
        UPDATE temuan SET status = NEW.status WHERE kd_brg = NEW.kd_brg;
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`kd_ajuan`),
  ADD KEY `kd_brg` (`kd_brg`),
  ADD KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`kd_brg`) REFERENCES `temuan` (`kd_brg`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
