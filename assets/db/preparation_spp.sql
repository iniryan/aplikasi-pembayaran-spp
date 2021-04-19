-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Apr 2021 pada 06.53
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `preparation_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(256) NOT NULL,
  `kompetensi_keahlian` varchar(256) NOT NULL,
  `dihapus` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`, `dihapus`) VALUES
(1, 'XII RPL A', 'Rekayasa Perangkat Lunak', 0),
(2, 'XII RPL B', 'Rekayasa Perangkat Lunak', 0),
(5, 'XII RPL C', 'Rekayasa Perangkat Lunak', 0),
(8, 'XII MM A', 'Multimedia', 1),
(9, 'XII MM C', 'Multimedia', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(256) NOT NULL,
  `tgl_bayar` date NOT NULL DEFAULT current_timestamp(),
  `bulan_dibayar` varchar(256) NOT NULL,
  `tahun_dibayar` varchar(256) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`) VALUES
(2, 1, '1087123456', '2019-04-12', 'Januari', '2019', 2, 250000),
(5, 11, '1087123456', '2019-04-12', 'Februari', '2019', 2, 250000),
(6, 1, '9913160053', '2021-04-13', 'Januari', '2021', 1, 250000),
(10, 11, '9878654300', '2021-04-14', 'Januari', '2021', 1, 250000),
(24, 1, '1099803456', '2021-04-16', 'Januari', '2021', 1, 250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` enum('Administrator','Petugas','s') NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `dihapus` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `level`, `status`, `dihapus`) VALUES
(1, 'Administrator', 'admin', '$2y$10$8m4LyrwBnfQ7cZUao7UgXu9oxBExo.eRqaB2Nop2YS1S1bP6MLyBu', 'Administrator', 1, 0),
(2, 'Ryan Adi', 'petugas1', '$2y$10$7lzVuRN0RTrkBnDdjJW99.d71rtds4EYLoOheycemjLMEbT9HqBm2', 'Petugas', 0, 0),
(4, 'Asmirandah', 'asmira', '$2y$10$qfRTpbpiJJSG0xpt/c.jCuR5uCS7jAq43JC0wZVGKeqb9HtVIZ7zW', 'Petugas', 1, 1),
(5, 'Mario Susano', 'mario', '$2y$10$IxQUCL4EitZ0s3VZTfnOxeiQHma5JkB0oygB0Cblif1W0Eg2Eckue', 'Petugas', 1, 0),
(6, 'Wira Pratama', 'wira', '$2y$10$keXU5.I9EYCNbEUFpd/I/uv1q86.o.T2TlNP1EiC4X2Porb9vOj26', 'Petugas', 1, 1),
(11, 'Ryan', 'ryan', '$2y$10$zg1P7lwPo71MQONkEdOeuugUXfqteH0RGN8SOBEWDl6Or9cmQPoGq', 'Petugas', 1, 0),
(18, 'Wira Permana', 'wirape', '$2y$10$va3IBQ.lzz97RvxLxtFKc.huRme6eA9TSXP7NgKFu.GpmMtBIOuYa', 'Petugas', 1, 0),
(25, 'Alfarizi Ahmad', 'alfa', '$2y$10$UaB4ddTonskdWukWWdVuKuudUm3C8RwtVXyLFCBrc0H6Yv3OZR0nG', 'Petugas', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(256) NOT NULL,
  `nis` varchar(256) NOT NULL,
  `nama_siswa` varchar(256) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `dihapus` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama_siswa`, `alamat`, `no_telepon`, `id_kelas`, `id_spp`, `dihapus`) VALUES
('0908712005', '197809003212', 'Irmawandi Subianto', 'Malang - Jawa Timur', '087955643223', 2, 3, 1),
('1087123456', '193351280132', 'Saito Gunawan', 'Malang - Jawa Timur', '082144806990', 1, 2, 0),
('1099803456', '197865043210', 'Ayu Saputri', 'Malang - Jawa Timur', '080877030121', 1, 1, 0),
('1456098777', '196654345212', 'Susi Susanti', 'Malang - Jawa Timur', '087890091201', 5, 1, 1),
('9878654300', '194821280021', 'Dimas Gandarwa', 'Malang - Jawa Timur', '085877245600', 2, 1, 0),
('9913160053', '195051289065', 'Ryan Adi Saputra', 'Malang - Jawa Timur', '083877534525', 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `dihapus` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`, `dihapus`) VALUES
(1, 2021, 250000, 0),
(2, 2019, 250000, 0),
(3, 2018, 300000, 0),
(9, 2017, 500000, 1),
(36, 2016, 300000, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `nisn` (`nisn`,`id_spp`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_spp`) REFERENCES `siswa` (`id_spp`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
