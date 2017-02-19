
CREATE TABLE IF NOT EXISTS `catcustomfield_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `catcustomfield_id` int(11) NOT NULL COMMENT 'ویژگی',
  `option` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'گزینه',
  `flag` int(1) NOT NULL COMMENT 'وضعیت',
  `hide` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;

