
CREATE TABLE IF NOT EXISTS `facebookComment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `text` text COLLATE utf8_persian_ci NOT NULL COMMENT 'نظر',
  `user_id` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `page_id` int(11) NOT NULL COMMENT 'صفحه',
  `table_name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام جدول',
  `table_id` int(11) NOT NULL COMMENT 'شناسه جدول',
  `comment_id` int(11) NOT NULL COMMENT 'شناسه نظر معرف',
  `date` int(10) NOT NULL COMMENT 'زمان',
  `flag` int(1) NOT NULL COMMENT 'وضعیت',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='نظر/نظرات' AUTO_INCREMENT=1;


--spi--
