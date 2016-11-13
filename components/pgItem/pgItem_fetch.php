<?

# nxx put this function in all where its needed, or maybe do something like this on `table()`

function pgItem_fetch( $id=null, $refetch=false ){

	if(! $id ){
		if(! $id = intval($_REQUEST['item_id']) ){
			ed();
		}
	}

	if(! $refetch ){
		if( isset($GLOBALS[__FUNCTION__.$id]) ){
			return $GLOBALS[__FUNCTION__.$id];
		}
	}

	if(! $rw = table('item', $id) ){
		ed();
	
	} else {
		$rw = pgItem_fetch_process($rw);
		$GLOBALS[__FUNCTION__.$id] = $rw;
		return $rw;
	}

}


function pgItem_fetch_process( $rw ){

	$rw['name'] = kwordbanned_clear($rw['name']);
	$rw['text'] = kwordbanned_clear($rw['text']);

	# nxx

	return $rw;
	
}












