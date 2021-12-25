-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2021 pada 00.58
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(10) NOT NULL,
  `name1` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `name1`, `code`, `price`, `stok`, `image`) VALUES
(12, 'epson', 'epson-p900', 9999999.99, 4, 'epson-surecolor-p900.jpeg'),
(13, 'kambing', 'kambing1', 2000.00, 3, 'haikaltampan.jpg'),
(15, 'printer15', 'printer2', 800000.00, 4, 'haikaltampan.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang1`
--

CREATE TABLE `barang1` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` int(100) NOT NULL,
  `harga_satuan` decimal(65,0) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang1`
--

INSERT INTO `barang1` (`id_barang`, `nama_barang`, `jenis_barang`, `harga_satuan`, `stok_barang`, `foto`) VALUES
(7, 'sasa', 3, '10000000', 3, 'cart-icon.png'),
(11, 'sasa', 4, '10000000', 1, 'cart-icon.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `tgl_transaksi` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `status` enum('proses','batal','dibatalkan','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `id_user`, `id_barang`, `quantity`, `total_harga`, `status`) VALUES
(39, '05-12-2021', 9, '12', 33, '66000', 'dibatalkan'),
(40, '06-12-2021', 9, '12', 1, '10002000', 'selesai'),
(41, '06-12-2021', 9, '13', 1, '2000', 'selesai'),
(43, '07-12-2021', 9, '12', 1, '10000000', 'proses'),
(44, '08-12-2021', 9, '13', 3, '6000', 'selesai'),
(45, '08-12-2021', 9, '12', 3, '30006000', 'proses'),
(46, '08-12-2021', 9, '15', 4, '3200000', 'dibatalkan'),
(47, '08-12-2021', 9, '12', 1, '10000000', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `role` enum('penjual','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `role`) VALUES
(5, 'penjual', 'penjual', 'penjual', 'penjual'),
(9, 'pembeli', 'pembeli', 'pembeli', 'user'),
(12, 'wafi', 'wafi', 'wafi', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indeks untuk tabel `barang1`
--
ALTER TABLE `barang1`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `jenis_barang` (`jenis_barang`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `barang1`
--
ALTER TABLE `barang1`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
