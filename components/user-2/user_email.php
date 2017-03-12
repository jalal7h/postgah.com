<?

# jalal7h@gmail.com
# 2017/03/05
# 1.01

# i [ "email@address.com", 11, $rw_user ]

function user_email( $i ){

	if(! $i ){
		return false;
	
	#
	# 11
	} else if( is_numeric($i) ){
		$user_id = $i;
		if(! $rw_user = table('user', $user_id) ){
			e();
		} else {
			$email = $rw_user['email'];
		}

	# 
	# $rw_user
	} else if( is_array($i) ){
		$rw_user = $i;
		$email = $rw_user['email'];

	#
	# email@address.com
	} else if( is_string($i) ){
		$email = $i;
	}

	#
	# verify
	return is_email_correct_or_not($email);

}




