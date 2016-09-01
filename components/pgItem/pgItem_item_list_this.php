<?

function pgItem_item_list_this( $rw_item ){

	$c = '
	<a class="pgIilt" href="'.pgItem_link($rw_item).'">
		<img src="'._URL."/".pgItem_image($rw_item, "200x200").'" title="'.$rw_item['name'].'" alt="'.$rw_item['name'].'" />
		<div class="text">
			<div class="name">'.$rw_item['name'].'</div>
			<div class="cat">'.cat_translate($rw_item['cat_id']).'</div>
			<div class="pos">'.position_translate($rw_item['position_id']).'</div>
			<div class="price">'.cost_in_word($rw_item['cost']).'</div>
			<div class="date">'.time_inword($rw_item['date_updated']).'</div>
		</div>
	</a>';

	return $c;

}

