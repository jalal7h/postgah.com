<?

function abusereport_mg_removeUser(){

	abusereport_mg_remove_userItems();
	dbrm('abusereport');

	if(! $user_id = $_REQUEST['user_id'] ){
		e();

	} else if( function_exists('users_remove') ){
		users_remove($user_id);
	
	} else {
		dbrm( 'users', $user_id );
	}

}


