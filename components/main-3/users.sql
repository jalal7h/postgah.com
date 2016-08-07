
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'آدرس ایمیل',
  `password` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '' COMMENT 'کلمه عبور',
  `permission` int(12) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام و نام خانوادگی',
  `tell` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'شماره تلفن',
  `cell` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'شماره موبایل',
  `wallet_credit` int(11) NOT NULL,
  `position_region_id` int(11) NOT NULL COMMENT 'موقعیت',
  `address` text COLLATE utf8_persian_ci NOT NULL COMMENT 'آدرس',
  `profile_pic` varchar(500) COLLATE utf8_persian_ci NOT NULL COMMENT 'عکس',
  `im_a` int(11) NOT NULL COMMENT 'حرفه/شغل',
  `work_at` int(11) NOT NULL COMMENT 'محل کار',
  `gender` int(11) NOT NULL COMMENT 'جنسیت',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

ALTER TABLE  `users` ADD  `auth` TEXT NOT NULL COMMENT  'اطلاعات ثبت نام مجازی';

INSERT INTO `users` (`id`, `username`, `password`, `permission`, `name`, `tell`, `cell`) VALUES
(1, 'admin', 'admin', 2, 'مدیریت سایت', '02166936950', '09127744129');


--spi--
