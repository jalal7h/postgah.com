<?

# jalal7h@gmail.com
# 2016/11/30
# 1.0

$GLOBALS['cmp']['ticketbox_mg'] = 'تیکت های پشتیبانی';
$GLOBALS['cmp-icon']['ticketbox_mg'] = '0e6';

function ticketbox_mg(){
	
	switch($_REQUEST['do']){
		case 'ticketbox_mg_save':
			ticketbox_mg_save();
			break;
	}

	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		"ticketbox_mg_waiting" => __("تیکت های منتظر پاسخ") ,
		"ticketbox_mg_archive" => __("آرشیو تیکت ها") ,
	);

	listmaker_tabmenu( $menu , $url );

}

