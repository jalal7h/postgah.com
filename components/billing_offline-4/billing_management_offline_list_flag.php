<?

# jalal7h@gmail.com
# 2016/07/08
# 1.2

function billing_management_offline_list_flag(){
	
	if(! $invoice_id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! $rw_invoice = table("billing_invoice", $invoice_id) ){
		e(__FUNCTION__,__LINE__);
	
	} else if( $rw_invoice['date'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbs( 'billing_invoice', [ 'transaction'=>explode('::',$rw_invoice['transaction'])[0], 'date'=>explode('::',$rw_invoice['transaction'])[1] ], [ 'id'=>$invoice_id ] ) ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! billing_userCredit( $rw_invoice['user_id'] , $rw_invoice['cost'] ) ){
		e(__FUNCTION__,__LINE__);
	
	} else {

		$vars = $rw_invoice;
		$vars['bank_name'] = billing_method_name( $rw_invoice['method'] );
		$vars['user_name'] = table( 'users', $rw_invoice['user_id'], 'name' );
		$vars['cost'] = number_format($rw_invoice['cost'])." ".setting('money_unit');
		
		echo texty( 'billing_management_offline_list_flag', $vars, $rw_invoice['user_id'] );

		return true;
	}

	return false;
}




