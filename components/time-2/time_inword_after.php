<?

# jalal7h@gmail.com
# 2016/09/18
# 1.1

function time_inword_after( $U ){
	
	$aMinute = 60;
	$anHour = $aMinute * 60;
	$aDay = $anHour * 24;
	$aMonth = $aDay * 30;

	$now = U();
	$diff = $U - $now;
	
	if($diff >= $aMonth){
		return round($diff/$aMonth)." ماه بعد";
	
	} else if($diff >= $aDay){
		return round($diff/$aDay)." روز بعد";
	
	} else if($diff >= $anHour){
		return round($diff/$anHour)." ساعت بعد";
	
	} else if($diff >= $aMinute){
		return round($diff/$aMinute)." دقیقه بعد";
	
	} else {
		return round($diff)." ثانیه بعد";
	}
}

