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

-- Дамп структуры для таблица marlin-oop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы marlin-oop.users: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
	(1, 'Александр Гавриленко', 'john@gmail.com', NULL),
	(3, 'Ольга', 'vasina@tut.by', NULL),
	(4, 'Aliaksandr Gavrilenko', 'goric0312@mail.ru', '$2y$10$48EhxaHTkv.omrNBVBYFtu4/NYXajhOUB/GKh3wVvDkTs1FsulAuu'),
	(5, 'Александр Гавриленко', 'goric031278@mail.ru', '$2y$10$Emqi40WgKQwAXFmbSZogEeR22nOkbunZARpmqeiEG/u8/Scxz4nv6');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Дамп структуры для таблица marlin-oop.user_session
CREATE TABLE IF NOT EXISTS `user_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы marlin-oop.user_session: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `user_session` DISABLE KEYS */;
INSERT INTO `user_session` (`id`, `user_id`, `hash`) VALUES
	(5, 5, 'c35a11b6669c05f8d171a37fde3c4e686998f7f70c969cb25880bc4943310550');
/*!40000 ALTER TABLE `user_session` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
