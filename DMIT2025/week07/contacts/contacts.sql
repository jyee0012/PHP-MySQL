-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2018 at 09:34 PM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jyee12_dmit2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `jye_bname` varchar(250) NOT NULL,
  `jye_pname` varchar(100) NOT NULL,
  `jye_email` varchar(100) NOT NULL,
  `jye_url` varchar(300) NOT NULL,
  `jye_phone` varchar(50) NOT NULL,
  `jye_address` varchar(300) NOT NULL,
  `jye_city` varchar(50) NOT NULL,
  `jye_province` varchar(5) NOT NULL,
  `jye_description` text NOT NULL,
  `jye_sendletters` tinyint(1) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`jye_bname`, `jye_pname`, `jye_email`, `jye_url`, `jye_phone`, `jye_address`, `jye_city`, `jye_province`, `jye_description`, `jye_sendletters`, `cid`) VALUES
('Microsoft', '', 'microsoft@outlook.com', 'https://www.microsoft.com/en-ca', '1 (877) 568-2495', '', '', 'AB', '', 1, 1),
('McDonalds', '', 'notofficalmcdonalds@email.com', 'https://www.mcdonalds.com/ca/en-ca.html?gclid=EAIaIQobChMI9KeumriQ3gIVUIJ-Ch3lRglmEAAYASAAEgK1bfD_BwE', '1-888-424-4622', '', '', '', '', 0, 2),
('EPCOR', '', 'info@epcor.ca', 'https://www.epcor.com/Pages/Home.aspx', '1-800-667-2345', '', '', '', '', 0, 3),
('Test Business', 'Timmy Jak', 'tommy45@gmail.com', 'https://www.tomdoesbusiness.com', '(780) 123-4567', '17903 383 ST', 'Edmonton', 'AB', 'Timmy help establish businesses or provides help for new businesses', 1, 4),
('KFC', '', 'info@kfc.ca', 'https://www.kfc.ca/', '(780) 473-2491', '', '', '', '', 0, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
