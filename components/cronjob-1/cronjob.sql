
CREATE TABLE `cronjob` (
  `id` int(11) NOT NULL,
  `func` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'function name without ()',
  `date` bigint(10) NOT NULL COMMENT 'only U format'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `cronjob`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cronjob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--spi--
