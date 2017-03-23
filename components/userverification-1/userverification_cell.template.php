
<form id="userverification_cell" name="userverification_cell">
<input type="hidden" name="username" value="{cell}">
<input type="hidden" name="verify_back" value="{verify_back}">
	
	<div class="head"><lang>تایید شماره موبایل</lang></div>
	<div class="text"><?=__( 'لطفا کد چهار رقمی که به شماره همراه %% پیامک شده است را وارد نمائید.', '<span class="cell">{cell}</span>' )?></div>
	
	<div>
		<input type="text" autocomplete="new-password" class="numeric" maxlength="4" minlength="4" name="code" />
		<a class="userverification_cell_resend resend active" href="" ><i class="fa fa-refresh"></i><lang>ارسال مجدد</lang></a>
		<a class="userverification_cell_resend resend sending" href="" ><i class="fa fa-refresh fa-spin"></i><lang>ارسال مجدد</lang></a>
		<a class="userverification_cell_resend resend waiting" href="" ><i class="fa fa-refresh"></i><lang>ارسال مجدد</lang> <span class="counter"></span></a>
	</div>

	<a class="back" href="javascript:history.go(-1)" ><lang>اصلاح شماره موبایل</lang></a>

	<input type="submit" value="<lang>ارسال</lang>" disabled class="btn btn-primary">

</form>

<script> userverification_cell.code.focus() </script>

