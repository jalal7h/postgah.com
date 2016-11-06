<?

function billing_userpanel_credit(){
	
	$credit = number_format(billing_userCredit( user_logged() ));

	?>
	<div class="billing_userpanel_credit" >
		<span><?=__("اعتبار شما")?> : </span>
		<span style="font:bold 16px BYekan;"><?=( $credit==0 ? 'صفر' : billing_format($credit) )?></span>
		<a class="submit_button" href="<?=_URL?>/?page=<?=$_REQUEST['page']?>&do=billing_userpanel_payment" ><?=__('شارژ حساب')?></a>
	</div>
	<?

}


