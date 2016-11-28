<?

$GLOBALS['seo_sitemap'][] = array( 
	
	"query" => " SELECT *, `date_created` as `date` FROM `item` WHERE `flag`='2' ORDER BY `date_created` ASC ",
	
	"link" => 'pgItem_link( $rw )'
	
);
	
