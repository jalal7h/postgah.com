<?

function pgPlan_user_RenewAds_form( $rw_item ){

	$c.= "<div class='".__FUNCTION__."_buffer' item_id='".$rw_item['id']."' >";
	$c.= token_make();

	if(! $plan_id = $rw_item['plan'] ){
		// e(__FUNCTION__,__LINE__);
	
	} else if(! $rs = dbq(" SELECT * FROM `plan_duration` WHERE `plan_id`='$plan_id' ORDER BY `hour` ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs) ){
		e(__FUNCTION__,__LINE__);

	} else while( $rw = dbf($rs) ){
		$c.= "<label>";
		
		$c.= '<input type="radio" name="plan_duration_id" value="'.$rw['id'].'" />'.
			$rw['name'].' / '.number_format($rw['cost']).' '.setting('money_unit').
			"";

		$c.= "</label>";
	}
	
	$c.= "</div>";

	return $c;
}

