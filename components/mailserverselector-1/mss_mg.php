<?

# jalal7h@gmail.com
# 2017/01/22
# 1.1

add_setting('mss_mg','سرور های ایمیل');

function mss_mg(){
	
	listmaker_tabmenu([
	
		"mss_mg_server_list" => __("لیست سرور ها"),
		"mss_mg_client_list" => __("لیست کلاینت ها"),

	], _URL."/?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func'], 'func2' );

}




