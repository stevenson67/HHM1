-- Создание базы данных hhm
CREATE DATABASE IF NOT EXISTS `hmm`;
USE `hhm`;

-- Создание таблицы comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Данные для таблицы
INSERT INTO `comments` (`id`, `name`, `email`, `comment`) VALUES
	(1, 'Вася', 'vasya@mail.ru', 'Сообщение от Василия Пупкина.'),
	(2, 'Маруся', 'marysia@mail.ru', 'Всем привет, я Маруся'),
	(3, 'Вася', 'vasya@mail.ru', 'Сообщение от Василия Пупкина.'),
	(4, 'Маруся', 'marysia@mail.ru', 'Всем привет, я Маруся'),
	(5, 'Вася', 'vasya@mail.ru', 'Сообщение от Василия Пупкина.');