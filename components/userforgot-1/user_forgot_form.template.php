
<form method="post" action="{_URL}/forgot" id="user_forgot_form" >

	{token_make}
	
	<input type="hidden" name="do" value="verify">
	
	<div class="head"><lang>فراموشی کلمه عبور!</lang></div>
	<div class="text"><?=__( 'لطفا بمنظور تنظیم مجدد کلمه عبور، %% خود را وارد نمایید.', userlogin_username_title )?></div>
	<input type="text" name="username" placeholder="{userlogin_username_title}" dir="ltr" required />
	<input type="submit" class="btn btn-primary" value="<lang>ارسال</lang>" />

</form>

