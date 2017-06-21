<?php

# jalal7h@gmail.com
# 2017/02/07
# 1.1

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
		$vars['invoice_cost'] = billing_format($rw_invoice['cost']);
		$vars['user_name'] = $rw_user['name'];
		$vars['invoice_payment_link'] = billing_invoiceLink( $vars['invoice_id'] );
		$vars['invoice_payment_button'] = "<a class=\"btn btn-primary btn-sm\" href=\"".$vars['invoice_payment_link']."\">".__('فرم پرداخت صورتحساب')."</a>";

		$prompt = texty( 'billing_invoiceMake_congratulate', $vars, $user_id );
		if(! que::pop( 'billing_invoiceMake_congratulate-silent' ) ){
			echo $prompt;
		}

	}

}










