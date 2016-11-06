<?

# jalal7h@gmail.com
# 2016/10/23
# 1.1

function bpProcess(){
	
	if(! $_REQUEST ){
		e();

	} else if(! $invoice_id = $_REQUEST['invoice_id'] ){
		e();

	} else if( $_REQUEST['ResCode'] != 0 ){
		
		echo convbox( __('پرداخت شما لغو شد!'), 'transparent' );
		
		#
		# remove the generated invoice, if its not related to any order
		if(! $rw_invoice = billing_invoiceDetail($invoice_id) ){
			e();
		} else if( $rw_invoice['order_table'] == '' ){
			billing_invoiceRemove($invoice_id);
		}

	} else if(! bpVerifyRequest() ){
		
		if(! bpInquiryRequest() ){
			
			if(! bpReversalRequest() ){
				echo "<hr>".$result['return']."<hr>";
				echo "<font color=red >transaction not reversed, wrong response from bpReversalRequest.</font>";
			
			} else {
				echo "<hr>".$result['return']."<hr>";
				echo "<font color=green >transaction reversed, please try again.</font>";
			}
		
		} else if(! bpSettleRequest() ){
			e();
		
		} else if(! bpSettleDone($_REQUEST['SaleReferenceId']) ){
			e();
		
		} else {
			return true;
		}

	} else if(! bpSettleRequest() ){
		e();
	
	} else if(! bpSettleDone() ){
		e();
	
	} else {
		return true;
	}

	return false;

}




