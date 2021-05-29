-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 06 2021 г., 22:48
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
-- Структура таблицы `actions`
--

CREATE TABLE `actions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('action','comment') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'action',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `checkboxes`
--

CREATE TABLE `checkboxes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updatet_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `checklists`
--

CREATE TABLE `checklists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, 1),
(2, 1, 2),
(3, 1, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `columns`
--

CREATE TABLE `columns` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `columns`
--

INSERT INTO `columns` (`id`, `name`, `number`) VALUES
(1, 'Новые', NULL),
(2, 'Колонка за апрель', NULL),
(3, 'Колонка за май', NULL),
(5, 'Проверенные', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `column_task`
--

CREATE TABLE `column_task` (
  `id` int(11) NOT NULL,
  `column_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `column_task`
--

INSERT INTO `column_task` (`id`, `column_id`, `task_id`) VALUES
(1, 1, 31),
(2, 1, 32),
(3, 2, 33),
(4, 2, 34),
(5, 2, 35),
(6, 1, 36),
(7, 1, 37),
(8, 1, 38),
(9, 1, 39),
(10, 2, 40),
(11, 5, 41);

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
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
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
(1, 'Проект №456', 'Федоров Иван Алексеевич', 'Федоров Роман Алексеевич', '2021-03-31', '2021-12-17', 'Украина, Харьков', NULL, NULL, 'Максим', 'Тестовый комментарий', 'Новый', NULL, '2021-03-29 02:03:03', '2021-03-29 05:52:15'),
(2, 'Проект 2', 'Федоров Иван Алексеевич', 'Федоров Роман Алексеевич', '2021-04-01', '2021-05-02', NULL, NULL, NULL, NULL, NULL, 'Новый', NULL, '2021-04-04 17:27:05', '2021-04-04 17:27:05'),
(3, 'Проект 222', 'Федоров Иван Алексеевич', 'Федоров Роман Алексеевич', '2021-04-01', '2021-04-30', NULL, NULL, NULL, NULL, NULL, 'Новый', NULL, '2021-04-06 08:57:16', '2021-04-06 08:57:16'),
(4, 'Проект 222', 'Федоров Иван Алексеевич', 'Федоров Роман Алексеевич', '2021-04-01', '2021-04-30', NULL, NULL, NULL, NULL, NULL, 'Новый', NULL, '2021-04-06 08:59:55', '2021-04-06 08:59:55'),
(5, 'Проект 222', 'Федоров Иван Алексеевич', 'Федоров Роман Алексеевич', '2021-04-01', '2021-04-30', NULL, NULL, NULL, NULL, NULL, 'Новый', NULL, '2021-04-06 09:05:14', '2021-04-06 09:05:14'),
(6, 'Проект 222', 'Федоров Иван Алексеевич', 'Федоров Роман Алексеевич', '2021-04-01', '2021-04-30', NULL, NULL, NULL, NULL, NULL, 'Новый', NULL, '2021-04-06 09:05:53', '2021-04-06 09:05:53'),
(7, 'Проект 222', 'Федоров Иван Алексеевич', 'Федоров Роман Алексеевич', '2021-04-01', '2021-04-30', NULL, NULL, NULL, NULL, NULL, 'Новый', NULL, '2021-04-06 09:07:19', '2021-04-06 09:07:19');

-- --------------------------------------------------------

--
-- Структура таблицы `project_column`
--

CREATE TABLE `project_column` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `column_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_column`
--

INSERT INTO `project_column` (`id`, `project_id`, `column_id`) VALUES
(1, 7, 1),
(2, 7, 2),
(3, 7, 3),
(4, 7, 4),
(5, 7, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `project_staff`
--

CREATE TABLE `project_staff` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_staff`
--

INSERT INTO `project_staff` (`id`, `project_id`, `staff_id`) VALUES
(8, 1, 9),
(12, 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `project_stage`
--

CREATE TABLE `project_stage` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_stage`
--

INSERT INTO `project_stage` (`id`, `project_id`, `stage_id`) VALUES
(3, 1, 3),
(6, 1, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `project_step`
--

CREATE TABLE `project_step` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `step_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_step`
--

INSERT INTO `project_step` (`id`, `project_id`, `step_id`) VALUES
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `project_task`
--

CREATE TABLE `project_task` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_task`
--

INSERT INTO `project_task` (`id`, `project_id`, `task_id`) VALUES
(1, 1, 19),
(2, 2, 20),
(3, 2, 21),
(4, 2, 16),
(5, 2, 23),
(6, 2, 24),
(7, 2, 25),
(8, 2, 26),
(9, 1, 27),
(10, 1, 28),
(11, 7, 29),
(12, 7, 30),
(13, 7, 31),
(14, 7, 32),
(15, 7, 33),
(16, 7, 34),
(17, 7, 35),
(18, 7, 36),
(19, 7, 37),
(20, 7, 38),
(21, 7, 39),
(22, 7, 40),
(23, 7, 41);

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
(1, 10, 1),
(2, 10, 2),
(3, 10, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stages`
--

INSERT INTO `stages` (`id`, `name`) VALUES
(3, 'Этап 1'),
(6, 'Этап 2');

-- --------------------------------------------------------

--
-- Структура таблицы `stage_step`
--

CREATE TABLE `stage_step` (
  `id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `step_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stage_step`
--

INSERT INTO `stage_step` (`id`, `stage_id`, `step_id`) VALUES
(9, 3, 9),
(10, 3, 10),
(11, 3, 11),
(12, 3, 12),
(14, 4, 14),
(15, 9, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `steps`
--

CREATE TABLE `steps` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `steps`
--

INSERT INTO `steps` (`id`, `name`, `date_start`, `date_end`, `comment`) VALUES
(9, 'Шаг 1', NULL, NULL, NULL),
(10, 'Шаг 2', NULL, NULL, NULL),
(11, 'Шаг 4', NULL, NULL, NULL),
(12, 'Шаг 3', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `step_task`
--

CREATE TABLE `step_task` (
  `id` int(11) NOT NULL,
  `step_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `step_task`
--

INSERT INTO `step_task` (`id`, `step_id`, `task_id`) VALUES
(16, 11, 16),
(18, 11, 27);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `step_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Новая','В работе','Готово к проверке','Завершено') COLLATE utf8mb4_unicode_ci DEFAULT 'Новая',
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `step_id`, `name`, `date_start`, `date_end`, `priority`, `status`, `time`, `task`, `number`, `created_at`, `updated_at`) VALUES
(16, 11, 'Задача Тест', '2021-04-01', '2021-04-10', 'Во вторую очередь', 'Новая', '4', 'Описание задачи', NULL, '2021-03-31 18:13:30', '2021-04-05 03:34:11'),
(19, NULL, 'Задача Тест 2', NULL, NULL, 'Срочно', 'Новая', NULL, NULL, NULL, '2021-04-01 01:46:00', '2021-04-05 03:34:13'),
(20, NULL, 'Задача Тест 3', NULL, NULL, 'Срочно', 'В работе', NULL, NULL, NULL, '2021-04-01 05:31:59', '2021-04-05 04:51:52'),
(21, NULL, 'Задача Тест 4', NULL, NULL, 'Срочно', 'Новая', NULL, NULL, NULL, '2021-04-02 06:09:45', '2021-04-05 03:34:17'),
(23, NULL, 'Задача Тест 7', NULL, NULL, 'Срочно', 'В работе', NULL, NULL, NULL, '2021-04-05 02:58:25', '2021-04-05 05:59:06'),
(24, NULL, 'Задача Тест 8', NULL, NULL, 'Срочно', 'Новая', NULL, NULL, NULL, '2021-04-05 02:58:31', '2021-04-05 02:58:31'),
(25, NULL, 'Задача Тест 9', NULL, NULL, 'Срочно', 'Новая', NULL, NULL, NULL, '2021-04-05 02:58:34', '2021-04-05 02:58:34'),
(26, NULL, 'Задача Тест 10', NULL, NULL, 'Срочно', 'Новая', NULL, NULL, NULL, '2021-04-05 02:58:39', '2021-04-05 02:58:39'),
(27, 11, 'Задача Тест 22', NULL, NULL, 'Срочно', 'Новая', NULL, NULL, NULL, '2021-04-05 09:19:28', '2021-04-05 09:19:28'),
(28, NULL, 'Задача Тест 23', NULL, NULL, 'Срочно', 'Новая', NULL, NULL, NULL, '2021-04-05 09:19:38', '2021-04-05 09:19:38'),
(30, NULL, 'какая-то задача 2', NULL, NULL, NULL, 'Новая', NULL, NULL, NULL, '2021-04-06 12:01:06', '2021-04-06 12:01:06'),
(31, NULL, 'какая-то задача 3', NULL, NULL, NULL, 'Новая', NULL, NULL, 1, '2021-04-06 12:02:39', '2021-04-06 16:41:56'),
(32, NULL, 'какая-то задача 4', NULL, NULL, NULL, 'Новая', NULL, NULL, 2, '2021-04-06 12:02:57', '2021-04-06 16:41:56'),
(33, NULL, 'какая-то задача 5', NULL, NULL, NULL, 'Новая', NULL, NULL, 2, '2021-04-06 12:03:18', '2021-04-06 16:47:51'),
(34, NULL, 'какая-то задача 6', NULL, NULL, NULL, 'Новая', NULL, NULL, 3, '2021-04-06 12:06:52', '2021-04-06 16:47:51'),
(35, NULL, 'какая-то задача 7', NULL, NULL, NULL, 'Новая', NULL, NULL, 4, '2021-04-06 12:06:55', '2021-04-06 16:47:51'),
(39, NULL, 'задача 5', NULL, NULL, NULL, 'Новая', NULL, NULL, 3, '2021-04-06 12:51:37', '2021-04-06 16:41:38'),
(40, NULL, 'задача 654', NULL, NULL, NULL, 'Новая', NULL, NULL, 1, '2021-04-06 12:53:53', '2021-04-06 16:47:51'),
(41, NULL, 'задача 123', NULL, NULL, NULL, 'Новая', NULL, NULL, 1, '2021-04-06 12:54:47', '2021-04-06 16:37:14');

-- --------------------------------------------------------

--
-- Структура таблицы `task_action`
--

CREATE TABLE `task_action` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `task_checklist`
--

CREATE TABLE `task_checklist` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `checklist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `task_file`
--

CREATE TABLE `task_file` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `task_participant`
--

CREATE TABLE `task_participant` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `task_participant`
--

INSERT INTO `task_participant` (`id`, `task_id`, `staff_id`) VALUES
(4, 16, 9),
(5, 16, 10);

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
(1, 1, 1),
(2, 1, 2),
(3, 1, 7);

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
(9, 1, 9),
(10, 1, 10);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `checkboxes`
--
ALTER TABLE `checkboxes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `checklists`
--
ALTER TABLE `checklists`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `columns`
--
ALTER TABLE `columns`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `column_task`
--
ALTER TABLE `column_task`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `project_column`
--
ALTER TABLE `project_column`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_staff`
--
ALTER TABLE `project_staff`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_stage`
--
ALTER TABLE `project_stage`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_step`
--
ALTER TABLE `project_step`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_task`
--
ALTER TABLE `project_task`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `responsible_project`
--
ALTER TABLE `responsible_project`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stage_step`
--
ALTER TABLE `stage_step`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `step_task`
--
ALTER TABLE `step_task`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `task_action`
--
ALTER TABLE `task_action`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `task_checklist`
--
ALTER TABLE `task_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `task_file`
--
ALTER TABLE `task_file`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `task_participant`
--
ALTER TABLE `task_participant`
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
-- AUTO_INCREMENT для таблицы `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `checkboxes`
--
ALTER TABLE `checkboxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `checklists`
--
ALTER TABLE `checklists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `client_project`
--
ALTER TABLE `client_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `columns`
--
ALTER TABLE `columns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `column_task`
--
ALTER TABLE `column_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `project_column`
--
ALTER TABLE `project_column`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `project_staff`
--
ALTER TABLE `project_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `project_stage`
--
ALTER TABLE `project_stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `project_step`
--
ALTER TABLE `project_step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `project_task`
--
ALTER TABLE `project_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `responsible_project`
--
ALTER TABLE `responsible_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `stage_step`
--
ALTER TABLE `stage_step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `steps`
--
ALTER TABLE `steps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `step_task`
--
ALTER TABLE `step_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `task_action`
--
ALTER TABLE `task_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `task_checklist`
--
ALTER TABLE `task_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `task_file`
--
ALTER TABLE `task_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `task_participant`
--
ALTER TABLE `task_participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user_staff`
--
ALTER TABLE `user_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
