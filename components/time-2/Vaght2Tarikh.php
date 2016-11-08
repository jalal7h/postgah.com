<?

# jalal7h@gmail.com
# 2016/11/08
# 1.0

function Vaght2Tarikh( $TIME, $HR=0, $CLEAR=0, $TDayFlag=false ){

	$ALlDATE = array();
	
	if($TIME==''){
		return "not valid";
	}
	
	$TYear 	= @ substr($TIME, 0, 4);
	$TMont 	= @ substr($TIME, 5, 2);
	$TDate 	= @ substr($TIME, 8, 2);
	$E = @ substr($TIME, 11, 8);
	$TDay =  @ substr($TIME, 20, 1);
	
	switch( $TDay ){
		case 0 	:	{$TDAY = 'شنبه';break;}
		case 1 	:	{$TDAY = 'یکشنبه';break;}
		case 2 	:	{$TDAY = 'دوشنبه';break;}
		case 3 	:	{$TDAY = 'سه شنبه';break;}
		case 4 	:	{$TDAY = 'چهارشنبه';break;}
		case 5 	:	{$TDAY = 'پنجشنبه';break;}
		case 6 	:	{$TDAY = 'جمعه';break;}
	}

	switch( $TMont ){
		case '01' 	:	{$TMONT = 'فروردین';break;}
		case '02' 	:	{$TMONT = 'اردیبهشت';break;}
		case '03' 	:	{$TMONT = 'خرداد';break;}
		case '04' 	:	{$TMONT = 'تیر';break;}
		case '05' 	:	{$TMONT = 'مرداد';break;}
		case '06'	:	{$TMONT = 'شهریور';break;}
		case '07' 	:	{$TMONT = 'مهر';break;}
		case '08' 	:	{$TMONT = 'آبان';break;}
		case '09' 	:	{$TMONT = 'آذر';break;}
		case '10' 	:	{$TMONT = 'دی';break;}
		case '11'	:	{$TMONT = 'بهمن';break;}
		case '12' 	:	{$TMONT = 'اسفند';break;}
	}
	
	$TIME = intval($TDate).'&nbsp;'.$TMONT.'&nbsp;'.$TYear;
	if($TDayFlag){
		$TIME = $TDAY.'&nbsp;'.$TIME;
	}

	if($HR)$TIME .= ' ساعت '.$E;
	if(!$CLEAR)$TIME = '<span dir='._DIR.' align=center>&nbsp;'.$TIME.'</span>';
	
	return $TIME;
}

function Vaght_2_Taghvim( $TIME, $HR=0, $CLEAR=0, $TDayFlag=false ){
	return Vaght2Tarikh( $TIME, $HR, $CLEAR, $TDayFlag);
}


