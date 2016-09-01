<?

$GLOBALS['do_action'][] = "quick_resize";

function quick_resize(){
	multi_size_pic($_REQUEST['address'], $_REQUEST['width'], $_REQUEST['height']);
	die();
}



