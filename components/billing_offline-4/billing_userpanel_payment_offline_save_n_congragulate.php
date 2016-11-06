<?

# jalal7h@gmail.com
# 2016/07/03
# 1.0

function billing_userpanel_payment_offline_save_n_congragulate(){
	
	token_check();

	if(! $user_id = user_logged() ){
		e();
		
	} else if(! $invoice_id = $_REQUEST['invoice_id'] ){
		e();
	
	} else if(! $rw_invoice = table('billing_invoice', $invoice_id) ){
		e();

	} else if(! $transaction = trim(strip_tags($_REQUEST['transaction'])) ){
		e();
	
	} else if(! $date = trim(strip_tags($_REQUEST['date'])) ){
		e();
	
	} else if(! $date = Vaght2U($date." 12:00:00") ){
		e();
	
	} else if(! dbs( 'billing_invoice', [ 'transaction'=>$transaction.'::'.$date ], [ 'id'=>$invoice_id ] ) ){
		e();
	
	} else {
		
		$vars = $rw_invoice;
		$vars['bank_name'] = billing_method_name( $rw_invoice['method'] );
		$vars['cost'] = billing_format($rw_invoice['cost']);

		echo "<div class='_buposnc'>\n";
		echo texty( 'billing_userpanel_payment_offline_save_n_congragulate', $vars );
		echo "</div>\n";


		return true;
	}

	return false;
}







