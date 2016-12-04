<?

# jalal7h@gmail.com
# 2016/12/03
# 1.2

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
		$_REQUEST['password'] = md5($_REQUEST['password']);
		
		#
		# edit
		if(  table('user', $username, null, 'username') ){
			echo convbox( __('از آدرس ایمیل مورد نظر شما قبلا استفاده شده است.') );
		
		#
		# new
		} else {

			#
			# remove the hidden record
			dbq(" DELETE FROM `user` WHERE `username`='$username' ", true );
			
			#
			# add new record
			$user_id = dbs( 'user', ['username','password','permission'=>'2','name','management_title','cell'] );

		}

		#
		# access list
		useraccess_mg_save__access_list( $user_id );

	}
	
}





