<?

# jalal7h@gmail.com
# 2016/12/04
# 1.0

function is_adminUser( $admin_id=null ){

	if(! $admin_id ){
		if(! $admin_id = admin_logged() ){
			return false;
		}
	}
	
	if(! $rw = table('user', $admin_id) ){
		return e( $admin_id );

	} else if( $rw['permission'] != 2 ){
		return false;
	
	} else {
		return true;
	}
	
}







