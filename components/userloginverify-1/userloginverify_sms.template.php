
<form id="userloginverify_sms" name="userloginverify_sms" method="POST" action="{layout_link(58)}">
<input type="hidden" name="username" value="{username}">
	
	<div class="head"><lang>تایید شماره موبایل</lang></div>
	<div class="text"><?=__( 'کد چهار رقمی پیامک شده به %% را وارد کنید.', '<span class="cell">{cell}</span>' )?></div>
	
	<div>
		<input type="text" autocomplete="new-password" class="numeric" maxlength="4" minlength="4" name="code" />
		<a class="userloginverify_sms_resend resend active" href="" ><i class="fa fa-refresh"></i><lang>ارسال مجدد</lang></a>
		<a class="userloginverify_sms_resend resend sending" href="" ><i class="fa fa-refresh fa-spin"></i><lang>ارسال مجدد</lang></a>
		<a class="userloginverify_sms_resend resend waiting" href="" ><i class="fa fa-refresh"></i><lang>ارسال مجدد</lang> <span class="counter"></span></a>
	</div>

	<a class="back" href="javascript:history.go(-1)" ><lang>اصلاح شماره موبایل</lang></a>

	<input type="submit" value="<lang>ارسال</lang>" class="btn btn-primary">

</form>

<script> userloginverify_sms.code.focus() </script>

