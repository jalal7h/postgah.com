<?

function is_name_correct_or_not( $name_orig ){

	$name = $name_orig;
	$name = strip_tags( $name );
	$name = mb_ereg_replace('[^آ-ی ]+','',$name);

	if( $name == $name_orig ){
		return true;

	} else {
		return false;
	}

	// $name = trim(strip_tags($_REQUEST['name']))
}

