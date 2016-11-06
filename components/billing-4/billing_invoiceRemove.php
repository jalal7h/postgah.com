<?

# jalal7h@gmail.com
# 2016/10/23
# 1.0

function billing_invoiceRemove( $invoice_id ){
	
	return dbrm( 'billing_invoice', $invoice_id );

}










