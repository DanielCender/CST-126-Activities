-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 01, 2019 at 04:35 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity1_users`
--

CREATE TABLE `activity1_users`
(
  `ID` int
(11) NOT NULL,
  `FIRST_NAME` varchar
(100) NOT NULL,
  `LAST_NAME` varchar
(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activity2_users`
--

CREATE TABLE `activity2_users`
(
  `ID` int
(11) NOT NULL,
  `FIRST_NAME` varchar
(100) NOT NULL,
  `LAST_NAME` varchar
(100) NOT NULL,
  `USERNAME` varchar
(50) NOT NULL,
  `PASSWORD` varchar
(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activity3_users`
--

CREATE TABLE `activity3_users`
(
  `ID` int
(11) NOT NULL,
  `FIRST_NAME` varchar
(100) NOT NULL,
  `LAST_NAME` varchar
(100) NOT NULL,
  `USERNAME` varchar
(50) NOT NULL,
  `PASSWORD` varchar
(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity3_users`
--

INSERT INTO `activity3_users` (`
ID`,
`FIRST_NAME
`, `LAST_NAME`, `USERNAME`, `PASSWORD`) VALUES
(3, 'Daniel', 'Cender', 'dan', 'dan');

-- --------------------------------------------------------

--
-- Table structure for table `activity4_users`
--

CREATE TABLE `activity4_users`
(
  `ID` int
(11) NOT NULL,
  `FIRST_NAME` varchar
(100) DEFAULT NULL,
  `LAST_NAME` varchar
(100) DEFAULT NULL,
  `USERNAME` varchar
(50) DEFAULT NULL,
  `PASSWORD` varchar
(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity4_users`
--

INSERT INTO `activity4_users` (`
ID`,
`FIRST_NAME
`, `LAST_NAME`, `USERNAME`, `PASSWORD`) VALUES
(1, 'Daniel', 'Cender', 'dan', 'dan'),
(2, 'Daniel', 'Cender', 'dar', 'dar');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address`
(
  `ID` int
(11) NOT NULL,
  `USER_ID` int
(11) NOT NULL,
  `ADDRESS` varchar
(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blacklist`
--

CREATE TABLE `blacklist`
(
  `ID` int
(11) NOT NULL,
  `Email` varchar
(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog`
(
  `ID` int
(11) NOT NULL,
  `Name` varchar
(100) NOT NULL,
  `Description` varchar
(250) DEFAULT NULL,
  `Author` int
(11) NOT NULL,
  `Votes` int
(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post`
(
  `ID` int
(11) NOT NULL,
  `Title` varchar
(200) NOT NULL,
  `Content` text NOT NULL,
  `Author` int
(11) NOT NULL,
  `Votes` int
(11) DEFAULT '0',
  `BlogID` int
(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`
ID`,
`Title
`, `Content`, `Author`, `Votes`, `BlogID`) VALUES
(3, 'fdsafdsfd', 'fdsfdsfdsfd', 1, 0, NULL),
(4, 'Re:Topic 4 DQ 2', 'fds', 1, 0, NULL),
(5, 'fdsaf', 'fdsafs', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role`
(
  `RoleID` int
(11) NOT NULL,
  `Name` varchar
(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`
RoleID`,
`Name
`) VALUES
(1, 'USER'),
(2, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user`
(
  `ID` int
(11) NOT NULL,
  `FirstName` varchar
(100) NOT NULL,
  `LastName` varchar
(100) NOT NULL,
  `Email` varchar
(100) NOT NULL,
  `Password` varchar
(25) NOT NULL,
  `RoleID` int
(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user`
  (`ID`, `FirstName

`, `LastName`, `Email`, `Password`, `RoleID`) VALUES
(1, 'Daniel', 'Cender', 'dan@dan.com', 'ZGFu', 2),
(2, 'Daniel', 'Cender', 'ryan@ryan.com', 'cmFy', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity1_users`
--
ALTER TABLE `activity1_users`
ADD PRIMARY KEY
(`ID`);

--
-- Indexes for table `activity2_users`
--
ALTER TABLE `activity2_users`
ADD PRIMARY KEY
(`ID`);

--
-- Indexes for table `activity3_users`
--
ALTER TABLE `activity3_users`
ADD PRIMARY KEY
(`ID`);

--
-- Indexes for table `activity4_users`
--
ALTER TABLE `activity4_users`
ADD PRIMARY KEY
(`ID`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
ADD PRIMARY KEY
(`ID`),
ADD KEY `ID1_idx`
(`USER_ID`);

--
-- Indexes for table `blacklist`
--
ALTER TABLE `blacklist`
ADD PRIMARY KEY
(`ID`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
ADD PRIMARY KEY
(`ID`),
ADD KEY `Author`
(`Author`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
ADD PRIMARY KEY
(`ID`),
ADD KEY `Author`
(`Author`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
ADD PRIMARY KEY
(`RoleID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY
(`ID`),
ADD KEY `user_ibfk_1`
(`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity1_users`
--
ALTER TABLE `activity1_users`
  MODIFY `ID` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity2_users`
--
ALTER TABLE `activity2_users`
  MODIFY `ID` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity3_users`
--
ALTER TABLE `activity3_users`
  MODIFY `ID` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `activity4_users`
--
ALTER TABLE `activity4_users`
  MODIFY `ID` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `ID` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `ID` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `ID` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
ADD CONSTRAINT `ID1` FOREIGN KEY
(`USER_ID`) REFERENCES `activity2_users`
(`ID`) ON
DELETE NO ACTION ON
UPDATE NO ACTION;

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY
(`Author`) REFERENCES `user`
(`ID`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY
(`Author`) REFERENCES `user`
(`ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY
(`RoleID`) REFERENCES `role`
(`RoleID`);
