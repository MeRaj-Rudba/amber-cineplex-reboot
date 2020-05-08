-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2020 at 03:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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
  `poster` varchar(100) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `banner` varchar(100) COLLATE utf8mb4_unicode_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `mv_name`, `director`, `genre`, `release_date`, `runtime`, `cast`, `poster`, `status`, `banner`) VALUES
(1, 'Birds of prey', 'Cathy Yan.', 'Action, Adventure, Crime.', '7 February 2020. ', '1h 49min.', 'Margot Robbie,Mary Elizabeth Winstead,Jurnee Smollett-Bell,Ewan McGregor.', 'images/poster5.jpeg', 'Coming Soon', 'images/banner5.jpg'),
(2, 'Maleficent 2', 'Joachim Rønning.', 'Adventure, Family, Fantasy.', '18 October 2019. ', '1h 59min.', 'Angelina Jolie, Elle Fanning, Harris Dickinson.', 'images/poster2.webp', 'Now Showing', 'images/banner2.jpg'),
(3, 'Frozen 2', 'Chris Buck, Jennifer Lee.', 'Action, Adventure, Crime.', '22 November 2019. ', '1h 43min', 'Kristen Bell, Idina Menzel, Josh Gad.', 'images/poster4.jpg', 'Now Showing', 'images/banner4.jpg'),
(5, 'Wonder Woman 1984', 'Patty Jenkins', 'Action, Adventure, Fantasy.', '14 August 2020', 'unknown', 'Pedro Pascal, Gal Gadot, Connie Nielsen, Cris Pine.', 'images/poster3.jpg', 'Coming Soon', 'images/banner3.jpg'),
(6, 'No Time to Die', 'Cary Joji Fukunaga', 'Action, Adventure, Thriller', '25 November 2020', '2h 43min', 'Ana de Armas, Daniel Craig, Léa Seydoux', 'images/poster1.jpg', 'Now Showing', 'images/banner1.jpg'),
(7, 'F9', 'Justin Lin', 'Action, Adventure, Crime', ' 2 April 2021', '2h 25min', 'Vin Diesel, Charlize Theron, Michelle Rodriguez', 'images/poster6.jpg', 'Coming Soon', 'images/banner6.jpg'),
(13, 'asdaw', 'asdwa', 'adaw', 'adwa', 'dawdaw', 'adwa', 'images/profile.jpg', 'Coming Soon', 'awd');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(10) NOT NULL,
  `post_by` varchar(60) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `post_details` text COLLATE utf8mb4_unicode_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `post_by`, `date`, `title`, `post_details`) VALUES
(1, 'Admin', '2020-05-02', 'COVID-19', 'The virus that causes COVID-19 is mainly transmitted through droplets generated when an infected person coughs, sneezes, or exhales. These droplets are too heavy to hang in the air, and quickly fall on floors or surfaces.\r\nYou can be infected by breathing in the virus if you are within close proximity of someone who has COVID-19, or by touching a contaminated surface and then your eyes, nose or mouth.'),
(6, 'Admin', '2020-05-03', 'James Bond', 'abbbbbbbbbbbbbbbaseawafgaaa');

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
(4, 'Nowshin', 'Frozen 2', 5, 2000, '2020-04-10'),
(5, 'Nowshin', 'Birds of prey', 3, 1200, '2020-04-14'),
(6, 'MeRaj', 'Maleficent 2', 5, 2000, '2020-04-14'),
(7, 'MeRaj', 'Frozen 2', 3, 1500, '2020-04-14'),
(8, 'Gongu', 'Frozen 2', 4, 2000, '2020-04-14'),
(9, 'Gongu', 'Birds of prey', 3, 1200, '2020-04-14'),
(10, 'Akik', 'Birds of prey', 3, 1200, '2020-04-24'),
(11, 'Nowshin', 'No Time to Die', 3, 1200, '2020-05-04'),
(12, 'Admin', 'No Time to Die', 1, 400, '2020-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `theatre` varchar(70) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `max_capacity` int(11) NOT NULL,
  `show_1` int(11) NOT NULL,
  `show_2` int(11) NOT NULL,
  `show_3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `theatre`, `max_capacity`, `show_1`, `show_2`, `show_3`) VALUES
(25, '2020-04-11', 'Themyscira', 200, 200, 200, 200),
(26, '2020-04-12', 'Themyscira', 200, 200, 200, 200),
(27, '2020-04-13', 'Themyscira', 200, 200, 200, 200),
(28, '2020-04-14', 'Themyscira', 200, 195, 200, 200),
(29, '2020-04-15', 'Themyscira', 200, 200, 200, 200),
(30, '2020-04-16', 'Themyscira', 200, 200, 200, 200),
(31, '2020-04-17', 'Themyscira', 200, 200, 200, 200),
(32, '2020-04-11', 'Gotham', 100, 100, 100, 100),
(33, '2020-04-12', 'Gotham', 100, 100, 100, 100),
(34, '2020-04-13', 'Gotham', 100, 100, 100, 100),
(35, '2020-04-14', 'Gotham', 100, 100, 97, 97),
(36, '2020-04-15', 'Gotham', 100, 100, 100, 100),
(37, '2020-04-16', 'Gotham', 100, 100, 100, 100),
(38, '2020-04-17', 'Gotham', 100, 100, 100, 100),
(39, '2020-04-18', 'Gotham', 100, 100, 100, 100),
(40, '2020-04-19', 'Gotham', 100, 100, 100, 100),
(41, '2020-04-20', 'Gotham', 100, 100, 100, 100),
(42, '2020-04-21', 'Gotham', 100, 100, 100, 100),
(43, '2020-04-22', 'Gotham', 100, 100, 100, 100),
(44, '2020-04-23', 'Gotham', 100, 100, 100, 100),
(45, '2020-04-24', 'Gotham', 100, 100, 100, 97),
(46, '2020-04-25', 'Gotham', 100, 100, 100, 100),
(47, '2020-04-26', 'Gotham', 100, 100, 100, 100),
(48, '2020-04-27', 'Gotham', 100, 100, 100, 100),
(49, '2020-04-28', 'Gotham', 100, 100, 100, 100),
(50, '2020-04-29', 'Gotham', 100, 100, 100, 100),
(51, '2020-04-30', 'Gotham', 100, 100, 100, 100),
(52, '2020-05-01', 'Gotham', 100, 100, 100, 100),
(53, '2020-05-02', 'Gotham', 100, 100, 100, 100),
(54, '2020-05-03', 'Gotham', 100, 100, 100, 100),
(55, '2020-05-04', 'Gotham', 100, 97, 100, 100),
(56, '2020-05-05', 'Gotham', 100, 100, 100, 100),
(57, '2020-05-06', 'Gotham', 100, 100, 100, 100),
(58, '2020-05-07', 'Gotham', 100, 100, 100, 100),
(59, '2020-05-08', 'Gotham', 100, 99, 100, 100),
(60, '2020-05-09', 'Gotham', 100, 100, 100, 100),
(61, '2020-05-10', 'Gotham', 100, 100, 100, 100),
(62, '2020-05-11', 'Gotham', 100, 100, 100, 100),
(63, '2020-04-11', 'Metropolis', 150, 150, 150, 150),
(64, '2020-04-12', 'Metropolis', 150, 150, 150, 150),
(65, '2020-04-13', 'Metropolis', 150, 150, 150, 150),
(66, '2020-04-14', 'Metropolis', 150, 147, 150, 150),
(67, '2020-04-15', 'Metropolis', 150, 150, 146, 150),
(68, '2020-04-16', 'Metropolis', 150, 150, 150, 150),
(69, '2020-04-17', 'Metropolis', 150, 150, 150, 150),
(70, '2020-04-18', 'Metropolis', 150, 150, 150, 150),
(71, '2020-04-19', 'Metropolis', 150, 150, 150, 150),
(72, '2020-04-20', 'Metropolis', 150, 150, 150, 150),
(73, '2020-04-21', 'Metropolis', 150, 150, 150, 150),
(74, '2020-04-22', 'Metropolis', 150, 150, 150, 150),
(75, '2020-04-23', 'Metropolis', 150, 150, 150, 150),
(76, '2020-04-24', 'Metropolis', 150, 150, 150, 150),
(77, '2020-04-25', 'Metropolis', 150, 150, 150, 150),
(78, '2020-04-26', 'Metropolis', 150, 150, 150, 150),
(79, '2020-04-27', 'Metropolis', 150, 150, 150, 150),
(80, '2020-04-28', 'Metropolis', 150, 150, 150, 150),
(81, '2020-04-29', 'Metropolis', 150, 150, 150, 150),
(82, '2020-04-30', 'Metropolis', 150, 150, 150, 150),
(83, '2020-05-01', 'Metropolis', 150, 150, 150, 150),
(84, '2020-05-02', 'Metropolis', 150, 150, 150, 150),
(85, '2020-05-03', 'Metropolis', 150, 150, 150, 150),
(86, '2020-05-04', 'Metropolis', 150, 150, 150, 150),
(87, '2020-05-05', 'Metropolis', 150, 150, 150, 150),
(88, '2020-05-06', 'Metropolis', 150, 150, 150, 150),
(89, '2020-05-07', 'Metropolis', 150, 150, 150, 150),
(90, '2020-05-08', 'Metropolis', 150, 150, 150, 150),
(91, '2020-05-09', 'Metropolis', 150, 150, 150, 150),
(92, '2020-05-10', 'Metropolis', 150, 150, 150, 150),
(93, '2020-05-11', 'Metropolis', 150, 150, 150, 150),
(94, '2020-05-04', 'Gotham', 100, 97, 100, 100),
(95, '2020-05-05', 'Gotham', 100, 100, 100, 100),
(96, '2020-05-06', 'Gotham', 100, 100, 100, 100),
(97, '2020-05-07', 'Gotham', 100, 100, 100, 100),
(98, '2020-05-08', 'Gotham', 100, 99, 100, 100);

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
  `capacity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`id`, `theatre_name`, `movie`, `show_1`, `show_2`, `show_3`, `capacity`, `price`) VALUES
(1, 'Gotham', 'No Time To die', '11AM - 2PM', '2.30PM - 5.30PM', '6PM - 9PM', 100, 400),
(2, 'Metropolis', 'Frozen 2', '11AM - 2PM', '2.30PM - 5.30PM', '6PM - 9PM', 150, 500),
(6, 'Themyscira', 'Maleficent 2', '11AM - 2PM', '2.30PM - 5.30PM', '6PM - 9PM', 200, 400);

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
(15, 'Rudba', '$2y$10$OsursrBbDpxl9q.KB5XqGevYmn.md.gcOm9mc3KfmkxpfKkr09CRS', 'customer', '2020-04-02 16:02:00'),
(16, 'MeRaj', '$2y$10$8D.NC9FE1Q9.SADTvknAIebeAZGNc7ooyUyNCLwzjOJWUcEZMZVXS', 'customer', '2020-04-14 11:37:23'),
(17, 'Gongu', '$2y$10$PDAx2Me94kOMqiLcyq5ifeHD3lO/dz1S3usZ7ZI5cSMiuRy/u0l.e', 'customer', '2020-04-14 15:12:43'),
(18, 'Akik', '$2y$10$xGqmBFqDHjaAW4EMR7/xh.MdJjNJsXFSyltOuxozdLt1fC4NuZ87W', 'customer', '2020-04-24 16:59:44');

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
(3, 'Rudba', 'MeRaj Rudba', 'mrudba@gmail.com', '01796066203', '1997-08-08', 'Male'),
(4, 'MeRaj', 'MeRaj', 'mrudba@gmail.com', '01796066203', '1997-08-08', 'Male'),
(5, 'Gongu', 'Gongu', 'gongu@gmail.com', '01767279928', '2008-02-01', 'Male'),
(6, 'Akik', 'Akik', 'masum.akik@gmail.com', '01786327385', '1998-11-13', 'Male');

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
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `now_showing`
--
ALTER TABLE `now_showing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `theatre`
--
ALTER TABLE `theatre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `upcoming`
--
ALTER TABLE `upcoming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
