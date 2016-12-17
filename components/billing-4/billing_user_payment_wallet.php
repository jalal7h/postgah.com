<?

# jalal7h@gmail.com
# 2016/07/09
# 1.0

$GLOBALS['billing_method']['wallet'] = 'کیف پول';

function billing_userpanel_payment_wallet( $invoice_id ){
	
	// if(! $user_id = user_logged() ){
	// 	e(__FUNCTION__,__LINE__);
	
	// } else if(! $credit = billing_userCredit($user_id) ){
	// 	e(__FUNCTION__,__LINE__);
	
	// } else if(! $rw_invoice = table("billing_invoice", $invoice_id) ){
	// 	e(__FUNCTION__,__LINE__);
	
	// } else if( $rw_invoice['date'] ){
	// 	e(__FUNCTION__,__LINE__);
	// // } else if(! $rw_invoice['order_table'] ){
	// // 	e(__FUNCTION__,__LINE__);
	
	// // } else if(! $rw_invoice['order_id'] ){
	// // 	e(__FUNCTION__,__LINE__);
	
	// } else if(! $cost = $rw_invoice['cost'] ){
	// 	e(__FUNCTION__,__LINE__);
	
	// } else if( $cost > $credit ){
	// 	e(__FUNCTION__,__LINE__);
	
	// } else if(! billing_userCredit($user_id , -1*$cost) ){
	// 	e(__FUNCTION__,__LINE__);
	
	// } else {

	$rw_invoice = table( 'billing_invoice', $invoice_id );
	$vars['invoice_id'] = $rw_invoice['id'];
	$vars['invoice_cost'] = billing_format($rw_invoice['cost']);
	texty( 'billing_userpanel_payment_wallet', $vars );

	// billing_settleOrder( $rw_invoice['order_table'] , $rw_invoice['order_id'] );
	// }

	return billing_settle( $invoice_id, "wallet" );

}






