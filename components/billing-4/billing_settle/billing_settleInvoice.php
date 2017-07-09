<?

# jalal7h@gmail.com
# 2016/10/23
# 1.2

function billing_settleInvoice( $invoice_id , $transaction ){

	#
	# invoice auth
	if(! $rw_invoice = table('billing_invoice', $invoice_id) ){
		ed();

	#
	# user auth
	} else if(! $user_id = user_logged() ){
		ed();
	} else if( $rw_invoice['user_id'] != $user_id ){
		ed();

	#
	# prevent duplication
	} else if( $rw_invoice['date'] ){
		ed();

	#
	# mark invoice as paid
	} else if(! dbs( 'billing_invoice', ['date'=>U(), 'transaction'=>$transaction], ['id'=>$invoice_id] ) ){
		ed();
	
	} else {

		#
		# increase credit (if its not wallet)
		if( $rw_invoice['method'] != 'wallet' ){
			if(! billing_userCredit($user_id, $rw_invoice['cost']) ){
				echo convbox("could not add credit ".$rw_invoice['cost']." to user $user_id. method: ".$rw_invoice['method']);
				ed();
			}
		}

		# 
		# congragulate the payment
		$vars = $rw_invoice;
		$vars['invoice_id'] = $rw_invoice['id'];
		$vars['invoice_transaction'] = $transaction;
		$vars['invoice_cost'] = billing_format($rw_invoice['cost']);
		
		echo texty( 'billing_settleInvoice', $vars );
		
		return $rw_invoice;
		
	}
	
	return false;

}







