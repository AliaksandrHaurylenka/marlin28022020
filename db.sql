-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.24 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица marlin-oop.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `permissions` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы marlin-oop.groups: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
	(1, 'Standart user', NULL),
	(2, 'Administrator', '{"admin": 1}');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Дамп структуры для таблица marlin-oop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` timestamp NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT '1',
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы marlin-oop.users: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `date`, `group_id`, `password`) VALUES
	(9, 'Александр Гавриленко', 'goric0312@mail.ru', '2020-03-23 00:00:00', 1, '$2y$10$sRt8s4M3cKpm8S4.tnDEIe2Op8BKBBOB.pr8w3evGKteVreMnB7y2'),
	(10, 'Aliaksandr Gavrilenko', 'goric031278@mail.ru', '2020-03-22 00:00:00', 1, '$2y$10$AJaDlRU8q4vh3efEtTI12OcCSD96eb7RHpDNUygP0nlTehwQVEXRa'),
	(11, 'Александр Гавр', 'goric03121978@mail.ru', '2020-03-21 00:00:00', 1, '$2y$10$FhyckO2Zw4lM69E8EQV7NOuiMD.oRajthvPHRFgWnTNYjc8ZqPDXG'),
	(12, 'Александр Гаврил', 'g0312@mail.ru', '2020-03-23 00:00:00', 1, '$2y$10$ifJRvMqW0tpYUtDygbBx.u3t5L06CCglTeKrKD6p/Xvxei4Px81BG'),
	(13, 'Alex', 'go0312@mail.ru', '2020-03-18 00:00:00', 1, '$2y$10$nFBHtGi/xDCWDKXReaRV3uoEITVSuwLimCIwZTosWdjXIdOWdr/mO');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Дамп структуры для таблица marlin-oop.user_session
CREATE TABLE IF NOT EXISTS `user_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы marlin-oop.user_session: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `user_session` DISABLE KEYS */;
INSERT INTO `user_session` (`id`, `user_id`, `hash`) VALUES
	(8, 4, '6dbed6a5cf8e434642374d8f09d506f14b155fb147c944411b76c7f58e60b363'),
	(9, 5, '5d49e6ae0441d115414226c04b380f39b5448dcfbc1d94f1a8adbf1a91a4999d'),
	(10, 7, '861e7746737aca1051753d80d2d176edd92c13f738981c05f48b5ebffc95ca57'),
	(11, 12, 'e3e062749858667e832e99b6321a71a20d01157d38e6a3bc267391ed617547d8');
/*!40000 ALTER TABLE `user_session` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
