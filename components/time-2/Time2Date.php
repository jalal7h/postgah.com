<?

# jalal7h@gmail.com
# 2016/11/08
# 1.0

function Time2Date( $TIME ,$HR=0,$CLEAR=0 ){

	$ALlDATE = array();	

	$TYear 	= substr($TIME, 2, 2);
	$TMont 	= substr($TIME, 5, 2);
	$TDate 	= substr($TIME, 8, 2);

	$E = substr($TIME, 11, 8);
	$TDay =  substr($TIME, 20, 1);

	switch( $TDay ){
		case 0 	:	{$TDAY = 'Saturday';break;}
		case 1 	:	{$TDAY = 'Sunday';break;}
		case 2 	:	{$TDAY = 'Monday';break;}
		case 3 	:	{$TDAY = 'Tuesday';break;}
		case 4 	:	{$TDAY = 'Wednesday';break;}
		case 5 	:	{$TDAY = 'Thursday';break;}
		case 6 	:	{$TDAY = 'Friday';break;}
	}

	switch( $TMont ){
		case '01' 	:	{$TMONT = 'January';break;}
		case '02' 	:	{$TMONT = 'February';break;}
		case '03' 	:	{$TMONT = 'March';break;}
		case '04' 	:	{$TMONT = 'April';break;}
		case '05' 	:	{$TMONT = 'May';break;}
		case '06'	:	{$TMONT = 'June';break;}
		case '07' 	:	{$TMONT = 'July';break;}
		case '08' 	:	{$TMONT = 'August';break;}
		case '09' 	:	{$TMONT = 'September';break;}
		case '10' 	:	{$TMONT = 'October';break;}
		case '11'	:	{$TMONT = 'November';break;}
		case '12' 	:	{$TMONT = 'December';break;}
	}

	$TIME = $TDAY.'&nbsp; '.$TDate.'&nbsp;'.$TMONT.'&nbsp;20'.$TYear;
	if($HR)$TIME.=' Time: '.$E;
	if(!$CLEAR)$TIME = '<span align=center class=TX1>&nbsp;'.$TIME.'</span>';

	return $TIME;
}


function Time_2_Date( $TIME ,$HR=0,$CLEAR=0 ){
	return Time2Date( $TIME, $HR, $CLEAR );
}








