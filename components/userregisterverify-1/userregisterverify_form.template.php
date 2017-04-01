
<form method="post" action="{layout_link(58)}" id="{template_name}" >
	<input type="hidden" name="do" value="verify">
	
	<div class=""> 
		
		<div class="head"><lang>ثبت نام</lang></div>
		
		<div class="info"><?=__('لطفا %% خود را برای دریافت لینک تایید ایمیل وارد نمایید.', userlogin_username_title )?></div>
		
		<div>
			<input type="text" name="username" value="{username}" placeholder="{userlogin_username_title}"/>
		</div>
		
		<?if( strlen($prompt) ):?>
			<div class="prompt">{prompt}</div>
		<?endif?>

		<input type="submit" class="btn btn-primary" value="<lang>ارسال</lang>" />

	</div>

</form>

