<?

# jalal7h@gmail.com
# 2016/07/09
# 1.0

$GLOBALS['billing_method']['mellat'] = 'بانک ملت';

function billing_userpanel_payment_mellat( $invoice_id ){
	
	if(! $rw_invoice = table("billing_invoice", $invoice_id) ){
		e();

	} else {
		switch ($_REQUEST['bp_do']) {

			case 'verify':
				bpProcess();
				break;
			
			default:
				echo convbox( __('درحال انتقال به درگاه بانک ..') );
				$_REQUEST['ACT'] = "CREATE_FORM";
				$_REQUEST['Amount'] = $rw_invoice['cost'];
				$_REQUEST['invoice_id'] = $invoice_id;
				$_REQUEST['memo'] = $rw_invoice['cost'];
				bpPayRequest();
				break;
		}
	}
}

