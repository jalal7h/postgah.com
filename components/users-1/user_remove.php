<?

# jalal7h@gmail.com
# 2016/11/29
# 1.0

function user_remove( $user_id ){

	#
	# remove users record
	dbrm( 'user', $user_id, $recursive=true );

	return true;
	
}



