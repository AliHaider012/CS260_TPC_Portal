-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 07:24 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ok`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `password`) VALUES
('Admin', 'admin@iitp.ac.in', 'admin10000');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `roll_no` char(8) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `passout_year` int(11) DEFAULT NULL,
  `program` varchar(4) DEFAULT NULL,
  `branchcode` varchar(4) DEFAULT NULL,
  `ctc` int(11) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `working_tenure` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`roll_no`, `name`, `passout_year`, `program`, `branchcode`, `ctc`, `area`, `position`, `place`, `working_tenure`, `email`, `password`, `company`) VALUES
('1701CS01', 'Avi Pratap', 2021, 'B.Te', 'CSE', 59, 'Management', 'HR Junior', 'Pune', '3', 'avi_1701cs01@iitp.ac.in', 'aviaviavi1', 'Tata'),
('1701CS48', 'Lovely Singh', 2019, 'Mtec', 'CSE', 51, 'Tech', 'SDE2', 'Patna', '4', 'lovely@iitp.ac.in', 'lovelylovely', 'Jio'),
('1702ME31', 'Kin Li', 2021, 'Btec', 'ME', 47, 'Management', 'HR', 'Delhi', '2', 'kin@iitp.ac.in', 'kinkinkin1', 'Bajaj'),
('2001CE07', 'Aashi', 2022, 'Mtec', 'CE', 37, 'Acad', 'Teacher', 'Mumbai', '2', 'aashi@iitp.ac.in', 'aashiaashi', 'Baju'),
('2101CS00', 'Ali Haider', 2025, 'BTec', 'CSE', 56, 'Tech', 'SDE1', 'Noida', '1', 'ali@iitp.ac.in', 'alihaider1', 'Amazon');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `roll_no` varchar(8) NOT NULL,
  `cid` varchar(4) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`roll_no`, `cid`, `role`) VALUES
('1901CE01', 'tcs', 'tech'),
('2001CS04', 'amzn', 'Tech');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `cid` char(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `program` varchar(4) DEFAULT NULL,
  `minimum_ten_marks` int(11) DEFAULT NULL,
  `minimum_twelve_marks` int(11) DEFAULT NULL,
  `minimum_cpi` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `partnership_time` int(11) DEFAULT NULL,
  `mode_of_interview` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `desired_skill` varchar(100) DEFAULT NULL CHECK (`minimum_ten_marks` <= 100 and `minimum_twelve_marks` <= 100 and `minimum_cpi` <= 10.00)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cid`, `name`, `program`, `minimum_ten_marks`, `minimum_twelve_marks`, `minimum_cpi`, `salary`, `partnership_time`, `mode_of_interview`, `email`, `password`, `desired_skill`) VALUES
('amzn', 'Amazon', 'Btec', 75, 75, 10, 4000000, NULL, 'Written', 'hr@amazon.in', 'amazon1000', 'Tech'),
('dsaw', 'DE Shaw', 'Mtec', 75, 75, 7, 3500000, NULL, 'Online', 'hr@deshaw.in', 'deshaw1000', 'Finance'),
('gogl', 'Google', 'Btec', 50, 50, 7, 4000000, NULL, 'Offline', 'hr@google.com', 'googleindia', 'Tech'),
('gold', 'Goldman Sachs', 'Btec', 65, 70, 8, 4200000, NULL, 'Offline', 'hr@goldman.in', 'goldman100', 'Management'),
('tcs', 'TCS', 'Btec', 60, 65, 7, 1400000, 3, 'offline', 'tcs@iitp.ac.in', 'tcstcstcs1', 'Tech');

-- --------------------------------------------------------

--
-- Table structure for table `hiring`
--

CREATE TABLE `hiring` (
  `roll_no` char(8) NOT NULL,
  `cid` char(4) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `field` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiring`
--

INSERT INTO `hiring` (`roll_no`, `cid`, `company_name`, `salary`, `year`, `field`) VALUES
('2001MC01', 'tcs', 'TCS', 1400000, 2021, 'Tech'),
('2101AI00', 'amzn', NULL, 50, 2023, 'Tech');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `cid` char(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `minimum_10marks` int(11) DEFAULT NULL,
  `minimum_12marks` int(11) DEFAULT NULL,
  `minimum_cpi` int(11) DEFAULT NULL,
  `sector` varchar(255) NOT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `interview_type` varchar(255) DEFAULT NULL,
  `program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`cid`, `name`, `minimum_10marks`, `minimum_12marks`, `minimum_cpi`, `sector`, `salary`, `interview_type`, `program`) VALUES
('amzn', 'Amazon', 75, 75, 7, 'Tech', '50.00', 'Offline', 'B.Tech'),
('msin', 'Microsoft India', 60, 60, 8, 'Tech', '56.00', 'offline', 'btech');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `roll_no` varchar(8) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `batch` int(11) DEFAULT NULL,
  `program` varchar(10) DEFAULT NULL,
  `branchcode` varchar(4) DEFAULT NULL,
  `ten_marks` int(11) DEFAULT NULL,
  `twelve_marks` int(11) DEFAULT NULL,
  `cpi` int(11) DEFAULT NULL,
  `interest` varchar(100) DEFAULT NULL,
  `package` int(11) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll_no`, `name`, `email`, `dob`, `batch`, `program`, `branchcode`, `ten_marks`, `twelve_marks`, `cpi`, `interest`, `package`, `password`) VALUES
('1901ME01', 'Ben Stokes', 'ben@iitp.ac.in', '2001-11-13', 2023, 'B.Tech', 'AIDS', 87, 91, 9, 'Finance', 0, 'benbenben1'),
('1901MM01', 'Jian Si', 'jian@iitp.ac.in', '2001-06-20', 2023, 'B.Tech', 'AIDS', 68, 77, 9, 'Tech', 0, 'jianjian00'),
('2001MC01', 'Prabha', 'prabha@iitp.ac.in', NULL, 2020, 'btech', 'mc', 78, 84, 8, 'Tech', NULL, 'prabhaprabha'),
('2001MC03', 'Atik', 'atik@iitp.ac.in', '2002-10-10', 2024, 'B.Tech', 'MnC', 83, 76, 7, 'Management', 0, 'atikatik00'),
('2101AI00', 'Aman Verma', 'am@iitp.ac.in', '2003-12-09', 2025, 'B.Tech', 'AIDS', 100, 100, 10, 'Tech', NULL, 'amanverma1'),
('2101AI08', 'Atul Kumar', 'atul@iitp.ac.in', '2003-05-21', 2025, 'B.Tech', 'AIDS', 100, 100, 10, 'Acad', 0, 'atulkumar2'),
('2101PH01', 'Mike', 'mike@iitp.ac.in', '2002-10-15', 2025, 'B.Tech', 'PH', 86, 89, 8, 'Acad', 0, 'mikemike00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`roll_no`,`cid`,`role`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `hiring`
--
ALTER TABLE `hiring`
  ADD PRIMARY KEY (`roll_no`),
  ADD KEY `fk_cid` (`cid`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`cid`,`sector`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hiring`
--
ALTER TABLE `hiring`
  ADD CONSTRAINT `fk_cid` FOREIGN KEY (`cid`) REFERENCES `company` (`cid`),
  ADD CONSTRAINT `fk_roll_no` FOREIGN KEY (`roll_no`) REFERENCES `student` (`roll_no`),
  ADD CONSTRAINT `hiring_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `company` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
