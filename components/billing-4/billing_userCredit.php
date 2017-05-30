<?

# jalal7h@gmail.com
# 2017/05/30
# 1.0

function billing_userCredit( $user_id , $credit=0 ){
	
	if( $credit != 0 ){ // update the credit
		
		if( $credit > 0 ){ // add
			if(! dbq(" UPDATE `user` SET `wallet_credit`=`wallet_credit`+'".abs($credit)."' WHERE `id`='$user_id' LIMIT 1 ") ){
				e();
			}

		} else { // mines
			if(! dbq(" UPDATE `user` SET `wallet_credit`=`wallet_credit`-'".abs($credit)."' WHERE `id`='$user_id' LIMIT 1 ") ){
				e();
			}
		}
	}

	return table("user", $user_id, "wallet_credit");

}


