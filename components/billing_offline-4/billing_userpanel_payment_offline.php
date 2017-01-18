<?

# jalal7h@gmail.com
# 2016/12/21
# 1.1

function billing_userpanel_payment_offline(){

	#
	# verifications
	if(! $user_id = user_logged() ){
		e();

	} else if(! $invoice_id = $_REQUEST['invoice_id'] ){
		e();

	} else if(! $rw_invoice = table('billing_invoice', $invoice_id) ){
		e();

	} else if(! $rw_invoice['user_id']==$user_id ){
		e();

	} else if( $rw_invoice['date'] ){
		e();

	} else {

		#
		# method
		$method = $rw_invoice['method'];

		switch ($_REQUEST['do3']) {
			case 'save':
				return billing_userpanel_payment_offline_save_n_congragulate();
		}

		?>
		<form class="billing_userpanel_payment_offline" action="./?page=<?=$_REQUEST['page']?>&do=<?=$_REQUEST['do']?>&do2=<?=$_REQUEST['do2']?>&invoice_id=<?=$_REQUEST['invoice_id']?>&do3=save" method="post">
			
			<?= token_make(); ?>

			<h1><?=__('فرم پرداخت بانکی')?></h1>
			
			<div>
				<span><?=__('بانک')?> : </span>
				<input type="text" readonly="1" value="<?=table('billing_method',$rw_invoice['method'],'c1','method')?>" />
			</div>
			
			<div>
				<span><?=lmtc('billing_invoice:cost')?> : </span>
				<input type="text" readonly="1" value="<?=billing_format($rw_invoice['cost'])?>" />
			</div>
			
			<div>
				<span><?=__('شماره تراکنش / سریال')?> : </span>
				<input type="text" dir="ltr" name="transaction" alert="<?=__('لطفا شماره تراکنش / سریال را وارد کنید')?>" id="transaction" />
			</div>

			<div>
				<span><?=lmtc('billing_invoice:date')?> :‌ </span>
				<input type="text" class="calendar-fa" alert="<?=__('لطفا تاریخ پرداخت را وارد کنید')?>" name="date" />
			</div>


			<div>
			<hr>
				<span>&nbsp;</span>
				<input type="submit" class="btn btn-primary" value="<?=__("ثبت پرداخت")?>"/>
			</div>
		</form>
		<script>
			$('#transaction').focus();
		</script>
		<?
	
	}

}







