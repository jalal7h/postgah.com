
INSERT INTO `texty` ( `slug`, `name`, `prompt`, `user_title`, `user_email_subject`, `user_email_content`, `user_sms`, `user2_title`, `user2_email_subject`, `user2_email_content`, `user2_sms`, `admin_email_subject`, `admin_email_content`, `admin_sms`, `flagstring`, `vars`, `flag`) VALUES

( 'abusereport_do', 'ارسال گزارش تخلف', '', '', 'ثبت گزارش تخلف', 'با سلام،\r\nکاربر گرامی {user_name}، \r\n\r\nگزارش شما در مورد {item_title} \"{item_name}\" ثبت شده و بزودی تحت بررسی قرار خواهد گرفت.\r\n\r\nبا تشکر\r\n{tiny_title}', '', '', '', '', '', 'ثبت گزارش تخلف جدید', 'با سلام،\r\n\r\nکاربر {user_name} گزارش تخلف درمورد {item_title} \"{item_name}\" ثبت کرده است.\r\n\r\nبرای مشاهده جزئیات تخلف :\r\n{abusereport_adminlink}\r\n\r\nبرای مشاهده {item_title} :\r\n{item_link}\r\n\r\nبا تشکر', 'گزارش تخلف درمورد {item_title} \"{item_name}\" توسط {user_name}', '0110011', '', 1);


--spi--
