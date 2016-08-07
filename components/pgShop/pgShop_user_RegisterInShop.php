<?

function pgShop_user_RegisterInShop( $item_id ){
	
	if(! $user_id = user_logged() ){
		e(__FUNCTION__,__LINE__);

	} else if(! $shop_id = pgShop_getUserShopId() ){
		e(__FUNCTION__,__LINE__);

	} else if(! pgShop_putItemShopId( $item_id, $shop_id ) ){
		e(__FUNCTION__,__LINE__);

	} else {
		return true;
	}

	return false;
}