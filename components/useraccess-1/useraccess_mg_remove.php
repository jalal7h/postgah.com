<?

function useraccess_mg_remove(){

	if(! $users_id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbq(" DELETE FROM `useraccess` WHERE `users_id`='$users_id' ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbq(" UPDATE `users` SET `permission`='0', `flag_admin`='0' WHERE `id`='$users_id' LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__);

	} else {
		return true;
	}

	return false;

}

