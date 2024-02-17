DROP DATABASE IF EXISTS `trailblazers`;
CREATE DATABASE `trailblazers` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `trailblazers`;



CREATE USER IF NOT EXISTS root@localhost
    IDENTIFIED BY 'root';

GRANT ALL PRIVILEGES
    ON trailblazers.*
    TO root@localhost;