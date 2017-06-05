
INSERT INTO `texty` ( `slug`, `name`, `prompt`, `user_title`, `user_email_subject`, `user_email_content`, `user_sms`, `user2_title`, `user2_email_subject`, `user2_email_content`, `user2_sms`, `admin_email_subject`, `admin_email_content`, `admin_sms`, `flagstring`, `vars`, `flag`) VALUES

( 'pgPlan_syncItemPlan_changed_to_free', 'اتمام دوره آگهی ویژه', '', 'آگهی‌دهنده', 'اتمام دوره ویژه آگهی شما', 'با سلام،\r\n\r\nکاربر گرامی،‌ دوره ویژه {item_old_plan} برای آگهی شما با عنوان {item_name} به اتمام رسید.\r\nبرای تمدید روی لینک زیر کلیک کنید.\r\n{item_renew_link}\r\nبا تشکر', '', '', '', '', '', '', '', '', '0110011', 'item_old_plan item_name item_renew_link', 1),

( 'pgPlan_user_MakePremium_do_congratulate', 'ثبت درخواست ارتقاء آگهی', 'ارتقاء آگهی شما با شناسه {item_id} ثبت شد\nصورتحساب جدید به مبلغ {item_cost} با شناسه {item_invoice_id} ایجاد شد.\n\n{item_payment_button}  {invoice_list_button}', '', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\nکاربر گرامی، {user_name}\r\n\r\nدرخواست ارتقاء آگهی شما با شناسه {item_id} ثبت شد.\r\nفاکتور جدید به مبلغ {item_cost} با شناسه {item_invoice_id} ایجاد شد.\r\n\r\n{item_payment_link}\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان \"{item_name}\" ، به مدت {item_duration} ، تحت پلن {item_plan} بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر\r\n{tiny_title}', '', '', '', '', '', 'ثبت درخواست ارتقاء آگهی به مبلغ {item_cost}', 'با سلام،\r\n\r\nدرخواست ارتقاء به پلان \"{item_plan}\" برای آگهی به شناسه {item_id} با عنوان {item_name} به مبلغ {item_cost} توسط کاربر {user_name} ثبت شده است.\r\n\r\nبا تشکر\r\n{tiny_title}', '', '', 'item_id item_name item_cost item_invoice_id item_payment_link item_payment_button invoice_list_link invoice_list_button item_plan item_duration', 1),

( 'pgPlan_user_RenewAds_do_congratulate', 'ثبت درخواست تمدید آگهی', 'تمدید آگهی شما با شناسه {item_id} ثبت شد\nصورتحساب جدید به مبلغ {item_cost} با شناسه {item_invoice_id} ایجاد شد.\n\n{item_payment_button}  {invoice_list_button}', '', 'درخواست تمدید آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، {user_name}\r\nدرخواست تمدید آگهی شما با شناسه {item_id} ثبت شد.\r\nفاکتور جدید به مبلغ {item_cost} با شناسه #{item_invoice_id} ایجاد شد.\r\n\r\n{item_payment_link}\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان \"{item_name}\" ، به مدت {item_duration} ، تحت پلن {item_plan} بصورت ویژه تمدید خواهد شد.\r\n\r\nبا تشکر\r\n{tiny_title}', '', '', '', '', '', 'ثبت درخواست تمدید آگهی به مبلغ {item_cost}', 'با سلام،\r\n\r\nدرخواست تمدید پلان \"{item_plan}\" برای آگهی به شناسه {item_id} با عنوان {item_name} به مبلغ {item_cost} توسط کاربر {user_name} ثبت شده است.\r\n\r\nبا تشکر\r\n{tiny_title}', '', '', 'item_id item_name item_cost item_invoice_id item_payment_link item_payment_button invoice_list_link invoice_list_button item_plan item_duration', 1);

--spi--