-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2022 at 06:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_spp`
--

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_10_01_132032_create_tb_siswa_table', 2),
(3, '2022_10_01_132032_create_tb_user_table', 2),
(4, '2022_10_01_132032_create_tb_tahun_table', 3),
(5, '2022_10_01_132032_create_tb_level_table', 4),
(6, '2022_10_01_132032_create_tb_tagihan_table', 5),
(7, '2022_10_01_132032_create_tb_spp_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `nama_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`level_id`, `nama_level`, `created_at`, `updated_at`) VALUES
(1, 'Pre Primary', '2022-10-14 06:38:24', '2022-10-14 06:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `no_pendaftaran` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah_asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_sa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ortu_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kerja_ortu_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ortu_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ortu_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kerja_ortu_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ortu_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`siswa_id`, `no_pendaftaran`, `level`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `gender`, `alamat`, `sekolah_asal`, `kelas_sa`, `agama`, `nama_ortu_ayah`, `kerja_ortu_ayah`, `no_ortu_ayah`, `nama_ortu_ibu`, `kerja_ortu_ibu`, `no_ortu_ibu`, `photo`, `tahun_ajar`, `status`, `created_at`, `updated_at`) VALUES
(1, '0001', '1', 'Eko Saputra', 'Bandar Tinggi', '1988-04-11', 'Laki - laki', 'Jl. Sukaramai Gg. Pribadi', '-', '-', 'Islam', '-', '-', '-', '-', '-', '-', 'uploads/NwPk2mKkkcJCHR3fNvP63TXA4SYyh5WpYSBvx8Py.jpg', '2022/2023', '1', '2022-10-14 06:43:29', '2022-11-15 22:33:17'),
(2, '0002', '1', 'sad', 'asdasd', '1988-04-11', 'Laki - laki', 'asdasd', '-', '-', 'Islam', '-', '-', '-', '-', '-', '-', 'uploads/IG6YxIhUKfaiaYDVTMBuFw6Qxi251v5luqlOXSFa.png', '2022/2023', '1', '2022-10-15 08:56:25', '2022-10-15 09:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spp`
--

CREATE TABLE `tb_spp` (
  `spp_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajar` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_spp`
--

INSERT INTO `tb_spp` (`spp_id`, `tahun_ajar`, `nominal`, `created_at`, `updated_at`) VALUES
(2, '2022/2023', '150000', '2022-10-14 14:00:27', '2022-10-18 05:54:58'),
(4, '2023/2024', '200000', '2022-10-15 09:53:15', '2022-10-15 09:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `tagihan_id` bigint(20) UNSIGNED NOT NULL,
  `no_pendaftaran` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`tagihan_id`, `no_pendaftaran`, `bulan`, `tahun_ajar`, `status`, `created_at`, `updated_at`) VALUES
(1, '0001', 'Juli', '2022/2023', '1', '2022-10-14 06:43:29', '2022-10-18 05:57:10'),
(2, '0001', 'Agustus', '2022/2023', '1', '2022-10-14 06:43:29', '2022-10-18 07:13:48'),
(3, '0001', 'September', '2022/2023', '1', '2022-10-14 06:43:29', '2022-10-18 07:13:48'),
(4, '0001', 'Oktober', '2022/2023', '1', '2022-10-14 06:43:29', '2022-10-18 07:23:43'),
(5, '0001', 'November', '2022/2023', '1', '2022-10-14 06:43:29', '2022-10-18 19:01:03'),
(6, '0001', 'Desember', '2022/2023', '1', '2022-10-14 06:43:29', '2022-10-18 19:01:03'),
(7, '0001', 'Januari', '2022/2023', '1', '2022-10-14 06:43:29', '2022-10-18 19:20:15'),
(8, '0001', 'Februari', '2022/2023', '1', '2022-10-14 06:43:29', '2022-10-18 19:21:42'),
(9, '0001', 'Maret', '2022/2023', '1', '2022-10-14 06:43:29', '2022-10-18 19:24:50'),
(10, '0001', 'April', '2022/2023', '1', '2022-10-14 06:43:29', '2022-11-15 22:17:49'),
(11, '0001', 'Mei', '2022/2023', '1', '2022-10-14 06:43:29', '2022-11-15 22:18:29'),
(12, '0001', 'Juni', '2022/2023', '1', '2022-10-14 06:43:29', '2022-11-15 22:19:33'),
(13, '0002', 'Juli', '2022/2023', '1', '2022-10-15 08:56:25', '2022-10-18 07:13:58'),
(14, '0002', 'Agustus', '2022/2023', '1', '2022-10-15 08:56:25', '2022-10-18 19:25:21'),
(15, '0002', 'September', '2022/2023', '1', '2022-10-15 08:56:25', '2022-10-18 19:27:07'),
(16, '0002', 'Oktober', '2022/2023', '1', '2022-10-15 08:56:25', '2022-10-18 19:31:18'),
(17, '0002', 'November', '2022/2023', '0', '2022-10-15 08:56:25', '2022-10-15 16:51:56'),
(18, '0002', 'Desember', '2022/2023', '0', '2022-10-15 08:56:25', '2022-10-15 16:51:56'),
(19, '0002', 'Januari', '2022/2023', '0', '2022-10-15 08:56:25', '2022-10-15 08:56:25'),
(20, '0002', 'Februari', '2022/2023', '0', '2022-10-15 08:56:25', '2022-10-15 08:56:25'),
(21, '0002', 'Maret', '2022/2023', '0', '2022-10-15 08:56:25', '2022-10-15 08:56:25'),
(22, '0002', 'April', '2022/2023', '0', '2022-10-15 08:56:25', '2022-10-15 08:56:25'),
(23, '0002', 'Mei', '2022/2023', '0', '2022-10-15 08:56:25', '2022-10-15 08:56:25'),
(24, '0002', 'Juni', '2022/2023', '0', '2022-10-15 08:56:25', '2022-10-15 17:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun`
--

CREATE TABLE `tb_tahun` (
  `tahun_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_tahun`
--

INSERT INTO `tb_tahun` (`tahun_id`, `tahun_ajar`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022/2023', 1, '2022-10-14 13:29:53', '2022-10-14 13:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `name`, `username`, `password`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Eko Saputra', 'eko', '$2y$10$Y2giadniuiDvlLz1WzSx..f7dg4znYw5RZ/3IiL0TfMTw2jOsTsc.', 'uploads/UldGEFCvzr1CJFyhAJcRrZSwyKsBcoVAKspVjhch.jpg', '2022-10-14 06:24:46', '2022-10-15 09:13:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`siswa_id`),
  ADD UNIQUE KEY `tb_siswa_no_pendaftaran_unique` (`no_pendaftaran`);

--
-- Indexes for table `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`spp_id`);

--
-- Indexes for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`tagihan_id`);

--
-- Indexes for table `tb_tahun`
--
ALTER TABLE `tb_tahun`
  ADD PRIMARY KEY (`tahun_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `tb_user_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `level_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `siswa_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `spp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `tagihan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_tahun`
--
ALTER TABLE `tb_tahun`
  MODIFY `tahun_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
