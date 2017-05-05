<?php

# jalal7h@gmail.com
# 2017/05/04
# 1.0

add_layer( 'pgShop_view', 'فروشگاه ::‌ لیست محصولات', 'center', $repeat='0' );

function pgShop_view( $rw_pl ){

	$path = _SHOP_PATH;
	$path = 'hpe.postgah.com';

	if(! $rw_shop = table( 'shop', [ 'path'=>$path ] )[0] ){
		e();
		// no shop found
	
	} else if(! $rw_s = table('shop_item', [ 'shop_id'=>$rw_shop['id'] ] ) ){
		e();
		// no item found

	} else {
		
		$shop_name = $rw_shop['name'];

		foreach( $rw_s as $rw ){
			$item_id_arr[] = $rw['item_id'];
		}

		$tdd = 12;
		$p = intval( $_REQUEST['p'] );
		$stt = $p * $tdd;

		if(! $rw_item_s = table( 'item', [ 'id'=>$item_id_arr, 'flag'=>2, 'expired'=>0 ], null, "$stt,$tdd" ) ){
			e();
			// no item found

		} else {

			foreach ($rw_item_s as $i => $rw_item) {

				$rw_item_s[$i]['link'] = pgItem_link( $rw_item );
				$rw_item_s[$i]['image'] = pgItem_image( $rw_item, 1, "300x300" );
				$rw_item_s[$i]['cost'] = 129000;
				if( $rw_item_s[$i]['cost'] == 0 ){
					$rw_item_s[$i]['cost'] = 'مجانی';
				} else {
					$rw_item_s[$i]['cost'] = billing_format( $rw_item_s[$i]['cost'] );
				}

			}

			$paging = listmaker_paging( " SELECT * FROM `item` WHERE `id` IN (".implode( ', ', $item_id_arr ).") AND `flag`='2' AND `expired`='0' " , _URL."/?&p=%%", $tdd );

			echo template_engine( 'pgShop_view', [ 'shop_name'=>$shop_name, 'items'=>$rw_item_s, 'paging'=>$paging ] );

		}
	}


}



