<?

# jalal7h@gmail.com
# 2016/09/26
# 1.0

function user_emailverifybeforesignup_check(){

	if(! $h = trim(strip_tags($_REQUEST['h'])) ){
		//

	} else if(! $e = trim(strip_tags($_REQUEST['e'])) ){
		//

	} else if(! $e = str_dec( $e ) ){
		//

	} else if(! is_email_correct_or_not($e) ){
		// 

	} else if( $h != user_emailverifybeforesignup_hash($e) ){
		// 

	} else {
		return true;
	}

	return false;

}

