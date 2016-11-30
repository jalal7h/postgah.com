<?

$GLOBALS['cmp']['smsletter_mg'] = 'خبرنامه پیامکی';
$GLOBALS['cmp-icon']['smsletter_mg'] = '1d8';

function smsletter_mg(){

	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		"smsletter_mg_send_form" => __("ارسال پیامک"),
		"smsletter_mg_cellList" => __("لیست شماره‌ها"),
	);
	
	listmaker_tabmenu($menu,$url);

}

