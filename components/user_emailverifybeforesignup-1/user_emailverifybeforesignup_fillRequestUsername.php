<?

# jalal7h@gmail.com
# 2016/09/26
# 1.0

function user_emailverifybeforesignup_fillRequestUsername(){
	
	if(! $e = trim(strip_tags($_REQUEST['e'])) ){
		//

	} else if(! $_REQUEST['username'] = str_dec( $e ) ){
		//

	} else {
		return true;
	}

	return false;
	
}

