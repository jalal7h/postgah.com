<?

# jalal7h@gmail.com
# 2016/09/18
# 1.2

function users_forgot_send(){
	
	if(! $username = $_REQUEST['username'] ){
		dg();

	} else if(! $vars = table( 'users', $username, null, 'username' ) ){
		echo convbox("هیچ حساب کاربری مرتبط با آدرس ایمیل شما یافت نشد<br>لطفا نسبت به <a href=\""._URL."/register\">ثبت نام</a> با آدرس ایمیل خود اقدام نمائید.");

	} else {

		$h = md5x($username."01q!", 20);
		$vars['link'] = _URL."/?page=".$_REQUEST['page']."&do=new&username=".$username."&h=".$h;
	
		echo texty( 'users_forgot_send', $vars, $vars['id'] );

	}

}

