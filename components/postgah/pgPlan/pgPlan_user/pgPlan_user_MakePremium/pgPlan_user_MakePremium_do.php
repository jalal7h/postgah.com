<?

// before payment

function pgPlan_user_MakePremium_do(){

	token_check();

	if(! $item_id = intval($_REQUEST['id']) ){
		e();

	} else if(! $rw_item = table('item', $item_id) ){
		e();

	} else if(! $user_id = user_logged() ){
		e();

	} else if( $user_id!=$rw_item['user_id'] ){
		e();

	} else if(! $plan_duration_id__new = intval($_REQUEST['plan_duration_id']) ){
		e();

	} else if(! $rw_PD__new = table('plan_duration', $plan_duration_id__new) ){
		e();
	
	} else if(! $rw_plan__new = table('plan', $rw_PD__new['plan_id']) ){
		e();

	} else {

		#
		# its already premium
		if( $rw_item['plan'] ){

			#
			# its same as past plan
			if( $rw_item['plan']==$rw_plan__new['id'] ){
				ed();

			#
			# there is no IPD found for this plan
			} else if(! $IPD_id = pgPlan_getItemPlanDuration($item_id) ){
				ed();

			# 
			#
			} else {
				$type_of_request = 'ReplaceRevoke';
			}

		#
		# its new on premium
		} else {
			$type_of_request = 'NewUpgrade';
		}


		#
		# invoice vars
		$cost = $rw_PD__new['cost'];
		$order_table = "item_plan_duration";

		#
		# invoice create
		if(! $IPD_id__new = dbs('item_plan_duration', [ 'item_id'=>$item_id, 'plan_duration_id'=>$plan_duration_id__new, 'cost'=>$rw_PD__new['cost'], 'type_of_request'=>$type_of_request ] ) ) {
			e();

		} else if(! $invoice_id = billing_invoiceMake( $cost, $order_table, $IPD_id__new ) ){
			e();

		} else {
			return pgPlan_user_MakePremium_do_congratulate( $IPD_id__new, $invoice_id );
		}

	}

	return false;

}



