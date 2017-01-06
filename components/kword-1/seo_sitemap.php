<?

# jalal7h@gmail.com
# 2017/01/06
# 1.2

$GLOBALS['seo_sitemap']['tags'] = array( 
	
	"query"		 =>	" SELECT * FROM `kword` WHERE 1 ORDER BY `id` ASC ",
	"link"		 =>	'kword_link($rw["kword"])',
	"freq"		 =>	"weekly",
	"prio"		 =>	"0.5",
	"cache_time" =>	"4days-9days",

);
	
