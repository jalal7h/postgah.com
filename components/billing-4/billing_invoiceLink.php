<?

# jalal7h@gmail.com
# 2017/02/08
# 1.1

function billing_invoiceLink( $rw ){

	if( is_numeric($rw) ){
		$invoice_id = $rw;
	} else {
		$invoice_id = $rw['id'];
	}

	return _URL.'/'.Slug::getSlugByName('userpanel').'/invoice/'.$invoice_id;

}
