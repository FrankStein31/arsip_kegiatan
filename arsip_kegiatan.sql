/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - arsip_kegiatan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`arsip_kegiatan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `arsip_kegiatan`;

/*Table structure for table `rekaps` */

DROP TABLE IF EXISTS `rekaps`;

CREATE TABLE `rekaps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL,
  `dokumentasi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `rekaps` */

insert  into `rekaps`(`id`,`nama`,`kegiatan`,`lokasi`,`tanggal`,`keterangan`,`dokumentasi`,`created_at`,`updated_at`) values 
(7,'Pak Didik','Pengecekan Traficc light','Jalan Sawojajar','2024-11-16','Mengganti Traffic light yang baru','dokumentasi/ocCfjJMD3mbaMfX3B6QPkxUQrbz2eQxOtsGghNgS.jpg','2024-11-19 15:33:05','2024-11-19 15:34:34'),
(8,'Pak Rio','Perawatan Traffic Light','Jalan Soekarno Hatta','2024-11-17','Pengecekan Arus Listrik Pada Traffic Light','dokumentasi/krLPS9h2HVMLOelqwBHEFasMnahEPof29YXCKUz3.jpg','2024-11-19 15:44:10','2024-11-19 15:44:10'),
(9,'Pak Didik','Perawatan Rambu Jalan','Jalan Kaliurang','2024-11-18','Perbaikan Papan Rambu','dokumentasi/NTyJZdpNY34ArBbgVgqrMuozUHLNGS7ynacfR9qj.jpg','2024-11-19 15:48:39','2024-11-19 15:48:39');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`last_name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin','admin','admin@gmail.com',NULL,'$2y$12$issekyzgQetzZhrrwryJxe4AlkDatYqFmOmjCjnl/0ilIevqzwM02',NULL,'2024-07-19 07:09:25','2024-07-19 07:09:25');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
