-- -------------------------------------------------------------
-- -------------------------------------------------------------
-- TablePlus 1.0.2
--
-- https://tableplus.com/
--
-- Database: mysql
-- Generation Time: (null)
-- -------------------------------------------------------------

DROP TABLE `practice`.`products`;


CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE `practice`.`sells`;


CREATE TABLE `sells` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sells_product_id_foreign` (`product_id`),
  CONSTRAINT `sells_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `practice`.`products` (`id`, `name`, `slug`, `price`, `quantity`, `created_at`, `updated_at`) VALUES 
(1, 'Blue T-Shirts', 'bts-new-year', 1750.00, 201, '2023-12-20 04:46:10', '2023-12-20 07:07:45'),
(2, 'Wire Brushes', 'wire-brush', 1500.00, 47, '2023-12-20 05:18:46', '2023-12-20 05:48:03'),
(3, 'Carbide Burrs', 'carbide-burrs', 1290.00, 39, '2023-12-20 05:19:07', '2023-12-20 07:07:55'),
(4, 'Flex Wheels for Aluminum', 'flex-wheels', 2900.00, 9, '2023-12-20 05:19:31', '2023-12-20 07:07:39'),
(5, 'Flap Discs', 'flap-discs', 880.00, 100, '2023-12-20 05:20:02', '2023-12-20 05:20:02'),
(6, 'RFD Disc Cutter', 'disc_cutter', 220.00, 89, '2023-12-20 05:20:28', '2023-12-20 07:07:50');

INSERT INTO `practice`.`sells` (`id`, `product_id`, `price`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES 
(1, 1, 1750.00, 2, 3500.00, '2023-11-20 05:22:14', '2023-12-20 07:08:34'),
(2, 6, 220.00, 1, 220.00, '2023-12-20 05:22:22', '2023-12-20 05:22:22'),
(3, 4, 2900.00, 5, 14500.00, '2023-12-20 05:22:26', '2023-12-20 05:22:26'),
(4, 1, 1750.00, 1, 1750.00, '2023-12-20 05:22:40', '2023-12-20 05:22:40'),
(5, 3, 1290.00, 6, 7740.00, '2023-11-20 05:22:48', '2023-12-20 07:08:34'),
(6, 2, 1500.00, 2, 3000.00, '2023-12-19 05:48:03', '2023-12-20 07:08:34'),
(7, 4, 2900.00, 1, 2900.00, '2023-12-20 05:48:11', '2023-12-20 05:48:11'),
(8, 6, 220.00, 2, 440.00, '2023-12-20 05:48:46', '2023-12-20 05:48:46'),
(9, 1, 1750.00, 1, 1750.00, '2023-12-20 05:48:53', '2023-12-20 05:48:53'),
(10, 3, 1290.00, 6, 7740.00, '2023-11-20 05:48:57', '2023-12-20 07:08:34'),
(11, 4, 2900.00, 3, 8700.00, '2023-12-20 05:49:04', '2023-12-20 05:49:04'),
(12, 3, 1290.00, 1, 1290.00, '2023-12-20 06:02:07', '2023-12-20 06:02:07'),
(13, 1, 1750.00, 2, 3500.00, '2023-12-19 06:03:45', '2023-12-20 06:49:51'),
(14, 1, 1750.00, 2, 3500.00, '2023-11-20 06:04:09', '2023-12-20 07:08:34'),
(15, 6, 220.00, 4, 880.00, '2023-12-20 06:06:14', '2023-12-20 06:06:14'),
(16, 4, 2900.00, 45, 130500.00, '2023-12-20 07:07:39', '2023-12-20 07:07:39'),
(17, 1, 1750.00, 1, 1750.00, '2023-12-20 07:07:45', '2023-12-20 07:07:45'),
(18, 6, 220.00, 4, 880.00, '2023-12-19 07:07:50', '2023-12-20 07:08:34'),
(19, 3, 1290.00, 2, 2580.00, '2023-12-20 07:07:55', '2023-12-20 07:07:55');

