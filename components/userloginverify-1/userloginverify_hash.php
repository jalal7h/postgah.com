<?

# jalal7h@gmail.com
# 2017/02/28
# 1.0

function userloginverify_hash( $username ){

	return md5x( __FUNCTION__.$username, 8 );
	
}

