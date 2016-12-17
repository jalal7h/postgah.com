
INSERT INTO `texty` ( `slug`, `name`, `prompt`, `user_title`, `user_email_subject`, `user_email_content`, `user_sms`, `user2_title`, `user2_email_subject`, `user2_email_content`, `user2_sms`, `admin_email_subject`, `admin_email_content`, `admin_sms`, `flagstring`, `vars`, `flag`) VALUES

( 'abusereport_do', 'ارسال گزارش تخلف', '', '', 'ثبت گزارش تخلف', 'با سلام،\r\nکاربر گرامی {user_name}، \r\n\r\nگزارش شما در مورد {item_title} \"{item_name}\" ثبت شده و بزودی تحت بررسی قرار خواهد گرفت.\r\n\r\nبا تشکر\r\n{tiny_title}', '', '', '', '', '', 'ثبت گزارش تخلف جدید', 'با سلام،\r\n\r\nکاربر {user_name} گزارش تخلف درمورد {item_title} \"{item_name}\" ثبت کرده است.\r\n\r\nبرای مشاهده جزئیات تخلف :\r\n{abusereport_adminlink}\r\n\r\nبرای مشاهده {item_title} :\r\n{item_link}\r\n\r\nبا تشکر', 'گزارش تخلف درمورد {item_title} \"{item_name}\" توسط {user_name}', '0110011', 'item_title item_name abusereport_adminlink item_link item_id', 1),

( 'abusereport_mg_removeItem', 'حذف مورد تخلف', 'حذف {item_title} با عنوان \"{item_name}\" انجام شد.', 'گزارش‌دهنده تخلف', 'حذف مورد تخلف', 'با سلام\r\nکاربر گرامی {user_name}، \r\n\r\nگزارش شما در مورد {item_title} {item_name} مورد تایید مدیریت قرار گرفته و این {item_title} از وبسایت حذف شد.\r\n\r\nبا تشکر از حمایت شما\r\n{tiny_title}', 'حذف {item_title} {item_name} که گزارش داده بودید مورد تایید قرار گرفت.', 'متخلف', 'گزارش تخلف {item_title} {item_name}', 'با سلام\r\nکاربر گرامی {user_name}،\r\n\r\nبا توجه به گزارش تخلف دریافت شده درمورد {item_title} {item_name} ، این {item_title} حذف شد.\r\n\r\nروز خوبی داشته باشید.', '{item_title} {item_name} به دلیل تخلف حذف شد.', '', '', '', '1111111', 'item_title item_name item_id bad_user_name', 1),

( 'abusereport_mg_remove_userItems', 'حذف موارد ثبت‌شده توسط متخلف', 'حذف همه موارد ثبت‌شده توسط متخلف انجام شد.', 'گزارش‌دهنده تخلف', 'حذف {item_title} های ثبت‌شده توسط متخلف', 'با سلام\r\nکاربر گرامی {user_name}، \r\n\r\nگزارش شما در مورد {item_title} {item_name} مورد تایید مدیریت قرار گرفته و همه {item_title} های ثبت شده توسط این کاربر حذف شد.\r\n\r\nبا تشکر از حمایت شما\r\n{tiny_title}', 'همه {item_title} های ثبت شده توسط کاربر متخلف، حذف شد.', 'متخلف', 'گزارش تخلف {item_title} {item_name}', 'با سلام\r\nکاربر گرامی {user_name}،\r\n\r\nبا توجه به گزارش تخلف دریافت شده درمورد {item_title} {item_name} ، همه {item_title} های ثبت شده توسط شما حذف شد.\r\n\r\nروز خوبی داشته باشید.', 'بدلیل مشاهده تخلف در {item_title} {item_name} ، همه {item_title} های شما حذف شد.', '', '', '', '1111111', 'item_title item_name item_id bad_user_name', 1),

( 'abusereport_mg_removeUser', 'حذف کامل کاربر متخلف', 'حذف همه اطلاعات کاربر متخلف \"{bad_user_name}\" انجام شد.', 'گزارش‌دهنده تخلف', 'حذف {item_title} های ثبت‌شده توسط متخلف', 'با سلام\r\nکاربر گرامی {user_name}، \r\n\r\nگزارش شما در مورد {item_title} {item_name} مورد تایید مدیریت قرار گرفته و کاربر متخلف بطور کامل از وبسایت حذف شد.\r\n\r\nبا تشکر از حمایت شما\r\n{tiny_title}', 'با سلام\r\nبواسطه گزارش تخلفی که از طرف شما رسیده همه اطلاعات کاربر متخلف از سایت حذف شد.\r\nبا تشکر', 'متخلف', 'گزارش تخلف {item_title} {item_name}', 'با سلام\r\nکاربر گرامی {user_name}،\r\n\r\nبا توجه به گزارش تخلف دریافت شده درمورد {item_title} {item_name} ، اطلاعات حساب کاربری شما بطور کامل از وبسایت {tiny_title} حذف شد.\r\n\r\nروز خوبی داشته باشید.', 'با سلام\r\nبدلیل مشاهده تخلف در {item_title} {item_name} ، حساب کاربری شما بطور کامل از وبسایت {tiny_title} حذف شد.', '', '', '', '1111111', 'item_title item_name item_id bad_user_name', 1);


--spi--
