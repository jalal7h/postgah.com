<?

# jalal7h@gmail.com
# 2017/01/14
# 1.0

function captcha_check( $captcha_name , $captcha_code ){

	if(! $captcha_code ){
		$_SESSION['captcha-wrong']++;
		return false;

	} else if( $captcha_code != $_SESSION['captcha-'.$captcha_name] ){
		$_SESSION['captcha-wrong']++;
		return false;

	} else {
		return true;
	}

}





