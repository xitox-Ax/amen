-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 10:45 AM
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
(1, 'admin', '482c811da5d5b4bc6d497ffa98491e38'),
(8, 'Amen', 'b55d6c402fe78f2be63114c6638aa9c1');

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
(22, 'Health and Beauty ', '<p>In Harare, healthcare&nbsp;refers to the services provided to maintain and improve people&#39;s health, encompassing prevention, diagnosis, treatment, and rehabilitation.&nbsp;It includes primary care, secondary care, and public health initiatives.&nbsp;Zimbabwe&#39;s healthcare system, while once a model, has faced challenges in recent decades, impacting the availability and quality of services.&nbsp;</p>\r\n\r\n<p>Here&#39;s a more detailed look at healthcare in Harare:</p>\r\n\r\n<p><strong>Key Aspects of Healthcare:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Diagnosis and Treatment:</strong></p>\r\n\r\n	<p>Involves identifying and treating illnesses and injuries through medical tests, consultations with doctors and specialists, and various therapies.</p>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Rehabilitation:</strong></p>\r\n\r\n	<p>Helps individuals recover from illnesses or injuries through therapies like physiotherapy, occupational therapy, and speech therapy.</p>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Public Health:</strong></p>\r\n\r\n	<p>Concerned with the health of the population as a whole, addressing issues like sanitation, water quality, and infectious disease control.&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Prevention:</strong></p>\r\n\r\n	<p>Focuses on promoting healthy lifestyles and preventing diseases through vaccinations, public health campaigns, and education.</p>\r\n	</li>\r\n</ul>\r\n', 'imgs/14.jpg', '2025-04-21', 'Allen C ');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
