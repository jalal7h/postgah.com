<?

# jalal7h@gmail.com
# 2016/11/12
# 1.5

function user_login_do(){

	$u = trim(stripcslashes(strip_tags($_REQUEST['username'])));
	$p = trim(stripcslashes(strip_tags($_REQUEST['password'])));

	if( user_logged() ){
		return e();
	
	} else if( $_REQUEST['do'] != "login_do" ){
		dg($u);
		header("Location: ./login");
		die();
	
	} else if(! user_login_check( $u , $p ) ){
		$c.= __("%% یا کلمه عبور اشتباه است", [lmtc('user:username')]);
	
	} else {
		
		$_SESSION['uid'] = table("user", $u, "id", "username");
		
		if( $r = $_REQUEST['refer'] ){
			jsgo( $r );
		
		} else {
			jsgo( './userpanel' );
		}
		
	}

	return $c;
}

function user_login_check( $username , $password ){
	
	if( is_component('userhashpassword') ){
		$password = userhashpassword($password);
	}

	if(! $rs = dbq(" SELECT COUNT(*) FROM `user` WHERE `username`='$username' AND `password`='$password' LIMIT 1 ")){
		dg();
	
	} else if( dbr($rs,0,0)!=1 ){
		//

	} else {
		return true;
	}

	return false;
	
}

function user_logged(){
	
	if( $user_id = $_SESSION['uid'] ){
		return $user_id;
	
	} else {
		return false;
	}
	
}








