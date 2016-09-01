
CREATE TABLE `upvote` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `table_name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'جدول',
  `table_id` int(11) NOT NULL COMMENT 'شناسه جدول',
  `page_url` varchar(1024) COLLATE utf8_persian_ci NOT NULL COMMENT 'صفحه',
  `user_id` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `date` int(11) NOT NULL COMMENT 'زمان'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

ALTER TABLE `upvote`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_name` (`table_name`,`table_id`,`user_id`);

ALTER TABLE `upvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه';


--spi--
