<?

# jalal7h@gmail.com
# 2016/12/21
# 1.1

# $str: mohtavai ke mikhaim yechizi azash replace beshe
# chizi k beyne $bet va $ween dide mishe, ba mohtavaye $func replace beshe, 
# age $func bud, $str ro ba func replace mikone
# age $func nabud, list e karamalti k beyne $bet va $ween peyda kard, besurate array bar migardune
# $hide_the_keys age true bashe, $bet va $ween pak mishe, age na mimune.

function string_between_replace( $str, $bet, $ween, $func=null, $hide_the_keys=false ){
	
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
					if( $hide_the_keys ){
						$str_arr[$i] = implode( '', $str_this_arr);
					} else {
						$str_arr[$i] = implode( $ween, $str_this_arr);						
					}

				} else {
					$word_arr[] = $the_word;
				}

			}

		}

		if( $hide_the_keys ){
			$str = implode( '', $str_arr );
		} else {
			$str = implode( $bet, $str_arr );			
		}

	}

	if( $func ){
		return $str;
	
	} else {
		return $word_arr;
	}

}
