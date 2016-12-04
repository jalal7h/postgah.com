<?

# jalal7h@gmail.com
# 2016/12/04
# 1.0

function is_adminUser( $user_id ){

	if(! $rw = table('user', $user_id) ){
		return e();

	} else if( $rw['permission'] != 2 ){
		return false;
	
	} else {
		return true;
	}
	
}







