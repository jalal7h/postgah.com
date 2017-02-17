<?

# jalal7h@gmail.com
# 2017/02/08
# 1.4

function admin_login_form(){

	if( its_local() ){
		admin_free();
	}
	
	switch ($_REQUEST['code']) {
		case 'no_fc2_defined':
			$prompt = __('کد ۳ رقمی تعریف نشده است'); break;
		case 'invalid_fc2':
			$prompt = __('خطا در کد ۳ رقمی'); break;
		case 'wrong_captcha':
			$prompt = __('خطا در کد کپچا'); break;
		case 'invalid_auth':
			$prompt = __('خطا در نام کاربری / گذرواژه'); break;
	}

	echo template_engine('admin_login_form' );

}







