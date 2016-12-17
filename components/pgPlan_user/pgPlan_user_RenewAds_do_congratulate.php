<?

function pgPlan_user_RenewAds_do_congratulate( $IPD_id, $invoice_id ){

	$rw_IPD = table( 'item_plan_duration', $IPD_id );
	
	$item_id = $rw_IPD['item_id'];
	$rw_item = table('item', $item_id);
	
	$rw_invoice = billing_invoiceDetail( $invoice_id );
	$cost = $rw_invoice['cost'];

	$user_id = $rw_invoice['user_id'];
	$rw_user = table( 'user', $user_id );

	$rw_PD = table( 'plan_duration', $rw_IPD['plan_duration_id'] );
	$rw_plan = table( 'plan', $rw_PD['plan_id'] );

	$vars['item_id'] = $item_id;
	$vars['item_name'] = $rw_item['name'];
	$vars['item_invoice_id'] = $invoice_id;
	$vars['item_cost'] = billing_format($cost);
	$vars['item_plan'] = $rw_plan['name_on_form'];
	$vars['item_duration'] = $rw_PD['hour']." ساعت";

	$vars['item_payment_link'] = _URL.'/?page='.$_REQUEST['page'].'&do=billing_userpanel_payment&invoice_id='.$invoice_id;
	$vars['item_payment_button'] = '<a class="submit_button" href="'.$vars['item_payment_link'].'">پرداخت '.lmtc('billing_invoice')[0].'</a>';
	$vars['invoice_list_link'] = _URL.'/?page='.$_REQUEST['page'].'&do=billing_userpanel_list';
	$vars['invoice_list_button'] = '<a class="submit_button" href="'.$vars['invoice_list_link'].'">لیست '.lmtc('billing_invoice')[1].'</a>';
	
	echo texty( 'pgPlan_user_RenewAds_do_congratulate', $vars );

	return true;

}







