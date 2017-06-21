<?php

# jalal7h@gmail.com
# 2017/06/10
# 1.4

function billing_management_user_invoicelist(){
	
	switch ($_REQUEST['do2']) {
		
		case 'form':
			return billing_management_user_invoicelist_newForm();
		
		case 'saveEdit':
			billing_management_user_invoicelist_saveForm();

	}

	$p = intval($_REQUEST['p']);
	$tdd = 10;
	$stt = $p * $tdd;
	
	if(! $user_id = $_REQUEST['id'] ){
		ed();
	}

	$query = " SELECT * FROM `billing_invoice` WHERE `date`>0 AND `user_id`='$user_id' AND `method`!='wallet' ORDER BY `date` DESC LIMIT $stt,$tdd ";

	if(! $user = (object) table("user", $user_id) ){
		e();
	
	} else if(! $rs = dbq( $query ) ){
		e();
	
	} else {

		$user->credit = billing_userCredit( $user_id );
		$user->credit = $user->credit ? billing_format($user->credit) : __('صفر');

		$user->payments = billing_userPayments( $user_id );
		$user->payments = $user->payments ? billing_format($user->payments) : __('صفر');

		while( $rw = dbf($rs) ){
			$invoice = (object) $rw;
			$invoice->method = billing_method_name( $invoice->method );
			$invoice->cost = billing_format( $invoice->cost );
			$invoice->date = substr( UDate( $invoice->date ), 0, 16 );
			$invoice->link = billing_invoiceLink( $rw );
			$invoices[] = $invoice;
		}

		$link = _URL."/admin/billing/user/$user_id/%%";
		$paging = listmaker_paging($query, $link, $tdd);


		echo template_engine( 'billing_mg_user_invoicelist', [ 'user'=>$user, 'invoices'=>$invoices, 'paging'=>$paging ] );

	}

}





