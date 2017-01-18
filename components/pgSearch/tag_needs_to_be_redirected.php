<?

# jalal7h@gmail.com
# 2017/01/14
# 1.0

add_init( function(){
	
	if( $_REQUEST['tag_needs_to_be_redirected'] != 1 ){
		//

	} else if(! $q = trim($_REQUEST['q']) ){
		//

	} else {
		header( 'Content-Type: text/html; charset=utf-8' );
		header( 'HTTP/1.1 301 Moved Permanently' );
		header( 'Location: '._URL.'/tag/'.$q );
		die();
	}

});

