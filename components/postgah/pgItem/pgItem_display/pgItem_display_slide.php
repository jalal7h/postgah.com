<?php

# jalal7h@gmail.com
# 2017/06/30
# 1.1

add_layer( 'pgItem_display_slide', 'نمایش آیتم - اسلایدها', 'side', $repeat='0' );

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

		if( $plan_color = pgItem_getPlanColor($rw_item) ){
			$if_it_have_any_plan = "<div class=\"plan\" style=\"color: $plan_color\">ویژه</div>";			
		}

		$content = "
		<div class=\"".__FUNCTION__."\">
			<div class=\"item_name\">".$rw_item['name']."</div>
			<div class=\"item_code\">کد آگهی :‌ ".$rw_item['id']."</div>
			$if_it_have_any_plan
			".slidy( $image_arr, [ 'linkToSource'=>true ] )."
		</div>";

		layout_post_box( $title, $content, $allow_eval=false, $framed=1, $rw_pagelayer['pos'] );
		
	}

}







