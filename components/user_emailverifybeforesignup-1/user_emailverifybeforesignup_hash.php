<?

# jalal7h@gmail.com
# 2016/09/26
# 1.0

function user_emailverifybeforesignup_hash( $e ){

	return md5x( __FUNCTION__.$e, 12 );
	
}

