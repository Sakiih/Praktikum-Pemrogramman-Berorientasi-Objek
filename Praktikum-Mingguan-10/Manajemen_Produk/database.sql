-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for manajemen_produk
CREATE DATABASE IF NOT EXISTS `manajemen_produk` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `manajemen_produk`;

-- Dumping structure for table manajemen_produk.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table manajemen_produk.products: ~10 rows (approximately)
INSERT INTO `products` (`id`, `name`, `price`, `stock`, `created_at`) VALUES
	(2, 'ASUS Vivobook Go 14', 6500000.00, 8, '2026-10-22 12:08:35'),
	(3, 'ASUS TUF Gaming F15', 14500000.00, 4, '2026-10-22 12:08:35'),
	(4, 'Acer Aspire 5', 8200000.00, 6, '2026-10-22 12:08:35'),
	(5, 'Acer Nitro V 15', 13900000.00, 5, '2026-10-22 12:08:35'),
	(6, 'Lenovo IdeaPad Slim 3', 7100000.00, 10, '2026-10-22 12:08:35'),
	(7, 'Lenovo LOQ 15', 14200000.00, 4, '2026-10-22 12:08:35'),
	(8, 'HP 14s', 6800000.00, 7, '2026-10-22 12:08:35'),
	(9, 'HP Victus 15', 13500000.00, 3, '2026-10-22 12:08:35'),
	(10, 'MSI Thin 15', 12800000.00, 5, '2026-10-22 12:08:35'),
	(11, 'MacBook Air M2', 14500000.00, 6, '2026-10-22 12:08:35');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
