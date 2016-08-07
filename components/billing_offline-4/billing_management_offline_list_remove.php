<?

# jalal7h@gmail.com
# 2016/07/08
# 1.0

function billing_management_offline_list_remove(){
	
	if(! $invoice_id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! $rw_invoice = table("billing_invoice", $invoice_id) ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! billing_userCredit( $rw_invoice['user_id'] , -1 * $rw_invoice['cost'] ) ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbq(" DELETE FROM `billing_invoice` WHERE `id`='$invoice_id' LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__);

	} else {
		return true;
	}

	return false;
}
