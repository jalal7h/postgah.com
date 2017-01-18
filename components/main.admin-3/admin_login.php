<?

# jalal7h@gmail.com
# 2017/01/01
# 1.4

$GLOBALS['do_action'][] = 'admin_login';

function admin_login(){

	$fc2 = $_POST[ login_key()['fc2'] ];
	$fc2 = intval( $fc2 );
	
	$captcha_name = "admin-login";
	$captcha_code = $_POST[ login_key()['captcha'] ];

	if(! defined('__FC') ){
		dg();
		$code = "no_fc2_defined";

	} else if( $fc2 != __FC ){
		dg();
		$code = "invalid_fc2";
	
	} else if(! captcha_check( $captcha_name , $captcha_code ) ){
		dg();
		$code = "wrong_captcha";

	} else if(! $user_id = admin_check() ){
		dg();
		$code = "invalid_auth";

	} else {
		$_SESSION[ login_key()['username'] ] = $user_id;
		header('Location: '._URL.'/admin');
		die();
	}

	header('Location: ./?page=admin&code='.$code);
	die();

}


function admin_check(){

	if(! $username = $_POST[ login_key()['username'] ] ){
		ed();

	} else if(! $password = $_POST[ login_key()['password'] ] ){
		ed();
	}

	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	if(! $username = trim($username) ){
		dg();

	} else if(! $password = trim($password) ){
		dg();

	} else if(! $rw_user = table('user', $username, null, 'username') ){
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
	
	foreach( [ 'uid', 'username', 'password', 'fc2', 'captcha' ] as $i => $key ){
		$c[ $key ] = md5x( $key . session_id(), 30, true, true);
	}

	return $c;

}


function admin_logged(){
	
	if( $user_id = $_SESSION[ login_key()['username'] ] ){
		return $user_id;
	
	} else {
		return false;
	}

}


function admin_free(){
	
	if( defined('mysql_password') and mysql_password == '' ){
		$_SESSION[ login_key()['username'] ] = 1;
		jsgo( _URL.'/admin' );
		die();
	}

}







