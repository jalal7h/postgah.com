<?

$GLOBALS['seo_sitemap']['tags'] = array( 
	
	"query"	=>	" SELECT * FROM `kword` WHERE 1 ORDER BY `id` ASC ",
	"link"	=>	'"'._URL.'/tag/".trim($rw["kword"])',
	"freq"	=>	"weekly",
	"prio"	=>	"0.5",

);
	