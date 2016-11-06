<?

# jalal7h@gmail.com
# 2016/07/16
# 1.0

function billing_invoiceDetail( $invoice_id ){

	if(! $rw_invoice = table( 'billing_invoice', $invoice_id ) ){
		e( __FUNCTION__, __LINE__ );

	} else {
		return $rw_invoice;
	}

}

