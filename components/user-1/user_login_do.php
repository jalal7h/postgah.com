<?

# jalal7h@gmail.com
# 2016/12/07
# 1.7

function user_login_do(){

	$u = trim(stripcslashes(strip_tags($_REQUEST['username'])));
	$p = trim(stripcslashes(strip_tags($_REQUEST['password'])));

	if( user_logged() ){
		return e();
	
	} else if( $_REQUEST['do'] != "login_do" ){
		dg($u);
		header( "Location: ".layout_link(60) );
		die();
	
	} else if(! user_login_check( $u , $p ) ){
		$c.= __("%% یا کلمه عبور اشتباه است", [lmtc('user:username')]);
	
	} else if(! user_flag($u) ){
		$c.= __("حساب کاربری شما مسدود شده است.", [lmtc('user:username')]);		

	} else {
		
		user_login_session( table("user", $u, "id", "username") );
		
		if( $r = $_REQUEST['refer'] ){
			jsgo( $r );
		
		} else {
			jsgo( layout_link(14) );
		}
		
	}

	return $c;
}

function user_login_check( $username , $password ){
	
	if( is_component('userhashpassword') ){
		$password = userhashpassword($password);
	}

	if(! $rs = dbq(" SELECT COUNT(*) FROM `user` WHERE `username`='$username' AND `password`='$password' AND `permission`='0' LIMIT 1 ")){
		dg();
	
	} else if( dbr($rs,0,0) != 1 ){
		dg();

	} else {
		return true;
	}

	return false;
	
}


function user_logged(){
	
	if( $user_id = $_SESSION[ login_key()['uid'] ] ){
		return $user_id;
	
	} else {
		return false;
	}
	
}


function user_login_session( $user_id ){

	$_SESSION[ login_key()['uid'] ] = $user_id;

}
		
		






