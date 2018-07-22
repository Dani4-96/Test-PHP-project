-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 22 2018 г., 15:40
-- Версия сервера: 10.1.33-MariaDB
-- Версия PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test-php-project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `login` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `second_name` varchar(20) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`login`, `password`, `first_name`, `second_name`, `sex`, `date_of_birth`) VALUES
('admin', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL),
('Alex1996', '81dc9bdb52d04dc20036dbd8313ed055', 'Alexandr', 'Ivakov', 'M', '1996-01-03'),
('Ivan1996', '81dc9bdb52d04dc20036dbd8313ed055', 'Ivan', 'Chirkin', 'M', '1996-04-23'),
('Katya96', '81dc9bdb52d04dc20036dbd8313ed055', 'Ekaterina', 'Oskina', 'F', '1996-11-17'),
('Lexa94', '81dc9bdb52d04dc20036dbd8313ed055', 'Alexey', 'Minin', 'M', '1994-05-27'),
('Nadya97', '81dc9bdb52d04dc20036dbd8313ed055', 'Nadezhda', 'Presnova', 'F', '1997-12-19'),
('Nastya1993', '81dc9bdb52d04dc20036dbd8313ed055', 'Anastasiya', 'Protkina', 'F', '1993-07-09'),
('Petya95', '81dc9bdb52d04dc20036dbd8313ed055', 'Petr', 'Rempel', 'M', '1995-11-22'),
('Sasha95', '81dc9bdb52d04dc20036dbd8313ed055', 'Alexandra', 'Fedorova', 'F', '1995-08-15'),
('Vasya96', '81dc9bdb52d04dc20036dbd8313ed055', 'Vasiliy', 'Eremin', 'M', '1996-09-30'),
('Volodia1996', '827ccb0eea8a706c4c34a16891f84e7b', 'Vladimir', 'Ovsyannikov', 'M', '1996-06-06');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
