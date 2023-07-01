-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2023 at 08:44 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
CREATE TABLE IF NOT EXISTS `complaints` (
  `maoni_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `complaint` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`maoni_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`maoni_id`, `fname`, `email`, `complaint`) VALUES
(6, 'omari tatu', 'tatu@gmail.com', 'gfwertjyukil'),
(7, 'omari tatu', 'tatu@gmail.com', 'huduma nzuri'),
(8, 'omari tatu', 'tatu@gmail.com', 'wasdfghjkn,'),
(9, 'omari tatu', 'tatu@gmail.com', 'qWAESRDTFYGUHIJOKP['),
(10, 'omari tatu', 'tatu@gmail.com', 'qWAESRDTFYGUHIJOKP['),
(11, 'omari tatu', 'tatu@gmail.com', 'service inachelewa'),
(12, 'niwa niwa', 'niwa@gmail.com', 'hawajaja');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `region_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `region_id`) VALUES
(1, 'Monduli_District_Council', 1),
(2, 'Meru_District_Council', 1),
(3, 'Arusha_District_Council', 1),
(4, 'Longido_District_Council', 1),
(5, 'Karatu_District_Council', 1),
(6, 'Ngorongoro_District_Council', 1),
(7, 'Arusha_City_Council', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `waste_request_id` int NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `payment method` varchar(100) NOT NULL,
  `payment_status` int NOT NULL DEFAULT '0',
  `payment_date` datetime NOT NULL,
  `payment_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_status` (`payment_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`) VALUES
(1, 'Arusha');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Pedding'),
(2, 'Approved'),
(3, 'Collected'),
(4, 'Active'),
(5, 'In Active');

-- --------------------------------------------------------

--
-- Table structure for table `street`
--

DROP TABLE IF EXISTS `street`;
CREATE TABLE IF NOT EXISTS `street` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `ward_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ward_id` (`ward_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `street`
--

INSERT INTO `street` (`id`, `name`, `ward_id`) VALUES
(3, 'Mangulueni', 62),
(4, 'Mianzini', 62);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '$2y$10$9nynCknZcZ/IgqjGDsIog.LIux8bWUsGW6ZMW5t.SkREPcNv5zlXi',
  `address_id` int NOT NULL,
  `contact` varchar(50) NOT NULL,
  `status` int NOT NULL DEFAULT '4',
  `role_id` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`),
  KEY `address_id` (`address_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `address_id`, `contact`, `status`, `role_id`) VALUES
(21, 'tatu\r\n', 'omari', 'tatu@gmail.com', '$2y$10$9nynCknZcZ/IgqjGDsIog.LIux8bWUsGW6ZMW5t.SkREPcNv5zlXi', 4, '0743391622', 4, 4),
(23, 'D', 'C', 'dc@gmail.com', '$2y$10$9nynCknZcZ/IgqjGDsIog.LIux8bWUsGW6ZMW5t.SkREPcNv5zlXi', 4, '0764063426', 4, 3),
(24, 'Sabina', 'Daudi', 'sabinadc@gmail.com', '$2y$10$du.sa3WO35lrH3j1C7olPueAbsoFFBPbpF/aTzoP7l69QT9o2/1Iy', 3, '1234567890', 4, 1),
(25, 'niwa', 'niwa', 'niwa@gmail.com', '$2y$10$F3gcA2mySSS3FBRPrn0.DudI7XV/X2tFRMdV50.h1R7vwD.x3qX.y', 3, '1234567890', 4, 3),
(26, 'niwa', 'niwa', 'niwah@gmail.com', '$2y$10$9ZqfYFPmq4.Y3jgrjdU0dOQIVUSGvmoAGN8R00jyirUIMz5dBhFzy', 3, '1234567890', 4, 2),
(27, 'niwa', 'niwa', 'niwaniwa@gmail.com', '$2y$10$hfM5Dliz88ncSk/KOpaHUORD3/JF/lpf.k9S3jgjQkZINEKuzFnjm', 3, '1234567890', 4, 1),
(28, 'Afande', 'baraka', 'afandebaraka@gmail.om', '$2y$10$9nynCknZcZ/IgqjGDsIog.LIux8bWUsGW6ZMW5t.SkREPcNv5zlXi', 3, '0764063426', 4, 2),
(29, 'John', 'niway', 'johnniwa@gmail.com', '$2y$10$9nynCknZcZ/IgqjGDsIog.LIux8bWUsGW6ZMW5t.SkREPcNv5zlXi', 3, '0764063426', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

DROP TABLE IF EXISTS `users_role`;
CREATE TABLE IF NOT EXISTS `users_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `use_id` (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

DROP TABLE IF EXISTS `ward`;
CREATE TABLE IF NOT EXISTS `ward` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `district_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `district_id` (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`id`, `name`, `district_id`) VALUES
(1, 'Engaruka', 1),
(2, 'Selela', 1),
(3, 'Monduli Juu', 1),
(4, 'Engutoto', 1),
(5, 'Monduli Mjini', 1),
(6, 'Moita', 1),
(7, 'Sepeko', 1),
(8, 'Lolkisale', 1),
(9, 'Makuyuni', 1),
(10, 'Esilalei', 1),
(11, 'Mto wa Mbu', 1),
(12, 'Lepurko', 1),
(13, 'Meserani', 1),
(14, 'Mswakini', 1),
(15, 'Majengo', 1),
(16, 'Ngarenanyuki', 2),
(17, 'Leguruki', 2),
(18, 'Maji ya Chai', 2),
(19, 'Kikatiti', 2),
(20, 'Maroroni', 2),
(21, 'Makiba', 2),
(22, 'Mbuguni', 2),
(23, 'Kikwe', 2),
(24, 'Usa River', 2),
(25, 'Nkoaranga', 2),
(26, 'Poli', 2),
(27, 'Akheri', 2),
(28, 'Nkoanrua', 2),
(29, 'Songoro', 2),
(30, 'Nkoarisambu', 2),
(31, 'Ketumbiene', 4),
(32, 'Engikaret', 4),
(33, 'Ilorienito', 4),
(34, 'Gelai Meirugoi', 4),
(35, 'Gelai Lumbwa', 4),
(36, 'Matale', 4),
(37, 'Engarenaibor', 4),
(38, 'Mundarara', 4),
(39, 'KImokouwa', 4),
(40, 'Namanga', 4),
(41, 'Orbomba', 4),
(42, 'Longido', 4),
(43, 'Tingatinga', 4),
(44, 'Olmolog', 4),
(45, 'Kamwanga', 4),
(46, 'Kati', 7),
(47, 'Kaloleni', 7),
(48, 'Sekei', 7),
(49, 'Kimandolu', 7),
(50, 'Baraa', 7),
(51, 'Oloirien', 7),
(52, 'Themi', 7),
(53, 'Lemara', 7),
(54, 'Terrat', 7),
(55, 'Sokoni 1', 7),
(56, 'Daraja Mbili', 7),
(57, 'Unga Limited', 7),
(58, 'Sombetini', 7),
(59, 'Ngarenaro', 7),
(60, 'Levolosi', 7),
(61, 'Engutoto', 7),
(62, 'Elerai', 7),
(63, 'Olasiti', 7),
(64, 'Moshono', 7),
(65, 'Karatu', 5),
(66, 'Endamarariek', 5),
(67, 'Buger', 5),
(68, 'Endabash', 5),
(69, 'Kansay', 5),
(70, 'Baray', 5),
(71, 'Daa', 5),
(72, 'Oldean', 5),
(73, 'Qurus', 5),
(74, 'Ganako', 5),
(75, 'Rhotia', 5),
(76, 'Mbulumbulu', 5),
(77, 'Endamaghang', 5),
(78, 'Orgosorok', 6),
(79, 'Digodigo', 6),
(80, 'Oldonyosambu', 6),
(81, 'Pinyinyi', 6),
(82, 'Sale', 6),
(83, 'Malambo', 6),
(84, 'Naiyobi', 6),
(85, 'Nainokanoka', 6),
(86, 'Olbalbal', 6),
(87, 'Ngorongoro', 6),
(88, 'Enduleni', 6),
(89, 'Kakesio', 6),
(90, 'Arash', 6),
(91, 'Soit-Sambu', 6),
(92, 'Enguserosambu', 6),
(93, 'Oloirien', 6),
(94, 'Samunge', 6),
(95, 'Alailelai', 6),
(96, 'Maalon', 6),
(97, 'Ololosokwan', 6),
(98, 'Oloipiri', 6),
(99, 'Oldonyosambu', 3),
(100, 'Olkokola', 3),
(101, 'Bangata', 3),
(102, 'Sokoni II', 3),
(103, 'Moivo', 3),
(104, 'Kiranyi', 3),
(105, 'Kimnyaki', 3),
(106, 'Oltrumet', 3),
(107, 'Mwandeti', 3),
(108, 'Mussa', 3),
(109, 'Kisongo', 3),
(110, 'Mateves', 3),
(111, 'Oljoro', 3),
(112, 'Bwawani', 3),
(113, 'Nduruma', 3),
(114, 'Mlangarini', 3),
(115, 'Sambasha', 3),
(116, 'Olorieni', 3),
(117, 'Olmotonyi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `waste_category`
--

DROP TABLE IF EXISTS `waste_category`;
CREATE TABLE IF NOT EXISTS `waste_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `waste_category`
--

INSERT INTO `waste_category` (`id`, `name`) VALUES
(1, 'Taka ngumu'),
(2, 'Taka nyepesi');

-- --------------------------------------------------------

--
-- Table structure for table `waste_request`
--

DROP TABLE IF EXISTS `waste_request`;
CREATE TABLE IF NOT EXISTS `waste_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `waste_name` varchar(100) NOT NULL,
  `waste_category_id` int NOT NULL,
  `waste_generetor_id` int NOT NULL,
  `request_status_id` int NOT NULL DEFAULT '1',
  `payment_status_id` int NOT NULL DEFAULT '0',
  `waste_colletor_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `waste_category_id` (`waste_category_id`),
  KEY `waste_generetor_id` (`waste_generetor_id`),
  KEY `payment_status_id` (`payment_status_id`),
  KEY `request_status_id` (`request_status_id`),
  KEY `waste_colletor_id` (`waste_colletor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `waste_request`
--

INSERT INTO `waste_request` (`id`, `waste_name`, `waste_category_id`, `waste_generetor_id`, `request_status_id`, `payment_status_id`, `waste_colletor_id`) VALUES
(4, 'house houlder', 1, 25, 3, 0, 28),
(5, 'house houlder', 1, 25, 1, 0, 29),
(6, 'house houlder', 1, 24, 2, 0, 29);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`payment_status`) REFERENCES `status` (`id`);

--
-- Constraints for table `street`
--
ALTER TABLE `street`
  ADD CONSTRAINT `street_ibfk_1` FOREIGN KEY (`ward_id`) REFERENCES `ward` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`address_id`) REFERENCES `street` (`id`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`status`) REFERENCES `status` (`id`);

--
-- Constraints for table `ward`
--
ALTER TABLE `ward`
  ADD CONSTRAINT `ward_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`);

--
-- Constraints for table `waste_request`
--
ALTER TABLE `waste_request`
  ADD CONSTRAINT `waste_request_ibfk_1` FOREIGN KEY (`waste_category_id`) REFERENCES `waste_category` (`id`),
  ADD CONSTRAINT `waste_request_ibfk_2` FOREIGN KEY (`waste_generetor_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `waste_request_ibfk_3` FOREIGN KEY (`request_status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `waste_request_ibfk_4` FOREIGN KEY (`waste_colletor_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
