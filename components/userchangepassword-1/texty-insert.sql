
INSERT INTO `texty` ( `slug`, `name`, `prompt`, `user_title`, `user_email_subject`, `user_email_content`, `user_sms`, `user2_title`, `user2_email_subject`, `user2_email_content`, `user2_sms`, `admin_email_subject`, `admin_email_content`, `admin_sms`, `flagstring`, `vars`, `flag`) VALUES

( 'user_changepassword_save', 'تغییر کلمه عبور', 'کلمه عبور جدید شما با موفقیت ثبت شد.', '', 'بروزرسانی کلمه عبور', 'با سلام،\r\nکاربر گرامی {user_name}،\r\n\r\nکلمه عبور شما به عبارت زیر تغییر یافت.\r\n{user_new_password}\r\n\r\nبا تشکر\r\n{tiny_title}', 'با سلام،\r\nکلمه عبور جدید شما تغییر یافت به :\r\n{user_new_password}\r\n\r\n{tiny_title}', '', '', '', '', 'تغییر کلمه عبور {user_name}', 'با سلام،\r\n\r\nکاربر {user_name} کلمه عبور خود را به \"{user_new_password}\" تغییر داد.\r\n\r\nبا تشکر\r\n{tiny_title}', '', '1110011', 'user_new_password', 1);



--spi--
