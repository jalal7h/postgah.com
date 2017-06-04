
CREATE TABLE `ticketbox` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL COMMENT 'دسته بندی',
  `name` varchar(512) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان پیام',
  `date_created` int(11) NOT NULL,
  `date_updated` int(11) NOT NULL,
  `hide` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='پیام/پیام‌ها';

ALTER TABLE `ticketbox`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ticketbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



--spi--
