<?

function pgItem_user_remove(){
	
	if(! $user_id = user_logged() ){
		e();

	} else if(! $id = $_REQUEST['id'] ){
		e();
	
	} else if(! $rw_item = table('item', $id) ){
		e();
	
	} else if( $rw_item['user_id'] != $user_id ){
		e();

	} else if(! pgItem_remove( $_REQUEST['id'], $user_id ) ){
		e();

	} else {
		return true;
	}

	return false;
	
}


