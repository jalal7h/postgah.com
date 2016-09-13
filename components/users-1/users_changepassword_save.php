<?

# jalal7h@gmail.com
# 2016/09/13
# 1.1

function users_changepassword_save(){
	
	if(! $user_id = user_logged() ){
		dg();
	
	} else if(! $rw = table("users", $user_id) ){
		dg();
	
	} else if( $rw['password']!=trim(strip_tags($_REQUEST['old_password'])) ){
		$text = "کلمه عبور به درستی وارد نشده است";
	
	} else if(! $password = trim($_REQUEST['password']) ){
		$text = "لطفا کلمه عبور خود را وارد کنید.";
	
	} else if(! is_password_secure_or_not($password) ){
		$text = "لطفا کلمه عبور خود را به درستی وارد کنید.";

	} else if(! dbs( 'users', ['password'=>hash_password_if_needed($password)], ['id'=>$user_id] ) ){
		dg();
	
	} else {
		
		#
		# sending email to client after save change password
		if( is_component('texty') ){
			$vars = table('users', $user_id);
			$vars['main_title'] = setting('main_title');
			echo texty( 'users_changepassword_save' , $vars );
		}
		
		return true;

	}

	echo convbox( $text );
	return false;

}



