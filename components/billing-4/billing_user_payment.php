<?

# jalal7h@gmail.com
# 2017/04/16
# 1.1

# action e form e pardakht
# form e pardakht

function billing_userpanel_payment(){

	# 
	# verify
	if(! $user_id = user_logged() ){
		die();
	}

	#
	# action switch
	switch($_REQUEST['do2']){
		
		case 'submit':
			return billing_userpanel_payment_submit();

		case 'redirect':
			return billing_userpanel_payment_redirectToMethod();
	}
	
	#
	# invoice id
	if( $invoice_id = $_REQUEST['invoice_id'] ){
		
		if(! $rw_invoice = table('billing_invoice', $invoice_id) ){
			e();
		
		} else {
			$order_id = $rw_invoice['order_id'];
			$order_table = $rw_invoice['order_table'];
			$cost = $rw_invoice['cost'];
		}

	}

	#
	# wallet png
	if( lang_code ){
		$png_name = 'billing_wallet-'.lang_code.'.png';
		if(! imgp( $png_name ) ){
			$png_name = 'billing_wallet-en.png';
		}
	}

	# 
	# if its an invoice, wallet method is available
	if( $rw_invoice ){
		$method_str.= "
			<div class='r'>
			<label>
			<input title='".__('کیف پول')."' type=radio name='method' value='wallet' />
			<img src='"._URL."/image_list/".$png_name."'/>
			<span class='wallet_credit'>".billing_format( billing_userCredit($user_id) )." ".__('اعتبار')."</span>
			</label>
			</div>";
	}

	#
	# online methods
	asort($GLOBALS['billing_method']);
	foreach($GLOBALS['billing_method'] as $method => $method_title){
		
		if( $method=="wallet" ){
			continue;
		
		} else {
			$method_str.= "<div class='r'><label><input title='$method_title' type='radio' name='method' value='$method' /><img src='"._URL."/image_list/billing_".$method.".png'/>".($method=='wallet'?$wallet_credit:"")."</label></div>";
		}

	}

	#
	# offline methods
	if(! $rs_off = dbq(" SELECT * FROM `billing_method` WHERE `c5`='offline' ORDER BY `id` DESC ") ){
		e(__FUNCTION__.__LINE__);
	
	} else if(! dbn($rs_off) ){
		// nothing
	
	} else {
		
		$method_str_offline = "<div style='clear: both; float: none;'></div><h1 style='border-top: 1px dashed #ccc; padding-top: 27px;'>".__("آفلاین")."</h1>";
		
		while( $rw_off = dbf($rs_off) ){
			$method_str_offline.= "
			<label class='r offline'>
				<input title='".$rw_off['c1']."' type='radio' name='method' value='".$rw_off['method']."' />
				<span class='c1'>".$rw_off['c1']."</span>
			    <div class='c-container'>
					<span class='c2'>".__("حساب").":‌ ".$rw_off['c2']."</span>
					<span class='c3'>".__("کارت").":‌ ".$rw_off['c3']."</span>
				</div>
			</label>";
		}

	}

	$content = "
	<script> var billing_userCredit='".billing_userCredit( $user_id )."';</script>
	<form method='post' action='./?page=".$_REQUEST['page']."&do=".$_REQUEST['do']."&do2=submit".( $invoice_id ? "&invoice_id=".$invoice_id : "" )."' class='billing_userpanel_payment' name='blngpf'>
		<div class='text' >".__("نحوه پرداخت").":</div>
		<div class='method_list'>
			<h1>".__("آنلاین")."</h1>
			".$method_str."
			".$method_str_offline."
		</div>
		<div class='cost-container'>
			<span>".__("مبلغ قابل پرداخت")."</span>
			<input type=text name='cost' class='numeric' id='billing_cost' value='$cost' ".($cost?"readonly='1'":"")." />
			<span>".setting('money_unit')."</span>
			".convbox( __('با کلیک روی پرداخت به درگاه بانک می روید<br/>شما می توانید پرداخت خود را با کلیه کارت عضو شتاب انجام دهید') )."
			<input type='submit' value='".__("پرداخت")."' />
		</div>
		".token_make()."
	</form>";

	layout_post_box( __("شارژ حساب"), $content, $allow_eval=false, $framed=1 );

}




