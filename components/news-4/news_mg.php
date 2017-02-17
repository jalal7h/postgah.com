<?

# jalal7h@gmail.com
# 2017/02/14
# 1.2

add_component( 'news_mg', 'اخبار سایت', '1ea' );

function news_mg(){
	
	listmaker_tabmenu([
	
		"news_mg_list" => __("لیست خبرها"),
		"news_mg_form" => __("ثبت خبر جدید"),
		"cat_mg&l=news" => cat_detail('news')['name'],

	], _URL."/?page=admin&cp=".$_REQUEST['cp'] );

}


