
<form id="user_forgot_new" method="post" action="{_URL}/forgot" >
	
	{token_make}

	<input type="hidden" name="do" value="save">
	<input type="hidden" name="username" value="{username}" />

	<div class="head" ><lang>بازنشانی کلمه عبور</lang></div>
	<div class="text" ><lang>لطفا کلمه عبور جدید را وارد کنید.</lang></div>
	
	<input class="placeholder_fix" placeholder="<lang>کلمه عبور جدید</lang>" autocomplete="new-password" type="password" id="password1" required />
	<input class="placeholder_fix" placeholder="<lang>تکرار کلمه عبور</lang>" autocomplete="new-password" type="password" id="password2" name="password" required />
	
	<label class="prompt_w">
		<input type="submit" class="btn btn-primary" value="<lang>ثبت کلمه عبور جدید</lang>" />
		<div class="prompt" lang_empty_password="<lang>لطفا کلمه عبور مناسب وارد کنید.</lang>" lang_more_than_8_char="<lang>کلمه عبور شما باید بیش از ۸ کارکتر داشته باشد.</lang>" lang_does_not_match="<lang>کلمه عبور مطابقت ندارد</lang>"
		></div>
	</label>

</form>

