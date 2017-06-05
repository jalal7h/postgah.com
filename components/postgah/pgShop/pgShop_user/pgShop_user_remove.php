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
	
	} else {
		return pgShop_remove( $shop_id );
	}

	return false;

}

