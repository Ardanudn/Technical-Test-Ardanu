-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for test_ardanu
DROP DATABASE IF EXISTS `test_ardanu`;
CREATE DATABASE IF NOT EXISTS `test_ardanu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `test_ardanu`;

-- Dumping structure for table test_ardanu.beans
DROP TABLE IF EXISTS `beans`;
CREATE TABLE IF NOT EXISTS `beans` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table test_ardanu.beans: ~0 rows (approximately)
INSERT INTO `beans` (`id`, `name`, `description`, `price`) VALUES
	(1, 'Cubita', 'Cubita Coffee is sun dried and hand sorted. It originates from an elevation of over 2000 meters in the Andes Mountains of Ecuador, which is located closest to the sun on the Equator. Superb aroma and rich Flavor', 12),
	(2, 'Colombian', 'Colombian is sun dried and hand sorted. It originates from an elevation of over 2000 meters in the Andes Mountains of Ecuador, which is located closest to the sun on the Equator. Superb aroma and rich Flavor', 13.5),
	(3, 'Supremo', 'Supremo is sun dried and hand sorted. It originates from an elevation of over 2000 meters in the Andes Mountains of Ecuador, which is located closest to the sun on the Equator. Superb aroma and rich Flavor', 15.9),
	(4, 'Pure Kona Fancy', 'Pure Kona is sun dried and hand sorted. It originates from an elevation of over 2000 meters in the Andes Mountains of Ecuador, which is located closest to the sun on the Equator. Superb aroma and rich Flavor', 24),
	(5, 'Kenyan', 'Fancy is sun dried and hand sorted. It originates from an elevation of over 2000 meters in the Andes Mountains of Ecuador, which is located closest to the sun on the Equator. Superb aroma and rich Flavor', 12.3);

-- Dumping structure for table test_ardanu.daily_beans
DROP TABLE IF EXISTS `daily_beans`;
CREATE TABLE IF NOT EXISTS `daily_beans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `beans_id` int DEFAULT NULL,
  `sale_price` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__beans` (`beans_id`),
  CONSTRAINT `FK__beans` FOREIGN KEY (`beans_id`) REFERENCES `beans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table test_ardanu.daily_beans: ~2 rows (approximately)
INSERT INTO `daily_beans` (`id`, `beans_id`, `sale_price`) VALUES
	(1, 1, 11),
	(2, 4, 10);

-- Dumping structure for table test_ardanu.distributor
DROP TABLE IF EXISTS `distributor`;
CREATE TABLE IF NOT EXISTS `distributor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `distributorName` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table test_ardanu.distributor: ~0 rows (approximately)
INSERT INTO `distributor` (`id`, `distributorName`, `city`, `region`, `country`, `phone`, `email`) VALUES
	(1, 'Beans R Us', 'Brisbane', 'Melbourn', 'Australia', '2401239021', 'ardanu@gmail.com'),
	(2, 'The Buzz', 'Munich', NULL, NULL, NULL, NULL),
	(3, 'Coffee Galore', 'Tokyo', NULL, NULL, NULL, NULL),
	(4, 'Perk Plus', 'Salem', NULL, NULL, NULL, NULL),
	(5, 'Cafe Colombian', 'Hawthorne', NULL, NULL, NULL, NULL),
	(6, 'Artech', 'Purwokerto', 'Jawa Tengah', 'Indonesia', '082112341234', 'ucok@gmail.com');

-- Dumping structure for table test_ardanu.files
DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `document` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table test_ardanu.files: ~1 rows (approximately)
INSERT INTO `files` (`id`, `title`, `document`, `author`) VALUES
	(1, 'Test', 'background.png', 'ardanu');

-- Dumping structure for table test_ardanu.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table test_ardanu.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`) VALUES
	(1, 'admin', '12345');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
