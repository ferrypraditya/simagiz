-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2024 pada 10.58
-- Versi server: 10.1.37-MariaDB
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
-- Database: `dbsimagiz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_cooking`
--

CREATE TABLE `data_cooking` (
  `id` int(11) NOT NULL,
  `tgl_order` datetime DEFAULT NULL,
  `kode_dapur` varchar(30) DEFAULT NULL,
  `kode_menu` varchar(30) DEFAULT NULL,
  `nama_menu` varchar(30) DEFAULT NULL,
  `qty_order` int(5) DEFAULT '0',
  `qty_cooking` int(5) DEFAULT '0',
  `proses_cooking` varchar(30) DEFAULT NULL,
  `STATUS` varchar(30) DEFAULT NULL,
  `pic_cooking` varchar(30) DEFAULT NULL,
  `tgl_cooking` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_delivery`
--

CREATE TABLE `data_delivery` (
  `id` int(11) NOT NULL,
  `kode_packing` varchar(30) DEFAULT NULL,
  `tgl_order` datetime DEFAULT NULL,
  `kode_dapur` varchar(30) DEFAULT NULL,
  `kode_paket` varchar(30) DEFAULT NULL,
  `kode_sekolah` varchar(30) DEFAULT NULL,
  `qty_plan` int(5) DEFAULT '0',
  `qty_packing` int(5) DEFAULT '0',
  `pic_packing` varchar(30) DEFAULT NULL,
  `tgl_packing` datetime DEFAULT NULL,
  `qty_delivery` int(5) DEFAULT '0',
  `pic_delivery` varchar(30) DEFAULT NULL,
  `tgl_delivery` datetime DEFAULT NULL,
  `qty_receipt` int(5) DEFAULT '0',
  `tgl_receipt` datetime DEFAULT NULL,
  `pic_receipt` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_order`
--

CREATE TABLE `data_order` (
  `id` int(11) NOT NULL,
  `kode_sekolah` varchar(30) DEFAULT NULL,
  `nama_sekolah` varchar(30) DEFAULT NULL,
  `kode_paket` varchar(30) DEFAULT NULL,
  `nama_paket` varchar(30) DEFAULT NULL,
  `kode_dapur` varchar(30) DEFAULT NULL,
  `qty_order` int(5) DEFAULT '0',
  `tgl_order` datetime DEFAULT NULL,
  `pic_order` varchar(30) DEFAULT NULL,
  `qty_packing` int(5) DEFAULT '0',
  `tgl_packing` datetime DEFAULT NULL,
  `qty_delivery` int(5) DEFAULT '0',
  `tgl_delivery` datetime DEFAULT NULL,
  `qty_receipt` int(5) DEFAULT '0',
  `tgl_receipt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_prepare`
--

CREATE TABLE `data_prepare` (
  `id` int(11) NOT NULL,
  `tgl_order` datetime DEFAULT NULL,
  `kode_dapur` varchar(30) DEFAULT NULL,
  `kode_menu` varchar(30) DEFAULT NULL,
  `nama_menu` varchar(30) DEFAULT NULL,
  `qty_order` int(5) DEFAULT '0',
  `bahan_baku` varchar(30) DEFAULT NULL,
  `qty_prepare` int(5) DEFAULT '0',
  `proses_prepare` varchar(30) DEFAULT NULL,
  `STATUS` varchar(30) DEFAULT NULL,
  `pic_prepare` varchar(30) DEFAULT NULL,
  `tgl_prepare` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `remark` varchar(20) DEFAULT NULL,
  `filesize` int(5) DEFAULT NULL,
  `web_path` varchar(100) DEFAULT NULL,
  `system_path` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `files`
--

INSERT INTO `files` (`id`, `filename`, `remark`, `filesize`, `web_path`, `system_path`) VALUES
(1, '2222.jpg', 'USER', 5314, './assets/img/2222.jpg', './assets/img/2222.jpg'),
(2, '11111.jpg', 'USER', 13037, './assets/img/11111.jpg', './assets/img/11111.jpg'),
(3, '5.jpg', 'LOGO', 5156, './assets/img/5.jpg', './assets/img/5.jpg'),
(4, '33.jpg', 'BG', 57712, './assets/img/33.jpg', './assets/img/33.jpg'),
(5, '42.jpg', 'LOGO', 9879, './assets/img/42.jpg', './assets/img/42.jpg'),
(6, '5.jpg', 'LOGO', 5156, './assets/img/5.jpg', './assets/img/5.jpg'),
(7, '32.jpg', 'BG', 9879, './assets/img/32.jpg', './assets/img/32.jpg'),
(8, 'makan_siang_gratis.jpg', 'BG', 84858, './assets/img/makan_siang_gratis.jpg', './assets/img/makan_siang_gratis.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_dapur`
--

CREATE TABLE `master_dapur` (
  `id` int(11) NOT NULL,
  `kode_dapur` varchar(30) DEFAULT NULL,
  `nama_dapur` varchar(30) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `update_by` varchar(30) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_data_sekolah`
--

CREATE TABLE `master_data_sekolah` (
  `id` int(11) NOT NULL,
  `kode_sekolah` varchar(30) DEFAULT NULL,
  `nama_sekolah` varchar(30) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `jumlah_murid` int(5) DEFAULT '0',
  `kode_dapur` varchar(30) DEFAULT NULL,
  `update_by` varchar(30) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_matrix_menu`
--

CREATE TABLE `master_matrix_menu` (
  `id` int(11) NOT NULL,
  `kode_paket` varchar(30) DEFAULT NULL,
  `kode_menu` varchar(30) DEFAULT NULL,
  `update_by` varchar(30) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_menu_makanan`
--

CREATE TABLE `master_menu_makanan` (
  `id` int(11) NOT NULL,
  `kode_menu` varchar(30) DEFAULT NULL,
  `nama_menu` varchar(30) DEFAULT NULL,
  `cara_memasak` text,
  `foto_masak` varchar(30) DEFAULT NULL,
  `update_by` varchar(30) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_paket_makanan`
--

CREATE TABLE `master_paket_makanan` (
  `id` int(11) NOT NULL,
  `kode_paket` varchar(30) DEFAULT NULL,
  `nama_paket` varchar(30) DEFAULT NULL,
  `foto_paket` varchar(30) DEFAULT NULL,
  `standar_packing` int(5) DEFAULT '0',
  `update_by` varchar(30) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_resep_makanan`
--

CREATE TABLE `master_resep_makanan` (
  `id` int(11) NOT NULL,
  `kode_menu` varchar(30) DEFAULT NULL,
  `qty_menu` int(5) DEFAULT '0',
  `bahan_baku` varchar(30) DEFAULT NULL,
  `qty_bahan` int(5) DEFAULT '0',
  `satuan` varchar(30) DEFAULT NULL,
  `proses_prepare` text,
  `update_by` varchar(30) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_area`
--

CREATE TABLE `tbl_area` (
  `id` int(11) NOT NULL,
  `user_area` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_area`
--

INSERT INTO `tbl_area` (`id`, `user_area`) VALUES
(1, 'Sekolah'),
(2, 'Dapur'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_conf_backup`
--

CREATE TABLE `tbl_conf_backup` (
  `id` int(11) NOT NULL,
  `tabel_name` char(50) DEFAULT NULL,
  `date_field` varchar(30) DEFAULT NULL,
  `start_value` date DEFAULT NULL,
  `end_value` date DEFAULT NULL,
  `other_field` varchar(50) DEFAULT NULL,
  `other_value` varchar(50) DEFAULT NULL,
  `execute_date` datetime DEFAULT NULL,
  `execute_by` varchar(30) DEFAULT NULL,
  `max_row_backup` int(11) DEFAULT '0',
  `actual_row_backup` int(11) DEFAULT '0',
  `limit_execute` int(11) NOT NULL DEFAULT '0',
  `status` varchar(15) DEFAULT NULL,
  `update_by` varchar(30) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_day`
--

CREATE TABLE `tbl_day` (
  `id` int(11) NOT NULL,
  `day` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_day`
--

INSERT INTO `tbl_day` (`id`, `day`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_group`
--

CREATE TABLE `tbl_group` (
  `id` int(11) NOT NULL,
  `user_group` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_group`
--

INSERT INTO `tbl_group` (`id`, `user_group`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konversi_bulan`
--

CREATE TABLE `tbl_konversi_bulan` (
  `id` int(11) NOT NULL,
  `int_bulan` int(2) NOT NULL,
  `string_bulan` varchar(2) NOT NULL,
  `romawi_bulan` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_konversi_bulan`
--

INSERT INTO `tbl_konversi_bulan` (`id`, `int_bulan`, `string_bulan`, `romawi_bulan`) VALUES
(1, 1, 'A', 'I'),
(2, 2, 'B', 'II'),
(3, 3, 'C', 'III'),
(4, 4, 'D', 'IV'),
(5, 5, 'E', 'V'),
(6, 6, 'F', 'VI'),
(7, 7, 'G', 'VII'),
(8, 8, 'H', 'VIII'),
(9, 9, 'I', 'IX'),
(10, 10, 'J', 'X'),
(11, 11, 'K', 'XI'),
(12, 12, 'L', 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id` int(11) NOT NULL,
  `user_level` varchar(20) NOT NULL,
  `user_group` char(20) NOT NULL,
  `user_area` char(20) NOT NULL,
  `user_device` enum('PC','Mobile','Tablet') NOT NULL DEFAULT 'PC',
  `update_by` varchar(30) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_level`
--

INSERT INTO `tbl_level` (`id`, `user_level`, `user_group`, `user_area`, `user_device`, `update_by`, `update_time`) VALUES
(1, 'Prepare', 'User', 'Dapur', 'PC', 'Admin JSS', '2024-08-30 13:31:41'),
(2, 'Cooking', 'User', 'Dapur', 'PC', 'Admin JSS', '2024-08-30 13:31:46'),
(3, 'Packing', 'User', 'Dapur', 'PC', 'Admin JSS', '2024-08-30 13:31:52'),
(4, 'Delivery', 'User', 'Dapur', 'PC', 'Admin JSS', '2024-08-30 13:32:06'),
(5, 'Receiving', 'User', 'Sekolah', 'PC', 'Admin JSS', '2024-08-30 13:32:19'),
(6, 'Administrator', 'Admin', 'Admin', 'PC', NULL, NULL),
(7, 'Planning', 'Admin', 'Admin', 'PC', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_logdate`
--

CREATE TABLE `tbl_logdate` (
  `id` int(11) NOT NULL,
  `action` varchar(30) DEFAULT NULL,
  `data` varchar(100) DEFAULT NULL,
  `device` text,
  `update_by` varchar(30) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_logdate`
--

INSERT INTO `tbl_logdate` (`id`, `action`, `data`, `device`, `update_by`, `update_time`) VALUES
(1, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:32:25'),
(2, 'createdata_special', '202407-1|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:34:23'),
(3, 'createdata_special', '202407-202408|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:36:37'),
(4, 'removedata_special', '202407-202408|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:37:03'),
(5, 'removeprod_special', 'S002|202407-1|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:37:16'),
(6, 'removeprod_special', 'S002|202407-1|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:37:16'),
(7, 'removeprod_special', 'S001|202407-1|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:37:16'),
(8, 'removeprod_special', 'S001|202407-1|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:37:16'),
(9, 'removedata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:37:23'),
(10, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:37:29'),
(11, 'createdata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:37:39'),
(12, 'removedata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:38:50'),
(13, 'createdata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:39:20'),
(14, 'editdata_ajs', 'SO00434934844554|3802', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:41:34'),
(15, 'createdata_ajs', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:46:08'),
(16, 'createdata_ajs', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:48:01'),
(17, 'createdata_ajs', 'SO00434934844554|3801', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:48:14'),
(18, 'createdata_ajs', 'SO00434934844554|3802', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:48:19'),
(19, 'createdata_ajs', 'SO00434934844554|3803', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:48:23'),
(20, 'createdata_ajs', 'SO00434934844554|3803', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:48:28'),
(21, 'createdata_ajs', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:54:08'),
(22, 'createdata_ajs', 'SO00434934844554|3801', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:54:15'),
(23, 'createdata_ajs', 'SO00434934844554|3801', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:54:24'),
(24, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:54:42'),
(25, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:54:49'),
(26, 'createdata_ajs', 'SO00434934844554|3804', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:54:53'),
(27, 'createdata_ajs', 'SO00434934844554|3804', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:55:03'),
(28, 'editdata_ajs', 'SO00434934844554|3804', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:55:52'),
(29, 'editdata_ajs', 'SO00434934844554|3804', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:57:34'),
(30, 'editdata_ajs', 'SO00434934844554|3803', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 14:57:40'),
(31, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:38:15'),
(32, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:38:15'),
(33, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:38:15'),
(34, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:38:15'),
(35, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:38:15'),
(36, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:38:15'),
(37, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:38:15'),
(38, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:38:15'),
(39, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:38:15'),
(40, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:38:15'),
(41, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:39:09'),
(42, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:39:09'),
(43, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:39:09'),
(44, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:39:09'),
(45, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:39:09'),
(46, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:39:09'),
(47, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:39:09'),
(48, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:39:09'),
(49, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:39:09'),
(50, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:39:09'),
(51, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:41:37'),
(52, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:41:37'),
(53, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:41:37'),
(54, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:41:37'),
(55, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:41:37'),
(56, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:41:37'),
(57, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:41:37'),
(58, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:41:37'),
(59, 'createdata_special', 'D74A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:41:37'),
(60, 'createdata_special', 'D26A-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:41:37'),
(61, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:29'),
(62, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:29'),
(63, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:29'),
(64, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:29'),
(65, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:29'),
(66, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:29'),
(67, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:29'),
(68, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:29'),
(69, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:29'),
(70, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:29'),
(71, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:39'),
(72, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:39'),
(73, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:39'),
(74, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:39'),
(75, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:39'),
(76, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:39'),
(77, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:39'),
(78, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:39'),
(79, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:39'),
(80, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:42:39'),
(81, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:43:17'),
(82, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:43:17'),
(83, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:43:17'),
(84, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:43:17'),
(85, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:43:17'),
(86, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:43:17'),
(87, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:43:17'),
(88, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:43:17'),
(89, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:43:17'),
(90, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:43:17'),
(91, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:45:57'),
(92, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:45:57'),
(93, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:45:57'),
(94, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:45:57'),
(95, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:45:57'),
(96, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:45:57'),
(97, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:45:57'),
(98, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:45:57'),
(99, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(100, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(101, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(102, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(103, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(104, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(105, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(106, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(107, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(108, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(109, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(110, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(111, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(112, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(113, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(114, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:27'),
(115, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:28'),
(116, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:28'),
(117, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:28'),
(118, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:28'),
(119, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:28'),
(120, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:28'),
(121, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:28'),
(122, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:28'),
(123, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:53'),
(124, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:53'),
(125, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:53'),
(126, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:53'),
(127, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:53'),
(128, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:53'),
(129, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:53'),
(130, 'createdata_special', '09/07/2-1|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:46:53'),
(131, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:52'),
(132, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:52'),
(133, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:52'),
(134, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:52'),
(135, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:52'),
(136, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:52'),
(137, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:52'),
(138, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:52'),
(139, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:59'),
(140, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:59'),
(141, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:59'),
(142, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:59'),
(143, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:59'),
(144, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:59'),
(145, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:59'),
(146, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:47:59'),
(147, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:49:57'),
(148, 'removedata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:51:15'),
(149, 'removeprod_special', 'S003|09/07/2-1|SV|FR|RH|F-UG|71100-BY360-C4|09/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:51:36'),
(150, 'removeprod_special', 'S003|09/07/2-1|SV|FR|LH|F-UG|71200-BY440|09/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:51:36'),
(151, 'removeprod_special', 'S003|09/07/2-1|T9|FR|RH|-|71100-BY820|09/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:51:36'),
(152, 'removeprod_special', 'S003|09/07/2-1|T9|FR|LH|-|71200-BYC00|09/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:51:36'),
(153, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:51:52'),
(154, 'createdata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:52:12'),
(155, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(156, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(157, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(158, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(159, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(160, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(161, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(162, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(163, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(164, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(165, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(166, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(167, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(168, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(169, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(170, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(171, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(172, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(173, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(174, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(175, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(176, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(177, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(178, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(179, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(180, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(181, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:47'),
(182, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(183, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(184, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(185, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(186, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(187, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(188, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(189, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(190, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(191, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(192, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(193, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(194, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(195, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(196, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(197, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(198, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(199, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(200, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(201, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(202, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(203, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(204, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(205, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(206, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(207, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(208, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(209, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(210, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(211, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(212, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(213, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(214, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(215, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(216, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(217, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(218, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(219, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(220, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(221, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(222, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(223, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(224, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(225, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(226, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(227, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(228, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(229, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(230, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(231, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(232, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(233, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(234, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(235, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(236, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(237, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(238, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(239, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(240, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(241, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(242, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(243, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(244, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(245, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(246, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(247, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(248, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(249, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(250, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(251, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(252, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(253, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(254, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(255, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(256, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(257, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(258, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(259, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(260, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(261, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(262, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(263, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(264, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(265, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(266, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:54:48'),
(267, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(268, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(269, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(270, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(271, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(272, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(273, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(274, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(275, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(276, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(277, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(278, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(279, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(280, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(281, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(282, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(283, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(284, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(285, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(286, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(287, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(288, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(289, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(290, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(291, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(292, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:14'),
(293, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(294, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(295, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(296, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(297, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(298, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(299, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(300, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(301, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(302, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(303, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(304, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(305, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(306, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(307, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(308, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(309, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(310, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(311, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(312, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(313, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(314, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(315, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(316, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(317, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(318, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(319, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(320, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(321, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(322, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(323, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(324, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(325, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(326, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(327, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(328, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(329, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(330, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(331, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(332, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(333, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(334, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(335, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(336, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(337, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(338, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(339, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(340, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(341, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(342, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(343, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(344, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(345, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(346, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(347, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(348, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(349, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(350, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(351, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(352, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(353, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(354, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(355, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(356, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(357, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(358, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(359, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(360, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(361, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(362, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(363, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(364, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(365, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(366, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(367, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(368, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(369, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(370, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(371, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(372, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(373, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(374, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(375, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(376, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(377, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(378, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(379, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(380, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(381, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(382, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(383, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(384, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(385, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(386, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:15'),
(387, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(388, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(389, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(390, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(391, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(392, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(393, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(394, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(395, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(396, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(397, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(398, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(399, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(400, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(401, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(402, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(403, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(404, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(405, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(406, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(407, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(408, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(409, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(410, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(411, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(412, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(413, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(414, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(415, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(416, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(417, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(418, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(419, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(420, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(421, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(422, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(423, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(424, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(425, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(426, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(427, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(428, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(429, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(430, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(431, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(432, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(433, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(434, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(435, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(436, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(437, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(438, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(439, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(440, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(441, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(442, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(443, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(444, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(445, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(446, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(447, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(448, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(449, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24');
INSERT INTO `tbl_logdate` (`id`, `action`, `data`, `device`, `update_by`, `update_time`) VALUES
(450, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(451, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(452, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(453, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(454, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(455, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(456, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(457, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(458, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(459, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(460, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(461, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(462, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(463, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(464, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(465, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(466, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(467, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(468, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(469, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(470, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(471, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(472, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(473, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(474, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(475, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(476, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(477, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(478, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(479, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(480, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(481, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(482, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(483, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(484, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(485, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(486, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(487, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(488, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(489, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(490, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(491, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(492, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(493, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(494, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(495, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(496, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(497, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(498, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(499, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(500, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(501, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(502, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(503, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(504, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(505, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(506, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 18:59:24'),
(507, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(508, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(509, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(510, 'createdata_special', '4-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(511, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(512, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(513, 'createdata_special', '7-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(514, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(515, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(516, 'createdata_special', '9-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(517, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(518, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(519, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(520, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(521, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(522, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(523, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(524, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(525, 'createdata_special', '4-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(526, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(527, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(528, 'createdata_special', '7-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(529, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(530, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(531, 'createdata_special', '9-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(532, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(533, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(534, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(535, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(536, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(537, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(538, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(539, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(540, 'createdata_special', '4-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(541, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(542, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(543, 'createdata_special', '7-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(544, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(545, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(546, 'createdata_special', '9-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(547, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(548, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(549, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(550, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(551, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(552, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(553, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(554, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(555, 'createdata_special', '4-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(556, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(557, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(558, 'createdata_special', '7-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(559, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(560, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(561, 'createdata_special', '9-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(562, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(563, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(564, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(565, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(566, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(567, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(568, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(569, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(570, 'createdata_special', '4-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(571, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(572, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(573, 'createdata_special', '7-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(574, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(575, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(576, 'createdata_special', '9-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(577, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(578, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(579, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(580, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(581, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(582, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(583, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(584, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(585, 'createdata_special', '4-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(586, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(587, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(588, 'createdata_special', '7-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(589, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(590, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(591, 'createdata_special', '9-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(592, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(593, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(594, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(595, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(596, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(597, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(598, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(599, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(600, 'createdata_special', '4-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(601, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(602, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(603, 'createdata_special', '7-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(604, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(605, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(606, 'createdata_special', '9-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(607, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(608, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(609, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(610, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(611, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(612, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(613, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(614, 'createdata_special', '2-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(615, 'createdata_special', '4-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(616, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(617, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:15'),
(618, 'createdata_special', '7-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:16'),
(619, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:16'),
(620, 'createdata_special', '0-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:16'),
(621, 'createdata_special', '9-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:16'),
(622, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:16'),
(623, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:16'),
(624, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:16'),
(625, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:16'),
(626, 'createdata_special', '-1|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:06:16'),
(627, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:12'),
(628, 'removeprod_special', 'S005|202407-5|SS|FR|RH|F-UL|71100-BY210-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:46'),
(629, 'removeprod_special', 'S005|202407-5|SS|FR|LH|F-UL|71200-BY450|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:46'),
(630, 'removeprod_special', 'S005|202407-5|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:46'),
(631, 'removeprod_special', 'S005|202407-5|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:46'),
(632, 'removeprod_special', 'S005|202407-5|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:46'),
(633, 'removeprod_special', 'S005|202407-5|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:46'),
(634, 'removeprod_special', 'S004|202407-4|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:46'),
(635, 'removeprod_special', 'S004|202407-4|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:46'),
(636, 'removeprod_special', 'S003|202407-3|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:46'),
(637, 'removeprod_special', 'S003|202407-3|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:46'),
(638, 'removeprod_special', 'S002|202407-2|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:46'),
(639, 'removeprod_special', 'S002|202407-2|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:46'),
(640, 'removeprod_special', 'S001|202407-1|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:46'),
(641, 'removeprod_special', 'S001|202407-1|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:46'),
(642, 'removedata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:54'),
(643, 'removedata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:54'),
(644, 'removedata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:54'),
(645, 'removedata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:54'),
(646, 'removedata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:12:54'),
(647, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:13:05'),
(648, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:13:05'),
(649, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:13:05'),
(650, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:13:05'),
(651, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:13:05'),
(652, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:13:05'),
(653, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:13:05'),
(654, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:13:05'),
(655, 'removeprod_special', 'S001|202407-1|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:13:15'),
(656, 'removeprod_special', 'S001|202407-1|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:13:15'),
(657, 'removeprod_special', 'S001|202407-1|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:13:15'),
(658, 'removeprod_special', 'S001|202407-1|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:13:15'),
(659, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-09 19:15:46'),
(660, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:18:20'),
(661, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:18:20'),
(662, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:18:20'),
(663, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:18:20'),
(664, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:18:20'),
(665, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:18:20'),
(666, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:18:20'),
(667, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:18:20'),
(668, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:32:36'),
(669, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:32:36'),
(670, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:32:36'),
(671, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:32:36'),
(672, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:32:36'),
(673, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:32:36'),
(674, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:32:36'),
(675, 'removedata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:32:36'),
(676, 'removedata_special', '202407-8|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:35:18'),
(677, 'removedata_special', '202407-7|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:35:18'),
(678, 'removedata_special', '202407-6|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:35:18'),
(679, 'removedata_special', '202407-5|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:35:18'),
(680, 'removedata_special', '202407-4|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:35:18'),
(681, 'removedata_special', '202407-3|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:35:18'),
(682, 'removedata_special', '202407-2|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:35:18'),
(683, 'removedata_special', '202407-1|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:35:18'),
(684, 'removedata_special', '202407-8|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:12'),
(685, 'removedata_special', '202407-7|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:12'),
(686, 'removedata_special', '202407-6|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:12'),
(687, 'removedata_special', '202407-5|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:12'),
(688, 'removedata_special', '202407-4|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:12'),
(689, 'removedata_special', '202407-3|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:12'),
(690, 'removedata_special', '202407-2|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:12'),
(691, 'removedata_special', '202407-1|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:12'),
(692, 'createdata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:24'),
(693, 'createdata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:24'),
(694, 'createdata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:24'),
(695, 'createdata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:24'),
(696, 'createdata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:24'),
(697, 'createdata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:24'),
(698, 'createdata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:24'),
(699, 'createdata_special', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:43:24'),
(700, 'create', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:03'),
(701, 'create', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:03'),
(702, 'create', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:03'),
(703, 'create', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:03'),
(704, 'create', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:03'),
(705, 'create', '202407-6|S006', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:03'),
(706, 'create', '202407-7|S007', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:03'),
(707, 'create', '202407-8|S008', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:03'),
(708, 'create', '202407-9|S009', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:06'),
(709, 'create', '202407-10|S010', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:06'),
(710, 'create', '202407-11|S011', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:06'),
(711, 'create', '202407-12|S012', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:06'),
(712, 'create', '202407-13|S013', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:06'),
(713, 'create', '202407-14|S014', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:06'),
(714, 'create', '202407-15|S015', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:06'),
(715, 'create', '202407-16|S016', 'Chrome 126.0.0.0Windows 10::1', NULL, '2024-07-11 11:44:06'),
(716, 'removedata_special', '202407-16|S016', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(717, 'removedata_special', '202407-15|S015', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(718, 'removedata_special', '202407-14|S014', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(719, 'removedata_special', '202407-13|S013', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(720, 'removedata_special', '202407-12|S012', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(721, 'removedata_special', '202407-11|S011', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(722, 'removedata_special', '202407-10|S010', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(723, 'removedata_special', '202407-9|S009', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(724, 'removedata_special', '202407-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(725, 'removedata_special', '202407-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(726, 'removedata_special', '202407-6|S006', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(727, 'removedata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(728, 'removedata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(729, 'removedata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(730, 'removedata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:25'),
(731, 'removedata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:29'),
(732, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:47'),
(733, 'createdata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:47'),
(734, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:47'),
(735, 'createdata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:47'),
(736, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:47'),
(737, 'createdata_special', '202407-6|S006', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:47'),
(738, 'createdata_special', '202407-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:47'),
(739, 'createdata_special', '202407-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:45:47'),
(740, 'createdata_special', '202407-9|S009', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:46:17'),
(741, 'removeprod_special', 'S009|202407-9|SS|FR|RH|F-UL|71100-BY210-C4|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(742, 'removeprod_special', 'S009|202407-9|SS|FR|LH|F-UL|71200-BY450|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(743, 'removeprod_special', 'S008|202407-8|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(744, 'removeprod_special', 'S008|202407-8|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(745, 'removeprod_special', 'S007|202407-7|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(746, 'removeprod_special', 'S007|202407-7|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(747, 'removeprod_special', 'S006|202407-6|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(748, 'removeprod_special', 'S006|202407-6|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(749, 'removeprod_special', 'S005|202407-5|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(750, 'removeprod_special', 'S005|202407-5|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(751, 'removeprod_special', 'S004|202407-4|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(752, 'removeprod_special', 'S004|202407-4|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(753, 'removeprod_special', 'S003|202407-3|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(754, 'removeprod_special', 'S003|202407-3|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(755, 'removeprod_special', 'S002|202407-2|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:07'),
(756, 'removeprod_special', 'S002|202407-2|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:33'),
(757, 'removeprod_special', 'S001|202407-1|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:33'),
(758, 'removeprod_special', 'S001|202407-1|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:33'),
(759, 'removedata_special', '202407-9|S009', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:45'),
(760, 'removedata_special', '202407-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:45'),
(761, 'removedata_special', '202407-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:45'),
(762, 'removedata_special', '202407-6|S006', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:45'),
(763, 'removedata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:45'),
(764, 'removedata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:45'),
(765, 'removedata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:45'),
(766, 'removedata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:45'),
(767, 'removedata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:47:45'),
(768, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:48:01'),
(769, 'createdata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:48:01'),
(770, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:48:01'),
(771, 'createdata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:48:01'),
(772, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:48:01'),
(773, 'createdata_special', '202407-6|S006', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:48:01'),
(774, 'createdata_special', '202407-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:48:01'),
(775, 'createdata_special', '202407-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:48:01'),
(776, 'removedata_special', '202407-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:48:15'),
(777, 'removedata_special', '202407-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:48:15'),
(778, 'createdata_special', '202407-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:48:35'),
(779, 'createdata_special', '202407-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:18'),
(780, 'removedata_shipping', 'SO004349348445543804', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(781, 'removedata_shipping', 'SO004349348445543805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(782, 'removedata_shipping', 'SO004349348445543802', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(783, 'removedata_shipping', 'dffgfgfgfg', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(784, 'removedata_shipping', '', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(785, 'removedata_shipping', 'SO004349348445543803', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(786, 'removedata_shipping', 'SO004349348445543801', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(787, 'removedata_shipping', 'SO412306S20000073800', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(788, 'removedata_shipping', 'SO412306S20000073900', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(789, 'removedata_shipping', 'SO412306S20000073799', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(790, 'removedata_shipping', 'SO412306S20000073798', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(791, 'removedata_shipping', 'SO412306S20000063797', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(792, 'removedata_shipping', 'SO412306S20000063796', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(793, 'removedata_shipping', 'SO412306S20000063795', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(794, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:49:56'),
(795, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:50:01'),
(796, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:50:01'),
(797, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 11:50:01'),
(798, 'createdata_special', '202407-9|S009', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:17:11'),
(799, 'createdata_special', '202407-10|S010', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:17:11'),
(800, 'createdata_special', '202407-11|S011', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:17:11'),
(801, 'createdata_special', '202407-12|S012', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:17:11'),
(802, 'createdata_special', '202407-13|S013', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:17:11'),
(803, 'createdata_special', '202407-14|S014', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:17:11'),
(804, 'createdata_special', '202407-15|S015', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:17:11'),
(805, 'createdata_special', '202407-16|S016', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:17:11'),
(806, 'createdata_ajs', 'SO00434934844554|3804', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:18:51'),
(807, 'createdata_ajs', 'SO00434934844554|3803', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:18:51'),
(808, 'createdata_ajs', 'SO00434934844554|3802', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:18:51'),
(809, 'createdata_ajs', 'SO412306S2000007|3800', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:18:51'),
(810, 'createdata_ajs', 'SO412306S2000007|3900', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:18:51'),
(811, 'createdata_ajs', 'SO412306S2000007|3799', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:18:51'),
(812, 'createdata_ajs', 'SO412306S2000007|3798', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:18:51'),
(813, 'createdata_ajs', 'SO412306S2000006|3797', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:18:51'),
(814, 'createdata_ajs', 'SO412306S2000006|3796', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:18:51'),
(815, 'createdata_ajs', 'SO412306S2000006|3795', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:18:51'),
(816, 'createdata_ajs', 'SO412306S2000006|3794', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:18:51'),
(817, 'createdata_ajs', 'SO412306S2000005|3793', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:18:51'),
(818, 'createdata_ajs', 'SO412306S2000005|3792', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:18:51'),
(819, 'createdata_ajs', 'SO412306S2000005|3791', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:18:51'),
(820, 'createdata_ajs', 'SO00434934844554|3802', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:21:39'),
(821, 'createdata_ajs', 'SO00434934844555|3803', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:21:39'),
(822, 'createdata_ajs', 'SO00434934844555|3804', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:21:39'),
(823, 'createdata_ajs', 'SO00434934844555|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:21:39'),
(824, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:21:39'),
(825, 'createdata_ajs', 'SO00434934844556|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:21:39'),
(826, 'createdata_ajs', 'SO00434934844556|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:21:39'),
(827, 'createdata_ajs', 'SO00434934844556|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:21:39'),
(828, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:21:39'),
(829, 'createdata_ajs', 'SO00434934844557|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:21:39'),
(830, 'createdata_ajs', 'SO00434934844557|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:21:39'),
(831, 'createdata_ajs', 'SO00434934844557|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:21:39'),
(832, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:21:39'),
(833, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:22:18'),
(834, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:22:18'),
(835, 'createdata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:22:18'),
(836, 'createdata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:22:18'),
(837, 'createdata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:22:18'),
(838, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:22:18'),
(839, 'createdata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:22:18'),
(840, 'createdata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:22:18'),
(841, 'createdata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:22:18'),
(842, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:22:18'),
(843, 'createdata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:22:18'),
(844, 'createdata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:22:18'),
(845, 'createdata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:22:18'),
(846, 'removedata_ajs', 'SO412306S2000007|3900', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:22:56'),
(847, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:23:09'),
(848, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:23:09'),
(849, 'createdata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:23:09'),
(850, 'createdata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:23:09'),
(851, 'createdata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:23:09'),
(852, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:23:09'),
(853, 'createdata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:23:09'),
(854, 'createdata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:23:09'),
(855, 'createdata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:23:09'),
(856, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:23:09'),
(857, 'createdata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:23:09'),
(858, 'createdata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:23:09'),
(859, 'createdata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:23:09'),
(860, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:34'),
(861, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:34'),
(862, 'createdata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:34'),
(863, 'createdata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:34'),
(864, 'createdata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:34'),
(865, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:34'),
(866, 'createdata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:34'),
(867, 'createdata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:34'),
(868, 'createdata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:34'),
(869, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:34'),
(870, 'createdata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:34'),
(871, 'createdata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:34'),
(872, 'createdata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:34'),
(873, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:56'),
(874, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:56'),
(875, 'createdata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:56'),
(876, 'createdata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:56'),
(877, 'createdata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:56'),
(878, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:56'),
(879, 'createdata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:56'),
(880, 'createdata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:56'),
(881, 'createdata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:56'),
(882, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:56'),
(883, 'createdata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:56'),
(884, 'createdata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:56'),
(885, 'createdata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:24:56'),
(886, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:25:51'),
(887, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:25:51'),
(888, 'createdata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:25:51'),
(889, 'createdata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:25:51');
INSERT INTO `tbl_logdate` (`id`, `action`, `data`, `device`, `update_by`, `update_time`) VALUES
(890, 'createdata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:25:51'),
(891, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:25:51'),
(892, 'createdata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:25:51'),
(893, 'createdata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:25:51'),
(894, 'createdata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:25:51'),
(895, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:25:51'),
(896, 'createdata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:25:51'),
(897, 'createdata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:25:51'),
(898, 'createdata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 13:25:51'),
(899, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:24:01'),
(900, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:24:01'),
(901, 'createdata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:24:01'),
(902, 'createdata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:24:01'),
(903, 'createdata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:24:01'),
(904, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:24:01'),
(905, 'createdata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:24:01'),
(906, 'createdata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:24:01'),
(907, 'createdata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:24:01'),
(908, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:24:01'),
(909, 'createdata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:24:01'),
(910, 'createdata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:24:01'),
(911, 'createdata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:24:01'),
(912, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:25:52'),
(913, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:25:52'),
(914, 'createdata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:25:52'),
(915, 'createdata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:25:52'),
(916, 'createdata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:25:52'),
(917, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:25:52'),
(918, 'createdata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:25:52'),
(919, 'createdata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:25:52'),
(920, 'createdata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:25:52'),
(921, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:25:52'),
(922, 'createdata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:25:52'),
(923, 'createdata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:25:52'),
(924, 'createdata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:25:52'),
(925, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:27:30'),
(926, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:27:30'),
(927, 'createdata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:27:30'),
(928, 'createdata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:27:30'),
(929, 'createdata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:27:30'),
(930, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:27:30'),
(931, 'createdata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:27:30'),
(932, 'createdata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:27:30'),
(933, 'createdata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:27:30'),
(934, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:27:30'),
(935, 'createdata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:27:30'),
(936, 'createdata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:27:30'),
(937, 'createdata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:27:30'),
(938, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:08'),
(939, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:08'),
(940, 'createdata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:08'),
(941, 'createdata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:08'),
(942, 'createdata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:08'),
(943, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:08'),
(944, 'createdata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:08'),
(945, 'createdata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:08'),
(946, 'createdata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:08'),
(947, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:08'),
(948, 'createdata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:08'),
(949, 'createdata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:08'),
(950, 'createdata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:08'),
(951, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:09'),
(952, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:09'),
(953, 'createdata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:09'),
(954, 'createdata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:09'),
(955, 'createdata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:09'),
(956, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:09'),
(957, 'createdata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:09'),
(958, 'createdata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:09'),
(959, 'createdata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:09'),
(960, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:09'),
(961, 'createdata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:09'),
(962, 'createdata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:09'),
(963, 'createdata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:29:09'),
(964, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:00'),
(965, 'removeprod_regular', '3817|SO00434934844557|ST|FR|RH|F-UX|71100-BY200-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(966, 'removeprod_regular', '3817|SO00434934844557|ST|FR|LH|FU-X|71200-BY430|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(967, 'removeprod_regular', '3816|SO00434934844557|ST|FR|RH|F-UX|71100-BY200-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(968, 'removeprod_regular', '3816|SO00434934844557|ST|FR|LH|FU-X|71200-BY430|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(969, 'removeprod_regular', '3815|SO00434934844557|7B|FR|RH|-|71100-BYE20|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(970, 'removeprod_regular', '3815|SO00434934844557|7B|FR|LH|-|71200-BYJ70|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(971, 'removeprod_regular', '3814|SO00434934844557|SV|FR|RH|F-UG|71100-BY360-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(972, 'removeprod_regular', '3814|SO00434934844557|SV|FR|LH|F-UG|71200-BY440|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(973, 'removeprod_regular', '3813|SO00434934844556|ST|FR|RH|F-UX|71100-BY200-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(974, 'removeprod_regular', '3813|SO00434934844556|ST|FR|LH|FU-X|71200-BY430|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(975, 'removeprod_regular', '3812|SO00434934844556|ST|FR|RH|F-UX|71100-BY200-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(976, 'removeprod_regular', '3812|SO00434934844556|ST|FR|LH|FU-X|71200-BY430|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(977, 'removeprod_regular', '3811|SO00434934844556|T9|FR|RH|-|71100-BY820|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(978, 'removeprod_regular', '3811|SO00434934844556|T9|FR|LH|-|71200-BYC00|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(979, 'removeprod_regular', '3810|SO00434934844556|RV|FR|RH|F-UK|71100-BY210-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(980, 'removeprod_regular', '3810|SO00434934844556|RV|FR|LH|F-UK|71200-BY460|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(981, 'removeprod_regular', '3809|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(982, 'removeprod_regular', '3809|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(983, 'removeprod_regular', '3808|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(984, 'removeprod_regular', '3808|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(985, 'removeprod_regular', '3807|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(986, 'removeprod_regular', '3807|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(987, 'removeprod_regular', '3805|SO00434934844554|T9|FR|RH|-|71100-BY820|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(988, 'removeprod_regular', '3805|SO00434934844554|T9|FR|LH|-|71200-BYC00|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(989, 'removeprod_regular', '3814|SO00434934844557|ST|FR|RH|F-UX|71100-BY200-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(990, 'removeprod_regular', '3814|SO00434934844557|ST|FR|LH|FU-X|71200-BY430|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(991, 'removeprod_regular', '3813|SO00434934844557|ST|FR|RH|F-UX|71100-BY200-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(992, 'removeprod_regular', '3813|SO00434934844557|ST|FR|LH|FU-X|71200-BY430|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(993, 'removeprod_regular', '3812|SO00434934844557|7B|FR|RH|-|71100-BYE20|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(994, 'removeprod_regular', '3812|SO00434934844557|7B|FR|LH|-|71200-BYJ70|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(995, 'removeprod_regular', '3811|SO00434934844557|SV|FR|RH|F-UG|71100-BY360-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(996, 'removeprod_regular', '3811|SO00434934844557|SV|FR|LH|F-UG|71200-BY440|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(997, 'removeprod_regular', '3810|SO00434934844556|ST|FR|RH|F-UX|71100-BY200-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(998, 'removeprod_regular', '3810|SO00434934844556|ST|FR|LH|FU-X|71200-BY430|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(999, 'removeprod_regular', '3809|SO00434934844556|ST|FR|RH|F-UX|71100-BY200-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1000, 'removeprod_regular', '3809|SO00434934844556|ST|FR|LH|FU-X|71200-BY430|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1001, 'removeprod_regular', '3808|SO00434934844556|T9|FR|RH|-|71100-BY820|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1002, 'removeprod_regular', '3808|SO00434934844556|T9|FR|LH|-|71200-BYC00|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1003, 'removeprod_regular', '3807|SO00434934844556|RV|FR|RH|F-UK|71100-BY210-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1004, 'removeprod_regular', '3807|SO00434934844556|RV|FR|LH|F-UK|71200-BY460|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1005, 'removeprod_regular', '3806|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1006, 'removeprod_regular', '3806|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1007, 'removeprod_regular', '3805|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1008, 'removeprod_regular', '3805|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1009, 'removeprod_regular', '3804|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1010, 'removeprod_regular', '3804|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1011, 'removeprod_regular', '3803|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1012, 'removeprod_regular', '3803|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1013, 'removeprod_regular', '3802|SO00434934844554|T9|FR|RH|-|71100-BY820|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1014, 'removeprod_regular', '3802|SO00434934844554|T9|FR|LH|-|71200-BYC00|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1015, 'removeprod_regular', '3791|SO412306S2000005|ST|FR|RH|F-UX|71100-BY200-C4|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1016, 'removeprod_regular', '3791|SO412306S2000005|ST|FR|LH|FU-X|71200-BY430|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1017, 'removeprod_regular', '3792|SO412306S2000005|7B|FR|RH|-|71100-BYE20|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1018, 'removeprod_regular', '3792|SO412306S2000005|7B|FR|LH|-|71200-BYJ70|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1019, 'removeprod_regular', '3793|SO412306S2000005|SV|FR|RH|F-UG|71100-BY360-C4|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1020, 'removeprod_regular', '3793|SO412306S2000005|SV|FR|LH|F-UG|71200-BY440|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1021, 'removeprod_regular', '3794|SO412306S2000006|ST|FR|RH|F-UX|71100-BY200-C4|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1022, 'removeprod_regular', '3794|SO412306S2000006|ST|FR|LH|FU-X|71200-BY430|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1023, 'removeprod_regular', '3795|SO412306S2000006|ST|FR|RH|F-UX|71100-BY200-C4|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1024, 'removeprod_regular', '3795|SO412306S2000006|ST|FR|LH|FU-X|71200-BY430|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1025, 'removeprod_regular', '3796|SO412306S2000006|T9|FR|RH|-|71100-BY820|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1026, 'removeprod_regular', '3796|SO412306S2000006|T9|FR|LH|-|71200-BYC00|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1027, 'removeprod_regular', '3797|SO412306S2000006|RV|FR|RH|F-UK|71100-BY210-C4|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1028, 'removeprod_regular', '3797|SO412306S2000006|RV|FR|LH|F-UK|71200-BY460|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1029, 'removeprod_regular', '3798|SO412306S2000007|SV|FR|RH|F-UG|71100-BY360-C4|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1030, 'removeprod_regular', '3798|SO412306S2000007|SV|FR|LH|F-UG|71200-BY440|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1031, 'removeprod_regular', '3799|SO412306S2000007|SV|FR|RH|F-UG|71100-BY360-C4|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1032, 'removeprod_regular', '3799|SO412306S2000007|SV|FR|LH|F-UG|71200-BY440|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1033, 'removeprod_regular', '3900|SO412306S2000007|SV|FR|RH|F-UG|71100-BY360-C4|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1034, 'removeprod_regular', '3900|SO412306S2000007|SV|FR|LH|F-UG|71200-BY440|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1035, 'removeprod_regular', '3800|SO412306S2000007|SV|FR|RH|F-UG|71100-BY360-C4|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1036, 'removeprod_regular', '3800|SO412306S2000007|SV|FR|LH|F-UG|71200-BY440|08/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1037, 'removeprod_regular', '3802|SO00434934844554|T9|FR|RH|-|71100-BY820|09/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1038, 'removeprod_regular', '3802|SO00434934844554|T9|FR|LH|-|71200-BYC00|09/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1039, 'removeprod_regular', '3803|SO00434934844554|SS|FR|RH|F-UL|71100-BY210-C4|09/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1040, 'removeprod_regular', '3803|SO00434934844554|SS|FR|LH|F-UL|71200-BY450|09/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1041, 'removeprod_regular', '3804|SO00434934844554|T9|FR|RH|-|71100-BY820|09/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1042, 'removeprod_regular', '3804|SO00434934844554|T9|FR|LH|-|71200-BYC00|09/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1043, 'removeprod_regular', '3804|SO00434934844554|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1044, 'removeprod_regular', '3804|SO00434934844554|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1045, 'removeprod_regular', '3803|SO00434934844554|SS|FR|RH|F-UL|71100-BY210-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1046, 'removeprod_regular', '3803|SO00434934844554|SS|FR|LH|F-UL|71200-BY450|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1047, 'removeprod_regular', '3802|SO00434934844554|SS|FR|RH|F-UL|71100-BY210-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1048, 'removeprod_regular', '3802|SO00434934844554|SS|FR|LH|F-UL|71200-BY450|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1049, 'removeprod_regular', '3801|SO00434934844554|SS|FR|RH|F-UL|71100-BY210-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1050, 'removeprod_regular', '3801|SO00434934844554|SS|FR|LH|F-UL|71200-BY450|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1051, 'removeprod_regular', '3801|SO00434934844554|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1052, 'removeprod_regular', '3801|SO00434934844554|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1053, 'removeprod_regular', '3800|SO412306S2000007|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1054, 'removeprod_regular', '3800|SO412306S2000007|SV|FR|LH|F-UG|71200-BY440|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1055, 'removeprod_regular', '3900|SO412306S2000007|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1056, 'removeprod_regular', '3900|SO412306S2000007|SV|FR|LH|F-UG|71200-BY440|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1057, 'removeprod_regular', '3799|SO412306S2000007|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1058, 'removeprod_regular', '3799|SO412306S2000007|SV|FR|LH|F-UG|71200-BY440|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1059, 'removeprod_regular', '3798|SO412306S2000007|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1060, 'removeprod_regular', '3798|SO412306S2000007|SV|FR|LH|F-UG|71200-BY440|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1061, 'removeprod_regular', '3797|SO412306S2000006|RV|FR|LH|F-UK|71200-BY460|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1062, 'removeprod_regular', '3797|SO412306S2000006|RV|FR|RH|F-UK|71100-BY210-C4|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1063, 'removeprod_regular', '3796|SO412306S2000006|T9|FR|RH|-|71100-BY820|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1064, 'removeprod_regular', '3796|SO412306S2000006|T9|FR|LH|-|71200-BYC00|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1065, 'removeprod_regular', '3795|SO412306S2000006|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1066, 'removeprod_regular', '3795|SO412306S2000006|ST|FR|LH|FU-X|71200-BY430|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1067, 'removeprod_regular', '3794|SO412306S2000006|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1068, 'removeprod_regular', '3794|SO412306S2000006|ST|FR|LH|FU-X|71200-BY430|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1069, 'removeprod_regular', '3793|SO412306S2000005|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1070, 'removeprod_regular', '3793|SO412306S2000005|SV|FR|LH|F-UG|71200-BY440|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1071, 'removeprod_regular', '3792|SO412306S2000005|7B|FR|RH|-|71100-BYE20|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1072, 'removeprod_regular', '3792|SO412306S2000005|7B|FR|LH|-|71200-BYJ70|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1073, 'removeprod_regular', '3791|SO412306S2000005|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1074, 'removeprod_regular', '3791|SO412306S2000005|ST|FR|LH|FU-X|71200-BY430|2024-07-08', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:38'),
(1075, 'removedata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:44'),
(1076, 'removedata_ajs', 'SO00434934844554|3804', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:44'),
(1077, 'removedata_ajs', 'SO00434934844554|3803', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:44'),
(1078, 'removedata_ajs', 'SO00434934844554|3802', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:44'),
(1079, 'removedata_ajs', 'SO412306S2000007|3800', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:44'),
(1080, 'removedata_ajs', 'SO412306S2000007|3799', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:44'),
(1081, 'removedata_ajs', 'SO412306S2000007|3798', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:44'),
(1082, 'removedata_ajs', 'SO412306S2000006|3797', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:44'),
(1083, 'removedata_ajs', 'SO412306S2000006|3796', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:44'),
(1084, 'removedata_ajs', 'SO412306S2000006|3795', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:44'),
(1085, 'removedata_ajs', 'SO412306S2000006|3794', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:44'),
(1086, 'removedata_ajs', 'SO412306S2000005|3793', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:44'),
(1087, 'removedata_ajs', 'SO412306S2000005|3792', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:44'),
(1088, 'removedata_ajs', 'SO412306S2000005|3791', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:44'),
(1089, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:31:56'),
(1090, 'removedata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:38:48'),
(1091, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:38:58'),
(1092, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:41:30'),
(1093, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:41:55'),
(1094, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:42:01'),
(1095, 'removedata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:42:52'),
(1096, 'removeprod_regular', '3805|SO00434934844554|T9|FR|RH|-|71100-BY820|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:42:59'),
(1097, 'removeprod_regular', '3805|SO00434934844554|T9|FR|LH|-|71200-BYC00|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:42:59'),
(1098, 'removeprod_regular', '3805|SO00434934844554|T9|FR|RH|-|71100-BY820|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:42:59'),
(1099, 'removeprod_regular', '3805|SO00434934844554|T9|FR|LH|-|71200-BYC00|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:42:59'),
(1100, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:43:09'),
(1101, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:43:14'),
(1102, 'removeprod_regular', '3805|SO00434934844554|T9|FR|RH|-|71100-BY820|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:44:07'),
(1103, 'removeprod_regular', '3805|SO00434934844554|T9|FR|LH|-|71200-BYC00|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:44:07'),
(1104, 'removeprod_regular', '3805|SO00434934844554|T9|FR|RH|-|71100-BY820|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:44:07'),
(1105, 'removeprod_regular', '3805|SO00434934844554|T9|FR|LH|-|71200-BYC00|11/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:44:07'),
(1106, 'removedata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:44:16'),
(1107, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:44:22'),
(1108, 'createdata_ajs', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:45:09'),
(1109, 'removedata_ajs', 'SO00434934844554|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-11 17:45:58'),
(1110, 'createdata_ajs', '|', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 05:37:43'),
(1111, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 05:47:42'),
(1112, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 05:52:43'),
(1113, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 05:54:56'),
(1114, 'createdata_ajs', '3805|D74A', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:11:46'),
(1115, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:13:14'),
(1116, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:14:57'),
(1117, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:01'),
(1118, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:01'),
(1119, 'createdata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:01'),
(1120, 'createdata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:01'),
(1121, 'createdata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:01'),
(1122, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:01'),
(1123, 'createdata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:01'),
(1124, 'createdata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:01'),
(1125, 'createdata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:01'),
(1126, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:01'),
(1127, 'createdata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:01'),
(1128, 'createdata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:01'),
(1129, 'createdata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:01'),
(1130, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:26'),
(1131, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:26'),
(1132, 'createdata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:26'),
(1133, 'createdata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:26'),
(1134, 'createdata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:26'),
(1135, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:26'),
(1136, 'createdata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:26'),
(1137, 'createdata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:26'),
(1138, 'createdata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:26'),
(1139, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:26'),
(1140, 'createdata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:26'),
(1141, 'createdata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:26'),
(1142, 'createdata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:16:26'),
(1143, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:17:41'),
(1144, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:17:41'),
(1145, 'createdata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:17:41'),
(1146, 'createdata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:17:41'),
(1147, 'createdata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:17:41'),
(1148, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:17:41'),
(1149, 'createdata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:17:41'),
(1150, 'createdata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:17:41'),
(1151, 'createdata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:17:41'),
(1152, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:17:41'),
(1153, 'createdata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:17:41'),
(1154, 'createdata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:17:41'),
(1155, 'createdata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:17:41'),
(1156, 'removedata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:17:53'),
(1157, 'removeprod_regular', '3817|SO00434934844557|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1158, 'removeprod_regular', '3817|SO00434934844557|ST|FR|LH|FU-X|71200-BY430|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1159, 'removeprod_regular', '3816|SO00434934844557|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1160, 'removeprod_regular', '3816|SO00434934844557|ST|FR|LH|FU-X|71200-BY430|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1161, 'removeprod_regular', '3815|SO00434934844557|7B|FR|RH|-|71100-BYE20|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1162, 'removeprod_regular', '3815|SO00434934844557|7B|FR|LH|-|71200-BYJ70|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1163, 'removeprod_regular', '3814|SO00434934844557|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1164, 'removeprod_regular', '3814|SO00434934844557|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1165, 'removeprod_regular', '3813|SO00434934844556|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1166, 'removeprod_regular', '3813|SO00434934844556|ST|FR|LH|FU-X|71200-BY430|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1167, 'removeprod_regular', '3812|SO00434934844556|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1168, 'removeprod_regular', '3812|SO00434934844556|ST|FR|LH|FU-X|71200-BY430|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1169, 'removeprod_regular', '3811|SO00434934844556|T9|FR|RH|-|71100-BY820|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1170, 'removeprod_regular', '3811|SO00434934844556|T9|FR|LH|-|71200-BYC00|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1171, 'removeprod_regular', '3810|SO00434934844556|RV|FR|RH|F-UK|71100-BY210-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:05'),
(1172, 'removeprod_regular', '3810|SO00434934844556|RV|FR|LH|F-UK|71200-BY460|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1173, 'removeprod_regular', '3809|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1174, 'removeprod_regular', '3809|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1175, 'removeprod_regular', '3808|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1176, 'removeprod_regular', '3808|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1177, 'removeprod_regular', '3807|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1178, 'removeprod_regular', '3807|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1179, 'removeprod_regular', '3806|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1180, 'removeprod_regular', '3806|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1181, 'removeprod_regular', '3805|SO00434934844554|T9|FR|RH|-|71100-BY820|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1182, 'removeprod_regular', '3805|SO00434934844554|T9|FR|LH|-|71200-BYC00|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1183, 'removeprod_regular', '3817|SO00434934844557|ST|FR|RH|F-UX|71100-BY200-C4|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1184, 'removeprod_regular', '3817|SO00434934844557|ST|FR|LH|FU-X|71200-BY430|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1185, 'removeprod_regular', '3816|SO00434934844557|ST|FR|RH|F-UX|71100-BY200-C4|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1186, 'removeprod_regular', '3816|SO00434934844557|ST|FR|LH|FU-X|71200-BY430|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1187, 'removeprod_regular', '3815|SO00434934844557|7B|FR|RH|-|71100-BYE20|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1188, 'removeprod_regular', '3815|SO00434934844557|7B|FR|LH|-|71200-BYJ70|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1189, 'removeprod_regular', '3814|SO00434934844557|SV|FR|RH|F-UG|71100-BY360-C4|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1190, 'removeprod_regular', '3814|SO00434934844557|SV|FR|LH|F-UG|71200-BY440|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1191, 'removeprod_regular', '3813|SO00434934844556|ST|FR|RH|F-UX|71100-BY200-C4|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1192, 'removeprod_regular', '3813|SO00434934844556|ST|FR|LH|FU-X|71200-BY430|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1193, 'removeprod_regular', '3812|SO00434934844556|ST|FR|RH|F-UX|71100-BY200-C4|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1194, 'removeprod_regular', '3812|SO00434934844556|ST|FR|LH|FU-X|71200-BY430|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1195, 'removeprod_regular', '3811|SO00434934844556|T9|FR|RH|-|71100-BY820|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1196, 'removeprod_regular', '3811|SO00434934844556|T9|FR|LH|-|71200-BYC00|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1197, 'removeprod_regular', '3810|SO00434934844556|RV|FR|RH|F-UK|71100-BY210-C4|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1198, 'removeprod_regular', '3810|SO00434934844556|RV|FR|LH|F-UK|71200-BY460|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1199, 'removeprod_regular', '3809|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1200, 'removeprod_regular', '3809|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1201, 'removeprod_regular', '3808|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1202, 'removeprod_regular', '3808|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1203, 'removeprod_regular', '3807|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1204, 'removeprod_regular', '3807|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1205, 'removeprod_regular', '3806|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1206, 'removeprod_regular', '3806|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1207, 'removeprod_regular', '3805|SO00434934844554|T9|FR|RH|-|71100-BY820|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1208, 'removeprod_regular', '3805|SO00434934844554|T9|FR|LH|-|71200-BYC00|13/07/2024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1209, 'removeprod_regular', '3805|SO00434934844554|T9|FR|RH|-|71100-BY820|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1210, 'removeprod_regular', '3805|SO00434934844554|T9|FR|LH|-|71200-BYC00|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:18:11'),
(1211, 'createdata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:20:57'),
(1212, 'createdata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:20:57'),
(1213, 'createdata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:20:57'),
(1214, 'createdata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:20:57'),
(1215, 'createdata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:20:57'),
(1216, 'createdata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:20:57'),
(1217, 'createdata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:20:57'),
(1218, 'createdata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:20:57'),
(1219, 'createdata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:20:57'),
(1220, 'createdata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:20:57'),
(1221, 'createdata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:20:57'),
(1222, 'createdata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:20:57'),
(1223, 'createdata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:20:57'),
(1224, 'createdata_ajs', 'SO00434934844558|3818', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:45:56'),
(1225, 'createdata_ajs', 'SO00434934844558|3819', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:45:56'),
(1226, 'createdata_ajs', 'SO00434934844558|3820', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:45:56'),
(1227, 'createdata_ajs', 'SO00434934844558|3821', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:45:56'),
(1228, 'createdata_ajs', 'SO00434934844559|3818', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:45:56'),
(1229, 'createdata_ajs', 'SO00434934844559|3823', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:45:56'),
(1230, 'createdata_ajs', 'SO00434934844559|3824', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:45:56'),
(1231, 'createdata_ajs', 'SO00434934844559|3825', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:45:56'),
(1232, 'createdata_ajs', 'SO00434934844560|3826', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:45:56'),
(1233, 'createdata_ajs', 'SO00434934844560|3827', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:45:56'),
(1234, 'createdata_ajs', 'SO00434934844560|3828', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:45:56'),
(1235, 'createdata_ajs', 'SO00434934844560|3829', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-13 06:45:56'),
(1236, 'createdata_ajs', 'SO0043493484460|3830', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 10:36:39'),
(1237, 'createdata_ajs', 'SO00434934844560|3831', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 10:38:17'),
(1238, 'createdata_ajs', 'SO00434934844554|3832', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 10:40:11'),
(1239, 'createdata_ajs', 'SO00434934844560|3833', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:35:07'),
(1240, 'createdata_ajs', 'SO00434934844561|3834', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:35:07'),
(1241, 'createdata_ajs', 'SO00434934844561|3835', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:35:07'),
(1242, 'createdata_ajs', 'SO00434934844561|3836', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:35:07'),
(1243, 'createdata_ajs', 'SO00434934844561|3837', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:35:07'),
(1244, 'createdata_ajs', 'SO00434934844562|3838', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:35:07'),
(1245, 'createdata_ajs', 'SO00434934844562|3839', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:35:07'),
(1246, 'createdata_ajs', 'SO00434934844562|3840', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:35:07'),
(1247, 'createdata_ajs', 'SO00434934844562|3841', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:35:07'),
(1248, 'editdata_ajs', 'SO00434934844562|9998', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:53:53'),
(1249, 'editdata_ajs', 'SO00434934844562|9998', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:54:00'),
(1250, 'editdata_ajs', 'SO00434934844562|3841', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:55:11'),
(1251, 'editdata_ajs', 'SO00434934844562|3841', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:55:25'),
(1252, 'editdata_ajs', 'SO00434934844562|3841', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:56:29'),
(1253, 'editdata_ajs', 'SO00434934844562|9998', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:56:39');
INSERT INTO `tbl_logdate` (`id`, `action`, `data`, `device`, `update_by`, `update_time`) VALUES
(1254, 'editdata_ajs', 'SO00434934844562|9999', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:56:50'),
(1255, 'createdata_ajs', 'SO00434934844562|0001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-14 11:57:30'),
(1256, 'editdata_ajs', 'SO00434934844562|0001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:18:51'),
(1257, 'createdata_ajs', 'SO00434934844554|0002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:19:43'),
(1258, 'createdata_special', '202407-17|S017', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:36:52'),
(1259, 'editdata_special', '202407-17|S017', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:37:07'),
(1260, 'createdata_special', '000000-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:18'),
(1261, 'createdata_special', '000000-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:18'),
(1262, 'createdata_special', '000000-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:18'),
(1263, 'createdata_special', '000000-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:18'),
(1264, 'createdata_special', '000000-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:18'),
(1265, 'createdata_special', '000000-6|S006', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:18'),
(1266, 'createdata_special', '000000-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:18'),
(1267, 'createdata_special', '000000-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:18'),
(1268, 'removedata_special', '000000-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:51'),
(1269, 'removedata_special', '000000-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:51'),
(1270, 'removedata_special', '000000-6|S006', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:51'),
(1271, 'removedata_special', '000000-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:51'),
(1272, 'removedata_special', '000000-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:51'),
(1273, 'removedata_special', '000000-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:51'),
(1274, 'removedata_special', '000000-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:51'),
(1275, 'removedata_special', '000000-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:43:51'),
(1276, 'createdata_special', '202407-18|S018', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:46:45'),
(1277, 'createdata_special', '202407-19|S019', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:46:45'),
(1278, 'createdata_special', '202407-20|S020', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:46:45'),
(1279, 'createdata_special', '202407-21|S021', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:46:45'),
(1280, 'createdata_special', '202407-22|S022', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:46:45'),
(1281, 'createdata_special', '202407-23|S023', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:46:45'),
(1282, 'createdata_special', '202407-24|S024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:46:45'),
(1283, 'createdata_special', '202407-25|S025', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:46:45'),
(1284, 'editdata_special', '202407-25|S025', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:53:15'),
(1285, 'editdata_special', '202407-25|S025', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:53:29'),
(1286, 'removedata_special', '202407-25|S025', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:54:15'),
(1287, 'removedata_special', '202407-24|S024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:54:15'),
(1288, 'removedata_special', '202407-23|S023', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:54:15'),
(1289, 'removedata_special', '202407-22|S022', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:54:15'),
(1290, 'removedata_special', '202407-21|S021', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:54:15'),
(1291, 'removedata_special', '202407-20|S020', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:54:15'),
(1292, 'removedata_special', '202407-19|S019', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:54:15'),
(1293, 'removedata_special', '202407-18|S018', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:54:15'),
(1294, 'createdata_special', '202407-18|S018', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:59:09'),
(1295, 'createdata_special', '202407-19|S019', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:59:09'),
(1296, 'createdata_special', '202407-20|S020', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:59:09'),
(1297, 'createdata_special', '202407-21|S021', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:59:09'),
(1298, 'createdata_special', '202407-22|S022', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:59:09'),
(1299, 'createdata_special', '202407-23|S023', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:59:09'),
(1300, 'createdata_special', '202407-24|S024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:59:09'),
(1301, 'createdata_special', '202407-25|S025', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 05:59:09'),
(1302, 'editdata_special', '202407-25|S025', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 08:31:24'),
(1303, 'editdata_ajs', 'SO00434934844554|0002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 08:43:04'),
(1304, 'createdata_special', '202407-26|S026', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 08:43:54'),
(1305, 'editdata_special', '202407-26|S026', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 08:44:05'),
(1306, 'createdata_special', '202407-27|S027', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 09:56:06'),
(1307, 'createdata_special', '202407-28|S028', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 09:56:29'),
(1308, 'createdata_special', '202407-29|S029', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 09:56:29'),
(1309, 'createdata_special', '202407-30|S030', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 09:56:29'),
(1310, 'createdata_special', '202407-31|S031', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 09:56:29'),
(1311, 'createdata_special', '202407-32|S032', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 09:56:29'),
(1312, 'createdata_special', '202407-33|S033', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 09:56:29'),
(1313, 'createdata_special', '202407-34|S034', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 09:56:29'),
(1314, 'createdata_special', '202407-35|S035', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 09:56:29'),
(1315, 'createdata_ajs', 'SO00434934844554|0003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 10:24:23'),
(1316, 'createdata_special', '202407-36|S036', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 10:24:55'),
(1317, 'createdata_special', '202407-37|S037', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-15 10:27:32'),
(1318, 'removeprod_regular', '0003|SO00434934844554|SV|FR|RH|F-UG|71100-BY360-C4|D26A|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-17 12:19:02'),
(1319, 'editprod_regular', '3841|SO00434934844562|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-18 12:59:14'),
(1320, 'editprod_regular', '0001|SO00434934844562|SS|FR|RH|F-UL|71100-BY210-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-18 12:59:30'),
(1321, 'editprod_regular', '3841|SO00434934844562|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-18 13:02:40'),
(1322, 'editprod_regular', '0002|SO00434934844554|SS|FR|RH|F-UL|71100-BY210-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-18 13:08:22'),
(1323, 'editprod_regular', '0001|SO00434934844562|SS|FR|RH|F-UL|71100-BY210-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-18 13:08:22'),
(1324, 'editprod_regular', '3841|SO00434934844562|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-18 13:08:22'),
(1325, 'editprod_regular', '3840|SO00434934844562|7B|FR|RH|-|71100-BYE20|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-18 13:08:22'),
(1326, 'editprod_regular', '3839|SO00434934844562|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-18 13:08:22'),
(1327, 'editprod_regular', '3840|SO00434934844562|7B|FR|RH|-|71100-BYE20|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-18 15:14:07'),
(1328, 'editprod_special', 'S001|202407-1|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-18 15:46:52'),
(1329, 'editprod_special', 'S037|202407-37|SV|FR|RH|F-UG|71100-BY360-C4|D26A|6|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1330, 'editprod_special', 'S036|202407-36|T9|FR|RH|-|71100-BY820|D74A|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1331, 'editprod_special', 'S035|202407-35|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1332, 'editprod_special', 'S034|202407-34|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1333, 'editprod_special', 'S033|202407-33|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1334, 'editprod_special', 'S032|202407-32|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1335, 'editprod_special', 'S031|202407-31|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1336, 'editprod_special', 'S030|202407-30|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1337, 'editprod_special', 'S029|202407-29|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1338, 'editprod_special', 'S028|202407-28|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1339, 'editprod_special', 'S027|202407-27|SS|FR|RH|F-UL|71100-BY210-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1340, 'editprod_special', 'S026|202407-26|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1341, 'editprod_special', 'S025|202407-25|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1342, 'editprod_special', 'S024|202407-24|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1343, 'editprod_special', 'S023|202407-23|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1344, 'editprod_special', 'S022|202407-22|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1345, 'editprod_special', 'S021|202407-21|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1346, 'editprod_special', 'S020|202407-20|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1347, 'editprod_special', 'S019|202407-19|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1348, 'editprod_special', 'S018|202407-18|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1349, 'editprod_special', 'S017|202407-17|T9|FR|RH|-|71100-BY820|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1350, 'editprod_special', 'S016|202407-16|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1351, 'editprod_special', 'S015|202407-15|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1352, 'editprod_special', 'S014|202407-14|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1353, 'editprod_special', 'S013|202407-13|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1354, 'editprod_special', 'S012|202407-12|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1355, 'editprod_special', 'S011|202407-11|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1356, 'editprod_special', 'S010|202407-10|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1357, 'editprod_special', 'S009|202407-9|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1358, 'editprod_special', 'S008|202407-8|T9|FR|RH|-|71100-BY820|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1359, 'editprod_special', 'S007|202407-7|T9|FR|RH|-|71100-BY820|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1360, 'editprod_special', 'S006|202407-6|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1361, 'editprod_special', 'S005|202407-5|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1362, 'editprod_special', 'S004|202407-4|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1363, 'editprod_special', 'S003|202407-3|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1364, 'editprod_special', 'S002|202407-2|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1365, 'editprod_special', 'S001|202407-1|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:01:35'),
(1366, 'editprod_special', 'S037|202407-37|SV|FR|RH|F-UG|71100-BY360-C4|D26A|6|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1367, 'editprod_special', 'S037|202407-37|SV|FR|LH|F-UG|71200-BY440|D26A|7|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1368, 'editprod_special', 'S036|202407-36|T9|FR|RH|-|71100-BY820|D74A|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1369, 'editprod_special', 'S036|202407-36|T9|FR|LH|-|71200-BYC00|D74A|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1370, 'editprod_special', 'S035|202407-35|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1371, 'editprod_special', 'S035|202407-35|SV|FR|LH|F-UG|71200-BY440|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1372, 'editprod_special', 'S034|202407-34|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1373, 'editprod_special', 'S034|202407-34|T9|FR|LH|-|71200-BYC00|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1374, 'editprod_special', 'S033|202407-33|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1375, 'editprod_special', 'S033|202407-33|SV|FR|LH|F-UG|71200-BY440|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1376, 'editprod_special', 'S032|202407-32|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1377, 'editprod_special', 'S032|202407-32|T9|FR|LH|-|71200-BYC00|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1378, 'editprod_special', 'S031|202407-31|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1379, 'editprod_special', 'S031|202407-31|SV|FR|LH|F-UG|71200-BY440|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1380, 'editprod_special', 'S030|202407-30|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1381, 'editprod_special', 'S030|202407-30|T9|FR|LH|-|71200-BYC00|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1382, 'editprod_special', 'S029|202407-29|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1383, 'editprod_special', 'S029|202407-29|SV|FR|LH|F-UG|71200-BY440|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1384, 'editprod_special', 'S028|202407-28|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1385, 'editprod_special', 'S028|202407-28|T9|FR|LH|-|71200-BYC00|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1386, 'editprod_special', 'S027|202407-27|SS|FR|RH|F-UL|71100-BY210-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1387, 'editprod_special', 'S027|202407-27|SS|FR|LH|F-UL|71200-BY450|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1388, 'editprod_special', 'S026|202407-26|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1389, 'editprod_special', 'S026|202407-26|T9|FR|LH|-|71200-BYC00|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1390, 'editprod_special', 'S025|202407-25|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1391, 'editprod_special', 'S025|202407-25|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1392, 'editprod_special', 'S024|202407-24|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1393, 'editprod_special', 'S024|202407-24|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1394, 'editprod_special', 'S023|202407-23|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1395, 'editprod_special', 'S023|202407-23|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1396, 'editprod_special', 'S022|202407-22|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1397, 'editprod_special', 'S022|202407-22|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1398, 'editprod_special', 'S021|202407-21|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1399, 'editprod_special', 'S021|202407-21|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1400, 'editprod_special', 'S020|202407-20|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1401, 'editprod_special', 'S020|202407-20|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1402, 'editprod_special', 'S019|202407-19|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1403, 'editprod_special', 'S019|202407-19|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1404, 'editprod_special', 'S018|202407-18|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1405, 'editprod_special', 'S018|202407-18|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1406, 'editprod_special', 'S017|202407-17|T9|FR|RH|-|71100-BY820|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1407, 'editprod_special', 'S017|202407-17|T9|FR|LH|-|71200-BYC00|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1408, 'editprod_special', 'S016|202407-16|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1409, 'editprod_special', 'S016|202407-16|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1410, 'editprod_special', 'S015|202407-15|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1411, 'editprod_special', 'S015|202407-15|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1412, 'editprod_special', 'S014|202407-14|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1413, 'editprod_special', 'S014|202407-14|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1414, 'editprod_special', 'S013|202407-13|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1415, 'editprod_special', 'S013|202407-13|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1416, 'editprod_special', 'S012|202407-12|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1417, 'editprod_special', 'S012|202407-12|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1418, 'editprod_special', 'S011|202407-11|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1419, 'editprod_special', 'S011|202407-11|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1420, 'editprod_special', 'S010|202407-10|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1421, 'editprod_special', 'S010|202407-10|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1422, 'editprod_special', 'S009|202407-9|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1423, 'editprod_special', 'S009|202407-9|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1424, 'editprod_special', 'S008|202407-8|T9|FR|RH|-|71100-BY820|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1425, 'editprod_special', 'S007|202407-7|T9|FR|RH|-|71100-BY820|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1426, 'editprod_special', 'S007|202407-7|T9|FR|LH|-|71200-BYC00|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1427, 'editprod_special', 'S006|202407-6|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1428, 'editprod_special', 'S006|202407-6|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1429, 'editprod_special', 'S005|202407-5|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1430, 'editprod_special', 'S005|202407-5|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1431, 'editprod_special', 'S004|202407-4|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1432, 'editprod_special', 'S004|202407-4|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1433, 'editprod_special', 'S003|202407-3|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1434, 'editprod_special', 'S003|202407-3|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1435, 'editprod_special', 'S002|202407-2|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1436, 'editprod_special', 'S002|202407-2|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1437, 'editprod_special', 'S001|202407-1|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1438, 'editprod_special', 'S001|202407-1|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-20 08:24:12'),
(1439, 'edittbl_level', '6Delivery', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-22 07:08:46'),
(1440, 'editprod_regular', '3805|SO00434934844554|T9|FR|LH|-|71200-BYC00|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-22 13:47:18'),
(1441, 'removetbl_level', '7Posting', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-23 06:06:56'),
(1442, 'removedata_ajs', 'SO00434934844554|0003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1443, 'removedata_ajs', 'SO00434934844554|0002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1444, 'removedata_ajs', 'SO00434934844562|0001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1445, 'removedata_ajs', 'SO00434934844562|9999', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1446, 'removedata_ajs', 'SO00434934844562|3840', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1447, 'removedata_ajs', 'SO00434934844562|3839', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1448, 'removedata_ajs', 'SO00434934844562|3838', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1449, 'removedata_ajs', 'SO00434934844561|3837', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1450, 'removedata_ajs', 'SO00434934844561|3836', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1451, 'removedata_ajs', 'SO00434934844561|3835', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1452, 'removedata_ajs', 'SO00434934844561|3834', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1453, 'removedata_ajs', 'SO00434934844560|3833', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1454, 'removedata_ajs', 'SO00434934844554|3832', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1455, 'removedata_ajs', 'SO00434934844560|3831', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1456, 'removedata_ajs', 'SO0043493484460|3830', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1457, 'removedata_ajs', 'SO00434934844560|3829', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1458, 'removedata_ajs', 'SO00434934844560|3828', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1459, 'removedata_ajs', 'SO00434934844560|3827', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1460, 'removedata_ajs', 'SO00434934844560|3826', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1461, 'removedata_ajs', 'SO00434934844559|3825', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1462, 'removedata_ajs', 'SO00434934844559|3824', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1463, 'removedata_ajs', 'SO00434934844559|3823', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1464, 'removedata_ajs', 'SO00434934844559|3818', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1465, 'removedata_ajs', 'SO00434934844558|3821', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1466, 'removedata_ajs', 'SO00434934844558|3820', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1467, 'removedata_ajs', 'SO00434934844558|3819', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1468, 'removedata_ajs', 'SO00434934844558|3818', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1469, 'removedata_ajs', 'SO00434934844557|3817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1470, 'removedata_ajs', 'SO00434934844557|3816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1471, 'removedata_ajs', 'SO00434934844557|3815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1472, 'removedata_ajs', 'SO00434934844557|3814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1473, 'removedata_ajs', 'SO00434934844556|3813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1474, 'removedata_ajs', 'SO00434934844556|3812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1475, 'removedata_ajs', 'SO00434934844556|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1476, 'removedata_ajs', 'SO00434934844556|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1477, 'removedata_ajs', 'SO00434934844555|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1478, 'removedata_ajs', 'SO00434934844555|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1479, 'removedata_ajs', 'SO00434934844555|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1480, 'removedata_ajs', 'SO00434934844555|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1481, 'removedata_ajs', 'SO00434934844554|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:34'),
(1482, 'removeprod_regular', '0003|SO00434934844554|SV|FR|LH|F-UG|71200-BY440|D26A|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1483, 'removeprod_regular', '0002|SO00434934844554|SS|FR|RH|F-UL|71100-BY210-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1484, 'removeprod_regular', '0002|SO00434934844554|SS|FR|LH|F-UL|71200-BY450|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1485, 'removeprod_regular', '0001|SO00434934844562|SS|FR|RH|F-UL|71100-BY210-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1486, 'removeprod_regular', '0001|SO00434934844562|SS|FR|LH|F-UL|71200-BY450|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1487, 'removeprod_regular', '3841|SO00434934844562|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1488, 'removeprod_regular', '3841|SO00434934844562|ST|FR|LH|FU-X|71200-BY430|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1489, 'removeprod_regular', '3840|SO00434934844562|7B|FR|RH|-|71100-BYE20|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1490, 'removeprod_regular', '3840|SO00434934844562|7B|FR|LH|-|71200-BYJ70|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1491, 'removeprod_regular', '3839|SO00434934844562|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1492, 'removeprod_regular', '3839|SO00434934844562|SV|FR|LH|F-UG|71200-BY440|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1493, 'removeprod_regular', '3838|SO00434934844562|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1494, 'removeprod_regular', '3838|SO00434934844562|ST|FR|LH|FU-X|71200-BY430|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1495, 'removeprod_regular', '3837|SO00434934844561|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1496, 'removeprod_regular', '3837|SO00434934844561|ST|FR|LH|FU-X|71200-BY430|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1497, 'removeprod_regular', '3836|SO00434934844561|T9|FR|RH|-|71100-BY820|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1498, 'removeprod_regular', '3836|SO00434934844561|T9|FR|LH|-|71200-BYC00|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1499, 'removeprod_regular', '3835|SO00434934844561|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1500, 'removeprod_regular', '3835|SO00434934844561|ST|FR|LH|FU-X|71200-BY430|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1501, 'removeprod_regular', '3834|SO00434934844561|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1502, 'removeprod_regular', '3834|SO00434934844561|SV|FR|LH|F-UG|71200-BY440|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1503, 'removeprod_regular', '3833|SO00434934844560|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1504, 'removeprod_regular', '3833|SO00434934844560|SV|FR|LH|F-UG|71200-BY440|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1505, 'removeprod_regular', '3832|SO00434934844554|SS|FR|RH|F-UL|71100-BY210-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1506, 'removeprod_regular', '3832|SO00434934844554|SS|FR|LH|F-UL|71200-BY450|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1507, 'removeprod_regular', '3831|SO00434934844560|SX|FR|RH|F-UG|71100-BY360-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1508, 'removeprod_regular', '3831|SO00434934844560|SX|FR|LH|F-UG|71200-BY440|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1509, 'removeprod_regular', '3830|SO0043493484460|sv|FR|RH|F-UG|71100-BY360-C4|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1510, 'removeprod_regular', '3830|SO0043493484460|sv|FR|LH|F-UG|71200-BY440|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1511, 'removeprod_regular', '3829|SO00434934844560|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1512, 'removeprod_regular', '3829|SO00434934844560|ST|FR|LH|FU-X|71200-BY430|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1513, 'removeprod_regular', '3828|SO00434934844560|7B|FR|RH|-|71100-BYE20|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1514, 'removeprod_regular', '3828|SO00434934844560|7B|FR|LH|-|71200-BYJ70|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1515, 'removeprod_regular', '3827|SO00434934844560|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1516, 'removeprod_regular', '3827|SO00434934844560|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1517, 'removeprod_regular', '3826|SO00434934844560|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1518, 'removeprod_regular', '3826|SO00434934844560|ST|FR|LH|FU-X|71200-BY430|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1519, 'removeprod_regular', '3825|SO00434934844559|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1520, 'removeprod_regular', '3825|SO00434934844559|ST|FR|LH|FU-X|71200-BY430|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1521, 'removeprod_regular', '3824|SO00434934844559|T9|FR|RH|-|71100-BY820|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1522, 'removeprod_regular', '3824|SO00434934844559|T9|FR|LH|-|71200-BYC00|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1523, 'removeprod_regular', '3823|SO00434934844559|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1524, 'removeprod_regular', '3823|SO00434934844559|ST|FR|LH|FU-X|71200-BY430|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1525, 'removeprod_regular', '3818|SO00434934844559|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1526, 'removeprod_regular', '3818|SO00434934844559|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1527, 'removeprod_regular', '3821|SO00434934844558|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1528, 'removeprod_regular', '3821|SO00434934844558|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1529, 'removeprod_regular', '3820|SO00434934844558|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1530, 'removeprod_regular', '3820|SO00434934844558|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1531, 'removeprod_regular', '3819|SO00434934844558|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1532, 'removeprod_regular', '3819|SO00434934844558|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1533, 'removeprod_regular', '3818|SO00434934844558|T9|FR|RH|-|71100-BY820|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1534, 'removeprod_regular', '3818|SO00434934844558|T9|FR|LH|-|71200-BYC00|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1535, 'removeprod_regular', '3817|SO00434934844557|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1536, 'removeprod_regular', '3817|SO00434934844557|ST|FR|LH|FU-X|71200-BY430|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1537, 'removeprod_regular', '3816|SO00434934844557|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1538, 'removeprod_regular', '3816|SO00434934844557|ST|FR|LH|FU-X|71200-BY430|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1539, 'removeprod_regular', '3815|SO00434934844557|7B|FR|RH|-|71100-BYE20|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1540, 'removeprod_regular', '3815|SO00434934844557|7B|FR|LH|-|71200-BYJ70|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1541, 'removeprod_regular', '3814|SO00434934844557|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1542, 'removeprod_regular', '3814|SO00434934844557|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1543, 'removeprod_regular', '3813|SO00434934844556|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1544, 'removeprod_regular', '3813|SO00434934844556|ST|FR|LH|FU-X|71200-BY430|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1545, 'removeprod_regular', '3812|SO00434934844556|ST|FR|RH|F-UX|71100-BY200-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1546, 'removeprod_regular', '3812|SO00434934844556|ST|FR|LH|FU-X|71200-BY430|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1547, 'removeprod_regular', '3811|SO00434934844556|T9|FR|RH|-|71100-BY820|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1548, 'removeprod_regular', '3811|SO00434934844556|T9|FR|LH|-|71200-BYC00|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1549, 'removeprod_regular', '3810|SO00434934844556|RV|FR|RH|F-UK|71100-BY210-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1550, 'removeprod_regular', '3810|SO00434934844556|RV|FR|LH|F-UK|71200-BY460|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1551, 'removeprod_regular', '3809|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1552, 'removeprod_regular', '3809|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1553, 'removeprod_regular', '3808|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1554, 'removeprod_regular', '3808|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1555, 'removeprod_regular', '3807|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1556, 'removeprod_regular', '3807|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1557, 'removeprod_regular', '3806|SO00434934844555|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1558, 'removeprod_regular', '3806|SO00434934844555|SV|FR|LH|F-UG|71200-BY440|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1559, 'removeprod_regular', '3805|SO00434934844554|T9|FR|RH|-|71100-BY820|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1560, 'removeprod_regular', '3805|SO00434934844554|T9|FR|LH|-|71200-BYC00|2024-07-13', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:43'),
(1561, 'removedata_shipping', 'SO004349348445540003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1562, 'removedata_shipping', 'SO004349348445540002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1563, 'removedata_shipping', 'SO004349348445620001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1564, 'removedata_shipping', 'SO004349348445623841', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1565, 'removedata_shipping', 'SO004349348445623840', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1566, 'removedata_shipping', 'SO004349348445623839', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1567, 'removedata_shipping', 'SO004349348445623838', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1568, 'removedata_shipping', 'SO004349348445613837', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1569, 'removedata_shipping', 'SO004349348445613836', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1570, 'removedata_shipping', 'SO004349348445613835', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1571, 'removedata_shipping', 'SO004349348445613834', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1572, 'removedata_shipping', 'SO004349348445603833', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1573, 'removedata_shipping', 'SO004349348445543832', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1574, 'removedata_shipping', 'SO004349348445603831', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1575, 'removedata_shipping', 'SO00434934844603830', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1576, 'removedata_shipping', 'SO004349348445603829', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1577, 'removedata_shipping', 'SO004349348445603828', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1578, 'removedata_shipping', 'SO004349348445603827', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1579, 'removedata_shipping', 'SO004349348445603826', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1580, 'removedata_shipping', 'SO004349348445593825', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1581, 'removedata_shipping', 'SO004349348445593824', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1582, 'removedata_shipping', 'SO004349348445593823', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1583, 'removedata_shipping', 'SO004349348445593818', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1584, 'removedata_shipping', 'SO004349348445583821', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1585, 'removedata_shipping', 'SO004349348445583820', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1586, 'removedata_shipping', 'SO004349348445583819', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1587, 'removedata_shipping', 'SO004349348445583818', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1588, 'removedata_shipping', '3805D74A', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1589, 'removedata_shipping', '', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1590, 'removedata_shipping', 'SO004349348445573817', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1591, 'removedata_shipping', 'SO004349348445573816', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1592, 'removedata_shipping', 'SO004349348445573815', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1593, 'removedata_shipping', 'SO004349348445563813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1594, 'removedata_shipping', 'SO004349348445563812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1595, 'removedata_shipping', 'SO004349348445563811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1596, 'removedata_shipping', 'SO004349348445553809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1597, 'removedata_shipping', 'SO004349348445553808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1598, 'removedata_shipping', 'SO004349348445553807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1599, 'removedata_shipping', 'SO004349348445543805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1600, 'removedata_shipping', 'SO004349348445573814', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1601, 'removedata_shipping', 'SO004349348445573813', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1602, 'removedata_shipping', 'SO004349348445573812', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1603, 'removedata_shipping', 'SO004349348445573811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1604, 'removedata_shipping', 'SO004349348445563810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1605, 'removedata_shipping', 'SO004349348445563809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1606, 'removedata_shipping', 'SO004349348445563808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1607, 'removedata_shipping', 'SO004349348445563807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1608, 'removedata_shipping', 'SO004349348445553806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1609, 'removedata_shipping', 'SO004349348445553805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1610, 'removedata_shipping', 'SO004349348445553804', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1611, 'removedata_shipping', 'SO004349348445553803', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1612, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1613, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1614, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1615, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52');
INSERT INTO `tbl_logdate` (`id`, `action`, `data`, `device`, `update_by`, `update_time`) VALUES
(1616, 'removedata_shipping', 'SO412306S20000063795', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1617, 'removedata_shipping', 'SO412306S20000063796', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1618, 'removedata_shipping', 'SO412306S20000063797', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1619, 'removedata_shipping', 'SO412306S20000073798', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1620, 'removedata_shipping', 'SO412306S20000073799', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1621, 'removedata_shipping', 'SO412306S20000073900', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1622, 'removedata_shipping', 'SO412306S20000073800', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1623, 'removedata_shipping', 'SO004349348445543802', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1624, 'removedata_shipping', 'SO004349348445543803', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1625, 'removedata_shipping', 'SO004349348445543804', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-24 12:11:52'),
(1626, 'judgetrip', '2-|SO412306S2000008-3802|16-20-ON#2-3802|--ON', 'Chrome 126.0.0.0Windows 10127.0.0.1', 'Admin JSS', '2024-07-24 12:19:03'),
(1627, 'judgetrip', '2-|SO412306S2000008-3802|16-20-ON#2-3790|--ON', 'Chrome 126.0.0.0Windows 10127.0.0.1', 'Admin JSS', '2024-07-24 12:19:41'),
(1628, 'judgetrip', '2-|SO412306S2000007-3800|16-20-ON#2-3800|--ON', 'Chrome 126.0.0.0Windows 10127.0.0.1', 'Admin JSS', '2024-07-24 13:45:42'),
(1629, 'judgetrip', '2-|SO412306S2000007-3800|16-20-ON#2-3803|--ON', 'Chrome 126.0.0.0Windows 10127.0.0.1', 'Admin JSS', '2024-07-24 13:45:56'),
(1630, 'createdata_special', '202407-38|S038', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-25 13:50:57'),
(1631, 'createdata_ajs', 'SO043294039i|3801', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-25 13:52:30'),
(1632, 'removedata_shipping', 'SO043294039i3801', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:42'),
(1633, 'removedata_shipping', 'SO412306S20000073800', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:42'),
(1634, 'removedata_shipping', 'SO412306S20000073799', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:42'),
(1635, 'removedata_shipping', 'SO412306S20000073798', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:42'),
(1636, 'removedata_shipping', 'SO412306S20000063797', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:42'),
(1637, 'removedata_shipping', 'SO412306S20000063796', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:42'),
(1638, 'removedata_shipping', 'SO412306S20000063795', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:42'),
(1639, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:42'),
(1640, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:42'),
(1641, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:42'),
(1642, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:42'),
(1643, 'removedata_shipping', 'SO412306S20000083802', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:42'),
(1644, 'removeprod_regular', '71100-BY820|T9|3801|SO043294039i|FR|RH|-|D74A|6|2024-07-25', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1645, 'removeprod_regular', '71200-BYC00|T9|3801|SO043294039i|FR|LH|-|D74A|7|2024-07-25', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1646, 'removeprod_regular', '71100-BY360-C4|SV|3800|SO412306S2000007|FR|RH|F-UG|D26A|6|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1647, 'removeprod_regular', '71200-BY440|SV|3800|SO412306S2000007|FR|LH|F-UG|D26A|7|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1648, 'removeprod_regular', '71100-BY360-C4|SV|3799|SO412306S2000007|FR|RH|F-UG|D26A|6|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1649, 'removeprod_regular', '71200-BY440|SV|3799|SO412306S2000007|FR|LH|F-UG|D26A|7|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1650, 'removeprod_regular', '71100-BY360-C4|SV|3798|SO412306S2000007|FR|RH|F-UG|D26A|6|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1651, 'removeprod_regular', '71200-BY440|SV|3798|SO412306S2000007|FR|LH|F-UG|D26A|7|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1652, 'removeprod_regular', '71100-BY210-C4|RV|3797|SO412306S2000006|FR|RH|F-UK|D26A|6|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1653, 'removeprod_regular', '71200-BY460|RV|3797|SO412306S2000006|FR|LH|F-UK|D26A|7|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1654, 'removeprod_regular', '71100-BY820|T9|3796|SO412306S2000006|FR|RH|-|D74A|6|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1655, 'removeprod_regular', '71200-BYC00|T9|3796|SO412306S2000006|FR|LH|-|D74A|7|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1656, 'removeprod_regular', '71100-BY200-C4|ST|3795|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1657, 'removeprod_regular', '71200-BY430|ST|3795|SO412306S2000006|FR|LH|FU-X|D26A|7|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1658, 'removeprod_regular', '71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1659, 'removeprod_regular', '71200-BY430|ST|3794|SO412306S2000006|FR|LH|FU-X|D26A|7|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1660, 'removeprod_regular', '71100-BY360-C4|SV|3793|SO412306S2000005|FR|RH|F-UG|D26A|6|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1661, 'removeprod_regular', '71200-BY440|SV|3793|SO412306S2000005|FR|LH|F-UG|D26A|7|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1662, 'removeprod_regular', '71100-BYE20|7B|3792|SO412306S2000005|FR|RH|-|D74A|6|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1663, 'removeprod_regular', '71200-BYJ70|7B|3792|SO412306S2000005|FR|LH|-|D74A|7|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1664, 'removeprod_regular', '71100-BY200-C4|ST|3791|SO412306S2000005|FR|RH|F-UX|D26A|6|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1665, 'removeprod_regular', '71200-BY430|ST|3791|SO412306S2000005|FR|LH|FU-X|D26A|7|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1666, 'removeprod_regular', '71200-BY430|ST|3802|SO412306S2000008|FR|LH|FU-X|D26A|7|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1667, 'removeprod_regular', '71100-BY200-C4|ST|3802|SO412306S2000008|FR|RH|F-UX|D26A|6|2024-07-24', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:40:55'),
(1668, 'removedata_ajs', 'SO043294039i|3801', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:41:02'),
(1669, 'removedata_ajs', 'SO412306S2000007|3800', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:41:02'),
(1670, 'removedata_ajs', 'SO412306S2000007|3799', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:41:02'),
(1671, 'removedata_ajs', 'SO412306S2000007|3798', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:41:02'),
(1672, 'removedata_ajs', 'SO412306S2000006|3797', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:41:02'),
(1673, 'removedata_ajs', 'SO412306S2000006|3796', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:41:02'),
(1674, 'removedata_ajs', 'SO412306S2000006|3795', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:41:02'),
(1675, 'removedata_ajs', 'SO412306S2000006|3794', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:41:02'),
(1676, 'removedata_ajs', 'SO412306S2000005|3793', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:41:02'),
(1677, 'removedata_ajs', 'SO412306S2000005|3792', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:41:02'),
(1678, 'removedata_ajs', 'SO412306S2000005|3791', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:41:02'),
(1679, 'removedata_ajs', 'SO412306S2000008|3802', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-26 14:41:02'),
(1680, 'removedata_ajs', 'SO412306S2000006|3795', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:14:29'),
(1681, 'removedata_ajs', 'SO412306S2000006|3794', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:14:29'),
(1682, 'removedata_ajs', 'SO412306S2000005|3793', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:14:29'),
(1683, 'removedata_ajs', 'SO412306S2000005|3792', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:14:29'),
(1684, 'removedata_ajs', 'SO412306S2000005|3791', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:14:29'),
(1685, 'removeprod_regular', '71100-BY200-C4|ST|3791|SO412306S2000005|FR|RH|F-UX|D26A|6|2024-07-26', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:14:38'),
(1686, 'removeprod_regular', '71200-BY430|ST|3791|SO412306S2000005|FR|LH|FU-X|D26A|7|2024-07-26', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:14:38'),
(1687, 'removeprod_regular', '71100-BY200-C4|ST|3791|SO412306S2000005|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:29:21'),
(1688, 'removeprod_regular', '71200-BY430|ST|3791|SO412306S2000005|FR|LH|FU-X|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:29:21'),
(1689, 'removedata_shipping', 'SO412306S20000073800', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1690, 'removedata_shipping', 'SO412306S20000073800', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1691, 'removedata_shipping', 'SO412306S20000073799', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1692, 'removedata_shipping', 'SO412306S20000073799', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1693, 'removedata_shipping', 'SO412306S20000073798', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1694, 'removedata_shipping', 'SO412306S20000073798', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1695, 'removedata_shipping', 'SO412306S20000063797', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1696, 'removedata_shipping', 'SO412306S20000063797', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1697, 'removedata_shipping', 'SO412306S20000063796', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1698, 'removedata_shipping', 'SO412306S20000063796', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1699, 'removedata_shipping', 'SO412306S20000063795', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1700, 'removedata_shipping', 'SO412306S20000063795', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1701, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1702, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1703, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1704, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1705, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1706, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1707, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1708, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:12'),
(1709, 'removeprod_regular', '71100-BY360-C4|SV|3800|SO412306S2000007|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1710, 'removeprod_regular', '71200-BY440|SV|3800|SO412306S2000007|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1711, 'removeprod_regular', '71100-BY360-C4|SV|3799|SO412306S2000007|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1712, 'removeprod_regular', '71200-BY440|SV|3799|SO412306S2000007|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1713, 'removeprod_regular', '71100-BY360-C4|SV|3798|SO412306S2000007|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1714, 'removeprod_regular', '71200-BY440|SV|3798|SO412306S2000007|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1715, 'removeprod_regular', '71100-BY210-C4|RV|3797|SO412306S2000006|FR|RH|F-UK|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1716, 'removeprod_regular', '71200-BY460|RV|3797|SO412306S2000006|FR|LH|F-UK|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1717, 'removeprod_regular', '71100-BY820|T9|3796|SO412306S2000006|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1718, 'removeprod_regular', '71200-BYC00|T9|3796|SO412306S2000006|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1719, 'removeprod_regular', '71100-BY200-C4|ST|3795|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1720, 'removeprod_regular', '71200-BY430|ST|3795|SO412306S2000006|FR|LH|FU-X|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1721, 'removeprod_regular', '71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1722, 'removeprod_regular', '71200-BY430|ST|3794|SO412306S2000006|FR|LH|FU-X|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1723, 'removeprod_regular', '71100-BYE20|7B|3792|SO412306S2000005|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:21'),
(1724, 'removeprod_regular', '71200-BYJ70|7B|3792|SO412306S2000005|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:24'),
(1725, 'removeprod_regular', '71200-BY440|SV|3793|SO412306S2000005|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:24'),
(1726, 'removeprod_regular', '71100-BY360-C4|SV|3793|SO412306S2000005|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:24'),
(1727, 'removedata_ajs', 'SO412306S2000007|3800', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:33'),
(1728, 'removedata_ajs', 'SO412306S2000007|3799', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:33'),
(1729, 'removedata_ajs', 'SO412306S2000007|3798', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:33'),
(1730, 'removedata_ajs', 'SO412306S2000006|3797', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:33'),
(1731, 'removedata_ajs', 'SO412306S2000006|3796', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:33'),
(1732, 'removedata_ajs', 'SO412306S2000006|3795', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:33'),
(1733, 'removedata_ajs', 'SO412306S2000006|3794', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:33'),
(1734, 'removedata_ajs', 'SO412306S2000005|3793', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:33'),
(1735, 'removedata_ajs', 'SO412306S2000005|3792', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:33'),
(1736, 'removedata_ajs', 'SO412306S2000005|3791', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 11:57:33'),
(1737, 'removeprod_special', '71100-BY820|T9|S038|202407-38|FR|RH|-|D74A|6|2024-07-25', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1738, 'removeprod_special', '71200-BYC00|T9|S038|202407-38|FR|LH|-|D74A|7|2024-07-25', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1739, 'removeprod_special', 'S037|202407-37|SV|FR|RH|F-UG|71100-BY360-C4|D26A|6|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1740, 'removeprod_special', 'S037|202407-37|SV|FR|LH|F-UG|71200-BY440|D26A|7|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1741, 'removeprod_special', 'S036|202407-36|T9|FR|RH|-|71100-BY820|D74A|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1742, 'removeprod_special', 'S036|202407-36|T9|FR|LH|-|71200-BYC00|D74A|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1743, 'removeprod_special', 'S035|202407-35|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1744, 'removeprod_special', 'S035|202407-35|SV|FR|LH|F-UG|71200-BY440|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1745, 'removeprod_special', 'S034|202407-34|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1746, 'removeprod_special', 'S034|202407-34|T9|FR|LH|-|71200-BYC00|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1747, 'removeprod_special', 'S033|202407-33|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1748, 'removeprod_special', 'S033|202407-33|SV|FR|LH|F-UG|71200-BY440|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1749, 'removeprod_special', 'S032|202407-32|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1750, 'removeprod_special', 'S032|202407-32|T9|FR|LH|-|71200-BYC00|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1751, 'removeprod_special', 'S031|202407-31|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1752, 'removeprod_special', 'S031|202407-31|SV|FR|LH|F-UG|71200-BY440|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1753, 'removeprod_special', 'S030|202407-30|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1754, 'removeprod_special', 'S030|202407-30|T9|FR|LH|-|71200-BYC00|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1755, 'removeprod_special', 'S029|202407-29|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1756, 'removeprod_special', 'S029|202407-29|SV|FR|LH|F-UG|71200-BY440|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1757, 'removeprod_special', 'S028|202407-28|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1758, 'removeprod_special', 'S028|202407-28|T9|FR|LH|-|71200-BYC00|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1759, 'removeprod_special', 'S027|202407-27|SS|FR|RH|F-UL|71100-BY210-C4|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1760, 'removeprod_special', 'S027|202407-27|SS|FR|LH|F-UL|71200-BY450|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1761, 'removeprod_special', 'S026|202407-26|T9|FR|RH|-|71100-BY820|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1762, 'removeprod_special', 'S026|202407-26|T9|FR|LH|-|71200-BYC00|2024-07-15', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1763, 'removeprod_special', 'S025|202407-25|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1764, 'removeprod_special', 'S025|202407-25|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1765, 'removeprod_special', 'S024|202407-24|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1766, 'removeprod_special', 'S024|202407-24|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1767, 'removeprod_special', 'S023|202407-23|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1768, 'removeprod_special', 'S023|202407-23|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1769, 'removeprod_special', 'S022|202407-22|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1770, 'removeprod_special', 'S022|202407-22|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1771, 'removeprod_special', 'S021|202407-21|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1772, 'removeprod_special', 'S021|202407-21|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1773, 'removeprod_special', 'S020|202407-20|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1774, 'removeprod_special', 'S020|202407-20|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1775, 'removeprod_special', 'S019|202407-19|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1776, 'removeprod_special', 'S019|202407-19|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1777, 'removeprod_special', 'S018|202407-18|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1778, 'removeprod_special', 'S018|202407-18|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1779, 'removeprod_special', 'S017|202407-17|T9|FR|RH|-|71100-BY820|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1780, 'removeprod_special', 'S017|202407-17|T9|FR|LH|-|71200-BYC00|2024-07-14', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1781, 'removeprod_special', 'S016|202407-16|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1782, 'removeprod_special', 'S016|202407-16|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1783, 'removeprod_special', 'S015|202407-15|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1784, 'removeprod_special', 'S015|202407-15|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1785, 'removeprod_special', 'S014|202407-14|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1786, 'removeprod_special', 'S014|202407-14|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1787, 'removeprod_special', 'S013|202407-13|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1788, 'removeprod_special', 'S013|202407-13|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1789, 'removeprod_special', 'S012|202407-12|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1790, 'removeprod_special', 'S012|202407-12|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1791, 'removeprod_special', 'S011|202407-11|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1792, 'removeprod_special', 'S011|202407-11|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1793, 'removeprod_special', 'S010|202407-10|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1794, 'removeprod_special', 'S010|202407-10|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1795, 'removeprod_special', 'S009|202407-9|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1796, 'removeprod_special', 'S009|202407-9|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1797, 'removeprod_special', 'S008|202407-8|T9|FR|RH|-|71100-BY820|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1798, 'removeprod_special', 'S007|202407-7|T9|FR|RH|-|71100-BY820|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1799, 'removeprod_special', 'S007|202407-7|T9|FR|LH|-|71200-BYC00|2024-07-11', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1800, 'removeprod_special', 'S006|202407-6|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1801, 'removeprod_special', 'S006|202407-6|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1802, 'removeprod_special', 'S005|202407-5|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1803, 'removeprod_special', 'S005|202407-5|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1804, 'removeprod_special', 'S004|202407-4|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1805, 'removeprod_special', 'S004|202407-4|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1806, 'removeprod_special', 'S003|202407-3|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1807, 'removeprod_special', 'S003|202407-3|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1808, 'removeprod_special', 'S002|202407-2|SV|FR|RH|F-UG|71100-BY360-C4|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1809, 'removeprod_special', 'S002|202407-2|SV|FR|LH|F-UG|71200-BY440|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1810, 'removeprod_special', 'S001|202407-1|T9|FR|RH|-|71100-BY820|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1811, 'removeprod_special', 'S001|202407-1|T9|FR|LH|-|71200-BYC00|2024-07-09', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:15:42'),
(1812, 'removedata_special', '202407-38|S038', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1813, 'removedata_special', '202407-37|S037', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1814, 'removedata_special', '202407-36|S036', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1815, 'removedata_special', '202407-35|S035', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1816, 'removedata_special', '202407-34|S034', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1817, 'removedata_special', '202407-33|S033', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1818, 'removedata_special', '202407-32|S032', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1819, 'removedata_special', '202407-31|S031', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1820, 'removedata_special', '202407-30|S030', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1821, 'removedata_special', '202407-29|S029', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1822, 'removedata_special', '202407-28|S028', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1823, 'removedata_special', '202407-27|S027', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1824, 'removedata_special', '202407-26|S026', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1825, 'removedata_special', '202407-25|S025', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1826, 'removedata_special', '202407-24|S024', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1827, 'removedata_special', '202407-23|S023', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1828, 'removedata_special', '202407-22|S022', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1829, 'removedata_special', '202407-21|S021', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1830, 'removedata_special', '202407-20|S020', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1831, 'removedata_special', '202407-19|S019', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1832, 'removedata_special', '202407-18|S018', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1833, 'removedata_special', '202407-17|S017', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1834, 'removedata_special', '202407-16|S016', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1835, 'removedata_special', '202407-15|S015', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1836, 'removedata_special', '202407-14|S014', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1837, 'removedata_special', '202407-13|S013', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1838, 'removedata_special', '202407-12|S012', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1839, 'removedata_special', '202407-11|S011', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1840, 'removedata_special', '202407-10|S010', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1841, 'removedata_special', '202407-9|S009', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1842, 'removedata_special', '202407-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1843, 'removedata_special', '202407-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1844, 'removedata_special', '202407-6|S006', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1845, 'removedata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1846, 'removedata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1847, 'removedata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1848, 'removedata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1849, 'removedata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:01'),
(1850, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:22'),
(1851, 'createdata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:22'),
(1852, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:22'),
(1853, 'createdata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:22'),
(1854, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:22'),
(1855, 'createdata_special', '202407-6|S006', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:22'),
(1856, 'createdata_special', '202407-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:22'),
(1857, 'createdata_special', '202407-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:16:22'),
(1858, 'removedata_special', '202407-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:21:19'),
(1859, 'removeprod_special', '71200-BY440|SV|S008|202407-8|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:05'),
(1860, 'removeprod_special', '71100-BY360-C4|SV|S008|202407-8|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:05'),
(1861, 'removeprod_special', '71100-BY360-C4|SV|S006|202407-6|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:05'),
(1862, 'removeprod_special', '71200-BY440|SV|S006|202407-6|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:05'),
(1863, 'removeprod_special', '71100-BY820|T9|S005|202407-5|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:05'),
(1864, 'removeprod_special', '71200-BYC00|T9|S005|202407-5|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:05'),
(1865, 'removeprod_special', '71100-BY360-C4|SV|S004|202407-4|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:05'),
(1866, 'removeprod_special', '71200-BY440|SV|S004|202407-4|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:05'),
(1867, 'removeprod_special', '71100-BY820|T9|S003|202407-3|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:05'),
(1868, 'removeprod_special', '71200-BYC00|T9|S003|202407-3|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:05'),
(1869, 'removeprod_special', '71100-BY360-C4|SV|S002|202407-2|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:05'),
(1870, 'removeprod_special', '71200-BY440|SV|S002|202407-2|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:05'),
(1871, 'removeprod_special', '71200-BYC00|T9|S001|202407-1|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:05'),
(1872, 'removeprod_special', '71100-BY820|T9|S001|202407-1|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:05'),
(1873, 'removedata_special', '202407-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:36'),
(1874, 'removedata_special', '202407-6|S006', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:36'),
(1875, 'removedata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:36'),
(1876, 'removedata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:36'),
(1877, 'removedata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:36'),
(1878, 'removedata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:36'),
(1879, 'removedata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:36'),
(1880, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:48'),
(1881, 'createdata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:48'),
(1882, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:48'),
(1883, 'createdata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:48'),
(1884, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:48'),
(1885, 'createdata_special', '202407-6|S006', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:48'),
(1886, 'createdata_special', '202407-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:48'),
(1887, 'createdata_special', '202407-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:22:48'),
(1888, 'removeprod_special', '71200-BYC00|T9|S007|202407-7|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1889, 'removeprod_special', '71100-BY360-C4|SV|S006|202407-6|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1890, 'removeprod_special', '71200-BY440|SV|S006|202407-6|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1891, 'removeprod_special', '71100-BY820|T9|S005|202407-5|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1892, 'removeprod_special', '71200-BYC00|T9|S005|202407-5|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1893, 'removeprod_special', '71100-BY360-C4|SV|S004|202407-4|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1894, 'removeprod_special', '71200-BY440|SV|S004|202407-4|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1895, 'removeprod_special', '71100-BY820|T9|S003|202407-3|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1896, 'removeprod_special', '71200-BYC00|T9|S003|202407-3|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1897, 'removeprod_special', '71100-BY360-C4|SV|S002|202407-2|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1898, 'removeprod_special', '71200-BY440|SV|S002|202407-2|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1899, 'removeprod_special', '71100-BY820|T9|S001|202407-1|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1900, 'removeprod_special', '71200-BYC00|T9|S001|202407-1|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1901, 'removeprod_special', '71100-BY820|T9|S007|202407-7|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1902, 'removeprod_special', '71200-BY440|SV|S008|202407-8|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1903, 'removeprod_special', '71100-BY360-C4|SV|S008|202407-8|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:28'),
(1904, 'removedata_special', '202407-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:54'),
(1905, 'removedata_special', '202407-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:54'),
(1906, 'removedata_special', '202407-6|S006', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:54'),
(1907, 'removedata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:54'),
(1908, 'removedata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:54'),
(1909, 'removedata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:54'),
(1910, 'removedata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:54'),
(1911, 'removedata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:24:54'),
(1912, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:26:25'),
(1913, 'createdata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:26:25'),
(1914, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:26:25'),
(1915, 'createdata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:26:26'),
(1916, 'createdata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:26:26'),
(1917, 'createdata_special', '202407-6|S006', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:26:26'),
(1918, 'createdata_special', '202407-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:26:26'),
(1919, 'createdata_special', '202407-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:26:26'),
(1920, 'removedata_special', '202407-6|S006', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:27:20'),
(1921, 'createdata_special', '202407-9|S009', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:27:50'),
(1922, 'createdata_special', '202407-10|S010', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:27:50'),
(1923, 'createdata_special', '202407-11|S011', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:27:50'),
(1924, 'createdata_special', '202407-12|S012', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:27:50'),
(1925, 'createdata_special', '202407-13|S013', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:27:50'),
(1926, 'createdata_special', '202407-14|S014', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:27:50'),
(1927, 'createdata_special', '202407-15|S015', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:27:50'),
(1928, 'createdata_special', '202407-16|S016', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:27:50'),
(1929, 'removeprod_special', '71100-BY360-C4|SV|S016|202407-16|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1930, 'removeprod_special', '71200-BY440|SV|S016|202407-16|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1931, 'removeprod_special', '71100-BY820|T9|S015|202407-15|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1932, 'removeprod_special', '71200-BYC00|T9|S015|202407-15|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1933, 'removeprod_special', '71100-BY360-C4|SV|S014|202407-14|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1934, 'removeprod_special', '71200-BY440|SV|S014|202407-14|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1935, 'removeprod_special', '71100-BY820|T9|S013|202407-13|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1936, 'removeprod_special', '71200-BYC00|T9|S013|202407-13|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1937, 'removeprod_special', '71100-BY360-C4|SV|S012|202407-12|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1938, 'removeprod_special', '71200-BY440|SV|S012|202407-12|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1939, 'removeprod_special', '71100-BY820|T9|S011|202407-11|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1940, 'removeprod_special', '71200-BYC00|T9|S011|202407-11|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1941, 'removeprod_special', '71100-BY360-C4|SV|S010|202407-10|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1942, 'removeprod_special', '71200-BY440|SV|S010|202407-10|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1943, 'removeprod_special', '71100-BY360-C4|SV|S008|202407-8|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1944, 'removeprod_special', '71200-BY440|SV|S008|202407-8|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1945, 'removeprod_special', '71100-BY820|T9|S007|202407-7|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1946, 'removeprod_special', '71200-BYC00|T9|S007|202407-7|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1947, 'removeprod_special', '71200-BYC00|T9|S009|202407-9|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1948, 'removeprod_special', '71100-BY820|T9|S009|202407-9|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1949, 'removeprod_special', '71100-BY820|T9|S005|202407-5|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1950, 'removeprod_special', '71200-BYC00|T9|S005|202407-5|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1951, 'removeprod_special', '71100-BY360-C4|SV|S004|202407-4|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1952, 'removeprod_special', '71200-BY440|SV|S004|202407-4|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1953, 'removeprod_special', '71100-BY820|T9|S003|202407-3|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1954, 'removeprod_special', '71200-BYC00|T9|S003|202407-3|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1955, 'removeprod_special', '71100-BY360-C4|SV|S002|202407-2|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1956, 'removeprod_special', '71200-BY440|SV|S002|202407-2|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1957, 'removeprod_special', '71100-BY820|T9|S001|202407-1|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1958, 'removeprod_special', '71200-BYC00|T9|S001|202407-1|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:10'),
(1959, 'removedata_special', '202407-16|S016', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1960, 'removedata_special', '202407-15|S015', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1961, 'removedata_special', '202407-14|S014', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1962, 'removedata_special', '202407-13|S013', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1963, 'removedata_special', '202407-12|S012', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1964, 'removedata_special', '202407-11|S011', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1965, 'removedata_special', '202407-10|S010', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1966, 'removedata_special', '202407-9|S009', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1967, 'removedata_special', '202407-8|S008', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1968, 'removedata_special', '202407-7|S007', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1969, 'removedata_special', '202407-5|S005', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1970, 'removedata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1971, 'removedata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1972, 'removedata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1973, 'removedata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:18'),
(1974, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:27'),
(1975, 'createdata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:30:56'),
(1976, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:31:04'),
(1977, 'createdata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:31:11'),
(1978, 'removeprod_special', '71100-BY820|T9|S004|202407-4|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:32:54');
INSERT INTO `tbl_logdate` (`id`, `action`, `data`, `device`, `update_by`, `update_time`) VALUES
(1979, 'removeprod_special', '71200-BYC00|T9|S004|202407-4|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:32:54'),
(1980, 'removeprod_special', '71100-BY820|T9|S003|202407-3|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:32:54'),
(1981, 'removeprod_special', '71200-BYC00|T9|S003|202407-3|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:32:54'),
(1982, 'removeprod_special', '71100-BY360-C4|SV|S002|202407-2|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:32:54'),
(1983, 'removeprod_special', '71200-BY440|SV|S002|202407-2|FR|LH|F-UG|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:32:54'),
(1984, 'removeprod_special', '71100-BY820|T9|S001|202407-1|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:32:54'),
(1985, 'removeprod_special', '71200-BYC00|T9|S001|202407-1|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:32:54'),
(1986, 'removedata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:33:03'),
(1987, 'removedata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:33:03'),
(1988, 'removedata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:33:03'),
(1989, 'removedata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:33:03'),
(1990, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:33:12'),
(1991, 'createdata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:33:18'),
(1992, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:33:31'),
(1993, 'removeprod_special', '71200-BYC00|T9|S001|202407-1|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:37:17'),
(1994, 'removeprod_special', '71100-BY820|T9|S001|202407-1|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:37:17'),
(1995, 'removeprod_special', '71200-BYC00|T9|S002|202407-2|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:37:17'),
(1996, 'removeprod_special', '71100-BY820|T9|S002|202407-2|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:37:17'),
(1997, 'removeprod_special', '71200-BY450|SS|S003|202407-3|FR|LH|F-UL|D26A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:37:17'),
(1998, 'removeprod_special', '71100-BY210-C4|SS|S003|202407-3|FR|RH|F-UL|D26A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:37:17'),
(1999, 'removedata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:37:32'),
(2000, 'removedata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:37:32'),
(2001, 'removedata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:37:32'),
(2002, 'createdata_special', '202407-1|S001', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:37:37'),
(2003, 'createdata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:37:57'),
(2004, 'createdata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:38:02'),
(2005, 'removedata_special', '202407-2|S002', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:38:18'),
(2006, 'createdata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 13:39:02'),
(2007, 'createdata_ajs', 'SO04329403910|3801', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 14:55:32'),
(2008, 'createdata_ajs', 'SO04329403914|3803', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 15:28:58'),
(2009, 'createdata_ajs', 'SO00434934844563|3804', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 16:29:48'),
(2010, 'createdata_ajs', 'SO00434934844563|3805', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 16:29:49'),
(2011, 'createdata_ajs', 'SO00434934844563|3806', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 16:29:49'),
(2012, 'createdata_ajs', 'SO00434934844563|3807', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 16:29:49'),
(2013, 'createdata_ajs', 'SO00434934844564|3808', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 16:29:49'),
(2014, 'createdata_ajs', 'SO00434934844564|3809', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 16:29:49'),
(2015, 'createdata_ajs', 'SO00434934844564|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 16:29:49'),
(2016, 'createdata_ajs', 'SO00434934844564|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 16:29:49'),
(2017, 'removedata_special', '202407-4|S004', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 16:31:48'),
(2018, 'removedata_special', '202407-3|S003', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 16:33:41'),
(2019, 'removeprod_regular', '71100-BYE20|7B|3811|SO00434934844564|FR|RH|-|D74A|6|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 16:35:36'),
(2020, 'removedata_ajs', 'SO00434934844564|3811', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 16:35:43'),
(2021, 'removeprod_regular', '71200-BYJ70|7B|3811|SO00434934844564|FR|LH|-|D74A|7|2024-07-27', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 16:36:14'),
(2022, 'removedata_ajs', 'SO00434934844564|3810', 'Chrome 126.0.0.0Windows 10::1', 'Admin JSS', '2024-07-27 16:36:18'),
(2023, 'edittemp_assy', '4', 'Chrome 127.0.0.0Windows 10::1', '71100-BY200-C4|ST|3794|SO41230', '2024-08-04 08:41:33'),
(2024, 'edittemp_assy', '4', 'Chrome 127.0.0.0Windows 10::1', '71100-BY200-C4|ST|3794|SO41230', '2024-08-04 08:41:56'),
(2025, 'edittemp_assy', '4', 'Chrome 127.0.0.0Windows 10::1', '71100-BY200-C4|ST|3794|SO41230', '2024-08-04 08:43:22'),
(2026, 'edittemp_assy', '4', 'Chrome 127.0.0.0Windows 10::1', '71100-BY200-C4|ST|3794|SO41230', '2024-08-04 08:44:27'),
(2027, 'edittemp_assy', '71100-BY200-C4|ST|3795|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-04 21:30:37'),
(2028, 'edittemp_assy', '71100-BY820|T9|3796|SO412306S2000006|FR|RH|-|D74A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-04 22:03:56'),
(2029, 'edittemp_assy', '71200-BYJ70|7B|3792|SO412306S2000005|FR|LH|-|D74A|7|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-05 07:59:43'),
(2030, 'edittemp_assy', '71200-BY430|ST|3791|SO412306S2000005|FR|LH|FU-X|D26A|7|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-05 07:59:43'),
(2031, 'removetemp_plc', 'QC_START_L6|71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2032, 'removetemp_plc', 'QC_START_L6|71100-BY360-C4|SV|3793|SO412306S2000005|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2033, 'removetemp_plc', 'QC_START_L6|71100-BY200-C4|ST|3791|SO412306S2000005|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2034, 'removetemp_plc', 'ASSY_CENTER2_L6|71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2035, 'removetemp_plc', 'ASSY_CENTER2_L6|71100-BY360-C4|SV|3793|SO412306S2000005|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2036, 'removetemp_plc', 'ASSY_CENTER2_L6|71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2037, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BY200-C4|ST|3795|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2038, 'removetemp_plc', 'ASSY_START_L7|71200-BYJ70|7B|3792|SO412306S2000005|FR|LH|-|D74A|7|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2039, 'removetemp_plc', 'ASSY_START_L7|71200-BY430|ST|3791|SO412306S2000005|FR|LH|FU-X|D26A|7|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2040, 'removetemp_plc', 'ASSY_START_L7|71200-BYC00|T9|S001|202407-1|FR|LH|-|D74A|7|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2041, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BY820|T9|3796|SO412306S2000006|FR|RH|-|D74A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2042, 'removetemp_plc', 'ASSY_START_L6|71100-BY820|T9|3796|SO412306S2000006|FR|RH|-|D74A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2043, 'removetemp_plc', 'ASSY_CENTER2_L6|71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2044, 'removetemp_plc', 'ASSY_CENTER2_L6|71100-BYE20|7B|3792|SO412306S2000005|FR|RH|-|D74A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2045, 'removetemp_plc', 'ASSY_CENTER2_L6|71100-BY200-C4|ST|3791|SO412306S2000005|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2046, 'removetemp_plc', 'ASSY_CENTER2_L6|71100-BYE20|7B|3792|SO412306S2000005|FR|RH|-|D74A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2047, 'removetemp_plc', 'ASSY_CENTER2_L6|71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2048, 'removetemp_plc', 'ASSY_CENTER2_L6|71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2049, 'removetemp_plc', 'ASSY_START_L6|71100-BY200-C4|ST|3795|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2050, 'removetemp_plc', 'ASSY_START_L6|71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2051, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2052, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2053, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2054, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2055, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2056, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BY360-C4|SV|3793|SO412306S2000005|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2057, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BYE20|7B|3792|SO412306S2000005|FR|RH|-|D74A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2058, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BY200-C4|ST|3791|SO412306S2000005|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2059, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BY360-C4|SV|3793|SO412306S2000005|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2060, 'removetemp_plc', 'ASSY_START_L6|71100-BY360-C4|SV|3793|SO412306S2000005|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2061, 'removetemp_plc', 'ASSY_START_L6|71100-BYE20|7B|3792|SO412306S2000005|FR|RH|-|D74A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2062, 'removetemp_plc', 'ASSY_START_L6|71100-BY200-C4|ST|3791|SO412306S2000005|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2063, 'removetemp_plc', 'ASSY_START_L6|71100-BYE20|7B|3792|SO412306S2000005|FR|RH|-|D74A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2064, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BYE20|7B|3792|SO412306S2000005|FR|RH|-|D74A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2065, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BY200-C4|ST|3791|SO412306S2000005|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2066, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BY200-C4|ST|3802|SO412306S2000008|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2067, 'removetemp_plc', 'ASSY_CENTER1_L6|71100-BY200-C4|ST|3809|SO00434934844564|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2068, 'removetemp_plc', 'ASSY_START_L6|71100-BYE20|7B|3792|SO412306S2000005|FR|RH|-|D74A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-07 21:38:44'),
(2069, 'removetemp_plc', 'SUB_ASSY1_L6|71100-BYE20|7B|3792|SO412306S2000005|FR|RH|-|D74A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 06:14:58'),
(2070, 'removetemp_plc', 'SUB_ASSY1_L6|71100-BY200-C4|ST|3791|SO412306S2000005|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 06:14:58'),
(2071, 'removetemp_plc', 'SUB_ASSY2_L6|71100-BY360-C4|SV|3793|SO412306S2000005|FR|RH|F-UG|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 06:14:58'),
(2072, 'removetemp_plc', 'SUB_ASSY2_L6|71100-BYE20|7B|3792|SO412306S2000005|FR|RH|-|D74A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 06:14:58'),
(2073, 'removetemp_plc', 'SUB_ASSY2_L6|71100-BY200-C4|ST|3791|SO412306S2000005|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 06:14:58'),
(2074, 'removetemp_plc', 'SUB_ASSY5_L7|71200-BY430|ST|3791|SO412306S2000005|FR|LH|FU-X|D26A|7|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 09:36:45'),
(2075, 'judgetrip', '2-D:\\TxtSlipOrderA2-ON#2-D:\\TxtSlipOrderA2-ON', 'Chrome 127.0.0.0Windows 10127.0.0.1', 'Admin JSS', '2024-08-08 12:15:41'),
(2076, 'removedata_shipping', 'SO004349348445633805', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2077, 'removedata_shipping', 'SO004349348445633805', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2078, 'removedata_shipping', 'SO004349348445633804', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2079, 'removedata_shipping', 'SO004349348445633804', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2080, 'removedata_shipping', 'SO004349348445633806', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2081, 'removedata_shipping', 'SO004349348445633806', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2082, 'removedata_shipping', 'SO004349348445633807', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2083, 'removedata_shipping', 'SO004349348445633807', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2084, 'removedata_shipping', 'SO004349348445643808', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2085, 'removedata_shipping', 'SO004349348445643808', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2086, 'removedata_shipping', 'SO004349348445643809', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2087, 'removedata_shipping', 'SO004349348445643809', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2088, 'removedata_shipping', 'SO043294039143803', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2089, 'removedata_shipping', 'SO043294039143803', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2090, 'removedata_shipping', 'SO412306S20000083802', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2091, 'removedata_shipping', 'SO412306S20000083802', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2092, 'removedata_shipping', 'SO043294039103801', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2093, 'removedata_shipping', 'SO043294039103801', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2094, 'removedata_shipping', 'SO412306S20000073800', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2095, 'removedata_shipping', 'SO412306S20000073800', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2096, 'removedata_shipping', 'SO412306S20000073799', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2097, 'removedata_shipping', 'SO412306S20000073799', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2098, 'removedata_shipping', 'SO412306S20000073798', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2099, 'removedata_shipping', 'SO412306S20000073798', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2100, 'removedata_shipping', 'SO412306S20000063797', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2101, 'removedata_shipping', 'SO412306S20000063797', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2102, 'removedata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2103, 'removedata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2104, 'removedata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2105, 'removedata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2106, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2107, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2108, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2109, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2110, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2111, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2112, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2113, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 17:27:20'),
(2114, 'removedata_shipping', 'SO004349348445633805', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2115, 'removedata_shipping', 'SO004349348445633805', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2116, 'removedata_shipping', 'SO004349348445633804', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2117, 'removedata_shipping', 'SO004349348445633804', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2118, 'removedata_shipping', 'SO004349348445633806', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2119, 'removedata_shipping', 'SO004349348445633806', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2120, 'removedata_shipping', 'SO004349348445633807', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2121, 'removedata_shipping', 'SO004349348445633807', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2122, 'removedata_shipping', 'SO004349348445643808', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2123, 'removedata_shipping', 'SO004349348445643808', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2124, 'removedata_shipping', 'SO004349348445643809', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2125, 'removedata_shipping', 'SO004349348445643809', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2126, 'removedata_shipping', 'SO043294039143803', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2127, 'removedata_shipping', 'SO043294039143803', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2128, 'removedata_shipping', 'SO412306S20000083802', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2129, 'removedata_shipping', 'SO412306S20000083802', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2130, 'removedata_shipping', 'SO043294039103801', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2131, 'removedata_shipping', 'SO043294039103801', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2132, 'removedata_shipping', 'SO412306S20000073800', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2133, 'removedata_shipping', 'SO412306S20000073800', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2134, 'removedata_shipping', 'SO412306S20000073799', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2135, 'removedata_shipping', 'SO412306S20000073799', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2136, 'removedata_shipping', 'SO412306S20000073798', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2137, 'removedata_shipping', 'SO412306S20000073798', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2138, 'removedata_shipping', 'SO412306S20000063797', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2139, 'removedata_shipping', 'SO412306S20000063797', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2140, 'removedata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2141, 'removedata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2142, 'removedata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2143, 'removedata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2144, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2145, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2146, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2147, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2148, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2149, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2150, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2151, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:01:17'),
(2152, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:03:12'),
(2153, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:03:12'),
(2154, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:03:12'),
(2155, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:03:12'),
(2156, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:03:12'),
(2157, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:03:12'),
(2158, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:03:12'),
(2159, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-08 18:03:12'),
(2160, 'removedata_shipping', 'SO004349348445633805', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2161, 'removedata_shipping', 'SO004349348445633805', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2162, 'removedata_shipping', 'SO004349348445633804', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2163, 'removedata_shipping', 'SO004349348445633804', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2164, 'removedata_shipping', 'SO004349348445633806', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2165, 'removedata_shipping', 'SO004349348445633806', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2166, 'removedata_shipping', 'SO004349348445633807', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2167, 'removedata_shipping', 'SO004349348445633807', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2168, 'removedata_shipping', 'SO004349348445643808', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2169, 'removedata_shipping', 'SO004349348445643808', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2170, 'removedata_shipping', 'SO004349348445643809', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2171, 'removedata_shipping', 'SO004349348445643809', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2172, 'removedata_shipping', 'SO043294039143803', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2173, 'removedata_shipping', 'SO043294039143803', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2174, 'removedata_shipping', 'SO412306S20000083802', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2175, 'removedata_shipping', 'SO412306S20000083802', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2176, 'removedata_shipping', 'SO043294039103801', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2177, 'removedata_shipping', 'SO043294039103801', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2178, 'removedata_shipping', 'SO412306S20000073800', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2179, 'removedata_shipping', 'SO412306S20000073800', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2180, 'removedata_shipping', 'SO412306S20000073799', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2181, 'removedata_shipping', 'SO412306S20000073799', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2182, 'removedata_shipping', 'SO412306S20000073798', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2183, 'removedata_shipping', 'SO412306S20000073798', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2184, 'removedata_shipping', 'SO412306S20000063797', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2185, 'removedata_shipping', 'SO412306S20000063797', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2186, 'removedata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2187, 'removedata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2188, 'removedata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2189, 'removedata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2190, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2191, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2192, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2193, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2194, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2195, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2196, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2197, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 08:39:25'),
(2198, 'createdata_ajs', 'SO00434934844564|3810', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:21:09'),
(2199, 'removedata_shipping', 'SO004349348445633805', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2200, 'removedata_shipping', 'SO004349348445633805', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2201, 'removedata_shipping', 'SO004349348445633804', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2202, 'removedata_shipping', 'SO004349348445633804', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2203, 'removedata_shipping', 'SO004349348445633806', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2204, 'removedata_shipping', 'SO004349348445633806', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2205, 'removedata_shipping', 'SO004349348445633807', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2206, 'removedata_shipping', 'SO004349348445633807', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2207, 'removedata_shipping', 'SO004349348445643808', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2208, 'removedata_shipping', 'SO004349348445643808', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2209, 'removedata_shipping', 'SO004349348445643809', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2210, 'removedata_shipping', 'SO004349348445643809', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2211, 'removedata_shipping', 'SO043294039143803', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2212, 'removedata_shipping', 'SO043294039143803', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2213, 'removedata_shipping', 'SO412306S20000083802', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2214, 'removedata_shipping', 'SO412306S20000083802', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2215, 'removedata_shipping', 'SO043294039103801', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2216, 'removedata_shipping', 'SO043294039103801', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2217, 'removedata_shipping', 'SO412306S20000073800', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2218, 'removedata_shipping', 'SO412306S20000073800', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2219, 'removedata_shipping', 'SO412306S20000073799', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2220, 'removedata_shipping', 'SO412306S20000073799', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2221, 'removedata_shipping', 'SO412306S20000073798', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2222, 'removedata_shipping', 'SO412306S20000073798', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2223, 'removedata_shipping', 'SO412306S20000063797', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2224, 'removedata_shipping', 'SO412306S20000063797', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2225, 'removedata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2226, 'removedata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2227, 'removedata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2228, 'removedata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2229, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2230, 'removedata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2231, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2232, 'removedata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2233, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2234, 'removedata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2235, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2236, 'removedata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 09:57:32'),
(2237, 'editdata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 12:54:30'),
(2238, 'editdata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 12:54:57'),
(2239, 'editdata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 12:55:37'),
(2240, 'editdata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 12:59:13'),
(2241, 'editdata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:40:54'),
(2242, 'editdata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:40:54'),
(2243, 'editdata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2244, 'editdata_shipping', 'SO412306S20000073798', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2245, 'editdata_shipping', 'SO412306S20000063797', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2246, 'editdata_shipping', 'SO412306S20000063797', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2247, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2248, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2249, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2250, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2251, 'editdata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2252, 'editdata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2253, 'editdata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2254, 'editdata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2255, 'editdata_shipping', 'SO004349348445643810', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2256, 'editdata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2257, 'editdata_shipping', 'SO412306S20000073799', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:50:55'),
(2258, 'editdata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2259, 'editdata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2260, 'editdata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2261, 'editdata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2262, 'editdata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2263, 'editdata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2264, 'editdata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2265, 'editdata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2266, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2267, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2268, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2269, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2270, 'editdata_shipping', 'SO412306S20000063797', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2271, 'editdata_shipping', 'SO412306S20000063797', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2272, 'editdata_shipping', 'SO412306S20000073798', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:57:11'),
(2273, 'editdata_shipping', 'SO412306S20000073798', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:58:47'),
(2274, 'editdata_shipping', 'SO412306S20000063797', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:58:47'),
(2275, 'editdata_shipping', 'SO412306S20000063797', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:58:47'),
(2276, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:58:47'),
(2277, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:58:47'),
(2278, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:58:47'),
(2279, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:58:47'),
(2280, 'editdata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:58:47'),
(2281, 'editdata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:58:47'),
(2282, 'editdata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:58:47'),
(2283, 'editdata_shipping', 'SO412306S20000053793', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:58:47'),
(2284, 'editdata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:58:47'),
(2285, 'editdata_shipping', 'SO412306S20000053792', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:58:47'),
(2286, 'editdata_shipping', 'SO412306S20000053791', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 14:58:47'),
(2287, 'edittbl_h_assy', '71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 15:17:33'),
(2288, 'edittbl_h_assy', '71100-BY200-C4|ST|3794|SO412306S2000006|FR|RH|F-UX|D26A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 15:17:55'),
(2289, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 15:21:32'),
(2290, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-09 15:21:32'),
(2291, 'editdata_ajs', 'SO00434934844564|3810', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-13 11:19:41'),
(2292, 'removedata_ajs', 'SO00434934844564|3810', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-13 11:21:40'),
(2293, 'editdata_ajs', 'SO00434934844564|3809', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-13 21:16:12'),
(2294, 'editdata_ajs', 'SO00434934844564|3809', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-13 21:16:28'),
(2295, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-20 09:41:31'),
(2296, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-20 09:41:31'),
(2297, 'edittbl_h_assy', '71100-BY820|T9|3796|SO412306S2000006|FR|RH|-|D74A|6|2024-07-27', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 06:19:04'),
(2298, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 11:49:17'),
(2299, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 12:46:59'),
(2300, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 12:46:59'),
(2301, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 12:47:25'),
(2302, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 12:47:25'),
(2303, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 12:48:02'),
(2304, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 12:48:02'),
(2305, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 12:49:01'),
(2306, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 12:49:01'),
(2307, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 13:29:31'),
(2308, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 13:29:31'),
(2309, 'editdata_shipping', 'SO412306S20000063794', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 20:38:44'),
(2310, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 20:44:59'),
(2311, 'editdata_shipping', 'SO412306S20000063796', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 20:53:42'),
(2312, 'editdata_shipping', 'SO412306S20000063795', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-22 20:53:52'),
(2313, 'createtbl_h_assy', '71100-BY200-C4|ST|K0001|2408231522|FR|RH|F-UX|D26A|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:15:22'),
(2314, 'createtbl_h_assy', '71200-BY430|ST|K0002|2408231522|FR|LH|FU-X|D26A|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:15:22'),
(2315, 'createtbl_h_assy', '71100-BY200-C4|ST|K0001|2408231612|FR|RH|F-UX|D26A|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:16:12'),
(2316, 'createtbl_h_assy', '71200-BY430|ST|K0002|2408231612|FR|LH|FU-X|D26A|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:16:12'),
(2317, 'removetbl_h_assy', '71200-BY430|ST|K0002|2408231612|FR|LH|FU-X|D26A|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:18:10'),
(2318, 'removetbl_h_assy', '71100-BY200-C4|ST|K0001|2408231612|FR|RH|F-UX|D26A|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:18:10'),
(2319, 'removetbl_h_assy', '71200-BY430|ST|K0002|2408231522|FR|LH|FU-X|D26A|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:18:10'),
(2320, 'removetbl_h_assy', '71100-BY200-C4|ST|K0001|2408231522|FR|RH|F-UX|D26A|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:18:10'),
(2321, 'createtbl_h_assy', '71100-BY200-C4|ST|K0001|2408231839|FR|RH|F-UX|D26A|6|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:18:39'),
(2322, 'createtbl_h_assy', '71200-BY430|ST|K0002|2408231839|FR|LH|FU-X|D26A|7|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:18:39'),
(2323, 'createtbl_h_assy', '71100-BY210-C4|SS|K0001|2408231942|FR|RH|F-UL|D26A|6|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:19:42'),
(2324, 'createtbl_h_assy', '71200-BY450|SS|K0002|2408231942|FR|LH|F-UL|D26A|7|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:19:42'),
(2325, 'createtbl_h_assy', '71100-BY360-C4|SX|K0001|2408233413|FR|RH|F-UG|D26A|6|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:34:13'),
(2326, 'createtbl_h_assy', '71200-BY440|SX|K0002|2408233413|FR|LH|F-UG|D26A|7|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:34:13'),
(2327, 'createtbl_h_assy', '71100-BY210-C4|RV|K0001|2408233507|FR|RH|F-UK|D26A|6|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:35:07'),
(2328, 'createtbl_h_assy', '71200-BY460|RV|K0002|2408233507|FR|LH|F-UK|D26A|7|2024-08-23', 'Chrome 127.0.0.0Windows 10::1', 'Admin JSS', '2024-08-23 10:35:07'),
(2329, 'edittbl_level', '1Prepare', 'Chrome 128.0.0.0Windows 10::1', 'Admin JSS', '2024-08-30 12:49:12'),
(2330, 'edittbl_level', '2Cooking', 'Chrome 128.0.0.0Windows 10::1', 'Admin JSS', '2024-08-30 13:31:15'),
(2331, 'edittbl_level', '3Packing', 'Chrome 128.0.0.0Windows 10::1', 'Admin JSS', '2024-08-30 13:31:26'),
(2332, 'edittbl_level', '1Prepare', 'Chrome 128.0.0.0Windows 10::1', 'Admin JSS', '2024-08-30 13:31:41'),
(2333, 'edittbl_level', '2Cooking', 'Chrome 128.0.0.0Windows 10::1', 'Admin JSS', '2024-08-30 13:31:46'),
(2334, 'edittbl_level', '3Packing', 'Chrome 128.0.0.0Windows 10::1', 'Admin JSS', '2024-08-30 13:31:52'),
(2335, 'edittbl_level', '8Delivery', 'Chrome 128.0.0.0Windows 10::1', 'Admin JSS', '2024-08-30 13:32:06'),
(2336, 'edittbl_level', '9Receiving', 'Chrome 128.0.0.0Windows 10::1', 'Admin JSS', '2024-08-30 13:32:19'),
(2337, 'removetbl_level', '10Andon', 'Chrome 128.0.0.0Windows 10::1', 'Admin JSS', '2024-08-30 13:32:30'),
(2338, 'removetbl_level', '11AJS', 'Chrome 128.0.0.0Windows 10::1', 'Admin JSS', '2024-08-30 13:32:30'),
(2339, 'removetbl_level', '12ResetStock', 'Chrome 128.0.0.0Windows 10::1', 'Admin JSS', '2024-08-30 13:32:30'),
(2340, 'removetbl_level', '14Admin_Assembly', 'Chrome 128.0.0.0Windows 10::1', 'Admin JSS', '2024-08-30 13:32:43'),
(2341, 'removetbl_level', '15Admin_PCD', 'Chrome 128.0.0.0Windows 10::1', 'Admin JSS', '2024-08-30 13:32:43'),
(2342, 'removetbl_level', '19Leader', 'Chrome 128.0.0.0Windows 10::1', 'Admin JSS', '2024-08-30 13:32:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `menuid` varchar(40) NOT NULL,
  `parent` varchar(20) NOT NULL,
  `child` varchar(20) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `nav` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `tabel` varchar(50) NOT NULL,
  `orders` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `menuid`, `parent`, `child`, `icon`, `nav`, `url`, `tabel`, `orders`) VALUES
(1, 'system-', 'system', '-', 'fa-cog', 'System', '-', '-', 1),
(2, 'systemtitle', 'system', 'title', '-', 'Data Title', 'master', 'tbl_title', 2),
(3, 'systemgroup', 'system', 'group', '-', 'Data Group', 'master', 'tbl_group', 3),
(4, 'systemarea', 'system', 'area', '-', 'Data Area', 'master', 'tbl_area', 4),
(5, 'systemlevel', 'system', 'level', '-', 'Data Level', 'master', 'tbl_level', 5),
(6, 'systemmenu', 'system', 'menu', 'fa-list', 'Data Menu', 'master', 'tbl_menu', 7),
(7, 'systemuser', 'system', 'user', 'fa-users', 'Data User', 'master', 'tbl_user', 8),
(8, 'master-', 'master', '-', 'fa-table', 'Master', '-', '-', 20),
(9, 'transaction-', 'transaction', '-', 'fa-exchange-alt', 'Transaction', '-', '-', 50),
(10, 'transactiondelay', 'transaction', 'delay', '-', 'History Delay', 'master/ts', 'tbl_h_delay', 66),
(11, 'masterseat', 'master', 'seat', '-', 'Data Seat', 'master/ms', 'tbl_m_seat', 22),
(12, 'planning-', 'planning', '-', 'fa-clock', 'Planning', '-', '-', 45),
(13, 'transactiontpickbig', 'transaction', 'tpickbig', '-', 'Temp Pick. Big', 'master/ts', 'temp_pickingbig', 54),
(14, 'transactiontpicksm', 'transaction', 'tpicksm', '-', 'Temp Pick. Small', 'master/ts', 'temp_pickingsmall', 53),
(15, 'planningord', 'planning', 'ord', '-', 'Order Menu', 'master/pl', 'tbl_order_menu', 47),
(16, 'masterline', 'master', 'line', '-', 'Data Line', 'master/ms', 'tbl_m_line', 21),
(17, 'mastercustomer', 'master', 'customer', '-', 'Data Customer', 'master/ms', 'tbl_m_customer', 23),
(18, 'masterspss', 'master', 'spss', '-', 'Data Small Part', 'master/ms', 'tbl_m_spssmall', 24),
(19, 'transactionconfmisp', 'transaction', 'confmisp', '-', 'Conf Mis Posting', 'master/ts', 'tbl_mis_conf', 72),
(20, 'masterdelay', 'master', 'delay', '-', 'Data Delay', 'master/ms', 'tbl_m_delay', 39),
(21, 'transactionhpicksm', 'transaction', 'hpicksm', '-', 'History Picking Small', 'master/ts', 'tbl_h_pickingsmall', 55),
(22, 'transactiontassy', 'transaction', 'tassy', '-', 'Temp Assy', 'master/ts', 'temp_assy', 57),
(23, 'masterdocument', 'master', 'document', '-', 'Data Document', 'master/ms', 'tbl_m_document', 40),
(24, 'mastermpicks', 'master', 'mpicks', '-', 'Matrix PickingSmall', 'master/ms', 'tbl_m_matrixpickingsmall', 25),
(25, 'transactionhassy', 'transaction', 'hassy', '-', 'History Assy', 'master/ts', 'tbl_h_assy', 58),
(26, 'transactionshipping', 'transaction', 'shipping', '-', 'History Shipping', 'master/ts', 'tbl_h_shipping', 80),
(27, 'transactionhc', 'transaction', 'hc', '-', 'History Cokote', 'master/ts', 'tbl_h_cokotei', 70),
(28, 'transactionhpickbig', 'transaction', 'hpickbig', '-', 'History Picking Big', 'master/ts', 'tbl_h_pickingbig', 56),
(29, 'transactionsoj', 'transaction', 'soj', '-', 'History AJS', 'master/ts', 'data_ajs', 59),
(30, 'transactionhisplc', 'transaction', 'hisplc', '-', 'History PLC', 'master/ts', 'tbl_h_plc', 77),
(31, 'masternut', 'master', 'nut', '-', 'Data Pos NutRunner', 'master/ms', 'tbl_m_nutrunner', 35),
(32, 'masterplc', 'master', 'plc', '-', 'Data Pos PLC', 'master/ms', 'tbl_m_plc', 32),
(33, 'mastermatrixplc', 'master', 'matrixplc', '-', 'Matrix PLC', 'master/ms', 'tbl_m_matrixplc', 33),
(34, 'transactiontposting', 'transaction', 'tposting', '-', 'Temp Posting', 'master/ts', 'temp_posting', 72),
(35, 'transactionhtight', 'transaction', 'htight', '-', 'History Tightenning', 'master/ts', 'tbl_h_tightenning', 75),
(36, 'transactiontempplc', 'transaction', 'tempplc', '-', 'Temp PLC', 'master/ts', 'temp_plc', 76),
(37, 'transactionairbag', 'transaction', 'airbag', '-', 'History Air Bag', 'master/ts', 'tbl_h_airbag', 71),
(38, 'transactionhpost', 'transaction', 'hpost', '-', 'History Posting', 'Master/ts', 'tbl_h_posting', 73),
(39, 'masterplcrepair', 'master', 'plcrepair', '-', 'Matrix PLC RM', 'master/ms', 'tbl_m_matrixplcrm', 34),
(40, 'masterchild', 'master', 'child', '-', 'Data Childpart', 'master/ms', 'tbl_m_childpart', 30),
(41, 'transactiontc', 'transaction', 'tc', '-', 'Temp Cokote', 'master/ts', 'temp_cokotei', 69),
(42, 'masterprint', 'master', 'print', '-', 'Data Printer', 'master/ms', 'tbl_m_printer', 36),
(43, 'transactionlblprod', 'transaction', 'lblprod', '-', 'Label Prod', 'master/ts', 'tbl_h_labelprod', 82),
(44, 'backup-', 'backup', '-', 'fa fa-hdd', 'Backup', '-', '-', 100),
(45, 'systembk', 'system', 'bk', '-', 'Conf Backup', 'master', 'tbl_conf_backup', 13),
(46, 'masterbs', 'master', 'bs', '-', 'Data Basepallet', 'master/ms', 'tbl_m_basepallet', 37),
(47, 'masterpt', 'master', 'pt', '-', 'Data PatternTruck', 'master/ms', 'tbl_m_patterntruck', 38),
(48, 'transactiontship', 'transaction', 'tship', '-', 'Temp. Shipping', 'master/ts', 'tbl_temp_shipping', 79),
(49, 'transactionhpso', 'transaction', 'hpso', '-', 'Problem AJS', 'master/ts', 'tbl_h_problemso', 81),
(50, 'masterboxp', 'master', 'boxp', '-', 'Box Picking', 'master/ms', 'tbl_m_boxpicking', 26),
(51, 'mastervboxpick', 'master', 'vboxpick', '-', 'View Box Picking', 'master/ms', 'tbl_view_box', 27),
(52, 'mastercontr', 'master', 'contr', '-', 'Controller picking', 'master/ms', 'tbl_m_controller', 29),
(53, 'transactionmispost', 'transaction', 'mispost', '-', 'History Mis Posting', 'master/ts', 'tbl_mis_posting', 74),
(54, 'mastersop', 'master', 'sop', '-', 'Data Image POS', 'master/ms', 'tbl_m_sop', 31),
(55, 'masterpickbig', 'master', 'pickbig', '-', 'Matrix PickingBig', 'master/ms', 'tbl_m_spsbig', 28),
(56, 'transactionrep', 'transaction', 'rep', '-', 'History Repair', 'master/ts', 'tbl_h_repair', 83),
(57, 'transactionplstr', 'transaction', 'plstr', '-', 'History PLC Storage', 'master/ts', 'tbl_plc_storage', 84),
(58, 'user-', 'user', '-', 'fas fa-table', 'Menu User', '-', '-', 75),
(59, 'userPrepare', 'user', 'Prepare', 'fa-box-open', 'Prepare', 'prepare', '-', 76),
(60, 'usercook', 'user', 'cook', 'fa-recycle', 'Cooking', 'cooking', '-', 77),
(61, 'userpack', 'user', 'pack', 'fa-shopping-cart', 'Packing', 'packing', '-', 78),
(62, 'userdelv', 'user', 'delv', 'fas fa-dolly', 'Delivery', 'delivery', '-', 79),
(63, 'userrec', 'user', 'rec', 'fa fa-search', 'Receiving', 'receiving', '-', 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu_user`
--

CREATE TABLE `tbl_menu_user` (
  `id` int(11) NOT NULL,
  `menuid` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `view_level` enum('yes','no') DEFAULT 'no',
  `add_level` enum('yes','no') DEFAULT 'no',
  `edit_level` enum('yes','no') DEFAULT 'no',
  `delete_level` enum('yes','no') DEFAULT 'no',
  `import_level` enum('yes','no') DEFAULT 'no',
  `print_level` enum('yes','no') DEFAULT 'no',
  `export_level` enum('yes','no') DEFAULT 'no',
  `del_all` enum('yes','no') DEFAULT NULL,
  `other_level` enum('yes','no') DEFAULT 'no',
  `field_level` text,
  `value_level` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu_user`
--

INSERT INTO `tbl_menu_user` (`id`, `menuid`, `username`, `view_level`, `add_level`, `edit_level`, `delete_level`, `import_level`, `print_level`, `export_level`, `del_all`, `other_level`, `field_level`, `value_level`) VALUES
(244, 'masterchild', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(3, 'transactionairbag', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(9, 'transactiontempplc', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(223, 'masterboxp', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(256, 'transactionhtight', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(15, 'transactiontposting', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(16, 'mastermatrixplc', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(279, 'userdelv', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(19, 'masterplc', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(253, 'masternut', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(21, 'transactionhisplc', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(22, 'transactionsoj', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(23, 'transactionhpickbig', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(25, 'transactionhc', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(27, 'transactionshipping', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(28, 'transactionhassy', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(29, 'mastermpicks', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(30, 'masterdocument', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(35, 'transactiontassy', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(36, 'transactionhpicksm', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(41, 'masterdelay', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(251, 'transactionconfmisp', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(44, 'masterspss', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(45, 'mastercustomer', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(227, 'mastercontr', 'admin', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', '', ''),
(48, 'masterline', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(50, 'planningord', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(51, 'transactiontpicksm', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(52, 'transactiontpickbig', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(53, 'planning-', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(56, 'masterseat', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(65, 'transactiondelay', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(66, 'transaction-', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(69, 'master-', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(70, 'systemuser', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', 'yes', '', ''),
(71, 'systemmenu', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', NULL, '', ''),
(72, 'systemlevel', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', NULL, '', ''),
(73, 'systemarea', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', NULL, '', ''),
(74, 'systemgroup', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', NULL, '', ''),
(75, 'systemtitle', 'imamrsi', 'yes', 'no', 'yes', 'no', 'no', 'no', 'yes', 'yes', NULL, '', ''),
(76, 'system-', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(281, 'userrec', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(282, 'userrec', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(245, 'transactionhpost', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(81, 'masterplcrepair', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(278, 'userpack', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(231, 'mastersop', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(248, 'transactionmispost', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(225, 'mastervboxpick', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(261, 'transactiontc', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(89, 'masterprint', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(259, 'transactionlblprod', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(92, 'backup-', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(274, 'userPrepare', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(95, 'systembk', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', '', ''),
(272, 'user-', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(98, 'masterbs', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(99, 'masterpt', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(100, 'transactiontship', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(263, 'transactionrep', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(111, 'transactionhpso', 'imamrsi', 'yes', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', NULL, NULL, NULL),
(112, 'system-', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(113, 'systemtitle', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(114, 'systemgroup', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(115, 'systemarea', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(116, 'systemlevel', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(117, 'systemmenu', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(118, 'systemuser', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', 'yes', '', ''),
(119, 'master-', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(122, 'transaction-', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(123, 'transactiondelay', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(132, 'masterseat', 'admin', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', '', ''),
(135, 'planning-', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(136, 'transactiontpickbig', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(137, 'transactiontpicksm', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(138, 'planningord', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', 'yes', '', ''),
(140, 'masterline', 'admin', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', '', ''),
(265, 'transactionplstr', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(228, 'mastercontr', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(143, 'mastercustomer', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(144, 'masterspss', 'admin', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', '', ''),
(266, 'transactionplstr', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(252, 'transactionconfmisp', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(147, 'masterdelay', 'admin', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', '', ''),
(152, 'transactionhpicksm', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(153, 'transactiontassy', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(158, 'masterdocument', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(159, 'mastermpicks', 'admin', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', '', ''),
(160, 'transactionhassy', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(161, 'transactionshipping', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(163, 'transactionhc', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(165, 'transactionhpickbig', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(166, 'transactionsoj', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(167, 'transactionhisplc', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(254, 'masternut', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(169, 'masterplc', 'admin', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', '', ''),
(280, 'userdelv', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(172, 'mastermatrixplc', 'admin', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', '', ''),
(173, 'transactiontposting', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(255, 'transactionhtight', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(224, 'masterboxp', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(179, 'transactiontempplc', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', '', ''),
(185, 'transactionairbag', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(246, 'transactionhpost', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(192, 'masterplcrepair', 'admin', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', '', ''),
(277, 'userpack', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(232, 'mastersop', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(247, 'transactionmispost', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(226, 'mastervboxpick', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(243, 'masterchild', 'admin', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', '', ''),
(262, 'transactiontc', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(200, 'masterprint', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(203, 'backup-', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(273, 'userPrepare', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(206, 'systembk', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(271, 'user-', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(209, 'masterbs', 'admin', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '', ''),
(210, 'masterpt', 'admin', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', '', ''),
(211, 'transactiontship', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(264, 'transactionrep', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(222, 'transactionhpso', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(276, 'usercook', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(275, 'usercook', 'admin', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(237, 'masterpickbig', 'admin', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', '', ''),
(238, 'masterpickbig', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL),
(260, 'transactionlblprod', 'imamrsi', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mis_posting`
--

CREATE TABLE `tbl_mis_posting` (
  `id` int(11) NOT NULL,
  `posting_date` datetime DEFAULT NULL,
  `category` varchar(15) DEFAULT NULL,
  `pos_posting` varchar(30) DEFAULT NULL,
  `true_child_part_no` varchar(30) DEFAULT NULL,
  `true_rack_no` varchar(30) DEFAULT NULL,
  `true_picking_no` int(4) DEFAULT NULL,
  `false_child_part_no` varchar(30) DEFAULT NULL,
  `false_rack_no` varchar(30) DEFAULT NULL,
  `false_picking_no` int(4) DEFAULT NULL,
  `leader_confirm` varchar(20) DEFAULT NULL,
  `problem` varchar(50) DEFAULT NULL,
  `problem_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mis_posting`
--

INSERT INTO `tbl_mis_posting` (`id`, `posting_date`, `category`, `pos_posting`, `true_child_part_no`, `true_rack_no`, `true_picking_no`, `false_child_part_no`, `false_rack_no`, `false_picking_no`, `leader_confirm`, `problem`, `problem_date`) VALUES
(2, '2023-05-12 15:13:47', 'Mis Posting', 'POSTING1_L6', '72265-BZ050', '1', 9, '73230-BZ510', '4', 10, 'Admin JSS', 'ABCD', '2024-07-29 11:00:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesan_andon`
--

CREATE TABLE `tbl_pesan_andon` (
  `id` int(11) NOT NULL,
  `andon` varchar(50) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pesan_andon`
--

INSERT INTO `tbl_pesan_andon` (`id`, `andon`, `pesan`) VALUES
(1, 'Assembly', 'LAKUKAN SPT (STOP-PANGGIL-TUNGGU) KETIKA TERJADI ABNORMAL PROSES - GENBA KAIZEN UNTUK MENINGKATKAN KUALITAS YANG LEBIH BAIK DEMI TERCAPAINYA KEPUASAN PELANGGAN'),
(2, 'Delivery', 'PASTIKAN GARANSI TIDAK SALAH SETTING DAN SALAH KIRIM'),
(3, 'Quality', 'UTAMAKAN (Q) QUALITY PRODUCT, (C) COST, (D) DELIVERY, (S) SAFETY, DAN (M) MORALE YANG TERBAIK DEMI KEMAJUAN FUJI SEAT AGAR TERCIPTA HIGH QUALITY PRODUCT AT COMPETITIVE PRICE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pos`
--

CREATE TABLE `tbl_pos` (
  `id` int(11) NOT NULL,
  `line_no` char(2) DEFAULT '1',
  `user_level` char(20) DEFAULT NULL,
  `pos_level` varchar(30) DEFAULT NULL,
  `pos_name` varchar(50) DEFAULT NULL,
  `lifting_order` enum('Asc','Desc') DEFAULT 'Asc',
  `qty_lifting` int(5) DEFAULT '1',
  `min` int(2) DEFAULT '1',
  `max` int(2) DEFAULT '1',
  `print` enum('No','Yes') NOT NULL DEFAULT 'No',
  `custome_variant` text,
  `remark` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `ip_no` varchar(30) DEFAULT NULL,
  `update_by` varchar(30) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pos`
--

INSERT INTO `tbl_pos` (`id`, `line_no`, `user_level`, `pos_level`, `pos_name`, `lifting_order`, `qty_lifting`, `min`, `max`, `print`, `custome_variant`, `remark`, `url`, `ip_no`, `update_by`, `update_time`) VALUES
(61, '7', 'QC', 'QC_CENTER_L7', 'QC CENTER FR LH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'qc_center', NULL, 'Admin JSS', '2024-08-04 08:20:42'),
(60, '7', 'QC', 'QC_START_L7', 'QC START FR LH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'qc_start', NULL, 'Admin JSS', '2024-08-04 07:49:13'),
(59, '6', 'QC', 'QC_CONF_L6', 'SEAT CONFIRMATION FR RH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'qc_conf', '127.0.0.24', 'Admin JSS', '2024-08-08 06:11:28'),
(58, '6', 'QC', 'QC_CENTER_L6', 'QC CENTER FR RH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'qc_center', '127.0.0.23', 'Admin JSS', '2024-08-06 06:53:05'),
(57, '6', 'QC', 'QC_START_L6', 'QC START FR RH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'qc_start', '127.0.0.22', 'Admin JSS', '2024-08-04 09:51:43'),
(56, '10', 'Packing', 'SEATBELT_L10', 'ASSY SEAT BELT RR2', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy', NULL, 'Admin JSS', '2024-07-23 06:08:10'),
(55, '9', 'Packing', 'SEATBELT_L9', 'ASSY SEAT BELT RR1 RH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy', NULL, 'Admin JSS', '2024-07-23 06:08:10'),
(54, '8', 'Packing', 'SEATBELT_L8', 'ASSY SEAT BELT RR1 LH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy', NULL, 'Admin JSS', '2024-07-23 06:08:10'),
(53, '7', 'Packing', 'SEATBELT_L7', 'ASSY SEAT BELT FR LH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy', NULL, 'Admin JSS', '2024-07-23 06:08:10'),
(52, '6', 'Packing', 'SEATBELT_L6', 'ASSY SEAT BELT FR RH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy', NULL, 'Admin JSS', '2024-07-23 06:08:10'),
(51, '10', 'Packing', 'ASSY_CENTER2_L10', 'ASSY CENTER 2 RR2', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy_center2', NULL, 'Admin JSS', '2024-08-04 07:48:51'),
(50, '10', 'Packing', 'ASSY_CENTER1_L10', 'ASSY CENTER 1 RR2', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy_center1', '127.0.0.19', 'Admin JSS', '2024-08-04 07:48:34'),
(49, '10', 'Packing', 'ASSY_START_L10', 'ASSY START RR2', 'Asc', 4, 1, 4, 'No', NULL, NULL, 'assy_start', NULL, 'Admin JSS', '2024-08-04 07:48:13'),
(48, '9', 'Packing', 'ASSY_CENTER2_L9', 'ASSY CENTER 2 RR1 LH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy_center2', NULL, 'Admin JSS', '2024-08-04 07:48:51'),
(47, '9', 'Packing', 'ASSY_CENTER1_L9', 'ASSY CENTER 1 RR1 LH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy_center1', NULL, 'Admin JSS', '2024-08-04 07:48:34'),
(46, '9', 'Packing', 'ASSY_START_L9', 'ASSY START RR1 LH', 'Asc', 4, 1, 4, 'No', NULL, NULL, 'assy_start', NULL, 'Admin JSS', '2024-08-04 07:48:13'),
(45, '8', 'Packing', 'ASSY_CENTER2_L8', 'ASSY CENTER 2 RR1 RH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy_center2', NULL, 'Admin JSS', '2024-08-04 07:48:51'),
(44, '8', 'Packing', 'ASSY_CENTER1_L8', 'ASSY CENTER 1 RR1 RH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy_center1', NULL, 'Admin JSS', '2024-08-04 07:48:34'),
(43, '8', 'Packing', 'ASSY_START_L8', 'ASSY START RR1 RH', 'Asc', 4, 1, 4, 'No', NULL, NULL, 'assy_start', NULL, 'Admin JSS', '2024-08-04 07:48:13'),
(42, '7', 'Packing', 'ASSY_CENTER2_L7', 'ASSY CENTER 2 FR LH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy_center2', NULL, 'Admin JSS', '2024-08-04 07:48:51'),
(41, '7', 'Packing', 'ASSY_CENTER1_L7', 'ASSY CENTER 1 FR LH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy_center1', NULL, 'Admin JSS', '2024-08-04 07:48:34'),
(40, '7', 'Packing', 'ASSY_START_L7', 'ASSY START FR LH', 'Asc', 4, 1, 4, 'No', NULL, NULL, 'assy_start', NULL, 'Admin JSS', '2024-08-04 07:48:13'),
(39, '6', 'Packing', 'ASSY_CENTER2_L6', 'ASSY CENTER 2 FR RH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy_center2', NULL, 'Admin JSS', '2024-08-04 07:48:51'),
(38, '6', 'Packing', 'ASSY_CENTER1_L6', 'ASSY CENTER 1 FR RH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'assy_center1', '127.0.0.20', 'Admin JSS', '2024-08-04 07:49:48'),
(37, '6', 'Packing', 'ASSY_START_L6', 'ASSY START FR RH', 'Asc', 4, 1, 4, 'No', NULL, NULL, 'assy_start', '127.0.0.17', 'Admin JSS', '2024-08-04 07:48:13'),
(36, '9', 'Cooking', 'SUB_ASSY1_L9', 'S/A JIG TRACK RR1 LH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'satrack', NULL, 'Admin JSS', '2024-07-22 11:57:18'),
(35, '8', 'Cooking', 'SUB_ASSY2_L8', 'S/A JIG TRACK RR1 RH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'satrack', NULL, 'Admin JSS', '2024-07-22 11:57:18'),
(34, '8', 'Cooking', 'SUB_ASSY1_L8', 'S/A JIG ARM REST RR1 RH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'saarm', NULL, 'Admin JSS', '2024-07-22 11:57:18'),
(33, '7', 'Cooking', 'SUB_ASSY5_L7', 'S/A JIG CEK FRAME FR LH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'saframe', NULL, 'Admin JSS', '2024-08-08 10:46:13'),
(32, '7', 'Cooking', 'SUB_ASSY4_L7', 'S/A JIG GABUNG FR LH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'sagabung', NULL, 'Admin JSS', '2024-07-22 11:57:18'),
(31, '7', 'Cooking', 'SUB_ASSY3_L7', 'S/A JIG TRACK FR LH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'satrack', NULL, 'Admin JSS', '2024-07-22 11:57:18'),
(30, '7', 'Cooking', 'SUB_ASSY2_L7', 'S/A JIG LINK FR LH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'salink', NULL, 'Admin JSS', '2024-07-22 11:57:18'),
(29, '7', 'Cooking', 'SUB_ASSY1_L7', 'S/A JIG SPRING FR LH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'saspring', NULL, 'Admin JSS', '2024-07-22 11:57:18'),
(28, '6', 'Cooking', 'SUB_ASSY5_L6', 'S/A JIG CEK FRAME FR RH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'saframe', NULL, 'Admin JSS', '2024-08-08 10:46:13'),
(27, '6', 'Cooking', 'SUB_ASSY4_L6', 'S/A JIG GABUNG FR RH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'sagabung', NULL, 'Admin JSS', '2024-07-22 11:57:18'),
(26, '6', 'Cooking', 'SUB_ASSY3_L6', 'S/A JIG TRACK FR RH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'satrack', NULL, 'Admin JSS', '2024-07-22 11:57:18'),
(25, '6', 'Cooking', 'SUB_ASSY2_L6', 'S/A JIG LINK FR RH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'salink', '127.0.0.25', 'Admin JSS', '2024-08-12 05:07:47'),
(24, '6', 'Cooking', 'SUB_ASSY1_L6', 'S/A JIG SPRING FR RH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'saspring', '127.0.0.18', 'Admin JSS', '2024-07-24 12:12:12'),
(23, '10', 'Prepare', 'BIG4_L10', 'JUNDATE RR2 #4 SETTING C-RING C/CUSH', 'Asc', 4, 1, 4, 'No', NULL, NULL, 'spsBig', NULL, 'Admin JSS', '2024-07-10 08:32:50'),
(22, '10', 'Prepare', 'BIG3_L10', 'JUNDATE RR2 #3 SETTING C-RING C/BACK', 'Asc', 4, 1, 4, 'No', NULL, NULL, 'spsBig', NULL, 'Admin JSS', '2024-07-10 08:32:50'),
(21, '10', 'Prepare', 'BIG2_L10', 'JUNDATE RR2 #2 SETTING FRAME CUSH', 'Asc', 4, 1, 4, 'No', NULL, NULL, 'spsBig', NULL, 'Admin JSS', '2024-07-10 08:32:50'),
(20, '10', 'Prepare', 'BIG1_L10', 'JUNDATE RR2 #1 SETTING FRAME BACK', 'Asc', 4, 1, 4, 'No', NULL, NULL, 'spsBig', NULL, 'Admin JSS', '2024-07-10 08:32:50'),
(19, '9', 'Prepare', 'BIG3_L9', 'JUNDATE RR1 RH #3 SETTING ARM', 'Asc', 4, 1, 4, 'Yes', NULL, NULL, 'spsBig', NULL, 'Admin JSS', '2024-07-10 08:32:50'),
(18, '9', 'Prepare', 'BIG2_L9', 'JUNDATE RR1 RH #2 SETTING CUSH', 'Asc', 4, 1, 4, 'Yes', NULL, NULL, 'spsBig', NULL, 'Admin JSS', '2024-07-10 08:32:50'),
(17, '9', 'Prepare', 'BIG1_L9', 'JUNDATE RR1 RH #1 SETTING BACK', 'Asc', 4, 1, 4, 'Yes', NULL, NULL, 'spsBig', NULL, 'Admin JSS', '2024-07-10 08:32:50'),
(16, '8', 'Prepare', 'BIG2_L8', 'JUNDATE RR1 LH #2 SETTING CUSH', 'Asc', 4, 1, 4, 'Yes', NULL, NULL, 'spsBig', NULL, 'Admin JSS', '2024-07-10 08:32:50'),
(15, '8', 'Prepare', 'BIG1_L8', 'JUNDATE RR1 LH #1 SETTING BACK', 'Asc', 4, 1, 4, 'Yes', NULL, NULL, 'spsBig', NULL, 'Admin JSS', '2024-07-10 08:32:50'),
(14, '7', 'Prepare', 'BIG2_L7', 'JUNDATE FR LH #2 FRAME + TRACK', 'Asc', 4, 1, 4, 'Yes', NULL, NULL, 'spsBig', '127.0.0.13', 'Admin JSS', '2024-07-21 09:47:15'),
(13, '7', 'Prepare', 'BIG1_L7', 'JUNDATE FR LH #1 PAD + COVER', 'Asc', 4, 1, 4, 'Yes', NULL, NULL, 'spsBig', NULL, 'Admin JSS', '2024-07-10 08:32:50'),
(12, '6', 'Prepare', 'BIG2_L6', 'JUNDATE FR RH #2 FRAME + TRACK', 'Asc', 4, 1, 4, 'Yes', NULL, NULL, 'spsBig', NULL, 'Admin JSS', '2024-07-10 08:32:50'),
(11, '6', 'Prepare', 'BIG1_L6', 'JUNDATE FR RH #1 PAD + COVER', 'Asc', 4, 1, 4, 'Yes', NULL, NULL, 'spsBig', '127.0.0.10', 'Admin JSS', '2024-07-21 09:45:52'),
(10, '10', 'Prepare', 'POSTING1_L10', 'POSTING SMALL RR2 BENCH', 'Asc', 1, 1, 1, 'Yes', NULL, NULL, 'posting', NULL, 'Admin JSS', '2024-07-28 06:17:34'),
(9, '9', 'Prepare', 'POSTING1_L9', 'POSTING SMALL RR1 RH', 'Asc', 1, 1, 1, 'Yes', NULL, NULL, 'posting', NULL, 'Admin JSS', '2024-07-28 06:17:34'),
(8, '8', 'Prepare', 'POSTING1_L8', 'POSTING SMALL RR1 LH', 'Asc', 1, 1, 1, 'Yes', NULL, NULL, 'posting', NULL, 'Admin JSS', '2024-07-28 06:17:34'),
(7, '7', 'Prepare', 'POSTING1_L7', 'POSTING SMALL  FRONT LH', 'Asc', 1, 1, 1, 'Yes', NULL, NULL, 'posting', NULL, 'Admin JSS', '2024-07-28 06:17:34'),
(6, '6', 'Prepare', 'POSTING1_L6', 'POSTING SMALL FRONT RH', 'Asc', 1, 1, 1, 'Yes', NULL, NULL, 'posting', '127.0.0.14', 'Admin JSS', '2024-07-29 11:14:15'),
(5, '10', 'Prepare', 'SMALL1_L10', 'PICKING  SMALL RR2 BENCH', 'Asc', 1, 1, 1, 'Yes', NULL, NULL, 'spssmall', NULL, 'Admin JSS', '2024-07-15 10:33:12'),
(4, '9', 'Prepare', 'SMALL1_L9', 'PICKING  SMALL RR1 RH', 'Asc', 1, 1, 1, 'Yes', NULL, NULL, 'spssmall', NULL, 'Admin JSS', '2024-07-15 10:33:12'),
(3, '8', 'Prepare', 'SMALL1_L8', 'PICKING SMALL RR1 LH', 'Asc', 1, 1, 1, 'Yes', NULL, NULL, 'spssmall', NULL, 'Admin JSS', '2024-07-15 10:33:12'),
(2, '7', 'Prepare', 'SMALL1_L7', 'PICKING  SMALL FRONT LH', 'Asc', 1, 1, 1, 'Yes', 'variant1=xx|variant2=xxx', NULL, 'spssmall', NULL, 'Admin JSS', '2024-07-15 10:33:12'),
(1, '6', 'Prepare', 'SMALL1_L6', 'PICKING SMALL FRONT RH', 'Asc', 1, 1, 1, 'Yes', 'cutome variant ext', NULL, 'spssmall', '127.0.0.12', 'Admin JSS', '2024-07-19 06:59:33'),
(62, '7', 'QC', 'QC_CONF_L7', 'SEAT CONFIRMASTION FR LH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'qc_conf', NULL, 'Admin JSS', '2024-08-05 07:24:18'),
(63, '8', 'QC', 'QC_START_L8', 'QC START RR1 RH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'qc_start', NULL, 'Admin JSS', '2024-08-04 07:49:13'),
(64, '8', 'QC', 'QC_CENTER_L8', 'QC CENTER RR1 RH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'qc_center', NULL, 'Admin JSS', '2024-08-04 08:20:42'),
(65, '8', 'QC', 'QC_CONF_L8', 'SEAT CONFIRMASTION RR1 RH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'qc_conf', NULL, 'Admin JSS', '2024-08-05 07:24:18'),
(66, '9', 'QC', 'QC_START_L9', 'QC START RR1 LH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'qc_start', '127.0.0.21', 'Admin JSS', '2024-08-04 08:19:55'),
(67, '9', 'QC', 'QC_CENTER_L9', 'QC CENTER RR1 LH', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'qc_center', NULL, 'Admin JSS', '2024-08-04 08:20:42'),
(68, '9', 'QC', 'QC_CONF_L9', 'SEAT CONFIRMASTION RR1 LH', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'qc_conf', NULL, 'Admin JSS', '2024-08-05 07:24:18'),
(69, '10', 'QC', 'QC_START_L10', 'QC START RR2', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'qc_start', NULL, 'Admin JSS', '2024-08-04 07:49:13'),
(70, '10', 'QC', 'QC_CENTER_L10', 'QC CENTER RR2', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'qc_center', NULL, 'Admin JSS', '2024-08-04 08:20:42'),
(71, '10', 'QC', 'QC_CONF_L10', 'SEAT CONFIRMASTION RR2', 'Asc', 2, 1, 2, 'No', NULL, NULL, 'qc_conf', NULL, 'Admin JSS', '2024-08-05 07:24:18'),
(72, '6', 'Repair', 'PROCESS_RM', 'PROCES REPAIR', 'Asc', 1, 1, 1, 'Yes', NULL, NULL, 'repair', NULL, 'Admin JSS', '2024-08-10 07:55:26'),
(73, '6', 'Repair', 'QC_RM', 'QUALITY RM', 'Asc', 1, 1, 1, 'Yes', NULL, NULL, 'repair', NULL, 'Admin JSS', '2024-08-10 07:55:57'),
(74, '6', 'Repair', 'CONF_RM', 'SCAN CONFIRMATION RM', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'repair', '127.0.0.112', 'Admin JSS', '2024-08-23 15:38:29'),
(75, '6', 'Receiving', 'COKOTEI', 'ANDON COKOTEI', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'cokotei', NULL, 'Admin JSS', '2024-07-22 07:09:43'),
(76, '6', 'Delivery', 'DOKATEI', 'ANDON DOKATEI', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'dokotei', NULL, 'Admin JSS', '2024-07-22 07:07:46'),
(77, '6', 'Delivery', 'DELIVERY', 'MONITORING DELIVERY', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'delivery', NULL, 'Admin JSS', '2024-07-22 07:09:03'),
(78, '6', 'Andon', 'EFFGLOBAL', 'ANDON PROCESS EFFICINCY', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'andon/andonglobal', '127.0.0.1', 'Admin JSS', '2024-08-23 15:38:46'),
(79, '6', 'Andon', 'EFF6', 'ANDON EFFICIENCY LINE 6', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'andon/effline/6', NULL, 'Admin JSS', '2024-08-23 15:37:32'),
(80, '7', 'Andon', 'EFF7', 'ANDON EFFICIENCY LINE 7', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'andon/effline/7', NULL, 'Admin JSS', '2024-08-23 15:37:43'),
(81, '8', 'Andon', 'EFF8', 'ANDON EFFICIENCY LINE 8', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'andon/effline/8', NULL, 'Admin JSS', '2024-08-23 15:37:51'),
(82, '9', 'Andon', 'EFF9', 'ANDON EFFICIENCY LINE 9', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'andon/effline/9', NULL, 'Admin JSS', '2024-08-23 15:37:57'),
(83, '10', 'Andon', 'EFF10', 'ANDON EFFICIENCY LINE 10', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'andon/effline/10', NULL, 'Admin JSS', '2024-08-23 15:38:06'),
(84, '6', 'AJS', 'AJS', 'AUTO DATA SLIPORDER FROM AJS', 'Asc', 1, 1, 1, 'No', NULL, NULL, 'ajs', '127.0.0.15', 'Admin JSS', '2024-07-28 06:13:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rest_time`
--

CREATE TABLE `tbl_rest_time` (
  `id` int(11) NOT NULL,
  `day` char(10) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `start` time NOT NULL,
  `finish` time NOT NULL,
  `durasi` int(11) NOT NULL,
  `update_by` varchar(30) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rest_time`
--

INSERT INTO `tbl_rest_time` (`id`, `day`, `shift`, `start`, `finish`, `durasi`, `update_by`, `update_time`) VALUES
(1, 'Monday', 'Day', '11:50:00', '12:15:00', 25, 'Admin JSS', '2024-07-29 11:36:56'),
(2, 'Monday', 'Night', '00:00:00', '00:50:00', 50, NULL, NULL),
(3, 'Tuesday', 'Day', '09:55:00', '10:03:00', 8, 'Admin JSS', '2024-07-30 08:33:14'),
(4, 'Tuesday', 'Day', '11:50:00', '12:33:00', 43, NULL, NULL),
(5, 'Tuesday', 'Night', '00:00:00', '00:08:00', 8, NULL, NULL),
(6, 'Wednesday', 'Night', '00:00:00', '00:08:00', 8, NULL, NULL),
(7, 'Wednesday', 'Day', '11:50:00', '12:33:00', 43, NULL, NULL),
(8, 'Thursday', 'Night', '00:00:00', '00:08:00', 8, NULL, NULL),
(9, 'Thursday', 'Day', '11:50:00', '12:33:00', 43, NULL, NULL),
(10, 'Friday', 'Day', '11:45:00', '12:43:00', 58, NULL, NULL),
(11, 'Friday', 'Night', '00:00:00', '00:08:00', 8, NULL, NULL),
(12, 'Monday', 'Day', '14:05:00', '14:13:00', 8, NULL, NULL),
(13, 'Saturday', 'Day', '11:50:00', '12:33:00', 43, NULL, NULL),
(14, 'Sunday', 'Day', '11:50:00', '12:33:00', 43, NULL, NULL),
(15, 'Sunday', 'Night', '00:00:00', '00:08:00', 8, NULL, NULL),
(16, 'Wednesday', 'Day', '09:00:00', '09:10:00', 10, NULL, NULL),
(17, 'Friday', 'Day', '17:45:00', '18:28:00', 43, NULL, NULL),
(18, 'Monday', 'Night', '02:00:00', '02:08:00', 8, NULL, NULL),
(19, 'Wednesday', 'Night', '02:00:00', '02:08:00', 8, NULL, NULL),
(20, 'Thursday', 'Day', '09:55:00', '10:03:00', 8, NULL, NULL),
(21, 'Thursday', 'Day', '14:05:00', '14:13:00', 8, NULL, NULL),
(22, 'Sunday', 'Day', '09:55:00', '10:03:00', 8, NULL, NULL),
(23, 'Tuesday', 'Night', '02:00:00', '02:08:00', 8, NULL, NULL),
(24, 'Thursday', 'Night', '02:00:00', '02:08:00', 8, NULL, NULL),
(25, 'Friday', 'Day', '09:55:00', '10:03:00', 8, NULL, NULL),
(26, 'Friday', 'Day', '14:30:00', '14:38:00', 8, NULL, NULL),
(27, 'Friday', 'Night', '02:00:00', '02:08:00', 8, NULL, NULL),
(28, 'Saturday', 'Day', '09:55:00', '10:03:00', 8, NULL, NULL),
(29, 'Saturday', 'Day', '14:05:00', '14:13:00', 8, NULL, NULL),
(30, 'Saturday', 'Night', '00:00:00', '00:08:00', 8, NULL, NULL),
(31, 'Saturday', 'Night', '02:00:00', '02:08:00', 8, NULL, NULL),
(32, 'Sunday', 'Day', '14:05:00', '14:13:00', 8, NULL, NULL),
(33, 'Sunday', 'Night', '02:00:00', '02:08:00', 8, NULL, NULL),
(34, 'Monday', 'Day', '17:45:00', '18:28:00', 43, NULL, NULL),
(35, 'Tuesday', 'Day', '17:45:00', '18:28:00', 43, NULL, NULL),
(36, 'Wednesday', 'Day', '17:45:00', '18:28:00', 43, NULL, NULL),
(37, 'Thursday', 'Day', '17:45:00', '18:28:00', 43, NULL, NULL),
(38, 'Saturday', 'Day', '17:45:00', '18:28:00', 43, NULL, NULL),
(39, 'Monday', 'Day', '09:55:00', '10:03:00', 8, NULL, NULL),
(40, 'Monday', 'Day', '16:05:00', '16:13:00', 8, NULL, NULL),
(41, 'Monday', 'Night', '04:00:00', '04:58:00', 58, NULL, NULL),
(42, 'Tuesday', 'Day', '14:05:00', '14:13:00', 8, NULL, NULL),
(43, 'Tuesday', 'Day', '16:05:00', '16:13:00', 8, NULL, NULL),
(44, 'Wednesday', 'Day', '14:05:00', '14:13:00', 8, NULL, NULL),
(45, 'Tuesday', 'Night', '04:00:00', '04:58:00', 58, NULL, NULL),
(46, 'Wednesday', 'Day', '16:15:00', '16:28:00', 13, NULL, NULL),
(47, 'Wednesday', 'Night', '04:00:00', '04:58:00', 58, NULL, NULL),
(48, 'Thursday', 'Night', '04:00:00', '04:58:00', 58, NULL, NULL),
(49, 'Friday', 'Night', '04:00:00', '04:58:00', 58, NULL, NULL),
(50, 'Saturday', 'Night', '04:00:00', '04:58:00', 58, NULL, NULL),
(51, 'Sunday', 'Night', '04:00:00', '04:58:00', 58, NULL, NULL),
(52, 'Thursday', 'Day', '16:05:00', '16:13:00', 8, NULL, NULL),
(53, 'Saturday', 'Day', '16:05:00', '16:13:00', 8, NULL, NULL),
(54, 'Sunday', 'Day', '16:05:00', '16:13:00', 8, NULL, NULL),
(55, 'Sunday', 'Day', '17:45:00', '18:28:00', 43, NULL, NULL),
(56, 'Friday', 'Day', '16:30:00', '16:43:00', 13, NULL, NULL),
(57, 'Thursday', 'Night', '22:00:00', '22:20:00', 20, NULL, NULL),
(58, 'Sunday', 'Night', '22:00:00', '22:03:00', 3, 'Admin JSS', '2024-08-04 22:02:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_shift`
--

CREATE TABLE `tbl_shift` (
  `id` int(11) NOT NULL,
  `shift` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_shift`
--

INSERT INTO `tbl_shift` (`id`, `shift`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_title`
--

CREATE TABLE `tbl_title` (
  `id` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `detail` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `address` text,
  `tlp` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `version` varchar(15) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `image` varchar(15) NOT NULL,
  `bg` varchar(15) DEFAULT NULL,
  `thema` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_title`
--

INSERT INTO `tbl_title` (`id`, `title`, `detail`, `owner`, `address`, `tlp`, `email`, `version`, `year`, `image`, `bg`, `thema`) VALUES
(1, 'SIMAGIZ', 'Sistem Informasi Makan Bergizi', 'Simagiz Indonesia', 'Jakarta', '(021) 123456', 'admin@simagiz.co.id', '1.0.0.0', 2024, '6', '8', 'success');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nik` int(11) NOT NULL,
  `shift` char(10) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL,
  `user_level` char(20) NOT NULL,
  `user_area` char(20) NOT NULL,
  `user_group` char(20) NOT NULL,
  `registrasi` datetime DEFAULT NULL,
  `log_in` datetime NOT NULL,
  `log_out` datetime NOT NULL,
  `idcard` varchar(100) NOT NULL,
  `status` enum('Active','Non Active') NOT NULL DEFAULT 'Active',
  `update_by` varchar(30) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `nama`, `nik`, `shift`, `image`, `user_level`, `user_area`, `user_group`, `registrasi`, `log_in`, `log_out`, `idcard`, `status`, `update_by`, `update_time`) VALUES
(1, 'admin', '4c05853cea0412cf0665bea843ea22e330d', 'Admin Simagiz', 2222, 'N', '1', 'Administrator', 'Admin', 'Admin', '2024-05-30 08:32:13', '2024-08-30 14:31:10', '2024-08-30 14:23:00', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Active', 'Admin SIMAGIZ', '2024-08-30 14:47:55'),
(2, 'imamrsi', '8ace4af8d9b2aadf103a7443a5bc24cd04d', 'Imam RSI', 11111, 'A', '2', 'Administrator', 'Admin', 'Admin', '2024-05-30 05:02:42', '2024-05-30 08:30:36', '2024-05-30 08:32:16', '02111919661f4ca56ecb55020b6c1f266c4fdd30', 'Active', 'Admin JSS', '2024-08-30 14:18:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_working_time`
--

CREATE TABLE `tbl_working_time` (
  `id` int(11) NOT NULL,
  `day` char(10) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `start` time NOT NULL,
  `finish` time NOT NULL,
  `update_by` varchar(30) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_working_time`
--

INSERT INTO `tbl_working_time` (`id`, `day`, `shift`, `start`, `finish`, `update_by`, `update_time`) VALUES
(1, 'Monday', 'Day', '07:20:00', '16:15:00', 'Admin JSS', '2024-06-30 06:44:38'),
(2, 'Monday', 'Night', '21:05:00', '04:45:00', NULL, NULL),
(3, 'Tuesday', 'Day', '07:20:00', '16:15:00', 'Admin JSS', '2024-07-30 08:31:51'),
(4, 'Tuesday', 'Night', '21:05:00', '04:45:00', NULL, NULL),
(5, 'Wednesday', 'Day', '07:20:00', '16:15:00', NULL, NULL),
(6, 'Wednesday', 'Night', '21:05:00', '04:45:00', NULL, NULL),
(7, 'Thursday', 'Day', '07:20:00', '16:15:00', NULL, NULL),
(8, 'Thursday', 'Night', '21:05:00', '04:30:00', NULL, NULL),
(9, 'Friday', 'Day', '07:20:00', '16:35:00', NULL, NULL),
(10, 'Friday', 'Night', '20:30:00', '04:30:00', NULL, NULL),
(11, 'Saturday', 'Day', '07:20:00', '16:15:00', NULL, NULL),
(12, 'Saturday', 'Night', '21:05:00', '04:45:00', NULL, NULL),
(13, 'Sunday', 'Day', '07:20:00', '16:15:00', NULL, NULL),
(14, 'Sunday', 'Night', '21:05:00', '04:45:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `u_a`
--

CREATE TABLE `u_a` (
  `ip_no` varchar(20) NOT NULL,
  `idcard` varchar(200) NOT NULL,
  `id_t` varchar(200) NOT NULL,
  `id_s` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `u_a`
--

INSERT INTO `u_a` (`ip_no`, `idcard`, `id_t`, `id_s`, `datetime`) VALUES
('::1', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'f87029cffddb746a5cff1455197218071d4b17e5', 'da99be07df56d079791a2f532a1943f923ff22e4', '2024-08-30 07:31:10'),
('::1', '77f0dc34eb53c77ac74f359def94bcab7138398a', '3db32da2f06a861cb28356543b167e04be83ae96', '37b77fb31fd16b9eaa0fffb629f4dd6f8e820742', '2024-05-16 04:46:34');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `working_time`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `working_time` (
`id` int(11)
,`line_no` int(2)
,`day` char(10)
,`shift` varchar(10)
,`start` time
,`finish` time
);

-- --------------------------------------------------------

--
-- Struktur untuk view `working_time`
--
DROP TABLE IF EXISTS `working_time`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `working_time`  AS  select `a`.`id` AS `id`,`b`.`line_no` AS `line_no`,`a`.`day` AS `day`,`a`.`shift` AS `shift`,if((`a`.`shift` = 'Day'),cast((`a`.`start` + interval -(`b`.`ot_day_awal`) minute) as time),cast((`a`.`start` + interval -(`b`.`ot_night_awal`) minute) as time)) AS `start`,if((`a`.`shift` = 'Day'),cast((`a`.`finish` + interval `b`.`ot_day_akhir` minute) as time),cast((`a`.`finish` + interval `b`.`ot_night_akhir` minute) as time)) AS `finish` from (`jsssc`.`tbl_working_time` `a` join `jsssc`.`tbl_m_line` `b`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_cooking`
--
ALTER TABLE `data_cooking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_delivery`
--
ALTER TABLE `data_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_order`
--
ALTER TABLE `data_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_sekolah` (`kode_sekolah`);

--
-- Indeks untuk tabel `data_prepare`
--
ALTER TABLE `data_prepare`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_dapur`
--
ALTER TABLE `master_dapur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_dapur` (`kode_dapur`);

--
-- Indeks untuk tabel `master_data_sekolah`
--
ALTER TABLE `master_data_sekolah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_sekolah` (`kode_sekolah`);

--
-- Indeks untuk tabel `master_matrix_menu`
--
ALTER TABLE `master_matrix_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_paket` (`kode_paket`),
  ADD UNIQUE KEY `kode_menu` (`kode_menu`);

--
-- Indeks untuk tabel `master_menu_makanan`
--
ALTER TABLE `master_menu_makanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_menu` (`kode_menu`);

--
-- Indeks untuk tabel `master_paket_makanan`
--
ALTER TABLE `master_paket_makanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_paket` (`kode_paket`);

--
-- Indeks untuk tabel `master_resep_makanan`
--
ALTER TABLE `master_resep_makanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_menu` (`kode_menu`);

--
-- Indeks untuk tabel `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_area` (`user_area`);

--
-- Indeks untuk tabel `tbl_conf_backup`
--
ALTER TABLE `tbl_conf_backup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tabel_name` (`tabel_name`);

--
-- Indeks untuk tabel `tbl_day`
--
ALTER TABLE `tbl_day`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_group` (`user_group`);

--
-- Indeks untuk tabel `tbl_konversi_bulan`
--
ALTER TABLE `tbl_konversi_bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_level` (`user_level`);

--
-- Indeks untuk tabel `tbl_logdate`
--
ALTER TABLE `tbl_logdate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action` (`action`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menuid` (`menuid`);

--
-- Indeks untuk tabel `tbl_menu_user`
--
ALTER TABLE `tbl_menu_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menuid` (`menuid`,`username`),
  ADD KEY `view_level` (`view_level`),
  ADD KEY `username` (`username`),
  ADD KEY `menuid_2` (`menuid`);

--
-- Indeks untuk tabel `tbl_mis_posting`
--
ALTER TABLE `tbl_mis_posting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `true_part_no` (`true_child_part_no`),
  ADD KEY `posting_date` (`posting_date`);

--
-- Indeks untuk tabel `tbl_pesan_andon`
--
ALTER TABLE `tbl_pesan_andon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pos`
--
ALTER TABLE `tbl_pos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip_no` (`ip_no`),
  ADD KEY `line_no` (`line_no`),
  ADD KEY `user_level` (`user_level`),
  ADD KEY `pos_level` (`pos_level`) USING BTREE;

--
-- Indeks untuk tabel `tbl_rest_time`
--
ALTER TABLE `tbl_rest_time`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `day` (`day`,`shift`,`start`),
  ADD KEY `finish` (`finish`);

--
-- Indeks untuk tabel `tbl_shift`
--
ALTER TABLE `tbl_shift`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shift` (`shift`);

--
-- Indeks untuk tabel `tbl_title`
--
ALTER TABLE `tbl_title`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `idcard` (`idcard`);

--
-- Indeks untuk tabel `tbl_working_time`
--
ALTER TABLE `tbl_working_time`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `day` (`day`,`shift`),
  ADD KEY `start` (`start`),
  ADD KEY `finish` (`finish`);

--
-- Indeks untuk tabel `u_a`
--
ALTER TABLE `u_a`
  ADD UNIQUE KEY `id_s` (`id_s`),
  ADD UNIQUE KEY `idcard` (`idcard`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_cooking`
--
ALTER TABLE `data_cooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_delivery`
--
ALTER TABLE `data_delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_order`
--
ALTER TABLE `data_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_prepare`
--
ALTER TABLE `data_prepare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `master_dapur`
--
ALTER TABLE `master_dapur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_data_sekolah`
--
ALTER TABLE `master_data_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_matrix_menu`
--
ALTER TABLE `master_matrix_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_menu_makanan`
--
ALTER TABLE `master_menu_makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_paket_makanan`
--
ALTER TABLE `master_paket_makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_resep_makanan`
--
ALTER TABLE `master_resep_makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_conf_backup`
--
ALTER TABLE `tbl_conf_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_day`
--
ALTER TABLE `tbl_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_konversi_bulan`
--
ALTER TABLE `tbl_konversi_bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_logdate`
--
ALTER TABLE `tbl_logdate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2343;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu_user`
--
ALTER TABLE `tbl_menu_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT untuk tabel `tbl_mis_posting`
--
ALTER TABLE `tbl_mis_posting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pesan_andon`
--
ALTER TABLE `tbl_pesan_andon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_pos`
--
ALTER TABLE `tbl_pos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `tbl_rest_time`
--
ALTER TABLE `tbl_rest_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `tbl_shift`
--
ALTER TABLE `tbl_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_title`
--
ALTER TABLE `tbl_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_working_time`
--
ALTER TABLE `tbl_working_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
