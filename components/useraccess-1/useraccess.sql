
CREATE TABLE `useraccess` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `user_id` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `component` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'بخش'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `useraccess`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `useraccess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه';


--spi--
