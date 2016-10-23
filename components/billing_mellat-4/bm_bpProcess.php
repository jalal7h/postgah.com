<?

# jalal7h@gmail.com
# 2016/07/09
# 1.0

function bpProcess(){
	
	if(! $_REQUEST ){
		e(__FUNCTION__,__LINE__);

	} else if( $_REQUEST['ResCode']!=0 ){
		echo "<div class='convbox'>پرداخت شما لغو شد!</div>";
		return false;

	} else if(! bpVerifyRequest() ){
		
		if(! bpInquiryRequest() ){
			
			if(! bpReversalRequest() ){
				echo "<hr>".$result['return']."<hr>";
				echo "<font color=red >transaction not reversed, wrong response from bpReversalRequest.</font>";
				return false;
			
			} else {
				echo "<hr>".$result['return']."<hr>";
				echo "<font color=green >transaction reversed, please try again.</font>";
				return false;
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




