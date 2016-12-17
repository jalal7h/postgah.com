<?

# jalal7h@gmail.com
# 2016/07/16
# 1.0

function billing_invoiceMake_congratulate( $invoice_id ){
	
	if(! $rw_invoice = billing_invoiceDetail($invoice_id) ){
		e();

	} else if(! $user_id = $rw_invoice['user_id'] ){
		e();

	} else if(! $rw_user = table('user', $user_id) ) {
		e();

	} else {

		// if( $rw_invoice['order_table'] and $rw_invoice['order_id'] ){
		// 	$order_table_name = lmtc( $rw_invoice['order_table'] )[0];
		// }

		$vars['invoice_id'] = $invoice_id;
		$vars['invoice_cost'] = $rw_invoice['cost'];
		$vars['user_name'] = $rw_user['name'];
		$vars['invoice_payment_link'] = _URL.'/?page='.$_REQUEST['page'].'&do=billing_userpanel_payment&invoice_id='.$vars['invoice_id'];

		echo texty( 'billing_invoiceMake_congratulate', $vars, $user_id );

	}

}










