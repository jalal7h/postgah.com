<?

# jalal7h@gmail.com
# 2016/11/07
# 1.3

function user_forgot_send(){
	
	// token_check();
	
	if(! $username = $_REQUEST['username'] ){
		dg();

	} else if(! $rw_user = table( 'user', $username, null, 'username' ) ){
		echo convbox( __("هیچ حساب کاربری مرتبط با آدرس ایمیل شما یافت نشد<br>لطفا نسبت به %%ثبت نام%% با آدرس ایمیل خود اقدام نمائید.", ["<a href=\""._URL."/register\">",'</a>'] ) );

	} else {

		$h = md5x($username."01q!", 20);
		
		$vars['user_email'] = $rw_user['username'];
		$vars['forgot_link'] = _URL."/?page=".$_REQUEST['page']."&do=new&username=".str_enc($username)."&h=".$h;
		
		echo texty( 'user_forgot_send', $vars, $rw_user['id'] );

	}

}




