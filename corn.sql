-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2022 at 02:57 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corn`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_05_040356_create_options_table', 1),
(6, '2022_05_30_054857_create_services_table', 2),
(9, '2022_05_30_055624_create_products_table', 3),
(10, '2022_05_30_060727_create_product_images_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'service_banner', 'UPzyYXUxrtpceXHjHX7bHp7id4Aml68Czs8wDiDd.jpg', '2022-05-30 01:41:48', '2022-05-30 20:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `service_id`, `src`, `title_az`, `title_en`, `title_ru`, `text_az`, `text_en`, `text_ru`, `created_at`, `updated_at`) VALUES
(2, 5, 'ma66l7GaJZSnmgud5f100wuU9c4sqKYi733ueUHH.jpg', 'Qui dolor voluptatem', 'Fugit totam dolore', 'Non aliquip perferen', 'Anim dolor quas aut', 'Corrupti voluptas q', 'Quis nulla obcaecati', '2022-05-30 04:47:14', '2022-05-30 21:58:19'),
(3, 5, 'KWb89Roo4vnyoaa0wtbvVADM928lrsQO1bf4te77.jpg', 'Quisquam aut necessi', 'Reprehenderit eos e', 'Excepteur voluptas i', 'Quia nihil soluta ma', 'Eiusmod et placeat', 'At iusto voluptatibu', '2022-05-30 04:48:19', '2022-05-30 21:58:11'),
(4, 5, '8tGPIvbNrNc1P5u0gIvZQW9PVmLIqRIMqKWaUg0G.jpg', 'Ut amet iste rem so', 'Cillum odio commodo', 'Impedit illum eum', 'Voluptate maiores ne', 'Ex consequatur sapie', 'Non ad veniam ex qu', '2022-05-30 21:59:00', '2022-05-30 21:59:00'),
(5, 5, 'WrA3Z5jgb3z0a9OmaAG3G4wdDOiUP2ZDS0Zpuyha.jpg', 'Occaecat velit ea im', 'Eos aut fugit cupi', 'Aliquip in et est re', 'Accusantium sunt ips', 'Blanditiis molestias', 'Do optio animi vit', '2022-05-30 21:59:54', '2022-05-30 21:59:54'),
(6, 6, 'xHD0z0xE0WY6KoPYLNVJlfykbPW5gojcyMRlRQaA.png', 'Nisi esse quidem au', 'Corrupti ab praesen', 'Reiciendis dolor eni', 'Omnis aut ipsum eu a', 'Ullamco ut dignissim', 'Qui eu reprehenderit', '2022-05-30 22:00:39', '2022-05-30 22:00:39'),
(7, 6, 'dugbwrutLUdPHuP4yS6g6SRY9GOohjFX1M9DC9Um.png', 'Nam quis aliquid et', 'Exercitationem sed s', 'Culpa ullam nemo so', 'Amet rem libero vol', 'Nobis non quaerat qu', 'Repudiandae cillum l', '2022-05-30 22:06:59', '2022-05-30 22:06:59'),
(8, 6, 'jvvINGIV7EXakhgc1ZDHBApFHF39lr2vyDGqgPfO.png', 'Exercitationem accus', 'Dolore optio molest', 'Aliquid et aut incid', 'Iure ipsa perferend', 'Ipsa ut exercitatio', 'Autem quaerat enim a', '2022-05-30 22:07:29', '2022-05-30 22:07:29'),
(9, 5, 'n0XWH0qNpO6O79dmwLDFAeUClX72MFY2z7qeTVKh.jpg', 'Incidunt ipsum vit', 'Commodo itaque totam', 'Qui cupidatat commod', 'Et temporibus irure', 'Cupiditate voluptas', 'Culpa molestiae fac', '2022-05-30 22:08:16', '2022-05-30 22:30:54'),
(10, 4, 'sWdVURZO7WcKRAIb2ZyXgPT6YifwOneuwqELxBpt.jpg', 'Eaque ducimus eaque', 'Dolor tempora velit', 'Sed quibusdam expedi', 'Qui et enim doloremq', 'Consequatur impedit', 'Et quas aut voluptat', '2022-05-30 22:09:03', '2022-05-30 22:09:03'),
(11, 5, 'oghvyQms0p8ra1KqRcO81eDq1KX1E1gscMRECguj.jpg', 'Molestias voluptatem', 'Quo et porro ratione', 'Ducimus voluptatibu', 'Non ea sit delectus', 'Aut laborum Tempora', 'Architecto magna aut', '2022-05-30 22:09:11', '2022-05-30 22:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `src`, `created_at`, `updated_at`) VALUES
(8, 2, 'TaC4suhEG9njxDF8rvJVBXHnCLDUp0LIUVd1cGmp.jpg', '2022-05-30 04:47:14', '2022-05-30 04:47:14'),
(9, 2, 'WFufQJ4hQC5F5z4SqqVVhwgPBDMYHHeixnpLbmcK.jpg', '2022-05-30 04:47:14', '2022-05-30 04:47:14'),
(10, 2, '7YW6tI2bfUP2bpJ4HYj6hxBPudLqb4YVXNUPwqEz.jpg', '2022-05-30 04:47:14', '2022-05-30 04:47:14'),
(11, 2, 'ilZZmZjOvjACsR8JNO3pRt52YPRIY7S88VJ0Ko2m.jpg', '2022-05-30 04:47:14', '2022-05-30 04:47:14'),
(12, 2, 'MZwR2WGfdLqTHndE2yee8tsBHHJXKcoAE3tsptab.jpg', '2022-05-30 04:47:14', '2022-05-30 04:47:14'),
(13, 2, 'hEJNXrUCeNxCMRwkFkf0EgaBKRPcCR1Cg71LklrZ.jpg', '2022-05-30 04:47:14', '2022-05-30 04:47:14'),
(14, 2, 'MFotPuoVqds6xmupuOdKMAhT4d3srD2goxVHtLLV.jpg', '2022-05-30 04:47:14', '2022-05-30 04:47:14'),
(15, 2, 'rtPvgd4q9CK8Ii8VKMBlNzSt0gtzqaIHHPkKY66Y.jpg', '2022-05-30 04:47:14', '2022-05-30 04:47:14'),
(16, 2, 'LR0uHvJN4kKpEjBBMhHeKjNNCqt4FqJHZtZA61or.jpg', '2022-05-30 04:47:14', '2022-05-30 04:47:14'),
(17, 2, '8CWGliLnuXSSsLblRixkkPBjDTk6Gz8bfTKeBwsx.jpg', '2022-05-30 04:47:14', '2022-05-30 04:47:14'),
(18, 2, 'g7Y1cunVMWlsswvbeojgfZC78g42CXqgXiouBj5b.jpg', '2022-05-30 04:47:14', '2022-05-30 04:47:14'),
(19, 2, 'M0LinH2D1AI1LasW3BtOanYRuzp8peCdp1YJqugE.jpg', '2022-05-30 04:47:14', '2022-05-30 04:47:14'),
(20, 2, 'wbe483dVX3b5Cc1XTN3NnpoXu1N4TzEIrrivp2dr.jpg', '2022-05-30 04:47:14', '2022-05-30 04:47:14'),
(21, 4, 'uGQlMQksg4C8pHD18v1wGHfOuGVWGmYitRfl31uY.jpg', '2022-05-30 21:59:00', '2022-05-30 21:59:00'),
(22, 4, 'Go1BFxMKmj2qKO49mBolAa9RLhCoqSPPfK47DaWW.jpg', '2022-05-30 21:59:00', '2022-05-30 21:59:00'),
(23, 4, 'wKfxcGF4uuSCyTM7TVBHIZ71LQDAvf2JXOVIOm1K.jpg', '2022-05-30 21:59:00', '2022-05-30 21:59:00'),
(24, 5, '3wSQ13VOmMzE52FNYlYpfLAbO3sep6MwogfkcfuU.jpg', '2022-05-30 21:59:54', '2022-05-30 21:59:54'),
(25, 5, 'vu45F0c7CzQnmnbQjQygQJCcd7miUaAXqqxUylNI.jpg', '2022-05-30 21:59:54', '2022-05-30 21:59:54'),
(26, 5, 'B1g7XQEZ2uJ8BwPRW6KQhGjF7rK9KW0vyukdzZTJ.jpg', '2022-05-30 21:59:54', '2022-05-30 21:59:54'),
(27, 6, 'LEzGRgo8sEQNL29BUddsmDFcDh1W18oSKC8SebYg.png', '2022-05-30 22:00:39', '2022-05-30 22:00:39'),
(28, 6, 'VrBZxuIBYA6ppnGI5oNMi4RhoypTKcL7BFNavUcH.png', '2022-05-30 22:00:39', '2022-05-30 22:00:39'),
(29, 6, '164xblSDo5f4DLqDjtINp004LKztQteCwulqodMD.png', '2022-05-30 22:00:39', '2022-05-30 22:00:39'),
(30, 7, 'NecLaxYsAGajQKmaMxDFZacXG1hK6rbOkrA3GM1Z.png', '2022-05-30 22:06:59', '2022-05-30 22:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_home` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - not, 1 - on home',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name_az`, `name_en`, `name_ru`, `slug_az`, `slug_en`, `slug_ru`, `on_home`, `created_at`, `updated_at`) VALUES
(3, 'Veb', 'Web', 'Интернет', 'veb', 'web', 'internet', 0, '2022-05-30 02:30:23', '2022-05-30 22:11:02'),
(4, 'Poster', 'Poster', 'Плакат', 'poster', 'poster', 'plakat', 1, '2022-05-30 02:30:46', '2022-05-30 22:07:45'),
(5, 'Qablaşma', 'Packaging', 'Упаковка', 'qablasma', 'packaging', 'upakovka', 1, '2022-05-30 02:31:09', '2022-05-30 21:37:53'),
(6, 'Brending', 'Branding', 'Брендинг', 'brending', 'branding', 'brending', 1, '2022-05-30 02:31:29', '2022-05-30 22:10:55'),
(7, 'Promo', 'Promo', 'Промо', 'promo', 'promo', 'promo', 0, '2022-05-30 22:10:23', '2022-05-30 22:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '000f-1653886178.jpg', 'admin@gmail.com', NULL, '$2y$10$ZX2gzVBcN/F1e7W1WziVbua39boew2XuaQNcmJDx8gXCtynYIpJ4C', 'uNJHTEprxjmvcuanvV66ttFtJ8qn2kW3rqy3sLijjGCrJ1yCcHRDIUIhCLak', '2022-05-30 00:48:55', '2022-05-30 00:50:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_service_id_foreign` (`service_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
