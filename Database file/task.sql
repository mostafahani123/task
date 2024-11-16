-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 06:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author_id`, `body`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'asas', '2024-11-16 15:22:08', '2024-11-16 15:22:08'),
(3, 3, 2, 'comment Post 2\r\n', '2024-11-16 15:22:57', '2024-11-16 15:22:57'),
(4, 4, 2, 'mmmm', '2024-11-16 16:26:42', '2024-11-16 16:26:42'),
(5, 4, 2, 'asdasd', '2024-11-16 16:26:49', '2024-11-16 16:26:49'),
(6, 4, 2, 'sdasd', '2024-11-16 16:26:52', '2024-11-16 16:26:52'),
(7, 5, 2, 'jjjjjj', '2024-11-16 16:33:10', '2024-11-16 16:33:10'),
(8, 5, 2, 'سكمن', '2024-11-16 17:09:34', '2024-11-16 17:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(2, 2, 'post1', 'Post1', '2024-11-16 14:57:40', '2024-11-16 14:57:40'),
(3, 2, 'post2', 'post2\r\n', '2024-11-16 15:22:38', '2024-11-16 15:22:38'),
(4, 2, 'post3 ', 'post4', '2024-11-16 16:08:12', '2024-11-16 16:31:03'),
(5, 2, 'e', 'e', '2024-11-16 16:32:53', '2024-11-16 16:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'mostafajhgfd112@gmail.com', '$2y$10$eAyFeS5XpqbU2d8XLNL27u/IcItPtCf7XCfVFm.feI/lEo4NNjghi'),
(2, 'mostafa@gmail.com', '$2y$10$Mk2csOn/HrQ7FkzSUgknuehjjX4RNhc7L9uDRgPvUwjslhdkmfJNu'),
(3, 'mostafa@gmail.com', '$2y$10$KF0o0ywunlsnCXvaq2Nf2OtCUWToKNASJkpfZBuPz05QAK5hH2o1u'),
(4, 'mostafa@gmail.com', '$2y$10$qDbCVfVBr4kGqvzaBxX2SuW22kMxox5CNlfpTeiF5UowrPpr7C5Am'),
(5, 'mostafa@gmail.com', '$2y$10$8MSk2YEl7naPeCJrLzXZju1Pf1UyS0yrhn.poOrwlSvQQ6xpxWfPm'),
(6, 'mostafa@gmail.com', '$2y$10$84hh.5bmtOoc4w6Sj77mmu7glmAULY.8o4CDztksr/7NBtV8x2qaS'),
(7, 'mostafa@gmail.com', '$2y$10$NOVgYS02g0/kYkT0hBlNieYMlnWZKKcvSzyaLCItyjSNhiKMH4QOS'),
(8, 'mostafa@gmail.com', '$2y$10$16XKNn9IFw4.OhvHzkxET.56QqVeZ.BhLWqp1YRl8ZB/k9NfjeH2W'),
(9, 'mostafas@gmail.com', '$2y$10$wc4iIX.a8NRjEGBbduLWtePNEA7TGcMKNdys4H1gWDAmuyaCrx5w.'),
(10, 'mostafa@gmail.com', '$2y$10$wGsolSmxf0GVdxVmg99fvOQumCsbRbP63F02BitCeUt1qIb8mqsg6'),
(11, 'logy@gmail.com', '$2y$10$verCce5rIm32cDCaic/Y3usqhcsGt25R0I..4cw6Vpfoda9bJaHZK'),
(12, 'mostafa@gmail.com', '$2y$10$q2E5GG9RrFPLyEFZtvp77O9VG4xl6zl4rNJzWlMtqWOWJ.4sGJWCm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
