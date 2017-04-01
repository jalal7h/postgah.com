<?

# jalal7h@gmail.com
# 2017/04/01
# 2.0

function str_enc( $str ){

	if(! $str ){
		return false;
	}

	for( $i=0; $i<strlen($str); $i++ ){
		$chr = $str[$i];
		// echo $chr." : ";
		$ord = ord( $chr );
		// echo $ord." : ";
		$hex = dechex( $ord );
		// echo $hex;
		// echo "<br>";
		$str_enc.= $hex;
	}

	$str_enc.= str_hash($str_enc);

	return $str_enc;
}


function str_dec( $str ){

	if(! $str ){
		return false;
	}

	$hash = substr( $str, -2 );
	$str = substr( $str, 0, -2 );

	if( $hash != str_hash($str) ){
		return false;
	}

	for( $i=0; $i<strlen($str); $i+=2 ){
		$hex = $str[$i].$str[$i+1];
		// echo $hex." : ";
		$dec = hexdec( $hex );
		// echo $dec." : ";
		$chr = chr( $dec );
		// echo "<br>";
		$str_dec.= $chr;
	}
	return $str_dec;
}


function str_hash( $str ){
	return md5x( $str, 2 );
}




// $str = "jalal7h@gmail.com";
// echo "<hr>";
// $str_enc = str_enc( $str );
// echo "<br>".$str_enc;
// echo "<hr>";

// // $str_enc.= "93";
// echo "<br>".$str_enc;
// echo "<hr>";

// $str_dec = str_dec( $str_enc );
// echo "<br>".$str_dec;

// die();

