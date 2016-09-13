
ALTER TABLE `users` ADD `tell` VARCHAR(255) NOT NULL COMMENT 'تلفن ثابت';
ALTER TABLE `users` ADD `address` VARCHAR(255) NOT NULL COMMENT 'آدرس';
ALTER TABLE `users` ADD `profile_pic` VARCHAR(255) NOT NULL COMMENT 'عکس';

ALTER TABLE `users` ADD `im_a` VARCHAR(1024) NOT NULL COMMENT 'حرفه/شغل';
ALTER TABLE `users` ADD `work_at` VARCHAR(1024) NOT NULL COMMENT 'محل کار';

ALTER TABLE `users` ADD `gender` VARCHAR(1) NOT NULL COMMENT 'جنسیت';


--spi--
