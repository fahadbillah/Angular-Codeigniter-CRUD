-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ng-ci
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ng-ci
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ng-ci` DEFAULT CHARACTER SET latin1 ;
USE `ng-ci` ;

-- -----------------------------------------------------
-- Table `ng-ci`.`ci_sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ng-ci`.`ci_sessions` ;

CREATE TABLE IF NOT EXISTS `ng-ci`.`ci_sessions` (
  `id` VARCHAR(40) NOT NULL,
  `ip_address` VARCHAR(45) NOT NULL,
  `timestamp` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` BLOB NOT NULL,
  INDEX `ci_sessions_timestamp` (`timestamp` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ng-ci`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ng-ci`.`users` ;

CREATE TABLE IF NOT EXISTS `ng-ci`.`users` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `phone` VARCHAR(255) NULL DEFAULT NULL,
  `status` ENUM('banned', 'not_yet_activated', 'active', 'deactivated') NULL DEFAULT 'not_yet_activated',
  `login_type` ENUM('email', 'facebook', 'google') NULL,
  `social_id` BIGINT NULL DEFAULT NULL,
  `token` VARCHAR(40) NULL,
  `gender` VARCHAR(45) NULL DEFAULT NULL,
  `user_type` ENUM('user', 'admin', 'super_admin') NULL DEFAULT 'user',
  `referral_id` VARCHAR(20) NULL DEFAULT NULL,
  `create_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `language` VARCHAR(7) NULL,
  `timezone` TINYINT NULL,
  `password` VARCHAR(45) NULL DEFAULT NULL,
  `profile_picture` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
