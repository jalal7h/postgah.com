<?

# jalal7h@gmail.com
# 2017/01/22
# 1.0

add_component( 'nl_mg', 'خبرنامه', '298' );

function nl_mg(){
	
	listmaker_tabmenu([
	
		"nl_mg_send_form" => __("ارسال خبرنامه"),
		"nl_mg_emailList" => __("لیست ایمیل ها"),

	], _URL."/?page=admin&cp=".$_REQUEST['cp'] );

}

