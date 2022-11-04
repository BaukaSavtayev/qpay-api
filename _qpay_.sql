-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 04 2022 г., 21:22
-- Версия сервера: 10.4.26-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `payment`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bonuses`
--

CREATE TABLE `bonuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `amount` int(11) NOT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT 0,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activation_start` timestamp NULL DEFAULT NULL,
  `deactivation_start` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bonuses`
--

INSERT INTO `bonuses` (`id`, `is_active`, `amount`, `business_id`, `client_id`, `activation_start`, `deactivation_start`, `created_at`, `updated_at`) VALUES
(115, 0, 1400, 66, 40, '2022-11-04 23:58:45', '2022-11-05 14:58:45', '2022-11-04 03:58:45', '2022-11-04 03:58:45'),
(116, 0, 1400, 66, 40, '2022-11-04 23:58:47', '2022-11-05 14:58:47', '2022-11-04 03:58:47', '2022-11-04 03:58:47'),
(117, 0, 1400, 66, 40, '2022-11-04 23:58:49', '2022-11-05 14:58:49', '2022-11-04 03:58:49', '2022-11-04 03:58:49'),
(118, 1, 400, 66, 40, '2022-11-04 03:59:31', '2022-11-04 18:59:31', '2022-11-04 03:59:31', '2022-11-04 03:59:42'),
(119, 1, 1400, 66, 40, '2022-11-04 03:59:33', '2022-11-04 18:59:33', '2022-11-04 03:59:33', '2022-11-04 03:59:33'),
(120, 1, 1400, 66, 40, '2022-11-04 03:59:36', '2022-11-04 18:59:36', '2022-11-04 03:59:36', '2022-11-04 03:59:36'),
(121, 1, 1400, 66, 40, '2022-11-04 03:59:37', '2022-11-04 18:59:37', '2022-11-04 03:59:37', '2022-11-04 03:59:37'),
(122, 1, 1400, 66, 40, '2022-11-04 04:19:24', '2022-11-04 19:19:24', '2022-11-04 04:19:24', '2022-11-04 04:19:24'),
(123, 1, 900, 66, 39, '2022-11-04 04:24:50', '2022-11-04 19:24:50', '2022-11-04 04:24:50', '2022-11-04 04:25:03'),
(124, 1, 1400, 66, 40, '2022-11-04 04:46:49', '2022-11-04 19:46:49', '2022-11-04 04:46:49', '2022-11-04 04:46:49');

-- --------------------------------------------------------

--
-- Структура таблицы `bonuses_settings`
--

CREATE TABLE `bonuses_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `standard_bonus_size` tinyint(4) NOT NULL,
  `activation_start` int(11) NOT NULL DEFAULT 0,
  `deactivation_start` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bonuses_settings`
--

INSERT INTO `bonuses_settings` (`id`, `business_id`, `standard_bonus_size`, `activation_start`, `deactivation_start`, `created_at`, `updated_at`) VALUES
(14, 66, 10, 0, 15, '2022-11-04 03:53:50', '2022-11-04 03:59:26');

-- --------------------------------------------------------

--
-- Структура таблицы `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_owner_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` bigint(20) NOT NULL DEFAULT 0,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `business_owner_name`, `description`, `account`, `city_id`, `created_at`, `updated_at`) VALUES
(61, 'Amazon', 'Jeff', NULL, 0, NULL, '2022-11-04 03:47:32', '2022-11-04 03:47:32'),
(62, 'Amazon', 'Jeff', NULL, 0, NULL, '2022-11-04 03:47:39', '2022-11-04 03:47:39'),
(63, 'Amazon', 'Jeff', NULL, 0, NULL, '2022-11-04 03:47:43', '2022-11-04 03:47:43'),
(64, 'Amazon', 'Jeff', NULL, 0, NULL, '2022-11-04 03:47:49', '2022-11-04 03:47:49'),
(65, 'Amazon', 'Jeff', NULL, 0, NULL, '2022-11-04 03:47:53', '2022-11-04 03:47:53'),
(66, 'Microsoft', 'BaukaVauka', 'You must to update the windows to latest version.', 50000, NULL, '2022-11-04 03:47:58', '2022-11-04 04:04:22');

-- --------------------------------------------------------

--
-- Структура таблицы `business_category`
--

CREATE TABLE `business_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `business_category`
--

INSERT INTO `business_category` (`id`, `category_id`, `business_id`) VALUES
(388, 1, 66),
(387, 4, 66),
(380, 5, 66),
(386, 10, 66),
(385, 15, 66),
(384, 19, 66),
(383, 22, 66),
(382, 24, 66),
(381, 27, 66),
(379, 28, 66);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_category`, `created_at`, `updated_at`) VALUES
(1, 'Category1', 0, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(2, 'Category2', 1, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(3, 'Category3', 1, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(4, 'Category4', 1, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(5, 'Category5', 4, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(6, 'Category6', 4, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(7, 'Category7', 4, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(8, 'Category8', 4, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(9, 'Category9', 1, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(10, 'Category10', 0, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(11, 'Category11', 10, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(12, 'Category12', 10, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(13, 'Category13', 10, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(14, 'Category14', 10, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(15, 'Category15', 10, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(16, 'Category16', 15, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(17, 'Category17', 15, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(18, 'Category18', 15, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(19, 'Category19', 15, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(20, 'Category20', 19, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(21, 'Category21', 19, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(22, 'Category22', 19, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(23, 'Category23', 22, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(24, 'Category24', 22, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(25, 'Category25', 24, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(26, 'Category26', 24, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(27, 'Category27', 24, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(28, 'Category28', 27, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(29, 'Category29', 0, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(30, 'Category30', 29, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(31, 'Category31', 0, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(32, 'Category32', 31, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(33, 'Category33', 0, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(34, 'Category34', 33, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(35, 'Category35', 0, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(36, 'Category36', 35, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(37, 'Category37', 0, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(38, 'Category38', 37, '2022-10-10 07:54:26', '2022-10-10 07:54:26'),
(39, 'Category39', 0, '2022-10-10 07:54:26', '2022-10-10 07:54:26');

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(11, 'Актау', '2022-10-08 07:29:50', '2022-10-08 07:29:50'),
(12, 'Алматы', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(13, 'Астана', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(14, 'Арыс', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(15, 'Атырау', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(16, 'Актобе', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(17, 'Жанаозен', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(18, 'Павлодар', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(19, 'Костанай', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(20, 'Семей', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(21, 'Жезказган', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(22, 'Уральск', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(23, 'Шыымкент', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(24, 'Тараз', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(25, 'Кокшетау', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(26, 'Кызылорда', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(27, 'Кентау', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(28, 'Капчагай', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(29, 'Усть-Каменогорск', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(30, 'Петропавловск', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(31, 'Темиртау', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(32, 'Туркестан', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(33, 'Экибастуз', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(34, 'Талдыкорган', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(35, 'Рудный', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(36, 'Балхаш', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(37, 'Каскелен', '2022-10-08 07:35:19', '2022-10-08 07:35:19'),
(38, 'Жаркент', '2022-10-08 07:36:21', '2022-10-08 07:36:21'),
(39, 'Талгар', '2022-10-08 07:36:21', '2022-10-08 07:36:21'),
(40, 'Сайрам', '2022-10-08 07:36:21', '2022-10-08 07:36:21');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `created_at`, `updated_at`) VALUES
(31, '2022-11-04 03:48:12', '2022-11-04 03:48:12'),
(32, '2022-11-04 03:48:18', '2022-11-04 03:48:18'),
(33, '2022-11-04 03:48:22', '2022-11-04 03:48:22'),
(34, '2022-11-04 03:48:26', '2022-11-04 03:48:26'),
(35, '2022-11-04 03:48:30', '2022-11-04 03:48:30'),
(36, '2022-11-04 03:48:34', '2022-11-04 03:48:34'),
(37, '2022-11-04 03:48:38', '2022-11-04 03:48:38'),
(38, '2022-11-04 03:48:43', '2022-11-04 03:48:43'),
(39, '2022-11-04 03:48:46', '2022-11-04 03:48:46'),
(40, '2022-11-04 03:48:50', '2022-11-04 03:48:50');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_domain` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `business_id`, `position`, `created_at`, `updated_at`) VALUES
(58, 66, 'CEO', '2022-11-04 04:23:35', '2022-11-04 04:23:35'),
(59, 66, 'President', '2022-11-04 04:29:44', '2022-11-04 04:30:24');

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
-- Структура таблицы `help_desk`
--

CREATE TABLE `help_desk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `help_desk_categories`
--

CREATE TABLE `help_desk_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `url`, `imageable_type`, `imageable_id`) VALUES
(14, 'C:\\OSPanel\\domains\\payment.lock\\public\\upload\\1667546022.jpg', 'App\\Models\\Client', 40);

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_05_061626_create_transactions_table', 1),
(6, '2022_10_05_062356_add_account_column_to_users_table', 2),
(7, '2022_10_05_070709_create_permission_tables', 3),
(8, '2022_10_05_085132_create_partners_table', 4),
(9, '2022_10_05_085747_add_prone_number_column_to_users_table', 4),
(10, '2022_10_05_105031_create_profilea_table', 5),
(11, '2022_10_05_113601_change_transactions_table', 5),
(19, '2022_10_06_050803_create_cities_table', 6),
(20, '2022_10_06_060102_create_help_desk_table', 6),
(21, '2022_10_06_060116_create_help_desk_categories_table', 6),
(22, '2022_10_06_062947_create_role_and_permissions', 7),
(23, '2022_10_06_064017_add_foreign_key_to_help_desc_table', 8),
(24, '2022_10_06_064945_add_foreign_key_to_help_desk_table', 9),
(25, '2022_10_06_065208_drop_profiles_table', 10),
(26, '2022_10_06_070507_create_schedule_table', 11),
(27, '2022_10_06_071528_create_business_table', 12),
(28, '2022_10_06_071838_create_images_table', 13),
(29, '2022_10_06_072538_add_image-column_to_business_table', 14),
(30, '2022_10_06_073419_change_schedule_table', 15),
(31, '2022_10_06_074132_create_employees_table', 16),
(32, '2022_10_06_074425_create_employees_table', 17),
(33, '2022_10_06_075305_create_employees_table', 18),
(34, '2022_10_06_080309_create_business_categories_table', 19),
(35, '2022_10_06_082845_create_employees_table', 19),
(36, '2022_10_06_083217_create_business_table', 19),
(37, '2022_10_06_083619_create_clients_table', 20),
(38, '2022_10_06_084415_create_categories_table', 21),
(39, '2022_10_06_084754_create_business_category_table', 22),
(40, '2022_10_06_085115_create_businesses_table', 23),
(41, '2022_10_06_085242_create_business_category_table', 24),
(42, '2022_10_06_090229_create_business_category_table', 25),
(44, '2022_10_07_084256_create_model_has_image_table', 26),
(47, '2022_10_07_090854_create_user_has_model_table', 27),
(48, '2022_10_07_092357_change_business_table', 27),
(49, '2022_10_07_095148_create_businesses_table', 28),
(50, '2022_10_07_095543_create_schedules_table', 29),
(51, '2022_10_07_095752_create_contacts_table', 29),
(52, '2022_10_08_120501_set_users_role', 30),
(53, '2022_10_08_125841_change_phone_number_column_to_users_table', 31),
(56, '2022_10_10_043336_add_business_id_column_to_employees_table', 32),
(60, '2022_10_10_070529_create_model_has_image_table', 33),
(61, '2022_10_12_054152_create_accounts_table', 34),
(62, '2022_10_12_054318_create_images_table', 34),
(63, '2022_10_15_105830_create_usearable_table', 35),
(67, '2022_10_18_045712_create_bonuses_settings_table', 36),
(68, '2022_10_19_101829_create_bonuses_table', 37),
(69, '2022_10_21_104855_create_jobs_table', 38),
(70, '2022_10_21_114530_create_bonuses_table', 39),
(72, '2022_10_26_045301_create_transactions_table', 40),
(76, '2022_10_26_125140_create_accounts_table', 41),
(79, '2022_10_29_141422_add_tr_type_column_to_transaction_table', 42),
(80, '2022_11_01_112442_add_account_column_to_business_table', 43),
(81, '2022_11_01_170410_create_payments_table', 44);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(26, 'App\\Models\\User', 219),
(26, 'App\\Models\\User', 250),
(26, 'App\\Models\\User', 254),
(26, 'App\\Models\\User', 256),
(26, 'App\\Models\\User', 259),
(26, 'App\\Models\\User', 263),
(26, 'App\\Models\\User', 280),
(26, 'App\\Models\\User', 281),
(42, 'App\\Models\\User', 219),
(42, 'App\\Models\\User', 250),
(42, 'App\\Models\\User', 254),
(42, 'App\\Models\\User', 256),
(42, 'App\\Models\\User', 259),
(42, 'App\\Models\\User', 263),
(42, 'App\\Models\\User', 280),
(42, 'App\\Models\\User', 281),
(43, 'App\\Models\\User', 219),
(43, 'App\\Models\\User', 250),
(43, 'App\\Models\\User', 254),
(43, 'App\\Models\\User', 256),
(43, 'App\\Models\\User', 259),
(43, 'App\\Models\\User', 263),
(43, 'App\\Models\\User', 280),
(43, 'App\\Models\\User', 281),
(44, 'App\\Models\\User', 219),
(44, 'App\\Models\\User', 250),
(44, 'App\\Models\\User', 254),
(44, 'App\\Models\\User', 256),
(44, 'App\\Models\\User', 259),
(44, 'App\\Models\\User', 263),
(44, 'App\\Models\\User', 280),
(44, 'App\\Models\\User', 281),
(45, 'App\\Models\\User', 254),
(45, 'App\\Models\\User', 259),
(45, 'App\\Models\\User', 263),
(45, 'App\\Models\\User', 280),
(46, 'App\\Models\\User', 254),
(46, 'App\\Models\\User', 259),
(46, 'App\\Models\\User', 263),
(46, 'App\\Models\\User', 280);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(12, 'App\\Models\\User', 250),
(12, 'App\\Models\\User', 253),
(12, 'App\\Models\\User', 260),
(12, 'App\\Models\\User', 261),
(12, 'App\\Models\\User', 264),
(12, 'App\\Models\\User', 265),
(12, 'App\\Models\\User', 266),
(12, 'App\\Models\\User', 267),
(12, 'App\\Models\\User', 268),
(12, 'App\\Models\\User', 269),
(13, 'App\\Models\\User', 258),
(13, 'App\\Models\\User', 262),
(13, 'App\\Models\\User', 270),
(13, 'App\\Models\\User', 271),
(13, 'App\\Models\\User', 272),
(13, 'App\\Models\\User', 273),
(13, 'App\\Models\\User', 274),
(13, 'App\\Models\\User', 275),
(13, 'App\\Models\\User', 276),
(13, 'App\\Models\\User', 277),
(13, 'App\\Models\\User', 278),
(13, 'App\\Models\\User', 279),
(15, 'App\\Models\\User', 259),
(15, 'App\\Models\\User', 263),
(15, 'App\\Models\\User', 280),
(15, 'App\\Models\\User', 281);

-- --------------------------------------------------------

--
-- Структура таблицы `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `partners`
--

INSERT INTO `partners` (`id`, `business_id`, `client_id`, `created_at`, `updated_at`) VALUES
(26, 66, 40, '2022-11-04 03:53:57', '2022-11-04 03:53:57'),
(27, 66, 39, '2022-11-04 04:24:50', '2022-11-04 04:24:50');

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
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `business_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(138, 66, 10000, 2, '2022-11-04 03:58:06', '2022-11-04 03:58:08'),
(139, 66, 10000, 0, '2022-11-04 03:58:10', '2022-11-04 03:58:10'),
(140, 66, 10000, 2, '2022-11-04 03:58:21', '2022-11-04 03:58:23'),
(141, 66, 10000, 2, '2022-11-04 03:58:25', '2022-11-04 03:58:27'),
(142, 66, 10000, 2, '2022-11-04 03:58:28', '2022-11-04 03:58:29'),
(143, 66, 10000, 0, '2022-11-04 03:58:31', '2022-11-04 03:58:31'),
(144, 66, 10000, 2, '2022-11-04 03:58:38', '2022-11-04 03:58:39');

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(23, 'create-users', 'web', '2022-10-06 03:38:35', '2022-10-06 03:38:35'),
(24, 'edit-users', 'web', '2022-10-06 03:38:35', '2022-10-06 03:38:35'),
(25, 'delete-users', 'web', '2022-10-06 03:38:35', '2022-10-06 03:38:35'),
(26, 'top-up-account', 'web', '2022-10-06 03:38:35', '2022-10-06 03:38:35'),
(29, 'check-account', 'web', '2022-10-06 03:38:35', '2022-10-06 03:38:35'),
(30, 'check-statistics', 'web', '2022-10-06 03:38:35', '2022-10-06 03:38:35'),
(42, 'withdrawal-bonuses', 'web', '2022-10-30 16:56:45', '2022-10-30 16:56:45'),
(43, 'accrual-bonuses', 'web', '2022-10-30 16:56:45', '2022-10-30 16:56:45'),
(44, 'add-employee', 'web', '2022-10-30 16:56:45', '2022-10-30 16:56:45'),
(45, 'check-clients-list', 'web', '2022-10-30 16:56:45', '2022-10-30 16:56:45'),
(46, 'profile-setup', 'web', '2022-10-30 17:00:11', '2022-10-30 17:00:11');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(24, 'App\\Models\\User', 269, 'myapptoken', '3faaccdeaa842dfb087d2a440b1ed16f0d9e477c38228e48133f2a7165c37309', '[\"*\"]', '2022-11-04 06:48:42', NULL, '2022-11-04 03:50:45', '2022-11-04 06:48:42'),
(25, 'App\\Models\\User', 279, 'myapptoken', 'c6465d6466ee2cb165520c631f63c4d96687923f6e1d472f3498b0acd3a2e10d', '[\"*\"]', '2022-11-04 06:54:18', NULL, '2022-11-04 03:51:19', '2022-11-04 06:54:18'),
(26, 'App\\Models\\User', 280, 'myapptoken', 'd21942ab95ff212c99a878cd5678d23d14c527dd6ff10c30d7576952a8f32fe0', '[\"*\"]', '2022-11-04 06:33:48', NULL, '2022-11-04 04:24:24', '2022-11-04 06:33:48'),
(27, 'App\\Models\\User', 270, 'myapptoken', '6339b076ec0997d403048a2e37945a2610835924bbb57993c75e17ef6bc97eb0', '[\"*\"]', NULL, NULL, '2022-11-04 06:34:21', '2022-11-04 06:34:21');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(11, 'Super-Admin', 'web', '2022-10-06 03:38:35', '2022-10-06 03:38:35'),
(12, 'Business', 'web', '2022-10-06 03:38:35', '2022-10-06 03:38:35'),
(13, 'Client', 'web', '2022-10-06 03:38:35', '2022-10-06 03:38:35'),
(14, 'Developer', 'web', '2022-10-06 03:38:35', '2022-10-06 03:38:35'),
(15, 'Employee', 'web', '2022-10-06 03:38:35', '2022-10-06 03:38:35');

-- --------------------------------------------------------

--
-- Структура таблицы `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(23, 11),
(24, 11),
(25, 11),
(26, 12),
(29, 12),
(30, 12),
(42, 12),
(43, 12),
(44, 12),
(45, 12),
(46, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `monday` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuesday` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wednesday` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thursday` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `friday` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saturday` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunday` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `schedules`
--

INSERT INTO `schedules` (`id`, `business_id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `created_at`, `updated_at`) VALUES
(29, 66, '11:33-15:15', '11:33-14:15', '11:33-16:15', '11:33-17:15', '11:33-18:15', '11:33-19:15', '11:33-20:15', '2022-11-04 04:57:56', '2022-11-04 05:03:31');

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_amount` int(11) NOT NULL,
  `bonus_amount` int(11) NOT NULL,
  `bonus_size` tinyint(4) NOT NULL,
  `userable_id` int(10) UNSIGNED NOT NULL,
  `recipient` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_type` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `transactions`
--

INSERT INTO `transactions` (`id`, `purchase_amount`, `bonus_amount`, `bonus_size`, `userable_id`, `recipient`, `status`, `comment`, `tr_type`, `created_at`, `updated_at`) VALUES
(181, 7000, 1400, 20, 66, 40, 1, NULL, 1, '2022-11-04 03:53:57', '2022-11-04 03:53:57'),
(182, 7000, 1400, 20, 66, 40, 1, NULL, 1, '2022-11-04 03:54:00', '2022-11-04 03:54:00'),
(183, 7000, 1400, 20, 66, 40, 1, NULL, 1, '2022-11-04 03:54:01', '2022-11-04 03:54:01'),
(184, 7000, 1400, 20, 66, 40, 1, NULL, 1, '2022-11-04 03:54:02', '2022-11-04 03:54:02'),
(185, 7000, 1400, 20, 66, 40, 1, NULL, 1, '2022-11-04 03:54:05', '2022-11-04 03:54:05'),
(186, 7000, 1400, 20, 66, 40, 1, NULL, 1, '2022-11-04 03:58:45', '2022-11-04 03:58:45'),
(187, 7000, 1400, 20, 66, 40, 1, NULL, 1, '2022-11-04 03:58:47', '2022-11-04 03:58:47'),
(188, 7000, 1400, 20, 66, 40, 1, NULL, 1, '2022-11-04 03:58:49', '2022-11-04 03:58:49'),
(189, 7000, 1400, 20, 66, 40, 1, NULL, 1, '2022-11-04 03:59:31', '2022-11-04 03:59:31'),
(190, 7000, 1400, 20, 66, 40, 1, NULL, 1, '2022-11-04 03:59:33', '2022-11-04 03:59:33'),
(191, 7000, 1400, 20, 66, 40, 1, NULL, 1, '2022-11-04 03:59:36', '2022-11-04 03:59:36'),
(192, 7000, 1400, 20, 66, 40, 1, NULL, 1, '2022-11-04 03:59:37', '2022-11-04 03:59:37'),
(193, 0, 500, 0, 66, 40, 1, NULL, 2, '2022-11-04 03:59:41', '2022-11-04 03:59:41'),
(194, 0, 500, 0, 66, 40, 1, NULL, 2, '2022-11-04 03:59:42', '2022-11-04 03:59:42'),
(195, 7000, 1400, 20, 66, 40, 1, NULL, 1, '2022-11-04 04:19:24', '2022-11-04 04:19:24'),
(196, 7000, 1400, 20, 66, 39, 1, NULL, 1, '2022-11-04 04:24:50', '2022-11-04 04:24:50'),
(197, 0, 500, 0, 66, 39, 1, NULL, 2, '2022-11-04 04:25:03', '2022-11-04 04:25:03'),
(198, 7000, 1400, 20, 66, 40, 1, NULL, 1, '2022-11-04 04:46:49', '2022-11-04 04:46:49');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userable_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userable_id` bigint(20) DEFAULT NULL,
  `phone_number` bigint(20) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `userable_type`, `userable_id`, `phone_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(264, 'Amazon', NULL, 'App\\Models\\Business', 61, 22222222222, NULL, '$2y$10$fQP2h5dfChAGiRKV1KAR.upHWGWtVoWTXGU.0WzTeF1iMxnrE.8ki', NULL, '2022-11-04 03:47:32', '2022-11-04 03:47:32'),
(265, 'Amazon', NULL, 'App\\Models\\Business', 62, 22222222221, NULL, '$2y$10$kWVq7H66iUOu1VCG26NIzeq706sOBs9gtwFFyHwaIX9q1TTliBJm2', NULL, '2022-11-04 03:47:39', '2022-11-04 03:47:39'),
(266, 'Amazon', NULL, 'App\\Models\\Business', 63, 22222222223, NULL, '$2y$10$T/DzQ19ArWJFa7Idb7TrNudLbNccQqtMQlVeyTlVcYEx6KJaZpjQ.', NULL, '2022-11-04 03:47:43', '2022-11-04 03:47:43'),
(267, 'Amazon', NULL, 'App\\Models\\Business', 64, 22222222224, NULL, '$2y$10$MilIyL133UG9scNb.SLTW.xhXxM83tpsr.pfAHepmDoosBN/mhPyG', NULL, '2022-11-04 03:47:49', '2022-11-04 03:47:49'),
(268, 'Amazon', NULL, 'App\\Models\\Business', 65, 22222222225, NULL, '$2y$10$L4d62kc1ovxHDGAe2hTkneSmHBvJRIN2ktK1xu0AgD33.oiinWFIS', NULL, '2022-11-04 03:47:53', '2022-11-04 03:47:53'),
(269, 'Amazon', NULL, 'App\\Models\\Business', 66, 22222222226, NULL, '$2y$10$VgttULd77AlDVK31Gt8nGecX4DUPPQoI6jCHhhTUh4TvysxM5l2mi', NULL, '2022-11-04 03:47:58', '2022-11-04 03:47:58'),
(270, 'Bauka', NULL, 'App\\Models\\Client', 31, 12345678999, NULL, '$2y$10$vUMf6yRX0P718SpU0RKhjumXpRQar47/ChQTbrFMGTBV1q1WwaPiO', NULL, '2022-11-04 03:48:12', '2022-11-04 03:48:12'),
(271, 'Bauka', NULL, 'App\\Models\\Client', 32, 12345678998, NULL, '$2y$10$qUG0jQQ/Awi./Q3AFKuBR./ZkyfBepIXVWEbAQU.x2hkoZjluXXm6', NULL, '2022-11-04 03:48:18', '2022-11-04 03:48:18'),
(272, 'Bauka', NULL, 'App\\Models\\Client', 33, 12345678997, NULL, '$2y$10$GQvH3TLTC0YzhAwMjmjsc.GPfhhRA7Mhfl9yOaH6e88sYShVyXhWa', NULL, '2022-11-04 03:48:22', '2022-11-04 03:48:22'),
(273, 'Bauka', NULL, 'App\\Models\\Client', 34, 12345678996, NULL, '$2y$10$I7RLDWhEf3X5uo4GiKfgE.Zj68Ne0xFZwtY5r//5WpCBsQ6ZH2s82', NULL, '2022-11-04 03:48:26', '2022-11-04 03:48:26'),
(274, 'Bauka', NULL, 'App\\Models\\Client', 35, 12345678995, NULL, '$2y$10$O8qs428wm0nP.iF2Dy694OjD.xrxizBaOx5qEHRmJo1Sk7Mv5G3Fi', NULL, '2022-11-04 03:48:30', '2022-11-04 03:48:30'),
(275, 'Bauka', NULL, 'App\\Models\\Client', 36, 12345678994, NULL, '$2y$10$4tIK.5FrQzW9Gtk15lMk/uPteK5OYvvq2gFHh1IyGxvVUe.vOoWUa', NULL, '2022-11-04 03:48:34', '2022-11-04 03:48:34'),
(276, 'Bauka', NULL, 'App\\Models\\Client', 37, 12345678993, NULL, '$2y$10$z3bsamKu2Oj5/fAlzy7fVe5cIg/7nV5Eixzo3QMnJ13EMYruKCrGG', NULL, '2022-11-04 03:48:38', '2022-11-04 03:48:38'),
(277, 'Bauka', NULL, 'App\\Models\\Client', 38, 12345678992, NULL, '$2y$10$N3e6YSKAWzd8iabwJF.SP.33x2.kY3iG.o2nRknl2svPLuLwvNJYS', NULL, '2022-11-04 03:48:43', '2022-11-04 03:48:43'),
(278, 'Bauka', NULL, 'App\\Models\\Client', 39, 12345678991, NULL, '$2y$10$noI/p7fBjIyP7rTzEfhLueCJCKtQWoiLRUwyB.2HyHhFB/jxeGnDe', NULL, '2022-11-04 03:48:46', '2022-11-04 03:48:46'),
(279, 'Bauu', NULL, 'App\\Models\\Client', 40, 12345678901, NULL, '$2y$10$lB.Ns8.tIoG5CytmFyGOvOTC3W8AveEIeTOpVTQKgh2uyYd10OMCa', NULL, '2022-11-04 03:48:50', '2022-11-04 04:13:19'),
(280, 'AlbertEinstein', NULL, 'App\\Models\\Employee', 58, 87760013466, NULL, '$2y$10$ZhIXE.n9QJknggD9SLhT6OjFNTuPVjkwzrMheJygAU3o6fRdNUKDC', NULL, '2022-11-04 04:23:35', '2022-11-04 06:32:57'),
(281, 'Bill', NULL, 'App\\Models\\Employee', 59, 87760013663, NULL, '$2y$10$3FOWc/SvqTdxFIEsGlzrju9tlhQqkI4n0kyehSEiqjRhQoMKqt26S', NULL, '2022-11-04 04:29:44', '2022-11-04 04:30:24');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bonuses`
--
ALTER TABLE `bonuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bonuses_business_id_foreign` (`business_id`),
  ADD KEY `bonuses_client_id_foreign` (`client_id`);

--
-- Индексы таблицы `bonuses_settings`
--
ALTER TABLE `bonuses_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_id` (`business_id`);

--
-- Индексы таблицы `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `businesses_city_id_foreign` (`city_id`);

--
-- Индексы таблицы `business_category`
--
ALTER TABLE `business_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `busines_cat` (`category_id`,`business_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_id` (`business_id`),
  ADD UNIQUE KEY `business_id_2` (`business_id`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_business_id_foreign` (`business_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `help_desk`
--
ALTER TABLE `help_desk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help_desk_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `help_desk_categories`
--
ALTER TABLE `help_desk_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `imageable_type` (`imageable_type`,`imageable_id`),
  ADD UNIQUE KEY `imageable_type_2` (`imageable_type`,`imageable_id`),
  ADD KEY `images_imageable_type_imageable_id_index` (`imageable_type`,`imageable_id`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_business_id_foreign` (`business_id`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_id` (`business_id`);

--
-- Индексы таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `userable_type` (`userable_type`,`userable_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bonuses`
--
ALTER TABLE `bonuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT для таблицы `bonuses_settings`
--
ALTER TABLE `bonuses_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `business_category`
--
ALTER TABLE `business_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `help_desk`
--
ALTER TABLE `help_desk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `help_desk_categories`
--
ALTER TABLE `help_desk_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT для таблицы `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bonuses`
--
ALTER TABLE `bonuses`
  ADD CONSTRAINT `bonuses_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`),
  ADD CONSTRAINT `bonuses_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Ограничения внешнего ключа таблицы `bonuses_settings`
--
ALTER TABLE `bonuses_settings`
  ADD CONSTRAINT `bonuses_settings_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`);

--
-- Ограничения внешнего ключа таблицы `businesses`
--
ALTER TABLE `businesses`
  ADD CONSTRAINT `businesses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Ограничения внешнего ключа таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `Businesses` (`id`);

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`);

--
-- Ограничения внешнего ключа таблицы `help_desk`
--
ALTER TABLE `help_desk`
  ADD CONSTRAINT `help_desk_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `help_desk_categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `Businesses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
