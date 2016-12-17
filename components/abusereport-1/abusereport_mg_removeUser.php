<?

function abusereport_mg_removeUser(){


	# # # # #
	# texty 
	#

	if(! $foreign = $_REQUEST['user_id'] ){
		e();
		
	} else if(! $rw_user = table('user', $foreign) ){
		e();
		
	} else if(! $id = $_REQUEST['id'] ){
		e();
		
	} else if(! $rw_ar = table('abusereport', $id) ){
		e();
		
	} else if(! $rw_item = table( $rw_ar['table_name'], $rw_ar['table_id'] ) ){
		e();

	} else {
		
		$vars['bad_user_name'] = $rw_user['name'];

		$vars['item_id'] = $rw_item['id'];
		$vars['item_name'] = ( $rw_item['name'] ? $rw_item['name'] : sub_string($rw_item['text'],0,150) );
		
		if( $lmtc = lmtc($rw_ar['table_name']) ){
			$vars['item_title'] = $lmtc[0];

		} else {
			$vars['item_title'] = __('آیتم');
		}
		
		echo texty( 'abusereport_mg_removeUser', $vars, [ $rw_ar['user_id'] , $foreign ] );

	}

	# 
	# # # # #


	# remove
	abusereport_mg_remove_userItems( $silent=true );
	dbrm('abusereport');

	if(! $user_id = $_REQUEST['user_id'] ){
		e();

	} else if( function_exists('user_remove') ){
		user_remove($user_id);
	
	} else {
		dbrm( 'user', $user_id, true );
	}
	#

}


