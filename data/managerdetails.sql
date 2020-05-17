-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2020 at 08:47 PM
-- Server version: 5.6.47-log
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `managerdetails`
--

CREATE TABLE IF NOT EXISTS `managerdetails` (
  `id` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `teamID` int(11) NOT NULL,
  `image` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managerdetails`
--

INSERT INTO `managerdetails` (`id`, `name`, `teamID`, `image`) VALUES
(1, 'Panther Man', 1, 'assets\\images\\img2.jpeg'),
(2, 'Bull Man', 2, 'assets\\images\\img2.jpeg'),
(3, 'Pho Man', 3, 'assets\\images\\img2.jpeg'),
(4, 'Falcon Man', 4, 'assets\\images\\img2.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `managerdetails`
--
ALTER TABLE `managerdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teamID` (`teamID`),
  ADD KEY `teamID_2` (`teamID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `managerdetails`
--
ALTER TABLE `managerdetails`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
