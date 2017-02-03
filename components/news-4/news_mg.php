<?

# jalal7h@gmail.com
# 2017/01/22
# 1.1

function news_mg(){
	
	listmaker_tabmenu([
	
		"news_mg_list" => __("لیست خبرها"),
		"news_mg_form" => __("ثبت خبر جدید"),
		"cat_mg&l=news" => cat_detail('news')['name'],

	], _URL."/?page=admin&cp=".$_REQUEST['cp'] );

}


