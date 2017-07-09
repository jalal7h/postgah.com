<?

# jalal7h@gmail.com
# 2016/12/11
# 1.0

# echo UDate( U() );
# echo UDate( U(), "text" );

function UDate( $U , $text_or_numeric="numeric", $lang='' ){
	

	# 
	# lang
	if( $lang != '' ){
		//

	} else if(! defined('lang_code') ){
		$lang = 'fa';
		
	} else {
		$lang = lang_code;
	}


	#
	# U to Date
	$func = "UDate_".$lang;
	if(! function_exists($func) ){
		$func = "UDate_fa";
	}
	$Date = $func( $U );


	# 
	# Date to Text Date
	if( $text_or_numeric == "text" ){
		
		$func = "DateText_".$lang;

		if(! function_exists($func) ){
			$func = "DateText_fa";
		}

		$Date = $func( $Date );

	}


	return $Date;

}



