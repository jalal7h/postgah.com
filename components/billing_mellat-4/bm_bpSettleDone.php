<?

# jalal7h@gmail.com
# 2016/07/09
# 1.1

function bpSettleDone(){
	
	if(! $transaction = $_REQUEST['SaleReferenceId'] ){
		e();

	} else if(! $invoice_id = intval($_REQUEST['invoice_id']) ){
		e();

	} else {
		return billing_settle( $invoice_id , $transaction );
	}

	return false;
	
}

