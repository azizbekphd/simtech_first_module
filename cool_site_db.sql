-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2022 at 07:23 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cool_site_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `prefix` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rating` tinyint NOT NULL,
  `message` varchar(200) DEFAULT '',
  `application` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `last_name`, `prefix`, `email`, `rating`, `message`, `application`) VALUES
(1, 'Azizbek', 'Muminov', 'Mr.', 'azizbekphd@gmail.com', 5, 'Msg', 'uploads/1668630589.5922.png'),
(2, 'Azizbek', 'Muminov', 'Mr.', 'azizbekphd@gmail.com', 4, 'Foo', NULL),
(3, 'John', 'Doe', 'Mr.', 'azizbekphd@gmail.com', 5, '', NULL),
(4, 'Bruce', 'Wayne', 'Mr.', 'azizbekphd@gmail.com', 4, '', NULL),
(5, 'Tony', 'Stark', 'Mr.', 'azizbekphd@gmail.com', 4, '', NULL),
(6, 'Miles', 'Tone', 'Mr.', 'azizbekphd@gmail.com', 3, '', NULL),
(7, 'Lance', 'Bogrol', 'Mr.', 'azizbekphd@gmail.com', 4, '', NULL),
(8, 'Hilary', 'Ouse', 'Mrs.', 'azizbekphd@gmail.com', 2, '', NULL),
(9, 'Quiche', 'Hollandaise', 'Miss', 'azizbekphd@gmail.com', 5, '', NULL),
(10, 'Caspian', 'Bellevedere', 'Mr.', 'azizbekphd@gmail.com', 3, '', NULL),
(11, 'Eric', 'Widget', 'Mr.', 'azizbekphd@gmail.com', 1, '', NULL),
(12, 'Linguina', 'Nettlewater', 'Mrs.', 'azizbekphd@gmail.com', 3, '', NULL),
(13, 'Penny', 'Tool', 'Miss', 'azizbekphd@gmail.com', 4, '', NULL),
(18, 'Fletch', 'Skinner', 'Mrs.', 'azizbekphd@gmail.com', 2, '', NULL),
(19, 'Spruce', 'Springclean', 'Mr.', 'azizbekphd@gmail.com', 4, '', NULL),
(20, 'Niles', 'Peppertrout', 'Mr.', 'azizbekphd@gmail.com', 3, '', NULL),
(21, 'Cecil', 'Hipplington-Shoreditch', 'Mrs.', 'azizbekphd@gmail.com', 4, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
