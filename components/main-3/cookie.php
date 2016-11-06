<?

# jalal7h@gmail.com
# 2016/07/19
# 1.0

/*

# set cookie
cookie( 'some_cookie_name', 'some content' );

# get cookie
echo cookie( 'some_cookie_name' );

# set cookie for 10 days only [ default is 10 years ]
cookie( 'some_cookie_name', 'some another content', 10 );

*/

/*README*/

function cookie( $name, $value=null, $time=null ){

	#
	# time is not defined
	if(! $time ){
		$time = U() + 3600 * 24 * 365 * 10; // 10 years
	
	#
	# its days of time
	} else if( $time < U() ) {
		$time*= 3600 * 24;
		$time+= U();

	#
	# its timestamp + some number
	} else {
		// $time = $time;
	}


	if(! $value ){
		if(! isset($_COOKIE[ $name ]) ){
			return false;
		} else {
			return $_COOKIE[ $name ];
		}
	
	} else {
		setcookie( $name, $value, $time, "/" );
		return true;
	}

}





