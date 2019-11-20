-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 03:39 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikodar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `tel` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `password`, `gender`, `tel`) VALUES
('shelomi', 'shelomi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL),
('Vinethri', 'vinethrip@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL),
('virasha', 'virasha@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL),
('zainab', 'zainab@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `tel` int(10) DEFAULT NULL,
  `edu_quali` varchar(10000) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`username`, `email`, `password`, `gender`, `tel`, `edu_quali`, `rating`) VALUES
('123', 'virasha@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, '', 0),
('3866836', '123', '202cb962ac59075b964b07152d234b70', NULL, NULL, '', 0),
('Lahiruka', 'lahiruka@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', NULL, NULL, '', 0),
('Madhavi', 'madhavi@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', NULL, NULL, '', 0),
('Niroshan', 'niroshan@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', NULL, NULL, '', 0),
('Rashmika', 'rashmika9661@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', NULL, NULL, '', 0),
('Thisara', 'thisara@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', NULL, NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `it`
--

CREATE TABLE `it` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `edu_quali` varchar(1000) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `tel` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it`
--

INSERT INTO `it` (`username`, `email`, `password`, `edu_quali`, `gender`, `tel`) VALUES
('iromie', 'iromie@gmail.com', '68053af2923e00204c3ca7c6a3150cf7', NULL, NULL, NULL),
('Raveesha', 'raveesha@gmail.com', '68053af2923e00204c3ca7c6a3150cf7', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pdesc` varchar(1000) NOT NULL,
  `p_end` date NOT NULL,
  `bid_end` date NOT NULL,
  `client` varchar(100) DEFAULT NULL,
  `IT_1` varchar(100) NOT NULL,
  `IT_2` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pid`, `name`, `pdesc`, `p_end`, `bid_end`, `client`, `IT_1`, `IT_2`) VALUES
(1, 'Inventory system', 'Build a small inventory system to keep track of the stock available (receive,issue and balance)  in a small bookshop.', '2019-12-31', '2019-11-30', 'Lahiruka', '', ''),
(2, 'Attendance marking system', 'Currently available manual system of marking the attendance of the employees of a small coffee shop needs to computerized.', '2020-01-25', '2019-12-19', 'Madhavi', '', ''),
(3, 'Download management system', 'A very small system for personal use to manage the downloads.', '2019-12-31', '2019-11-22', 'Madhavi', '', ''),
(4, 'IT system', 'Entenew technology for It systemr description here...', '2020-06-09', '2020-04-21', 'Madhavi', '', ''),
(5, 'hr system', 'Enter description herhr management systeme...', '2019-11-14', '2019-11-23', 'Madhavi', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `it`
--
ALTER TABLE `it`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
