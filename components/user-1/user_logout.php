<?

# jalal7h@gmail.com
# 2016/12/03
# 1.2

$GLOBALS['do_action'][] = 'user_logout';
$GLOBALS['userpanel_item'][ 96 ] = [ 'user_logout', 'خروج', '08b' ];

function user_logout( $redirect_to='./' ){
	
	unset( $_SESSION[ login_key()['uid'] ] );
	
	if( $redirect_to !== null ){
		jsgo( $redirect_to );
	}
	
}

