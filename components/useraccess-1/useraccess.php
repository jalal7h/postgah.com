<?

function useraccess( $users_id, $component ){
	
	if( $users_id==1 ){
		return true;

	} else if( table('users', $users_id, 'flag_admin')==0 ){
		;//
		
	} else if(! $rs = dbq(" SELECT * FROM `useraccess` WHERE `users_id`='$users_id' AND `component`='$component' LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs) ){
		;//

	} else {
		return true;
	}

	return false;

}



