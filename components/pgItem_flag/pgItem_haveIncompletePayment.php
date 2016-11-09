<?

function pgItem_haveIncompletePayment( $rw ){

	$item_id = $rw['id'];

	if(! pgItem_isVerifyWaiting($rw) ){
		return false;
	
	} else if(! $rs = dbq(" SELECT `id` FROM `item_plan_duration` WHERE `item_id`='$item_id' AND `flag`='0' AND `request_for_date`='0' ") ){
		e();
		
	} else if(! dbn($rs) ){
		return false;

	} else {
		return dbr($rs,0,0); // IPD_id
	}

}

