<?

$GLOBALS['seo_sitemap']['shop'] = array( 
	
	"query" => " SELECT * FROM `shop` WHERE `flag`='1' ORDER BY `id` ASC ",
	"link" => '"http://".$rw["path"]'

);
	
