<?

# jalal7h@gmail.com
# 2017/05/04
# 1.2

function user_loginLink( $user_id, $slug=null ){

	if(! admin_logged() ){
		return false;

	} else {
		return _URL.'/admin/user/login/'.$user_id. ( $slug ? '/'.$slug : '' );
	}
	
}








