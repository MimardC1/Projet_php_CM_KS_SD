-- MySQL Script generated by MySQL Workbench
-- Sat Dec  6 15:26:05 2014
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `users` ;

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'user\'s name, unique',
  `user_password_hash` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT 'user\'s password in salted and hashed format',
  `user_email` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'user\'s email, unique',
  `user_active` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'user\'s activation status',
  `user_account_type` TINYINT(1) NOT NULL DEFAULT '1' COMMENT 'user\'s account type (basic, premium, etc)',
  `user_rememberme_token` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT 'user\'s remember-me cookie token',
  `user_creation_timestamp` BIGINT(20) NULL DEFAULT NULL COMMENT 'timestamp of the creation of user\'s account',
  `user_last_login_timestamp` BIGINT(20) NULL DEFAULT NULL COMMENT 'timestamp of user\'s last login',
  `user_failed_logins` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'user\'s failed login attempts',
  `user_last_failed_login` INT(10) NULL DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
  `user_activation_hash` VARCHAR(40) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT 'user\'s email verification hash string',
  `user_password_reset_hash` CHAR(40) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT 'user\'s password reset code',
  `user_password_reset_timestamp` BIGINT(20) NULL DEFAULT NULL COMMENT 'timestamp of the password reset request',
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `user_name` (`user_name` ASC),
  UNIQUE INDEX `user_email` (`user_email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
COMMENT = 'user data';


-- -----------------------------------------------------
-- Table `parcours`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `parcours` ;

CREATE TABLE IF NOT EXISTS `parcours` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `date` DATETIME NOT NULL,
  `distance` DECIMAL(7,3) NOT NULL,
  `duree` TIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_parcours_user_idx` (`id_user` ASC),
  CONSTRAINT `fk_parcours_user`
    FOREIGN KEY (`id_user`)
    REFERENCES `users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `point`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `point` ;

CREATE TABLE IF NOT EXISTS `point` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_parcours` INT(11) NOT NULL,
  `longitude` DECIMAL(9,6) NOT NULL,
  `latitude` DECIMAL(9,6) NOT NULL,
  `elevation` DECIMAL(9,6) NOT NULL,
  `date_pt` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_point_parcours_idx` (`id_parcours` ASC),
  CONSTRAINT `fk_point_parcours`
    FOREIGN KEY (`id_parcours`)
    REFERENCES `parcours` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `image`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `image` ;

CREATE TABLE IF NOT EXISTS `image` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_parcours` INT(11) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `commentaire` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_image_parcours_idx` (`id_parcours` ASC),
  CONSTRAINT `fk_image_parcours`
    FOREIGN KEY (`id_parcours`)
    REFERENCES `parcours` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;