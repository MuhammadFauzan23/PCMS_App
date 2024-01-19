-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
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


-- Dumping database structure for db_pcms
CREATE DATABASE IF NOT EXISTS `db_pcms` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_pcms`;

-- Dumping structure for table db_pcms.tbl_history
CREATE TABLE IF NOT EXISTS `tbl_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material_number` varchar(50) DEFAULT NULL,
  `userid` varchar(50) DEFAULT NULL,
  `action` mediumtext DEFAULT NULL,
  `before_qty` int(11) DEFAULT NULL,
  `after_qty` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `date_time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_pcms.tbl_history: ~7 rows (approximately)
INSERT INTO `tbl_history` (`id`, `material_number`, `userid`, `action`, `before_qty`, `after_qty`, `status`, `remark`, `date_time`) VALUES
	(1, '1', 'Fauzan', 'Menambahkan request material', 0, 0, 0, NULL, '2024-01-19'),
	(2, '2', 'Fauzan', 'Menambahkan request material', 0, 0, 0, NULL, '2024-01-19'),
	(3, '1', 'Suci', 'Melakukan ubah material Sapu', 0, 120, 0, NULL, '2024-01-19'),
	(4, '1', 'Suci', 'Melakukan approval material', 0, 0, 1, NULL, '2024-01-19'),
	(5, '2', 'Suci', 'Melakukan reject material', 0, 0, 2, 'Not Good', '2024-01-19'),
	(6, '2', 'Fauzan', 'Melakukan ubah material Baja', 1000, 50, 0, NULL, '2024-01-19'),
	(7, '2', 'Suci', 'Melakukan approval material', 0, 0, 1, NULL, '2024-01-19');

-- Dumping structure for table db_pcms.tbl_material
CREATE TABLE IF NOT EXISTS `tbl_material` (
  `material_number` varchar(50) NOT NULL DEFAULT '',
  `status` int(11) DEFAULT NULL,
  `userID` varchar(50) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `approved_by` varchar(50) NOT NULL DEFAULT '',
  `approved_date` varchar(50) NOT NULL DEFAULT '',
  `datetime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`material_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_pcms.tbl_material: ~2 rows (approximately)
INSERT INTO `tbl_material` (`material_number`, `status`, `userID`, `remark`, `approved_by`, `approved_date`, `datetime`) VALUES
	('1', 1, 'Fauzan', NULL, 'Suci', '2024-01-19', '2024-01-19'),
	('2', 1, 'Fauzan', 'Not Good', 'Suci', '2024-01-19', '2024-01-19');

-- Dumping structure for table db_pcms.tbl_material_detail
CREATE TABLE IF NOT EXISTS `tbl_material_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material_number` varchar(50) DEFAULT NULL,
  `material_name` varchar(50) DEFAULT NULL,
  `requested_quantity` int(11) DEFAULT NULL,
  `description_usage` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` varchar(50) DEFAULT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `approved_date` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_pcms.tbl_material_detail: ~4 rows (approximately)
INSERT INTO `tbl_material_detail` (`id`, `material_number`, `material_name`, `requested_quantity`, `description_usage`, `status`, `updated_by`, `updated_date`, `approved_by`, `approved_date`, `created_by`, `created_date`) VALUES
	(1, '1', 'Sapu', 120, 'Nothing', 1, 'Suci', '2024-01-19', 'Suci', '2024-01-19', 'Fauzan', '2024-01-19'),
	(2, '1', 'Kayu', 100, 'Nothing', 1, NULL, NULL, 'Suci', '2024-01-19', 'Fauzan', '2024-01-19'),
	(4, '2', 'Kayu', 12, 'material 23', 1, NULL, NULL, 'Suci', '2024-01-19', 'Fauzan', '2024-01-19'),
	(5, '2', 'Baja', 50, 'Nothing', 1, 'Fauzan', '2024-01-19', 'Suci', '2024-01-19', 'Fauzan', '2024-01-19');

-- Dumping structure for table db_pcms.tbl_temporary
CREATE TABLE IF NOT EXISTS `tbl_temporary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(50) DEFAULT NULL,
  `requested_quantity` int(11) DEFAULT NULL,
  `description_usage` varchar(50) DEFAULT NULL,
  `created_date` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_date` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_pcms.tbl_temporary: ~0 rows (approximately)

-- Dumping structure for table db_pcms.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `role` enum('Production','Warehouse') DEFAULT NULL,
  `created_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_pcms.tbl_user: ~2 rows (approximately)
INSERT INTO `tbl_user` (`id`, `fullname`, `username`, `password`, `is_active`, `role`, `created_date`) VALUES
	(1, 'Muhammad Fauzan', 'Fauzan', 'b727b5ea41c6cd6b5a1b7e095f3973e443eef159', 1, 'Production', '2024-01-18'),
	(2, 'Suci', 'Suci', '53e8d1d5550426aa403890c03e4ccc8a79986105', 1, 'Warehouse', '2024-01-18');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
