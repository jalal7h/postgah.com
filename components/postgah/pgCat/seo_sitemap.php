<?

$GLOBALS['seo_sitemap']['category'] = array( 
	
	"query" => " SELECT * FROM `cat` WHERE `cat`='adsCat' AND `flag`='1' ORDER BY `id` ASC ",
	"link" => 'pgCat_link( $rw )'

);
	
