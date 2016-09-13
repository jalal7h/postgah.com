<?

# jalal7h@gmail.com
# 2016/09/13
# 1.0

function hash_password_if_needed( $password ){
	
	if(! defined('hash_password') ){
		//

	} else if( hash_password != true ){
		//

	} else if(! function_exists('md5x') ) {
		return md5($password);

	} else {
		return md5x($password,20);
	}

	return $password;

}



