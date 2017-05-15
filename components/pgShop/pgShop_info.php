<?php

# jalal7h@gmail.com
# 2017/05/04
# 1.0

add_layer( 'pgShop_info', 'فروشگاه ::‌ جزئیات', 'side', $repeat='0' );

function pgShop_info( $rw_pl ){

	$_REQUEST['path'] = var_control( $_REQUEST['path'], '0-9a-z' );

	if(! $rw_shop = table( 'shop', [ 'path'=>$_REQUEST['path'] ] )[0] ){
		e();
		// no shop found

	} else {

		$rw_shop['desc'] = nl2br( $rw_shop['desc'] );
		echo template_engine( 'pgShop_info', $rw_shop );

	}

}

