<?

# jalal7h@gmail.com
# 2016/09/17
# 1.0

function user_is_online( $user_id ){
	
	$uio_date = table('user',$user_id,'uio_date');

	if( $uio_date + 60 < U() ){
		return false;

	} else {
		return true;
	}

}


