<?

// plan e felie agai ro az billing va order peyda mikone, va set mikone ru agahi
// plan_id ro bar migardune

function pgPlan_syncItemPlan( $item_id ){
	
	if(! $rw_item = table('item', $item_id) ){
		e();
	
	} else if(! $plan_id = pgPlan_getItemPlan( $item_id ) ){
		$plan_id = 0;
	}

	if( $plan_id != $rw_item['plan'] ){

		dbs( 'item', [ 'plan'=>$plan_id ], [ 'id'=>$item_id ] );

		# texty for plan change - maybe changed to free
		if( $plan_id == 0 ){
			$user_id = $rw_item['user_id'];
			$vars = $rw_item;
			$vars['old_plan'] = table('plan',$rw['plan'],'name_on_form');
			$vars['renew_link'] = _URL.'/userpanel';
			texty('pgPlan_syncItemPlan_changed_to_free', $vars, $user_id);
		}

	}

	return $plan_id;
	
}


