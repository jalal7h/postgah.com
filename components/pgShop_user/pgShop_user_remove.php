<?

# jalal7h@gmail.com
# 2017/05/21
# 1.1

function pgShop_user_remove(){

	if(! $user_id = user_logged() ){
		ed();

	} else if(! $shop_id = $_REQUEST['id'] ){
		e();

	} else if(! $rw_s = table( 'shop', [ 'user_id'=>$user_id, 'id'=>$shop_id ] ) ){
		e();

	} else if(! dbrm( 'shop_phone', [ 'shop_id'=>$shop_id ] ) ){
		e();

	} else if(! dbrm( 'shop_item', [ 'shop_id'=>$shop_id ] ) ){
		e();

	} else if(! dbs( 'shop', [ 'path'=>$rw_s[0]['path']."__".U() ], [ 'id'=>$shop_id ] ) ){
		e();

	} else if(! dbrm( 'shop', $shop_id ) ){
		e();

	} else {
		slugInDB::remove( 'shop-'.$shop_id );
		return true;
	}

	return false;

}

