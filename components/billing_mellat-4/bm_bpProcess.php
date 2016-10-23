<?

# jalal7h@gmail.com
# 2016/10/23
# 1.1

function bpProcess(){
	
	if(! $_REQUEST ){
		e(__FUNCTION__,__LINE__);

	} else if(! $invoice_id = $_REQUEST['invoice_id'] ){
		e(__FUNCTION__,__LINE__);

	} else if( $_REQUEST['ResCode'] != 0 ){
		
		echo "<div class='convbox transparent'>پرداخت شما لغو شد!</div>";
		
		#
		# remove the generated invoice, if its not related to any order
		if(! $rw_invoice = billing_invoiceDetail($invoice_id) ){
			e(__FUNCTION__,__LINE__);
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
			e(__FUNCTION__,__LINE__);
		
		} else if(! bpSettleDone($_REQUEST['SaleReferenceId']) ){
			e(__FUNCTION__,__LINE__);
		
		} else {
			return true;
		}

	} else if(! bpSettleRequest() ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! bpSettleDone() ){
		e(__FUNCTION__,__LINE__);
	
	} else {
		return true;
	}

	return false;

}




