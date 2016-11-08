<?

# jalal7h@gmail.com
# 2016/10/23
# 1.1

function billing_userpanel_payment_redirectToMethod(){
	
	#
	# verifications
	if(! $user_id = user_logged() ){
		e();

	} else if(! $invoice_id = $_REQUEST['invoice_id'] ){
		e();

	} else if(! $rw_invoice = table('billing_invoice', $invoice_id) ){
		echo convbox( __('صورتحساب با شناسه %% یافت نشد!', [$invoice_id] ), 'transparent');

	} else if(! $rw_invoice['user_id'] == $user_id ){
		e();

	} else if( $rw_invoice['date'] ){
		echo convbox( __('صورتحساب با شناسه %% قبلا اعتبار‌سنجی شده است!', [$invoice_id] ) , 'red');

	} else {

		#
		# method
		$method = $rw_invoice['method'];

		#
		# redirections
		switch ( substr($method,0,6) ) {
			
			case 'wallet':
				$func = 'billing_userpanel_payment_wallet';
				break;
			
			case 'manual':
				$func = 'billing_userpanel_payment_offline';				
				break;
			
			default:
				$func = 'billing_userpanel_payment_'.$method;
				break;
		}
		#
		$func( $invoice_id );
		#

	}

	return false;

}





