<?

# jalal7h@gmail.com
# 2016/07/18
# 1.0

function item_plan_duration_orderSettle( $IPD_id ){

	if(! $rw_IPD = table('item_plan_duration', $IPD_id) ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw_item = table('item', $rw_IPD['item_id']) ){
		e(__FUNCTION__,__LINE__);
	
	} else {

		#
		# check if there is still any active order on this item - if its an offline payment
		# 
		# baresie inke vaghean replace hast? ya na, age nist chaneg konim be NewUpgrade
		# replace: ghablan plani dashteo alan mikhad jaigozin kone?
		if( $rw_IPD['type_of_request']=='ReplaceRevoke' ){
			if(! pgPlan_getItemPlanDuration( $rw_IPD['item_id'] ) ){
				$rw_IPD['type_of_request'] = 'NewUpgrade';
				dbs( 'item_plan_duration', ['type_of_request'=>'NewUpgrade'], [ 'id'=>$rw_IPD['id'] ] );
			}
		}

		#
		# faghat renew
		if( $rw_IPD['type_of_request']=='RenewAds' ){
			return item_plan_duration_orderSettle_RenewAds( $rw_item, $rw_IPD );
			
		#
		# ReplaceRevoke + NewUpgrade
		} else {

			if(! item_plan_duration_orderSettle_setPlan( $rw_item, $rw_IPD ) ){
				//

			} else if(! item_plan_duration_orderSettle_setDate( $rw_item['id'] ) ){
				//

			} else {
				return true;
			}

		}

	}

	return false;

}


function item_plan_duration_orderSettle_setPlan( $rw_item, $rw_IPD ){

	# 
	# get PD row
	if(! $rw_PD = table('plan_duration', $rw_IPD['plan_duration_id']) ){
		e(__FUNCTION__,__LINE__);
		return false;
	
	# 
	# get plan row
	} else if(! $rw_plan = table('plan', $rw_PD['plan_id']) ){
		e(__FUNCTION__,__LINE__);
		return false;
	}

	# 
	# age revoke hast, revoke ro anjam bedim
	if( $rw_IPD['type_of_request']=='ReplaceRevoke' ){
		
		if(! $current_working_IPD_id = pgPlan_getItemPlanDuration( $rw_item['id'] ) ){
			e(__FUNCTION__,__LINE__);
			
		} else if(! dbs( 'item_plan_duration', [ 'revokedBy'=>$rw_IPD['id'] ], ['id'=>$current_working_IPD_id] ) ){
			e(__FUNCTION__,__LINE__);
		
		} else {
			# texty needed for ReplaceRevoke
		}
		
	#
	# NewUpgrade
	} else {
		// kare khasi baraye upgrade nadarim felan
	}
	
	# 
	# setPlan in `item_plan_duration`
	if(! dbs( 
		'item_plan_duration', 
		[ 'flag'=>'1' , 'request_for_date'=>'1' ], 
		[ 'id'=>$rw_IPD['id'] ]
	) ){
		e(__FUNCTION__,__LINE__);
		return false;
		
	} else {
		return true;
	}

}

// in bad az taid e agahi run mishe, age agahi niaz be taid nadasht, bad az setPlan run mishe
function item_plan_duration_orderSettle_setDate( $item_id ){

	$date_start = U();

	# 
	# get item record
	if(! $rw_item = table('item', $item_id) ){
		e(__FUNCTION__,__LINE__);

	#
	# if ads is still not activated, return back.
	} else if( $rw_item['flag']!=2 ){
		return true;
	
	# 
	# get IPD record - akharin order i k date nadare, va date mikhad
	} else if(! $IPD_id = pgPlan_getItemPlanDuration( $item_id, $still_not_used=true ) ){
		e(__FUNCTION__,__LINE__);
	} else if(! $rw_IPD = table('item_plan_duration', $IPD_id) ){
		e(__FUNCTION__,__LINE__);

	#
	# get PD record
	} else if(! $rw_PD = table('plan_duration', $rw_IPD['plan_duration_id']) ){
		e(__FUNCTION__,__LINE__);

	#
	# tain e zaman e payan e order
	} else if(! $date_end = $date_start + ($rw_PD['hour'] * 3600) ){
		e(__FUNCTION__,__LINE__);

	#
	# set Dates
	} else if(! dbs(
			'item_plan_duration', 
			[ 
				'date_start' => $date_start, 
				'date_end' => $date_end, 
				'request_for_date'=>'0'
			], 
			[ 'id'=>$rw_IPD['id'] ]
	) ){
		e(__FUNCTION__,__LINE__);
	
	} else {

		#
		# sync e plan , alan
		pgPlan_syncItemPlan( $item_id );

		# va sync e plan dar table e `item`, vaghti modat zaman e ye service tamum mishe,
		cronjob_add( 'pgPlan_syncItemPlan', $date_end , $item_id );

		return true;
	}

	return false;
}












