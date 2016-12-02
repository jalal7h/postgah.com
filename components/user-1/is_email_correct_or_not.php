<?

# jalal7h@gmail.com
# 2016/09/26
# 1.0

function is_email_correct_or_not( $email ){
	
	$email = strtolower($email);
	$email = mb_ereg_replace('[^a-z0-9\.\_\-@]+','',$email);
	$email = trim($email);

	if(! $email ){
		return false;
	
	} else if(! filter_var($email, FILTER_VALIDATE_EMAIL) ){
		return false;

	} else {
		return $email;
	}

}







