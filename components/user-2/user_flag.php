<?

# jalal7h@gmail.com
# 2016/12/28
# 1.1

function user_flag( $user_id ){

	if(! $rw_user = table('user', $user_id) ){
		return false;

	} else if( $rw_user['flag'] != 1 ){
		return false;
	
	} else {
		return true;
	}

}




