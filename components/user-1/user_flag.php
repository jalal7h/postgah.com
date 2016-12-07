<?

# jalal7h@gmail.com
# 2016/12/07
# 1.0

# input : `user_id` or $rw_user or `username`

function user_flag( $input ){

	if( is_numeric($input) ){
		if(! $rw_user = table('user', $input) ){
			return false;
		}
	
	} else if( is_string($input) ){
		if(! $rw_user = table('user', $input, null, 'username') ){
			return false;
		}
	}

	if( $rw_user['flag'] == 1 ){
		return true;
	} else {
		return false;
	}

}




