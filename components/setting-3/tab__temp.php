<?


function tab__temp($key='', $insert=false, $val=NULL){

	if( (!$val) and $insert ){
		$val = $insert;
	}

	return setting( $key, $val );
	
}


