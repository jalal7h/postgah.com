<?

function useraccess_mg_save__access_list( $users_id ){

	dbq(" DELETE FROM `useraccess` WHERE `users_id`='$users_id' ");
	
	if( sizeof($_REQUEST['access_list']) ){
		
		foreach ($_REQUEST['access_list'] as $i => $component_func) {
			dbs( 'useraccess', ['users_id'=>$users_id,'component'=>$component_func] );
		}

	}
	
}


