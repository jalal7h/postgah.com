<?
$GLOBALS['cmp']['smsletter_mg'] = 'خبرنامه پیامکی';
$GLOBALS['cmp-icon']['smsletter_mg'] = '1d8';

function smsletter_mg(){

	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		__FUNCTION__."_send_form" => "ارسال پیامک",
		__FUNCTION__."_cellList" => "لیست شماره‌ها",
	);
	
	listmaker_tabmenu($menu,$url);

}

