<?

# jalal7h@gmail.com
# 2016/11/30
# 1.0

$GLOBALS['cmp']['ticketbox_mg'] = 'پیام‌های پشتیبانی';
$GLOBALS['cmp-icon']['ticketbox_mg'] = '0e6';

function ticketbox_mg(){

	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		"ticketbox_mg_list" => __("لیست %%",[ lmtc('ticketbox')[1] ]) ,
		"ticketbox_mg_form" => __("%% جدید",[ lmtc('ticketbox')[0] ]) ,
		"cat_mg&l=ticketbox" => cat_detail('ticketbox')['name'],
	);

	listmaker_tabmenu( $menu , $url );

}

