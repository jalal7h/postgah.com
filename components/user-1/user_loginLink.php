<?

# jalal7h@gmail.com
# 2016/11/29
# 1.0

function user_loginLink( $user_id ){

	if(! admin_logged() ){
		return false;
	} else {
		return _URL."/?page=admin&cp=user_mg&do=login&id=".$user_id."&func=0";
	}
	
}








