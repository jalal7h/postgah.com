<?

function useraccess_mg_remove(){

	if(! $user_id = $_REQUEST['id'] ){
		e();

	} else if(! dbq(" DELETE FROM `useraccess` WHERE `user_id`='$user_id' ") ){
		e();

	} else if(! dbq(" UPDATE `user` SET `permission`='0', `flag_admin`='0' WHERE `id`='$user_id' LIMIT 1 ") ){
		e();

	} else {
		return true;
	}

	return false;

}

