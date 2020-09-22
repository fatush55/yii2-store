-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 22 2020 г., 16:58
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `parent_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `slug`, `parent_id`, `title`, `description`, `keywords`) VALUES
(1, 'branded-foods', 0, 'Branded Foods', 'Branded Foods keywords', 'Branded Foods description'),
(2, 'households', 0, 'Households', 'Households keywords', 'Households description'),
(3, 'veggies-fruits', 0, 'Veggies & Fruits', 'Veggies & Fruits description', 'Veggies & Fruits keywords'),
(4, 'vegetables', 3, 'Vegetables', 'Vegetables description', 'Vegetables keywords'),
(5, 'fruits', 3, 'Fruits', 'Fruits description', 'Fruits keywords'),
(6, 'kitchen', 0, 'Kitchen', NULL, NULL),
(7, 'short-codes', 0, 'Short Codes', NULL, NULL),
(8, 'beverages', 0, 'Beverages', NULL, NULL),
(9, 'soft-drinks', 8, 'Soft Drinks', NULL, NULL),
(10, 'juices', 8, 'Juices', NULL, NULL),
(11, 'pet-food', 0, 'Pet Food', NULL, NULL),
(12, 'frozen-foods', 0, 'Frozen Foods', NULL, NULL),
(13, 'frozen-snacks', 12, 'Frozen Snacks', NULL, NULL),
(14, 'frozen-nonveg', 12, 'Frozen Nonveg', NULL, NULL),
(15, 'bread-bakery', 0, 'Bread & Bakery', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1593146917),
('m200625_212232_create_tale_product', 1593344493),
('m200627_071823_create_category', 1593344493),
('m200628_182918_add_slug_column_to_category_table', 1593369009),
('m200629_204410_create_order', 1593635243),
('m200629_210049_create_order_product', 1593635243),
('m200702_191405_create_user', 1593852937);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `qnt` tinyint(4) UNSIGNED NOT NULL,
  `sum` decimal(6,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(3) DEFAULT 0,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `qnt`, `sum`, `status`, `name`, `email`, `phone`, `address`, `note`, `created_at`, `updated_at`) VALUES
(3, 2, '10.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'kmddsfklmf', '2020-07-01 23:38:31', '2020-07-01 23:38:31'),
(10, 2, '10.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', '56y656y', '2020-07-01 23:45:05', '2020-07-01 23:45:05'),
(12, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'dasdqwd', '2020-07-01 23:46:44', '2020-07-01 23:46:44'),
(13, 2, '10.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'qwdqwd', '2020-07-02 00:55:03', '2020-07-02 00:55:03'),
(14, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'wewrwe', '2020-07-02 01:00:30', '2020-07-02 01:00:30'),
(15, 2, '8.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'asdasd', '2020-07-02 01:02:09', '2020-07-02 01:02:09'),
(16, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'qwdwqw', '2020-07-02 01:04:25', '2020-07-02 01:04:25'),
(17, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'sqwdw', '2020-07-02 01:05:41', '2020-07-02 01:05:41'),
(18, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'sdqdqwd', '2020-07-02 01:09:06', '2020-07-02 01:09:06'),
(19, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'sdqdqwd', '2020-07-02 01:09:46', '2020-07-02 01:09:46'),
(20, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'sdqdqwd', '2020-07-02 01:12:47', '2020-07-02 01:12:47'),
(21, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'sdqdqwd', '2020-07-02 01:14:24', '2020-07-02 01:14:24'),
(22, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'sdqdqwd', '2020-07-02 01:15:09', '2020-07-02 01:15:09'),
(23, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'sdqdqwd', '2020-07-02 01:15:57', '2020-07-02 01:15:57'),
(24, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'sdqdqwd', '2020-07-02 01:20:20', '2020-07-02 01:20:20'),
(25, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'sdqdqwd', '2020-07-02 01:29:20', '2020-07-02 01:29:20'),
(26, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'sdqdqwd', '2020-07-02 01:29:47', '2020-07-02 01:29:47'),
(27, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', '', '2020-07-02 01:30:53', '2020-07-02 01:30:53'),
(28, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', '', '2020-07-02 01:32:46', '2020-07-02 01:32:46'),
(29, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', '', '2020-07-02 01:35:20', '2020-07-02 01:35:20'),
(30, 1, '5.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', '', '2020-07-02 01:35:41', '2020-07-02 01:35:41'),
(31, 1, '3.00', 0, 'dima', 'afromipa55@gmail.com', '0994491760', 'Героев Сталинграда', 'asdasd', '2020-07-02 01:38:59', '2020-07-02 01:38:59');

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `qnt` tinyint(4) NOT NULL,
  `sum` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `title`, `price`, `qnt`, `sum`) VALUES
(1, 3, 2, 'chings noodles (75 gm)', '5.00', 1, '5.00'),
(2, 3, 3, 'lahsun sev (150 gm)', '5.00', 1, '5.00'),
(3, 10, 2, 'chings noodles (75 gm)', '5.00', 1, '5.00'),
(4, 10, 4, 'premium bake rusk (300 gm)', '5.00', 1, '5.00'),
(5, 12, 3, 'lahsun sev (150 gm)', '5.00', 1, '5.00'),
(6, 13, 3, 'lahsun sev (150 gm)', '5.00', 1, '5.00'),
(7, 13, 4, 'premium bake rusk (300 gm)', '5.00', 1, '5.00'),
(8, 14, 4, 'premium bake rusk (300 gm)', '5.00', 1, '5.00'),
(9, 15, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(10, 15, 2, 'chings noodles (75 gm)', '5.00', 1, '5.00'),
(11, 16, 3, 'lahsun sev (150 gm)', '5.00', 1, '5.00'),
(12, 17, 3, 'lahsun sev (150 gm)', '5.00', 1, '5.00'),
(13, 18, 3, 'lahsun sev (150 gm)', '5.00', 1, '5.00'),
(14, 19, 3, 'lahsun sev (150 gm)', '5.00', 1, '5.00'),
(15, 20, 3, 'lahsun sev (150 gm)', '5.00', 1, '5.00'),
(16, 21, 3, 'lahsun sev (150 gm)', '5.00', 1, '5.00'),
(17, 22, 3, 'lahsun sev (150 gm)', '5.00', 1, '5.00'),
(18, 23, 3, 'lahsun sev (150 gm)', '5.00', 1, '5.00'),
(19, 24, 3, 'lahsun sev (150 gm)', '5.00', 1, '5.00'),
(20, 25, 3, 'lahsun sev (150 gm)', '5.00', 1, '5.00'),
(21, 26, 3, 'lahsun sev (150 gm)', '5.00', 1, '5.00'),
(22, 27, 4, 'premium bake rusk (300 gm)', '5.00', 1, '5.00'),
(23, 28, 4, 'premium bake rusk (300 gm)', '5.00', 1, '5.00'),
(24, 29, 4, 'premium bake rusk (300 gm)', '5.00', 1, '5.00'),
(25, 30, 4, 'premium bake rusk (300 gm)', '5.00', 1, '5.00'),
(26, 31, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) UNSIGNED NOT NULL,
  `discount` decimal(6,2) UNSIGNED NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'images/product-default',
  `is_offer` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `slug`, `category_id`, `title`, `price`, `discount`, `content`, `description`, `keywords`, `img`, `is_offer`) VALUES
(1, 'knorr-instant-soup', 1, 'knorr instant soup (100 gm)', '3.00', '0.00', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'description', 'keywords', '5.png', 1),
(2, 'chings-noodles', 1, 'chings noodles (75 gm)', '8.00', '5.00', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'description', 'keywords', '6.png', 1),
(3, 'lahsun', 1, 'lahsun sev (150 gm)', '3.00', '5.00', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'description', 'keywords', '7.png', 1),
(4, 'premium-bake-rusk', 1, 'premium bake rusk (300 gm)', '7.00', '5.00', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, NULL, '8.png', 1),
(5, 'fresh-spinach', 1, 'fresh spinach (palak)', '3.00', '2.00', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, NULL, '9.png', 1),
(6, 'fresh-mango-dasheri', 5, 'fresh mango dasheri (1 kg)', '8.00', '5.00', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, NULL, '10.png', 1),
(7, 'fresh-apple-red', 5, 'fresh apple red (1 kg)', '8.00', '6.00', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, NULL, '11.png', 1),
(8, 'fresh-broccoli', 4, 'fresh broccoli (500 gm)', '6.00', '4.00', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, NULL, '12.png', 1),
(9, 'mixed-fruit-juice', 10, 'mixed fruit juice (1 ltr)', '3.00', '0.00', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, NULL, '13.png', 1),
(10, 'prune-juice-sunsweet', 10, 'prune juice - sunsweet (1 ltr)', '4.00', '0.00', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, NULL, '14.png', 1),
(11, 'coco-cola-zero-can', 9, 'coco cola zero can (330 ml)', '3.00', '0.00', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, NULL, '15.png', 0),
(12, 'sprite-bottle', 9, 'sprite bottle (2 ltr)', '3.00', '0.00', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, NULL, '16.png', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'user',
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`, `role`, `access_token`, `created_at`, `updated_at`) VALUES
(1, 'mipa', '$2y$13$my35Ko.JmPCy09TTGFlcBOXzHlIl0xA2VqJjYf31lrcln/xXbRoRa', 'cy1hUCLMFGhOO3vTCC-sTyNjyjEnPLgT', 'user', NULL, NULL, '2020-07-05 15:47:37');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-order_product-order_id` (`order_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `fk-order_product-order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
