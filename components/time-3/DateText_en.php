<?

# jalal7h@gmail.com
# 2016/12/11
# 1.0

function DateText_en( $Date ){
	
	$Year = substr($Date, 2, 2);
	$Month = substr($Date, 5, 2);
	$DayOfMonth = substr($Date, 8, 2);

	$DayOfWeek =  substr($Date, 20, 1);

	switch( $DayOfWeek ){
		case 0 : $DayOfWeek = 'Saturday'; break;
		case 1 : $DayOfWeek = 'Sunday'; break;
		case 2 : $DayOfWeek = 'Monday'; break;
		case 3 : $DayOfWeek = 'Tuesday'; break;
		case 4 : $DayOfWeek = 'Wednesday'; break;
		case 5 : $DayOfWeek = 'Thursday'; break;
		case 6 : $DayOfWeek = 'Friday'; break;
	}

	switch( $Month ){
		case '01' : $Month = 'January'; break;
		case '02' : $Month = 'February'; break;
		case '03' : $Month = 'March'; break;
		case '04' : $Month = 'April'; break;
		case '05' : $Month = 'May'; break;
		case '06' : $Month = 'June'; break;
		case '07' : $Month = 'July'; break;
		case '08' : $Month = 'August'; break;
		case '09' : $Month = 'September'; break;
		case '10' : $Month = 'October'; break;
		case '11' : $Month = 'November'; break;
		case '12' : $Month = 'December'; break;
	}

	$Text = substr($DayOfWeek,0,3).', '.$DayOfMonth.' '.substr($Month,0,3).' '.$Year;

	return $Text;

}



