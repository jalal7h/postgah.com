<?

# jalal7h@gmail.com
# 2016/12/30
# 1.0

add_slug([

	'sitemap.xml' => './?do_action=seo_sitemap_mega' ,
	'sitemap/$-$.xml' => './?do_action=seo_sitemap&feed=$1&page=$2' ,
	'sitemap/$.xml' => './?do_action=seo_sitemap&feed=$1' ,

	'rss' => './?do_action=seo_rss_mega' ,
	'rss/$.xml' => './?do_action=seo_rss&feed=$1' ,

]);