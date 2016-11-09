<?

function pgItem_mg_accept(){

	if(! $item_id = $_REQUEST['id'] ){
		e();

	} else if(! $rw_item = table('item', $item_id) ){
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
		$vars = $rw_item;
		$vars['ads_link'] = pgItem_link( $rw_item );
		texty( 'pgItem_mg_accept', $vars, $user_id );

		return true;
	}

	return false;
}

