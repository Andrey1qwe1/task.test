-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 15 2020 г., 12:46
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `test_task`
--

CREATE TABLE `test_task` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50)  NOT NULL,
  `surname` varchar(50)  NOT NULL,
  `gender` varchar(6)  NOT NULL,
  `birthday` date NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `test_task`
--

INSERT INTO `test_task` (`id`, `username`, `password`, `name`, `surname`, `gender`, `birthday`, `is_admin`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'male', '2000-01-01', 1),
(3, 'Jessie01', '222222', 'Jessie', 'Adams', 'female', '2001-01-02', 0),
(4, 'Sarah0102', '333333', 'Sarah', 'Shield', 'female', '2001-01-02', 0),
(5, 'FraSt', '444444', 'Frank', 'Steward', 'male', '2001-01-02', 0),
(6, 'lukedoug1', '111111', 'Luke', 'Douglas', 'male', '1998-02-11', 0),
(15, 'SofiaAnd', '222222', 'Sophia', 'Andrews', 'female', '1999-05-13', 0),
(19, 'NelsonDavid', '11122233', 'David', 'Nelson', 'male', '1984-07-15', 0),
(20, 'Richards11', '98765443', 'Theodore', 'Richards', 'male', '1992-02-04', 0),
(21, 'JJeckson', '12345', 'Joshua', 'Jeckson', 'male', '1984-09-13', 0),
(22, 'Mary123', '123321', 'Mary', 'McDaniel', 'female', '1995-12-01', 0),
(23, 'WebMegan', '999999', 'Meghan', 'Webb', 'female', '1998-10-15', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `test_task`
--
ALTER TABLE `test_task`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `test_task`
--
ALTER TABLE `test_task`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
