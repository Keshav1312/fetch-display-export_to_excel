-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 03:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `data1`
--

CREATE TABLE `data1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data1`
--

INSERT INTO `data1` (`id`, `name`, `age`, `date`) VALUES
(1, 'keshav', '24', '2023-04-04 18:10:27'),
(2, 'karan', '12', '2023-04-04 11:10:27'),
(3, 'ravina', '22', '2023-04-05 05:44:43'),
(4, 'ayush', '21', '2023-04-05 09:20:43'),
(5, 'utkarsh', '21', '2023-04-05 18:11:43'),
(6, 'shafqat', '27', '2023-04-06 08:11:43'),
(7, 'harish', '24', '2023-04-05 14:35:43'),
(8, 'laxmi', '22', '2023-04-06 18:11:43'),
(9, 'priyanshu', '24', '2023-04-07 06:11:43'),
(10, 'prince', '55', '2023-04-07 08:11:43'),
(11, 'charul', '21', '2023-04-08 09:11:43'),
(12, 'prashanth', '65', '2023-04-09 06:11:43'),
(13, 'roopam', '32', '2023-04-09 09:11:43'),
(14, 'suresh', '35', '2023-04-10 18:11:43'),
(15, 'lakshya', '23', '2023-04-10 18:11:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data1`
--
ALTER TABLE `data1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data1`
--
ALTER TABLE `data1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
