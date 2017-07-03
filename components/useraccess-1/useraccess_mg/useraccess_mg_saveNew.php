<?

# jalal7h@gmail.com
# 2016/12/03
# 1.2

function useraccess_mg_saveNew(){

	#
	# check variables
	if(! $email = $_REQUEST['email'] ){
		dg();
	
	} else if(! $password = $_REQUEST['password'] ){
		dg();
	
	} else {
		
		#
		# prepare the password
		$_REQUEST['password'] = md5($_REQUEST['password']);
		
		#
		# edit
		if(  table('user', $email, null, 'email') ){
			echo convbox( __('از آدرس ایمیل مورد نظر شما قبلا استفاده شده است.') );
		
		#
		# new
		} else {

			#
			# remove the hidden record
			dbq(" DELETE FROM `user` WHERE `email`='$email' ", true );
			
			#
			# add new record
			if(! $user_id = dbs( 'user', ['email','password','permission'=>'2','name','useraccess_title','cell','flag'=>1] ) ){
				ed( dbe() );
			}

		}

		#
		# access list
		useraccess_mg_save__access_list( $user_id );

	}
	
}





