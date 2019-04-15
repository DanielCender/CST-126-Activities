-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema blog
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `blog` ;

-- -----------------------------------------------------
-- Schema blog
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 ;
USE `blog` ;

-- -----------------------------------------------------
-- Table `blog`.`blacklist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`blacklist` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `blog`.`comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`comment` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Text` TEXT NOT NULL,
  `Post` INT(11) NOT NULL,
  `User` INT(11) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `blog`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`role` (
  `RoleID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`RoleID`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `blog`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`user` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `FirstName` VARCHAR(100) NOT NULL,
  `LastName` VARCHAR(100) NOT NULL,
  `Email` VARCHAR(100) NOT NULL,
  `Password` VARCHAR(25) NOT NULL,
  `RoleID` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `user_ibfk_1`
    FOREIGN KEY (`RoleID`)
    REFERENCES `blog`.`role` (`RoleID`))
ENGINE = InnoDB
AUTO_INCREMENT = 18
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `Email` ON `blog`.`user` (`Email` ASC) VISIBLE;

CREATE INDEX `user_ibfk_1` ON `blog`.`user` (`RoleID` ASC) VISIBLE;

CREATE FULLTEXT INDEX `FirstName` ON `blog`.`user` (`FirstName`, `LastName`, `Email`) VISIBLE;


-- -----------------------------------------------------
-- Table `blog`.`post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`post` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(200) NOT NULL,
  `Content` TEXT NOT NULL,
  `Author` INT(11) NOT NULL,
  `Votes` INT(11) NULL DEFAULT '0',
  `BlogID` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `post_ibfk_1`
    FOREIGN KEY (`Author`)
    REFERENCES `blog`.`user` (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `Author` ON `blog`.`post` (`Author` ASC) VISIBLE;

CREATE FULLTEXT INDEX `Title` ON `blog`.`post` (`Title`, `Content`) VISIBLE;


-- -----------------------------------------------------
-- Table `blog`.`vote`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`vote` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `User` INT(11) NOT NULL,
  `Post` INT(11) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `User` ON `blog`.`vote` (`User` ASC, `Post` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
