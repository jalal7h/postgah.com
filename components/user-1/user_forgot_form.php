<?

# jalal7h@gmail.com
# 2016/11/01
# 1.2

$GLOBALS['block_layers']['user_forgot_form'] = 'فرم فراموشی کلمه عبور';

function user_forgot_form(){
	
	if( user_logged() ){
		jsgo( layout_link(14) );
	}

	switch ($_REQUEST['do']) {

		case 'send':
			return user_forgot_send();
		
		case 'new':
			return user_forgot_new();

		case 'save':
			return user_forgot_save();
	}

	?>
	<form method="post" action="<?=_URL?>/?page=<?=$_REQUEST['page']?>&do=send" id="user_forgot_form" >
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




