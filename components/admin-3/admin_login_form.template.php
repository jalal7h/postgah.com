
<div class="admin_login_form_wrapper">

	<form method="post" action="" class="admin_login_form" >
	<input type="hidden" name="do_action" value="admin_login">
	
	<div>

		<div class="legend"><lang>مدیریت سایت</lang></div>
		<div class="admin-container">
			
			<input autocomplete="new-password" placeholder="Username .." type="text" class="email" name="<?=login_key()['email']?>" >
			
			<input autocomplete="off" placeholder="Password .." type="password" class="password" >
			<input type="hidden" class="md5" name="<?=login_key()['password']?>" value="" >
			
			<input autocomplete="new-password" placeholder="FC2" minlength="3" maxlength="3" type="password" class="fc2 numeric" name="<?=login_key()['fc2']?>" title="<lang>کد ۳ رقمی ثابت</lang>" >
			
			<table cellpadding="0" cellspacing="0" >
				<tr>
					<td>{recaptcha}</td>
					<td><input type="submit" value="Login" class="submit" ></td>
				</tr>
			</table>

		</div>
	
	</div>
	</form>

	<a href="./" class="admin_login_form_back">
		<icon></icon>
		<lang>بازگشت به سایت</lang>
	</a>

	<div class="admin_login_form_code">{prompt}</div>

</div>


