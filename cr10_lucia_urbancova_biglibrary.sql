-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 11:41 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr10_lucia_urbancova_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `cr10_lucia_urbancova_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr10_lucia_urbancova_biglibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `first_name`, `last_name`, `title`, `type`, `publish_date`, `publisher`, `ISBN`) VALUES
(3, 'A. J.', 'Finn', 'The Woman in the Window', 'book', '2012-01-09', 'Travis Media', 978157112),
(4, 'Curtis', 'Sittenfeld', 'You Think It, I´ll Say It', 'book', '2012-01-19', 'Mediacom', 978157113),
(5, 'Leslie', 'Benzies', 'GTA San Andreas', 'game', '2019-11-15', 'Krkvrk', 978157120),
(6, 'Paul', 'Linford', 'Need for Speed Most Wanted', 'game', NULL, NULL, NULL),
(7, 'Frank', 'Sinatra', 'Come Fly with Me', 'music', NULL, NULL, NULL),
(8, 'Royal Philharmonic Orchestra', 'Elvis Presley', 'The Wonder of You: Elvis Presley with The Royal Philhar', 'music', NULL, NULL, NULL),
(9, 'James', 'L. Brooks', 'As Good As It Gets', 'movie', NULL, NULL, NULL),
(10, 'Blake', 'Edwards', 'Breakfast at Tiffany´s', 'movie', '1997-11-11', 'Namaste Publishing', 978157755),
(11, 'Eckhart', 'Tolle', 'The Power of Now', 'book', '1997-11-11', 'Namaste Publishing', 978157731),
(24, 'Milton', ' Friedman', 'The World Is Flat', 'book', '2007-11-12', 'Mediacom', 978157732),
(25, 'Jozo', 'Raz', 'Zajac v Afrike', 'book', '2019-11-15', 'Krkvrk', 978157122);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
