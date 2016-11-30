<?

# jalal7h@gmail.com
# 2016/11/30
# 1.1

$GLOBALS['do_action'][] = 'user_logout';
$GLOBALS['userpanel_item'][ 96 ] = [ 'user_logout', 'خروج', '08b' ];

function user_logout(){
	
	unset($_SESSION['uid']);
	jsgo('./');

}

