<?

# jalal7h@gmail.com
# 2017/04/14
# 1.0

# i [ "email@address.com", 11, $rw_user ]

function user_name( $i ){

	if(! $i ){
		return false;
	
	#
	# 11
	} else if( is_numeric($i) ){
		$user_id = $i;
		if(! $rw_user = table('user', $user_id) ){
			e();
		} else {
			$name = $rw_user['name'];
		}

	# 
	# $rw_user
	} else if( is_array($i) ){
		$rw_user = $i;
		$name = $rw_user['name'];

	#
	# email@address.com
	} else if( is_string($i) ){
		$name = $i;
	}

	#
	# verify
	return is_name_correct_or_not($name);

}




