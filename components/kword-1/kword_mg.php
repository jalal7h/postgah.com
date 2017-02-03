<?

# jalal7h@gmail.com
# 2017/01/22
# 1.1

add_component( 'kword_mg', 'کلمات کلیدی', '292' );

function kword_mg(){
	
	listmaker_tabmenu([
	
		"kword_mg_list" => __("لیست کلمات"),
		"kword_mg_fileForm" => __("ثبت کلمه جدید"),

	], _URL."/?page=admin&cp=".$_REQUEST['cp'] );

}


















