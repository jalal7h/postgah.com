<?

function billing_userpanel_credit(){
	
	$credit = number_format(billing_userCredit( user_logged() ));

	?>
	<div class="billing_userpanel_credit" >
		<span><?=__("اعتبار شما")?> : </span>
		<span style="font:bold 16px font01;"><?=( $credit == 0 ? __('صفر') : billing_format($credit) )?></span>
		<a class="btn btn-primary" href="<?=_URL?>/?page=<?=$_REQUEST['page']?>&do=billing_userpanel_payment" ><?=__('شارژ حساب')?></a>
	</div>
	<?

}


