-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 09:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk2024_sigit_201`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_PELANGGAN` int(11) NOT NULL,
  `NAMA_PELANGGAN` varchar(64) DEFAULT NULL,
  `USERNAME` varchar(64) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `ALAMAT` varchar(64) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ID_PELANGGAN`, `NAMA_PELANGGAN`, `USERNAME`, `PASSWORD`, `ALAMAT`, `EMAIL`) VALUES
(1, 'aaa', 'aaa', '12345678', 'aaa', 'aa@gmail.com'),
(2, 'wildanza1', 'wildanza1', '$2y$12$aDyGnvxY24VwN1F509w3jeSc1y4KpAoowXcGzu8wJXMWRGjiO0pti', 'Jalan Kemana aja asal sama kamu', 'wildanza1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `ID_PENJUALAN` int(11) NOT NULL,
  `KODE_OBAT` int(11) DEFAULT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `ID_PEMBAYARAN` int(11) DEFAULT NULL,
  `ID_PELANGGAN` int(11) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `TOTAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`ID_PENJUALAN`, `KODE_OBAT`, `ID_USER`, `ID_PEMBAYARAN`, `ID_PELANGGAN`, `TANGGAL`, `JUMLAH`, `TOTAL`) VALUES
(1, 2, 5, 5, 1, '2024-02-12', 123, 30),
(3, 2, 1, 1, 1, '2024-02-13', 3, 30000),
(4, 3, 1, 1, 1, '2024-02-13', 10, 900000),
(5, 3, 2, 5, 1, '2024-02-13', 19, 1710000),
(6, 2, 2, 1, 1, '2024-02-13', 6, 60000),
(25, 3, 8, 1, 2, '2024-02-13', 10, 900000),
(26, 4, 2, 1, 1, '2024-02-13', 5, 25000),
(27, 2, 5, 1, 2, '2024-02-13', 10, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `ID_KATEGORI` int(11) NOT NULL,
  `NAMA_KATEGORI` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`ID_KATEGORI`, `NAMA_KATEGORI`) VALUES
(2, 'Kapsul'),
(3, 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `KODE_OBAT` int(11) NOT NULL,
  `ID_KATEGORI` int(11) DEFAULT NULL,
  `NAMA_OBAT` varchar(64) DEFAULT NULL,
  `HARGA` int(11) DEFAULT NULL,
  `KETERANGAN` text DEFAULT NULL,
  `STOK` bigint(255) DEFAULT NULL,
  `EXP` date DEFAULT NULL,
  `image` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`KODE_OBAT`, `ID_KATEGORI`, `NAMA_OBAT`, `HARGA`, `KETERANGAN`, `STOK`, `EXP`, `image`) VALUES
(2, 2, 'Paracetamol', 10000, '1x sehari', 99999989, '2024-02-12', 'images/HPwxairoFN9OXw7bg7JNKI100oCULrmtHW4w4Jsi.png'),
(3, 2, 'insom', 90000, '12x sehari', 999999989, '2024-02-12', 'images/LF0A6sXzflbOzhiiuAAimv0beAhyGWEtylPym9mi.png'),
(4, 2, 'Vitamin D', 5000, '50x sehari', 99999974, '2024-02-13', 'images/JzEprRSe5drOEMLyMKxCxUTAvt5GLaiWvSxPfpVq.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `ID_PEMBAYARAN` int(11) NOT NULL,
  `NAMA_PEMBAYARAN` enum('Cash','Transfer','Kredit') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`ID_PEMBAYARAN`, `NAMA_PEMBAYARAN`) VALUES
(1, 'Cash'),
(2, 'Transfer'),
(5, 'Kredit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `ID_USER` int(11) NOT NULL,
  `NAMA_USER` varchar(64) DEFAULT NULL,
  `USERNAME1` varchar(64) DEFAULT NULL,
  `PASSWORD1` varchar(64) DEFAULT NULL,
  `ROLE` int(11) DEFAULT NULL,
  `ALAMAT1` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas','pelanggan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'admin@gmail.com', NULL, '$2y$12$AO4O8kzutfYdpAU4sgH4AuE6Ce6yqoiisee9AYGzE0peUMirkLumS', 'admin', 'Jalan kemana aja ayok', NULL, '2024-02-11 20:26:38', '2024-02-11 20:26:38'),
(2, 'petugas', 'Petugas', 'petugas@gmail.com', NULL, '$2y$12$qdMdYXGU/PETkre02A2lHeqhAc8MYWw8LU3OY.O/ufsY/A0jt9Pha', 'petugas', 'Jalan kemana aja Kuy', NULL, '2024-02-11 20:26:38', '2024-02-11 20:26:38'),
(3, 'pelanggan', 'Pelanggan', 'pelanggan@gmail.com', NULL, '$2y$12$sn1ZKOjLckRKo3rnZnQQZu3yJy.PNEbSxNbxBi5LAK/AwtggpbeZy', 'pelanggan', 'Jalan kemana kesini', NULL, '2024-02-11 20:26:38', '2024-02-11 20:26:38'),
(5, 'wildan', 'danzako duro', 'wildan@gmail.com', NULL, '$2y$12$ndNKLU8PhDBCrX2qZgXhJ.ol3/zF4p6SOzZSreQSjI9/ad40Fx9TS', 'petugas', 'Jalan Kemana aja asal sama kamu', NULL, '2024-02-12 00:45:50', '2024-02-12 00:47:35'),
(6, 'wildanza', 'wildanza', 'wildanza@gmail.com', NULL, '$2y$12$0nPfZBCu6xQ/x2ib6U.K6e6JS8FjWdIOE8oB3OFAP/2u.H6sMIc9C', 'pelanggan', 'Jalan Kemana aja asal sama kamu', NULL, '2024-02-12 21:05:07', '2024-02-12 21:05:07'),
(8, 'wildanza12', 'wildanza1', 'wildanza1@gmail.com', NULL, '$2y$12$/.X2wAFz3pq90FGeo63lLehDTi3WuOQ7f6J2FlF/1dTvefziuaFNq', 'pelanggan', 'Jalan Kemana aja asal sama kamu', NULL, '2024-02-12 21:09:41', '2024-02-12 21:24:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_PELANGGAN`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`ID_PENJUALAN`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_PEMBAYARAN`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_USER`),
  ADD KEY `FK_RELATIONSHIP_3` (`KODE_OBAT`),
  ADD KEY `ID_PELANGGAN` (`ID_PELANGGAN`) USING BTREE;

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`KODE_OBAT`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_KATEGORI`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`ID_USER`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID_PELANGGAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `ID_PENJUALAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `KODE_OBAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `ID_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_PEMBAYARAN`) REFERENCES `tb_pembayaran` (`ID_PEMBAYARAN`),
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`KODE_OBAT`) REFERENCES `tb_obat` (`KODE_OBAT`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `pelanggan` (`ID_PELANGGAN`);

--
-- Constraints for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `tb_kategori` (`ID_KATEGORI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
