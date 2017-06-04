<?

# jalal7h@gmail.com
# 2016/07/09
# 1.1

# accounting user wallet, setting order as paid [if exists] and at the final congragulating.

# faktor ro taid mikone, etebar ezafe mikone
# + age order_id dar kar bashe, taid mikone, az hesab kam mikone


function billing_settle( $invoice_id , $transaction ){

	#
	# confirm the invoice
	if(! $rw_invoice = billing_settleInvoice( $invoice_id , $transaction ) ){
		e();

	# 
	# confirm the order [if exists] and decrease credit
	} else if(! billing_settleOrder( $rw_invoice['order_table'], $rw_invoice['order_id'] ) ){
		e();

	} else {
		return true;
	}

	return false;

}




