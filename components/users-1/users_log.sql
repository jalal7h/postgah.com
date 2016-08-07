
CREATE TABLE `users_log` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `date` int(11) NOT NULL COMMENT 'زمان',
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'آی پی',
  `action` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نوع فعالیت'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `users_log` ADD PRIMARY KEY (`id`);
ALTER TABLE `users_log` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--spi--
