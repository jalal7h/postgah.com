<?

# jalal7h@gmail.com
# 2016/11/07
# 1.0

function is_master(){

	if(! $admin_id = admin_logged() ){
		return false;
	
	} else if( $admin_id != 1 ){
		return false;
	
	} else {
		return true;
	}
	
}







