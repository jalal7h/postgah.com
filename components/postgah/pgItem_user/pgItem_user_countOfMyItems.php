<?

function pgItem_user_countOfMyItems( $user_id ){

	if(! $rs = dbq(" SELECT COUNT(*) FROM `item` WHERE `user_id`='$user_id' ") ){
		e();

	} else {
		return dbr($rs,0,0);
	}

}
