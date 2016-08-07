<?

function listmaker_uniqId( $id ){

	if(! $GLOBALS['listmaker_uniqId'] ){
		$GLOBALS['listmaker_uniqId'][] = $id;
		
	} else if(! in_array( $id, $GLOBALS['listmaker_uniqId'] ) ){
		$GLOBALS['listmaker_uniqId'][] = $id;
	
	} else while( 1 ) {
		
		$new_id = $id."_".++$n;
		
		if(! in_array( $new_id, $GLOBALS['listmaker_uniqId'] ) ){
			$id = $new_id;
			$GLOBALS['listmaker_uniqId'][] = $id;
			break;
		}
	}

	return $id;
}


