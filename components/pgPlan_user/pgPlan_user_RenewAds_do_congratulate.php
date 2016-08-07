<?

function pgPlan_user_RenewAds_do_congratulate( $IPD_id, $invoice_id ){

	$rw_IPD = table( 'item_plan_duration', $IPD_id );
	
	$item_id = $rw_IPD['item_id'];
	$rw_item = table('item', $item_id);
	
	$rw_invoice = billing_invoiceDetail( $invoice_id );
	$cost = $rw_invoice['cost'];

	$user_id = $rw_invoice['user_id'];
	$rw_users = table( 'users', $user_id );

	$rw_PD = table( 'plan_duration', $rw_IPD['plan_duration_id'] );
	$rw_plan = table( 'plan', $rw_PD['plan_id'] );

	$vars = [
		'item_id' => $item_id,
		'invoice_id' => $invoice_id,
		'cost' => number_format($cost)." ".setting('money_unit'),
		'button_payment_form' => '<a class="submit_button" href="'._URL.'/?page='.$_REQUEST['page'].'&do=billing_userpanel_payment&invoice_id='.$invoice_id.'">پرداخت فاکتور</a>',
		'button_list_of_invoices' => '<a class="submit_button" href="'._URL.'/?page='.$_REQUEST['page'].'&do=billing_userpanel_list">لیست فاکتور ها</a>',
	];
	
	$vars['user_name'] = $rw_users['name'];
	$vars['item_name'] = $rw_item['name'];
	$vars['plan_name'] = $rw_plan['name_on_form'];
	$vars['duration'] = $rw_PD['hour']." ساعت";
	$vars['invoice_link'] = _URL.'/?page='.$_REQUEST['page'].'&do=billing_userpanel_payment&invoice_id='.$invoice_id;
	
	echo texty( 'pgPlan_user_RenewAds_do_congratulate', $vars );

	return true;

}







