<?php

# jalal7h@gmail.com
# 2017/07/01
# 1.0

function pgPlan_user_MakePremium_form( $rw_item ){

	$item_id = $rw_item['id'];

	$_REQUEST['item_id'] = $item_id;
	$_REQUEST['cat_id'] = intval($rw_item['cat_id']);
	$_REQUEST['position_id'] = intval($rw_item['position_id']);
	
	#
	# all plans
	$rw_s = pgPlan_user_getPlansForThisCat_fetch([ $rw_item['plan'] ]);

	#
	# old plan
	if( $rw_item['plan'] ){
		
		$rw_plan = table('plan', $rw_item['plan']);
		$IPD_id = pgPlan_getItemPlanDuration( $rw_item['id'] );
		$rw_IPD = table('item_plan_duration', $IPD_id);
		$rw_PD = table('plan_duration', $rw_IPD['plan_duration_id']);
		$plan_id = $rw_PD['plan_id'];

		## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ##
		if(! $rs_IPD = dbq(" SELECT * FROM `item_plan_duration` WHERE `item_id`='$item_id' AND `revokedBy`='0' AND `flag`='1' AND `plan_duration_id` IN ( SELECT `id` FROM `plan_duration` WHERE `plan_id`='$plan_id' ) ORDER BY `date_start` DESC LIMIT 1 ") ){
			e();
			
		} else if(! dbn($rs_IPD) ){
			//

		} else if(! $rw_IPD = dbf($rs_IPD) ){
			e();
		}
		## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ##


		$current_plan['name'] = $rw_plan['name_on_form'];
		$current_plan['remaining'] = time_inword($rw_IPD['date_end']);

	}


	return template_engine( 'pgPlan_user_MakePremium_form', [ 
		
		'item'=>$rw_item, 
		'plans'=>$rw_s, 
		'current_plan'=>$current_plan,

	]);

}

