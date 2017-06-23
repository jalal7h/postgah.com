<?

function layout_post_extra_save( $rw_pagelayer ){

	$data = mysql_real_escape_string( $_REQUEST['data'] );
	$framed = intval($_REQUEST['framed']);
	
	if(! $type = $_REQUEST['type'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbs( 'page_layer', [ 'data'=>$data, 'framed'=>$framed, 'type' ], ['id'] ) ){
		e(__FUNCTION__,__LINE__,dbe());
		
	} else {
		return true;
	}
	
	return false;
	
}

