<?

function pgShop_user_remove(){

	if(! $user_id = user_logged() ){
		e(__FUNCTION__,__LINE__);
		die();

	} else if(! $shop_id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rs = dbq(" SELECT * FROM `shop` WHERE `user_id`='$user_id' AND `id`='$shop_id' LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs) ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw = dbf($rs) ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbq(" DELETE FROM `shop_item` WHERE `shop_id`='$shop_id' ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbq(" DELETE FROM `shop` WHERE `id`='$shop_id' LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__);

	} else {
		return true;
	}

	return false;

}

