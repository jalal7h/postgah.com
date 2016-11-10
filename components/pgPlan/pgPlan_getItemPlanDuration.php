<?

// still_not_used : agahi k sabt shode, vije hast, pardakhtesh anjam shode, ama admin hanuz taid nakarde
// be ebarati hanuz setDate nashode, va niaz be date dare, yani request_for_date 1 hast.

function pgPlan_getItemPlanDuration( $item_id, $still_not_used=false ){
	
	$date = U();

	$query = " SELECT * FROM `item_plan_duration` WHERE 1 ".
		
		" AND `item_id`='$item_id' ".
		" AND `flag`='1' ".
		" AND `revokedBy`='0' ".
		
		( $still_not_used ? 
			" AND `date_start`='0' AND `date_end`='0' AND `request_for_date`='1' " : 
			" AND `date_start` <= '$date' AND `date_end` > '$date' "
		).

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







