<?

# jalal7h@gmail.com
# 2016/04/07
# Version 1.0.0

function str_enc( $str ){
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
	return $str_enc;
}

function str_dec( $str ){
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


// $str = "jalal7h@gmail.com";
// echo "<hr>";
// $str_enc = str_enc( $str );
// echo "<br>".$str_enc;
// echo "<hr>";
// $str_dec = str_dec( $str_enc );
// echo "<br>".$str_dec;







