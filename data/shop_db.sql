-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 04 2019 г., 21:00
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `goods_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `goods_id`) VALUES
(251, 'qpojg0mntmf0ar446aucq2boaae1qhp0', 1),
(252, 'qpojg0mntmf0ar446aucq2boaae1qhp0', 2),
(253, '0f4omg6e2jt4eov7kvflcnlvli3d6v0o', 91),
(254, '0f4omg6e2jt4eov7kvflcnlvli3d6v0o', 93),
(255, '0f4omg6e2jt4eov7kvflcnlvli3d6v0o', 94),
(256, 'q08e8ts2l7o0hnvabah17ljqcr3qbs0f', 1),
(257, 'q08e8ts2l7o0hnvabah17ljqcr3qbs0f', 2),
(258, 'q08e8ts2l7o0hnvabah17ljqcr3qbs0f', 91),
(259, 'q08e8ts2l7o0hnvabah17ljqcr3qbs0f', 93),
(260, 'q08e8ts2l7o0hnvabah17ljqcr3qbs0f', 94),
(261, 'f112gumjnjkm38vbj6ef795rapua93cb', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Чай Зеленый', 'Крупнолистовой, Китай', 150, ''),
(2, 'Кофе', 'Зерно, средняя обжарка, Бразилия', 295, ''),
(91, 'Чай Черный', 'Цейлон', 123, NULL),
(93, 'Пуэр', '2013г, Китай', 140, NULL),
(94, 'Кофе2', 'Робуста, Бразилия', 323, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'не определен'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `user_name`, `user_email`, `status`) VALUES
(11, 'qpojg0mntmf0ar446aucq2boaae1qhp0', 'test1', 'test1@test', 'оплачен'),
(12, '0f4omg6e2jt4eov7kvflcnlvli3d6v0o', 'test2', 'test2@test', NULL),
(13, 'q08e8ts2l7o0hnvabah17ljqcr3qbs0f', 'test3', 'test3@test', NULL),
(14, 'f112gumjnjkm38vbj6ef795rapua93cb', 'test4', 'test4@test', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `role`) VALUES
(6, 'admin', '$2y$10$8KxpFo.hmut01DVnBb0bOe87AjRLnL4eBaPe2uxN8mqFFVD6LbCDS', 'admin'),
(7, 'user', '$2y$10$dEkYjd2wOI4betJC91HbKOcs8mGXgVuvH6JPBrkVH.pN39KhTmbqu', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
