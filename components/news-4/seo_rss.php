<?

$GLOBALS['seo_rss']['news'] = array( 
	
	"query" => " SELECT `id`, `name`, `text`, `date_created` as `date` FROM `news` WHERE 1 ORDER BY `date_created` DESC LIMIT 100 ",
	
	"link" => 'news_link( $rw )'
	
);
	

