<?

# jalal7h@gmail.com
# 2016/12/11
# 1.0

function UDate_fa( $U ){
	
	$Date = UDate_en( $U ); // 2016/12/11 12:45:10|9

	$year = substr($Date, 0, 4);
	$month = intval(substr($Date, 5, 2));
	$day = intval(substr($Date, 8, 2));
	$E = substr($Date, 11,8);
	$W = substr($Date, 20,1);

	$Converter = new Converter;
	$g2j = $Converter->GregorianToJalali($year,$month,$day);
	
	$D = addzero($g2j[2]);
	$M = addzero($g2j[1]);
	$Y = addzero($g2j[0]);

	// $W = gmdate( 'w', Clock_enU($Clock) + 86400 );
	
	$Date = $Y . '/' . $M . '/' . $D . ' ' . $E . '|' . $W ;

	return $Date;
	 
}



