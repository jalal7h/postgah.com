<?

# jalal7h@gmail.com
# 2016/09/17
# 1.1

$GLOBALS['do_action'][] = '_404';

function _404(){

	if( basename($_SERVER['REQUEST_URI']) != '404.php' ){
		header("HTTP/1.1 301 Moved Permanently"); 
		header('Location: '._URL."/404.php");
		die();
	}

	header("HTTP/1.0 404 Not Found");
	
	echo layout_open();
	echo template_engine( '_404', $vars );
	echo layout_close();

	die();
}

