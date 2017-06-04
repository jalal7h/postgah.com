
CREATE TABLE `texty` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نام',
  `prompt` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'متن پیام',
  `user_email_subject` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان ایمیل کاربر',
  `user_email_content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'متن ایمیل کاربر',
  `admin_email_subject` int(11) NOT NULL COMMENT 'عنوان ایمیل مدیر',
  `admin_email_content` int(11) NOT NULL COMMENT 'متن ایمیل مدیر',
  `user_sms` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'متن پیامک کاربر',
  `admin_sms` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'متن پیامک مدیر'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `texty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

ALTER TABLE `texty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه';


--spi--
