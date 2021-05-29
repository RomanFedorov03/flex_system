-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 29 2021 г., 09:01
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravue`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contractSum` int(11) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Новый','Потенциальный','Некачественный','Клиент') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Новый',
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `surname`, `patronymic`, `birthdate`, `phone`, `email`, `country`, `city`, `address`, `company`, `contractSum`, `photo`, `status`, `comment`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Иван', 'Федоров', 'Алексеевич', '2021-03-01', '0967523250', 'shubin_misha@mail.ru', 'Ukraine', 'Kharkiv', 'st. Valentinovskaya 50/5', 'Строй Сити', 50000, NULL, 'Новый', 'asdasdasdasdasdasd', NULL, NULL, '2021-03-28 17:41:57', '2021-03-29 05:07:40');

-- --------------------------------------------------------

--
-- Структура таблицы `client_project`
--

CREATE TABLE `client_project` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `client_project`
--

INSERT INTO `client_project` (`id`, `client_id`, `project_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_19_071735_user__staff', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsible` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `figma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectUrl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Новый','В работе','Завершен','') COLLATE utf8mb4_unicode_ci DEFAULT 'Новый',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `name`, `client`, `responsible`, `startDate`, `endDate`, `address`, `figma`, `projectUrl`, `contact`, `comment`, `status`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Проект №456', 'Федоров Иван Алексеевич', 'Федоров Роман Алексеевич', '2021-03-31', '2021-12-17', 'Украина, Харьков', NULL, NULL, 'Максим', 'Тестовый комментарий', 'Новый', NULL, '2021-03-29 02:03:03', '2021-03-29 05:52:15');

-- --------------------------------------------------------

--
-- Структура таблицы `responsible_project`
--

CREATE TABLE `responsible_project` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `responsible_project`
--

INSERT INTO `responsible_project` (`id`, `staff_id`, `project_id`) VALUES
(1, 10, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `contract` int(11) DEFAULT 0,
  `contract_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `webwork_id` int(11) DEFAULT NULL,
  `access_dashboard` int(11) DEFAULT 0,
  `access_project` int(11) DEFAULT 0,
  `access_task` int(11) DEFAULT 0,
  `access_template` int(11) DEFAULT 0,
  `access_staff` int(11) DEFAULT 0,
  `access_client` int(11) DEFAULT 0,
  `access_report` int(11) DEFAULT 0,
  `access_finance` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `surname`, `patronymic`, `phone`, `photo`, `birth_date`, `type`, `grade`, `rate`, `contract`, `contract_file`, `passport`, `password`, `profession`, `remember_token`, `webwork_id`, `access_dashboard`, `access_project`, `access_task`, `access_template`, `access_staff`, `access_client`, `access_report`, `access_finance`, `created_at`, `updated_at`) VALUES
(1, 'Роман', 'roma.fedorov0308@gmail.com', NULL, NULL, NULL, NULL, 'G2gluuser-male.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, '$2y$10$wKfJRSruD0VosQo94vnyLuL.PBhz1tV1THTlQaDpK2oSTV3Vjzx6q', 'Администратор', 'nEjeWxoV61nU0euBHTif1JecU72abCqCMzL0U10TCPwBd73yxs6x7GXQLEMb', NULL, 3, 3, 3, 3, 3, 3, 3, 3, '2021-03-21 07:22:05', '2021-03-21 07:22:05'),
(9, 'Роман', 'roma.fedorov803@gmail.com', NULL, 'Федоров', 'Алексеевич', '0967523250', NULL, '2021-03-11', 'staff', NULL, 1, NULL, 'money.svg', 'stats.svg', '$2y$10$1rPkdbBhZSZMrUVCbSEy9udAsF1FmqXP1WGqzIJGNavx9wMF5NQ6G', NULL, NULL, NULL, 0, 1, 2, 3, 0, 1, 2, 3, '2021-03-21 10:50:25', '2021-03-21 10:50:25'),
(10, 'Роман', 'roma.fedorov03@gmail.com', NULL, 'Федоров', 'Алексеевич', '+380967523250', 'QvyEguser-male.png', '1998-03-08', 'staff', NULL, 2, 1, NULL, 'UdsdOFrame (1).svg', '$2y$10$5ykpZGvjpdavUs1hw..C/eaQhO2V3WygjcrYEpV1P1c.z9uPfBDwq', NULL, NULL, 48247, 1, 2, 3, 1, 2, 3, 1, 2, '2021-03-21 19:39:38', '2021-03-21 19:39:40');

-- --------------------------------------------------------

--
-- Структура таблицы `user_client`
--

CREATE TABLE `user_client` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_client`
--

INSERT INTO `user_client` (`id`, `user_id`, `client_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_project`
--

CREATE TABLE `user_project` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_project`
--

INSERT INTO `user_project` (`id`, `user_id`, `project_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_staff`
--

CREATE TABLE `user_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(255) NOT NULL,
  `staff_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_staff`
--

INSERT INTO `user_staff` (`id`, `user_id`, `staff_id`) VALUES
(7, 1, 9),
(8, 1, 10);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `client_project`
--
ALTER TABLE `client_project`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `responsible_project`
--
ALTER TABLE `responsible_project`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `user_client`
--
ALTER TABLE `user_client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_project`
--
ALTER TABLE `user_project`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_staff`
--
ALTER TABLE `user_staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `client_project`
--
ALTER TABLE `client_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `responsible_project`
--
ALTER TABLE `responsible_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user_client`
--
ALTER TABLE `user_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user_project`
--
ALTER TABLE `user_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user_staff`
--
ALTER TABLE `user_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
