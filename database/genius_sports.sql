-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 09:45 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genius_sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `tournament_round_id` int(10) UNSIGNED NOT NULL,
  `team1_id` int(10) UNSIGNED NOT NULL,
  `team2_id` int(10) UNSIGNED NOT NULL,
  `team1_result` int(10) UNSIGNED DEFAULT NULL,
  `team2_result` int(10) UNSIGNED DEFAULT NULL,
  `status_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `tournament_round_id`, `team1_id`, `team2_id`, `team1_result`, `team2_result`, `status_id`) VALUES
(1, 1, 64, 34, 1, 2, 1),
(2, 1, 38, 42, 1, 3, 1),
(3, 1, 62, 2, 4, 5, 1),
(4, 1, 60, 11, 6, 7, 1),
(5, 1, 7, 47, 5, 1, 1),
(6, 1, 15, 18, 2, 3, 1),
(7, 1, 26, 57, 1, 2, 1),
(8, 1, 50, 46, 1, 0, 1),
(9, 1, 8, 1, 2, 0, 1),
(10, 1, 9, 6, 3, 1, 1),
(11, 1, 5, 61, 4, 1, 1),
(12, 1, 49, 45, 5, 2, 1),
(13, 1, 43, 30, 6, 1, 1),
(14, 1, 54, 53, 7, 8, 1),
(15, 1, 20, 23, 9, 1, 1),
(16, 1, 37, 28, 5, 2, 1),
(17, 1, 33, 12, 3, 1, 1),
(18, 1, 32, 24, 2, 1, 1),
(19, 1, 16, 36, 1, 2, 1),
(20, 1, 27, 25, 3, 1, 1),
(21, 1, 59, 63, 5, 1, 1),
(22, 1, 48, 17, 6, 1, 1),
(23, 1, 51, 4, 7, 1, 1),
(24, 1, 19, 41, 2, 1, 1),
(25, 1, 56, 31, 1, 0, 1),
(26, 1, 44, 22, 2, 0, 1),
(27, 1, 14, 35, 1, 3, 1),
(28, 1, 10, 55, 3, 1, 1),
(29, 1, 39, 3, 1, 2, 1),
(30, 1, 29, 13, 1, 3, 1),
(31, 1, 52, 40, 1, 4, 1),
(32, 1, 58, 21, 1, 0, 1),
(33, 2, 34, 42, 1, 2, 1),
(34, 2, 2, 11, 1, 3, 1),
(35, 2, 7, 18, 1, 4, 1),
(36, 2, 57, 50, 1, 5, 1),
(37, 2, 8, 9, 1, 7, 1),
(38, 2, 5, 49, 1, 6, 1),
(39, 2, 43, 53, 1, 2, 1),
(40, 2, 20, 37, 1, 3, 1),
(41, 2, 33, 32, 1, 7, 1),
(42, 2, 36, 27, 1, 3, 1),
(43, 2, 59, 48, 12, 1, 1),
(44, 2, 51, 19, 1, 2, 1),
(45, 2, 56, 44, 1, 2, 1),
(46, 2, 35, 10, 12, 1, 1),
(47, 2, 3, 13, 2, 1, 1),
(48, 2, 40, 58, 1, 2, 1),
(49, 3, 42, 11, 0, 1, 1),
(50, 3, 18, 50, 0, 2, 1),
(51, 3, 9, 49, 0, 1, 1),
(52, 3, 53, 37, 1, 3, 1),
(53, 3, 32, 27, 1, 3, 1),
(54, 3, 59, 19, 1, 3, 1),
(55, 3, 44, 35, 1, 3, 1),
(56, 3, 3, 58, 1, 3, 1),
(57, 4, 11, 50, 2, 1, 1),
(58, 4, 49, 37, 1, 2, 1),
(59, 4, 27, 19, 1, 8, 1),
(60, 4, 35, 58, 1, 5, 1),
(61, 5, 11, 37, 1, 2, 1),
(62, 5, 19, 58, 1, 2, 1),
(63, 6, 37, 58, 2, 5, 1);

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
(1, '2018_12_05_095306_teams', 1),
(2, '2018_12_05_211553_tournaments', 1),
(3, '2018_12_06_194624_tournament_round', 1),
(4, '2018_12_06_211820_statuses', 1),
(5, '2018_12_06_211830_matches', 1);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(2, 'Future'),
(1, 'Past');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Team 1', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(2, 'Team 2', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(3, 'Team 3', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(4, 'Team 4', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(5, 'Team 5', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(6, 'Team 6', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(7, 'Team 7', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(8, 'Team 8', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(9, 'Team 9', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(10, 'Team 10', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(11, 'Team 11', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(12, 'Team 12', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(13, 'Team 13', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(14, 'Team 14', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(15, 'Team 15', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(16, 'Team 16', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(17, 'Team 17', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(18, 'Team 18', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(19, 'Team 19', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(20, 'Team 20', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(21, 'Team 21', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(22, 'Team 22', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(23, 'Team 23', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(24, 'Team 24', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(25, 'Team 25', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(26, 'Team 26', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(27, 'Team 27', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(28, 'Team 28', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(29, 'Team 29', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(30, 'Team 30', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(31, 'Team 31', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(32, 'Team 32', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(33, 'Team 33', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(34, 'Team 34', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(35, 'Team 35', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(36, 'Team 36', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(37, 'Team 37', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(38, 'Team 38', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(39, 'Team 39', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(40, 'Team 40', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(41, 'Team 41', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(42, 'Team 42', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(43, 'Team 43', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(44, 'Team 44', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(45, 'Team 45', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(46, 'Team 46', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(47, 'Team 47', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(48, 'Team 48', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(49, 'Team 49', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(50, 'Team 50', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(51, 'Team 51', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(52, 'Team 52', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(53, 'Team 53', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(54, 'Team 54', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(55, 'Team 55', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(56, 'Team 56', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(57, 'Team 57', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(58, 'Team 58', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(59, 'Team 59', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(60, 'Team 60', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(61, 'Team 61', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(62, 'Team 62', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(63, 'Team 63', '2018-12-10 06:41:30', '2018-12-10 06:41:30'),
(64, 'Team 64', '2018-12-10 06:41:30', '2018-12-10 06:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_teams` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `number_of_teams`, `created_at`, `updated_at`) VALUES
(1, 'Tournament One', 64, '2018-12-10 06:42:00', '2018-12-10 06:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `tournament_round`
--

CREATE TABLE `tournament_round` (
  `id` int(10) UNSIGNED NOT NULL,
  `tournament_id` int(10) UNSIGNED NOT NULL,
  `round_number` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournament_round`
--

INSERT INTO `tournament_round` (`id`, `tournament_id`, `round_number`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matches_tournament_round_id_foreign` (`tournament_round_id`),
  ADD KEY `matches_status_id_foreign` (`status_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `statuses_name_unique` (`name`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teams_name_unique` (`name`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tournaments_name_unique` (`name`);

--
-- Indexes for table `tournament_round`
--
ALTER TABLE `tournament_round`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tournament_round_tournament_id_foreign` (`tournament_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tournament_round`
--
ALTER TABLE `tournament_round`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `matches_tournament_round_id_foreign` FOREIGN KEY (`tournament_round_id`) REFERENCES `tournament_round` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tournament_round`
--
ALTER TABLE `tournament_round`
  ADD CONSTRAINT `tournament_round_tournament_id_foreign` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
