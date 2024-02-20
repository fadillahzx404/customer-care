-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `category_services`;
CREATE TABLE `category_services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_services` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `category_services` (`id`, `name_services`, `created_at`, `updated_at`) VALUES
(1,	'Permasalahan 1',	'2024-01-24 11:02:02',	'2024-01-24 11:06:19'),
(3,	'Permasalahan 2',	'2024-01-24 11:02:02',	'2024-01-24 11:06:19');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2024_01_24_124126_create_sessions_table',	1),
(7,	'2024_01_24_174244_add_category_service_table',	1),
(8,	'2024_01_24_174414_add_column_on_category_service_table',	2),
(9,	'2024_01_24_193141_add_support_table',	3),
(10,	'2024_01_24_193214_add_support_detail_table',	4),
(11,	'2024_01_24_200922_create_supports_table',	5),
(12,	'2024_01_24_210913_add_table_photo_support',	5);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `photo_support`;
CREATE TABLE `photo_support` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `photo_support` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(1,	'images/photo_support/zzNwh6s0oEAkCRfebdaZEf8KidfIhziacg3Zo8vM.png',	'2024-01-25 07:15:45',	'2024-01-25 07:15:45'),
(3,	'images/photo_support/eXXoLkkloW2pDXk8kDTgHPtDRI6iWdtt7TLAe22Q.png',	'2024-01-25 08:39:10',	'2024-01-25 08:39:10'),
(4,	'images/photo_support/3H1j4Xjo3ZizbL25O5tLjEFwATRHLRPnu7zjckzL.png',	'2024-01-25 08:39:31',	'2024-01-25 08:39:31'),
(5,	'images/photo_support/5usTFEI8muE78dD7SAb8TAWxoYMNszrbw9EfOkyO.png',	'2024-01-25 08:39:34',	'2024-01-25 08:39:34'),
(6,	'images/photo_support/QehhOj1udoNNW95pdtmM5kZk0qzODKUfxksejnOr.png',	'2024-01-25 08:39:38',	'2024-01-25 08:39:38'),
(7,	'images/photo_support/x1XEPAVxgxP7ywCqVelIqXCR1O4qsUQNSAgQ32uX.png',	'2024-01-25 08:39:41',	'2024-01-25 08:39:41'),
(8,	'images/photo_support/ZorpPhiYuflvsgJ3tP82p6HUhK8uo2l9DMcOyco5.png',	'2024-01-25 08:39:45',	'2024-01-25 08:39:45'),
(9,	'images/photo_support/7f23HPRbfO9CSnMX8zEVBt2DMWzj0bqGVwgEgHP8.png',	'2024-01-25 08:39:48',	'2024-01-25 08:39:48'),
(10,	'images/photo_support/jFDJ11MGwrcxOvAns0QeNRCmbm4bRR80zluhJe3r.png',	'2024-01-25 08:39:52',	'2024-01-25 08:39:52'),
(11,	'images/photo_support/uD9AUozshn6ogYL46qC1T5W2wRuMZMcpcGrZ697U.png',	'2024-01-25 08:39:55',	'2024-01-25 08:39:55'),
(12,	'images/photo_support/9UTdkgZ8aqw6ALwuwaM1Tbeow2sbD10YmJQeIU66.png',	'2024-01-25 08:40:03',	'2024-01-25 08:40:03'),
(13,	'images/photo_support/TjtHnO1OvctVsyOO1xciajy9SQ9g0kc4J7hRgx66.png',	'2024-01-25 08:40:09',	'2024-01-25 08:40:09'),
(14,	'images/photo_support/BtsZSyrWSOeJGhnZCERm7nFqun60fk7haGbfchD1.png',	'2024-01-25 08:41:20',	'2024-01-25 08:41:20'),
(15,	'images/photo_support/7zJbx8fVSY4vdmCP1SyaTWHShqqSA39sSyKiCjFI.png',	'2024-01-25 08:41:28',	'2024-01-25 08:41:28'),
(16,	'images/photo_support/wHvii9SRkrWQDUlV9EinCCUk56LdwkozFrzoMPcb.jpg',	'2024-01-25 08:42:02',	'2024-01-25 08:42:02'),
(17,	'images/photo_support/8E5xo2UcRrvMYWAfipXamvB92oPn5yYFm3CSwEw6.png',	'2024-01-25 11:56:08',	'2024-01-25 11:56:08');

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4LHDAtb9wfkWn1QynUiCOp611A1qvIbI1TdIkBUe',	4,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',	'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVVRQTVpMSFFpYmRQamJOR2VJNUJQSkpYUU9Rb0ZJaFZweWdFZmtueSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHA6Ly9jdXN0b21lci1jYXJlLnRlc3Qvc3VwcG9ydC1hZG1pbi9XT0k0VHRVRlZWN2UvZWRpdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkMWJsdXFMcmdnOFdVMmhrL2l2MEc3T0VEcWxlQmpUMHpIMFJNckRqbG5oWi8wV2tZdTBXL1MiO30=',	1706219507),
('px8MooJa1uoNQ5Otc3AxfKBxBDuPmdQWtlaNng2V',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRzh2eEhhajFmNU5UNVNtaDFmU3FGT0VpOGhmY1MzdDA3enpoQW9CdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9jdXN0b21lci1jYXJlLnRlc3QvcmVnaXN0ZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',	1708053365);

DROP TABLE IF EXISTS `support`;
CREATE TABLE `support` (
  `id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_id` bigint unsigned NOT NULL,
  `id_cat_services` bigint unsigned NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_support_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `support_users_id_foreign` (`users_id`),
  KEY `support_id_cat_services_foreign` (`id_cat_services`),
  CONSTRAINT `support_id_cat_services_foreign` FOREIGN KEY (`id_cat_services`) REFERENCES `category_services` (`id`),
  CONSTRAINT `support_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `support` (`id`, `users_id`, `id_cat_services`, `description`, `status`, `photo_support_id`, `created_at`, `updated_at`) VALUES
('sdJQSTiVHvMP',	3,	1,	'capek.',	'Ticket Support Telah Ditutup.',	1,	'2024-01-25 07:15:45',	'2024-01-25 11:23:55'),
('WOI4TtUFVV7d',	3,	1,	'Hello Guys',	'Menunggu Di Balas Oleh Admin.',	17,	'2024-01-25 11:56:08',	'2024-01-25 12:55:08'),
('WOI4TtUFVV7e',	3,	1,	'Hello Guys',	'Menunggu Di Balas Oleh Anda.',	17,	'2024-01-25 11:56:08',	'2024-01-25 14:29:36'),
('WOI4TtUFVV7x',	3,	1,	'Hello Guys',	'Menunggu Di Balas Oleh Anda.',	17,	'2024-01-25 11:56:08',	'2024-01-25 12:55:08');

DROP TABLE IF EXISTS `support_details`;
CREATE TABLE `support_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_support` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_id` bigint unsigned NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_support` (`id_support`),
  CONSTRAINT `support_details_ibfk_1` FOREIGN KEY (`id_support`) REFERENCES `support` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `support_details` (`id`, `id_support`, `users_id`, `description`, `photo_details`, `created_at`, `updated_at`) VALUES
(2,	'sdJQSTiVHvMP',	4,	'capek.',	'images/photo_details/5zf58eDlwB7euIVBbZmdfG7hV9djIkzYFL3l2QgB.png',	'2024-01-25 10:16:56',	'2024-01-25 10:16:56'),
(3,	'sdJQSTiVHvMP',	3,	'Istirahat.',	'images/photo_details/5zf58eDlwB7euIVBbZmdfG7hV9djIkzYFL3l2QgB.png',	'2024-01-25 10:16:56',	'2024-01-25 10:16:56'),
(5,	'WOI4TtUFVV7d',	4,	'Hello Guys',	'images/photo_details/w5lzLEuNmTfd0ca7znpx4Rwubjw063HRsP1xFOk8.jpg',	'2024-01-25 12:38:49',	'2024-01-25 12:38:49'),
(6,	'WOI4TtUFVV7d',	3,	'Hello Juga Guys.',	NULL,	'2024-01-25 12:52:21',	'2024-01-25 12:52:21'),
(7,	'WOI4TtUFVV7d',	4,	'Salken Guys.',	NULL,	'2024-01-25 12:54:15',	'2024-01-25 12:54:15'),
(8,	'WOI4TtUFVV7d',	3,	'Salken Juga ya Guys.',	NULL,	'2024-01-25 12:55:08',	'2024-01-25 12:55:08'),
(9,	'WOI4TtUFVV7e',	4,	'Hello Guys.',	NULL,	'2024-01-25 14:29:36',	'2024-01-25 14:29:36');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `roles`) VALUES
(1,	'master admin',	'masteradmin@gmail.com',	NULL,	'$2y$12$JXlbG/rgsq0soCmsyly14eGgeUK1kNCokZ/j6/AN4qoU6wBhAlqC2',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-01-24 10:57:06',	'2024-01-24 10:57:06',	'MASTER ADMIN'),
(3,	'user',	'user@gmail.com',	NULL,	'$2y$12$vhn3d5WNFesGCCeKvoCc0eQ.E7cY1Xmc12nbEG/yXexJCo05TWpl2',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-01-24 13:42:44',	'2024-01-24 13:42:44',	'USER'),
(4,	'admin',	'admin@gmail.com',	NULL,	'$2y$12$1bluqLrgg8WU2hk/iv0G7OEDqleBjT0zH0RMrDjlnhZ/0WkYu0W/S',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-01-25 07:18:07',	'2024-01-25 07:18:07',	'ADMIN');

-- 2024-02-20 15:10:06
