
CREATE TABLE `ticketbox_post` (
  `id` int(11) NOT NULL,
  `ticketbox_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text COLLATE utf8_persian_ci NOT NULL COMMENT 'متن درخواست',
  `date_created` int(11) NOT NULL,
  `hide` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

ALTER TABLE `ticketbox_post`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ticketbox_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--spi--
