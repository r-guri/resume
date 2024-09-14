-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 03:51 AM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `aboutUsTitle` varchar(50) NOT NULL,
  `aboutSubTitle` varchar(50) NOT NULL,
  `aboutDisc` varchar(50) NOT NULL,
  `aboutImage` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `aboutUsTitle`, `aboutSubTitle`, `aboutDisc`, `aboutImage`, `updated_at`) VALUES
(1, 'about12', 'aboutSub2', 'about Disc', 'choose title', '2024-07-23 09:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `chooses`
--

CREATE TABLE `chooses` (
  `id` int(11) NOT NULL,
  `chooseUsTitle` varchar(50) NOT NULL,
  `chooseUsSubTitle` varchar(50) NOT NULL,
  `chooseUsHead` varchar(50) NOT NULL,
  `chooseUsDisc` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chooses`
--

INSERT INTO `chooses` (`id`, `chooseUsTitle`, `chooseUsSubTitle`, `chooseUsHead`, `chooseUsDisc`, `updated_at`) VALUES
(1, 'choose Sub', 'choose Head', 'Choose Disc', 'service Title', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commoncontents`
--

CREATE TABLE `commoncontents` (
  `id` int(11) NOT NULL,
  `happClientsTitle` varchar(50) NOT NULL,
  `projectDoneTitle` varchar(50) NOT NULL,
  `winAwardsTitle` varchar(50) NOT NULL,
  `happyClientsValue` int(11) NOT NULL,
  `projectDoneValue` bigint(20) NOT NULL,
  `winAwardValue` bigint(20) NOT NULL,
  `aboutUsTitle` varchar(50) NOT NULL,
  `aboutSubTitle` varchar(50) NOT NULL,
  `aboutDisc` varchar(50) NOT NULL,
  `aboutImage` varchar(50) NOT NULL,
  `chooseUsTitle` varchar(50) NOT NULL,
  `chooseUsSubTitle` varchar(50) NOT NULL,
  `chooseUsHead` varchar(50) NOT NULL,
  `chooseUsDisc` varchar(50) NOT NULL,
  `OurServicesTitle` varchar(50) NOT NULL,
  `OurServicesSub` varchar(50) NOT NULL,
  `ourServicesHead` varchar(50) NOT NULL,
  `ourServicesDisc` varchar(50) NOT NULL,
  `pricingPlanTitle` varchar(50) NOT NULL,
  `pricingPlanSub` varchar(50) NOT NULL,
  `pricingPlanHead` varchar(50) NOT NULL,
  `pricingPlanSubHead` varchar(50) NOT NULL,
  `pricingAmmount` varchar(50) NOT NULL,
  `quoteTitle` varchar(50) NOT NULL,
  `qouteSub` varchar(50) NOT NULL,
  `qouteDisc` varchar(100) NOT NULL,
  `teamTitle` varchar(50) NOT NULL,
  `teamSub` varchar(50) NOT NULL,
  `teamName` varchar(50) NOT NULL,
  `teamDesignation` varchar(50) NOT NULL,
  `teamFb` varchar(50) NOT NULL,
  `teanInta` varchar(50) NOT NULL,
  `teamTwitter` varchar(50) NOT NULL,
  `teamLinkedIn` varchar(50) NOT NULL,
  `teamImage` varchar(50) NOT NULL,
  `blogTitle` varchar(50) NOT NULL,
  `blogSub` varchar(50) NOT NULL,
  `blogLabel` varchar(50) NOT NULL,
  `blogBy` varchar(50) NOT NULL,
  `blogDate` varchar(50) NOT NULL,
  `blogHead` varchar(50) NOT NULL,
  `blogDisc` varchar(50) NOT NULL,
  `blogImage` varchar(50) NOT NULL,
  `footerDiscription` varchar(300) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `commoncontents`
--

INSERT INTO `commoncontents` (`id`, `happClientsTitle`, `projectDoneTitle`, `winAwardsTitle`, `happyClientsValue`, `projectDoneValue`, `winAwardValue`, `aboutUsTitle`, `aboutSubTitle`, `aboutDisc`, `aboutImage`, `chooseUsTitle`, `chooseUsSubTitle`, `chooseUsHead`, `chooseUsDisc`, `OurServicesTitle`, `OurServicesSub`, `ourServicesHead`, `ourServicesDisc`, `pricingPlanTitle`, `pricingPlanSub`, `pricingPlanHead`, `pricingPlanSubHead`, `pricingAmmount`, `quoteTitle`, `qouteSub`, `qouteDisc`, `teamTitle`, `teamSub`, `teamName`, `teamDesignation`, `teamFb`, `teanInta`, `teamTwitter`, `teamLinkedIn`, `teamImage`, `blogTitle`, `blogSub`, `blogLabel`, `blogBy`, `blogDate`, `blogHead`, `blogDisc`, `blogImage`, `footerDiscription`, `updated_at`) VALUES
(1, 'happy client', 'done project', 'win awarded', 20, 10, 5, 'about', 'aboutSub', 'about Disc', 'choose title', 'choose Sub', 'choose Head', 'Choose Disc', 'service Title', 'Services Sub', 'Services Head', 'Services Disc', 'Pricing Title', 'Pricing Sub', 'PRicing HEad', 'pricing sub HEad', 'pricing Ammount', 'quote Title', 'qoute Sub', 'team Title', '', 'team Sub', 'team Name', 'team Designation', 'team Fb', 'team insta', 'team twitter', 'team linkedin', 'team image', 'blog title', 'blog sub', 'blog by', 'blog date', 'blog head', 'blog disc', '', '', '', '', NULL);

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
-- Table structure for table `maincounts`
--

CREATE TABLE `maincounts` (
  `id` int(11) NOT NULL,
  `happClientsTitle` varchar(50) NOT NULL,
  `projectDoneTitle` varchar(50) NOT NULL,
  `winAwardsTitle` varchar(50) NOT NULL,
  `happyClientsValue` int(11) NOT NULL,
  `projectDoneValue` bigint(20) NOT NULL,
  `winAwardValue` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `maincounts`
--

INSERT INTO `maincounts` (`id`, `happClientsTitle`, `projectDoneTitle`, `winAwardsTitle`, `happyClientsValue`, `projectDoneValue`, `winAwardValue`, `updated_at`) VALUES
(1, 'happy clientaxxxxxxxxxxxx', 'done project', 'win awarded', 20, 100, 522222222, '2024-07-23 09:11:23');

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
(4, '2024_07_07_082342_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `navbars`
--

CREATE TABLE `navbars` (
  `id` int(11) NOT NULL,
  `mainMenu` varchar(50) NOT NULL,
  `mainLink` varchar(50) NOT NULL,
  `subMenu` varchar(50) NOT NULL,
  `subLink` varchar(50) NOT NULL,
  `thirdMenu` varchar(50) NOT NULL,
  `thirdLink` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `navbars`
--

INSERT INTO `navbars` (`id`, `mainMenu`, `mainLink`, `subMenu`, `subLink`, `thirdMenu`, `thirdLink`) VALUES
(1, 'main', 'one', 'sub', 'sublink', '', ''),
(2, 'main1', 'two', 'sub1', 'sub', '', '');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `discription` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `discription`, `name`, `designation`, `message`, `status`) VALUES
(1, 'TESTIMONIAL', 'What Our Clients Say About Our Digital Services', 'Gurpreet Singh', 'Web Developer', 'SCSCVS   EF EFWEFWEF EFWEF', 1),
(2, 'dd', 'dsdv', 'Guri', 'Software Developer', 'fdsfvds', 1),
(3, 'ABC', 'cdsv', 'ABC', 'dgvdsg', 'gdg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topheaders`
--

CREATE TABLE `topheaders` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `youtube` varchar(50) NOT NULL,
  `linkedin` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `topheaders`
--

INSERT INTO `topheaders` (`id`, `email`, `mobile`, `facebook`, `instagram`, `twitter`, `youtube`, `linkedin`, `address`, `updated_at`) VALUES
(1, 'guri@gmail.com', '805361656391', 'facebook.com', 'insta.com', 'twittter.com', 'youtube.com', 'linkedin.com', 'Vpo Jalalana Sirsa Haryana111', '2024-07-17 08:07:19');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'guri', 'guri@gmail.com', NULL, '$2a$12$fBdD6GgX8a/Gr5FZAx2TC.xlgrJV83B.CGhuiqx5AbmDy.HhEt7PS', NULL, '2024-07-07 06:38:46', '2024-07-07 06:38:46'),
(3, 'guri', 'guri1@gmail.com', NULL, '$2y$12$YYnULJVF3PfXohSqKGAUDutgpmXCM54gdzRq5oJBu6bYxCqqKJox2', NULL, '2024-07-07 06:40:37', '2024-07-07 06:40:37'),
(4, 'guri', 'guri2@gmail.com', NULL, '$2y$12$STQuT7RWlgHSzW61k9vBquVtVPucdkZs4cca8dAE07c3PdmCeWkwe', NULL, '2024-07-07 06:45:29', '2024-07-07 06:45:29'),
(6, 'guri', 'guri12@gmail.com', NULL, '$2y$12$SWQEFYUOlHb7dI1i7hLKA.5eEFSivSa.5j4gbVpZWmJOn7DbH/m5O', NULL, '2024-07-07 06:46:57', '2024-07-07 06:46:57'),
(8, 'guri', 'guri122@gmail.com', NULL, '$2y$12$AMiyiZXCzfo.RqrlLglrpeZLmVQcuB57fqa4iYoFcgNczuOKeqUIK', NULL, '2024-07-07 06:56:54', '2024-07-07 06:56:54'),
(9, 'gg', 'a@gmail.com', NULL, '123', NULL, '2024-07-07 08:31:10', '2024-07-07 08:31:10'),
(10, 'd', 'abc@gmail.com', NULL, '$2y$12$blG9U5QkwG2anDiMFrlJsusfXYXxQ8GbS5PBdZs4dwXemtzesGCam', NULL, '2024-07-07 09:43:15', '2024-07-07 09:43:15'),
(12, 'd', 'abc11@gmail.com', NULL, '$2y$12$mbOpV7vhfAlpKtAJauLnt.M9Cg3V9pcAVLQkHNfFFyyZ7EdBnrVG6', NULL, '2024-07-07 09:45:52', '2024-07-07 09:45:52'),
(14, 'd', 'abc113@gmail.com', NULL, '$2y$12$HL9wSB0Z/7z.aMNEOzvJDOeTeVxGuCKJZlPpc/33L5gkEzVnoB3hu', NULL, '2024-07-07 09:46:19', '2024-07-07 09:46:19'),
(15, 'd', 'abc1131@gmail.com', NULL, '$2y$12$zlWvHdlQX2iqWK0qcGzw2OJiAM5kyGPH8hCTS3hsdnOnIQZRXfu9G', NULL, '2024-07-07 09:46:45', '2024-07-07 09:46:45'),
(16, 'a', 'guri99@gmail.com', NULL, '123', NULL, '2024-07-08 10:21:59', '2024-07-08 10:21:59'),
(18, 'xyz', 'yzx@gmail.com', NULL, '123', NULL, '2024-07-09 09:56:23', '2024-07-09 09:56:23'),
(19, 'abc', 'abcd@gmail.com', NULL, '$2y$12$BrCTHMKrjzELN9YqnJvzcON9sG1oj1iOf7Lw6vCTTlcsKH12Rc1Q.', NULL, '2024-07-09 10:53:19', '2024-07-09 10:53:19'),
(21, 'Admin', 'Admin@gmail.com', NULL, '$2y$12$eBM9AU8xkB7xJgF7pT/6P.NIqkWNnVwK.jAPaIATKkyHfcNFx4SyK', NULL, '2024-07-16 08:04:29', '2024-07-16 08:04:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
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
-- Indexes for table `chooses`
--
ALTER TABLE `chooses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commoncontents`
--
ALTER TABLE `commoncontents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `maincounts`
--
ALTER TABLE `maincounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbars`
--
ALTER TABLE `navbars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topheaders`
--
ALTER TABLE `topheaders`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chooses`
--
ALTER TABLE `chooses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commoncontents`
--
ALTER TABLE `commoncontents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maincounts`
--
ALTER TABLE `maincounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `navbars`
--
ALTER TABLE `navbars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topheaders`
--
ALTER TABLE `topheaders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
