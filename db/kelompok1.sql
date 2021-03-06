-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Feb 2021 pada 13.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelompok1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nm_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nm_lengkap`, `email`, `alamat`, `foto`) VALUES
('firman', 'firman', 'firmansyah', 'firmansyahbolong@gmail.com', 'jl. paccerakkang', 'firman.jpg'),
('aswar', 'aswar', 'Aswar Sumarlin', 'Aswar18@mhs.akba.ac.id', 'jl. poros makasssar', 'aswar.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_pembelian`
--

CREATE TABLE `det_pembelian` (
  `id_detpembelian` int(10) NOT NULL,
  `id_keranjang` int(10) NOT NULL,
  `id_pembeli` int(10) NOT NULL,
  `id_kecamatan` int(10) NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('baru','lama','terkirim') NOT NULL DEFAULT 'baru',
  `tgl_pembelian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nm_kategori`) VALUES
(1, 'Baju'),
(2, 'Sepatu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(10) NOT NULL,
  `id_kota` int(10) NOT NULL,
  `nm_kecamatan` varchar(20) NOT NULL,
  `harga_ongkir` double(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kota`, `nm_kecamatan`, `harga_ongkir`) VALUES
(1, 1, 'Biring Kanaya', 20.000),
(8, 1, 'tamalanrea', 30.000),
(12, 1, 'Mamajang', 40.000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `nm_produk` varchar(50) NOT NULL,
  `harga` double(10,3) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tgl_keranjang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(10) NOT NULL,
  `id_provinsi` int(10) NOT NULL,
  `nm_kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `id_provinsi`, `nm_kota`) VALUES
(1, 1, 'Makassar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(10) NOT NULL,
  `nm_pembeli` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nm_pembeli`, `email`, `alamat`) VALUES
(1, 'rany', 'rany@GMAIL.COM', 'jl. paccerakkang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(10) NOT NULL,
  `id_pembeli` int(10) NOT NULL,
  `penilaian` enum('bagus','sangat_bagus','kurang_bagus') NOT NULL DEFAULT 'bagus',
  `alasan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `nm_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(20) NOT NULL,
  `ukuran` enum('S','L','M','XL','XXL','39','40','41') NOT NULL DEFAULT 'S',
  `harga` double(10,3) NOT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nm_produk`, `deskripsi`, `gambar`, `ukuran`, `harga`, `stok`) VALUES
(1, 'BAJU BLOUSE OWLY TOP', '•OWLY TOP •Bahan : BEAUTY CREPE •Ukuran : Allsize Fit to L ( LD 103 )\r\n', 'wq.PNG', 'M', 79.000, 10),
(2, 'BOXY V-NECK VIONA', '•BAHAN : RAJUT SALUR  •PANJANG : 64 CM  •PANJANG TANGAN : 48 CM  •ALL SIZE VIT TO L', 'DEWD.png', 'L', 65.000, 10),
(3, 'CELANA CHINO CARGO', '•Bahan : American Drill ( Karakteristik : Tebal , kokoh, tidak melar , menyerap keringat, merupakan jenis kain yg tahan lama & kuat )  •Size : Fit to L  •Panjang : 88 - 90 cm  •Lingkar Pinggang : 60 - 100 ( melar )', 'CCK1.PNG', '41', 64.000, 10),
(4, 'BAGGY CARGO ALENA', '•	MATERIAL : American Drill ( Twill Import ) Tebal, Adem, Tidak melar , dan Super bagusss bangettttt  •	SIZE : All size fit to XL  •	PANJANG : 90-92 cm   •	LINGKAR PINGGANG : 65 cm ( PINGGANG KARET BELAKANG )', 'BCA.PNG', 'L', 78.000, 10),
(5, 'KEMEJA FLANEL PRIA', '•	BAHAN : RAJUT SALUR  •	PANJANG : 64 CM  •	PANJANG TANGAN : 48 CM  •	ALL SIZE VIT TO L', 'KFP.png', 'L', 95.000, 12),
(6, 'OSELA BLOUSE', '•	NAMA BARANG : OSELA BLOUSE  •	BAHAN : MOSHCREPE  •	UKURAN :ALL SIZE FIT TO L **  •	BAJU : 100 CM , PANJANG 50 CM', 'OB.PNG', 'L', 74.000, 10),
(7, 'BAJU KOKO PRADA BORDIR', '•	Bahan : Katun Prima - Adem - Halus - Tidak Licin - Mudah disetrika / Tidak mudah Kusut - Nyaman dipakai  •	Ukuran : M - Lingkar Dada 108 CM, Panjang 70 CM  L - Lingkar Dada 110 CM, Panjang 71 CM  XL - Lingkar Dada 115 CM, Panjang 74 CM', 'BAJU_KOKO.PNG', 'L', 90.000, 10),
(8, 'JOGGER PRIA DOUBLE ZIPPER', '•	- Original AZKAR   •	Bahan Nyaman  •	Jahitan Kuat Dan Rapi  •	Bahan Babyterry  •	Cutting Slimfit sehingga kaki terlihat lebih panjang  •	Unisex ( Cewek/Cowok )', 'JOGGER_PRIA.PNG', 'L', 110.000, 12),
(9, 'DAISY JOGGER PANTS EMBROIDERY', 'Ukuran : All Size   LP : 95Cm  PJ : 85Cm  Bahan : Spandex', 'DAISI_JOGER.PNG', 'M', 20.000, 11),
(10, 'BOYFRIEND JEANS JESSICA', '•	BAHAN JEANS, HALUS, TIDAK BEGITU TEBAL TAPI JUGA TIDAK TIPIS COCOK UNTUK FORMAL ATAUPUN CASUAL •	PANJANG -/+ 90 cm  •	LINGKAR PINGGANG -/+ 74CM (BELUM MELAR)  •	LINGKAR PAHA -/+ 56CM', 'BJJ.PNG', 'L', 50.000, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(10) NOT NULL,
  `nm_provinsi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nm_provinsi`) VALUES
(1, 'Sulawesi Selatan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `det_pembelian`
--
ALTER TABLE `det_pembelian`
  ADD PRIMARY KEY (`id_detpembelian`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_keranjang` (`id_keranjang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `det_pembelian`
--
ALTER TABLE `det_pembelian`
  MODIFY `id_detpembelian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `det_pembelian`
--
ALTER TABLE `det_pembelian`
  ADD CONSTRAINT `det_pembelian_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `det_pembelian_ibfk_3` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `det_pembelian_ibfk_4` FOREIGN KEY (`id_keranjang`) REFERENCES `keranjang` (`id_keranjang`);

--
-- Ketidakleluasaan untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`);

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kota_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`);

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
