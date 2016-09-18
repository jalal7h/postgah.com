
CREATE TABLE IF NOT EXISTS `mailserverselector_provider` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان ارسال کننده',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نوع ارسال کننده',
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نام ارسال‌کننده',
  `sender_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ایمیل ارسال‌کننده',
  `server_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'آدرس سرور',
  `server_port` int(11) NOT NULL COMMENT 'پورت سرور',
  `server_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نام‌کاربری سرور',
  `server_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'گذرواژه سرور',
  `prio` int(11) NOT NULL COMMENT 'ارجعیت',
  `flag` int(1) NOT NULL COMMENT 'وضعیت',
  `hide` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ارسال کننده ایمیل';

--spi--
