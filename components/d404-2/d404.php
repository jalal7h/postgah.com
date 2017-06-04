<?

# jalal7h@gmail.com
# 2017/04/29
# 1.5

// $GLOBALS['do_action'][] = 'd404';

function d404(){

	#
	# redirect if its in middle of html or not.
	if( ob_get_contents() != '' ){
		redirect( _URL . '/404.php' );
	}
	

	define( 'd404_flag' , true );

	if( sizeof($_REQUEST) ){
		foreach( $_REQUEST as $key => $value ){
			if( in_array( $key , $GLOBALS['query_string_ignore'] ) ){
				continue;
			} else {
				unset( $_REQUEST[$key] );
				unset( $_GET[$key] );
				unset( $_POST[$key] );
			}
		}
	}

	header("HTTP/1.0 404 Not Found");
	echo layout_open();
	echo template_engine( 'd404', $vars );
	echo layout_close();

	die();
}

