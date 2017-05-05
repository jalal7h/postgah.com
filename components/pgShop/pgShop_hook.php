<?php

# jalal7h@gmail.com
# 2017/05/04
# 1.0

if( !$_REQUEST['page'] and $_SERVER['SERVER_NAME'] == 'localhost' ){
	
	$_REQUEST['page'] = 171;
	$_GET['page'] = 171;
	
	// define( '_SHOP_PATH', 'hpe.'._DOMAIN );
	define( '_SHOP_PATH', 'hpe.postgah.com' );

}
