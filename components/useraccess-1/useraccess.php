<?

function useraccess( $user_id, $component ){
	
	if( $user_id == 1 ){
		return true;

	} else if(! user_isActive($user_id) ){
		dg();
		
	} else if(! $rs = dbq(" SELECT * FROM `useraccess` WHERE `user_id`='$user_id' AND `component`='$component' LIMIT 1 ") ){
		e();

	} else if(! dbn($rs) ){
		dg();

	} else {
		return true;
	}

	return false;

}



