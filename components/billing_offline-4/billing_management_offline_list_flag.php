<?

# jalal7h@gmail.com
# 2016/07/08
# 1.2

function billing_management_offline_list_flag(){
	
	if(! $invoice_id = $_REQUEST['id'] ){
		e();
	
	} else if(! $rw_invoice = table("billing_invoice", $invoice_id) ){
		e();
	
	} else if( $rw_invoice['date'] ){
		e();
	
	} else if(! dbs( 'billing_invoice', [ 'transaction'=>explode('::',$rw_invoice['transaction'])[0], 'date'=>explode('::',$rw_invoice['transaction'])[1] ], ['id'] ) ){
		e();
	
	} else if(! billing_userCredit( $rw_invoice['user_id'] , $rw_invoice['cost'] ) ){
		e();
	
	} else {

		$vars = $rw_invoice;
		$vars['bank_name'] = billing_method_name( $rw_invoice['method'] );
		$vars['user_name'] = table( 'user', $rw_invoice['user_id'], 'name' );
		$vars['cost'] = number_format($rw_invoice['cost'])." ".setting('money_unit');
		
		echo texty( 'billing_management_offline_list_flag', $vars, $rw_invoice['user_id'] );

		return true;
		
	}

	return false;

}




