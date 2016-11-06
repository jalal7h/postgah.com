<?

# jalal7h@gmail.com
# 2016/07/08
# 1.0

function billing_management_offline_list_remove(){
	
	if(! $invoice_id = $_REQUEST['id'] ){
		e();
	
	} else if(! $rw_invoice = table("billing_invoice", $invoice_id) ){
		e();
	
	} else if(! billing_userCredit( $rw_invoice['user_id'] , -1 * $rw_invoice['cost'] ) ){
		e();
	
	} else if(! dbrm("billing_invoice") ){
		e();

	} else {
		return true;
	}

	return false;

}



