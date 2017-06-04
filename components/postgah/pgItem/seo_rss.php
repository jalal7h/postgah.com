<?

$GLOBALS['seo_rss']['item'] = array( 
	
	"query" => " SELECT `id`, `name`, `text`, `date_updated` as `date` FROM `item` WHERE `flag`='2' AND `expired`='0' ORDER BY `date_updated` DESC LIMIT 100 ",
	
	"link" => 'pgItem_link( $rw )'
	
);
	

