
ALTER TABLE `user` ADD `tell` VARCHAR(255) NOT NULL COMMENT 'تلفن ثابت';
ALTER TABLE `user` ADD `address` VARCHAR(255) NOT NULL COMMENT 'آدرس';
ALTER TABLE `user` ADD `profile_pic` VARCHAR(255) NOT NULL COMMENT 'عکس';

ALTER TABLE `user` ADD `im_a` VARCHAR(1024) NOT NULL COMMENT 'حرفه/شغل';
ALTER TABLE `user` ADD `work_at` VARCHAR(1024) NOT NULL COMMENT 'محل کار';

ALTER TABLE `user` ADD `gender` VARCHAR(1) NOT NULL COMMENT 'جنسیت';


--spi--
