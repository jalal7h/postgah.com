<?

# jalal7h@gmail.com
# 2016/11/01
# 1.1

function admin_login_form(){

	admin_key_make();

	?>
	<div class="<?=__FUNCTION__?>_wrapper">

	<form method="post" action="" >
	<input type="hidden" name="do_action" value="admin_login">
	
	<div class="<?=__FUNCTION__?>" >
		<div class="legend"><?=__('مدیریت سایت')?></div>
		<div class="container">
		
		<input autocomplete="off" placeholder="Username .." type="text" class="username" name="<?=admin_key()['username']?>" >
		
		<input autocomplete="off" placeholder="Password .." type="password" class="password" name="<?=admin_key()['password']?>" >
		
		<input autocomplete="off" placeholder="FC2" maxlength="3" type="password" class="fc2 numeric" name="<?=admin_key()['fc2']?>" title="<?=__('کد مشخصه ثابت برای هر لایسنس')?>" >
		
		<table cellpadding="0" cellspacing="0" ><tr>
		<td><input autocomplete="off" maxlength="4" type="text" name="<?=admin_key()['captcha']?>" class="captcha numeric"></td>
		<td><img dir="<?=_rtl?>" class="captcha_img" title="<?=__('این قسمت برای مقابله با روبوت های brute force در نظر گرفته شده، با وارد کردن شماره در فرم ادامه دهید')?>" 
			src="<?=_URL?>/captcha-admin-login.png&nocache=<?=rand(10000000,99999999)?>" >
		</td>
		<td><input type="submit" value="Login" class="submit" ></td>
		</tr></table>
		</div>
	</div>
	</form>

	<a href="./" class="admin_login_form_back">
		<icon></icon>
		<?=__('بازگشت به سایت')?>
	</a>

	<div class="admin_login_form_code">
		<?
		switch ($_REQUEST['code']) {
			
			case 'no_fc2_defined':
				echo __('کد ۳ رقمی تعریف نشده است');
				break;
			
			case 'invalid_fc2':
				echo __('خطا در کد ۳ رقمی');
				break;
			
			case 'wrong_captcha':
				echo __('خطا در کد کپچا');
				break;
			
			case 'invalid_auth':
				echo __('خطا در نام کاربری / گذرواژه');
				break;
			
		}
		?>
	</div>
	

	<script type="text/javascript">
		$(document).ready(function(){
			$('.admin_login_form input.username').focus();
			$('.admin_login_form').css({'transform':'rotate(0deg)','opacity':'1.0'});
		});
	</script>

	</div>
	<?
}







