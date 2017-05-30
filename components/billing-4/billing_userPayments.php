<?

# jalal7h@gmail.com
# 2017/05/30
# 1.1

function billing_userPayments( $user_id ){
	
	if(! $rs = dbq(" SELECT SUM(`cost`) FROM `billing_invoice` WHERE `user_id`='$user_id' LIMIT 1 ") ){
		e();

	} else {
		$sum = dbr($rs,0,0);
		return $sum;
	}

}


