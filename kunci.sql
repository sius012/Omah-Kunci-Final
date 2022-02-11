-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 09:29 AM
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
-- Database: `kunci`
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
  `via` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cicilan`
--

INSERT INTO `cicilan` (`id_cicilan`, `kode_transaksi`, `termin`, `nominal`, `via`, `created_at`, `updated_at`) VALUES
(1, '17', 1000000, NULL, '', '2022-02-08 01:26:39', '2022-02-08 01:26:39'),
(2, '19', 100000, NULL, '', '2022-02-08 01:33:08', '2022-02-08 01:33:08'),
(3, '20', 100000, NULL, '', '2022-02-08 05:05:06', '2022-02-08 05:05:06'),
(4, '22', 100000000, NULL, '', '2022-02-09 04:11:06', '2022-02-09 04:11:06'),
(5, '27', 100000000, NULL, '', '2022-02-10 09:49:44', '2022-02-10 09:49:44'),
(6, '28', 1000000, NULL, '', '2022-02-11 01:17:22', '2022-02-11 01:17:22');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_trans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `kode_trans`, `kode_produk`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES
(1, '1', 'A5101', 1, 5000, NULL, NULL),
(2, '1', 'A5102', 1, 50000, NULL, NULL),
(3, '2', 'A5101', 3, 15000, NULL, NULL),
(4, '2', 'A5102', 1, 50000, NULL, NULL),
(11, '6', 'A5101', 2, 10000, NULL, NULL),
(12, '6', 'A5102', 2, 100000, NULL, NULL),
(15, '8', 'A5101', 2, 10000, NULL, NULL),
(16, '8', 'A5102', 1, 50000, NULL, NULL),
(17, '9', 'A5101', 1, 5000, NULL, NULL),
(18, '9', 'A5102', 1, 50000, NULL, NULL),
(50, '12', 'A5101', 2, 10000, NULL, NULL),
(53, '12', 'A5102', 8, 400000, NULL, NULL),
(54, '13', 'A5101', 1, 5000, NULL, NULL),
(55, '13', 'A5102', 1, 50000, NULL, NULL),
(56, '14', 'A5101', 3, 15000, NULL, NULL),
(57, '14', 'A5102', 1, 50000, NULL, NULL),
(58, '15', 'A5101', 1, 5000, NULL, NULL),
(59, '15', 'A5102', 1, 50000, NULL, NULL),
(63, '17', 'A5101', 2, 10000, NULL, NULL),
(64, '17', 'A5102', 3, 150000, NULL, NULL),
(67, '19', 'A5101', 2, 10000, NULL, NULL),
(68, '19', 'A5102', 1, 50000, NULL, NULL),
(69, '20', 'A5101', 1, 5000, NULL, NULL),
(70, '20', 'A5102', 1, 50000, NULL, NULL),
(71, '21', 'A5101', 1, 5000, NULL, NULL),
(72, '21', 'A5102', 1, 50000, NULL, NULL),
(73, '22', 'A5101', 1, 10000000, NULL, NULL),
(74, '22', 'A5602', 1, 10000, NULL, NULL),
(75, '22', 'A5255', 1, 100000, NULL, NULL),
(76, '23', 'A5101', 1, 10000000, NULL, NULL),
(77, '23', 'A5602', 1, 10000, NULL, NULL),
(78, '23', 'A5255', 1, 100000, NULL, NULL),
(86, '26', 'A5255', 1, 100000, NULL, NULL),
(87, '27', 'A5101', 1, 10000000, NULL, NULL),
(88, '27', 'A5602', 1, 10000, NULL, NULL),
(89, '28', 'A5115', 3, 90000, NULL, NULL),
(90, '28', 'A5255', 1, 100000, NULL, NULL);

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
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `nomer` int(11) NOT NULL,
  `merek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(18, '2022_02_11_071148_merek', 13);

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
(3, 'App\\User', 2);

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
(1, 3, '0', 'Warna', 'Blue Mercy', NULL, NULL),
(2, 3, '1', 'fdfdfdf', 'fdfdfdf', NULL, NULL),
(3, 4, '1', 'Ukuran', '2x1', NULL, NULL),
(4, 4, '2', 'Warna', 'Hijau', NULL, NULL),
(5, 5, '1', 'Ukuran', '1 : 1', NULL, NULL),
(6, 6, '1', 'Warna', 'fdfdfdf', NULL, NULL),
(7, 7, '1', '2121', '2121', NULL, NULL),
(8, 8, '1', 'Warna', 'Warna', NULL, NULL),
(9, 8, '2', 'Warna', '2121', NULL, NULL),
(10, 8, '3', '2121s', '2121', NULL, NULL),
(11, 8, '4', 'Warna', 'Warna', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nota_besar`
--

CREATE TABLE `nota_besar` (
  `id_transaksi` int(11) NOT NULL,
  `no_nota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `up` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us` int(10) NOT NULL,
  `brp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nota_besar`
--

INSERT INTO `nota_besar` (`id_transaksi`, `no_nota`, `ttd`, `up`, `us`, `brp`, `gm`, `total`, `created_at`, `updated_at`) VALUES
(1, NULL, 'dezoditing012@gmail.com', 'Bikin istana', 10000, 'fdfdfdf', 'fdfdfdf', 100000, NULL, NULL),
(2, NULL, 'dezoditing012@gmail.com', 'Bikin istana', 200000, 'transfer BCA', 'Pak Haji', 100000, NULL, NULL),
(3, NULL, 'dezoditing012@gmail.com', 'Bikin istana', 200000, 'transfer BCA', 'Pak Haji', 100000, NULL, NULL),
(4, NULL, 'banggoku@gmail.com', 'Bikin istana', 1000000, 'transfer BCA', 'Pak Haji', 100000, NULL, NULL),
(5, NULL, 'Bang Windah', 'Membangun Babel Tower kembali', 1000000, 'transfer BCA', 'Pondasi Rangka baja Berat', 1000000, NULL, NULL),
(6, NULL, 'Bang Jayus', 'Membangun Istana Gertoz', 100000, 'transfer BCA', 'Kratos', 1000000, NULL, NULL),
(7, NULL, 'bang luknut', '1sfsf', 200000, 'transfer BCA', 'Pak Haji', 1000, NULL, NULL),
(8, NULL, 'bang jaya', 'Bikin istana', 200000, 'transfer BCA', 'Pak Haji', 100000, NULL, NULL);

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
(1, 'cassiering', 'web', NULL, NULL),
(2, 'kelola produk', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama_produk`, `merk`, `id_kategori`, `harga`, `created_at`, `updated_at`) VALUES
('A5101', 'Kusen Jendelaa', 'srsr', '1', 10000000, NULL, NULL),
('A5602', 'Kusen Jendela', 'Solid', '1', 10000, NULL, NULL),
('A5255', 'Kusen Jendela 2', 'Rolex', '1', 100000, NULL, NULL),
('A5115', 'Gembok Gaming', 'Joestar', '1', 30000, NULL, NULL);

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
(1, 'Admin Gudang', 'web', '2022-02-09 01:01:30', '2022-02-09 01:01:30'),
(2, 'Manager', 'web', '2022-02-09 01:01:30', '2022-02-09 01:01:30'),
(3, 'Kasir', 'web', '2022-02-09 01:01:30', '2022-02-09 01:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 3),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_trans`, `no_nota`, `nama_pelanggan`, `subtotal`, `diskon`, `metode`, `bayar`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Dionisius', 49500, 10, 'cash', 100000, 'lunas', '2022-02-04 09:12:12', '2022-02-04 09:12:44'),
(2, '2', 'Dionisius', 58500, 10, 'cash', 100000, 'lunas', '2022-02-07 01:08:38', '2022-02-07 01:12:07'),
(6, '3', 'Dionisius Setya Hermawan', 110000, NULL, 'cash', 100000, 'lunas', '2022-02-07 02:55:02', '2022-02-07 03:42:01'),
(8, '4', 'Theodhore', 60000, NULL, 'cash', 100000, 'lunas', '2022-02-07 04:58:26', '2022-02-07 05:01:29'),
(9, '5', 'Nalsal', 0, 100, 'cash', 10, 'lunas', '2022-02-07 05:01:39', '2022-02-07 05:01:58'),
(12, '6', 'Dionisius Setya Hermawan', 410000, NULL, 'cash', 100000, 'lunas', '2022-02-07 07:32:01', '2022-02-07 08:16:32'),
(13, '7', 'Dionisius Setya Hermawan', 55000, NULL, 'cash', 1000000, 'lunas', '2022-02-07 08:16:45', '2022-02-07 08:17:04'),
(14, '8', 'ds', 58500, 10, 'cash', 100000, 'lunas', '2022-02-07 08:17:37', '2022-02-07 08:17:54'),
(15, '9', NULL, 55000, NULL, NULL, NULL, 'draf', '2022-02-07 10:07:25', '2022-02-07 10:07:26'),
(17, '10', 'Dion', 160000, 0, 'kredit', 1000000, 'lunas', '2022-02-08 01:12:10', '2022-02-08 01:26:39'),
(19, '11', 'Dionisius Setya Hermawan', 60000, NULL, 'kredit', 100000, 'belum lunas', '2022-02-08 01:32:40', '2022-02-08 01:33:08'),
(20, '12', 'dionisius Setya Hermawan', 55000, NULL, 'kredit', 100000, 'belum lunas', '2022-02-08 05:04:40', '2022-02-08 05:05:06'),
(21, '13', NULL, 55000, NULL, NULL, NULL, 'draf', '2022-02-08 08:59:24', '2022-02-08 08:59:25'),
(22, '14', 'asasa', 9099000, 10, 'kredit', 100000000, 'belum lunas', '2022-02-09 04:06:06', '2022-02-09 04:11:06'),
(23, '15', 'Kusen Jendela', 9099000, 10, 'cash', 10000000, 'lunas', '2022-02-09 04:14:11', '2022-02-09 04:17:39'),
(26, '16', 'Darji Kun', 5050000, 50, 'cash', 90000000, 'lunas', '2022-02-10 09:47:27', '2022-02-10 09:48:47'),
(27, '17', 'Darji 2', 100100, 99, 'kredit', 100000000, 'belum lunas', '2022-02-10 09:49:15', '2022-02-10 09:49:44'),
(28, '18', 'Bang Dion', 19000, 90, 'kredit', 1000000, 'belum lunas', '2022-02-11 01:16:48', '2022-02-11 01:17:22');

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
(2, 'Dionisius Setya Hermawan', 'rando@gmail.com', NULL, '$2y$10$/dgMiZ9VxLqgq9UApu.Ke.2.EhaRLcU85UiP1pNRkqoVVB6jbPe5e', NULL, '2022-02-09 01:31:36', '2022-02-09 01:31:36');

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
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`nomer`);

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
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

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
  MODIFY `id_cicilan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_stok`
--
ALTER TABLE `detail_stok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nb_detail`
--
ALTER TABLE `nb_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nota_besar`
--
ALTER TABLE `nota_besar`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_trans` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
