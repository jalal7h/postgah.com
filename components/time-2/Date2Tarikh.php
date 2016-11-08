<?

# jalal7h@gmail.com
# 2016/11/08
# 1.0

function Date2Tarikh( $TIME ){

	$year = substr($TIME, 0, 4);
	$month = intval(substr($TIME, 5, 2));
	$day = intval(substr($TIME, 8, 2));
	$E = substr($TIME, 11,8);

	$Converter = new Converter;
	$g2j = $Converter->GregorianToJalali($year,$month,$day);

	$Y = $g2j[0];
	$M = addzero($g2j[1]);
	$D = addzero($g2j[2]);
	$W = gmdate('w', Time2U($TIME)+86400);
	$TIME = $Y . '-' . $M . '-' . $D . ' ' . $E . '|' . $W ;
	
	return $TIME;
}


function MLD_2_SMSI( $TIME ){
	return Date2Tarikh($TIME);
}







