<?

# jalal7h@gmail.com
# 2017/05/24
# 1.1

function billing_invoiceDetail( $invoice_id ){

	if(! $rw_invoice = table( 'billing_invoice', $invoice_id ) ){
		e();

	} else {
		return $rw_invoice;
	}

}

