
INSERT INTO `page` (`id`, `name`) VALUES (51, 'اخبار سایت');
INSERT INTO `page_layer` (`id`, `page_id`, `prio`, `func`, `type`, `name`, `data`, `framed`, `flag`) VALUES (51, 51, 1, 'news_list', '', 'اخبار سایت', '', 1, 1);

INSERT INTO `page` (`id`, `name`, `meta_title`, `meta_kw`, `meta_desc`) VALUES 
(52, 'نمایش خبر', '<?\r\necho news_meta( "title" );\r\n?>', '<?\r\necho news_meta( "kw" );\r\n?>', '<?\r\necho news_meta( "desc" );\r\n?>');
INSERT INTO `page_layer` (`id`, `page_id`, `prio`, `func`, `type`, `name`, `data`, `framed`, `flag`) VALUES (52, 52, 1, 'news_display', '', 'نمایش خبر', '', 1, 1);


--spi--
