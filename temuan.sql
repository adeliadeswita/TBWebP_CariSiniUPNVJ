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
-- Table structure for table `temuan`
--

CREATE TABLE `temuan` (
  `kd_brg` varchar(9) NOT NULL,
  `nm_brg` varchar(150) NOT NULL,
  `spek_brg` varchar(250) NOT NULL,
  `tgl_temu` date NOT NULL,
  `lok_temu` varchar(100) NOT NULL,
  `foto_brg` blob NOT NULL,
  `lok_aman` varchar(100) NOT NULL,
  `petugas` varchar(150) NOT NULL,
  `status` varchar(50) DEFAULT 'Belum Terverifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temuan`
--

INSERT INTO `temuan` (`kd_brg`, `nm_brg`, `spek_brg`, `tgl_temu`, `lok_temu`, `foto_brg`, `lok_aman`, `petugas`, `status`) VALUES
('CS2400001', 'Power Bank', 'Power Bank_Pink_Baseus Magnetic Bracket Wireless Fast Charge_10000mAh_BI Corner_Tersimpan di Rak 1 TU FEB', '2024-02-13', 'BI Corner FEB', 0x6361726973696e69312e6a7067, 'Ruang Tata Usaha FEB', 'Andi Wicaksana', 'Terverifikasi'),
('CS2400002', 'Jepit Rambut', 'Jepit Rambut_Cokelat Trasparan_Ruang Podcast FH Lt.4_Tersimpan di  Rak 4 TU FH', '2024-02-15', 'Ruang Podcast Lantai 4 FH', 0x6361726973696e69322e6a7067, 'Ruang Tata Usaha FH', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400003', 'Tas Lipat', 'Tas Lipat_Merah Motif Hitam Putih_FIKLAB-302_Tersimpan di Rak 3 FIK', '2024-02-16', 'FIKLAB-302', 0x6361726973696e69332e6a7067, 'Ruang Tata Usaha FIK', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400004', 'Portable Mini Fan', 'Portable Mini Fan_Kipas Angin_Hitam_Ruang Kelas Lt.3_Tersimpan di Rak 3 TU FT', '2024-06-18', 'Ruang Kelas Lt.3', 0x6361726973696e69342e6a7067, 'Ruang Tata Usaha FT', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400005', 'Parfume', 'Eau de Parfum_Body Mist_Evangeline_Black Vanilla_FIK-202_Tersimpan di Rak 2 FIK', '2024-02-19', 'FIK-202', 0x6361726973696e69352e6a7067, 'Ruang Tata Usaha FIK', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400006', 'Kacamata', 'Kacamata_Cokelat Hitam Leopard_Ruang Baca FISIP_Tersimpan di Rak 1 TU FISIP', '2024-02-21', 'Ruang Baca FISIP', 0x6361726973696e69362e6a7067, 'Ruang Tata Usaha FISIP', 'Andi Wicaksana', 'Terverifikasi'),
('CS2400007', 'Aromatheraphy', 'Aromatherapy_Plossa_Aroma Citrus_FIKLAB-301_Tersimpan di Rak 3 TU FIK', '2024-02-23', 'FIKLAB-301', 0x6361726973696e69372e6a7067, 'Ruang Tata Usaha FIK', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400008', 'Jepit Rambut', 'Jepit Rambut_Gold/Emas Metal_Lab. Hidrotherapy_Tersimpan di Rak 2 TU FIKES', '2024-02-27', 'Laboratorium Hidrotherapy', 0x6361726973696e69382e6a7067, 'Ruang Tata Usaha FIKES', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400009', 'Sisir Rambut', 'Sisir Rambut_Wet Brush_Pink/Merah Muda Hitam_Lab. Olahraga Gymnasium_Tersimpan di Rak 1 FIKES', '2024-02-27', 'Laboratorium Olahraga Gymnasium', 0x6361726973696e69392e6a7067, 'Ruang Tata Usaha FIKES', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400010', 'Dompet', 'Dompet_Kulit_Hitam_Auditorium FT_Tersimpan di Rak 6 FT', '2024-02-29', 'Auditorium Fakultas Teknik', 0x6361726973696e6931302e6a7067, 'Ruang Tata Usaha FT', 'Andi Wicaksana', 'Tertolak'),
('CS2400011', 'Kacamata', 'Kacamata_Abu Transparan_Selasar_Tersimpan di Rak 1 TU FIK', '2024-03-01', 'Selasar FIK', 0x6361726973696e6931312e6a7067, 'Ruang Tata Usaha FIK', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400012', 'Bluetooth Speaker', 'Bluetooth Speaker_Advance_Merah Putih Hitam_Aula BEJ FEB_Tersimpan di Rak 2 FEB', '2024-03-02', 'Aula BEJ FEB', 0x6361726973696e6931322e6a7067, 'Ruang Tata Usaha FEB', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400013', 'Bluetooth Headset', 'Bluetooth Headset_Lenovo_Putih/Creme_Selasar FEB_Tersimpan di Rak 1 FEB', '2024-03-05', 'Selasar FEB', 0x6361726973696e6931332e6a7067, 'Ruang Tata Usaha FEB', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400014', 'Cat Akrilik', 'Cat Akrilik_Joyko_12 Warna_Ruang Bhineka Tunggal Ika_Tersimpan di Rak 7 TU FK', '2024-03-12', 'Ruang Bhineka Tunggal Ika FK', 0x6361726973696e6931342e6a7067, 'Ruang Tata Usaha FK', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400015', 'Pouch', 'Pouch_Abu Tua_Motif Garis Love_FIK-201_Tersimpan di Rak 2 TU FIK', '2024-03-13', 'FIK-201', 0x6361726973696e6931352e6a7067, 'Ruang Tata Usaha FIK', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400016', 'Botol Minum', 'Botol Minum_Tupperware_Merah Tutup Abu_Ruang Baca FISIP_Tersimpan di Rak 1 TU FISIP', '2024-03-18', 'Ruang Baca FISIP', 0x6361726973696e6931362e6a7067, 'Ruang Tata Usaha FISIP', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400017', 'Pulpen', 'Pena_Frixion_Pink/MerahMuda_Navy/BiruDongker_Ruang Koridor_Tersimpan di Rak 2 TU FIKES', '2024-03-20', 'Ruang Koridor Lab. Fisioterapi FIKES', 0x6361726973696e6931372e6a7067, 'Ruang Tata Usaha FIKES', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400018', 'Charger', 'Charger_USB_USAMS_Putih_Ruang Rapat Magister_Tersimpan di Rak 1 TU FH', '2024-03-22', 'Ruang Rapat Magister', 0x6361726973696e6931382e6a7067, 'Ruang Tata Usaha FH', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400019', 'Buku', 'Buku_Ini Buku Strategi_Kobi Education_Smile Garden_Tersimpan di Rak 1 TU FIK', '2024-03-24', 'Smile Garden FIK', 0x6361726973696e6931392e6a7067, 'Ruang Tata Usaha FIK', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400020', 'Mukenah', 'Mukenah_Ungu Tua_Masjid Manbaul Ulum_Tersimpan di Rak 4 TU FIK', '2024-04-26', 'Masjid Manbaul Ulum', 0x6361726973696e6932302e6a7067, 'Ruang Tata Usaha FIK', 'Andi Wicaksana', 'Selesai'),
('CS2400021', 'Alat Tulis', 'Tempat Pensil_Dual Brushpens_Tombow ABT_Gedung Dr. Cipto Mangun Kusumo-403_Tersimpan di Rak 4 FK', '2024-03-29', 'Gedung Dr. Cipto Mangun Kusumo-403', 0x6361726973696e6932312e6a7067, 'Ruang Tata Usaha FK', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400022', 'Bluetooth Earphone', 'Bluetooth Earphone_Airpods_Putih_Selasar FEB_Tersimpan di Rak 1 FEB', '2024-03-31', 'Selasar FEB', 0x6361726973696e6932322e6a7067, 'Ruang Tata Usaha FEB', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400023', 'Binder File', 'Binder File_Campus B5_Pink Transparan_FIK-303_Tersimpan di Rak 3 TU FIK', '2024-04-02', 'FIK-303', 0x6361726973696e6932332e6a7067, 'Ruang Tata Usaha FIK', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400024', 'Alat Tulis', 'Tempat Pensil_Spidol Warna_Montague_Pink_Laboratorium Promosi Kesehatan_Tersimpan di Rak 4 FIKES', '2024-04-05', 'Laboratorium Promosi Kesehatan', 0x6361726973696e6932342e6a7067, 'Ruang Tata Usaha FIKES', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400025', 'Uang', 'Uang_Rp.100.000,00_Lantai 1 Gedung RA Kartini_Tersimpan di Rak 1 FH', '2024-04-17', 'Lantai 1 Gedung RA Kartini FH', 0x6361726973696e6932352e6a7067, 'Ruang Tata Usaha FH', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400026', 'Charger', 'Charger_USB_Oppo_Putih_Lab. Multimedia_Tersimpan di Rak 5 TU FISIP', '2024-05-02', 'Labratorium Multimedia FISIP', 0x6361726973696e6932362e6a7067, 'Ruang Tata Usaha FISIP', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400027', 'Lip Balm', 'Lip Balm_Innisfree_Pink Muda_Gedung Moh. Yamin Lt.2_Tersimpan di Rak 1 TU FISIP', '2024-05-14', 'Gedung Moh. Yamin Lantai 2', 0x6361726973696e6932372e6a7067, 'Ruang Tata Usaha FISIP', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400028', 'Uang', 'Uang_Rp.50.000,00_Koridor Gedung Ki Hadjar Dewantara Lt.4_Tersimpan di Rak 4 FIK', '2024-05-22', 'Koridor Gedung Ki Hadjar Dewantara Lantai 4', 0x6361726973696e6932382e6a7067, 'Ruang Tata Usaha FIK', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400029', 'Lip Gloss', 'Lip Gloss_Mother of Pearl_Ungu_Bank Mini FEB_Tersimpan di Rak 2 TU FEB', '2024-06-05', 'Bank Mini FEB', 0x6361726973696e6932392e6a7067, 'Ruang Tata Usaha FEB', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400030', 'Parfume', 'Eau de Parfum_Shimmer Body Mist_The Body Shop_Love&amp;Plums_Ruang Baca FIKES_Tersimpan di Rak 2 FIKES', '2024-06-12', 'Ruang Baca FIKES', 0x6361726973696e6933302e6a7067, 'Ruang Tata Usaha FIKES', 'Budi Santoso', 'Belum Terverifikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `temuan`
--
ALTER TABLE `temuan`
  ADD PRIMARY KEY (`kd_brg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
