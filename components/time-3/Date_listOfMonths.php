<?

# jalal7h@gmail.com
# 2016/12/11
# 1.0

function Date_listOfMonths( $lang='' ){
	
	# 
	# lang
	if( $lang != '' ){
		//

	} else if(! defined('lang_code') ){
		$lang = 'fa';
		
	} else {
		$lang = lang_code;
	}

	$func = 'Date_listOfMonths_'.lang_code;
	if(! function_exists($func) ){
		$func = 'Date_listOfMonths_fa';
	}

	return $func();

}



