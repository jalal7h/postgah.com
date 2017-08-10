<?php

# jalal7h@gmail.com
# 2017/08/10
# 1.0

function pgPlan_getItemPlan_NowAndFuture( $item_id ){

	if( $IPD_id = pgPlan_getItemPlanDuration( $item_id ) or $IPD_id = pgPlan_getItemPlanDuration( $item_id, $still_not_used=true ) ){

		if(! $rw_IPD = table('item_plan_duration', $IPD_id) ){
			e();

		} else if(! $rw_PD = table('plan_duration', $rw_IPD['plan_duration_id']) ){
			e();
			
		} else {
			$plan_id = $rw_PD['plan_id'];
		}

	}

	return intval($plan_id);

}


