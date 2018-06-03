-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 03 2018 г., 17:21
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pizza_base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `dish_name` tinytext NOT NULL,
  `description` text NOT NULL,
  `price` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `dish_name`, `description`, `price`) VALUES
(1, 'Simple Pizza', 'cheese, tomato, onion, olives', 100),
(2, 'Peperoni Pizza', 'cheese, sausages, pepper, onion', 200),
(3, 'Hot Pepperoni Pizza', 'cheese, dehydrated garlic, black pepper, oregano, dehydrated onion', 250),
(4, 'Cheese Pizza', 'cheese, tomato, garlic, black pepper, onion', 150),
(5, 'Double Cheese Pizza', 'mozzarella, parmesan, tomato, garlic', 200),
(6, '4 Seasons Pizza', 'mozzarella, mushrooms, tomato, garlic, olives, anchovies', 250),
(7, 'Salami Pizza', 'cheese, tomato sauce, mushrooms, tomato, salami, oregano', 210),
(8, 'Ham Pizza', 'cheese, tomato sauce, ham, tomato, oregano, garlic', 270);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `delivery_time` time NOT NULL,
  `delivery_date` date NOT NULL,
  `order_status` enum('Accepted','In progress','Delivered') NOT NULL DEFAULT 'Accepted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `driver_id`, `delivery_time`, `delivery_date`, `order_status`) VALUES
(1, 1, 2, '12:30:00', '2018-05-24', 'Accepted');

-- --------------------------------------------------------

--
-- Структура таблицы `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `quantity` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `order_details`
--

INSERT INTO `order_details` (`order_id`, `dish_id`, `quantity`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text,
  `role` enum('admin','client','driver') NOT NULL,
  `name` text,
  `address` text,
  `status` enum('Free','Busy') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`, `name`, `address`, `status`) VALUES
(1, 'client1', 'f1ccf9953a1371af2d41017be335cc34', 'client', 'Ivan', '1, Lenina', ''),
(2, 'driver1', 'd3272b10ad84b8e808ab558d318b1cf5', 'driver', '', '', 'Free'),
(3, 'admin', '44ca5fa5c67e434b9e779c5febc46f06', 'admin', '', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Индексы таблицы `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `dish_id` (`dish_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`dish_id`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
