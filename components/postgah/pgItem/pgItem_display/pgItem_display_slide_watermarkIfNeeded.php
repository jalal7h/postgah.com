<?php

# jalal7h@gmail.com
# 2017/06/10
# 1.0

function pgItem_display_slide_watermarkIfNeeded( $image_path, $rw_item ){
	
	if(! file_exists($image_path) ){
		dg();

	} else if(! $plan_id = $rw_item['plan'] ){
		dg();

	} else if(! $rw_plan = table( 'plan', $plan_id ) ){
		dg();

	} else if(! $watermark_path = $rw_plan['watermark'] ){
		dg();

	} else if(! file_exists($watermark_path) ){
		dg();

	} else {
		$image_path = watermark_create( $image_path, $watermark_path );
	}

	return $image_path;

}

