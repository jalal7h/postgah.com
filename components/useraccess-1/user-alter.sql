
ALTER TABLE `user` ADD `flag_admin` INT(1) NOT NULL COMMENT 'وضعیت مدیریت';
ALTER TABLE `user` ADD `flag_user` INT(1) NOT NULL COMMENT 'وضعیت کاربری';
ALTER TABLE `user` ADD `management_title` VARCHAR(255) NOT NULL COMMENT 'سمت مدیریت';

--spi--
