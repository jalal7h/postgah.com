<?php

# jalal7h@gmail.com
# 2017/05/22
# 1.0

function pgShop_remove( $shop_id ){
	
	if(! $rw = table( 'shop', $shop_id ) ){
		e();

	} else if(! dbrm( 'shop_phone', [ 'shop_id'=>$shop_id ] ) ){
		e();

	} else if(! dbrm( 'shop_item', [ 'shop_id'=>$shop_id ] ) ){
		e();

	} else if(! dbs( 'shop', [ 'path'=>$rw['path']."__".U() ], [ 'id'=>$shop_id ] ) ){
		e();

	} else if(! dbrm( 'shop', $shop_id ) ){
		e();

	} else {
		slugInDB::remove( 'shop-'.$shop_id );
		return true;
	}

}



