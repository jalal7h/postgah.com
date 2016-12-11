
CREATE TABLE `bookmarky` (
  `id` int(11) NOT NULL,
  `table_name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `table_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

ALTER TABLE `bookmarky`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `bookmarky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--spi--
