<?

# jalal7h@gmail.com
# 2016/12/19
# 1.1

function is_master( $admin_id=null ){

	if(! $admin_id ){
		if(! $admin_id = admin_logged() ){
			return false;
		}
	}

	if( $admin_id != 1 ){
		return false;
	
	} else {
		return true;
	}
	
}







