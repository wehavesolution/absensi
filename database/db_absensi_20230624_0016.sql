-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2023 pada 19.15
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id` int(11) NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `status_absensi` varchar(40) DEFAULT NULL COMMENT 'I => In, O => Out, IZN => Izin, SKT => sakit, LMB => Lembur, PJLDNS => Perjalanan Dinas\n\ndata bisa didapat dari tabel tbl_ket_absensi',
  `aktif` int(1) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ctddate` date DEFAULT NULL,
  `ctdtime` time DEFAULT NULL,
  `karyawan_id` int(11) DEFAULT NULL,
  `tbl_pengajuan_id` int(11) DEFAULT NULL,
  `pengaturan_id` int(11) NOT NULL,
  `img_masuk` varchar(155) DEFAULT NULL,
  `img_keluar` varchar(155) DEFAULT NULL,
  `kode_ket` varchar(45) DEFAULT NULL,
  `online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id`, `jam_masuk`, `jam_keluar`, `status_absensi`, `aktif`, `tanggal`, `ctddate`, `ctdtime`, `karyawan_id`, `tbl_pengajuan_id`, `pengaturan_id`, `img_masuk`, `img_keluar`, `kode_ket`, `online`) VALUES
(1, '22:48:06', '22:48:13', 'O', 1, '2022-04-25', '2022-04-25', '22:48:06', 1, NULL, 1, '20220425224806img.png', '20220425224813img.png', 'ABSNPLNGDLUAR', 0),
(2, NULL, NULL, 'CTI', 1, '2022-04-25', '2022-04-25', '22:48:25', 1, 14, 1, NULL, NULL, 'CTI', 0),
(3, NULL, NULL, 'PJLDNS', 1, '2022-04-27', '2022-04-27', '22:08:57', 1, 15, 1, NULL, NULL, 'PJLDNS', 0),
(4, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:13:56', 1, 16, 1, NULL, NULL, 'CTI', 0),
(5, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:14:03', 1, 17, 1, NULL, NULL, 'CTI', 0),
(6, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:15:08', 1, 18, 1, NULL, NULL, 'CTI', 0),
(7, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:15:50', 1, 19, 1, NULL, NULL, 'CTI', 0),
(8, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:16:00', 1, 20, 1, NULL, NULL, 'CTI', 0),
(9, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:16:18', 1, 21, 1, NULL, NULL, 'CTI', 0),
(10, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:16:22', 1, 22, 1, NULL, NULL, 'CTI', 0),
(11, NULL, NULL, 'SKT', 1, '2022-04-27', '2022-04-27', '23:16:50', 1, 23, 1, NULL, NULL, 'SKT', 0),
(12, NULL, NULL, 'PJLDNS', 1, '2022-04-27', '2022-04-27', '23:17:00', 1, 24, 1, NULL, NULL, 'PJLDNS', 0),
(13, NULL, NULL, 'LMB', 1, '2022-04-27', '2022-04-27', '23:17:11', 1, 25, 1, NULL, NULL, 'LMB', 0),
(14, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:18:33', 1, 26, 1, NULL, NULL, 'CTI', 0),
(15, NULL, NULL, 'CTI', 1, '2022-05-01', '2022-05-01', '23:17:53', 1, 27, 1, NULL, NULL, 'CTI', 0),
(16, NULL, NULL, 'CTI', 1, '2022-05-02', '2022-05-02', '00:02:01', 1, 28, 1, NULL, NULL, 'CTI', 0),
(17, NULL, NULL, 'PJLDNS', 1, '2022-05-02', '2022-05-02', '00:35:06', 1, 29, 1, NULL, NULL, 'PJLDNS', 0),
(18, NULL, NULL, 'CTI', 1, '2022-05-02', '2022-05-02', '00:38:07', 1, 30, 1, NULL, NULL, 'CTI', 0),
(19, NULL, NULL, 'CTI', 1, '2022-05-12', '2022-05-12', '22:39:09', 1, 31, 1, NULL, NULL, 'CTI', 0),
(20, NULL, NULL, 'CTI', 1, '2022-05-12', '2022-05-12', '23:56:25', 1, 33, 1, NULL, NULL, 'CTI', 0),
(21, NULL, NULL, 'CTI', 1, '2022-05-13', '2022-05-13', '00:04:40', 1, 34, 1, NULL, NULL, 'CTI', 0),
(22, NULL, NULL, 'PJLDNS', 1, '2022-05-13', '2022-05-13', '00:05:57', 1, 35, 1, NULL, NULL, 'PJLDNS', 0),
(23, NULL, NULL, 'PJLDNS', 1, '2022-05-13', '2022-05-13', '00:08:18', 1, 36, 1, NULL, NULL, 'PJLDNS', 0),
(24, '10:55:46', '10:56:06', 'O', 1, '2022-05-15', '2022-05-15', '10:55:46', 1, NULL, 1, '20220515105546img.png', '20220515105606img.png', 'TSK', 0),
(25, '20:14:03', NULL, 'I', 1, '2023-06-09', '2023-06-09', '20:14:03', 1, NULL, 1, '20230609201403img.png', NULL, 'ABSNMSKDLUAR', 1),
(26, NULL, NULL, 'CTI', 1, '2023-06-12', '2023-06-12', '01:15:50', 1, 52, 1, NULL, NULL, 'CTI', 0),
(27, NULL, NULL, 'CTI', 1, '2023-06-13', '2023-06-12', '01:15:50', 1, 52, 1, NULL, NULL, 'CTI', 0),
(28, NULL, NULL, 'CTI', 1, '2023-06-14', '2023-06-12', '01:15:50', 1, 52, 1, NULL, NULL, 'CTI', 0),
(29, NULL, NULL, 'CTI', 1, '2023-06-15', '2023-06-12', '01:15:50', 1, 52, 1, NULL, NULL, 'CTI', 0),
(30, NULL, NULL, 'CTI', 1, '2023-06-13', '2023-06-12', '01:18:08', 1, 53, 1, NULL, NULL, 'CTI', 0),
(31, NULL, NULL, 'CTI', 1, '2023-06-14', '2023-06-12', '01:18:08', 1, 53, 1, NULL, NULL, 'CTI', 0),
(32, NULL, NULL, 'CTI', 1, '2023-06-15', '2023-06-12', '01:18:08', 1, 53, 1, NULL, NULL, 'CTI', 0),
(33, NULL, NULL, 'CTI', 1, '2023-06-16', '2023-06-12', '01:18:08', 1, 53, 1, NULL, NULL, 'CTI', 0),
(34, NULL, NULL, 'CTI', 1, '2023-06-17', '2023-06-12', '01:18:08', 1, 53, 1, NULL, NULL, 'CTI', 0),
(35, NULL, NULL, 'CTI', 1, '2023-06-18', '2023-06-12', '01:18:08', 1, 53, 1, NULL, NULL, 'CTI', 0),
(36, NULL, NULL, 'CTI', 1, '2023-06-19', '2023-06-12', '01:18:08', 1, 53, 1, NULL, NULL, 'CTI', 0),
(37, NULL, NULL, 'CTI', 1, '2023-06-20', '2023-06-12', '01:18:08', 1, 53, 1, NULL, NULL, 'CTI', 0),
(38, NULL, NULL, 'CTI', 1, '2023-06-21', '2023-06-12', '01:18:08', 1, 53, 1, NULL, NULL, 'CTI', 0),
(39, NULL, NULL, 'CTI', 1, '2023-06-22', '2023-06-12', '01:18:08', 1, 53, 1, NULL, NULL, 'CTI', 0),
(40, NULL, NULL, 'CTI', 1, '2023-06-12', '2023-06-12', '01:43:43', 1, 68, 1, NULL, NULL, 'CTI', 0),
(41, NULL, NULL, 'CTI', 1, '2023-06-13', '2023-06-12', '01:43:43', 1, 68, 1, NULL, NULL, 'CTI', 0),
(42, NULL, NULL, 'CTI', 1, '2023-06-14', '2023-06-12', '01:43:43', 1, 68, 1, NULL, NULL, 'CTI', 0),
(43, NULL, NULL, 'CTI', 1, '2023-06-15', '2023-06-12', '01:43:43', 1, 68, 1, NULL, NULL, 'CTI', 0),
(44, NULL, NULL, 'CTI', 1, '2023-06-12', '2023-06-12', '01:48:45', 1, 70, 1, NULL, NULL, 'CTI', 0),
(45, NULL, NULL, 'CTI', 1, '2023-06-13', '2023-06-12', '01:48:45', 1, 70, 1, NULL, NULL, 'CTI', 0),
(46, NULL, NULL, 'CTI', 1, '2023-06-14', '2023-06-12', '01:48:45', 1, 70, 1, NULL, NULL, 'CTI', 0),
(47, NULL, NULL, 'CTI', 1, '2023-06-15', '2023-06-12', '01:48:45', 1, 70, 1, NULL, NULL, 'CTI', 0),
(48, NULL, NULL, 'CTI', 1, '0000-00-00', '2023-06-12', '01:54:25', 1, 73, 1, NULL, NULL, 'CTI', 0),
(49, NULL, NULL, 'CTI', 1, '0000-00-00', '2023-06-12', '01:58:04', 1, 76, 1, NULL, NULL, 'CTI', 0),
(50, NULL, NULL, 'CTI', 1, '0000-00-00', '2023-06-12', '02:03:15', 1, 78, 1, NULL, NULL, 'CTI', 0),
(51, '19:16:14', NULL, 'I', 1, '2023-06-13', '2023-06-13', '19:16:14', 8, NULL, 1, '20230613191614img.png', NULL, 'ABSNMSKDLUAR', 1),
(52, NULL, NULL, 'SKT', 1, '2023-06-13', '2023-06-13', '19:17:55', 8, 80, 1, NULL, NULL, 'SKT', 0),
(53, NULL, NULL, 'SKT', 1, '2023-06-14', '2023-06-13', '19:17:55', 8, 80, 1, NULL, NULL, 'SKT', 0),
(54, NULL, NULL, 'CTI', 1, '2023-06-14', '2023-06-13', '20:15:01', 8, 81, 1, NULL, NULL, 'CTI', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cuti_karyawan`
--

CREATE TABLE `tbl_cuti_karyawan` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `jumlah` tinyint(2) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_cuti_karyawan`
--

INSERT INTO `tbl_cuti_karyawan` (`id`, `karyawan_id`, `jumlah`, `tahun`) VALUES
(1, 1, 12, 2023),
(2, 2, 12, 2023),
(3, 3, 12, 2023),
(4, 4, 12, 2023),
(5, 5, 12, 2023),
(6, 6, 12, 2023),
(7, 7, 12, 2023),
(8, 8, 11, 2023);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id` int(11) NOT NULL,
  `nma_jabatan` varchar(45) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `leader` char(1) DEFAULT NULL COMMENT '1 => Ya\n0 => Tidak',
  `admin` tinyint(1) NOT NULL COMMENT '1 => Admin, 0 => Bukan',
  `keterangan` text,
  `jabatan_grp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id`, `nma_jabatan`, `parent_id`, `leader`, `admin`, `keterangan`, `jabatan_grp_id`) VALUES
(1, 'Leader Development', NULL, '1', 0, NULL, 1),
(2, 'Front-End Development', 1, NULL, 0, NULL, 1),
(3, 'HRD', NULL, '', 0, NULL, 2),
(4, 'Admin', NULL, '', 1, NULL, 4),
(5, 'Backend Developer', 1, '0', 0, NULL, 1),
(6, 'QA', 1, '0', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan_grup`
--

CREATE TABLE `tbl_jabatan_grup` (
  `id` int(11) NOT NULL,
  `nama_group` varchar(40) NOT NULL,
  `ctddate` date NOT NULL,
  `ctdby` varchar(10) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jabatan_grup`
--

INSERT INTO `tbl_jabatan_grup` (`id`, `nama_group`, `ctddate`, `ctdby`, `aktif`) VALUES
(1, 'Development', '2022-01-01', '1', 1),
(2, 'HRD', '2022-01-01', '1', 1),
(4, 'Admin', '2022-01-01', '1', 1),
(10, 'Service Delivery', '2023-06-13', '4', 1),
(11, 'Service', '2023-06-13', '4', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id` int(11) NOT NULL,
  `nip` varchar(36) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_tinggal` varchar(25) DEFAULT NULL,
  `jk` enum('0','1') DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `status_karyawan` enum('1','2') DEFAULT '1' COMMENT '1 = Kontrak\n2 = Karyawan',
  `no_telp` varchar(15) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `aktif` enum('1','0') DEFAULT '1',
  `users_id` int(11) NOT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `img` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id`, `nip`, `email`, `nama`, `tempat_tinggal`, `jk`, `tgl_masuk`, `status_karyawan`, `no_telp`, `tgl_lahir`, `aktif`, `users_id`, `jabatan_id`, `img`) VALUES
(1, '01', 'sahrulrizal22@gmail.com', 'Sahrul Rizal', 'Cianjur', '1', '2019-12-03', '2', '08976288123', '1997-08-22', '1', 1, 2, '58.png'),
(2, '02', 'mellinasudirman@gmail.com', 'Mellina Sudirman', 'Medan', '1', '2019-01-01', '2', '08976288123', '1997-08-22', '1', 2, 1, '23.png'),
(3, '03', 'devitaaulia@gmail.com', 'Devita Aulia', 'Depok', '1', '2015-01-01', '2', '08976288123', '1997-08-22', '1', 3, 3, '8.png'),
(4, '03', 'adminsitration@gmail.com', 'Hong Nomman', 'Depok', '1', '2015-01-01', '2', '08976288123', '1997-08-22', '1', 4, 4, '22.png'),
(5, '05', 'joni@dasdas.com', NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', 6, 2, NULL),
(6, '05', 'joni@dasdas.com', NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', 7, 2, NULL),
(7, '05', 'joni@dasdas.com', NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', 8, 2, NULL),
(8, '07', 'joni@gplate.com', 'Joni', NULL, NULL, NULL, '1', NULL, NULL, '1', 9, 5, 'avatar.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ket_absensi`
--

CREATE TABLE `tbl_ket_absensi` (
  `id` int(11) NOT NULL,
  `kode_ket` varchar(35) DEFAULT NULL,
  `keterangan` varchar(145) DEFAULT NULL,
  `ctddate` date DEFAULT NULL,
  `ctdtime` time DEFAULT NULL,
  `link` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_ket_absensi`
--

INSERT INTO `tbl_ket_absensi` (`id`, `kode_ket`, `keterangan`, `ctddate`, `ctdtime`, `link`) VALUES
(1, 'TLT', 'Telat', NULL, NULL, NULL),
(2, 'TW', 'Tepat Waktu', NULL, NULL, NULL),
(3, 'CTI', 'Cuti', NULL, NULL, 'Main/detail_pengajuan?id='),
(4, 'LMB', 'Lembur', NULL, NULL, 'Main/detail_pengajuan?id='),
(5, 'PJLDNS', 'Perjalanan Dinas', NULL, NULL, 'Main/detail_pengajuan?id='),
(6, 'SKT', 'Sakit', NULL, NULL, 'Main/detail_pengajuan?id='),
(7, 'TSK', 'Pulang dengan tidak sesuai ketentuan', NULL, NULL, NULL),
(8, 'TDKMSK', 'Tidak ada keterangan masuk', NULL, NULL, NULL),
(9, 'IZN', 'Izin', NULL, NULL, NULL),
(10, 'KORABSN', 'Koreksi Absensi', NULL, NULL, NULL),
(11, 'ABSNDLUAR', 'Absen diluar jam yang sudah ditentukan', NULL, NULL, NULL),
(12, 'I', 'Absen Masuk', NULL, NULL, NULL),
(13, 'O', 'Absen Pulang', NULL, NULL, NULL),
(14, 'ABSNMSKDLUAR', 'Absen masuk diluar jam yang sudah ditentukan', NULL, NULL, NULL),
(15, 'ABSNPLNGDLUAR', 'Absen pulang diluar jam yang sudah ditentukan', NULL, NULL, NULL),
(16, 'ABSNDLUARJMTLT', 'Absen pulang sesudah jam telat yang sudah dientukan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log_absensi`
--

CREATE TABLE `tbl_log_absensi` (
  `id` int(11) NOT NULL,
  `absensi_id` int(11) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `status_absensi` varchar(25) DEFAULT NULL,
  `kode_ket` varchar(45) DEFAULT NULL,
  `ctddate` date DEFAULT NULL,
  `ctdtime` time DEFAULT NULL,
  `karyawan_id` int(11) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `msg` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_log_absensi`
--

INSERT INTO `tbl_log_absensi` (`id`, `absensi_id`, `jam`, `status_absensi`, `kode_ket`, `ctddate`, `ctdtime`, `karyawan_id`, `status`, `msg`) VALUES
(1, NULL, '01:05:00', 'I', 'ABSNMSKDLUAR', '2022-04-21', '01:05:00', 1, NULL, NULL),
(2, NULL, '01:11:30', 'O', '', '2022-04-21', '01:11:30', 1, '0', 'Gagal melakukan absen pulang'),
(3, NULL, '01:12:04', 'O', '', '2022-04-21', '01:12:04', 1, '0', 'Gagal melakukan absen pulang'),
(4, NULL, '01:12:14', 'I', 'ABSNMSKDLUAR', '2022-04-21', '01:12:14', 1, NULL, NULL),
(5, NULL, '01:13:02', 'O', 'ABSNPLNGDLUAR', '2022-04-21', '01:13:02', 1, '1', 'Berhasil melakukan absen pulang'),
(6, NULL, '22:18:39', 'I', 'TLT', '2022-04-22', '22:18:39', 1, NULL, NULL),
(7, NULL, '22:21:55', 'O', '', '2022-04-22', '22:21:55', 1, '0', 'Kode keterangan tidak ditemukan, harap hubungi admin!'),
(8, NULL, '22:23:07', 'O', '', '2022-04-22', '22:23:07', 1, '0', 'Kode keterangan tidak ditemukan, harap hubungi admin!'),
(9, NULL, '22:29:10', 'O', '', '2022-04-22', '22:29:10', 1, '0', 'Kode keterangan tidak ditemukan, harap hubungi admin!'),
(10, NULL, '22:31:33', 'O', 'O', '2022-04-22', '22:31:33', 1, '1', 'Berhasil melakukan absen pulang'),
(11, NULL, '22:33:43', 'I', 'I', '2022-04-22', '22:33:43', 1, NULL, NULL),
(12, NULL, '22:38:21', 'I', 'I', '2022-04-22', '22:38:21', 1, NULL, NULL),
(13, NULL, '22:43:40', 'I', 'I', '2022-04-22', '22:43:40', 1, NULL, NULL),
(14, NULL, '23:08:36', 'I', 'ABSNMSKDLUAR', '2022-04-22', '23:08:36', 1, NULL, NULL),
(15, NULL, '22:19:38', 'I', 'ABSNMSKDLUAR', '2022-04-25', '22:19:38', 1, NULL, NULL),
(16, NULL, '22:19:48', 'O', 'ABSNPLNGDLUAR', '2022-04-25', '22:19:48', 1, '1', 'Berhasil melakukan absen pulang'),
(17, NULL, '22:45:24', 'I', 'ABSNMSKDLUAR', '2022-04-25', '22:45:24', 1, NULL, NULL),
(18, NULL, '22:48:06', 'I', 'ABSNMSKDLUAR', '2022-04-25', '22:48:06', 1, NULL, NULL),
(19, NULL, '22:48:13', 'O', 'ABSNPLNGDLUAR', '2022-04-25', '22:48:13', 1, '1', 'Berhasil melakukan absen pulang'),
(20, NULL, '10:55:46', 'I', 'TLT', '2022-05-15', '10:55:46', 1, NULL, NULL),
(21, NULL, '10:56:06', 'O', 'TSK', '2022-05-15', '10:56:06', 1, '1', 'Berhasil melakukan absen pulang'),
(22, NULL, '20:14:03', 'I', 'ABSNMSKDLUAR', '2023-06-09', '20:14:03', 1, NULL, NULL),
(23, NULL, '19:16:14', 'I', 'ABSNMSKDLUAR', '2023-06-13', '19:16:14', 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log_pengajuan`
--

CREATE TABLE `tbl_log_pengajuan` (
  `id` int(11) NOT NULL,
  `pengajuan_id` int(11) DEFAULT NULL,
  `act_pengajuan_id` int(11) DEFAULT NULL,
  `msg` text,
  `ctddate` date DEFAULT NULL,
  `ctdtime` time DEFAULT NULL,
  `ctdby` int(11) DEFAULT NULL,
  `accept` char(1) DEFAULT NULL COMMENT '0 => Default\n1 => Diterima\n2 => Ditolak',
  `acceptBy` int(11) DEFAULT NULL COMMENT 'Diterima oleh soap, ini ID Karyawan',
  `acceptNum` char(1) DEFAULT NULL COMMENT 'Penerima kebarapa ? ',
  `acceptNote` text COMMENT 'Catatan apabila digerida tau ditolak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_log_pengajuan`
--

INSERT INTO `tbl_log_pengajuan` (`id`, `pengajuan_id`, `act_pengajuan_id`, `msg`, `ctddate`, `ctdtime`, `ctdby`, `accept`, `acceptBy`, `acceptNum`, `acceptNote`) VALUES
(1, 31, NULL, NULL, '2022-05-12', '23:37:24', 1, '1', 1, '', NULL),
(2, 31, NULL, NULL, '2022-05-12', '23:45:02', 1, '3', 1, '', NULL),
(3, 30, NULL, NULL, '2022-05-12', '23:47:20', 1, '3', 1, '', NULL),
(4, 31, NULL, NULL, '2022-05-12', '23:47:26', 1, '3', 1, '', NULL),
(5, 31, NULL, NULL, '2022-05-12', '23:47:34', 1, '3', 1, '', NULL),
(6, 31, NULL, NULL, '2022-05-12', '23:48:31', 1, '3', 1, '', NULL),
(7, 31, NULL, NULL, '2022-05-12', '23:50:01', 1, '3', 1, '', NULL),
(8, 33, NULL, 'sadas', '2022-05-12', '23:56:25', 1, '0', NULL, NULL, 'sadas'),
(9, 33, NULL, NULL, '2022-05-12', '23:56:50', 2, '1', 2, '1', NULL),
(10, 33, NULL, NULL, '2022-05-12', '23:58:18', 3, '2', 3, '', NULL),
(11, 33, NULL, NULL, '2022-05-12', '23:58:25', 3, '2', 3, '', NULL),
(12, 33, NULL, NULL, '2022-05-12', '23:59:26', 3, '2', 3, '', NULL),
(13, 33, NULL, NULL, '2022-05-13', '00:00:03', 3, '2', 3, '', NULL),
(14, 33, NULL, NULL, '2022-05-13', '00:00:19', 3, '2', 3, '', NULL),
(15, 33, NULL, NULL, '2022-05-13', '00:01:39', 3, '1', 3, NULL, NULL),
(16, 33, NULL, NULL, '2022-05-13', '00:02:19', 3, '1', 3, NULL, NULL),
(17, 34, NULL, 'Cobain', '2022-05-13', '00:04:40', 1, '0', NULL, NULL, 'Cobain'),
(18, 34, NULL, NULL, '2022-05-13', '00:05:01', 2, '1', 2, '1', NULL),
(19, 35, NULL, 'izin elakukan perjalanan dinas ke bali\r\n', '2022-05-13', '00:05:57', 1, '0', NULL, NULL, 'izin elakukan perjalanan dinas ke bali\r\n'),
(20, 35, NULL, NULL, '2022-05-13', '00:07:51', 2, '1', 2, '1', NULL),
(21, 36, NULL, 'dasdsa', '2022-05-13', '00:08:18', 1, '0', NULL, NULL, 'dasdsa'),
(22, 36, NULL, NULL, '2022-05-13', '00:08:25', 1, '3', 1, NULL, NULL),
(23, 37, NULL, NULL, '2023-06-09', '20:18:27', 1, '3', 1, NULL, NULL),
(24, 38, NULL, NULL, '2023-06-09', '20:19:46', 3, '2', 3, NULL, NULL),
(25, 52, NULL, NULL, '2023-06-12', '01:15:50', 1, '0', NULL, NULL, NULL),
(26, 52, NULL, NULL, '2023-06-12', '01:15:50', 3, '1', 3, NULL, NULL),
(27, 53, NULL, NULL, '2023-06-12', '01:18:08', 1, '0', NULL, NULL, NULL),
(28, 53, NULL, NULL, '2023-06-12', '01:18:08', 3, '1', 3, NULL, NULL),
(29, 68, NULL, NULL, '2023-06-12', '01:43:43', 3, '1', 3, NULL, NULL),
(30, 68, NULL, NULL, '2023-06-12', '01:43:43', 1, '0', NULL, NULL, NULL),
(31, 70, NULL, NULL, '2023-06-12', '01:48:45', 3, '1', 3, NULL, NULL),
(32, 70, NULL, NULL, '2023-06-12', '01:48:45', 1, '0', NULL, NULL, NULL),
(33, 72, NULL, NULL, '2023-06-12', '01:49:21', 3, '1', 3, NULL, NULL),
(34, 73, NULL, NULL, '2023-06-12', '01:53:12', 3, '1', 3, NULL, NULL),
(35, 73, NULL, NULL, '2023-06-12', '01:53:23', 3, '1', 3, NULL, NULL),
(36, 73, NULL, NULL, '2023-06-12', '01:54:25', 3, '1', 3, NULL, NULL),
(37, 73, NULL, NULL, '2023-06-12', '01:54:25', 1, '0', NULL, NULL, NULL),
(38, 75, NULL, NULL, '2023-06-12', '01:55:01', 3, '1', 3, NULL, NULL),
(39, 76, NULL, NULL, '2023-06-12', '01:58:04', 3, '1', 3, NULL, NULL),
(40, 76, NULL, NULL, '2023-06-12', '01:58:04', 1, '0', NULL, NULL, NULL),
(41, 77, NULL, NULL, '2023-06-12', '01:58:16', 3, '1', 3, NULL, NULL),
(42, 78, NULL, NULL, '2023-06-12', '02:03:15', 3, '1', 3, NULL, NULL),
(43, 78, NULL, NULL, '2023-06-12', '02:03:15', 1, '0', NULL, NULL, NULL),
(44, 79, NULL, NULL, '2023-06-12', '02:03:30', 3, '2', 3, NULL, NULL),
(45, 80, NULL, NULL, '2023-06-13', '19:17:55', 3, '1', 3, NULL, NULL),
(46, 80, NULL, NULL, '2023-06-13', '19:17:55', 8, '0', NULL, NULL, NULL),
(47, 81, NULL, NULL, '2023-06-13', '20:15:01', 3, '1', 3, NULL, NULL),
(48, 81, NULL, NULL, '2023-06-13', '20:15:01', 8, '0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_notif`
--

CREATE TABLE `tbl_notif` (
  `id` int(11) NOT NULL,
  `pesan` text,
  `kode_action` char(18) DEFAULT NULL COMMENT 'kode_action == “pengajuan”',
  `action_id` int(11) DEFAULT NULL COMMENT 'ID yang dituju',
  `link` varchar(245) DEFAULT NULL COMMENT 'link notification',
  `ctddate` date DEFAULT NULL,
  `ctdtime` time DEFAULT NULL,
  `status_create` char(1) DEFAULT NULL COMMENT '1 => Users\n2 => System',
  `ctdby` int(11) DEFAULT NULL,
  `from` varchar(45) DEFAULT NULL COMMENT 'karyawan_id dari',
  `to` varchar(45) DEFAULT NULL COMMENT 'karyawan_id tujuan',
  `read` char(1) DEFAULT '0' COMMENT '1 => read\n0 => belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_notif`
--

INSERT INTO `tbl_notif` (`id`, `pesan`, `kode_action`, `action_id`, `link`, `ctddate`, `ctdtime`, `status_create`, `ctdby`, `from`, `to`, `read`) VALUES
(1, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 30, 'Main/detail_pengajuan?id=30', '2022-05-02', '00:38:07', '1', NULL, '1', '3', '0'),
(2, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 30, 'Main/detail_pengajuan?id=30', '2022-05-02', '00:38:07', '1', NULL, '1', '2', '1'),
(3, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 31, 'Main/detail_pengajuan?id=31', '2022-05-12', '22:39:09', '1', NULL, '1', '3', '0'),
(4, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 31, 'Main/detail_pengajuan?id=31', '2022-05-12', '22:39:10', '1', NULL, '1', '2', '0'),
(5, '<b>  </b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">: WIB </span></br> oleh  ()', NULL, 31, '31', '2022-05-12', '23:30:35', '1', NULL, '1', '1', '0'),
(6, '<b>  </b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">: WIB </span></br> oleh  ()', 'CTI', 31, 'Main/detail_pengajuan?id=31', '2022-05-12', '23:33:07', '1', NULL, '1', '1', '0'),
(7, '<b>  </b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">: WIB </span></br> oleh  ()', 'CTI', 31, 'Main/detail_pengajuan?id=31', '2022-05-12', '23:34:41', '1', NULL, '1', '1', '0'),
(8, '<b>  </b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">: WIB </span></br> oleh  ()', 'CTI', 31, 'Main/detail_pengajuan?id=31', '2022-05-12', '23:37:24', '1', NULL, '1', '1', '0'),
(9, '<b>  </b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">: WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'CTI', 30, 'Main/detail_pengajuan?id=30', '2022-05-12', '23:47:20', '1', NULL, '1', '3', '0'),
(10, '<b>  </b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">: WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'CTI', 30, 'Main/detail_pengajuan?id=30', '2022-05-12', '23:47:20', '1', NULL, '1', '2', '0'),
(11, '<b>  </b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">: WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'CTI', 31, 'Main/detail_pengajuan?id=31', '2022-05-12', '23:47:26', '1', NULL, '1', '3', '0'),
(12, '<b>  </b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">: WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'CTI', 31, 'Main/detail_pengajuan?id=31', '2022-05-12', '23:47:26', '1', NULL, '1', '2', '0'),
(13, '<b>  </b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">: WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'CTI', 31, 'Main/detail_pengajuan?id=31', '2022-05-12', '23:47:34', '1', NULL, '1', '3', '0'),
(14, '<b>  </b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">: WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'CTI', 31, 'Main/detail_pengajuan?id=31', '2022-05-12', '23:47:34', '1', NULL, '1', '2', '0'),
(15, '<b>12 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">23:48 WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'CTI', 31, 'Main/detail_pengajuan?id=31', '2022-05-12', '23:48:31', '1', NULL, '1', '3', '0'),
(16, '<b>12 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">23:48 WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'CTI', 31, 'Main/detail_pengajuan?id=31', '2022-05-12', '23:48:31', '1', NULL, '1', '2', '0'),
(17, '<b>12 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">23:50 WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'CTI', 31, 'Main/detail_pengajuan?id=31', '2022-05-12', '23:50:01', '1', NULL, '1', '3', '0'),
(18, '<b>12 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">23:50 WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'CTI', 31, 'Main/detail_pengajuan?id=31', '2022-05-12', '23:50:01', '1', NULL, '1', '2', '1'),
(19, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 33, 'Main/detail_pengajuan?id=33', '2022-05-12', '23:56:25', '1', NULL, '1', '3', '1'),
(20, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 33, 'Main/detail_pengajuan?id=33', '2022-05-12', '23:56:25', '1', NULL, '1', '2', '1'),
(21, '<b>  </b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">: WIB </span></br> oleh  (Karyawan)', 'CTI', 33, 'Main/detail_pengajuan?id=33', '2022-05-12', '23:56:50', '1', NULL, '2', '1', '0'),
(22, '<b>12 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">23:56 WIB </span></br>Pengajuan  disetujui oleh Mellina Sudirman (Leader)', 'CTI', 33, 'Main/detail_pengajuan?id=33', '2022-05-12', '23:56:50', '1', NULL, '2', '3', '0'),
(23, '<b>  </b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">: WIB </span></br> oleh  (Karyawan)', 'CTI', 33, 'Main/detail_pengajuan?id=33', '2022-05-12', '23:58:18', '1', NULL, '3', '1', '0'),
(24, '<b>  </b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">: WIB </span></br> oleh  (Karyawan)', 'CTI', 33, 'Main/detail_pengajuan?id=33', '2022-05-12', '23:58:25', '1', NULL, '3', '1', '0'),
(25, '<b>  </b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">: WIB </span></br> oleh  (Karyawan)', 'CTI', 33, 'Main/detail_pengajuan?id=33', '2022-05-13', '00:01:39', '1', NULL, '3', '1', '0'),
(26, '<b>13 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">00:02 WIB </span></br>Pengajuan  disetujui oleh Devita Aulia (Karyawan)', 'CTI', 33, 'Main/detail_pengajuan?id=33', '2022-05-13', '00:02:19', '1', NULL, '3', '1', '0'),
(27, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 34, 'Main/detail_pengajuan?id=34', '2022-05-13', '00:04:40', '1', NULL, '1', '3', '0'),
(28, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 34, 'Main/detail_pengajuan?id=34', '2022-05-13', '00:04:40', '1', NULL, '1', '2', '1'),
(29, '<b>13 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">00:05 WIB </span></br>Pengajuan  disetujui oleh Mellina Sudirman (Leader)', 'CTI', 34, 'Main/detail_pengajuan?id=34', '2022-05-13', '00:05:01', '1', NULL, '2', '1', '1'),
(30, '<b>13 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">00:05 WIB </span></br>Pengajuan  disetujui oleh Mellina Sudirman (Leader)', 'CTI', 34, 'Main/detail_pengajuan?id=34', '2022-05-13', '00:05:01', '1', NULL, '2', '3', '0'),
(31, 'Sahrul Rizal telah mengirimkan pengajuan izin Perjalanan Dinas', 'PJLDNS', 35, 'Main/detail_pengajuan?id=35', '2022-05-13', '00:05:57', '1', NULL, '1', '3', '0'),
(32, 'Sahrul Rizal telah mengirimkan pengajuan izin Perjalanan Dinas', 'PJLDNS', 35, 'Main/detail_pengajuan?id=35', '2022-05-13', '00:05:57', '1', NULL, '1', '2', '1'),
(33, '<b>13 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">00:07 WIB </span></br>Pengajuan  disetujui oleh Mellina Sudirman (Leader)', 'PJLDNS', 35, 'Main/detail_pengajuan?id=35', '2022-05-13', '00:07:51', '1', NULL, '2', '1', '1'),
(34, '<b>13 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">00:07 WIB </span></br>Pengajuan  disetujui oleh Mellina Sudirman (Leader)', 'PJLDNS', 35, 'Main/detail_pengajuan?id=35', '2022-05-13', '00:07:51', '1', NULL, '2', '3', '0'),
(35, 'Sahrul Rizal telah mengirimkan pengajuan izin Perjalanan Dinas', 'PJLDNS', 36, 'Main/detail_pengajuan?id=36', '2022-05-13', '00:08:18', '1', NULL, '1', '3', '0'),
(36, 'Sahrul Rizal telah mengirimkan pengajuan izin Perjalanan Dinas', 'PJLDNS', 36, 'Main/detail_pengajuan?id=36', '2022-05-13', '00:08:18', '1', NULL, '1', '2', '0'),
(37, '<b>13 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">00:08 WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'PJLDNS', 36, 'Main/detail_pengajuan?id=36', '2022-05-13', '00:08:25', '1', NULL, '1', '3', '1'),
(38, '<b>13 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">00:08 WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'PJLDNS', 36, 'Main/detail_pengajuan?id=36', '2022-05-13', '00:08:25', '1', NULL, '1', '2', '1'),
(39, 'Sahrul Rizal telah mengirimkan pengajuan izin Sakit', 'SKT', 37, 'Main/detail_pengajuan?id=37', '2023-06-09', '20:18:06', '1', NULL, '1', '3', '0'),
(40, 'Sahrul Rizal telah mengirimkan pengajuan izin Sakit', 'SKT', 37, 'Main/detail_pengajuan?id=37', '2023-06-09', '20:18:06', '1', NULL, '1', '2', '0'),
(41, '<b>09 Juni 2023</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">20:18 WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'SKT', 37, 'Main/detail_pengajuan?id=37', '2023-06-09', '20:18:27', '1', NULL, '1', '3', '0'),
(42, '<b>09 Juni 2023</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">20:18 WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'SKT', 37, 'Main/detail_pengajuan?id=37', '2023-06-09', '20:18:27', '1', NULL, '1', '2', '0'),
(43, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 38, 'Main/detail_pengajuan?id=38', '2023-06-09', '20:18:48', '1', NULL, '1', '3', '1'),
(44, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 38, 'Main/detail_pengajuan?id=38', '2023-06-09', '20:18:48', '1', NULL, '1', '2', '1'),
(45, '<b>09 Juni 2023</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">20:19 WIB </span></br>Pengajuan  ditolak oleh Devita Aulia (Karyawan)', 'CTI', 38, 'Main/detail_pengajuan?id=38', '2023-06-09', '20:19:46', '1', NULL, '3', '1', '0'),
(46, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 39, 'Main/detail_pengajuan?id=39', '2023-06-11', '23:27:33', '1', NULL, '1', '3', '0'),
(47, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 39, 'Main/detail_pengajuan?id=39', '2023-06-11', '23:27:33', '1', NULL, '1', '2', '0'),
(48, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 40, 'Main/detail_pengajuan?id=40', '2023-06-11', '23:30:02', '1', NULL, '1', '3', '0'),
(49, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 40, 'Main/detail_pengajuan?id=40', '2023-06-11', '23:30:02', '1', NULL, '1', '2', '0'),
(50, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 41, 'Main/detail_pengajuan?id=41', '2023-06-11', '23:49:44', '1', NULL, '1', '3', '0'),
(51, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 41, 'Main/detail_pengajuan?id=41', '2023-06-11', '23:49:44', '1', NULL, '1', '2', '0'),
(52, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 42, 'Main/detail_pengajuan?id=42', '2023-06-12', '00:52:43', '1', NULL, '1', '3', '0'),
(53, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 42, 'Main/detail_pengajuan?id=42', '2023-06-12', '00:52:43', '1', NULL, '1', '2', '0'),
(54, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 43, 'Main/detail_pengajuan?id=43', '2023-06-12', '00:55:20', '1', NULL, '1', '3', '0'),
(55, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 43, 'Main/detail_pengajuan?id=43', '2023-06-12', '00:55:20', '1', NULL, '1', '2', '0'),
(56, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 44, 'Main/detail_pengajuan?id=44', '2023-06-12', '00:55:28', '1', NULL, '1', '3', '0'),
(57, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 44, 'Main/detail_pengajuan?id=44', '2023-06-12', '00:55:28', '1', NULL, '1', '2', '0'),
(58, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 45, 'Main/detail_pengajuan?id=45', '2023-06-12', '00:55:38', '1', NULL, '1', '3', '0'),
(59, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 45, 'Main/detail_pengajuan?id=45', '2023-06-12', '00:55:38', '1', NULL, '1', '2', '0'),
(60, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 46, 'Main/detail_pengajuan?id=46', '2023-06-12', '00:57:13', '1', NULL, '1', '3', '0'),
(61, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 46, 'Main/detail_pengajuan?id=46', '2023-06-12', '00:57:13', '1', NULL, '1', '2', '0'),
(62, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 47, 'Main/detail_pengajuan?id=47', '2023-06-12', '00:58:34', '1', NULL, '1', '3', '0'),
(63, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 47, 'Main/detail_pengajuan?id=47', '2023-06-12', '00:58:34', '1', NULL, '1', '2', '0'),
(64, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 48, 'Main/detail_pengajuan?id=48', '2023-06-12', '00:58:52', '1', NULL, '1', '3', '0'),
(65, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 48, 'Main/detail_pengajuan?id=48', '2023-06-12', '00:58:52', '1', NULL, '1', '2', '0'),
(66, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 49, 'Main/detail_pengajuan?id=49', '2023-06-12', '01:00:09', '1', NULL, '1', '3', '0'),
(67, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 49, 'Main/detail_pengajuan?id=49', '2023-06-12', '01:00:09', '1', NULL, '1', '2', '0'),
(68, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 50, 'Main/detail_pengajuan?id=50', '2023-06-12', '01:00:39', '1', NULL, '1', '3', '0'),
(69, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 50, 'Main/detail_pengajuan?id=50', '2023-06-12', '01:00:39', '1', NULL, '1', '2', '0'),
(70, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 51, 'Main/detail_pengajuan?id=51', '2023-06-12', '01:00:51', '1', NULL, '1', '3', '0'),
(71, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 51, 'Main/detail_pengajuan?id=51', '2023-06-12', '01:00:51', '1', NULL, '1', '2', '0'),
(72, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 52, 'Main/detail_pengajuan?id=52', '2023-06-12', '01:15:28', '1', NULL, '1', '3', '1'),
(73, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 52, 'Main/detail_pengajuan?id=52', '2023-06-12', '01:15:28', '1', NULL, '1', '2', '0'),
(74, '<b>12 Juni 2023</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">01:15 WIB </span></br>Pengajuan  disetujui oleh Devita Aulia (Karyawan)', 'CTI', 52, 'Main/detail_pengajuan?id=52', '2023-06-12', '01:15:50', '1', NULL, '3', '1', '0'),
(75, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 53, 'Main/detail_pengajuan?id=53', '2023-06-12', '01:17:57', '1', NULL, '1', '3', '1'),
(76, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 53, 'Main/detail_pengajuan?id=53', '2023-06-12', '01:17:57', '1', NULL, '1', '2', '0'),
(77, '<b>12 Juni 2023</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">01:18 WIB </span></br>Pengajuan  disetujui oleh Devita Aulia (Karyawan)', 'CTI', 53, 'Main/detail_pengajuan?id=53', '2023-06-12', '01:18:08', '1', NULL, '3', '1', '0'),
(78, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 54, 'Main/detail_pengajuan?id=54', '2023-06-12', '01:27:26', '1', NULL, '1', '3', '0'),
(79, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 54, 'Main/detail_pengajuan?id=54', '2023-06-12', '01:27:26', '1', NULL, '1', '2', '0'),
(80, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 55, 'Main/detail_pengajuan?id=55', '2023-06-12', '01:27:32', '1', NULL, '1', '3', '0'),
(81, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 55, 'Main/detail_pengajuan?id=55', '2023-06-12', '01:27:32', '1', NULL, '1', '2', '0'),
(82, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 56, 'Main/detail_pengajuan?id=56', '2023-06-12', '01:27:33', '1', NULL, '1', '3', '0'),
(83, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 56, 'Main/detail_pengajuan?id=56', '2023-06-12', '01:27:33', '1', NULL, '1', '2', '0'),
(84, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 57, 'Main/detail_pengajuan?id=57', '2023-06-12', '01:27:40', '1', NULL, '1', '3', '0'),
(85, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 57, 'Main/detail_pengajuan?id=57', '2023-06-12', '01:27:40', '1', NULL, '1', '2', '0'),
(86, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 58, 'Main/detail_pengajuan?id=58', '2023-06-12', '01:28:19', '1', NULL, '1', '3', '0'),
(87, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 58, 'Main/detail_pengajuan?id=58', '2023-06-12', '01:28:19', '1', NULL, '1', '2', '0'),
(88, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 59, 'Main/detail_pengajuan?id=59', '2023-06-12', '01:28:25', '1', NULL, '1', '3', '1'),
(89, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 59, 'Main/detail_pengajuan?id=59', '2023-06-12', '01:28:25', '1', NULL, '1', '2', '0'),
(90, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 65, 'Main/detail_pengajuan?id=65', '2023-06-12', '01:35:59', '1', NULL, '1', '3', '1'),
(91, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 65, 'Main/detail_pengajuan?id=65', '2023-06-12', '01:35:59', '1', NULL, '1', '2', '0'),
(92, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 66, 'Main/detail_pengajuan?id=66', '2023-06-12', '01:38:45', '1', NULL, '1', '3', '1'),
(93, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 66, 'Main/detail_pengajuan?id=66', '2023-06-12', '01:38:45', '1', NULL, '1', '2', '0'),
(94, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 67, 'Main/detail_pengajuan?id=67', '2023-06-12', '01:40:18', '1', NULL, '1', '3', '1'),
(95, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 67, 'Main/detail_pengajuan?id=67', '2023-06-12', '01:40:18', '1', NULL, '1', '2', '0'),
(96, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 68, 'Main/detail_pengajuan?id=68', '2023-06-12', '01:43:13', '1', NULL, '1', '3', '1'),
(97, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 68, 'Main/detail_pengajuan?id=68', '2023-06-12', '01:43:13', '1', NULL, '1', '2', '0'),
(98, '<b>12 Juni 2023</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">01:43 WIB </span></br>Pengajuan  disetujui oleh Devita Aulia (Karyawan)', 'CTI', 68, 'Main/detail_pengajuan?id=68', '2023-06-12', '01:43:43', '1', NULL, '3', '1', '0'),
(99, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 69, 'Main/detail_pengajuan?id=69', '2023-06-12', '01:43:54', '1', NULL, '1', '3', '1'),
(100, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 69, 'Main/detail_pengajuan?id=69', '2023-06-12', '01:43:54', '1', NULL, '1', '2', '0'),
(101, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 70, 'Main/detail_pengajuan?id=70', '2023-06-12', '01:48:34', '1', NULL, '1', '3', '1'),
(102, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 70, 'Main/detail_pengajuan?id=70', '2023-06-12', '01:48:34', '1', NULL, '1', '2', '0'),
(103, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 71, 'Main/detail_pengajuan?id=71', '2023-06-12', '01:48:38', '1', NULL, '1', '3', '1'),
(104, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 71, 'Main/detail_pengajuan?id=71', '2023-06-12', '01:48:38', '1', NULL, '1', '2', '0'),
(105, '<b>12 Juni 2023</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">01:48 WIB </span></br>Pengajuan  disetujui oleh Devita Aulia (Karyawan)', 'CTI', 70, 'Main/detail_pengajuan?id=70', '2023-06-12', '01:48:45', '1', NULL, '3', '1', '0'),
(106, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 72, 'Main/detail_pengajuan?id=72', '2023-06-12', '01:49:13', '1', NULL, '1', '3', '1'),
(107, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 72, 'Main/detail_pengajuan?id=72', '2023-06-12', '01:49:13', '1', NULL, '1', '2', '0'),
(108, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 73, 'Main/detail_pengajuan?id=73', '2023-06-12', '01:52:59', '1', NULL, '1', '3', '1'),
(109, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 73, 'Main/detail_pengajuan?id=73', '2023-06-12', '01:52:59', '1', NULL, '1', '2', '0'),
(110, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 74, 'Main/detail_pengajuan?id=74', '2023-06-12', '01:53:04', '1', NULL, '1', '3', '1'),
(111, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 74, 'Main/detail_pengajuan?id=74', '2023-06-12', '01:53:04', '1', NULL, '1', '2', '0'),
(112, '<b>12 Juni 2023</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">01:54 WIB </span></br>Pengajuan  disetujui oleh Devita Aulia (Karyawan)', 'CTI', 73, 'Main/detail_pengajuan?id=73', '2023-06-12', '01:54:25', '1', NULL, '3', '1', '0'),
(113, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 75, 'Main/detail_pengajuan?id=75', '2023-06-12', '01:54:51', '1', NULL, '1', '3', '1'),
(114, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 75, 'Main/detail_pengajuan?id=75', '2023-06-12', '01:54:51', '1', NULL, '1', '2', '0'),
(115, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 76, 'Main/detail_pengajuan?id=76', '2023-06-12', '01:57:54', '1', NULL, '1', '3', '1'),
(116, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 76, 'Main/detail_pengajuan?id=76', '2023-06-12', '01:57:54', '1', NULL, '1', '2', '0'),
(117, '<b>12 Juni 2023</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">01:58 WIB </span></br>Pengajuan  disetujui oleh Devita Aulia (Karyawan)', 'CTI', 76, 'Main/detail_pengajuan?id=76', '2023-06-12', '01:58:04', '1', NULL, '3', '1', '0'),
(118, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 77, 'Main/detail_pengajuan?id=77', '2023-06-12', '01:58:09', '1', NULL, '1', '3', '1'),
(119, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 77, 'Main/detail_pengajuan?id=77', '2023-06-12', '01:58:09', '1', NULL, '1', '2', '0'),
(120, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 78, 'Main/detail_pengajuan?id=78', '2023-06-12', '02:02:52', '1', NULL, '1', '3', '1'),
(121, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 78, 'Main/detail_pengajuan?id=78', '2023-06-12', '02:02:52', '1', NULL, '1', '2', '0'),
(122, '<b>12 Juni 2023</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">02:03 WIB </span></br>Pengajuan  disetujui oleh Devita Aulia (Karyawan)', 'CTI', 78, 'Main/detail_pengajuan?id=78', '2023-06-12', '02:03:15', '1', NULL, '3', '1', '0'),
(123, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 79, 'Main/detail_pengajuan?id=79', '2023-06-12', '02:03:20', '1', NULL, '1', '3', '1'),
(124, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 79, 'Main/detail_pengajuan?id=79', '2023-06-12', '02:03:20', '1', NULL, '1', '2', '0'),
(125, 'Joni telah mengirimkan pengajuan izin Sakit', 'SKT', 80, 'Main/detail_pengajuan?id=80', '2023-06-13', '19:17:37', '1', NULL, '8', '3', '1'),
(126, 'Joni telah mengirimkan pengajuan izin Sakit', 'SKT', 80, 'Main/detail_pengajuan?id=80', '2023-06-13', '19:17:37', '1', NULL, '8', '2', '0'),
(127, '<b>13 Juni 2023</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">19:17 WIB </span></br>Pengajuan  disetujui oleh Devita Aulia (Karyawan)', 'SKT', 80, 'Main/detail_pengajuan?id=80', '2023-06-13', '19:17:55', '1', NULL, '3', '8', '0'),
(128, 'Joni telah mengirimkan pengajuan izin Cuti', 'CTI', 81, 'Main/detail_pengajuan?id=81', '2023-06-13', '20:14:47', '1', NULL, '8', '3', '1'),
(129, 'Joni telah mengirimkan pengajuan izin Cuti', 'CTI', 81, 'Main/detail_pengajuan?id=81', '2023-06-13', '20:14:47', '1', NULL, '8', '2', '0'),
(130, '<b>13 Juni 2023</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">20:15 WIB </span></br>Pengajuan  disetujui oleh Devita Aulia (Karyawan)', 'CTI', 81, 'Main/detail_pengajuan?id=81', '2023-06-13', '20:15:01', '1', NULL, '3', '8', '1'),
(131, 'Sahrul Rizal telah mengirimkan pengajuan izin Perjalanan Dinas', 'PJLDNS', 82, 'Main/detail_pengajuan?id=82', '2023-06-14', '23:58:38', '1', NULL, '1', '3', '0'),
(132, 'Sahrul Rizal telah mengirimkan pengajuan izin Perjalanan Dinas', 'PJLDNS', 82, 'Main/detail_pengajuan?id=82', '2023-06-14', '23:58:38', '1', NULL, '1', '2', '0'),
(133, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 83, 'Main/detail_pengajuan?id=83', '2023-06-15', '18:54:25', '1', NULL, '1', '3', '0'),
(134, 'Sahrul Rizal telah mengirimkan pengajuan izin Cuti', 'CTI', 83, 'Main/detail_pengajuan?id=83', '2023-06-15', '18:54:25', '1', NULL, '1', '2', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id` int(11) NOT NULL,
  `status_pengajuan` varchar(35) DEFAULT NULL COMMENT '1 => Cuti',
  `tgl_mulai` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `ctddate` date DEFAULT NULL,
  `ctdtime` time DEFAULT NULL,
  `karyawan_id` int(11) DEFAULT NULL,
  `keterangan` text,
  `jumlah_hari` tinyint(2) NOT NULL,
  `diterima` char(1) DEFAULT '0' COMMENT '0 => Belum Ada Aksi\n1 => Ya\n2 -> Tidak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id`, `status_pengajuan`, `tgl_mulai`, `tgl_akhir`, `ctddate`, `ctdtime`, `karyawan_id`, `keterangan`, `jumlah_hari`, `diterima`) VALUES
(14, 'CTI', '2022-04-27', '2022-04-27', '2022-04-25', '22:48:25', 1, NULL, 0, '1'),
(15, 'PJLDNS', '2022-04-27', '2022-04-30', '2022-04-27', '22:08:57', 1, NULL, 0, '1'),
(16, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:13:56', 1, 'hello saya izn boleh', 0, '1'),
(17, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:14:03', 1, 'hello saya izn boleh', 0, '1'),
(18, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:15:08', 1, 'hello saya izn boleh', 0, '1'),
(19, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:15:50', 1, 'hello saya izn boleh', 0, '1'),
(20, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:16:00', 1, 'hello saya izn boleh', 0, '1'),
(21, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:16:18', 1, 'hello saya izn boleh', 0, '1'),
(22, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:16:22', 1, 'hello saya izn boleh', 0, '1'),
(23, 'SKT', '2022-04-27', '2022-04-29', '2022-04-27', '23:16:50', 1, 'hello saya izn boleh', 0, '1'),
(24, 'PJLDNS', '2022-04-27', '2022-04-29', '2022-04-27', '23:17:00', 1, 'hello saya izn boleh', 0, '1'),
(25, 'LMB', '2022-04-27', '2022-04-29', '2022-04-27', '23:17:11', 1, 'hello saya izn boleh', 0, '1'),
(26, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:18:33', 1, 'hello saya izn boleh', 0, '1'),
(27, 'CTI', '2022-05-01', '2022-05-04', '2022-05-01', '23:17:53', 1, 'Hello', 0, '1'),
(28, 'CTI', '2022-05-02', '2022-05-02', '2022-05-02', '00:02:01', 1, 'hores', 0, '1'),
(29, 'PJLDNS', '2022-05-11', '2022-05-12', '2022-05-02', '00:35:06', 1, 'dsadsa', 0, '1'),
(30, 'CTI', '2022-05-02', '2022-05-03', '2022-05-02', '00:38:07', 1, 'ok', 0, '1'),
(31, 'CTI', '2022-05-13', '2022-05-14', '2022-05-12', '22:39:09', 1, 'Izin cuti boleh ya', 0, '1'),
(32, NULL, NULL, NULL, '2022-05-12', '23:23:56', 1, NULL, 0, '1'),
(33, 'CTI', '2022-05-12', '2022-05-14', '2022-05-12', '23:56:25', 1, 'sadas', 0, '1'),
(34, 'CTI', '2022-05-13', '2022-05-18', '2022-05-13', '00:04:40', 1, 'Cobain', 0, '1'),
(35, 'PJLDNS', '2022-05-13', '2022-05-14', '2022-05-13', '00:05:57', 1, 'izin elakukan perjalanan dinas ke bali\r\n', 0, '1'),
(36, 'PJLDNS', '2022-05-13', '2022-05-13', '2022-05-13', '00:08:18', 1, 'dasdsa', 0, '1'),
(37, 'SKT', '2022-01-02', '2022-10-02', '2023-06-09', '20:18:06', 1, 'Aku sakit', 0, '1'),
(38, 'CTI', '2022-01-22', '2023-01-02', '2023-06-09', '20:18:48', 1, 'Saya sakit cemana ini', 0, '1'),
(39, 'CTI', '0000-00-00', '0000-00-00', '2023-06-11', '23:27:33', 1, '', 0, '1'),
(40, 'CTI', '2023-06-11', '2023-06-14', '2023-06-11', '23:30:02', 1, '', 0, '1'),
(41, 'CTI', '2023-06-11', '2023-06-12', '2023-06-11', '23:49:44', 1, 'GHF', 12, '1'),
(42, 'CTI', '2022-12-10', '2023-06-16', '2023-06-12', '00:52:43', 1, '', 100, '1'),
(43, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '00:55:20', 1, '', 0, '1'),
(44, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '00:55:28', 1, '', 40, '1'),
(45, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '00:55:38', 1, '', 40, '1'),
(46, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '00:57:13', 1, '', 122, '1'),
(47, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '00:58:34', 1, '', 0, '1'),
(48, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '00:58:52', 1, '', 100, '1'),
(49, 'CTI', '2023-06-20', '2023-06-17', '2023-06-12', '01:00:09', 1, 'safas', 10, '1'),
(50, 'CTI', '2023-06-20', '2023-06-17', '2023-06-12', '01:00:39', 1, 'hayuk', 1, '1'),
(51, 'CTI', '2023-06-20', '2023-06-17', '2023-06-12', '01:00:51', 1, 'hayuk', 11, '1'),
(52, 'CTI', '2023-06-12', '2023-06-15', '2023-06-12', '01:15:28', 1, 'Jatah cuti dikurang ya', 2, '1'),
(53, 'CTI', '2023-06-13', '2023-06-22', '2023-06-12', '01:17:57', 1, '1', 3, '1'),
(54, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '01:27:26', 1, 'sad', 2, '1'),
(55, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '01:27:32', 1, 'sad', 7, '1'),
(56, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '01:27:33', 1, 'sad', 7, '1'),
(57, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '01:27:40', 1, 'sad', 7, '1'),
(58, 'CTI', '2023-06-12', '2023-06-14', '2023-06-12', '01:28:19', 1, 'hallo', 7, '1'),
(59, 'CTI', '2023-06-12', '2023-06-14', '2023-06-12', '01:28:25', 1, 'hallo', 7, '1'),
(60, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '01:29:14', 3, '', 0, '1'),
(61, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '01:31:30', 3, '', 0, '1'),
(62, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '01:31:51', 3, '', 0, '1'),
(63, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '01:32:19', 3, '', 0, '1'),
(64, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '01:32:24', 3, '', 0, '1'),
(65, 'CTI', '2023-06-12', '2023-06-14', '2023-06-12', '01:35:59', 1, 'hallo', 7, '1'),
(66, 'CTI', '2023-06-12', '2023-06-12', '2023-06-12', '01:38:45', 1, 'heallo', 12, '1'),
(67, 'CTI', '2023-06-12', '2023-06-12', '2023-06-12', '01:40:18', 1, 'heallo', 12, '1'),
(68, 'CTI', '2023-06-12', '2023-06-15', '2023-06-12', '01:43:13', 1, 'hakku', 10, '1'),
(69, 'CTI', '2023-06-12', '2023-06-15', '2023-06-12', '01:43:54', 1, 'hakku', 10, '1'),
(70, 'CTI', '2023-06-12', '2023-06-15', '2023-06-12', '01:48:34', 1, 'hakku', 2, '1'),
(71, 'CTI', '2023-06-12', '2023-06-15', '2023-06-12', '01:48:38', 1, 'hakku', 2, '1'),
(72, 'CTI', '2023-06-12', '2023-06-15', '2023-06-12', '01:49:13', 1, 'hakku', 2, '1'),
(73, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '01:52:59', 1, '', 2, '1'),
(74, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '01:53:04', 1, '', 2, '1'),
(75, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '01:54:51', 1, '', 2, '1'),
(76, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '01:57:54', 1, '', 12, '1'),
(77, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '01:58:09', 1, '', 12, '1'),
(78, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '02:02:52', 1, '', 12, '1'),
(79, 'CTI', '0000-00-00', '0000-00-00', '2023-06-12', '02:03:20', 1, '', 12, '1'),
(80, 'SKT', '2023-06-13', '2023-06-14', '2023-06-13', '19:17:37', 8, '12', 0, '1'),
(81, 'CTI', '2023-06-14', '2023-06-14', '2023-06-13', '20:14:47', 8, '', 1, '1'),
(82, 'PJLDNS', '2023-06-14', '2023-06-15', '2023-06-14', '23:58:38', 1, 'jauh\r\n', 0, '0'),
(83, 'CTI', '2023-06-15', '2023-06-17', '2023-06-15', '18:54:25', 1, '-', 1, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajuan_act`
--

CREATE TABLE `tbl_pengajuan_act` (
  `id` int(11) NOT NULL,
  `pengajuan_id` int(11) DEFAULT NULL,
  `approve_id` int(11) DEFAULT NULL,
  `status_action` char(1) DEFAULT NULL COMMENT '0 => Pending\n1 => Approve\n2 => Not Approve'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengajuan_act`
--

INSERT INTO `tbl_pengajuan_act` (`id`, `pengajuan_id`, `approve_id`, `status_action`) VALUES
(1, 31, 1, NULL),
(2, 31, 1, NULL),
(3, 31, 1, NULL),
(4, 31, 1, NULL),
(5, 31, 1, NULL),
(6, 31, 1, NULL),
(7, 31, 1, NULL),
(8, 31, 1, '1'),
(9, 31, 1, '3'),
(10, 30, 1, '3'),
(11, 31, 1, '3'),
(12, 31, 1, '3'),
(13, 31, 1, '3'),
(14, 31, 1, '3'),
(15, 33, 2, '1'),
(16, 33, 3, '2'),
(17, 33, 3, '2'),
(18, 33, 3, '2'),
(19, 33, 3, '2'),
(20, 33, 3, '2'),
(21, 33, 3, '1'),
(22, 33, 3, '1'),
(23, 34, 2, '1'),
(24, 35, 2, '1'),
(25, 36, 1, '3'),
(26, 37, 1, '3'),
(27, 38, 3, '2'),
(28, 52, 3, '1'),
(29, 53, 3, '1'),
(30, 68, 3, '1'),
(31, 70, 3, '1'),
(32, 72, 3, '1'),
(33, 73, 3, '1'),
(34, 75, 3, '2'),
(35, 76, 3, '1'),
(36, 77, 3, '2'),
(37, 78, 3, '1'),
(38, 79, 3, '2'),
(39, 80, 3, '1'),
(40, 81, 3, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengaturan`
--

CREATE TABLE `tbl_pengaturan` (
  `id` int(11) NOT NULL,
  `tgl_target` date DEFAULT NULL,
  `jam_telat` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `jam_buka` time DEFAULT NULL,
  `aktif` char(1) DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengaturan`
--

INSERT INTO `tbl_pengaturan` (`id`, `tgl_target`, `jam_telat`, `jam_keluar`, `jam_buka`, `aktif`, `jam_tutup`) VALUES
(1, '2022-04-10', '08:00:00', '16:00:00', '07:00:00', '1', '24:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `ctddate` date DEFAULT NULL,
  `ctdtime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `ctddate`, `ctdtime`) VALUES
(1, '01', 'c4ca4238a0b923820dcc509a6f75849b', 'sahrulrizal2@gmail.com', '2022-01-01', '10:00:00'),
(2, '02', 'c4ca4238a0b923820dcc509a6f75849b', 'mellinasudriman@gmail.com', '2022-01-02', '10:00:00'),
(3, '03', 'c4ca4238a0b923820dcc509a6f75849b', 'devitaaulia@gmail.com', '2022-01-03', '10:00:00'),
(4, '04', 'c4ca4238a0b923820dcc509a6f75849b', 'admin@gmail.com', '2022-01-03', '10:00:00'),
(5, '05', 'c4ca4238a0b923820dcc509a6f75849b', 'joni@dasdas.com', '2023-06-13', '19:11:36'),
(6, '05', 'c4ca4238a0b923820dcc509a6f75849b', 'joni@dasdas.com', '2023-06-13', '19:11:49'),
(7, '05', 'c4ca4238a0b923820dcc509a6f75849b', 'joni@dasdas.com', '2023-06-13', '19:12:32'),
(8, '05', 'c4ca4238a0b923820dcc509a6f75849b', 'joni@dasdas.com', '2023-06-13', '19:12:50'),
(9, '07', 'c81e728d9d4c2f636f067f89cc14862c', 'joni@gplate.com', '2023-06-13', '19:13:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_absensi_karyawan1_idx` (`karyawan_id`),
  ADD KEY `fk_tbl_absensi_tbl_pengajuan1_idx` (`tbl_pengajuan_id`),
  ADD KEY `fk_tbl_pengaturan` (`pengaturan_id`);

--
-- Indeks untuk tabel `tbl_cuti_karyawan`
--
ALTER TABLE `tbl_cuti_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jabatan_jabatan_grp_idx` (`jabatan_grp_id`);

--
-- Indeks untuk tabel `tbl_jabatan_grup`
--
ALTER TABLE `tbl_jabatan_grup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_karyawan_users1_idx` (`users_id`),
  ADD KEY `fk_karyawan_tbl_jabatan1_idx` (`jabatan_id`);

--
-- Indeks untuk tabel `tbl_ket_absensi`
--
ALTER TABLE `tbl_ket_absensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_ket_UNIQUE` (`kode_ket`);

--
-- Indeks untuk tabel `tbl_log_absensi`
--
ALTER TABLE `tbl_log_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_log_pengajuan`
--
ALTER TABLE `tbl_log_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_notif`
--
ALTER TABLE `tbl_notif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_notif_tbl_karyawan1_idx` (`ctdby`);

--
-- Indeks untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengajuan_karyawan1_idx` (`karyawan_id`);

--
-- Indeks untuk tabel `tbl_pengajuan_act`
--
ALTER TABLE `tbl_pengajuan_act`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengajuan_has_karyawan_karyawan1_idx` (`approve_id`),
  ADD KEY `fk_pengajuan_has_karyawan_pengajuan1_idx` (`pengajuan_id`);

--
-- Indeks untuk tabel `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_karyawan1_idx` (`ctdtime`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `tbl_cuti_karyawan`
--
ALTER TABLE `tbl_cuti_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_jabatan_grup`
--
ALTER TABLE `tbl_jabatan_grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_ket_absensi`
--
ALTER TABLE `tbl_ket_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_log_absensi`
--
ALTER TABLE `tbl_log_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_log_pengajuan`
--
ALTER TABLE `tbl_log_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tbl_notif`
--
ALTER TABLE `tbl_notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajuan_act`
--
ALTER TABLE `tbl_pengajuan_act`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD CONSTRAINT `fk_tbl_absensi_karyawan1` FOREIGN KEY (`karyawan_id`) REFERENCES `tbl_karyawan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_absensi_tbl_pengajuan1` FOREIGN KEY (`tbl_pengajuan_id`) REFERENCES `tbl_pengajuan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_absensi_tbl_pengaturan1` FOREIGN KEY (`pengaturan_id`) REFERENCES `tbl_pengaturan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD CONSTRAINT `fk_karyawan_tbl_jabatan1` FOREIGN KEY (`jabatan_id`) REFERENCES `tbl_jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_karyawan_users1` FOREIGN KEY (`users_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_notif`
--
ALTER TABLE `tbl_notif`
  ADD CONSTRAINT `fk_tbl_notif_tbl_karyawan1` FOREIGN KEY (`ctdby`) REFERENCES `tbl_karyawan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD CONSTRAINT `fk_pengajuan_karyawan1` FOREIGN KEY (`karyawan_id`) REFERENCES `tbl_karyawan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_pengajuan_act`
--
ALTER TABLE `tbl_pengajuan_act`
  ADD CONSTRAINT `fk_pengajuan_has_karyawan_karyawan1` FOREIGN KEY (`approve_id`) REFERENCES `tbl_karyawan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengajuan_has_karyawan_pengajuan1` FOREIGN KEY (`pengajuan_id`) REFERENCES `tbl_pengajuan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
