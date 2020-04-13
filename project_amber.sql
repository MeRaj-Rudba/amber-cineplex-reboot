-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 10:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_amber`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) NOT NULL,
  `mv_name` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `director` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `genre` text COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `release_date` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `runtime` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `cast` text COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `poster` varchar(100) COLLATE utf8mb4_unicode_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `mv_name`, `director`, `genre`, `release_date`, `runtime`, `cast`, `poster`) VALUES
(1, 'Birds of prey', 'Cathy Yan.', 'Action, Adventure, Crime.', '7 February 2020. ', '1h 49min.', 'Margot Robbie,Mary Elizabeth Winstead,Jurnee Smollett-Bell,Ewan McGregor.', 'images/poster5.jpeg'),
(2, 'Maleficent 2', 'Joachim Rønning.', 'Adventure, Family, Fantasy.', '18 October 2019. ', '1h 59min.', 'Angelina Jolie, Elle Fanning, Harris Dickinson.', 'images/poster2.webp'),
(3, 'Frozen 2', 'Chris Buck, Jennifer Lee.', 'Action, Adventure, Crime.', '22 November 2019. ', '1h 43min', 'Kristen Bell, Idina Menzel, Josh Gad.', 'images/poster4.jpg'),
(5, 'Wonder Woman 1984', 'Patty Jenkins', 'Action, Adventure, Fantasy.', '14 August 2020', 'unknown', 'Pedro Pascal, Gal Gadot, Connie Nielsen, Cris Pine.', 'images/poster3.jpg'),
(6, 'No Time to Die', 'Cary Joji Fukunaga', 'Action, Adventure, Thriller', '25 November 2020', '2h 43min', 'Ana de Armas, Daniel Craig, Léa Seydoux', 'images/poster1.jpg'),
(7, 'F9', 'Justin Lin', 'Action, Adventure, Crime', ' 2 April 2021', '2h 25min', 'Vin Diesel, Charlize Theron, Michelle Rodriguez', 'images/poster6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `now_showing`
--

CREATE TABLE `now_showing` (
  `id` int(11) NOT NULL,
  `mv_name` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `now_showing`
--

INSERT INTO `now_showing` (`id`, `mv_name`) VALUES
(1, 'Birds of prey'),
(4, 'Frozen 2'),
(2, 'Maleficent 2');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `mv_name` varchar(100) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `ticket_count` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL,
  `purchase_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `username`, `mv_name`, `ticket_count`, `total_amount`, `purchase_date`) VALUES
(1, 'Nowshin', 'Birds Of Prey', 5, 2000, '2020-03-01'),
(2, 'Fahad', 'Frozen 2', 10, 4000, '2020-03-01'),
(3, 'Nowshin', 'Maleficent 2', 3, 1200, '2020-04-15'),
(4, 'Nowshin', 'Frozen 2', 5, 2000, '2020-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `theatre` varchar(70) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `movie` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `theatre`, `movie`) VALUES
(1, 'Gotham', 'Birds of prey'),
(2, 'Metropolis', 'Frozen 2'),
(3, 'Themyscira', 'Maleficent 2');

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `id` int(11) NOT NULL,
  `theatre_name` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `movie` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `show_1` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `show_2` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `show_3` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`id`, `theatre_name`, `movie`, `show_1`, `show_2`, `show_3`, `capacity`) VALUES
(1, 'Gotham', 'Birds of prey', '11AM - 2PM', '2.30PM - 5.30PM', '6PM - 9PM', 100),
(2, 'Metropolis', 'Frozen 2', '11AM - 2PM', '2.30PM - 5.30PM', '6PM - 9PM', 150),
(3, 'Themyscira', 'Maleficent 2', '11AM - 2PM', '2.30PM - 5.30PM', '6PM - 9PM', 120);

-- --------------------------------------------------------

--
-- Table structure for table `upcoming`
--

CREATE TABLE `upcoming` (
  `id` int(11) NOT NULL,
  `mv_name` varchar(100) COLLATE utf8mb4_unicode_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `upcoming`
--

INSERT INTO `upcoming` (`id`, `mv_name`) VALUES
(3, 'F9'),
(2, 'No Time to Die'),
(1, 'Wonder Woman 1984');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `created_at`) VALUES
(5, 'Admin', '$2y$10$16egqshMNlCJvAenMtTfrOJreFUzZNNsR0GZ0A3k0qTTS46vvoD7C', 'admin', '2020-03-29 14:28:53'),
(8, 'Nowshin', '$2y$10$gcon4LAmAc9cVMCXHudzluqxIuszU1cYDVWgpEUu88ftwbbUqygIi', 'customer', '2020-03-31 22:37:17'),
(11, 'Dummy', '$2y$10$zOfptypT9i302N4qChtmJeix.LkscclWqUe7yCAKvp17rBCkr96HW', 'customer', '2020-04-02 08:43:10'),
(12, 'Doll', '$2y$10$E41WiKmfbyJaZlKTVV9TnOxFG993rvLomffDsDq9rKWr0i1I29FPG', 'customer', '2020-04-02 08:44:56'),
(13, 'Fahad', '$2y$10$rkNnSd3ZVLNTWNWtfvP1Eu4Qbucgv/ZqiUiS9qwEFYE7sd59t1MzS', 'customer', '2020-04-02 10:58:08'),
(15, 'Rudba', '$2y$10$OsursrBbDpxl9q.KB5XqGevYmn.md.gcOm9mc3KfmkxpfKkr09CRS', 'customer', '2020-04-02 16:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(10) NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `full_name` varchar(70) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `full_name`, `email`, `phone`, `dob`, `gender`) VALUES
(1, 'Nowshin', 'Nowshin Sabrin (Model)', 'nowshin@gmail.com', '01303495445', '1997-12-24', 'Female'),
(2, 'Fahad', 'Fahad Khandoker', 'fahad@gmail.com', '01830258845', '1997-12-09', 'Male'),
(3, 'Rudba', 'MeRaj Rudba', 'mrudba@gmail.com', '01796066203', '1997-08-08', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mv_name` (`mv_name`);

--
-- Indexes for table `now_showing`
--
ALTER TABLE `now_showing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mv_name` (`mv_name`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `theatre_name` (`theatre_name`);

--
-- Indexes for table `upcoming`
--
ALTER TABLE `upcoming`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mv_name` (`mv_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `now_showing`
--
ALTER TABLE `now_showing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `theatre`
--
ALTER TABLE `theatre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `upcoming`
--
ALTER TABLE `upcoming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
