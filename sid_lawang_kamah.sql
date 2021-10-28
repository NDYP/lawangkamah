-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 06:49 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sid_lawang_kamah`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `nama_album` varchar(30) NOT NULL,
  `tanggal_upload` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `gambar`, `nama_album`, `tanggal_upload`, `status`) VALUES
(8, '1.JPG', '1', '11-10-2021', 'Aktif'),
(9, '2.JPG', '2', '11-10-2021', 'Aktif'),
(10, '3.JPG', '3', '11-10-2021', 'Aktif'),
(11, '4.JPG', '4', '11-10-2021', 'Aktif'),
(12, '5.jpg', '5', '11-10-2021', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `isi` longtext NOT NULL,
  `tanggal_upload` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `gambar`, `isi`, `tanggal_upload`, `status`, `author`) VALUES
(7, 'Desa Lawang Kamah', 'IMG_3447.JPG', '<p>lawang kamah<br></p>', '11-10-2021', 'Aktif', 'admin'),
(8, 'Desa Lawang Kamah', 'IMG_3448.JPG', '<p>tampilan dari sungai<br></p>', '11-10-2021', 'Aktif', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `baner`
--

CREATE TABLE `baner` (
  `id_baner` int(11) NOT NULL,
  `foto_baner` varchar(225) NOT NULL,
  `status` varchar(20) NOT NULL,
  `active` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `baner`
--

INSERT INTO `baner` (`id_baner`, `foto_baner`, `status`, `active`) VALUES
(10, 'x.jpeg', 'Nonaktif', ''),
(12, 'IMG_3451.JPG', 'Nonaktif', ''),
(13, 'IMG_3447.JPG', 'Nonaktif', ''),
(14, '2439BBCC-424D-4459-9DA5-F659908FC5EC.JPG', 'Aktif', '');

-- --------------------------------------------------------

--
-- Table structure for table `bantuan`
--

CREATE TABLE `bantuan` (
  `id_bantuan` int(11) NOT NULL,
  `nama_bantuan` varchar(30) NOT NULL,
  `asal_dana` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `sasaran` varchar(20) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `masa_berlaku` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bantuan`
--

INSERT INTO `bantuan` (`id_bantuan`, `nama_bantuan`, `asal_dana`, `status`, `sasaran`, `keterangan`, `masa_berlaku`) VALUES
(12, 'BLT', 'Desa', 'Aktif', '', 'bantuan langsung', '');

-- --------------------------------------------------------

--
-- Table structure for table `bantuan_penerima`
--

CREATE TABLE `bantuan_penerima` (
  `id_bantuan_penerima` int(11) NOT NULL,
  `id_bantuan` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bantuan_penerima`
--

INSERT INTO `bantuan_penerima` (`id_bantuan_penerima`, `id_bantuan`, `id_penerima`) VALUES
(2, 11, 9),
(3, 11, 12),
(4, 12, 22),
(5, 12, 23),
(6, 12, 27);

-- --------------------------------------------------------

--
-- Table structure for table `berkas_penduduk`
--

CREATE TABLE `berkas_penduduk` (
  `id_berkas` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `berkas` varchar(225) NOT NULL,
  `id_penduduk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `berkas_penduduk`
--

INSERT INTO `berkas_penduduk` (`id_berkas`, `judul`, `berkas`, `id_penduduk`) VALUES
(5, 'KTP', '9.pdf', 9),
(9, 'ASasA', '91.pdf', 9),
(12, 'How to Analyze Survey Data with Python for Beginne', '14.pdf', 14);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(125) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tanggal_upload` varchar(10) NOT NULL,
  `author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_album`, `judul`, `gambar`, `status`, `tanggal_upload`, `author`) VALUES
(5, 4, 'ASasA', '11.png', 'Aktif', '16-06-2021', 'admin'),
(6, 4, 'kegiatan senja hari anjayyyy', '111.png', 'Aktif', '16-06-2021', 'admin'),
(8, 4, 'sasdasdasd', 'apple-touch-icon.png', 'Aktif', '16-06-2021', 'admin'),
(9, 4, 'aasd', 'comments-6.jpg', 'Aktif', '16-06-2021', 'admin'),
(10, 4, 'fggfgfg', 'portfolio-7.jpg', 'Aktif', '16-06-2021', 'admin'),
(11, 4, 'sdfsdf', 'blog-recent-posts-2.jpg', 'Aktif', '17-06-2021', 'admin'),
(12, 8, '1', 'IMG_34481.JPG', 'Aktif', '11-10-2021', 'admin'),
(13, 8, '2', 'IMG_3449.JPG', 'Aktif', '11-10-2021', 'admin'),
(14, 9, '1', 'IMG_3446.JPG', 'Aktif', '11-10-2021', 'admin'),
(15, 9, '2', 'IMG_3450.JPG', 'Aktif', '11-10-2021', 'admin'),
(16, 10, '1', 'IMG_3445.JPG', 'Aktif', '11-10-2021', 'admin'),
(17, 10, '2', 'IMG_34461.JPG', 'Aktif', '11-10-2021', 'admin'),
(18, 10, '3', '50A91C8A-1FCB-4810-9FC3-A3A17664AAC1.JPG', 'Aktif', '11-10-2021', 'admin'),
(19, 11, '1', 'IMG_20210616_101029.jpg', 'Aktif', '11-10-2021', 'admin'),
(20, 11, '2', 'IMG_20210616_110152.jpg', 'Aktif', '11-10-2021', 'admin'),
(21, 12, '1', 'IMG_20210616_135449.jpg', 'Aktif', '11-10-2021', 'admin'),
(22, 12, '2', 'IMG_20210616_140330.jpg', 'Aktif', '11-10-2021', 'admin'),
(23, 12, '3', 'IMG20201128080438.jpg', 'Aktif', '11-10-2021', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_aset`
--

CREATE TABLE `inventaris_aset` (
  `id_aset` int(11) NOT NULL,
  `kode_aset` varchar(25) NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tahun_beli` varchar(5) NOT NULL,
  `pengguna` int(11) NOT NULL,
  `asal_usul` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_gedung`
--

CREATE TABLE `inventaris_gedung` (
  `id_gedung` int(11) NOT NULL,
  `kode_gedung` varchar(25) NOT NULL,
  `nama_gedung` varchar(50) NOT NULL,
  `tahun_beli` varchar(10) NOT NULL,
  `pengguna` int(11) NOT NULL,
  `asal_usul` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `luas` int(4) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `tanggal_dokumen` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_peralatan_mesin`
--

CREATE TABLE `inventaris_peralatan_mesin` (
  `nama_mesin` varchar(50) NOT NULL,
  `kode_mesin` varchar(25) NOT NULL,
  `ukuran` int(10) NOT NULL,
  `tahun_beli` varchar(10) NOT NULL,
  `nomor_pabrik` varchar(25) NOT NULL,
  `nomor_rangka` varchar(25) NOT NULL,
  `nomor_mesin` varchar(25) NOT NULL,
  `nomor_polisi` varchar(25) NOT NULL,
  `bpkb` varchar(25) NOT NULL,
  `pengguna` int(11) NOT NULL,
  `asal_usul` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `keterangan` text NOT NULL,
  `id_mesin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `nama_kelompok` varchar(50) NOT NULL,
  `kode_kelompok` varchar(20) NOT NULL,
  `deskripsi` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id_kelompok`, `kategori`, `nama_kelompok`, `kode_kelompok`, `deskripsi`) VALUES
(2, '2', 'asdasdasd', 'e21', 'x'),
(3, '1', '1232323', '123', '123123123123123123');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_anggota`
--

CREATE TABLE `kelompok_anggota` (
  `id_kelompok_anggota` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `keterangan` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelompok_anggota`
--

INSERT INTO `kelompok_anggota` (`id_kelompok_anggota`, `id_kelompok`, `id_anggota`, `id_jabatan`, `keterangan`) VALUES
(4, 3, 12, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_jabatan`
--

CREATE TABLE `kelompok_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelompok_jabatan`
--

INSERT INTO `kelompok_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'KETUA'),
(2, 'WAKIL KETUA'),
(3, 'SEKRETARIS'),
(4, 'BENDAHARA'),
(5, 'ANGGOTA');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_kategori`
--

CREATE TABLE `kelompok_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelompok_kategori`
--

INSERT INTO `kelompok_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'svsvs21'),
(4, 'asddd');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `nomor_kk` varchar(30) NOT NULL,
  `id_kepala_keluarga` int(11) NOT NULL,
  `registrasi` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_anggota`
--

CREATE TABLE `keluarga_anggota` (
  `id_keluarga_anggota` int(11) NOT NULL,
  `id_kepala_keluarga` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `hubungan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_artikel` int(11) DEFAULT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_upload` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pejabat_desa`
--

CREATE TABLE `pejabat_desa` (
  `id_pejabat` int(11) NOT NULL,
  `foto_pejabat` varchar(225) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nip_nipd` varchar(25) NOT NULL,
  `pangkat_golongan` varchar(30) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `no_sk_pengangkatan` varchar(25) NOT NULL,
  `tgl_sk_pengangkatan` varchar(10) NOT NULL,
  `no_sk_pemberhentian` varchar(25) NOT NULL,
  `tgl_sk_pemberhentian` varchar(10) NOT NULL,
  `masa_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pejabat_desa`
--

INSERT INTO `pejabat_desa` (`id_pejabat`, `foto_pejabat`, `nik`, `nip_nipd`, `pangkat_golongan`, `jabatan`, `no_sk_pengangkatan`, `tgl_sk_pengangkatan`, `no_sk_pemberhentian`, `tgl_sk_pemberhentian`, `masa_jabatan`) VALUES
(19, '', '203101105730001', '160 007 01 069', '', 'KEPALA DESA', '12', '10/31/2021', '', '', ''),
(20, '', '6203100204800002', '', '', 'SEKDES', '12', '10/31/2021', '', '', ''),
(21, '', '6203101401850001', '', '', 'KAUR', '12', '10/31/2021', '', '', ''),
(22, '', '6203100106800003', '', '', 'KAUR', '12', '10/31/2021', '', '', ''),
(23, '', '6203101103780002', '', '', 'KAUR', '12', '10/31/2021', '', '', ''),
(24, '', '6203104308950002', '', '', 'KASI', '13', '10/31/2021', '', '', ''),
(25, '', '6203101103660002', '', '', 'KASI', '13', '10/31/2021', '', '', ''),
(26, '', '6203102506660001', '', '', 'KASI', '13', '10/31/2021', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `nik_penduduk` varchar(25) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_kk` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_akta` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `rentang_umur` int(11) NOT NULL,
  `rentang_umur2` int(11) NOT NULL,
  `no_paspor` varchar(20) NOT NULL,
  `tgl_paspor` varchar(10) NOT NULL,
  `alamat_sekarang` varchar(50) NOT NULL,
  `alamat_sebelum` varchar(50) NOT NULL,
  `rt` int(3) NOT NULL,
  `rw` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `id_penolong_kelahiran` int(11) NOT NULL,
  `id_pendidikan_kk` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `id_status_wn` int(11) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `id_status_nikah` int(11) NOT NULL,
  `id_golongan_darah` int(11) NOT NULL,
  `id_cacat` int(11) NOT NULL,
  `id_asuransi` int(11) NOT NULL,
  `id_sakit` int(11) NOT NULL,
  `foto_penduduk` varchar(225) NOT NULL,
  `id_status_kk` int(11) NOT NULL,
  `id_pendapatan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `nik_penduduk`, `nama_lengkap`, `no_kk`, `jenis_kelamin`, `no_akta`, `tempat_lahir`, `tanggal_lahir`, `rentang_umur`, `rentang_umur2`, `no_paspor`, `tgl_paspor`, `alamat_sekarang`, `alamat_sebelum`, `rt`, `rw`, `email`, `telepon`, `id_penolong_kelahiran`, `id_pendidikan_kk`, `id_pekerjaan`, `id_status_wn`, `id_agama`, `id_status_nikah`, `id_golongan_darah`, `id_cacat`, `id_asuransi`, `id_sakit`, `foto_penduduk`, `id_status_kk`, `id_pendapatan`, `username`, `password`) VALUES
(15, '203101105730001', 'VENI IMMANUEL', '6203100810080002', 'Laki-Laki', '', 'Lawang Kamah', '1978-01-01', 40, 50, '', '', 'Desa Lawang Kamah', '', 1, 0, '', '', 2, 4, 3, 1, 4, 2, 4, 6, 2, 12, '', 1, 1, '', ''),
(16, '6203100106800003', 'Joni Heartily', '6203100107090002', 'Laki-Laki', '', 'Lawang Kamah', '1980-01-06', 40, 50, '', '', 'Desa Lawang Kamah', '', 1, 0, '', '', 2, 3, 6, 1, 4, 2, 4, 6, 2, 12, '', 1, 1, '', ''),
(17, '6203104405860001', 'Werni', '6203100107090002', 'Perempuan', '', 'Lawang Kamah', '1986-04-05', 30, 40, '', '', 'Desa Lawang Kamah', '', 1, 0, '', '', 2, 2, 1, 1, 4, 2, 2, 6, 2, 12, '', 2, 1, '', ''),
(18, '6203100204800002', 'EDY', '6203100912080007', 'Laki-Laki', '', 'Lawang Kamah', '1978-01-01', 40, 50, '', '', 'Desa Lawang Kamah', '', 4, 0, '', '', 2, 3, 6, 1, 3, 2, 2, 6, 1, 12, '', 1, 1, '', ''),
(19, '6271036906810004', 'Erni Wati', '6203100912080007', 'Perempuan', '', 'Maliku', '1981-05-06', 40, 50, '', '', 'Desa Lawang Kamah', '', 4, 0, '', '', 2, 5, 6, 1, 3, 2, 4, 6, 1, 12, '', 2, 1, '', ''),
(20, '6203101401850001', 'Yan Patria Santosa', '6203101611090002', 'Laki-Laki', '', 'Lawang Kamah', '1985-02-01', 30, 40, '', '', 'Desa Lawang Kamah', '', 2, 0, '', '', 2, 5, 12, 1, 4, 2, 4, 6, 2, 12, '', 1, 1, '', ''),
(21, '6203105606860001', 'Rumanty', '6203101611090002', 'Perempuan', '', 'Lawang Kamah', '1985-04-06', 30, 40, '', '', 'Desa Lawang Kamah', '', 2, 0, '', '', 2, 4, 6, 1, 4, 2, 1, 6, 2, 12, '', 2, 1, '', ''),
(22, '6203101103660002', 'M Ukat Rahen', '6203102211080400', 'Laki-Laki', '', 'Lawang Kamah', '1966-11-03', 50, 60, '', '', 'Desa Lawang Kamah', '', 2, 0, '', '', 4, 4, 9, 1, 3, 2, 5, 6, 2, 12, '', 1, 1, '', ''),
(23, '6203102506660001', 'Nilon', '6203102211080533', 'Laki-Laki', '', 'Lawang Kamah', '1970-01-01', 50, 60, '', '', 'Desa Lawang Kamah', '', 2, 0, '', '', 2, 4, 9, 1, 3, 2, 2, 6, 1, 12, '', 1, 1, '', ''),
(24, '6203104802660001', 'Masriyah', '6203102211080533', 'Perempuan', '', 'Lawang Kamah', '1966-08-02', 50, 60, '', '', 'Desa Lawang Kamah', '', 2, 0, '', '', 2, 4, 9, 1, 3, 2, 3, 6, 1, 12, '', 2, 1, '', ''),
(25, '6271031401880006', 'Fendi Raya', '6203102711170001', 'Laki-Laki', '', 'Palangka Raya', '1988-02-01', 30, 40, '', '', 'Desa Lawang Kamah', '', 0, 0, '', '', 2, 5, 6, 1, 4, 2, 4, 6, 2, 12, '', 1, 1, '', ''),
(26, '6203104308950002', 'Yuni Karlina', '6203102711170001', 'Perempuan', '', 'Lawang Kamah', '1995-03-08', 20, 30, '', '', 'Desa Lawang Kamah', '', 0, 0, '', '', 2, 5, 6, 1, 4, 2, 2, 6, 2, 12, '', 2, 1, '', ''),
(27, '6203101103780002', 'Madiono', '6203102811140012', 'Laki-Laki', '', 'Mintin', '1978-11-03', 40, 50, '', '', 'Desa Lawang Kamah', '', 0, 0, '', '', 2, 3, 9, 1, 3, 2, 5, 6, 1, 12, '', 1, 1, '', ''),
(28, '6203106108850001', 'Ruswati', '6203102811140012', 'Perempuan', '', 'Lawang Kamah', '1985-09-08', 30, 40, '', '', 'Desa Lawang Kamah', '', 0, 0, '', '', 2, 2, 1, 1, 3, 2, 4, 6, 1, 12, '', 2, 1, '6203106108850001', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_agama`
--

CREATE TABLE `penduduk_agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_agama`
--

INSERT INTO `penduduk_agama` (`id_agama`, `agama`) VALUES
(1, 'Hindu'),
(2, 'Buddha'),
(3, 'Islam'),
(4, 'Protestan'),
(5, 'Katolik'),
(6, 'Khonghucu');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_asuransi`
--

CREATE TABLE `penduduk_asuransi` (
  `id_asuransi` int(11) NOT NULL,
  `asuransi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_asuransi`
--

INSERT INTO `penduduk_asuransi` (`id_asuransi`, `asuransi`) VALUES
(1, 'TIDAK/BELUM PUNYA'),
(2, 'BPJS'),
(3, 'ASURANSI LAINNYA');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_golongan_darah`
--

CREATE TABLE `penduduk_golongan_darah` (
  `id_golongan_darah` int(11) NOT NULL,
  `golongan_darah` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_golongan_darah`
--

INSERT INTO `penduduk_golongan_darah` (`id_golongan_darah`, `golongan_darah`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'AB'),
(4, 'O'),
(5, 'A+'),
(7, 'B+'),
(9, 'AB+'),
(11, 'O+');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_jenis_kelamin`
--

CREATE TABLE `penduduk_jenis_kelamin` (
  `id_jk` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_jenis_kelamin`
--

INSERT INTO `penduduk_jenis_kelamin` (`id_jk`, `jenis_kelamin`) VALUES
(1, 'LAKI-LAKI'),
(2, 'PEREMPUAN');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_kecacatan`
--

CREATE TABLE `penduduk_kecacatan` (
  `id_cacat` int(11) NOT NULL,
  `cacat` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_kecacatan`
--

INSERT INTO `penduduk_kecacatan` (`id_cacat`, `cacat`) VALUES
(1, 'CACAT FISIK'),
(2, 'NETRA/BUTA'),
(3, 'RUNGU/WICARA'),
(4, 'MENTAL/JIWA'),
(5, 'FISIK DAN MENTAL'),
(6, 'TIDAK CACAT');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_pekerjaan`
--

CREATE TABLE `penduduk_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_pekerjaan`
--

INSERT INTO `penduduk_pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(1, 'BELUM BEKERJA'),
(2, 'PELAJAR/MAHASISWA'),
(3, 'PNS'),
(4, 'PENSIUNAN'),
(5, 'WIRASWASTA'),
(6, 'SWASTA'),
(7, 'POLRI'),
(8, 'TNI'),
(9, 'PETANI'),
(12, 'NELAYAN');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_pendapatan`
--

CREATE TABLE `penduduk_pendapatan` (
  `id_pendapatan` int(11) NOT NULL,
  `pendapatan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_pendapatan`
--

INSERT INTO `penduduk_pendapatan` (`id_pendapatan`, `pendapatan`) VALUES
(1, '<500rb'),
(2, '500rb - 1jt'),
(3, '1jt - 2jt'),
(4, '2 - 3jt'),
(5, '4 - 5jt'),
(6, '5 - 10jt'),
(7, '>10jt');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_pendidikan`
--

CREATE TABLE `penduduk_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_pendidikan`
--

INSERT INTO `penduduk_pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'TIDAK/BELUM SEKOLAH'),
(2, 'SD/SEDERAJAT'),
(3, 'SLTP/SEDERAJAT'),
(4, 'SLTA.SEDERAJAT'),
(5, 'DIPLOMA I / II'),
(6, 'DIPLOMA II'),
(7, 'SARJANA / S1'),
(8, 'DOKTOR / S2'),
(9, 'MAGISTER / S3');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_pendidikan_ditempuh`
--

CREATE TABLE `penduduk_pendidikan_ditempuh` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_pendidikan_ditempuh`
--

INSERT INTO `penduduk_pendidikan_ditempuh` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'TIDAK/BELUM SEKOLAH'),
(2, 'SD/SEDERAJAT'),
(4, 'SLTP/SEDERAJAT'),
(5, 'SLTA SEDERAJAT'),
(6, 'SLTA.SEDERAJAT'),
(7, 'DIPLOMA II'),
(8, 'DIPLOMA II'),
(9, 'DOKTOR / S2'),
(10, 'MAGISTER / S3');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_penolong_kelahiran`
--

CREATE TABLE `penduduk_penolong_kelahiran` (
  `id_penolong_kelahiran` int(11) NOT NULL,
  `penolong_kelahiran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_penolong_kelahiran`
--

INSERT INTO `penduduk_penolong_kelahiran` (`id_penolong_kelahiran`, `penolong_kelahiran`) VALUES
(1, 'DOKTER'),
(2, 'BIDAN'),
(3, 'PERAWAN'),
(4, 'DUKUN'),
(5, 'LAINNYA');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_sakit`
--

CREATE TABLE `penduduk_sakit` (
  `id_sakit` int(11) NOT NULL,
  `sakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_sakit`
--

INSERT INTO `penduduk_sakit` (`id_sakit`, `sakit`) VALUES
(2, 'LEVER'),
(3, 'PARU-PARU'),
(4, 'KANKER'),
(5, 'STROKE'),
(6, 'DIABETES'),
(7, 'GINJAL'),
(8, 'MALARIA'),
(9, 'PENYAKIT KELAMIN'),
(10, 'TBC/ASTHMA'),
(12, 'TIDAK ADA');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_status`
--

CREATE TABLE `penduduk_status` (
  `id_status` int(11) NOT NULL,
  `status_penduduk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_status`
--

INSERT INTO `penduduk_status` (`id_status`, `status_penduduk`) VALUES
(1, 'TETAP'),
(2, 'TIDAK TETAP'),
(3, 'PENDATANG');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_status_kk`
--

CREATE TABLE `penduduk_status_kk` (
  `id_status_kk` int(11) NOT NULL,
  `status_kk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_status_kk`
--

INSERT INTO `penduduk_status_kk` (`id_status_kk`, `status_kk`) VALUES
(1, 'KEPALA KELUARGA'),
(2, 'ISTRI'),
(3, 'ANAK'),
(10, 'ANAK TIRI');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_status_nikah`
--

CREATE TABLE `penduduk_status_nikah` (
  `id_status_nikah` int(11) NOT NULL,
  `status_nikah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_status_nikah`
--

INSERT INTO `penduduk_status_nikah` (`id_status_nikah`, `status_nikah`) VALUES
(1, 'BELUM KAWIN'),
(2, 'KAWIN'),
(3, 'CERAI HIDUP'),
(4, 'CERAI MATI');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_wn`
--

CREATE TABLE `penduduk_wn` (
  `id_status_wn` int(11) NOT NULL,
  `warga_negara` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penduduk_wn`
--

INSERT INTO `penduduk_wn` (`id_status_wn`, `warga_negara`) VALUES
(1, 'WNI'),
(2, 'WNA');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `npwp` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `universitas` varchar(30) NOT NULL,
  `nama_usaha` varchar(50) NOT NULL,
  `jenis_usaha` varchar(20) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `opsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `os` varchar(20) NOT NULL,
  `browser` varchar(20) NOT NULL,
  `online` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `ip`, `tanggal`, `os`, `browser`, `online`) VALUES
(30, '::1', '2021-09-23', '', '', '1632405593'),
(31, '::1', '2021-09-30', 'Windows 10', 'Chrome', '1632971136'),
(32, '::1', '2021-10-01', 'Windows 10', 'Chrome', '1633104200'),
(33, '::1', '2021-10-04', 'Windows 10', 'Chrome', '1633355009'),
(34, '::1', '2021-10-04', 'Windows 10', 'Chrome', '1633355468'),
(35, '::1', '2021-10-04', 'Windows 10', 'Chrome', '1633355681'),
(36, '::1', '2021-10-04', 'Windows 10', 'Chrome', '1633355789'),
(37, '::1', '2021-10-04', 'Windows 10', 'Chrome', '1633356239'),
(38, '::1', '2021-10-04', 'Windows 10', 'Chrome', '1633356255'),
(39, '::1', '2021-10-04', '', '', '1633356285'),
(40, '::1', '2021-10-04', 'Windows 10', 'Chrome', '1633356322'),
(41, '::1', '2021-10-07', 'Windows 10', 'Chrome', '1633572106'),
(42, '::1', '2021-10-07', '', '', '1633573463'),
(43, '::1', '2021-10-08', 'Windows 10', 'Chrome', '1633626919'),
(44, '::1', '2021-10-08', 'Windows 10', 'Chrome', '1633627001'),
(45, '::1', '2021-10-08', 'Windows 10', 'Chrome', '1633627040'),
(46, '::1', '2021-10-08', 'Windows 10', 'Chrome', '1633678284'),
(47, '::1', '2021-10-11', 'Windows 10', 'Chrome', '1633960564'),
(48, '127.0.0.1', '2021-10-11', 'Windows 10', 'Firefox', '1633963218'),
(49, '127.0.0.1', '2021-10-11', 'Windows 10', 'Firefox', '1633963248'),
(50, '127.0.0.1', '2021-10-11', 'Windows 10', 'Firefox', '1633967183'),
(51, '127.0.0.1', '2021-10-11', 'Windows 10', 'Firefox', '1633967198'),
(52, '127.0.0.1', '2021-10-11', 'Windows 10', 'Firefox', '1633967201'),
(53, '127.0.0.1', '2021-10-11', 'Windows 10', 'Firefox', '1633967474'),
(54, '127.0.0.1', '2021-10-11', 'Windows 10', 'Firefox', '1633967489'),
(55, '127.0.0.1', '2021-10-11', 'Windows 10', 'Firefox', '1633967502'),
(56, '127.0.0.1', '2021-10-11', 'Windows 10', 'Firefox', '1633967907'),
(57, '127.0.0.1', '2021-10-11', 'Windows 10', 'Firefox', '1633968344'),
(58, '127.0.0.1', '2021-10-11', 'Windows 10', 'Firefox', '1633968353'),
(59, '127.0.0.1', '2021-10-11', 'Windows 10', 'Firefox', '1633969029'),
(60, '127.0.0.1', '2021-10-11', 'Windows 10', 'Firefox', '1633969051'),
(61, '127.0.0.1', '2021-10-11', 'Windows 10', 'Firefox', '1633969915'),
(62, '::1', '2021-10-11', '', '', '1633970146'),
(63, '::1', '2021-10-11', '', '', '1633970149'),
(64, '::1', '2021-10-11', '', '', '1633970169'),
(65, '::1', '2021-10-11', '', '', '1633970169'),
(66, '::1', '2021-10-11', '', '', '1633970419'),
(67, '::1', '2021-10-11', '', '', '1633970420'),
(68, '::1', '2021-10-11', '', '', '1633970532'),
(69, '::1', '2021-10-11', '', '', '1633970551'),
(70, '::1', '2021-10-11', '', '', '1633970556'),
(71, '::1', '2021-10-11', '', '', '1633970568'),
(72, '::1', '2021-10-11', '', '', '1633970571'),
(73, '::1', '2021-10-11', '', '', '1633970631'),
(74, '::1', '2021-10-11', '', '', '1633970631'),
(75, '::1', '2021-10-11', '', '', '1633970663'),
(76, '::1', '2021-10-11', '', '', '1633970665'),
(77, '::1', '2021-10-11', '', '', '1633970714'),
(78, '::1', '2021-10-11', '', '', '1633970714'),
(79, '::1', '2021-10-11', '', '', '1633970746'),
(80, '::1', '2021-10-11', '', '', '1633970747'),
(81, '::1', '2021-10-11', '', '', '1633970823'),
(82, '::1', '2021-10-11', '', '', '1633970824'),
(83, '::1', '2021-10-11', '', '', '1633970868'),
(84, '::1', '2021-10-11', '', '', '1633970868');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_desa` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `kode_desa` varchar(20) NOT NULL,
  `id_kades` int(11) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `kode_kecamatan` varchar(30) NOT NULL,
  `nama_camat` varchar(50) NOT NULL,
  `nip_camat` varchar(25) NOT NULL,
  `nama_kabupaten` varchar(50) NOT NULL,
  `kode_kabupaten` varchar(10) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL,
  `kode_provinsi` varchar(10) NOT NULL,
  `alamat_kantor` tinytext NOT NULL,
  `telepon_desa` varchar(20) NOT NULL,
  `lambang_desa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_desa`, `nama_desa`, `kode_desa`, `id_kades`, `kode_pos`, `nama_kecamatan`, `kode_kecamatan`, `nama_camat`, `nip_camat`, `nama_kabupaten`, `kode_kabupaten`, `nama_provinsi`, `kode_provinsi`, `alamat_kantor`, `telepon_desa`, `lambang_desa`) VALUES
(4, 'Lawang Kamah', '73554', 19, '73554', 'Timpah', '62.03.10.2004', 'YUNDA NEVIANTRIE., S.Sos', '132 004 04 024', 'Kuala Kapuas', '62.03.10.2', 'Kalimantan Tengah', '62.04', 'Desa Lawang Kamah', '081282834376', '');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `logo_login` varchar(225) NOT NULL,
  `logo_admin` varchar(225) NOT NULL,
  `logo_pengunjung` varchar(225) NOT NULL,
  `title_admin` varchar(30) NOT NULL,
  `title_pengunjung` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `logo_login`, `logo_admin`, `logo_pengunjung`, `title_admin`, `title_pengunjung`) VALUES
(1, '11.png', '12.png', '13.png', 'ADMIN LAWANG KAMAH', 'LAWANG KAMAH');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `nomor_surat` varchar(30) NOT NULL,
  `tanggal_surat` varchar(10) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `isi_singkat` text NOT NULL,
  `berkas` varchar(225) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE `tentang` (
  `id_tentang` int(11) NOT NULL,
  `visi` longtext NOT NULL,
  `misi` longtext NOT NULL,
  `profil_singkat` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`id_tentang`, `visi`, `misi`, `profil_singkat`) VALUES
(1, '<p>\r\n“DENGAN SEMANGAT PERSAUDARAAN, GOTONG ROYONG DAN AKHLAK MULIA GUNA MEWUJUDKAN DESA LANGKAP YANG LUAR BIASA”.\r\n\r\n<br></p>', '<p>\r\n</p><ol>\r\n<li>Penyelenggaraan pemerintahan yang Tertib dan Transparan</li>\r\n<li>Pelayanan kepada masyarakat yang prima, yaitu : Cepat, Tepat dan Benar</li>\r\n<li>Pelaksanaan pembangunan yang berkesinambungan dan mengedepankan partisipasi dan gotong royong masyarakat.</li>\r\n</ol>\r\n\r\n<br><p></p>', '<p>sejarah terbentuknya desa LAWANG KAMAH adalah bermula dari warga bercocok tanam dan bertani di tanah tersebut yang adalah pulau yang dikelilingi sungai-sungai kecil. seiring berjalannya waktu orang-orang desa mulai nyaman menempati tanah yang sekarang menjadi Desa Lawang Kamah ini dan beberapa tahun dibentuk lah sebagai desa yang bernama DESA LAWANG KAMAH yang di ambil dari nama sungai yang mengelilingi pulau tersebut.<br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_pejabat` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `tanggal_daftar` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_pejabat`, `username`, `password`, `id_user`, `foto`, `tanggal_daftar`, `status`) VALUES
('19', 'admin', 'admin', 19, '19.jpg', '11-10-2021', 'Aktif'),
('26', 'nilon', 'nilon', 22, 'images1.jpg', '11-10-2021', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `baner`
--
ALTER TABLE `baner`
  ADD PRIMARY KEY (`id_baner`),
  ADD KEY `foto_baner` (`foto_baner`);

--
-- Indexes for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id_bantuan`);

--
-- Indexes for table `bantuan_penerima`
--
ALTER TABLE `bantuan_penerima`
  ADD PRIMARY KEY (`id_bantuan_penerima`);

--
-- Indexes for table `berkas_penduduk`
--
ALTER TABLE `berkas_penduduk`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `id_penduduk` (`id_penduduk`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `author` (`author`),
  ADD KEY `id_album` (`id_album`);

--
-- Indexes for table `inventaris_aset`
--
ALTER TABLE `inventaris_aset`
  ADD PRIMARY KEY (`id_aset`),
  ADD KEY `pengguna` (`pengguna`);

--
-- Indexes for table `inventaris_gedung`
--
ALTER TABLE `inventaris_gedung`
  ADD PRIMARY KEY (`id_gedung`),
  ADD KEY `pengguna` (`pengguna`);

--
-- Indexes for table `inventaris_peralatan_mesin`
--
ALTER TABLE `inventaris_peralatan_mesin`
  ADD PRIMARY KEY (`id_mesin`),
  ADD KEY `pengguna` (`pengguna`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `kelompok_anggota`
--
ALTER TABLE `kelompok_anggota`
  ADD PRIMARY KEY (`id_kelompok_anggota`);

--
-- Indexes for table `kelompok_jabatan`
--
ALTER TABLE `kelompok_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kelompok_kategori`
--
ALTER TABLE `kelompok_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD KEY `id_kepala_keluarga` (`id_kepala_keluarga`);

--
-- Indexes for table `keluarga_anggota`
--
ALTER TABLE `keluarga_anggota`
  ADD PRIMARY KEY (`id_keluarga_anggota`),
  ADD KEY `id_kepala_keluarga` (`id_kepala_keluarga`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `pejabat_desa`
--
ALTER TABLE `pejabat_desa`
  ADD PRIMARY KEY (`id_pejabat`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_penduduk`),
  ADD KEY `nik_penduduk` (`nik_penduduk`);

--
-- Indexes for table `penduduk_agama`
--
ALTER TABLE `penduduk_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `penduduk_asuransi`
--
ALTER TABLE `penduduk_asuransi`
  ADD PRIMARY KEY (`id_asuransi`);

--
-- Indexes for table `penduduk_golongan_darah`
--
ALTER TABLE `penduduk_golongan_darah`
  ADD PRIMARY KEY (`id_golongan_darah`);

--
-- Indexes for table `penduduk_jenis_kelamin`
--
ALTER TABLE `penduduk_jenis_kelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `penduduk_kecacatan`
--
ALTER TABLE `penduduk_kecacatan`
  ADD PRIMARY KEY (`id_cacat`);

--
-- Indexes for table `penduduk_pekerjaan`
--
ALTER TABLE `penduduk_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `penduduk_pendapatan`
--
ALTER TABLE `penduduk_pendapatan`
  ADD PRIMARY KEY (`id_pendapatan`);

--
-- Indexes for table `penduduk_pendidikan`
--
ALTER TABLE `penduduk_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `penduduk_pendidikan_ditempuh`
--
ALTER TABLE `penduduk_pendidikan_ditempuh`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `penduduk_penolong_kelahiran`
--
ALTER TABLE `penduduk_penolong_kelahiran`
  ADD PRIMARY KEY (`id_penolong_kelahiran`);

--
-- Indexes for table `penduduk_sakit`
--
ALTER TABLE `penduduk_sakit`
  ADD PRIMARY KEY (`id_sakit`);

--
-- Indexes for table `penduduk_status`
--
ALTER TABLE `penduduk_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `penduduk_status_kk`
--
ALTER TABLE `penduduk_status_kk`
  ADD PRIMARY KEY (`id_status_kk`);

--
-- Indexes for table `penduduk_status_nikah`
--
ALTER TABLE `penduduk_status_nikah`
  ADD PRIMARY KEY (`id_status_nikah`);

--
-- Indexes for table `penduduk_wn`
--
ALTER TABLE `penduduk_wn`
  ADD PRIMARY KEY (`id_status_wn`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `nama_kades` (`id_kades`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `tujuan` (`tujuan`);

--
-- Indexes for table `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nik` (`id_pejabat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `baner`
--
ALTER TABLE `baner`
  MODIFY `id_baner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `id_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bantuan_penerima`
--
ALTER TABLE `bantuan_penerima`
  MODIFY `id_bantuan_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `berkas_penduduk`
--
ALTER TABLE `berkas_penduduk`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `inventaris_aset`
--
ALTER TABLE `inventaris_aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_gedung`
--
ALTER TABLE `inventaris_gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_peralatan_mesin`
--
ALTER TABLE `inventaris_peralatan_mesin`
  MODIFY `id_mesin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelompok_anggota`
--
ALTER TABLE `kelompok_anggota`
  MODIFY `id_kelompok_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelompok_jabatan`
--
ALTER TABLE `kelompok_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelompok_kategori`
--
ALTER TABLE `kelompok_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `keluarga_anggota`
--
ALTER TABLE `keluarga_anggota`
  MODIFY `id_keluarga_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pejabat_desa`
--
ALTER TABLE `pejabat_desa`
  MODIFY `id_pejabat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `penduduk_agama`
--
ALTER TABLE `penduduk_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penduduk_asuransi`
--
ALTER TABLE `penduduk_asuransi`
  MODIFY `id_asuransi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penduduk_golongan_darah`
--
ALTER TABLE `penduduk_golongan_darah`
  MODIFY `id_golongan_darah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penduduk_jenis_kelamin`
--
ALTER TABLE `penduduk_jenis_kelamin`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penduduk_kecacatan`
--
ALTER TABLE `penduduk_kecacatan`
  MODIFY `id_cacat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penduduk_pekerjaan`
--
ALTER TABLE `penduduk_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `penduduk_pendapatan`
--
ALTER TABLE `penduduk_pendapatan`
  MODIFY `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penduduk_pendidikan`
--
ALTER TABLE `penduduk_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penduduk_pendidikan_ditempuh`
--
ALTER TABLE `penduduk_pendidikan_ditempuh`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penduduk_penolong_kelahiran`
--
ALTER TABLE `penduduk_penolong_kelahiran`
  MODIFY `id_penolong_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penduduk_sakit`
--
ALTER TABLE `penduduk_sakit`
  MODIFY `id_sakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penduduk_status`
--
ALTER TABLE `penduduk_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penduduk_status_kk`
--
ALTER TABLE `penduduk_status_kk`
  MODIFY `id_status_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penduduk_status_nikah`
--
ALTER TABLE `penduduk_status_nikah`
  MODIFY `id_status_nikah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penduduk_wn`
--
ALTER TABLE `penduduk_wn`
  MODIFY `id_status_wn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventaris_aset`
--
ALTER TABLE `inventaris_aset`
  ADD CONSTRAINT `inventaris_aset_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `pejabat_desa` (`id_pejabat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventaris_gedung`
--
ALTER TABLE `inventaris_gedung`
  ADD CONSTRAINT `inventaris_gedung_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `pejabat_desa` (`id_pejabat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventaris_peralatan_mesin`
--
ALTER TABLE `inventaris_peralatan_mesin`
  ADD CONSTRAINT `inventaris_peralatan_mesin_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `pejabat_desa` (`id_pejabat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `keluarga_ibfk_1` FOREIGN KEY (`id_kepala_keluarga`) REFERENCES `penduduk` (`id_penduduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluarga_anggota`
--
ALTER TABLE `keluarga_anggota`
  ADD CONSTRAINT `keluarga_anggota_ibfk_1` FOREIGN KEY (`id_kepala_keluarga`) REFERENCES `keluarga` (`id_keluarga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keluarga_anggota_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `penduduk` (`id_penduduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pejabat_desa`
--
ALTER TABLE `pejabat_desa`
  ADD CONSTRAINT `pejabat_desa_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik_penduduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`tujuan`) REFERENCES `pejabat_desa` (`id_pejabat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
