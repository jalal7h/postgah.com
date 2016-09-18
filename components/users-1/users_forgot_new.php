<?

# jalal7h@gmail.com
# 2016/09/18
# 1.1

function users_forgot_new(){
	
	$username = $_REQUEST['username'];
	$h_old = trim($_REQUEST['h']);
	$h_new = md5x($username."01q!", 20);

	if( $h_old != $h_new ){
		echo convbox("خطایی رخ داده است!");

	} else {
		
		?>
		<form id="users_forgot_new" method="post" action="./?page=<?=intval($_REQUEST['page'])?>&do=save" >
		<?=token_make()?>
		<input type="hidden" name="username" value="<?=$username?>" />
		<input type="hidden" name="h" value="<?=$h_old?>" />
			<div class="container" >
				
				<div class="head" >لطفا کلمه عبور جدید را وارد کنید!</div>
				
				<label>
					<span>کلمه عبور جدید :‌ </span>
					<input type="password" id="password1" />
				</label>
				
				<label>
					<span>تکرار کلمه عبور :‌ </span>
					<input type="password" id="password2" name="password" />
				</label>
				
				<hr>

				<label>
					<span></span>
					<input type="submit" class="submit_button" value="ثبت کلمه عبور جدید" />
				</label>

				<div class=d03></div>

			</div>
		</form>
		<?

	}

}





