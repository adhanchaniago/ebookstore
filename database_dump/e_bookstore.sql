-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2020 at 01:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `e_bookstore`
--

CREATE TABLE `e_bookstore` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `book_author` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `e_bookstore`
--

INSERT INTO `e_bookstore` (`id`, `book_name`, `book_author`) VALUES
(1, 'Avatar, The Last Airbender', 'F. C. Yee'),
(2, 'Just Mercy', 'Bryan Stevenson'),
(3, 'The Beach House', 'Beth Reekles'),
(4, 'El Deafo', 'Beth Reekles'),
(5, 'Tree Girl', 'Beth Reekles'),
(6, 'The Adventures of Ulysses', 'Beth Reekles'),
(7, 'Angular JS', 'Laxit Patel'),
(8, 'Node JS', 'Laxit Patel'),
(9, 'React JS', 'Laxit Patel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `e_bookstore`
--
ALTER TABLE `e_bookstore`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `e_bookstore`
--
ALTER TABLE `e_bookstore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
