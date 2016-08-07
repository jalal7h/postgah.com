<?

# jalal7h@gmail.com
# 2016/07/24
# 1.0

// inja yekam sambal shod, 100% test nashod, chon ajalei bud, baiad tu in hafte upload mishod.

function item_plan_duration_orderSettle_RenewAds( $rw_item, $rw_IPD ){
	
	$item_id = $rw_item['id'];

	if(! $rw_PD = table('plan_duration', $rw_IPD['plan_duration_id']) ){
		e(__FUNCTION__,__LINE__);

	} else if(! $current_IPD_id = pgPlan_getItemPlanDuration($item_id) ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw_current_IPD = table('item_plan_duration', $current_IPD_id) ){
		e(__FUNCTION__,__LINE__);

	} else {
	
		$date_start = $rw_current_IPD['date_end'];
		$date_end = $date_start + ( $rw_PD['hour'] * 3600 );
		
		if(! dbs( 'item_plan_duration', [ 'date_start'=>$date_start, 'date_end'=>$date_end ], [ 'id'=>$rw_IPD['id'] ] ) ){
			e(__FUNCTION__,__LINE__);

		} else {

			# va sync e plan dar table e `item`, dar moede shoru/payan renew
			cronjob_add( 'pgPlan_syncItemPlan', $date_start , $item_id );
			cronjob_add( 'pgPlan_syncItemPlan', $date_end , $item_id );

			return true;
		}

	}

	return false;
}










