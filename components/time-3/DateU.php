<?

# jalal7h@gmail.com
# 2016/12/11
# 1.0

function DateU( $Date , $lang='' ){
	
	if(! $Date = trim($Date) ){
		return false;
		
	} else if( strlen($Date) == 10 ){
		$Date.= " 12:00:00";
	}


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
	# Date to U
	$func = "DateU_".$lang;
	if(! function_exists($func) ){
		$func = "DateU_fa";
	}
	$U = $func( $Date );


	return $U;

}



