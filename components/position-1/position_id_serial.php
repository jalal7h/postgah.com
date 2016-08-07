<?

function position_id_serial( $id ){

	#
	# get the pos type upper
	if(! sizeof($GLOBALS['position-default']) ){
		e(__FUNCTION__,__LINE__);

	} else for( $i=sizeof($GLOBALS['position-default']); $i>1; $i-- ){
		
		$pos_info = $GLOBALS['position-default'][$i];
		
		if( $pos_info['default']!=null ){
			$pos_type_uppers[] = $pos_info['id'];
		
		} else if(! $pos_info['id'] ){
		
		} else {
			$pos_type = $pos_info['id'];
			break;
		}

	}

	while( 1 ){

		if( $id==0 ){

		} else if(! $rs = dbq(" SELECT * FROM `position` WHERE `id`='$id' LIMIT 1 ") ){
			e(__FUNCTION__,__LINE__,dbe());

		} else if(! dbn($rs) ){
			e(__FUNCTION__,__LINE__);
		
		} else if(! $rw = dbf($rs) ){
			e(__FUNCTION__,__LINE__);

		} else if( sizeof($pos_type_uppers) and in_array( $rw['type'], $pos_type_uppers ) ){
			// e(__FUNCTION__,__LINE__);

		} else {
			
			#
			# accept this one
			$serial[] = $id;
			
			#
			# replace it with its child
			$id = $rw['parent'];

			#
			continue;
		}

		break;
	}

	return $serial;
}
