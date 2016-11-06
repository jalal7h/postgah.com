<?

# jalal7h@gmail.com
# 2016/11/01
# 1.2

$GLOBALS['block_layers']['users_forgot_form'] = 'فرم فراموشی کلمه عبور';

function users_forgot_form(){
	
	if( user_logged() ){
		// header("Location: ./userpanel");
		echo '<META http-equiv=Refresh Content="0; Url='._URL.'/userpanel">';
		die();
	}

	switch ($_REQUEST['do']) {

		case 'send':
			return users_forgot_send();
		
		case 'new':
			return users_forgot_new();

		case 'save':
			return users_forgot_save();
	}

	?>
	<form method="post" action="./?page=<?=$_REQUEST['page']?>&do=send" id="users_forgot_form" >
		<?=token_make()?>
		<div class="container"> 
			<div class="d01"><?=__('فراموشی کلمه عبور!')?></div>
			<div class="d02"><?=__('لطفا آدرس ایمیل خود را برای دریافت پیوند تنظیم مجدد کلمه عبور وارد نمایید.')?></div>
			<input type="text" name="username" placeholder="<?=__('Email address')?>" dir="ltr" />
			<input type="submit" class="submit_button" value="<?=__('ارسال درخواست')?>" />
		</div>
	</form>
	<?
	
}

