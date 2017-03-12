<?

# jalal7h@gmail.com
# 2017/01/10
# 1.3

add_action( 'user_logout' );
add_userpanel_item( 'user_logout', 'logout', 'خروج', '08b', 96 );

function user_logout( $redirect_to=_URL ){
	
	unset( $_SESSION[ login_key()['uid'] ] );
	
	if( $redirect_to !== null ){
		jsgo( $redirect_to );
	}
	
}

