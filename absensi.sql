-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2018 at 04:53 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `_absensi`
--

CREATE TABLE `_absensi` (
  `id_absensi` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `absen_hari` varchar(10) NOT NULL,
  `jam_masuk_kantor` time NOT NULL,
  `jam_keluar_kantor` time NOT NULL,
  `jam_masuk_absen` time NOT NULL,
  `jam_keluar_absen` time NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('masuk kerja','terlambat','ijin','sakit','cuti') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_absensi`
--

INSERT INTO `_absensi` (`id_absensi`, `karyawan_id`, `absen_hari`, `jam_masuk_kantor`, `jam_keluar_kantor`, `jam_masuk_absen`, `jam_keluar_absen`, `tanggal`, `keterangan`, `status`) VALUES
(1, 3, 'Senin', '07:00:00', '16:00:00', '06:59:00', '00:00:00', '2018-06-12', 'masuk', 'cuti'),
(2, 2, 'Senin', '08:00:00', '17:00:00', '07:59:33', '17:06:22', '2018-06-12', '', 'ijin'),
(3, 4, 'Senin', '07:00:00', '16:00:00', '06:59:00', '00:00:00', '2018-06-12', 'masuk', 'ijin'),
(4, 7, 'Senin', '08:00:00', '17:00:00', '07:59:33', '17:06:22', '2018-06-11', '', 'ijin'),
(5, 8, 'Senin', '07:00:00', '16:00:00', '06:59:00', '00:00:00', '2018-06-11', 'masuk', 'masuk kerja'),
(6, 9, 'Senin', '08:00:00', '17:00:00', '07:59:33', '17:06:22', '2018-06-11', '', 'masuk kerja'),
(7, 5, 'Senin', '07:00:00', '16:00:00', '06:59:00', '00:00:00', '2018-06-11', 'masuk', 'masuk kerja'),
(8, 10, 'Senin', '08:00:00', '17:00:00', '07:59:33', '17:06:22', '2018-06-11', '', 'terlambat'),
(9, 11, 'Senin', '08:00:00', '17:00:00', '07:59:33', '17:06:22', '2018-06-11', '', 'masuk kerja'),
(10, 6, 'Senin', '08:00:00', '17:00:00', '07:59:33', '17:06:22', '2018-06-11', '', 'terlambat');

-- --------------------------------------------------------

--
-- Table structure for table `_jam_kerja`
--

CREATE TABLE `_jam_kerja` (
  `id_jam_kerja` int(11) NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  `kerja_hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_jam_kerja`
--

INSERT INTO `_jam_kerja` (`id_jam_kerja`, `lokasi_id`, `kerja_hari`, `jam_masuk`, `jam_keluar`) VALUES
(56, 18, 'Senin', '09:00:00', '17:00:00'),
(57, 18, 'Selasa', '09:00:00', '17:00:00'),
(58, 18, 'Rabu', '09:00:00', '17:00:00'),
(59, 18, 'Kamis', '09:00:00', '17:00:00'),
(60, 18, 'Jumat', '09:00:00', '17:00:00'),
(61, 18, 'Sabtu', '09:00:00', '17:00:00'),
(62, 17, 'Senin', '08:00:00', '17:00:00'),
(63, 17, 'Selasa', '08:00:00', '17:00:00'),
(64, 17, 'Rabu', '08:00:00', '17:00:00'),
(65, 17, 'Kamis', '08:00:00', '17:00:00'),
(66, 17, 'Jumat', '08:00:00', '17:00:00'),
(67, 17, 'Sabtu', '08:00:00', '17:00:00'),
(153, 15, 'Senin', '07:00:00', '15:00:00'),
(154, 15, 'Selasa', '07:00:00', '15:00:00'),
(155, 15, 'Rabu', '07:00:00', '15:00:00'),
(160, 15, 'Kamis', '07:00:00', '15:00:00'),
(161, 15, 'Jumat', '07:00:00', '15:00:00'),
(162, 14, 'Senin', '03:00:00', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `_karyawan`
--

CREATE TABLE `_karyawan` (
  `karyawan_id` int(11) NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  `karyawan_nama` varchar(200) NOT NULL,
  `karyawan_jabatan` varchar(50) NOT NULL,
  `karyawan_ttl` date DEFAULT NULL,
  `karyawan_email` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `karyawan_alamat` text NOT NULL,
  `karyawan_salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_karyawan`
--

INSERT INTO `_karyawan` (`karyawan_id`, `lokasi_id`, `karyawan_nama`, `karyawan_jabatan`, `karyawan_ttl`, `karyawan_email`, `no_hp`, `karyawan_alamat`, `karyawan_salary`) VALUES
(2, 11, 'D.O EXO', 'Karyawan', '1993-05-31', 'eni@gmail.com', '', 'Tajem, Maguwoharjo', 0),
(3, 14, 'Yoona', 'Karyawan', '1994-06-06', 'eni@gmail.com', '', 'Haiyoo', 0),
(4, 15, 'Ayuni', 'CEO / Direktur', NULL, 'anindayuni01@gmail.com', '', 'Jl. Manisrenggo, Klaten', 10000000),
(5, 15, 'Yoo In Na', 'CEO / Direktur', NULL, 'anindayuni01@gmail.com', '', 'Jl. Manisrenggo, Klaten', 10000000),
(6, 14, 'Ilham', 'Karyawan', '1994-06-06', 'ilham@gmail.com', '', 'Haiyoo', 0),
(7, 11, 'Song Joong Ki', 'Karyawan', '1993-05-31', 'eni@gmail.com', '', 'Tajem, Maguwoharjo', 0),
(8, 14, 'Jung Hae In', 'Karyawan', '1994-06-06', 'eni@gmail.com', '', 'Haiyoo', 0),
(9, 15, 'Park Seo Joon', 'CEO / Direktur', NULL, 'anindayuni01@gmail.com', '', 'Jl. Manisrenggo, Klaten', 10000000),
(10, 15, 'Na Da Reum', 'CEO / Direktur', NULL, 'anindayuni01@gmail.com', '', 'Jl. Manisrenggo, Klaten', 10000000),
(11, 11, 'Song Hye Kyo', 'Karyawan', '1993-05-31', 'eni@gmail.com', '', 'Tajem, Maguwoharjo', 0),
(12, 15, 'Lee Jong Suk', 'Karyawan', NULL, 'lee@gmail.com', '', 'sdsds', 0);

-- --------------------------------------------------------

--
-- Table structure for table `_lokasi`
--

CREATE TABLE `_lokasi` (
  `lokasi_id` int(11) NOT NULL,
  `lokasi_nama` varchar(50) NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `perusahaan_title` enum('pusat','cabang') NOT NULL,
  `perusahaan_alamat` text NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `id_jam_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_lokasi`
--

INSERT INTO `_lokasi` (`lokasi_id`, `lokasi_nama`, `perusahaan_id`, `perusahaan_title`, `perusahaan_alamat`, `latitude`, `longitude`, `qr_code`, `id_jam_kerja`) VALUES
(11, 'PT Otret Yogyakarta', 1, 'pusat', 'Jalan Ring Road Utara, Condongcatur, Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', -7.760144, 110.406548, 'pt-otret-yogyakarta-080618104318.png', 0),
(12, 'PT Otret Yogyakarta 1', 1, 'cabang', 'Jl. Magelang KM.8 No.89, Kricak, Tegalrejo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55285', -7.774353, 110.360794, 'pt-otret-yogyakarta-1-080618115903.png', 0),
(14, 'Building 6 Of AMIKOM', 1, 'cabang', 'Jl. Mancasan Indah III No.14, Ngringin, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', -7.759692, 110.409515, 'building-6-of-amikom-310518013044.png', 0),
(15, 'Magelang Resto', 1, 'cabang', 'Jl. Magelang KM.8 No.89, Kricak, Tegalrejo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55285', -7.774353, 110.360794, 'magelang-resto-310518014031.png', 0),
(17, 'PT Otret Siemens', 1, 'pusat', 'Siemens Business Park, Building F Jl. MT. Haryono Kav. 58-60 Jakarta Selatan 12780', -6.245731, 106.846031, 'pt-otret-siemens-310518013939.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `_perusahaan`
--

CREATE TABLE `_perusahaan` (
  `perusahaan_id` int(11) NOT NULL,
  `perusahaan_nama` varchar(200) NOT NULL,
  `perusahaan_alamat` text NOT NULL,
  `perusahaan_telp` varchar(12) NOT NULL,
  `perusahaan_bidang` varchar(100) NOT NULL,
  `perusahaan_email` varchar(100) NOT NULL,
  `perusahaan_user` varchar(100) NOT NULL,
  `perusahaan_logo` varchar(100) NOT NULL,
  `perusahaan_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_perusahaan`
--

INSERT INTO `_perusahaan` (`perusahaan_id`, `perusahaan_nama`, `perusahaan_alamat`, `perusahaan_telp`, `perusahaan_bidang`, `perusahaan_email`, `perusahaan_user`, `perusahaan_logo`, `perusahaan_password`) VALUES
(1, 'PT Otret Jogja', 'Jl. Gito Gati', '085743328656', 'Web Developer', 'root@mastercms.com', 'root@mastercms.com', 'user1.jpg', 'c3284d0f94606de1fd2af172aba15bf3'),
(2, 'PT Otret Yogyakarta', '', '', 'Web Develop', 'masterotret@gmail.com', 'masterotret@gmail.com', '', '144ad543c9f5d46b9f0d966a00af3a96'),
(3, 'Green Web Solutions', '', '', 'Web Develop', 'greenweb@gmail.com', 'greenweb@gmail.com', '', '7de0b1f5069bd12cc968bd08d7dad740'),
(10, 'Green Web Solutions', '', '', 'Web Develop', 'froot@mastercms.com', 'froot@mastercms.com', '', 'c3284d0f94606de1fd2af172aba15bf3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `_absensi`
--
ALTER TABLE `_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `_jam_kerja`
--
ALTER TABLE `_jam_kerja`
  ADD PRIMARY KEY (`id_jam_kerja`);

--
-- Indexes for table `_karyawan`
--
ALTER TABLE `_karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indexes for table `_lokasi`
--
ALTER TABLE `_lokasi`
  ADD PRIMARY KEY (`lokasi_id`);

--
-- Indexes for table `_perusahaan`
--
ALTER TABLE `_perusahaan`
  ADD PRIMARY KEY (`perusahaan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `_absensi`
--
ALTER TABLE `_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `_jam_kerja`
--
ALTER TABLE `_jam_kerja`
  MODIFY `id_jam_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `_karyawan`
--
ALTER TABLE `_karyawan`
  MODIFY `karyawan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `_lokasi`
--
ALTER TABLE `_lokasi`
  MODIFY `lokasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `_perusahaan`
--
ALTER TABLE `_perusahaan`
  MODIFY `perusahaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
