<?

function pgItem_user_list_tr_class( $rw ){
	
	# premium check
	# 	agahi premium hast 					  ya pardakht premium anjam shode ama agahi hanz taid nshde
	if( pgPlan_getItemPlanDuration($rw['id']) or pgPlan_getItemPlanDuration( $rw['id'], $still_not_used=true ) 
	){
		$tr_class[]= "Premium";
	} else {
		$tr_class[]= "Free";
	}
	
	#
	# flag
	if( $rw['flag']==2 ){
		$tr_class[]= "Active";
	} else if( $rw['flag']==1 ){
		$tr_class[]= "Rejected";
	} else {
		$tr_class[]= "Waiting";
	}

	#
	# expired
	if( $rw['expired']==1 ){
		$tr_class[]= "Expired";
	} else {
		$tr_class[]= "NotExpired";
	}

	#
	# stock
	if( $rw['sold']==1 ){
		$tr_class[]= "OutOfStock";
	} else {
		$tr_class[]= "InStock";		
	}

	#
	# shop_item
	if( pgShop_getItemShopId( $rw['id'] ) ){
		$tr_class[]= "RegisteredInShop";
	} else {
		$tr_class[]= "NotRegisteredInShop";		
	}

	$tr_class = implode(' ', $tr_class);

	return $tr_class;
}








