-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 06:22 AM
-- Server version: 8.0.39
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `members_borromeo`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` mediumint UNSIGNED NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `psword` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `psword`, `reg_date`) VALUES
(2, 'Frank', 'Borromeo', '2023-2-00837@lpunetwork.edu.ph', '$2y$10$43NlEDVUkFaEA4QvggcclOuHY86SsADAjZMtZmN8ZAVSXe7c/iCza', '2024-10-10 10:26:54'),
(3, 'Dan', 'Rivero', '2023-2-00243@lpunetwork.edu.ph', '$2y$10$BMsK/ibML6VetJbeBJDgB.rl4Ycs7C3AiP4gI4z.Kam05Bt6UBI5.', '2024-10-10 10:43:21'),
(4, 'Aundreka', 'Perez', '2023-2-00792@lpunetwork.edu.ph', '$2y$10$iAcR9TSlmUQhcGR4douixOwqTiwgazimvPzAjEwDtAvCBPcaR99Fq', '2024-10-10 10:44:08'),
(5, 'Josh Ezekiel', 'Cawaling', '2023-2-00547@lpunetwork.edu.ph', '$2y$10$/CM3YUz7v8kr69t3N8OZgenlkKj/WFvHgYnvRiqdLh7S5K24Ywi4m', '2024-10-10 12:12:28'),
(6, 'Marjinel', 'Abante', '2023-2-00462@lpunetwork.edu.ph', '$2y$10$HuTMRSqe1PCjgU36cBYUCe.quRaXeSBvUueqJ1ukTmQWfyH5FKxzW', '2024-10-10 12:13:15'),
(7, 'abc', 'abc', 'abc@a.com', '$2y$10$zfdy5pOpuqN7zKsnc9RO1O5iDCJ7lq3uyhMeEzRykzhDJU7FTc2ji', '2024-10-10 12:18:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
