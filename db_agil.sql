-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Des 2023 pada 16.16
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_agil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int NOT NULL,
  `alternatif` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id`, `alternatif`, `keterangan`) VALUES
(8, 'loa janan ilir', 'A1'),
(9, 'Palaran', 'A2'),
(10, 'Samarinda Ilir', 'A3'),
(11, 'Samarinda Kota', 'A4'),
(12, 'Samarinda Seberang', 'A5'),
(13, 'Samarinda Ulu', 'A6'),
(14, 'Samarinda Utara', 'A7'),
(15, 'Sambutan', 'A8'),
(16, 'Sungai Kunjang', 'A9'),
(17, 'Sungai Pinang', 'A10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataal`
--

CREATE TABLE `dataal` (
  `id` int UNSIGNED NOT NULL DEFAULT '0',
  `alternatif` varchar(25) DEFAULT NULL,
  `c1` float DEFAULT NULL,
  `c2` float DEFAULT NULL,
  `c3` float DEFAULT NULL,
  `c4` float DEFAULT NULL,
  `c5` float DEFAULT NULL,
  `c6` float DEFAULT NULL,
  `c7` float DEFAULT NULL
) ;

--
-- Dumping data untuk tabel `dataal`
--

INSERT INTO `dataal` (`id`, `alternatif`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`) VALUES
(1, 'loa janan ilir', 20, 347, 11, 3612, 5385, 4, 39),
(2, 'Palaran', 39, 381, 22, 1901, 2607, 2, 23),
(3, 'Samarinda Ilir', 172, 282, 36, 2438, 8547, 1, 20),
(4, 'Samarinda Kota', 230, 400, 25, 782, 8054, 4, 19),
(5, 'Samarinda Seberang', 987, 435, 46, 2959, 7960, 3, 22),
(6, 'Samarinda Ulu', 638, 186, 8, 4653, 3471, 1, 61),
(7, 'Samarinda Utara', 75, 230, 11, 719, 9977, 4, 64),
(8, 'Sambutan', 453, 294, 13, 4765, 2461, 5, 44),
(9, 'Sungai Kunjang', 867, 408, 40, 771, 6010, 2, 85),
(10, 'Sungai Pinang', 721, 505, 49, 2320, 2010, 2, 76);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataal_buff`
--

CREATE TABLE `dataal_buff` (
  `id` int UNSIGNED NOT NULL,
  `alternatif` varchar(25) DEFAULT NULL,
  `c1` float DEFAULT NULL,
  `c2` float DEFAULT NULL,
  `c3` float DEFAULT NULL,
  `c4` float DEFAULT NULL,
  `c5` float DEFAULT NULL,
  `c6` float DEFAULT NULL,
  `c7` float DEFAULT NULL
) ;

--
-- Dumping data untuk tabel `dataal_buff`
--

INSERT INTO `dataal_buff` (`id`, `alternatif`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`) VALUES
(1, 'loa janan ilir', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Palaran', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Samarinda Ilir', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Samarinda Kota', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Samarinda Seberang', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Samarinda Ulu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Samarinda Utara', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Sambutan', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Sungai Kunjang', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Sungai Pinang', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `bobot` float NOT NULL,
  `attribut` varchar(255) NOT NULL
) ;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `kriteria`, `bobot`, `attribut`) VALUES
(38, 'c1', 6, 'benefit'),
(39, 'c2', 4, 'benefit'),
(40, 'c3', 3, 'benefit'),
(41, 'c4', 3, 'cost'),
(42, 'c5', 5, 'cost'),
(43, 'c6', 2, 'benefit'),
(45, 'c7', 4, 'cost');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rankwp`
--

CREATE TABLE `rankwp` (
  `id` int DEFAULT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `Rank` int DEFAULT NULL,
  `NilaiV` float DEFAULT NULL
) ;

--
-- Dumping data untuk tabel `rankwp`
--

INSERT INTO `rankwp` (`id`, `Nama`, `Rank`, `NilaiV`) VALUES
(1, 'Sungai Pinang', 1, 0.1469),
(2, 'Samarinda Seberang', 2, 0.1429),
(3, 'Sungai Kunjang', 3, 0.1315),
(4, 'Samarinda Kota', 4, 0.1152),
(5, 'Sambutan', 5, 0.1089),
(6, 'Samarinda Ilir', 6, 0.0834),
(7, 'Samarinda Ulu', 7, 0.0827),
(8, 'Palaran', 8, 0.0784),
(9, 'Samarinda Utara', 9, 0.0612),
(10, 'loa janan ilir', 10, 0.0489);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'agil', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dataal_buff`
--
ALTER TABLE `dataal_buff`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `dataal_buff`
--
ALTER TABLE `dataal_buff`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
