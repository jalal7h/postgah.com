<?

# jalal7h@gmail.com
# 2017/05/25
# 1.0

$GLOBALS['billing_method']['wallet'] = 'کیف پول';

function billing_userpanel_payment_wallet( $invoice_id ){
	
	if(! $user_id = user_logged() ){
		e();
	
	} else if(! $credit = billing_userCredit($user_id) ){
		e();
	
	} else if(! $rw_invoice = table("billing_invoice", $invoice_id) ){
		e();
	
	} else if( $rw_invoice['date'] ){
		e();
	
	} else if(! $cost = $rw_invoice['cost'] ){
		e();
	
	} else if( $cost > $credit ){
		e();
	
	} else if(! billing_userCredit($user_id , -1*$cost) ){
		e();
	
	} else {

		// vaghti ke pardakhti az credit anjam mishe
		// ke hamrahesh ye invoice payment mikhore
		// va gahi, ye order taid mikhore

		// $rw_invoice = table( 'billing_invoice', $invoice_id );
		// $vars['invoice_id'] = $rw_invoice['id'];
		// $vars['invoice_cost'] = billing_format($rw_invoice['cost']);
		// $vars['invoice_transaction'] = "TR".$rw_invoice['transaction'];
		// texty( 'billing_userpanel_payment_wallet', $vars );
		

		$transaction = $invoice_id;
		$transaction = md5($transaction);
		$transaction = substr($transaction, 0, 12);
		$transaction = hexdec($transaction);
		$transaction = substr($transaction, 0, 14);

		$transaction = "WL". $transaction;

		return billing_settle( $invoice_id, $transaction );
	
	}

	return false;

}






