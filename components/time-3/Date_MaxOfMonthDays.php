<?

# jalal7h@gmail.com
# 2016/12/11
# 1.0

function Date_MaxOfMonthDays( $lang='' ){
	
	# 
	# lang
	if( $lang != '' ){
		//

	} else if(! defined('lang_code') ){
		$lang = 'fa';
		
	} else {
		$lang = lang_code;
	}
	
	$func = 'Date_MaxOfMonthDays_'.lang_code;
	if(! function_exists($func) ){
		$func = 'Date_MaxOfMonthDays_fa';
	}

	return $func();

	 
}

