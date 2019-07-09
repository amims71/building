-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2019 at 07:18 AM
-- Server version: 10.1.40-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digicondevhub_building`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `cid` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `uid` int(10) NOT NULL,
  `floor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cid`, `name`, `uid`, `floor`) VALUES
(1, 'Test Company 1', 4, 1),
(2, 'Test Company 2', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `tid` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(300) NOT NULL,
  `image` longtext NOT NULL,
  `assignedToUid` int(10) NOT NULL,
  `assignedToName` varchar(200) NOT NULL,
  `createdByUid` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `completeTime` varchar(15) NOT NULL,
  `assignTime` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`tid`, `title`, `description`, `type`, `image`, `assignedToUid`, `assignedToName`, `createdByUid`, `status`, `completeTime`, `assignTime`) VALUES
(2, 'test', 'test', 'test', '15583392091.png', 3, 'Test Staff b', 1, 'Completed', '1558345620', '1558339209'),
(3, 'test', 'test', 'test', '15583487671.png', 3, 'Test Staff b', 1, 'Completed', '1558348911', '1558348767'),
(4, 'test', 'test', 'test', '15584213561.png', 0, 'Test Staff a', 1, 'Completed', '1558430197', '1558421356'),
(5, 'test', 'test', 'test', '15584302611.png', 2, 'Test Staff a', 1, 'Completed', '1558437225', '1558430261'),
(6, 'test', 'test', 'test', '15584372381.png', 3, 'Test Staff b', 1, 'Completed', '1558437264', '1558437238'),
(7, 'test', 'test', 'test', '15585012481.png', 3, 'Test Staff b', 1, 'Completed', '1558603992', '1558501248'),
(9, 'test', 'test', 'test', '15590327114.png', 2, 'Test Staff a', 4, 'Completed', '1560320776', '1559032711'),
(10, 'test', 'test', 'test', '15591237024.png', 2, 'Test Staff a', 4, 'Completed', '1560319831', '1559123702'),
(11, 'test', 'test', 'test', '15603212944.png', 2, 'Test Staff a', 4, 'Assigned', '', '1560321294'),
(12, 'qwer', 'sdsdsd', 'sds', '15603289024.png', 3, 'Test Staff b', 4, 'Assigned', '', '1560328902');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `utoken` varchar(200) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `phone`, `pass`, `utoken`, `type`) VALUES
(1, 'Admin', 'admin@admin.com', '123', '202cb962ac59075b964b07152d234b70', '713afd4bf44ce8952a4b71e6e62f2efb', 1),
(2, 'Test Staff a', 'teststaff1@gmail.com', '123', 'e10adc3949ba59abbe56e057f20f883e', '3d4154fa31fb540a0fe194345de8d916', 3),
(3, 'Test Staff b', 'teststaff2@gmail.com', '123', 'e10adc3949ba59abbe56e057f20f883e', '', 3),
(4, 'Test Client 1', 'testclient1@gmail.com', '123', 'e10adc3949ba59abbe56e057f20f883e', '37199868c73ce0eeeb200868fae2ed43', 2),
(5, 'Test Client', 'testclienr2@gmail.com', '123', 'e10adc3949ba59abbe56e057f20f883e', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
