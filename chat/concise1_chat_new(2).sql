-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2023 at 03:14 AM
-- Server version: 10.5.21-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concise1_chat_new`
--
CREATE TABLE active_sessions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  session_id VARCHAR(255) NOT NULL,
  login_time DATETIME NOT NULL
);
-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `msg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `msg`, `user_id`, `date`) VALUES
(294, 'hi', 14, '2023-07-30 17:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_gender` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dob_day` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dob_month` varchar(100) NOT NULL,
  `dob_year` varchar(100) NOT NULL,
  `user_image` text NOT NULL,
  `user_register_date` date NOT NULL,
  `user_lastlogin` date NOT NULL,
  `status` text NOT NULL,
  `posts` text NOT NULL,
  `friends` text NOT NULL,
  `user_dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_name`, `user_pass`, `user_email`, `user_country`, `user_gender`, `dob_day`, `dob_month`, `dob_year`, `user_image`, `user_register_date`, `user_lastlogin`, `status`, `posts`, `friends`, `user_dob`) VALUES
(13, 'Ben', 'Ben', 'Ben', '$2y$10$xwprGAeeCLyFUyusDxgpkuFo38cqfPSrRhpOqZYt04UMhjBtXVWrS', 'ben@ben.ben', 'AUS', 'Male', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00'),
(14, 'Admin', 'Gilbey', 'Admin', '$2y$10$p.E81qvwfxNgMCorXDt6x.8ViHJCaW39FlfYZ80VxDlwWRpuDZmCS', 'ben@concise.design', 'AUS', 'Male', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00'),
(15, 'cool', 'cool', 'cool', '$2y$10$95e3vnroniXtCX1bEGGxd.3m01qLVR064Q5kKD559jzxAMFtvqf.S', 'cool@cool.cool', 'AUS', 'Male', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date_index` (`date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
