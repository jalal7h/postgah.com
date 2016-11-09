<?

function pgPlan_isAnyInThisCatAndPosition( $cat_id=null, $position_id=null, $current_plan=null ){

	if( $cat_id ){
		$cat_serial = cat_id_serial($cat_id);
		$cat_serial = implode(',', $cat_serial);
		$cat_query = " AND ( `cat_id`='0' OR `cat_id` IN ($cat_serial) )";
	} else {
		$cat_query = " AND `cat_id`='0' ";
	}

	if( $position_id ){
		$position_serial = position_id_serial($position_id);
		$position_serial = implode(',', $position_serial);
		$position_query = " AND ( `position_id`='0' OR `position_id` IN ($position_serial) )";
	} else {
		$position_query = " AND `position_id`='0' ";
	}

	if( $current_plan ){
		$current_query = " AND `id`!='$current_plan' ";
	}

	if(! $rs = dbq(" SELECT COUNT(*) FROM `plan` WHERE 1 $cat_query $position_query $current_query ") ){
		e( dbe() );
	
	} else if( dbr($rs,0,0) == 0 ){
		return false;

	} else {
		return true;
	}

}










