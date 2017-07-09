<?

function pgItem_isFree( $rw ){

	$item_id = $rw['id'];

	if( $rw['plan'] != 0 ){
		return false;
	
	} else if( pgPlan_getItemPlanDuration( $item_id, $still_not_used=false ) ){
		return false;

	} else if( pgPlan_getItemPlanDuration( $item_id, $still_not_used=true ) ){
		return false;

	} else if( pgItem_haveIncompletePayment($rw) ){
		return false;		
	
	} else {
		return true;
	}

}

