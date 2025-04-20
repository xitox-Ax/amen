-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2025 at 04:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '482c811da5d5b4bc6d497ffa98491e38');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `date_posted` date NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image_url`, `date_posted`, `author`) VALUES
(1, 'Nature', 'This image captures the serene beauty of nature. The lush greenery and the tranquil atmosphere make it a perfect escape from the hustle and bustle of city life. Nature has a way of calming our minds and rejuvenating our spirits plus.', 'imgs/nature.jpg', '2025-01-28', 'Amen'),
(2, 'Environment ', 'This image captures the serene beauty of nature. The lush greenery and the tranquil atmosphere make it a perfect escape from the hustle and bustle of city life. Nature has a way of calming our minds and rejuvenating our spirits.', 'imgs/nature.jpg', '2025-01-28', 'Amen'),
(14, 'Environment ', 'This image captures the serene beauty of nature. The lush greenery and the tranquil atmosphere make it a perfect escape from the hustle and bustle of city life. Nature has a way of calming our minds and rejuvenating our spirits.', 'imgs/nature.jpg', '2025-01-28', 'Amen'),
(15, 'Environment ', 'This image captures the serene beauty of nature. The lush greenery and the tranquil atmosphere make it a perfect escape from the hustle and bustle of city life. Nature has a way of calming our minds and rejuvenating our spirits.', 'imgs/nature.jpg', '2025-01-28', 'Amen'),
(16, 'Environment ', 'This image captures the serene beauty of nature. The lush greenery and the tranquil atmosphere make it a perfect escape from the hustle and bustle of city life. Nature has a way of calming our minds and rejuvenating our spirits.', 'imgs/nature.jpg', '2025-01-28', 'Amen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
