<?php

# jalal7h@gmail.com
# 2017/06/30
# 1.0

function pgItem_getPlanColor( $rw_item ){
	
	if(! $plan_id = $rw_item['plan'] ){
		//
	
	} else if(! $rw_plan = table('plan', $plan_id) ){
		//

	} else if(! $color = $rw_plan['search_box_color']) {
		//
	}

	return $color;

}

