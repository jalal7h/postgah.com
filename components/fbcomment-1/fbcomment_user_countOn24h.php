<?

# jalal7h@gmail.com
# 2016/12/07
# 1.0

function fbcomment_user_countOn24h(){

	$date_before_24h = U() - (24 * 3600);

	if(! $rs = dbq(" SELECT COUNT(*) FROM `fbcomment` WHERE `user_id`='$user_id' AND `date_created` > $date_before_24h ") ){
		e( dbe() );

	} else {
		return dbr($rs,0,0);
	}

	return 0;

}



