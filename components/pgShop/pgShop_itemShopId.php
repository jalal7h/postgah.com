<?

function pgShop_getItemShopId( $item_id ){

	if(! $rs = dbq(" SELECT `shop_id` FROM `shop_item` WHERE `item_id`='$item_id' LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbn($rs) ){
		return false;
	
	} else {
		return dbr($rs,0,0);
	}

}

function pgShop_putItemShopId( $item_id, $shop_id ){
	
	if(! $rs = dbq(" SELECT * FROM `shop_item` WHERE `shop_id`='$shop_id' AND `item_id`='$item_id' LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__);
	
	} else if( dbn($rs) ){
		// already have
		return true;

	} else if(! dbs( 'shop_item', ['shop_id'=>$shop_id,'item_id'=>$item_id] ) ){
		e(__FUNCTION__,__LINE__);

	} else {
		return true;
	}

	return false;

}

function pgShop_removeItemShopId( $item_id, $shop_id=null ){
	
	return dbq(" DELETE FROM `shop_item` WHERE `item_id`='$item_id' ".($shop_id ?" AND `shop_id`='$shop_id'" :"")." ");
	
}





