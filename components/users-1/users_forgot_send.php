<?

# jalal7h@gmail.com
# 2016/09/18
# 1.2

function users_forgot_send(){
	
	token_check();
	
	if(! $username = $_REQUEST['username'] ){
		dg();

	} else if(! $vars = table( 'users', $username, null, 'username' ) ){
		echo convbox( __("هیچ حساب کاربری مرتبط با آدرس ایمیل شما یافت نشد<br>لطفا نسبت به %%ثبت نام%% با آدرس ایمیل خود اقدام نمائید.", ["<a href=\""._URL."/register\">",'</a>'] ) );

	} else {

		$h = md5x($username."01q!", 20);
		$vars['link'] = _URL."/?page=".$_REQUEST['page']."&do=new&username=".str_enc($username)."&h=".$h;
	
		echo texty( 'users_forgot_send', $vars, $vars['id'] );

	}

}

