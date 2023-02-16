-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 16 2023 г., 12:17
-- Версия сервера: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004
-- Версия PHP: 8.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `638-19_town`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'Дороги'),
(2, 'ЖКХ');

-- --------------------------------------------------------

--
-- Структура таблицы `problem`
--

CREATE TABLE `problem` (
  `id_problem` int(11) NOT NULL,
  `name_problem` varchar(255) NOT NULL,
  `description_problem` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` enum('Новая','Решена','Отклонена') NOT NULL DEFAULT 'Новая',
  `photoBefore` varchar(255) NOT NULL,
  `photoAfter` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `problem`
--

INSERT INTO `problem` (`id_problem`, `name_problem`, `description_problem`, `date`, `user_id`, `category_id`, `status`, `photoBefore`, `photoAfter`, `reason`) VALUES
(11, 'Лена абижает', 'жесть тереш намыли свои дороги а главарь Лена всех бьет унижает понижает!!!!!!!!!!!!!!!!!!!!!!', '2023-02-03 12:33:17', 11, 1, 'Решена', '3j0hKcjuu8y_UVpbzggdLP66GeZXJs0mPCnS2LqiS5td-dGiyN.jpg', 'ph.jpg', NULL),
(20, 'Стена', 'Рушение кирпичной кладки', '2023-02-07 09:44:22', 1, 2, 'Решена', '5b2YOPWO34okzrEusm0ot09ZBRFseCh1zdkBYp7epQlwwT6tf5_1_1675532222.jpg', '1-11675532542.jpg', NULL),
(39, 'Капитальный ремонт', 'В многоквартирном доме (по адресу: город Помогите, район Ябоюсь, улица Демоэкзамен, дом 14) требуется капитальный ремонт.', '2023-02-07 13:41:51', 1, 2, 'Решена', '5_1_1_1675776802.jpg', '5_21675777311.png', NULL),
(42, 'Реконструкция', 'Требуется реконструкция многоквартирного дома по адресу: город Яустала, район Делать, улица Этотсайт, дом 14', '2023-02-07 13:52:32', 1, 2, 'Решена', 'Стачек-63 (1)_1_1675777893.jpg', 'Стачек-63 (2)1675777952.jpg', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `fio`, `login`, `email`, `password`, `admin`) VALUES
(1, 'Виталов Мукалий Вовович', 'YITALYA', 'yii@iiy.iyi', '123', 0),
(5, 'Мукалов Виталий Владимирович', 'admin', 'admin@admin.admin', 'adminWSR', 1),
(7, 'Владимин Путин Путинович', 'Adhesive', 'Minecrafter2001@mail.ru', 'parol1', 0),
(8, 'Милос Рикардо Альбертович', 'Loginprs', 'Plussize@gmail.com', 'паруса', 0),
(9, 'Зубенко Михаил Петрович', 'PussyDestroyer', 'BigAss@gmail.ru', 'pussyjuice', 0),
(11, 'Привки от Аливки', 'alina', 'alivka@dla.fik', '123', 0),
(15, 'Османова Елена Руслановна', 'elenaosmanova', 'elenaosmanova2003@gmail.com', '123', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`id_problem`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `problem`
--
ALTER TABLE `problem`
  MODIFY `id_problem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `problem`
--
ALTER TABLE `problem`
  ADD CONSTRAINT `problem_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `problem_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
