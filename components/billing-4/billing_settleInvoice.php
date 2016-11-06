<?

# jalal7h@gmail.com
# 2016/10/23
# 1.2

function billing_settleInvoice( $invoice_id , $transaction ){

	#
	# invoice auth
	if(! $rw_invoice = table('billing_invoice', $invoice_id) ){
		ed(__FUNCTION__,__LINE__);

	#
	# user auth
	} else if(! $user_id = user_logged() ){
		ed(__FUNCTION__,__LINE__);
	} else if( $rw_invoice['user_id'] != $user_id ){
		ed(__FUNCTION__,__LINE__);

	#
	# prevent duplication
	} else if( $rw_invoice['date'] ){
		ed(__FUNCTION__,__LINE__);

	#
	# mark invoice as paid
	} else if(! dbs( 'billing_invoice', ['date'=>U(), 'transaction'=>$transaction], ['id'=>$invoice_id] ) ){
		ed(__FUNCTION__,__LINE__);
	
	} else {

		#
		# increase credit
		if( $rw_invoice['method'] != 'wallet' ){
			if(! billing_userCredit($user_id, $rw_invoice['cost']) ){
				ed(__FUNCTION__,__LINE__);
			}
		}

		# 
		# congragulate the payment
		$vars = $rw_invoice;
		$vars['cost'] = number_format($rw_invoice['cost']).' '.setting('money_unit');
		echo texty( 'billing_settleInvoice', $vars );
		
		return $rw_invoice;
		
	}
	
	return false;

}







