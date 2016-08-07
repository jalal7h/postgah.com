<?

$GLOBALS['seo_sitemap'][] = array( 
	"query" => " SELECT *,UNIX_TIMESTAMP() as `date` FROM `page` WHERE 1 ORDER BY `id` ASC ",
	"link" => '_URL."/?page=".$rw["id"]'
);


	

