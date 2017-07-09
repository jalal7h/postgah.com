<?php

# jalal7h@gmail.com
# 2017/06/22
# 1.0

function pgPlan_itemCurrentPlan( $rw_item ){

	$item_id = $rw_item['id'];

	if(! pgItem_isActive($rw_item) ){
		return "";
	}

	$c.= "<div class=\"".__FUNCTION__."\" title=\"پلان آگهی\" >";

	if( pgItem_isFree($rw_item) ){
		$c.= "رایگان";
	
	# if have any working plan
	} else if( $IPD_id = pgPlan_getItemPlanDuration($item_id) ){
		$rw_IPD = table('item_plan_duration', $IPD_id);
		$PD_id = $rw_IPD['plan_duration_id'];
		$rw_PD = table('plan_duration', $PD_id);
		$plan_id = $rw_PD['plan_id'];
		$rw_plan = table('plan', $plan_id);

		$last_date_end = $rw_IPD['date_end'];

		# 
		# add the renew records
		while( 1 ){
			if(! $rs = dbq(" SELECT `date_end` FROM `item_plan_duration` WHERE `item_id`='$item_id' AND `flag`='1' AND `revokedBy`='0' AND `date_start`='$last_date_end' LIMIT 1 ") ){
				ed();
			} else if(! dbn($rs) ){
				break;
			} else {
				$last_date_end = dbr($rs,0,0);
			}
		}

		$c.= $rw_plan['name_on_form']."، ".time_inword($last_date_end);

	} else {
		e( $item_id );
	}

	$c.= "</div>";

	return $c;
}









