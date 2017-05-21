<?php

# jalal7h@gmail.com
# 2017/05/04
# 1.0

add_layer( 'pgShop_info', 'فروشگاه ::‌ جزئیات', 'side', $repeat='0' );

function pgShop_info( $rw_pl ){

	$_REQUEST['path'] = var_control( $_REQUEST['path'], '0-9a-z' );

	if(! $rw_shop = table( 'shop', [ 'path'=>$_REQUEST['path'] ] )[0] ){
		d404();

	} else if( $rw_shop['flag'] == 0 ){
		d404();

	} else {

		$rw_shop['desc'] = nl2br( $rw_shop['desc'] );
		
		if( $rw_s = table('shop_phone', [ 'shop_id'=>$rw_shop['id'] ] ) ){
			foreach ($rw_s as $rw ) {
				$phones[] = $rw['phone'];
			}
		}
		$rw_shop['phones'] = $phones;
		
		echo template_engine( 'pgShop_info', $rw_shop );

	}

}

