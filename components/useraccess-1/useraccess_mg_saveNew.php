<?

# jalal7h@gmail.com
# 2016/09/17
# 1.1

function useraccess_mg_saveNew(){

	#
	# check variables
	if(! $username = $_REQUEST['username'] ){
		dg();
	
	} else if(! $password = $_REQUEST['password'] ){
		dg();
	
	} else {
		
		#
		# prepare the password
		if( is_component('userhashpassword') ){
			$_REQUEST['password'] = userhashpassword($_REQUEST['password']);
		}
		
		#
		# edit
		if( $rw = table('user', $username, null, 'username') ){
			$user_id = dbs( 'user', ['password','permission'=>'2','name','management_title','cell','flag_admin'=>'1','flag_user'=>'1'], ['username'] );
		
		#
		# new
		} else {
			$user_id = dbs( 'user', ['username','password','permission'=>'2','name','management_title','cell','flag_admin'=>'1','flag_user'=>'1'] );
		}

		#
		# access list
		useraccess_mg_save__access_list( $user_id );

	}
	
}





