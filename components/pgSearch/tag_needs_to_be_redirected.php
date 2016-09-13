<?

if( $_REQUEST['tag_needs_to_be_redirected']==1 ){
	$GLOBALS['do_init'][] = 'tag_needs_to_be_redirected';
}

function tag_needs_to_be_redirected(){
	
	if( $_REQUEST['tag_needs_to_be_redirected']!=1 ){
		//

	} else if(! $q = trim($_REQUEST['q']) ){
		//

	} else {
		header('Content-Type: text/html; charset=utf-8');
		header("HTTP/1.1 301 Moved Permanently");
		header( "Location: "._URL."/tag/".$q );
		die();
	}
}

