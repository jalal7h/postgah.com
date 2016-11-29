<?

function pgItem_remove( $id, $by, $silent=false ){

	if(! $rw = table('item', $id) ){
		e();

	} else if(! dbrm('item', $id) ){
		e();

	} else if(! $rs = dbq(" DELETE FROM `item_image` WHERE `item_id`='$id' ") ){
		e();
	
	} else {
		
		$rw['user_name'] = table('users', $rw['user_id'], 'name');

		if( $by == "admin" ){
			$prompt = texty( 'pgItem_remove_byAdmin', $rw, $rw['user_id'] );
			if(! $silent ){
				echo $prompt;
			}
			
		} else {
			$prompt = texty( 'pgItem_remove_byUser', $rw );
			if(! $silent ){
				echo $prompt;
			}
		}
		
		return true;

	}

	return false;

}


# 
# only for abusereport component
function item_remove( $item_id ){
	return pgItem_remove( $item_id, $by="admin", true );
}







