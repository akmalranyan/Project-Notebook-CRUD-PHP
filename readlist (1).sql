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
-- Struktur dari tabel `readlist`
--

CREATE TABLE `readlist` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descript` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `yr_published` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `readlist`
--

INSERT INTO `readlist` (`id`, `picture`, `title`, `descript`, `author`, `yr_published`, `price`) VALUES
(1, '6396af75cf34d.png', 'Warriors Journey', '           Chef Curry carried the team, great book                     ', 'Steve Kerr', '1999', '$100'),
(8, '6396af34b4f63.jpeg', 'Radiohead the book', 'which just crumbleeee and cry', 'Thom Yorke', '2121', '$1000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `readlist`
--
ALTER TABLE `readlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `readlist`
--
ALTER TABLE `readlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
