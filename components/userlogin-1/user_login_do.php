<?

# jalal7h@gmail.com
# 2016/12/28
# 1.8

function user_login_do(){
	
	token_check();
	
	$u = trim(stripcslashes(strip_tags($_REQUEST['username'])));
	$p = trim(stripcslashes(strip_tags($_REQUEST['password'])));
	
	if( user_logged() ){
		return e();
	
	} else if( $_REQUEST['do'] != "login_do" ){
		header( "Location: ".layout_link(60) );
		die();
	
	} else if(! $user_id = user_login_check( $u , $p ) ){
		$c.= __("نام کاربری یا کلمه عبور شما اشتباه وارد شده است");
	
	} else if(! user_flag($user_id) ){
		$c.= __("حساب کاربری شما مسدود شده است.");		
		
	} else {
		
		user_login_session( $user_id );
		
		if( $r = $_REQUEST['refer'] ){
			jsgo( $r );
		
		} else {
			jsgo( layout_link(14) );
		}
		
	}

	return $c;
	
}





