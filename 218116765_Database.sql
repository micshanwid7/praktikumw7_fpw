-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2021 pada 15.43
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `218116765`
--
CREATE DATABASE IF NOT EXISTS `218116765` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `218116765`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `id_booking` varchar(10) NOT NULL,
  `id_hotel` varchar(255) DEFAULT NULL,
  `nomor_hp` varchar(255) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `bayar` int(10) DEFAULT NULL,
  `status_booking` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `id_hotel`, `nomor_hp`, `check_in`, `check_out`, `bayar`, `status_booking`) VALUES
('B1', 'H1', '123', '2020-10-30', '2020-10-31', 1050000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel` (
  `id_hotel` varchar(10) NOT NULL,
  `nama_hotel` varchar(255) DEFAULT NULL,
  `alamat_hotel` varchar(255) DEFAULT NULL,
  `gambar_hotel` varchar(255) DEFAULT NULL,
  `harga_hotel` varchar(255) DEFAULT NULL,
  `id_voucher` varchar(3) DEFAULT NULL,
  `status_hotel` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nama_hotel`, `alamat_hotel`, `gambar_hotel`, `harga_hotel`, `id_voucher`, `status_hotel`) VALUES
('H1', 'Santika', 'Jalan Diponegoro nomor 100, Batu', 'https://pix10.agoda.net/hotelImages/124/1246280/1246280_16061017110043391702.jpg?s=1024x768', '1500000', 'V2', 1),
('H2', 'Indahayu', 'Jalan Jeruk nomor 50, Trawas', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10002834-8938bee6dd3c3c6aad6b75e09523044c.jpeg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit', '2000000', 'kos', 1),
('H3', 'Mahadewa', 'Jalan WR Supratman nomor 75, Tretes', 'https://asset.kompas.com/crops/ShY0XafxBK_OZSrcaRxPl-5ZC2I=/35x0:1235x800/750x500/data/photo/2019/10/23/5db0471cae3e8.jpg', '1350000', 'V3', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `nomor_hp` varchar(255) DEFAULT NULL,
  `saldo_user` int(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status_user` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `nomor_hp`, `saldo_user`, `email`, `password`, `status_user`) VALUES
(9, 'Shan', '123', 4059970, 'shan@gmail.com', 'Asasas123', 1),
(10, 'wido', '456', 0, 'wo@gmail.com', 'Sdsdsd123', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

DROP TABLE IF EXISTS `voucher`;
CREATE TABLE `voucher` (
  `id_voucher` varchar(3) NOT NULL,
  `kode_voucher` varchar(10) DEFAULT NULL,
  `potongan` int(3) DEFAULT NULL,
  `status_voucher` int(2) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `kode_voucher`, `potongan`, `status_voucher`, `deleted_at`) VALUES
('V1', 'KO01', 20, 0, '2020-10-28 13:31:02'),
('V2', 'KO02', 30, 1, NULL),
('V3', 'KO01', 15, 1, NULL),
('V4', 'KO05', 10, 0, '2020-10-29 01:19:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
