<?

function pgItem_mg_accept(){

	if(! $item_id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw_item = table('item', $item_id) ){
		e(__FUNCTION__,__LINE__);

	} else if( $rw_item['flag']==2 ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbs('item', ['flag'=>'2'], ['id'=>$item_id]) ){
		e(__FUNCTION__,__LINE__);

	} else {

		#
		# agar baraye in agahi, plan i hast k kharidari shode, va hanuz estefade nashode ..
		# masalan, age in ye taid e virayesh hast, in mored anjam nemishe, 
		# ya age ye disable+enable tavasote admin hast, in anjam nemishe
		if( pgPlan_getItemPlanDuration( $item_id, $still_not_used=true ) ){
			item_plan_duration_orderSettle_setDate( $item_id );
		}

		# texty needed pgItem_mg_accept

		return true;
	}

	return false;
}

