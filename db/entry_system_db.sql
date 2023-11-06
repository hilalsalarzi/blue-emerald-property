-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 12:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entry_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `instruction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `item_id`, `instruction_id`) VALUES
(1, '1699270456-Bangladesh-vs-Afghanistan-Asia-Cup-2023-cricket-giga.jpg', 0, 1),
(2, '1699270456-pexels-francesco-ungaro-17475886.jpg', 0, 1),
(3, '1699270456-kpcsw.png', 0, 1),
(4, '1699270456-liz99-7EeeSN-eGsI-unsplash.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `instruction`
--

CREATE TABLE `instruction` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `instruction` longtext NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instruction`
--

INSERT INTO `instruction` (`id`, `name`, `instruction`, `item_id`) VALUES
(1, 'Hilal Ahmad', 'testing\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `dated` date DEFAULT NULL,
  `s_r` int(11) NOT NULL,
  `type` text NOT NULL,
  `room` int(11) NOT NULL,
  `project_location` text NOT NULL,
  `size` text NOT NULL,
  `property_number_floor` text NOT NULL,
  `tower` text NOT NULL,
  `price_rent` text NOT NULL,
  `description` text DEFAULT NULL,
  `key_status` text DEFAULT NULL,
  `ere_agent` text NOT NULL,
  `agent_name` text DEFAULT NULL,
  `r_e_name` text NOT NULL,
  `bayut_instruction` text DEFAULT NULL,
  `bayut` text DEFAULT NULL,
  `dubizzle_featured_end_date` text NOT NULL,
  `dubizzle_instructions` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `del _status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `dated`, `s_r`, `type`, `room`, `project_location`, `size`, `property_number_floor`, `tower`, `price_rent`, `description`, `key_status`, `ere_agent`, `agent_name`, `r_e_name`, `bayut_instruction`, `bayut`, `dubizzle_featured_end_date`, `dubizzle_instructions`, `user_id`, `created_at`, `status`, `del _status`) VALUES
(10, '2023-08-24', 2, 'test type', 2, 'test location', '333ge22', 'property floor number test', 'tower test', 'price rent test', 'Cardio Dumbbells  description updated', 'key status test', ' test', 'agent name test', 're name test', 'bayat instruction test', 'bayut testw', '2023-08-08', 'Dubizzle Instructions test', 51, '2023-08-14 11:39:43', 0, 0),
(11, '2023-08-08', 1, 'test 2', 3, 'test 2', 'test 2', 'test 2', 'test 2', 'test 2', 'test 2', 'test 2', 'test 2', 'test 2', 'test 2', 'test 2', 'test 2', '2023-09-01', 'test 2', 51, '2023-08-14 11:40:42', 0, 0),
(12, '2023-11-01', 1, 'sdfs', 2, 'sddqqqq', 'sdfqqqq', 'sdfqqq', 'sdfqq', 'sdf44', 'sdf', 'sdf', 'sf', 'fsd', 'sf', 'sf', 'sdf', '2023-11-30', 'sdfs', 2, '2023-11-05 15:12:27', 0, 0),
(13, '2023-11-03', 1, '111', 5, 'ww', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '2023-12-01', '3', 2, '2023-11-05 15:31:08', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `status`) VALUES
(1, 'Admin', '2023-06-26 12:19:08', 0),
(2, 'User', '2023-06-26 12:19:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `rname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `rname`) VALUES
(1, 'shop'),
(2, 'villas'),
(3, '3bhk'),
(4, '2bhk'),
(5, '1bhk'),
(6, 'studio');

-- --------------------------------------------------------

--
-- Table structure for table `s_r`
--

CREATE TABLE `s_r` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `s_r`
--

INSERT INTO `s_r` (`id`, `name`) VALUES
(1, 'Rent'),
(2, 'Sale');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL COMMENT '1 admin 2 client/user',
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `password`, `email`, `mobile`, `cnic`, `image_path`, `created_at`, `status`) VALUES
(1, 1, 'Admin', 'admin', 'admin@gmail.com', '1111 1111111', '2222-2222222-2', 'users_image/60b8c7b401155.jpg', '2023-05-26 01:49:27', 0),
(2, 2, 'user', 'user', 'user@gmail.com', '0345669977', '156014455666', '', '2023-06-26 12:20:31', 0),
(51, 2, 'ali', 'ali', 'ali@gmail.com', '4838490380942', '438730874203', 'Image NOT YET ADDED', '2023-08-14 11:24:35', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instruction`
--
ALTER TABLE `instruction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_r`
--
ALTER TABLE `s_r`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `instruction`
--
ALTER TABLE `instruction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `s_r`
--
ALTER TABLE `s_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
