-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 05:07 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_lulu`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `update_at`) VALUES
(7, 'Lulu Erga Anjaswari', 'luluea@upnvj.ac.id', 'Hijab.png', '$2y$10$0BgUwgnWurtCmgatrh5xEu4ZLKaP2VqfqGf3CM3zElC6WUZsouw4e', 1, 1, '2021-05-03 01:48:46', '2021-06-25 17:26:41'),
(8, 'Muhammad Yahya Izzudin', 'muhammad.izzudin@mhs.unsoed.ac.id', 'dokter1.jpg', '$2y$10$zR2wd.IiiyPkzTDfJoFwN.ZJgs/eZn49sq4a.VGb5gZFSIUjSqgKG', 2, 1, '2021-05-05 06:36:31', '2021-06-21 02:36:48'),
(19, 'Camat', 'ergalulu@gmail.com', 'default.jpg', '$2y$10$B2lp9bwRR4kby4fdXP.IGumUIPBVzU25lIaLZ3lQmLi2212oUJ5Ju', 2, 1, '2021-06-15 11:36:49', '2021-06-21 02:37:09'),
(21, 'Member', 'erglulu10@gmail.com', 'default.jpg', '$2y$10$1laF.nGWbJX5nS0W2KkncO31t4vTrk2aoFhiQ5AUrzhLgxQZAhBwe', 2, 0, '2021-05-03 03:34:32', '2021-06-21 02:35:32'),
(25, 'test', 'test@gmail.com', 'default.jpg', '$2y$10$RHzr/nRbN.RI09.X1SpL7eDqr4qoHFh9e1fXfB1/MnGlSwvYy7vcO', 2, 1, '0000-00-00 00:00:00', '2021-06-27 15:44:00'),
(27, 'Dummy Data', 'dummy@gmail.com', 'default.jpg', '$2y$10$cicuGmfZC4Ql3G6rUIs4ielUE98sNIU1ciIKPOXIVaGG1fPYcZSCK', 2, 0, '0000-00-00 00:00:00', '2021-07-01 00:09:44'),
(28, 'Coba', 'akun@gmail.com', 'default.jpg', '$2y$10$bp6HSxh2AFNed1M1y1g/UONwS.0B7XpnNREOx2/sFH3rthYFo6K3q', 2, 1, '0000-00-00 00:00:00', '2021-07-01 00:14:27'),
(29, 'Vannesa', 'vannesa@gmail.com', 'default.jpg', '$2y$10$N6zxUjPur74QyDziix2BlOJ6H3.hjRUTlqmQ6voENX7UTtH7sTVUa', 2, 1, '0000-00-00 00:00:00', '2021-07-01 00:14:48'),
(30, 'Staff', 'staff@gmail.com', 'default.jpg', '$2y$10$pb8egkQuG2ExwDe9YgLsV.jvAcBSPVgUG/SEdDCH6twZPya9OkYES', 2, 1, '0000-00-00 00:00:00', '2021-07-01 00:15:17'),
(31, 'Super Admin', 'admin@gmail.com', 'default.jpg', '$2y$10$g54AoVHXDvO/Q4lRG8SBru2.1yNNjC0pJPO7mVLoq1TevCZcXAV6e', 1, 1, '0000-00-00 00:00:00', '2021-07-01 00:16:10'),
(32, 'Sekretaris', 'sekre@gmail.com', 'default.jpg', '$2y$10$Yb3O7pfdLki15B8Kzzs4jOVjRtfF7uTC1SXPKRUO0iSufVONClfUu', 2, 1, '0000-00-00 00:00:00', '2021-07-01 00:16:43'),
(33, 'akun user', 'user@gmail.com', 'default.jpg', '$2y$10$uQHhKn.GCUzfcdDYBc7Xpe4xCnv2iDYUYM57osbn6oAvNlFDdNTeq', 2, 1, '0000-00-00 00:00:00', '2021-07-05 00:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `master_pertanyaan`
--

CREATE TABLE `master_pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `uraian` text DEFAULT NULL,
  `pilihan1` varchar(255) DEFAULT NULL,
  `pilihan2` varchar(255) DEFAULT NULL,
  `pilihan3` varchar(255) DEFAULT NULL,
  `pilihan4` varchar(255) DEFAULT NULL,
  `tgl_entri` date DEFAULT NULL,
  `wkt_entri` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_pertanyaan`
--

INSERT INTO `master_pertanyaan` (`id_pertanyaan`, `uraian`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `tgl_entri`, `wkt_entri`) VALUES
(1, 'Bagaimana pendapat saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?', 'Tidak sesuai', 'Kurang sesuai', 'Sesuai', 'Sangat Mudah', NULL, NULL),
(2, 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini?', 'Sulit', 'Kurang mudah', 'Mudah', 'Sangat mudah', NULL, NULL),
(3, 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan?', 'Lambat', 'Lumayan lambat', 'Cepat', 'Sangat cepat', NULL, NULL),
(4, 'Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan?', 'Tidak wajar', 'Kurang wajar', 'Wajar', 'Sangat wajar', NULL, NULL),
(5, 'Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?', 'Tidak sesuai', 'Kurang sesuai', 'Sesuai', 'Sangat sesuai', NULL, NULL),
(6, 'Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan?', 'Tidak mampu', 'Kurang Mampu', 'Mampu', 'Sangat Mampu', NULL, NULL),
(7, 'Bagaimana pendapat saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan?', 'Tidak sopan dan ramah', 'Kurang sopan dan ramah', 'Sopan dan ramah', 'Sangat sopan dan ramah', NULL, NULL),
(8, 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana?', 'Tidak berkualitas', 'Kurang berkualitas', 'Berkualitas', 'Sangat berkualitas', NULL, NULL),
(9, 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan?', 'Tidak memuaskan', 'Kurang memuaskan', 'Memuaskan', 'Sangat memuaskan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skm_biodata`
--

CREATE TABLE `skm_biodata` (
  `id_skm_biodata` int(11) NOT NULL,
  `semester` int(1) NOT NULL,
  `no_responden` int(11) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `umur` int(11) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `pendidikan` varchar(128) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `pelayanan` varchar(128) NOT NULL,
  `tgl_entri` date NOT NULL,
  `wkt_entri` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skm_biodata`
--

INSERT INTO `skm_biodata` (`id_skm_biodata`, `semester`, `no_responden`, `NIK`, `umur`, `jenis_kelamin`, `pendidikan`, `pekerjaan`, `alamat`, `pelayanan`, `tgl_entri`, `wkt_entri`) VALUES
(9, 1, 5, '1872011234567890', 23, 'Laki-laki', 'D1, D3, D4', 'Pegawai Swasta', 'Metro', 'Surat Keterangan Tidak Mampu (SKTM)', '2021-06-13', '03:16:33'),
(10, 1, 6, '1872012345678901', 45, 'Perempuan', 'S2 Ke Atas', 'Wirausaha/Usaha', 'Yosomulyo', 'Izin Membuat Bangunan (IMB)', '2021-05-29', '03:39:34'),
(11, 1, 7, '1872013456789012', 34, 'Perempuan', 'SLTA', 'Buruh', 'Hadimulyo Timur', 'Surat Keterangan Tidak Mampu (SKTM)', '2021-05-31', '03:13:35'),
(17, 1, 8, '1872015678901234', 55, 'Perempuan', 'S2 Ke Atas', 'PNS/TNI/POLRI', 'Hadimulyo Timur', 'Kartu Keluarga(KK)', '2021-05-01', '07:55:12'),
(18, 1, 9, '1872015678901230', 35, 'Perempuan', 'S2 Ke Atas', 'Pegawai Swasta', 'Metro', 'Kartu Tanda Penduduk(KTP)', '2021-06-16', '07:56:13'),
(19, 1, 10, '1872011601970002', 33, 'Perempuan', 'SLTP', 'Wirausaha/Usaha', 'Hadimulyo Barat', 'Kartu Keluarga(KK)', '2020-06-18', '11:08:43'),
(20, 2, 11, '1872011601970002', 44, 'Laki-laki', 'S2 Ke Atas', 'Wirausaha/Usaha', 'Yosomulyo', 'Kartu Tanda Penduduk(KTP)', '2020-07-24', '11:08:44'),
(21, 2, 12, '1872015004990007', 21, 'Laki-laki', 'D1, D3, D4', 'Wirausaha/Usaha', 'Hadimulyo Timur', 'Izin Membuat Bangunan (IMB)', '2021-07-10', '11:48:44'),
(22, 2, 13, '1872015004990007', 67, 'Laki-laki', 'S2 Ke Atas', 'Pedagang', 'Hadimulyo Barat', 'Kartu Tanda Penduduk(KTP)', '2021-07-31', '11:29:45'),
(23, 2, 14, '1872015004990010', 25, 'Laki-laki', 'S1', 'Wirausaha/Usaha', 'Hadimulyo Barat', 'Izin Membuat Bangunan (IMB)', '2020-12-18', '01:53:47'),
(24, 1, 15, '1872011601970012', 32, 'Perempuan', 'SLTP', 'Pedagang', 'Hadimulyo Timur', 'HO (gangguan)', '2020-01-19', '01:10:56'),
(25, 1, 16, '1872011601969987', 51, 'Perempuan', 'SLTP', 'Lainnya', 'Hadimulyo Barat', 'HO (gangguan)', '2021-06-20', '01:32:37'),
(26, 1, 17, '1872015004989985', 36, 'Perempuan', 'S1', 'Pegawai Swasta', 'Metro', 'Kartu Keluarga(KK)', '2020-05-21', '04:55:59'),
(27, 2, 18, '1872015004990030', 21, 'Laki-laki', 'SD Ke Bawah', 'Pedagang', 'Yosomulyo', 'Izin Membuat Bangunan (IMB)', '2021-09-21', '05:33:00'),
(28, 2, 19, '1872015004989991', 43, 'Laki-laki', 'SLTA', 'Pegawai Swasta', 'Metro', 'HO (gangguan)', '2021-08-27', '05:11:07'),
(29, 2, 20, '1872011601970002', 21, 'Laki-laki', 'D1, D3, D4', 'Lainnya', 'Hadimulyo Timur', 'Surat Keterangan Tidak Mampu (SKTM)', '2021-08-18', '05:49:07'),
(30, 1, 21, '1872015004840007', 32, 'Perempuan', 'S1', 'Buruh', 'Metro', 'Surat Keterangan Tidak Mampu (SKTM)', '2021-06-23', '04:34:19'),
(31, 1, 22, '1872011602370002', 21, 'Laki-laki', 'SLTA', 'Pelajar/Mahasiswa', 'Yosomulyo', 'Kartu Tanda Penduduk(KTP)', '2021-02-18', '04:12:20'),
(32, 1, 23, '1872011601979762', 34, 'Perempuan', 'D1, D3, D4', 'Pedagang', 'Hadimulyo Timur', 'Izin Membuat Bangunan (IMB)', '2021-04-10', '04:10:21'),
(33, 1, 24, '1872011601973324', 43, 'Perempuan', 'S2 Ke Atas', 'PNS/TNI/POLRI', 'Hadimulyo Barat', 'Kartu Keluarga(KK)', '2021-01-29', '04:40:22'),
(34, 2, 25, '1872011601971092', 28, 'Laki-laki', 'SD Ke Bawah', 'Buruh', 'Metro', 'HO (gangguan)', '2021-08-27', '04:50:24'),
(35, 2, 26, '1872015004932456', 37, 'Laki-laki', 'S1', 'Pegawai Swasta', 'Hadimulyo Barat', 'Kartu Tanda Penduduk(KTP)', '2021-07-16', '04:53:25'),
(36, 1, 27, '1872015004990011', 67, 'Perempuan', 'SLTA', 'Wirausaha/Usaha', 'Metro', 'Kartu Keluarga(KK)', '2021-06-25', '05:09:42'),
(37, 1, 28, '1872015004990007', 77, 'Laki-laki', 'SLTP', 'Pegawai Swasta', 'Hadimulyo Barat', 'Kartu Tanda Penduduk(KTP)', '2021-06-25', '05:57:42'),
(38, 1, 29, '1872015004990007', 6, 'Laki-laki', 'S1', 'Pegawai Swasta', 'Hadimulyo Timur', 'Kartu Tanda Penduduk(KTP)', '2021-06-25', '05:29:43'),
(39, 1, 30, '1872015004990007', 33, 'Perempuan', 'SD Ke Bawah', 'Wirausaha/Usaha', 'Hadimulyo Timur', 'Kartu Tanda Penduduk(KTP)', '2021-06-01', '06:21:49'),
(40, 1, 31, '1872015004990007', 33, 'Perempuan', 'D1, D3, D4', 'Wirausaha/Usaha', 'Metro', 'Izin Membuat Bangunan (IMB)', '2021-05-13', '07:47:11'),
(41, 1, 32, '1872011601970002', 44, 'Perempuan', 'D1, D3, D4', 'Wirausaha/Usaha', 'Hadimulyo Timur', 'Izin Membuat Bangunan (IMB)', '2021-05-13', '07:44:19'),
(42, 2, 33, '1872011601970002', 52, 'Perempuan', 'D1, D3, D4', 'Wirausaha/Usaha', 'Hadimulyo Barat', 'Izin Membuat Bangunan (IMB)', '2021-09-16', '07:48:37'),
(43, 2, 34, '1872011601969998', 43, 'Laki-laki', 'SD Ke Bawah', 'Pelajar/Mahasiswa', 'Metro', 'Surat Keterangan Tidak Mampu (SKTM)', '2021-07-01', '01:21:54'),
(44, 2, 35, '1872015004989958', 44, 'Perempuan', 'S2 Ke Atas', 'Lainnya', 'Metro', 'HO (gangguan)', '2021-07-01', '01:54:54'),
(45, 2, 36, '1872011601970002', 21, 'Perempuan', 'D1, D3, D4', 'Wirausaha/Usaha', 'Metro', 'Izin Membuat Bangunan (IMB)', '2020-07-01', '01:41:55'),
(46, 2, 37, '1872011601970002', 67, 'Perempuan', 'SLTP', 'Petani', 'Hadimulyo Barat', 'Surat Keterangan Tidak Mampu (SKTM)', '2020-07-01', '01:57:59'),
(47, 2, 38, '1872015004992234', 43, 'Perempuan', 'D1, D3, D4', 'Pegawai Swasta', 'Hadimulyo Timur', 'HO (gangguan)', '2020-08-19', '02:40:00'),
(48, 2, 39, '1872015004990007', 67, 'Perempuan', 'S2 Ke Atas', 'Pedagang', 'Yosomulyo', 'Kartu Keluarga(KK)', '2021-08-30', '02:41:01'),
(49, 2, 40, '1872015004990007', 33, 'Laki-laki', 'SLTA', 'Wirausaha/Usaha', 'Metro', 'Kartu Tanda Penduduk(KTP)', '2020-07-23', '02:35:02'),
(50, 2, 41, '1872011601970555', 29, 'Perempuan', 'SLTA', 'Pelajar/Mahasiswa', 'Yosomulyo', 'Surat Keterangan Tidak Mampu (SKTM)', '2020-09-17', '02:28:03'),
(51, 2, 42, '1872015004990099', 61, 'Perempuan', 'SLTP', 'Pelajar/Mahasiswa', 'Hadimulyo Timur', 'Kartu Keluarga(KK)', '2020-07-31', '02:15:04'),
(52, 2, 43, '1872015004990453', 45, 'Laki-laki', 'S1', 'Lainnya', 'Hadimulyo Barat', 'Kartu Tanda Penduduk(KTP)', '2020-07-01', '02:08:05'),
(53, 2, 44, '1872011601972341', 29, 'Perempuan', 'S2 Ke Atas', 'Wirausaha/Usaha', 'Hadimulyo Barat', 'Izin Membuat Bangunan (IMB)', '2020-07-08', '02:01:06'),
(54, 2, 45, '1212311111', 21, 'Perempuan', 'SLTA', 'PNS/TNI/POLRI', 'Hadimulyo Barat', 'Kartu Keluarga(KK)', '2021-08-13', '08:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `skm_kuesioner`
--

CREATE TABLE `skm_kuesioner` (
  `id_kuesioner` int(11) NOT NULL,
  `id_skm_biodata` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `jawaban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skm_kuesioner`
--

INSERT INTO `skm_kuesioner` (`id_kuesioner`, `id_skm_biodata`, `id_pertanyaan`, `jawaban`) VALUES
(19, 5, 1, 4),
(20, 5, 2, 4),
(21, 5, 3, 4),
(22, 5, 4, 4),
(23, 5, 5, 4),
(24, 5, 6, 4),
(25, 5, 7, 4),
(26, 5, 8, 4),
(27, 5, 9, 4),
(28, 6, 1, 3),
(29, 6, 2, 4),
(30, 6, 3, 4),
(31, 6, 4, 3),
(32, 6, 5, 2),
(33, 6, 6, 1),
(34, 6, 7, 3),
(35, 6, 8, 4),
(36, 6, 9, 2),
(37, 7, 1, 4),
(38, 7, 2, 4),
(39, 7, 3, 3),
(40, 7, 4, 3),
(41, 7, 5, 3),
(42, 7, 6, 3),
(43, 7, 7, 3),
(44, 7, 8, 3),
(45, 7, 9, 4),
(46, 8, 1, 3),
(47, 8, 2, 3),
(48, 8, 3, 3),
(49, 8, 4, 4),
(50, 8, 5, 4),
(51, 8, 6, 4),
(52, 8, 7, 3),
(53, 8, 8, 4),
(54, 8, 9, 3),
(55, 9, 1, 3),
(56, 9, 2, 4),
(57, 9, 3, 4),
(58, 9, 4, 4),
(59, 9, 5, 3),
(60, 9, 6, 3),
(61, 9, 7, 4),
(62, 9, 8, 4),
(63, 9, 9, 3),
(64, 10, 1, 4),
(65, 10, 2, 4),
(66, 10, 3, 4),
(67, 10, 4, 4),
(68, 10, 5, 3),
(69, 10, 6, 2),
(70, 10, 7, 4),
(71, 10, 8, 4),
(72, 10, 9, 2),
(73, 11, 1, 4),
(74, 11, 2, 4),
(75, 11, 3, 2),
(76, 11, 4, 4),
(77, 11, 5, 3),
(78, 11, 6, 3),
(79, 11, 7, 4),
(80, 11, 8, 2),
(81, 11, 9, 4),
(127, 17, 1, 4),
(128, 17, 2, 4),
(129, 17, 3, 3),
(130, 17, 4, 4),
(131, 17, 5, 4),
(132, 17, 6, 4),
(133, 17, 7, 4),
(134, 17, 8, 4),
(135, 17, 9, 4),
(136, 18, 1, 4),
(137, 18, 2, 3),
(138, 18, 3, 2),
(139, 18, 4, 4),
(140, 18, 5, 4),
(141, 18, 6, 4),
(142, 18, 7, 4),
(143, 18, 8, 3),
(144, 18, 9, 3),
(145, 19, 1, 4),
(146, 19, 2, 4),
(147, 19, 3, 3),
(148, 19, 4, 4),
(149, 19, 5, 4),
(150, 19, 6, 4),
(151, 19, 7, 3),
(152, 19, 8, 4),
(153, 19, 9, 3),
(154, 20, 1, 4),
(155, 20, 2, 3),
(156, 20, 3, 3),
(157, 20, 4, 4),
(158, 20, 5, 4),
(159, 20, 6, 4),
(160, 20, 7, 4),
(161, 20, 8, 4),
(162, 20, 9, 4),
(163, 21, 1, 4),
(164, 21, 2, 3),
(165, 21, 3, 4),
(166, 21, 4, 4),
(167, 21, 5, 4),
(168, 21, 6, 4),
(169, 21, 7, 4),
(170, 21, 8, 4),
(171, 21, 9, 4),
(172, 22, 1, 4),
(173, 22, 2, 3),
(174, 22, 3, 2),
(175, 22, 4, 1),
(176, 22, 5, 4),
(177, 22, 6, 4),
(178, 22, 7, 4),
(179, 22, 8, 4),
(180, 22, 9, 4),
(181, 23, 1, 4),
(182, 23, 2, 4),
(183, 23, 3, 3),
(184, 23, 4, 4),
(185, 23, 5, 1),
(186, 23, 6, 1),
(187, 23, 7, 3),
(188, 23, 8, 3),
(189, 23, 9, 1),
(190, 24, 1, 4),
(191, 24, 2, 3),
(192, 24, 3, 3),
(193, 24, 4, 3),
(194, 24, 5, 3),
(195, 24, 6, 4),
(196, 24, 7, 4),
(197, 24, 8, 3),
(198, 24, 9, 3),
(199, 25, 1, 4),
(200, 25, 2, 4),
(201, 25, 3, 3),
(202, 25, 4, 4),
(203, 25, 5, 3),
(204, 25, 6, 4),
(205, 25, 7, 4),
(206, 25, 8, 4),
(207, 25, 9, 4),
(208, 26, 1, 4),
(209, 26, 2, 4),
(210, 26, 3, 4),
(211, 26, 4, 4),
(212, 26, 5, 4),
(213, 26, 6, 4),
(214, 26, 7, 4),
(215, 26, 8, 4),
(216, 26, 9, 4),
(217, 27, 1, 4),
(218, 27, 2, 4),
(219, 27, 3, 4),
(220, 27, 4, 4),
(221, 27, 5, 4),
(222, 27, 6, 4),
(223, 27, 7, 4),
(224, 27, 8, 4),
(225, 27, 9, 4),
(226, 28, 1, 4),
(227, 28, 2, 3),
(228, 28, 3, 3),
(229, 28, 4, 3),
(230, 28, 5, 4),
(231, 28, 6, 4),
(232, 28, 7, 2),
(233, 28, 8, 4),
(234, 28, 9, 4),
(235, 29, 1, 4),
(236, 29, 2, 3),
(237, 29, 3, 4),
(238, 29, 4, 3),
(239, 29, 5, 4),
(240, 29, 6, 4),
(241, 29, 7, 3),
(242, 29, 8, 3),
(243, 29, 9, 4),
(244, 30, 1, 4),
(245, 30, 2, 4),
(246, 30, 3, 4),
(247, 30, 4, 4),
(248, 30, 5, 4),
(249, 30, 6, 4),
(250, 30, 7, 4),
(251, 30, 8, 4),
(252, 30, 9, 4),
(253, 31, 1, 4),
(254, 31, 2, 3),
(255, 31, 3, 3),
(256, 31, 4, 3),
(257, 31, 5, 3),
(258, 31, 6, 4),
(259, 31, 7, 4),
(260, 31, 8, 3),
(261, 31, 9, 4),
(262, 32, 1, 3),
(263, 32, 2, 3),
(264, 32, 3, 3),
(265, 32, 4, 3),
(266, 32, 5, 3),
(267, 32, 6, 3),
(268, 32, 7, 4),
(269, 32, 8, 4),
(270, 32, 9, 3),
(271, 33, 1, 4),
(272, 33, 2, 3),
(273, 33, 3, 4),
(274, 33, 4, 3),
(275, 33, 5, 3),
(276, 33, 6, 2),
(277, 33, 7, 4),
(278, 33, 8, 3),
(279, 33, 9, 3),
(280, 34, 1, 4),
(281, 34, 2, 3),
(282, 34, 3, 4),
(283, 34, 4, 3),
(284, 34, 5, 4),
(285, 34, 6, 3),
(286, 34, 7, 4),
(287, 34, 8, 4),
(288, 34, 9, 3),
(289, 35, 1, 3),
(290, 35, 2, 3),
(291, 35, 3, 4),
(292, 35, 4, 4),
(293, 35, 5, 3),
(294, 35, 6, 4),
(295, 35, 7, 3),
(296, 35, 8, 4),
(297, 35, 9, 3),
(298, 36, 1, 4),
(299, 36, 2, 4),
(300, 36, 3, 4),
(301, 36, 4, 4),
(302, 36, 5, 3),
(303, 36, 6, 2),
(304, 36, 7, 4),
(305, 36, 8, 4),
(306, 36, 9, 4),
(307, 37, 1, 4),
(308, 37, 2, 4),
(309, 37, 3, 4),
(310, 37, 4, 4),
(311, 37, 5, 4),
(312, 37, 6, 4),
(313, 37, 7, 2),
(314, 37, 8, 3),
(315, 37, 9, 3),
(316, 38, 1, 2),
(317, 38, 2, 4),
(318, 38, 3, 4),
(319, 38, 4, 4),
(320, 38, 5, 4),
(321, 38, 6, 3),
(322, 38, 7, 4),
(323, 38, 8, 4),
(324, 38, 9, 4),
(325, 39, 1, 4),
(326, 39, 2, 4),
(327, 39, 3, 4),
(328, 39, 4, 2),
(329, 39, 5, 3),
(330, 39, 6, 2),
(331, 39, 7, 4),
(332, 39, 8, 4),
(333, 39, 9, 4),
(334, 40, 1, 4),
(335, 40, 2, 4),
(336, 40, 3, 4),
(337, 40, 4, 4),
(338, 40, 5, 4),
(339, 40, 6, 4),
(340, 40, 7, 4),
(341, 40, 8, 4),
(342, 40, 9, 4),
(343, 41, 1, 4),
(344, 41, 2, 3),
(345, 41, 3, 2),
(346, 41, 4, 3),
(347, 41, 5, 4),
(348, 41, 6, 3),
(349, 41, 7, 2),
(350, 41, 8, 4),
(351, 41, 9, 4),
(352, 42, 1, 4),
(353, 42, 2, 4),
(354, 42, 3, 4),
(355, 42, 4, 3),
(356, 42, 5, 4),
(357, 42, 6, 4),
(358, 42, 7, 2),
(359, 42, 8, 3),
(360, 42, 9, 2),
(361, 43, 1, 4),
(362, 43, 2, 4),
(363, 43, 3, 3),
(364, 43, 4, 3),
(365, 43, 5, 2),
(366, 43, 6, 3),
(367, 43, 7, 4),
(368, 43, 8, 4),
(369, 43, 9, 4),
(370, 44, 1, 4),
(371, 44, 2, 1),
(372, 44, 3, 2),
(373, 44, 4, 4),
(374, 44, 5, 3),
(375, 44, 6, 2),
(376, 44, 7, 4),
(377, 44, 8, 3),
(378, 44, 9, 3),
(379, 45, 1, 2),
(380, 45, 2, 3),
(381, 45, 3, 3),
(382, 45, 4, 2),
(383, 45, 5, 2),
(384, 45, 6, 3),
(385, 45, 7, 3),
(386, 45, 8, 4),
(387, 45, 9, 4),
(388, 46, 1, 3),
(389, 46, 2, 3),
(390, 46, 3, 2),
(391, 46, 4, 2),
(392, 46, 5, 4),
(393, 46, 6, 4),
(394, 46, 7, 3),
(395, 46, 8, 2),
(396, 46, 9, 4),
(397, 47, 1, 3),
(398, 47, 2, 3),
(399, 47, 3, 3),
(400, 47, 4, 3),
(401, 47, 5, 3),
(402, 47, 6, 3),
(403, 47, 7, 3),
(404, 47, 8, 3),
(405, 47, 9, 3),
(406, 48, 1, 4),
(407, 48, 2, 3),
(408, 48, 3, 3),
(409, 48, 4, 4),
(410, 48, 5, 4),
(411, 48, 6, 3),
(412, 48, 7, 2),
(413, 48, 8, 3),
(414, 48, 9, 3),
(415, 49, 1, 4),
(416, 49, 2, 3),
(417, 49, 3, 1),
(418, 49, 4, 4),
(419, 49, 5, 4),
(420, 49, 6, 3),
(421, 49, 7, 2),
(422, 49, 8, 3),
(423, 49, 9, 2),
(424, 50, 1, 2),
(425, 50, 2, 3),
(426, 50, 3, 2),
(427, 50, 4, 2),
(428, 50, 5, 3),
(429, 50, 6, 1),
(430, 50, 7, 3),
(431, 50, 8, 3),
(432, 50, 9, 3),
(433, 51, 1, 3),
(434, 51, 2, 2),
(435, 51, 3, 3),
(436, 51, 4, 3),
(437, 51, 5, 3),
(438, 51, 6, 3),
(439, 51, 7, 4),
(440, 51, 8, 3),
(441, 51, 9, 4),
(442, 52, 1, 3),
(443, 52, 2, 3),
(444, 52, 3, 2),
(445, 52, 4, 2),
(446, 52, 5, 3),
(447, 52, 6, 3),
(448, 52, 7, 4),
(449, 52, 8, 4),
(450, 52, 9, 4),
(451, 53, 1, 4),
(452, 53, 2, 4),
(453, 53, 3, 4),
(454, 53, 4, 4),
(455, 53, 5, 4),
(456, 53, 6, 4),
(457, 53, 7, 4),
(458, 53, 8, 4),
(459, 53, 9, 4),
(460, 54, 1, 4),
(461, 54, 2, 4),
(462, 54, 3, 4),
(463, 54, 4, 4),
(464, 54, 5, 4),
(465, 54, 6, 4),
(466, 54, 7, 4),
(467, 54, 8, 4),
(468, 54, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `skm_rekap`
--

CREATE TABLE `skm_rekap` (
  `id_skm_rekap` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nilai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skm_rekap`
--

INSERT INTO `skm_rekap` (`id_skm_rekap`, `tahun`, `nilai`) VALUES
(1, 2017, '77.56'),
(2, 2018, '82.99'),
(3, 2019, '79.72'),
(7, 2020, '81.69'),
(11, 2021, '86.73'),
(19, 2022, '90');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Member'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(2, 0, 'My Profile', 'member', 'fas fa-fw fa-user', 1),
(5, 3, 'SubMenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(22, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(23, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 0),
(24, 1, 'SKM', 'Admin/SKM', 'fas fa-fw fa-chart-bar', 1),
(27, 1, 'Akun User', 'admin/daftar_user', 'fas fa-fw fa-address-card', 1),
(38, 2, 'My Profile', 'member/', 'fas fa-fw fa-user', 1),
(42, 2, 'Edit Profil', 'Member/edit', 'fas fa-fw fa-user-edit', 1),
(43, 2, 'Change Password', 'member/changepassword', 'fas fa-fw fa-key', 1),
(44, 2, 'Laporan SKM', 'Laporan', 'fas fa-fw fa-book', 1),
(45, 2, 'SKM Pertahun', 'Member/rekap_skm', 'fas fa-fw fa-chart-line', 1),
(46, 3, 'Menu Management', 'Menu', 'fas fa-fw fa-folder', 1),
(64, 2, 'test submenu', '#', 'fas fa-fw fa-key', 0),
(65, 1, 'Dummy', '#', 'fas fa-fw fa-user', 0),
(66, 3, 'Dummy Data', '#', 'fas fa-fw fa-chart-line', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pertanyaan`
--
ALTER TABLE `master_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `skm_biodata`
--
ALTER TABLE `skm_biodata`
  ADD PRIMARY KEY (`id_skm_biodata`);

--
-- Indexes for table `skm_kuesioner`
--
ALTER TABLE `skm_kuesioner`
  ADD PRIMARY KEY (`id_kuesioner`);

--
-- Indexes for table `skm_rekap`
--
ALTER TABLE `skm_rekap`
  ADD PRIMARY KEY (`id_skm_rekap`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `master_pertanyaan`
--
ALTER TABLE `master_pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `skm_biodata`
--
ALTER TABLE `skm_biodata`
  MODIFY `id_skm_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `skm_kuesioner`
--
ALTER TABLE `skm_kuesioner`
  MODIFY `id_kuesioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=469;

--
-- AUTO_INCREMENT for table `skm_rekap`
--
ALTER TABLE `skm_rekap`
  MODIFY `id_skm_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
