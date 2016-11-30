<?

$GLOBALS['block_layers']['user_login_form'] = 'فرم ورود به محیط کاربری';
$GLOBALS['do_action'][] = 'user_login_form';

function user_login_form(){
	
	switch ($_REQUEST['do']) {
		case 'login_do':
			$prompt = user_login_do();
			break;
	}

	if( user_logged() ){
		jsgo( _URL.'/userpanel' );
	}

	?>
	<form autocomplete="off" method="post" action="./login" id="<?=__FUNCTION__?>" <?=($_REQUEST['popup']? 'class="popup" target="_top"': '')?> >
	<input type="hidden" name="do" value="login_do"/>
	<input type="hidden" name="refer" value="<?=$_SERVER['HTTP_REFERER']?>" />

		<div class="container"> 
			<div class="d01"><?=__('ورود')?></div>
			<div class="d02"><?=__('اگر هنور عضو نیستید، الان %%ثبت نام%% کنید.', ['<a target="_top" href="./register">','</a>'] )?></div>
			<input autocomplete="off" type="text" name="username" placeholder="<?=lmtc('user:username')?>" dir="ltr" />
			<input autocomplete="off" type="password" name="password" placeholder="<?=__("کلمه عبور")?>" dir="ltr" />
			<div class="d03"><?=__('شما با کلیک کردن روی دکمه ورود موافقت می کنید که تمامی %%قوانین سایت%% را پذیرفته اید.', ['<a href="./terms">','</a>'] )?></div>
			<?=( $prompt ?'<div class="prompt">'.$prompt.'</div>' :'' )?>
			<input type="submit" class="submit_button" value="<?=__('ورود')?>" />
			<a class="d04" target="_top" href="./forgot"><?=__('کلمه عبورام را فراموش کرده ام')?></a>
		</div>

		<img src="image_list/arrow.png" class="the_key" />
		<?

		if( is_component('user_weblogin') ){
			user_weblogin_form();
		}

		?>
	</form>
	<?
}

