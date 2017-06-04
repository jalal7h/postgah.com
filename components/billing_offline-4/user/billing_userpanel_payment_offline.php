<?

# jalal7h@gmail.com
# 2016/12/21
# 1.1

function billing_userpanel_payment_offline(){

	#
	# verifications
	if(! $user_id = user_logged() ){
		e();

	} else if(! $invoice_id = $_REQUEST['invoice_id'] ){
		e();

	} else if(! $rw_invoice = billing_invoiceDetail($invoice_id) ){
		e();

	} else if( $rw_invoice['user_id'] != $user_id ){
		e();

	} else if( $rw_invoice['date'] ){
		e();

	} else {

		switch ($_REQUEST['do3']) {
			case 'save':
				return billing_userpanel_payment_offline_save_n_congragulate();
		}

		echo template_engine( 'billing_userpanel_payment_offline', [

			'method_name' => billing_method( $rw_invoice['method'] )['c1'] ,
			'cost' => billing_format($rw_invoice['cost']),

		]);
	
	}

}







