<?

function useraccess( $user_id, $component ){
	
	if( $user_id == 1 ){
		return true;

	} else if( table('user', $user_id, 'flag_admin')==0 ){
		//
		
	} else if(! $rs = dbq(" SELECT * FROM `useraccess` WHERE `user_id`='$user_id' AND `component`='$component' LIMIT 1 ") ){
		e();

	} else if(! dbn($rs) ){
		//

	} else {
		return true;
	}

	return false;

}



