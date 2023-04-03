-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for samba
CREATE DATABASE IF NOT EXISTS `samba` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `samba`;

-- Dumping structure for table samba.absensis
CREATE TABLE IF NOT EXISTS `absensis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `guru_id` bigint(20) unsigned NOT NULL,
  `mapel_id` bigint(20) unsigned NOT NULL,
  `kelas_id` bigint(20) unsigned NOT NULL,
  `pertemuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` datetime NOT NULL,
  `telah_diisi` tinyint(1) NOT NULL DEFAULT '0',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table samba.absensis: ~0 rows (approximately)
DELETE FROM `absensis`;
/*!40000 ALTER TABLE `absensis` DISABLE KEYS */;
/*!40000 ALTER TABLE `absensis` ENABLE KEYS */;

-- Dumping structure for table samba.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table samba.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table samba.gurus
CREATE TABLE IF NOT EXISTS `gurus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table samba.gurus: ~2 rows (approximately)
DELETE FROM `gurus`;
/*!40000 ALTER TABLE `gurus` DISABLE KEYS */;
INSERT INTO `gurus` (`id`, `user_id`, `nip`, `foto`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
	(1, 2, '10181069', 'PORBIKAWA.png', 'Sinjai', '2002-01-19', 'Perempuan', 'jl.banana', NULL, NULL),
	(2, 5, '10181068', 'Ridha Auliya.jpg', 'Balikpapan', '1998-05-18', 'Perempuan', 'Jl. Jend. A. Yani Rt. 44 No. 64 Kelurahan Gn. Sari ilir, Kecamatan Balikpapan Kota', '2023-04-01 04:36:35', '2023-04-01 04:36:35');
/*!40000 ALTER TABLE `gurus` ENABLE KEYS */;

-- Dumping structure for table samba.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` bigint(20) unsigned NOT NULL,
  `guru_id` bigint(20) unsigned NOT NULL,
  `tingkat_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table samba.kelas: ~6 rows (approximately)
DELETE FROM `kelas`;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` (`id`, `tahun_ajaran_id`, `guru_id`, `tingkat_kelas`, `kode_kelas`, `semester`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, '1', 'Salman', '1', '2023-04-01 04:32:09', '2023-04-01 04:32:09'),
	(2, 1, 2, '2', 'Lukman', '1', '2023-04-01 04:32:09', '2023-04-01 04:32:09'),
	(3, 1, 2, '3', 'Ikhwan', '1', '2023-04-01 04:32:09', '2023-04-01 04:32:09'),
	(4, 1, 2, '4', 'Thoriq', '1', '2023-04-01 04:32:09', '2023-04-01 04:32:09'),
	(5, 1, 2, '5', 'Umar', '1', '2023-04-01 04:32:09', '2023-04-01 04:32:09'),
	(6, 1, 2, '6', 'Mars', '1', '2023-04-01 04:32:09', '2023-04-01 04:32:09');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;

-- Dumping structure for table samba.mapels
CREATE TABLE IF NOT EXISTS `mapels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `guru_id` bigint(20) unsigned NOT NULL,
  `tahun_ajaran_id` bigint(20) unsigned NOT NULL,
  `mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kkm` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table samba.mapels: ~0 rows (approximately)
DELETE FROM `mapels`;
/*!40000 ALTER TABLE `mapels` DISABLE KEYS */;
/*!40000 ALTER TABLE `mapels` ENABLE KEYS */;

-- Dumping structure for table samba.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table samba.migrations: ~12 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2021_11_18_121223_create_gurus_table', 1),
	(6, '2021_11_19_102219_create_siswas_table', 1),
	(7, '2021_12_06_074030_create_kelas_table', 1),
	(8, '2021_12_06_081256_create_mapels_table', 1),
	(9, '2021_12_06_094751_create_absensis_table', 1),
	(10, '2021_12_06_101140_create_nilais_table', 1),
	(11, '2023_02_27_064113_create_tahun__ajarans_table', 1),
	(12, '2023_02_27_064623_create_tugas_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table samba.nilais
CREATE TABLE IF NOT EXISTS `nilais` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `guru_id` bigint(20) unsigned NOT NULL,
  `mapel_id` bigint(20) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` double(8,2) NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table samba.nilais: ~0 rows (approximately)
DELETE FROM `nilais`;
/*!40000 ALTER TABLE `nilais` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilais` ENABLE KEYS */;

-- Dumping structure for table samba.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table samba.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table samba.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table samba.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table samba.siswas
CREATE TABLE IF NOT EXISTS `siswas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `kelas_id` bigint(20) unsigned NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table samba.siswas: ~1 rows (approximately)
DELETE FROM `siswas`;
/*!40000 ALTER TABLE `siswas` DISABLE KEYS */;
INSERT INTO `siswas` (`id`, `user_id`, `kelas_id`, `tgl_lahir`, `nisn`, `tempat_lahir`, `jenis_kelamin`, `foto`, `alamat`, `nama_wali`, `created_at`, `updated_at`) VALUES
	(1, 4, 6, '2002-01-19', '10191069', 'Sinjai', 'Perempuan', 'Nur Syahriza Amaliyah.jpg', 'Jl. Sei Wain Km. 15', 'Bapaknya', '2023-04-01 04:34:37', '2023-04-01 04:34:37');
/*!40000 ALTER TABLE `siswas` ENABLE KEYS */;

-- Dumping structure for table samba.tahun__ajarans
CREATE TABLE IF NOT EXISTS `tahun__ajarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table samba.tahun__ajarans: ~1 rows (approximately)
DELETE FROM `tahun__ajarans`;
/*!40000 ALTER TABLE `tahun__ajarans` DISABLE KEYS */;
INSERT INTO `tahun__ajarans` (`id`, `tahun`, `created_at`, `updated_at`) VALUES
	(1, '2022/2023', '2023-04-01 04:32:09', '2023-04-01 04:32:09');
/*!40000 ALTER TABLE `tahun__ajarans` ENABLE KEYS */;

-- Dumping structure for table samba.tugas
CREATE TABLE IF NOT EXISTS `tugas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `guru_id` bigint(20) unsigned NOT NULL,
  `mapel_id` bigint(20) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table samba.tugas: ~0 rows (approximately)
DELETE FROM `tugas`;
/*!40000 ALTER TABLE `tugas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tugas` ENABLE KEYS */;

-- Dumping structure for table samba.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nomor_induk_unique` (`nomor_induk`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table samba.users: ~5 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nama`, `email`, `nomor_induk`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Syams Tsaqib', 'admin@gmail.com', '10191084', 'Admin', NULL, '$2y$10$1/iyFRCN3dRnDDyWhyWJGeovkBRH/h.BD7ak7rD/nG30LHOPHXLze', NULL, '2023-04-01 04:32:08', '2023-04-01 04:32:08'),
	(2, 'Guru', 'ridha@gmail.com', '10181069', 'Guru', NULL, '$2y$10$P1nUfLbAEPMkYPVCIAVANeXhuIgaE.sPxnAYss2ri9FZIu6BtHMWW', NULL, '2023-04-01 04:32:08', '2023-04-01 04:32:08'),
	(3, 'Rhoy', 'rhoy@gmail.com', '76131', 'WaliSiswa', NULL, '$2y$10$eAeOyQ8qItX.YqFZEtq8ceZ8pSrqlfnpPFti1Z9nU1UTQHEFZfbvu', NULL, '2023-04-01 04:32:09', '2023-04-01 04:32:09'),
	(4, 'Nur Syahriza Amaliyah', '10191069@student.itk.ac.id', '10191069', 'WaliSiswa', NULL, '$2y$10$StBq5Vu8psYjaJGp1.kCR.9ctnF6qJmpK1InJNqXrX/EJZpzaIKoC', NULL, '2023-04-01 04:34:37', '2023-04-01 04:34:37'),
	(5, 'Ridha Auliya', '10181068@student.itk.ac.id', '10181068', 'Guru', NULL, '$2y$10$cMMiCD2/7sRQSy/JL43mNepi35hxYHsVOClJCwf5gAQ0uS4fUV3rG', NULL, '2023-04-01 04:36:35', '2023-04-01 04:36:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
