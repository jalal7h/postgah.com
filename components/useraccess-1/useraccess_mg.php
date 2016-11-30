<?

$GLOBALS['cmp']['useraccess_mg'] = 'مدیران';
$GLOBALS['cmp-icon']['useraccess_mg'] = '0f0';

function useraccess_mg(){
	
	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		"useraccess_mg_list" => __("لیست مدیران"),
		"useraccess_mg_form" => __("ثبت مدیر جدید"),
	);

	listmaker_tabmenu( $menu, $url );

}


