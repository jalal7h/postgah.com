<?

# jalal7h@gmail.com
# 2016/12/11
# 1.0

function DateConv_en2fa( $Date ){
	
	$Year = substr($Date, 0, 4);
	$Month = intval(substr($Date, 5, 2));
	$DayOfMonth = intval(substr($Date, 8, 2));
	$Etc = substr($Date, 11,8);
	$DayOfWeek = substr($Date, 20,1);

	$Converter = new Converter;
	$g2j = $Converter->GregorianToJalali( $Year, $Month, $DayOfMonth );
	
	$D = addzero($g2j[2]);
	$M = addzero($g2j[1]);
	$Y = $g2j[0];

	$Date = $Y.'/'.$M.'/'.$D.' '.$Etc.'|'.$DayOfWeek;

	return $Date;

}



