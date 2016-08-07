
CREATE TABLE IF NOT EXISTS `catcustomfield` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `cat_id` int(11) NOT NULL COMMENT 'دسته',
  `name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نوع',
  `prio` int(11) NOT NULL COMMENT 'اولویت',
  `flag` int(1) NOT NULL COMMENT 'وضعیت',
  `hide` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `catcustomfield_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `catcustomfield_id` int(11) NOT NULL COMMENT 'ویژگی',
  `option` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'گزینه',
  `flag` int(1) NOT NULL COMMENT 'وضعیت',
  `hide` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `catcustomfield_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `item_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'جدول محتوا',
  `item_id` int(11) NOT NULL COMMENT 'شناسه محتوا',
  `option_id` int(11) NOT NULL COMMENT 'گزینه',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `catcustomfield_value_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `catcustomfield_value_id` int(11) NOT NULL COMMENT 'شناسه محتوا',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'محتوا',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `text` (`text`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;


--spi--
