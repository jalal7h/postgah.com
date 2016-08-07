<?
$GLOBALS['cmp']['useraccess_mg'] = 'مدیران';
$GLOBALS['cmp-icon']['useraccess_mg'] = '0f0';

function useraccess_mg(){
	
	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		__FUNCTION__."_list" => "لیست مدیران",
		__FUNCTION__."_form" => "ثبت مدیر جدید",
	);

	listmaker_tabmenu( $menu, $url );

}


