
CREATE TABLE IF NOT EXISTS `user` (

  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'آدرس ایمیل',
  `password` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '' COMMENT 'کلمه عبور',
  `permission` int(12) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام و نام خانوادگی',
  `cell` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'تلفن همراه',

  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

INSERT INTO `user` (`id`, `username`, `password`, `permission`, `name`, `cell`) VALUES
(1, 'admin', 'admin', 2, 'مدیریت سایت', '09127744129');


--spi--
