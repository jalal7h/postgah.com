<?

# jalal7h@gmail.com
# 2016/12/02
# 1.1

function is_name_correct_or_not( $name_orig ){
	
	if(! $name_orig = trim($name_orig) ){
		return false;
	}

	$name = $name_orig;
	$name = strip_tags( $name );

	switch( lang_code ){
		
		case 'fa':
			$name = mb_ereg_replace('[^آ-ی ]+','',$name);
			break;
		
		case 'en':
			$name = mb_ereg_replace('[^a-zA-Z. ]+','',$name);
			break;
	}

	if( $name == $name_orig ){
		return $name_orig;

	} else {
		// echo "something wrong";
		return false;
	}

}




