<?

# jalal7h@gmail.com
# 2016/12/02
# 1.1

function is_name_correct_or_not( $name_orig ){

	if(! $name_orig = trim($name_orig) ){
		return false;
	}

	if( (lang_flag === true) and (lang_code !== 'fa') ){
		return $name_orig;
	}

	$name = $name_orig;
	$name = strip_tags( $name );
	$name = mb_ereg_replace('[^آ-ی ]+','',$name);

	if( $name == $name_orig ){
		return $name_orig;

	} else {
		return false;
	}

	// $name = trim(strip_tags($_REQUEST['name']))
}

