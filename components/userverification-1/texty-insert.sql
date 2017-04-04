
INSERT INTO `texty` ( `slug`, `name`, `prompt`, `user_title`, `user_email_subject`, `user_email_content`, `user_sms`, `user2_title`, `user2_email_subject`, `user2_email_content`, `user2_sms`, `admin_email_subject`, `admin_email_content`, `admin_sms`, `flagstring`, `vars`, `flag`) VALUES
( 'userverification', 'پیامک تایید شماره موبایل', '', '', 'پیام تایید آدرس ایمیل', 'با سلام\r\n\r\nکاربر عزیز کد تایید ایمیل شما به شرح زیر است :\r\n{verify_code}\r\nلطفا برای تایید آدرس ایمیل خود کد بالا را در کادر مربوطه وارد نمائید.\r\n\r\nو یا اینکه بر روی لینک زیر کلیک کنید :\r\n{verify_link}\r\n\r\nبا تشکر\r\n{tiny_title}', 'با سلام\r\nکد فعال‌سازی شما : {verify_code}\r\nبا تشکر\r\n{tiny_title}', '', '', '', '', '', '', '', '0110000', 'verify_code verify_link', 1);

--spi--
