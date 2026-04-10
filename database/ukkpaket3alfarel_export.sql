-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ukkpaket3alfarel
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin1','$2y$12$TGN2zzIkScEf7veAPJakN.zW1xUB/4dmGirdi/OYKWmUiHHqQy1Ea');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aspirases`
--

DROP TABLE IF EXISTS `aspirases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aspirases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('menunggu','proses','selesai') NOT NULL DEFAULT 'menunggu',
  `input_aspirasi_id` bigint(20) unsigned NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aspirases_input_aspirasi_id_foreign` (`input_aspirasi_id`),
  CONSTRAINT `aspirases_input_aspirasi_id_foreign` FOREIGN KEY (`input_aspirasi_id`) REFERENCES `input_aspirases` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspirases`
--

LOCK TABLES `aspirases` WRITE;
/*!40000 ALTER TABLE `aspirases` DISABLE KEYS */;
INSERT INTO `aspirases` VALUES (1,'proses',1,'Ruang Kelas 12A','Sedang ditindaklanjuti oleh tim sarpras.','2026-04-09 20:38:11','2026-04-09 20:38:11'),(2,'menunggu',2,'lab 2','Belum ada tanggapan.','2026-04-09 20:38:11','2026-04-09 20:38:11'),(3,'menunggu',3,'lab 2','Belum ada tanggapan.','2026-04-09 20:38:11','2026-04-09 20:38:11'),(4,'proses',4,'lab 2','Belum ada tanggapan.','2026-04-09 20:38:11','2026-04-09 20:38:11'),(5,'menunggu',5,'Ruang 101','Belum ada tanggapan.','2026-04-09 20:38:11','2026-04-09 20:38:11'),(6,'selesai',6,'lab 2','udh gw benerin ya','2026-04-09 20:38:11','2026-04-09 20:38:11'),(7,'menunggu',7,'lab 2','Belum ada tanggapan.','2026-04-09 20:44:36','2026-04-09 20:44:36'),(8,'selesai',8,'lab 2','hello juga','2026-04-09 21:09:16','2026-04-09 21:12:09'),(9,'menunggu',9,'lapangan belakang neskar','Belum ada tanggapan.','2026-04-09 21:17:10','2026-04-09 21:17:10'),(10,'selesai',10,'lapangan belakang neskar','iyak, nanti di piket in','2026-04-10 04:22:14','2026-04-10 04:22:56');
/*!40000 ALTER TABLE `aspirases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `input_aspirases`
--

DROP TABLE IF EXISTS `input_aspirases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `input_aspirases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `kategori_id` bigint(20) unsigned NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `input_aspirases_siswa_id_foreign` (`siswa_id`),
  KEY `input_aspirases_kategori_id_foreign` (`kategori_id`),
  CONSTRAINT `input_aspirases_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`),
  CONSTRAINT `input_aspirases_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`nis`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `input_aspirases`
--

LOCK TABLES `input_aspirases` WRITE;
/*!40000 ALTER TABLE `input_aspirases` DISABLE KEYS */;
INSERT INTO `input_aspirases` VALUES (1,1,1,'Ruang Kelas 12A','Lampu padam sejak kemarin','2026-04-09 20:24:14','2026-04-09 20:24:14'),(2,2,1,'lab 2','stop kontak ga nyala','2026-04-09 20:24:14','2026-04-09 20:24:14'),(3,3,1,'lab 2','stok kontak rusak','2026-04-09 20:24:14','2026-04-09 20:24:14'),(4,4,1,'lab 2','stok kontal rusak','2026-04-09 20:24:14','2026-04-09 20:24:14'),(5,99999999,1,'Ruang 101','Lampu mati','2026-04-09 20:24:14','2026-04-09 20:24:14'),(6,83,1,'lab 2','helmi ngerusakin kipas','2026-04-09 20:24:14','2026-04-09 20:24:14'),(7,23245178,1,'lab 2','hekmi rusakin stop kontak','2026-04-09 20:44:36','2026-04-09 20:44:36'),(8,23245178,2,'lab 2','hhi','2026-04-09 21:09:16','2026-04-09 21:09:16'),(9,23245178,3,'lapangan belakang neskar','sempit banget, yang parkir ga jelas','2026-04-09 21:17:10','2026-04-09 21:17:10'),(10,23245178,4,'lapangan belakang neskar','kotor','2026-04-10 04:22:14','2026-04-10 04:22:14');
/*!40000 ALTER TABLE `input_aspirases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategoris`
--

DROP TABLE IF EXISTS `kategoris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategoris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ket_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategoris`
--

LOCK TABLES `kategoris` WRITE;
/*!40000 ALTER TABLE `kategoris` DISABLE KEYS */;
INSERT INTO `kategoris` VALUES (1,'Kelistrikan'),(2,'kebersihan'),(3,'lahan parkir'),(4,'toilet');
/*!40000 ALTER TABLE `kategoris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_04_09_143509_create_admins_table',1),(5,'2026_04_09_143519_create_siswas_table',1),(6,'2026_04_09_143530_create_kategoris_table',1),(7,'2026_04_09_143546_create_input_aspirases_table',1),(8,'2026_04_09_143554_create_aspirases_table',1),(9,'2026_04_10_031856_add_timestamps_to_input_aspirases_table',2),(10,'2026_04_10_060000_add_timestamps_to_aspirases_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('1JwzXTqew6JbQ5fGcApnYdLMmP1txMmmjywwZyuy',1,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiIybExRWjVHM2NsUGtHTEM2RkdaR0MzUlZTRGdaangzZ2NybFRZQjgwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvYXNwaXJhc2kiLCJyb3V0ZSI6ImFkbWluLmFzcGlyYXNpLmluZGV4LnBhZ2UifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1775789720),('2XIEc26gimVsIhETgUk9DuPpFCGssDYKJ0jNzhoT',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJLU2RxczVlYWhIcElYZDUzV2h4dk5ndEozVGZLeEc1ajF5VFlWNHdIIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaXN3YVwvaGlzdG9yeSIsInJvdXRlIjoic2lzd2EuaGlzdG9yeSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1775789176),('2XP13SIa00hNH1FdU7wVHwJcx9TYuUcwqTuL3ERd',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiI0bFpFU0JrUUEzMndhZElLVGZIWlFlTXVKQjhRcHVFZXlJanhNcndMIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvbG9naW4iLCJyb3V0ZSI6ImFkbWluLmxvZ2luLmZvcm0ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1775788469),('4lNjdRLYiqDfQO7VGethkG9aAGD0CtptPPIj17kY',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJUS1NnaGRrOFBFV3RBdHJTQjdzMmtINVZZWHpMbFBINVU3V0E3NzVSIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaXN3YVwvY2VrLXN0YXR1cyIsInJvdXRlIjoic2lzd2EuY2VrLXN0YXR1cyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1775791187),('aD0GAvTqdUA4gPrFj4VaKVi06aoP12Gx3BNgoLce',1,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJvclgyUlp6cTk1THpaTm4yWkZaSnJsQkNTTnkxNlZZT2owUkJGb1g4IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvbGFwb3JhbiIsInJvdXRlIjoiYWRtaW4ubGFwb3Jhbi5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1775791978),('b3M6TNh4YO7SHXIB4DyYit5IGDdQAT0snGnc1NKK',1,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJGUktSdUR3QmRVWVNhTHljWEhOR2p2OVI1dHBXY2xDSVBxRFM0SG9jIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwva2F0ZWdvcmkiLCJyb3V0ZSI6ImFkbWluLmthdGVnb3JpLmluZGV4LnBhZ2UifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1775793023),('B4FGpV9KkQOfN8bdZ6pktyt64plDnjhJbsKimUi8',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiI2RnU3UXplRW94THI0aEtaYVpGTlEzV2dGaXZJVm9iWmdtaDgzNjRvIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaXN3YVwvaGlzdG9yeSIsInJvdXRlIjoic2lzd2EuaGlzdG9yeSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1775792536),('Be8WZs44HR0LfjJq08lzWkjvlauDGG60qdJmubzl',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiI0Y1E5eG9CcXRDNXl2WnlBVG1WemlDa0I4ZEpjWUtlVE5JNmtHaU0xIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaXN3YVwvaGlzdG9yeSIsInJvdXRlIjoic2lzd2EuaGlzdG9yeSJ9LCJfZmxhc2giOnsib2xkIjpbIl9vbGRfaW5wdXQiLCJlcnJvcnMiXSwibmV3IjpbXX0sIl9vbGRfaW5wdXQiOnsiX3Rva2VuIjoiNGNROXhvQnF0QzV5dlp5QVRtVnppQ2tCOGRKY1lLZVROSTZrR2lNMSIsImtlbGFzIjpudWxsLCJsb2thc2kiOm51bGwsIm5hbWEiOm51bGwsImthdGVnb3JpX2lkIjpudWxsLCJrZXRlcmFuZ2FuIjpudWxsfSwiZXJyb3JzIjp7ImRlZmF1bHQiOnsiZm9ybWF0IjoiOm1lc3NhZ2UiLCJtZXNzYWdlcyI6eyJrZWxhcyI6WyJLZWxhcyB3YWppYiBkaWlzaS4iXSwia2F0ZWdvcmlfaWQiOlsiS2F0ZWdvcmkgd2FqaWIgZGlwaWxpaC4iXSwibG9rYXNpIjpbIkxva2FzaSB3YWppYiBkaWlzaS4iXSwia2V0ZXJhbmdhbiI6WyJEZXRhaWwga2VsdWhhbiB3YWppYiBkaWlzaS4iXX19fX0=',1775789090),('bNNaEnyiqyo1yHF8qu1GraM6DPqBzZvpcsEMbyVm',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJhOEZyamFpSEJsTHBtN096MWxYNUxOMWpCRlBtbHN0NFMzOHFmZ0pLIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaXN3YVwvY2VrLXN0YXR1cz9zdGF0dXM9c2VsZXNhaSIsInJvdXRlIjoic2lzd2EuY2VrLXN0YXR1cyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1775792142),('Ceu0c3fj8VK4MFtEn7j5CQvRvLib0VEvtfbw6yEz',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 Edg/146.0.0.0','eyJfdG9rZW4iOiJ2S0dnQ3hnWGhxckxuRjZvMklpTlFMSjQ4MW9TRHVpYlRjdXhBVHNIIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2FkbWluXC9hc3BpcmFzaSIsInJvdXRlIjoiYWRtaW4uYXNwaXJhc2kuaW5kZXgucGFnZSJ9LCJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1775802379),('dheNq4w3gSdquT8wC3rf8Jhs8euzA2fJNiIOsVYK',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiIzcWVBbEhsYk5GeTZDQTBtWldSMThzY2xrM0UxMnRWMlM4QXIwQUw5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaXN3YVwvY2VrLXN0YXR1cz9zZWFyY2g9MSIsInJvdXRlIjoic2lzd2EuY2VrLXN0YXR1cyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1775790575),('EiNxFWYy0mShwiolDzud9L4z6ValLHCilT3zUYWz',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJJbmVPbVFRQVdMQ3VWa1AwMTJ3S3R6bHdtTG9JbGNiZlZFbXdpMFBZIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2FkbWluXC9sYXBvcmFuIn0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYWRtaW5cL2xvZ2luIiwicm91dGUiOiJhZG1pbi5sb2dpbi5mb3JtIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1775792334),('exH7m7lCgv9m7h4xu6pVD7Qtw31ajdNAc5zQV822',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJSbDN1eHJwUzR1TkttU1h3bXF6dFdYNDhJc2Jmdm5IcnBaaGtOSDdnIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaXN3YVwvaGlzdG9yeSIsInJvdXRlIjoic2lzd2EuaGlzdG9yeSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1775792588),('he8ZDOI5If3y9lGDH8hBLf7Un8Z74jBLNiZfRji9',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJkcENLdG1Kd0pLa2Y1bU1GbFY4aVVrcGxnQ0xKWkpBWlZycFNuMzlaIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJzaXN3YS5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1775792350),('IaxKdPojExBT3dv6aSaRGDE8STBhMgwfeW4BdbvC',1,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJlVnp1SG41b09mc0Z0bTdXSGRUdXhHQU9zQkRnRGp5b0tQTTJiQ0d3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwva2F0ZWdvcmlcL2NyZWF0ZSIsInJvdXRlIjoiYWRtaW4ua2F0ZWdvcmkuY3JlYXRlLnBhZ2UifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1775793307),('IDClUeH7KRCVwOoRDSccNugvJCDHYC9PI7rJhzEE',1,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJ2WklTcWF3RkZ2bXFtaEhHVTYwN1J3OWg5Y1d1NHIxaEg2a0lOR2lFIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvbGFwb3JhbiIsInJvdXRlIjoiYWRtaW4ubGFwb3Jhbi5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1775792417),('IxfHDg18p34zNlj2zjHWO8N0y0m3QohqMBqJWXmS',1,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJqR1IxUXZsTzZ2VDFGSmVwU1ZPV0FJNWNsajJhTFpMSWpxQ3NwQkdTIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvYXNwaXJhc2kiLCJyb3V0ZSI6ImFkbWluLmFzcGlyYXNpLmluZGV4LnBhZ2UifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1775791466),('kOuLoyYaOv0y2NMa4oP6rc3tPKjm0wAISTVMVN9E',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiIwalFXOWlyaHV0RXNtWnJGMTlDWldmY01Ja2szbHM4Q08wSGhReGRKIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaXN3YVwvY2VrLXN0YXR1cyIsInJvdXRlIjoic2lzd2EuY2VrLXN0YXR1cyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1775789719),('LOQf3Jjg2XIO9y4QnPWXBFbjbd28W1JtUbKdSvp0',1,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiIzSGVlOFU2VE8ycjN4VnY5eVIzM043UDN0VHptSzY2NTdTc2xydUxmIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvYXNwaXJhc2lcLzEiLCJyb3V0ZSI6ImFkbWluLmFzcGlyYXNpLnNob3cucGFnZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1775790071),('MgoPqHRTNrLaSYdcRiNtnpfRAoCICqqZR6xcJsDy',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJLeVVPVG5Zd1cxdEp2Ym9ISnI0SlczeHNyT0lndWVTYWZiWUh2T1c1IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1775788659),('mVXPLqJXw5SyekCCflvPkIAqyPZP10OZbZ8dZCuV',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJpVGMwVUdrM0RneVlDWklMUkx6RTh4cnR2c014b3FEVzdVZTBwRzY3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaXN3YVwvY2VrLXN0YXR1cyIsInJvdXRlIjoic2lzd2EuY2VrLXN0YXR1cyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1775791466),('nGzHyyF9UwKnPuRQQBSSqTADLZ9SU7bKXPbHJbMU',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJKZzBZb1lwOElKNWVTUzBocG5nRTM2VUgyQ1Y4d1drZlc1M3U2WXVkIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJzaXN3YS5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1775792306),('ohILxbilgK7WkKU0I86zlAoZdmKdRSOdSxlbFLK0',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJGMUswRmRTd0hVZjZtaW9yNGFqemZRTW81R1RnMFZFM3loTmppQTZPIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaXN3YVwvY2VrLXN0YXR1cyIsInJvdXRlIjoic2lzd2EuY2VrLXN0YXR1cyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1775792142),('Q8YrX5b9Yv1WwGZm8sR9n8kDpYT8o6KR7Qx1XsKn',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJjTzA0S003bUR1QmdJd3JpMHNFQVhHS2hYSFNadDVRZ1VJZmkwZk5BIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaXN3YVwvaGlzdG9yeSIsInJvdXRlIjoic2lzd2EuaGlzdG9yeSJ9LCJfZmxhc2giOnsib2xkIjpbInN1Y2Nlc3MiLCJsYXBvcmFuX2lkIl0sIm5ldyI6W119LCJzdWNjZXNzIjoiQXNwaXJhc2kgYmVyaGFzaWwgZGlraXJpbS4iLCJsYXBvcmFuX2lkIjo1fQ==',1775790939),('qaZ5uxDj9FPN0BgL4piSiLP7QUoOP1lBqtfTbqB6',1,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJlNXFxMmxKNndEakFoazRaVW5EdlFNb3ZaVnVKVWJiM3V2WE5qc3lLIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvZGFzaGJvYXJkIiwicm91dGUiOiJhZG1pbi5kYXNoYm9hcmQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1775790244),('qn5QFy6G7wde1T7qk6SC78fB3LyY8Rplhv2HfEcy',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJHTkFtTkkzaTNBUnVUZXBnSzVqc1drb2NXblQ1SGduT0tJSUhUVnByIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaXN3YVwvaGlzdG9yeSIsInJvdXRlIjoic2lzd2EuaGlzdG9yeSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1775789090),('rHrvsGzAZ3gMoITZPE4bUO9oYQlE8ncTcfeubk5J',1,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiI4S3ZnVFFBdzFLUktJRmlHandhNG5EUmxNNXVOeDR4U3RwR3dYTlJvIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvYXNwaXJhc2kiLCJyb3V0ZSI6ImFkbWluLmFzcGlyYXNpLmluZGV4LnBhZ2UifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1775791188),('skvx9gamQSBaoxIGbi27PXf6jkQvWF92hVA7YZ86',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJIcVA3NzNNVTVFdjdwNWRNejA0QkJ3RGo3c2xXc3lRMDlXRTFDaEtxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvbG9naW4iLCJyb3V0ZSI6ImFkbWluLmxvZ2luLmZvcm0ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1775788546),('wMazHUjmXiA2MYhWs8GW3UWfaqD6gsuAXvQ7coh9',1,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJ6aWJRTGlOdWhGVk1kMGxUWktGaGdpTXFHWHZtVGRIZ1J1ekhSNHY2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwva2F0ZWdvcmkiLCJyb3V0ZSI6ImFkbWluLmthdGVnb3JpLmluZGV4LnBhZ2UifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1775793147),('WtQ71q6N5mGiGJ6tjqKrfWb2erZKv8a8a6HDcWHr',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJjc1ZTN3lLbXVMMkpueUI4TlVlS2N3Q2EwUzkwRVlXaHRud2lzWlJqIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaXN3YVwvc3VjY2VzcyIsInJvdXRlIjoic2lzd2Euc3VjY2VzcyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1775789176),('xeuLDr5dUlSOzWCBI3cKU8644JPgUSaCOpMJYrlw',1,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJrR1dzTnRZSG52bDFxMTNoMUpoT2hIYmNvWW02RHhQb0V1WTg0YXR0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvYXNwaXJhc2k/c3RhdHVzPXNlbGVzYWkiLCJyb3V0ZSI6ImFkbWluLmFzcGlyYXNpLmluZGV4LnBhZ2UifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1775793494),('XiQYvUIXm0nzKHMD9aHKZ6zKUTiUe81OPijMTUCN',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJYUjQxaHdYUmRGRnNrWGRXZWdNVTdQT3pEQzc5SzFqSU93elQyT0pDIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaXN3YVwvaGlzdG9yeSIsInJvdXRlIjoic2lzd2EuaGlzdG9yeSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1775790575),('XXWAhsrZqTDEc6SpEosPqbC8ETvGhbS5gUlmFYeJ',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7920','eyJfdG9rZW4iOiJsMDBqUDBrbkZ6aVVycmt4V2F1NFN4cGw4MlNtZ2ZBbkNHNHozWTkxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvbG9naW4iLCJyb3V0ZSI6ImFkbWluLmxvZ2luLmZvcm0ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1775789720);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswas`
--

DROP TABLE IF EXISTS `siswas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswas` (
  `nis` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kelas` varchar(10) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB AUTO_INCREMENT=100000000 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswas`
--

LOCK TABLES `siswas` WRITE;
/*!40000 ALTER TABLE `siswas` DISABLE KEYS */;
INSERT INTO `siswas` VALUES (1,'XII IPA 1'),(2,'12 rpl 2'),(3,'12 rpl 2'),(4,'12 rpl 2'),(83,'-'),(23245178,'-'),(99999999,'-');
/*!40000 ALTER TABLE `siswas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-10 13:45:41
