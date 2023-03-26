-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Mar 2023 pada 10.47
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uk_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `idkelas` int(11) NOT NULL,
  `idtarif` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`idkelas`, `idtarif`, `kelas`, `jurusan`) VALUES
(1, 2, '12', 'RPL 1'),
(2, 1, '11', 'MM 1'),
(3, 3, '10', 'AN 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `No` int(10) NOT NULL,
  `IdPembayaran` varchar(13) NOT NULL,
  `Jumlah` float NOT NULL,
  `Tgl` date NOT NULL,
  `Tgl_Bayar` int(11) NOT NULL,
  `Nama_Siswa` varchar(35) NOT NULL,
  `Nama_Petugas` varchar(35) NOT NULL,
  `Angkatan` varchar(6) NOT NULL,
  `NIP` int(11) NOT NULL,
  `Nis` int(11) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`No`, `IdPembayaran`, `Jumlah`, `Tgl`, `Tgl_Bayar`, `Nama_Siswa`, `Nama_Petugas`, `Angkatan`, `NIP`, `Nis`, `keterangan`) VALUES
(1, '100109202019', 700000, '2020-09-19', 2023, 'Gung Nanda', 'Putu ardi setiwande', '2020', 120111, 1001, 'Lunas'),
(2, '100206202519', 750000, '2025-06-19', 2023, 'Cok Adi Mahes Yogik', 'Putu ardi setiwande', '2022', 120111, 1002, 'Lunas'),
(3, '100307202119', 650000, '2021-07-19', 2023, 'Ni Luh Ayu Sri Wardani', 'Ni Luh Made Ariani', '2021', 190870, 1003, 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `Nama_Petugas` varchar(35) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `NIP` int(11) NOT NULL,
  `Jabatan` varchar(10) NOT NULL,
  `tlp` varchar(13) NOT NULL,
  `Alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`Nama_Petugas`, `Password`, `NIP`, `Jabatan`, `tlp`, `Alamat`) VALUES
('Putu ardi setiwande', 'admin', 120111, 'admin', '087861866327', 'ije kaden'),
('Ni Luh Made Ariani', 'luhde', 190870, 'petugas', '089765233112', 'jalan ije kaden no 2'),
('Ida Bagus Putu Wirawan', 'gustu', 852973, 'admin', '081234567890', 'Jalan Raya Ubud No. 45, Banjar Teges Kanginan, Desa Peliatan, Kecamatan Ubud, Kabupaten Gianyar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `NISN` int(11) NOT NULL,
  `Nama_Siswa` varchar(35) NOT NULL,
  `idkelas` int(10) NOT NULL,
  `Tlp` varchar(13) NOT NULL,
  `Nis` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`NISN`, `Nama_Siswa`, `idkelas`, `Tlp`, `Nis`, `Password`, `Alamat`) VALUES
(32098711, 'Gung Nanda', 1, '087765432109', 1001, 'zayuran', 'Jalan Raya Kuta No. 25, Banjar Anyar, Kelurahan Kuta, Kecamatan Kuta, Kabupaten Badung, Bali '),
(32456763, 'Cok Adi Mahes Yogik', 3, '082345678901', 1002, 'cok adi', 'Jalan Raya Seminyak No. 67, Banjar Padang Tegal, Kelurahan Seminyak, Kecamatan Kuta Utara, Kabupaten'),
(67239015, 'Ni Luh Ayu Sri Wardani', 2, '087765432109', 1003, 'LuhAyu', 'Jalan Dewi Sri No. 23, Kuta, Kabupaten Badung, Bali 80361');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id` int(4) NOT NULL,
  `Angkatan` varchar(6) NOT NULL,
  `tipe` varchar(7) NOT NULL,
  `Nominal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`id`, `Angkatan`, `tipe`, `Nominal`) VALUES
(1, '2021', 'Reguler', 650000),
(2, '2020', 'Laptop', 700000),
(3, '2022', 'Reguler', 750000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`),
  ADD KEY `Fk_Nominal` (`idtarif`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`IdPembayaran`),
  ADD UNIQUE KEY `No` (`No`),
  ADD KEY `Fk_NIP` (`NIP`),
  ADD KEY `Fk_Nis` (`Nis`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`NIP`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`Nis`) USING BTREE,
  ADD UNIQUE KEY `NISN` (`NISN`),
  ADD KEY `Fk_kelas` (`idkelas`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `Fk_Nominal` FOREIGN KEY (`idtarif`) REFERENCES `tarif` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `Fk_NIP` FOREIGN KEY (`NIP`) REFERENCES `petugas` (`NIP`),
  ADD CONSTRAINT `Fk_Nis` FOREIGN KEY (`Nis`) REFERENCES `siswa` (`Nis`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `Fk_kelas` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`idkelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
