<?php

# jalal7h@gmail.com
# 2017/06/10
# 1.0

$GLOBALS['block_layers_center']['pgItem_display_slide'] = 'نمایش آیتم - اسلایدها';

function pgItem_display_slide( $rw_pagelayer ){

	pgItem_viewCounter();

	if(! $rw_item = pgItem_fetch() ){
		dg();

	} else {
		
		if(! $image_arr = pgItem_image_array($rw_item) ){
			//

		} else foreach ($image_arr as $i => $image_this) {
			
			if(! file_exists($image_this) ){
				dg($image_this);

			} else if(! $size = getimagesize($image_this) ){
				dg($image_this);

			} else if( $size[0] < 500 ){
				unset($image_arr[$i]);
			
			} else {
				$image_arr[$i] = resize_image( $image_arr[$i], 1480, 1000, $cut=true );
				$image_arr[$i] = pgItem_display_slide_watermarkIfNeeded( $image_arr[$i], $rw_item );
			}

		}

		$content = "
		<div class=\"".__FUNCTION__."\">
			<div class=\"item_name\">".$rw_item['name']."</div>
			<div class=\"item_code\">کد آگهی :‌ ".$rw_item['id']."</div>
			".slidy($image_arr)."
		</div>";

		layout_post_box( $title, $content, $allow_eval=false, $framed=1, $rw_pagelayer['pos'] );
		
	}

}







