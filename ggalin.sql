-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 07 2022 г., 01:33
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ggalin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `password`) VALUES
(1, 'test', 'test@testmail.com', 'test'),
(7, 'ff', 'f@f', '1'),
(8, 'dd', 'd@d', '8277e0910d750195b448797616e091ad'),
(9, 'gg', 'g@g', '8fa14cdd754f91cc6554c9e71929cce7'),
(10, 'jj', 'g@g', '$2y$10$m2WgXirMRtGSmmGT2XF0V.x.xELsrwdLMUNUyU.leGDNY/4whqYlG'),
(11, 'test1', 'fast@mail.com', '$2y$10$5.qZcvmaincqKvvPisJuJe0pqoIoS1e9oC/WxDt.ixqvNRwIwUMoC'),
(12, '', '', '$2y$10$gma7a2Vmv/P30ZUagpoGbOkWtXZdu6RbN3/NmKFSb/871YxND018C');

-- --------------------------------------------------------

--
-- Структура таблицы `user_stash`
--

CREATE TABLE `user_stash` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `name_res` varchar(20) NOT NULL,
  `number_res` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_stash`
--
ALTER TABLE `user_stash`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_users` (`id_users`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `user_stash`
--
ALTER TABLE `user_stash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user_stash`
--
ALTER TABLE `user_stash`
  ADD CONSTRAINT `user_stash_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
