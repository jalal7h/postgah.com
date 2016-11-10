<?

function pgPlan_itemCurrentPlan( $rw_item ){

	$item_id = $rw_item['id'];

	if(! pgItem_isActive($rw_item) ){
		return "";
	}

	$c.= "<div class=\"".__FUNCTION__."\">";

	if( pgItem_isFree($rw_item) ){
		$c.= "رایگان";
	
	# if have any working plan
	} else if( $IPD_id = pgPlan_getItemPlanDuration($item_id) ){
		$rw_IPD = table('item_plan_duration', $IPD_id);
		$PD_id = $rw_IPD['plan_duration_id'];
		$rw_PD = table('plan_duration', $PD_id);
		$plan_id = $rw_PD['plan_id'];
		$rw_plan = table('plan', $plan_id);
		$c.= $rw_plan['name_on_form']."، ".time_inword($rw_IPD['date_end']);

	} else {
		e();
	}

	$c.= "</div>";

	return $c;
}









