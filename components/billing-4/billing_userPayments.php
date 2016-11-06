<?

# jalal7h@gmail.com
# 2016/07/20
# 1.0

function billing_userPayments( $user_id ){
	
	if(! $rs = dbq(" SELECT SUM(`cost`) FROM `billing_invoice` WHERE `user_id`='$user_id' LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__);

	} else {
		$sum = dbr($rs,0,0);
		return $sum;
	}

}


