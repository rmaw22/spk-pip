-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 26, 2021 at 12:45 PM
-- Server version: 5.7.32
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_pip_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspeks`
--

CREATE TABLE `aspeks` (
  `id_aspek` int(11) NOT NULL,
  `aspek` varchar(50) NOT NULL,
  `prosentase` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aspeks`
--

INSERT INTO `aspeks` (`id_aspek`, `aspek`, `prosentase`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aspek Kondisi', 80, '2021-09-18 02:52:35', '2021-09-18 02:52:35', NULL),
(2, 'Aspek Sikap', 20, '2021-09-18 02:52:46', '2021-09-18 02:52:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faktors`
--

CREATE TABLE `faktors` (
  `id_faktor` int(11) NOT NULL,
  `id_aspek` int(11) NOT NULL,
  `faktor` varchar(50) NOT NULL,
  `nilai_sub` int(11) NOT NULL,
  `kelompok` varchar(30) NOT NULL,
  `category` varchar(50) NOT NULL,
  `nilai_ideal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faktors`
--

INSERT INTO `faktors` (`id_faktor`, `id_aspek`, `faktor`, `nilai_sub`, `kelompok`, `category`, `nilai_ideal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Memiliki KIS atau KPS', 4, 'Core', 'Memiliki KIS/KPS', 4, '2021-09-18 03:01:01', NULL, NULL),
(2, 1, 'Tidak Memiliki KIS atau KPS', 2, 'Core', 'Memiliki KIS/KPS', 4, '2021-09-18 03:01:17', NULL, NULL),
(3, 1, 'Yatim Piatu', 4, 'Core', 'Kondisi orang tua', 4, '2021-09-18 03:02:18', NULL, NULL),
(4, 1, 'Yatim atau Piatu', 3, 'Core', 'Kondisi orang tua', 4, '2021-09-18 03:02:39', NULL, NULL),
(5, 1, 'Masih Lengkap', 2, 'Core', 'Kondisi orang tua', 4, '2021-09-18 03:03:00', NULL, NULL),
(6, 1, 'Peserta Didik Berkebutuhan Khusus', 4, 'Core', 'Peserta Didik Berkebutuhan Khusus', 4, '2021-09-18 03:03:33', NULL, NULL),
(7, 1, 'Peserta Didik Tidak Berkebutuhan Khusus', 2, 'Core', 'Peserta Didik Berkebutuhan Khusus', 4, '2021-09-18 03:05:00', NULL, NULL),
(8, 1, 'Tempat Tinggal Panti Asuhan', 4, 'Secondary', 'Tempat Tinggal Peserta Didik', 4, '2021-09-18 03:05:37', NULL, NULL),
(9, 1, 'Tempat Tinggal Bersama Wali', 3, 'Secondary', 'Tempat Tinggal Peserta Didik', 4, '2021-09-18 03:05:55', NULL, NULL),
(10, 1, 'Tempat Tinggal Bersama Orang tua', 2, 'Secondary', 'Tempat Tinggal Peserta Didik', 4, '2021-09-18 03:06:10', NULL, NULL),
(11, 2, 'Berstatus Narapidana', 5, 'Secondary', 'Kondisi Peserta Didik', 5, '2021-09-18 03:08:31', NULL, NULL),
(12, 2, 'Peserta Didik Korban Bencana Alam', 4, 'Secondary', 'Kondisi Peserta Didik', 5, '2021-09-18 03:08:46', NULL, NULL),
(13, 2, 'Peserta Didik Korban Konflik', 3, 'Secondary', 'Kondisi Peserta Didik', 5, '2021-09-18 03:09:06', NULL, NULL),
(14, 2, 'Tidak Dalam Kondisi Apapun', 2, 'Secondary', 'Kondisi Peserta Didik', 5, '2021-09-18 03:09:20', NULL, NULL),
(15, 2, 'Kesopanan Sangat Baik', 4, 'Core', 'Kesopanan', 4, '2021-09-18 03:09:43', NULL, NULL),
(16, 2, 'Kesopanan Baik', 3, 'Core', 'Kesopanan', 4, '2021-09-18 03:10:00', NULL, NULL),
(17, 2, 'Kesopanan Cukup', 2, 'Core', 'Kesopanan', 4, '2021-09-18 03:10:18', NULL, NULL),
(18, 2, 'Kesopanan Kurang', 1, 'Core', 'Kesopanan', 4, '2021-09-18 03:10:33', NULL, NULL),
(19, 2, 'Tingkah Laku Sangat Baik', 4, 'Secondary', 'Tingkah Laku', 4, '2021-10-10 03:42:53', NULL, NULL),
(20, 2, 'Tingkah Laku Baik', 3, 'Secondary', 'Tingkah Laku', 4, '2021-10-10 03:42:53', NULL, NULL),
(21, 2, 'Tingkah Laku Cukup', 4, 'Secondary', 'Tingkah Laku', 4, '2021-10-10 03:43:40', NULL, NULL),
(22, 2, 'Tingkah Laku Kurang', 3, 'Secondary', 'Tingkah Laku', 4, '2021-10-10 03:43:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gaps`
--

CREATE TABLE `gaps` (
  `id_gap` int(11) NOT NULL,
  `selisih` decimal(6,2) NOT NULL,
  `bobot` decimal(6,2) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gaps`
--

INSERT INTO `gaps` (`id_gap`, `selisih`, `bobot`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '0.00', '5.00', 'Tidak Ada Selisih (Kompetensi sesuai dengan yang dibutuhkan)', '2021-09-18 03:11:25', '2021-09-18 03:11:25', NULL),
(2, '1.00', '4.50', 'Kompetensi Individu kelebihan 1 tingkat atau level', '2021-09-18 23:33:14', '2021-09-18 23:33:14', NULL),
(3, '-1.00', '4.00', 'Kompetensi Individu kekurangan 1 tingkat atau level', '2021-09-18 23:36:23', '2021-09-18 23:36:23', NULL),
(4, '2.00', '3.50', 'Kompetensi Individu kelebihan 2 tingkat atau level', '2021-09-18 23:37:01', '2021-09-18 23:37:01', NULL),
(5, '-2.00', '3.00', 'Kompetensi Individu kekurangan 2 tingkat atau level', '2021-09-18 23:37:38', '2021-09-18 23:37:38', NULL),
(6, '3.00', '2.50', 'Kompetensi Individu kelebihan 3 tingkat atau level', '2021-09-18 23:38:06', '2021-09-18 23:38:06', NULL),
(7, '-3.00', '2.00', 'Kompetensi Individu kekurangan 3 tingkat atau level', '2021-09-18 23:38:34', '2021-09-18 23:38:34', NULL),
(8, '4.00', '1.50', 'Kompetensi Individu kelebihan 4 tingkat atau level', '2021-09-18 23:38:52', '2021-09-18 23:38:52', NULL),
(9, '-4.00', '1.00', 'Kompetensi Individu kekurangan 4 tingkat atau level', '2021-09-18 23:39:21', '2021-09-18 23:39:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_27_050600_create_pendaftars_table', 1),
('2016_06_27_050609_create_jurusans_table', 1),
('2016_06_27_050626_create_pengujis_table', 1),
('2016_06_27_050644_create_kepseks_table', 1),
('2016_06_27_055359_create_hasils_table', 1),
('2017_02_13_124142_create_petugas_table', 1),
('2017_04_11_093932_create_table_test', 1),
('2017_04_11_094304_create_table_testss', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_aspeks` int(11) NOT NULL,
  `id_faktor` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-09-30 00:42:18', '2021-09-30 00:42:18'),
(2, 'Kepala Sekolah', '2021-09-30 00:42:18', '2021-09-30 00:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `status_penilaian` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nis`, `nama`, `tempat_lahir`, `tgl_lahir`, `kelamin`, `agama`, `phone`, `periode`, `status_penilaian`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 12345567, 'Imong', 'Bandung', '1999-12-12', 'Pria', 'Islam', '085721874884', '2021', 0, '2021-09-14 21:41:14', '2021-09-16 21:13:48', NULL),
(3, 77783782, 'Tina', 'Jakarta', '2000-12-12', 'Pria', 'Kristen', '085721874884', '2021', 0, '2021-09-14 21:41:51', '2021-09-14 21:41:51', NULL),
(4, 10119479, 'Imam', 'Sukabumi', '1999-12-12', 'Wanita', 'Islam', '085721874884', '2021', 0, '2021-09-16 21:11:54', '2021-09-16 21:11:54', NULL),
(5, 34349999, 'sdsfd', 'fdfs', '1999-12-12', 'Pria', 'Islam', '085798970901', '2021', 0, '2021-09-17 02:02:32', '2021-09-17 02:02:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_role` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `id_role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$pdmJpEwICkAaTokxRA.DfuIqCbsUTYHqjE/Q4E/YipnuQICeR9VLi', 'AoO4uQE6KI28tyPUzSytbnybHXd4iCJMgS0xPslyapUbdLwm6yQ3SuUYk7Bs', 1, '2021-08-14 03:29:30', '2021-10-09 00:51:50'),
(2, 'Kepala Sekolah', 'kepsek@gmail.com', '$2y$10$kiHhGKz57bLhA4dDIjo6U.GCBtZFDYPkOuo67qdx17APhBiBF21M.', 'Tmv5fFsFf2kVbht1Fj9FlnxCKdVCp2G4kZl2hH35eoiBzVhkuMb75Qq4kWJx', 2, '2021-09-29 11:56:47', '2021-10-01 21:25:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspeks`
--
ALTER TABLE `aspeks`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indexes for table `faktors`
--
ALTER TABLE `faktors`
  ADD PRIMARY KEY (`id_faktor`),
  ADD KEY `id_aspek` (`id_aspek`);

--
-- Indexes for table `gaps`
--
ALTER TABLE `gaps`
  ADD PRIMARY KEY (`id_gap`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_aspeks` (`id_aspeks`),
  ADD KEY `id_faktor` (`id_faktor`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspeks`
--
ALTER TABLE `aspeks`
  MODIFY `id_aspek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faktors`
--
ALTER TABLE `faktors`
  MODIFY `id_faktor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `gaps`
--
ALTER TABLE `gaps`
  MODIFY `id_gap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faktors`
--
ALTER TABLE `faktors`
  ADD CONSTRAINT `faktors_ibfk_1` FOREIGN KEY (`id_aspek`) REFERENCES `aspeks` (`id_aspek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilais`
--
ALTER TABLE `nilais`
  ADD CONSTRAINT `nilais_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `students` (`nis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nilais_ibfk_2` FOREIGN KEY (`id_aspeks`) REFERENCES `aspeks` (`id_aspek`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nilais_ibfk_3` FOREIGN KEY (`id_faktor`) REFERENCES `faktors` (`id_faktor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
