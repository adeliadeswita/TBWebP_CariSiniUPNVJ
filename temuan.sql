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
('CS2400001', 'Power Bank', 'Power Bank_Pink_Baseus Magnetic Bracket Wireless Fast Charge_10000mAh_BI Corner_Tersimpan di Rak 1 TU FEB', '2024-02-14', 'BI Corner FEB', 0x6361726973696e69312e6a7067, 'Ruang Tata Usaha FEB', 'Joko Pradipta', 'Belum Terverifikasi'),
('CS2400002', 'Jepit Rambut', 'Jepit Rambut_Cokelat Trasparan_Ruang Podcast FH Lt.4_Tersimpan di  Rak 4 TU FH', '2024-03-18', 'Ruang Podcast FH Lantai 4', 0x6361726973696e69322e6a7067, 'Ruang Tata Usaha FH', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400003', 'Tas Lipat', 'Tas Lipat_Merah Motif Hitam Putih_FIKLAB-302_Tersimpan di Rak 3 FIK', '2024-02-21', 'FIKLAB-302', 0x6361726973696e69332e6a7067, 'Ruang Tata Usaha FIK', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400004', 'Portable Mini Fan', 'Portable Mini Fan_Kipas Angin_Hitam_Ruang Kelas Lt.3_Tersimpan di Rak 3 TU FT', '2024-03-25', 'Ruang Kelas FT Lt.3', 0x6361726973696e69342e6a7067, 'Ruang Tata Usaha FT', 'Bayu Prakoso', 'Belum Terverifikasi'),
('CS2400005', 'Parfume', 'Eau de Parfum_Body Mist_Evangeline_Black Vanilla_FIK-202_Tersimpan di Rak 2 FIK', '2024-02-26', 'FIK-202', 0x6361726973696e69352e6a7067, 'Ruang Tata Usaha FIK', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400006', 'Kacamata', 'Kacamata_Cokelat Hitam Leopard_Ruang Baca FISIP_Tersimpan di Rak 1 TU FISIP', '2024-02-27', 'Ruang Baca FISIP', 0x6361726973696e69362e6a7067, 'Ruang Tata Usaha FISIP', 'Rian Saputra', 'Belum Terverifikasi'),
('CS2400007', 'Aromatheraphy', 'Aromatherapy_Plossa_Aroma Citrus_Lab. Parasitologi_Tersimpan di Rak 4 TU FK', '2024-03-01', 'Laboratorium Parasitologi', 0x6361726973696e69372e6a7067, 'Ruang Tata Usaha FK', 'Yoga Wirawan', 'Belum Terverifikasi'),
('CS2400008', 'Jepit Rambut', 'Jepit Rambut_Gold/Emas Metal_Lab. Patologi Klinik_Tersimpan di Rak 2 TU FK', '2024-03-03', 'Laboratorium Patologi Klinik', 0x6361726973696e69382e6a7067, 'Ruang Tata Usaha FK', 'Yoga Wirawan', 'Belum Terverifikasi'),
('CS2400009', 'Sisir Rambut', 'Sisir Rambut_Wet Brush_Pink/Merah Muda Hitam_Lab. Olahraga Gymnasium_Tersimpan di Rak 1 FIKES', '2024-03-07', 'Laboratorium Olahraga Gymnasium', 0x6361726973696e69392e6a7067, 'Ruang Tata Usaha FIKES', 'Dimas Pratama', 'Belum Terverifikasi'),
('CS2400010', 'Dompet', 'Dompet_Kulit_Hitam_Auditorium FT_Tersimpan di Rak 6 FT', '2024-03-11', 'Auditorium Fakultas Teknik', 0x6361726973696e6931302e6a7067, 'Ruang Tata Usaha FT', 'Bayu Prakoso', 'Belum Terverifikasi'),
('CS2400011', 'Kacamata', 'Kacamata_Abu Transparan_Ruang Peradilan Semu_Tersimpan di Rak 3 TU FH', '2024-03-12', 'Ruang Peradilan Semu, Lantai 3 Gedung Yos Sudarso', 0x6361726973696e6931312e6a7067, 'Ruang Tata Usaha FH', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400012', 'Bluetooth Speaker', 'Bluetooth Speaker_Advance_Merah Putih Hitam_Lab. Multimedia_Tersimpan di Rak 2 FISIP', '2024-03-21', 'Labratorium Multimedia FISIP', 0x6361726973696e6931322e6a7067, 'Ruang Tata Usaha FISIP', 'Rian Saputra', 'Belum Terverifikasi'),
('CS2400013', 'Bluetooth Headset', 'Bluetooth Headset_Lenovo_Putih/Creme_Selasar FEB_Tersimpan di Rak 1 FEB', '2024-03-29', 'Selasar FEB', 0x6361726973696e6931332e6a7067, 'Ruang Tata Usaha FEB', 'Joko Pradipta', 'Belum Terverifikasi'),
('CS2400014', 'Cat Akrilik', 'Cat Akrilik_Joyko_12 Warna_Ruang Bhineka Tunggal Ika_Tersimpan di Rak 7 TU FK', '2024-04-02', 'Ruang Bhineka Tunggal Ika FK', 0x6361726973696e6931342e6a7067, 'Ruang Tata Usaha FK', 'Yoga Wirawan', 'Belum Terverifikasi'),
('CS2400015', 'Pouch', 'Pouch_Abu Tua_Motif Garis Love_Lab. Biomedik_Tersimpan di Rak 4 TU FIKES', '2024-04-05', 'Laboratorium Biomedik', 0x6361726973696e6931352e6a7067, 'Ruang Tata Usaha FIKES', 'Dimas Pratama', 'Belum Terverifikasi'),
('CS2400016', 'Botol Minum', 'Botol Minum_Tupperware_Merah Tutup Abu_Selasar FIK_Tersimpan di Rak 1 TU FK', '2024-04-10', 'Selasar FIK', 0x6361726973696e6931362e6a7067, 'Ruang Tata Usaha FIK', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400017', 'Pulpen', 'Pena_Frixion_Pink/MerahMuda_Navy/BiruDongker_Ruang Baca_Tersimpan di Rak 2 TU FISIP', '2024-05-09', 'Ruang Baca FISIP', 0x6361726973696e6931372e6a7067, 'Ruang Tata Usaha FISIP', 'Rian Saputra', 'Belum Terverifikasi'),
('CS2400018', 'Charger', 'Charger_USB_USAMS_Putih_Ruang Rapat Magister_Tersimpan di Rak 1 TU FH', '2024-05-09', 'Ruang Rapat Magister', 0x6361726973696e6931382e6a7067, 'Ruang Tata Usaha FH', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400019', 'Buku', 'Buku_Ini Buku Strategi_Kobi Education_Aula BEJ_Tersimpan di Rak 1 TU FEB', '2024-05-13', 'Aula BEJ FEB', 0x6361726973696e6931392e6a7067, 'Ruang Tata Usaha FEB', 'Yoga Wirawan', 'Belum Terverifikasi'),
('CS2400020', 'Mukenah', 'Mukenah_Ungu Tua_Masjid Manbaul Ulum_Tersimpan di Rak 4 TU FIK', '2024-05-15', 'Masjid Manbaul Ulum', 0x6361726973696e6932302e6a7067, 'Ruang Tata Usaha FIK', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400021', 'Alat Tulis', 'Tempat Pensil_Dual Brushpens_Tombow ABT_Lab. Epidemiologi_Tersimpan di Rak 4 FIKES', '2024-05-17', 'Laboratorium Epidemiologi', 0x6361726973696e6932312e6a7067, 'Ruang Tata Usaha FIKES', 'Dimas Pratama', 'Belum Terverifikasi'),
('CS2400022', 'Bluetooth Earphone', 'Bluetooth Earphone_Airpods_Putih_Ruang Lab CNC_Tersimpan di Rak 4 FT', '2024-05-20', 'Ruang Lab CNC', 0x6361726973696e6932322e6a7067, 'Ruang Tata Usaha FT', 'Bayu Prakoso', 'Belum Terverifikasi'),
('CS2400023', 'Binder File', 'Binder File_Campus B5_Pink Transparan_Selasar FEB_Tersimpan di Rak 3 TU FEB', '2024-05-22', 'Selasar FEB', 0x6361726973696e6932332e6a7067, 'Ruang Tata Usaha FEB', 'Joko Pradipta', 'Belum Terverifikasi'),
('CS2400024', 'Alat Tulis', 'Tempat Pensil_Spidol Warna_Montague_Pink_Ruang BEM FK UPNVJ_Tersimpan di Rak 4 FK', '2024-05-24', 'Ruang BEM Fakultas Kedokteran UPN Veteran Jakarta', 0x6361726973696e6932342e6a7067, 'Ruang Tata Usaha FK', 'Yoga Wirawan', 'Belum Terverifikasi'),
('CS2400025', 'Uang', 'Uang_Rp.100.000,00_Ruang Kelas Magister_Tersimpan di Rak 1 FH', '2024-05-27', 'Ruang Kelas Magister, Lantai 1 Gedung RA Kartini', 0x6361726973696e6932352e6a7067, 'Ruang Tata Usaha FH', 'Andi Wicaksana', 'Belum Terverifikasi'),
('CS2400026', 'Charger', 'Charger_USB_Oppo_Putih_Auditorium FT_Tersimpan di Rak 5 TU FT', '2024-05-30', 'Auditorium Fakultas Teknik UPNVJ', 0x6361726973696e6932362e6a7067, 'Ruang Tata Usaha FT', 'Bayu Prakoso', 'Belum Terverifikasi'),
('CS2400027', 'Lip Balm', 'Lip Balm_Innisfree_Pink Muda_Gedung Moh. Yamin Lt.2_Tersimpan di Rak 1 TU FISIP', '2024-05-31', 'Gedung Moh. Yamin Lantai 2', 0x6361726973696e6932372e6a7067, 'Ruang Tata Usaha FISIP', 'Rian Saputra', 'Belum Terverifikasi'),
('CS2400028', 'Uang', 'Uang_Rp.50.000,00_Koridor Gedung Ki Hadjar Dewantara Lt.4_Tersimpan di Rak 4 FIK', '2024-06-04', 'Koridor Gedung Ki Hadjar Dewantara Lantai 4', 0x6361726973696e6932382e6a7067, 'Ruang Tata Usaha FIK', 'Budi Santoso', 'Belum Terverifikasi'),
('CS2400029', 'Lip Gloss', 'Lip Gloss_Mother of Pearl_Ungu_Bank Mini FEB_Tersimpan di Rak 2 TU FEB', '2024-06-06', 'Bank Mini FEB', 0x6361726973696e6932392e6a7067, 'Ruang Tata Usaha FEB', 'Joko Pradipta', 'Belum Terverifikasi'),
('CS2400030', 'Parfume', 'Eau de Parfum_Shimmer Body Mist_The Body Shop_Love&amp;Plums_Ruang Baca FIKES_Tersimpan di Rak 2 FIKES', '2024-06-11', 'Ruang Baca FIKES', 0x6361726973696e6933302e6a7067, 'Ruang Tata Usaha FIKES', 'Dimas Pratama', 'Belum Terverifikasi');

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
