# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.23)
# Database: arteair
# Generation Time: 2019-08-26 07:05:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table aircraft
# ------------------------------------------------------------

DROP TABLE IF EXISTS `aircraft`;

CREATE TABLE `aircraft` (
  `aircraft_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `aircraft_code` varchar(10) DEFAULT NULL,
  `model` varchar(256) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `rows` int(11) DEFAULT NULL,
  `row_layout` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`aircraft_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `aircraft` WRITE;
/*!40000 ALTER TABLE `aircraft` DISABLE KEYS */;

INSERT INTO `aircraft` (`aircraft_id`, `aircraft_code`, `model`, `year`, `rows`, `row_layout`)
VALUES
	(1,'777-31H','Boeing 777',2005,30,'ABC_DEF'),
	(2,'DC10','Douglas DC-10',2010,40,'ABC_DEFG_HIJ');

/*!40000 ALTER TABLE `aircraft` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table airport
# ------------------------------------------------------------

DROP TABLE IF EXISTS `airport`;

CREATE TABLE `airport` (
  `airport_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `airport_code` varchar(20) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `country` varchar(4) DEFAULT NULL,
  `location` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`airport_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `airport` WRITE;
/*!40000 ALTER TABLE `airport` DISABLE KEYS */;

INSERT INTO `airport` (`airport_id`, `airport_code`, `name`, `country`, `location`)
VALUES
	(1,'BRU','Brussels','BEL','Brussel'),
	(2,'CRL','Brussels South Charleroi','BEL','Charleroi'),
	(3,'IBZ','Ibiza','ESP','Ibiza'),
	(4,'FCO','Leonardo da Vinci–Fiumicino','ITA','Rome'),
	(5,'BCN','Barcelona Airport - El Prat','ESP','Barcelona');

/*!40000 ALTER TABLE `airport` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table flight
# ------------------------------------------------------------

DROP TABLE IF EXISTS `flight`;

CREATE TABLE `flight` (
  `flight_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `aircraft_id` int(11) DEFAULT NULL,
  `ticket_price` float DEFAULT NULL,
  PRIMARY KEY (`flight_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `flight` WRITE;
/*!40000 ALTER TABLE `flight` DISABLE KEYS */;

INSERT INTO `flight` (`flight_id`, `date`, `from`, `to`, `aircraft_id`, `ticket_price`)
VALUES
	(1,'2022-10-23 06:25:00',1,4,1,249.5),
	(2,'2022-10-28 07:15:00',1,5,2,320),
	(3,'2022-11-04 14:30:00',4,2,2,75.99);

/*!40000 ALTER TABLE `flight` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;

INSERT INTO `order` (`order_id`, `firstname`, `lastname`, `email`, `date`)
VALUES
	(1,'Dieter','De Weirdt','dieter@deweirdt.be','2022-10-05 21:00:00'),
	(25,'George','Jungle','george@jungle.com','2022-10-02 21:16:07'),
	(26,'Dieter','De Weirdt','dieter@deweirdt.be','2022-08-25 21:17:33'),
	(27,'Xavier','Waterslagers','x4@gmail.com','2022-08-25 22:06:44'),
	(28,'Dieter','De Weirdt','dieter@deweirdt.be','2022-08-26 08:51:55');

/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_detail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_detail`;

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `flight_id` int(11) DEFAULT NULL,
  `seat` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`order_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `flight_id`, `seat`)
VALUES
	(1,1,1,'01A'),
	(2,1,1,'01B'),
	(3,1,1,'01C'),
	(4,1,1,'01D'),
	(45,25,1,'08A'),
	(46,25,1,'08B'),
	(47,25,1,'08C'),
	(48,25,1,'08D'),
	(49,25,1,'08E'),
	(50,25,1,'08F'),
	(51,26,2,'13D'),
	(52,26,2,'13E'),
	(53,27,2,'04A'),
	(54,27,2,'04B'),
	(55,28,2,'01D'),
	(56,28,2,'01E'),
	(57,28,2,'01F'),
	(58,28,2,'01G');

/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
