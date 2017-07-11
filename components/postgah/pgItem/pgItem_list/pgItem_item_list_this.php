<?php

# jalal7h@gmail.com
# 2017/06/30
# 1.1

function pgItem_item_list_this( $rw_item ){

	$a_class = 'pgIilt';
	// if( $rw_item['pin_in_own_cat'] ){
	// }

	if( $plan_color = pgItem_getPlanColor($rw_item) ){
		$a_class.= ' pin_in_own_cat';
		$a_style.= 'border-color: '.$plan_color.'; ';
		$a_style.= 'background-color: '.pgItem_getPlanHLColor($rw_item).'; ';
	}

	if( $frameImage = pgItem_getPlanFrameImage($rw_item) ){
		$frameImageTag = '<img src="'._URL.'/'.$frameImage.'" class="frameImage"/>';
	}

	$c = '
	<a class="'.$a_class.'" style="'.$a_style.'" href="'.pgItem_link($rw_item).'">
		<img src="'.pgItem_image($rw_item, "240x180").'" class="itemImage" title="'.$rw_item['name'].'" alt="'.$rw_item['name'].'" />
		<div class="text">
			<div class="name">'.$rw_item['name'].'</div>
			<div class="cat">'.cat_translate($rw_item['cat_id']).'</div>
			<div class="pos">'.position_translate($rw_item['position_id']).'</div>
			<div class="price">'.billing_format($rw_item['cost']).'</div>
			<div class="date">'.time_inword($rw_item['date_updated']).'</div>
			'.( user_cellVerified($rw_item['user_id']) ? '<img title="تلفن همراه تایید شده است." class="cell_verified_icon" src="'._URL.'/image_list/cell_verified_icon.png"/>' : '' ).'
		</div>
		'.$frameImageTag.'
	</a>';

	return $c;

}

