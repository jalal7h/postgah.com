<?

function pgItem_isAnyWaitingOfflinePayment( $rw ){

	if(! $IPD_id = pgItem_haveIncompletePayment($rw) ){
		return false;
	
	} else if(! $rw_invoice = billing_invoiceDetail_byOrderDetail( 'item_plan_duration', $IPD_id ) ){
		return false;

	} else if( substr($rw_invoice['method'], 0, 6) != 'manual' ){
		return false;

	} else if( $rw_invoice['date'] != 0 ){
		return false;

	} else {
		return true;
	}

}








