-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 11:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kelurahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `level`, `username`, `password`, `foto`, `status`) VALUES
(1, 'Muhammad Faisal', 'Admin', 'admin', 'admin', 'pic5.jpg', 'Aktif'),
(7, 'Hasanah Sanah', 'Pimpinan', 'sanah123', 'sanah123', 'user.png', 'Aktif'),
(9, 'udin', 'Admin', 'udin', 'udin', 'img-avatar-1.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Kristen Katolik'),
(4, 'Hindu'),
(5, 'Buddha'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `bp_menikah`
--

CREATE TABLE `bp_menikah` (
  `id_bp_menikah` int(11) NOT NULL,
  `no_bp_menikah` varchar(100) NOT NULL,
  `id_jenis_surat` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `keperluan` text NOT NULL,
  `pengantar_rt` varchar(100) NOT NULL,
  `fc_ktp` varchar(100) NOT NULL,
  `fc_kk` varchar(100) NOT NULL,
  `pernyataan` varchar(100) NOT NULL,
  `status_bp_menikah` varchar(100) NOT NULL,
  `alasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bp_menikah`
--

INSERT INTO `bp_menikah` (`id_bp_menikah`, `no_bp_menikah`, `id_jenis_surat`, `id_warga`, `tgl_pengajuan`, `keperluan`, `pengantar_rt`, `fc_ktp`, `fc_kk`, `pernyataan`, `status_bp_menikah`, `alasan`) VALUES
(1, '474.2 / 01 / KESRA-HB / 2025', 4, 2, '2025-01-15', 'Ingin melamar pekerjaan dikantor\r\n', 'rt.jpg', 'ktp.jpg', 'kartukeluarga.jpg', 'pernyataan belum menikah.png', 'Acc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `darah`
--

CREATE TABLE `darah` (
  `id_darah` int(11) NOT NULL,
  `darah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `darah`
--

INSERT INTO `darah` (`id_darah`, `darah`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'AB'),
(4, 'O'),
(5, 'A+'),
(6, 'B+'),
(7, 'AB+'),
(8, 'O+'),
(9, 'A-'),
(10, 'B-'),
(11, 'AB-'),
(12, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `domisili`
--

CREATE TABLE `domisili` (
  `id_domisili` int(11) NOT NULL,
  `no_domisili` varchar(100) NOT NULL,
  `id_jenis_surat` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `keperluan` text NOT NULL,
  `pengantar_rt` varchar(100) NOT NULL,
  `fc_ktp` varchar(100) NOT NULL,
  `fc_kk` varchar(100) NOT NULL,
  `status_domisili` varchar(100) NOT NULL,
  `alasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domisili`
--

INSERT INTO `domisili` (`id_domisili`, `no_domisili`, `id_jenis_surat`, `id_warga`, `tgl_pengajuan`, `keperluan`, `pengantar_rt`, `fc_ktp`, `fc_kk`, `status_domisili`, `alasan`) VALUES
(1, '471.2 / 01 / KESRA-HB / 2025', 2, 2, '2025-01-15', 'Melamar pekerjaan', 'rt.jpg', 'ktp.jpg', 'kartukeluarga.jpg', 'Acc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Lurah'),
(2, 'Sekretaris Lurah'),
(3, 'Kepala Urusan Umum'),
(4, 'Kepala Urusan Keuangan'),
(5, 'Kepala Urusan Pemerintahan'),
(6, 'Kepala Urusan Pembangunan'),
(7, 'Kepala Urusan Kesejahteraan Rakyat'),
(8, 'Kepala Seksi Pelayanan'),
(9, 'Kepala Seksi Ketertiban'),
(10, 'Kepala Seksi Perencanaan'),
(11, 'Kepala Seksi Pemerintahan'),
(12, 'Kepala Seksi Pembangunan'),
(13, 'Kepala Seksi Kesejahteraan'),
(14, 'Staf Administrasi Umum'),
(15, 'Staf Administrasi Keuangan'),
(16, 'Staf Pemerintahan'),
(17, 'Staf Pembangunan'),
(18, 'Staf Kesejahteraan'),
(19, 'Tenaga Pendamping Masyarakat'),
(20, 'Operator Sistem Informasi'),
(21, 'Pengelola Data Administrasi Kependudukan'),
(22, 'Petugas Pelayanan Publik');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id_jenis_surat` int(11) NOT NULL,
  `kode_surat` varchar(10) NOT NULL,
  `nama_surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`id_jenis_surat`, `kode_surat`, `nama_surat`) VALUES
(1, '471', 'Surat Keterangan Usaha'),
(2, '471.2', 'Surat Keterangan Domisili'),
(3, '460', 'Surat Keterangan Tidak Mampu'),
(4, '474.2', 'Surat Keterangan Belum Pernah Menikah'),
(5, '470', 'Surat Pengantar SKCK');

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `id_meta` int(11) NOT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `pimpinan` varchar(255) DEFAULT NULL,
  `singkat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id_meta`, `instansi`, `telp`, `email`, `alamat`, `logo`, `pimpinan`, `singkat`) VALUES
(1, 'Kelurahan Handil Bakti', '(0511) 4312486', 'kelurahan_handilbakti@gmail.com', 'Jl. Trans - Kalimantan, Handil Bakti, Kec. Alalak, Kabupaten Barito Kuala, 70582', 'barito.png', 'M. Isra Ruspandiary, SE.,Msi', 'App Kelurahan');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tmp` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `upass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `id_jabatan`, `tmp`, `tgl`, `alamat`, `nohp`, `email`, `upass`) VALUES
(3, '5206085405880029', 'Haidi Rahman', 20, 'Banjarmasin', '2025-01-07', 'Jl. Banjarmasin', '08872367621', 'haidiaaa@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(1, 'Dokter'),
(2, 'Guru'),
(3, 'Pengusaha'),
(4, 'Polisi'),
(5, 'Perawat'),
(6, 'Insinyur'),
(7, 'Narasumber'),
(8, 'Petani'),
(9, 'Pekerja Kantoran'),
(10, 'Arsitek');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'Tidak Sekolah'),
(2, 'Tidak Tamat SD'),
(3, 'SD'),
(4, 'SMP'),
(5, 'Tidak Tamat SMP'),
(6, 'SMA'),
(7, 'Tidak Tamat SMA'),
(8, 'Diploma 1'),
(9, 'Diploma 2'),
(10, 'Diploma 3'),
(11, 'Diploma 4'),
(12, 'S1 (Sarjana)'),
(13, 'S2 (Magister)'),
(14, 'S3 (Doktor)');

-- --------------------------------------------------------

--
-- Table structure for table `skck`
--

CREATE TABLE `skck` (
  `id_skck` int(11) NOT NULL,
  `no_skck` varchar(100) NOT NULL,
  `id_jenis_surat` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `keterangan` text NOT NULL,
  `pengantar_rt` varchar(100) NOT NULL,
  `fc_ktp` varchar(100) NOT NULL,
  `fc_kk` varchar(100) NOT NULL,
  `fc_akta` varchar(100) NOT NULL,
  `pas_foto` varchar(100) NOT NULL,
  `status_skck` varchar(100) NOT NULL,
  `alasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tidak_mampu`
--

CREATE TABLE `tidak_mampu` (
  `id_tidak_mampu` int(11) NOT NULL,
  `no_tidak_mampu` varchar(100) NOT NULL,
  `id_jenis_surat` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `keperluan` text NOT NULL,
  `pengantar_rt` varchar(100) NOT NULL,
  `fc_ktp` varchar(100) NOT NULL,
  `fc_kk` varchar(100) NOT NULL,
  `status_tidak_mampu` varchar(100) NOT NULL,
  `alasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usaha`
--

CREATE TABLE `usaha` (
  `id_usaha` int(11) NOT NULL,
  `no_usaha` varchar(100) NOT NULL,
  `id_jenis_surat` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `jenis_usaha` varchar(100) NOT NULL,
  `nama_usaha` varchar(100) NOT NULL,
  `alamat_usaha` varchar(255) NOT NULL,
  `keperluan` text NOT NULL,
  `pengantar_rt` varchar(100) NOT NULL,
  `fc_ktp` varchar(100) NOT NULL,
  `fc_kk` varchar(100) NOT NULL,
  `fc_pbb` varchar(100) NOT NULL,
  `foto_usaha` varchar(100) NOT NULL,
  `status_usaha` varchar(100) NOT NULL,
  `alasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usaha`
--

INSERT INTO `usaha` (`id_usaha`, `no_usaha`, `id_jenis_surat`, `id_warga`, `tgl_pengajuan`, `jenis_usaha`, `nama_usaha`, `alamat_usaha`, `keperluan`, `pengantar_rt`, `fc_ktp`, `fc_kk`, `fc_pbb`, `foto_usaha`, `status_usaha`, `alasan`) VALUES
(1, '471 / 01 / KESRA-HB / 2025', 1, 2, '2025-01-15', 'Sembako', 'Toko Sembako', 'Jl Pasar Pahlawan', 'Mengajukan modal usaha KUR Bank BRI', 'rt.jpg', 'ktp.jpg', 'kartukeluarga.jpg', 'pbblunas.jpg', 'pt_kumalacentral.jpg', 'Acc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id_warga` int(11) NOT NULL,
  `nik_warga` varchar(20) NOT NULL,
  `nama_warga` varchar(100) NOT NULL,
  `jk_warga` varchar(10) NOT NULL,
  `tmp_warga` varchar(100) NOT NULL,
  `tgl_warga` date NOT NULL,
  `alamat_warga` varchar(255) NOT NULL,
  `rt_warga` varchar(10) NOT NULL,
  `rw_warga` varchar(10) NOT NULL,
  `email_warga` varchar(100) NOT NULL,
  `nohp_warga` varchar(15) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `id_darah` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `status_nikah` varchar(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `upass` varchar(100) NOT NULL,
  `status_akun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id_warga`, `nik_warga`, `nama_warga`, `jk_warga`, `tmp_warga`, `tgl_warga`, `alamat_warga`, `rt_warga`, `rw_warga`, `email_warga`, `nohp_warga`, `id_agama`, `id_darah`, `id_pekerjaan`, `id_pendidikan`, `status_nikah`, `uname`, `upass`, `status_akun`) VALUES
(1, '1231231231231231', 'Mahmuda Ramadhan', 'Laki-laki', 'Banjarmasin', '2021-10-05', 'Jl. Banjarmasin', '01', '01', 'mahmud_da@gmail.com', '08562387928', 1, 1, 2, 2, 'Menikah', 'mahmuda', 'mahmuda', 'Aktif'),
(2, '1267381263872168', 'Masnun', 'Perempuan', 'Banjarmasin', '1985-01-09', 'Jl. Banjarmasin', '01', '01', 'masnun@gmail.com', '08972362368', 1, 1, 3, 6, 'Menikah', 'masnun', 'masnun', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `bp_menikah`
--
ALTER TABLE `bp_menikah`
  ADD PRIMARY KEY (`id_bp_menikah`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`,`id_warga`);

--
-- Indexes for table `darah`
--
ALTER TABLE `darah`
  ADD PRIMARY KEY (`id_darah`);

--
-- Indexes for table `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`id_domisili`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`,`id_warga`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id_jenis_surat`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id_meta`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `skck`
--
ALTER TABLE `skck`
  ADD PRIMARY KEY (`id_skck`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`,`id_warga`);

--
-- Indexes for table `tidak_mampu`
--
ALTER TABLE `tidak_mampu`
  ADD PRIMARY KEY (`id_tidak_mampu`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`,`id_warga`);

--
-- Indexes for table `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id_usaha`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`,`id_warga`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`),
  ADD KEY `id_agama` (`id_agama`,`id_darah`,`id_pekerjaan`,`id_pendidikan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bp_menikah`
--
ALTER TABLE `bp_menikah`
  MODIFY `id_bp_menikah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `darah`
--
ALTER TABLE `darah`
  MODIFY `id_darah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `domisili`
--
ALTER TABLE `domisili`
  MODIFY `id_domisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id_jenis_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `id_meta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `skck`
--
ALTER TABLE `skck`
  MODIFY `id_skck` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tidak_mampu`
--
ALTER TABLE `tidak_mampu`
  MODIFY `id_tidak_mampu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
