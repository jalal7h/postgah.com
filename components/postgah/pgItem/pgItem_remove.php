<?

function pgItem_remove( $id, $by, $silent=false ){

	if(! $rw = table('item', $id) ){
		e();

	} else if(! dbrm('item', $id) ){
		e();

	} else if(! $rs = dbq(" DELETE FROM `item_image` WHERE `item_id`='$id' ") ){
		e();
	
	} else {
		
		$rw['user_name'] = table('user', $rw['user_id'], 'name');

		if( $by == "admin" ){
			
			$vars['item_id'] = $rw['id'];
			$vars['item_name'] = $rw['name'];
			
			$prompt = texty( 'pgItem_remove_byAdmin', $vars, $rw['user_id'] );
			if(! $silent ){
				echo $prompt;
			}
			
		} else {
			
			$vars['item_id'] = $rw['id'];
			$vars['item_name'] = $rw['name'];
			
			$prompt = texty( 'pgItem_remove_byUser', $vars, 'user' );
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







