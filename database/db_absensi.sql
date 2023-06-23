-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Bulan Mei 2022 pada 09.29
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `kode_ket` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id`, `jam_masuk`, `jam_keluar`, `status_absensi`, `aktif`, `tanggal`, `ctddate`, `ctdtime`, `karyawan_id`, `tbl_pengajuan_id`, `pengaturan_id`, `img_masuk`, `img_keluar`, `kode_ket`) VALUES
(1, '22:48:06', '22:48:13', 'O', 1, '2022-04-25', '2022-04-25', '22:48:06', 1, NULL, 1, '20220425224806img.png', '20220425224813img.png', 'ABSNPLNGDLUAR'),
(2, NULL, NULL, 'CTI', 1, '2022-04-25', '2022-04-25', '22:48:25', 1, 14, 1, NULL, NULL, 'CTI'),
(3, NULL, NULL, 'PJLDNS', 1, '2022-04-27', '2022-04-27', '22:08:57', 1, 15, 1, NULL, NULL, 'PJLDNS'),
(4, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:13:56', 1, 16, 1, NULL, NULL, 'CTI'),
(5, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:14:03', 1, 17, 1, NULL, NULL, 'CTI'),
(6, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:15:08', 1, 18, 1, NULL, NULL, 'CTI'),
(7, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:15:50', 1, 19, 1, NULL, NULL, 'CTI'),
(8, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:16:00', 1, 20, 1, NULL, NULL, 'CTI'),
(9, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:16:18', 1, 21, 1, NULL, NULL, 'CTI'),
(10, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:16:22', 1, 22, 1, NULL, NULL, 'CTI'),
(11, NULL, NULL, 'SKT', 1, '2022-04-27', '2022-04-27', '23:16:50', 1, 23, 1, NULL, NULL, 'SKT'),
(12, NULL, NULL, 'PJLDNS', 1, '2022-04-27', '2022-04-27', '23:17:00', 1, 24, 1, NULL, NULL, 'PJLDNS'),
(13, NULL, NULL, 'LMB', 1, '2022-04-27', '2022-04-27', '23:17:11', 1, 25, 1, NULL, NULL, 'LMB'),
(14, NULL, NULL, 'CTI', 1, '2022-04-27', '2022-04-27', '23:18:33', 1, 26, 1, NULL, NULL, 'CTI'),
(15, NULL, NULL, 'CTI', 1, '2022-05-01', '2022-05-01', '23:17:53', 1, 27, 1, NULL, NULL, 'CTI'),
(16, NULL, NULL, 'CTI', 1, '2022-05-02', '2022-05-02', '00:02:01', 1, 28, 1, NULL, NULL, 'CTI'),
(17, NULL, NULL, 'PJLDNS', 1, '2022-05-02', '2022-05-02', '00:35:06', 1, 29, 1, NULL, NULL, 'PJLDNS'),
(18, NULL, NULL, 'CTI', 1, '2022-05-02', '2022-05-02', '00:38:07', 1, 30, 1, NULL, NULL, 'CTI'),
(19, NULL, NULL, 'CTI', 1, '2022-05-12', '2022-05-12', '22:39:09', 1, 31, 1, NULL, NULL, 'CTI'),
(20, NULL, NULL, 'CTI', 1, '2022-05-12', '2022-05-12', '23:56:25', 1, 33, 1, NULL, NULL, 'CTI'),
(21, NULL, NULL, 'CTI', 1, '2022-05-13', '2022-05-13', '00:04:40', 1, 34, 1, NULL, NULL, 'CTI'),
(22, NULL, NULL, 'PJLDNS', 1, '2022-05-13', '2022-05-13', '00:05:57', 1, 35, 1, NULL, NULL, 'PJLDNS'),
(23, NULL, NULL, 'PJLDNS', 1, '2022-05-13', '2022-05-13', '00:08:18', 1, 36, 1, NULL, NULL, 'PJLDNS'),
(24, '10:55:46', '10:56:06', 'O', 1, '2022-05-15', '2022-05-15', '10:55:46', 1, NULL, 1, '20220515105546img.png', '20220515105606img.png', 'TSK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id` int(11) NOT NULL,
  `nma_jabatan` varchar(45) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `leader` char(1) DEFAULT NULL COMMENT '1 => Ya\n0 => Tidak',
  `keterangan` text DEFAULT NULL,
  `jabatan_grp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id`, `nma_jabatan`, `parent_id`, `leader`, `keterangan`, `jabatan_grp_id`) VALUES
(1, 'Leader Development', NULL, '1', NULL, 1),
(2, 'Front-End Development', 1, NULL, NULL, 1),
(3, 'HRD', NULL, '', NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan_grup`
--

CREATE TABLE `tbl_jabatan_grup` (
  `id` int(11) NOT NULL,
  `nama_group` varchar(40) NOT NULL,
  `ctddate` date NOT NULL,
  `ctdby` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jabatan_grup`
--

INSERT INTO `tbl_jabatan_grup` (`id`, `nama_group`, `ctddate`, `ctdby`) VALUES
(1, 'Development', '2022-01-01', '1'),
(2, 'HRD', '2022-01-01', '1');

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
(3, '03', 'devitaaulia@gmail.com', 'Devita Aulia', 'Depok', '1', '2015-01-01', '2', '08976288123', '1997-08-22', '1', 3, 3, '8.png');

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
  `msg` text DEFAULT NULL
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
(21, NULL, '10:56:06', 'O', 'TSK', '2022-05-15', '10:56:06', 1, '1', 'Berhasil melakukan absen pulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log_pengajuan`
--

CREATE TABLE `tbl_log_pengajuan` (
  `id` int(11) NOT NULL,
  `pengajuan_id` int(11) DEFAULT NULL,
  `act_pengajuan_id` int(11) DEFAULT NULL,
  `msg` text DEFAULT NULL,
  `ctddate` date DEFAULT NULL,
  `ctdtime` time DEFAULT NULL,
  `ctdby` int(11) DEFAULT NULL,
  `accept` char(1) DEFAULT NULL COMMENT '0 => Default\n1 => Diterima\n2 => Ditolak',
  `acceptBy` int(11) DEFAULT NULL COMMENT 'Diterima oleh soap, ini ID Karyawan',
  `acceptNum` char(1) DEFAULT NULL COMMENT 'Penerima kebarapa ? ',
  `acceptNote` text DEFAULT NULL COMMENT 'Catatan apabila digerida tau ditolak'
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
(22, 36, NULL, NULL, '2022-05-13', '00:08:25', 1, '3', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_notif`
--

CREATE TABLE `tbl_notif` (
  `id` int(11) NOT NULL,
  `pesan` text DEFAULT NULL,
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
(33, '<b>13 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">00:07 WIB </span></br>Pengajuan  disetujui oleh Mellina Sudirman (Leader)', 'PJLDNS', 35, 'Main/detail_pengajuan?id=35', '2022-05-13', '00:07:51', '1', NULL, '2', '1', '0'),
(34, '<b>13 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">00:07 WIB </span></br>Pengajuan  disetujui oleh Mellina Sudirman (Leader)', 'PJLDNS', 35, 'Main/detail_pengajuan?id=35', '2022-05-13', '00:07:51', '1', NULL, '2', '3', '0'),
(35, 'Sahrul Rizal telah mengirimkan pengajuan izin Perjalanan Dinas', 'PJLDNS', 36, 'Main/detail_pengajuan?id=36', '2022-05-13', '00:08:18', '1', NULL, '1', '3', '0'),
(36, 'Sahrul Rizal telah mengirimkan pengajuan izin Perjalanan Dinas', 'PJLDNS', 36, 'Main/detail_pengajuan?id=36', '2022-05-13', '00:08:18', '1', NULL, '1', '2', '0'),
(37, '<b>13 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">00:08 WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'PJLDNS', 36, 'Main/detail_pengajuan?id=36', '2022-05-13', '00:08:25', '1', NULL, '1', '3', '0'),
(38, '<b>13 Mei 2022</b><span style=\"margin-left: 4px;font-size: 12px;color: #666;\">00:08 WIB </span></br>Sahrul Rizal membatalkan pengajuan ', 'PJLDNS', 36, 'Main/detail_pengajuan?id=36', '2022-05-13', '00:08:25', '1', NULL, '1', '2', '1');

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
  `keterangan` text DEFAULT NULL,
  `diterima` char(1) DEFAULT '0' COMMENT '0 => Belum Ada Aksi\n1 => Ya\n2 -> Tidak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id`, `status_pengajuan`, `tgl_mulai`, `tgl_akhir`, `ctddate`, `ctdtime`, `karyawan_id`, `keterangan`, `diterima`) VALUES
(14, 'CTI', '2022-04-27', '2022-04-27', '2022-04-25', '22:48:25', 1, NULL, '3'),
(15, 'PJLDNS', '2022-04-27', '2022-04-30', '2022-04-27', '22:08:57', 1, NULL, '3'),
(16, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:13:56', 1, 'hello saya izn boleh', '3'),
(17, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:14:03', 1, 'hello saya izn boleh', '3'),
(18, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:15:08', 1, 'hello saya izn boleh', '3'),
(19, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:15:50', 1, 'hello saya izn boleh', '3'),
(20, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:16:00', 1, 'hello saya izn boleh', '3'),
(21, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:16:18', 1, 'hello saya izn boleh', '3'),
(22, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:16:22', 1, 'hello saya izn boleh', '3'),
(23, 'SKT', '2022-04-27', '2022-04-29', '2022-04-27', '23:16:50', 1, 'hello saya izn boleh', '3'),
(24, 'PJLDNS', '2022-04-27', '2022-04-29', '2022-04-27', '23:17:00', 1, 'hello saya izn boleh', '3'),
(25, 'LMB', '2022-04-27', '2022-04-29', '2022-04-27', '23:17:11', 1, 'hello saya izn boleh', '3'),
(26, 'CTI', '2022-04-27', '2022-04-29', '2022-04-27', '23:18:33', 1, 'hello saya izn boleh', '3'),
(27, 'CTI', '2022-05-01', '2022-05-04', '2022-05-01', '23:17:53', 1, 'Hello', '3'),
(28, 'CTI', '2022-05-02', '2022-05-02', '2022-05-02', '00:02:01', 1, 'hores', '3'),
(29, 'PJLDNS', '2022-05-11', '2022-05-12', '2022-05-02', '00:35:06', 1, 'dsadsa', '3'),
(30, 'CTI', '2022-05-02', '2022-05-03', '2022-05-02', '00:38:07', 1, 'ok', '3'),
(31, 'CTI', '2022-05-13', '2022-05-14', '2022-05-12', '22:39:09', 1, 'Izin cuti boleh ya', '3'),
(32, NULL, NULL, NULL, '2022-05-12', '23:23:56', 1, NULL, '3'),
(33, 'CTI', '2022-05-12', '2022-05-14', '2022-05-12', '23:56:25', 1, 'sadas', '3'),
(34, 'CTI', '2022-05-13', '2022-05-18', '2022-05-13', '00:04:40', 1, 'Cobain', '3'),
(35, 'PJLDNS', '2022-05-13', '2022-05-14', '2022-05-13', '00:05:57', 1, 'izin elakukan perjalanan dinas ke bali\r\n', '3'),
(36, 'PJLDNS', '2022-05-13', '2022-05-13', '2022-05-13', '00:08:18', 1, 'dasdsa', '3');

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
(25, 36, 1, '3');

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
(3, '03', 'c4ca4238a0b923820dcc509a6f75849b', 'devitaaulia@gmail.com', '2022-01-03', '10:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `tbl_jabatan_grup`
--
ALTER TABLE `tbl_jabatan_grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `tbl_ket_absensi`
--
ALTER TABLE `tbl_ket_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_log_absensi`
--
ALTER TABLE `tbl_log_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_log_pengajuan`
--
ALTER TABLE `tbl_log_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_notif`
--
ALTER TABLE `tbl_notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajuan_act`
--
ALTER TABLE `tbl_pengajuan_act`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

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
