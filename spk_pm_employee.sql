-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Sep 2021 pada 11.09
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_pm_employee`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspeks`
--

CREATE TABLE `aspeks` (
  `id_aspek` int(11) NOT NULL,
  `aspek` varchar(50) NOT NULL,
  `prosentase` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aspeks`
--

INSERT INTO `aspeks` (`id_aspek`, `aspek`, `prosentase`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kedisiplinan', 30, '2021-09-14 11:01:13', '2021-09-16 22:18:34', NULL),
(2, 'Kecerdasan', 20, '2021-09-16 22:18:28', '2021-09-16 22:18:28', NULL),
(3, 'Perilaku', 50, '2021-09-16 22:18:46', '2021-09-16 22:18:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktors`
--

CREATE TABLE `faktors` (
  `id_faktor` int(11) NOT NULL,
  `id_aspek` int(11) NOT NULL,
  `faktor` varchar(50) NOT NULL,
  `nilai_sub` int(11) NOT NULL,
  `kelompok` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `faktors`
--

INSERT INTO `faktors` (`id_faktor`, `id_aspek`, `faktor`, `nilai_sub`, `kelompok`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'tepat waktu dat', 3, 'Core', '2021-09-16 20:36:23', '2021-09-16 20:36:23', NULL),
(2, 1, 'Common Sense', 3, 'Core', '2021-09-16 22:19:46', '2021-09-16 22:19:46', NULL),
(3, 2, 'Potensi Kecerdasan', 4, 'Secondary', '2021-09-16 22:21:26', '2021-09-16 22:21:26', NULL),
(4, 2, 'Konsentrasi', 3, 'Core', '2021-09-16 22:21:45', '2021-09-16 22:21:45', NULL),
(5, 3, 'Kekuasaan', 3, 'Core', '2021-09-16 22:22:10', '2021-09-16 22:22:10', NULL),
(6, 3, 'Pengaruh', 3, 'Core', '2021-09-16 22:22:29', '2021-09-16 22:22:29', NULL),
(7, 3, 'keteguhan Hati', 4, 'Secondary', '2021-09-16 22:22:43', '2021-09-16 22:22:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaps`
--

CREATE TABLE `gaps` (
  `id_gap` int(11) NOT NULL,
  `selisih` decimal(6,2) NOT NULL,
  `bobot` decimal(6,2) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `gaps`
--

INSERT INTO `gaps` (`id_gap`, `selisih`, `bobot`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '0.00', '5.00', 'Tidak Ada Selisih (Kompetensi sesuai dengan yang dibutuhkan)', '2021-09-16 22:25:16', '2021-09-16 22:25:16', NULL),
(3, '1.00', '4.50', 'Kompetensi Individu kelebihan 1 tingkat', '2021-09-16 22:25:51', '2021-09-16 22:25:51', NULL),
(4, '-1.00', '4.00', 'Kompetensi Individu kekurangan 1 tingkat', '2021-09-16 22:26:22', '2021-09-16 22:26:22', NULL),
(5, '4.00', '1.50', 'Kompetensi Individu kelebihan 4 tingkat', '2021-09-16 22:26:42', '2021-09-16 22:26:42', NULL),
(6, '-4.00', '1.00', 'Kompetensi Individu kekurangan 4 tingkat', '2021-09-16 22:26:56', '2021-09-16 22:26:56', NULL),
(7, '14.00', '3.00', 'Tidak Ada Selisih (Kompetensi sesuai dengan yang dibutuhkan)', '2021-09-16 22:27:13', '2021-09-16 22:27:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasils`
--

CREATE TABLE `hasils` (
  `id` int(10) UNSIGNED NOT NULL,
  `pendaftar_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `nilai_tpa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nilai_wawancara` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nilai_uan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nilai_minat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nilai_rata` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `penguji_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusans`
--

CREATE TABLE `jurusans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nilai_lulus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepseks`
--

CREATE TABLE `kepseks` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kepseks`
--

INSERT INTO `kepseks` (`id`, `nip`, `nama`, `created_at`, `updated_at`) VALUES
(1, '098779389', 'RIRI HERNAWATI', '2021-09-29 03:17:16', '2021-09-29 03:17:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `nilais`
--

CREATE TABLE `nilais` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_aspeks` int(11) NOT NULL,
  `id_faktor` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `nilais`
--

INSERT INTO `nilais` (`id`, `nis`, `id_aspeks`, `id_faktor`, `nilai`, `created_at`, `updated_at`) VALUES
(2, 12345567, 1, 1, 4, '2021-09-16 21:25:21', '2021-09-16 21:25:21'),
(3, 77783782, 1, 1, 5, '2021-09-16 21:22:24', '2021-09-16 21:22:24'),
(4, 10119479, 1, 1, 3, '2021-09-16 21:26:05', '2021-09-16 21:26:05'),
(5, 10119479, 2, 4, 3, '2021-09-16 22:27:51', '2021-09-16 22:27:51'),
(6, 77783782, 2, 3, 2, '2021-09-16 22:27:59', '2021-09-16 22:27:59'),
(7, 12345567, 1, 2, 2, '2021-09-16 22:28:23', '2021-09-16 22:28:23'),
(8, 10119479, 3, 6, 2, '2021-09-16 22:28:32', '2021-09-16 22:28:32'),
(9, 10119479, 3, 7, 4, '2021-09-16 22:28:40', '2021-09-16 22:28:40'),
(10, 77783782, 3, 6, 3, '2021-09-16 22:28:53', '2021-09-16 22:28:53'),
(11, 12345567, 2, 3, 1, '2021-09-16 22:29:06', '2021-09-16 22:29:06'),
(12, 12345567, 3, 7, 5, '2021-09-16 22:29:18', '2021-09-16 22:29:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftars`
--

CREATE TABLE `pendaftars` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengujis`
--

CREATE TABLE `pengujis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skalas`
--

CREATE TABLE `skalas` (
  `id` int(11) NOT NULL,
  `id_skala` int(11) NOT NULL,
  `skala` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id`, `nis`, `nama`, `tempat_lahir`, `tgl_lahir`, `kelamin`, `agama`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '12345567', 'Imong', 'Bandung', '1999-12-12', 'Pria', 'Islam', '085721874884', '2021-09-14 21:41:14', '2021-09-16 21:13:48', NULL),
(3, '77783782', 'Tina', 'Jakarta', '2000-12-12', 'Pria', 'Kristen', '085721874884', '2021-09-14 21:41:51', '2021-09-14 21:41:51', NULL),
(4, '10119479', 'Imam', 'Sukabumi', '1999-12-12', 'Wanita', 'Islam', '085721874884', '2021-09-16 21:11:54', '2021-09-16 21:11:54', NULL),
(5, '34349999', 'sdsfd', 'fdfs', '1999-12-12', 'Pria', 'Islam', '085798970901', '2021-09-17 02:02:32', '2021-09-17 02:02:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `tes` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `testss`
--

CREATE TABLE `testss` (
  `id` int(10) UNSIGNED NOT NULL,
  `tes` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$8dfPtWV1TPyUyf5IiHfIaeob9CdnMzhrKsZo05f8NIWcPktF6qLQ2', 's5VxPl8sfEXSlVVvRG5YHoquZ3JTJMhnzu3CUsQM6YtelIfKJQ1WEh8MduuY', '2021-08-14 03:29:30', '2021-09-16 22:55:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aspeks`
--
ALTER TABLE `aspeks`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indeks untuk tabel `faktors`
--
ALTER TABLE `faktors`
  ADD PRIMARY KEY (`id_faktor`);

--
-- Indeks untuk tabel `gaps`
--
ALTER TABLE `gaps`
  ADD PRIMARY KEY (`id_gap`);

--
-- Indeks untuk tabel `hasils`
--
ALTER TABLE `hasils`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hasils_pendaftar_id_unique` (`pendaftar_id`);

--
-- Indeks untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kepseks`
--
ALTER TABLE `kepseks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kepseks_nip_unique` (`nip`);

--
-- Indeks untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indeks untuk tabel `pendaftars`
--
ALTER TABLE `pendaftars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengujis`
--
ALTER TABLE `pengujis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `petugas_email_unique` (`email`);

--
-- Indeks untuk tabel `skalas`
--
ALTER TABLE `skalas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testss`
--
ALTER TABLE `testss`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aspeks`
--
ALTER TABLE `aspeks`
  MODIFY `id_aspek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `faktors`
--
ALTER TABLE `faktors`
  MODIFY `id_faktor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `gaps`
--
ALTER TABLE `gaps`
  MODIFY `id_gap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `hasils`
--
ALTER TABLE `hasils`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kepseks`
--
ALTER TABLE `kepseks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pendaftars`
--
ALTER TABLE `pendaftars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengujis`
--
ALTER TABLE `pengujis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `skalas`
--
ALTER TABLE `skalas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `testss`
--
ALTER TABLE `testss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
