<?

# jalal7h@gmail.com
# 2016/12/21
# 1.0

$GLOBALS['do_action'][] = 'layout_mg_this_layer_this_remove';

function layout_mg_this_layer_this_remove(){

	if(! admin_logged() ){
		dg();

	} else if(! dbrm( 'page_layer' ) ){
		dg();
	
	} else {
		dg();
	}

}

