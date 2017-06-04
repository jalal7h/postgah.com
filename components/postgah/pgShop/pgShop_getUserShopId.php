<?

function pgShop_getUserShopId( $user_id=null ){

	#
	# user_id
	if(! $user_id ){
		if(! $user_id = user_logged() ){
			return e();
		}
	}
	if(! $shop_id = table("shop", $user_id, "id", "user_id") ){
		return false;
		
	} else {
		return $shop_id;
	}
	
}

