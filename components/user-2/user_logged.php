<?php

# jalal7h@gmail.com
# 2017/02/27
# 1.0

function user_logged(){
	
	if( $user_id = $_SESSION[ login_key()['uid'] ] ){
		return $user_id;
	
	} else {
		return false;
	}
	
}

