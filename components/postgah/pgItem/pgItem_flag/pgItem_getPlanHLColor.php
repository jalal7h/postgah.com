<?php

# jalal7h@gmail.com
# 2017/07/09
# 1.0

function pgItem_getPlanHLColor( $rw_item ){
	
	if(! $plan_id = $rw_item['plan'] ){
		//
	
	} else if(! $rw_plan = table('plan', $plan_id) ){
		//

	} else if(! $color = $rw_plan['hilight_color']) {
		//
	}

	return $color;

}

