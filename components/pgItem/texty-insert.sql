
INSERT INTO `texty` ( `slug`, `name`, `prompt`, `user_title`, `user_email_subject`, `user_email_content`, `user_sms`, `user2_title`, `user2_email_subject`, `user2_email_content`, `user2_sms`, `admin_email_subject`, `admin_email_content`, `admin_sms`, `flagstring`, `vars`, `flag`) VALUES

( 'userprofile_save', 'ویرایش پروفایل', 'اطلاعات شما با موفقیت بروز شد.', '', 'بروزرسانی اطلاعات پروفایل', 'با سلام،\r\nکاربر گرامی {user_name}،\r\n\r\nاطلاعات پروفایل کاربری شما با موفقیت بروز شد.\r\n\r\nبا تشکر\r\n{tiny_title}', '', '', '', '', '', 'تغییر پروفایل {user_name}', 'با سلام\r\n\r\nکاربر {user_name} اطلاعات کاربری خود را بروز کرد.\r\nورود به محیط کاربری این شخص :\r\n{login_link}\r\n\r\nبا تشکر', '', '', 'login_link', 1),

( 'user_emailverifybeforesignup_send', 'ثبت نام - تایید آدرس ایمیل', 'لینک تایید ایمیل به آدرس ایمیل شما ارسال شد.\r\nلطفا پس از کلیک بر روی این لینک نسبت به تکمیل ثبت نام خود اقدام نمائید.', 'ثبت‌نام کننده', 'تایید آدرس ایمیل برای درخواست ثبت نام', 'با سلام،‌\r\nکاربر گرامی \r\n\r\nلطفا برای انجام فرایند ثبت نام با آدرس ایمیل {user_email} روی لینک زیر وارد شوید :\r\n{register_link}\r\n\r\nبا تشکر\r\n{main_title}', '', '', '', '', '', '', '', '', '1100011', 'user_email register_link', 1),

( 'pgItem_expire_agent_free_to_die_while', 'انقضاء یک آگهی مجانی', '', '', 'انقضاء آگهی مجانی #{id}', 'کاربر گرامی،\r\n\r\nآگهی مجانی شما با عنوان \"{item_name}\" پس از {limit_in_days} روز نمایش از سایت حذف شد.\r\n\r\nموفق باشید', '', '', '', '', '', '', '', '', '0110011', 'item_name limit_in_days', 1),

( 'pgItem_expire_agent_free_to_die_single', 'انقضاء تعدادی آگهی مجانی', '', '', '', '', '', '', '', '', '', 'عملیات انقضاء روز {date}', 'با سلام،\r\n\r\nتعداد {count_of_ads} آگهی مجانی طی عملیات انقضاء پس از {limit_in_days} روز نمایش از سایت حذف شد.\r\n\r\nبا تشکر', '', '', 'count_of_ads limit_in_days date ', 1),

( 'pgItem_mg_accept', 'ثبت آگهی - تایید توسط مدیر', 'آگهی به شناسه #{item_id} تایید شد.', '', 'آگهی شما تایید شد', 'با سلام\r\nکاربر گرامی {user_name}،\r\n\r\nآگهی شما با عنوان {item_name} تایید و از این لحظه بر روی سایت قرار گرفت.\r\n{item_link}\r\n\r\nبا تشکر', '', '', '', '', '', '', '', '', '', 'item_id item_name item_link', 1),

( 'pgItem_remove_byAdmin', 'حذف آگهی توسط مدیر', 'آگهی به شناسه {item_id} حذف شد', '', 'حذف آگهی با عنوان {item_name}', 'با سلام\r\nکاربر گرامی، {user_name} \r\n\r\nآگهی شما به شناسه {item_id} و با عنوان \"{item_name}\" توسط مدیریت سایت حذف شد.\r\n\r\nبا تشکر\r\n{tiny_title}', '', '', '', '', '', '', '', '', '', 'item_id item_name', 1),

( 'pgItem_remove_byUser', 'حذف آگهی توسط کاربر', 'آگهی به شناسه {item_id} حذف شد.', '', 'حذف آگهی #{item_id}', 'با سلام،\r\nکاربر گرامی {user_name}\r\n\r\nبه درخواست شما، آگهی با عنوان {item_name} با موفقیت حذف شد.\r\n\r\nبا تشکر\r\n{tiny_title}', '', '', '', '', '', 'حذف آگهی به شناسه {item_id}', 'با سلام،\r\n\r\nآگهی با عنوان {item_name} توسط {user_name} حذف شد.\r\n\r\nبا تشکر\r\n{tiny_title}', '', '', 'item_id item_name', 1),

( 'pgItem_user_saveNew_free', 'ثبت آگهی  مجانی', 'آگهی جدید شما به شماره {item_id} ثبت شد\r\nو پس از تایید مدیریت فعال خواهد شد.', '', 'ثبت آگهی جدید #{item_id}', 'با سلام\r\nکاربر گرامی {user_name}\r\n\r\nآگهی جدید شما با عنوان \"{item_name}\" ثبت شد.\r\nپس از بررسی و تایید مدیریت روی سایت قرار خواهد گرفت\r\n\r\nبا تشکر\r\n{tiny_title}', 'آگهی جدید شما با عنوان \"{item_name}\" ثبت انجام شد.', '', '', '', '', '', '', '', '', 'item_id item_name', 1),

( 'pgItem_user_saveNew_premium', 'ثبت آگهی ویژه', 'آگهی جدید شما با شناسه {item_id} ثبت شد و پس از پرداخت فاکتور مربوطه توسط مدیریت سایت بررسی و تایید خواهد شد.\r\nفاکتور جدید به مبلغ {item_cost} با شناسه {item_invoice_id} ایجاد شده است.\r\n\r\n{item_payment_button}  {invoice_list_button}', '', 'ثبت آگهی جدید #{item_id}', 'با سلام\r\nکاربر گرامی {user_name}\r\n\r\nآگهی جدید شما با عنوان \"{item_name}\" ثبت شد.\r\nپس از پرداخت فاکتور مربوطه توسط مدیریت سایت بررسی و تایید خواهد شد.\r\n\r\nبرای پرداخت هزینه این آگهی :\r\n{item_payment_link}\r\n\r\nبا تشکر\r\n{tiny_title}', 'آگهی جدید شما با عنوان \"{item_name}\" ثبت انجام شد.', '', '', '', '', 'ثبت آگهی ویژه جدید', 'با سلام\r\n\r\nآگهی جدید توسط \"{user_name}\" با عنوان \"{item_name}\" ثبت شد.\r\nهزینه آگهی {item_cost}\r\n\r\nورود به محیط کاربری :\r\n{login_link}\r\n\r\nبا تشکر\r\n{tiny_title}', '', '', 'item_id item_name item_cost item_invoice_id login_link item_payment_link item_payment_button invoice_list_link invoice_list_button', 1),

( 'pgItem_user_saveEdit', 'ویرایش آگهی', 'آگهی شما به شماره {item_id} با عنوان <b>{item_name}</b> ویرایش شد.\r\nو پس از تایید مدیریت فعال خواهد شد.', '', 'ویرایش آگهی #{item_id}', 'با سلام\r\nکاربر گرامی {user_name}\r\n\r\nآگهی شما با عنوان \"{item_name}\" ویرایش شد و بزودی پس از بررسی توسط مدیریت روی سایت فعال خواهد شد.\r\n\r\nبا تشکر\r\n{tiny_title}', '', '', '', '', '', '', '', '', '', 'item_id item_name', 1);


--spi--
