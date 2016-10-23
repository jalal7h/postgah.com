<?

# jalal7h@gmail.com
# 2016/07/09
# 1.1

function bpSettleDone(){
	
	if(! $transaction = $_REQUEST['SaleReferenceId'] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $invoice_id = intval($_REQUEST['SaleCode']) ){
		e(__FUNCTION__,__LINE__);

	} else {
		return billing_settle( $invoice_id , $transaction );
	}

	return false;
}

