
ALTER TABLE `user` ADD `email_verified` INT(1) NOT NULL AFTER `email`;
ALTER TABLE `user` ADD `cell_verified` INT(1) NOT NULL AFTER `cell`;

--spi--
