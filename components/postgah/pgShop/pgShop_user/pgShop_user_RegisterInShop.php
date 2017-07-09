<?

function pgShop_user_RegisterInShop( $item_id ){
	
	if(! $user_id = user_logged() ){
		e();

	} else if(! $shop_id = pgShop_getUserShopId() ){
		e();

	} else if(! pgShop_putItemShopId( $item_id, $shop_id ) ){
		e();

	} else {
		return true;
	}

	return false;
}
