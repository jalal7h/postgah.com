<?


function pgItem_expire_agent(){

	// pgItem_expire_agent_premium_to_free(); // in dare anjam mishe, bad az satbe zaman e agahi, tarikh e expire esh cronjob mishe
	pgItem_expire_agent_free_to_die(); // az free_ads_duration_limit moshakhas mishe

}
$GLOBALS['cronjob'][] = [ 'pgItem_expire_agent', '0 0 * * *' ];


// function pgItem_expire_agent_premium_to_free(){

// 	if(! $rs = dbq(" SELECT * FROM `item` WHERE `plan`!=0 ") ){
// 		e();
	
// 	} else if(! dbn($rs) ){
// 		return true;
	
// 	} else while( $rw = dbf($rs) ){
// 		$plan_id = pgPlan_syncItemPlan( $item_id );
// 		if( $plan_id===0 ){
// 			$number_of_moved_items++;
// 		}
// 	}

// 	if( $number_of_moved_items > 0 ){
// 		# texty.needed to admin for number of changed items to free
// 	}

// }


function pgItem_expire_agent_free_to_die(){

	# its only for non premium items

	if(! $expire_duration_in_days = intval(setting('free_ads_duration_limit')) ){ // in month
		return true;
	
	} else {
		$expire_duration = $expire_duration_in_days * 3600 * 24; // convert to seconds
	}

	$now = U();
	$the_last_valid_date = $now - $expire_duration;

	$conditions = " `plan`='0' AND `expired`=0 AND `date_updated` < $the_last_valid_date ";

	if(! $rs = dbq(" SELECT * FROM `item` WHERE $conditions ") ){
		e();
	
	} else if(! $counf_of_expiring_items = dbn($rs) ){
		return true;
	
	} else {
		
		while( $rw = dbf($rs) ){
			$rw_s[] = $rw;
		}

		if(! dbq(" UPDATE `item` SET `expired`='1' WHERE $conditions ") ){
			e();

		} else {

			foreach( $rw_s as $i => $rw ){
				$vars['item_name'] = $rw['name'];
				$vars['limit_in_days'] = $expire_duration_in_days;
				texty( 'pgItem_expire_agent_free_to_die_while', $vars, $rw['user_id'] );
			}

			$vars['count_of_ads'] = sizeof($rw_s);
			$vars['limit_in_days'] = $expire_duration_in_days;
			$vars['date'] = UDate( U() , "text" );
			texty( 'pgItem_expire_agent_free_to_die_single', $vars, 'admin' );

		}

	}

	

}









