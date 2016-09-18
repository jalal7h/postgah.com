<?

# jalal7h@gmail.com
# 2016/07/09
# 1.2

function users_forgot_save(){
	
	token_check();

	#
	# username
	if(! $username = trim(strip_tags($_REQUEST['username'])) ){
		ed(__FUNCTION__,__LINE__);
	}

	#
	# password
	if(! $password = trim(strip_tags($_REQUEST['password'])) ){
		ed(__FUNCTION__,__LINE__);
	}
	if( is_component('userhashpassword') ){
		$password = userhashpassword($password);
	}

	#
	# hash code
	$h = md5x($username."01q!", 20);
	
	if( $_REQUEST['h']!=$h ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbq(" UPDATE `users` SET `password`='$password' WHERE `username`='$username' LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__);
	
	} else {
		$_SESSION['uid'] = table("users", $username, "id", "username");
		
		if( is_component('texty') ){
			
			$vars = table( 'users', $_SESSION['uid'] );
			$vars['password'] = $raw_password;
			
			echo texty( 'users_forgot_save', $vars );

		}

		return true;
	}

	die();
}

