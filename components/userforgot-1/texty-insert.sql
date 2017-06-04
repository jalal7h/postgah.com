
INSERT INTO `texty` ( `slug`, `name`, `prompt`, `user_title`, `user_email_subject`, `user_email_content`, `user_sms`, `user2_title`, `user2_email_subject`, `user2_email_content`, `user2_sms`, `admin_email_subject`, `admin_email_content`, `admin_sms`, `flagstring`, `vars`, `flag`) VALUES

( 'user_forgot_save', 'بازیابی گذرواژه - انجام', 'بازیابی گذرواژه با موفقیت انجام شد.', '', 'بازیابی گذرواژه انجام شد', 'با سلام\r\nکاربر گرامی {user_name}\r\n\r\nبازیابی گذرواژه حساب شما با موفقیت انجام شد.\r\nکلمه عبور جدید شما :\r\n{user_new_password}\r\n\r\nبا تشکر', '', '', '', '', '', '', '', '', '', 'user_new_password', 1),

( 'user_forgot_send', 'بازیابی گذرواژه - ارسال لینک ', 'با سلام\r\nلینک بازیابی گذرواژه به آدرس ایمیل {user_email} ارسال شد.\r\nلطفا ایمیل خود را بررسی نمایید. (در صورت اینکه ایمیل ارسالی در پوشه اینباکس شما نبود ، پوشه اسپم خود را چک نمایید)', '', 'درخواست گذرواژه جدید', 'سلام،\r\n\r\nبا توجه به درخواست شما برای ثبت کلمه عبور جدید ، پیوند تنظیم مجدد کلمه عبور به ایمیل {user_email} ارسال شد.\r\nلینک : \r\n{forgot_link}\r\n\r\nبا تشکر\r\n{tiny_title}', '', '', '', '', '', '', '', '', '1100000', 'forgot_link', 1);


--spi--
