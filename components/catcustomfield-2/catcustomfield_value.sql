
CREATE TABLE IF NOT EXISTS `catcustomfield_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `item_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'جدول محتوا',
  `item_id` int(11) NOT NULL COMMENT 'شناسه محتوا',
  `option_id` int(11) NOT NULL COMMENT 'گزینه',
  `hide` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;

--spi--
