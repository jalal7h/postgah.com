<?

function pgItem_viewCounter(){
	
	if(! $item_id = $_REQUEST['item_id'] ){
		e(__FUNCTION__,__LINE__);

	} else if( $GLOBALS[ 'pgItem_viewCounter_'.$item_id ] ){
		//

	} else if(! dbinc( 'item', $item_id, 'view' ) ){
		e(__FUNCTION__,__LINE__);

	} else {
		$GLOBALS[ 'pgItem_viewCounter_'.$item_id ] = true;
	}

}

