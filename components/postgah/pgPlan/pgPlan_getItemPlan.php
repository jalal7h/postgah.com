<?

function pgPlan_getItemPlan( $item_id ){

	if(! $IPD_id = pgPlan_getItemPlanDuration($item_id) ){
		$plan_id = 0;

	} else if(! $rw_IPD = table('item_plan_duration', $IPD_id) ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw_PD = table('plan_duration', $rw_IPD['plan_duration_id']) ){
		e(__FUNCTION__,__LINE__);
		
	} else {
		$plan_id = $rw_PD['plan_id'];
	}

	return $plan_id;

}


