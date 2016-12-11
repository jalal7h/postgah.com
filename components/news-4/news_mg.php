<?

# jalal7h@gmail.com
# 2016/11/17
# 1.0

$GLOBALS['cmp']['news_mg'] = 'مدیریت خبرها';
$GLOBALS['cmp-icon']['news_mg'] = '1ea';

function news_mg(){
	
	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		"news_mg_list" => __("لیست خبرها"),
		"news_mg_form" => __("ثبت خبر جدید"),
		"cat_mg&l=news" => cat_detail('news')['name'],
	);
	
	listmaker_tabmenu($menu,$url);

}


