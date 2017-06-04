
INSERT INTO `texty` ( `slug`, `name`, `prompt`, `user_email_subject`, `user_email_content`, `admin_email_subject`, `admin_email_content`, `user_sms`, `admin_sms`, `flag`) VALUES

( 'ticketbox_view_save_support_sender', 'پاسخ به تیکت - پشتیبانی - فرستنده', '', 'پیام پشتیبانی جدید #{ticket_id}', 'با سلام،\r\n\r\nکاربرا گرامی {user_name}، درخواست پشتیبانی شما به شناسه #{ticket_id} با موفقیت ثبت شد.\r\nلطفا منتظر دریافت پاسخ بمانید.\r\n\r\n{ticket_link}\r\n\r\nبا تشکر', 'پیام پشتیبانی جدید توسط {user_name}', 'با سلام، \r\n\r\nتیکت جدید توسط {user_name} در دسته {ticket_cat} با عنوان {tickt_name ثبت شده است.\r\n{ticket_adminlink}\r\n\r\nبا تشکر', 'با سلام\r\nتیکت شما به شناسه #{ticket_id} ثبت شد و در اولین فرصت پاسخ داده خواهد شد.', 'پیام پشتیبانی جدید، توسط {user_name}\r\nعنوان پیام پشتیبانی : {ticket_name}', 1),

( 'ticketbox_view_save_askFromSeller_receiver', 'پاسخ به تیکت - سوال از فروشنده -  گیرنده پاسخ', '', 'پیام جدید از {sender_name} در مورد {item_name}', 'با سلام\r\nکاربر عزیز {receiver_name}، \r\nشما پیامی از طرف {sender_name} در رابطه با {item_name} دریافت کرده اید.\r\nبرای مشاهده پیام :‌\r\n{ticket_link}\r\n\r\nبا تشکر', '', '', 'پیام جدید از طرف {sender_name} در رابطه با {item_name}', '', 1),

( 'ticketbox_view_save_askFromSeller_sender', 'پاسخ به تیکت - سوال از فروشنده -  فرستنده پاسخ', '', 'ارسال پیام به فروشنده', 'با سلام، \r\nکاربر گرامی {user_name}،‌ پیام شما در مورد {item_name} به فروشنده مربوطه ارسال شده است.\r\nلطفا منتظر پاسخ وی بمانید.\r\nآدرس پیام :‌ {ticket_link}\r\nبا تشکر', '', '', 'پیام شما در مورد {item_name} به فروشنده مربوطه ارسال شد.', '', 1),

( 'ticketbox_view_save_support_receiver', 'پاسخ به تیکت - پشتیبانی - گیرنده', '', 'پاسخ به پیام پشتیبانی #{ticket_id}', 'با سلام،\r\n\r\nکاربرا گرامی {user_name}، درخواست پشتیبانی شما به شناسه #{ticket_id} پاسخ جدیدی داده شد.\r\n\r\n{ticket_link}\r\n\r\nبا تشکر', '', '', 'با سلام\r\nتیکت شما به شناسه #{ticket_id} پاسخ داده شد.', '', 1);



--spi--
