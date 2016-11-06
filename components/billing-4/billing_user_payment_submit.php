<?

# jalal7h@gmail.com
# 2016/07/04
# 1.0

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
		e(__FUNCTION__,__LINE__);
	
	#
	# check variables
	} else if(! $cost = intval($_REQUEST['cost']) ){
		e(__FUNCTION__,__LINE__);
	} else if( $cost <=0 ){
		e(__FUNCTION__,__LINE__);
	} else if(! $method = $_REQUEST['method'] ){
		e(__FUNCTION__,__LINE__);

	} else {

		# 
		# order payment
		if( $invoice_id = $_REQUEST['invoice_id'] ){

		#
		# charge account
		} else {
			if(! $invoice_id = billing_invoiceMake( $cost ) ){
				return false;
			}
		}

		#
		# set method
		if(! dbs( 'billing_invoice', ['method'=>$method], ['id'=>$invoice_id] ) ){
			e(__FUNCTION__,__LINE__);
		
		#
		# handle payment form
		} else {
			echo "<script> location.href = '"._URL."/?page=".$_REQUEST['page']."&do=".$_REQUEST['do']."&do2=redirect&invoice_id=".$invoice_id."'; </script>";
			die();
		}

	}

	return false;
}







