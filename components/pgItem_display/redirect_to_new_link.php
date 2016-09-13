<?

$GLOBALS['do_init'][] = 'item_needs_to_be_redirected';

function item_needs_to_be_redirected(){
	
	if( $_REQUEST['item_needs_to_be_redirected']!=1 ){
		//

	} else if(! $item_id = $_REQUEST['item_id'] ){
		//

	} else if(! $rw = table('item', $item_id) ){
		//

	} else {
		$link = pgItem_link( $rw );
		header("HTTP/1.1 301 Moved Permanently");
		header( "Location: ".$link );
		die();
	}

}

