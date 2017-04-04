<?

# jalal7h@gmail.com
# 2017/04/02
# 1.7

add_action('admin_login');

function admin_login(){

	recaptcha_check();

	$fc2 = $_POST[ login_key()['fc2'] ];
	$fc2 = intval( $fc2 );
	
	if(! defined('__FC') ){
		dg();
		$code = "no_fc2_defined";

	} else if( $fc2 != __FC ){
		dg();
		$code = "invalid_fc2";
		
	} else if(! $user_id = admin_check() ){
		dg();
		$code = "invalid_auth";

	} else {
		$_SESSION[ login_key()['admin_uid'] ] = $user_id;
		header('Location: '._URL.'/admin');
		die();
	}

	header('Location: ./?page=admin&code='.$code);
	die();

}


function admin_check(){

	if(! $email = $_POST[ login_key()['email'] ] ){
		ed();

	} else if(! $password = $_POST[ login_key()['password'] ] ){
		ed();
	}

	$email = mysql_real_escape_string($email);
	$password = mysql_real_escape_string($password);

	if(! $email = trim($email) ){
		dg();

	} else if(! $password = trim($password) ){
		dg();

	} else if(! $rw_user = table('user', $email, null, 'email') ){
		dg();

	} else if( $rw_user['permission'] != 2 ){
		dg();		

	} else {
		
		$the_password = $rw_user['password'];
		$pass_name = login_key()['password'];
		
		$the_md5 = $pass_name . $the_password;
		$the_md5 = md5( $the_md5 );

		if( $the_md5 == $password ){
			return $rw_user['id'];
			
		} else {
			dg();
		}

	}

	return false;
	
}


function login_key(){
	
	foreach( [ 'uid', 'username', 'email', 'password', 'fc2', 'admin_uid' ] as $i => $key ){
		$c[ $key ] = md5x( $key . session_id(), 30, true, true);
	}
	
	return $c;

}


function admin_logged(){
	
	if( $user_id = $_SESSION[ login_key()['admin_uid'] ] ){
		return $user_id;
	
	} else {
		return false;
	}

}


function admin_free(){
	
	if( defined('mysql_password') and mysql_password == '' ){
		$_SESSION[ login_key()['admin_uid'] ] = 1;
		jsgo( _URL.'/admin' );
		die();
	}

}







