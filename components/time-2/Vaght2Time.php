<?

# jalal7h@gmail.com
# 2016/11/08
# 1.0

function Vaght2Time( $VAGHT ){

	$sall = substr($VAGHT, 0, 4);
	$mah = intval(substr($VAGHT, 5, 2));
	$ruz = intval(substr($VAGHT, 8, 2));
	$E = substr($VAGHT, 11,8);

	$Converter = new Converter;
	$j2g = $Converter->JalaliToGregorian($sall, $mah, $ruz);

	$Y = $j2g[0];
	$M = addzero($j2g[1]);
	$D = addzero($j2g[2]);
	$W = gmdate('w', Time2U($Y.'.'.$M.'.'.$D." 12:00:00")+86400);
	$TIME = $Y . '.' . $M . '.' . $D . ' ' . $E . '|' . $W ;

	return $TIME;
	
}



