<?php

# jalal7h@gmail.com
# 2017/07/30
# 1.1

add_layer( 'pgItem_item_list_filters', 'فیلتر‌های ثابت', 'side', $repeat='0' );

function pgItem_item_list_filters(){
	
	if(! $price_range = $_REQUEST['price_range'] ){
		$range_min = 0;
		$range_max = '';
	
	} else {
		list( $range_min, $range_max ) = explode('-', $price_range);
		// if( $range_min == '0' ){
		// 	$range_min = '';
		// }
		if( $range_max == 'n' ){
			$range_max = '';
		}
	}

	echo template_engine( 'pgItem_item_list_filters', [ 'range_min'=>$range_min, 'range_max'=>$range_max ] );

}

