
<form autocomplete="off" method="post" action="<?=layout_link(60)?>" id="user_login_form" >
<input type="hidden" name="do" value="login_do"/>
<input type="hidden" name="refer" value="{refer}" />
<?=token_make()?>

	<div class="head"><lang>ورود به سایت</lang></div>

	<div class="login_form">
	
		<div class="username">
			<input required autocomplete="new-password" name="username" placeholder="{userlogin_username_title}" type="text" value="{username}" /><!--
		 --><icon class="fa fa-user"></icon>
		</div>
		
		<div class="password">
			<input required autocomplete="new-password" name="password" placeholder="<?=lmtc('user:password')?>" type="password" /><!--
		 --><icon class="fa fa-lock"></icon>
		</div>

		<div class="terms"><?=__('شما با کلیک کردن روی دکمه ورود موافقت می کنید که تمامی %%قوانین سایت%% را پذیرفته اید.', ['<a href="'.layout_link(6).'">','</a>'] )?></div>

		<?if( strlen($prompt) ):?>
			<div class="prompt" >{prompt}</div>
		<?endif?>

		<input type="submit" class="btn btn-primary" value="<lang>ورود</lang>" />

		<br>
		<a class="forgot" href="<?=layout_link(63)?>"><lang>کلمه عبورام را فراموش کرده ام</lang></a>

	</div><!--

 --><div class="register_button">
		<div>
			<?=__('در %% عضو نیستید؟', setting('tiny_title') )?>
			<lang>هم‌اکنون ثبت‌نام کنید.</lang>
		</div>
		<a class="btn btn-primary" href="<?=layout_link(58)?>"><lang>ثبت‌نام</lang></a>
	</div>

	<?=( is_component('userloginoauth') ? userloginoauth_form() : '' )?>

</form>

