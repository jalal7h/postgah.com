<?

# jalal7h@gmail.com
# 2016/12/11
# 1.0

function DateText_fa( $Date ){
	
	$Year = substr($Date, 0, 4);
	$Month = substr($Date, 5, 2);
	$DayOfMonth = substr($Date, 8, 2);
	$DayOfWeek = substr($Date, 20, 1);

	switch( $DayOfWeek ){
		case 0 : $DayOfWeek = 'شنبه'; break;
		case 1 : $DayOfWeek = 'یکشنبه'; break;
		case 2 : $DayOfWeek = 'دوشنبه'; break;
		case 3 : $DayOfWeek = 'سه شنبه'; break;
		case 4 : $DayOfWeek = 'چهارشنبه'; break;
		case 5 : $DayOfWeek = 'پنجشنبه'; break;
		case 6 : $DayOfWeek = 'جمعه'; break;
	}

	switch( $Month ){
		case '01' : $Month = 'فروردین'; break;
		case '02' : $Month = 'اردیبهشت'; break;
		case '03' : $Month = 'خرداد'; break;
		case '04' : $Month = 'تیر'; break;
		case '05' : $Month = 'مرداد'; break;
		case '06' : $Month = 'شهریور'; break;
		case '07' : $Month = 'مهر'; break;
		case '08' : $Month = 'آبان'; break;
		case '09' : $Month = 'آذر'; break;
		case '10' : $Month = 'دی'; break;
		case '11' : $Month = 'بهمن'; break;
		case '12' : $Month = 'اسفند'; break;
	}

	$Text = $DayOfWeek.'، '.intval($DayOfMonth).' '.$Month.' '.$Year;
	
	return $Text;

}



