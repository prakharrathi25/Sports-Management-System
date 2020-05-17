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
-- Table structure for table `playerdetails`
--

CREATE TABLE IF NOT EXISTS `playerdetails` (
  `pid` int(3) NOT NULL,
  `pname` varchar(250) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `playedMatches` int(3) NOT NULL,
  `wins` int(3) NOT NULL,
  `picture` text,
  `primarySportID` int(2) NOT NULL,
  `secondarySportID` int(2) DEFAULT NULL,
  `rating` decimal(10,2) DEFAULT NULL,
  `teamID` int(2) NOT NULL,
  `managerID` int(2) NOT NULL,
  `lastBid` int(4) NOT NULL,
  `Department` varchar(30) NOT NULL,
  `YearofJoining` int(4) NOT NULL,
  `LevelofStudy` varchar(30) NOT NULL,
  `YearofPassing` int(11) NOT NULL,
  `quote` text NOT NULL,
  `isCaptain` tinyint(1) NOT NULL,
  `highlight` text COMMENT 'Basically their life achievements'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playerdetails`
--

INSERT INTO `playerdetails` (`pid`, `pname`, `Gender`, `playedMatches`, `wins`, `picture`, `primarySportID`, `secondarySportID`, `rating`, `teamID`, `managerID`, `lastBid`, `Department`, `YearofJoining`, `LevelofStudy`, `YearofPassing`, `quote`, `isCaptain`, `highlight`) VALUES
(1, 'Praneeth Krishna', 'Male', 8, 6, 'assets/uploads/17758448_1340406589373620_1356087404215568479_o.jpg', 2, 9, '34.00', 1, 1, 48, 'CSE', 2018, 'Undergraduate', 2022, 'assets/uploads/17758448_1340406589373620_1356087404215568479_o.jpg', 0, NULL),
(2, 'Prakhar Rathi', 'Male', 10, 4, 'assets/uploads/17758448_1340406589373620_1356087404215568479_o.jpg', 4, 2, '40.00', 2, 2, 34, 'CSE', 2019, 'Undergraduate', 2022, '', 0, NULL),
(3, 'Srikar Yelamanchili', 'Male', 4, 3, 'assets/uploads/5ea9bfc3d06174.74374925.jpg', 1, NULL, '62.00', 3, 3, 41, 'CSE', 2018, 'Undergraduate', 2022, '', 0, NULL),
(4, 'Kartikey Garg', 'Male', 10, 6, 'assets/uploads/5ea9bfc3d06174.74374925.jpg', 2, 6, '60.00', 4, 4, 51, 'CSE', 2018, 'Undergraduate', 2022, '', 0, NULL),
(8, 'r', 'Other', 333, 3, 'assets/uploads/5ea9bfc3d06174.74374925.jpg', 2, 6, '1.00', 4, 2, 33, 'CSE', 3, 'ug', 33, 'Life is a chocolaye', 0, NULL),
(14, 'david', 'Female', 34, 26, 'assets/uploads/5ea9bfc3d06174.74374925.jpg', 1, 1, '76.47', 1, 1, 45, 'CSE', 2018, 'ug', 2019, 'DOCTOR whO ', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playerdetails`
--
ALTER TABLE `playerdetails`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `teamID` (`teamID`),
  ADD KEY `primarySportID` (`primarySportID`),
  ADD KEY `secondarySportID` (`secondarySportID`),
  ADD KEY `managerID` (`managerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playerdetails`
--
ALTER TABLE `playerdetails`
  MODIFY `pid` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `playerdetails`
--
ALTER TABLE `playerdetails`
  ADD CONSTRAINT `playerdetails_ibfk_1` FOREIGN KEY (`primarySportID`) REFERENCES `sportdetails` (`sID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `playerdetails_ibfk_2` FOREIGN KEY (`managerID`) REFERENCES `managerdetails` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `playerdetails_ibfk_3` FOREIGN KEY (`teamID`) REFERENCES `teamdetails` (`tid`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
