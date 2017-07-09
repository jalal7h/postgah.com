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
		return round($diff/$aMonth)." ".__("ماه بعد");
	
	} else if($diff >= $aDay){
		return round($diff/$aDay)." ".__("روز بعد");
	
	} else if($diff >= $anHour){
		return round($diff/$anHour)." ".__("ساعت بعد");
	
	} else if($diff >= $aMinute){
		return round($diff/$aMinute)." ".__("دقیقه بعد");
	
	} else {
		return round($diff)." ".__("ثانیه بعد");
	}
}

