-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Des 2022 pada 06.28
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notebook`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `judul` varchar(255) NOT NULL,
  `badge` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `judul2` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wishlist`
--

INSERT INTO `wishlist` (`id`, `image`, `user`, `created`, `judul`, `badge`, `target`, `image2`, `judul2`, `deskripsi`) VALUES
(2, '6396ae9923efa.jpeg', 'akmal ranyan', '2022-12-10 14:10:34', 'Trip to Ibiza, spain', 'Holiday', 'Next Month', '6396ae9923f0a.jpeg', 'Trip To Ibiza', '                                            sareraw'),
(4, '6396b1df4de76.png', 'kemal', '2022-12-12 11:21:00', 'Watch Emilia-Romagna GP', 'Holiday', 'Next Month', '6396b1df4de86.png', 'Emilia-Romagna Grand Prix', '                                            located in Italy, Probably costs $200 or more, i can do it i guess');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
