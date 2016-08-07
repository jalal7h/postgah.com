<?

function captcha_check( $captcha_name , $captcha_code ){

	error_log("session read : ".$_SESSION['captcha-'.$captcha_name] );

	if( $captcha_code != $_SESSION['captcha-'.$captcha_name] ){
		return false;
	} else {
		return true;
	}

}



