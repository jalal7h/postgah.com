<?php

# jalal7h@gmail.com
# 2017/06/09
# 1.1

function bpPayRequest(){
	
	if( __BP_TEST ){
		echo "bpInquiryRequest<br>";
		echo "waiting for bank response ...";
		flush();
	}
	
	if(! $invoice_id = $_REQUEST['invoice_id'] ){
		ed();

	} else if(! $rw_invoice = table('billing_invoice', $invoice_id) ){
		ed();

	} else if(! $rw_method = table('billing_method', $rw_invoice['method'], null, 'method') ){
		ed();

	} else if( $rw_method['unit'] < 0 ){
		ed();

	} if(! $amount = intval($_REQUEST['Amount']) / $rw_method['unit'] ){
		ed();

	}
	
	if( __BP_TEST ){
		echo "waiting for bank response ... (bpPayRequest)<br>";
		flush();
	}
	
	require_once("modules/nusoap.mellat/nusoap.php"); 
	$client = new soapclient2(_MELLAT_SOAPV);
	$namespace = 'http://interfaces.core.sw.bps.com/';
	
	// Check for an error
	$err = $client->getError();
	if ($err) {
		echo convbox_back( '<pre>'.$err.'</pre>', 'red' );
		die();
	}
	
	$localDate = substr(date( 'Ymd', U() ), 2);
	$localTime = date('His', U() );
	$additionalData = "";
	$callBackUrl = _URL . '/' . Slug::getSlugByName('userpanel') . '/payment/verify/' . $invoice_id;
	$payerId = 0;
	
	$parameters = array(
		'terminalId' => $rw_method['terminal_id'],
		'userName' => $rw_method['terminal_user'],
		'userPassword' => $rw_method['terminal_pass'],
		'orderId' => $invoice_id,
		'amount' => $amount,
		'localDate' => $localDate,
		'localTime' => $localTime,
		'additionalData' => $additionalData,
		'callBackUrl' => $callBackUrl,
		'payerId' => $payerId
	);
	
	// Call the SOAP method
	$result = $client->call('bpPayRequest', $parameters, $namespace);
	
	if( __BP_TEST ){
		echo "<div style='position:absolute; left:5px; top:25px;' ><b style='color:green;'>bpPayRequest</b>:<bt>";
		echo "<pre>parameters:";
		print_r($parameters);
		echo "</pre>";
		
		echo "<pre>bpPayRequest-result:";
		print_r($result);
		echo "</pre>";
		echo "</div>";
	}
	
	if( $client->fault ) {
		echo __FILE__." - ".__LINE__."<br>";
		echo '<h2>Fault</h2><pre>';
		print_r($result);
		echo '</pre>';
		die();
	
	} else {
		
		// Check for errors
		$err = $client->getError();
		
		if ($err) {
			echo convbox_back( '<pre>'.$err.'</pre>', 'red' );
			die();
		
		} else {
			// Display the result
			$result = explode (',',$result);
			$ResCode = $result[0];
			$refID = $result[1];
			
			if( __BP_TEST ){
				echo "<div style='position:absolute; left:500px; top:25px;' >";
				echo "	<br>ResCode : ".$ResCode;
				echo "	<br>refID : ".$refID;
				echo "</div>";
			}

			if($ResCode == 0){

				// bank verification result code.
				//here insert Hashcode to your databse and log it
				//**********************************
				
				if(! $rs = dbq(" SELECT * FROM `billing_invoice` WHERE `transaction`='$refID' ") ){
					ed();
				
				} else if( dbn($rs) ){
					ed();
				
				} else if(! dbq(" UPDATE `billing_invoice` SET `transaction`='$refID' WHERE `id`='$invoice_id' LIMIT 1 ") ){
					ed();
				}

				//***********************************
				echo '
				<script language="javascript" type="text/javascript">    
					function postRefId (refIdValue) {
						var form = document.createElement("form");
						form.setAttribute("method", "POST");
						form.setAttribute("action", "'._MELLAT_RDRCT.'");
						//form.setAttribute("target", "formresult");
						var hiddenField = document.createElement("input");
						hiddenField.setAttribute("name", "RefId");
						hiddenField.setAttribute("value", refIdValue);
						form.appendChild(hiddenField);
						document.body.appendChild(form);         
						form.submit();
						document.body.removeChild(form);
					}
				</script>

				<br><br><br>
				<center>'.convbox( __("ارتباط با بانک برقرار شد<br>تراکنش ثبت شد<br>در حال ورود به بانک ..."), 'transparent' ).'</center>

				<script language=javascript type="text/javascript" >postRefId("'.$refID.'");</script>';
				die();

			} else {
				// log error in app
				convbox( __("خطایی در سیستم به وجود آمده است <b>شماره خطا</b> : %%<br>شماره فاکتور : %%", [ $ResCode, $invoice_id ] ) );
				die();
			}
		}
	}
}
