<?
$GLOBALS['do_action'][] = 'nl_index_form';

function nl_index_form(){

	#
	# action
	switch ($_REQUEST['do']) {
		case 'save':
			return nl_index_save();
	}

	#
	# form
	?>
	<form method="post" class="<?=__FUNCTION__?>" action="<?=_URL?>/?do_action=<?=$_REQUEST['do_action']?>&do=save" />
		<icon></icon>
		<div class="tx1">ایمیل خود را در سایت ثبت کنید.
		<br>تا آخرین تغییرات برای شما ارسال گردد</div>
		<input type="email" name="email" placeholder="email address" />
		<input type="submit" class="submit_button" value="ثبت" />
	</form>
	<?

}



