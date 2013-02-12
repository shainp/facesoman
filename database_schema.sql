CREATE TABLE `users`(
	`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(64) NOT NULL,
	`password` VARCHAR(64) NOT NULL,
	`f_name` VARCHAR(64) NOT NULL,
	`l_name` VARCHAR(64),
	`phone` VARCHAR(16) NOT NULL,
	`company` VARCHAR(128) NOT NULL,
	`email_activation_code` VARCHAR(8) NOT NULL,
	`email_verified` TINYINT(1),
	`approved` TINYINT(1) NOT NULL,
	PRIMARY KEY(ID)
);

CREATE TABLE `options` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `option` varchar(128) NOT NULL,
  `value` varchar(128) NOT NULL,
  PRIMARY KEY (`ID`)
);

