<?

# jalal7h@gmail.com
# 2017/01/22
# 1.1

add_component( 'ticketbox_mg', 'پیام‌های پشتیبانی', '0e6' );

function ticketbox_mg(){
	
	listmaker_tabmenu([
	
		"ticketbox_mg_list" => __("لیست %%",[ lmtc('ticketbox')[1] ]) ,
		"ticketbox_mg_form" => __("%% جدید",[ lmtc('ticketbox')[0] ]) ,
		"cat_mg&l=ticketbox" => cat_detail('ticketbox')['name'],

	], _URL."/?page=admin&cp=".$_REQUEST['cp'] );

}


