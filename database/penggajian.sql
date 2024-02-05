-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2024 pada 03.06
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
-- Struktur dari tabel `absensi_harian`
--

CREATE TABLE `absensi_harian` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL DEFAULT current_timestamp(),
  `jam_keluar` time NOT NULL DEFAULT current_timestamp(),
  `is_masuk` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi_harian`
--

INSERT INTO `absensi_harian` (`id`, `karyawan_id`, `tanggal`, `jam_masuk`, `jam_keluar`, `is_masuk`) VALUES
(1, 4, '2024-01-02', '08:00:00', '17:00:00', 1),
(2, 4, '2024-01-03', '08:00:00', '17:00:00', 1),
(3, 4, '2024-01-04', '08:00:00', '17:00:00', 1),
(4, 4, '2024-01-05', '08:00:00', '17:00:00', 1),
(5, 4, '2024-01-06', '08:00:00', '17:00:00', 1),
(6, 4, '2024-01-09', '08:00:00', '17:00:00', 1),
(7, 4, '2024-01-10', '08:00:00', '17:00:00', 1),
(8, 4, '2024-01-11', '00:00:00', '00:00:00', 0),
(9, 4, '2024-01-12', '00:00:00', '00:00:00', 0),
(10, 4, '2024-01-13', '00:00:00', '00:00:00', 0),
(11, 4, '2024-01-16', '00:00:00', '00:00:00', 0),
(12, 4, '2024-01-17', '00:00:00', '00:00:00', 0),
(13, 4, '2024-01-18', '00:00:00', '00:00:00', 0),
(14, 4, '2024-01-19', '00:00:00', '00:00:00', 0),
(15, 4, '2024-01-20', '00:00:00', '00:00:00', 0),
(16, 4, '2024-01-23', '00:00:00', '00:00:00', 0),
(17, 4, '2024-01-24', '00:00:00', '00:00:00', 0),
(18, 4, '2024-01-25', '00:00:00', '00:00:00', 0),
(19, 4, '2024-01-26', '00:00:00', '00:00:00', 0),
(20, 4, '2024-01-27', '00:00:00', '00:00:00', 0),
(21, 4, '2024-01-30', '00:00:00', '00:00:00', 0),
(22, 4, '2024-01-31', '00:00:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bpjs`
--

CREATE TABLE `bpjs` (
  `id_bpjs` int(11) NOT NULL,
  `bpjs_kelas` varchar(10) NOT NULL,
  `bpjs_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bpjs`
--

INSERT INTO `bpjs` (`id_bpjs`, `bpjs_kelas`, `bpjs_biaya`) VALUES
(1, 'Kelas 1', 150000),
(2, 'Kelas 2', 100000),
(3, 'Kelas 3', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan_nama` varchar(50) NOT NULL,
  `jabatan_gaji_harian` int(20) NOT NULL,
  `jabatan_gaji_makan` int(20) NOT NULL,
  `jabatan_gaji_transportasi` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan_nama`, `jabatan_gaji_harian`, `jabatan_gaji_makan`, `jabatan_gaji_transportasi`) VALUES
(1, 'Cleaner', 120000, 20000, 10000),
(2, 'Teknisi', 150000, 20000, 10000),
(3, 'Gudang', 110000, 20000, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL,
  `jenis_kelamin_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin_nama`) VALUES
(1, 'Laki - Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `posisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `posisi_id`) VALUES
(4, 'Johny', 1),
(6, 'Amat', 1);

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
(1, 4, '2024-01-01 01:00:00', '2024-01-01 10:10:00'),
(2, 6, '2024-01-01 01:00:01', '2024-01-01 10:10:01'),
(3, 4, '2024-01-02 01:00:02', '2024-01-02 10:10:02'),
(4, 6, '2024-01-02 01:00:03', '2024-01-02 10:10:03'),
(5, 6, '2024-01-03 01:00:04', '2024-01-03 10:10:04'),
(6, 4, '2024-01-03 01:00:05', '2024-01-03 10:10:05');

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
(1, 'Cleaner', 120000, 25000, 20000, 10000, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_absen`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_gaji`
--

CREATE TABLE `rekap_gaji` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `rekap_gaji_bulan` varchar(8) NOT NULL,
  `rekap_gaji_pokok` int(20) NOT NULL,
  `rekap_gaji_makan` int(20) NOT NULL,
  `rekap_gaji_transportasi` int(20) NOT NULL,
  `rekap_gaji_total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekap_gaji`
--

INSERT INTO `rekap_gaji` (`id`, `karyawan_id`, `rekap_gaji_bulan`, `rekap_gaji_pokok`, `rekap_gaji_makan`, `rekap_gaji_transportasi`, `rekap_gaji_total`) VALUES
(1, 4, '1970-01', 840000, 140000, 70000, 1050000);

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
(1, 4, 1, '01', '2024', 3, 0, 0, 0, 120000, 25000, 20000, 10000, 10000, 360000, 75000, 60000, 0, 0, 495000, '2024-02-04 13:00:40'),
(2, 6, 1, '01', '2024', 3, 0, 0, 0, 120000, 25000, 20000, 10000, 10000, 360000, 75000, 60000, 0, 0, 495000, '2024-02-04 13:00:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_karyawan`
--

CREATE TABLE `status_karyawan` (
  `id_status_karyawan` int(11) NOT NULL,
  `status_karyawan_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_karyawan`
--

INSERT INTO `status_karyawan` (`id_status_karyawan`, `status_karyawan_nama`) VALUES
(1, 'Karyawan Tetap'),
(2, 'Karyawan Tidak Tetap');

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
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `users_name`, `email`, `username`, `password`, `role_id`) VALUES
(1, 'Super Admin', NULL, 'admin', '$2y$10$o9XB4pPEglsxkAlafXZ9o.kaS04DDILr0F6ZoCZrmmLNsUb64KQdG', 1),
(121, 'Lesli Hauch', 'lhauch0@globo.com', 'lhauch0', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(122, 'Carma Haresnape', 'charesnape1@t-online.de', 'charesnape1', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(123, 'Dena O\'Riordan', 'doriordan2@moonfruit.com', 'doriordan2', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(124, 'Kitti Haseman', 'khaseman3@imdb.com', 'khaseman3', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(125, 'Agnella Southall', 'asouthall4@netscape.com', 'asouthall4', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(126, 'Ernestus Parkhouse', 'eparkhouse5@blinklist.com', 'eparkhouse5', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(127, 'Chiquia Ortiga', 'cortiga6@fda.gov', 'cortiga6', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(128, 'Benton Badman', 'bbadman7@lulu.com', 'bbadman7', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(129, 'Martainn Potzold', 'mpotzold8@qq.com', 'mpotzold8', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(130, 'Callie Seward', 'cseward9@e-recht24.de', 'cseward9', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(131, 'Renard Spofforth', 'rspoffortha@4shared.com', 'rspoffortha', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(132, 'Niko Moseley', 'nmoseleyb@clickbank.net', 'nmoseleyb', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(133, 'Jenifer Abram', 'jabramc@nytimes.com', 'jabramc', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(134, 'Bevan Fellgatt', 'bfellgattd@shinystat.com', 'bfellgattd', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(135, 'Olympe Eberz', 'oeberze@virginia.edu', 'oeberze', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(136, 'Jim Cabera', 'jcaberaf@com.com', 'jcaberaf', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(137, 'Carmelle Lammers', 'clammersg@dailymotion.com', 'clammersg', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(138, 'Marijn Zealy', 'mzealyh@ezinearticles.com', 'mzealyh', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(139, 'Jessie Dabnor', 'jdabnori@chronoengine.com', 'jdabnori', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(140, 'Estel Golthorpp', 'egolthorppj@geocities.com', 'egolthorppj', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(141, 'Gibb Rickardsson', 'grickardssonk@etsy.com', 'grickardssonk', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(142, 'Sid Jillis', 'sjillisl@sbwire.com', 'sjillisl', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(143, 'Loree Emberton', 'lembertonm@hubpages.com', 'lembertonm', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(144, 'Jenny Riping', 'jripingn@biglobe.ne.jp', 'jripingn', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(145, 'Luce Tumioto', 'ltumiotoo@state.gov', 'ltumiotoo', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(146, 'Bord Swiggs', 'bswiggsp@vkontakte.ru', 'bswiggsp', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(147, 'Carlin Songer', 'csongerq@unblog.fr', 'csongerq', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(148, 'Dulcea Tattersfield', 'dtattersfieldr@imageshack.us', 'dtattersfieldr', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(149, 'Benton Perrigo', 'bperrigos@cnet.com', 'bperrigos', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(150, 'Bonita Kiendl', 'bkiendlt@google.de', 'bkiendlt', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(151, 'Paulie Bartul', 'pbartulu@msu.edu', 'pbartulu', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(152, 'Thebault Miguel', 'tmiguelv@sakura.ne.jp', 'tmiguelv', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(153, 'Cammie Byass', 'cbyassw@globo.com', 'cbyassw', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(154, 'Lolly Duester', 'lduesterx@paginegialle.it', 'lduesterx', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(155, 'Roobbie Banting', 'rbantingy@businesswire.com', 'rbantingy', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(156, 'Josie Choake', 'jchoakez@google.com.hk', 'jchoakez', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(157, 'Myer Inglefield', 'minglefield10@cloudflare.com', 'minglefield10', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(158, 'Patricio Musk', 'pmusk11@weather.com', 'pmusk11', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(159, 'Jillene Carlisso', 'jcarlisso12@apache.org', 'jcarlisso12', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(160, 'Camilla McDermott', 'cmcdermott13@fotki.com', 'cmcdermott13', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(161, 'Filmer Gorgl', 'fgorgl14@ehow.com', 'fgorgl14', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(162, 'Gwenette MacAllester', 'gmacallester15@virginia.edu', 'gmacallester15', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(163, 'Crissy Donahue', 'cdonahue16@earthlink.net', 'cdonahue16', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(164, 'Ricki Stillgoe', 'rstillgoe17@usda.gov', 'rstillgoe17', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(165, 'Babbette Gravenall', 'bgravenall18@linkedin.com', 'bgravenall18', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(166, 'Marchall Hurren', 'mhurren19@constantcontact.com', 'mhurren19', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(167, 'Sukey Hubbart', 'shubbart1a@yandex.ru', 'shubbart1a', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(168, 'Angel Fruin', 'afruin1b@disqus.com', 'afruin1b', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(169, 'Debi Climer', 'dclimer1c@fda.gov', 'dclimer1c', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(170, 'Darrin Webster', 'dwebster1d@toplist.cz', 'dwebster1d', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(171, 'Catarina Tue', 'ctue1e@cbc.ca', 'ctue1e', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(172, 'Guntar Rebert', 'grebert1f@sourceforge.net', 'grebert1f', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(173, 'Gerick Charter', 'gcharter1g@nsw.gov.au', 'gcharter1g', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(174, 'Mechelle Clare', 'mclare1h@chicagotribune.com', 'mclare1h', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(175, 'Cris Weal', 'cweal1i@biblegateway.com', 'cweal1i', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(176, 'Clotilda Burlay', 'cburlay1j@stanford.edu', 'cburlay1j', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(177, 'Dunc Lelande', 'dlelande1k@diigo.com', 'dlelande1k', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(178, 'Abdel Aberchirder', 'ariffadillah9999@gmail.com', 'aaberchirder1l', '$2y$10$2V0ux0di2POGY4ze1VFYC.hlwcZGcCuvucYXUKtVWDlMskwayQOie', 2),
(179, 'Henrietta Chesman', 'hchesman1m@huffingtonpost.com', 'hchesman1m', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(180, 'Gerti Crutcher', 'gcrutcher1n@odnoklassniki.ru', 'gcrutcher1n', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(181, 'Marney Glasner', 'mglasner1o@vimeo.com', 'mglasner1o', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(182, 'Corine Cripwell', 'ccripwell1p@craigslist.org', 'ccripwell1p', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(183, 'Gabriello Rubroe', 'grubroe1q@mac.com', 'grubroe1q', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(184, 'Xena Danett', 'xdanett1r@symantec.com', 'xdanett1r', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(185, 'Florentia Kobsch', 'fkobsch1s@moonfruit.com', 'fkobsch1s', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(186, 'Craggie Flight', 'cflight1t@bigcartel.com', 'cflight1t', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(187, 'Leeland Pyford', 'lpyford1u@edublogs.org', 'lpyford1u', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(188, 'Fan Pavlik', 'fpavlik1v@squarespace.com', 'fpavlik1v', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(189, 'Becky Follis', 'bfollis1w@lulu.com', 'bfollis1w', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(190, 'Lyndel Haythorne', 'lhaythorne1x@godaddy.com', 'lhaythorne1x', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(191, 'Timmi Pordall', 'tpordall1y@reuters.com', 'tpordall1y', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(192, 'Terrel Pischel', 'tpischel1z@cam.ac.uk', 'tpischel1z', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(193, 'Darda Greensite', 'dgreensite20@facebook.com', 'dgreensite20', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(194, 'Hadley Adolfsen', 'hadolfsen21@skyrock.com', 'hadolfsen21', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(195, 'Bethany Helbeck', 'bhelbeck22@businessweek.com', 'bhelbeck22', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(196, 'Devonna Mant', 'dmant23@merriam-webster.com', 'dmant23', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(197, 'Antony McAusland', 'amcausland24@ihg.com', 'amcausland24', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(198, 'Laurie Veschi', 'lveschi25@latimes.com', 'lveschi25', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(199, 'Dyanne Mardy', 'dmardy26@examiner.com', 'dmardy26', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(200, 'Kalle Grellis', 'kgrellis27@yale.edu', 'kgrellis27', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(201, 'Matteo Blatherwick', 'mblatherwick28@loc.gov', 'mblatherwick28', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(202, 'Demeter Strickler', 'dstrickler29@facebook.com', 'dstrickler29', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(203, 'Ellerey Attride', 'eattride2a@hugedomains.com', 'eattride2a', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(204, 'Robbie Stack', 'rstack2b@uol.com.br', 'rstack2b', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(205, 'Denys Ashby', 'dashby2c@icq.com', 'dashby2c', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(206, 'Read Coward', 'rcoward2d@ca.gov', 'rcoward2d', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(207, 'Augustin Scoullar', 'ascoullar2e@dailymotion.com', 'ascoullar2e', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(208, 'Cecilla Spanswick', 'cspanswick2f@msu.edu', 'cspanswick2f', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(209, 'Bancroft Drewe', 'bdrewe2g@aol.com', 'bdrewe2g', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(210, 'Maritsa Itchingham', 'mitchingham2h@stanford.edu', 'mitchingham2h', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(211, 'Antony Daspar', 'adaspar2i@census.gov', 'adaspar2i', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(212, 'Dicky Sawford', 'dsawford2j@comcast.net', 'dsawford2j', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(213, 'Law Purches', 'lpurches2k@elpais.com', 'lpurches2k', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(214, 'Travers Newbury', 'tnewbury2l@devhub.com', 'tnewbury2l', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(215, 'Kingston Gally', 'kgally2m@redcross.org', 'kgally2m', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(216, 'Delcine Rice', 'drice2n@wikispaces.com', 'drice2n', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(217, 'Cecilio Moat', 'cmoat2o@tripod.com', 'cmoat2o', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(218, 'Nari Valentine', 'nvalentine2p@salon.com', 'nvalentine2p', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(219, 'Maddi Gricewood', 'mgricewood2q@deviantart.com', 'mgricewood2q', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(220, 'Alikee Littefair', 'alittefair2r@accuweather.com', 'alittefair2r', '$2y$10$K4nemqFUPV1D8QNI48iwnuD/GIPDEcvboY54.TvHe8Vo9HRqFW8RO', 2),
(221, 'Joko Widodo', 'jowo@kiwodo.com', 'joko_widodo1706455041', '$2y$10$kC4ExXCzP9uFa5/m5dkkcOilrjqrqwvESialjN6SomAkMpr3abwaa', 2),
(222, 'mael lion', 'mael lion @ gmail.com', 'mael_lion1706505986', '$2y$10$56krvKCgyH3R5Q6BC9Bc0uFVIdWmwKxlqDsTSBblO6MW6KsJMY60m', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi_harian`
--
ALTER TABLE `absensi_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bpjs`
--
ALTER TABLE `bpjs`
  ADD PRIMARY KEY (`id_bpjs`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

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
-- Indeks untuk tabel `rekap_gaji`
--
ALTER TABLE `rekap_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekap_gaji_karyawan`
--
ALTER TABLE `rekap_gaji_karyawan`
  ADD PRIMARY KEY (`id_rekap_gaji_karyawan`) USING BTREE;

--
-- Indeks untuk tabel `status_karyawan`
--
ALTER TABLE `status_karyawan`
  ADD PRIMARY KEY (`id_status_karyawan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi_harian`
--
ALTER TABLE `absensi_harian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `bpjs`
--
ALTER TABLE `bpjs`
  MODIFY `id_bpjs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rekap_gaji`
--
ALTER TABLE `rekap_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rekap_gaji_karyawan`
--
ALTER TABLE `rekap_gaji_karyawan`
  MODIFY `id_rekap_gaji_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_karyawan`
--
ALTER TABLE `status_karyawan`
  MODIFY `id_status_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
