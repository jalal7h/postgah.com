
CREATE TABLE IF NOT EXISTS `catcustomfield_value_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `catcustomfield_value_id` int(11) NOT NULL COMMENT 'شناسه محتوا',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'محتوا',
  `hide` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `text` (`text`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;

ALTER TABLE `catcustomfield_value_text` ADD UNIQUE(`catcustomfield_value_id`);
