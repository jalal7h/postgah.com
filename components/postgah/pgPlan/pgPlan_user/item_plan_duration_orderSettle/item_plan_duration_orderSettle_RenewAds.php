<?

# jalal7h@gmail.com
# 2016/07/24
# 1.0

// inja yekam sambal shod, 100% test nashod, chon ajalei bud, baiad tu in hafte upload mishod.

function item_plan_duration_orderSettle_RenewAds( $rw_item, $rw_IPD ){
	
	$item_id = $rw_item['id'];

	if(! $rw_PD = table('plan_duration', $rw_IPD['plan_duration_id']) ){
		e();

	} else if(! $current_IPD_id = pgPlan_getItemPlanDuration($item_id) ){
		e();

	} else if(! $rw_current_IPD = table('item_plan_duration', $current_IPD_id) ){
		e();

	} else {
	
		$date_start = $rw_current_IPD['date_end'];
		$date_end = $date_start + ( $rw_PD['hour'] * 3600 );
		
		if(! dbs( 'item_plan_duration', [ 'date_start'=>$date_start, 'date_end'=>$date_end ], [ 'id'=>$rw_IPD['id'] ] ) ){
			e();

		} else {

			# va sync e plan dar table e `item`, dar moede shoru/payan renew
			pgPlan_syncItemPlan( $item_id ); // shoru
			cronjob_add( 'pgPlan_syncItemPlan', $date_end+10, $item_id ); // 10 zarib khata time

			return true;
		}

	}

	return false;
}









