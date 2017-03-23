<?

# jalal7h@gmail.com
# 2016/12/17
# 1.4

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

	#
	# hash code
	$h = md5x($username."01q!", 20);
	
	if( $_REQUEST['h'] != $h ){
		e();
	
	} else if(! dbs('user', [ 'password'=> ( is_component('userhashpassword') ? userhashpassword($password) : $password )  ], [ 'username'=>$username ] ) ){
		e();
	
	} else {

		# login
		$user_id = table("user", $username, "id", "username");
		user_login_session( $user_id );
		
		# texty
		$vars['user_new_password'] = $password;
		$vars['__AFTER__'] = '<br><a href="'.layout_link(14).'">'.__('ورود به محیط کاربری').'</a>';
		echo texty( 'user_forgot_save', $vars );

		return true;

	}

	die();
	
}

