<?

function pgItem_remove( $id, $by ){

	if(! $rw = table('item', $id) ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbrm('item', $id) ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rs = dbq(" DELETE FROM `item_image` WHERE `item_id`='$id' ") ){
		e(__FUNCTION__,__LINE__);
	
	} else {

		$rw['user_name'] = table('users', $rw['user_id'], 'name');

		if( $by=="admin" ){
			echo texty( 'pgItem_remove_byAdmin', $rw, $rw['user_id'] );
			
		} else {
			echo texty( 'pgItem_remove_byUser', $rw );
		}
		
		return true;
	}

	return false;
}

