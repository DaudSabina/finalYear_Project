-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 09:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `housewest`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `region` varchar(50) NOT NULL DEFAULT 'ARUSHA',
  `ward` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL,
  `Street` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `region`, `ward`, `District`, `Street`) VALUES
(1, 'ARUSHA', 'Ngarenaro', '', ''),
(2, 'ARUSHA', 'Kimamdolu', '', ''),
(3, 'ARUSHA', 'kaloleni', '', ''),
(4, 'ARUSHA', 'Elerai', '', ''),
(5, 'ARUSHA', 'Engutoto', '', ''),
(6, 'ARUSHA', 'Mateves', '', ''),
(7, 'ARUSHA', 'Bangata', '', ''),
(8, 'ARUSHA', 'Sokon II', '', ''),
(9, 'ARUSHA', 'Akheri', '', ''),
(10, 'ARUSHA', 'Sekei', '', ''),
(11, 'ARUSHA', 'Daraja Mbili', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `maoni_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `complaint` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`maoni_id`, `fname`, `email`, `complaint`) VALUES
(6, 'omari tatu', 'tatu@gmail.com', 'gfwertjyukil'),
(7, 'omari tatu', 'tatu@gmail.com', 'huduma nzuri'),
(8, 'omari tatu', 'tatu@gmail.com', 'wasdfghjkn,'),
(9, 'omari tatu', 'tatu@gmail.com', 'qWAESRDTFYGUHIJOKP['),
(10, 'omari tatu', 'tatu@gmail.com', 'qWAESRDTFYGUHIJOKP['),
(11, 'omari tatu', 'tatu@gmail.com', 'service inachelewa');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `payment method` varchar(100) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `payment_date` datetime NOT NULL,
  `payment_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Waste generator'),
(2, 'Waste collector'),
(3, 'Officer'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address_id` int(11) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `role_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `address_id`, `contact`, `status`, `role_id`) VALUES
(5, 'karyz', 'karyz', 'karyz@gmail.com', '$2y$10$gFk/AEriYGLT7WTrNTLjUen1vtI9VkHpYwc0YpDpXgsOF2LfZl/ru', 8, '074343443', 0, 1),
(6, 'ishaa', 'jafari', 'ishaaJF@gmail.com', '1234', 11, '0987778885', 0, 3),
(7, 'sabby', 'chandika', 'sabinadaud665@gmail.com', '$2y$10$gFk/AEriYGLT7WTrNTLjUen1vtI9VkHpYwc0YpDpXgsOF2LfZl/ru', 10, '09876543', 0, 4),
(8, 'Sabina ', 'chandika', 'sabbychandy@gmail.com', '$2y$10$WNI9tk259DU7w3rrG2/mfOYEbRtQqeVB89apCQ7k/JCdpwF0E6kau', 6, '0710776702', 0, 4),
(9, 'tatu', 'omari', 'tatu@gmail.com', '$2y$10$9nynCknZcZ/IgqjGDsIog.LIux8bWUsGW6ZMW5t.SkREPcNv5zlXi', 7, '0743391622', 0, 1),
(10, 'sabby', 'mtulinga', 's@gmail.com', '$2y$10$6BfLCAtKBNpjZqc6lQJ09.6gxSpPMEn.usDMzMtRse7KhRWHVPL8G', 9, '0623567888', 0, 1),
(11, 'collector', 'moja', 'collector@gmail.com', '$2y$10$RGtbd8Rlb99PnozN9S8bhOkByFsfcZw8eBmAO4r/4Pc6jCQjOkV6C', 5, '0743391622', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weste`
--

CREATE TABLE `weste` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weste_category`
--

CREATE TABLE `weste_category` (
  `id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`maoni_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `address_id_2` (`address_id`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `use_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `weste`
--
ALTER TABLE `weste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `weste_category`
--
ALTER TABLE `weste_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `w_id` (`w_id`),
  ADD KEY `c_id` (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `maoni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weste`
--
ALTER TABLE `weste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `weste_category`
--
ALTER TABLE `weste_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `weste`
--
ALTER TABLE `weste`
  ADD CONSTRAINT `weste_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `weste_category`
--
ALTER TABLE `weste_category`
  ADD CONSTRAINT `weste_category_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `weste_category_ibfk_2` FOREIGN KEY (`w_id`) REFERENCES `weste` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
