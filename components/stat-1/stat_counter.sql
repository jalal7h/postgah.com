
CREATE TABLE IF NOT EXISTS `stat_counter` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
	`date` varchar(19) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
	`refer` varchar(1000) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
	`uri` varchar(1000) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
	`agent` varchar(500) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

ALTER TABLE `stat_counter` ADD `new_ip` INT(1) NOT NULL;




--spi--
