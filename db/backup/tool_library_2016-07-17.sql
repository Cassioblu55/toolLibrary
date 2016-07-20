# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.10-MariaDB)
# Database: tool_library
# Generation Time: 2016-07-18 00:28:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tool
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tool`;

CREATE TABLE `tool` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `tool_type_id` int(11) unsigned DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tool_type_id` (`tool_type_id`),
  CONSTRAINT `tool_ibfk_1` FOREIGN KEY (`tool_type_id`) REFERENCES `tool_type` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tool` WRITE;
/*!40000 ALTER TABLE `tool` DISABLE KEYS */;

INSERT INTO `tool` (`id`, `name`, `tool_type_id`, `quantity`)
VALUES
	(5,'Stanley 16-299 12 Piece Punch & Chisel Kit',1,1),
	(6,'Stanley Wood Chisel',1,1),
	(13,'Genesis GCD 18BK 18v Cordless Drill/Driver Kit, Grey',2,1),
	(14,'Garden Shears',3,1),
	(15,'Garden Spade',3,1),
	(16,'3 lbs Sledge Hammer',4,1),
	(17,'MoJack 800-Pound Appliance Hand Truck',5,1),
	(18,'testTool',3,1);

/*!40000 ALTER TABLE `tool` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tool_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tool_type`;

CREATE TABLE `tool_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tool_type` WRITE;
/*!40000 ALTER TABLE `tool_type` DISABLE KEYS */;

INSERT INTO `tool_type` (`id`, `type_name`)
VALUES
	(1,'Chisels/Files/Awls'),
	(2,'Drills'),
	(3,'Garden/Lawn'),
	(4,'Hammers'),
	(5,'Hand Truck'),
	(6,'Measures/Levels'),
	(7,'Paint'),
	(10,'Planers');

/*!40000 ALTER TABLE `tool_type` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
