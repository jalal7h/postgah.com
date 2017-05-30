<?

# jalal7h@gmail.com
# 2017/05/00
# 1.1

# update :
#	method e pardakht
#	ijad e faktor ba mablagh e tain shode [age charge-hesab hast]
#	ejra e pardakht (age online e redirect, age offline e form e pardakht, age kif e pul e kasr e hesab)

function billing_userpanel_payment_submit(){

	#
	# token check
	token_check();

	#
	# user authenticate
	if(! $user_id = user_logged() ){
		e();
	
	#
	# check variables
	} else if(! $method = $_REQUEST['method'] ){
		e();

	} else {

		# 
		# order payment
		if( $invoice_id = $_REQUEST['invoice_id'] ){
			if(! $rw_invoice = billing_invoiceDetail( $invoice_id ) ){
				return e();
			} else {
				$cost = $rw_invoice['cost'];
			}

		#
		# charge account
		} else {
			if(! $cost = intval($_REQUEST['cost']) ){
				return e();
			} else if( $cost <=0 ){
				return e();
			} else if(! $invoice_id = billing_invoiceMake( $cost ) ){
				return e();
			} else {
				//
			}
		}

		#
		# set method
		if(! dbs( 'billing_invoice', ['method'=>$method], ['id'=>$invoice_id] ) ){
			e();
		
		#
		# handle payment form
		} else {
			echo "<script> location.href = '"._URL."/?page=".$_REQUEST['page']."&do_slug=".$_REQUEST['do_slug']."&do2=redirect&invoice_id=".$invoice_id."'; </script>";
			die();
		}

	}

	return false;
}







