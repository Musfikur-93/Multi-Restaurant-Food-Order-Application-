-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 04:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `info` text DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `token`, `photo`, `phone`, `address`, `info`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Musfikur', 'admin@gmail.com', NULL, '$2y$12$XXdii8xNrqUwMhFxi3fTPO7k23M/iTDWrooZf/E6qNVYq7ROSW7pK', '', '1725703361.jpg', '(+91) - 540-025-124553', '11/2, Pallabi, Mirpur, Dhaka', 'I am Md Musfikur Rahman, I work on Web Application Developments. Feel free to contact me.', 'admin', '1', NULL, '2024-08-26 04:00:17', '2024-09-07 04:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `url`, `created_at`, `updated_at`) VALUES
(1, 'upload/banner/1815715813698974.jpg', 'https://restro.infotechgravity.com/theme-2', '2024-11-14 10:25:41', '2024-11-14 10:25:41'),
(2, 'upload/banner/1815715844136496.jpg', 'https://restro.infotechgravity.com/theme-3', '2024-11-14 10:26:06', '2024-11-14 10:26:06'),
(3, 'upload/banner/1815726761161118.jpg', 'https://restro.infotechgravity.com/theme-4', '2024-11-14 10:27:00', '2024-11-14 13:19:37'),
(5, 'upload/banner/1815883586843175.jpg', 'https://restro.infotechgravity.com/theme-5', '2024-11-16 06:52:20', '2024-11-16 06:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1726386178),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1726386178;', 1726386178),
('da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:2;', 1724605949),
('da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1724605949;', 1724605949),
('ishal@gmail.com|127.0.0.1', 'i:1;', 1726557900),
('ishal@gmail.com|127.0.0.1:timer', 'i:1726557900;', 1726557900);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Pizza', 'upload/category/1811054226147708.webp', '2024-09-23 23:31:41', '2024-09-23 23:34:21'),
(6, 'Burger', 'upload/category/1811054279335368.webp', '2024-09-23 23:32:31', '2024-09-23 23:33:31'),
(7, 'Cake', 'upload/category/1811054333301678.webp', '2024-09-23 23:33:23', '2024-09-23 23:33:23'),
(8, 'Chicken', 'upload/category/1811054417446625.webp', '2024-09-23 23:34:43', '2024-09-23 23:34:43'),
(9, 'Cafe', 'upload/category/1811054451259963.webp', '2024-09-23 23:35:15', '2024-09-23 23:38:24'),
(10, 'Scoop Haven', 'upload/category/1811054477339910.webp', '2024-09-23 23:35:40', '2024-09-23 23:38:14'),
(11, 'Tea', 'upload/category/1811054677101663.png', '2024-09-23 23:38:52', '2024-09-23 23:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `city_slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `city_slug`, `created_at`, `updated_at`) VALUES
(1, 'Adabor', 'adabor', '2024-09-24 23:13:15', '2024-09-24 23:13:15'),
(2, 'Cantonment Area', 'cantonment-area', '2024-09-24 23:13:29', '2024-09-24 23:13:29'),
(3, 'Uttara', 'uttara', '2024-09-24 23:13:39', '2024-09-24 23:13:39'),
(4, 'Dhanmondi', 'dhanmondi', '2024-09-24 23:13:49', '2024-09-24 23:13:49'),
(6, 'Gulshan', 'gulshan', '2024-09-24 23:14:10', '2024-09-24 23:14:10'),
(7, 'Dhaka University', 'dhaka-university', '2024-09-24 23:14:38', '2024-09-24 23:14:38'),
(8, 'Badda', 'badda', '2024-09-24 23:42:11', '2024-09-24 23:42:11'),
(9, 'Mirpur', 'mirpur', '2024-09-24 23:42:18', '2024-09-24 23:42:18'),
(10, 'Pallabi', 'pallabi', '2024-09-24 23:42:26', '2024-09-24 23:42:26'),
(11, 'New Market', 'new-market', '2024-09-24 23:42:54', '2024-09-24 23:42:54'),
(12, 'Farmgate', 'farmgate', '2024-09-24 23:43:07', '2024-09-24 23:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `info` text DEFAULT NULL,
  `city_id` int(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'client',
  `status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `email_verified_at`, `password`, `token`, `photo`, `phone`, `address`, `info`, `city_id`, `cover_photo`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Creamson', 'creamson@gmail.com', NULL, '$2y$12$v9N8Ns62uBHC91HHI6Z1UOnulvgQv.GRhTkjvv7e7iY4TACtsUKLW', '', '1732116661.webp', '+8801733300222', 'House 2, Block A, Road 3, Section 12, Dhaka 1216, Bangladesh.', 'Open: 10 AM - 10 PM (Local Time)\r\nHello Customer, The Creamson Cafe is the world largest Fast Food Institute. It\'s offer a delicious and innovative food lunch in for customer.', 6, '1728975576.webp', 'client', '1', NULL, NULL, '2024-11-25 09:47:08'),
(2, 'The Pizza', 'pizza@gmail.com', NULL, '$2y$12$nDRdxxIxP4hN1Lhy7q1mSuOfZaMW7iGK3LQciX/oB.XvAqMKr5Gl6', NULL, '1729700590.png', '919499874557', 'Gulshan, Dhaka', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 6, '1729700590.webp', 'client', '1', NULL, NULL, '2024-10-23 10:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_desc` text DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `validity` varchar(255) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_desc`, `discount`, `validity`, `client_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'PIZZA FEST', 'dfafadfasdfa afdafadsfsafa afasdfasfsaf', 10, '2024-12-30', '1', 1, '2024-10-22 08:55:36', '2024-10-22 08:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `client_id`, `image`, `created_at`, `updated_at`) VALUES
(1, '1', 'upload/gallery/1811692815958684.webp', NULL, '2024-10-01 00:41:48'),
(2, '1', 'upload/gallery/1811690136967251.webp', NULL, NULL),
(4, '1', 'upload/gallery/1811692852109706.webp', NULL, NULL),
(5, '1', 'upload/gallery/1811692852275868.webp', NULL, NULL),
(6, '1', 'upload/gallery/1811692852427159.webp', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `image`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 'Vegan Pizza', 'upload/menu/1811148584884077.png', 1, '2024-09-25 00:31:31', '2024-09-25 00:31:31'),
(2, 'Garlic Bread', 'upload/menu/1811148635077062.png', 1, '2024-09-25 00:32:16', '2024-09-25 00:32:16'),
(3, 'Dips', 'upload/menu/1811148653322999.png', 1, '2024-09-25 00:32:33', '2024-09-25 00:32:33'),
(4, 'Jumbo Slice', 'upload/menu/1811148674562529.png', 1, '2024-09-25 00:32:54', '2024-09-25 00:32:54'),
(5, 'Lasagne', 'upload/menu/1811148690780257.png', 1, '2024-09-25 00:33:09', '2024-09-25 00:33:09'),
(6, 'Quesadilla', 'upload/menu/1811148707281648.png', 1, '2024-09-25 00:33:25', '2024-09-25 00:33:25'),
(7, 'Pastas', 'upload/menu/1811148725486406.png', 1, '2024-09-25 00:33:42', '2024-09-25 00:33:42'),
(8, 'Desserts', 'upload/menu/1811148743390148.png', 1, '2024-09-25 00:33:59', '2024-09-28 07:23:09'),
(9, 'Combos', 'upload/menu/1813722729673160.webp', 2, '2024-10-23 10:26:27', '2024-10-23 10:26:27'),
(10, 'Burgers', 'upload/menu/1813722779564529.webp', 2, '2024-10-23 10:27:12', '2024-10-23 10:27:12'),
(11, 'Chicken', 'upload/menu/1813722805625439.webp', 2, '2024-10-23 10:27:36', '2024-10-23 10:27:36'),
(12, 'Hot Dogs', 'upload/menu/1813722828838655.webp', 2, '2024-10-23 10:27:59', '2024-10-23 10:27:59'),
(13, 'Sandwiches', 'upload/menu/1813722863401219.webp', 2, '2024-10-23 10:28:32', '2024-10-23 10:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_26_094800_create_admins_table', 2),
(5, '2024_09_09_202815_create_clients_table', 3),
(6, '2024_09_22_060058_create_categories_table', 4),
(7, '2024_09_25_044808_create_cities_table', 5),
(8, '2024_09_25_055810_create_menus_table', 6),
(9, '2024_09_28_133710_create_products_table', 7),
(10, '2024_10_01_051747_create_galleries_table', 8),
(11, '2024_10_22_134602_create_coupons_table', 9),
(12, '2024_11_14_154641_create_banners_table', 10),
(13, '2024_11_27_154624_create_wishlists_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `most_popular` varchar(255) DEFAULT NULL,
  `best_seller` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `city_id`, `menu_id`, `code`, `qty`, `size`, `price`, `discount_price`, `image`, `client_id`, `most_popular`, `best_seller`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jackfruit And Herbs Roasted Potatoes', 'jackfruit-and-herbs-roasted-potatoes', 5, 6, 1, 'PC000001', '50', '30', '100', '20', 'upload/product/1811510173396360.webp', '1', NULL, '1', '1', '2024-09-29 00:18:49', '2024-09-30 00:28:38'),
(2, 'Grilled Mushroom And Olive', 'grilled-mushroom-and-olive', 5, 9, 2, 'PC000002', '100', '50', '120', '30', 'upload/product/1811515069895946.webp', '1', '1', '1', '1', '2024-09-29 00:33:37', '2024-09-29 01:36:36'),
(3, 'Twisty Bread With Vegan Cheese', 'twisty-bread-with-vegan-cheese', 6, 12, 4, 'PC000003', '50', '20', '100', NULL, 'upload/product/1811511386412040.webp', '1', '1', NULL, '1', '2024-09-29 00:38:03', '2024-09-29 00:38:03'),
(4, 'Twisty Bread With Tomatoes', 'twisty-bread-with-tomatoes', 6, 10, 2, 'PC000004', '100', NULL, '130', '10', 'upload/product/1811511742609260.webp', '1', '1', '1', '1', '2024-09-29 00:43:42', '2024-09-29 00:43:42'),
(5, 'Stuffed Pizza Bread', 'stuffed-pizza-bread', 5, 7, 4, 'PC000005', '100', '30', '80', NULL, 'upload/product/1811511819229513.webp', '1', NULL, '1', '1', '2024-09-29 00:44:56', '2024-09-29 00:44:56'),
(6, 'Garlic Herbs', 'garlic-herbs', 7, 8, 3, 'PC000006', '50', NULL, '300', '80', 'upload/product/1811511965983074.webp', '1', '1', '1', '1', '2024-09-29 00:47:16', '2024-09-30 00:11:20'),
(7, 'Fettuccine Pasta', 'fettuccine-pasta', 6, 3, 7, 'PC000007', '100', NULL, '100', '40', 'upload/product/1811600584660207.webp', '1', '1', NULL, '1', '2024-09-30 00:15:50', '2024-09-30 00:15:50'),
(8, 'Linguine Pasta', 'linguine-pasta', 6, 11, 7, 'PC000008', '100', NULL, '300', '120', 'upload/product/1811600632605323.webp', '1', NULL, '1', '1', '2024-09-30 00:16:35', '2024-09-30 00:16:35'),
(9, 'Fusilli Pasta', 'fusilli-pasta', 9, 10, 7, 'PC000009', '50', NULL, '130', NULL, 'upload/product/1811600683539773.webp', '1', '1', '1', '1', '2024-09-30 00:17:23', '2024-09-30 00:17:23'),
(10, 'Minute Maid Refresh Orange', 'minute-maid-refresh-orange', 9, 12, 8, 'PC000010', '100', NULL, '80', NULL, 'upload/product/1811600793928713.webp', '1', NULL, NULL, '1', '2024-09-30 00:19:08', '2024-09-30 00:19:08'),
(11, 'Hot Milo', 'hot-milo', 9, 9, 8, 'PC000011', '50', NULL, '80', NULL, 'upload/product/1811600838706044.webp', '1', NULL, '1', '1', '2024-09-30 00:19:51', '2024-09-30 00:19:51'),
(12, 'Heaven & Earth Ice Lemon Tea', 'heaven-&-earth-ice-lemon-tea', 11, 4, 3, 'PC000012', '100', NULL, '100', NULL, 'upload/product/1811600884784799.webp', '1', '1', '1', '1', '2024-09-30 00:20:35', '2024-09-30 00:20:35'),
(13, 'Bihari Kabab', 'bihari-kabab', 10, 7, 6, 'PC000013', '50', NULL, '130', NULL, 'upload/product/1811600931686102.webp', '2', '1', NULL, '1', '2024-09-30 00:21:20', '2024-11-02 04:07:06'),
(14, 'Boti Kebab', 'boti-kebab', 8, 2, 6, 'PC000014', '150', NULL, '300', '100', 'upload/product/1811600981786267.webp', '1', NULL, NULL, '1', '2024-09-30 00:22:08', '2024-09-30 00:22:08'),
(15, 'Grilled Eggplant Kebab', 'grilled-eggplant-kebab', 8, 8, 5, 'PC000015', '100', NULL, '130', '10', 'upload/product/1811601023524828.webp', '1', NULL, NULL, '1', '2024-09-30 00:22:47', '2024-09-30 00:22:47'),
(16, 'Grilled Kebab', 'grilled-kebab', 8, 3, 2, 'PC000016', '100', NULL, '130', NULL, 'upload/product/1811601083515351.webp', '1', NULL, '1', '1', '2024-09-30 00:23:45', '2024-09-30 00:23:45'),
(17, 'Shish Kebab', 'shish-kebab', 9, 2, 6, 'PC000017', '150', NULL, '100', NULL, 'upload/product/1811601127003569.webp', '1', '1', '1', '1', '2024-09-30 00:24:26', '2024-09-30 00:24:26'),
(18, 'Zingger Clasic', 'zingger-clasic', 6, 7, 7, 'PC000018', '150', NULL, '120', NULL, 'upload/product/1811601171062787.webp', '1', NULL, NULL, '1', '2024-09-30 00:25:08', '2024-09-30 00:25:08'),
(19, 'Colonel Classic', 'colonel-classic', 6, 1, 8, 'PC000019', '40', NULL, '300', '80', 'upload/product/1811601214938873.webp', '1', '1', '1', '1', '2024-09-30 00:25:50', '2024-09-30 00:25:50'),
(20, 'Cheezy Twister Combo', 'cheezy-twister-combo', 8, 9, 4, 'PC000020', '50', NULL, '130', '5', 'upload/product/1811601330410116.webp', '1', '1', NULL, '1', '2024-09-30 00:27:40', '2024-09-30 00:27:40'),
(21, 'Cheezy Twister', 'cheezy-twister', 8, 12, 5, 'PC000021', '150', NULL, '130', NULL, 'upload/product/1811601372530604.webp', '1', NULL, '1', '1', '2024-09-30 00:28:20', '2024-09-30 00:28:20'),
(22, 'Kheema Paratha Quesadilla', 'kheema-paratha-quesadilla', 5, 4, 13, 'PC000022', '100', '20', '100', '15', 'upload/product/1814073675119318.webp', '2', NULL, '1', '1', '2024-10-27 07:24:35', '2024-10-27 07:55:57'),
(23, 'Mughlai Masti Mac N Cheese Pasta', 'mughlai-masti-mac-n-cheese-pasta', 8, 6, 11, 'PC000023', '100', NULL, '130', '20', 'upload/product/1814075638977387.webp', '2', NULL, '1', '0', '2024-10-27 07:55:45', '2024-10-31 22:36:06'),
(24, 'Moon Vanila Baby Cake', 'moon-vanila-baby-cake', 7, 10, 8, 'PC000024', '150', NULL, '300', '0', 'upload/product/1814496805746075.webp', '2', '1', NULL, '1', '2024-10-31 23:30:03', '2024-10-31 23:30:03'),
(25, 'Golden Chocolate Vanila Mix', 'golden-chocolate-vanila-mix', 7, 6, 8, 'PC000025', '200', NULL, '500', '10', 'upload/product/1814496927117439.webp', '2', '1', '1', '1', '2024-10-31 23:31:56', '2024-11-02 04:06:35'),
(26, 'Chocolate Anniversary', 'chocolate-anniversary', 7, 7, 8, 'PC000026', '400', NULL, '400', '5', 'upload/product/1814497022977565.webp', '2', NULL, '1', '1', '2024-10-31 23:33:28', '2024-11-02 04:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('YXk9ySzYAnq66NdhuOeLiaJyb3nrfrqh82cmB0OE', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicGVhdXpHTmVDTjMzbmFsSmZ1UFlWSkxyeWt5REUwcXcwWmJXUHYxVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGVja291dCI7fXM6NDoiY2FydCI7YToyOntpOjE3O2E6Njp7czoyOiJpZCI7czoyOiIxNyI7czo0OiJuYW1lIjtzOjExOiJTaGlzaCBLZWJhYiI7czo1OiJpbWFnZSI7czozNjoidXBsb2FkL3Byb2R1Y3QvMTgxMTYwMTEyNzAwMzU2OS53ZWJwIjtzOjU6InByaWNlIjtzOjM6IjEwMCI7czo5OiJjbGllbnRfaWQiO3M6MToiMSI7czo4OiJxdWFudGl0eSI7aToxO31pOjEyO2E6Njp7czoyOiJpZCI7czoyOiIxMiI7czo0OiJuYW1lIjtzOjI4OiJIZWF2ZW4gJiBFYXJ0aCBJY2UgTGVtb24gVGVhIjtzOjU6ImltYWdlIjtzOjM2OiJ1cGxvYWQvcHJvZHVjdC8xODExNjAwODg0Nzg0Nzk5LndlYnAiO3M6NToicHJpY2UiO3M6MzoiMTAwIjtzOjk6ImNsaWVudF9pZCI7czoxOiIxIjtzOjg6InF1YW50aXR5IjtpOjE7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1735313877);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `info` text DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `info`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', '2024-09-15 01:41:58', '$2y$12$TyOsnFX1jjy/K2O4fj7Gruqk7LXglLZd/vfVr03TEuyGY12KKdYy.', '1726639187.jpg', '01312569876', 'House: 11/C, Road: 12, Sector: 6, Uttara, Dhaka', NULL, 'user', '1', NULL, '2024-08-24 06:22:47', '2024-09-17 23:59:47'),
(2, 'Ishal', 'ishal@gmail.com', '2024-08-25 11:11:45', '$2y$12$ak7pUbFrDK3KcsQy9dxLQugJDab1IiQDJ8Q12lBIolO7ejIdijEDS', NULL, NULL, NULL, NULL, 'user', '1', '8AGo0TL0AknrA6mdCeJcJLJxVTPUT4H2qPTbBiUkMOMNTwR7ULrm6fEsUZXP', '2024-08-25 11:02:07', '2024-08-26 03:47:05'),
(3, 'Test User', 'test@example.com', '2024-08-26 04:00:18', '$2y$12$Np0TpcQJ0m3r/sU3mABAqO.bJ6jto0ZMDfnpLCasUVZzZOmR2YXbi', NULL, NULL, NULL, NULL, 'user', '1', 'aGc3kYt1BA', '2024-08-26 04:00:19', '2024-08-26 04:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `client_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
