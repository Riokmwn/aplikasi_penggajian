-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Feb 2024 pada 10.42
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
  `id_karyawan` varchar(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `posisi_id` int(11) NOT NULL,
  `jenis_kelamin` enum('L','P','','') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `karyawan_id` varchar(11) NOT NULL,
  `waktu_checkin` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_checkout` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

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
(5, 'teknisi', 110000, 25000, 20000, 10000, 10000),
(6, 'oprator', 110000, 25000, 20000, 10000, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_gaji_karyawan`
--

CREATE TABLE `rekap_gaji_karyawan` (
  `id_rekap_gaji_karyawan` int(11) NOT NULL,
  `karyawan_id` varchar(11) NOT NULL,
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
  `karyawan_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `users_name`, `email`, `username`, `password`, `role_id`, `karyawan_id`) VALUES
(1, 'Super Admin', NULL, 'admin', '$2y$10$o9XB4pPEglsxkAlafXZ9o.kaS04DDILr0F6ZoCZrmmLNsUb64KQdG', 1, '0');

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
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rekap_gaji_karyawan`
--
ALTER TABLE `rekap_gaji_karyawan`
  MODIFY `id_rekap_gaji_karyawan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
