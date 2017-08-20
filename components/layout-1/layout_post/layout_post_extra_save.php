<?php

# jalal7h@gmail.com
# 2017/08/20
# 1.0

function layout_post_extra_save( $rw_pagelayer ){

	$data = addslashes( $_REQUEST['data'] );
	$framed = intval($_REQUEST['framed']);
	
	if(! $type = $_REQUEST['type'] ){
		e();
	
	} else if(! dbs( 'page_layer', [ 'data'=>$data, 'framed'=>$framed, 'type' ], ['id'] ) ){
		e( dbe() );
		
	} else {
		return true;
	}
	
	return false;
	
}

