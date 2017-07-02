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

		$method_info = billing_method( $rw_invoice['method'] );
		$method_info = $method_info['c1'] . ' - ' . $method_info['c3'];

		$content = template_engine( 'billing_userpanel_payment_offline', [

			'method_info' => $method_info ,
			'cost' => billing_format($rw_invoice['cost']),

		]);

		layout_post_box( __('فرم پرداخت بانکی'), $content, $allow_eval=false, $framed=1 );
	
	}

}







