<?


function pgItem_expire_agent(){

	pgItem_expire_agent_premium_to_free();
	pgItem_expire_agent_free_to_die();	

}
$GLOBALS['cronjob'][] = [ 'pgItem_expire_agent', '0 0 * * *' ];


function pgItem_expire_agent_premium_to_free(){

	if(! $rs = dbq(" SELECT * FROM `item` WHERE `plan`!=0 ") ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbn($rs) ){
		return true;
	
	} else while( $rw = dbf($rs) ){
		$plan_id = pgPlan_syncItemPlan( $item_id );
		if( $plan_id===0 ){
			$number_of_moved_items++;
		}
	}

	if( $number_of_moved_items > 0 ){
		# texty needed to admin for number of changed items to free
	}

}


function pgItem_expire_agent_free_to_die(){

	# its only for non premium items

	if(! $expire_duration = intval(setting('free_ads_duration_limit')) ){
		return true;
	
	} else {
		$expire_duration*= 3600 * 24; // convert to seconds
	}

	$now = U();

	if(! $rs = dbq(" SELECT * FROM `item` WHERE `plan`='0' AND `expired`=0 AND `date_updated` + $expire_duration < $now ") ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! $counf_of_expiring_items = dbn($rs) ){
		return true;
	
	} else {
		
		while( $rw = dbf($rs) ){
			# texty needed for expireing items, to user
		}

		if(! dbq(" UPDATE `item` SET `expired`='1' WHERE `plan`='0' AND `expired`=0 AND `date_updated` + $expire_duration < $now ") ){
			e(__FUNCTION__,__LINE__);
		} else {
			# texty needed to admin, $counf_of_expiring_items
		}

	}

	

}









