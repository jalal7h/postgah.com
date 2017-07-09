<?

# jalal7h@gmail.com
# 2016/12/11
# 1.0

function DateConv_fa2en( $Date ){
	
	$Year = substr($Date, 0, 4);
	$Month = intval(substr($Date, 5, 2));
	$DayOfMonth = intval(substr($Date, 8, 2));
	$Etc = substr($Date, 11,8);
	$DayOfWeek = substr($Date, 20,1);

	$Converter = new Converter;
	$j2g = $Converter->JalaliToGregorian( $Year, $Month, $DayOfMonth );

	$Y = $j2g[0];
	$M = addzero($j2g[1]);
	$D = addzero($j2g[2]);

	$Date = $Y.'/'.$M.'/'.$D.' '.$Etc.'|'.$DayOfWeek;

	return $Date;

}



