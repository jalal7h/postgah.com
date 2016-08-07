
INSERT INTO `page` (`id`, `name`) VALUES (58, 'ثبت نام');
INSERT INTO `page_layer` (`id`, `page_id`, `prio`, `func`, `type`, `name`, `data`, `framed`, `flag`) VALUES (58, 58, 1, 'post', 'PHP5', 'ثبت نام', '<?\r\nusers_register_form();\r\n?>', 1, 1);

INSERT INTO `page` (`id`, `name`) VALUES (59, 'ثبت نام #2');
INSERT INTO `page_layer` (`id`, `page_id`, `prio`, `func`, `type`, `name`, `data`, `framed`, `flag`) VALUES (59, 59, 1, 'post', 'PHP5', 'ثبت نام', '<?\r\nusers_register_do();\r\n?>', 1, 1);

INSERT INTO `page` (`id`, `name`) VALUES (60, 'ورود کاربر');
INSERT INTO `page_layer` (`id`, `page_id`, `prio`, `func`, `type`, `name`, `data`, `framed`, `flag`) VALUES (60, 60, 1, 'post', 'PHP5', 'ورود کاربر', '<?\r\nusers_login_form();\r\n?>', 1, 1);

INSERT INTO `page` (`id`, `name`) VALUES (63, 'فراموشی کلمه عبور');
INSERT INTO `page_layer` (`id`, `page_id`, `prio`, `func`, `type`, `name`, `data`, `framed`, `flag`) VALUES (63, 63, 1, 'post', 'PHP5', 'فراموشی کلمه عبور', '<?\r\nusers_forgot_form();\r\n?>', 1, 1);



--spi--
