<?

# jalal7h@gmail.com
# 2017/01/22
# 1.0

add_component( 'smsletter_mg', 'خبرنامه پیامکی', '1d8' );

function smsletter_mg(){

	listmaker_tabmenu([
	
		"smsletter_mg_send_form" => __("ارسال پیامک"),
		"smsletter_mg_cellList" => __("لیست شماره‌ها"),

	], _URL."/?page=admin&cp=".$_REQUEST['cp'] );

}

