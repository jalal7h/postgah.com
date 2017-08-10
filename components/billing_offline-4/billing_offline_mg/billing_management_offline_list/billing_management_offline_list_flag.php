<?php

# jalal7h@gmail.com
# 2017/08/10
# 1.4

function billing_management_offline_list_flag(){
	
	if(! $invoice_id = $_REQUEST['id'] ){
		e();
	
	} else if(! $rw_invoice = billing_invoiceDetail($invoice_id) ){
		e();
	
	} else if( $rw_invoice['date'] ){
		e();
	
	} else {

		list( $transaction, $date ) = explode('::',$rw_invoice['transaction']);

		// if(! dbs( 'billing_invoice', [ 'transaction'=>$transaction, 'date'=>$date ], ['id'] ) ){
			// e();
		
		// } else if(! billing_userCredit( $rw_invoice['user_id'] , $rw_invoice['cost'] ) ){
			// e();
		
		// } else {

			// take care about orders behind this invoice.

		$vars = $rw_invoice;
		$vars['bank_name'] = billing_method_name( $rw_invoice['method'] );
		$vars['user_name'] = table( 'user', $rw_invoice['user_id'], 'name' );
		$vars['invoice_cost'] = billing_format($rw_invoice['cost']);
		
		echo texty( 'billing_management_offline_list_flag', $vars, [ 0, $rw_invoice['user_id'] ] );

		# ..
		PretendUser::to( $rw_invoice['user_id'] );
		$result_of_settle = billing_settle( $invoice_id , $transaction, $date );
		PretendUser::back();
		# ..
		
		return $result_of_settle;
		
			// return true;
		// }
			
	}

	return false;

}




