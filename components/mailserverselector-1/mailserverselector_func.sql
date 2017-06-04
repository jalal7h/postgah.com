
CREATE TABLE IF NOT EXISTS `mailserverselector_func` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان کلاینت',
  `mailserverselector_provider_id` int(11) NOT NULL,
  `call_from_func` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--spi--
