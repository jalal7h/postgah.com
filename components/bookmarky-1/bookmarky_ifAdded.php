<?

function bookmarky_ifAdded( $table_name, $table_id ){

	if(! $user_id = user_logged() ){
		//

    } else if(! $rs = dbq(" SELECT * FROM `bookmarky` WHERE `table_name`='$table_name' AND `table_id`='$table_id'AND `user_id`='$user_id' ") ){
		e();
	
	} else if( dbn($rs) ){
		return true;
	}

	return false;

}


