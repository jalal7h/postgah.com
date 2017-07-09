<?

# jalal7h@gmail.com
# 2016/09/18
# 1.2

function time_inword_before( $U ){
	
	$now = U();
	$aMinute = 60;
	$anHour = $aMinute * 60;
	$aDay = $anHour * 24;
	$aMonth = $aDay * 30;
	$diff = $now - $U;
	
	if($diff >= $aMonth){
		return round($diff/$aMonth)." ".__("ماه قبل");
	
	} else if($diff >= $aDay){
		return round($diff/$aDay)." ".__("روز قبل");
	
	} else if($diff >= $anHour){
		return round($diff/$anHour)." ".__("ساعت قبل");
	
	} else if($diff >= $aMinute){
		return round($diff/$aMinute)." ".__("دقیقه قبل");
	
	} else {
		return round($diff)." ".__("ثانیه قبل");
	}
}

