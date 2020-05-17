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
-- Table structure for table `sportdetails`
--

CREATE TABLE IF NOT EXISTS `sportdetails` (
  `sID` int(2) NOT NULL,
  `sName` varchar(30) NOT NULL,
  `currentLeader` int(2) DEFAULT NULL,
  `lastMatch` date NOT NULL,
  `nextMatch` date DEFAULT NULL,
  `sport_logo` text,
  `venue` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sportdetails`
--

INSERT INTO `sportdetails` (`sID`, `sName`, `currentLeader`, `lastMatch`, `nextMatch`, `sport_logo`, `venue`) VALUES
(1, 'Football', 3, '2020-04-15', NULL, 'assets/images/football.png', 'Front of the ISC'),
(2, 'Tennis', 2, '2020-04-13', NULL, 'assets/images/tennis.JPG', 'Tennis Court near DH2'),
(3, 'Basketball', 3, '2020-04-02', NULL, 'assets/images/basketball.JPG', 'Basketball Courts near DH2'),
(4, 'Badminton', 2, '2020-04-03', NULL, 'assets/images/badminton.JPG', 'Indoor Sports Complex Ground Floor'),
(5, 'Volleyball', 4, '2020-04-08', NULL, 'assets/images/volleyball.JPG', 'Volleyball Court near DH2'),
(6, 'Cricket', 3, '2020-04-22', NULL, 'assets/images/cricket.JPG', 'Cricket Stadium near Main Arena'),
(7, 'Table Tennis', 1, '2020-04-19', NULL, 'assets/images/table_tennis.png', 'Indoor Sports Complex Ground Floor'),
(8, 'Squash', 4, '2020-04-01', NULL, 'assets/images/squash.JPG', 'Indoor Sports Complex First Floor'),
(9, 'Chess', 4, '2020-04-12', NULL, 'assets/images/chess.JPG', 'Indoor Sports Complex Ground Floor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sportdetails`
--
ALTER TABLE `sportdetails`
  ADD PRIMARY KEY (`sID`),
  ADD KEY `currentLeader` (`currentLeader`),
  ADD KEY `currentLeader_2` (`currentLeader`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
