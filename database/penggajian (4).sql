-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2024 pada 02.51
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

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
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `posisi_id` int(11) NOT NULL,
  `jenis_kelamin` enum('L','P','','') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `posisi_id`, `jenis_kelamin`, `alamat`, `no_hp`) VALUES
(8, 'Arief', 1, 'L', 'ASDADA', '12312321'),
(9, 'Pravda', 1, 'L', '', NULL),
(12313213, 'aaa', 1, 'L', 'asdadas', NULL),
(121314412, 'maul', 4, 'L', 'jalan-jalan1251626#12.', '089727325327283'),
(2147483647, 'testinga', 1, 'P', 'asdsadda', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `waktu_checkin` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_checkout` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`id_kehadiran`, `karyawan_id`, `waktu_checkin`, `waktu_checkout`) VALUES
(19, 4, '2024-02-01 01:00:00', '2024-02-01 12:10:00'),
(20, 6, '2024-02-01 01:00:01', '2024-02-01 10:10:01'),
(21, 4, '2024-02-02 01:00:02', '2024-02-02 09:10:02'),
(22, 6, '2024-02-02 01:00:03', '2024-02-02 07:10:03'),
(23, 6, '2024-02-03 01:00:04', '2024-02-03 10:10:04'),
(24, 4, '2024-02-03 01:00:05', '2024-02-03 10:10:05'),
(25, 6, '2024-02-04 01:20:06', '2024-02-04 13:10:06'),
(26, 4, '2024-02-04 01:00:07', '2024-02-04 10:10:07'),
(27, 6, '2024-02-05 02:00:08', '2024-02-05 14:10:08'),
(28, 4, '2024-02-05 03:00:09', '2024-02-05 10:10:09'),
(29, 6, '2024-02-06 01:00:10', '2024-02-06 15:10:10'),
(30, 4, '2024-02-06 01:00:11', '2024-02-06 13:10:11'),
(31, 8, '2024-01-01 01:00:00', '2024-01-01 12:10:00'),
(32, 9, '2024-01-01 01:00:01', '2024-01-01 10:10:01'),
(33, 8, '2024-01-02 01:00:02', '2024-01-02 09:10:02'),
(34, 9, '2024-01-02 01:00:03', '2024-01-02 07:10:03'),
(35, 9, '2024-01-03 01:00:04', '2024-01-03 10:10:04'),
(36, 8, '2024-01-03 01:00:05', '2024-01-03 10:10:05'),
(37, 9, '2024-01-04 01:20:06', '2024-01-04 13:10:06'),
(38, 8, '2024-01-04 01:00:07', '2024-01-04 10:10:07'),
(39, 9, '2024-01-05 02:00:08', '2024-01-05 14:10:08'),
(40, 8, '2024-01-05 03:00:09', '2024-01-05 10:10:09'),
(41, 8, '2024-01-01 01:00:00', '2024-01-01 12:10:00'),
(42, 9, '2024-01-01 01:00:01', '2024-01-01 10:10:01'),
(43, 8, '2024-01-02 01:00:02', '2024-01-02 09:10:02'),
(44, 9, '2024-01-02 01:00:03', '2024-01-02 07:10:03'),
(45, 9, '2024-01-03 01:00:04', '2024-01-03 10:10:04'),
(46, 8, '2024-01-03 01:00:05', '2024-01-03 10:10:05'),
(47, 9, '2024-01-04 01:20:06', '2024-01-04 13:10:06'),
(48, 8, '2024-01-04 01:00:07', '2024-01-04 10:10:07'),
(49, 9, '2024-01-05 02:00:08', '2024-01-05 14:10:08'),
(50, 8, '2024-01-05 03:00:09', '2024-01-05 10:10:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `jam_masuk` time NOT NULL DEFAULT current_timestamp(),
  `jam_keluar` time NOT NULL DEFAULT current_timestamp(),
  `menit_masuk_toleransi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `jam_masuk`, `jam_keluar`, `menit_masuk_toleransi`) VALUES
(1, '08:00:00', '17:00:00', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(11) NOT NULL,
  `nama_posisi` varchar(255) NOT NULL,
  `bayaran_harian` double NOT NULL,
  `bayaran_konsumsi_harian` double NOT NULL,
  `bayaran_transportasi_harian` double NOT NULL,
  `bayaran_lembur_perjam` double NOT NULL,
  `bayaran_penalti` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `nama_posisi`, `bayaran_harian`, `bayaran_konsumsi_harian`, `bayaran_transportasi_harian`, `bayaran_lembur_perjam`, `bayaran_penalti`) VALUES
(1, 'Cleaner', 100000, 25000, 20000, 10000, 10000),
(4, 'mekanik', 110000, 25000, 20000, 10000, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_gaji_karyawan`
--

CREATE TABLE `rekap_gaji_karyawan` (
  `id_rekap_gaji_karyawan` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `posisi_id` int(11) NOT NULL,
  `rekap_gaji_bulan` varchar(10) NOT NULL,
  `rekap_gaji_tahun` varchar(4) NOT NULL,
  `total_hari_masuk` int(11) NOT NULL,
  `total_hari_telat` int(11) NOT NULL,
  `total_hari_checkout_awal` int(11) NOT NULL,
  `total_jam_lembur` int(11) NOT NULL,
  `bayaran_harian` double NOT NULL,
  `bayaran_konsumsi_harian` double NOT NULL,
  `bayaran_transportasi_harian` double NOT NULL,
  `bayaran_lembur_perjam` double NOT NULL,
  `bayaran_penalti` double NOT NULL,
  `total_bayaran_harian` double NOT NULL,
  `total_bayaran_konsumsi_harian` double NOT NULL,
  `total_bayaran_transportasi_harian` double NOT NULL,
  `total_bayaran_lembur_perjam` double NOT NULL,
  `total_bayaran_penalti` double NOT NULL,
  `total_bayaran` double NOT NULL,
  `tanggal_rekap` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `rekap_gaji_karyawan`
--

INSERT INTO `rekap_gaji_karyawan` (`id_rekap_gaji_karyawan`, `karyawan_id`, `posisi_id`, `rekap_gaji_bulan`, `rekap_gaji_tahun`, `total_hari_masuk`, `total_hari_telat`, `total_hari_checkout_awal`, `total_jam_lembur`, `bayaran_harian`, `bayaran_konsumsi_harian`, `bayaran_transportasi_harian`, `bayaran_lembur_perjam`, `bayaran_penalti`, `total_bayaran_harian`, `total_bayaran_konsumsi_harian`, `total_bayaran_transportasi_harian`, `total_bayaran_lembur_perjam`, `total_bayaran_penalti`, `total_bayaran`, `tanggal_rekap`) VALUES
(1, 4, 1, '02', '2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-02-06 14:27:15'),
(2, 8, 1, '01', '2024', 5, 1, 1, 1, 100000, 25000, 20000, 10000, 10000, 500000, 125000, 100000, 10000, 20000, 715000, '2024-02-06 15:21:36'),
(3, 9, 1, '01', '2024', 5, 2, 1, 5, 100000, 25000, 20000, 10000, 10000, 500000, 125000, 100000, 50000, 30000, 745000, '2024-02-06 15:21:38'),
(4, 8, 1, '02', '2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-02-06 15:24:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `users_name` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `karyawan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `users_name`, `email`, `username`, `password`, `role_id`, `karyawan_id`) VALUES
(1, 'Super Admin', NULL, 'admin', '$2y$10$o9XB4pPEglsxkAlafXZ9o.kaS04DDILr0F6ZoCZrmmLNsUb64KQdG', 1, 0),
(224, 'Arief', 'ariffadillah9999@gmail.com', 'ariffadillah9999', '$2y$10$fEuzwetIE53i8CzEgSDkM.6pjdchyZwojcub/WkWbkgTh1DVFHXie', 2, 8),
(225, 'Pravda', 'pravdam329@gmail.com', 'pravdam329', '$2y$10$FgysoE80EKL2ojjkY4tVae5rlia6QNbGcUO7MLTRaATJpLEDT134O', 2, 9),
(226, 'testinga', 'testing@aa.do', 'testing', '$2y$10$sc5I2MXvisK197jwj4SMeulXzEp5I/BBpAaluj1R3I4iZeiJB4W5S', 2, 2147483647),
(227, 'aaa', 'aaa@aa.l', 'aaa', '$2y$10$0YJDwj4eGRVqcqx26AAXo.ymus22wiuH9c2bxBIV9sWIz9GZ4sWN6', 2, 12313213),
(228, 'maul', 'maul@gmail.com', 'maul', '$2y$10$5nP8u11m46P8vJA7XhjjEOACfkKU0MTZ.gCGstVsYfwOBSA8IF32O', 2, 121314412);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`) USING BTREE;

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`) USING BTREE;

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`) USING BTREE;

--
-- Indeks untuk tabel `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`) USING BTREE;

--
-- Indeks untuk tabel `rekap_gaji_karyawan`
--
ALTER TABLE `rekap_gaji_karyawan`
  ADD PRIMARY KEY (`id_rekap_gaji_karyawan`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rekap_gaji_karyawan`
--
ALTER TABLE `rekap_gaji_karyawan`
  MODIFY `id_rekap_gaji_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
