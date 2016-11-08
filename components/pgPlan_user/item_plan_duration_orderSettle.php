<?

# jalal7h@gmail.com
# 2016/07/18
# 1.0

function item_plan_duration_orderSettle( $IPD_id ){

	if(! $rw_IPD = table('item_plan_duration', $IPD_id) ){
		e();

	} else if(! $rw_item = table('item', $rw_IPD['item_id']) ){
		e();
	
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








