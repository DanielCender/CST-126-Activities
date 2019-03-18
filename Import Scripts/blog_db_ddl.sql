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
-- Table `blog`.`blog`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`blog` ;

CREATE TABLE IF NOT EXISTS `blog`.`blog` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(100) NOT NULL,
  `Description` VARCHAR(250) NULL DEFAULT NULL,
  `Author` INT(11) NOT NULL,
  `Votes` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `blog`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`post` ;

CREATE TABLE IF NOT EXISTS `blog`.`post` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(200) NOT NULL,
  `Content` BLOB NOT NULL,
  `Author` INT(11) NOT NULL,
  `Votes` INT(11) NULL DEFAULT '0',
  `BlogID` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
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
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `Email` ON `blog`.`user` (`Email` ASC) VISIBLE;

CREATE INDEX `user_ibfk_1` ON `blog`.`user` (`RoleID` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
