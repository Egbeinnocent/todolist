-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2024 at 03:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `content` varchar(225) DEFAULT NULL,
  `deadline` varchar(225) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `unique_id` int(11) DEFAULT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `content`, `deadline`, `status`, `unique_id`, `time_created`) VALUES
(2, 'farminig  with innokosdvopsd', 'dominic is farming with me next week an', '2024-09-14', 'pending', 1, '2024-08-09 14:59:17'),
(7, 'my first day in school', 'i will be starting by monday', '2024-08-26', 'pending', 3, '2024-08-10 14:52:41'),
(8, 'vdydyd', '12345rtfg', '2024-08-22', 'pending', 3, '2024-08-10 14:56:03'),
(9, 'uiuihju', 'ytuhjnuyuy', '2024-08-28', 'pending', 3, '2024-08-10 14:59:05'),
(10, 'uiuihju', 'ytuhjnuyuy', '2024-08-28', 'pending', 3, '2024-08-10 14:59:37'),
(11, 'uiuihju', 'ytuhjnuyuy', '2024-08-28', 'pending', 3, '2024-08-10 14:59:42'),
(12, 'uiuihju', 'ytuhjnuyuy', '2024-08-28', 'completed', 3, '2024-08-10 15:01:25'),
(13, 'schooling in calabar', 'going to school in january ', '2024-08-31', 'pending', 4, '2024-08-10 21:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`) VALUES
(1, 'dominic', '$2y$10$BzczsGP/Qw5YZ6S65mgBvOGPZYbISBQtTI68Idgi2OpzE4wUibt.G', '2024-08-06 15:14:06'),
(2, 'innocent', '$2y$10$4Ldg3kYC84EE8Zj8TgM52uL8i2Ju8GJa0VCycQo71GLxSVUtxnI52', '2024-08-06 20:23:39'),
(3, 'destiny', '$2y$10$8ueh0J8A4M8NSSV8W2MuSuSukC16qoWF6bDE2Os419derOfKfM7Ze', '2024-08-10 14:41:54'),
(4, 'love', '$2y$10$P1A.DDz/psS16c9E8.BARurWLxMv9K3Gf9jINt8rErV7fMg.xvorq', '2024-08-10 15:02:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unique_id` (`unique_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`unique_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
