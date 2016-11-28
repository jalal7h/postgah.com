<?

# jalal7h@gmail.com
# 2016/11/14
# 1.0

function string_between_replace( $str, $bet, $ween, $func=null ){
	
	if( $bet == $ween ){
		ed();
	}

	$str_arr = explode( $bet, $str );
	
	if(! sizeof($str_arr) ){
		//
	
	} else {

		for( $i=1; $i < sizeof($str_arr); $i++ ){
			
			$str_this_arr = explode( $ween, $str_arr[$i] );
			
			# process on word
			if( $the_word = trim($str_this_arr[0]) ){

				if( $func ){
					$str_this_arr[0] = $func( $the_word );
					$str_arr[$i] = implode( $ween, $str_this_arr);

				} else {
					$word_arr[] = $the_word;
				}

			}

		}

		$str = implode( $bet, $str_arr );

	}

	if( $func ){
		$str = str_replace( [ $bet, $ween ], "", $str );
		return $str;
	
	} else {
		return $word_arr;
	}

}
