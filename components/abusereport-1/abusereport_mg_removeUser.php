<?

function abusereport_mg_removeUser(){

	abusereport_mg_remove_userItems();
	dbrm('abusereport');

	if(! $user_id = $_REQUEST['user_id'] ){
		e();

	} else if( function_exists('user_remove') ){
		user_remove($user_id);
	
	} else {
		dbrm( 'user', $user_id, true );
	}

}


