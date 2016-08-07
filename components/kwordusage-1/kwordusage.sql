
CREATE TABLE `kwordusage` (
  `id` int(11) NOT NULL,
  `table_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_id` int(11) NOT NULL,
  `kword_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `kwordusage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_name` (`table_name`,`table_id`,`kword_id`);


ALTER TABLE `kwordusage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

  
--spi--
