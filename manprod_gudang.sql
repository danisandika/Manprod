-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2020 pada 21.01
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manprod_gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `kemasan` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status` int(11) NOT NULL,
  `barcode_string` varchar(20) NOT NULL,
  `barcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jenis_barang`, `qty`, `satuan`, `kemasan`, `keterangan`, `tgl_daftar`, `status`, `barcode_string`, `barcode`) VALUES
(3, 'HVS 100 gram', 'Kertas', 0, 'lembar', 'tidak ada', 'Untuk menulis menulis', '2020-07-25', 1, 'BRG0003', ''),
(4, 'Sepatu Geoff Max', 'sepatu', 100, 'Pasang', 'Box', 'Sepatu baru alhamdulillah', '2020-07-26', 1, 'BRG0004', ''),
(5, 'Lem G', 'Perekat', 0, 'Botol', 'Plastik', 'Lem yang sangat lengket', '2020-07-26', 1, 'BRG0005', ''),
(6, 'Lem Alteko', 'Perekat', 0, 'Botol', 'Plastik', 'Lem Mantap', '2020-07-26', 1, 'BRG6', 'BRG6.jpg'),
(7, 'Motor', 'Kendaraan', 0, 'Unit', 'Rangka', 'aa', '2020-07-26', 1, 'BRG0007', 'BRG0007.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_kry` int(11) NOT NULL,
  `nama_kry` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email_kry` varchar(50) NOT NULL,
  `sex` varchar(15) NOT NULL,
  `id_role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_kry`, `nama_kry`, `username`, `pass`, `email_kry`, `sex`, `id_role`, `status`) VALUES
(7, 'Admin', 'admin', 'admin', 'admin@gudangmanufatur.com', 'laki laki', 1, 1),
(8, 'toni', 'toni', 'toni', 'toni@gmail.com', 'laki laki', 2, 1),
(9, 'tono', '', '', 'tono@gmail.com', 'laki laki', 3, 1),
(10, 'Sugeng', '', '', 'sugeng@yahoo.com', 'laki laki', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama_role`, `deskripsi`) VALUES
(1, 'Admin', 'admin adalah yang mengurusi administrasi gudang'),
(2, 'Divisi Manufaktur', ''),
(3, 'Staff', 'Staff untuk membantu admin Mengolah gudang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `storage`
--

CREATE TABLE `storage` (
  `id_storage` int(11) NOT NULL,
  `area` varchar(50) NOT NULL,
  `id_barang` int(11) DEFAULT NULL COMMENT 'Diisi hanya jika ada transaksi barang masuk',
  `nama_barang` varchar(50) NOT NULL COMMENT 'Diisi hanya jika ada transaksi barang masuk',
  `jumlah` int(11) DEFAULT NULL COMMENT 'Diisi hanya jika ada transaksi barang masuk',
  `tgl_masuk` date NOT NULL,
  `racking` varchar(50) NOT NULL,
  `tingkat` int(11) NOT NULL,
  `no_racking` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0. Free 1.Isi 2.Full'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `storage`
--

INSERT INTO `storage` (`id_storage`, `area`, `id_barang`, `nama_barang`, `jumlah`, `tgl_masuk`, `racking`, `tingkat`, `no_racking`, `keterangan`, `status`) VALUES
(19, 'A (Macan Kumbang)', NULL, '', 0, '0000-00-00', 'Macan Kumbang Selatan', 1, 1, '', 0),
(20, 'A (Macan Kumbang)', 4, 'Sepatu', 100, '2020-07-26', 'Macan Kumbang Selatan', 2, 1, 'Masih sisa', 2),
(23, 'Harimau Selatan', NULL, '', NULL, '0000-00-00', 'Selatan Utara', 1, 1, 'Gud s', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `nama_contact_person` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_perusahaan`, `nama_contact_person`, `alamat`, `no_telp`, `email`, `status`) VALUES
(1, 'Polman Astra', 'atang sudrajat', 'Jl.Budi Utomo no.18 Jakarta', '0809019920', 'atang@gmail.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pengambilan`
--

CREATE TABLE `transaksi_pengambilan` (
  `id_trx` varchar(20) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_karyawan_bertugas` int(11) NOT NULL,
  `id_karyawan_ambil` int(11) NOT NULL,
  `tgl_diambil` date NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_pengambilan`
--

INSERT INTO `transaksi_pengambilan` (`id_trx`, `id_barang`, `qty`, `id_karyawan_bertugas`, `id_karyawan_ambil`, `tgl_diambil`, `deskripsi`, `status`) VALUES
('OUT20200726183259', 3, 6, 7, 8, '2020-07-26', 'Makasih pak Toni', 1),
('OUT20200726183335', 3, 6, 7, 10, '2020-07-26', 'Makasih pak Sugeng', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_penyimpanan`
--

CREATE TABLE `transaksi_penyimpanan` (
  `id_trx` varchar(20) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `qty_masuk` int(11) NOT NULL,
  `qty_rusak` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0. barang menunggu 1.barang sudah masuk storage'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_penyimpanan`
--

INSERT INTO `transaksi_penyimpanan` (`id_trx`, `id_barang`, `qty`, `qty_masuk`, `qty_rusak`, `id_karyawan`, `id_supplier`, `tgl_diterima`, `deskripsi`, `status`) VALUES
('IN20200726182521', 3, 12, 12, 0, 7, 1, '2020-07-26', 'Barang Oke', 1),
('IN20200726183012', 4, 120, 100, 20, 7, 1, '2020-07-26', 'Hola', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_kry`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id_storage`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `transaksi_pengambilan`
--
ALTER TABLE `transaksi_pengambilan`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_karyawan_bertugas` (`id_karyawan_bertugas`),
  ADD KEY `id_karyawan_ambil` (`id_karyawan_ambil`);

--
-- Indeks untuk tabel `transaksi_penyimpanan`
--
ALTER TABLE `transaksi_penyimpanan`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_kry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `storage`
--
ALTER TABLE `storage`
  MODIFY `id_storage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Ketidakleluasaan untuk tabel `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `transaksi_pengambilan`
--
ALTER TABLE `transaksi_pengambilan`
  ADD CONSTRAINT `transaksi_pengambilan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `transaksi_pengambilan_ibfk_2` FOREIGN KEY (`id_karyawan_bertugas`) REFERENCES `karyawan` (`id_kry`),
  ADD CONSTRAINT `transaksi_pengambilan_ibfk_3` FOREIGN KEY (`id_karyawan_ambil`) REFERENCES `karyawan` (`id_kry`);

--
-- Ketidakleluasaan untuk tabel `transaksi_penyimpanan`
--
ALTER TABLE `transaksi_penyimpanan`
  ADD CONSTRAINT `transaksi_penyimpanan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `transaksi_penyimpanan_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_kry`),
  ADD CONSTRAINT `transaksi_penyimpanan_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
