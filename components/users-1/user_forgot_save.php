<?

# jalal7h@gmail.com
# 2016/11/07
# 1.3

function user_forgot_save(){
	
	token_check();

	#
	# username
	if(! $username = trim(strip_tags( str_dec($_REQUEST['username']) )) ){
		ed();
	}

	#
	# password
	if(! $password = trim(strip_tags($_REQUEST['password'])) ){
		ed();
	}
	if( is_component('userhashpassword') ){
		$password = userhashpassword($password);
	}

	#
	# hash code
	$h = md5x($username."01q!", 20);
	
	if( $_REQUEST['h']!=$h ){
		e();
	
	} else if(! dbs('user', ['password'=>$password], ['username'=>$username]) ){
		e();
	
	} else {
		$_SESSION['uid'] = table("user", $username, "id", "username");
		
		if( is_component('texty') ){
			
			$vars = table( 'user', $_SESSION['uid'] );
			$vars['password'] = $raw_password;
			$vars['__AFTER__'] = '<br><a href="./userpanel">'.__('ورود به محیط کاربری').'</a>';
			echo texty( 'user_forgot_save', $vars );

		}

		return true;
	}

	die();
	
}

