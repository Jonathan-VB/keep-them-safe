-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2015 at 12:13 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `keepthemsafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvedarticles`
--

CREATE TABLE IF NOT EXISTS `approvedarticles` (
`articleId` int(4) NOT NULL,
  `articleTitle` varchar(150) NOT NULL,
  `articleContent` varchar(15000) NOT NULL,
  `articleDateCreated` varchar(10) NOT NULL,
  `articleTags` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `approvedvideos`
--

CREATE TABLE IF NOT EXISTS `approvedvideos` (
`videoId` int(4) NOT NULL,
  `videoTitle` varchar(100) NOT NULL,
  `videoText` varchar(15000) NOT NULL,
  `videoTags` varchar(250) NOT NULL,
  `videoGroup` varchar(15) NOT NULL,
  `videoName` varchar(100) NOT NULL,
  `videoUrl` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`commentId` int(6) NOT NULL,
  `commentText` varchar(255) NOT NULL,
  `topicId` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendingarticles`
--

CREATE TABLE IF NOT EXISTS `pendingarticles` (
`articleId` int(4) NOT NULL,
  `articleTitle` varchar(150) NOT NULL,
  `articleContent` varchar(15000) NOT NULL,
  `articleDateCreated` varchar(10) NOT NULL,
  `articleTags` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendingvideos`
--

CREATE TABLE IF NOT EXISTS `pendingvideos` (
`videoId` int(4) NOT NULL,
  `videoTitle` varchar(100) NOT NULL,
  `videoText` varchar(15000) NOT NULL,
  `videoTags` varchar(250) NOT NULL,
  `videoGroup` varchar(15) NOT NULL,
  `videoName` varchar(100) NOT NULL,
  `videoUrl` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
`topicId` int(6) NOT NULL,
  `topicTitle` varchar(100) NOT NULL,
  `topicContent` varchar(255) NOT NULL,
  `topicDateCreated` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(6) NOT NULL,
  `role` varchar(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(12) NOT NULL,
  `location` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `fname`, `lname`, `email`, `password`, `gender`, `dob`, `location`) VALUES
(0, 'Admin', 'Peter', 'Richards', 'peterrichardz@gmail.com', 'dcff37e7656f103b71f010c5ea8a8328', 'male', '1993-10-07', 'IR'),
(1, 'Admin', 'Jonathan', 'Dempsey', 'jonathanedempsey@hotmail.com', '46f86faa6bbf9ac94a7e459509a20ed0', 'male', '1992-06-14', 'IR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvedarticles`
--
ALTER TABLE `approvedarticles`
 ADD PRIMARY KEY (`articleId`);

--
-- Indexes for table `approvedvideos`
--
ALTER TABLE `approvedvideos`
 ADD PRIMARY KEY (`videoId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendingarticles`
--
ALTER TABLE `pendingarticles`
 ADD PRIMARY KEY (`articleId`);

--
-- Indexes for table `pendingvideos`
--
ALTER TABLE `pendingvideos`
 ADD PRIMARY KEY (`videoId`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
 ADD PRIMARY KEY (`topicId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approvedarticles`
--
ALTER TABLE `approvedarticles`
MODIFY `articleId` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `approvedvideos`
--
ALTER TABLE `approvedvideos`
MODIFY `videoId` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `commentId` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pendingarticles`
--
ALTER TABLE `pendingarticles`
MODIFY `articleId` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pendingvideos`
--
ALTER TABLE `pendingvideos`
MODIFY `videoId` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
MODIFY `topicId` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
