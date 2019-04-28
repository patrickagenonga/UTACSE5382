-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2019 at 09:16 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursegrade`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Cid` varchar(12) NOT NULL,
  `Cname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Cid`, `Cname`) VALUES
('CSE 5321-005', 'SOFTWARE TESTING'),
('CSE 5324-003', 'SOFTWARE ENGINEERING'),
('CSE 5382-001', 'SECURE PROGRAMMING'),
('CSE 5382-002', 'SECURE PROGRAMMING'),
('CSE 6324-001', 'ADV TOPICS IN SOFTWARE ENGINEERING');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `S_id` int(10) NOT NULL,
  `C_id` varchar(20) NOT NULL,
  `Grades` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`S_id`, `C_id`, `Grades`) VALUES
(100736486, 'CSE 5321-005', 'B'),
(1001121234, 'CSE 6324-001', 'A'),
(1001457364, 'CSE 6324-001', 'B'),
(1001536746, 'CSE 6324-001', 'C'),
(1001545729, 'CSE 6324-001', 'F'),
(1001545893, 'CSE 6324-001', 'F'),
(1001548378, 'CSE 5382-002', 'D'),
(1001555555, 'CSE 5382-001', 'C'),
(1001564387, 'CSE 5382-002', 'D'),
(1001567538, 'CSE 5382-002', 'A'),
(1001626245, 'CSE 5382-002', 'A'),
(1001626260, 'CSE 5382-002', 'B'),
(1001634628, 'CSE 5382-001', 'C'),
(1001638749, 'CSE 5382-001', 'D'),
(1001653746, 'CSE 5382-001', 'F'),
(1001658649, 'CSE 5382-001', 'F'),
(1001674537, 'CSE 5324-003', 'D'),
(1001737348, 'CSE 5324-003', 'C'),
(1001746376, 'CSE 5324-003', 'B'),
(1001747463, 'CSE 5324-003', 'A'),
(1001747486, 'CSE 5324-003', 'F'),
(1001764976, 'CSE 5321-005', 'D'),
(1001874663, 'CSE 5321-005', 'D'),
(1001947629, 'CSE 5321-005', 'B'),
(1001989890, 'CSE 5321-005', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `S_id` int(11) NOT NULL,
  `S_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_id`, `S_name`) VALUES
(100736486, 'Eddie'),
(1001121234, 'Altair'),
(1001457364, 'Dvorah'),
(1001536746, 'Ciri'),
(1001545729, 'Bruce Wayne'),
(1001545893, 'Barry Allen'),
(1001548378, 'Hal Jordan'),
(1001555555, 'Lithariel'),
(1001564387, 'Jin Kazama'),
(1001567538, 'Sonya Blade'),
(1001626245, 'Arthur Curry'),
(1001626260, 'Geralt Rivia'),
(1001634628, 'Talion'),
(1001638749, 'Arno Dorian'),
(1001653746, 'Nina Williams'),
(1001658649, 'Optimus Prime'),
(1001674537, 'Connor Kenway'),
(1001737348, 'Haytham Kenway'),
(1001746376, 'Billy Batson'),
(1001747463, 'Diana Prince'),
(1001747486, 'Clark Kent'),
(1001764976, 'Charles Lee'),
(1001874663, 'Ironhide'),
(1001947629, 'Bumblebee'),
(1001989890, 'Johnny Cage');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`S_id`),
  ADD KEY `fk_cid` (`C_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`S_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `fk_cid` FOREIGN KEY (`C_id`) REFERENCES `courses` (`Cid`),
  ADD CONSTRAINT `fk_sid` FOREIGN KEY (`S_id`) REFERENCES `student` (`S_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
