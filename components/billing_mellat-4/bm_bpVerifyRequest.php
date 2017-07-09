<?

# jalal7h@gmail.com
# 2016/10/23
# 1.2

//call verify via nusoap
function bpVerifyRequest(){

	if( __BP_TEST ){
		var_dump($_REQUEST);
		echo "<hr>";
		echo "bpInquiryRequest<br>";
		echo "waiting for bank response ...";flush();
	}
	
	include_once ("modules/nusoap.mellat/nusoap.php");
	$client = new soapclient2(_MELLAT_SOAPV);
	
	// Check for an error
	$err = $client->getError();
	if($err) {
		echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
		die();
	}
	
	$namespace='http://interfaces.core.sw.bps.com/';
	
	if(! $invoice_id = $_REQUEST['invoice_id'] ){
		ed(__FUNCTION__,__LINE__);
	
	} else if(! $rw_invoice = table('billing_invoice', $invoice_id) ){
		ed(__FUNCTION__,__LINE__);

	} else if(! $rw_method = table('billing_method', $rw_invoice['method'], null, 'method') ){
		ed(__FUNCTION__,__LINE__);
	
	} else if(! $verifySaleOrderId = $_REQUEST['SaleOrderId'] ){
		ed(__FUNCTION__,__LINE__);
	
	} else if(! $verifySaleReferenceId = $_REQUEST['SaleReferenceId'] ){
		ed(__FUNCTION__,__LINE__);
	}
	
	$parameters = [
		'terminalId' => $rw_method['terminal_id'],
		'userName' => $rw_method['terminal_user'],
		'userPassword' => $rw_method['terminal_pass'],
		'orderId' => $invoice_id,
		'saleOrderId' => $verifySaleOrderId,
		'saleReferenceId' => $verifySaleReferenceId
	];

	// Call the SOAP method
	$result = $client->call('bpVerifyRequest', $parameters, $namespace);
	
	
	if( __BP_TEST ){
		echo "<div style='position:absolute; left:700px; top:25px;' ><b style='color:green;'>bpVerifyRequest</b>:<bt>";
		echo "<pre>parameters:";
		print_r($parameters);
		echo "</pre>";

		echo "<pre>bpPayRequest-result:";
		echo "::".$result."::";
		echo "</pre>";
		echo "</div>";
	}
	
	// Check for a fault
	if ($client->fault) {
		echo '<h2>Fault</h2><pre>';
		print_r($result);
		echo '</pre>';
		die();
	
	// Display the error
	} else if($err = $client->getError()) {
		echo '<h2>Error</h2><pre>' . $err . '</pre>';
		die();
	
	// Display the result
	// Update Table, Save Verify Status 
	// Note: Successful Verify means complete successful sale was done.
	# echo "<script>alert('Verify Response is : " . $resultStr . "');</script>";
	# echo "Verify Response is : " . $resultStr;
	} else if( $return == 0 ){
		
		return true;
	
	} else if(! bpReversalRequest() ){
		echo "<hr>".$result['return']."<hr>";
		echo "<font color=red >transaction not reversed, wrong response from bpReversalRequest.</font>";
		return false;
	
	} else {
		echo "<hr>".$result['return']."<hr>";
		echo "<font color=green >transaction reversed, please try again.</font>";
		return false;
	}

}






