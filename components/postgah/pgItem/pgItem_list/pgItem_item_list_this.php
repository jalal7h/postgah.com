<?php

# jalal7h@gmail.com
# 2017/06/21
# 1.0

function pgItem_item_list_this( $rw_item ){

	$a_class = 'pgIilt';
	if( $rw_item['pin_in_own_cat'] ){
		$a_class.= ' pin_in_own_cat';
	}
	if( $rw_item['pin_in_all_cat'] ){
		$a_class.= ' pin_in_all_cat';
	}
	if( $rw_item['pin_in_search'] ){
		$a_class.= ' pin_in_search';
	}

	$c = '
	<a class="'.$a_class.'" href="'.pgItem_link($rw_item).'">
		<img src="'.pgItem_image($rw_item, "240x180").'" title="'.$rw_item['name'].'" alt="'.$rw_item['name'].'" />
		<div class="text">
			<div class="name">'.$rw_item['name'].'</div>
			<div class="cat">'.cat_translate($rw_item['cat_id']).'</div>
			<div class="pos">'.position_translate($rw_item['position_id']).'</div>
			<div class="price">'.billing_format($rw_item['cost']).'</div>
			<div class="date">'.time_inword($rw_item['date_updated']).'</div>
		</div>
	</a>';

	return $c;

}

