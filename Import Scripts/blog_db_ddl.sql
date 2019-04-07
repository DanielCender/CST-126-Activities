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

-- -----------------------------------------------------
-- Schema blog
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 ;
USE `blog` ;

-- -----------------------------------------------------
-- Table `blog`.`activity1_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`activity1_users` ;

CREATE TABLE IF NOT EXISTS `blog`.`activity1_users` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` VARCHAR(100) NOT NULL,
  `LAST_NAME` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `blog`.`activity2_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`activity2_users` ;

CREATE TABLE IF NOT EXISTS `blog`.`activity2_users` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` VARCHAR(100) NOT NULL,
  `LAST_NAME` VARCHAR(100) NOT NULL,
  `USERNAME` VARCHAR(50) NOT NULL,
  `PASSWORD` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `blog`.`activity3_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`activity3_users` ;

CREATE TABLE IF NOT EXISTS `blog`.`activity3_users` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` VARCHAR(100) NOT NULL,
  `LAST_NAME` VARCHAR(100) NOT NULL,
  `USERNAME` VARCHAR(50) NOT NULL,
  `PASSWORD` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `blog`.`activity4_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`activity4_users` ;

CREATE TABLE IF NOT EXISTS `blog`.`activity4_users` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` VARCHAR(100) NULL DEFAULT NULL,
  `LAST_NAME` VARCHAR(100) NULL DEFAULT NULL,
  `USERNAME` VARCHAR(50) NULL DEFAULT NULL,
  `PASSWORD` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `blog`.`address`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`address` ;

CREATE TABLE IF NOT EXISTS `blog`.`address` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` INT(11) NOT NULL,
  `ADDRESS` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `ID1`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `blog`.`activity2_users` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `ID1_idx` ON `blog`.`address` (`USER_ID` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `blog`.`blacklist`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`blacklist` ;

CREATE TABLE IF NOT EXISTS `blog`.`blacklist` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `blog`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`role` ;

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
DROP TABLE IF EXISTS `blog`.`user` ;

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
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `Email` ON `blog`.`user` (`Email` ASC) VISIBLE;

CREATE INDEX `user_ibfk_1` ON `blog`.`user` (`RoleID` ASC) VISIBLE;

CREATE FULLTEXT INDEX `FirstName` ON `blog`.`user` (`FirstName`, `LastName`, `Email`) VISIBLE;


-- -----------------------------------------------------
-- Table `blog`.`blog`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`blog` ;

CREATE TABLE IF NOT EXISTS `blog`.`blog` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(100) NOT NULL,
  `Description` VARCHAR(250) NULL DEFAULT NULL,
  `Author` INT(11) NOT NULL,
  `Votes` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  CONSTRAINT `blog_ibfk_1`
    FOREIGN KEY (`Author`)
    REFERENCES `blog`.`user` (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `Author` ON `blog`.`blog` (`Author` ASC) VISIBLE;

CREATE FULLTEXT INDEX `Name` ON `blog`.`blog` (`Name`, `Description`) VISIBLE;


-- -----------------------------------------------------
-- Table `blog`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`post` ;

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
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `Author` ON `blog`.`post` (`Author` ASC) VISIBLE;

CREATE FULLTEXT INDEX `Title` ON `blog`.`post` (`Title`, `Content`) VISIBLE;


-- -----------------------------------------------------
-- Table `blog`.`vote`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`vote` ;

CREATE TABLE IF NOT EXISTS `blog`.`vote` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `User` INT(11) NOT NULL,
  `Post` INT(11) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `User` ON `blog`.`vote` (`User` ASC, `Post` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
