
<form id="userverification_email" name="userverification_email">
<input type="hidden" name="verify_back" value="{verify_back}">
	
	<div class="head"><lang>تایید آدرس ایمیل</lang></div>
	<div class="text"><?=__( 'لطفا کد شش رقمی که به آدرس ایمیل %% ارسال شده است را وارد نمائید.', '<span class="email">{email}</span>' )?></div>
	
	<div>
		<input type="text" autocomplete="new-password" class="numeric" maxlength="6" minlength="6" name="code" />
	</div>

	<a class="back" href="javascript:history.go(-1)" ><lang>اصلاح آدرس ایمیل</lang></a>

	<input type="submit" disabled value="<lang>ارسال</lang>" class="btn btn-primary">

</form>

<script> userverification_email.code.focus() </script>

