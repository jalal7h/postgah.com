<?

# jalal7h@gmail.com
# 2017/03/05
# 1.1

function is_password_secure_or_not( $p ){
	
	if( mb_strlen($p) < 8 ){
		return false;
	
	#
	# only characters
	} else if( var_control( $p, 'a-zA-Z') == $p ){
		return false;

	#
	# only numbers
	} else if( var_control( $p, '0-9') == $p ){
		return false;
	
	} else {
		return true;
	}

}




