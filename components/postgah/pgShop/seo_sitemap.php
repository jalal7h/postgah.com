<?php

# jalal7h@gmail.com
# 2017/06/03
# 1.0

$GLOBALS['seo_sitemap']['shop'] = array( 
	"query" => " SELECT *, `date_created` as `date` FROM `shop` WHERE `flag`='1' ORDER BY `date_created` ASC ",
	"link" => 'pgShop_link( $rw )'
);
	
