
CREATE TABLE `ezticket_ticket` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `dept` int(11) NOT NULL COMMENT 'دپارتمان',
  `name` varchar(512) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان درخواست',
  `date` int(11) NOT NULL COMMENT 'تاریخ',
  `archived` int(1) NOT NULL,
  `view_by_admin` int(1) NOT NULL,
  `view_by_user` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;


ALTER TABLE `ezticket_ticket`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `ezticket_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

