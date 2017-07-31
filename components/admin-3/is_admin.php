<?php

# jalal7h@gmail.com
# 2017/06/16
# 1.1

# are we in admin page?

function is_admin(){

	if(! admin_logged() ){
		return false;
	
	} else if( 
	($_REQUEST['page'] == 'admin') or 
	( strstr( $_SERVER['HTTP_REFERER'], '/admin/' ) or strstr( $_SERVER['HTTP_REFERER'], 'page=admin' ) ) ){
		return true;
	
	} else {
		return false;
	}
	
}







