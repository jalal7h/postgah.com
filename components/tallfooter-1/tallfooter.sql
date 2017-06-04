

CREATE TABLE IF NOT EXISTS `tallfooter` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نوع',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'محتوا',
  `grid` int(11) NOT NULL COMMENT 'فضا',
  `prio` int(11) NOT NULL COMMENT 'اولویت',
  `flag` int(1) NOT NULL COMMENT 'وضعیت',
  `hide` int(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `tallfooter` (`id`, `name`, `type`, `content`, `grid`, `prio`, `flag`, `hide`) VALUES
(1, 'پستگاه', 'linkify', '2', 3, 1, 1, 0),
(2, 'سایر خدمات', 'linkify', '8', 3, 2, 1, 0),
(4, 'ارتباط بیشتر', 'linkify', '3', 3, 4, 1, 0),
(5, 'بیشتر بدانید', 'linkify', '7', 3, 3, 1, 0),
(6, '-  -  -  -  -  -  -', 'hr', '', 12, 6, 1, 0),
(9, 'لینسک', 'social', 'https://www.facebook.com/postgah\r\nhttps://plus.google.com/postgah	\r\nhttps://twitter.com/postgah\r\nhttp://instagram.com/postgah\r\nhttps://youtube.com/postgah', 6, 8, 1, 0),
(10, 'کپی رایت', 'html', '<p><span style="font-family: IRANSans; font-size: 10px;">کلیه حقوق این وب سایت متعلق به پستگاه&nbsp;می باشد.</span><br /><span style="font-family: IRANSans; font-size: 10px;"><a href="terms">قوانین و مقرارت&nbsp;پستگاه</a>&nbsp;&nbsp;<a href="policy">ضوابط حفظ حریم خصوصی</a></span></p>', 6, 7, 1, 0);

ALTER TABLE `tallfooter`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tallfooter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',AUTO_INCREMENT=12;




--spi--
