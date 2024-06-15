-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2021 pada 04.48
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

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
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absen`, `tgl`, `waktu`, `keterangan`, `id_user`) VALUES
(4, '2019-07-25', '07:21:53', 'Masuk', 6),
(5, '2019-07-26', '09:00:47', 'Masuk', 6),
(6, '2019-07-26', '16:01:03', 'Pulang', 6),
(7, '2019-07-25', '17:01:28', 'Pulang', 6),
(8, '2021-07-27', '11:34:08', 'Masuk', 7),
(9, '2021-07-27', '12:28:36', 'Masuk', 8),
(10, '2021-07-27', '17:31:06', 'Pulang', 8),
(11, '2021-07-27', '17:31:17', 'Masuk', 8),
(12, '2021-07-27', '17:31:40', 'Masuk', 8),
(13, '2021-07-27', '17:32:00', 'Pulang', 7),
(14, '2021-07-27', '17:32:31', 'Masuk', 7),
(15, '2021-07-27', '17:35:42', 'Masuk', 6),
(16, '2021-07-27', '17:35:48', 'Pulang', 6),
(17, '2021-07-28', '10:34:22', 'Masuk', 8),
(18, '2021-07-29', '10:13:10', 'Masuk', 8),
(19, '2021-07-29', '11:36:55', 'Masuk', 6),
(20, '2021-07-30', '09:25:27', 'Masuk', 7),
(21, '2021-07-30', '19:01:43', 'Pulang', 7),
(22, '2021-08-02', '08:18:47', 'Masuk', 7),
(23, '2021-08-02', '18:44:26', 'Pulang', 7),
(24, '2021-08-03', '00:08:46', 'Masuk', 7),
(25, '2021-08-03', '18:07:40', 'Pulang', 7),
(26, '2021-08-04', '09:04:43', 'Masuk', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` smallint(3) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(2, 'Teknik'),
(5, 'Broadcast'),
(6, 'SDM'),
(7, 'pro 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id_info` int(11) NOT NULL,
  `judul_info` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id_info`, `judul_info`, `isi`, `file`) VALUES
(4, 'LIBUR NASIONAL', 'PPKM DARURAT ', '29-42.pdf'),
(5, 'Baca dan Like/Love Artikel-artikel dibawah', 'okeee', 'Price_List_Wedding_Party_Rosa_(2).pdf'),
(6, 'Hari Kemerdekaan', 'Hari Kemerdekaan 17 Agustus 2021', '293.pdf'),
(7, 'Grup Baru WhatsApp PKL', 'Silakan salin url untuk masuk ke grup : https://wa.me/6282140224518', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam`
--

CREATE TABLE `jam` (
  `id_jam` tinyint(1) NOT NULL,
  `start` time NOT NULL,
  `finish` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jam`
--

INSERT INTO `jam` (`id_jam`, `start`, `finish`, `keterangan`) VALUES
(1, '08:00:00', '09:00:00', 'Masuk'),
(2, '16:00:00', '19:00:00', 'Pulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `tanggal`, `id_user`) VALUES
(1, 'Save Belajar Bersama Rabu 28 Juli 2021, Edit rekaman', '2021-08-02', 6),
(2, 'Kentongan', '2021-08-03', 6),
(3, 'Belajar Bersama, Lintas Malang Siang', '2021-08-05', 7),
(4, 'Lintas Malang Siang', '2021-08-04', 7),
(5, 'Kentongan, Edit Rekaman Musik 2, Edit Rekaman Musik 3', '2021-08-04', 9),
(6, 'Kentongan, Edit Rekaman Musik 2, Edit Rekaman Musik 3', '2021-08-05', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longitude` varchar(250) NOT NULL,
  `accuracy` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `tanggal`, `waktu`, `latitude`, `longitude`, `accuracy`, `id_user`, `status`) VALUES
(1, '2021-08-04', '20:15:44', '-7.930924399999999', '112.6329129', '1309', 7, 'Hadir'),
(2, '2021-08-05', '14:48:34', '-7.936575', '112.619122', '500', 7, 'Hadir'),
(4, '2021-08-05', '21:05:18', '-7.930939', '112.636772', '178', 6, 'Hadir'),
(5, '2021-08-05', '21:15:20', '-7.930939', '112.636772', '178', 9, 'Hadir'),
(6, '2021-08-06', '09:39:43', '-7.5360639', '112.2384017', '562638', 9, 'Hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` smallint(5) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(20) DEFAULT 'no-foto.png',
  `divisi` smallint(5) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` enum('Manager','Karyawan') NOT NULL DEFAULT 'Karyawan',
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nik`, `nama`, `telp`, `email`, `foto`, `divisi`, `username`, `password`, `level`, `nama_kegiatan`, `tanggal`) VALUES
(1, '1223122313', 'Admin', '08139212092', 'admin@mail.com', '1627394425.png', NULL, 'admin', '$2y$10$kY1x9hWkO8HmPQ4UImpbxOP890ZSGy8yGfzS9zz39.OXxDfwLGJIe', 'Manager', '', '0000-00-00'),
(6, '123456789101112', 'Anissa Rahma', '08151231902', 'anissa.rhm31@mail.com', '1564293217.png', 5, 'anissa', '$2y$10$2kexYaZKVXX/5Liljm2FXO0Zk7BI5LUQgOTz1bRIf211eraxpju2a', 'Karyawan', 'Menyimpan siaran belajar bersama', '2021-07-30'),
(7, '1223122313', 'Willy', '081231238', 'willy@gmail.com', '1627361461.jpg', 2, 'willy', '$2y$10$XOTaOG9NnSBE8fQeKbwMf.XXE.wgV/VKPuuQlkAIQTAGdANwBOYny', 'Karyawan', '', '0000-00-00'),
(9, '3578909876567', 'Livia Yurike', '082228773286', 'kliviayurike@gmail.com', '1627716903.png', 5, 'livia', '$2y$10$FS/vEGun6M4yQH.s9kEv.eDsaLtr2kc3MT1xI/M3cDCMeqweR1qKi', 'Karyawan', 'RBO', '2021-07-31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_info`);

--
-- Indeks untuk tabel `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
