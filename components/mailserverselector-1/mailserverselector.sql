
CREATE TABLE `mailserverselector` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان ارسال کننده',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نوع ارسال کننده',
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'جزئیات'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ارسال کننده ایمیل';

INSERT INTO `mailserverselector` (`id`, `name`, `type`, `data`) VALUES
(1, 'ارسال‌کننده داخلی', 'phpmail', '');


ALTER TABLE `mailserverselector`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `mailserverselector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=2;

  
--spi--
