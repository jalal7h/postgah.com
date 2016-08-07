<?

# jalal7h@gmail.com
# 2016/07/09
# Version 1.2


function users_login_do(){

	$u = trim(stripcslashes(strip_tags($_REQUEST['username'])));
	$p = trim(stripcslashes(strip_tags($_REQUEST['password'])));

	if( user_logged() ){
		e(__FUNCTION__.__LINE__);
		return true;
	
	} else if( $_REQUEST['do']!="login_do" ){
		e(__FUNCTION__.__LINE__);
		header("Location: ./login");
		die();
	
	} else if(! users_login_check( $u , $p ) ){
		$c.= "نام کاربری یا کلمه عبور اشتباه است";
	
	} else {
		
		$_SESSION['uid'] = table("users", $u, "id", "username");
		
		if( $r = $_REQUEST['refer'] ){
			echo "<script>location.href='$r';</script>";
		
		} else {
			echo "<script>location.href='./userpanel';</script>";
		}
		
		die();
	}

	return $c;
}

function users_login_check( $username , $password ){
	
	if( hash_password ){
		$password = md5x( $password, 20 );
	}

	if(! $rs = dbq(" SELECT COUNT(*) FROM `users` WHERE `username`='$username' AND `password`='$password' LIMIT 1 ")){
		e(__FUNCTION__.__LINE__);
	
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








