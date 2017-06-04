
CREATE TABLE `kwordbanned` (
  `id` int(11) NOT NULL,
  `kword` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'کلمه'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `kwordbanned`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kword` (`kword`);

ALTER TABLE `kwordbanned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--spi--
