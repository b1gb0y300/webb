-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 03 2024 г., 19:24
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sportshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banned`
--

CREATE TABLE `banned` (
  `ip` varchar(45) NOT NULL,
  `tries` int(11) DEFAULT 0,
  `ban` tinyint(1) DEFAULT 0,
  `time` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `banned`
--

INSERT INTO `banned` (`ip`, `tries`, `ban`, `time`) VALUES
('::1', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `cost` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `img_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `description`, `cost`, `id_type`, `img_path`) VALUES
(1, 'Шорты женские Fjora Flex1', 'Шорты Norrona Fjora Flex1 созданы для катания на горном велосипеде. Они подойдут для разных погодных условий и в них вам будет комфортно и в солнечный день, и в дождливый.', 8940, 2, 'images_pack/img1.jpg'),
(2, 'Куртка Svalbard Cotton', 'Norrona Svalbard Cotton - удобная и прочная куртка для туризма или повседневного использования. Ткань куртки ветроустойчивая и «дышащая» идеально подходит для сухой погоды. Куртка имеет свободный крой, оснащена регулировками объема и вместительными карманами для самого необходимого в дороге.', 15673, 1, 'images_pack/img2.jpg'),
(3, 'Футболка мужская Svalbard Wool', 'Norrona Svalbard Wool - универсальная футболка для активного отдыха, путешествий и ежедневного использования.', 4194, 3, 'images_pack/img3.png'),
(4, 'Куртка мужская Falketind Gore-Tex', 'Norrona Falketind Gore-Tex - универсальная водонепроницаемая куртка в коллекции Norrona. Она подходит для круглогодичного использования. Куртка разработана для всех видов активности в горах (для скалолазания, альпинизма, ледолазания, треккинга, походов по ледникам, ски-тура)', 45490, 1, 'images_pack/img4.jpg'),
(5, 'Брюки женские Hiking RG', 'Mammut Hiking RG - универсальные брюки для различных походов. Выполнены из стрейчевой ткани с влагоотталкивающей обработкой, защищающей от брызг, легкого дождя.', 6993, 4, 'images_pack/img5.jpg'),
(6, 'Куртка женская Sapuen SO Hooded', 'Mammut Sapuen SO Hooded - комфортная универсальная куртка из ветрозащитной ткани софтшелл с мягкой изнанкой с мериносовой шерстью. Материал куртки обеспечивает защиту от сильного ветра и хорошо «дышит». Подойдет для различных походов, путешествий, города.', 20990, 1, 'images_pack/img6.jpg'),
(7, 'Куртка женская Masao Light HS Hooded', 'Mammut Masao Light HS Hooded - водонепроницаемая куртка для походов различной сложности. Оснащена мембраной Mammut® DryTechnology™ 3L с высокой паропроницаемостью, отличной защитой от проливного дождя и штормового ветра.', 29990, 1, 'images_pack/img7.jpg'),
(8, 'Рюкзак женский Ducan Spine 50-60L', 'Ducan Spine 50-60 – минималистичный туристический рюкзак для пеших и горных походов средней продолжительности, экспедиций и путешествий.', 15820, 5, 'images_pack/img8.jpg'),
(9, 'Куртка мужская Haglofs L.I.M Breathe GTX', 'Haglofs L.I.M Breathe GTX – ультралегкая, водонепроницаемая куртка с технологией Shakedry™, самой. С такой курткой вы можете не прекращать тренировок даже в дождливую погоду. Модель идеально подходит для хайкинга, туризма.', 35990, 1, 'images_pack/img9.png'),
(10, 'Кроссовки мужские Salomon X Ultra 3 GTX', 'Легкие, прочные и влагозащищенные кроссовки Salomon X-Ultra 3 GTX с плотной посадкой, надежной фиксацией стопы, достойным уровнем защиты, стабильности и сцепления. В них можно смело выходить на маршрут, где вас ожидают крутые спуски и подъемы.', 13990, 6, 'images_pack/img10.jpg'),
(11, 'Куртка женская Mammut Nordwand Advanced Hs Hooded', 'Куртка Mammut Nordwand Advanced HS Hooded сочетает в себе легкий вес и долговечность. Это прочная, надежная куртка из трехслойного ламината Gore-Tex® Pro 3L создана для самых жестких погодных условий. Материал обеспечивает максимальную защиту от штормового ветра, ливней, снегопада.', 58500, 1, 'images_pack/img11.jpg'),
(12, 'Ботинки мужские Hanwag Banks GTX', 'Ботинки, созданные с таким расчётом, чтобы природные условия не влияли на состояние ваших ног, вне зависимости от сложности избранного вами сегодня маршрута.\r\nВерх исполнен из кожи с сертификатом LWG, подтверждающим её высокое качество и экологическую чистоту.', 19880, 4, 'images_pack/img12.jpg'),
(13, 'Рубашка мужская Haglofs Salo SS', 'Рубашка-бестселлер Haglofs Salo SS подходит для города, туризма, путешествий и т.п. Она выполнена из прочной стрейчевой ткани, обеспечивающей полную свободу движений. Ткань имеет защиту от ультрафиолета, хорошо «дышит», отводит влагу и очень быстро высыхает.', 4655, 3, 'images_pack/img13.jpg'),
(14, 'Рюкзак Haglofs Angd 60', 'Angd 60 – надёжный туристический рюкзак для пеших, горных походов средней продолжительности, экспедиций и путешествий.', 17780, 5, 'images_pack/img14.jpg'),
(15, 'Футболка женская Haglofs Ridge Hike', 'Haglofs Ridge Hike – стильная футболка для повседневного использования, занятий спортом и для отдыха. Она выполнена из мягкого полиэстера, который быстро высыхает и очень приятен к телу.', 3213, 3, 'images_pack/img15.jpg'),
(16, 'Брюки мужские Haglofs Rugged Flex', 'Haglofs Rugged Flex - универсальные брюки для разных видов outdoor активностей. Они выполнены из прочной стрейчевой ткани, имеют артикулированный крой и стрейчевые вставки для максимальной свободы движений. Эти брюки идеально подойдут для туризма, боулдеринга, велоспорта.', 14990, 4, 'images_pack/img16.png'),
(17, 'Палатка Minima', 'Minima 3 SL - ультралёгкая, двухместная двухслойная палатка от Camp. Полный вес палатки – 2100 грамм. Она разрабатывалась специально для сложных мультигонок и походов. Палатка быстро устанавливается на двух дугах.', 21693, 8, 'images_pack/img17.jpg'),
(18, 'Рюкзак M20', 'M20 - современный рюкзак для альпинизма, прохождения виа феррат и мультипитчей, а также походов в стиле fast&light. Серия рюкзаков М в линейке фирмы CAMP выпускается много лет и по праву считается одной из самых удачных линеек альпинистских рюкзаков.', 7903, 5, 'images_pack/img18.jpg'),
(19, 'Рюкзак X3 Backdoor', 'Очень легкий рюкзак для скитура. Низкий вес, прочный материал Tri-Ripstop, доступ со спины, крепление для лыж, пряжки на груди и поясе, открываемые одной рукой, в этом рюкзаке есть все, что необходимо для дневного выхода на лыжах.', 6245, 5, 'images_pack/img19.jpg'),
(20, 'Ледоруб Corsa Trockii Killer', 'Ледоруб Corsa Race спроектирован специально для спортсменов, участвующих в соревнованиях по ски-альпинизму, которым требуется самое легкое снаряжение. Снижение веса было достигнуто за счет изменяемой толщины металла рукоятки, фрезеровки рукоятки, что также улучшает хват. В результате получился самый', 8990, 7, 'images_pack/img20.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id_type` int(11) NOT NULL,
  `name_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id_type`, `name_type`) VALUES
(1, 'Верхняя одежда'),
(2, 'Шорты'),
(3, 'Футболка'),
(4, 'Брюки'),
(5, 'Рюкзак'),
(6, 'Обувь'),
(7, 'Альпинистское снаряжение '),
(8, 'Палатка');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `vk_profile` varchar(255) DEFAULT NULL,
  `blood_type` varchar(10) DEFAULT NULL,
  `rh_factor` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `birth_date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `interests` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `first_name`, `last_name`, `patronymic`, `gender`, `vk_profile`, `blood_type`, `rh_factor`, `created_at`, `birth_date`, `address`, `interests`) VALUES
(6, 'asd@gmail.com', '$2y$10$0C2WKh1/PlS7ieSe5cYrJO6vfOj2dmhrG76pOh8Qqg3PU0hQveW6i', 'sdfsdfsdf', 'sdfsdfsdf', 'sdfsdf', '', 'asd@gmail.com', '1', 0, '2024-11-03 17:54:27', '2024-11-07', 'sdfsdf', 'sfesdjkfjksdfkjsdhfkjsdhfjksdhfjkhsdjkfhjkdshfkjsdhkfjhsdkjhfksdjlhfkkjdhsjksjkfhksdjhfkljsdhfkjlsdkhfkjsdhfklhALTER TABLE `users`\r\n  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;\r\n\r\n--');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `banned`
--
ALTER TABLE `banned`
  ADD PRIMARY KEY (`ip`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brand` (`id_type`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id_type`),
  ADD KEY `id_brand` (`id_type`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `types` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
