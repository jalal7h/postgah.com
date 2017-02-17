<?

# jalal7h@gmail.com
# 2016/12/04
# 1.0

function is_admin(){

	if(! admin_logged() ){
		return false;
	
	} else if( $_REQUEST['page'] != 'admin' ){
		return false;
	
	} else {
		return true;
	}
	
}







