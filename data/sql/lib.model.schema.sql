
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- person
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `person`;

CREATE TABLE `person`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`fname` VARCHAR(255) NOT NULL,
	`lname` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- genre
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `genre_U_1` (`name`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- show
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `show`;

CREATE TABLE `show`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`creators` VARCHAR(255),
	`cast` VARCHAR(255),
	`genre_id` INTEGER NOT NULL,
	`image` VARCHAR(255),
	`storyline` TEXT NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `show_FI_1` (`genre_id`),
	CONSTRAINT `show_FK_1`
		FOREIGN KEY (`genre_id`)
		REFERENCES `genre` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- episode
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `episode`;

CREATE TABLE `episode`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`show_id` INTEGER NOT NULL,
	`name` VARCHAR(255),
	`number` INTEGER,
	`season` INTEGER,
	`year` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `episode_FI_1` (`show_id`),
	CONSTRAINT `episode_FK_1`
		FOREIGN KEY (`show_id`)
		REFERENCES `show` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
