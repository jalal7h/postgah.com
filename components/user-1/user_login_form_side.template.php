
<form autocomplete="off" method="post" action="{layout_link(60)}" class="user_login_form_side" >
	<div class="head" ><lang>ورود کاربر</lang></div>
	<input type="hidden" name="do" value="login_do"/>

	<div class="input_w"><input autocomplete="off" type="text" name="username" placeholder="<?=lmtc('user:username')?>" dir="ltr" value="{username}" /></div>
	<div class="input_w"><input autocomplete="off" type="password" name="password" placeholder="<lang>کلمه عبور</lang>" dir="ltr" /></div>
	<label class="remmeber_w"><input type="checkbox" name="remember" value="1" /> <lang>Remember</lang></label>

	<div>
		<input type="submit" class="btn btn-default" value="<lang>ورود</lang>" />
		<a class="signup" href="{layout_link(58)}">Sign up now</a>
	</div>

	<div class="forgot_w"><a href="{layout_link(63)}" ><lang>کلمه عبورام را فراموش کرده ام</lang></a></div>
</form>


