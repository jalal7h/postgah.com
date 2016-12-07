<?

# jalal7h@gmail.com
# 2016/12/07
# 1.0

function fbcomment_user_countOn60m( $user_id ){

	$date_before_60m = U() - 3600;

	if(! $rs = dbq(" SELECT COUNT(*) FROM `fbcomment` WHERE `user_id`='$user_id' AND `date_created` > $date_before_60m ") ){
		e( dbe() );

	} else {
		return dbr($rs,0,0);
	}

	return 0;

}



