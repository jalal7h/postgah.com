
CREATE TABLE `ezticket_reply` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `text` text COLLATE utf8_persian_ci NOT NULL COMMENT 'متن درخواست',
  `date` int(11) NOT NULL COMMENT 'تاریخ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;


ALTER TABLE `ezticket_reply`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `ezticket_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

