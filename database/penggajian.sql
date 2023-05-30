-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 02:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan_nama` varchar(50) NOT NULL,
  `jabatan_gaji_pokok` int(20) NOT NULL,
  `jabatan_gaji_makan` int(20) NOT NULL,
  `jabatan_gaji_transportasi` int(20) NOT NULL,
  `jabatan_total_gaji` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan_nama`, `jabatan_gaji_pokok`, `jabatan_gaji_makan`, `jabatan_gaji_transportasi`, `jabatan_total_gaji`) VALUES
(1, 'Kepala Jabatan 1', 3000000, 300000, 300000, 3600000),
(2, 'Anggota Jabatan 1', 3000000, 300000, 300000, 3600000),
(3, 'Kepala Jabatan 2', 3000000, 300000, 300000, 3600000),
(4, 'Anggota Jabatan 2', 3000000, 300000, 300000, 3600000),
(6, 'Anggota Jabatan 3', 4000000, 300000, 300000, 4600000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL,
  `jenis_kelamin_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin_nama`) VALUES
(1, 'Laki - Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik_karyawan` varchar(16) NOT NULL,
  `karyawan_nama` varchar(50) NOT NULL,
  `karyawan_tanggal_masuk` date NOT NULL,
  `jenis_kelamin_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `status_karyawan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik_karyawan`, `karyawan_nama`, `karyawan_tanggal_masuk`, `jenis_kelamin_id`, `jabatan_id`, `status_karyawan_id`) VALUES
(1, '1234567891011123', 'Arif Suganda', '2023-05-01', 1, 1, 1),
(3, '1234567891011124', 'RioRio', '2023-05-01', 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rekap_absen`
--

CREATE TABLE `rekap_absen` (
  `karyawan_id` int(11) NOT NULL,
  `rekap_absen_bulan` varchar(8) NOT NULL,
  `rekap_absen_tahun` varchar(4) NOT NULL,
  `rekap_absen_hadir` int(2) NOT NULL,
  `rekap_absen_telat` int(2) NOT NULL,
  `rekap_absen_izin` int(2) NOT NULL,
  `rekap_absen_sakit` int(2) NOT NULL,
  `rekap_absen_tidak_hadir` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekap_absen`
--

INSERT INTO `rekap_absen` (`karyawan_id`, `rekap_absen_bulan`, `rekap_absen_tahun`, `rekap_absen_hadir`, `rekap_absen_telat`, `rekap_absen_izin`, `rekap_absen_sakit`, `rekap_absen_tidak_hadir`) VALUES
(1, 'Maret', '2022', 1, 2, 3, 4, 5),
(3, 'Maret', '2022', 6, 7, 8, 9, 10),
(1, 'Januari', '2023', 12, 13, 14, 15, 16);

-- --------------------------------------------------------

--
-- Table structure for table `status_karyawan`
--

CREATE TABLE `status_karyawan` (
  `id_status_karyawan` int(11) NOT NULL,
  `status_karyawan_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_karyawan`
--

INSERT INTO `status_karyawan` (`id_status_karyawan`, `status_karyawan_nama`) VALUES
(1, 'Karyawan Tetap'),
(2, 'Karyawan Tidak Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `users_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `users_name`, `username`, `password`, `role_id`) VALUES
(1, 'Super Admin', 'admin', '$2y$10$zzeEtYDyNxGpBgJydZT0sOgDCG2uBPwfbs66oqBKuMbmq3tc4gT5.', 1),
(9, 'fajar gunawan', 'fajarfajar', '$2y$10$QphUm6NLj00FixbzwydjsehQ0QzDSsZY9d61xmw61KCMGItkIZfTK', 2),
(11, 'riorio', 'rio', '$2y$10$M4dDFpXSNARFRHdl9HPs6OBPhIzU8W5NKIHC6fCBkFr1nvCVVRxn6', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `status_karyawan`
--
ALTER TABLE `status_karyawan`
  ADD PRIMARY KEY (`id_status_karyawan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_karyawan`
--
ALTER TABLE `status_karyawan`
  MODIFY `id_status_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
