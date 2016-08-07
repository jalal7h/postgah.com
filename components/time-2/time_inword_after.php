<?

# jalal7h@gmail.com
# 2016/07/15
# 1.0

function time_inword_after( $U ){
	
	$aMinute = 60;
	$anHour = $aMinute * 60;
	$aDay = $anHour * 24;
	$aMonth = $aDay * 30;

	$now = U();
	$diff = $U - $now;
	
	if($diff > $aMonth){
		return ceil($diff/$aMonth)." ماه بعد";
	
	} else if($diff > $aDay){
		return ceil($diff/$aDay)." روز بعد";
	
	} else if($diff > $anHour){
		return ceil($diff/$anHour)." ساعت بعد";
	
	} else if($diff > $aMinute){
		return ceil($diff/$aMinute)." دقیقه بعد";
	
	} else {
		return ceil($diff)." ثانیه بعد";
	}
}

