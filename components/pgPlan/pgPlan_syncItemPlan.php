<?

// plan e felie agai ro az billing va order peyda mikone, va set mikone ru agahi
// plan_id ro bar migardune

function pgPlan_syncItemPlan( $item_id ){
	
	if(! $rw_item = table('item', $item_id) ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! $plan_id = pgPlan_getItemPlan( $item_id ) ){
		$plan_id = 0;
	}

	if( $plan_id!=$rw_item['plan'] ){

		# texty needed for plan change - maybe changed to free
		dbs( 'item', [ 'plan'=>$plan_id ], [ 'id'=>$item_id ] );

	}

	return $plan_id;
	
}


