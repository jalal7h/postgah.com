<?

function user_isActive( $user_id ){

	if(! $rw_user = table('user', $user_id) ){
		return false;

	} else if( $rw_user['flag'] != 1 ){
		return false;

	} else {
		return $rw_user;
	}

}