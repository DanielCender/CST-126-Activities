-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 08, 2019 at 04:28 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity1_users`
--

CREATE TABLE `activity1_users` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activity2_users`
--

CREATE TABLE `activity2_users` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activity3_users`
--

CREATE TABLE `activity3_users` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activity4_users`
--

CREATE TABLE `activity4_users` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(100) DEFAULT NULL,
  `LAST_NAME` varchar(100) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blacklist`
--

CREATE TABLE `blacklist` (
  `ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blacklist`
--

INSERT INTO `blacklist` (`ID`, `Email`) VALUES
(1, 'd.r.c.98@hotmail.com'),
(2, 'd.r.c.98@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `Author` int(11) NOT NULL,
  `Votes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `Text` text NOT NULL,
  `Post` int(11) NOT NULL,
  `User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID`, `Text`, `Post`, `User`) VALUES
(1, 'Some text', 12, 2),
(2, 'Some text again', 12, 2),
(13, 'This was great.', 12, 1),
(14, 'A great read....', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Content` text NOT NULL,
  `Author` int(11) NOT NULL,
  `Votes` int(11) DEFAULT '0',
  `BlogID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `Title`, `Content`, `Author`, `Votes`, `BlogID`) VALUES
(7, 'Re:Topic 4 DQ 2', 'Is good', 1, 0, NULL),
(8, 'Re:Topic 4 DQ 2', 'Is goodfds', 1, 1, NULL),
(9, 'Re:Topic 4 DQ 2', 'Is goodfdsfdsf', 1, 0, NULL),
(10, 'Re:Topic 4 DQ 2', 'Is goodfdsfdsf', 1, 0, NULL),
(11, 'Re:Topic 4 DQ 2', 'Is goodfdsfdsf', 1, 0, NULL),
(12, 'This post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque massa enim, consectetur sed aliquam consectetur, lacinia a mi. Ut nec ligula rhoncus, aliquam nisi vel, eleifend urna. Praesent ut nisl id nunc faucibus aliquet. Nullam pretium nec orci vel porttitor. Curabitur imperdiet, nulla et eleifend porttitor, purus ipsum mollis diam, sed posuere quam augue et ex. Mauris ut ligula erat. Nunc leo nisl, tempor tempor efficitur a, malesuada et quam. Donec accumsan ante ipsum, at ornare diam rutrum sit amet. Nullam vel enim nec diam efficitur tincidunt et quis tortor. Vivamus nisi tortor, euismod id sodales nec, vestibulum bibendum mi. Maecenas ac turpis at tortor rutrum sagittis quis cursus diam.  Curabitur vitae elit id quam tristique varius sed sit amet arcu. Morbi aliquet dui vitae dignissim ullamcorper. Etiam leo lacus, consectetur ac bibendum in, posuere sed purus. Donec porta sapien quis nibh efficitur viverra. Ut rhoncus, massa at molestie gravida, lacus ipsum dignissim tortor, vitae vestibulum lorem tortor eu sapien. Vestibulum molestie hendrerit accumsan. Vestibulum quis risus at lacus ornare convallis. Praesent id tincidunt mi. Curabitur blandit faucibus fermentum. Quisque elit tortor, facilisis quis nibh non, efficitur euismod turpis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;  Vivamus eleifend elementum consequat. Donec iaculis malesuada magna sit amet imperdiet. In hac habitasse platea dictumst. Nam vitae lectus nisi. Quisque porta tellus tortor, vitae vehicula mi vehicula venenatis. Proin accumsan accumsan faucibus. Nullam tortor tellus, tincidunt sit amet ultrices id, finibus id velit. Cras at nisl sit amet urna vulputate posuere vitae quis erat. In hac habitasse platea dictumst. Duis at euismod nunc. Cras id ultricies arcu. Praesent sit amet arcu vehicula turpis interdum venenatis at nec justo. Praesent interdum sapien in neque semper fermentum. Sed id ullamcorper purus. Suspendisse in interdum mauris, sed dignissim leo. Morbi tempor in tellus at dignissim.  Donec hendrerit viverra sem, vel accumsan eros congue sed. Quisque lacus eros, mattis eget pretium et, posuere sit amet est. Ut a commodo magna, nec faucibus mauris. Fusce vel tortor malesuada, fringilla ante eget, varius felis. Phasellus egestas diam ac nisi commodo, id gravida nisi vestibulum. Nulla placerat quam vitae libero tincidunt ornare. Donec tincidunt massa quam, vitae blandit eros tincidunt vitae. In porta feugiat orci, quis ornare diam rhoncus nec. Cras eget scelerisque magna. Proin porttitor tincidunt felis, varius aliquam velit. Donec pulvinar ornare ex ac luctus. Praesent quis turpis sit amet sem facilisis congue non non purus. Praesent scelerisque urna ut interdum vehicula.', 1, 153, NULL),
(13, 'dafdafd', 'fdsfdsafd', 2, 0, NULL),
(14, 'This is the Latest and Greatest', 'Some of the best Content', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `Name`) VALUES
(1, 'USER'),
(2, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `RoleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `FirstName`, `LastName`, `Email`, `Password`, `RoleID`) VALUES
(1, 'Daniel', 'Cender', 'dan@dan.com', 'ZGFu', 2),
(2, 'Daniel', 'Cender', 'ryan@ryan.com', 'cnlhbg==', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `ID` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `Post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`ID`, `User`, `Post`) VALUES
(3, 1, 8),
(2, 1, 12),
(4, 1, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity1_users`
--
ALTER TABLE `activity1_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `activity2_users`
--
ALTER TABLE `activity2_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `activity3_users`
--
ALTER TABLE `activity3_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `activity4_users`
--
ALTER TABLE `activity4_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID1` (`USER_ID`);

--
-- Indexes for table `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Author` (`Author`);
ALTER TABLE `blog` ADD FULLTEXT KEY `Name` (`Name`,`Description`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Author` (`Author`);
ALTER TABLE `post` ADD FULLTEXT KEY `Title` (`Title`,`Content`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `user_ibfk_1` (`RoleID`);
ALTER TABLE `user` ADD FULLTEXT KEY `FirstName` (`FirstName`,`LastName`,`Email`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `User` (`User`,`Post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity1_users`
--
ALTER TABLE `activity1_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity2_users`
--
ALTER TABLE `activity2_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity3_users`
--
ALTER TABLE `activity3_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity4_users`
--
ALTER TABLE `activity4_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `ID1` FOREIGN KEY (`USER_ID`) REFERENCES `activity2_users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`Author`) REFERENCES `user` (`ID`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`Author`) REFERENCES `user` (`ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`);
