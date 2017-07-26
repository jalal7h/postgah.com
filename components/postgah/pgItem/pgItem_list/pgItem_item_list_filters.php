<?php

# jalal7h@gmail.com
# 2017/07/24
# 1.0

add_layer( 'pgItem_item_list_filters', 'فیلتر‌های ثابت', 'side', $repeat='0' );

function pgItem_item_list_filters(){
	
	if(! $price_range = $_REQUEST['price_range'] ){
		$range_min = 0;
		$range_max = 10000000;
	
	} else {
		list( $range_min, $range_max ) = explode('-', $price_range);
	}

	echo template_engine( 'pgItem_item_list_filters', [ 'range_min'=>$range_min, 'range_max'=>$range_max ] );

}

