
CREATE TABLE `ticketbox_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticketbox_id` int(11) NOT NULL,
  `view` int(1) NOT NULL COMMENT '0 = new , 1 = old',
  `flag` int(1) NOT NULL COMMENT 'Archive',
  `hide` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `ticketbox_user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ticketbox_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--spi--
