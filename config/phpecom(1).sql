-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 11:12 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` int(11) NOT NULL,
  `selectedReports` varchar(255) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`id`, `patient_id`, `description`, `price`, `selectedReports`, `hospital_id`, `created_at`) VALUES
(16, 2, 'check file upload', 6000, ',1,4', 0, '2022-06-25 05:26:38'),
(17, 2, 'dd', 2000, ',3', 0, '2022-06-25 05:28:48'),
(18, 2, 'ee', 6500, ',3,1', 0, '2022-06-25 05:29:51'),
(19, 2, 's', 1000, ',5', 0, '2022-06-25 05:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `created_at`) VALUES
('100102021B', 'user', 'user@gmail.com', '2022-06-28 15:53:18'),
('100102022B', 'user2', 'user2@gmail.com', '2022-06-28 15:49:33'),
('100102023B', 'user3', 'user3@gmail.com', '2022-07-02 06:29:36'),
('100102024B', 'user4', 'user4@gmail.com', '2022-07-02 06:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `claimId` int(11) NOT NULL,
  `file_source` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `email`, `created_at`) VALUES
('100102020B', 'hospital', 'hospital@gmail.com', '2022-06-28 17:18:38'),
('100102023B', 'hospital3', 'hospital3@gmail.com', '2022-07-02 06:14:25'),
('100102024B', 'hospital4', 'hospital4@gmail.com', '2022-07-02 06:14:48'),
('988210889G', 'hospital2', 'hospital2@gmail.com', '2022-06-28 17:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `reportcat`
--

CREATE TABLE `reportcat` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(255) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reportcat`
--

INSERT INTO `reportcat` (`id`, `name`, `description`, `hospital_id`, `created_at`) VALUES
(3, 'Dermatology', 'reports of dermatology', 1, '2022-05-26 07:12:36'),
(4, 'Cardiology', 'reports regarding cardiology', 1, '2022-05-28 15:36:58'),
(5, 'xrays', 'reports regarding xrays', 1, '2022-05-28 15:37:16'),
(6, 'hematology', 'reports regarding hematology', 1, '2022-05-28 15:39:18'),
(9, 'Orthapeadic', 'reports regarding Orthapeadic', 1, '2022-07-02 05:48:43'),
(10, 'Hematology', 'reports regarding hematology', 18, '2022-07-02 06:06:21'),
(11, 'Orthapeadic', 'reports regarding Orthapeadic', 18, '2022-07-02 06:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `category_id`, `name`, `description`, `price`, `hospital_id`, `created_at`) VALUES
(1, 4, 'mri scan', 'mri scan report', 4500, 1, '2022-05-15 10:04:11'),
(3, 5, 'knee xray', 'knee xray report', 2000, 1, '2022-05-28 15:38:00'),
(4, 5, 'hand xray', 'hand xray report', 1500, 1, '2022-05-28 15:38:42'),
(5, 6, 'full blood checkup', 'full blood checkup report', 1000, 1, '2022-05-28 15:40:49'),
(12, 11, 'Knee transplants', 'Knee transplant report', 32000, 18, '2022-07-02 06:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `userType` varchar(255) NOT NULL DEFAULT 'user',
  `userid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `userType`, `userid`) VALUES
(1, 'hospital', 'hospital@gmail.com', 'hospital', '1', '100102020B'),
(2, 'user', 'user@gmail.com', 'user', '2', '100102021B'),
(4, 'admin', 'admin@gmail.com', 'admin', '0', '0'),
(17, 'user2', 'user2@gmail.com', 'user2', '2', '100102022B'),
(18, 'hospital2', 'hospital2@gmail.com', 'hospital2', '1', '988210889G'),
(19, 'hospital3', 'hospital3@gmail.com', 'hospital3', '1', '100102023B'),
(20, 'user3', 'user3@gmail.com', 'user3', '2', '100102023B'),
(21, 'user4', 'user4@gmail.com', 'user4', '2', '100102024B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Test` (`patient_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `claimId` (`claimId`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportcat`
--
ALTER TABLE `reportcat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reportcat`
--
ALTER TABLE `reportcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `claims`
--
ALTER TABLE `claims`
  ADD CONSTRAINT `Test` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`claimId`) REFERENCES `claims` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reportcat`
--
ALTER TABLE `reportcat`
  ADD CONSTRAINT `reportcat_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `reportcat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`hospital_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
