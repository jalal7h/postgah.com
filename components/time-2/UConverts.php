<?

# jalal7h@gmail.com
# 2016/11/08
# 1.0

function Vaght2U($VAGHT){
	$TIME = Vaght2Time($VAGHT);
	$U = Time2U($TIME);
	return $U;
}


function U2Vaght($U){
	$TIME = U2Time($U);
	$VAGHT = Time2Vaght($TIME);
	return $VAGHT;
}


function Time2U($T){
	$H = intval( substr($T, 11, 2));
	$i = intval( substr($T, 14, 2));
	$s = intval( substr($T, 17, 2));
	$m = intval( substr($T, 5, 2));
	$d = intval( substr($T, 8, 2));
	$Y = intval( substr($T, 0, 4));
	$U = gmmktime($H, $i, $s, $m, $d, $Y, -1 );
	return $U;
}


function U2Time($U){
	
	if(! $U ){
		return null;

	// } if($U>1542507122){
	// 	$d = date_create( "@2192806533 " );
	// 	return date_format( $d, 'Y.m.d H:i:s' );

	} else {
		return gmdate('Y/m/d H:i:s', $U)."|".gmdate('w', $U+86400);
	}
	
}





