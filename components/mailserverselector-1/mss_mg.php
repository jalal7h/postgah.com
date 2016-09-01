<?

# jalal7h@gmail.com
# 2016/08/28
# 1.0

// $GLOBALS['cmp']['mss_mg'] = 'سرور های ایمیل';
$GLOBALS['setting']['mss_mg'] = 'سرور های ایمیل';

function mss_mg(){
	
	$url = "./?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func'];
	$menu = array(
		__FUNCTION__."_server_list" => "لیست سرور ها",
		__FUNCTION__."_client_list" => "لیست کلاینت ها",
	);

	listmaker_tabmenu( $menu, $url, "func2" );

}


