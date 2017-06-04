<?

# jalal7h@gmail.com
# 2017/06/03
# 1.2

# table , id cost user_id mgire, va ye record tuye table invoice ezafe mikone.

function billing_invoiceMake( $cost, $order_table="", $order_id=0, $user_id=null ){
	
	#
	# user check
	if(! $user_id ){
		if(! $user_id = user_logged() ){
			ed();
		}
	}
	
	#
	# cost verification
	if( $cost <=0 ){
		e();

	#
	# user verification
	} else if(! $rw_user = table('user', $user_id) ){
		e();
	
	#
	# insert query
	} else if(! $invoice_id = dbs( 'billing_invoice', [ 'user_id'=>$user_id, 'cost'=>$cost ] ) ){
		e();

	#
	# if order / set the order table and id
	} else if( $order_table ){

		#
		# order verification
		if(! $order_id ){
			e();
		} else if(! is_table($order_table) ){
			e();
		} else if(! $rw_order = table($order_table, $order_id) ){
			e();

		#
		# repeat verification
		} else if(! $rs_repeat = dbq(" SELECT * FROM `billing_invoice` WHERE `order_table`='$order_table' AND `order_id`='$order_id' LIMIT 1 ") ){
			e( dbe() );
			
		} else if( dbn($rs_repeat) ){
			if(! dbrm("billing_invoice",$invoice_id) ){
				e();
			}
			e( 'repeaty order' );

		} else if(! dbs( 'billing_invoice', ['order_table'=>$order_table, 'order_id'=>$order_id], ['id'=>$invoice_id]) ){
			e();

		} else {
			billing_invoiceMake_congratulate( $invoice_id );
			return $invoice_id;
		}

		return false;
	}

	#
	# return
	if( $invoice_id ){
		billing_invoiceMake_congratulate( $invoice_id );
		return $invoice_id;
	} else {
		return false;
	}

}










