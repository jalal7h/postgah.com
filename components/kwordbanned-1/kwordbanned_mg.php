<?

# jalal7h@gmail.com
# 2017/01/22
# 1.1

add_component( 'kwordbanned_mg', 'فیلترینگ', '0b0' );

function kwordbanned_mg(){
	
	listmaker_tabmenu([
	
		"kwordbanned_mg_list" => __("لیست کلمات"),
		"kwordbanned_mg_form" => __("فیلتر کلمه جدید"),
	
	], _URL."/?page=admin&cp=".$_REQUEST['cp'] );

}





