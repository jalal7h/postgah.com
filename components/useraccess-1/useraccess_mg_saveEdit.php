<?

function useraccess_mg_saveEdit(){

	#
	# check variables
	if(! $users_id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);

	} else {

		#
		# set array
		$set_array = array( 'name','management_title','cell' );

		#
		# take care of password
		if( $password = trim($_REQUEST['password']) ){
			if( is_component('userhashpassword') ){
				$password = userhashpassword($password);
			}
			$set_array[] = 'password';
		}

		dbs( 'users', $set_array, ['id'] );

	}

	#
	# access list
	useraccess_mg_save__access_list( $users_id );

}

