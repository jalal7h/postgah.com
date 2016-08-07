<?

function pgItem_user_remove(){
	
	if(! $user_id = user_logged() ){
		e(__FUNCTION__,__LINE__);

	} else if(! $id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! $rw_item = table('item', $id) ){
		e(__FUNCTION__,__LINE__);
	
	} else if( $rw_item['userid']!=$user_id ){
		e(__FUNCTION__,__LINE__);

	} else if(! pgItem_remove( $_REQUEST['id'], $user_id ) ){
		e(__FUNCTION__,__LINE__);

	} else {
		return true;
	}

	return false;
	
}