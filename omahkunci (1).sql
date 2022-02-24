-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 08:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omahkunci`
--

-- --------------------------------------------------------

--
-- Table structure for table `cicilan`
--

CREATE TABLE `cicilan` (
  `id_cicilan` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `termin` int(11) NOT NULL,
  `nominal` bigint(11) DEFAULT NULL,
  `via` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kasir` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cicilan`
--

INSERT INTO `cicilan` (`id_cicilan`, `kode_transaksi`, `termin`, `nominal`, `via`, `id_kasir`, `created_at`, `updated_at`) VALUES
(1, '17', 1000000, NULL, '', 0, '2022-02-08 01:26:39', '2022-02-08 01:26:39'),
(2, '19', 100000, NULL, '', 0, '2022-02-08 01:33:08', '2022-02-08 01:33:08'),
(3, '20', 100000, NULL, '', 0, '2022-02-08 05:05:06', '2022-02-08 05:05:06'),
(4, '22', 100000000, NULL, '', 0, '2022-02-09 04:11:06', '2022-02-09 04:11:06'),
(5, '27', 100000000, NULL, '', 0, '2022-02-10 09:49:44', '2022-02-10 09:49:44'),
(6, '28', 1000000, NULL, '', 0, '2022-02-11 01:17:22', '2022-02-11 01:17:22'),
(7, '30', 1, 1000000, 'Langsung', 3, '2022-02-18 14:53:26', '2022-02-18 14:53:26'),
(8, '30', 1, 1000000, 'Langsung', 3, '2022-02-18 14:54:24', '2022-02-18 14:54:24'),
(9, '30', 2, NULL, NULL, NULL, '2022-02-18 14:54:24', '2022-02-18 14:54:24'),
(10, '30', 3, NULL, NULL, NULL, '2022-02-18 14:54:24', '2022-02-18 14:54:24'),
(11, '31', 1, 10000000, 'Via', 3, '2022-02-18 14:56:47', '2022-02-18 14:56:47'),
(12, '31', 2, NULL, NULL, NULL, '2022-02-18 14:56:47', '2022-02-18 14:56:47'),
(13, '31', 3, NULL, NULL, NULL, '2022-02-18 14:56:47', '2022-02-18 14:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `detail_stok`
--

CREATE TABLE `detail_stok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('keluar','masuk','penyesuaian') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_ag` bigint(20) NOT NULL,
  `status2` enum('terverifikasi','ditolak','menunggu') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_stok`
--

INSERT INTO `detail_stok` (`id`, `kode_produk`, `jumlah`, `status`, `keterangan`, `id_ag`, `status2`, `created_at`, `updated_at`) VALUES
(3, '10127004', 5, 'masuk', '5', 6, 'terverifikasi', '2022-02-22 08:06:00', NULL),
(4, '10101001', 1000000000, 'masuk', 'Membuat Mobil', 6, 'terverifikasi', '2022-02-23 07:05:00', NULL),
(5, '10101001', 10, 'masuk', 'Penyesuian', 6, 'terverifikasi', '2022-02-23 07:09:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_trans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `kode_trans`, `kode_produk`, `jumlah`, `potongan`, `created_at`, `updated_at`) VALUES
(23, '15', 'A5101', 4, 0, NULL, NULL),
(27, '18', 'A5101', 2, 0, NULL, NULL),
(28, '18', 'A5115', 1, 0, NULL, NULL),
(44, '26', 'A5602', 1, 0, NULL, NULL),
(50, '29', 'A5101', 1, 0, NULL, NULL),
(51, '29', 'A5115', 1, 0, NULL, NULL),
(52, '30', 'A5101', 1, 0, NULL, NULL),
(53, '30', 'A5115', 1, 0, NULL, NULL),
(63, '8', 'A5255', 10, 0, NULL, NULL),
(64, '8', 'A5115', 10, 0, NULL, NULL),
(65, '9', '10001010', 4, 0, NULL, NULL),
(69, '12', 'A5255', 10, 0, NULL, NULL),
(70, '12', '10102001', 5, 0, NULL, NULL),
(71, '13', '10104001', 5, 0, NULL, NULL),
(72, '13', '10105001', 5, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Gembok', NULL, NULL),
(2, 'Gagang Pintu', NULL, NULL),
(3, 'Kusen', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_02_02_014644_detail_transaksi', 2),
(5, '2022_02_02_015224_paket', 3),
(6, '2022_02_02_015516_transaksi', 4),
(7, '2022_02_02_025044_cicilan', 5),
(8, '2022_02_02_015742_create_produk_table', 6),
(9, '2022_02_02_015819_create_kategori_table', 6),
(10, '2022_02_02_015843_create_stok_table', 7),
(11, '2022_02_02_015905_create_detail_stok_table', 7),
(12, '2022_02_09_063356_nota_besar', 8),
(13, '2022_02_09_064816_nb_detail', 9),
(14, '2022_02_09_081448_rolehas', 9),
(15, '2022_02_09_082146_rolehas2', 10),
(16, '2022_02_09_085200_rhp', 11),
(17, '2022_02_10_045053_mhp', 12),
(18, '2022_02_11_071148_merek', 13),
(19, '2022_02_16_041033_create_permission_tabless', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 5),
(1, 'App\\User', 6),
(1, 'App\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `nb_detail`
--

CREATE TABLE `nb_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_nb` int(11) NOT NULL,
  `opsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nb_detail`
--

INSERT INTO `nb_detail` (`id`, `id_nb`, `opsi`, `judul`, `ket`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'Warna', 'Hijua', NULL, NULL),
(2, 2, '1', 'Warna', 'Hijua', NULL, NULL),
(3, 3, '1', 'Warna', 'Hijua', NULL, NULL),
(4, 4, '1', 'Warna', 'Warna', NULL, NULL),
(5, 4, '2', '2121', 'Warna', NULL, NULL),
(6, 5, '1', 'Warna', 'Warna', NULL, NULL),
(7, 5, '2', '2121', 'Warna', NULL, NULL),
(8, 6, '1', 'Warna', 'Warna', NULL, NULL),
(9, 6, '2', '2121', 'Warna', NULL, NULL),
(10, 7, '1', 'Warna', 'Warna', NULL, NULL),
(11, 8, '1', 'Warna', 'Warna', NULL, NULL),
(12, 9, '1', 'Warna', 'Warna', NULL, NULL),
(13, 10, '1', 'Warna', 'Warna', NULL, NULL),
(14, 11, '1', 'Warna', 'Warna', NULL, NULL),
(15, 12, '1', 'Warna', 'Warna', NULL, NULL),
(16, 13, '1', 'ukuran', '2x2', NULL, NULL),
(17, 14, '1', 'ukuran', '2x2', NULL, NULL),
(18, 15, '1', 'ukuran', '2x2', NULL, NULL),
(19, 16, '1', 'Warna', 'Warna', NULL, NULL),
(20, 17, '1', 'Warna', 'Warna', NULL, NULL),
(21, 18, '1', 'Warna', 'Warna', NULL, NULL),
(22, 19, '1', 'Ukuran', '1/1', NULL, NULL),
(23, 20, '1', 'Ukuran', '1/1', NULL, NULL),
(24, 21, '1', 'Ukuran', '1/1', NULL, NULL),
(25, 22, '1', 'Ukuran', '1x2', NULL, NULL),
(26, 23, '1', 'Ukuran', '1x2', NULL, NULL),
(27, 24, '1', 'Ukuran', '1x2', NULL, NULL),
(28, 25, '1', 'Ukuran', '2/1', NULL, NULL),
(29, 26, '1', 'Ukuran', '2/1', NULL, NULL),
(30, 27, '1', 'Ukuran', '2/1', NULL, NULL),
(31, 0, '1', 'Ukuran', '2/1', NULL, NULL),
(32, 28, '1', 'Warna', 'Warna', NULL, NULL),
(33, 29, '1', 'Warna', 'Warna', NULL, NULL),
(34, 30, '1', 'Warna', 'Warna', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nota_besar`
--

CREATE TABLE `nota_besar` (
  `id_transaksi` int(11) NOT NULL,
  `no_nota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `termin` int(11) NOT NULL,
  `ttd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `up` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us` int(10) DEFAULT NULL,
  `brp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('ready','menunggu','dibayar') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nota_besar`
--

INSERT INTO `nota_besar` (`id_transaksi`, `no_nota`, `termin`, `ttd`, `up`, `us`, `brp`, `gm`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, '2222020221211', 1, 'Bang Jojo', '10000000', 200000, 'transfer BCA', 'ghjhj', 1000, 'ready', NULL, NULL),
(2, '2222020221211', 2, 'Bang Jojo', '10000000', 200000, 'transfer BCA', 'ghjhj', 1000, 'dibayar', NULL, '2022-02-21 02:45:09'),
(3, '2222020221211', 3, 'Bang Jojo', '10000000', 1000000, 'yuyuyuyu', 'ghjhj', 1000, 'dibayar', NULL, '2022-02-23 05:16:34'),
(4, '2222020221214', 1, 'Bang Jojo', '10000000', 200000, 'transfer BCA', 'ghjhj', 10000000, 'dibayar', '2022-02-21 02:37:02', '2022-02-21 04:51:28'),
(5, '2222020221214', 2, 'Bang Jojo', '10000000', 200000, 'transfer BCA', 'ghjhj', 10000000, 'dibayar', '2022-02-21 02:37:02', '2022-02-21 07:28:05'),
(6, '2222020221214', 3, 'Bang Jojo', '10000000', 200000, 'transfer BCA', 'ghjhj', 10000000, 'ready', '2022-02-21 02:37:02', '2022-02-21 07:28:05'),
(7, '2222020221217', 1, 'Bang Jojo', '10000000', 200000, 'transfer BCA', 'ghjhj', 1000, 'ready', '2022-02-21 02:45:39', '2022-02-21 02:45:39'),
(8, '2222020221217', 2, 'Bang Jojo', '10000000', 200000, 'transfer BCA', 'ghjhj', 1000, 'dibayar', '2022-02-21 02:45:39', '2022-02-21 02:47:45'),
(9, '2222020221217', 3, 'Bang Jojo', '10000000', 200000, 'transfer BCA', 'ghjhj', 1000, 'dibayar', '2022-02-21 02:45:39', '2022-02-21 02:48:15'),
(10, '22220202212110', 1, 'Bang Nalsal', 'Membangun Dinasti Xin', 200000, 'transfer BCA', 'ghjhj', 10000000, 'dibayar', '2022-02-21 02:52:10', '2022-02-21 02:52:10'),
(11, '22220202212110', 2, 'Bang Nalsal', 'Membangun Dinasti Xin', 200000, 'transfer BCA', 'ghjhj', 10000000, 'dibayar', '2022-02-21 02:52:10', '2022-02-21 02:53:21'),
(12, '22220202212110', 3, 'Bang Nalsal', 'Membangun Dinasti Xin', 200000, 'transfer BCA', 'ghjhj', 10000000, 'dibayar', '2022-02-21 02:52:10', '2022-02-21 02:54:46'),
(13, '22220202212113', 1, 'Bang Jojo', 'Membangun Green House', 200000000, 'Mandiri', 'Pintu Otomatis', 1000000000, 'dibayar', '2022-02-21 05:10:46', '2022-02-21 05:10:46'),
(14, '22220202212113', 2, 'Bang Jojo', 'Membangun Green House', 200000, 'transfer BCA', 'Pintu Otomatis', 1000000000, 'dibayar', '2022-02-21 05:10:46', '2022-02-21 05:12:09'),
(15, '22220202212113', 3, 'Bang Jojo', 'Membangun Green House', 5000000, 'transfer BCA', 'Pintu Otomatis', 1000000000, 'dibayar', '2022-02-21 05:10:46', '2022-02-21 05:29:40'),
(16, '22220202232316', 1, 'Bang Jojo', '10000000', 200000, 'transfer BCA', 'ghjhj', 1000, 'dibayar', '2022-02-23 03:19:30', '2022-02-23 03:19:30'),
(17, '22220202232316', 2, 'Bang Jojo', '10000000', 200000, 'BCA', 'ghjhj', 1000, 'dibayar', '2022-02-23 03:19:30', '2022-02-23 03:24:17'),
(18, '22220202232316', 3, 'Bang Jojo', '10000000', NULL, NULL, 'ghjhj', 1000, 'ready', '2022-02-23 03:19:30', '2022-02-23 03:24:17'),
(19, '22220202232319', 1, 'Bang Sius', '10000000', 200000, 'transfer BCA', 'ghjhj', 1000, 'dibayar', '2022-02-23 03:30:36', '2022-02-23 03:30:36'),
(20, '22220202232319', 2, 'Bang Sius', '10000000', 200000, 'transfer BCA', 'ghjhj', 1000, 'dibayar', '2022-02-23 03:30:36', '2022-02-23 05:20:54'),
(21, '22220202232319', 3, 'Bang Sius', '10000000', NULL, NULL, 'ghjhj', 1000, 'ready', '2022-02-23 03:30:36', '2022-02-23 05:20:54'),
(22, '22220202232322', 1, 'Rangga', '10000000', 200000, 'transfer BCA', 'ghjhj', 1000, 'dibayar', '2022-02-23 03:31:56', '2022-02-23 03:31:56'),
(23, '22220202232322', 2, 'Rangga', '10000000', NULL, NULL, 'ghjhj', 1000, 'ready', '2022-02-23 03:31:56', '2022-02-23 03:31:56'),
(24, '22220202232322', 3, 'Rangga', '10000000', NULL, NULL, 'ghjhj', 1000, 'menunggu', '2022-02-23 03:31:56', '2022-02-23 03:31:56'),
(25, '22220202232325', 1, 'Ricardo Milos', 'Membangun', 200000, 'transfer BCA', 'Pak Haji', 5000000, 'dibayar', '2022-02-23 03:32:43', '2022-02-23 03:32:43'),
(26, '22220202232325', 2, 'Ricardo Milos', 'Membangun', 200000, '500000', 'Pak Haji', 5000000, 'dibayar', '2022-02-23 03:32:43', '2022-02-23 05:18:49'),
(27, '22220202232325', 3, 'Ricardo Milos', 'Membangun', 200000, 'transfer BCA', 'Pak Haji', 5000000, 'dibayar', '2022-02-23 03:32:43', '2022-02-23 05:20:15'),
(28, '2202022328', 1, 'Ricard', '10000000', 200000, 'transfer BCA', 'ghjhj', 1000, 'dibayar', '2022-02-23 05:23:29', '2022-02-23 05:23:29'),
(29, '2202022328', 2, 'Ricard', '10000000', NULL, NULL, 'ghjhj', 1000, 'ready', '2022-02-23 05:23:29', '2022-02-23 05:23:29'),
(30, '2202022328', 3, 'Ricard', '10000000', NULL, NULL, 'ghjhj', 1000, 'menunggu', '2022-02-23 05:23:29', '2022-02-23 05:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'managing', 'web', '2022-02-18 08:12:28', '2022-02-18 08:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_ct` int(11) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `stn` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama_produk`, `merk`, `id_kategori`, `id_ct`, `harga`, `stn`, `created_at`, `updated_at`) VALUES
('10101001', '6020 SN/GP', '555', '1', 1, 20000000, 'PCS', '2022-02-22 05:06:08', '2022-02-23 02:16:14'),
('10101002', '6020 BN/GP', 'AGNELLI', '1', 1, 500000, 'PS', '2022-02-22 05:06:08', '2022-02-23 02:16:26'),
('10101003', '7020 BN/GP', 'ALINEA', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10101004', '7080 SN/GP', 'ALINEA', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10102001', 'F 937-20 SN/NP', 'ARCHIE', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10103001', '68102 BN/GP.GP', 'BEST', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10104001', '07/026 NP/GP', 'CAESAR', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10105001', 'FA 20-567 PP+BODY CAVELL', 'CAVELL', '1', 1, 50000, 'SET', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10106001', 'LHP 965 36 CF', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10106002', 'LHP 11692 CF', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10106003', 'LHP 95580 CF', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10107001', 'LID (031) SN', 'FORME', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10108001', 'BMT 9178 396', 'GERBER', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10109001', '685 H85 BN/GP', 'MANDARIN', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10110001', '80128 PRG', 'MULLER', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10111001', '169.69 SN/GP', 'NIOBE', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10111002', '169.69 GP/BN', 'NIOBE', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10111003', '6020 BN/GP', 'NIOBE', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10111004', '9720 BN/GP', 'NIOBE', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10111005', '9780 SN/GP', 'NIOBE', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10112001', 'A5 522-203 MAB', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10112002', 'A5 522-231 SN/NP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10112003', '535-806 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10112004', '535-835 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10112005', '535-841 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10112006', '535-847 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:08', '2022-02-22 08:14:11'),
('10112007', '535-849 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10112008', 'ML 101 AL SN', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10112009', 'CLP 01 NAB', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10112010', 'CLP 02 NAB', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10112011', '535-881 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10112012', '535-867 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10112013', '535-868 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10112014', '535-503 SSP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10112015', 'CLP 21 NAB', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10112016', 'CLP 20 NAB', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10112017', 'CLP 22 NAB', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10112018', '535-504 SSP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10113001', '68012 PRG', 'TOOTI', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10114001', 'AMARIS ZA/AB', 'VANELLI', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10115001', '6028 BN/GP', 'VANESSA/VNS', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10116001', 'SUS 210P SN CH', 'ALBION', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10116002', 'SUS 214P SN', 'ALBION', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10116003', 'SUS 215P SN', 'ALBION', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10116004', 'H017 P11 SC', 'ALBION', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10116005', 'H017 P11 ABR', 'ALBION', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10117001', 'SET BISON SN CP', 'EXCEL', '1', 1, 50000, 'SET', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10118001', 'LHM 5056A WHT', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10118002', 'LHM 5056A SLV', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10119001', '911.03 SN/CP COMP', 'BRUNO', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10120001', 'SET ALM LHP 9022 WHITE', 'BRUNO', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10121001', '301.69 WHITE', 'KENZO', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10122001', 'SET 606.08 SS', 'SLG', '1', 1, 50000, 'SET', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10122002', 'SET 606.06 SS', 'SLG', '1', 1, 50000, 'SET', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10122003', 'SET 303.05 SS', 'SLG', '1', 1, 50000, 'SET', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10123001', 'SET HG 01 B-L-CP', 'HUGO', '1', 1, 50000, 'SET', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10123002', 'SET HG 01 L-CP', 'HUGO', '1', 1, 50000, 'SET', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10123003', 'SET HG 02 L-CP', 'HUGO', '1', 1, 50000, 'SET', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10124001', 'SET T3 PLAT 01', 'AGNELLI', '1', 1, 50000, 'SET', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10124002', 'SET T3 PLAT 03', 'AGNELLI', '1', 1, 50000, 'SET', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10125001', '88-2009 PS/SS 304', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10125002', '88-2025 SS/PS 304', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10126001', 'FE 412 MAB', 'BELLOCA', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10126002', 'FE 402 MAB', 'BELLOCA', '1', 1, 50000, 'PS', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10127001', 'SET LARGE BL004 BLACK', 'BLUMONT', '1', 1, 50000, 'SET', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10127002', 'SET SMALL BS 007 SN/NP', 'BLUMONT', '1', 1, 50000, 'SET', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10127003', 'SET BL 008 BLACK', 'BLUMONT', '1', 1, 50000, 'SET', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10127004', 'SET BL 009 BLACK', 'BLUMONT', '1', 1, 50000, 'SET', '2022-02-22 05:06:09', '2022-02-22 08:14:11'),
('10201001', 'Y 81105 AB', 'ALBION', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10201002', 'H017 RS001 SC', 'ALBION', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10202001', 'ASCOLLI ROSE SN/CP', 'AVICCI', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10203001', 'B 797 NB', 'BAUER', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10204001', 'ET 901 E01 DAB', 'BOLZANO', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10205001', 'FA 712-589 PP', 'CAVELL', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10205002', 'FA 712-593 PP+BODY CAVELL', 'CAVELL', '1', 1, 50000, 'SET', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10205003', 'FA 713-592 PP+BODY CAVELL', 'CAVELL', '1', 1, 50000, 'SET', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10205004', 'FA 712-591 PP+BODY CAVELL', 'CAVELL', '1', 1, 50000, 'SET', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10206001', 'LHR DKS 109-100-889 SN+NP', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10206002', 'LHTR 0017 SSS', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10206003', 'LHR 10681 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10206004', 'LHR 10632 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10206005', 'LHR 8288 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10206006', 'LHR 9818 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10206007', 'LHR 7580 CF', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10206008', 'LHR 8536 CF', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10206009', 'LHR 10693 CF', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10206010', 'LHR 81033 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10206011', 'LHR 8267 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10207001', '4003 SS', 'EGO', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10207002', 'L141-A13', 'EGO', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10208001', 'F02 BSN/BNP', 'F&F', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10208002', 'F04 BSN', 'F&F', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10208003', 'F05 BSN/BNP', 'F&F', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10208004', 'RA 06 BSN/BNP', 'F&F', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10209001', 'LIV (032) SN', 'FORME', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10210001', 'LHSR NEMO 113103320161 PB', 'ISEO', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10211001', 'AS 507C.66 SS', 'LINEACALLI', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10211002', 'AS 508B.18 SB/PB', 'LINEACALLI', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10212001', 'GA 8012 SS', 'MAVERIK', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10212002', 'MW/AMG 56319 SN/CP', 'MAVERIK', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10213001', '3040 YN/GP', 'MULLER', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10213002', '30176 SN/GP', 'MULLER', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10213003', '30184 YN/GP', 'MULLER', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10214001', 'LHM 0582 US32D', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10214002', 'LHM 0887 A US32D SN', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10214003', 'LHM 0764 US32D SN', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10214004', 'LHM 0889 A US32D SN', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10214005', 'LHSU 01002 US32D SN', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10214006', 'LHSU 01017 US32D  / LHM 0262 US32D', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10214007', 'LHM 0560 US32D', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10214008', 'LHM 0580 US32D', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10214009', 'LHM 0584 US32D', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10214010', 'LHM 0891 US32D', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10214011', 'LHM 5157A WHT', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10214012', 'LHM 5157A SLV', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10214013', 'LHM 5258A-BLK', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10215001', '2100 HP J60 AB', 'PRO', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216001', 'LH 084 SS KOTAK', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216002', 'LH 152 SN', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216003', 'AS 805.561 BSN', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216004', 'LH 192 SS', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216005', '808 SN/BSN', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216006', '814 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216007', '815 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216008', '820 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216009', '822 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216010', '832 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216011', '833 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216012', '834 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216013', '839 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216014', '841 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216015', '847 BSN', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216016', '857 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216017', '870 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216018', '871 SN/NP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216019', '2511 SN', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216020', '2512 SS/SP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216021', '2513 SN', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216022', '2514 SS/SP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216023', '2515 SS/SP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216024', 'AS 502M 186 SN/NP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216025', '501 BSN', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216026', 'C 02 SS/PS', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216027', 'C 05 SS/PS', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216028', 'C03 SS/PS', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216029', '901 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10216030', '903 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10217001', '4003 S10 BLACK', 'SOLIGEN', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10217002', 'B003-08 BLACK', 'SOLIGEN', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10217003', 'B003-14 BLACK', 'SOLIGEN', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10218001', 'CMH 061 SN', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10218002', 'STA S01 2009 PS/SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10218003', 'STA S01 2018 PS/SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10218004', 'STA S01 2023 PS/SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10218005', '091-A4 BLACK', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10218006', 'D108 A2 BLACK', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10218007', '811-812 BLACK ', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10218008', '118 SUS 304 SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10218009', '118 -304 BLACK', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10219001', 'HRE PISA AB', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10220001', 'SS 9162 SN', 'MILANO', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10220002', 'SS 9161 SN', 'MILANO', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10221001', '6016 SS', 'STRONG', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10221002', '6003 SS', 'STRONG', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10222001', 'ALUMINIUM AI SS', 'ORCHAD', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10222002', 'ALUMINIUM WHITE', 'ORCHAD', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10223001', 'SS 103 ALD', 'BELLOCA', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10223002', 'SS 105', 'BELLOCA', '1', 1, 50000, 'PS', '2022-02-22 05:14:52', '2022-02-22 08:14:11'),
('10301001', 'PGWH XMA 7024 B SS', 'ALMA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10301002', 'PGWH/LG A 7024 B SS', 'ALMA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10301003', 'PGWH XMA 7024 DSS', 'ALMA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10301004', 'PGWH XMA 7033 BSS', 'ALMA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10301005', 'PGWH/LG A 7033 BSS', 'ALMA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10301006', 'PGWH XMA 7033 DSS', 'ALMA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10301007', 'PGWH/LG A 7033 DSS', 'ALMA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10301008', 'PGWH/L100 A 7088 DSS ', 'ALMA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10303000', 'SS 235-450 SS', 'BERTOLLI', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 09:01:44'),
('10303001', 'DELUXE SQ PHDL 802 (30X15X600) SSS', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10303002', 'PHAP 25801 A SN', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10303003', 'DELUXE 802 32X457X350 PSS/SSS', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10303004', 'VNT PH2 V5511 FFX295X240 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10303005', 'PHZ V5569 25X390X250 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10303006', 'VNT DKA V81571 150X150X34.2 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10303007', 'VNT DKA V81590 150X150X29 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10303008', 'PHZ V5579L 32X820X600 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10303009', 'PHZ V55193 35X800X675 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10303010', 'PHZ V55177 32X595X410 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10303011', 'PHZ V55180 FFX445X400 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10303012', 'PHA D389 FFX378X346 MATT BLACK', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10303013', 'PHZ VKH06 FFX466X314 MAB', 'DEKKSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304001', 'P06.01 AB 40X350MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304002', 'P06.33 AB 420MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304003', 'P06.35 AB 420MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304004', 'P06.37 AB 420MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304005', 'P06.40 AB 420MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304006', 'P06.01 AB 40X600 MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304007', 'P06.30 AB 460 MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304008', 'P06.18 AB 1000 MM(OK)', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304009', 'P07.55 SSS + PSS 350 MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304010', 'P07.60 SSS + PSS 350 MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304011', 'P07.57 SSS + PSS 350 MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304012', 'P07.59 SSS + PSSS 350 MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304013', 'P06.09 AB 345 MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304014', 'P06.17 AB 300 MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304015', 'P06.36 AB 420 MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304016', 'P06.19 AB 1200 MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304017', 'PR 08.26 AB 60 CM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304018', 'PR 08.26 AB 100 CM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304019', 'P07.58 SSS+PSS 350MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304020', 'P07.61 SSS+PSS 350MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304021', 'P07.63 SSS+PSS 350MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304022', 'P02.01 PSS+SSS 350MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304023', 'PR 08.27 AB 60 CM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304024', 'P 07.27 SSS+PSS 600MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304025', 'P 07.09 SSS+PSS 450MM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304026', 'P 15.27 SS+WOOD 60CM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10304027', 'P 15.27 SS+WOOD 45CM', 'DUMONT', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10305001', 'MJA 1025-45MM', 'GERBER', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10306001', '45CM SN', 'KACA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10307001', 'KPK A 02.350MM SSS', 'KEMPINSKY', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10307002', 'P 025-30 CM', 'KEMPINSKY', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10308001', 'FM 76-1500MM SN', 'MAVERIK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309001', '550 KY 350', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309002', '550 KY 800', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309003', '550 KY 1000', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309004', '722 60CM BT SN', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309005', '804 60CM SN', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309006', '807 80CM SN', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309007', '807 100CM SN', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309008', 'PUSH PULL SN', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309009', 'HD 702 P60CM SN', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309010', 'HD 703 P45CM SN', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309011', 'HD 708 P120CM SS', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309012', 'HD GT 8700 P45CM SS', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309013', 'HD GT 8700 P60CM SS', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309014', 'KAYU 669 45CM OVAL', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309015', 'KAYU 669 80CM OVAL', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309016', '711-35CM SS/KY', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309017', '808-45CM SERAT KAYU', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309018', '808-60CM SERAT KAYU', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309019', 'MADEWA AB', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309020', '27 S BLACK 45 CM', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309021', '27 S BLACK 60 CM', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309022', '27 S BLACK 100 CM', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309023', '27 S WHITE 35 CM', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309024', '27 S WHITE 45 CM', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309025', '27 S WHITE 60 CM', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309026', '27 S WHITE 80 CM', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309027', '27 S WHITE 100 CM', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309028', 'DSQ 802', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309029', 'HD 799 SP SS/CP P.350', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309030', 'HD 799 SP SS/CP 450', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309031', 'HD 799 SP SS/CP 600', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309032', 'HD 708 NS SS/CP 600', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309033', 'HD 708 NS SS/CP 450', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309034', 'HD 707 COMBO BLACK / AB 350', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309035', 'HD 707 COMBO BLACK / AB 450', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309036', 'HD 707 COMBO BLACK / AB 600', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309037', 'HD SAPHIRA 799 SP SS / KY 350', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309038', 'HD SAPHIRA 799 SP SS / KY 450', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309039', 'HD SAPHIRA 799 SP SS / KY 600', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309040', 'HD 707 COMBO BLACK / AB 800', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309041', 'HD 707 COMBO BLACK / AB 1000', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309042', 'PR 08.12 AB M 42 CM (Dumont)', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309043', '4X2-50X35 SS', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309044', '32-50X35 SS', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309045', 'HD MAHKOTA P800MM', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309046', 'HD MAHKOTA P600MM', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309047', 'HD 805 SS BLACK 1000MM', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309048', 'HD 805 SS BLACK 800MM', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309049', 'HD 805 SS BLACK 600MM', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309050', 'HD 805 SS BLACK 450MM', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10309051', 'HD 669 OVAL 60CM KY', 'OK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10310001', 'PULL+PUSH PLATE ', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10310002', 'PHM 2560 P-CC ', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10310003', 'PUSH PULL 2588 D19 SN', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10310004', 'GHM 6051 SN', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10310005', 'GHM 6051 AB', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10310006', 'PHM 2595 P CC 400 L600 US32DJ', 'OMGE', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10311001', 'GIOVANI 80CM AB', 'RDS', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10311002', 'THALIA 80CM AB', 'RDS', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10311003', 'THEODORE 80CM AB', 'RDS', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10312001', 'PHD 187 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10312002', 'PHD 188 BSN/BNP', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10312003', 'AA 215 SN', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10312004', '232.500 SSS', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10312005', 'MP L 1201 F 25X350 SS', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10312006', '812 BSN', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10312007', '180-500 MM EAB', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10312008', '235-350 SS', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10312009', '202-350 SS', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10312010', 'CHIPH 061 30-15-350 1.2MM', 'SES', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313001', 'AD 212-450 SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313002', 'MP 212-600 SP', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313003', 'S 421 450MM SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313004', 'S 421 600MM SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313005', '421-450 MM PS/SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313006', '421-600 MM PS/SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313007', '277-450 MM OV PSS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313008', '277-600 MM OV PSS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313009', '104-600 MM 38M PSS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313010', '104-450 MM PSS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313011', '277-450 MM BLACK', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313012', '1611-450MM PS/SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313013', '1011-450MM PS/SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313014', '156-450MM PS/SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313015', '212B-450MM PS/SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313016', '156-600MM PS/SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10313017', '212B-600MM PS/SS', 'STARCK', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10314001', 'TB 550 AB XXL', 'VALENCIA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10315001', '7801-46 SN', 'VANESA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10316001', '376-35CM SULING OVAL', 'VANESA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10316002', '384-45', 'VANESA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10317001', '2356-256 SN', 'CASANELLI', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10317002', '2239-500 SN', 'CASANELLI', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10318001', '3212-600', 'CLAVIS', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10319001', '3011P-33 CD', 'TP WILSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10319002', '3012P-33 CD', 'TP WILSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10319003', '3060F - 60CD', 'TP WILSON', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10320001', 'SIL 004 PSS 350MM', 'SILCA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10320002', 'SIL 005 PSS 350MM', 'SILCA', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10321001', '015', 'NISHAN', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10321002', '016', 'NISHAN', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10322001', 'STA 001-35 SS/SP', 'GRUPPO', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10322002', '005-350MM PSS', 'GRUPPO', '1', 1, 50000, 'PS', '2022-02-22 05:24:08', '2022-02-22 08:14:11'),
('10401001', 'H 101 SN/BLK', 'ALBION', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10401002', 'H 103 SN/BLK', 'ALBION', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10402001', 'GARIS KECIL SN', 'KOTAK', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10403001', '6001 M 56 GP', 'MULLER', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10404001', '300 KOTAK PIPIH SN', 'OK', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10404002', '310 OVAL PIPIH SN', 'OK', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10404003', 'KOTAK OVAL SN', 'OK', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10404004', 'KOTAK OVAL BLACK', 'OK', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10404005', 'KOTAK OVAL BESAR AB', 'OK', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10404006', 'KOTAK TANGGUNG SS', 'OK', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10404007', 'OVAL TANGGUNG SS', 'OK', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10405001', 'FLM 201 C - 65 SN', 'OMGE', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10405002', 'FLM 202 - 90 SN', 'OMGE', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10405003', 'FLM 204 C 50 SN', 'OMGE', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10405004', 'FLM 204 C 70 SN', 'OMGE', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10405005', 'FLM 208 C SN', 'OMGE', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10405006', 'FLUSH RING FLM 263 US32D', 'OMGE', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10405007', 'CYL 1/2 SISI K784-K + K 784-H + ', 'OMGE', '1', 4, 50000, 'SET', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10405008', 'CYL 1/2 SISI K725-K + K 725-H + ', 'OMGE', '1', 4, 50000, 'SET', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10406001', 'HDL PP 012 AB', 'DEKKSON', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10406002', 'HDL PP 012 MATT BLACK', 'DEKKSON', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10407001', 'ASBAK KUNO', 'WINA', '1', 4, 50000, 'BH', '2022-02-22 05:30:58', '2022-02-22 08:14:11'),
('10501001', 'BIASA 520 - 40MM GP', 'ALBION', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10502001', 'BIASA 60 - 111 BP', 'ARCHIE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10502002', 'BIASA 40 GP', 'ARCHIE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10503003', 'BIASA 45MM SN', 'CAVELL', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10504001', 'BIASA MTS IL DL 8485 40 SSS + CYL 60MM', 'DEKKSON', '1', 5, 50000, 'SET', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10504002', 'BIASA MTS IL DL 8685 SSS + Cyl DC DL 60 MM SN', 'DEKKSON', '1', 5, 50000, 'SET', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10504003', 'BIASA MTS IL DL 8485 MATTBLACK + CYL DC DL 60MM MATTBLACK', 'DEKKSON', '1', 5, 50000, 'SET', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10504004', 'DORONG MTS SLD DL 84100 SSS ', 'DEKKSON', '1', 5, 50000, 'SET', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10504005', 'PELOR MTS RL DL 8485 SSS + CYL DC DL 60MM SN', 'DEKKSON', '1', 5, 50000, 'SET', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10504006', 'PELOR MTS RL DL 8485 MATT BLACK + CYL DC DL 60MM MATT BLACK', 'DEKKSON', '1', 5, 50000, 'SET', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10505001', 'BIASA 40MM GP', 'ERGMAN', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10506001', 'PELOR 40MM GP', 'MOSQUINO', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507001', 'BIASA LCM 3885 - 40 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507002', 'BIASA LCM 3885 - 50 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507003', 'BIASA LCM 3885 - 60 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507004', 'BIASA LCM 3885 - 30 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507005', 'PELOR  LC 101 - 50 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507006', 'PELOR  LCM 3821 - 30 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507007', 'PELOR  LCM 3821 - 50 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507008', 'PELOR LCM 3821 - 40 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507009', 'DORONG LCM 3814 - 40 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507010', 'DORONG LCM 3814 - 50 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507011', 'DORONG LCM 3848- 50 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507012', 'DORONG LCM 2847 B US32D', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507013', 'DORONG LCM 2847 A US33D', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507014', 'HANDLE DORONG OMGE SDM 902 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507015', 'HANDLE DORONG OMGE SDM 801 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507016', 'LCM 3823-55 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507017', 'LCM 3824-55 SN + CYL PCM S 31 X 31 DBL W/3 RSN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:58', '2022-02-22 08:14:11'),
('10507018', 'LCM 3822-55 SN + CYL PCM S 31 X 31 DBL W/3 RSN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10507019', 'PEM LCM 72-65 SN', 'OMGE', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10508001', 'BIASA 2030 - 50MM AB', 'SES', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10508002', 'BIASA 2030 - 40MM SN', 'SES', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10508003', 'PELOR 2036 - 40MM SS', 'SES', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10508004', 'PELOR 2036 - 40MM AB', 'SES', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10508005', 'PELOR 2036 - 60MM AB', 'SES', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10509001', 'BIASA 520-40MM', 'DEA', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10509002', 'BIASA 520-30MM', 'DEA', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10509003', 'PELOR 521-40 M/M', 'DEA', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10509004', 'PELOR 521-30 SS', 'DEA', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10510001', 'PELOR D171-SS PZ S/S + CYL NEMEF C3131- 6KK SN', 'NEMEF', '1', 5, 50000, 'SET', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10511001', 'SS015 IRON COMP', 'SAPPHIRE', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10512001', 'BIASA 40MM INOX 304', 'STARK', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10512002', 'PELOR STA 40MM SS SILV', 'STARK', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10512003', 'PELOR 45MM SS/BLACK', 'STARK', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10513001', 'BIASA ', 'ELBRUS', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10514001', 'BIASA', 'LENOX', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10515001', 'PELOR 7016 SN', 'RAVELLI', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10516001', 'SS514', 'SOLIGEN', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10517001', '7016 SN', 'SSK', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10518001', '85X30 SN', 'BELLOCA', '1', 5, 50000, 'BH', '2022-02-22 06:49:59', '2022-02-22 08:14:11'),
('10601001', 'SN/GP', 'FERARY', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10602001', 'BN/GP', 'MULLER', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10602002', 'SG/GP', 'MULLER', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10602003', 'GP/BN', 'MULLER', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10603001', 'KOTAK SN', 'OK', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10603002', 'BULAT SN', 'OK', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10603003', 'KLASIK AB', 'OK', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10603004', 'BINTIK AB', 'OK', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10603005', 'BULAT SN/NP', 'OK', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10603006', 'BULAT BLACK ', 'OK', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10603007', 'KOTAK BLACK ', 'OK', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10604001', 'ECM 08 US32D', 'OMGE', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10605001', 'BUNGA AB', 'UKIR', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10606001', 'BESAR AB', 'OVAL', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10606002', 'ECM 05 US32D (004)', 'OMGE', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10607001', 'SS', 'DEKKSON', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10608001', 'ESC S63 AB ', 'DUMONT', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10608002', 'ESC R64 AB', 'DUMONT', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10608003', 'ESC S79 SN/CP', 'DUMONT', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10609001', 'OVAL IRON', 'SAPHIRE', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10610001', 'OVAL SS', 'KEMPINSKY', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10611001', 'OVAL SS', 'DEA', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10612001', 'KOTAK BLACK', 'SILCA', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10612002', 'BULAT BLACK', 'SILCA', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10613001', 'OVAL IRON', 'RAVELLI', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10614001', 'SS', 'SOLIGEN', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10615001', 'OVAL GP', 'MOSQUINO', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10616001', 'SS', 'SSK', '1', 6, 50000, 'PS', '2022-02-22 07:09:56', '2022-02-22 08:14:11'),
('10701001', 'SN', 'ALBION', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10701002', 'GP', 'ALBION', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10702001', 'CYL DC KK DL 70MM BLACK', 'DEKKSON', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10702002', 'CYL DC DL 66MM AB', 'DEKKSON', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10702003', 'CYL TC DL 66MM AB', 'DEKKSON', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10702004', 'CYL DC DL 60MM SN', 'DEKKSON', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10702005', 'CYL DC DL 60MM MATT BLACK', 'DEKKSON', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10702006', 'CYL TC DL 60MM MATT BLACK', 'DEKKSON', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10702007', 'CYL TC KK DL 70MM BLACK', 'DEKKSON', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703001', '1/2 SISI PCM S 31X10 W/3 RSN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703002', 'PCM S 31X31 DBL W/3 RSN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703003', 'PCM D 60X60 DBL W/5 RSN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703004', 'PUTAR KOIN PCM 35X35 K01 W/0 RSN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703005', 'PUTAR KUNCI PCM D(10) 35X35 K01 W/5 RSN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703006', 'PUTAR KUNCI PCM S 31X31 K01 W/3 RSN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703007', 'PUTAR KOIN PCM 31X31 K01 W/0 RSN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703008', 'PCM D 40X40 DBL W/5 SN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703009', 'PCM D 35X35 DBL W/5 RSN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703010', 'PCM D 31X31 K01 W/5 RSN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703011', 'PCM D 40X40 K01 W/5 RSN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703012', 'PCM D 35X35 K01 W/5 RSN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703013', 'PCM D 50X50 K01 W/5 RSN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703014', 'PCM D 50X50 DBL W/5 RSN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10703015', 'PCM D 31X31 DBL W/5 RSN', 'OMGE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10704001', 'PTR S31X31 K17 AB', 'RAFES', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10705001', 'BIASA SN', 'SES', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10706001', 'WC D26-60 SN', 'DUMONT', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10707001', '65MM A-B', 'CAVELL', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10708001', 'SN', 'DEA', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10708002', 'PUTAR KUNCI', 'DEA', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10709001', 'KNOB 60MM SN COMP', 'STARK', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10709002', 'SN COMP', 'STARK', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10709003', 'BLACK COMP', 'STARK', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10710001', 'LX 990', 'GERBER', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10711001', '7CM GP', 'ARCHIE', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10712001', 'COMP SN', 'SLG', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10713001', '6,5 CM', 'OK', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11');
INSERT INTO `produk` (`kode_produk`, `nama_produk`, `merk`, `id_kategori`, `id_ct`, `harga`, `stn`, `created_at`, `updated_at`) VALUES
('10714001', '', 'ELBRUS', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10715001', '6,5 CM', 'ORCHARD', '1', 7, 50000, 'BH', '2022-02-22 07:15:42', '2022-02-22 08:14:11'),
('10801001', 'BULAT 8000 PB', 'ALPHA', '1', 8, 50000, 'BH', '2022-02-22 07:20:28', '2022-02-22 08:14:11'),
('10802001', 'KUNCI INDIKATOR YAC 11 GP', 'CHANNEL', '1', 8, 50000, 'BH', '2022-02-22 07:20:28', '2022-02-22 08:14:11'),
('10803001', 'TOILET INDICOTING BOLT SS', 'CHETI', '1', 8, 50000, 'BH', '2022-02-22 07:20:28', '2022-02-22 08:14:11'),
('10804001', 'BULAT CLM 5375 - 60 SR (KUNCI-POLOS)', 'OMGE', '1', 8, 50000, 'BH', '2022-02-22 07:20:28', '2022-02-22 08:14:11'),
('10804002', 'BULAT CLM 5375 - 60 CN (POLOS-POLOS)', 'OMGE', '1', 8, 50000, 'BH', '2022-02-22 07:20:28', '2022-02-22 08:14:11'),
('10804003', 'BULAT CLM 5375 - 60 EX (KUNCI-POLOS)', 'OMGE', '1', 8, 50000, 'BH', '2022-02-22 07:20:28', '2022-02-22 08:14:11'),
('10804004', 'BULAT CLM 5375 - 60 PR (TOMBOL-PUTAR)', 'OMGE', '1', 8, 50000, 'BH', '2022-02-22 07:20:28', '2022-02-22 08:14:11'),
('10805001', 'DOOR BOLT 11 SA SN', 'OT', '1', 8, 50000, 'BH', '2022-02-22 07:20:28', '2022-02-22 08:14:11'),
('10806001', 'BULAT 5881 SS ', 'SECMA', '1', 8, 50000, 'BH', '2022-02-22 07:20:28', '2022-02-22 08:14:11'),
('10807001', 'BT 01 SN', 'SES', '1', 8, 50000, 'BH', '2022-02-22 07:20:28', '2022-02-22 08:14:11'),
('10808001', 'BULAT 5132 / 5122 VCA US32D', 'YALE', '1', 8, 50000, 'BH', '2022-02-22 07:20:28', '2022-02-22 08:14:11'),
('10809001', '38 - 5 S/S', 'YALE', '1', 8, 50000, 'BH', '2022-02-22 07:20:28', '2022-02-22 08:14:11'),
('10810001', 'BULAT 987 BK', 'DEA', '1', 8, 50000, 'BH', '2022-02-22 07:20:28', '2022-02-22 08:14:11'),
('10810002', 'BULAT 987 ET', 'DEA', '1', 8, 50000, 'BH', '2022-02-22 07:20:28', '2022-02-22 08:14:11'),
('10901001', '3X2.5X3 2BB SS CASTING', 'ALBION', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10901002', '3X2.5X2.8 2BB FHP GP', 'ALBION', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10901003', '5X3X4 2BB SS CASTING', 'ALBION', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10902001', '4X3X3 4BB SN', 'CAVELL', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10902002', '4X3X2 4BB SN PIN', 'CAVELL', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10903001', '5X3X3 PCP/GP', 'CHANNEL', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10904001', 'NRP ESS 316 4X3X4 4BB SSS', 'DEKKSON', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10904002', 'NRP ESS DL 4X3X3 2BB SSS', 'DEKKSON', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10905001', '4X3X2 4BB SN', 'F&F', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10906001', '4X3X2.5 DBH SN', 'GERBER', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10906002', 'GTA 6X3X3 SS PIN', 'GERBER', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10907001', '6602 4X3X3 4BB SN', 'IHS', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10908001', 'BHL UQ 3X2.5X2 2BB', 'MILANO', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10908002', 'BHL UQ 4X3X3 4BB', 'MILANO', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10908003', 'BHL UQ 5X3X3 4BB SS', 'MILANO', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10908004', 'SS TIPIS MILANO BHL 2\"', 'MILANO', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10908005', 'SS TIPIS MILANO BHL 2.5\"', 'MILANO', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10908006', 'SS TIPIS MILANO BHL 3\"', 'MILANO', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10909001', 'SELF CLOSING SS BHM 4X3X2 R', 'OMGE', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10909002', 'SELF CLOSING SS BHM 4X3X2 L', 'OMGE', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10909003', 'BHM EQ 4X3X3 2BB SS', 'OMGE', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10909004', 'BHM EQ 4X3X3 4BB SS', 'OMGE', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10909005', 'BHM EQ 5X3X3 2BB SS', 'OMGE', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10909006', 'BHM HQ 4X3X2 2BB SS', 'OMGE', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10909007', 'BHM HQ 5X3X3 4BB  W/SS', 'OMGE', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10909008', 'SS BHM EQ 4X3X2 2BB US32D', 'OMGE', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10909009', 'SS BHM EQ 4X3X3 2BB NP-SP', 'OMGE', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10909010', 'SS BHM HQ 3X2.5X2 2BB US32D', 'OMGE', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10910001', '4X3X3.5 4BB SS', 'SES', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10910002', '3X2.5 K', 'SES', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10910003', '3X2.5X3.5 2BB AB', 'SES', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10910004', '4X3X3.5 4BB AB', 'SES', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10910005', '5X3X3.5 4BB AB', 'SES', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10910006', '5X3X3.5 4BB SS', 'SES', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10911001', 'ESD46 SSS 4X3X3 4BB AB', 'DUMONT', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10911002', 'ESD36 3X2.5X2.2 MM 2BB AB', 'DUMONT', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10912001', '6X3.5X4', 'STARK', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10912002', '3X2.5X2.5 BLACK', 'STARK', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10912003', '4X3X3 BLACK', 'STARK', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10912004', '5X3X3 BLACK', 'STARK', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10912005', '6X4X4 SAFT SS', 'STARK', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10913001', '3X2.5X2 SS', 'EMBASSY', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10914001', '3X2.5X2.5 SN (B)', 'TJ', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10915001', 'PIANO', 'EXITO', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10916001', '4X3X2 SS', 'SILCA', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10916002', '4X3X3 SS', 'SILCA', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10917001', '4X3X3 SS', 'DEA', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10917002', '5X3X3 SS', 'DEA', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10917003', '3x2.5x2.5 SS', 'DEA', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10918001', '3\" SN (B)', 'VNZ', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10918002', '4\" SN (B)', 'VNZ', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10919001', '4\" SN (B)', 'SEVILLA', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('10920001', '5\" SN (B)', 'VENETIAN', '1', 9, 50000, 'PS', '2022-02-22 07:26:57', '2022-02-22 08:14:11'),
('11001001', '12\" PUTIH', 'ALBION', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11001002', '14\" PUTIH', 'ALBION', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11001003', '16\" PUTIH', 'ALBION', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11001004', '10\" COKLAT', 'ALBION', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11001005', '14\" COKLAT', 'ALBION', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11001006', '2021 - 8\" SN', 'ALBION', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11001007', '2021 - 10\" SN', 'ALBION', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11001008', '2021 - 14\" SN', 'ALBION', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11001009', 'SD - 16\" - 2MM SS', 'ALBION', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11001010', 'SD - 20\" - 2,5MM SS', 'ALBION', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11002001', '14\" SN', 'DEA', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11003001', '8\" SS', 'INLOCK', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11003002', '16\" SS', 'INLOCK', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11003003', '20\" SS', 'INLOCK', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11003004', '24\" SS', 'INLOCK', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11004001', '10\" KY', 'LINK', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11004002', '20\" KY', 'LINK', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11005001', '8\" SS', 'SES', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11005002', '8\" GP', 'SES', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11005003', '24\" GP', 'SES', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11005004', '28\" SS', 'SES', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11006001', '8\" SS', 'WINA', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11006002', '12\" SN', 'WINA', '1', 10, 50000, 'PS', '2022-02-22 07:32:50', '2022-02-22 08:14:11'),
('11007001', '20\" SS', '555', '1', 10, 50000, 'PS', '2022-02-22 07:32:51', '2022-02-22 08:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manager', 'web', '2022-02-18 08:12:28', '2022-02-18 08:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `kode_produk`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 'A5101', -12, NULL, NULL),
(2, 'A5602', 5, '2022-02-18 17:00:00', NULL),
(3, 'A5255', -17, '2022-02-18 17:00:00', NULL),
(4, 'A5115', -23, NULL, NULL),
(5, '10001010', 2, '2022-02-18 17:00:00', NULL),
(6, '10112013', 200, '2022-02-21 17:00:00', NULL),
(7, '10106001', 10, '2022-02-21 17:00:00', NULL),
(8, '10101001', 100010, '2022-02-22 17:00:00', NULL),
(9, '10101003', 1000, '2022-02-22 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_trans` bigint(20) UNSIGNED NOT NULL,
  `no_nota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `metode` enum('cash','kredit') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `status` enum('lunas','belum lunas','draf') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draf',
  `id_kasir` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_trans`, `no_nota`, `nama_pelanggan`, `subtotal`, `diskon`, `metode`, `bayar`, `status`, `id_kasir`, `created_at`, `updated_at`) VALUES
(8, '000002', 'Kusen Jendela', 1097700, 2300, 'cash', 100000000, 'lunas', 6, '2022-02-22 03:29:30', '2022-02-22 03:38:02'),
(9, '000003', 'Dion', 0, 20000000, 'cash', 100000000, 'lunas', 6, '2022-02-22 03:39:24', '2022-02-22 03:41:47'),
(12, '000004', NULL, 250000, NULL, NULL, NULL, 'draf', 6, '2022-02-22 09:09:31', '2022-02-22 09:09:40'),
(13, '000005', NULL, 500000, NULL, NULL, NULL, 'draf', 6, '2022-02-23 05:27:06', '2022-02-23 05:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dionisius Setya Hermawan', 'dezoditing012@gmail.com', NULL, '$2y$10$FksaIQzUaSOVB54UmzQeju6EI81HXQm6zF0Pdugy56KD.Y6U3BfPq', NULL, '2022-02-01 19:52:51', '2022-02-01 19:52:51'),
(2, 'Dionisius Setya Hermawan', 'rando@gmail.com', NULL, '$2y$10$/dgMiZ9VxLqgq9UApu.Ke.2.EhaRLcU85UiP1pNRkqoVVB6jbPe5e', NULL, '2022-02-09 01:31:36', '2022-02-09 01:31:36'),
(3, 'Darji', 'darji@gmail.com', NULL, '$2y$10$IKtv12XwcVd.BoWz/B6xveRgdegnpZ3Rn7Wo3XyrCahTjB3Uat.nq', NULL, '2022-02-18 07:48:13', '2022-02-18 07:48:13'),
(4, 'Theo Sang Kasir', 'theo@gmail.com', NULL, '$2y$10$4nd/jSivwTtmR/ihDeMifetz1TOejQWWIlSPsXneecOkEieP8NhdS', NULL, '2022-02-18 08:07:13', '2022-02-18 08:07:13'),
(5, 'Theo Sang Kasir', 'theogaming@gmail.com', NULL, '$2y$10$ALyTpzvUOo3N7SZGxxDZkO/Zx5MF7qO/9hj16E1jx.aKQGVqGy3p2', NULL, '2022-02-18 08:15:36', '2022-02-18 08:15:36'),
(6, 'Dionisius', 'dion@gmail.com', NULL, '$2y$10$muAUnPYX4v3hX0v36rvzvu3B5g/Sy/M9Q/HIVqQXC2MzhZHlmwtDC', NULL, '2022-02-18 20:06:28', '2022-02-18 20:06:28'),
(7, 'Dion', 'lordi@gmail.com', NULL, '$2y$10$i7OwWvyY2BNdZcucVe7FT.ck3VLwKPEGTVwLK/kfkTlRamrufgsUC', NULL, '2022-02-18 21:09:17', '2022-02-18 21:09:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cicilan`
--
ALTER TABLE `cicilan`
  ADD PRIMARY KEY (`id_cicilan`);

--
-- Indexes for table `detail_stok`
--
ALTER TABLE `detail_stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `nb_detail`
--
ALTER TABLE `nb_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota_besar`
--
ALTER TABLE `nota_besar`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_trans`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cicilan`
--
ALTER TABLE `cicilan`
  MODIFY `id_cicilan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `detail_stok`
--
ALTER TABLE `detail_stok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nb_detail`
--
ALTER TABLE `nb_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `nota_besar`
--
ALTER TABLE `nota_besar`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_trans` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
