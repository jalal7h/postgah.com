
CREATE TABLE IF NOT EXISTS `texty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان لاتین',
  `name_fa` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان فارسی',
  `content` text COLLATE utf8_persian_ci NOT NULL COMMENT 'محتوا',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;
