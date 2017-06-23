<?

# jalal7h@gmail.com
# 2016/12/21
# 1.0

$GLOBALS['do_action'][] = 'layout_mg_this_layer_this_setflag';

function layout_mg_this_layer_this_setflag(){

	if(! admin_logged() ){
		dg();

	} else if(! listmaker_flag( 'page_layer' ) ){
		dg();
	
	} else {
		dg();
	}

}

