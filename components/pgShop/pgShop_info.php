<?php

# jalal7h@gmail.com
# 2017/05/04
# 1.0

add_layer( 'pgShop_info', 'فروشگاه ::‌ جزئیات', 'side', $repeat='0' );

function pgShop_info( $rw_pl ){

	if(! $rw_shop = table( 'shop', [ 'path'=>_SHOP_PATH ] )[0] ){
		e();
		// no shop found

	} else {

		$rw_shop['desc'] = nl2br( $rw_shop['desc'] );
		echo template_engine( 'pgShop_info', $rw_shop );

	}

}

