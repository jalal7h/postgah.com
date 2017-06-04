<?php

# jalal7h@gmail.com
# 2017/01/03
# 1.0

$GLOBALS['seo_sitemap']['page'] = array( 

	"query" => " SELECT * FROM `page` WHERE `id`>1 AND `ignore_in_sitemap`=0 ORDER BY `id` ASC ",
	"link" => 'layout_link( $rw )'

);


	

