-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 03:41 PM
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
-- Database: `quize`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question_no` varchar(10) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(5) NOT NULL,
  `opt2` varchar(5) NOT NULL,
  `opt3` varchar(30) NOT NULL,
  `opt4` varchar(40) NOT NULL,
  `answer` varchar(40) NOT NULL,
  `catagory` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `catagory`) VALUES
(1, '1', '6+5 = ?', '8', '12', '11', '10', '11', 'MYSQL'),
(2, '2', 'Choose Answer', 'optim', 'optim', '$optimages/photo1650011920.jpe', '$optimages/just.jpg', 'optimages/photo1650011920.jpeg', 'MYSQL'),
(3, '3', 'Choose Routine', '$opti', '$opti', '$optimages/photo1650011920.jpe', '$optimages/FaceApp_1677081137770.jpg', 'optimages/Class Routine 5.jpg', 'MYSQL'),
(4, '4', 'Choose Me', 'optim', 'optim', 'optimages/quize.jpg', 'optimages/download (3).png', 'optimages/FaceApp_1677081137770.jpg', 'MYSQL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
