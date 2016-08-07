<?

function useraccess_mg_saveNew(){

	#
	# check variables
	if(! $username = $_REQUEST['username'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! $password = $_REQUEST['password'] ){
		e(__FUNCTION__,__LINE__);
	
	} else {
		
		#
		# prepare the password
		if( is_component('userhashpassword') ){
			$_REQUEST['password'] = userhashpassword($_REQUEST['password']);
		}

		#
		# edit
		if( $rw = table('users', $username, 'username') ){
			$users_id = dbs( 'users', ['password','permission'=>'2','name','management_title','cell','flag_admin'=>'1','flag_user'=>'1'], ['username'] );

		#
		# new
		} else {
			$users_id = dbs( 'users', ['username','password','permission'=>'2','name','management_title','cell','flag_admin'=>'1','flag_user'=>'1','register_date'=>U()] );
		}

		#
		# access list
		useraccess_mg_save__access_list( $users_id );

	}
	
}

