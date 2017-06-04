<?

# jalal7h@gmail.com
# 2017/06/04
# 1.1

add_slug([

	'sitemap.xml' => './?do_action=seo_sitemap_mega' ,
	'sitemap/$-$.xml' => './?do_action=seo_sitemap&feed=$1&p=$2' ,
	'sitemap/$.xml' => './?do_action=seo_sitemap&feed=$1' ,

	'rss' => './?do_action=seo_rss_mega' ,
	'rss/$.xml' => './?do_action=seo_rss&feed=$1' ,

	'robots.txt' => './?do_action=seo_robots' ,


]);
