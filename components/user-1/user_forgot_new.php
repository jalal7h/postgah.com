<?

# jalal7h@gmail.com
# 2016/11/07
# 1.3

function user_forgot_new(){
	
	$username = $_REQUEST['username'];
	$h_old = trim($_REQUEST['h']);
	$h_new = md5x( str_dec($username)."01q!", 20);

	if( $h_old != $h_new ){
		echo convbox( __("خطایی رخ داده است!") );

	} else {
		
		?>
		<form id="user_forgot_new" method="post" action="<?=_URL?>/?page=<?=intval($_REQUEST['page'])?>&do=save" >
		<?=token_make()?>
		<input type="hidden" name="username" value="<?=$username?>" />
		<input type="hidden" name="h" value="<?=$h_old?>" />
			<div class="container" >
				
				<div class="head" ><?=__('لطفا کلمه عبور جدید را وارد کنید.')?></div>
				
				<label>
					<span><?=__('کلمه عبور جدید')?> :‌ </span>
					<input type="password" id="password1" />
				</label>
				
				<label>
					<span><?=__('تکرار کلمه عبور')?> :‌ </span>
					<input type="password" id="password2" name="password" />
				</label>
				
				<hr>

				<label>
					<span></span>
					<input type="submit" class="btn btn-primary" value="<?=__('ثبت کلمه عبور جدید')?>" />
				</label>

				<label>
					<span></span>
					<div class="prompt" lang_empty_password="<?=__('لطفا کلمه عبور مناسب وارد کنید.')?>" lang_more_than_8_char="<?=__('کلمه عبور شما باید بیش از ۸ کارکتر داشته باشد.')?>" lang_does_not_match="<?=__('کلمه عبور مطابقت ندارد')?>"
					></div>
				</label>

			</div>
		</form>
		<?

	}

}





