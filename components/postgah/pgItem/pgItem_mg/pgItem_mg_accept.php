<?php

# jalal7h@gmail.com
# 2017/07/01
# 1.0

function pgItem_mg_accept( $item_id ){
	
	if(! $rw_item = table('item', $item_id) ){
		e();

	} else if( $rw_item['flag'] == 2 ){
		// e();
		
	} else if(! dbs('item', ['flag'=>'2'], ['id'=>$item_id]) ){
		e();

	} else {

		#
		# agar baraye in agahi, plan i hast k kharidari shode, va hanuz estefade nashode ..
		# masalan, age in ye taid e virayesh hast, in mored anjam nemishe, 
		# ya age ye disable+enable tavasote admin hast, in anjam nemishe
		if( pgPlan_getItemPlanDuration( $item_id, $still_not_used=true ) ){
			item_plan_duration_orderSettle_setDate( $item_id );
		}

		# texty pgItem_mg_accept
		$user_id = $rw_item['user_id'];
		$vars['item_id'] = $rw_item['id'];
		$vars['item_name'] = $rw_item['name'];
		$vars['item_link'] = item_link( $rw_item );
		texty( 'pgItem_mg_accept', $vars, $user_id );

		return true;
	}

	return false;
}

