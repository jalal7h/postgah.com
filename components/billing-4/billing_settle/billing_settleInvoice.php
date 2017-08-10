<?php

# jalal7h@gmail.com
# 2017/08/10
# 1.3

function billing_settleInvoice( $invoice_id , $transaction, $date=null ){

	# 
	# if date is not defined, set it.
	if(! $date ){
		$date = U();
	}

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
	} else if(! dbs( 'billing_invoice', ['date'=>$date, 'transaction'=>$transaction], ['id'=>$invoice_id] ) ){
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
		# congratulate the payment (if its not offline)
		if( substr( $rw_invoice['method'], 0, 6 ) == 'manual' ){

			$vars = $rw_invoice;
			$vars['invoice_id'] = $rw_invoice['id'];
			$vars['invoice_transaction'] = $transaction;
			$vars['invoice_cost'] = billing_format($rw_invoice['cost']);
			
			echo texty( 'billing_settleInvoice', $vars );

		}
		
		return $rw_invoice;
		
	}
	
	return false;

}







