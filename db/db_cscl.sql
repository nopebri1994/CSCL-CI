-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Apr 2019 pada 19.43
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cscl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelompok`
--

CREATE TABLE `data_kelompok` (
  `id_datakelompok` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kelompok`
--

INSERT INTO `data_kelompok` (`id_datakelompok`, `id_mahasiswa`, `id_kelompok`) VALUES
(1, 1, 4),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip_dosen` varchar(20) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  `tempat` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(35) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip_dosen`, `nama_dosen`, `tempat`, `tanggal`, `jenis_kelamin`, `alamat`, `kontak`, `password`) VALUES
(1, '0023077601', 'Ismi Kaniawulan, S.T, M.T', 'Purwakarta', '1996-01-10', 'Laki-laki', 'Purwakarta', '085085085085', '123'),
(2, '2222', 'apa weh', '131231', '2018-09-08', 'Laki-laki', '1234123', '1234', '2222');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_hakakses` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_submenu` int(11) DEFAULT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id_hakakses`, `id_menu`, `id_submenu`, `level`) VALUES
(1, 1, NULL, 'admin'),
(2, 2, NULL, 'admin'),
(3, 3, NULL, 'admin'),
(4, 4, NULL, 'admin'),
(5, 5, NULL, 'admin'),
(6, NULL, 1, 'admin'),
(7, NULL, 2, 'admin'),
(8, NULL, 3, 'admin'),
(9, NULL, 4, 'admin'),
(10, 1, NULL, 'dosen'),
(11, 6, NULL, 'dosen'),
(12, NULL, 5, 'dosen'),
(13, NULL, 6, 'dosen'),
(14, NULL, 7, 'dosen'),
(15, NULL, 8, 'dosen'),
(16, 1, NULL, 'mahasiswa'),
(17, 6, NULL, 'mahasiswa'),
(18, NULL, 7, 'mahasiswa'),
(19, NULL, 8, 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kode_jurusan` varchar(5) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `kode_jurusan`, `nama_jurusan`) VALUES
(1, 'TIF', 'TEKNIK INFORMATIKA'),
(2, 'TI', 'TEKNIK INDUSTRI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(2) NOT NULL,
  `nama_kelas` varchar(7) NOT NULL,
  `tahun_ajaran` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `tahun_ajaran`) VALUES
(1, 'PA', 'PAGI A', 2014),
(2, 'MA', 'MALAM A', 2015),
(3, 'PB', 'PAGI B', 2016);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim_mahasiswa` varchar(10) NOT NULL,
  `nama_mahasiswa` varchar(30) NOT NULL,
  `tempat` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(35) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim_mahasiswa`, `nama_mahasiswa`, `tempat`, `tanggal`, `jenis_kelamin`, `alamat`, `kontak`, `id_jurusan`, `password`) VALUES
(1, '141351044', 'Defryan Tri Gusman', 'Purwakarta', '1996-01-20', 'Laki-laki', 'Purwakarta', 'defryantrigusman@gmail.com', 1, '123'),
(3, '3333', 'ada aja', 'purwakarta', '2018-09-14', 'Laki-laki', 'aaaa', 'aaaa', 1, '1111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_matakuliah` int(11) NOT NULL,
  `kode_matakuliah` varchar(5) NOT NULL,
  `nama_matakuliah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_matakuliah`, `kode_matakuliah`, `nama_matakuliah`) VALUES
(1, 'IF273', 'PEMROGRAMAN BERORIENTASI OBJEK'),
(2, 'DK171', 'METODE PENELITIAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `kode_pengguna` varchar(15) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `katasandi_pengguna` varchar(30) NOT NULL,
  `kategori_pengguna` enum('dosen','mahasiswa','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `kode_pengguna`, `nama_pengguna`, `katasandi_pengguna`, `kategori_pengguna`) VALUES
(1, '1111', 'Administrator', 'admin', 'admin'),
(2, '2222', 'Ismi Kaniawulan, S.T, M.T.', 'dosen', 'dosen'),
(3, '3333', 'Defryan Tri Gusman', 'mahasiswa', 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_submenu` varchar(30) NOT NULL,
  `icon_sub` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_menu`
--

INSERT INTO `sub_menu` (`id_submenu`, `id_menu`, `nama_submenu`, `icon_sub`, `link`) VALUES
(1, 5, 'Dosen', 'fa fa-circle-o', 'http://localhost/cscl/admin/manajemen_dosen'),
(2, 5, 'Man. Tenaga Pengajar', 'fa fa-circle-o', 'http://localhost/cscl/admin/manajemen_tenagapengajar'),
(3, 5, 'Mahasiswa', 'fa fa-circle-o', 'http://localhost/cscl/admin/manajemen_mahasiswa'),
(4, 5, 'Man. Kontrak Mata Kuliah', 'fa fa-circle-o', 'http://localhost/cscl/admin/manajemen_kontrakmatakuliah'),
(5, 6, 'Manajemen Ruang Obrolan', 'fa fa-circle-o', 'http://localhost/cscl/admin/manajemen_ruangobrolan'),
(6, 6, 'Kelompok', 'fa fa-circle-o', 'http://localhost/cscl/admin/manajemen_kelompok'),
(7, 6, 'Data Kelompok', 'fa fa-circle-o', 'http://localhost/cscl/admin/data_kelompok'),
(8, 6, 'Ruang Obrolan', 'fa fa-circle-o', 'http://localhost/cscl/admin/ruang_obrolan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_forum`
--

CREATE TABLE `tabel_forum` (
  `id_forum` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `isi_forum` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_topik` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_forum`
--

INSERT INTO `tabel_forum` (`id_forum`, `id_mahasiswa`, `isi_forum`, `tanggal`, `id_topik`, `id_dosen`) VALUES
(13, 1, 'Cek comment jaringan', '2018-09-30', 8, NULL),
(14, 1, 'cek comment RPL', '2018-09-30', 3, NULL),
(15, 1, 'cek comment RPL', '2018-09-30', 3, NULL),
(16, 1, 'dasd', '2018-09-30', 3, NULL),
(17, 1, 'test comment RPL', '2018-09-30', 3, NULL),
(18, 1, 'Test comment DATA MINING', '2018-09-30', 13, NULL),
(19, 1, 'aduuhhh', '2018-09-30', 3, NULL),
(20, 1, 'A', '2018-09-30', 3, NULL),
(21, NULL, 'as', '2018-09-30', 23, 2),
(22, 1, 'saya defriyan', '2018-09-30', 23, NULL),
(23, 3, 'sayaaaaaa', '2018-09-30', 23, NULL),
(24, 1, 'tes', '2019-04-03', 8, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kelompok`
--

CREATE TABLE `tabel_kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `nama_kelompok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_kelompok`
--

INSERT INTO `tabel_kelompok` (`id_kelompok`, `nama_kelompok`) VALUES
(1, 'Jaringan'),
(2, 'Pemrograman'),
(4, 'Basis Data');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_matkul`
--

CREATE TABLE `tabel_matkul` (
  `id_matkul` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_matakuliah` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_matkul`
--

INSERT INTO `tabel_matkul` (`id_matkul`, `id_dosen`, `id_matakuliah`, `id_jurusan`, `id_kelas`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_menu`
--

CREATE TABLE `tabel_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_menu`
--

INSERT INTO `tabel_menu` (`id_menu`, `nama_menu`, `link`, `icon`) VALUES
(1, 'Beranda', 'http://localhost/cscl/admin/beranda', 'fa fa-home'),
(2, 'Manajemen Mata Kuliah', 'http://localhost/cscl/admin/manajemen_matakuliah', 'fa fa-book'),
(3, 'Manajemen Jurusan', 'http://localhost/cscl/admin/manajemen_jurusan', 'fa fa-university'),
(4, 'Manajemen Kelas', 'http://localhost/cscl/admin/manajemen_kelas', 'fa fa-map-pin'),
(5, 'Manajemen Pengguna', '', 'fa fa-users'),
(6, 'Ruang Obrolan', '', 'fa fa-comments');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_mkm`
--

CREATE TABLE `tabel_mkm` (
  `id_mkm` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_matakuliah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_mkm`
--

INSERT INTO `tabel_mkm` (`id_mkm`, `id_mahasiswa`, `id_kelas`, `id_matakuliah`) VALUES
(1, 1, 1, 2),
(2, 3, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_topik`
--

CREATE TABLE `tabel_topik` (
  `id_topik` int(11) NOT NULL,
  `judul_topik` text NOT NULL,
  `isi_topik` text NOT NULL,
  `tanggal_topik` date NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_topik`
--

INSERT INTO `tabel_topik` (`id_topik`, `judul_topik`, `isi_topik`, `tanggal_topik`, `id_dosen`) VALUES
(3, 'RPL', 'Deskripsi', '2018-09-28', 1),
(8, 'JARINGAN', 'Deskripsi', '2018-09-28', 1),
(13, 'DATA MINING', 'Deskripsi', '2018-09-28', 1),
(21, '123', '123', '2018-09-29', 1),
(22, '123', '123', '2018-09-30', 1),
(23, 'AP', 'as', '2018-09-30', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_tujuantopik`
--

CREATE TABLE `tabel_tujuantopik` (
  `id_tujuantopik` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_kelompok` int(11) DEFAULT NULL,
  `id_topik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_tujuantopik`
--

INSERT INTO `tabel_tujuantopik` (`id_tujuantopik`, `id_kelas`, `id_kelompok`, `id_topik`) VALUES
(2, NULL, 2, 3),
(7, 1, NULL, 8),
(12, NULL, 4, 13),
(13, 1, NULL, 22),
(14, 1, NULL, 23);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_kelompok`
--
ALTER TABLE `data_kelompok`
  ADD PRIMARY KEY (`id_datakelompok`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_kelompok` (`id_kelompok`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hakakses`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_submenu` (`id_submenu`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD UNIQUE KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `kode_kelas` (`kode_kelas`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_matakuliah`),
  ADD UNIQUE KEY `kode_matakuliah` (`kode_matakuliah`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `kode_pengguna` (`kode_pengguna`);

--
-- Indeks untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id_submenu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `tabel_forum`
--
ALTER TABLE `tabel_forum`
  ADD PRIMARY KEY (`id_forum`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_topik` (`id_topik`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `tabel_kelompok`
--
ALTER TABLE `tabel_kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indeks untuk tabel `tabel_matkul`
--
ALTER TABLE `tabel_matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_matakuliah` (`id_matakuliah`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tabel_menu`
--
ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tabel_mkm`
--
ALTER TABLE `tabel_mkm`
  ADD PRIMARY KEY (`id_mkm`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_matakuliah` (`id_matakuliah`);

--
-- Indeks untuk tabel `tabel_topik`
--
ALTER TABLE `tabel_topik`
  ADD PRIMARY KEY (`id_topik`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `tabel_tujuantopik`
--
ALTER TABLE `tabel_tujuantopik`
  ADD PRIMARY KEY (`id_tujuantopik`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_kelompok` (`id_kelompok`),
  ADD KEY `id_topik` (`id_topik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_kelompok`
--
ALTER TABLE `data_kelompok`
  MODIFY `id_datakelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_hakakses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tabel_forum`
--
ALTER TABLE `tabel_forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tabel_kelompok`
--
ALTER TABLE `tabel_kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tabel_matkul`
--
ALTER TABLE `tabel_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_menu`
--
ALTER TABLE `tabel_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tabel_mkm`
--
ALTER TABLE `tabel_mkm`
  MODIFY `id_mkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tabel_topik`
--
ALTER TABLE `tabel_topik`
  MODIFY `id_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tabel_tujuantopik`
--
ALTER TABLE `tabel_tujuantopik`
  MODIFY `id_tujuantopik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_kelompok`
--
ALTER TABLE `data_kelompok`
  ADD CONSTRAINT `data_kelompok_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `data_kelompok_ibfk_2` FOREIGN KEY (`id_kelompok`) REFERENCES `tabel_kelompok` (`id_kelompok`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD CONSTRAINT `sub_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tabel_menu` (`id_menu`);

--
-- Ketidakleluasaan untuk tabel `tabel_forum`
--
ALTER TABLE `tabel_forum`
  ADD CONSTRAINT `tabel_forum_ibfk_1` FOREIGN KEY (`id_topik`) REFERENCES `tabel_topik` (`id_topik`),
  ADD CONSTRAINT `tabel_forum_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `tabel_forum_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Ketidakleluasaan untuk tabel `tabel_matkul`
--
ALTER TABLE `tabel_matkul`
  ADD CONSTRAINT `tabel_matkul_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`),
  ADD CONSTRAINT `tabel_matkul_ibfk_2` FOREIGN KEY (`id_matakuliah`) REFERENCES `mata_kuliah` (`id_matakuliah`),
  ADD CONSTRAINT `tabel_matkul_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `tabel_matkul_ibfk_4` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `tabel_mkm`
--
ALTER TABLE `tabel_mkm`
  ADD CONSTRAINT `tabel_mkm_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `tabel_mkm_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `tabel_mkm_ibfk_3` FOREIGN KEY (`id_matakuliah`) REFERENCES `mata_kuliah` (`id_matakuliah`);

--
-- Ketidakleluasaan untuk tabel `tabel_topik`
--
ALTER TABLE `tabel_topik`
  ADD CONSTRAINT `tabel_topik_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Ketidakleluasaan untuk tabel `tabel_tujuantopik`
--
ALTER TABLE `tabel_tujuantopik`
  ADD CONSTRAINT `tabel_tujuantopik_ibfk_1` FOREIGN KEY (`id_topik`) REFERENCES `tabel_topik` (`id_topik`),
  ADD CONSTRAINT `tabel_tujuantopik_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `tabel_tujuantopik_ibfk_3` FOREIGN KEY (`id_kelompok`) REFERENCES `tabel_kelompok` (`id_kelompok`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
