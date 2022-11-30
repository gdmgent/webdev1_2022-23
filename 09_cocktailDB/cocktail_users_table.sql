# ************************************************************
# Sequel Ace SQL dump
# Version 20035
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.0.28)
# Database: cocktail
# Generation Time: 2022-11-30 12:38:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table users
# ------------------------------------------------------------

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(128) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(128) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`)
VALUES
	(1,NULL,NULL,'dieter.deweirdt@arteveldehs.be','asdf'),
	(3,NULL,NULL,'dieter@deweirdt.be','$2y$10$69OvKhJy1eEh6jqYTn2wiu1/wOZe5azbjWce7jYJ.Ba4xRVW1pJYe'),
	(4,NULL,NULL,'','$2y$10$EN6E.EhJIC6Ptb4PnYXn4ee8EHhTAQzubYjGajYRpPS.9LzirQawu'),
	(5,NULL,NULL,'&lt;script&gt;alert(&#039;hacked&#039;)&lt;/script&gt;','$2y$10$TcEl4KTZ2spCWddqXl1Dcu5cydfdgNGUqn2a0jv65azRN1kRp8SVS'),
	(6,NULL,NULL,'test','$2y$10$G89cB/gYQsdg584kWGXz0.cEBcLR6Flm9FnhuCA0seHtuVki7kqhe');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
