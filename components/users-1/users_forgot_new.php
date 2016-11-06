<?

# jalal7h@gmail.com
# 2016/11/01
# 1.2

function users_forgot_new(){
	
	$username = $_REQUEST['username'];
	$h_old = trim($_REQUEST['h']);
	$h_new = md5x($username."01q!", 20);

	if( $h_old != $h_new ){
		echo convbox( __("خطایی رخ داده است!") );

	} else {
		
		?>
		<form id="users_forgot_new" method="post" action="./?page=<?=intval($_REQUEST['page'])?>&do=save" >
		<?=token_make()?>
		<input type="hidden" name="username" value="<?=$username?>" />
		<input type="hidden" name="h" value="<?=$h_old?>" />
			<div class="container" >
				
				<div class="head" ><?=__('لطفا کلمه عبور جدید را وارد کنید!')?></div>
				
				<label>
					<span><?=__('%% جدید', [ lmtc('users:password') ] )?> :‌ </span>
					<input type="password" id="password1" />
				</label>
				
				<label>
					<span><?=__('تکرار %%', [ lmtc('users:password') ] )?> :‌ </span>
					<input type="password" id="password2" name="password" />
				</label>
				
				<hr>

				<label>
					<span></span>
					<input type="submit" class="submit_button" value="<?=__('ثبت %% جدید', [ lmtc('users:password') ] )?>" />
				</label>

				<label>
					<span></span>
					<div class="prompt"></div>
				</label>

			</div>
		</form>
		<?

	}

}





