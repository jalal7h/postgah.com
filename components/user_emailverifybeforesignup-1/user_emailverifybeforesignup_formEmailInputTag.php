<?

# jalal7h@gmail.com
# 2016/09/26
# 1.0

function user_emailverifybeforesignup_formEmailInputTag(){
	
	if(! $e = trim(strip_tags($_REQUEST['e'])) ){
		//

	} else if(! $e = str_dec( $e ) ){
		//

	} else {
		$c = '[!"email:username*/disabled=\'1\'" => "'.$e.'"!]';
	}

	return $c;
	
}

