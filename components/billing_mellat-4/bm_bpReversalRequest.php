<?

# jalal7h@gmail.com
# 2016/07/09
# 1.1

function bpReversalRequest(){
	
	if( __BP_TEST ){
		echo "waiting for bank response ... (bpSettleRequest)<br>";
		flush();
	}
	
	include_once ("modules/nusoap.mellat/nusoap.php");
	$client = new soapclient2(_MELLAT_SOAPV);
	$namespace = 'http://interfaces.core.sw.bps.com/';
	
	// Check for an error
	$err = $client->getError();
	if ($err) {
		echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
	}
	
	if(! $invoice_id = $_REQUEST['invoice_id'] ){
		ed();
	
	} else if(! $rw_invoice = table('billing_invoice', $invoice_id) ){
		ed();

	} else if(! $rw_method = table('billing_method', $rw_invoice['method'], null, 'method') ){
		ed();

	} else if(! $settleSaleOrderId = $_REQUEST['SaleOrderId'] ){
		ed();

	} else if(! $settleSaleReferenceId = $_REQUEST['SaleReferenceId'] ){
		ed();
	}
	
	// Check for an error
	$err = $client->getError();
	if ($err) {
		echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
		die();
	}
	
	$parameters = [
		'terminalId' => $rw_method['terminal_id'],
		'userName' => $rw_method['terminal_user'],
		'userPassword' => $rw_method['terminal_pass'],
		'orderId' => $invoice_id,
		'saleOrderId' => $settleSaleOrderId,
		'saleReferenceId' => $settleSaleReferenceId
	];
	
	// Call the SOAP method
	$result = $client->call('bpReversalRequest', $parameters, $namespace);
	
	if(__BP_TEST){
		echo "<div style='position:absolute; left:700px; top:500px;' ><b style='color:green;'>bpSettleRequest</b>:<bt>";
		echo "<pre>parameters:";
		print_r($parameters);
		echo "</pre>";
		
		echo "<pre>bpReversalRequest - result:";
		print_r($result);
		echo "</pre>";
		echo "</div>";
	}

	// Check for a fault
	if ($client->fault) {
		echo '<h2>Fault</h2><pre>';
		print_r($result);
		echo '</pre>';
		die();
	
	} else if($err = $client->getError()) {
		// Display the error
		echo '<h2>Error</h2><pre>' . $err . '</pre>';
		die();
	
	} else if($result['return']==0){
		// Display the result
		// Update Table, Save Verify Status 
		// Note: Successful Verify means complete successful sale was done.
		# echo "<script>alert('Verify Response is : " . $resultStr . "');</script>";
		# echo "Verify Response is : " . $resultStr;
		return true;
	
	} else {
		return false;
	}

}








