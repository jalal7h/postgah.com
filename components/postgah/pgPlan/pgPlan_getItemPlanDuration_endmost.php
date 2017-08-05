<?php

# jalal7h@gmail.com
# 2017/08/05
# 1.0

function pgPlan_getItemPlanDuration_endmost( $item_id ){
	
	$date = U();

	$query = " SELECT * FROM `item_plan_duration` WHERE 1 ".
		
		" AND `item_id`='$item_id' ".
		" AND `flag`='1' ".
		" AND `revokedBy`=0 ".
		" AND `date_start`>0 ".
		" ORDER BY `date_start` DESC ".
		" LIMIT 1 ";

	// echo $query."<hr>";

	if(! table('item', $item_id) ){
		e();
	
	} else if(! $rs = dbq( $query ) ){
		e(dbe());

	} else if(! dbn($rs) ){
		// no record found

	} else if(! $rw = dbf($rs) ){
		e();

	} else {
		return $rw['id']; // IPD_id
	}
	
	return false;

}

