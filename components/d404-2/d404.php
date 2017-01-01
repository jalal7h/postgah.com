<?

# jalal7h@gmail.com
# 2017/01/01
# 1.3

$GLOBALS['do_action'][] = 'd404';

function d404(){

	// if( basename($_SERVER['REQUEST_URI']) != '404.php' ){
		// header("HTTP/1.1 301 Moved Permanently"); 
		// header('Location: '._URL."/404.php");
		// die();
	// }

	header("HTTP/1.0 404 Not Found");
	
	echo layout_open();
	echo template_engine( 'd404', $vars );
	echo layout_close();

	die();
}

